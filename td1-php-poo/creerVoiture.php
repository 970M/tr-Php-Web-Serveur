<?php
require_once 'Voiture.php';

if (isset($_POST['immatriculation']) && isset($_POST['marque']) && isset($_POST['couleur'])) {
    // on affiche nos résultats
    $vehicule1 = new Voiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
    $vehicule1->afficher();
}
