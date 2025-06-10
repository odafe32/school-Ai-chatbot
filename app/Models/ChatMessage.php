<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'content',
        'sender'
    ];

    /**
     * Get the chat that owns this message
     */
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    /**
     * Check if message is from user
     */
    public function isFromUser(): bool
    {
        return $this->sender === 'user';
    }

    /**
     * Check if message is from assistant
     */
    public function isFromAssistant(): bool
    {
        return $this->sender === 'assistant';
    }

    /**
     * Get formatted timestamp
     */
    public function getFormattedTimeAttribute(): string
    {
        return $this->created_at->format('H:i');
    }
}