<?php

namespace Core;

use PDO;
use PDOException;
use App\Config;

abstract class Model
{   
    private static $db = null;

    protected static function getDB()
    {

        // if (self::$db === null) {
    
        //     try {
        //         // $db = new PDO("mysql:host=$host;dbname=$dbname, $username, $password");
        //         $dsn = 'mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME;
        //         $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
        //     }
        //     catch (PDOException $e) {
        //         echo $e->getMessage();
        //     }
        // }
        // return $db;

        self::$db = Database::getInstance();
        return self::$db->getConnection();
    }
}