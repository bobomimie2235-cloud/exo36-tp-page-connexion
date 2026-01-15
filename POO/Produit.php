<!-- Créez une classe Produit avec les propriétés nom et prix, puis :

Une méthode afficherDetails() pour afficher les infos. -->


<?php

class Produit {

public $nom;
public $prix;

public function afficherInfos() {
    echo "nom : $this->nom, prix: $this->prix <br>";
}

public function __construct($nom, $prix) {
    $this->nom = $nom;
    $this->prix = $prix;
}

// Réduire le prix de 5 euros

public function reduirePrix() {
    $this->prix = $this->prix - 5;
    echo "Nouveau prix après réduction : $this->prix €<br>";
}

public function presentationProduit() {
    echo "Mon produit est $this->nom et il coûte $this->prix € <br>";
}

}

// instancier / instanciation

$produit1 = new Produit("Livre", 6.50);

$produit1->afficherInfos();
$produit1->reduirePrix();
$produit1->afficherInfos();
$produit1->presentationProduit();

$produit2 = new Produit("Jeux", 16.50);

$produit2->afficherInfos();
$produit2->reduirePrix();
$produit2->afficherInfos();
$produit2->presentationProduit();

?>

<!-- public = accessible par tous
privé = non accessible
protected = sécurisé -->