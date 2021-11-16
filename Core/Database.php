<?php

namespace Core;

use PDO;
use App\Config;

class Database{
    private $host;
    private $user;
    private $password;
    private $db_name;

    private $locked;
    private $unlocked;

    public function __construct()
    {
        $this->host = Config::DB_HOST;
        $this->user = Config::DB_USER;
        $this->db_name = Config::DB_NAME;
        

        $this->locked = array();
        $this->unlocked = array();
    }

    // public function connect(){
    //     $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
    //     $pdo = new PDO($dsn, $this->user, $this->password);
    // }
    protected function create(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        return new PDO($dsn, $this->user, $this->password);
    }

    public function check_out(){
        
    }
    public function check_in(){
        
    }

}