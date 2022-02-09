<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" href="css/navstyle.css">
    </head>
    <body style="width:600px">
        <nav>
            <ul style="padding-left:0;text-align:center;">
                <li>
                    <a href="?action=readAll&controller=voiture">Gestion des voitures</a>
                </li><li>
                    <a href="?action=readAll&controller=utilisateur">Gestion des utilisateurs</a>
                </li><li>
                    <a href="?action=readAll&controller=trajet">Gestion des trajets</a>
                </li>              
            </ul>
        </nav>
        <?php
        // Si $controleur='voiture' et $view='list',
        // alors $filepath="/chemin_du_site/view/voiture/list.php"
        $controller = self::$object;
        $filepath = File::build_path(array("view", $controller, "$view.php"));
        require $filepath;
        ?>    
        <p style="border: 1px solid black;text-align:right;width:600px;padding-right:1em;">
            Copyleft Romain Lebreton
        </p>
    </body>
</html>