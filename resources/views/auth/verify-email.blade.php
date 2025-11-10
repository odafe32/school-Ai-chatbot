<x-guest-layout>
    <div class="form-container">
        <div class="form-box">
             <!-- Header Section -->
            <div class="header-section">
                <div class="logo-container">
                     <svg class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.66l7.48-4.22a2 2 0 012.22 0l7.48 4.22A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.76 3.82a2 2 0 002.48 0L21 19M12 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h2>{{ __('Verify Your Email') }}</h2>
                <p class="mb-4">
                    {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just sent to you.') }}
                </p>
                <p>{{ __('If you didn\'t receive the email, we will gladly send you another.') }}</p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="status-message">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="actions-container">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-primary-button class="action-button">
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
         <!-- Decorative Elements -->
        <div class="decorative-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </div>
</x-guest-layout>

<style>
    /* General Styles */
    body { font-family: 'Poppins', sans-serif; background-color: #f7fafc; }
    .form-container { display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 2rem; position: relative; overflow: hidden; }
    .form-box { background-color: #ffffff; border-radius: 24px; padding: 2.5rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; width: 100%; max-width: 520px; position: relative; z-index: 1; }

    /* Header */
    .header-section { text-align: center; margin-bottom: 1.5rem; }
    .logo-container { display: inline-flex; justify-content: center; align-items: center; width: 60px; height: 60px; background-color: #f0fdf4; border-radius: 50%; margin-bottom: 1.5rem; }
    .header-section h2 { font-size: 2rem; font-weight: 600; color: #1a202c; margin-bottom: 1rem; }
    .header-section p { color: #718096; max-width: 400px; margin: 0 auto; line-height: 1.6; }
    .mb-4 { margin-bottom: 1rem; }

    /* Status Message */
    .status-message { margin-bottom: 1.5rem; font-weight: 500; font-size: 0.875rem; color: #166534; background-color: #dcfce7; padding: 1rem; border-radius: 8px; text-align: center; }

    /* Actions */
    .actions-container { margin-top: 2rem; display: flex; flex-direction: column; align-items: center; gap: 1rem; }
    .action-button { display: flex; justify-content: center; align-items: center; width: 100%; padding: 1rem; background: linear-gradient(to right, #22c55e, #16a34a); color: #ffffff; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s ease-in-out; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    .action-button:hover { transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(22, 163, 74, 0.2); }
    .logout-button { background: none; border: none; text-decoration: underline; font-size: 0.875rem; color: #718096; cursor: pointer; transition: color 0.2s; }
    .logout-button:hover { color: #1a202c; }

    /* Decorative Shapes */
    .decorative-shapes { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0; }
    .decorative-shapes .shape { position: absolute; border-radius: 50%; filter: blur(120px); opacity: 0.15; }
    .shape-1 { width: 350px; height: 350px; background-color: #4ade80; top: -100px; right: -100px; animation: pulse 7s infinite alternate; }
    .shape-2 { width: 300px; height: 300px; background-color: #86efac; bottom: -100px; left: -100px; animation: pulse 7s infinite alternate-reverse; }
    @keyframes pulse { from { transform: scale(0.9); } to { transform: scale(1.1); } }
</style>```