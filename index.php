

<?php

session_start();
require '../model/DATABASE.php';
require '../model/visteur.php';



$student = new Visteur($id ?? NULL , $name ?? NULL, $role ?? NULL , $email ?? NULL, $password ?? NULL, $created_at ?? NULL);

$courses = $student->viewCatalog();

?>



<html lang="fr">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Youdemy - Plateforme de Cours en Ligne
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
       <a class="hover:underline" href="../views/Catalogue.php">
        Catalogue
       </a>
      </li>
      <li>
       <a class="hover:underline" href="../views/login.php">
        Connexion
       </a>
      </li>
      <li>
       <a class="hover:underline" href="../views/register.php">
        Inscription
       </a>
      </li>
     </ul>
    </nav>
   </div>
  </header>
  <!-- Hero Section -->
  <section class="bg-blue-600 text-white p-8">
   <div class="container mx-auto flex flex-col md:flex-row items-center">
    <div class="md:w-1/2">
     <h2 class="text-4xl font-bold mb-4">
      Apprenez de nouvelles compétences en ligne
     </h2>
     <p class="mb-4">
      Rejoignez des millions d'étudiants et commencez à apprendre dès aujourd'hui avec Youdemy.
     </p>
     <a class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200" href="login.php">
      Commencez maintenant
     </a>
    </div>
    <div class="md:w-1/2 mt-6 md:mt-0">
     <img alt="Illustration d'étudiants utilisant une plateforme de cours en ligne" src="../assest/image/youdmy.jpg"/>
    </div>
   </div>
  </section>
  <!-- Featured Courses -->
  <section class="container mx-auto p-8">
   <h2 class="text-3xl font-bold mb-6">
    Cours en vedette
   </h2>
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
 



    <!-- Course Item -->
    <?php foreach ($courses as $course): ?>

    <div class="bg-white p-4 rounded-lg shadow-lg">
    <img alt="Image de couverture du cours sur la data science" src="<?= htmlspecialchars($course['image']);?>" onerror="this.src='https://placehold.co/800x1200'" />
    <h3 class="text-xl font-bold mt-4">
     <?= htmlspecialchars($course['title']); ?>
     </h3>
     <p class="mt-2">
     <?= htmlspecialchars($course['description']); ?>
         </p>
     <a class="text-blue-600 hover:underline mt-2 block" href=" ../views/login.php">
      Voir les détails
     </a>
    </div>
    <?php endforeach; ?>
 
   </div>
  </section>
  <!-- Testimonials -->
  <section class="bg-gray-200 p-8">
   <div class="container mx-auto">
    <h2 class="text-3xl font-bold mb-6">
     Témoignages
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
     <!-- Testimonial Item -->
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Photo de profil d'un étudiant satisfait" class="w-16 h-16 rounded-full mx-auto" src="https://th.bing.com/th?id=OIF.ubd8%2fYwMvYuuUnAxWZF%2bYA&w=197&h=198&c=7&r=0&o=5&dpr=1.5&pid=1.7"/>
      <h3 class="text-xl font-bold mt-4 text-center">
       Lookman
      </h3>
      <p class="mt-2 text-center">
       "Youdemy m'a permis d'acquérir de nouvelles compétences et de progresser dans ma carrière."
      </p>
     </div>
     <!-- Testimonial Item -->
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Photo de profil d'une étudiante satisfaite" class="w-16 h-16 rounded-full mx-auto" src="https://th.bing.com/th?q=Hakimi+Fond+Blanc&w=120&h=120&c=1&rs=1&qlt=90&cb=1&dpr=1.5&pid=InlineBlock&mkt=en-XA&cc=MA&setlang=fr&adlt=strict&t=1&mw=247"/>
      <h3 class="text-xl font-bold mt-4 text-center">
  Achraf Hakimi
    </h3>
      <p class="mt-2 text-center">
       "Les cours sont bien structurés et les enseignants sont très compétents."
      </p>
     </div>
     <!-- Testimonial Item -->
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Photo de profil d'un étudiant satisfait" class="w-16 h-16 rounded-full mx-auto" src="https://th.bing.com/th/id/OIP.c2trNz7IkscCCKLQ4QL1WQHaJP?w=141&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7"/>
      <h3 class="text-xl font-bold mt-4 text-center">
       Albert Einstein
      </h3>
      <p class="mt-2 text-center">
       "J'ai pu apprendre à mon rythme et obtenir des certifications reconnues."
      </p>
     </div>
    </div>
   </div>
  </section>
  <!-- Call to Action -->
  <section class="bg-blue-600 text-white p-8">
   <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-4">
     Prêt à commencer votre apprentissage ?
    </h2>
    <a class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200" href="register.php">
     Inscrivez-vous maintenant
    </a>
   </div>
  </section>
  <!-- Footer -->
  <footer class="bg-gray-800 text-white p-4">
   <div class="container mx-auto text-center">
    <p>
     © 2025 Youdemy. Tous droits réservés.
    </p>
   </div>
  </footer>
 </body>
</html>
