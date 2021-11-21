<?php

namespace App\Models;

use PDO;

class PHIModel extends \Core\Model{

    public static function register($data){

        $db = static::getDB();

        $sql = 'INSERT INTO tbl_phi (name, email, password) values (:name, :email, :password)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'=>$data['name'],
            'email'=>$data['email'],
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