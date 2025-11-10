<x-guest-layout>
    <div class="form-container">
        <div class="form-box">
            <!-- Header Section -->
            <div class="header-section">
                <div class="logo-container">
                    <svg class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2>{{ __('Confirm Password') }}</h2>
                <p>{{ __('This is a secure area. Please confirm your password to continue.') }}</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="input-group">
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="input-field">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <x-text-input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="submit-button-container">
                    <x-primary-button class="action-button">
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>
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
    .form-box { background-color: #ffffff; border-radius: 24px; padding: 2.5rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; width: 100%; max-width: 480px; position: relative; z-index: 1; }

    /* Header */
    .header-section { text-align: center; margin-bottom: 2rem; }
    .logo-container { display: inline-flex; justify-content: center; align-items: center; width: 60px; height: 60px; background-color: #f3f4f6; border-radius: 50%; margin-bottom: 1.5rem; }
    .header-section h2 { font-size: 2rem; font-weight: 600; color: #1a202c; margin-bottom: 0.5rem; }
    .header-section p { color: #718096; max-width: 320px; margin: 0 auto; }

    /* Inputs */
    .input-group { margin-bottom: 1.5rem; }
    .input-group label { display: block; font-weight: 600; color: #4a5568; margin-bottom: 0.5rem; font-size: 0.875rem; }
    .input-field { position: relative; }
    .input-field svg { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; color: #a0aec0; transition: color 0.2s; pointer-events: none; }
    .input-field input { width: 100%; padding: 0.9rem 1rem 0.9rem 2.75rem; border: 1px solid #cbd5e0; border-radius: 8px; background-color: #f7fafc; color: #2d3748; font-size: 1rem; transition: all 0.2s; }
    .input-field input:focus { outline: none; border-color: #6366f1; background-color: #ffffff; box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2); }
    .input-field:focus-within svg { color: #6366f1; }

    /* Button */
    .submit-button-container { padding-top: 1rem; }
    .action-button { display: flex; justify-content: center; align-items: center; width: 100%; padding: 1rem; background: linear-gradient(to right, #6366f1, #4f46e5); color: #ffffff; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s ease-in-out; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    .action-button:hover { transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.2); }

    /* Decorative Shapes */
    .decorative-shapes { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0; }
    .decorative-shapes .shape { position: absolute; border-radius: 50%; filter: blur(120px); opacity: 0.15; }
    .shape-1 { width: 350px; height: 350px; background-color: #818cf8; top: -100px; right: -100px; animation: pulse 7s infinite alternate; }
    .shape-2 { width: 300px; height: 300px; background-color: #a5b4fc; bottom: -100px; left: -100px; animation: pulse 7s infinite alternate-reverse; }
    @keyframes pulse { from { transform: scale(0.9); } to { transform: scale(1.1); } }
</style>