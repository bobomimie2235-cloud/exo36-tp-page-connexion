<!-- Connexion (SELECT + password verify) -->
<!-- afficher un formulaire de connexion, récupérer l'email et password, cherche user dans BDD -->

<?php

// Inclusion de la connexion PDO
require_once("db.php");

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
}

// Condition if pour vérifier que l'utilisateur existe dans la BDD et le password
if ($user && password_verify($password, $user['password'])) {
    // démarrage de la session PHP (permet de stocker des données côté serveur)
    session_start();
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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
</head>
<body>
    <h1>PAGE DE CONNEXION</h1>
    <!-- Formulaire de connexion avec la method POST -->
    <form method="POST">
        <input type="email" name="email" placeholder="email" required >
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Connexion">
</form>
</body>
</html>