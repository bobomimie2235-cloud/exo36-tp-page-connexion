<?php

require_once 'db.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $check = $pdo->prepare('SELECT id FROM users WHERE email = :email');
    $check->execute([":email" => $email]);

    $result = $check->fetch();

    if($result) {
        echo "cet email ou ce password sont déjà pris.";
    } else {
        $hash = password_hash($password, PASSWORD_ARGON2ID);
        $insert = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $insert->execute([":email" => $email, ":password" => $password]);

        header("Location: login.php");
        exit;
    }
}

?>