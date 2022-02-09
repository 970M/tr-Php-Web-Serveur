<?php
$immatHTML = htmlspecialchars($v->get("immatriculation"));
$marqueHTML = htmlspecialchars($v->get("marque"));
$couleurHTML = htmlspecialchars($v->get("couleur"));
$immatURL = rawurlencode($v->get("immatriculation"));
$marqueURL = rawurlencode($v->get("marque"));
$couleurURL = rawurlencode($v->get("couleur"));

// Astuce dans VS Code pour avoir une chaine HTML avec de la coloration syntaxique
echo <<< HTML
    <p> 
        Voiture $immatHTML de marque $marqueHTML (Couleur $couleurHTML)  
        <a href="?action=update&immatriculation=$immatURL&couleur=$couleurURL&marque=$marqueURL">
            Mettre à jour
        </a>
    </p>
HTML;