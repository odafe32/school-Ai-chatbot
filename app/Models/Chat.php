<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'last_message_at'
    ];

    protected $casts = [
        'last_message_at' => 'datetime'
    ];

    /**
     * Get the user that owns the chat
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all messages for this chat
     */
    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class)->orderBy('created_at');
    }

    /**
     * Get the latest message for this chat
     */
    public function latestMessage()
    {
        return $this->hasOne(ChatMessage::class)->latestOfMany();
    }

    /**
     * Generate a title for the chat based on the first user message
     */
    public function generateTitle()
    {
        $firstUserMessage = $this->messages()
            ->where('sender', 'user')
            ->first();

        if ($firstUserMessage) {
            // Take first 50 characters of the message as title
            $title = substr($firstUserMessage->content, 0, 50);
            if (strlen($firstUserMessage->content) > 50) {
                $title .= '...';
            }
            
            $this->update(['title' => $title]);
        }
    }

    /**
     * Update the last message timestamp
     */
    public function updateLastMessageTime()
    {
        $this->update(['last_message_at' => now()]);
    }

    /**
     * Scope to get chats for a specific user ordered by latest activity
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId)
                    ->orderBy('last_message_at', 'desc');
    }
}