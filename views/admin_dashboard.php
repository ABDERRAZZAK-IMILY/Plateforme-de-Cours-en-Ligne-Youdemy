<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="font-roboto bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Sidebar -->
        <div class="flex flex-1">
            <aside class="w-64 bg-white shadow-md">
                <div class="p-4">
                    <h1 class="text-2xl font-bold text-gray-800">Admin Dashboard</h1>
                </div>
                <nav class="mt-6">
                    <a href="javascript:void(0);" onclick="showSection('validation')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-user-check mr-2"></i> Validation des comptes enseignants
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('gestion-utilisateurs')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-users-cog mr-2"></i> Gestion des utilisateurs
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('gestion-contenus')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-book mr-2"></i> Gestion des contenus
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('insertion-tags')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-tags mr-2"></i> Insertion en masse de tags
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('statistiques')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-chart-bar mr-2"></i> Statistiques globales
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h2>

                <!-- Validation des comptes enseignants -->
                <section id="validation" class="section mb-6 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Validation des comptes enseignants</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Liste des enseignants en attente de validation :</p>
                        <ul class="mt-4 space-y-3">
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Enseignant 1</span>
                                <div>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded mr-2">Valider</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Rejeter</button>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Enseignant 2</span>
                                <div>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded mr-2">Valider</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Rejeter</button>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Enseignant 3</span>
                                <div>
                                    <button class="bg-green-500 text-white px-4 py-2 rounded mr-2">Valider</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Rejeter</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Gestion des utilisateurs -->
                <section id="gestion-utilisateurs" class="section mb-6 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des utilisateurs</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Activation, suspension ou suppression des utilisateurs :</p>
                        <ul class="mt-4 space-y-3">
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Utilisateur 1</span>
                                <div>
                                    <button class="bg-yellow-500 text-white px-4 py-2 rounded mr-2">Activer</button>
                                    <button class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Suspendre</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Utilisateur 2</span>
                                <div>
                                    <button class="bg-yellow-500 text-white px-4 py-2 rounded mr-2">Activer</button>
                                    <button class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Suspendre</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Utilisateur 3</span>
                                <div>
                                    <button class="bg-yellow-500 text-white px-4 py-2 rounded mr-2">Activer</button>
                                    <button class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Suspendre</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Gestion des contenus -->
                <section id="gestion-contenus" class="section mb-6 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des contenus</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Gestion des cours, catégories et tags :</p>
                        <ul class="mt-4 space-y-3">
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Cours 1</span>
                                <div>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Modifier</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Cours 2</span>
                                <div>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Modifier</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-3 border rounded">
                                <span>Cours 3</span>
                                <div>
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Modifier</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Insertion en masse de tags -->
                <section id="insertion-tags" class="section mb-6 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Insertion en masse de tags</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Ajouter des tags en masse pour gagner en efficacité :</p>
                        <form class="mt-4">
                            <textarea class="w-full p-3 border rounded" rows="4" placeholder="Entrez les tags séparés par des virgules..."></textarea>
                            <button class="mt-4 bg-green-500 text-white px-6 py-3 rounded">Ajouter</button>
                        </form>
                    </div>
                </section>

                <!-- Statistiques globales -->
                <section id="statistiques" class="section mb-6 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Statistiques globales</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="p-6 bg-gradient-to-r from-green-400 to-blue-500 text-white rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold">Nombre total de cours</h4>
                                <p class="text-3xl font-bold">150</p>
                            </div>
                            <div class="p-6 bg-gradient-to-r from-purple-400 to-pink-500 text-white rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold">Répartition par catégorie</h4>
                                <p class="text-3xl font-bold">Science: 50, Math: 40, Art: 60</p>
                            </div>
                            <div class="p-6 bg-gradient-to-r from-yellow-400 to-red-500 text-white rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold">Le cours avec le plus d'étudiants</h4>
                                <p class="text-3xl font-bold">Introduction to Science</p>
                            </div>
                            <div class="p-6 bg-gradient-to-r from-teal-400 to-indigo-500 text-white rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold">Top 3 enseignants</h4>
                                <p class="text-3xl font-bold">Enseignant A, Enseignant B, Enseignant C</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
<script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.add('hidden');
            });

            const selectedSection = document.getElementById(sectionId);
            selectedSection.classList.remove('hidden');
        }

        window.onload = function() {
            showSection('validation');
        };
    </script>
</html>
