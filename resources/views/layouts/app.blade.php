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
        
        <style>
       
            
            .connection-indicator.online {
                background-color: #10b981;
                color: white;
            }
            
            .connection-indicator.offline {
                background-color: #ef4444;
                color: white;
            }
            
            .connection-indicator.checking {
                background-color: #f59e0b;
                color: white;
            }
          
            
            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.5; }
            }
            
            .connection-indicator.online .connection-dot {
                animation: none;
            }
            
            .slide-in {
                transform: translateX(100%);
                animation: slideIn 0.3s ease forwards;
            }
            
            @keyframes slideIn {
                to { transform: translateX(0); }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Internet Connection Indicator -->
        <div id="connectionIndicator" class="connection-indicator online slide-in">
           
        </div>
     
        <div class="min-h-screen">
            <!-- Page Heading -->
            @isset($header)
                <header class="">
                    <div class="w-full ">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            class ConnectionDetector {
                constructor() {
                    this.indicator = document.getElementById('connectionIndicator');
                    this.text = document.getElementById('connectionText');
                    this.isOnline = navigator.onLine;
                    this.checkInterval = null;
                    
                    this.init();
                }
                
                init() {
                    this.updateStatus(this.isOnline);
                    this.setupEventListeners();
                    this.startPeriodicCheck();
                }
                
                setupEventListeners() {
                    window.addEventListener('online', () => {
                        this.isOnline = true;
                        this.updateStatus(true);
                    });
                    
                    window.addEventListener('offline', () => {
                        this.isOnline = false;
                        this.updateStatus(false);
                    });
                }
                
                updateStatus(online) {
                    this.indicator.className = 'connection-indicator';
                    
                    if (online) {
                        this.indicator.classList.add('online');
                        this.text.textContent = 'Online';
                    } else {
                        this.indicator.classList.add('offline');
                        this.text.textContent = 'Offline';
                    }
                }
                
                async checkConnection() {
                    try {
                        // Show checking status
                        this.indicator.className = 'connection-indicator checking';
                        this.text.textContent = 'Checking...';
                        
                        // Try to fetch a small resource
                        const response = await fetch('/favicon.ico', {
                            method: 'HEAD',
                            cache: 'no-cache',
                            timeout: 5000
                        });
                        
                        const online = response.ok;
                        this.isOnline = online;
                        this.updateStatus(online);
                        
                    } catch (error) {
                        this.isOnline = false;
                        this.updateStatus(false);
                    }
                }
                
                startPeriodicCheck() {
                    // Check connection every 30 seconds
                    this.checkInterval = setInterval(() => {
                        if (!this.isOnline) {
                            this.checkConnection();
                        }
                    }, 30000);
                }
                
                destroy() {
                    if (this.checkInterval) {
                        clearInterval(this.checkInterval);
                    }
                    window.removeEventListener('online', this.updateStatus);
                    window.removeEventListener('offline', this.updateStatus);
                }
            }
            
            // Initialize connection detector when DOM is loaded
            document.addEventListener('DOMContentLoaded', () => {
                new ConnectionDetector();
            });
            
            // Optional: Add toast notifications for connection changes
            let lastConnectionState = navigator.onLine;
            
            window.addEventListener('online', () => {
                if (!lastConnectionState) {
                    showConnectionToast('Connection restored!', 'success');
                }
                lastConnectionState = true;
            });
            
            window.addEventListener('offline', () => {
                if (lastConnectionState) {
                    showConnectionToast('Connection lost. Working offline.', 'warning');
                }
                lastConnectionState = false;
            });
            
            function showConnectionToast(message, type) {
                // Create toast element
                const toast = document.createElement('div');
                toast.className = `fixed bottom-4 right-4 z-50 p-4 rounded-lg shadow-lg text-white transform translate-x-full transition-transform duration-300 ${
                    type === 'success' ? 'bg-green-500' : 'bg-yellow-500'
                }`;
                toast.textContent = message;
                
                document.body.appendChild(toast);
                
                // Slide in
                setTimeout(() => {
                    toast.style.transform = 'translateX(0)';
                }, 100);
                
                // Remove after 3 seconds
                setTimeout(() => {
                    toast.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        document.body.removeChild(toast);
                    }, 300);
                }, 3000);
            }
        </script>
    </body>
</html>