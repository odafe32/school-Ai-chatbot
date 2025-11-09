<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // Chatbase AI Configuration (Primary AI System)
    'chatbase' => [
        'api_key' => env('CHATBASE_API_KEY'),
        'chatbot_id' => env('CHATBASE_CHATBOT_ID'),
    ],

    // Groq AI Configuration (Legacy - kept for backward compatibility)
    'groq' => [
        'api_key' => env('GROQ_API_KEY'),
        'model' => env('GROQ_MODEL', 'llama3-8b-8192'),
        'max_tokens' => env('GROQ_MAX_TOKENS', 1000),
        'temperature' => env('GROQ_TEMPERATURE', 0.7),
    ],

    // NSUK Configuration
    'nsuk' => [
        'contact_number' => env('NSUK_CONTACT_NUMBER', '+234-XXX-XXX-XXXX'),
        'support_email' => env('NSUK_SUPPORT_EMAIL', 'support@nsuk.edu.ng'),
        'website' => env('NSUK_WEBSITE', 'https://nsuk.edu.ng'),
    ],

    // SERP API Configuration (for online search)
    'serp' => [
        'api_key' => env('SERP_API_KEY'),
    ],

];
