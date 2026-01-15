<?php
class Utilisateur {

private $nom;
public $age;
public $email;
public $prix;

// constructeur

public function __construct($nom, $age, $email) {
    $this->nom = $nom;
    $this->age = $age;
    $this->email = $email;
}

public function sePresenter() {
    echo "Bonjour, je m'appelle $this->nom et j'ai $this->age ans <br>";
}

public function getNom() {
    return $this->nom;
}

public function getPrix() {
    return $this->prix . "€";
}

public function setNom($nom) {
    $this->nom = $nom;
}

}

// instancier un objet
$user1 = new Utilisateur("Julien", 40, "julien@test.fr");
$user2 = new Utilisateur("Emilie", 37, "emilie@test.fr");
$user3 = new Utilisateur("Alicia", 5, "alicia@test.fr");
$user4 = new Utilisateur("Louna", 4, "louna@test.fr");

$user1->sePresenter();
$user2->sePresenter();
$user3->sePresenter();
$user4->sePresenter();

echo "<pre>";
var_dump($user1);

$nom = $user1->getNom();

$user1->setNom("Laura");
echo $user1->getNom();

?>

<!-- public : accessbile et modifiable à l'exterieur de la classe -->
<!-- private : modifiable dans le scope de la classe -->

<!-- Pour modifier private -->

<!-- get : methode en public - recupérer une valeur (string) dans la classe
set :  mettre à jour la valeure-->


<?php
class Utilisateur1 {

public $nom;
public $age;
public $email;

// constructeur

public function __construct($nom, $age, $email) {
    $this->nom = $nom;
    $this->age = $age;
    $this->email = $email;
}

public function sePresenter() {
    echo "Bonjour, je m'appelle $this->nom et j'ai $this->age ans <br>";
}
}

$user1 = new Utilisateur("Julien", 40, "julien@test.fr");
$user2 = new Utilisateur("Emilie", 37, "emilie@test.fr");
$user3 = new Utilisateur("Alicia", 5, "alicia@test.fr");
$user4 = new Utilisateur("Louna", 4, "louna@test.fr");

$user1->sePresenter();
$user2->sePresenter();
$user3->sePresenter();
$user4->sePresenter();

echo "<pre>";
var_dump($user1);

?>