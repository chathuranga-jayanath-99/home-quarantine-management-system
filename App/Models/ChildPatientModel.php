<?php

namespace App\Models;

use PDO;

class ChildPatientModel extends PatientModel {

    public static function register($data) {
        $db = static::getDB();
        $sql = 'INSERT INTO tbl_child_patient 
            ( name,  email,  password,  address,  guardian_id,  age,  contact_no,  phi_range,  gender,  state,  doctor_id) VALUES 
            (:name, :email, :password, :address, :guardian_id, :age, :contact_no, :phi_range, :gender, :state, :doctor)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'          =>  $data['name'],
            'email'         =>  $data['email'],
            'password'      =>  $data['password'],
            'address'       =>  $data['address'],
            'guardian_id'   =>  $data['NIC'],
            'age'           =>  $data['age'],
            'contact_no'    =>  $data['contact_no'],
            'phi_range'     =>  'null',
            'gender'        =>  $data['gender'],
            'state'         =>  'pending',
            'doctor'        =>  'null'
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
        $sql = 'UPDATE tbl_child_patient 
                SET state=:state, phi_range=:phi_range
                WHERE guardian_id=:guardian_id and id=:id';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'state'       => $state,
            'phi_range'   => $_SESSION['phi_area'],
            'guardian_id' => $guardianID,
            'id'          => $id,
        ]);
        if ($res) {
            return true;
        }
        return false;
    }

}