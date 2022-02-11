<?php

class Trajet
{

    private $id;
    private $depard;
    private $arrivee;
    private $date;
    private $nbPlaces;
    private $prix;

    // un getter générique
    public function get($nom_attribut)
    {
        return $this->$nom_attribut;
    }

    // un setter générique
    public function set($nom_attribut, $valeur)
    {
        $this->$nom_attribut = $valeur;
    }

    // un constructeur
    public function __construct($i, $d, $a, $t, $n, $p, $g)
    {
        $this->set("id", $i);
        $this->set("depard", $d);
        $this->set("arrivee", $a);
        $this->set("date", $t);
        $this->set("nbPlace", $n);
        $this->set("prix", $p);
        $this->set("conducteur_login", $g);

        // $this->nom = $n;
        // $this->prenom = $p;
        // $this->login = $g;
    }

    // une methode d'affichage.
    public function afficher()
    {
        echo <<< EOT
        <h2>id : $this->id</h2>
        <h2>depard : $this->depard</h2>
        <h2>arrivee : $this->arrivee</h2>
        <h2>date : $this->date</h2>
        <h2>nbPlace : $this->nbPlace</h2>
        <h2>prix : $this->prix</h2>
        <h2>conducteur_login: $this->conducteur_login</h2>
        
    EOT;
    }
}
