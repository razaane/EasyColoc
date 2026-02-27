<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EasyColoc') }} - Authentification</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .auth-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] min-h-screen font-sans antialiased">

<div class="min-h-screen flex flex-col justify-center items-center p-4">
    
    <!-- Logo -->
    <div class="mb-8 text-center">
        <a href="/" class="inline-block">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent">
                EasyColoc<span class="text-[#7e3af2]">.</span>
            </h1>
        </a>
        <p class="text-gray-500 mt-2">Gérez votre colocation simplement</p>
    </div>

    <!-- Auth Card -->
    <div class="w-full max-w-md">
        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl border border-purple-100 overflow-hidden">
            
            <!-- Card Header with decorative gradient -->
            <div class="h-2 bg-gradient-to-r from-[#8b5cf6] to-[#c084fc]"></div>
            
            <!-- Content -->
            <div class="p-8">
                {{ $slot }}
            </div>

            <!-- Footer Links -->
            <div class="px-8 py-4 bg-purple-50/50 border-t border-purple-100 text-center">
                <p class="text-sm text-gray-600">
                    @if(request()->routeIs('login'))
                        Pas encore de compte ? 
                        <a href="{{ route('register') }}" class="text-[#8b5cf6] hover:text-[#6d28d9] font-medium hover:underline">
                            Créer un compte
                        </a>
                    @elseif(request()->routeIs('register'))
                        Déjà un compte ? 
                        <a href="{{ route('login') }}" class="text-[#8b5cf6] hover:text-[#6d28d9] font-medium hover:underline">
                            Se connecter
                        </a>
                    @endif
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="/" class="text-sm text-gray-500 hover:text-[#8b5cf6] transition inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>

</body>
</html>