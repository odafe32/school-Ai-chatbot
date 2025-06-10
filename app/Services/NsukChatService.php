<?php

namespace App\Services;

use App\Models\NsukKnowledge;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NsukChatService
{
    private $contactNumber;
    private $supportEmail;
    private $website;
    private $groqApiKey;
    private $groqModel;
    private $maxTokens;
    private $temperature;

    public function __construct()
    {
        $this->groqApiKey = config('services.groq.api_key');
        $this->groqModel = config('services.groq.model', 'llama3-8b-8192');
        $this->maxTokens = config('services.groq.max_tokens', 300);
        $this->temperature = config('services.groq.temperature', 0.8);
        
        $this->contactNumber = config('services.nsuk.contact_number', '+234-XXX-XXX-XXXX');
        $this->supportEmail = config('services.nsuk.support_email', 'support@nsuk.edu.ng');
        $this->website = config('services.nsuk.website', 'https://nsuk.edu.ng');
    }

    public function processMessage(string $message): string
    {
        try {
            $message = trim($message);
            
            if (empty($message)) {
                return $this->getDefaultResponse();
            }

            Log::info('NSUK AI: Processing message - ' . substr($message, 0, 50) . '...');

            // 1. CASUAL CONVERSATION - AI responds freely
            if ($this->isCasualConversation($message)) {
                $response = $this->handleCasualConversation($message);
                Log::info('NSUK AI: Casual conversation handled');
                return $response;
            }

            // 2. NSUK-RELATED QUESTIONS - Check DB first, then AI within scope
            if ($this->isNsukOrCSRelated($message)) {
                // First, try to find in knowledge base
                $knowledge = $this->searchKnowledgeBase($message);
                
                if ($knowledge) {
                    // Found in DB - return DB answer (optionally enhanced)
                    $response = $this->enhanceWithGroq($knowledge->answer, $message);
                    Log::info('NSUK AI: Found in DB, enhanced with AI');
                    return $response;
                } else {
                    // Not in DB - use AI but keep within NSUK scope
                    $response = $this->handleNsukRelatedQuery($message);
                    Log::info('NSUK AI: Not in DB, AI response within NSUK scope');
                    return $response;
                }
            }

            // 3. OFF-TOPIC - Polite redirect back to NSUK
            $response = $this->getOffTopicResponse();
            Log::info('NSUK AI: Off-topic question redirected');
            return $response;
            
        } catch (\Exception $e) {
            Log::error('NSUK AI Error: ' . $e->getMessage());
            return "Oops! 😅 I'm having some technical difficulties. Please try again or contact support at: " . $this->contactNumber;
        }
    }

    private function isCasualConversation(string $message): bool
    {
        $message = strtolower(trim($message));
        
        $casualPatterns = [
            // Greetings
            'hello', 'hi', 'hey', 'hiya', 'good morning', 'good afternoon', 'good evening',
            
            // How are you
            'how are you', 'how do you do', 'how\'s it going', 'what\'s up', 'how you doing',
            
            // About the AI
            'who are you', 'what are you', 'what\'s your name', 'introduce yourself',
            'tell me about yourself', 'what can you do',
            
            // Feelings and reactions
            'i\'m happy', 'i\'m sad', 'i\'m excited', 'i\'m worried', 'i feel',
            
            // Thank you
            'thank you', 'thanks', 'thank u', 'appreciate it',
            
            // Goodbye
            'bye', 'goodbye', 'see you', 'take care',
            
            // Simple responses
            'okay', 'ok', 'cool', 'nice', 'wow', 'great'
        ];

        foreach ($casualPatterns as $pattern) {
            if (strpos($message, $pattern) !== false) {
                return true;
            }
        }

        return false;
    }

    private function handleCasualConversation(string $message): string
    {
        try {
            if (!$this->groqApiKey) {
                return $this->getStaticCasualResponse($message);
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->groqApiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => $this->groqModel,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are Jarvis, the NSUK Assistant AI - a very friendly, warm, and conversational chatbot for Nasarawa State University Keffi. 

Your personality:
- Warm, friendly, and enthusiastic about NSUK
- Use emojis appropriately 
- Be conversational and natural
- Show genuine interest in helping students
- Keep responses under 150 words
- Always mention you\'re here to help with NSUK and Computer Science topics
- Be encouraging and supportive

This is casual conversation, so be friendly and personable while staying true to your NSUK identity.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $message
                    ]
                ],
                'max_tokens' => $this->maxTokens,
                'temperature' => $this->temperature,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['choices'][0]['message']['content'])) {
                    $aiResponse = trim($data['choices'][0]['message']['content']);
                    return $aiResponse . "\n\n✨ *Jarvis - NSUK Assistant*";
                }
            }

            return $this->getStaticCasualResponse($message);

        } catch (\Exception $e) {
            Log::warning('Casual conversation AI failed: ' . $e->getMessage());
            return $this->getStaticCasualResponse($message);
        }
    }

    private function handleNsukRelatedQuery(string $message): string
    {
        try {
            if (!$this->groqApiKey) {
                return $this->getNoAnswerResponse();
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->groqApiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => $this->groqModel,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are Jarvis, the NSUK Assistant AI for Nasarawa State University Keffi. The user is asking about NSUK or Computer Science topics.

IMPORTANT RULES:
- ONLY answer questions about NSUK (Nasarawa State University Keffi) and Computer Science
- If you don\'t have specific information, be helpful but stay within NSUK/CS scope
- Provide contact information when you can\'t give specific details
- Be warm, encouraging, and conversational
- Use emojis appropriately
- Keep responses under 200 words

Contact info to provide:
- Phone: ' . $this->contactNumber . '
- Email: ' . $this->supportEmail . '
- Website: ' . $this->website . '

Remember: Stay focused on NSUK and Computer Science topics only!'
                    ],
                    [
                        'role' => 'user',
                        'content' => "User asked about NSUK/CS: " . $message
                    ]
                ],
                'max_tokens' => $this->maxTokens + 50,
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['choices'][0]['message']['content'])) {
                    $aiResponse = trim($data['choices'][0]['message']['content']);
                    return $aiResponse . "\n\n✨  *Jarvis - NSUK Assistant*";
                }
            }

            return $this->getNoAnswerResponse();

        } catch (\Exception $e) {
            Log::warning('NSUK AI query failed: ' . $e->getMessage());
            return $this->getNoAnswerResponse();
        }
    }

    private function enhanceWithGroq(string $baseAnswer, string $userMessage): string
    {
        try {
            if (!$this->groqApiKey) {
                return $this->formatBaseResponse($baseAnswer);
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->groqApiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => $this->groqModel,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are Jarvis, NSUK Assistant AI. Take the provided NSUK information and make it more conversational, friendly, and engaging while keeping all important details.

Make it:
- Warm and conversational
- Easy to understand
- Encouraging and supportive
- Use appropriate emojis
- Keep under 250 words
- Maintain all factual information'
                    ],
                    [
                        'role' => 'user',
                        'content' => "User asked: {$userMessage}\n\nNSUK Database Info: {$baseAnswer}\n\nPlease make this more conversational and engaging:"
                    ]
                ],
                'max_tokens' => $this->maxTokens + 50,
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['choices'][0]['message']['content'])) {
                    $enhancedResponse = trim($data['choices'][0]['message']['content']);
                    return $enhancedResponse . "\n\n📚 *From NSUK Database + AI Enhancement*";
                }
            }

            return $this->formatBaseResponse($baseAnswer);

        } catch (\Exception $e) {
            Log::warning('AI enhancement failed: ' . $e->getMessage());
            return $this->formatBaseResponse($baseAnswer);
        }
    }

    private function isNsukOrCSRelated(string $message): bool
    {
        $message = strtolower($message);
        
        $nsukKeywords = [
            // University related
            'nsuk', 'nasarawa', 'keffi', 'university', 'admission', 'student', 'school',
            'faculty', 'department', 'course', 'program', 'degree', 'undergraduate', 'postgraduate',
            'semester', 'academic', 'lecture', 'exam', 'result', 'transcript', 'graduation',
            'hostel', 'accommodation', 'library', 'campus', 'registration', 'fees', 'scholarship',
            
            // Computer Science related
            'computer science', 'cs', 'programming', 'software', 'coding', 'development',
            'algorithm', 'database', 'web development', 'artificial intelligence', 'ai',
            'machine learning', 'data structure', 'java', 'python', 'javascript', 'html',
            'css', 'php', 'sql', 'network', 'security', 'cybersecurity', 'mobile app',
            'android', 'ios', 'react', 'angular', 'node', 'framework', 'api', 'backend',
            'frontend', 'fullstack', 'git', 'github', 'linux', 'windows', 'server'
        ];
        
        foreach ($nsukKeywords as $keyword) {
            if (strpos($message, $keyword) !== false) {
                return true;
            }
        }
        
        return false;
    }

    private function searchKnowledgeBase(string $message): ?NsukKnowledge
    {
        $keywords = $this->extractKeywords($message);
        
        if (empty($keywords)) {
            return null;
        }

        return NsukKnowledge::where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('question', 'LIKE', "%{$keyword}%")
                      ->orWhere('keywords', 'LIKE', "%{$keyword}%")
                      ->orWhere('answer', 'LIKE', "%{$keyword}%");
            }
        })->first();
    }

    private function extractKeywords(string $message): array
    {
        $message = strtolower($message);
        
        $stopWords = [
            'what', 'how', 'when', 'where', 'why', 'who', 'which', 'is', 'are', 'was', 'were',
            'the', 'a', 'an', 'and', 'or', 'but', 'in', 'on', 'at', 'to', 'for', 'of', 'with', 'by',
            'can', 'could', 'would', 'should', 'will', 'shall', 'may', 'might', 'must',
            'i', 'you', 'he', 'she', 'it', 'we', 'they', 'me', 'him', 'her', 'us', 'them'
        ];
        
        $words = str_word_count($message, 1);
        $keywords = array_filter($words, function($word) use ($stopWords) {
            return strlen($word) > 2 && !in_array($word, $stopWords);
        });
        
        return array_values($keywords);
    }

    private function getStaticCasualResponse(string $message): string
    {
        $message = strtolower(trim($message));
        
        if (preg_match('/\b(hello|hi|hey|good morning|good afternoon|good evening)\b/', $message)) {
            return "Hello! 👋 I'm Jarvis, your friendly NSUK Assistant AI! I'm here to help you with everything about Nasarawa State University Keffi and Computer Science. How can I make your day better? 😊";
        }
        
        if (preg_match('/\bhow.*you\b/', $message)) {
            return "I'm doing fantastic, thank you for asking! 😊 I'm always excited to help NSUK students succeed. How are you doing? What can I help you with today regarding NSUK or Computer Science? 🎓";
        }
        
        if (preg_match('/\b(thank|thanks)\b/', $message)) {
            return "You're very welcome! 🤗 I'm always happy to help NSUK students like you. Feel free to ask me anything about the university or Computer Science anytime! 💫";
        }
        
        return "Hi there! 😊 I'm Jarvis, your NSUK Assistant AI. I'm here to help you with everything related to Nasarawa State University Keffi and Computer Science. What would you like to know? 🚀";
    }

    private function formatBaseResponse(string $baseAnswer): string
    {
        return $baseAnswer . "\n\n📞 Contact: " . $this->contactNumber . 
               "\n📧 Email: " . $this->supportEmail . 
               "\n🌐 Website: " . $this->website;
    }

    private function getNoAnswerResponse(): string
    {
        return "That's a great NSUK or Computer Science question! 🤔 While I don't have that specific information in my database right now, our support team can definitely help you!\n\n📞 Phone: " . $this->contactNumber . "\n📧 Email: " . $this->supportEmail . "\n🌐 Website: " . $this->website . "\n\nIs there anything else about NSUK or CS that I can help you with? 😊";
    }

    private function getOffTopicResponse(): string
    {
        $responses = [
            "I appreciate your question! 😊 However, I'm specifically designed to help with Nasarawa State University Keffi and Computer Science topics! 🎓\n\nI'd love to chat about:\n• NSUK programs and admissions 🏫\n• Computer Science courses and careers 💻\n• University life and student services 📚\n\nWhat NSUK or CS topic can I help you with today? 🚀",
            
            "That's interesting, but I'm your dedicated NSUK and Computer Science specialist! 💫 I focus exclusively on helping with university and tech-related topics.\n\nLet's explore:\n• NSUK admission requirements 📝\n• Computer Science curriculum 🖥️\n• Programming and development 🔧\n• Campus life and facilities 🏛️\n\nWhat would you like to know about NSUK or CS? 😊"
        ];
        
        return $responses[array_rand($responses)];
    }

    private function getDefaultResponse(): string
    {
        return "🎉 **Welcome to Jarvis - Your NSUK Assistant AI!** 🎉\n\n" .
               "Hello! I'm absolutely thrilled to meet you! 😊✨\n\n" .
               "I'm here to help you with everything related to:\n" .
               "🏫 **Nasarawa State University Keffi (NSUK)**\n" .
               "💻 **Computer Science and Technology**\n\n" .
               "Whether you want to chat casually or need specific information about NSUK programs, admissions, CS courses, or university life - I'm your friendly companion! 🤗\n\n" .
               "What would you like to talk about today? 🚀";
    }

    public function getWelcomeMessage(): string
    {
        return $this->getDefaultResponse();
    }

    public function isConfigured(): bool
    {
        return !empty($this->groqApiKey);
    }
}