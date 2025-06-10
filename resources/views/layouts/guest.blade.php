<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'NSUK Assistant' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Custom scrolling styles -->
        <style>
            /* Ensure smooth scrolling */
            html {
                scroll-behavior: smooth;
            }
            
            /* Custom scrollbar styling */
            body::-webkit-scrollbar {
                width: 8px;
            }
            
            body::-webkit-scrollbar-track {
                background: #f1f5f9;
            }
            
            body::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 4px;
            }
            
            body::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen">
        @component('components.network')
            
        @endcomponent
        
        <div class="w-full bg-white min-h-screen flex flex-col items-center">
            <div class="w-full bg-white">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
