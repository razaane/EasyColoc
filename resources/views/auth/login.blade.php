<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EasyColoc') }} · Connexion</title>

    <!-- Fonts (figtree + fallback) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Optional extra smoothness -->
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .glow-purple {
            box-shadow: 0 10px 25px -5px rgba(139, 92, 246, 0.2), 0 8px 10px -6px rgba(139, 92, 246, 0.15);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] min-h-screen flex items-center justify-center p-5">

    <!-- Main container: centered card with subtle backdrop, matching welcome page vibe -->
    <div class="w-full max-w-5xl bg-white/60 backdrop-blur-sm rounded-3xl shadow-2xl border border-purple-100/70 overflow-hidden md:flex glow-purple">

        <!-- LEFT: modern hero panel (light purple gradient, dark accents) — same energy as welcome page -->
        <div class="md:w-1/2 bg-gradient-to-br from-[#7c3aed] to-[#4c1d95] p-10 text-white flex flex-col justify-between relative">
            <!-- abstract shape (soft) -->
            <div class="absolute top-5 right-5 w-40 h-40 bg-purple-300/20 rounded-full blur-3xl"></div>
            <div class="relative z-10">
                <!-- brand with slight variation -->
                <h2 class="text-3xl font-bold tracking-tight flex items-center gap-2">
                    <span class="bg-white/20 p-2 rounded-xl">🏡</span> 
                    <span class="bg-gradient-to-r from-white to-purple-100 bg-clip-text text-transparent">EasyColoc</span>
                </h2>
                <div class="mt-16 space-y-4">
                    <p class="text-4xl font-extrabold leading-tight">Heureux de<br>vous revoir ✨</p>
                    <p class="text-purple-100 max-w-xs text-base">Gérez vos dépenses, remboursements et la réputation de votre colocation en toute simplicité.</p>
                    <!-- mini bullet list (soft) -->
                    <ul class="space-y-2 text-sm font-light pt-4">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-300 rounded-full"></span> Suivi instantané des soldes</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-300 rounded-full"></span> Remboursements automatiques</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-300 rounded-full"></span> Badges de réputation</li>
                    </ul>
                </div>
            </div>
            <!-- subtle link to register (keep it friendly) -->
            <div class="relative z-10 mt-10 text-sm text-purple-200 border-t border-white/20 pt-6">
                <span>Pas encore de compte ? </span>
                <a href="{{ route('register') }}" class="font-semibold text-white underline underline-offset-4 hover:text-purple-100 transition">Créer un compte →</a>
            </div>
        </div>

        <!-- RIGHT: LOGIN FORM (centered, modern card with light purple/dark touches) -->
        <div class="md:w-1/2 flex items-center justify-center p-8 md:p-12 bg-white/90 backdrop-blur-sm">
            <div class="w-full max-w-sm">

                <!-- header inside form -->
                <div class="text-center md:text-left mb-8">
                    <h3 class="text-3xl font-bold text-gray-800">Connexion</h3>
                    <p class="text-sm text-gray-500 mt-1">Accédez à votre espace coloc</p>
                </div>

                <!-- Session Status (Laravel) -->
                <x-auth-session-status class="mb-4 text-sm text-green-600 bg-green-50 p-3 rounded-xl border border-green-200" :status="session('status')" />

                <!-- Login Form - backend untouched, just styled -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Adresse email')" class="text-sm font-medium text-gray-700" />
                        <x-text-input id="email" 
                            class="block w-full mt-2 px-5 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username" 
                            placeholder="exemple@email.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Mot de passe')" class="text-sm font-medium text-gray-700" />
                        <x-text-input id="password" 
                            class="block w-full mt-2 px-5 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                    </div>

                    <!-- Remember & Forgot (flex row, remember left, forgot right) -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-gray-600">
                            <input id="remember_me" type="checkbox" 
                                class="rounded border-gray-300 text-[#7c3aed] focus:ring-[#7c3aed] focus:ring-2 focus:ring-offset-1" 
                                name="remember">
                            <span>{{ __('Se souvenir de moi') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-[#6d28d9] hover:text-[#4c1d95] font-medium underline-offset-2 hover:underline transition">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button (dark purple, modern) -->
                    <div class="pt-3">
                        <x-primary-button class="w-full py-3.5 bg-[#7c3aed] hover:bg-[#6d28d9] text-white font-bold rounded-xl shadow-lg shadow-purple-300/40 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2 text-base">
                            <span>Se connecter</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                        </x-primary-button>
                    </div>

                    <!-- optional divider / extra link to register (mobile friendly) -->
                    <div class="relative mt-8 text-center text-sm text-gray-400 md:hidden">
                        <span>Nouveau ? </span>
                        <a href="{{ route('register') }}" class="text-[#7c3aed] font-semibold hover:underline">Inscrivez-vous</a>
                    </div>
                </form>

                <!-- tiny footer note (pure style) -->
                <p class="text-xs text-gray-400 text-center mt-8">© 2026 EasyColoc · espaces sécurisés</p>
            </div>
        </div>
    </div>

    <!-- Optional: global blade components still work exactly as before.
         The styling uses the same purple/dark palette as the welcome page. 
         All backend logic (routes, validation, session) is untouched. -->
</body>
</html>