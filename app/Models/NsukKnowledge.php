<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsukKnowledge extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'category',
        'keywords',
        'is_active'
    ];

    protected $casts = [
        'keywords' => 'array',
        'is_active' => 'boolean'
    ];

    /**
     * Search for relevant answers based on user query
     */
    public static function searchAnswer($query)
    {
        $query = strtolower(trim($query));
        
        // Direct question match
        $directMatch = self::where('is_active', true)
            ->whereRaw('LOWER(question) LIKE ?', ["%{$query}%"])
            ->first();
            
        if ($directMatch) {
            return $directMatch;
        }

        // Keyword search
        $keywordMatch = self::where('is_active', true)
            ->where(function ($q) use ($query) {
                $words = explode(' ', $query);
                foreach ($words as $word) {
                    if (strlen($word) > 2) { // Skip short words
                        $q->orWhereRaw('LOWER(question) LIKE ?', ["%{$word}%"])
                          ->orWhereRaw('JSON_SEARCH(LOWER(keywords), "one", ?) IS NOT NULL', ["%{$word}%"]);
                    }
                }
            })
            ->first();

        return $keywordMatch;
    }

    /**
     * Check if query is NSUK or Computer Science related
     */
    public static function isNsukRelated($query)
    {
        $nsukKeywords = [
            'nsuk', 'nasarawa state university', 'keffi', 'computer science',
            'programming', 'software', 'coding', 'algorithm', 'database',
            'web development', 'mobile app', 'artificial intelligence',
            'machine learning', 'data structure', 'networking', 'cybersecurity'
        ];

        $query = strtolower($query);
        
        foreach ($nsukKeywords as $keyword) {
            if (strpos($query, $keyword) !== false) {
                return true;
            }
        }
        
        return false;
    }
}