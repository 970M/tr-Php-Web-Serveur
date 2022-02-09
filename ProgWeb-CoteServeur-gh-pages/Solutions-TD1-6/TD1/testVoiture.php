<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>   
    <body>
<?php
      // On inclus 'Voiture.php', un peu comme import en Java
      require_once 'Voiture.php';   

      $voiture1 = new Voiture('Renault','Bleu','256AB34'); 
      $voiture2 = new Voiture('Peugeot','Vert','128AC30');

      $voiture1->afficher();
      $voiture2->afficher();
?>
    </body>
</html>