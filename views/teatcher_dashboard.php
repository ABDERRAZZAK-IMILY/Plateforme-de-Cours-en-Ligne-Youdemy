<?php
session_start();
require_once '../model/USER.php';
require_once '../model/teacher.php';
require_once '../model/cours.php';


if (!isset($_SESSION['role'], $_SESSION['status']) || $_SESSION['role'] !== "teacher" || $_SESSION['status'] !== 'active') {
    header('Location: 401.php');
    exit();
}


$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $image = isset($_POST['image']) ? $_POST['image'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';

    if (!empty($title) && !empty($description) && !empty($image) && !empty($content) && !empty($category)) {
        $cours = new Cours($title, $description, $image, $content, $category);
        $teacher = new Teacher($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['role'] , $_SESSION['created_at']);
        try {
            $result = $teacher->createCourse($cours);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required.";
    }
}


    if (isset($_POST['modifycourse'])) {
        $newTitle = $_POST['newtitle'];
        $newCategoryId = $_POST['cataguryname'];
        $newContent = $_POST['newcontent'];
        $course_id = $_POST['articleId'];

        $teacher = new Teacher($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['role'] , $_SESSION['created_at']);
        $modify = $teacher->modifyArticle($newTitle, $newCategoryId, $newContent, $course_id);
    }

    if (isset($_POST['removecourse'])) {
        $course_id = $_POST['removecourseId'];

        $teacher = new Teacher($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['role'] , $_SESSION['created_at']);
        $remove = $teacher->removecourse($course_id);
    }

    if (isset($_POST['tageadd'])) {

        $courseid = $_POST['articleId'];
        $tagid = $_POST['tagsname'];

        $teacher = new Teacher($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['role'] , $_SESSION['created_at']);
        $tagadd = $teacher->Tagadd($courseid, $tagid);
    }

$categories = [];
$categoryQuery = "SELECT id, name FROM categories";
$stmt = $conn->query($categoryQuery);

if ($stmt && $stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categories[] = $row;
    }
}

$tags = [];
$tagsQuery = "SELECT * FROM tags";
$stmt2 = $conn->query($tagsQuery);

if ($stmt2 && $stmt2->rowCount() > 0) {
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $tags[] = $row;
    }
}

$courses = [];
$query = "SELECT courses.id, courses.title, courses.description, courses.created_at, courses.image, courses.catagugry_id, categories.name AS category_name
          FROM courses
          JOIN categories ON courses.catagugry_id = categories.id ";
$stmt = $conn->query($query);

if ($stmt && $stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $courses[] = $row;
    }
} else {
    $message = "No courses found.";
}
?>


<!DOCTYPE html>
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
                    <a href="logout.php"  class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">
    <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</a>


                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h2>

                <!-- Ajout de nouveaux cours -->
                <section id="ajout-cours" class="section mb-8">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Ajout de nouveaux cours</h3>
                    <div class="bg-white p-4 rounded shadow-md">
                        <form method="POST" action="">
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="title">Titre</label>
                                <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded" placeholder="Titre du cours" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="description">Description</label>
                                <textarea name="description" id="description" class="w-full px-4 py-2 border rounded" placeholder="Description du cours" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="image">Image URL</label>
                                <input type="text" name="image" id="image" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="content">Contenu URL</label>
                                <input type="text" name="content" id="content" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2" for="category">Catégorie</label>
                                <select name="category" id="category" class="w-full px-4 py-2 border rounded" required>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter</button>
                        </form>
                    </div>
                </section>

                <!-- Gestion des cours -->
                <section id="gestion-cours" class="section mb-8 hidden">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des cours</h3>
                    <div class="p-10 flex items-center gap-8 flex-wrap lg:grid lg:grid-cols-2 bg-gray-200">
                        <?php if (empty($courses)): ?>
                            <p class="text-red-500">No courses found.</p>
                        <?php else: ?>
                            <?php foreach ($courses as $course): ?>
                                <article class="relative bg-white shadow-md rounded-md">
                                    <!-- Course content -->
                                    <form method="POST">
                                        <input type="hidden" name="articleId" value="<?= $course['id'] ?>">
                                        <label for="catagury" class="block text-gray-700">Tags</label>
                                        <select id="tagname" name="tagsname" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <?php foreach ($tags as $tag): ?>
                                                <option value="<?= $tag['id'] ?>"><?= $tag['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button id="addtags" type="submit" name="tageadd" class="py-2 px-5 rounded-sm text-white bg-red-200 text-sm duration-500 hover:bg-red-700">Add tag</button>
                                    </form>
                                    <div>
                                        <img class="object-cover w-full h-52 dark:bg-gray-500" src="<?= htmlspecialchars($course['image']) ?>" alt="Course Image">
                                    </div>
                                    <div class="p-4">
                                        <p class="text-gray-800 font-medium text-sm"><?= $course['created_at'] ?> •</p>
                                        <div class="pt-5">
                                            <a href="#">
                                                <h1 class="text-gray-900 font-semibold text-xl mb-3"><?= htmlspecialchars($course['title']) ?></h1>
                                            </a>
                                            <p class="text-gray-700 font-medium text-md"><?= htmlspecialchars($course['description']) ?></p>
                                        </div>
                                        <div class="flex justify-end items-center gap-5 mt-5">
                                            <button class="editButton py-2 px-5 rounded-sm text-white bg-blue-500 text-sm duration-500 hover:bg-blue-700" onclick="toggleEditForm('editForm_<?= $course['id'] ?>')">Modifier</button>
                                            <form action="" method="POST" class="inline-block">
                                                <input type="hidden" name="removecourseId" value="<?= $course['id'] ?>">
                                                <button type="submit" name="removecourse" class="py-2 px-5 rounded-sm text-white bg-red-500 text-sm duration-500 hover:bg-red-700">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="absolute top-2 right-2 bg-white bg-opacity-85 py-1 px-3 rounded-md text-xs"><?= htmlspecialchars($course['category_name']) ?></p>
                                    <!-- Display Tags -->
                                    <div class="bg-white p-6 rounded-lg shadow-lg">
                                        <h2 class="text-lg font-semibold mb-4">Tags</h2>
                                        <div class="flex flex-wrap gap-2">
                                            <div id="selectedTagsContainer" class="mt-2">
                                                <?php
                                                $courseTagsQuery = "SELECT tags.name 
                                                                    FROM course_tags 
                                                                    JOIN tags ON course_tags.tag_id = tags.id 
                                                                    WHERE course_id = :courseid";
                                                $stmtTags = $conn->prepare($courseTagsQuery);
                                                $stmtTags->bindParam(':courseid', $course['id'], PDO::PARAM_INT);
                                                $stmtTags->execute();
                                                $courseTags = $stmtTags->fetchAll(PDO::FETCH_ASSOC);
                                                ?>
                                                <?php foreach ($courseTags as $tag): ?>
                                                    <span class="bg-blue-200 hover:bg-blue-300 py-1 px-2 rounded-lg text-sm"><?= htmlspecialchars($tag['name']) ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Form -->
                                    <div class="bg-gray-800 p-4 rounded bg-opacity-50 absolute top-0 left-0 w-full z-10" id="editForm_<?= $course['id'] ?>" style="display: none;">
                                        <h1 class="text-3xl font-bold text-center mb-8 text-white">EDIT COURSE</h1>
                                        <form action="" method="POST" class="space-y-4">
                                            <div class="space-y-4">
                                                <div>
                                                    <label for="articleTitle" class="block text-gray-700">Course Title</label>
                                                    <input type="text" id="courseTitle" name="newtitle" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= htmlspecialchars($course['title']) ?>" required>
                                                </div>
                                                <div>
                                                    <label for="catagury" class="block text-gray-700">Category</label>
                                                    <select id="catagury" name="cataguryname" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                                        <?php foreach ($categories as $category): ?>
                                                            <option value="<?= $category['id'] ?>" <?= $category['id'] == $course['catagugry_id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="articleContent" class="block text-gray-700">Course Content</label>
                                                    <textarea id="articleContent" name="newcontent" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required><?= htmlspecialchars($course['description']) ?></textarea>
                                                </div>
                                                <input type="hidden" name="articleId" value="<?= $course['id'] ?>">
                                                <button type="submit" name="modifycourse" class="py-2 px-5 rounded-sm text-white bg-blue-500 text-sm duration-500 hover:bg-blue-700">Modifier</button>
                                            </div>
                                        </form>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php endif; ?>
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

    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.add('hidden');
            });

            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.classList.remove('hidden');
                console.log(`Showing section: ${sectionId}`);
            } else {
                console.error(`Section not found: ${sectionId}`);
            }
        }

        function toggleEditForm(formId) {
            const editForm = document.getElementById(formId);
            if (editForm.style.display === 'none') {
                editForm.style.display = 'block';
            } else {
                editForm.style.display = 'none';
            }
        }

        window.onload = function() {
            showSection('ajout-cours');
        };
    </script>
</body>
</html>