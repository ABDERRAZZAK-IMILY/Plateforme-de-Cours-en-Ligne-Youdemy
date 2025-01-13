
<html lang="fr">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Youdemy - Inscription
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
   <section class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">
     Inscription
    </h2>
    <form action="#" method="POST">
     <div class="mb-4">
      <label class="block text-gray-700" for="name">
       Nom complet
      </label>
      <input class="w-full px-3 py-2 border rounded-lg" id="name" name="name" required="" type="text"/>
     </div>
     <div class="mb-4">
      <label class="block text-gray-700" for="email">
       Adresse e-mail
      </label>
      <input class="w-full px-3 py-2 border rounded-lg" id="email" name="email" required="" type="email"/>
     </div>
     <div class="mb-4">
      <label class="block text-gray-700" for="password">
       Mot de passe
      </label>
      <input class="w-full px-3 py-2 border rounded-lg" id="password" name="password" required="" type="password"/>
     </div>
     <div class="mb-4">
      <label class="block text-gray-700" for="role">
       Rôle
      </label>
      <select class="w-full px-3 py-2 border rounded-lg" id="role" name="role" required="">
       <option value="student">
        Étudiant
       </option>
       <option value="teacher">
        Enseignant
       </option>
      </select>
     </div>
     <div class="mb-4">
      <button class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">
       S'inscrire
      </button>
     </div>
    </form>
    <p class="text-center">
     Déjà un compte ?
     <a class="text-blue-600 hover:underline" href="#">
      Connectez-vous
     </a>
    </p>
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