<?php
require_once "Model.php";
require_once "Voiture.php";


/* *************************************** */

// --- test getAllVoitures()
$voitures_tab = Voiture::getAllVoitures();
foreach ($voitures_tab as $voiture) {
    $voiture->afficher();
}

// --- test getVoitureByImmat()
$immats_tab = Voiture::getVoitureByImmat("12345678");
$immats_tab->afficher();


// --- test save()
echo "<h2>Test save()</h2>";
$vehicule1 = new Voiture();
$vehicule1->setMarque("Lada");
$vehicule1->setCouleur("Violette");
$vehicule1->setImmatriculation("48526871");
$vehicule1->save();
$vehicule1->afficher();
