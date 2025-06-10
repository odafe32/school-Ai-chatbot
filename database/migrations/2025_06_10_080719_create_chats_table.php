<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create chats table
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->timestamp('last_message_at')->nullable();
            $table->timestamps();
            
            $table->index(['user_id', 'last_message_at']);
        });

        // Create chat_messages table
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->enum('sender', ['user', 'assistant']);
            $table->timestamps();
            
            $table->index(['chat_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
        Schema::dropIfExists('chats');
    }
};