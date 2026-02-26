<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EasyColoc') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>


    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Left Hero / Info + Illustration -->
        <div class="md:w-1/2 relative flex flex-col justify-center p-10 bg-indigo-500 text-white overflow-hidden">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue sur EasyColoc 💸</h1>
            <p class="mb-6 text-gray-200">
                Gérez vos colocations, suivez les dépenses et remboursements,
                et restez organisé avec vos colocataires.
            </p>
            <div class="space-x-4">
                <a href="{{ route('register') }}" class="px-6 py-3 bg-green-500 rounded-xl font-semibold hover:bg-green-600 transition transform hover:scale-105">
                    Créer un compte
                </a>
            </div>

        </div>

        <!-- Right Login Form -->
        <div class="md:w-1/2 flex flex-col justify-center items-center p-10 bg-gray-50">
            <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8">
                
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md"
                                      type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md"
                                      type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mb-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                   name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <div class="flex flex-col items-center mt-6">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-500 hover:text-gray-700 mb-4" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="w-full bg-indigo-500 hover:bg-indigo-600">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>

    </div>
