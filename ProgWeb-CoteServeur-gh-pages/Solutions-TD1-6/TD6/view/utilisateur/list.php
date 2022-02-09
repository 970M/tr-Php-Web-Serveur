<?php
echo "<h3>Liste des utilisateurs :</h3>\n";
echo "<ul>\n";
foreach ($tab_u as $u) {
    $uLoginHTML = htmlspecialchars($u->get("login"));
    $uLoginURL = rawurlencode($u->get("login"));
    echo <<< HTML
        <li> 
            Utilisateur de login $uLoginHTML
            <a href="?action=read&controller=utilisateur&login=$uLoginURL">(+ d'info)</a>
        </li>\n
HTML;
}
echo "</ul>\n";
echo "<a href='?action=create&controller=utilisateur'>Créer un utilisateur</a>\n";