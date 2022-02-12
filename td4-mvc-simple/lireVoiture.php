<?php

require_once __DIR__ . "/model/ModelVoiture.php";
// echo $_SERVER['DOCUMENT_ROOT'];

$tab_v = ModelVoiture::getAllVoitures();
var_dump($tab_v);
foreach ($tab_v as $v) {
    $v->afficher();
}
