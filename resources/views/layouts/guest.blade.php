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

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .guest-pattern {
            background-color: #f7f3ff;
            background-image: radial-gradient(at 30% 40%, #e9d8fd 0px, transparent 50%),
                              radial-gradient(at 70% 60%, #d6bcfa 0px, transparent 50%);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="guest-pattern min-h-screen font-sans antialiased">

<!-- Simple Navigation for Guest -->
<nav class="bg-white/70 backdrop-blur-sm border-b border-purple-100 fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent">
                    EasyColoc<span class="text-[#7e3af2]">.</span>
                </a>
            </div>

            <!-- Guest Actions -->
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" 
                   class="px-4 py-2 text-sm font-medium text-[#6b21a5] hover:text-[#8b5cf6] transition">
                    Connexion
                </a>
                <a href="{{ route('register') }}" 
                   class="px-4 py-2 text-sm font-medium bg-[#8b5cf6] hover:bg-[#6d28d9] text-white rounded-xl shadow-md shadow-purple-300/30 transition-all hover:scale-105">
                    Inscription
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
</main>

<!-- Simple Footer -->
<footer class="bg-white/50 backdrop-blur-sm border-t border-purple-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-sm text-gray-500">
            © {{ date('Y') }} EasyColoc. Tous droits réservés.
        </div>
    </div>
</footer>

</body>
</html>