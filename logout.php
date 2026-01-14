<!-- Destruction session -->

<?php

// Inclusion de mon Header
$pageTitle = 'Page de connexion';
require 'header.php';

// Démarre session PHP
session_start();
// Détruit complètement la session coté serveur
session_destroy();

// redirige l'utilisateur vers la page de connexion
header("Location: login.php");

// Inclusion du Footer
require 'footer.php';

?>