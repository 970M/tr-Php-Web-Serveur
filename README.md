# Programmation Web - Côté Serveur

## Cours à l’IUT de Montpellier - 2ème année

Mots clés : PHP, MVC, MySQL

#### Logs / Debug

/var/log/apache2

https://romainlebreton.github.io/ProgWeb-CoteServeur/tutorials/tutorial2.html

##### Tables SQL :

CREATE TABLE `passager` (
`trajet_id` int NOT NULL,
`utilisateur_login` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
PRIMARY KEY (`trajet_id`,`utilisateur_login`),
KEY `passager_utilisateur` (`utilisateur_login`),
CONSTRAINT `passager_trajet` FOREIGN KEY (`trajet_id`) REFERENCES `trajet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `passager_utilisateur` FOREIGN KEY (`utilisateur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `trajet` (
`id` int NOT NULL AUTO_INCREMENT,
`depart` varchar(32) NOT NULL,
`arrivee` varchar(32) NOT NULL,
`date` date NOT NULL,
`nbplaces` int NOT NULL,
`prix` int NOT NULL,
`conducteur_login` varchar(32) NOT NULL,
PRIMARY KEY (`id`),
KEY `trajet_ibfk_1` (`conducteur_login`),
CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`conducteur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3

CREATE TABLE `utilisateur` (
`nom` varchar(32) NOT NULL,
`prenom` varchar(32) NOT NULL,
`login` varchar(32) NOT NULL,
PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3

CREATE TABLE `voiture` (
`immatriculation` varchar(8) NOT NULL,
`marque` varchar(25) NOT NULL,
`couleur` varchar(12) NOT NULL,
PRIMARY KEY (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3

#### TD1

https://jcrozier.developpez.com/tutoriels/web/php/design-classe/

Done

#### TD2

https://romainlebreton.github.io/ProgWeb-CoteServeur/tutorials/tutorial2.html

Done

#### TD3

https://romainlebreton.github.io/ProgWeb-CoteServeur/tutorials/tutorial3.html

Exercice 1
Exercice 2
Exercice 3
Exercice 4
Exercice 5
Exercice 6
Exercice 7 : testFindUtil.php
Exemple d'injection SQL

#### TD4

https://romainlebreton.github.io/ProgWeb-CoteServeur/tutorials/tutorial4.html

Exercice 4

**Utiliser sqlite au lieu de mysql:**

    dir="sqlite:/[YOUR-PATH]/combadd.sqlite";
    $dbh  = new PDO($dir) or die("cannot open the database");
    $query =  "SELECT * FROM combo_calcs WHERE options="easy"";
    foreach ($dbh->query($query) as $row)
    {
        echo $row[0];
    }
    $dbh = null; //This is how you close a PDO connection


    <?php
    try{
        $pdo = new PDO('sqlite:'.dirname(__FILE__).'/database.sqlite');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
    } catch(Exception $e) {
        echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
        die();
    }
    ?>
