

<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Catalogue des Cours</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
</head>
<body class="font-roboto bg-gray-100">
  <header class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Catalogue des Cours</h1>
      <nav>
        <ul class="flex space-x-4">
          <li><a class="hover:underline" href="home.php">Accueil</a></li>
          <li><a class="hover:underline" href="Catalogue.php">Catalogue</a></li>
          <li><a class="hover:underline" href="login.php">Connexion</a></li>
          <li><a class="hover:underline" href="register.php">Inscription</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4">
    <section class="mb-8">
      <h2 class="text-xl font-bold mb-4">Recherche de cours</h2>
      <form class="flex space-x-2" method="GET" action="Catalogue.php">
        <input class="w-full p-2 border border-gray-300 rounded" placeholder="Rechercher des cours..." type="text" name="search"/>
        <button class="bg-blue-600 text-white p-2 rounded" type="submit">Rechercher</button>
      </form>
    </section>

    <section>
      <h2 class="text-xl font-bold mb-4">Catalogue des Cours</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($courses as $course): ?>
          <div class="course-item bg-white p-4 rounded-lg shadow-lg">
            <img alt="Image de couverture du cours sur la data science" src="<?= htmlspecialchars($course['image']);?>" onerror="this.src='https://placehold.co/800x1200'" />
            <h3 class="text-xl font-bold mt-4">
              <?= htmlspecialchars($course['title']); ?>
            </h3>
            <p class="mt-2">
              <?= htmlspecialchars($course['description']); ?>
            </p>
            <a class="text-blue-600 hover:underline mt-2 block" href="login.php">
              Voir les détails
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Pagination Section -->
    <section class="mt-8">
      <h2 class="text-xl font-bold mb-4">Pagination</h2>
      <div class="flex justify-center space-x-2">
        <button id="prev" class="bg-gray-300 text-gray-700 p-2 rounded" disabled>
          Précédent
        </button>
        <div id="page-buttons" class="flex space-x-2"></div>
        <button id="next" class="bg-gray-300 text-gray-700 p-2 rounded">
          Suivant
        </button>
      </div>
    </section>
  </main>

  <footer class="bg-blue-600 text-white p-4 mt-8">
    <div class="container mx-auto text-center">
      <p>© 2023 Catalogue des Cours. Tous droits réservés.</p>
    </div>
  </footer>
</body>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const coursesPerPage = 6; 
  let currentPage = 1;

  const courses = document.querySelectorAll('.course-item');
  const totalPages = Math.ceil(courses.length / coursesPerPage);

  const prevButton = document.querySelector('#prev');
  const nextButton = document.querySelector('#next');
  const pageButtonsContainer = document.querySelector('#page-buttons');

  function showCourses(page) {
    const startIndex = (page - 1) * coursesPerPage;
    const endIndex = startIndex + coursesPerPage;

    courses.forEach((course, index) => {
      if (index >= startIndex && index < endIndex) {
        course.style.display = 'block';
      } else {
        course.style.display = 'none';
      }
    });

    prevButton.disabled = page === 1;
    nextButton.disabled = page === totalPages;

    const pageButtons = pageButtonsContainer.querySelectorAll('.page-button');
    pageButtons.forEach(button => {
      if (parseInt(button.innerText) === page) {
        button.classList.add('bg-blue-600', 'text-white');
        button.classList.remove('bg-gray-300', 'text-gray-700');
      } else {
        button.classList.remove('bg-blue-600', 'text-white');
        button.classList.add('bg-gray-300', 'text-gray-700');
      }
    });
  }

  function createPageButtons() {
    pageButtonsContainer.innerHTML = '';
    for (let i = 1; i <= totalPages; i++) {
      const button = document.createElement('button');
      button.innerText = i;
      button.classList.add('page-button', 'bg-gray-300', 'text-gray-700', 'p-2', 'rounded');
      button.addEventListener('click', function() {
        currentPage = i;
        showCourses(currentPage);
      });
      pageButtonsContainer.appendChild(button);
    }
  }

  prevButton.addEventListener('click', function() {
    if (currentPage > 1) {
      currentPage--;
      showCourses(currentPage);
    }
  });

  nextButton.addEventListener('click', function() {
    if (currentPage < totalPages) {
      currentPage++;
      showCourses(currentPage);
    }
  });

  createPageButtons();
  showCourses(currentPage);
});
</script>
</html>