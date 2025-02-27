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

    <!-- Sidebar -->
    <aside class="w-72 bg-white/90 backdrop-blur-sm shadow-xl border-r border-purple-100 overflow-y-auto fixed h-screen">
        <!-- Logo -->
        <div class="p-6 border-b border-purple-100">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent">
                EasyColoc<span class="text-[#7e3af2]">.</span>
            </h1>
            <p class="text-sm text-gray-500 mt-1">Espace membre</p>
        </div>
        
        <!-- User Profile -->
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
            <a href="{{ route('member.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all group sidebar-active">
                Dashboard
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                Mon Profil
            </a>

            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Colocation</p>
            </div>

            @if(!$colocation)
                <a href="{{ route('colocations.create') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                    Créer une colocation
                </a>
            @endif

            @if($colocation)
                <a href="" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">Ma Colocation</a>
                <a href="" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">Dépenses</a>
                <a href="" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">Membres</a>
                <a href="" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">Soldes & Remboursements</a>

                @if($colocation->owner_id === Auth::id())
                    <a href="{{ route('colocations.manage', $colocation->id) }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-all">
                        Gérer la colocation
                    </a>
                @endif
            @endif
        </nav>

        <!-- Logout -->
        <div class="absolute bottom-0 w-72 p-6 border-t border-purple-100 bg-white/90">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-xl transition-all">
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-72 overflow-y-auto bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] p-8 min-h-screen">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Bonjour, {{ Auth::user()->name }}! 👋</h1>
            <p class="text-gray-500 mt-2">Voici un aperçu de votre colocation</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white/70 rounded-2xl p-6 shadow-lg">
                <h3 class="text-gray-500 text-sm">Ma Colocation</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $colocation?->name ?? 'Aucune' }}</p>
            </div>
            <div class="bg-white/70 rounded-2xl p-6 shadow-lg">
                <h3 class="text-gray-500 text-sm">Total Dépenses</h3>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalExpenses ?? 0, 2) }} €</p>
            </div>
            <div class="bg-white/70 rounded-2xl p-6 shadow-lg">
                <h3 class="text-gray-500 text-sm">Mon Solde</h3>
                <p class="text-2xl font-bold text-green-500">{{ $myBalance ?? '0' }} €</p>
            </div>
            <div class="bg-white/70 rounded-2xl p-6 shadow-lg">
                <h3 class="text-gray-500 text-sm">Réputation</h3>
                <p class="text-2xl font-bold text-yellow-500">{{ number_format($userReputation ?? 0, 1) }} ★</p>
            </div>
        </div>

        <!-- Si pas de colocation -->
        @if(!$colocation)
            <div class="mb-8 bg-gradient-to-r from-purple-50 to-pink-50 p-8 rounded-2xl border border-purple-100 text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Vous n'avez pas encore de colocation</h3>
                <p class="text-gray-500 mb-6">Créez votre première colocation ou rejoignez-en une via un lien d'invitation</p>
                <a href="{{ route('colocations.create') }}" class="px-6 py-3 bg-[#8b5cf6] text-white rounded-xl">Créer une colocation</a>
            </div>
        @endif

        <!-- Si colocation -->
@if($colocation)
    <!-- Invitation (Owner only) -->
    @if($colocation->owner_id === Auth::id())
        <div class="mb-8 bg-white p-6 rounded-2xl shadow-lg border border-purple-100">
            <h3 class="font-semibold text-gray-800 mb-2 flex items-center gap-2">
                <svg class="w-5 h-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Lien d'invitation
            </h3>
            <div class="flex gap-2">
                <input type="text"
                       value="{{ url('/join/'.$colocation->invite_token) }}"
                       class="flex-1 p-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-600"
                       id="invitation-link"
                       readonly>
                <button onclick="copyInvitationLink()" 
                        class="px-4 py-3 bg-[#8b5cf6] hover:bg-[#6d28d9] text-white rounded-xl transition-all flex items-center gap-2">
                    Copier
                </button>
            </div>
            <p class="text-sm text-gray-500 mt-2">
                Copiez ce lien et envoyez-le à vos colocataires pour les inviter.
            </p>
        </div>
    @endif

    <!-- Membres -->
    <div class="mb-8 bg-white p-6 rounded-2xl shadow-lg border border-purple-100">
        <h3 class="font-semibold text-gray-800 mb-4">Membres</h3>
        <ul class="divide-y divide-purple-100">
            @foreach($colocation->users as $member)
                <li class="flex justify-between items-center py-2">
                    <span>{{ $member->name }} ({{ $member->pivot->role }})</span>
                    @if($colocation->owner_id === Auth::id() && $member->id !== Auth::id())
                        <form action="{{ route('colocations.removeMember', [$colocation->id, $member->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-sm">Retirer</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Quick Actions + Balances -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white/70 rounded-2xl p-6 shadow-lg border border-purple-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions Rapides</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('expenses.create') }}" class="p-4 bg-purple-50 rounded-xl text-center hover:bg-purple-100 transition-all">
                    Ajouter dépense
                </a>
                <a href="{{ route('payments.index') }}" class="p-4 bg-purple-50 rounded-xl text-center hover:bg-purple-100 transition-all">
                    Marquer payé
                </a>
            </div>
        </div>

        <div class="bg-white/70 rounded-2xl p-6 shadow-lg border border-purple-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Qui doit à qui ?</h3>
            {{-- Ici tu affiches ton calcul des soldes --}}
        </div>
    </div>

    <!-- Dernières Dépenses -->
    <div class="bg-white/70 rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-purple-100 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Dernières Dépenses</h3>
            <a href="{{ route('expenses.index') }}" class="text-sm text-[#8b5cf6] hover:underline">Voir tout</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-purple-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Montant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payé par</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-100">
                    @foreach($recentExpenses as $expense)
                        <tr>
                            <td class="px-6 py-4">{{ $expense->title }}</td>
                            <td class="px-6 py-4">{{ number_format($expense->amount, 2) }} €</td>
                            <td class="px-6 py-4">{{ $expense->payer->name }}</td>
                            <td class="px-6 py-4">{{ $expense->date->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">{{ $expense->category->name }}</td>
                        </tr>
                    @endforeach
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
    alert('Lien copié dans le presse-papier!');
}
</script>

</body>
</html>
