<!-- Affiche un seul user (Récupère $_GET['id']) -->

<?php

// Inclusion de mon Header et appelle de ma SESSION_START
$pageTitle = 'Page de connexion';
require 'header.php';

// Inclusion de la connexion à la base
require 'db.php';

// Protection : utilisateur connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Vérification du paramètre GET

// EXO PARTIE 1
// if (!isset($_GET['id'])) {
//     die("ID manquant");
// }

// EXO PARTIE 2
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<p>ID manquant.</p>";
    require 'footer.php';
    exit;
}

// EXO PARTIE 1
// $id = (int) $_GET['id'];

// EXO PARTIE 2
// Sécuriser l'ID
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if ($id === false) {
    echo "<p>ID invalide.</p>";
    require 'footer.php';
    exit;
}

// Requête SQL
$stmt = $pdo->prepare(
    "SELECT email, created_at FROM users WHERE id = ?"
);
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    die("Utilisateur introuvable");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profil utilisateur</title>
</head>
<body>

<h2>Profil utilisateur</h2>

<!-- EXO PARTIE 1 -->
<!-- <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
<p><strong>Inscrit le :</strong> <?= $user['created_at'] ?></p> -->

<!-- EXO PARTIE 2 -->
<?php if ($user): ?>
    <p><strong>Profil de :</strong> <?= htmlspecialchars($user['email']) ?></p>
    <p><strong>Date d'inscription :</strong> <?= $user['created_at'] ?></p>
<?php else: ?>
    <p>Utilisateur introuvable.</p>
<?php endif; ?>


<a href="list_users.php">Retour à la liste</a>

</body>
</html>

<!-- Inclusion du Footer -->
<?php require 'footer.php'; ?>