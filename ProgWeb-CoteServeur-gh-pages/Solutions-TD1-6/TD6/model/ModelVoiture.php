<?php

require_once 'Model.php';

class ModelVoiture extends Model {

    private $marque;
    private $couleur;
    private $immatriculation;

    protected static $object = 'voiture';
    protected static $primary = 'immatriculation';

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

    // // une methode d'affichage.
    // public function afficher() {
    //     echo "<p> Voiture {$this->immatriculation} de marque {$this->marque} (Couleur {$this->couleur})  </p>";
    // }

    // // Avant le modèle générique dans Model.php
    // public static function getAllVoitures() {
    //     try {
    //         $rep = Model::getPDO()->query("SELECT * FROM voiture");
    //         $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    //         return $rep->fetchAll();
    //     } catch (PDOException $e) {
    //         if (Conf::getDebug()) {
    //             echo $e->getMessage(); // affiche un message d'erreur
    //         } else {
    //             echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
    //         }
    //         die();
    //     }
    // }

    // public static function getVoitureByImmat($immat) {
    //     try {
    //         $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
    //         // Préparation de la requête
    //         $req_prep = Model::getPDO()->prepare($sql);

    //         $values = array(
    //             "nom_tag" => $immat,
    //                 //nomdutag => valeur, ...
    //         );
    //         // On donne les valeurs et on exécute la requête	 
    //         $req_prep->execute($values);

    //         // On récupère les résultats comme précédemment
    //         $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    //         $tab_voit = $req_prep->fetchAll();
    //         // Attention, si il n'y a pas de résultats, on renvoie false
    //         if (empty($tab_voit))
    //             return false;
    //         return $tab_voit[0];
    //     } catch (PDOException $e) {
    //         if (Conf::getDebug()) {
    //             echo $e->getMessage(); // affiche un message d'erreur
    //         } else {
    //             echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
    //         }
    //         die();
    //     }
    // }

    // public function save() {
    //     try {
    //         $sql = "INSERT INTO voiture (immatriculation, marque, couleur) VALUES (:immat, :marque, :couleur)";
    //         // Préparation de la requête
    //         $req_prep = Model::getPDO()->prepare($sql);

    //         $values = array(
    //             "immat" => $this->immatriculation,
    //             "marque" => $this->marque,
    //             "couleur" => $this->couleur,
    //         );
    //         // On donne les valeurs et on exécute la requête	 
    //         return $req_prep->execute($values);
    //     } catch (PDOException $e) {
    //         if (Conf::getDebug()) {
    //             if ($e->errorInfo[1] == 1062) {
    //                 // Duplicate entry
    //                 return false;
    //             }
    //             echo $e->getMessage(); // affiche un message d'erreur
    //         } else {
    //             echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
    //         }
    //         die();
    //     }
    // }

    // public static function deleteByImmat($immat) {
    //     try {
    //         $sql = "DELETE FROM voiture WHERE immatriculation=:immat;";
    //         // Préparation de la requête
    //         $req_prep = Model::getPDO()->prepare($sql);

    //         $values = array(
    //             "immat" => $immat
    //         );
            
    //         // On donne les valeurs et on exécute la requête	 
    //         $req_prep->execute($values);

    //         // PDOStatement::rowCount() retourne le nombre de lignes affectées par la dernière 
    //         // requête DELETE, INSERT ou UPDATE exécutée par l'objet PDOStatement correspondant.
    //         // https://www.php.net/manual/fr/pdostatement.rowcount.php
    //         $del_count = $req_prep->rowCount();

    //         // Renvoie true ssi on a bien supprimé une ligne de la BDD
    //         return ($del_count > 0);
    //     } catch (PDOException $e) {
    //         if (Conf::getDebug()) {
    //             echo $e->getMessage(); // affiche un message d'erreur
    //         } else {
    //             echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
    //         }
    //         die();
    //     }
    // }

    // public static function update($data) {
    //     try {
    //         $sql = "UPDATE voiture SET marque = :marque, couleur = :couleur WHERE immatriculation = :immat";
    //         // Préparation de la requête
    //         $req_prep = Model::getPDO()->prepare($sql);

    //         // On donne les valeurs et on exécute la requête	 
    //         return $req_prep->execute($data);
    //     } catch (PDOException $e) {
    //         if (Conf::getDebug()) {
    //             echo $e->getMessage(); // affiche un message d'erreur
    //         } else {
    //             echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
    //         }
    //         die();
    //     }
    // }

}

?>