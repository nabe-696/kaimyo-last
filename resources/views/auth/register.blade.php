<x-guest-layout>
<!-- Login & Registration Links -->
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-purple-700 hover:underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm font-medium text-purple-700 hover:underline">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm font-medium text-purple-700 hover:underline">Register</a>
            @endif
        @endauth
    </div>
@endif
<form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 shadow-lg p-6 rounded-lg border border-purple-200">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" class="text-purple-800"/>
        <x-text-input id="name" class="block mt-1 w-full rounded-md border-purple-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" class="text-purple-800"/>
        <x-text-input id="email" class="block mt-1 w-full rounded-md border-purple-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" class="text-purple-800"/>
        <x-text-input id="password" class="block mt-1 w-full rounded-md border-purple-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-purple-800"/>
        <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-md border-purple-300 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="text-sm text-purple-600 hover:underline" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ml-4 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
</x-guest-layout>
