<?php

declare(strict_types=1);

class Product {

private string $name;
private float $price;
public string $description;

// Méthode constructeur : 
public function __construct($name, $price) {
    $this->name = $name;
    $this->price = $price;
}

// Méthode get pour récupérer le nom :
public function getName() {
    return $this->name;
}

// Méthode set pour modifier le nom
public function setName($name) {
    $this->name = $name;
}

// Méthode get pour récupérer et formater le prix :
public function getPrice() {
    return $this->price . "€";
}

// Méthode set pour ajouter une sécurité (le prix ne peut être negatif)
public function setPrice ($price) {
    $this->price = $price;
    if ($price <= 0) {
        echo "Le prix $this->price ne peut pas être inférieur à 0 euros.";
    } else {
        echo "Le nouveau prix est $this->price €.";
    }
}

}

$tshirt1 = new Product("T-shirt GEEK", 20);

echo $nom = $tshirt1->getName();
echo "<br>";
echo $price = $tshirt1->getPrice();
echo "<br>";
echo $price = $tshirt1->setPrice(25);
echo "<br>";
echo $price = $tshirt1->setPrice(-15);
echo "<br>";
$tshirt1->description = "Super coton";
echo "La nouvelle description de mon " . $tshirt1->getName() . " est " . $tshirt1->description . ".";