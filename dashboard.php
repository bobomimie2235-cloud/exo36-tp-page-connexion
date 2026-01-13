<!-- Page membre (vérification session) -->

<?php
// Démarre session PHP
session_start();

// Vérification de l'utilisateur connecté
if(!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <h1>Bienvenue sur votre tableau de bord</h1>
    <!-- Affichage du nom de l'utilisateur (attention à la sécurité (injection javascript ou mysql)) -->
    <p>Vous êtes actuellement connecté en tant que : <?= htmlspecialchars($_SESSION["user_email"]) ?></p>

<!-- Redirection vers la page logout -->
<a href="logout.php">Déconnexion</a>
</body>
</html>