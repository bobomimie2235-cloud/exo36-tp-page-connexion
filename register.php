<!-- Inscription (INSERT + password_hash) -->
<?php

// Inclusion de la connexion à la base
require_once 'db.php';

// Verification de la methode HTTP (formulaire envoyé et requête HTTP est un bien un POST)
// empêche l'exécution du code si quelqu'un accède directement par URL
if($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des données du formulaire (correspond à l'attribut name)
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verification si l'email existe déjà. Prépare une requête SQL sécurisée
    // :email est un paramètre nommé
    $check = $pdo->prepare('SELECT id FROM users WHERE email = :email');
    $check->execute([":email" => $email]);
    
    // fecth() récupère une ligne si elle existe
    $result = $check->fetch();

    // Test du résultat (si$result est vrai -> email déjà présent dans la BDD = le script affiche un message d'erreur)
    if($result) {
        // Attention : être vague sur la cause de la non connexion
        echo "cet email ou ce password sont déjà pris.";
    } else {

        // Hashage du mot de passe - transforme le mot de passe en hash sécuriée - algorithme Argon2ID. Obligatoire pour la sécurité
        $hash = password_hash($password, PASSWORD_ARGON2ID);

        // Insertion de l'utilisateur en base
        $insert = $pdo->prepare(
            "INSERT INTO users (email, password) VALUES (:email, :password)"
        );
        $insert->execute([
            ":email" => $email, 
            ":password" => $hash
        ]);

        // Redirection vers la page de connexion
        header("Location: login.php");

        // Exit pour arrêter le script
        exit;
    }}
?>