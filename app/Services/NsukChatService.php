<?php

namespace App\Services;

use App\Models\NsukKnowledge;
use App\Services\ChatbaseService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NsukChatService
{
    private $contactNumber;
    private $supportEmail;
    private $website;
    private $chatbaseService;
    private $conversationId;

    public function __construct(ChatbaseService $chatbaseService)
    {
        $this->chatbaseService = $chatbaseService;
        $this->conversationId = null;
        
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

            // STEP 2: Search using Chatbase AI
            $chatbaseAnswer = $this->searchWithChatbase($message);
            if ($chatbaseAnswer) {
                Log::info('AI: Answer found via Chatbase');
                return $this->formatResponse($chatbaseAnswer);
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
                Log::info('Database search: No keywords found in message');
                return null;
            }

            Log::info('Database search: Keywords found - ' . implode(', ', $keywords));

            // Try exact question match first
            $knowledge = NsukKnowledge::where('is_active', true)
                ->where('question', 'LIKE', "%{$message}%")
                ->first();

            if ($knowledge) {
                Log::info('Database search: Exact question match found');
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

            Log::info('Database search: Found ' . count($results) . ' potential matches');

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
                if ($lengthDiff < 8) {
                    $score += 3;
                }

                // Count matching keywords
                $matchedKeywords = 0;
                foreach ($keywords as $keyword) {
                    $keywordLower = strtolower($keyword);
                    // Higher score for question matches
                    if (strpos($questionLower, $keywordLower) !== false) {
                        $score += 4;
                        $matchedKeywords++;
                    }
                    // Lower score for keyword matches
                    if (strpos($keywordsLower, $keywordLower) !== false) {
                        $score += 1;
                        $matchedKeywords++;
                    }
                }

                // Require at least 60% of keywords to match
                $matchRatio = count($keywords) > 0 ? $matchedKeywords / count($keywords) : 0;
                if ($matchRatio < 0.6) {
                    $score = 0; // Disqualify poor matches
                }

                // Additional check: if the result doesn't contain at least 2 of the main keywords, disqualify
                $mainKeywords = array_filter($keywords, function($word) {
                    return strlen($word) > 3; // Only consider keywords longer than 3 characters
                });

                if (count($mainKeywords) >= 2) {
                    $mainMatches = 0;
                    foreach ($mainKeywords as $mainKeyword) {
                        $mainKeywordLower = strtolower($mainKeyword);
                        if (strpos($questionLower, $mainKeywordLower) !== false || strpos($keywordsLower, $mainKeywordLower) !== false) {
                            $mainMatches++;
                        }
                    }
                    if ($mainMatches < 2) {
                        $score = 0; // Disqualify if less than 2 main keywords match
                    }
                }

                Log::info('Database search: Question "' . $result->question . '" scored ' . $score . ' points');

                if ($score > $highestScore) {
                    $highestScore = $score;
                    $bestMatch = $result;
                }
            }

            // Only return if we have a good match (at least 4 points)
            if ($bestMatch && $highestScore >= 4) {
                Log::info('Database search: Best match found with ' . $highestScore . ' points');
                return $bestMatch->answer;
            }

            Log::info('Database search: No good match found (highest score: ' . $highestScore . ')');
            return null;

        } catch (\Exception $e) {
            Log::error('Database search error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Search using Chatbase AI
     */
    private function searchWithChatbase(string $message): ?string
    {
        try {
            if (!$this->chatbaseService->isConfigured()) {
                Log::warning('Chatbase search: API not configured');
                return null;
            }

            Log::info('Chatbase search: Starting search for message');

            // Send message to Chatbase with conversation context
            $result = $this->chatbaseService->sendMessage($message, $this->conversationId);

            if ($result && isset($result['answer'])) {
                // Store conversation ID for context in future messages
                if (isset($result['conversationId'])) {
                    $this->conversationId = $result['conversationId'];
                }
                
                Log::info('Chatbase search: Successfully found answer');
                return $result['answer'];
            }

            Log::warning('Chatbase search: No answer received');
            return null;

        } catch (\Exception $e) {
            Log::error('Chatbase search error: ' . $e->getMessage());
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
        return $this->chatbaseService->isConfigured();
    }

    /**
     * Set conversation ID for maintaining context
     */
    public function setConversationId(?string $conversationId): void
    {
        $this->conversationId = $conversationId;
    }

    /**
     * Get current conversation ID
     */
    public function getConversationId(): ?string
    {
        return $this->conversationId;
    }
}