<?php

namespace App\Models;

use PDO;

class PHIModel extends User{
    protected $mediator;
    protected $name;

    public function __construct($chatMediator, $name){
        $this->mediator = $chatMediator;
        $this->name = $name;
    }

    public function send($msg){
        $this->mediator->sendMessage($msg);
    }

    public function receive($msg){
        // no need of this.
    }

    public static function register($data){

        $db = static::getDB();

        $sql = 'INSERT INTO tbl_phi (name, email, moh_area, PHI_station,phi_id , NIC, contact_number, password) 
                             values (:name, :email, :moh_area, :PHI_station, :phi_id , :NIC, :contact_number, :password)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'moh_area' => $data['moh_area'],
            'PHI_station' => $data['PHI_station'],
            'phi_id' => $data['PHI_id'],
            'NIC' => $data['NIC'],
            'contact_number' => $data['contact_number'],
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

        $sql = 'SELECT * FROM tbl_phi WHERE email=:email';
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

        $sql = 'SELECT * FROM tbl_phi WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($row)){
            
            $hashed_password = $row->password;
            echo $password ;
            if(password_verify($password, $hashed_password)){
                
                return $row;
            }
            else {
                return false;
            }
        }
        return false;

    }

    public static function getRecords($phiId){
        $db = static::getDB();
        
        $sql = 'SELECT r.id, ap.name, ap.age, r.type
        FROM tbl_record r
        JOIN tbl_adult_patient ap
        ON r.patient_id = ap.id
        WHERE r.phi_id=:phiId AND r.type="adult"';
        
        $stmt = $db->prepare($sql);
        $stmt->execute(['phiId' => $phiId]);
        $row1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $sql = 'SELECT r.id, cp.name, cp.age, r.type
        FROM tbl_record r
        JOIN tbl_child_patient cp
        ON r.patient_id = cp.id
        WHERE r.phi_id=:phiId AND r.type="child"';

        $stmt = $db->prepare($sql);
        $stmt->execute(['phiId' => $phiId]);
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



    public static function getPatientsOfPHI($phiId){
        $db = static::getDB();

        $sql1 = 'SELECT ap.id, ap.name
        FROM tbl_adult_patient ap WHERE ap.phi_id=:phiId';
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute(['phiId'=>$phiId]);
        $res1 = $stmt1->fetchAll(PDO::FETCH_OBJ);

        $sql2 = 'SELECT cp.id, cp.name
        FROM tbl_child_patient cp WHERE cp.phi_id=:phiId';
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute(['phiId'=>$phiId]);
        $res2 = $stmt2->fetchAll(PDO::FETCH_OBJ);

        $res = ['adult' => $res1, 'child' => $res2];

        return $res;

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

    public static function getFormNotfilledPatients($yesterday,$phiID){
        $db = static::getDB();
       
        $sql1 = 'SELECT r.id, ap.name, ap.age, r.type, ap.contact_no
        FROM tbl_adult_patient ap
        JOIN tbl_record r
        ON r.patient_id = ap.id
        WHERE r.phi_id=:phiID AND r.datetime!=:yesterday  AND   r.type="adult"
        GROUP BY ap.id ';                                // cp.start_quarantine_date <:yesterday AND
        $stmt = $db->prepare($sql1);
        $stmt->execute(['phiID' => $phiID, 'yesterday' => $yesterday]);
        $row1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        $sql2 = 'SELECT r.id, cp.name, cp.age, r.type, cp.contact_no
        FROM tbl_child_patient cp
        JOIN tbl_record r
        ON r.patient_id = cp.id
        WHERE r.phi_id=:phiID AND r.datetime!=:yesterday AND  cp.start_quarantine_date <:yesterday  AND r.type="child" 
        GROUP BY cp.id ';
        $stmt = $db->prepare($sql2);
        $stmt->execute(['phiID' => $phiID, 'yesterday' => $yesterday]);
        $row2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $res = ['adult' => $row1, 'child' => $row2];
        return $res;   

        // AND cp.start_quarantine_date <: AND yesterday <:cp.end_quarantine_date

        // $res = $row1+$row2 ;
        // if(!empty($res)){
        //     return $res ;
        // }
        // else{
        //     return false ;
        // }
    }

    public static function getUpdates($phiID){

        $db = static::getDB();
        $sql1 = 'SELECT u.id, ap.name, u.type
        FROM tbl_updates u
        JOIN tbl_adult_patient ap
        ON u.patient_id = ap.id
        WHERE u.phi_id=:phiId AND u.type="adult" AND u.approve_state="pending"';
        $stmt = $db->prepare($sql1);
        $stmt->execute(['phiId' => $phiID]);
        $row1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql2 = 'SELECT u.id, cp.name, u.type
        FROM tbl_updates u
        JOIN tbl_child_patient cp
        ON u.patient_id = cp.id
        WHERE u.phi_id=:phiId AND u.type="child" AND u.approve_state="pending"';
        $stmt = $db->prepare($sql2);
        $stmt->execute(['phiId' => $phiID]);
        $row2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $res = ['adult' => $row1, 'child' => $row2];
        return $res; 

    }


    public static function getUpdate($updateID,$type){
        $db = static::getDB();
        
        if($type == 'adult'){

        
        $sql1 = 'SELECT u.id, u.name_change, u.type, u.email_change, u.contact_no_change, u.patient_id ,
                        ap.name , ap.email , ap.contact_no 
        FROM tbl_updates u
        JOIN tbl_adult_patient ap
        ON u.patient_id = ap.id
        WHERE u.id=:updateID';
        $stmt = $db->prepare($sql1);
        $stmt->execute(['updateID' => $updateID ]);
        $row1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        else{
        $sql1 = 'SELECT u.id, u.name_change, u.type, u.email_change, u.contact_no_change, u.patient_id ,
                        cp.name , cp.email , cp.contact_no 
        FROM tbl_updates u
        JOIN tbl_child_patient cp
        ON u.patient_id = cp.id
        WHERE u.id=:updateID';
        $stmt = $db->prepare($sql1);
        $stmt->execute(['updateID' => $updateID ]);
        $row1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $row1; 

    }

    public static function approveUpdate($update){

        $updateID = $update['update_id'];
        $db = static::getDB();
        $sql1 = 'UPDATE tbl_updates u
                 SET u.approve_state=:approveStat
                 WHERE u.id=:updateID' ;
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute(['updateID' => $updateID , 'approveStat' => 'approved']);

        if(empty($update['name_change'])){
            $update['name_change'] = $update['name'];
        }
        if(empty($update['email_change'])){
            $update['email_change']= $update['email'];
        }
        if(empty($update['contact_no_change'])){
            $update['contact_no_change']=$update['contact_no'];
        }


        if($update['type'] == 'adult'){

            $sql2 = 'UPDATE tbl_adult_patient ap
                 SET ap.name=:name , ap.email=:email , ap.contact_no=:contact_no
                 WHERE ap.id=:patient_id' ;
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute(['name' =>  $update['name_change'] , 'email' => $update['email_change'] ,
             'contact_no' => $update['contact_no_change'], 'patient_id' =>$update['patient_id'] ]);
           


        }
        elseif($update['type'] == 'child'){

            $sql2 = 'UPDATE tbl_child_patient cp
            SET cp.name=:name , cp.email=:email , cp.contact_no=:contact_no
            WHERE cp.id=:patient_id' ;
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute(['name' =>  $update['name_change'] , 'email' => $update['email_change'] , 
            'contact_no' => $update['contact_no_change'],'patient_id' =>$update['patient_id'] ]);

        }

    }

    public static function declineUpdate($updateID){
       
        $db = static::getDB();
        $sql1 = 'UPDATE tbl_updates u
                 SET u.approve_state=:approveStat
                 WHERE u.id=:updateID' ;
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute(['updateID' => $updateID , 'approveStat' => 'declined']);

    }
}