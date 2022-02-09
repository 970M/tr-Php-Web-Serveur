<?php

require_once File::build_path(array('model', 'ModelVoiture.php')); // chargement du modèle

class ControllerVoiture {

    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD

        $view = "list";
        $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function read() {
        if (isset($_GET['immat'])) {
            $immat = $_GET['immat'];
            $v = ModelVoiture::getVoitureByImmat($immat);
            if ($v === false) {
                $view = "error";
            } else {
                $view = "detail";
            }
        } else {
            $view = "error";
        }
        
        $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function create() {
        $view = "create";
        $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        if (isset($_GET['immatriculation']) && isset($_GET['marque']) && isset($_GET['couleur'])) {
            $v = new ModelVoiture($_GET['marque'], $_GET['couleur'], $_GET['immatriculation']);
            $save_succesful = $v->save();
            if ($save_succesful) {
                $tab_v = ModelVoiture::getAllVoitures();
                $view = "created";
            } else {
                $view = "error";
            }
        } else {
            $view = "error";
        }
        
        $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function error() {
        $view = "error";
        $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    // public static function delete() {        
    //     if (isset($_GET['immat'])) {
    //         $immat = $_GET['immat'];
    //         $delete_successful = ModelVoiture::deleteByImmat($_GET['immat']);
    //         $tab_v = ModelVoiture::getAllVoitures();
    //         if ($delete_successful) {
    //             $view = "deleted";
    //         } else {
    //             $view = "error";
    //         }
    //     } else {
    //         $view = "error";
    //     }

    //     $controller = "voiture";
    //     $pagetitle = "Gestion des voitures";
    //     require File::build_path(array("view", "view.php"));
    // }

    // public static function update() {
    //     if (isset($_GET['immatriculation']) && isset($_GET['marque']) && isset($_GET['couleur'])) {
    //         $immatHTML = htmlspecialchars($_GET['immatriculation']);
    //         $marqueHTML = htmlspecialchars($_GET['marque']);
    //         $couleurHTML = htmlspecialchars($_GET['couleur']);
    //         $view = 'update';
    //     } else {
    //         $view = "error";
    //     }

    //     $controller = "voiture";
    //     $pagetitle = "Gestion des voitures";
    //     require File::build_path(array("view", "view.php"));
    // }

    // public static function updated() {
    //     if (isset($_GET['immatriculation']) && isset($_GET['marque']) && isset($_GET['couleur'])) {
    //         $data = array(
    //             "marque" => $_GET['marque'],
    //             "couleur" => $_GET['couleur'],
    //             "immat" => $_GET['immatriculation']
    //         );
    //         $immat = $_GET['immatriculation'];
    //         $update_successful = ModelVoiture::update($data);
    //         if ($update_successful) {
    //             $tab_v = ModelVoiture::getAllVoitures();
    //             $view = "updated";
    //         } else {
    //             $view = "error";
    //         }
    //     } else {
    //         $view = "error";
    //     }
        
    //     $controller = "voiture";
    //     $pagetitle = "Gestion des voitures";
    //     require File::build_path(array("view", "view.php"));
    // }

}






