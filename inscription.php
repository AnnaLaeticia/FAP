<?php
include 'db.php'; // connexion à la BDD

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $mot_de_passe = trim($_POST['mot_de_passe']);

    // Vérifier que l'email n'existe pas déjà
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        die("Cet email est déjà utilisé. <a href='inscription.html'>Retour</a>");
    }

    $hash_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nom, $prenom, $email, $hash_password])) {
        echo "Inscription réussie ! <a href='connexion.html'>Connectez-vous</a>";
    } else {
        echo "Erreur lors de l'inscription. <a href='inscription.html'>Retour</a>";
    }
} else {
    header('Location: inscription.html'); // redirige si accès direct
}
