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
