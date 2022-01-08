<?php

namespace App\Models;

use PDO;

use App\RecordStatePattern\Record;
use App\RecordStatePattern\RecordState;
use App\RecordStatePattern\NotFilled;
use App\RecordStatePattern\Unchecked;
use App\RecordStatePattern\Checked;

class ChildPatientModel extends PatientModel {

    public static function register($data) {
        $db = static::getDB();
        $sql = 'INSERT INTO tbl_child_patient 
            ( name,  email,  password,  address,  guardian_id,  age,  contact_no,  phi_range,  phi_id,  gender,  state,  doctor_id) VALUES
            (:name, :email, :password, :address, :guardian_id, :age, :contact_no, :phi_range, :phi_id, :gender, :state, :doctor)';
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

    public static function searchByEmailAndGuardianID($guardianID, $email) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_child_patient 
                WHERE guardian_id=:guardian_id and email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'guardian_id' => $guardianID,
            'email'       => $email
        ]);
        $res = $stmt->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public static function changeState($email, $guardianID, $state) {
        $db = static::getDB();
        $sql = 'UPDATE tbl_child_patient 
                SET state=:state, phi_range=:phi_range, phi_id=:phi_id
                WHERE guardian_id=:guardian_id and email=:email';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'state'       => $state,
            'phi_range'   => $_SESSION['phi_area'],
            'phi_id'      => $_SESSION['phi_id'],
            'guardian_id' => $guardianID,
            'email'       => $email,
        ]);
        if ($res) {
            return true;
        }
        return false;
    }

    public static function changePassword($email, $guardianID, $password) {
        $db = static::getDB();
        $sql = 'UPDATE tbl_child_patient 
                SET password=:password
                WHERE guardian_id=:guardian_id and email=:email';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'password'    => $password,
            'guardian_id' => $guardianID,
            'email'       => $email,
        ]);
        if ($res) {
            return true;
        }
        return false;
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

    public static function getRecord($patient_id, $record_id) {
        $db = static::getDB();
        $data = [
            'patient_id' => $patient_id,
            'record_id'  => $record_id,
            'type'       => 'child'
        ];
        $sql = 'SELECT * FROM tbl_record WHERE
                id=:record_id AND patient_id=:patient_id AND type=:type';
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)){
            return $row;
        }
        return false;
    }

    public static function getRecordsCnt($patient_id, $rec_cnt) {
        $db = static::getDB();
        $data = [
            'patient_id' => $patient_id,
            'rec_cnt'    => 2,
        ];
        $sql = 'SELECT id, datetime FROM tbl_record
                WHERE patient_id=:patient_id
                ORDER BY id DESC
                LIMIT :rec_cnt;';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":patient_id", $patient_id, PDO::PARAM_INT);
        $stmt->bindValue(":rec_cnt", $rec_cnt, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(!empty($row)){
            return $row;
        }
        return false;
    }

}
