<?php

// require_once 'Model.php';
// require_once 'Utilisateur.php';

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
}
