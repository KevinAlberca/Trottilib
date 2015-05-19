<?php

use \PDO;
class Connexion extends PDO
{
    static $db;

    public static function getPDO(){
        $conn = NULL;
        try {
            $conn = new PDO('mysql:host=localhost;dbname=trottilib', 'root', 'root',  [
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            ]);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        self::$db = $conn;
    }

    public function __construct(){
        return self::$db;
    }
}