<?php

class ModelUtilisateur extends Model {

    private $login;
    private $nom;
    private $prenom; 
    
    protected static $object = 'utilisateur';
    protected static $primary = 'login';

    // Getter générique
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }
    

    // un constructeur
    public function __construct($login = NULL, $nom = NULL, $prenom = NULL) {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom)) {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
        }
    }

//    // Avant le modèle générique de Model.php
//    public static function getAllUtilisateurs() {
//        try {
//            $pdo = Model::getPDO();
//            $sql = "SELECT * from utilisateur";
//            $rep = $pdo->query($sql);
//            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
//            return $rep->fetchAll();
//        } catch (PDOException $e) {
//            if (Conf::getDebug()) {
//                echo $e->getMessage(); // affiche un message d'erreur
//            } else {
//                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
//            }
//            die();
//        }
//    }
}
