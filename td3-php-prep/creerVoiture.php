<?php
require_once 'Voiture.php';

if (isset($_POST['immatriculation']) && isset($_POST['marque']) && isset($_POST['couleur'])) {
    // on affiche nos résultats
    $vehicule1 = new Voiture(["marque" => $_POST['marque'], "couleur" => $_POST['couleur'], "immatriculation" => $_POST['immatriculation']]);

    var_dump($_POST);


    $vehicule1->afficher();
    $vehicule1->save();
}
