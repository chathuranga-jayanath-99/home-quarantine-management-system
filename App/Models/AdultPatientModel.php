<?php

namespace App\Models;

use PDO;

class AdultPatientModel extends \Core\Model{

    public static function register($data) {
        $db = static::getDB();
        $sql = 'INSERT INTO tbl_adult_patient 
            ( name,  email,  password,  mobile, NIC) VALUES (:name, :email, :password, :mobile, :NIC)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'          =>  $data['name'],
            'email'         =>  $data['email'],
            'password'      =>  $data['password'],
            'mobile'       =>  $data['mobile'],
            'NIC'   =>  $data['NIC'],
            //'birthday'       =>  $data['birthday'],
        ]);
        if ($res) {
            return true;
        }
        return false;
    }

    public static function findUserByEmail($email){

        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_adult_patient WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        if($stmt->rowCount() > 0){
            return true;
        }
        else {
            return false;
        }
    }

    public static function login($email,$password)
    {

        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_adult_patient WHERE email=:email';
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

    public static function getPatientName($adult_id)
    {
        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_adult_patient WHERE id=:adult_id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['adult_id' => $adult_id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        return $row;

    }
}