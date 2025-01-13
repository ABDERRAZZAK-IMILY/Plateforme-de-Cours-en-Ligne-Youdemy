<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
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
                    <h1 class="text-2xl font-bold text-gray-800">Teacher Dashboard</h1>
                </div>
                <nav class="mt-6">
                    <a href="javascript:void(0);" onclick="showSection('ajout-cours')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-plus-circle mr-2"></i> Ajout de nouveaux cours
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('gestion-cours')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-edit mr-2"></i> Gestion des cours
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('statistiques')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-chart-line mr-2"></i> Statistiques
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h2>

                <!-- Ajout de nouveaux cours -->
                <section id="ajout-cours" class="section mb-8 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Ajout de nouveaux cours</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <form>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="title">Titre</label>
                                <input type="text" id="title" class="w-full px-4 py-2 border rounded" placeholder="Titre du cours">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="description">Description</label>
                                <textarea id="description" class="w-full px-4 py-2 border rounded" placeholder="Description du cours"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="content">Contenu</label>
                                <input type="file" id="content" class="w-full px-4 py-2 border rounded">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="tags">Tags</label>
                                <input type="text" id="tags" class="w-full px-4 py-2 border rounded" placeholder="Tags (séparés par des virgules)">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="category">Catégorie</label>
                                <select id="category" class="w-full px-4 py-2 border rounded">
                                    <option>Informatique</option>
                                    <option>Marketing</option>
                                    <option>Autres</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter</button>
                        </form>
                    </div>
                </section>

                <!-- Gestion des cours -->
                <section id="gestion-cours" class="section mb-8 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des cours</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Titre du cours</th>
                                    <th class="py-2 px-4 border-b">Catégorie</th>
                                    <th class="py-2 px-4 border-b">Tags</th>
                                    <th class="py-2 px-4 border-b">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b">Introduction à la programmation</td>
                                    <td class="py-2 px-4 border-b">Informatique</td>
                                    <td class="py-2 px-4 border-b">Programmation, Débutant</td>
                                    <td class="py-2 px-4 border-b">
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Modifier</button>
                                        <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        <button class="bg-gray-500 text-white px-4 py-2 rounded">Inscriptions</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Marketing digital</td>
                                    <td class="py-2 px-4 border-b">Marketing</td>
                                    <td class="py-2 px-4 border-b">SEO, Réseaux sociaux</td>
                                    <td class="py-2 px-4 border-b">
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Modifier</button>
                                        <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        <button class="bg-gray-500 text-white px-4 py-2 rounded">Inscriptions</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Statistiques -->
                <section id="statistiques" class="section mb-8 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Statistiques</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="p-6 bg-gradient-to-r from-green-400 to-blue-500 text-white rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold">Nombre total de cours</h4>
                                <p class="text-3xl font-bold">10</p>
                            </div>
                            <div class="p-6 bg-gradient-to-r from-purple-400 to-pink-500 text-white rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold">Nombre d'étudiants inscrits</h4>
                                <p class="text-3xl font-bold">200</p>
                            </div>
                            <div class="p-6 bg-gradient-to-r from-yellow-400 to-red-500 text-white rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold">Cours le plus populaire</h4>
                                <p class="text-3xl font-bold">Introduction à la programmation</p>
                            </div>
                            <div class="p-6 bg-gradient-to-r from-teal-400 to-indigo-500 text-white rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold">Nombre de catégories</h4>
                                <p class="text-3xl font-bold">3</p>
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
            showSection('ajout-cours');
        };
    </script>
</html>
