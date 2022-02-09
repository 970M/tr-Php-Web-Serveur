<?php
echo "<h3>Liste des voitures :</h3>\n";
echo "<ul>\n";
foreach ($tab_v as $v) {
    $vImmatriculationHTML = htmlspecialchars($v->getImmatriculation());
    $vImmatriculationURL = rawurlencode($v->getImmatriculation());
    echo <<< EOT
        <li> 
            Voiture d'immatriculation $vImmatriculationHTML
            <a href="?action=read&immat=$vImmatriculationURL">(+ d'info)</a>.
            <!-- <a href="?action=delete&immat=$vImmatriculationURL">(supprimer)</a> -->
        </li>\n
EOT;
}
echo "</ul>\n";
echo "<a href='?action=create'>Créer une voiture</a>\n";