<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nsuk_knowledge', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->longText('answer');
            $table->string('category')->default('general');
            $table->json('keywords')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['category', 'is_active']);
            $table->fullText(['question', 'answer']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('nsuk_knowledge');
    }
};