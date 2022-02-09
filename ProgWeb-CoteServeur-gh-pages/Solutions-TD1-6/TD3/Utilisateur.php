<?php

require_once "Model.php";
require_once "Trajet.php";

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
    public function __construct($login = null, $nom = null, $prenom = null) {
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
    
    // Exercice 8
    public static function findTrajets($login) {
        try {
            $pdo = Model::getPDO();
            $sql = <<< EOT
SELECT trajet.*
FROM trajet
INNER JOIN passager
ON passager.trajet_id=trajet.id
WHERE passager.utilisateur_login=:login
EOT;
            $req_prep = $pdo->prepare($sql);

            $values = array(
                "login" => $login,
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);            
            
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
            return $req_prep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        
    }
}