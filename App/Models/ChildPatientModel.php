<?php

namespace App\Models;

use PDO;

class ChildPatientModel extends \Core\Model{

    public static function register($data) {
        $db = static::getDB();
        $sql = 'INSERT INTO tbl_child_patient 
            ( name,  email,  password,  address,  guardian_id) VALUES 
            (:name, :email, :password, :address, :guardian_id)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'          =>  $data['name'],
            'email'         =>  $data['email'],
            'password'      =>  $data['password'],
            'address'       =>  $data['address'],
            'guardian_id'   =>  $data['guardian_id']
        ]);
        if ($res) {
            return true;
        }
        return false;
    }

    public static function findUserByEmail($email){

        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_child_patient WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        if($stmt->rowCount() > 0){
            return true;
        }
        else {
            return false;
        }
    }

    public static function login($email, $password) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_child_patient WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if(!empty($row)){
            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            }
        }
        return false;
    }

    public static function searchByGuardianID($guardianID) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_child_patient 
                WHERE guardian_id=:guardian_id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['guardian_id' => $guardianID]);
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

}