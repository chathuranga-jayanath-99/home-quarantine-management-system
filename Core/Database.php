<?php

namespace Core;

use PDO;
use App\Config;

class Database{
    private $host;
    private $user;
    private $password;
    private $name;

    private $pdo;
    private static $instance;

    private function __construct()
    {
        $this->host = Config::DB_HOST;
        $this->user = Config::DB_USER;
        $this->name = Config::DB_NAME;
        $this->password = Config::DB_PASSWORD;

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
        $this->pdo = new PDO($dsn, $this->user, $this->password);
    }

    // public function connect(){
    //     $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
    //     $pdo = new PDO($dsn, $this->user, $this->password);
    // }
    public function getConnection(){
        return $this->pdo;
    }

    // public function check_out(){
        
    // }
    // public function check_in(){
        
    // }
    public static function getInstance(){
        if (self::$instance == null){
            $instance = new Database();
        }
        return $instance;
    }
}