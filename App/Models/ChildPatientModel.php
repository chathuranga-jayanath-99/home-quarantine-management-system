<?php

namespace App\Models;

use PDO;

class ChildPatientModel extends PatientModel {

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
            'address'       =>  "  ",//$data['address'],
            'guardian_id'   =>  $data['NIC']
        ]);
        if ($res) {
            $id = $db->lastInsertId();
            return $id;
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

    public static function searchByIDAndGuardianID($id, $guardianID) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_child_patient 
                WHERE guardian_id=:guardian_id and id=:id';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'guardian_id' => $guardianID,
            'id'          => $id
        ]);
        $res = $stmt->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public static function changeState($id, $guardianID, $state) {
        $db = static::getDB();
        $sql = 'UPDATE TABLE tbl_child_patient 
                SET state=:cur_state
                WHERE id=:Id AND guardian_id=:guardianId';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':cur_state', "%{$state}%");
        $stmt->bindParam(':guardianId', "%{$guardianID}%");
        $stmt->bindParam(':Id', $id, PDO::PARAM_INT);
        $res = $stmt->execute();
        if ($res) {
            return true;
        }
        return false;
    }

}