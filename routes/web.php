<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

// Redirect root to login if not authenticated, dashboard if authenticated
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Authentication required routes
Route::middleware(['auth'])->group(function () {
    // Dashboard route (GET)
    Route::get('/dashboard', [ChatController::class, 'dashboard'])->name('dashboard');
    
    // Chat routes - now using redirects instead of JSON responses
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::post('/chat/new', [ChatController::class, 'newChat'])->name('chat.new');
    Route::get('/chat/history', [ChatController::class, 'getChatHistory'])->name('chat.history');
    
    // New chat management routes
    Route::get('/chat/{chatId}/load', [ChatController::class, 'loadChat'])->name('chat.load');
    Route::delete('/chat/{chatId}', [ChatController::class, 'deleteChat'])->name('chat.delete');
    
    // Profile routes (if needed)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';