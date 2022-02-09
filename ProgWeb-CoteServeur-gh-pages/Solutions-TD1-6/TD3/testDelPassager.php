<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Trajet.php';

        if (isset($_GET["login"]) && isset($_GET["trajet_id"])) {
            $data = array(
                "trajet_id" => $_GET["trajet_id"],
                "utilisateur_login" => $_GET["login"]
            );
            
            if (Trajet::deletePassager($data)){
                echo "Passager supprimé.";
            } else {
                echo "Passager inconnu.";
            }

        } else {
            echo "Informations manquantes.";
        }
        ?>
    </body>
</html>
