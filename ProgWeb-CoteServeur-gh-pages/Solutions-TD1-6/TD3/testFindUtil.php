<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Trajet.php';

        // Exercice 7.2
//        $tab_util = Trajet::findPassagers(1);
//        foreach ($tab_util as $u)
//            $u->afficher();

        // Exercice 7.3
        if (isset($_GET["trajet_id"])) {
            $tab_util = Trajet::findPassagers($_GET["trajet_id"]);
            foreach ($tab_util as $u)
                $u->afficher();
        } else {
            echo "Pas d'identifiant de trajet reçu.";
        }
        ?>
    </body>
</html>
