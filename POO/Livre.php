<?php

class Livre {
public $titre;
public $auteur;
public $anneePublication;
public $estEmprunte;

public function __construct($titre, $auteur, $anneePublication) {
    $this->titre = $titre;
    $this->auteur = $auteur;
    $this->anneePublication = $anneePublication;
    $this->estEmprunte = false;
}

// methode dans une classe  (ex:afficher, rendre, emprunter)

public function afficherInfos() {
    echo "titre : $this->titre, auteur: $this->auteur, année publication : $this->anneePublication <br>";
}

public function emprunter() {
    $this->estEmprunte === true;
    echo "Le livre $this->titre a été emprunté. <br>";
}

public function rendre() {
    $this->estEmprunte === false;
    echo "Le livre $this->titre a été rendu. <br>";
}

}

$livre1 = new Livre ("Trésor","Oda",1998);
$livre1->afficherInfos();
$livre1->emprunter();
$livre1->rendre();


?>

