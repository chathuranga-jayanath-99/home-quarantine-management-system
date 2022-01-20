<?php

namespace App\Models;

use PDO;

class DoctorModel extends MedicalOfficerModel{

    public static function register($data){

        $db = static::getDB();

        $sql = 'INSERT INTO tbl_doctor 
        (name, email, password, moh_area, contact_no, NIC, slmc_reg_no, gender, birthday) values 
        (:name, :email, :password, :moh_area, :contact_no, :NIC, :slmc_reg_no, :gender, :birthday)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>$data['password'],
            'moh_area'=>$data['moh_area'],
            'contact_no'=>$data['contact_no'],
            'NIC'=>$data['NIC'],
            'slmc_reg_no'=>$data['slmc_reg_no'],
            'gender'=>$data['gender'],
            'birthday'=>$data['birthday'],
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
        $row['type'] = $patientType;
        
        if(!empty($row)){
            return $row;
        }
        else {
            return false;
        }
    }

    // get all unchecked records
    public static function getRecords($doctorId){
        $db = static::getDB();
        
        $sql = 'SELECT r.id, ap.name, ap.age, r.type
        FROM tbl_record r
        JOIN tbl_adult_patient ap
        ON r.patient_id = ap.id
        WHERE r.doctor_id=:doctorId AND r.type="adult" AND r.checked=0';
        
        $stmt = $db->prepare($sql);
        $stmt->execute(['doctorId' => $doctorId]);
        $row1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $sql = 'SELECT r.id, cp.name, cp.age, r.type
        FROM tbl_record r
        JOIN tbl_child_patient cp
        ON r.patient_id = cp.id
        WHERE r.doctor_id=:doctorId AND r.type="child" AND r.checked=0';

        $stmt = $db->prepare($sql);
        $stmt->execute(['doctorId' => $doctorId]);
        $row2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $res = ['adult' => $row1, 'child' => $row2];
        
        // if(!empty($res['adult'] || !empty($res['child']))){
        //     return $res;
        // }
        // else {
        //     return false;
        // }
        return $res;
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
        name=:name, email=:email, moh_area=:moh_area, contact_no=:contact_no, 
        NIC=:NIC, slmc_reg_no=:slmc_reg_no, gender=:gender, birthday=:birthday
        WHERE id=:doctor_id';

        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'moh_area'=>$data['moh_area'],
            'contact_no'=>$data['contact_no'],
            'NIC'=>$data['NIC'],
            'slmc_reg_no'=>$data['slmc_reg_no'],
            'doctor_id' => $data['doctor_id'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
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

    public static function getMedicalHistory($patientId, $patientType){
        $db = static::getDB();
        
        $sql = 'SELECT description FROM tbl_medical_history WHERE patient_id=:patientId AND patient_type=:patientType';
        $stmt = $db->prepare($sql);
        $stmt->execute(['patientId'=>$patientId, 'patientType'=>$patientType]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row){
            return $row['description'];
        }
        else{
            return 'No medical history provided.';
        }


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
        $db = static::getDB();

        $sql1 = 'SELECT ap.id, ap.name, ap.age, ap.end_quarantine_date
        FROM tbl_adult_patient ap
        WHERE ap.doctor_id=:doctorId AND ap.end_quarantine_date <= :today';

        $sql2 = 'SELECT cp.id, cp.name, cp.age, cp.end_quarantine_date
        FROM tbl_child_patient cp
        WHERE cp.doctor_id=:doctorId AND cp.end_quarantine_date <= :today';

        $stmt1 = $db->prepare($sql1);
        $stmt1->execute(['doctorId'=>$doctorId, 'today'=>date("Y-m-d")]);
        $res1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
        self::addType('adult', $res1);

        $stmt2 = $db->prepare($sql2);
        $stmt2->execute(['doctorId'=>$doctorId, 'today'=>date("Y-m-d")]);
        $res2 = $stmt2->fetchAll(PDO::FETCH_OBJ);
        self::addType('child', $res2);
        
        $res = array_merge($res1, $res2);

        usort($res, array("App\Models\DoctorModel", "compareByQuarantineDate"));
        return $res;
    }

    public static function resetPassword($data){
        $db = static::getDB();

        $sql = 'SELECT password FROM tbl_doctor WHERE id=:id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $data['id']]);
        $doctor = $stmt->fetch(PDO::FETCH_OBJ);

        if ($doctor){

            if (password_verify($data['current_password'], $doctor->password)){

                // change password to new one
                $sql2 = 'UPDATE tbl_doctor SET password=:password WHERE id=:id';
                $stmt2 = $db->prepare($sql2);
                $res = $stmt2->execute([
                    'password' => $data['new_password'],
                    'id' => $data['id'],
                ]);

                if ($res){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        return false;
    }

    // public static function endQuarantinePeriod($patientId, $patientType){
    //     $db = static::getDB();

    //     if (strcmp($patientType, 'adult') == 0){
    //         $sql = 'UPDATE tbl_adult_patient SET end_quarantine_date=NULL, doctor_id=NULL WHERE id=:id';
    //     }
    //     else if(strcmp($patientType, 'child') == 0){
    //         $sql = 'UPDATE tbl_child_patient SET end_quarantine_date=NULL, doctor_id=NULL WHERE id=:id';
    //     }
    //     else{
    //         return false;
    //     }
    //     $stmt = $db->prepare($sql);
    //     // $res = $stmt->execute(['id'=>$patientId]);
        
    //     // reduce doctor's count
    //     // self::reduceDoctorPatientCount();

    //     // make patinet inactive        
    //     self::changePatientStateToInactive($patientId, $patientType);
    //     // return $res;

    // }

    // private static function reduceDoctorPatientCount(){
    //     $db = static::getDB();
    //     $doctorId = $_SESSION['doctor_id'];

    //     $sql = 'UPDATE tbl_doctor SET patient_count=patient_count-1 WHERE id=:doctorId';
    //     $stmt = $db->prepare($sql);
    //     $res = $stmt->execute(['doctorId' => $doctorId]);
        
    //     return $res;
    // }

    public static function changePatientStateToInactive($patientId, $patientType){
        $db = static::getDB();

        if (strcmp($patientType, 'adult') == 0){
            $sql = 'SELECT * FROM tbl_adult_patient WHERE id=:patientId';
        }
        else if(strcmp($patientType, 'child') == 0){
            $sql = 'SELECT * FROM tbl_child_patient WHERE id=:patientId';
        }
        else{
            return false;
        }

        $stmt = $db->prepare($sql);
        $stmt->execute(['patientId' => $patientId]);
        $patientObj = $stmt->fetch(PDO::FETCH_OBJ);

        // if (class_exists())
        $controllerClass = 'App\Controllers\\'.ucfirst($patientType).'Patient';
        if (class_exists($controllerClass)){
            echo 'stop2';
            echo $controllerClass;
            die();
            $patientController = new $controllerClass();
            $patientController->initializeByObj($patientObj);
            echo 'set inactive';
            $patientController->setInactive();

            return true;
        }
        else{
            return false;
        }
    }

    public static function extendQuarantineDate($patientId, $patientType, $extendedDate){
        $db = static::getDB();

        if (strcmp($patientType, 'adult') == 0){
            $sql = 'UPDATE tbl_adult_patient SET end_quarantine_date=:extendedDate WHERE id=:id';
        }
        else if (strcmp($patientType, 'child') == 0){
            $sql = 'UPDATE tbl_child_patient SET end_quarantine_date=:extendedDate WHERE id=:id';
        }
        else{
            return false;
        }
        $stmt = $db->prepare($sql);
        $res = $stmt->execute(['id'=>$patientId, 'extendedDate'=>$extendedDate]);

        // notify patinet
        self::sendMessageToPatient($patientId, $patientType, $extendedDate);

        return $res;
    }

    private static function sendMessageToPatient($patientId, $patientType, $extendedDate){
        $db = static::getDB();

        $doctorId = $_SESSION['doctor_id'];

        $sql = 'INSERT INTO tbl_msg (content, sender_id, sender_type, receiver_id, receiver_type)
        values (:content, :senderId, :senderType, :receiverId, :receiverType)';

        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'content' => 'Your quarantine period has been extended to '.$extendedDate,
            'senderId' => $doctorId,
            'senderType' => 'doctor',
            'receiverId' => $patientId,
            'receiverType' => $patientType
        ]);
        return $res;
    }

    public static function getPatientRecords($patientId, $patientType){
        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_record WHERE patient_id=:patientId AND type=:type';
        $stmt = $db->prepare($sql);
        $stmt->execute(['patientId'=>$patientId, 'type'=>$patientType]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    private static function addType($type, $arr){
        foreach ($arr as $ele){
            $ele->type = $type;
        }
    }

    private static function compareByQuarantineDate($x, $y){
        return $x->end_quarantine_date > $y->end_quarantine_date;
    }
}