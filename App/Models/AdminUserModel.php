<?php

namespace App\Models;

use PDO;

class AdminUserModel extends \Core\Model{
    
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
            // if (strcmp($password, $stored_password) == 0) {
                echo $password.'<br>';
                echo $stored_password.'<br>';
                // if ($password == $stored_password) {
                echo 'password  matched';
                return $row;
            }
            else{
                echo 'password not matched';
                return false;
            }
        }
        return false;
    }
}