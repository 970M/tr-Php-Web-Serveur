<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>
    <h1>Trajets disponibles</h1>



    <form method="post" action="testFindUtil.php">
        <fieldset>
            <legend>Mon formulaire :</legend>
            <div class="container">
                <div>
                    <label for="id_trajet_id">Identifiant du trajet (id)</label>
                    :
                    <input type="text" placeholder="" name="id" id="id_trajet_id" required />
                </div>
            </div>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset>
    </form>

    <?php
    require_once "Trajet.php";
    $trajets_tab = Trajet::getAllTrajets();
    foreach ($trajets_tab as $t) {
        $t->afficher();
        echo "</br>";
    }
    ?>
</body>

</html>