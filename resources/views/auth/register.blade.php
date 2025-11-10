<x-guest-layout>
<style>
    /* General Body Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f7fafc; /* Fallback */
    background: linear-gradient(to br, #f0f5ff, #ffffff, #ecfeff);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow-y: auto; /* Allow scrolling on smaller screens */
    padding: 1rem 0;
}

/* Main Container for the Form (using the same class as login) */
.login-container {
    position: relative;
    width: 100%;
    max-width: 520px; /* Wider container */
    padding: 2rem;
}

/* The white box holding the form */
.login-box {
    background-color: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
    border: 1px solid #e2e8f0;
    position: relative;
    z-index: 1;
}

/* Header: Logo, Title, Subtitle */
.header-section {
    text-align: center;
    margin-bottom: 2rem;
}

.logo-container {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 60px;
    height: 60px;
    background-color: #eef2ff; /* Indigo light */
    border-radius: 50%;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

.header-section h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #1a202c;
    margin-bottom: 0.5rem;
}

.header-section p {
    color: #718096;
}

/* Input Fields Styling */
.input-group {
    margin-bottom: 1.25rem; /* Slightly less margin for more fields */
}

.input-group label {
    display: block;
    font-weight: 600;
    color: #4a5568;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.input-field {
    position: relative;
}

.input-field svg {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    color: #a0aec0;
    transition: color 0.2s;
    pointer-events: none;
}

.input-field input {
    width: 100%;
    padding: 0.9rem 1rem 0.9rem 2.75rem;
    border: 1px solid #cbd5e0;
    border-radius: 8px;
    background-color: #f7fafc;
    color: #2d3748;
    font-size: 1rem;
    transition: all 0.2s;
}

.input-field input:focus {
    outline: none;
    border-color: #6366f1; /* Indigo */
    background-color: #ffffff;
    box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
}

.input-field:focus-within svg {
    color: #6366f1; /* Indigo */
}

/* Submit Button */
.submit-button-container {
    padding-top: 1rem;
}

.register-button {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 1rem;
    background: linear-gradient(to right, #6366f1, #4f46e5); /* Indigo gradient */
    color: #ffffff;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.register-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.2);
}

.register-button:active {
    transform: translateY(-1px);
}

.register-button svg {
    width: 20px;
    height: 20px;
    margin-right: 0.75rem;
}

/* Footer Links and Text */
.footer-section {
    text-align: center;
    padding-top: 1.5rem;
    margin-top: 2rem;
    border-top: 1px solid #e2e8f0;
}

.signin-link {
    font-weight: 600;
    color: #4f46e5; /* Indigo */
    text-decoration: none;
    transition: color 0.2s;
}

.signin-link:hover {
    color: #4338ca;
    text-decoration: underline;
}

.footer-section p {
    margin-top: 1rem;
    color: #a0aec0;
    font-size: 0.75rem;
}

/* Background Animated Shapes */
.decorative-shapes {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
    z-index: 0;
}

.decorative-shapes .shape {
    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.2;
}

.decorative-shapes .shape-1 {
    width: 350px;
    height: 350px;
    background-color: #818cf8; /* Indigo lighter */
    top: -100px;
    right: -100px;
    animation: pulse 7s infinite alternate;
}

.decorative-shapes .shape-2 {
    width: 300px;
    height: 300px;
    background-color: #67e8f9; /* Cyan */
    bottom: -100px;
    left: -100px;
    animation: pulse 7s infinite alternate-reverse;
}

@keyframes pulse {
    from { transform: scale(0.9) rotate(0deg); }
    to { transform: scale(1.1) rotate(20deg); }
}
</style>

    <div class="register-container">
        <div class="register-box">
            <!-- Header Section -->
            <div class="header-section">
                <div class="logo-container">
                    {{-- You can reuse the same logo or use a different one --}}
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAAgCAMAAADdXFNzAAABPlBMVEVHcEwcGhh/fHrMysrq6ekAAADHxcTo6Ofr6umioJ/j4+LX1ta2trXp6Ofl5eXc3NvV1dXc29zU09PEw8PZ2djT0tLS0dH5wwD////v7u+FwiYBkd/9xQD29vaDwhz/yACIwybsy3b7+vvZ29mBwiXR0NOzs7Th4d+MjI2ny3zIx8t1dHS1wxhrZ2VTuByko6DMnwCXlZUAhNVBQUapqKhzuSWCf36+vr9+wACfutAhldHjsQLe2cOMuFCGxAoHyQWcrjR1tQAAkOmkgha4zd7WskXkz55UVl+/uSYUCwd/vD2CvuqGlqLN2eJBxhQAugUotw8gowy60HSslyOXg1JNQSRYRQwjJCfpvSlrtmZImMXIuGObt3dGxBejnJVsqiFHoit6oydmtcRot5x1qM+Ip5vBvZlEp/NWr97S5EYu6kNmAAAAF3RSTlMAHCp75g5u/u5B0rZe2sP2kKKFksqpn13EfwwAAAJfSURBVCiRbZLnVqNAFIAnIQnEJJ7EstwBJiCEsiAl3RQ1VY+9rMe6ve/7v8AOCFHX/ebffJfLLYMQWuUyj3ARbIhJD2umUEiKaBiz+BXaMnqEw77Vqnesjm516vWuW++4vlMHNhf7JawZttHt2qZu67pua7Zt65hAPvbL7MaCy7cJ7yGVeMwnSJvVhG3IJvnZZ74mCIKiCMIzX4q8xEty6GtK2/usPPecSe18Lk2bMvXt9ujiy8hT2ov/46EUDKY3Aye4kjeFT2ej85F3oYwhHXsylCz95rp5K0/lzZpyPtpte21lrMb9ZWFPurKaB80B/y70nre76ynCVjKfFOzx8v7+1AnkgHqhdnYaeW3l0edhg5eCQArk62bYn3IqfKBdbmnlJ89LtD1+EMz7h1VBoYd6k3nKH0/nYSL273aEiEV9KBPPT/4xufzz+9e3KKC6TWKNijCPvr7vWf5P1zW+7lRp+mEl8aiEB7x02584rf3mgWNMaBHVQzUZb7FAJ8Q/iOLRgeU4zc5MFMW7Mc4hMyogpwKTVYcNUWw5rlX3Px5R39AKaAnwOn2dABiKWXLSODo+nvWOeyehPimgAugGrCEGwGUhR2voiwn3LBNqBwhd0RoQGrCOGLXXiGxjxqVpcr1DoBg9HxqgQSabXcLfG2KjR/eSx2C7BOIFrYHqdkEto3QJzzh6WQAwfKIWk/5XgfgaBsygFG2pTABr9PmnF/NBeRZaLR2AVPIVAmD7BrxBL1hRNb/exSqAaRiGVkqjfykT02y1HKtrmJn8KxvCcKASFZb/b0PSlcxK9sXNX9N2ZmuYMFQRAAAAAElFTSuQmCC" alt="Logo">
                </div>
                <h2>{{ __('Create Your Account') }}</h2>
                <p>{{ __('Get started with a new account in seconds') }}</p>
            </div>

            <!-- Form Container -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="input-group">
                    <x-input-label for="name" :value="__('Name')" />
                    <div class="input-field">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your full name" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="input-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <div class="input-field">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="input-group">
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="input-field">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Create a password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="input-field">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="submit-button-container">
                    <x-primary-button class="register-button">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        <span>{{ __('Create Account') }}</span>
                    </x-primary-button>
                </div>
            </form>

            <div class="footer-section">
                <a href="{{ route('login') }}" class="signin-link">
                    {{ __('Already registered? Sign in') }}
                </a>
                <p>
                    By creating an account, you agree to our terms and privacy policy
                </p>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="decorative-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </div>
</x-guest-layout>