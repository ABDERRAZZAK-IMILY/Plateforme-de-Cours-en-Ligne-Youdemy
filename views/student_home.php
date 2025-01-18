

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Youdemy - Espace Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        @keyframes rotate3D {
            0% { transform: rotateY(0); }
            100% { transform: rotateY(360deg); }
        }
        .fade-in {
            animation: fadeIn 1s ease-out;
        }
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05) rotateY(10deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #60f100, #2575fc);
        }
        .gradient-bg-footer {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }
        .text-gradient {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card-gradient {
            background: linear-gradient(145deg, #bcb7b7, #f0f0f0);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .rotate-3d {
            animation: rotate3D 8s linear;
        }
        .float {
            animation: float 4s ease-in-out infinite;
        }
        .shadow-3d {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="font-roboto bg-gray-100">
    <!-- Header -->
    <header class="gradient-bg shadow-3d">
        <div class="container mx-auto flex justify-between items-center p-4">
            <h1 class="text-2xl font-bold text-white float">Youdemy</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a class="text-white hover:underline" href="student_home.php">Accueil</a></li>
                    <li><a class="text-white hover:underline" href="student_profile.php">PROFILE</a></li>
                    <li><a class="text-white hover:underline" href="logout.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-4">
        <section class="bg-white p-6 rounded-lg shadow-3d fade-in">
            <h2 class="text-2xl font-bold mb-4 text-gradient">Espace Étudiant -catlogue</h2>
            <p class="mb-6 text-gray-700">Bienvenue, <?= htmlspecialchars($_SESSION['name']); ?>! Voici les cours diponible</p>
                        <!-- Course Item -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($courses as $course): ?>
                        <div class="card-gradient p-4 rounded-lg hover-scale">
                            <img alt="Image de couverture du cours" src="<?= htmlspecialchars($course['image']);?>" class="rounded-lg rotate-3d"/>
                            <h3 class="text-xl font-bold mt-4 text-gradient"><?= htmlspecialchars($course['title']); ?></h3>
                            <p class="mt-2 text-gray-700"><?= htmlspecialchars($course['description']); ?></p>
                            <form  method="POST">

                            <input type="hidden" name="courseid" value="<?= htmlspecialchars($course['id']); ?>" />

                            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" type="submit" name="enrollcours">Enroll Course</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="gradient-bg-footer text-white p-4 mt-8 shadow-3d">
        <div class="container mx-auto text-center">
            <p>© 2025 Youdemy. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>