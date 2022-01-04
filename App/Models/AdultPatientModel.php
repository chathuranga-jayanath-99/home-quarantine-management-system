<?php

namespace App\Models;

use PDO;

class AdultPatientModel extends \Core\Model{

    public static function register($data) {
        $db = static::getDB();
        $sql = 'INSERT INTO tbl_adult_patient 
            ( name,  email,  password,  address,  NIC,  age,  contact_no,  phi_range,  phi_id,  gender,  state,  doctor_id) VALUES 
            (:name, :email, :password, :address, :NIC, :age, :contact_no, :phi_range, :phi_id, :gender, :state, :doctor)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'          =>  $data['name'],
            'email'         =>  $data['email'],
            'password'      =>  $data['password'],
            'address'       =>  $data['address'],
            'NIC'           =>  $data['NIC'],
            'age'           =>  $data['age'],
            'contact_no'    =>  $data['contact_no'],
            'phi_range'     =>  'null',
            'phi_id'        =>  0,
            'gender'        =>  $data['gender'],
            'state'         =>  'pending',
            'doctor'        =>  'null'
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

    public static function searchByNIC($NIC) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_adult_patient 
                WHERE NIC=:NIC';
        $stmt = $db->prepare($sql);
        $stmt->execute(['NIC' => $NIC]);
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res;
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

    public static function changeState($email, $NIC, $state) {
        $db = static::getDB();
        $sql = 'UPDATE tbl_adult_patient 
                SET state=:state, phi_range=:phi_range, phi_id=:phi_id
                WHERE NIC=:NIC and email=:email';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'state'       => $state,
            'phi_range'   => $_SESSION['phi_area'],
            'phi_id'      => $_SESSION['phi_id'],
            'NIC' => $NIC,
            'email'       => $email,
        ]);
        if ($res) {
            return true;
        }
        return false;
    }

    public static function searchByEmailAndNIC($NIC, $email) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_adult_patient 
                WHERE NIC=:NIC and email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'NIC'         => $NIC,
            'email'       => $email
        ]);
        $res = $stmt->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public static function getPatientData($adult_id)
    {
        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_adult_patient WHERE id=:adult_id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['adult_id' => $adult_id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        return $row;

    }

    public static function recordSymptoms($symptoms) {
        $db = static::getDB();
        $sql = 'INSERT INTO tbl_record
            (
                  patient_id,    doctor_id,       phi_id,          type,         feedback,      checked,
                 temperature,        fever,        cough,   sore_throat,     short_breath,   runny_nose,
                      chills,  muscle_ache,     headache,       fatigue,   abdominal_pain,
                    vomiting,     diarrhea,        other,         level,     checked_count
            ) VALUES  (
                 :patient_id,   :doctor_id,      :phi_id,          :type,       :feedback,     :checked,
                :temperature,       :fever,       :cough,   :sore_throat,   :short_breath,  :runny_nose,
                     :chills, :muscle_ache,    :headache,       :fatigue, :abdominal_pain,
                   :vomiting,    :diarrhea,       :other,         :level,   :checked_count
            )';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute($symptoms);
        if ($res) {
            return true;
        }
        return false;
    }
}