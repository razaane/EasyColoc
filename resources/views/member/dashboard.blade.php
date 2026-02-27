<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EasyColoc - Member Dashboard</title>
    
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
        .sidebar-active {
            border-left: 4px solid #8b5cf6;
            background: linear-gradient(to right, #f5f3ff, transparent);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] min-h-screen">

<div class="flex h-screen">

    <!-- Sidebar - Modern Purple Theme (intégrée directement) -->
    <aside class="w-72 bg-white/90 backdrop-blur-sm shadow-xl border-r border-purple-100 overflow-y-auto fixed h-screen">
        <!-- Logo Area -->
        <div class="p-6 border-b border-purple-100">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent">
                EasyColoc<span class="text-[#7e3af2]">.</span>
            </h1>
            <p class="text-sm text-gray-500 mt-1">Espace membre</p>
        </div>
        
        <!-- User Profile Card -->
        <div class="p-6 border-b border-purple-100">
            <div class="flex items-center gap-4">
                @if(Auth::user()->image)
                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                        class="w-16 h-16 rounded-full object-cover border-3 border-[#8b5cf6] shadow-lg">
                @else
                    <div class="w-16 h-16 rounded-full bg-gradient-to-r from-[#8b5cf6] to-[#c084fc] flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <h2 class="font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    <span class="inline-flex items-center px-2 py-1 mt-1 text-xs font-medium bg-purple-100 text-[#6b21a5] rounded-full">
                        {{ $colocation && $colocation->owner_id === Auth::id() ? 'Owner' : 'Member' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-6 px-4 space-y-1 overflow-y-auto pb-6" style="max-height: calc(100vh - 300px);">
            <!-- Dashboard Link -->
            <a href="{{ route('member.dashboard') }}" 
               class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all group sidebar-active">
                <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
            
            <!-- Profile Link -->
            <a href="{{ route('profile.edit') }}" 
               class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Mon Profil
            </a>

            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Colocation</p>
            </div>

            @if(!$colocation)
                <!-- Create Colocation Link (if no colocation) -->
                <a href="{{ route('colocations.create') }}" 
                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Créer une colocation
                </a>
            @endif

            @if($colocation)
                <!-- Ma Colocation -->
                <a href="" 
                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Ma Colocation
                </a>

                <!-- Dépenses -->
                <a href="" 
                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Dépenses
                </a>

                <!-- Membres -->
                <a href="" 
                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Membres
                </a>

                <!-- Soldes & Remboursements -->
                <a href="" 
                   class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Soldes & Remboursements
                </a>

                <!-- Gérer la colocation (Owner only) -->
                @if($colocation->owner_id === Auth::id())
                    <a href="{{ route('colocations.manage', $colocation->id) }}" 
                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Gérer la colocation
                    </a>
                @endif
            @endif
        </nav>

        <!-- Logout Button -->
        <div class="absolute bottom-0 w-72 p-6 border-t border-purple-100 bg-white/90">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content - avec margin-left pour compenser la sidebar fixed -->
    <main class="flex-1 ml-72 overflow-y-auto bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] p-8 min-h-screen">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Bonjour, {{ Auth::user()->name }}! 👋</h1>
            <p class="text-gray-500 mt-2">Voici un aperçu de votre colocation</p>
        </div>

        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Colocations -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    @if($colocation)
                        <span class="text-sm font-medium text-green-500 bg-green-50 px-3 py-1 rounded-full">Active</span>
                    @endif
                </div>
                <h3 class="text-gray-500 text-sm">Ma Colocation</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $colocation?->name ?? 'Aucune' }}</p>
            </div>

            <!-- Total Dépenses -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-gray-500 text-sm">Total Dépenses</h3>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalExpenses ?? 0, 2) }} €</p>
                <p class="text-sm text-green-500 mt-2">+12% ce mois</p>
            </div>

            <!-- Mon Solde -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-gray-500 text-sm">Mon Solde</h3>
                <p class="text-2xl font-bold ">
                    €
                </p>
                <p class="text-sm text-gray-500 mt-2"> </p>
            </div>

            <!-- Réputation -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <h3 class="text-gray-500 text-sm">Réputation</h3>
                <p class="text-2xl font-bold text-yellow-500">{{ number_format($userReputation ?? 0, 1) }} ★</p>
                <p class="text-sm text-gray-500 mt-2">{{ $reputationLabel ?? 'Excellent' }}</p>
            </div>
        </div>

        <!-- No Colocation Message -->
        @if(!$colocation)
            <div class="mb-8 bg-gradient-to-r from-purple-50 to-pink-50 p-8 rounded-2xl border border-purple-100 text-center">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Vous n'avez pas encore de colocation</h3>
                <p class="text-gray-500 mb-6">Créez votre première colocation ou rejoignez-en une via un lien d'invitation</p>
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('colocations.create') }}" class="px-6 py-3 bg-[#8b5cf6] hover:bg-[#6d28d9] text-white font-medium rounded-xl shadow-lg shadow-purple-300/40 transition-all hover:scale-[1.02]">
                        Créer une colocation
                    </a>
                </div>
            </div>
        @endif

        @if($colocation)
            <!-- Invitation Link (Owner only) -->
            @if($colocation->owner_id === Auth::id())
                <div class="mb-8 bg-white p-6 rounded-2xl shadow-lg border border-purple-100">
                    <h3 class="font-semibold text-gray-800 mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Lien d'invitation
                    </h3>
                    <div class="flex gap-2">
                        <input type="text"
                            value="{{ url('/join/'.$colocation->invitation_token) }}"
                            class="flex-1 p-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-600"
                            id="invitation-link"
                            readonly>
                        <button onclick="copyInvitationLink()" 
                                class="px-4 py-3 bg-[#8b5cf6] hover:bg-[#6d28d9] text-white rounded-xl transition-all flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                            </svg>
                            Copier
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        Copiez ce lien et envoyez-le à vos colocataires pour les inviter.
                    </p>
                </div>
            @endif

            <!-- Members Quick View -->
            

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions Rapides</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="" class="p-4 bg-purple-50 rounded-xl text-center hover:bg-purple-100 transition-all">
                            <svg class="w-6 h-6 text-[#8b5cf6] mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Ajouter dépense</span>
                        </a>
                        <a href="" class="p-4 bg-purple-50 rounded-xl text-center hover:bg-purple-100 transition-all">
                            <svg class="w-6 h-6 text-[#8b5cf6] mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Marquer payé</span>
                        </a>
                    </div>
                </div>

                <!-- Quick Balances -->
                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Qui doit à qui ?</h3>
                   


                </div>
            </div>

            <!-- Recent Expenses Table -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-purple-100 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">Dernières Dépenses</h3>
                    <a href="" class="text-sm text-[#8b5cf6] hover:underline">Voir tout</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-purple-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payé par</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-purple-100">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </main>
</div>

<script>
function copyInvitationLink() {
    var copyText = document.getElementById("invitation-link");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    
    // Show feedback
    alert('Lien copié dans le presse-papier!');
}
</script>

</body>
</html>