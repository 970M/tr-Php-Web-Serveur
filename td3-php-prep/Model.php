<?php
require_once 'Conf.php';
// phpinfo();

class Model
{
    static private $pdo = NULL;

    static public function init()
    {
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //var_dump(self::$pdo);
        } catch (PDOException $e) {

            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="#"> retour a la page d\'accueil </a>';
            }
            die();
            //exit();
        }
    }

    // Getter
    static public function getPDO(): PDO
    {
        if (is_null(self::$pdo)) {
            self::init();
        }
        return (self::$pdo);
    }
}
