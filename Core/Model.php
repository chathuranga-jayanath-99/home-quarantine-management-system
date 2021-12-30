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
        self::$db = Database::getInstance();
        return self::$db->getConnection();
    }
}