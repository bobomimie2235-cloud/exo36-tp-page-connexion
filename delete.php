<!-- Supprime un user (Récupère $_GET['id']) -->

<?php

// Inclusion de mon Header
$pageTitle = 'Page de connexion';
require 'header.php';

session_start();
require 'db.php';

// Protection
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Vérifier l'ID
if (!isset($_GET['id'])) {
    die("ID manquant");
}

$id = (int) $_GET['id'];

// Suppression
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

// Redirection
header('Location: list_users.php');
exit;

// Inclusion du Footer
require 'footer.php'; ?>