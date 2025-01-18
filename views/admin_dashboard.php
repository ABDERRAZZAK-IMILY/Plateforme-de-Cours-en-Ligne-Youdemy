

<!DOCTYPE html>
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
                    <a href="javascript:void(0);" onclick="showSection('gestion-utilisateurs')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-users-cog mr-2"></i> Gestion des utilisateurs
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('gestion-cours')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-book mr-2"></i> Gestion des cours
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('gestion-tags')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-tags mr-2"></i> Gestion des tags
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('insertion-tags')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-tags mr-2"></i> Insertion de catagoty
                    </a>
                    <a href="javascript:void(0);" onclick="showSection('statistiques')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
                        <i class="fas fa-chart-bar mr-2"></i> Statistiques globales
                    </a>
                    <a href="logout.php"  class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
    <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</a>


                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h2>

                <!-- Message de notification -->
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <?= $_SESSION['message'] ?>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>


                <!-- Gestion des utilisateurs -->
                <section id="gestion-utilisateurs" class="section mb-6 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des utilisateurs</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Activation, suspension ou suppression des utilisateurs :</p>
                        <ul class="mt-4 space-y-3">
                            <?php foreach ($users as $user) : ?>
                                <li class="flex justify-between items-center p-3 border rounded">
                                    <span><?= $user['name'] ?></span>
                                    <div>
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                                            <input type="hidden" name="actionType" value="activate">
                                            <button type="submit" name="manage_user" class="bg-yellow-500 text-white px-4 py-2 rounded mr-2">Activer</button>
                                        </form>
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                                            <input type="hidden" name="actionType" value="suspend">
                                            <button type="submit" name="manage_user" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Suspendre</button>
                                        </form>
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                                            <input type="hidden" name="actionType" value="delete">
                                            <button type="submit" name="manage_user" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        </form>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>

                <!-- Gestion des cours -->
                <section id="gestion-cours" class="section mb-6 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des cours</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Modifier ou supprimer des cours :</p>
                        <ul class="mt-4 space-y-3">
                            <?php foreach ($courses as $course) : ?>
                                <li class="flex justify-between items-center p-3 border rounded">
                                    <span><?= $course['title'] ?></span>
                                    <div>
                                        <button type="button" onclick="openEditModal('<?= $course['id'] ?>', '<?= $course['title'] ?>', '<?= $course['description'] ?>')" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Modifier</button>
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="courseId" value="<?= $course['id'] ?>">
                                            <input type="hidden" name="actionType" value="delete">
                                            <button type="submit" name="manage_course" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        </form>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>

                <!-- Gestion des tags -->
                <section id="gestion-tags" class="section mb-6 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des tags</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <p class="mb-4">Ajouter ou supprimer des tags :</p>
                        <ul class="mt-4 space-y-3">
                            <?php foreach ($tags as $tag) : ?>
                                <li class="flex justify-between items-center p-3 border rounded">
                                    <span><?= $tag['name'] ?></span>
                                    <div>
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="tagId" value="<?= $tag['id'] ?>">
                                            <input type="hidden" name="actionType" value="delete">
                                            <button type="submit" name="manage_tag" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                                        </form>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Insertion en masse de tags</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <form method="POST">
                            <textarea name="tags" class="w-full p-2 border rounded mb-4" placeholder="Entrez les tags séparés par des virgules"></textarea>
                            <button type="submit" name="insert_tags" class="bg-blue-500 text-white px-4 py-2 rounded">Insérer</button>
                        </form>
                    </div>
                    </div>
                </section>
                <section id="insertion-tags" class="section mb-6 hidden">
    <div class="bg-white p-4 rounded shadow-md">
        <p class="mb-4">Ajouter ou supprimer des catagory :</p>
        <ul class="mt-4 space-y-3">
            <?php foreach ($catagorys as $catagory) : ?>
                <li class="flex justify-between items-center p-3 border rounded">
                    <span><?= $catagory['name'] ?></span>
                    <div>
                        <form method="POST" class="inline">
                            <input type="hidden" name="categoryId" value="<?= $catagory['id'] ?>">
                            <input type="hidden" name="actionType" value="delete">
                            <button type="submit" name="manage_category" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Insertion de Catagory</h3>
    <div class="bg-white p-4 rounded shadow-md">
        <form method="POST">
            <input type="hidden" name="actionType" value="add">
            <textarea name="categoryName" class="w-full p-2 border rounded mb-4" placeholder="Entrez les catagory"></textarea>
            <button type="submit" name="manage_category" class="bg-blue-500 text-white px-4 py-2 rounded">Insérer</button>
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
                <p class="text-3xl font-bold"><?= $statistics['total_courses'] ?></p>
            </div>
            <div class="p-6 bg-gradient-to-r from-purple-400 to-pink-500 text-white rounded-lg shadow-lg">
                <h4 class="text-lg font-semibold">Répartition par catégorie</h4>
                <ul>
                    <?php foreach ($statistics['courses_by_category'] as $category) : ?>
                        <li><?= $category['category_name'] ?>: <?= $category['course_count'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="p-6 bg-gradient-to-r from-yellow-400 to-red-500 text-white rounded-lg shadow-lg">
                <h4 class="text-lg font-semibold">Le cours avec le plus d'étudiants</h4>
                <p class="text-3xl font-bold"><?= $statistics['most_popular_course']['title'] ?></p>
            </div>
            <div class="p-6 bg-gradient-to-r from-teal-400 to-indigo-500 text-white rounded-lg shadow-lg">
                <h4 class="text-lg font-semibold">Top 3 enseignants</h4>
                <ul>
                    <?php foreach ($statistics['top_teachers'] as $teacher) : ?>
                        <li><?= $teacher['name'] ?>: <?= $teacher['course_count'] ?> cours</li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
            </main>
        </div>
    </div>

   <!-- Modal for modifying a course -->
<div id="editCourseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Modifier le cours</h3>
            <form id="editCourseForm" method="POST" class="mt-2">
                <input type="hidden" id="editCourseId" name="courseId">
                <div class="mb-4">
                    <label for="editCourseTitle" class="block text-sm font-medium text-gray-700">Titre du cours</label>
                    <input type="text" id="editCourseTitle" name="title" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="editCourseDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="editCourseDescription" name="description" class="mt-1 p-2 w-full border rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="editCourseImage" class="block text-sm font-medium text-gray-700">URL de l'image</label>
                    <input type="text" id="editCourseImage" name="image" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="editCourseContent" class="block text-sm font-medium text-gray-700">URL du contenu</label>
                    <input type="text" id="editCourseContent" name="content" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="editCourseCategory" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select id="editCourseCategory" name="category" class="mt-1 p-2 w-full border rounded-md">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="items-center px-4 py-3">
                    <button type="submit" name="manage_course" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Enregistrer
                    </button>
                    <button type="button" onclick="closeEditModal()" class="ml-2 px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Annuler
                    </button>
                </div>
                <input type="hidden" name="actionType" value="modify">
            </form>
        </div>
    </div>
</div>
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

        function openEditModal(courseId, title, description) {
            document.getElementById('editCourseId').value = courseId;
            document.getElementById('editCourseTitle').value = title;
            document.getElementById('editCourseDescription').value = description;
            document.getElementById('editCourseModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editCourseModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('editCourseModal');
            if (event.target === modal) {
                closeEditModal();
            }
        }
    </script>
</body>
</html>