<?php

namespace App\Models;

use PDO;

class MedicalOfficerModel extends \Core\Model{
    
    public static function getPatientsMatched($str){
        $db = static::getDB();

        $sql1 = 'SELECT id, name FROM tbl_adult_patient';
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute();
        $res1 = $stmt1->fetchAll(PDO::FETCH_OBJ);

        $sql2 = 'SELECT id, name FROM tbl_child_patient';
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();
        $res2 = $stmt2->fetchAll(PDO::FETCH_OBJ);

        $adults = array();
        foreach ($res1 as $ap){
            $sub = "/".$str."/i";
            if (preg_match($sub, $ap->name)){
                array_push($adults, $ap);
            }
        }

        $childs = array();
        foreach ($res2 as $cp){
            $sub = "/".$str."/i";
            if (preg_match($sub, $cp->name)){
                array_push($childs, $cp);
            }
        }

        $res = ['adult'=>$adults, 'child'=>$childs];
        return $res;
    }
}