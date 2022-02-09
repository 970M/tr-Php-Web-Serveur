<?php

require_once 'Model.php';

class ModelVoiture {

    private $marque;
    private $couleur;
    private $immatriculation;
    
    // un getter      
    public function getMarque() {
        return $this->marque;
    }
    
    // un setter 
    public function setMarque($m) {
        $this->marque = $m;
    }
    
    public function getImmatriculation() {
        return $this->immatriculation;
    }
    
    public function setImmatriculation($i) {
        if (strlen($i) <= 8) { 
            $this->immatriculation = $i;
        }
    }
    
    public function getCouleur() {
        return $this->couleur;
    }
    
    public function setCouleur($c) {
        $this->couleur = $c;
    }
    
    // un constructeur
    // La syntaxe ... = NULL signifie que l'argument est optionel
    // Si un argument optionnel n'est pas fourni,
    //   alors il prend la valeur par défaut, NULL dans notre cas
    public function __construct($m = NULL, $c = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    }

//    // une methode d'affichage.
//    public function afficher() {
//        echo "<p> Voiture {$this->immatriculation} de marque {$this->marque} (Couleur {$this->couleur})  </p>";
//    }

    public static function getAllVoitures() {
        try {
            $rep = Model::getPDO()->query("SELECT * FROM voiture");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
            return $rep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getVoitureByImmat($immat) {
        try {
            $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nom_tag" => $immat,
                    //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
            $tab_voit = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_voit))
                return false;
            return $tab_voit[0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function save() {
        try {
            $sql = "INSERT INTO voiture (immatriculation, marque, couleur) VALUES (:immat, :marque, :couleur)";
            // Préparation de la requête
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "immat" => $this->immatriculation,
                "marque" => $this->marque,
                "couleur" => $this->couleur,
            );
            // On donne les valeurs et on exécute la requête	 
            return $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                if ($e->errorInfo[1] == 1062) {
                    // Duplicate entry
                    return false;
                }
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

}

?>