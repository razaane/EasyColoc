<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <!-- Hero Section -->
    <header class="bg-indigo-500 text-white">
        <nav class="container mx-auto flex justify-between items-center py-6">
            <h1 class="text-2xl font-bold">EasyColoc</h1>
        </nav>

        <div class="container pl-40 mx-auto flex flex-col md:flex-row items-center py-16">
            <div class="md:w-1/2 text-center md:text-left space-y-6">
                <h2 class="text-4xl font-bold">Gérez votre colocation facilement 💸</h2>
                <p class="text-gray-100">Suivez les dépenses, remboursements et restez organisé avec vos colocataires.</p>
                <div class="space-x-4">
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-green-500 rounded-xl font-semibold">Créer un compte</a>
                    <a href="{{ route('login') }}" class="px-6 py-3 border border-white rounded-xl">Se connecter</a>
                </div>
            </div>

        </div>
    </header>
    <!-- Features Section -->
    <section class="container mx-auto py-16">
        <h3 class="text-3xl font-bold text-center mb-12">Fonctionnalités</h3>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h4 class="text-xl font-bold mb-2">💰 Gestion des dépenses</h4>
                <p>Suivi automatique et simplifié des soldes entre colocataires.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h4 class="text-xl font-bold mb-2">🔄 Calcul automatique</h4>
                <p>Remboursements et répartitions calculés automatiquement.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h4 class="text-xl font-bold mb-2">⭐ Système de réputation</h4>
                <p>Encourage la transparence et le bon comportement.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-indigo-500 text-white py-8">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <p>© 2026 EasyColoc. Tous droits réservés.</p>
            <div class="space-x-6 mt-4 md:mt-0">
                <a href="#" class="hover:underline">À propos</a>
                <a href="#" class="hover:underline">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>