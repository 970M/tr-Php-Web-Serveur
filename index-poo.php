<?php

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
        $this->ouleur = $m;
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
    public function __construct($m, $c, $i)
    {
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
    }

    // une methode d'affichage.
    public function afficher()
    {
        echo <<< EOT
        <h2>Marque : $this->marque</h2>
        <h2>Couleur : $this->couleur</h2>
        <h2>Immatriculation : $this->immatriculation</h2>
    EOT;
    }
}


$vehicule1 = new Voiture("Dacia", "Rouge", "152548");
$vehicule1->afficher();

// ---
$prenom = "Helmut";
echo <<< EOT
Texte à afficher
sur plusieurs lignes
avec caractères spéciaux \t \n
 et remplacement de variables $prenom
les caractères suivants passent : " ' $ / \ ;
EOT;
