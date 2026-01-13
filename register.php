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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<!-- Formulaire de base -->
    <!-- <form method="POST">
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Inscription">
    </form> -->
    
<!-- FORMULAIRE AVEC BOOTSTRAP -->
<div class="container mt-5" style="max-width: 400px;">
    <h1 class="mb-4 text-center">Inscription</h1>
    <form method="POST" class="border p-4 shadow rounded bg-light">
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-success w-100">S'inscrire</button>
        <p class="mt-3 text-center">Déjà inscrit ? <a href="login.php">Connexion</a></p>
    </form>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>