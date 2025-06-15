<?php
session_start();
$estConnecte = isset($_SESSION['utilisateur_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
</head>
<body>
<section id="container">
<header>
    <div class="logo">
        <p>Archeo-it</p>
    </div>
    <ul class="menu">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="chantier.php">Nos chantiers</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php if ($estConnecte): ?>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="connexion.html">Connexion</a></li>
            <li><a href="inscription.html">Inscription</a></li>
        <?php endif; ?>
    </ul>
</header>

<div class="container-text">
    <h1>ARCHEO-IT</h1>
</div>
</section>

<!-- Deuxième header -->
<header class="header2">
    <ul class="menu">
        <li><a href="contact.html">Contact</a></li>
        <?php if ($estConnecte): ?>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="inscription.php">Inscription</a></li>
        <?php endif; ?>
    </ul>
</header>

<!-- Section présentation sans vidéo -->
<section id="presentation" class="text-center text-white py-5" style="min-height: 300px; background: rgba(0,0,0,0.5);">
  <div class="container">
    <h2 class="mb-4">Qui sommes-nous ?</h2>
    <p class="lead">
      Archéo-IT est une entreprise fondée en 2018 à Orléans, qui allie passion pour l’archéologie et innovations numériques.
      Grâce à des outils comme la modélisation 3D, la cartographie interactive ou la réalité augmentée, nous redonnons vie au passé et valorisons le patrimoine archéologique français.
    </p>
    <p>
      Basée au cœur du Val de Loire, Archéo-IT collabore avec des musées, chercheurs et institutions culturelles pour construire une archéologie moderne, vivante et accessible à tous.
    </p>
    <a href="chantier.php" class="btn btn-warning mt-3 fw-bold">Découvrir nos chantiers</a>
  </div>
</section>

<!-- Section dernières actualités -->
<section id="actu" class="container my-5">
    <h3>Les dernières actualités</h3>
    <div class="card-group">
      <div class="card">
        <img src="images/img2.jpg" class="card-img-top" alt="Fouilles archéologiques">
        <div class="card-body">
          <h5 class="card-title">Fouilles archéologiques en centre-ville : un site gallo-romain mis au jour</h5>
          <p class="card-text">Une opération de sauvetage archéologique exceptionnelle a débuté en plein cœur de Lyon, révélant les vestiges d’un ancien quartier gallo-romain sous les pavés de la ville. De nombreux passants ont pu assister aux premières découvertes, témoignant de l’intérêt croissant du public pour notre patrimoine historique.<br>
          Les premières fouilles laissent entrevoir des structures d’habitation et plusieurs artefacts datant du Ier siècle.<br>
          📍 Centre-ville de Lyon | Mai 2025</p>
          <p class="card-text"><small class="text-body-secondary">Il y a une semaine</small></p>
        </div>
        <p class="act">Récent</p>
      </div>
      <div class="card">
        <img src="images/ar.jpg" class="card-img-top" alt="Découverte fouilles Montpellier">
        <div class="card-body">
          <h5 class="card-title">Nouvelle découverte sur le chantier de fouilles à Montpellier !</h5>
          <p class="card-text">Le 30 Avril, nos archéologues ont mis au jour un impressionnant fossile partiellement enfoui, probablement celui d’un grand reptile préhistorique. 
            Grâce à un travail minutieux de l’équipe, les ossements sont désormais dégagés et en cours d’analyse. Cette trouvaille ouvre de nouvelles perspectives sur la faune ayant peuplé la région il y a plusieurs millions d’années.<br>
            📍 Chantier de fouilles – Montpellier | Avril 2025</p>
          <p class="card-text"><small class="text-body-secondary">Il y a 3 semaines</small></p>
        </div>
        <p class="act">Récent</p>
      </div>
      <div class="card">
        <img src="images/img1.jpg" class="card-img-top" alt="Analyse fragments poterie">
        <div class="card-body">
          <h5 class="card-title">Analyse en laboratoire : des fragments de poterie livrent leurs secrets</h5>
          <p class="card-text">Après les dernières fouilles à Autun, plusieurs fragments de céramique ont été transférés au laboratoire pour analyse. Les archéologues procèdent actuellement à l’assemblage minutieux des pièces retrouvées, révélant petit à petit leur forme d’origine. 
            Ces artefacts pourraient provenir d’un atelier de potier actif entre le Ier et le IIIe siècle. Une découverte qui enrichit nos connaissances sur les pratiques artisanales de l’époque gallo-romaine.<br>
            📍 Laboratoire – Autun | Mai 2025</p>
          <p class="card-text"><small class="text-body-secondary">Il y a 4 jours</small></p>
        </div>
        <p class="act">Récent</p>
      </div>
    </div>
</section>

<!-- Voir plus d'actualités -->
<div id="div" class="text-center my-4">
  <h3 class="h">Voir plus d'actualités</h3>
  <a href="actualites.php">
    <img src="images/plus.png" alt="Plus d'actualités" class="icon" style="cursor:pointer;">
  </a>
</div>

<!-- Où nous trouver -->
<section id="map" class="text-center my-5 container">
  <h3>📍 Où nous trouver</h3>
  <div class="map-container" style="max-width: 100%; overflow: hidden; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2677.602599699495!2d1.9106874758379793!3d47.847291671212936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e4e5dfb484c969%3A0xe1b49ac14549732b!2sECOLE-IT!5e0!3m2!1sfr!2sfr!4v1749072366470!5m2!1sfr!2sfr"
      width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>

<footer class="site-footer text-center py-3">
  <div class="container">
    <p class="fw-bold mb-1">Archéo-IT © 2025 — Tous droits réservés</p>
    <p class="mb-0">45160 Olivet, France · société@archeo-it.com · +33 6 48 65 23 45</p>
    <?php if (!$estConnecte): ?>
        <a href="connexion.html">Connexion</a> | <a href="inscription.html">Inscription</a>
    <?php else: ?>
        <a href="profil.php">Profil</a> | <a href="deconnexion.php">Déconnexion</a>
    <?php endif; ?>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
