<?php
// On inclut les fichiers de classe PHP avec require_once
// pour éviter qu'ils soient inclus plusieurs fois
require_once 'Conf.php';



Conf::getHostname();

// On affiche le login de la base de donnees
echo Conf::getLogin();
echo '</br>';
echo Conf::getPassword();
echo '</br>';
echo Conf::getDatabase();
echo '</br>';
echo Conf::getHostname();
