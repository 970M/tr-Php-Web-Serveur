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
    public function __construct($n = null, $p = null, $g = null)
    {
        if (!is_null($n) && !is_null($p) && !is_null($g)) {
            $this->set("nom", $n);
            $this->set("prenom", $p);
            $this->set("login", $g);
        }
    }

    // une methode d'affichage.
    public function afficher()
    {
        echo <<< EOT
        <p>Nom : $this->nom</p>
        <p>Prenom : $this->prenom</p>
        <p>Login : $this->login</p>
        </br>
    EOT;
    }

    // Renvoyer le tableau des voitures de la BDD 
    public function getAllUtilisateurs()
    {
        echo '<h2>getAllUtilisateurs</h2>';
        $pdo = Model::getPDO();
        $rep_class = $pdo->query("SELECT * FROM utilisateur");
        $rep_class->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        return $rep_class->fetchAll();
    }
}
