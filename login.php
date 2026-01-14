<!-- Connexion (SELECT + password verify) -->
<!-- afficher un formulaire de connexion, récupérer l'email et password, cherche user dans BDD -->

<?php

// démarrage de la session PHP (permet de stocker des données côté serveur)
    session_start();

// Inclusion de la connexion PDO
require_once("db.php");


// Inclusion de mon Header
$pageTitle = 'Page de connexion';
require 'header.php';

// Verification de la methode POST
if($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Récupération des données de Formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Récupération de la requête SQL
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    // Exécution de la requête
    $stmt->execute([':email' => $email]);
    // Récupération de l'utilisateur
    $user = $stmt->fetch();

// Condition if pour vérifier que l'utilisateur existe dans la BDD et le password
if ($user && password_verify($password, $user['password'])) {
    
    // Stockage des infos utilisateurs en session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    // Redirection vers l'espace membre
    header("Location: dashboard.php");
    exit;
    // En cas d'erreur, un message s'affiche
} else {
    echo "Email ou mot de passe incorrect";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1>PAGE DE CONNEXION</h1>

    <!-- FORMUALIRE DE BASE AVANT BOOTSTRAP -->
    <!-- Formulaire de connexion avec la method POST -->
    <!-- <form method="POST">
        <input type="email" name="email" placeholder="email" required >
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Connexion">
</form> -->

<!-- FORMULAIRE MODIFIER AVEC BOOTSTRAP -->
<div class="container mt-5" style="max-width: 400px;">
    <h1 class="mb-4 text-center">Connexion</h1>
    <form method="POST" class="border p-4 shadow rounded bg-light">
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        <p class="mt-3 text-center"><a href="forgot_password.php">Mot de passe oublié ?</a></p>
        <p class="text-center">Pas de compte ? <a href="register.php">Inscrivez-vous</a></p>
    </form>
</div>


<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<!-- Inclusion du Footer -->
<?php require 'footer.php'; ?>