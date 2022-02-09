<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        echo "<p> Voiture {$v->getImmatriculation()} de marque {$v->getMarque()} (Couleur {$v->getCouleur()})  </p>";
        ?>
    </body>
</html>