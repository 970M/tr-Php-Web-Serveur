<?php
$loginHTML = htmlspecialchars($u->get("login"));
$loginURL = rawurlencode($u->get("login"));
$prenomHTML = htmlspecialchars($u->get("prenom"));
$prenomURL = rawurlencode($u->get("prenom"));
$nomHTML = htmlspecialchars($u->get("nom"));
$nomURL = rawurlencode($u->get("nom"));
echo <<< HTML
    <p> 
        Utilisateur $prenomHTML $nomHTML de login $loginHTML
        (
        <a href="?action=update&controller=utilisateur&login=$loginURL&prenom=$prenomURL&nom=$nomURL">
            Mettre à jour
        </a>
        ,
        <a href="?action=delete&controller=utilisateur&login=$loginURL&prenom=$prenomURL&nom=$nomURL">
            Supprimer
        </a>
        )
    </p>
HTML;