<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc · Accueil</title>
    <!-- Tailwind + subtle smooth fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        /* soft extra glow for purple accents */
        .glow-purple {
            box-shadow: 0 10px 25px -5px rgba(139, 92, 246, 0.25), 0 8px 10px -6px rgba(139, 92, 246, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#f7f3ff] via-white to-[#f0eaff] text-gray-800 antialiased">

    <!-- NAVBAR — clean, semi‑transparent, light/dark purple touch -->
    <header class="fixed w-full z-30 backdrop-blur-sm bg-white/70 border-b border-purple-100/50">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="flex justify-between items-center h-20">
                <!-- logo / name with modern light‑dark purple -->
                <a href="/" class="text-3xl font-bold tracking-tight bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent drop-shadow-sm">
                    EasyColoc<span class="text-[#7e3af2]">.</span>
                </a>
                <!-- subtle sign‑in / sign‑up group — but we keep the hero CTA for the main action -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="hidden sm:inline-block text-sm font-medium text-[#5b21b6] hover:text-[#7c3aed] transition px-4 py-2.5 rounded-xl hover:bg-purple-50/70">Connexion</a>
                    <a href="{{ route('register') }}" class="text-sm bg-[#7c3aed] hover:bg-[#6d28d9] text-white px-5 py-2.5 rounded-xl font-semibold shadow-md shadow-purple-300/30 transition-all hover:scale-[1.02] active:scale-[0.98]">Créer un compte →</a>
                </div>
            </div>
        </div>
    </header>

    <!-- HERO SECTION – modern spacious, asymmetric, fresh purple gradient + dark accents -->
    <section class="relative pt-32 pb-28 md:pt-40 md:pb-36 overflow-hidden">
        <!-- abstract floating shapes (very subtle) -->
        <div class="absolute top-20 right-0 w-96 h-96 bg-purple-200/30 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-10 w-80 h-80 bg-[#c4b5fd] opacity-20 rounded-full blur-2xl -z-10"></div>

        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- left side: headline + description + cta -->
                <div class="space-y-7">
                    <span class="inline-block px-4 py-1.5 text-sm font-semibold text-[#4c1d95] bg-[#ede9fe] rounded-full border border-purple-200/60 shadow-sm">✨ La colocation sans prise de tête</span>
                    <h2 class="text-5xl sm:text-6xl font-extrabold leading-tight tracking-tight text-gray-900">
                        Gérez vos <span class="bg-gradient-to-r from-[#6d28d9] to-[#a21caf] bg-clip-text text-transparent">dépenses</span><br>en toute simplicité
                    </h2>
                    <p class="text-lg text-gray-600 max-w-lg leading-relaxed">
                        Suivi instantané,remboursements automatiques et équilibre préservé. EasyColoc transforme la vie en communauté en un jeu d’enfant. 
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-[#7c3aed] hover:bg-[#5b21b6] text-white font-bold rounded-2xl text-lg shadow-xl shadow-purple-300/50 transition-all hover:shadow-purple-400/60 hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2">
                            Démarrer maintenant
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#features" class="px-8 py-4 bg-white/80 backdrop-blur-sm border-2 border-purple-200 text-[#4b5563] hover:text-[#1f2937] font-medium rounded-2xl text-lg shadow-sm hover:border-purple-300 transition-all flex items-center gap-2">
                            Découvrir
                        </a>
                    </div>
                    <!-- tiny stat / trust marker -->
                    <div class="flex items-center gap-6 text-sm text-gray-500 pt-4">
                        <span class="flex items-center gap-1.5"><span class="w-2 h-2 bg-green-400 rounded-full"></span> +5 000 colocataires</span>
                        <span class="flex items-center gap-1.5"><span class="w-2 h-2 bg-[#a78bfa] rounded-full"></span> 4.9 ★ Trustpilot</span>
                    </div>
                </div>
                <!-- right side: modern card with soft purple/dark palette and icons / preview -->
                <div class="relative flex justify-center md:justify-end">
                    <div class="relative w-full max-w-md">
                        <!-- background dark/purple floating card -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-[#2e1065] to-[#581c87] rounded-3xl rotate-3 scale-105 opacity-20 blur-xl"></div>
                        <div class="relative bg-white/90 backdrop-blur-sm p-8 rounded-3xl shadow-2xl border border-purple-100/80 glow-purple">
                            <!-- feature mini list inside hero card -->
                            <div class="flex items-center gap-4 mb-8">
                                <div class="h-12 w-12 bg-[#f3e8ff] rounded-2xl flex items-center justify-center text-[#6b21a5] shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Solde instantané</p>
                                    <p class="text-sm text-gray-500">+ répartition automatique</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mb-8">
                                <div class="h-12 w-12 bg-[#f3e8ff] rounded-2xl flex items-center justify-center text-[#6b21a5] shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Réputation entre coloc’</p>
                                    <p class="text-sm text-gray-500">+ badge de confiance</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="h-12 w-12 bg-[#f3e8ff] rounded-2xl flex items-center justify-center text-[#6b21a5] shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Tableau de bord simple</p>
                                    <p class="text-sm text-gray-500">Toutes les dépenses en un clin d’œil</p>
                                </div>
                            </div>
                            <!-- mini placeholder button to simulate invite -->
                            <div class="mt-10 pt-4 border-t border-purple-100 flex justify-between items-center">
                                <span class="text-xs font-medium text-gray-400">Dépense commune récente</span>
                                <span class="text-sm font-bold text-[#4c1d95]">+ 82 € · Alex</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES section – light purple background, dark cards with smooth hover -->
    <section id="features" class="py-24 bg-[#f1ecfe] border-y border-purple-200/60">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-[#6d28d9] font-semibold text-sm uppercase tracking-wider bg-purple-200/60 px-4 py-1.5 rounded-full">Pourquoi EasyColoc ?</span>
                <h3 class="text-4xl font-extrabold text-gray-900 mt-6 mb-4">Tout ce qu’il vous faut,<br>rien de superflu.</h3>
                <p class="text-gray-600 text-lg">Conçu pour les colocataires d’aujourd’hui : transparent, rapide et même un peu fun.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mt-16">
                <!-- card 1 - purple light/dark mix -->
                <div class="group bg-white/70 backdrop-blur-sm rounded-3xl p-8 border border-purple-100/80 shadow-md hover:shadow-xl transition-all hover:-translate-y-1 duration-300">
                    <div class="h-14 w-14 bg-[#d9c9ff] rounded-2xl flex items-center justify-center text-[#4c1d95] text-3xl mb-6 shadow-sm group-hover:scale-110 transition-transform">💰</div>
                    <h4 class="text-2xl font-bold text-gray-800 mb-3">Dépenses partagées</h4>
                    <p class="text-gray-600 leading-relaxed">Ajoutez un achat, choisissez les participants et laissez l’app calculer qui doit quoi, sans prise de tête.</p>
                    <div class="mt-6 flex items-center text-[#6d28d9] font-medium">
                        <span>Plus d’équité</span>
                        <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </div>
                </div>
                <!-- card 2 -->
                <div class="group bg-white/70 backdrop-blur-sm rounded-3xl p-8 border border-purple-100/80 shadow-md hover:shadow-xl transition-all hover:-translate-y-1 duration-300">
                    <div class="h-14 w-14 bg-[#d9c9ff] rounded-2xl flex items-center justify-center text-[#4c1d95] text-3xl mb-6 shadow-sm group-hover:scale-110 transition-transform">🔄</div>
                    <h4 class="text-2xl font-bold text-gray-800 mb-3">Remboursements auto</h4>
                    <p class="text-gray-600 leading-relaxed">Finis les messages confus. Le solde de chacun est mis à jour en temps réel, avec suggestion des transferts.</p>
                    <div class="mt-6 flex items-center text-[#6d28d9] font-medium">
                        <span>Zéro dispute</span>
                        <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </div>
                </div>
                <!-- card 3 – reputation special -->
                <div class="group bg-white/70 backdrop-blur-sm rounded-3xl p-8 border border-purple-100/80 shadow-md hover:shadow-xl transition-all hover:-translate-y-1 duration-300">
                    <div class="h-14 w-14 bg-[#d9c9ff] rounded-2xl flex items-center justify-center text-[#4c1d95] text-3xl mb-6 shadow-sm group-hover:scale-110 transition-transform">⭐</div>
                    <h4 class="text-2xl font-bold text-gray-800 mb-3">Système de réputation</h4>
                    <p class="text-gray-600 leading-relaxed">Valorisez les bons payeurs. Des badges et un score encouragent la confiance et la régularité.</p>
                    <div class="mt-6 flex items-center text-[#6d28d9] font-medium">
                        <span>Ambiance saine</span>
                        <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </div>
                </div>
            </div>
            <!-- subtle dark purple callout -->
            <div class="mt-14 text-center">
                <span class="inline-flex items-center gap-2 text-sm bg-[#2e1065] text-purple-100 py-2.5 px-8 rounded-full shadow-md">✨ Plus de 10 000 colocs nous font confiance – et vous ?</span>
            </div>
        </div>
    </section>

    <!-- FOOTER – dark purple background, light text, modern minimal -->
    <footer class="bg-[#1e1029] text-[#d9c9ff] border-t border-purple-800/40">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-14">
            <div class="grid md:grid-cols-4 gap-8 items-start">
                <div class="col-span-2 md:col-span-1">
                    <span class="text-3xl font-bold text-white tracking-tight">EasyColoc<span class="text-[#c4b5fd]">.</span></span>
                    <p class="text-sm text-purple-200/70 mt-4 max-w-xs">Libérez votre colocation des calculs inutiles. On s’occupe de l’argent, vous profitez de la vie.</p>
                </div>
                <div>
                    <h5 class="font-semibold text-white mb-4">Produit</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-purple-200/70 hover:text-white transition">Fonctionnalités</a></li>
                        <li><a href="#" class="text-purple-200/70 hover:text-white transition">Tarifs</a></li>
                        <li><a href="#" class="text-purple-200/70 hover:text-white transition">Avis</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-white mb-4">Assistance</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-purple-200/70 hover:text-white transition">Centre d’aide</a></li>
                        <li><a href="#" class="text-purple-200/70 hover:text-white transition">Nous contacter</a></li>
                        <li><a href="#" class="text-purple-200/70 hover:text-white transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-white mb-4">Légal</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-purple-200/70 hover:text-white transition">Confidentialité</a></li>
                        <li><a href="#" class="text-purple-200/70 hover:text-white transition">CGU</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-purple-800/40 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-purple-200/60">
                <p>© 2026 EasyColoc. Tous droits réservés.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition">À propos</a>
                    <a href="#" class="hover:text-white transition">Contact</a>
                    <a href="#" class="hover:text-white transition">LinkedIn</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- tiny extra polish: a "back to top" invisible but we keep everything smooth -->
    <div class="fixed bottom-6 right-6">
        <a href="#" class="bg-[#7c3aed] text-white p-3 rounded-full shadow-lg hover:bg-[#6d28d9] transition flex items-center justify-center w-12 h-12 border border-white/20 backdrop-blur-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
        </a>
    </div>
</body>
</html>