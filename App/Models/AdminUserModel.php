<?php

namespace App\Models;

use PDO;

class AdminUserModel extends \Core\Model{
    
    public static function findUserByEmail($email){
        $db = static::getDB();

        $sql = 'SELECT id FROM tbl_admin WHERE email=:email LIMIT 1';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email'=>$email]);
        if ($stmt->rowCount() > 0){
            return true;
        } 
        return false;

    }

    public static function register($data){
        $db = static::getDB();

        $sql = 'INSERT INTO tbl_admin (name, email, password)
        values (:name, :email, :password)';
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        if ($res) 
            return true;
        else
            return false;

    }

    public static function login($email, $password){
        $db = static::getDB();

        $sql = 'SELECT * FROM tbl_admin WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        if (!empty($row)){
            $stored_password = $row->password;

            if (password_verify($password, $stored_password)){
                return $row;
            }
            else{
                return false;
            }
        }
        return false;
    }

    public static function getAdminCount(){
        $db = static::getDB();

        $sql = 'SELECT id FROM tbl_admin';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function getDoctorCount(){
        $db = static::getDB();

        $sql = 'SELECT id FROM tbl_doctor';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function getPHICount(){
        $db = static::getDB();

        $sql = 'SELECT id FROM tbl_phi';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function getAdmins() {
        $db = static::getDB();

        $sql = 'SELECT id, name, email FROM tbl_admin';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $admins = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $admins;
    }
    
    public static function getDoctors() {
        $db = static::getDB();

        $sql = 'SELECT id, name, email FROM tbl_doctor';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $doctors = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $doctors;
    }

    public static function getPHIs() {
        $db = static::getDB();

        $sql = 'SELECT id, name, email FROM tbl_phi';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $phis = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $phis;
    }

    public static function resetPassword($id, $data){
        $db = static::getDB();

        $sql = 'SELECT password FROM tbl_admin WHERE id=:id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $admin = $stmt->fetch(PDO::FETCH_OBJ);   

        if ($admin){

            if (password_verify($data['current_password'], $admin->password)){
                // change password to new one.

                $sql2 = 'UPDATE tbl_admin SET password=:password WHERE id=:id';
                $stmt2 = $db->prepare($sql2);
                $res = $stmt2->execute([
                    'password' => $data['new_password'],
                    'id' => $id,
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

    public static function getDoctor($doctorID) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_doctor WHERE id=:id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $doctorID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row)){
            return $row;
        }
        else {
            return false;
        }
    }

    public static function getPHI($phiID) {
        $db = static::getDB();
        $sql = 'SELECT * FROM tbl_phi WHERE id=:id';
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $phiID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row)){
            return $row;
        }
        else {
            return false;
        }
    }

}
