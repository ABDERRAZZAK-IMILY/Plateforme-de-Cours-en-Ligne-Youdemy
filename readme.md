# Youdemy: Plateforme de Cours en Ligne 🚀

Youdemy est une plateforme innovante qui vise à révolutionner l’apprentissage en ligne, en offrant des expériences interactives et personnalisées pour les étudiants et les enseignants.

## 📚 Contexte du Projet

Ce projet a été conçu pour fournir une solution pratique et efficace pour la gestion des cours en ligne, répondant aux besoins des visiteurs, étudiants, enseignants et administrateurs grâce à des fonctionnalités avancées et une architecture robuste.

## ✨ Fonctionnalités

### Front Office

- **Visiteur** :
  - Parcours du catalogue des cours avec pagination.
  - Recherche de cours par mots-clés.
  - Création de compte avec choix du rôle (Étudiant ou Enseignant).
  
- **Étudiant** :
  - Accès et recherche dans le catalogue des cours.
  - Consultation des détails des cours : description, contenu, enseignant, etc.
  - Inscription à des cours après authentification.
  - Accès à une section “Mes cours” regroupant les cours rejoints.
  
- **Enseignant** :
  - Ajout de nouveaux cours : titre, description, contenu (vidéo ou document), tags, catégorie.
  - Gestion des cours : modification, suppression, consultation des inscriptions.
  - Section “Statistiques” : nombre d'étudiants inscrits, nombre de cours, etc.

### Back Office

- **Administrateur** :
  - Validation des comptes enseignants.
  - Gestion des utilisateurs : activation, suspension, suppression.
  - Gestion des contenus : cours, catégories, tags.
  - Insertion en masse de tags pour plus d’efficacité.
  - Statistiques globales :
    - Nombre total de cours.
    - Répartition par catégorie.
    - Cours avec le plus d'étudiants inscrits.
    - Top 3 des enseignants les plus performants.

## 🛠️ Exigences Techniques

- **OOP** : Respect des concepts (encapsulation, héritage, polymorphisme).
- **Gestion des relations de base de données** : one-to-many, many-to-many.
- **Utilisation des sessions PHP** pour la gestion des utilisateurs connectés.
- **Validation des données utilisateur côté client et serveur**.
- **Sécurité renforcée contre les attaques XSS, CSRF, et SQL injection**.

## 💻 Technologies Utilisées

- **PHP** : Langage de programmation côté serveur pour la logique métier et la gestion des fonctionnalités backend.
- **MySQL** : Base de données relationnelle pour stocker les informations des utilisateurs, des cours et des statistiques.
- **Tailwind CSS** : Framework CSS pour une conception rapide et réactive.
- **JavaScript** : Ajout d’interactivité côté client, gestion des validations et interactions utilisateur.
- **NGROK** : pour deploy le site web

## ✅ Critères de Performance

- Séparation claire entre la logique métier et l’architecture.
- Application cohérente des concepts OOP.
- Code structuré, lisible et maintenable.
- Compatibilité avec tous types d’écrans.
- Validation côté client et serveur.
- Prévention des vulnérabilités (XSS, CSRF, injections SQL).

## 🌟 Contribuer

Les contributions sont les bienvenues pour améliorer Youdemy. Forkez le projet et soumettez vos pull requests !
