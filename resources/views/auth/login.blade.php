<x-guest-layout>
<!-- Login & Registration Links -->
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-purple-700 dark:text-purple-500 hover:underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-purple-700 dark:text-purple-500 hover:underline">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-purple-700 dark:text-purple-500 hover:underline">Register</a>
            @endif
        @endauth
    </div>
@endif
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 shadow-lg p-6 rounded-lg border border-purple-200">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" class="text-purple-800"/>
        <x-text-input id="email" class="block mt-1 w-full rounded-md border-purple-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" class="text-purple-800"/>
        <x-text-input id="password" class="block mt-1 w-full rounded-md border-purple-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-purple-300 text-purple-600 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" name="remember">
            <span class="ml-2 text-sm text-purple-800">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-between mt-6">
        @if (Route::has('password.request'))
            <a class="text-sm text-purple-600 hover:underline" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class="ml-auto bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form>
</x-guest-layout>
