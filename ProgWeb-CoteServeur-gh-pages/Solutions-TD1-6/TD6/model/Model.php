<?php

require_once File::build_path(array("config","Conf.php"));

abstract class Model {
    private static $pdo = NULL;

    protected static $object = "";
    protected static $primary = "";
    
    public static function init () {
        $hostname = Conf::getHostname();
        $login = Conf::getLogin();
        $password = Conf::getPassword();
        $database_name = Conf::getDatabase();
        
        try{
            // Connexion à la base de données            
            // Le dernier argument sert à ce que toutes les chaines de caractères 
            // en entrée et sortie de MySql soit dans le codage UTF-8
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            
            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
    
    // Pour info (pas dit en classe)
    // ... : PDO pour indiquer le type de retour de la fonction.
    // Optionnel, mais utile avec certains IDE pour l'auto-complétion
    public static function getPDO() : PDO {
        if (is_null(self::$pdo))
        self::init();
        return self::$pdo;
    }
    
    public static function selectAll() {
        try {
            $table_name = static::$object;
            $class_name = 'Model' . ucfirst(static::$object);
            $sql = "SELECT * from $table_name";
            $rep = self::getPDO()->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            return $rep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
    
    /**
    * Sélectionne un enregistrement d'une table à partir de sa clé primaire
    * @param string Valeur de la clé primaire
    * @return ModelVoiture|ModelUtilisateur|false l'enregistrement correspondant ou false sinon
    */
    public static function select($primary) {
        try {
            $table_name = static::$object;
            $class_name = 'Model' . ucfirst(static::$object);
            $primary_key = static::$primary;
            $sql = "SELECT * from $table_name WHERE $primary_key=:primary";
            // Préparation de la requête
            $req_prep = self::getPDO()->prepare($sql);
            
            $values = array(
                "primary" => $primary
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);
            
            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab_results = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_results))
            return false;
            return $tab_results[0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
    
    /**
    * Supprime un enregistrement d'une table à partir de sa clé primaire
    * @param string Valeur de la clé primaire
    * @return bool Est-ce qu'un enregistrement a été supprimé ?
    */
    public static function delete($primary) : bool {
        try {
            $table_name = static::$object;
            $primary_key = static::$primary;
            $sql = "DELETE FROM $table_name WHERE $primary_key=:primary;";
            // Préparation de la requête
            $req_prep = self::getPDO()->prepare($sql);
            
            $values = array(
                "primary" => $primary
            );
            
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);
            
            // PDOStatement::rowCount() retourne le nombre de lignes affectées par la dernière 
            // requête DELETE, INSERT ou UPDATE exécutée par l'objet PDOStatement correspondant.
            // https://www.php.net/manual/fr/pdostatement.rowcount.php
            $del_count = $req_prep->rowCount();
            
            // Renvoie true ssi on a bien supprimé une ligne de la BDD
            return ($del_count > 0);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
    
    public static function update($data) {
        try {
            $table_name = static::$object;
            $primary_key = static::$primary;
            $set_parts = array();
            foreach ($data as $key => $value) {
                $set_parts[] = "$key=:$key";
            }
            $set_string = join(',', $set_parts);
            $sql = "UPDATE $table_name SET $set_string WHERE $primary_key=:$primary_key";
            // Préparation de la requête
            $req_prep = self::getPDO()->prepare($sql);
            
            // On donne les valeurs et on exécute la requête	 
            return $req_prep->execute($data);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
    
    public static function save($data) {
        try {
            $table_name = static::$object;            
            
            foreach ($data as $key => $value) {
                $attributes[] = $key;
            }
            
            $into_string = '(' . join(',',$attributes) . ')';
            
            // Rajoute ":" avant les attributs
            function prependColon($s) { 
                return ":" . $s;                
            }
            $values_string = '(' . join(',', array_map("prependColon",$attributes)) . ')';            
            
            $sql = "INSERT INTO $table_name $into_string VALUES $values_string";
            
            // Préparation de la requête
            $req_prep = self::getPDO()->prepare($sql);
            
            // On donne les valeurs et on exécute la requête	 
            return $req_prep->execute($data);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                if ($e->errorInfo[1] == 1062) {
                    // Duplicate entry
                    return false;
                }
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    // Autre façon de faire save à base d'introspection (hors programme) 
    // pour découvrir le nom des attributs (= nom des attributs de la table) 
    // public function save() {
    //     try {
    //         $table_name = static::$object;
            
    //         // ReflectionClass ou écrire les attributs en dur
    //         $reflect = new ReflectionClass($this);
    //         $props = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
            
    //         $attributes = array();
    //         $data = array();
            
    //         foreach ($props as $prop) {
    //             $attributes[] = $prop->getName();
    //             $data[$prop->getName()] = $this->get($prop->getName());
    //         }
    //         $into_string = '(' . join(',',$attributes) . ')';
            
    //         // Rajoute ":" avant les attributs
    //         function prependColon($s) { 
    //             return ":" . $s;                
    //         }
    //         $values_string = '(' . join(',', array_map("prependColon",$attributes)) . ')';            
            
    //         $sql = "INSERT INTO $table_name $into_string VALUES $values_string";
            
    //         // Préparation de la requête
    //         $req_prep = self::getPDO()->prepare($sql);
            
    //         // On donne les valeurs et on exécute la requête	 
    //         return $req_prep->execute($data);
    //     } catch (PDOException $e) {
    //         if (Conf::getDebug()) {
    //             if ($e->errorInfo[1] == 1062) {
    //                 // Duplicate entry
    //                 return false;
    //             }
    //             echo $e->getMessage(); // affiche un message d'erreur
    //         } else {
    //             echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
    //         }
    //         die();
    //     }
    // }
}