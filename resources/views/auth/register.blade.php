<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EasyColoc') }} · Inscription</title>

    <!-- Fonts (figtree) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- tiny extra style for consistency with login/welcome -->
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .glow-purple {
            box-shadow: 0 10px 25px -5px rgba(139, 92, 246, 0.2), 0 8px 10px -6px rgba(139, 92, 246, 0.15);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] min-h-screen flex items-center justify-center p-5">

    <!-- main card: same split layout as login, with light purple / dark purple palette -->
    <div class="w-full max-w-5xl bg-white/60 backdrop-blur-sm rounded-3xl shadow-2xl border border-purple-100/70 overflow-hidden md:flex glow-purple">

        <!-- LEFT HERO (exactly matching login page hero) -->
        <div class="md:w-1/2 bg-gradient-to-br from-[#7c3aed] to-[#4c1d95] p-10 text-white flex flex-col justify-between relative">
            <div class="absolute top-5 right-5 w-40 h-40 bg-purple-300/20 rounded-full blur-3xl"></div>
            <div class="relative z-10">
                <h2 class="text-3xl font-bold tracking-tight flex items-center gap-2">
                    <span class="bg-white/20 p-2 rounded-xl">🏡</span> 
                    <span class="bg-gradient-to-r from-white to-purple-100 bg-clip-text text-transparent">EasyColoc</span>
                </h2>
                <div class="mt-16 space-y-4">
                    <p class="text-4xl font-extrabold leading-tight">Rejoignez<br>la communauté ✨</p>
                    <p class="text-purple-100 max-w-xs text-base">Gérez vos dépenses, remboursements et construisez une réputation de colocataire fiable.</p>
                    <!-- mini bullet list (same as login) -->
                    <ul class="space-y-2 text-sm font-light pt-4">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-300 rounded-full"></span> Suivi instantané des soldes</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-300 rounded-full"></span> Remboursements automatiques</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-green-300 rounded-full"></span> Badges de réputation</li>
                    </ul>
                </div>
            </div>
            <!-- subtle link to login (consistent) -->
            <div class="relative z-10 mt-10 text-sm text-purple-200 border-t border-white/20 pt-6">
                <span>Déjà un compte ? </span>
                <a href="{{ route('login') }}" class="font-semibold text-white underline underline-offset-4 hover:text-purple-100 transition">Se connecter →</a>
            </div>
        </div>

        <!-- RIGHT: REGISTER FORM (centered, modern, matches login styling) -->
        <div class="md:w-1/2 flex items-center justify-center p-8 md:p-12 bg-white/90 backdrop-blur-sm">
            <div class="w-full max-w-sm">

                <!-- header inside form -->
                <div class="text-center md:text-left mb-8">
                    <h3 class="text-3xl font-bold text-gray-800">Inscription</h3>
                    <p class="text-sm text-gray-500 mt-1">Créez votre espace coloc</p>
                </div>

                <!-- Laravel Register Form (backend untouched, all fields preserved) -->
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- Name (with modern purple styling) -->
                    <div>
                        <x-input-label for="name" :value="__('Nom complet')" class="text-sm font-medium text-gray-700" />
                        <x-text-input id="name" 
                            class="block w-full mt-2 px-5 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required autofocus autocomplete="name" 
                            placeholder="Jean Dupont" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Adresse email')" class="text-sm font-medium text-gray-700" />
                        <x-text-input id="email" 
                            class="block w-full mt-2 px-5 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required autocomplete="username" 
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
                            required autocomplete="new-password" 
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-sm font-medium text-gray-700" />
                        <x-text-input id="password_confirmation" 
                            class="block w-full mt-2 px-5 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                            type="password" 
                            name="password_confirmation" 
                            required autocomplete="new-password" 
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
                    </div>

                    <!-- Profile image (file input, styled nicely) -->
                    <div>
                        <label for="avatar_url" class="block text-sm font-medium text-gray-700 mb-1">
                            URL de la photo de profil <span class="text-gray-400 font-normal">(optionnel)</span>
                        </label>
                        <div class="relative">
                            <input id="avatar_url" 
                                type="url" 
                                 name="avatar_url" 
                                value="{{ old('avatar_url') }}"
                                placeholder="https://exemple.com/image.jpg"
                                class="block w-full text-sm text-gray-600 border-2 border-purple-100 rounded-xl py-2.5 px-4 bg-[#faf9ff] focus:outline-none focus:border-[#8b5cf6] focus:ring-1 focus:ring-[#8b5cf6] transition placeholder:text-gray-400" />
                        </div>
                        <x-input-error :messages="$errors->get('avatar_url')" class="mt-2 text-sm text-red-500" />
                    </div>
                    <!-- Submit button (dark purple, full width, same as login) -->
                    <div class="pt-3">
                        <x-primary-button class="w-full py-3.5 bg-[#7c3aed] hover:bg-[#6d28d9] text-white font-bold rounded-xl shadow-lg shadow-purple-300/40 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2 text-base">
                            <span>S’inscrire</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
                        </x-primary-button>
                    </div>

                    <!-- mobile-friendly link to login (hidden on md+) -->
                    <div class="relative mt-8 text-center text-sm text-gray-400 md:hidden">
                        <span>Déjà membre ? </span>
                        <a href="{{ route('login') }}" class="text-[#7c3aed] font-semibold hover:underline">Connectez-vous</a>
                    </div>
                </form>

                <!-- tiny footer note (consistent with login) -->
                <p class="text-xs text-gray-400 text-center mt-8">© 2026 EasyColoc · rejoignez la communauté</p>
            </div>
        </div>
    </div>

    <!-- All backend components (x-input-label, x-text-input, x-input-error, x-primary-button)
         are kept exactly as they were. Their default styling is overridden by the classes above.
         The form action, csrf, and enctype are untouched — fully functional. -->
</body>
</html>