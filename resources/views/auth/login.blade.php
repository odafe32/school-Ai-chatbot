<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-cyan-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header Section -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mb-6 shadow-lg">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome back</h2>
                <p class="text-gray-600">Please sign in to your account</p>
            </div>

            <!-- Form Container -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 backdrop-blur-sm">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

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
                                autofocus 
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
                                autocomplete="current-password" 
                                placeholder="Enter your password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between pt-2">
                        <label for="remember_me" class="flex items-center group cursor-pointer">
                            <input id="remember_me" 
                                type="checkbox" 
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-2 transition-all duration-200" 
                                name="remember">
                            <span class="ml-3 text-sm text-gray-600 group-hover:text-gray-900 transition-colors">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200 hover:underline" 
                               href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <a class="text-sm font-medium flex justify-center items-center w-full pt-5 text-indigo-600 hover:text-indigo-500 transition-colors duration-200 hover:underline" 
                href="{{ route('register') }}">
                 {{ __('Create Account') }}
             </a>
                

                <!-- Additional Visual Elements -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="text-center">
                        <p class="text-xs text-gray-500">
                            Secure login protected by enterprise-grade encryption
                        </p>
                    </div>
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-400 to-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-cyan-400 to-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
            </div>
        </div>
    </div>
</x-guest-layout>