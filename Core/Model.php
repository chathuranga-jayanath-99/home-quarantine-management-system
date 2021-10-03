<?php

namespace Core;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = 'localhost';
            $db_name = 'mvc';
            $db_username = 'root';
            $db_password = '';
    
            $conn = mysqli_connect($host, $db_username, $db_password, $db_name);
            
            return $conn;
        }
    }
}