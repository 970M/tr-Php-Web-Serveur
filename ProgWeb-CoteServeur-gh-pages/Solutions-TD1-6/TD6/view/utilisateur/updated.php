<?php
$loginHTML = htmlspecialchars($login);
echo "<p>L'utilisateur de login $loginHTML a bien été mis à jour</p>";
require File::build_path(array('view',self::$object,'list.php'));
