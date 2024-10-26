<x-guest-layout>
    <h4 class="mb-2">Welcome to Mersi Solution! 👋</h4>
    <p class="mb-4">Please sign-in to your account and start the adventure</p>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" class="mb-3" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300 font-semibold"/>
                <x-text-input id="email" class="block mt-2 w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600"/>
            </div>
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300 font-semibold"/>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Password -->
                <div class="input-group input-group-merge">

                    <x-text-input id="password" class="block mt-2 w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600"/>

                </div>
            </div>
                <!-- Remember Me -->
                <div class="mb-3">
                    <div class="form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</label>
                    </div>
                </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between">
                <x-primary-button class="btn btn-primary d-grid w-100">
                    {{ __('Sign in') }}
                </x-primary-button>
            </div>
        </form>

    <p class="text-center">
        <span>New on our platform?</span>
        <a href="{{ route('register') }}">
            <span>Create an account</span>
        </a>
    </p>

</x-guest-layout>
