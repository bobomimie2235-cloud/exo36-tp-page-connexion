<!-- Supprime un user (Récupère $_GET['id']) -->

<?php

// Inclusion de mon Header et appelle de ma SESSION_START
$pageTitle = 'Page de connexion';
require 'header.php';

require 'db.php';

// Protection : utilisateur connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Vérifier l'ID

// EXO PARTIE 1
// if (!isset($_GET['id'])) {
//     die("ID manquant");
// }

// $id = (int) $_GET['id'];

// EXO PARTIE 2
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: list_users.php?msg=invalid_id');
    exit;
}

// Sécuriser l'ID - Validation
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if ($id === false) {
    header('Location: list_users.php?msg=invalid_id');
    exit;
}

// Empêcher la suppression de soi-même
if ($id === (int) $_SESSION['user_id']) {
    header('Location: list_users.php?msg=self_delete_forbidden');
    exit;
}

// Suppression
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

// Redirection
header('Location: list_users.php');
exit;

// Inclusion du Footer
require 'footer.php'; ?>