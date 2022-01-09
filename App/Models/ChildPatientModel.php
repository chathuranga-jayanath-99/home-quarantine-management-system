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

    public static function changeStateAndDoctor($email, $guardianID, $state, $doctor_id) {
        $db = static::getDB();
        $sql_1 = 'UPDATE tbl_child_patient
                SET state=:state, phi_range=:phi_range, phi_id=:phi_id, doctor_id=:doctor_id,
                end_quarantine_date = date_add(NOW(), INTERVAL 2 WEEK)
                WHERE guardian_id=:guardian_id and email=:email';
        $stmt_1 = $db->prepare($sql_1);
        $res_1 = $stmt_1->execute([
            'state'       => $state,
            'phi_range'   => $_SESSION['phi_area'],
            'phi_id'      => $_SESSION['phi_id'],
            'doctor_id'   => $doctor_id,
            'guardian_id' => $guardianID,
            'email'       => $email,
        ]);
        if ($res_1) {
            $sql_2 = 'UPDATE tbl_doctor
                        SET patient_count = patient_count + 1
                        WHERE id=:doctor_id;';
            $stmt_2 = $db->prepare($sql_2);
            $stmt_2->bindValue(":doctor_id", $doctor_id, PDO::PARAM_INT);
            $res_2 = $stmt_2->execute();
            if ($res_2) {
                return true;
            }
        }
        return false;
    }

    public static function markInactiveOrDead($patientID, $doctor_id, $state) {
        $db = static::getDB();
        $sql_1 = 'UPDATE tbl_child_patient
                SET state=:state, doctor_id=:doctor_id, end_quarantine_date = NULL
                WHERE id=:id';
        $stmt_1 = $db->prepare($sql_1);
        $res_1 = $stmt_1->execute([
            'state'       => $state,
            'doctor_id'   => 0,
            'id'          => $patientID
        ]);
        if ($res_1) {
            $sql_2 = 'UPDATE tbl_doctor
                        SET patient_count = patient_count - 1
                        WHERE id=:doctor_id;';
            $stmt_2 = $db->prepare($sql_2);
            $stmt_2->bindValue(":doctor_id", $doctor_id, PDO::PARAM_INT);
            $res_2 = $stmt_2->execute();
            if ($res_2) {
                return true;
            }
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

    public function receive($msg){

        // write msg to db 
        if (isset($_SESSION['phi_id'])){
            $db = static::getDB();

            $data = [
                'sender_id' => $_SESSION['phi_id'],
                'sender_type' => 'phi',
            ];

            $sql = 'INSERT INTO tbl_msg 
            (content, sender_id, sender_type, receiver_id, receiver_type, msg_read)
            values
            (:content, :sender_id, :sender_type, :receiver_id, :receiver_type, 0)';
            
            $stmt = $db->prepare($sql);
            $res = $stmt->execute([
                'content' => $msg,
                'sender_id' => $data['sender_id'],
                'sender_type' => $data['sender_type'],
                'receiver_id' => $this->id,
                'receiver_type' => 'child'
            ]);

        }
       
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

    public static function endQuarantinePeriod($patientId){
        $db = static::getDB();

        $sql = 'UPDATE tbl_child_patient SET end_quarantine_date=NULL, doctor_id=NULL WHERE id=:id';
        $stmt = $db->prepare($sql);

        $res = $stmt->execute(['id'=>$patientId]);
        
        // reduce doctor's count
        self::reduceDoctorPatientCount();
        return $res;
    }

    private static function reduceDoctorPatientCount(){
        $db = static::getDB();
        $doctorId = $_SESSION['doctor_id'];

        $sql = 'UPDATE tbl_doctor SET patient_count=patient_count-1 WHERE id=:doctorId';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute(['doctorId' => $doctorId]);
        
        return $res;
    }

    public static function getChildById($id){
        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_child_patient WHERE id=:id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);

        $obj = $stmt->fetch(PDO::FETCH_OBJ);
        return $obj;
    }
    public static function getDoctorToAssign() {
        $db = static::getDB();
        $sql = 'SELECT id FROM tbl_doctor
                ORDER BY patient_count ASC
                LIMIT 1;';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(!empty($row)){
            return $row;
        }
        return false;
    }

    public static function getNotificationsAll($child_id) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_msg
                WHERE receiver_id=:receiver_id AND receiver_type=:receiver_type
                ORDER BY id DESC;';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'receiver_id'   => $child_id,
            'receiver_type' => 'child'
        ]);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(!empty($row)){
            return $row;
        }
        return false;
    }

    public static function getNotificationsUnread($child_id) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_msg
                WHERE receiver_id=:receiver_id AND receiver_type=:receiver_type AND msg_read=:msg_read
                ORDER BY id DESC;';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'receiver_id'   => $child_id,
            'receiver_type' => 'child',
            'msg_read'      => 0
        ]);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(!empty($row)){
            return $row;
        }
        return false;
    }

    public static function getNotificationsRead($child_id) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_msg
                WHERE receiver_id=:receiver_id AND receiver_type=:receiver_type AND msg_read=:msg_read
                ORDER BY id DESC;';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'receiver_id'   => $child_id,
            'receiver_type' => 'child_patient',
            'msg_read'      => 1
        ]);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(!empty($row)){
            return $row;
        }
        return false;
    }

    public static function readNotification($msg_id, $receiver_type, $receiver_id) {
        $db = static::getDB();
        $sql = 'UPDATE tbl_msg
                SET msg_read=:msg_read
                WHERE id=:msg_id AND receiver_type=:receiver_type AND receiver_id=:receiver_id;';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'msg_read'      => 1,
            'msg_id'        => (int) $msg_id,
            'receiver_type' => $receiver_type,
            'receiver_id'   => $receiver_id
        ]);
        if ($res) {
            return true;
        }
        return false;
    }

    public static function readNotificationAll($receiver_type, $receiver_id) {
        $db = static::getDB();
        $sql = 'UPDATE tbl_msg
                SET msg_read=:msg_read_1
                WHERE msg_read=:msg_read_0 AND receiver_type=:receiver_type AND receiver_id=:receiver_id;';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'msg_read_1'    => 1,
            'msg_read_0'    => 0,
            'receiver_type' => $receiver_type,
            'receiver_id'   => $receiver_id
        ]);
        if ($res) {
            return true;
        }
        return false;
    }

}
