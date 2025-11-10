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

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite([ 'resources/js/app.js'])

        <style>
            :root {
                color-scheme: light;
                --brand-emerald: #10b981;
                --brand-emerald-dark: #059669;
                --brand-emerald-deep: #047857;
                --text-primary: #1f2937;
                --text-muted: #4b5563;
                --border-color: #d1d5db;
                --surface: #ffffff;
                --surface-soft: #f8fafc;
            }


            body.app-body {
                min-height: 100vh;
                background-color: #f1f5f9;
                font-family: 'Figtree', sans-serif;
                color: var(--text-primary);
                -webkit-font-smoothing: antialiased;
            }

            .app-shell {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .connection-indicator {
                position: fixed;
                top: 16px;
                right: 16px;
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 8px 14px;
                border-radius: 999px;
                background: linear-gradient(135deg, var(--brand-emerald), var(--brand-emerald-dark));
                color: #ffffff;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: 0.6px;
                box-shadow: 0 10px 30px rgba(16, 185, 129, 0.28);
                z-index: 60;
                transform: translateX(120%);
                animation: slideIn 0.35s ease forwards;
            }

            .connection-indicator .connection-dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.85);
                position: relative;
            }

            .connection-indicator .connection-dot::after {
                content: '';
                position: absolute;
                inset: -5px;
                border-radius: 50%;
                border: 2px solid rgba(255, 255, 255, 0.75);
                opacity: 0.4;
                animation: pulse 1.6s ease-in-out infinite;
            }

            .connection-indicator.online {
                background: linear-gradient(135deg, var(--brand-emerald), var(--brand-emerald-dark));
                box-shadow: 0 10px 30px rgba(16, 185, 129, 0.28);
            }

            .connection-indicator.offline {
                background: linear-gradient(135deg, #f97316, #ef4444);
                box-shadow: 0 10px 30px rgba(239, 68, 68, 0.25);
            }

            .connection-indicator.checking {
                background: linear-gradient(135deg, #f59e0b, #d97706);
                box-shadow: 0 10px 30px rgba(245, 158, 11, 0.25);
            }

            @keyframes pulse {
                0%, 100% { transform: scale(0.9); opacity: 0.28; }
                50% { transform: scale(1.1); opacity: 0.12; }
            }

            @keyframes slideIn {
                to { transform: translateX(0); }
            }

            .app-header {
                position: sticky;
                top: 0;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(8px);
                border-bottom: 1px solid var(--border-color);
                box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
                z-index: 50;
            }

            .header-inner {
                max-width: 1180px;
                margin: 0 auto;
                padding: 10px 24px;
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .header-top {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 16px;
            }

            .header-brand {
                display: flex;
                align-items: center;
                gap: 16px;
            }

            .brand-badge {
                width: 44px;
                height: 44px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, var(--brand-emerald), var(--brand-emerald-deep));
                color: #ffffff;
                font-weight: 600;
                font-size: 17px;
            }

            .brand-copy {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .brand-label {
                font-size: 11px;
                text-transform: uppercase;
                letter-spacing: 0.35em;
                color: var(--brand-emerald-deep);
                font-weight: 600;
            }

            .brand-title {
                font-size: 20px;
                font-weight: 600;
                color: var(--text-primary);
            }

            .user-zone {
                display: flex;
                align-items: center;
                gap: 16px;
            }

            .user-meta {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                gap: 4px;
            }

            .user-meta-label {
                font-size: 11px;
                text-transform: uppercase;
                letter-spacing: 0.12em;
                font-weight: 600;
                color: var(--brand-emerald-deep);
            }

            .user-meta-name {
                font-size: 14px;
                font-weight: 600;
                color: var(--text-primary);
            }

            .logout-button {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 10px 16px;
                border-radius: 10px;
                border: none;
                background: linear-gradient(135deg, #ef4444, #dc2626);
                color: #ffffff;
                font-size: 14px;
                font-weight: 600;
                cursor: pointer;
                box-shadow: 0 8px 18px rgba(220, 38, 38, 0.28);
                transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
            }

            .logout-button:hover {
                transform: translateY(-1px);
                filter: brightness(1.05);
                box-shadow: 0 10px 22px rgba(220, 38, 38, 0.32);
            }

            .logout-button i {
                font-size: 13px;
            }

            .header-slot {
                font-size: 14px;
                line-height: 1.6;
                color: var(--text-muted);
            }

            .app-main {
                flex: 1;
                overflow-y: auto;
            }

            .app-content {
                max-width: 1180px;
                margin: 0 auto;
                padding: 32px 24px 40px;
            }

            @media (max-width: 768px) {
                .connection-indicator {
                    top: auto;
                    bottom: 16px;
                    transform: translateX(0);
                    right: 12px;
                }

                .header-inner {
                    padding: 18px 20px;
                }

                .header-top {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .user-zone {
                    width: 100%;
                    justify-content: space-between;
                }

                .user-meta {
                    align-items: flex-start;
                }

                .app-content {
                    padding: 28px 20px 36px;
                }
            }
        </style>
    </head>
    <body class="app-body">
        <!-- Internet Connection Indicator -->


        <div class="app-shell">
            <!-- Page Heading -->
            <header class="app-header">
                <div class="header-inner">
                    <div class="header-top">
                        <div class="header-brand">
                            <div class="brand-badge">NS</div>
                            <div class="brand-copy">
                                <span class="brand-label">NSUK Assistant</span>
                                <span class="brand-title">Dashboard</span>
                            </div>
                        </div>
                        @auth
                            <div class="user-zone">
                                <div class="user-meta">
                                    <span class="user-meta-label">Signed in</span>
                                    <span class="user-meta-name">{{ Auth::user()->name }}</span>
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="logout-button">
                                        <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>

                    @isset($header)
                        <div class="header-slot">
                            {{ $header }}
                        </div>
                    @endisset
                </div>
            </header>

            <!-- Page Content -->
            <main class="app-main">
                <div class="app-content">
                    {{ $slot }}
                </div>
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
                        this.indicator.setAttribute('aria-label', 'Connection status: Online');
                    } else {
                        this.indicator.classList.add('offline');
                        this.text.textContent = 'Offline';
                        this.indicator.setAttribute('aria-label', 'Connection status: Offline');
                    }
                }

                async checkConnection() {
                    try {
                        // Show checking status
                        this.indicator.className = 'connection-indicator checking';
                        this.text.textContent = 'Checking...';
                        this.indicator.setAttribute('aria-label', 'Connection status: Checking');

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
