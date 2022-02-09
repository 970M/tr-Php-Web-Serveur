<?php
require_once 'Conf.php';
phpinfo();
class Model
{
    static private $pdo = NULL;

    // static $hostname = Conf::getHostname();
    // static $database_name = Conf::getDatabase();
    // static $login = Conf::getLogin();
    // static $password = Conf::getPassword();

    static $hostname = "localhost";
    static $database_name = "tuto_mcv";
    static $login = "phpmyadminGD";
    static $password = "0000";

    static public function init()
    {


        try {
            echo "fo5";
            self::$pdo = new PDO('mysql:host=localhost;dbname=tuto_mvc', 'phpmyadminGD', '0000');
            echo "fo6";
        } catch (PDOException $e) {
            printf("Échec de la connexion : %s\n", $e->getMessage());
            die();
            exit();
        }
    }

    // Getter
    static public function getPDO()
    {

        echo "foo=" . self::$pdo;
        echo '</br>';

        if (is_null(self::$pdo)) {
            self::init();
        }
        return (self::$pdo);
    }
}
