<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    // --- Test de la Classe Voiture
    require_once 'Voiture.php';
    $vehicule1 = new Voiture("Dacia", "Rouge", "152548");
    $vehicule1->afficher();



    // --- Test de la Classe Utilisateur

    require_once 'Utilisateur.php';
    $utilisateur1 = new Utilisateur("Kali", "Tom", "152548");
    $utilisateur1->afficher();





    ?>


</body>

</html>