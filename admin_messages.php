<?php
session_start();

// Identifiants admin codés en dur
$adminUser = 'admin';
$adminPass = '123'; // Change-le par un mot de passe fort

// Déconnexion
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin_messages.php');
    exit();
}

// Si pas encore connecté et formulaire envoyé
if (empty($_SESSION['admin_logged_in']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === $adminUser && $pass === $adminPass) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_messages.php');
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}

// Si connecté, connexion base et récupération messages
$messages = [];
if (!empty($_SESSION['admin_logged_in'])) {
    $host = 'localhost';
    $dbname = 'archeo_it';
    $dbUser = 'root';
    $dbPass = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT * FROM messages_contact ORDER BY date_envoi DESC");
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        $dbError = "Erreur base de données : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Admin - Messages Contact</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
        .error { color: red; }
        .logout { margin-top: 20px; }
        .login-form { max-width: 300px; margin: 0 auto; }
        .login-form input { width: 100%; padding: 8px; margin: 8px 0; }
        .login-form input[type="submit"] { background: #28a745; color: white; border: none; cursor: pointer; }
        .login-form input[type="submit"]:hover { background: #218838; }
    </style>
</head>
<body>

<?php
if (empty($_SESSION['admin_logged_in'])) {
    // Affiche formulaire connexion
    ?>
    <h2>Connexion admin</h2>
    <?php
    if (!empty($error)) {
        echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
    }
    ?>
    <form method="POST" class="login-form">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="submit" value="Se connecter">
    </form>
    <?php
} else {
    // Affiche messages reçus
    ?>
    <h2>Messages reçus via le formulaire contact</h2>

    <p><a href="?logout=1">Déconnexion</a></p>

    <?php
    if (!empty($dbError)) {
        echo "<p class='error'>" . htmlspecialchars($dbError) . "</p>";
    } elseif (empty($messages)) {
        echo "<p>Aucun message reçu pour le moment.</p>";
    } else {
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Message</th>
                    <th>Date d'envoi</th>
                </tr>
            </thead>
            <tbody>
        <?php
        foreach ($messages as $m) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($m['id']) . "</td>";
            echo "<td>" . htmlspecialchars($m['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($m['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($m['email']) . "</td>";
            echo "<td>" . htmlspecialchars($m['telephone']) . "</td>";
            echo "<td>" . nl2br(htmlspecialchars($m['message'])) . "</td>";
            echo "<td>" . htmlspecialchars($m['date_envoi']) . "</td>";
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
        <?php
    }
}
?>

</body>
</html>
