<?php

session_start();
require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/DATABASE.php');

require('C:/xampp/htdocs/YOUDMY/Plateforme-de-Cours-en-Ligne-Youdemy/model/USER.php');


$db = new Database();
$conn = $db->connect();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $loginResult = User::login($email, $password, $conn);

    if ($loginResult === 'student') {
        $message = "Bienvenue, étudiant!";
        $_SESSION['message'] = $message;
        header("Location: ../views/student_home.php");
        exit();
    } elseif ($loginResult === 'teacher') {
        $message = "Bienvenue, enseignant!";
        $_SESSION['message'] = $message;
        header("Location: teatcher_dashboard.php");
        exit();
      } elseif ($loginResult === 'admin') {
        $message = "Bienvenue, enseignant!";
        $_SESSION['message'] = $message;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $message = "E-mail ou mot de passe incorrect.";
    }
}
?>





<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Youdemy - Connexion</title>
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
          <li><a class="hover:underline" href="home.php">Accueil</a></li>
          <li><a class="hover:underline" href="Catalogue.php">Catalogue</a></li>
          <li><a class="hover:underline" href="#">Connexion</a></li>
          <li><a class="hover:underline" href="register.php">Inscription</a></li>
        </ul>
      </nav>
    </div>
  </header>


  <?php if (!empty($message)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
          <?= $message; ?>
        </div>
      <?php endif; ?>

  <!-- Main Content -->
  <main class="container mx-auto p-4">
    <section class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
      <h2 class="text-2xl font-bold mb-4">Connexion</h2>
      <?php if (isset($_SESSION['message'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
          <?= $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
      <?php endif; ?>
      <form  method="POST">
        <div class="mb-4">
          <label class="block text-gray-700" for="email">Adresse e-mail</label>
          <input class="w-full px-3 py-2 border rounded-lg" id="email" name="email" required type="email"/>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700" for="password">Mot de passe</label>
          <input class="w-full px-3 py-2 border rounded-lg" id="password" name="password" required type="password"/>
        </div>
        <div class="mb-4">
          <button class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">Se connecter</button>
        </div>
      </form>
      <p class="text-center">
        Pas encore de compte ? <a class="text-blue-600 hover:underline" href="../views/register.php">Inscrivez-vous</a>
      </p>
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