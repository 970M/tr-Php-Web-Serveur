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
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password);
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
