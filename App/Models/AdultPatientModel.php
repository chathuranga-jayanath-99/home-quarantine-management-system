<?php

use PDO;

class AdultPatientModel extends \Core\Model{

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
}