<?php

require_once File::build_path(array('model', 'ModelVoiture.php')); // chargement du modèle

class ControllerVoiture {

    protected static $object = 'voiture';

    public static function readAll() {
        $tab_v = ModelVoiture::selectAll();     //appel au modèle pour gerer la BD

        $view = "list";

        // Avant la gestion du controlleur par la vue générique view.php
        // $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function read() {
        if (isset($_GET['immatriculation'])) {
            $immat = $_GET['immatriculation'];

            // Avant le modèle générique dans Model.php
            // $v = ModelVoiture::getVoitureByImmat($immat);
            $v = ModelVoiture::select($immat);
            if ($v === false) {
                $view = "error";
            } else {
                $view = "detail";
            }
        } else {
            $view = "error";
        }
        
        // Avant la gestion du controlleur par la vue générique view.php
        // $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function create() {
        // Avant la fusion des vues create et update
        // $view = "create";
        $next_action = "created";
        $primary_property = "required";
        $view = 'update';
        $immatHTML = "";
        $marqueHTML = "";
        $couleurHTML = "";

        // Avant la gestion du controlleur par la vue générique view.php
        // $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        if (isset($_GET['immatriculation']) && isset($_GET['marque']) && isset($_GET['couleur'])) {
            // Autre façon de faire avec un save générique non statique (cf Model.php)
            // $v = new ModelVoiture($_GET['marque'], $_GET['couleur'], $_GET['immatriculation']);
            // $save_succesful = $v->save();
            $data = array(
                "marque" => $_GET['marque'],
                "couleur" => $_GET['couleur'],
                "immatriculation" => $_GET['immatriculation']
            );
            $save_succesful = ModelVoiture::save($data);

            if ($save_succesful) {
                // Avant le modèle générique dans Model.php
                // $tab_v = ModelVoiture::getAllVoitures();
                $tab_v = ModelVoiture::selectAll();
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

    public static function delete() {        
        if (isset($_GET['immatriculation'])) {
            $immat = $_GET['immatriculation'];
            // Avant le modèle générique dans Model.php
            // $delete_successful = ModelVoiture::deleteByImmat($_GET['immatriculation']);
            // $tab_v = ModelVoiture::getAllVoitures();
            $delete_successful = ModelVoiture::delete($_GET['immatriculation']);
            $tab_v = ModelVoiture::selectAll();
            if ($delete_successful) {
                $view = "deleted";
            } else {
                $view = "error";
            }
        } else {
            $view = "error";
        }

        // Avant la gestion du controlleur par la vue générique view.php
        // $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function update() {
        if (isset($_GET['immatriculation']) && isset($_GET['marque']) && isset($_GET['couleur'])) {
            $immat = $_GET['immatriculation'];
            $v = ModelVoiture::select($immat);
            if ($v === false) {
                $view = "error";
            } else {
                $immatHTML = htmlspecialchars($immat);
                $marqueHTML = htmlspecialchars($v->get("marque"));
                $couleurHTML = htmlspecialchars($v->get("couleur"));
                $next_action = "updated";
                $primary_property = "readonly";
                $view = 'update';
            }
        } else {
            $view = "error";
        }

        // Avant la gestion du controlleur par la vue générique view.php
        // $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

    public static function updated() {
        if (isset($_GET['immatriculation']) && isset($_GET['marque']) && isset($_GET['couleur'])) {
            $data = array(
                "marque" => $_GET['marque'],
                "couleur" => $_GET['couleur'],
                "immatriculation" => $_GET['immatriculation']
            );
            $immat = $_GET['immatriculation'];
            $update_successful = ModelVoiture::update($data);
            if ($update_successful) {
                $tab_v = ModelVoiture::selectAll();
                $view = "updated";
            } else {
                $view = "error";
            }
        } else {
            $view = "error";
        }
        
        // Avant la gestion du controlleur par la vue générique view.php
        // $controller = "voiture";
        $pagetitle = "Gestion des voitures";
        require File::build_path(array("view", "view.php"));
    }

}






