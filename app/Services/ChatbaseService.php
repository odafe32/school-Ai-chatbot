<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbaseService
{
    private $apiKey;
    private $chatbotId;
    private $baseUrl = 'https://www.chatbase.co/api/v1';

    public function __construct()
    {
        $this->apiKey = config('services.chatbase.api_key');
        $this->chatbotId = config('services.chatbase.chatbot_id');
    }

    /**
     * Send a message to Chatbase and get AI response
     *
     * @param string $message The user's message
     * @param string|null $conversationId Optional conversation ID for context
     * @return array|null Returns ['answer' => string, 'conversationId' => string] or null on failure
     */
    public function sendMessage(string $message, ?string $conversationId = null): ?array
    {
        try {
            if (!$this->isConfigured()) {
                Log::warning('Chatbase: API key or chatbot ID not configured');
                return null;
            }

            Log::info('Chatbase: Sending message to API');

            $payload = [
                'messages' => [
                    [
                        'content' => $message,
                        'role' => 'user'
                    ]
                ],
                'chatbotId' => $this->chatbotId,
                'stream' => false,
                'temperature' => 0.7,
            ];

            // Add conversation ID if provided for context
            if ($conversationId) {
                $payload['conversationId'] = $conversationId;
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])
            ->timeout(60)
            ->retry(3, 1000)
            ->post($this->baseUrl . '/chat', $payload);

            if ($response->successful()) {
                $data = $response->json();
                
                // Chatbase returns the response in 'text' field
                if (isset($data['text'])) {
                    $answer = trim($data['text']);
                    $conversationId = $data['conversationId'] ?? null;
                    
                    Log::info('Chatbase: Successfully received response');
                    
                    return [
                        'answer' => $answer,
                        'conversationId' => $conversationId
                    ];
                }
            }

            // Log detailed error information
            Log::warning('Chatbase: Failed with status ' . $response->status());
            Log::warning('Chatbase: Error response: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('Chatbase error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Check if Chatbase is properly configured
     *
     * @return bool
     */
    public function isConfigured(): bool
    {
        return !empty($this->apiKey) && !empty($this->chatbotId);
    }

    /**
     * Get chatbot information from Chatbase
     *
     * @return array|null
     */
    public function getChatbotInfo(): ?array
    {
        try {
            if (!$this->isConfigured()) {
                return null;
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
            ])
            ->timeout(30)
            ->get($this->baseUrl . '/chatbot/' . $this->chatbotId);

            if ($response->successful()) {
                return $response->json();
            }

            return null;

        } catch (\Exception $e) {
            Log::error('Chatbase info error: ' . $e->getMessage());
            return null;
        }
    }
}
