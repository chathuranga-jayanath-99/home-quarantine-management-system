<?php

namespace App\Models;

use PDO;

class ChildPatientModel extends \Core\Model{

    public static function register($data) {
        $db = static::getDB();
    }

    public static function login($email, $password) {
        $db = static::getDB();
    }

    public static function searchByGuardianID($guardianID) {
        $db = static::getDB();
    }

}