


<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// require '../model/DATABASE.php';
require '../model/student.php';


$student = new Student($_SESSION['id'] , $_SESSION['name'] , $_SESSION['role'] , $_SESSION['email'] , $_SESSION['password'] , $_SESSION['created_at']);

$courses = $student->myCourses($_SESSION['id']);


?>

<html lang="fr">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Youdemy - Profil Étudiant
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
 </head>
 <body class="font-roboto bg-gray-100">
  <!-- Header -->
  <header class="bg-white shadow">
   <div class="container mx-auto flex justify-between items-center p-4">
    <h1 class="text-2xl font-bold text-blue-600">
     Youdemy
    </h1>
    <nav>
     <ul class="flex space-x-4">
      <li>
       <a class="hover:underline" href="#">
        Accueil
       </a>
      </li>
      <li>
       <a class="hover:underline" href="student_home.php">
        Catalogue
       </a>
      </li>
      <li><a class="hover:underline" href="logout.php">Déconnexion</a></li>
     </ul>
    </nav>
   </div>
  </header>
  <!-- Main Content -->
  <main class="container mx-auto p-4">
   <section class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex flex-col md:flex-row items-center">
     <div class="md:w-1/3 relative">
      <img alt="Photo de profil de l'étudiant" class="rounded-full w-32 h-32 mx-auto" src="../assest/image/avtar_image.jpg"/>
      <a class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full opacity-75 hover:opacity-100" href="#modifier-profil">
       <i class="fas fa-edit">
       </i>
      </a>
     </div>
     <div class="md:w-2/3 md:pl-6 mt-4 md:mt-0">
      <h2 class="text-3xl font-bold mb-4">
      <?= htmlspecialchars($_SESSION['name']); ?></h2>
      <p class="mb-4">
       <strong>
        Email :
       </strong>
       <?= htmlspecialchars($_SESSION['email']); ?></h2>
       </p>
      <p class="mb-4">
       <strong>
        Rôle :
       </strong>
       Étudiant
      </p>
     </div>
    </div>
   </section>
   <!-- My Courses Section -->
 <section class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <h2 class="text-2xl font-bold mb-4">Mes Cours</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($courses as $course): ?>
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <img alt="Image de couverture du cours" src="<?= htmlspecialchars($course['image']); ?>" class="rounded-lg"/>
                        <h3 class="text-xl font-bold mt-4 text-gradient"><?= htmlspecialchars($course['title']); ?></h3>
                        <p class="mt-2"><?= htmlspecialchars($course['description']); ?></p>
                        <a class="text-blue-600 hover:underline mt-2 block" href="../views/cours_details.php?id=<?= $course['id']; ?>">Accéder au cours</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
  </main>
  <!-- Footer -->
  <footer class="bg-gray-800 text-white p-4 mt-8">
   <div class="container mx-auto text-center">
    <p>
     © 2025 Youdemy. Tous droits réservés.
    </p>
   </div>
  </footer>
 </body>
</html>
