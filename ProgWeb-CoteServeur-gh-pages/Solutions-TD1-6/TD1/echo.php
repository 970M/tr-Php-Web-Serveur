<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>

    <body>
        Voici le résultat du script PHP : 
        <?php
        // Ceci est un commentaire PHP sur une ligne
        /* Ceci est le 2ème type de commentaire PHP
          sur plusieurs lignes */

        // On met la chaine de caractères "hello" dans la variable 'texte'
        // Les noms de variable commencent par $ en PHP
        $texte = "hello world !";

        // On écrit le contenu de la variable 'texte' dans la page Web
        echo $texte;

        // Exercice 3.7.4
        $prenom = "Marc";
        echo "Bonjour " . $prenom; // Bonjour Marc
        echo "Bonjour $prenom"; // Bonjour Marc
        echo 'Bonjour $prenom'; // Bonjour $prenom

        echo $prenom; // Marc
        echo "$prenom"; // Marc

        // Exercice 3.7.5 Q1 & Q2
        $marque = "Renault";
        $immatriculation = "256AB34";
        $couleur = "bleu";

        echo "<p> Voiture $immatriculation de marque $marque (Couleur $couleur) </p>";

        // Exercice 3.7.5 Q3
        $voiture["marque"] = "Renault";
        $voiture["immatriculation"] = "256AB34";
        $voiture["couleur"] = "bleu";
        // var_dump($voiture);

        echo "<p> Voiture {$voiture["immatriculation"]} de marque {$voiture["marque"]} (Couleur {$voiture["couleur"]}) </p>";

        // Exercice 3.7.5 Q4
        $voitures = array();
        $voitures[] = $voiture;
        $voitures[] = array(
            "marque" => "Ferrari",
            "immatriculation" => "255AB34",
            "couleur" => "verte"
        );
        // var_dump($voitures);
        
        if (empty($voitures)) {
            echo "<h3>Il n’y a aucune voiture.</h3>";
        } else {
            echo "<h3>Liste des voitures :</h3>";
            echo "<ul>";
            foreach($voitures as $v) {
                echo "<li> Voiture {$v["immatriculation"]} de marque {$v["marque"]} (Couleur {$v["couleur"]}) </li>";
            }
            echo "</ul>";
        }
        
        ?>
    </body>
</html>