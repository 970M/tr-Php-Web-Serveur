<?php
require_once __DIR__ . '/../model/ModelVoiture.php'; // chargement du modèle
class ControllerVoiture
{
    public static function readAll()
    {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require __DIR__ . '/../view/voiture/list.php';  //"redirige" vers la vue
    }
}
