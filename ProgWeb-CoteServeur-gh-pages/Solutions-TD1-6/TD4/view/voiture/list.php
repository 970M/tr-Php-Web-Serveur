<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        foreach ($tab_v as $v) {
            echo <<< EOT
        <p> 
            Voiture d'immatriculation {$v->getImmatriculation()} 
            <a href="?action=read&immat={$v->getImmatriculation()}">(+ d'info)</a>.
        </p>
EOT;
        }
        ?>
    </body>
</html>