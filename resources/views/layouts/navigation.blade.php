<nav class="h-full bg-white/90 backdrop-blur-sm shadow-xl border-r border-purple-100 flex flex-col">
    
    <!-- Logo Area -->
    <div class="p-6 border-b border-purple-100">
        <a href="/" class="block">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent">
                EasyColoc<span class="text-[#7e3af2]">.</span>
            </h1>
        </a>
        @auth
            <p class="text-xs text-gray-500 mt-1">Connecté en tant que</p>
        @endauth
    </div>
    
    @auth
        <!-- User Profile Card -->
        <div class="p-6 border-b border-purple-100">
            <div class="flex items-center gap-4">
                @if(Auth::user()->image)
                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                         class="w-14 h-14 rounded-full object-cover border-3 border-[#8b5cf6] shadow-lg"
                         alt="{{ Auth::user()->name }}">
                @else
                    <div class="w-14 h-14 rounded-full bg-gradient-to-r from-[#8b5cf6] to-[#c084fc] 
                                flex items-center justify-center text-white text-xl font-bold shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <h2 class="font-semibold text-gray-800 truncate">{{ Auth::user()->name }}</h2>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    
                    <!-- Role Badge -->
                    @if(Auth::user()->is_admin)
                        <span class="inline-flex items-center px-2 py-0.5 mt-1 text-xs font-medium bg-purple-600 text-white rounded-full">
                            Admin Global
                        </span>
                    @else
                        <span class="inline-flex items-center px-2 py-0.5 mt-1 text-xs font-medium bg-purple-100 text-[#6b21a5] rounded-full">
                            
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 overflow-y-auto py-6 px-4 scrollbar-hide">
            <div class="space-y-1">
                
                <x-nav-link href="#" active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                   
                    @if(auth()->user()->role === 'admin')
                        <a class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all group sidebar-active" href="{{ route('admin.dashboard') }}" ...>
                            <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </a>
                    @else
                        <a class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all group sidebar-active" href="{{ route('member.dashboard') }}" ...>
                            <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        Dashboard
                </a>    
            @endif
                </x-nav-link>

                <!-- Profile Link -->
                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    {{ __('Profile') }}
                </x-nav-link>

                <!-- Separator -->
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Colocation
                    </p>
                </div>

                <!-- Colocation Links -->
                @if(Auth::user()->colocation)
                    <x-nav-link :href="route('colocation.show', Auth::user()->colocation)" 
                               :active="request()->routeIs('colocation.show')" 
                               class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        {{ __('Ma Colocation') }}
                    </x-nav-link>

                    <x-nav-link :href="route('expenses.index')" 
                               :active="request()->routeIs('expenses.*')" 
                               class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ __('Dépenses') }}
                    </x-nav-link>

                    <x-nav-link :href="route('members.index')" 
                               :active="request()->routeIs('members.*')" 
                               class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        {{ __('Membres') }}
                    </x-nav-link>

                    <x-nav-link :href="route('balances.index')" 
                               :active="request()->routeIs('balances.*')" 
                               class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        {{ __('Soldes') }}
                    </x-nav-link>
                @else
                    <!-- No colocation yet -->
                    <x-nav-link href="#" 
                               :active="request()->routeIs('formColocation')" 
                               class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        {{ __('Créer une colocation') }}
                    </x-nav-link>
                @endif

                <!-- Admin Links (only for admins) -->
                @if(Auth::user()->is_admin)
                    <div class="pt-4 pb-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Administration
                        </p>
                    </div>

                    <x-nav-link :href="route('admin.dashboard')" 
                               :active="request()->routeIs('admin.*')" 
                               class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        {{ __('Admin Dashboard') }}
                    </x-nav-link>
                @endif
            </div>
        </div>

        <!-- Logout Button -->
        <div class="p-6 border-t border-purple-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="flex items-center w-full px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-xl transition-all group">
                    <svg class="w-5 h-5 mr-3 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    {{ __('Déconnexion') }}
                </button>
            </form>
        </div>

    @else
        <!-- Guest Navigation (no profile) -->
        <div class="flex-1 flex items-center justify-center p-6">
            <div class="text-center">
                <p class="text-gray-500 mb-4">Vous n'êtes pas connecté</p>
                <div class="space-y-2">
                    <a href="{{ route('login') }}" 
                       class="block w-full px-4 py-2 bg-[#8b5cf6] text-white rounded-xl hover:bg-[#6d28d9] transition">
                        Se connecter
                    </a>
                    <a href="{{ route('register') }}" 
                       class="block w-full px-4 py-2 border border-[#8b5cf6] text-[#8b5cf6] rounded-xl hover:bg-purple-50 transition">
                        S'inscrire
                    </a>
                </div>
            </div>
        </div>
    @endauth
</nav>