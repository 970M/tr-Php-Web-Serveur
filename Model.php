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
            printf("Échec de la connexion : %s\n", $e->getMessage());
            die();
            exit();
        }
    }

    // Getter
    static public function getPDO(): PDO
    {
        echo '<h2>PDO :</h2>';

        if (is_null(self::$pdo)) {
            self::init();
        }
        var_dump(self::$pdo);
        echo '</br>';
        return (self::$pdo);
    }
}
