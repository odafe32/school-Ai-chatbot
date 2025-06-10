<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-cyan-50  px-4 sm:px-6 lg:px-8 overflow-y-auto">
        <div class="max-w-md w-full space-y-8 relative">
            <!-- Header Section -->
         

            <!-- Form Container -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 backdrop-blur-sm">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    

                    <!-- Name -->
                    <div class="group">
                        <x-input-label for="name" :value="__('Name')" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <x-text-input id="name" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-gray-50 focus:bg-white shadow-sm" 
                                type="text" 
                                name="name" 
                                :value="old('name')" 
                                required 
                                autofocus 
                                autocomplete="name" 
                                placeholder="Enter your full name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="group">
                        <x-input-label for="email" :value="__('Email')" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <x-text-input id="email" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-gray-50 focus:bg-white shadow-sm" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autocomplete="username" 
                                placeholder="Enter your email" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="group">
                        <x-input-label for="password" :value="__('Password')" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <x-text-input id="password" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-gray-50 focus:bg-white shadow-sm"
                                type="password"
                                name="password"
                                required 
                                autocomplete="new-password" 
                                placeholder="Create a password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="group">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <x-text-input id="password_confirmation" 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-gray-50 focus:bg-white shadow-sm"
                                type="password"
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password" 
                                placeholder="Confirm your password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            {{ __('Create Account') }}
                        </x-primary-button>
                    </div>
                </form>

                <a class="text-sm font-medium flex justify-center items-center w-full pt-5 text-indigo-600 hover:text-indigo-500 transition-colors duration-200 hover:underline" 
                   href="{{ route('login') }}">
                    {{ __('Already registered? Sign in') }}
                </a>

                <!-- Additional Visual Elements -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="text-center">
                        <p class="text-xs text-gray-500">
                            By creating an account, you agree to our terms and privacy policy
                        </p>
                    </div>
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden -z-10">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-400 to-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-cyan-400 to-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
            </div>
        </div>
    </div>

    <!-- Custom CSS for better scrolling -->
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
        
        /* Ensure the page can scroll on mobile */
        @media (max-height: 800px) {
            .min-h-screen {
                min-height: 100vh;
            }
        }
    </style>
</x-guest-layout>