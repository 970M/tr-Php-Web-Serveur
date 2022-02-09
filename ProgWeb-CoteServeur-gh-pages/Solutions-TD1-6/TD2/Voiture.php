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
    
    // une methode d'affichage.
    public function afficher() {
        echo "<p> Voiture {$this->immatriculation} de marque {$this->marque} (Couleur {$this->couleur})  </p>";
    }

    public static function getAllVoitures() : array {
        $rep = Model::getPDO()->query("SELECT * FROM voiture");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');        
        return $rep->fetchAll();
    }
    
}

?>