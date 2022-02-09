<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Utilisateur.php';

        if (isset($_GET["login"])) {
            $tab_traj = Utilisateur::findTrajets($_GET["login"]);
            foreach ($tab_traj as $t)
                $t->afficher();
        } else {
            echo "Pas de login reçu.";
        }
        ?>
    </body>
</html>
