<?php
echo "<h3>Liste des voitures :</h3>\n";
echo "<ul>\n";
foreach ($tab_v as $v) {
    $vImmatriculationHTML = htmlspecialchars($v->get("immatriculation"));
    $vImmatriculationURL = rawurlencode($v->get("immatriculation"));
    echo <<< HTML
        <li> 
            Voiture d'immatriculation $vImmatriculationHTML
            <a href="?action=read&immatriculation=$vImmatriculationURL">(+ d'info)</a>
            <a href="?action=delete&immatriculation=$vImmatriculationURL">(supprimer)</a>.
        </li>\n
HTML;
}
echo "</ul>\n";
echo "<a href='?action=create&controller=voiture'>Créer une voiture</a>\n";