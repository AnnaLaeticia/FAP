<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'archeo_it'; //nom de base
    $user = 'root';       //utilisateur MySQL
    $pass = '';      //mot de passe

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation et exécution de l'insertion
        $stmt = $pdo->prepare("INSERT INTO messages_contact (nom, prenom, email, telephone, message, date_envoi) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['message']
        ]);

        $success = "Message envoyé avec succès !";

    } catch (PDOException $e) {
        $error = "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Contact</title>
    <link rel="stylesheet" href="style1.css" />
</head>
<body>
<header>
    <div class="logo"><p>Archeo-it</p></div>
    <ul class="menu">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="chantier.php">Nos Chantiers</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="connexion.html">Connexion</a></li>
        <li><a href="inscription.html">Inscription</a></li>
    </ul>
</header>

<section class="body">
    <div class="container">
        <div class="contactinfo">
            <h2>Contact Info</h2>
            <ul class="info">
                <li><img src="images/loc.png" alt="loc">Rue la borgeresse, 45160 Olivet</li>
                <li><img src="images/mail.png" alt="mail">société@archeo-it.com</li>
                <li><img src="images/tel.png" alt="tel">+336-48-65-2345</li>
            </ul>
        </div>
        <div class="contactform">
            <h2>Envoyez un message</h2>

            <?php if (!empty($success)): ?>
                <p style="color:green; font-weight:bold; font-size:1.2em;"><?= $success ?></p>
            <?php else: ?>
                <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

                <form method="POST" action="contact.php" class="formBox">
                    <div class="inputBox">
                        <input type="text" name="nom" required value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
                        <span>Nom</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="prenom" required value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>">
                        <span>Prénom</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                        <span>Adresse Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="tel" name="telephone" required value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>">
                        <span>Téléphone</span>
                    </div>
                    <div class="inputBox w100">
                        <textarea name="message" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                        <span>Écrivez votre message ici</span>
                    </div>
                    <div class="inputBox w100">
                        <input type="submit" value="Envoyez">
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>
</body>
</html>
