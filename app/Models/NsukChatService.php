<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NsukChatService
{
    private $contactNumber = '+234-XXX-XXX-XXXX'; // Update with actual NSUK contact
    private $groqApiKey;

    // Sample NSUK knowledge base (you can move this to database later)
    private $knowledgeBase = [
        'admission' => [
            'keywords' => ['admission', 'apply', 'application', 'requirements', 'entry'],
            'answer' => 'NSUK admission requirements include: O\'Level with 5 credits including English and Mathematics, JAMB UTME score, and Post-UTME screening. Applications are usually open from May to August each year.'
        ],
        'computer_science' => [
            'keywords' => ['computer science', 'cs', 'programming', 'software', 'coding'],
            'answer' => 'The Computer Science program at NSUK offers comprehensive training in programming, software development, database systems, artificial intelligence, and cybersecurity. Duration is 4 years leading to B.Sc Computer Science.'
        ],
        'fees' => [
            'keywords' => ['fees', 'tuition', 'cost', 'payment', 'school fees'],
            'answer' => 'NSUK school fees vary by program. Computer Science students typically pay around ₦150,000-₦200,000 per session including tuition, accommodation, and other charges. Payment can be made in installments.'
        ],
        'location' => [
            'keywords' => ['location', 'address', 'where', 'keffi', 'nasarawa'],
            'answer' => 'Nasarawa State University Keffi (NSUK) is located in Keffi, Nasarawa State, Nigeria. The main campus is situated along Keffi-Akwanga Road, about 60km from Abuja.'
        ],
        'courses' => [
            'keywords' => ['courses', 'programs', 'departments', 'faculties'],
            'answer' => 'NSUK offers various undergraduate and postgraduate programs across multiple faculties including Sciences, Arts, Social Sciences, Education, and Engineering. Popular courses include Computer Science, Medicine, Law, and Business Administration.'
        ]
    ];

    public function __construct()
    {
        $this->groqApiKey = config('services.groq.api_key');
    }

    public function processMessage(string $message): string
    {
        try {
            // First, search our knowledge base
            $knowledge = $this->searchKnowledgeBase($message);
            
            if ($knowledge) {
                // Enhance the response using Groq AI if available
                return $this->enhanceWithGroq($knowledge, $message);
            }
            
            // Check if question is NSUK/CS related
            if ($this->isNsukOrCSRelated($message)) {
                return $this->getNoAnswerResponse();
            }
            
            // Not NSUK related
            return $this->getOutOfScopeResponse();
            
        } catch (\Exception $e) {
            Log::error('Chat service error: ' . $e->getMessage());
            return "I'm having trouble right now. Please contact: " . $this->contactNumber;
        }
    }

    private function searchKnowledgeBase(string $message): ?array
    {
        $message = strtolower($message);
        
        foreach ($this->knowledgeBase as $topic => $data) {
            foreach ($data['keywords'] as $keyword) {
                if (strpos($message, $keyword) !== false) {
                    return $data;
                }
            }
        }
        
        return null;
    }

    private function enhanceWithGroq(array $knowledge, string $userMessage): string
    {
        try {
            if (!$this->groqApiKey) {
                return $this->formatBaseResponse($knowledge['answer']);
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->groqApiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama3-8b-8192',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are NSUK Assistant AI. Make responses conversational and helpful. Keep responses under 200 words. Focus only on NSUK and Computer Science topics.'
                    ],
                    [
                        'role' => 'user',
                        'content' => "User asked: {$userMessage}\n\nNSUK Information: {$knowledge['answer']}\n\nPlease provide a helpful, conversational response:"
                    ]
                ],
                'max_tokens' => 200,
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['choices'][0]['message']['content'])) {
                    $enhancedResponse = trim($data['choices'][0]['message']['content']);
                    
                    if ($this->isResponseAppropriate($enhancedResponse)) {
                        return $enhancedResponse;
                    }
                }
            }

            return $this->formatBaseResponse($knowledge['answer']);

        } catch (\Exception $e) {
            Log::warning('Groq AI enhancement failed: ' . $e->getMessage());
            return $this->formatBaseResponse($knowledge['answer']);
        }
    }

    private function isNsukOrCSRelated(string $message): bool
    {
        $message = strtolower($message);
        
        $nsukKeywords = [
            'nsuk', 'nasarawa', 'keffi', 'university', 'student',
            'computer science', 'cs', 'programming', 'software', 'coding',
            'algorithm', 'database', 'web development', 'artificial intelligence'
        ];
        
        foreach ($nsukKeywords as $keyword) {
            if (strpos($message, $keyword) !== false) {
                return true;
            }
        }
        
        return false;
    }

    private function isResponseAppropriate(string $response): bool
    {
        $response = strtolower($response);
        
        $inappropriate = ['sorry, i cannot', 'i cannot help', 'outside my scope'];
        foreach ($inappropriate as $phrase) {
            if (strpos($response, $phrase) !== false) {
                return false;
            }
        }
        
        return true;
    }

    private function formatBaseResponse(string $baseAnswer): string
    {
        return $baseAnswer . "\n\nFor more information, contact: " . $this->contactNumber;
    }

    private function getNoAnswerResponse(): string
    {
        return "I don't have specific information about that NSUK or Computer Science topic right now. " .
               "For detailed assistance, please contact our support team at: " . $this->contactNumber;
    }

    private function getOutOfScopeResponse(): string
    {
        return "I'm specifically designed to help with questions about Nasarawa State University Keffi (NSUK) and Computer Science topics. " .
               "Please ask me about NSUK admissions, programs, Computer Science courses, or related academic topics!";
    }

    public function getWelcomeMessage(): string
    {
        return "Hello! 👋 I'm your NSUK Assistant AI. I'm here to help you with:\n\n" .
               "🎓 NSUK admission information\n" .
               "📚 Computer Science program details\n" .
               "💻 Programming and tech questions\n" .
               "🏫 University facilities and services\n\n" .
               "What would you like to know about NSUK today?";
    }
}