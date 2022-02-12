<?php
require_once "Model.php";

class ModelVoiture
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


    public function __construct($data = array())
    {
        if (array_key_exists("marque", $data) && array_key_exists("couleur", $data) && array_key_exists("immatriculation", $data)) {
            $this->marque = $data["marque"];
            $this->couleur = $data["couleur"];
            $this->immatriculation = $data["immatriculation"];
        }
    }

    // // une methode d'affichage.
    // public function afficher()
    // {
    //     echo <<< EOT
    //     <p>Marque : $this->marque</p>
    //     <p>Couleur : $this->couleur</p>
    //     <p>Immatriculation : $this->immatriculation</p>
    //     </br>
    // EOT;
    // }

    // Renvoyer le tableau des voitures de la BDD 
    public function getAllVoitures()
    {
        echo '<h2>getAllVoitures</h2>';
        $pdo = Model::getPDO();
        $rep_class = $pdo->query("SELECT * FROM voiture");
        $rep_class->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        return $rep_class->fetchAll();
    }
}
