













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
       <a class="hover:underline" href="#">
        Catalogue
       </a>
      </li>
      <li>
       <a class="hover:underline" href="#">
        Connexion
       </a>
      </li>
      <li>
       <a class="hover:underline" href="#">
        Inscription
       </a>
      </li>
     </ul>
    </nav>
   </div>
  </header>
  <!-- Main Content -->
  <main class="container mx-auto p-4">
   <section class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex flex-col md:flex-row items-center">
     <div class="md:w-1/3 relative">
      <img alt="Photo de profil de l'étudiant" class="rounded-full w-32 h-32 mx-auto" src="https://placehold.co/200x200"/>
      <a class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full opacity-75 hover:opacity-100" href="#modifier-profil">
       <i class="fas fa-edit">
       </i>
      </a>
     </div>
     <div class="md:w-2/3 md:pl-6 mt-4 md:mt-0">
      <h2 class="text-3xl font-bold mb-4">
       Jean Dupont
      </h2>
      <p class="mb-4">
       <strong>
        Email :
       </strong>
       jean.dupont@example.com
      </p>
      <p class="mb-4">
       <strong>
        Rôle :
       </strong>
       Étudiant
      </p>
      <a class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" href="#modifier-profil">
       Modifier le profil
      </a>
     </div>
    </div>
   </section>
   <!-- Modifier le Profil Section -->
   <section class="bg-white p-6 rounded-lg shadow-lg mt-8" id="modifier-profil">
    <h2 class="text-2xl font-bold mb-4">
     Modifier le Profil
    </h2>
    <form action="#" method="POST">
     <div class="mb-4">
      <label class="block text-gray-700" for="name">
       Nom complet
      </label>
      <input class="w-full px-3 py-2 border rounded-lg" id="name" name="name" required="" type="text" value="Jean Dupont"/>
     </div>
     <div class="mb-4">
      <label class="block text-gray-700" for="email">
       Adresse e-mail
      </label>
      <input class="w-full px-3 py-2 border rounded-lg" id="email" name="email" required="" type="email" value="jean.dupont@example.com"/>
     </div>
     <div class="mb-4">
      <label class="block text-gray-700" for="password">
       Nouveau mot de passe
      </label>
      <input class="w-full px-3 py-2 border rounded-lg" id="password" name="password" type="password"/>
     </div>
     <div class="mb-4">
      <button class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">
       Enregistrer les modifications
      </button>
     </div>
    </form>
   </section>
   <!-- My Courses Section -->
   <section class="bg-white p-6 rounded-lg shadow-lg mt-8">
    <h2 class="text-2xl font-bold mb-4">
     Mes Cours
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
     <!-- Enrolled Course Item -->
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Image de couverture du cours sur le développement web" src="https://placehold.co/300x200"/>
      <h3 class="text-xl font-bold mt-4">
       Développement Web
      </h3>
      <p class="mt-2">
       Apprenez les bases du développement web avec HTML, CSS et JavaScript.
      </p>
      <a class="text-blue-600 hover:underline mt-2 block" href="#">
       Accéder au cours
      </a>
     </div>
     <!-- Enrolled Course Item -->
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Image de couverture du cours sur la data science" src="https://placehold.co/300x200"/>
      <h3 class="text-xl font-bold mt-4">
       Data Science
      </h3>
      <p class="mt-2">
       Découvrez les techniques de la data science et apprenez à analyser des données.
      </p>
      <a class="text-blue-600 hover:underline mt-2 block" href="#">
       Accéder au cours
      </a>
     </div>
     <!-- Enrolled Course Item -->
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Image de couverture du cours sur le marketing digital" src="https://placehold.co/300x200"/>
      <h3 class="text-xl font-bold mt-4">
       Marketing Digital
      </h3>
      <p class="mt-2">
       Maîtrisez les stratégies de marketing digital pour booster votre entreprise.
      </p>
      <a class="text-blue-600 hover:underline mt-2 block" href="#">
       Accéder au cours
      </a>
     </div>
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
