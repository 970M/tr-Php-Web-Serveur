<?php
$vImmat = htmlspecialchars($immat);
echo "<p>La voiture d'immatriculation $vImmat a bien été supprimée</p>";
require File::build_path(array('view','voiture','list.php'));
