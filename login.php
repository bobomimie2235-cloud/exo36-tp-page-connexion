<?php

require_once("db.php");

if($_SERVER["REQUEST_METHOD"] === 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();
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
    <form method="POST">
        <input type="email" name="email" placeholder="email" required >
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Connexion">
</form>
</body>
</html>