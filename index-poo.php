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
   
    // un constructeur
    public function __construct($m, $c, $i) {
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
    } 
              
    // une methode d'affichage.
    public function afficher() {
      // À compléter dans le prochain exercice
    }
}


var vehicule1 = new Voiture("Dacia", "Rouge", "152548")



echo Voiture->couleur;

echo Voiture->getMarque();