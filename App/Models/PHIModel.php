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

        $sql = 'INSERT INTO tbl_phi (name, email, moh_area, PHI_station, NIC, contact_number, password) 
                             values (:name, :email, :moh_area, :PHI_station, :NIC, :contact_number, :password)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'moh_area' => $data['moh_area'],
            'PHI_station' => $data['PHI_station'],
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
}