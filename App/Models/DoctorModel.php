<?php

namespace App\Models;

use PDO;

class DoctorModel extends MedicalOfficerModel{

    public static function register($data){

        $db = static::getDB();

        $sql = 'INSERT INTO tbl_doctor 
        (name, email, password, moh_area, contact_no, NIC, slmc_reg_no) values 
        (:name, :email, :password, :moh_area, :contact_no, :NIC, :slmc_reg_no)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>$data['password'],
            'moh_area'=>$data['moh_area'],
            'contact_no'=>$data['contact_no'],
            'NIC'=>$data['NIC'],
            'slmc_reg_no'=>$data['slmc_reg_no']
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
        
        $res = ['adult' => $res1, 'child' => $res2];

        return $res;
    }

    public static function getAssingedPatient($patientId, $patientType){
        $db = static::getDB();

        if ($patientType == 'adult'){
            $sql = 'SELECT * FROM tbl_adult_patient WHERE id=:patientId';
        }
        elseif($patientType == 'child'){
            $sql = 'SELECT * FROM tbl_child_patient WHERE id=:patientId';
        }

        $stmt = $db->prepare($sql);
        $stmt->execute(['patientId' => $patientId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row)){
            return $row;
        }
        else {
            return false;
        }
    }

    public static function getRecords($doctorId){
        $db = static::getDB();
        
        $sql = 'SELECT r.id, ap.name, ap.age, r.type
        FROM tbl_record r
        JOIN tbl_adult_patient ap
        ON r.patient_id = ap.id
        WHERE r.doctor_id=:doctorId AND r.type="adult"';
        
        $stmt = $db->prepare($sql);
        $stmt->execute(['doctorId' => $doctorId]);
        $row1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $sql = 'SELECT r.id, cp.name, cp.age, r.type
        FROM tbl_record r
        JOIN tbl_child_patient cp
        ON r.patient_id = cp.id
        WHERE r.doctor_id=:doctorId AND r.type="child"';

        $stmt = $db->prepare($sql);
        $stmt->execute(['doctorId' => $doctorId]);
        $row2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $res = ['adult' => $row1, 'child' => $row2];
        
        if(!empty($res['adult'] || !empty($res['child']))){
            return $res;
        }
        else {
            return false;
        }

    }

    public static function getRecord($recordId){
        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_record WHERE id=:recordId';

        $stmt = $db->prepare($sql);
        $stmt->execute(['recordId' => $recordId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row)){
            return $row;
        }
        return false;
    }

    public static function giveFeedback($recordId, $feedback){
        $db = static::getDB();

        $sql = 'UPDATE tbl_record SET feedback=:feedback, checked=1 WHERE id=:record_id';

        $stmt = $db->prepare($sql);
        $res = $stmt->execute(['feedback'=>$feedback, 'record_id' => $recordId]);

        if ($res){
            return true;
        }
        return false;
    }

    public static function getDetails(){
        $db = static::getDB();

        $doctorId = $_SESSION['doctor_id'];

        if (!empty($doctorId)){
            $sql = 'SELECT * FROM tbl_doctor WHERE id=:id';
            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $doctorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($row)){
                return $row;
            }
            else {
                return false;
            }
            
        }else {
            return false;
        }
    }

    public static function updateAccount($data){
        $db = static::getDB();

        $sql = 'UPDATE tbl_doctor SET
        name=:name, email=:email, 
        moh_area=:moh_area, contact_no=:contact_no, NIC=:NIC, slmc_reg_no=:slmc_reg_no
        WHERE id=:doctor_id';

        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'moh_area'=>$data['moh_area'],
            'contact_no'=>$data['contact_no'],
            'NIC'=>$data['NIC'],
            'slmc_reg_no'=>$data['slmc_reg_no'],
            'doctor_id' => $data['doctor_id']
        ]);

        if($res){
            return true;
        }
        else {
            return false;
        }
    }

    public static function getNameById($doctorId){
        $db = static::getDB();

        $sql = 'SELECT name FROM tbl_doctor WHERE id=:id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $doctorId]);
        $name = $stmt->fetch();

        if ($name){
            
            return $name;
        }
        else {
            return false;
        }
    }

    public static function getMedicalHistoryId($patientId, $patientType){
        $db = static::getDB();

        // if ($patientType == 'adult'){
        //     $sql = 'SELECT medical_history_id FROM tbl_adult_patinet WHERE id=:id';

        // }
        // else{
        //     $sql = 'SELECT medical_history_id FROM tbl_child_patinet WHERE id=:id';
        // }
        // $stmt = $db->prepare($sql);
        // $stmt->execute(['id' => $patientId]);
        // $medical_history_id = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // if ($medical_history_id) {
        //     return $medical_history_id;
        // }
        // return false;
    }

    public static function getPatientsToMarkResult($doctorId){
        return static::getAssingedPatients($doctorId);
    }
}