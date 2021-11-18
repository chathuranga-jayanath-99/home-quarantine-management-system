<?php

namespace App\Models;

use PDO;

class DoctorModel extends \Core\Model{

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

    public static function login($email, $password){

        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_doctor WHERE email=:email';
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

    public static function getAssingedPatients($doctorId){
        $db = static::getDB();

        $sql1 = 'SELECT 
                ap.id,
                ap.name,
                ap.age
                
            FROM tbl_adult_patient ap
            WHERE ap.doctor_id =:doctorId';
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute(['doctorId' => $doctorId]);
        $res1 = $stmt1->fetchAll(PDO::FETCH_OBJ);

        $sql2 = 'SELECT 
                ap.id,
                ap.name,
                ap.age
                
            FROM tbl_child_patient ap
            WHERE ap.doctor_id =:doctorId';
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute(['doctorId' => $doctorId]);
        $res2 = $stmt2->fetchAll(PDO::FETCH_OBJ);
        
        $res = array_merge($res1, $res2);
        // var_dump($res1);
        // echo '<br>';
        // var_dump($res2);
        // echo '<br>';
        // var_dump($res);
        return $res;
    }
}