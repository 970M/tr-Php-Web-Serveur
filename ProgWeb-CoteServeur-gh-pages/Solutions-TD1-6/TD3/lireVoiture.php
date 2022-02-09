<?php

require_once "Model.php";
require_once "Voiture.php";

// Exercice 1
Voiture::getVoitureByImmat("AZE123ZE")->afficher(); 

// Exercice 2
$v = new Voiture("Tesla", "Bleu nuit", rand(0,99999999));
$v->save();
// $v->afficher();



