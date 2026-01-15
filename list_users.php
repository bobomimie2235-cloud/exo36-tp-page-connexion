<!-- Liste tous les inscrits (Génère des liens $_GET) -->

<?php

// Inclusion de mon Header
$pageTitle = 'Page de connexion';
require 'header.php';

// Inclusion de la connexion à la base
require_once 'db.php';

// Protection : utilisateur connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupération des utilisateurs
$stmt = $pdo->query("SELECT id, email, created_at FROM users");
$users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>

<body>
    <h2>Liste des utilisateurs</h2>

    <!-- Messages concernant la suppression d'un utilisateur -->
    <?php if (isset($_GET['msg'])): ?>
    <?php if ($_GET['msg'] === 'deleted'): ?>
        <p style="color:green;">Utilisateur supprimé avec succès.</p>
    <?php elseif ($_GET['msg'] === 'self_delete_forbidden'): ?>
        <p style="color:red;">Vous ne pouvez pas vous supprimer vous-même.</p>
    <?php else: ?>
        <p style="color:red;">Action invalide.</p>
    <?php endif; ?>
<?php endif; ?>

    <!-- Table des utilisateurs du site -->
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Date d'inscription</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= $user['created_at'] ?></td>
                <td>
                    <a href="profile.php?id=<?= $user['id'] ?>">Voir profil</a>
                    |
                    <a href="delete.php?id=<?= $user['id'] ?>"
                        onclick="return confirm('Supprimer cet utilisateur ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <br>
    <a href="dashboard.php">Retour dashboard</a>
</body>

</html>

<!-- Inclusion du Footer -->
<?php require 'footer.php'; ?>