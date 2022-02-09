<?php
require_once "Model.php";


// --- FETCH_OBJ ---

$pdo = Model::getPDO();
$rep = $pdo->query("SELECT * FROM voiture");
$tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);

//var_dump($tab_obj[0]);

foreach ($tab_obj as $key => $value) {

    echo "$key </br>";
    var_dump($value);
    echo "</br>";

    foreach ($value as $key => $value) {

        echo "$key - $value <br>";
    }
}


// --- FETCH_TAB --- Qu'est ce que ça change ?

$rep_array = $pdo->query("SELECT * FROM voiture");
$tab_array = $rep_array->fetchAll(PDO::FETCH_ASSOC);
// var_dump($tab_array);

foreach ($tab_array as $key => $value) {


    echo "$key </br>";
    var_dump($value);
    echo "</br>";

    foreach ($value as $key => $value) {

        echo "$key - $value <br>";
    }
}
