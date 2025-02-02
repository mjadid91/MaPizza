<?php
include("config.php");
class connexion {
    
    //------------ attribut ----------------
    static private $pdo;

    //---------- getter & setter -----------

    static public function pdo() {
        return self::$pdo;
    }

    static public function connect() {

        try {
            self::$pdo = new PDO(
                "mysql:host=".HOSTNAME.";dbname=".DATABASE, LOGIN, PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "erreur de connexion : ".$e->getMessage()."<br>";
        }

    }

}

?>