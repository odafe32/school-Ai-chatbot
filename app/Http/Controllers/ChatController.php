<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Services\NsukChatService;
use App\Models\Chat;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    protected $chatService;

    public function __construct(NsukChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function dashboard(Request $request): View
    {
        $user = Auth::user();
        
        // Get current chat from session or create new one
        $currentChatId = session('current_chat_id');
        $currentChat = null;
        $messages = [];

        if ($currentChatId) {
            $currentChat = Chat::where('id', $currentChatId)
                              ->where('user_id', $user->id)
                              ->with('messages')
                              ->first();
            
            if ($currentChat) {
                $messages = $currentChat->messages->map(function ($message) {
                    return [
                        'content' => $message->content,
                        'sender' => $message->sender,
                        'timestamp' => $message->getFormattedTimeAttribute()
                    ];
                })->toArray();
            }
        }

        // Get recent chats for sidebar
        $recentChats = Chat::forUser($user->id)
                          ->with('latestMessage')
                          ->limit(10)
                          ->get();

        return view('dashboard', [
            'title' => 'Chat - NSUK AI',
            'messages' => $messages,
            'currentChat' => $currentChat,
            'recentChats' => $recentChats
        ]);
    }

    public function sendMessage(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'message' => 'required|string|max:1000',
            ]);

            $user = Auth::user();
            $userMessage = $request->input('message');
            
            // Get or create current chat
            $currentChatId = session('current_chat_id');
            $chat = null;

            if ($currentChatId) {
                $chat = Chat::where('id', $currentChatId)
                           ->where('user_id', $user->id)
                           ->first();
            }

            if (!$chat) {
                // Create new chat
                $chat = Chat::create([
                    'user_id' => $user->id,
                    'last_message_at' => now()
                ]);
                session(['current_chat_id' => $chat->id]);
            }

            // Add user message
            ChatMessage::create([
                'chat_id' => $chat->id,
                'content' => $userMessage,
                'sender' => 'user'
            ]);

            // Process message through our NSUK chat service
            $response = $this->chatService->processMessage($userMessage);

            // Add AI response
            ChatMessage::create([
                'chat_id' => $chat->id,
                'content' => $response,
                'sender' => 'assistant'
            ]);

            // Update chat timestamp and generate title if needed
            $chat->updateLastMessageTime();
            if (!$chat->title) {
                $chat->generateTitle();
            }

            return redirect()->route('dashboard')->with('success', 'Message sent successfully!');

        } catch (\Exception $e) {
            \Log::error('Chat message error: ' . $e->getMessage());
            
            return redirect()->route('dashboard')->with('error', 'Sorry, I encountered an error. Please try again.');
        }
    }

    public function newChat(Request $request): RedirectResponse
    {
        try {
            $user = Auth::user();
            
            // Create new chat
            $chat = Chat::create([
                'user_id' => $user->id,
                'title' => 'New Chat',
                'last_message_at' => now()
            ]);

            // Get welcome message from service
            $welcomeMessage = $this->chatService->getWelcomeMessage();

            // Add welcome message
            ChatMessage::create([
                'chat_id' => $chat->id,
                'content' => $welcomeMessage,
                'sender' => 'assistant'
            ]);

            // Set as current chat
            session(['current_chat_id' => $chat->id]);

            return redirect()->route('dashboard')->with('success', 'New chat started!');

        } catch (\Exception $e) {
            \Log::error('New chat error: ' . $e->getMessage());
            
            return redirect()->route('dashboard')->with('error', 'Failed to start new chat.');
        }
    }

    public function getChatHistory(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            
            $chats = Chat::forUser($user->id)
                        ->with('latestMessage')
                        ->paginate(20);

            $chatData = $chats->map(function ($chat) {
                return [
                    'id' => $chat->id,
                    'title' => $chat->title ?: 'Untitled Chat',
                    'last_message' => $chat->latestMessage ? 
                        substr($chat->latestMessage->content, 0, 100) . '...' : 
                        'No messages',
                    'timestamp' => $chat->last_message_at ? 
                        $chat->last_message_at->toISOString() : 
                        $chat->created_at->toISOString(),
                    'message_count' => $chat->messages()->count()
                ];
            });

            return response()->json([
                'success' => true,
                'chats' => $chatData,
                'pagination' => [
                    'current_page' => $chats->currentPage(),
                    'last_page' => $chats->lastPage(),
                    'total' => $chats->total()
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Chat history error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'error' => 'Failed to load chat history.',
            ], 500);
        }
    }

    /**
     * Load a specific chat
     */
    public function loadChat(Request $request, $chatId): RedirectResponse
    {
        try {
            $user = Auth::user();
            
            $chat = Chat::where('id', $chatId)
                       ->where('user_id', $user->id)
                       ->first();

            if (!$chat) {
                return redirect()->route('dashboard')->with('error', 'Chat not found.');
            }

            // Set as current chat
            session(['current_chat_id' => $chat->id]);

            return redirect()->route('dashboard')->with('success', 'Chat loaded successfully!');

        } catch (\Exception $e) {
            \Log::error('Load chat error: ' . $e->getMessage());
            
            return redirect()->route('dashboard')->with('error', 'Failed to load chat.');
        }
    }

    /**
     * Delete a specific chat
     */
    public function deleteChat(Request $request, $chatId): JsonResponse
    {
        try {
            $user = Auth::user();
            
            $chat = Chat::where('id', $chatId)
                       ->where('user_id', $user->id)
                       ->first();

            if (!$chat) {
                return response()->json([
                    'success' => false,
                    'error' => 'Chat not found.'
                ], 404);
            }

            // If this is the current chat, clear the session
            if (session('current_chat_id') == $chatId) {
                session()->forget('current_chat_id');
            }

            $chat->delete();

            return response()->json([
                'success' => true,
                'message' => 'Chat deleted successfully.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Delete chat error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'error' => 'Failed to delete chat.'
            ], 500);
        }
    }
}