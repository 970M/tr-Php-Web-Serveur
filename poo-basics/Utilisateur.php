<?php

class Utilisateur
{

    private $nom;
    private $prenom;
    private $login;

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
    public function __construct($n, $p, $g)
    {
        $this->set("nom", $n);
        $this->set("prenom", $p);
        $this->set("login", $g);

        // $this->nom = $n;
        // $this->prenom = $p;
        // $this->login = $g;
    }

    // une methode d'affichage.
    public function afficher()
    {
        echo <<< EOT
        <h2>Nom : $this->nom</h2>
        <h2>Prenom : $this->prenom</h2>
        <h2>Login : $this->login</h2>
    EOT;
    }
}
