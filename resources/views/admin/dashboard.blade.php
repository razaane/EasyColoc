<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EasyColoc - Admin Dashboard</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .gradient-purple {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .admin-gradient {
            background: linear-gradient(135deg, #4c1d95 0%, #6d28d9 100%);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] min-h-screen">

<div class="flex h-screen">

    <!-- Sidebar - Admin Dark Purple Theme -->
    <aside class="w-72 bg-gradient-to-b from-[#2e1065] to-[#4c1d95] shadow-2xl overflow-y-auto">
        <!-- Logo Area -->
        <div class="p-6 border-b border-purple-700/30">
            <h1 class="text-3xl font-bold text-white">
                EasyColoc<span class="text-purple-300">.admin</span>
            </h1>
            <p class="text-sm text-purple-200 mt-1">Panneau d'administration</p>
        </div>
        
        <!-- Admin Profile Card -->
        <div class="p-6 border-b border-purple-700/30">
            <div class="flex items-center gap-4">
                @if(Auth::user()->image)
                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                        class="w-16 h-16 rounded-full object-cover border-3 border-purple-300 shadow-lg">
                @else
                    <div class="w-16 h-16 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <h2 class="font-semibold text-white">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-purple-200">{{ Auth::user()->email }}</p>
                    <span class="inline-flex items-center px-2 py-1 mt-1 text-xs font-medium bg-purple-600 text-white rounded-full">
                        Admin Global
                    </span>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-6 px-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-purple-100 hover:bg-purple-600/30 rounded-xl transition-all bg-purple-600/20">
                <svg class="w-5 h-5 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard Admin
            </a>
            
            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 text-purple-100 hover:bg-purple-600/30 rounded-xl transition-all">
                <svg class="w-5 h-5 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Mon Profil
            </a>

            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-semibold text-purple-300 uppercase tracking-wider">Gestion</p>
            </div>

            <a href="" class="flex items-center px-4 py-3 text-purple-100 hover:bg-purple-600/30 rounded-xl transition-all">
                <svg class="w-5 h-5 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Utilisateurs
            </a>

            <a href="" class="flex items-center px-4 py-3 text-purple-100 hover:bg-purple-600/30 rounded-xl transition-all">
                <svg class="w-5 h-5 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                Colocations
            </a>

            <a href="" class="flex items-center px-4 py-3 text-purple-100 hover:bg-purple-600/30 rounded-xl transition-all">
                <svg class="w-5 h-5 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Dépenses
            </a>

            <a href="" class="flex items-center px-4 py-3 text-purple-100 hover:bg-purple-600/30 rounded-xl transition-all">
                <svg class="w-5 h-5 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-5-5A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                Catégories
            </a>

            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-semibold text-purple-300 uppercase tracking-wider">Modération</p>
            </div>

            <a href="" class="flex items-center px-4 py-3 text-purple-100 hover:bg-purple-600/30 rounded-xl transition-all">
                <svg class="w-5 h-5 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                </svg>
                Utilisateurs Bannis
            </a>

            <a href="" class="flex items-center px-4 py-3 text-purple-100 hover:bg-purple-600/30 rounded-xl transition-all">
                <svg class="w-5 h-5 mr-3 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Signalements
            </a>
        </nav>

        <!-- Logout Button -->
        <div class="absolute bottom-0 w-72 p-6 border-t border-purple-700/30">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 text-purple-100 hover:bg-red-600/30 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3