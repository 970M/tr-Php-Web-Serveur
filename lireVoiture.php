<?php
require_once "Model.php";
require_once "Voiture.php";

// --- FETCH_OBJ ---
echo '<h2>FETCH_OBJ</h2>';
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
echo '<h2>FETCH_TAB</h2>';
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

// --- FETCH_CLASS --- 
// créer une instance de la classe Voiture, 
// écrire les attributs correspondants au champs de la BDD puis
// appeler le constructeur sans arguments

// 
echo '<h2>FETCH_CLASS</h2>';
$rep_class = $pdo->query("SELECT * FROM voiture");
$rep_class->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
$tab_voit = $rep_class->fetchAll();
//var_dump($tab_voit);

foreach ($tab_voit as $value) {

    $value->afficher();
}
