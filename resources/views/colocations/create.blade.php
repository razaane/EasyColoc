<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EasyColoc - Créer une colocation</title>
    
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
    </style>
</head>
<body class="bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] min-h-screen">

<div class="flex h-screen">
    <main class="flex-1 overflow-y-auto p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent">
                    Créer une colocation
                </h1>
                <p class="text-gray-500 mt-2">Créez votre espace de vie partagé et invitez vos colocataires</p>
            </div>

            <!-- Progress Steps -->
            <div class="mb-8 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-[#8b5cf6] rounded-full flex items-center justify-center text-white font-bold">1</div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-800">Informations</p>
                        <p class="text-xs text-gray-500">Nom et description</p>
                    </div>
                </div>
                <div class="flex-1 h-1 mx-4 bg-gradient-to-r from-[#8b5cf6] to-gray-200"></div>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">2</div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-500">Invitations</p>
                        <p class="text-xs text-gray-400">Ajouter des membres</p>
                    </div>
                </div>
            </div>

            <!-- Create Form -->
            <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl border border-purple-100 overflow-hidden">
                <!-- Form Header -->
                <div class="h-2 bg-gradient-to-r from-[#8b5cf6] to-[#c084fc]"></div>
                
                <form method="POST" action="{{ route('colocations.store') }}" class="p-8">
                    @csrf

                    <!-- Colocation Name -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nom de la colocation <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   value="{{ old('name') }}"
                                   required
                                   class="block w-full pl-10 pr-3 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition"
                                   placeholder="Ex: Coloc' des Lilas">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Description <span class="text-gray-400 text-xs">(optionnelle)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                            </div>
                            <textarea name="description" 
                                      id="description"
                                      rows="4"
                                      class="block w-full pl-10 pr-3 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition"
                                      placeholder="Décrivez votre colocation...">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <!-- Address (Optional) -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Adresse <span class="text-gray-400 text-xs">(optionnelle)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="address" 
                                   id="address"
                                   value="{{ old('address') }}"
                                   class="block w-full pl-10 pr-3 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition"
                                   placeholder="123 Rue Example, Ville">
                        </div>
                    </div>

                    <!-- Settings Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Monthly Budget -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Budget mensuel (€) <span class="text-gray-400 text-xs">(optionnel)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <input type="number" 
                                       name="monthly_budget" 
                                       id="monthly_budget"
                                       value="{{ old('monthly_budget') }}"
                                       class="block w-full pl-10 pr-3 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition"
                                       placeholder="1500">
                            </div>
                        </div>

                        <!-- Currency -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Devise
                            </label>
                            <select name="currency" 
                                    id="currency"
                                    class="block w-full px-3 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition">
                                <option value="EUR">Euro (€)</option>
                                <option value="USD">Dollar ($)</option>
                                <option value="GBP">Livre (£)</option>
                                <option value="CHF">Franc Suisse (CHF)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Rules Checkboxes -->
                    <div class="mb-8 p-4 bg-purple-50/50 rounded-xl border border-purple-100">
                        <h4 class="font-semibold text-gray-700 mb-3">Règles de la colocation</h4>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="allow_pets" class="w-4 h-4 text-[#8b5cf6] border-gray-300 rounded focus:ring-[#8b5cf6]">
                                <span class="text-sm text-gray-600">Animaux acceptés</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="allow_smoking" class="w-4 h-4 text-[#8b5cf6] border-gray-300 rounded focus:ring-[#8b5cf6]">
                                <span class="text-sm text-gray-600">Fumeurs acceptés</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="quiet_hours" class="w-4 h-4 text-[#8b5cf6] border-gray-300 rounded focus:ring-[#8b5cf6]">
                                <span class="text-sm text-gray-600">Heures de silence (22h-8h)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-purple-100">
                        <a href="#" 
                           class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all">
                            Annuler
                        </a>
                        <button type="submit" 
                                class="px-8 py-3 bg-[#8b5cf6] hover:bg-[#6d28d9] text-white font-medium rounded-xl shadow-lg shadow-purple-300/40 transition-all hover:scale-[1.02] active:scale-[0.98] flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Créer la colocation
                        </button>
                    </div>
                </form>
            </div>

            <!-- Info Card -->
            <div class="mt-6 bg-gradient-to-r from-[#f7f3ff] to-[#f0eaff] rounded-2xl p-6 border border-purple-100">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-[#8b5cf6] rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700">Comment ça fonctionne ?</h4>
                        <p class="text-xs text-gray-500 mt-1">
                            Après avoir créé votre colocation, vous pourrez générer un lien d'invitation 
                            et l'envoyer par email à vos futurs colocataires. Chaque personne qui rejoint 
                            via ce lien sera automatiquement ajoutée comme membre.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>