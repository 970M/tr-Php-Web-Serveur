<?php

class Utilisateur {
    
    private $login;
    private $nom;
    private $prenom;
    
    // Getter générique
    public function get($nom_attribut) {
        return $this->$nom_attribut;
    }
    
    // Setter générique
    public function set($nom_attribut, $valeur) {
        $this->$nom_attribut = $valeur;
    }
    
    // un constructeur classique
    public function __construct($login, $nom, $prenom) {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom)){
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
        }
    }
    
    // une methode d'affichage.
    public function afficher() {
        echo "<p> Utilisateur {$this->prenom} {$this->nom} de login {$this->login} </p>";
    }


    public static function getAllUtilisateurs() : array {
        $rep = Model::getPDO()->query("SELECT * FROM utilisateur");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');        
        return $rep->fetchAll();
    }
}