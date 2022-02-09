<?php

class Voiture {
    
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
    public function __construct($m, $c, $i) {
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
    }
    
    // une methode d'affichage.
    public function afficher() {
        echo "<p> Voiture {$this->immatriculation} de marque {$this->marque} (Couleur {$this->couleur})  </p>";
    }
    
}

?>