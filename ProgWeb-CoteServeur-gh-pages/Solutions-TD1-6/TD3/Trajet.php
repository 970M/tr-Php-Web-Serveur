<?php

require_once 'Model.php';
require_once 'Utilisateur.php';

class Trajet {

    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;

    // Getter générique
    public function get($nom_attribut) {
        // property_exists n'est pas expliqué en TD
        // Cela permet de vérifier que l'attribut a été déclarée.
        //
        // En effet, PHP est tellement permissif qu'on peut créer 
        // des attributs à la volée, e.g. $this->new_att = 1 marche.
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
    public function __construct($data = array()) {
        // $data = array() sera expliqué plus tard en TD
        // Cette syntaxe permet un argument optionnel
        // cf. https://www.php.net/manual/fr/functions.arguments.php#functions.arguments.default
        if (!empty($data)) {
            $this->id = $data["id"];
            $this->depart = $data["depart"];
            $this->arrivee = $data["arrivee"];
            $this->date = $data["date"];
            $this->nbplaces = $data["nbplaces"];
            $this->prix = $data["prix"];
            $this->conducteur_login = $data["conducteur_login"];
        }
    }

    // une methode d'affichage.
    public function afficher() {
        echo "<p> Ce trajet du {$this->date} partira de {$this->depart} pour aller à {$this->arrivee}. </p>";
    }


    public static function getAllTrajets() : array {
        $rep = Model::getPDO()->query("SELECT * FROM trajet");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');        
        return $rep->fetchAll();
    }

    // Exercice 7
    public static function findPassagers($id) {
        try {
            $pdo = Model::getPDO();
            $sql = <<< EOT
SELECT utilisateur.*
FROM utilisateur
INNER JOIN passager
ON passager.utilisateur_login=utilisateur.login
WHERE passager.trajet_id=:trajet_id
EOT;

            $req_prep = $pdo->prepare($sql);

            $values = array(
                "trajet_id" => $id,
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
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

    // Exercice 9.1
    /**
     * Supprime un passager
     * 
     * @param mixed[] $data Tableau (utilisateur_login, trajet_id)
     *  
     * @return bool Indique si un passager a été supprimé d'un trajet
     */
    public static function deletePassager($data) : bool {
        try {
            $pdo = Model::getPDO();
            $sql = <<< EOT
DELETE FROM passager
WHERE trajet_id=:trajet_id
AND utilisateur_login=:utilisateur_login
EOT;
            $req_prep = $pdo->prepare($sql);
            
            $req_prep->execute($data);

            // PDOStatement::rowCount() retourne le nombre de lignes affectées par la dernière 
            // requête DELETE, INSERT ou UPDATE exécutée par l'objet PDOStatement correspondant.
            // https://www.php.net/manual/fr/pdostatement.rowcount.php
            $del_count = $req_prep->rowCount();

            // Renvoie true ssi on a bien supprimé un passager
            return ($del_count > 0);
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
