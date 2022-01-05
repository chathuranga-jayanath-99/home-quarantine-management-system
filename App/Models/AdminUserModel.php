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
}