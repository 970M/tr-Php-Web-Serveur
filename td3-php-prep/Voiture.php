<?php
require_once "Model.php";

class Voiture
{

    private $marque;
    private $couleur;
    private $immatriculation;


    // --- Marque ---
    // un getter      
    public function getMarque()
    {
        return $this->marque;
    }

    // un setter 
    public function setMarque($m)
    {
        $this->marque = $m;
    }

    // --- Couleur ---
    // un getter      
    public function getCouleur()
    {
        return $this->couleur;
    }

    // un setter
    public function setCouleur($m)
    {
        $this->couleur = $m;
    }

    // --- Immatriculation ---
    // un getter      
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    // un setter 
    public function setImmatriculation($m)
    {
        $this->immatriculation = $m;
    }

    // un constructeur
    public function __construct($data = array())
    {
        if (array_key_exists("marque", $data) && array_key_exists("couleur", $data) && array_key_exists("immatriculation", $data)) {

            $this->marque = $data["marque"];
            $this->couleur = $data["couleur"];
            $this->immatriculation = $data["immatriculation"];
        }
    }

    // une methode d'affichage.
    public function afficher()
    {
        echo <<< EOT
        <p>Marque : $this->marque</p>
        <p>Couleur : $this->couleur</p>
        <p>Immatriculation : $this->immatriculation</p>
        </br>
    EOT;
    }

    // Renvoyer le tableau des voitures de la BDD 
    public function getAllVoitures()
    {
        echo '<h2>getAllVoitures</h2>';
        $pdo = Model::getPDO();
        $rep_class = $pdo->query("SELECT * FROM voiture");
        $rep_class->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
        return $rep_class->fetchAll();
    }


    public static function getVoitureByImmat($immat)
    {
        echo '<h2>getVoitureByImmat</h2>';
        $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $immat,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 

        try {
            $req_prep->execute($values);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }


    public function save()
    {
        $sql = "INSERT INTO voiture (marque, couleur, immatriculation) VALUES (:marque_tag, :couleur_tag, :immatriculation_tag)";

        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "marque_tag" => $this->marque,
            "couleur_tag" => $this->couleur,
            "immatriculation_tag" => $this->immatriculation,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête	 
        try {
            $req_prep->execute($values);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }


        //var_dump($req_prep);
    }
}
