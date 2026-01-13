<!-- Connexion PDO (avec try ... catch) Gestion des erreurs -->
<!-- PDO : PHP Data Objects : façon sécurisée et standard en PHP de se connecter
à une base de donnée (Mysql) et d'y exécuter des requêtes. -->

<?php

// try : on place ici le code qui peut provoquer un erreur (ex : connexion à la BDD)
try {

    // Création de la connexion PDO
    // (new pod) : crée connexion à BDD (mysql:) : type de base (host=localhost) : serveur local (dbnale=auth_system) : nom de la BDD 
    // (charset) : encodage ('root') : nom d'utilisateur MySQL ("") mot de passe vide
    $pdo = new PDO('mysql:host=localhost;dbname=auth_system;charset=utf8mb4', 'root', '');

    // Mode de Gestion des erreurs
    // indique à PDO de lancer une exception si une erreur SQL survient (important pour le débogage et la sécurité)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mode de récupération des données
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Si une erreur se produit dans le try, alors PHP entre dans le catch
    // die : arrête le script et affiche le message
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

?>