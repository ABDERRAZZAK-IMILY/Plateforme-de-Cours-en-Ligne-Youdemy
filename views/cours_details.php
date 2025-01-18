






<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Youdemy - Détails du Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
</head>
<body class="font-roboto bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center p-4">
            <h1 class="text-2xl font-bold text-blue-600">Youdemy</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a class="hover:underline" href="student_home.php">Accueil</a></li>
                    <li><a class="hover:underline" href="login.php">Connexion</a></li>
                    <li><a class="hover:underline" href="register.php">Inscription</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-4">
        <!-- Course Details -->
        <section class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2">
                    <img alt="Image de couverture du cours" class="rounded-lg" src="<?= htmlspecialchars($course['image']) ?>"/>
                </div>
                <div class="md:w-1/2 md:pl-6 mt-4 md:mt-0">
                    <h2 class="text-3xl font-bold mb-4"><?= htmlspecialchars($course['title']) ?></h2>
                    <p class="mb-4"><?= htmlspecialchars($course['description']) ?></p>
                    <p class="mb-4">
                        <strong>Enseignant :</strong> <?= htmlspecialchars($course['teacher_name']) ?>
                    </p>
                    <p class="mb-4">
                        <strong>Catégorie :</strong>
                        <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">
                            <?= htmlspecialchars($course['categerories_name']) ?>
                        </span>
                    </p>
                    <p class="mb-4">
                        <strong>Tags :</strong>
                        <?php foreach ($tags as $tag): ?>
                            <span class="inline-block bg-gray-200 text-gray-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">
                                <?= htmlspecialchars($tag['name']) ?>
                            </span>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- Course Content -->
        <section class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <h2 class="text-2xl font-bold mb-4">Contenu du Cours</h2>
            <iframe src="<?= htmlspecialchars($course['content_url']) ?>" height="500" width="900"></iframe>

        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 Youdemy. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>