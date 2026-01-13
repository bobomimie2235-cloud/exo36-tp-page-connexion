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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Bienvenue sur votre tableau de bord</h1>
    <!-- Affichage du nom de l'utilisateur (attention à la sécurité (injection javascript ou mysql)) -->
    <p>Vous êtes actuellement connecté en tant que : <?= htmlspecialchars($_SESSION["user_email"]) ?></p>

<!-- Redirection vers la page logout -->
<a href="logout.php">Déconnexion</a>

<!-- HTML AVEC BOOTSTRAP :  -->
<div class="container mt-5">
    <h1 class="mb-4 text-center">Bienvenue sur votre tableau de bord</h1>
    <div class="card p-4 shadow">
        <p>Vous êtes connecté en tant que : <strong><?= htmlspecialchars($_SESSION['user_email']) ?></strong></p>
        <a href="logout.php" class="btn btn-danger">Déconnexion</a>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>