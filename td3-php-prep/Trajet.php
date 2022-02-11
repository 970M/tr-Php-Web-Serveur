<?php
require_once "Model.php";
require_once "Utilisateur.php";

class Trajet
{

    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbPlace;
    private $prix;

    // un getter générique
    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // un setter générique
    public function set($nom_attribut, $valeur)
    {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // un constructeur
    public function __construct($data = array())
    {
        if (!empty($data)) {

            $this->set("id", $data["id"]);
            $this->set("depart",  $data["depart"]);
            $this->set("arrivee",  $data["arrivee"]);
            $this->set("date", $data["date"]);
            $this->set("nbPlace", $data["nbPlace"]);
            $this->set("prix",  $data["prix"]);
            $this->set("conducteur_login", $data["conducteur_login"]);
        }
    }

    // une methode d'affichage.
    public function afficher()
    {
        echo <<< EOT
        <h3>id : $this->id</h3>
        <p>depart : $this->depart</p>
        <p>arrivee : $this->arrivee</p>
        <p>date : $this->date</p>
        <p>nbPlace : $this->nbPlace</p>
        <p>prix : $this->prix</p>
        <p>conducteur_login: $this->conducteur_login</p>
        </br>
        
    EOT;
    }

    // Renvoyer le tableau des voitures de la BDD 
    public function getAllTrajets()
    {
        echo '<h2>getAllTrajets</h2>';
        $pdo = Model::getPDO();
        $rep_class = $pdo->query("SELECT * FROM trajet");
        $rep_class->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
        return $rep_class->fetchAll();
    }

    public static function findPassagers($id)
    {

        $sql = "SELECT u.* FROM trajet t INNER JOIN passager p ON p.trajet_id = t.id INNER JOIN utilisateur u ON u.login = p.utilisateur_login WHERE t.id = :id_tag";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "id_tag" => $id,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 

        try {
            $req_prep->execute($values);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab_utilisateur = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_utilisateur))
            return false;
        return $tab_utilisateur;
    }
}
