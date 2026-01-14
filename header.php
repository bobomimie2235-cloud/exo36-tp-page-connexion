<?php
// Démarrage de session UNIQUEMENT si pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Titre par défaut
if (!isset($pageTitle)) {
    $pageTitle = 'TP Auth';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP Auth - <?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>TP Auth</h1>

    <nav>
        <a href="login.php">Connexion</a> |
        <a href="register.php">Inscription</a> |

        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="dashboard.php">Dashboard</a> |
            <a href="list_users.php">Utilisateurs</a> |
            <a href="logout.php">Déconnexion</a>
        <?php endif; ?>
    </nav>

    <hr>
</header>