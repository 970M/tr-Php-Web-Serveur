<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php

    echo '<div>';
    // --- Test de la Classe Voiture
    require_once 'Voiture.php';
    $vehicule1 = new Voiture("Dacia", "Rouge", "152548");
    $vehicule1->afficher();
    echo '</div>';
    echo '<div>';
    // --- Test de la Classe Utilisateur
    require_once 'Utilisateur.php';
    $utilisateur1 = new Utilisateur("Kali", "Tom", "152548");
    $utilisateur1->afficher();
    echo '</div>';
    echo '<div>';
    // --- Test de la Classe Trajet
    require_once 'Trajet.php';
    $trajet1 = new Trajet("16548", "Paris", "Lyon", "25062022", 2, 50, "lolipou");
    $trajet1->afficher();
    echo '</div>';
    ?>

</body>

</html>