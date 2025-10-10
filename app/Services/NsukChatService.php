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
    private $serpApiKey;

    public function __construct()
    {
        $this->groqApiKey = config('services.groq.api_key');
        $this->groqModel = config('services.groq.model', 'llama3-8b-8192');
        $this->maxTokens = (int) config('services.groq.max_tokens', 1000);
        $this->temperature = (float) config('services.groq.temperature', 0.7);
        $this->serpApiKey = config('services.serp.api_key');
        
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

            Log::info('AI: Processing message - ' . substr($message, 0, 50) . '...');

            // Handle simple greetings
            if ($this->isSimpleGreeting($message)) {
                Log::info('AI: Simple greeting detected');
                return $this->getGreetingResponse();
            }

            // STEP 1: Search database for answer
            $dbAnswer = $this->searchDatabase($message);
            if ($dbAnswer) {
                Log::info('AI: Answer found in database');
                return $this->formatResponse($dbAnswer);
            }

            // STEP 2: Search online for answer
            $onlineAnswer = $this->searchOnline($message);
            if ($onlineAnswer) {
                Log::info('AI: Answer found online');
                return $this->formatResponse($onlineAnswer);
            }

            // STEP 3: Fallback message
            Log::info('AI: No answer found, returning fallback');
            return $this->getFallbackResponse();
            
        } catch (\Exception $e) {
            Log::error('AI Error: ' . $e->getMessage());
            return $this->getFallbackResponse();
        }
    }

    /**
     * Search database for answer
     */
    private function searchDatabase(string $message): ?string
    {
        try {
            $keywords = $this->extractKeywords($message);
            
            if (empty($keywords)) {
                return null;
            }

            // Try exact question match first
            $knowledge = NsukKnowledge::where('is_active', true)
                ->where('question', 'LIKE', "%{$message}%")
                ->first();
            
            if ($knowledge) {
                return $knowledge->answer;
            }

            // Then try keyword matches with scoring
            $results = NsukKnowledge::where('is_active', true)
                ->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('question', 'LIKE', "%{$keyword}%")
                              ->orWhere('keywords', 'LIKE', "%{$keyword}%");
                    }
                })
                ->get();

            // Score results based on keyword matches
            $bestMatch = null;
            $highestScore = 0;
            $messageLower = strtolower($message);

            foreach ($results as $result) {
                $score = 0;
                $questionLower = strtolower($result->question);
                $keywordsLower = strtolower($result->keywords);

                // Bonus points for similar question length (prevents partial matches)
                $lengthDiff = abs(strlen($messageLower) - strlen($questionLower));
                if ($lengthDiff < 10) {
                    $score += 2;
                }

                // Count matching keywords
                $matchedKeywords = 0;
                foreach ($keywords as $keyword) {
                    $keywordLower = strtolower($keyword);
                    // Higher score for question matches
                    if (strpos($questionLower, $keywordLower) !== false) {
                        $score += 3;
                        $matchedKeywords++;
                    }
                    // Lower score for keyword matches
                    if (strpos($keywordsLower, $keywordLower) !== false) {
                        $score += 1;
                        $matchedKeywords++;
                    }
                }

                // Require at least 50% of keywords to match
                $matchRatio = count($keywords) > 0 ? $matchedKeywords / count($keywords) : 0;
                if ($matchRatio < 0.5) {
                    $score = 0; // Disqualify poor matches
                }

                if ($score > $highestScore) {
                    $highestScore = $score;
                    $bestMatch = $result;
                }
            }

            // Only return if we have a good match (at least 3 points)
            return ($bestMatch && $highestScore >= 3) ? $bestMatch->answer : null;
            
        } catch (\Exception $e) {
            Log::error('Database search error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Search online using AI
     */
    private function searchOnline(string $message): ?string
    {
        try {
            if (!$this->groqApiKey) {
                Log::warning('Groq API key not configured');
                return null;
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->groqApiKey,
                'Content-Type' => 'application/json',
            ])->timeout(60)->retry(3, 1000)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => $this->groqModel,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful AI assistant. Answer questions accurately and concisely. If the question is about NSUK (Nasarawa State University Keffi), provide relevant information when available.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $message
                    ]
                ],
                'max_tokens' => (int) $this->maxTokens,
                'temperature' => (float) $this->temperature,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['choices'][0]['message']['content'])) {
                    return trim($data['choices'][0]['message']['content']);
                }
            }

            // Log detailed error information
            Log::warning('Online search failed: ' . $response->status());
            Log::warning('Error response: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('Online search error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Format response for output
     */
    private function formatResponse(string $answer): string
    {
        return $answer;
    }

    /**
     * Get fallback response when no answer is found
     */
    private function getFallbackResponse(): string
    {
        return "I apologize, but I don't have specific information about that at the moment. " .
               "This information is currently not available.\n\n" .
               "📞 Phone: " . $this->contactNumber . "\n" .
               "📧 Email: " . $this->supportEmail . "\n" .
               "🌐 Website: " . $this->website;
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

    private function isSimpleGreeting(string $message): bool
    {
        $message = strtolower(trim($message));
        $greetings = ['hi', 'hello', 'hey', 'good morning', 'good afternoon', 'good evening', 'greetings'];
        
        return in_array($message, $greetings);
    }

    private function getGreetingResponse(): string
    {
        return "Hello! 👋 Welcome to NSUK AI Assistant.\n\n" .
               "I'm here to help answer your questions about Nasarawa State University, Keffi. " .
               "I can provide information about courses, events, admissions, and more!\n\n" .
               "What would you like to know?";
    }

    private function getDefaultResponse(): string
    {
        return "Hello! 👋 Welcome to NSUK AI Assistant.\n\n" .
               "I'm here to help answer your questions. I'll search my database first, " .
               "then look online if needed to provide you with accurate information.\n\n" .
               "What would you like to know?";
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