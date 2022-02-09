<?php

require_once "Model.php";
require_once "Voiture.php";

$rep = Model::getPDO()->query("SELECT * FROM Voiture");

// Exercice 6
// $voiture_tab = $rep->fetchAll(PDO::FETCH_OBJ);

// foreach ($voiture_tab as $voiture) {
//     echo "<p> Voiture {$voiture->immatriculation} de marque {$voiture->marque} (Couleur {$voiture->couleur})  </p>";
// }

// Exercice 7
// $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');

// $voiture_tab = $rep->fetchAll();

// foreach ($voiture_tab as $voiture) {
//     $voiture->afficher();
// }

// Exercice 8
$voiture_tab = Voiture::getAllVoitures();
foreach ($voiture_tab as $voiture) {
    $voiture->afficher();
}


