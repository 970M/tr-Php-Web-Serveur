<?php

require_once File::build_path(array('model', 'ModelUtilisateur.php')); // chargement du modèle

class ControllerUtilisateur {

    protected static $object = 'utilisateur';

    public static function readAll() {
        // Avant le modèle générique dans Model.php
        // $tab_u = ModelUtilisateur::getAllUtilisateurs();     //appel au modèle pour gerer la BD
        $tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        
        $view = "list";
        // Avant la gestion du controlleur par la vue générique view.php
        //$controller = "utilisateur";
        $pagetitle = "Gestion des utilisateurs";
        require File::build_path(array("view", "view.php"));
    }

    public static function read() {
        if (isset($_GET['login'])) {
            $login = $_GET['login'];
            $u = ModelUtilisateur::select($login);
            if ($u === false) {
                $view = "error";
            } else {
                $view = "detail";
            }
        } else {
            $view = "error";
        }

        $pagetitle = "Gestion des utilisateurs";
        require File::build_path(array("view", "view.php"));
    }

    public static function delete() {        
        if (isset($_GET['login'])) {
            $login = $_GET['login'];
            $delete_successful = ModelUtilisateur::delete($login);
            $tab_u = ModelUtilisateur::selectAll();
            if ($delete_successful) {
                $view = "deleted";
            } else {
                $view = "error";
            }
        } else {
            $view = "error";
        }
        
        $pagetitle = "Gestion des utilisateurs";
        require File::build_path(array("view", "view.php"));
    }

    public static function create() {
        $view = "update";
        $pagetitle = "Gestion des utilisateurs";
        $loginHTML = "";
        $prenomHTML = "";
        $nomHTML = "";
        $next_action = "created";
        $primary_property = "required";
        require File::build_path(array("view", "view.php"));
    }

    public static function update() {
        $view = "update";
        $pagetitle = "Gestion des utilisateurs";
        if (isset($_GET['login'])) {
            $login = $_GET['login'];
            $u = ModelUtilisateur::select($login);
            if ($u === false){
                $view = "error";
            } else {
                $loginHTML = htmlspecialchars($login);
                $prenomHTML = htmlspecialchars($u->get("prenom"));
                $nomHTML = htmlspecialchars($u->get("nom"));
                $next_action = "updated";
                $primary_property = "readonly";
                $view = 'update';
            }
        } else {
            $view = "error";
        }
        require File::build_path(array("view", "view.php"));
    }

    public static function updated() {
        $pagetitle = "Gestion des utilisateurs";
        if (isset($_GET['login']) && isset($_GET['prenom']) && isset($_GET['nom'])) {
            $data = array(
                "prenom" => $_GET['prenom'],
                "nom" => $_GET['nom'],
                "login" => $_GET['login']
            );
            $login = $_GET['login'];
            $update_successful = ModelUtilisateur::update($data);
            if ($update_successful) {
                $tab_u = ModelUtilisateur::selectAll();
                $view = "updated";
            } else {
                $view = "error";
            }
        } else {
            $view = "error";
        }
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $pagetitle = "Gestion des utilisateurs";
        if (isset($_GET['login']) && isset($_GET['prenom']) && isset($_GET['nom'])) {
            // Autre façon de faire avec un save générique non statique (cf Model.php)
            // $u = new ModelUtilisateur($_GET['login'], $_GET['nom'], $_GET['prenom']); 
            // $save_succesful = $u->save();
            $data = array(
                "prenom" => $_GET['prenom'],
                "nom" => $_GET['nom'],
                "login" => $_GET['login']
            );
            $save_succesful = ModelUtilisateur::save($data);
            if ($save_succesful) {
                $tab_u = ModelUtilisateur::selectAll();
                $view = "created";
            } else {
                $view = "error";
            }
        } else {
            $view = "error";
        }
        require File::build_path(array("view", "view.php"));
    }

}
