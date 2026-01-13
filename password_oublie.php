<!-- Ajouter une page "Mot de passe oublié" (simulée) -->

<?php
// On peut récupérer un message de confirmation si nécessaire
$message = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $email = $_POST['email'] ?? '';

    // Verifier dans la BDD que l'email existe :
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    // on simule la vérification en base
    $message = "Si l'email <strong>" . htmlspecialchars($email) . "</strong> existe, un lien de réinitialisation a été envoyé.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Mot de passe oublié</h1>

    <?php if ($message): ?>
        <p><?= $message ?></p>
    <?php else: ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Votre email" required>
            <input type="submit" value="Réinitialiser le mot de passe">
        </form>
    <?php endif; ?>

    <p><a href="login.php">Retour à la connexion</a></p>

<!-- HTML AVEC BOOTSTRAP -->

<div class="container mt-5" style="max-width: 400px;">
    <h1 class="mb-4 text-center">Mot de passe oublié</h1>
    <form method="POST" class="border p-4 shadow rounded bg-light">
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
        </div>
        <button type="submit" class="btn btn-warning w-100">Réinitialiser</button>
        <p class="mt-3 text-center"><a href="login.php">Retour à la connexion</a></p>
    </form>
</div>


    <!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>