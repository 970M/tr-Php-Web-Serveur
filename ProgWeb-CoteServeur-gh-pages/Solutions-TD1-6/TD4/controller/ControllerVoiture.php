<?php

require_once('../model/ModelVoiture.php'); // chargement du modèle

class ControllerVoiture
{

    public static function readAll()
    {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require('../view/voiture/list.php');  //"redirige" vers la vue
    }

    public static function read()
    {
        if (isset($_GET['immat'])) {
            $immat = $_GET['immat'];
            $v = ModelVoiture::getVoitureByImmat($immat);
            if ($v === false) {
                require('../view/voiture/error.php');
            } else {
                require('../view/voiture/detail.php');
            }
        } else {
            require('../view/voiture/error.php');
        }
    }

    public static function create()
    {
        require('../view/voiture/create.php');
    }

    public static function created()
    {
        if (isset($_GET['immatriculation']) && isset($_GET['marque']) && isset($_GET['couleur'])) {
            $v = new ModelVoiture($_GET['marque'], $_GET['couleur'], $_GET['immatriculation']);
            $save_succesful = $v->save();
            if ($save_succesful) {
                self::readAll();
            } else {
                require('../view/voiture/error.php');
            }
        } else {
            require('../view/voiture/error.php');
        }
    }
}
