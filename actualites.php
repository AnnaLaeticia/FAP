<?php
session_start();
$estConnecte = isset($_SESSION['utilisateur_id']);

// Actualités de base
$actualites_de_base = [
    [
        'image' => "images/news.jpg",
        'titre' => "Fouilles archéologiques en centre-ville : un site gallo-romain mis au jour",
        'texte' => "Une opération de sauvetage archéologique exceptionnelle a débuté en plein cœur de Lyon, révélant les vestiges d’un ancien quartier gallo-romain sous les pavés de la ville...",
        'footer' => "Il y a une semaine",
    ],
    [
        "image" => "images/new-1.jpg",
        'titre' => "Nouvelle découverte sur le chantier de fouilles à Montpellier !",
        'texte' => "Le 30 Avril, nos archéologues ont mis au jour un impressionnant fossile partiellement enfoui, probablement celui d’un grand reptile préhistorique...",
        'footer' => "Il y a 3 semaines",
    ],
    [
        "image" => "images/new-2.jpg",
        'titre' => "Analyse en laboratoire : des fragments de poterie livrent leurs secrets",
        'texte' => "Après les dernières fouilles à Autun, plusieurs fragments de céramique ont été transférés au laboratoire pour analyse...",
        'footer' => "Il y a 4 jours",
    ],
];

// Actualités supplémentaires pour les utilisateurs connectés
$actualites_supplementaires = [
    [
        "image" => "images/new-3.jpg",
        "alt" => "Analyse ADN",
        "titre" => "Découverte de fossiles massifs en pleine fouille",
        "texte" => "Lors d'une campagne de fouilles récente, une équipe d'archéologues a mis au jour un impressionnant amas de grands ossements enfouis dans une couche profonde du sol...",
        "footer" => "📍 Tours — Juin 2025"
    ],
    [
        "image" => "images/new-4.jpg",
        "alt" => "Simulation 3D",
        "titre" => "Objets antiques exposés au musée",
        "texte" => "Les artefacts découverts lors des chantiers de fouilles prennent vie dans ce superbe espace muséal...",
        "footer" => "📍 Bourges — Mai 2025"
    ],
    [
        "image" => "images/new-5.jpg", 
        "alt" => "Formation sur le terrain",
        "titre" => "ArchéoCamp",
        "texte" => "Archéo-IT a lancé son programme annuel de formation pratique pour étudiants en archéologie, avec ateliers, fouilles et modélisation.",
        "footer" => "📍 Dijon — Avril 2025"
    ],
];

// Redirection si utilisateur non connecté et clic sur "voir plus"
if (!$estConnecte && isset($_GET['voir_plus'])) {
    header("Location: connexion.php");
    exit;
}

// Construire la liste d'actualités à afficher
$actualites_a_afficher = $actualites_de_base;

if ($estConnecte && isset($_GET['voir_plus'])) {
    $actualites_a_afficher = array_merge($actualites_de_base, $actualites_supplementaires);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nos actualités</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<header class="text-center py-5 bg-dark text-white">
    <h1>Nos Actualités</h1>
    <?php if ($estConnecte): ?>
        <p>Bienvenue <?= htmlspecialchars($_SESSION['utilisateur_nom'] ?? '') ?>, voici les dernières actualités</p>
    <?php else: ?>
        <p>Explorez nos dernières actualités. Connectez-vous pour en voir plus avec images !</p>
    <?php endif; ?>
</header>

<main class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($actualites_a_afficher as $actu): ?>
            <div class="col">
                <div class="card h-100 shadow">
                    <?php if (isset($actu['image'])): ?>
                        <img src="<?= htmlspecialchars($actu['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($actu['alt'] ?? 'Illustration') ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($actu['titre']) ?></h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars($actu['texte'])) ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <?= htmlspecialchars($actu['footer']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
        <?php if (!$estConnecte): ?>
            <a href="connexion.html" class="btn btn-primary">Se connecter pour voir plus</a>
        <?php elseif (!isset($_GET['voir_plus'])): ?>
            <a href="?voir_plus=1" class="btn btn-success">Voir plus d'actualités avec images</a>
        <?php else: ?>
            <a href="actualites.php" class="btn btn-secondary">Voir moins</a>
        <?php endif; ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
