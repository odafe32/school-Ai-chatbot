<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <div class="font-sans transition-colors duration-300" id="body">
        <div class="flex h-screen relative" id="mainContainer">
            <!-- Sidebar Overlay for Mobile -->
            <div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="sidebarOverlay" onclick="toggleSidebar()"></div>

            <!-- Sidebar -->
            <div class="w-64 bg-white border-r border-gray-200 flex flex-col transition-all duration-300 ease-in-out z-50 fixed md:relative h-full transform -translate-x-full md:translate-x-0" id="sidebar">
                <!-- Sidebar Header -->
                <div class="p-4 border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAAgCAMAAADdXFNzAAABPlBMVEVHcEwcGhh/fHrMysrq6ekAAADHxcTo6Ofr6umioJ/j4+LX1ta2trXp6Ofl5eXc3NvV1dXc29zU09PEw8PZ2djT0tLS0dH5wwD////v7u+FwiYBkd/9xQD29vaDwhz/yACIwybsy3b7+vvZ29mBwiXR0NOzs7Th4d+MjI2ny3zIx8t1dHS1wxhrZ2VTuByko6DMnwCXlZUAhNVBQUapqKhzuSWCf36+vr9+wACfutAhldHjsQLe2cOMuFCGxAoHyQWcrjR1tQAAkOmkgha4zd7WskXkz55UVl+/uSYUCwd/vD2CvuqGlqLN2eJBxhQAugUotw8gowy60HSslyOXg1JNQSRYRQwjJCfpvSlrtmZImMXIuGObt3dGxBejnJVsqiFHoit6oydmtcRot5x1qM+Ip5vBvZlEp/NWr97S5EYu6kNmAAAAF3RSTlMAHCp75g5u/u5B0rZe2sP2kKKFksqpn13EfwwAAAJfSURBVCiRbZLnVqNAFIAnIQnEJJ7EstwBJiCEsiAl3RQ1VY+9rMe6ve/7v8AOCFHX/ebffJfLLYMQWuUyj3ARbIhJD2umUEiKaBiz+BXaMnqEw77Vqnesjm516vWuW++4vlMHNhf7JawZttHt2qZu67pua7Zt65hAPvbL7MaCy7cJ7yGVeMwnSJvVhG3IJvnZZ74mCIKiCMIzX4q8xEty6GtK2/usPPecSe18Lk2bMvXt9ujiy8hT2ov/46EUDKY3Aye4kjeFT2ej85F3oYwhHXsylCz95rp5K0/lzZpyPtpte21lrMb9ZWFPurKaB80B/y70nre76ynCVjKfFOzx8v7+1AnkgHqhdnYaeW3l0edhg5eCQArk62bYn3IqfKBdbmnlJ89LtD1+EMz7h1VBoYd6k3nKH0/nYSL273aEiEV9KBPPT/4xufzz+9e3KKC6TWKNijCPvr7vWf5P1zW+7lRp+mEl8aiEB7x02584rf3mgWNMaBHVQzUZb7FAJ8Q/iOLRgeU4zc5MFMW7Mc4hMyogpwKTVYcNUWw5rlX3Px5R39AKaAnwOn2dABiKWXLSODo+nvWOeyehPimgAugGrCEGwGUhR2voiwn3LBNqBwhd0RoQGrCOGLXXiGxjxqVpcr1DoBg9HxqgQSabXcLfG2KjR/eSx2C7BOIFrYHqdkEto3QJzzh6WQAwfKIWk/5XgfgaBsygFG2pTABr9PmnF/NBeRZaLR2AVPIVAmD7BrxBL1hRNb/exSqAaRiGVkqjfykT02y1HKtrmJn8KxvCcKASFZb/b0PSlcxK9sXNX9N2ZmuYMFQRAAAAAElFTkSuQmCC" width="60px" alt="">
                        <h1 class="text-lg font-bold text-gray-800">NSUK Assistant AI</h1>
                        <button class="md:hidden p-1 text-gray-600 hover:text-gray-800" onclick="toggleSidebar()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('chat.new') }}">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2">
                            <i class="fas fa-plus"></i>
                            <span>New Chat</span>
                        </button>
                    </form>
                </div>

                <!-- Recent Chats -->
                <div class="flex-1 p-3">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2 px-2">Recent Chats</h3>
                    <div id="chatHistory" class="space-y-1">
                        @if($recentChats && count($recentChats) > 0)
                            @foreach($recentChats as $chat)
                                <div class="chat-item {{ $currentChat && $currentChat->id == $chat->id ? 'active bg-green-600' : 'hover:bg-gray-50' }} p-3 rounded-lg cursor-pointer text-sm transition-colors duration-200 group"
                                     onclick="loadChat({{ $chat->id }})">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-comment-dots {{ $currentChat && $currentChat->id == $chat->id ? 'text-white' : 'text-gray-400' }} flex-shrink-0"></i>
                                        <div class="flex-1 min-w-0">
                                            <div class="font-medium {{ $currentChat && $currentChat->id == $chat->id ? 'text-white' : 'text-gray-800' }} truncate">
                                                {{ $chat->title ?: 'Untitled Chat' }}
                                            </div>
                                            @if($chat->latestMessage)
                                                <div class="text-xs {{ $currentChat && $currentChat->id == $chat->id ? 'text-green-100' : 'text-gray-500' }} truncate mt-1">
                                                    {{ Str::limit($chat->latestMessage->content, 23) }}
                                                </div>
                                            @endif
                                            <div class="text-xs {{ $currentChat && $currentChat->id == $chat->id ? 'text-green-200' : 'text-gray-400' }} mt-1">
                                                {{ $chat->last_message_at ? $chat->last_message_at->diffForHumans() : $chat->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex-shrink-0">
                                            <button onclick="event.stopPropagation(); deleteChat({{ $chat->id }})"
                                                    class="p-1 {{ $currentChat && $currentChat->id == $chat->id ? 'text-green-200 hover:text-white' : 'text-gray-400 hover:text-red-500' }} transition-colors duration-200">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-8 text-gray-500">
                                <i class="fas fa-comments text-2xl mb-2"></i>
                                <p class="text-sm">No chat history yet</p>
                                <p class="text-xs">Start a conversation!</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar Footer -->
                <div class="border-t border-gray-200 p-4">
                    <div class="flex items-center gap-3 p-3 rounded-lg cursor-pointer transition-colors duration-200 hover:bg-gray-100 mb-3">
                        <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white font-semibold text-sm flex-shrink-0">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-medium text-gray-800 truncate">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full px-3 py-2 bg-transparent border border-red-500 text-red-500 rounded-lg text-sm transition-all duration-200 hover:bg-red-500 hover:text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col bg-gray-50 relative">
                <!-- Chat Header -->
                <div class="px-4 py-3 bg-white border-b border-gray-200 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <button class="p-2 text-gray-600 hover:text-gray-800 md:hidden" onclick="toggleSidebar()">
                            <i class="fas fa-bars"></i>
                        </button>
                        <button class="p-2 text-gray-600 hover:text-gray-800 hidden md:block" onclick="toggleSidebar()">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-lg font-semibold text-gray-800" id="chatTitle">
                            {{ $currentChat ? ($currentChat->title ?: 'NSUK AI Chat') : 'NSUK AI Chat' }}
                        </h2>
                    </div>
                    @if($currentChat)
                        <div class="text-sm text-gray-500">
                            {{ $currentChat->messages()->count() }} messages
                        </div>
                    @endif
                </div>

                <!-- Messages Container -->
                <div class="flex-1 overflow-y-auto" id="messagesContainer">
                    <div class="max-w-4xl mx-auto px-4 py-6">

                        @if($messages && count($messages) > 0)
                            @foreach($messages as $message)
                                <div class="flex gap-4 mb-8">
                                    @if($message['sender'] === 'user')
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm flex-shrink-0">
                                            U
                                        </div>
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center text-white font-semibold text-sm flex-shrink-0">
                                            AI
                                        </div>
                                    @endif
                                    <div class="flex-1 bg-white p-4 rounded-lg shadow-sm">
                                        <div class="text-gray-800 whitespace-pre-line">{{ $message['content'] }}</div>
                                        <div class="text-xs text-gray-500 mt-2">{{ $message['timestamp'] }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Welcome Message -->
                            <div class="text-center py-12">
                                <div class="w-16 h-16 mx-auto mb-4 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Welcome to NSUK Assistant AI</h3>
                                <p class="text-gray-600 max-w-md mx-auto">I'm here to help you with questions about Nasarawa State University Keffi and Computer Science topics. How can I assist you today?</p>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="flex gap-4 mb-8">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center text-white font-semibold text-sm flex-shrink-0">
                                    !
                                </div>
                                <div class="flex-1 bg-red-50 border border-red-200 p-4 rounded-lg">
                                    <div class="text-red-800">{{ session('error') }}</div>
                                </div>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="flex gap-4 mb-8">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center text-white font-semibold text-sm flex-shrink-0">
                                    AI
                                </div>
                                <div class="flex-1 bg-green-50 border border-green-200 p-4 rounded-lg">
                                    <div class="text-green-800">{{ session('success') }}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Input Area -->
                <div class="px-4 py-4 bg-white border-t border-gray-200">
                    <div class="max-w-4xl mx-auto">
                        <form method="POST" action="{{ route('chat.send') }}" id="chatForm">
                            @csrf
                            <div class="relative bg-gray-100 border border-gray-300 rounded-xl transition-all duration-200 focus-within:border-green-500 focus-within:shadow-lg focus-within:shadow-green-500/10">
                                <textarea
                                    name="message"
                                    id="messageInput"
                                    class="w-full px-4 py-3 pr-12 bg-transparent border-none outline-none text-gray-800 text-base leading-6 resize-none min-h-12 max-h-48 placeholder-gray-500"
                                    placeholder="Ask me about NSUK or Computer Science... (Press Enter to send, Shift+Enter for new line)"
                                    rows="1"
                                    required
                                    oninput="handleInputChange(this)"
                                    onkeydown="handleKeyDown(event)"
                                >{{ old('message') }}</textarea>
                                <button
                                    type="submit"
                                    id="sendButton"
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-green-600 border-none rounded-lg text-white cursor-pointer flex items-center justify-center transition-all duration-200 hover:bg-green-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    <i class="fas fa-paper-plane" id="sendIcon"></i>
                                    <i class="fas fa-spinner fa-spin hidden" id="loadingIcon"></i>
                                </button>
                            </div>
                            @error('message')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                            <div class="text-xs text-gray-500 mt-2 text-center">
                                Press <kbd class="px-1 py-0.5 bg-gray-200 rounded text-xs">Enter</kbd> to send •
                                <kbd class="px-1 py-0.5 bg-gray-200 rounded text-xs">Shift</kbd> +
                                <kbd class="px-1 py-0.5 bg-gray-200 rounded text-xs">Enter</kbd> for new line
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let isSidebarOpen = false;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (window.innerWidth <= 768) {
                isSidebarOpen = !isSidebarOpen;
                if (isSidebarOpen) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            } else {
                if (sidebar.classList.contains('w-64')) {
                    sidebar.classList.remove('w-64');
                    sidebar.classList.add('w-0', 'overflow-hidden');
                } else {
                    sidebar.classList.add('w-64');
                    sidebar.classList.remove('w-0', 'overflow-hidden');
                }
            }
        }

        function handleInputChange(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = Math.min(textarea.scrollHeight, 192) + 'px';

            // Enable/disable send button based on content
            const sendButton = document.getElementById('sendButton');
            const hasContent = textarea.value.trim().length > 0;
            sendButton.disabled = !hasContent;

            if (hasContent) {
                sendButton.classList.remove('opacity-50', 'cursor-not-allowed');
                sendButton.classList.add('hover:bg-green-700');
            } else {
                sendButton.classList.add('opacity-50', 'cursor-not-allowed');
                sendButton.classList.remove('hover:bg-green-700');
            }
        }

        function handleKeyDown(event) {
            const textarea = event.target;
            const form = document.getElementById('chatForm');

            // Check if Enter key is pressed
            if (event.key === 'Enter') {
                // If Shift+Enter, allow default behavior (new line)
                if (event.shiftKey) {
                    return;
                }

                // If just Enter, prevent default and submit form
                event.preventDefault();

                // Only submit if there's content
                if (textarea.value.trim().length > 0) {
                    // Show loading state
                    const sendButton = document.getElementById('sendButton');
                    const sendIcon = document.getElementById('sendIcon');
                    const loadingIcon = document.getElementById('loadingIcon');

                    sendButton.disabled = true;
                    sendButton.classList.add('opacity-50', 'cursor-not-allowed');
                    sendButton.classList.remove('hover:bg-green-700');
                    sendIcon.classList.add('hidden');
                    loadingIcon.classList.remove('hidden');

                    form.submit();
                }
            }
        }

        // Load a specific chat
        function loadChat(chatId) {
            window.location.href = `/chat/${chatId}/load`;
        }

        // Delete a chat
        function deleteChat(chatId) {
            if (confirm('Are you sure you want to delete this chat? This action cannot be undone.')) {
                fetch(`/chat/${chatId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Reload the page to refresh the chat list
                        window.location.reload();
                    } else {
                        alert('Failed to delete chat: ' + (data.error || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to delete chat. Please try again.');
                });
            }
        }

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                isSidebarOpen = false;
            }
        });

        // Auto-scroll to bottom on page load
        window.addEventListener('load', () => {
            const messagesContainer = document.getElementById('messagesContainer');
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            // Initialize send button state
            const messageInput = document.getElementById('messageInput');
            handleInputChange(messageInput);

            // Focus on the input field
            messageInput.focus();
        });

        // Initialize send button state on page load
        document.addEventListener('DOMContentLoaded', function() {
            const messageInput = document.getElementById('messageInput');
            handleInputChange(messageInput);

            // Add form submission handler for loading state
            const chatForm = document.getElementById('chatForm');
            const sendButton = document.getElementById('sendButton');
            const sendIcon = document.getElementById('sendIcon');
            const loadingIcon = document.getElementById('loadingIcon');

            chatForm.addEventListener('submit', function(e) {
                // Show loading state
                sendButton.disabled = true;
                sendButton.classList.add('opacity-50', 'cursor-not-allowed');
                sendButton.classList.remove('hover:bg-green-700');
                sendIcon.classList.add('hidden');
                loadingIcon.classList.remove('hidden');

                // Re-enable after a timeout (in case of network issues)
                setTimeout(function() {
                    if (sendButton.disabled) {
                        sendButton.disabled = false;
                        sendButton.classList.remove('opacity-50', 'cursor-not-allowed');
                        sendButton.classList.add('hover:bg-green-700');
                        sendIcon.classList.remove('hidden');
                        loadingIcon.classList.add('hidden');
                    }
                }, 10000); // 10 second timeout
            });
        });
    </script>
</x-app-layout>
