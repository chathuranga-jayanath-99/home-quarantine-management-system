<?php

namespace App\Models;

use PDO;

class PHIModel extends \Core\Model{
    protected $mediator;
    protected $name;

    public function __construct($chatMediator, $name){
        $this->mediator = $chatMediator;
        $this->name = $name;
    }

    public function send($msg){
        $this->mediator->sendMessage($msg);
    }

    public static function register($data){

        $db = static::getDB();

        $sql = 'INSERT INTO tbl_phi (name, email, moh_area, PHI_station, NIC, contact_number, password) 
                             values (:name, :email, :moh_area, :PHI_station, :NIC, :contact_number, :password)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'moh_area' => $data['moh_area'],
            'PHI_station' => $data['PHI_station'],
            'NIC' => $data['NIC'],
            'contact_number' => $data['contact_number'],
            'password'=>$data['password'],
        ]);
        if($res){
            // executed successfully
            return true;
        }
        else {
            return false;
        }
    }

    public static function findUserByEmail($email){

        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_phi WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        if($stmt->rowCount() > 0){
            return true;
        }
        else {
            return false;
        }
    }


    public static function login($email, $password){

        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_phi WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($row)){
            
            $hashed_password = $row->password;
            echo $password ;
            if(password_verify($password, $hashed_password)){
                
                return $row;
            }
            else {
                return false;
            }
        }
        return false;

    }

}