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
        .sidebar-active {
            border-left: 4px solid #8b5cf6;
            background: linear-gradient(to right, #f5f3ff, transparent);
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] min-h-screen font-sans antialiased">

<div class="flex h-screen overflow-hidden">
    
    <!-- Left Sidebar - will be populated by navigation component -->
    <div class="w-72 flex-shrink-0 overflow-y-auto scrollbar-hide">
        @include('layouts.navigation')
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 overflow-y-auto bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff]">
        
        <!-- Page Header -->
        @isset($header)
            <header class="sticky top-0 z-10 bg-white/70 backdrop-blur-sm border-b border-purple-100 shadow-sm">
                <div class="px-8 py-6">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="p-8">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="border-t border-purple-100 py-4 px-8 text-center text-sm text-gray-500">
            © {{ date('Y') }} EasyColoc. Tous droits réservés.
        </footer>
    </div>
</div>

</body>
</html> 