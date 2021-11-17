<?php

namespace App\Models;

use PDO;

class DoctorModel extends \Core\Model{

    public static function findUserByEmail($email){

        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_doctor WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        if($stmt->rowCount() > 0){
            return true;
        }
        else {
            return false;
        }
    }

    public static function register($data){

        $db = static::getDB();

        $sql = 'INSERT INTO tbl_doctor (name, email, password) values (:name, :email, :password)';
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
}