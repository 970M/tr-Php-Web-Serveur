<?php
require_once "Trajet.php";

if (isset($_POST['id'])) {
    // --- test getVoitureByImmat()
    $u_tab = Trajet::findPassagers($_POST['id']);
    foreach ($u_tab as $u) {
        $u->afficher();
        echo "</br>";
    }
}
