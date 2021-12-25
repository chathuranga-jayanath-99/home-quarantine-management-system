<?php

namespace Core;

use PDO;
use App\Config;

class Database{
    private $host;
    private $user;
    private $password;
    private $db_name;

    private static $instance;

    private function __construct()
    {
        $this->host = Config::DB_HOST;
        $this->user = Config::DB_USER;
        $this->db_name = Config::DB_NAME;

    }

    // public function connect(){
    //     $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
    //     $pdo = new PDO($dsn, $this->user, $this->password);
    // }
    public function getConnection(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        return new PDO($dsn, $this->user, $this->password);
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