<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
  require_once 'Voiture.php';
  
  // var_dump($_GET);

  $marque = $_GET["marque"];
  $immatriculation = $_GET["immatriculation"];
  $couleur = $_GET["couleur"];
  
  $v = new Voiture($marque,$couleur,$immatriculation);
  $v->save();
  $v->afficher();
  // Remplacer $_GET par $_POST si le formulaire est en méthode POST
?>
    </body>
</html>
