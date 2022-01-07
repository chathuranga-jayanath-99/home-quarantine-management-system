<?php

namespace App\Models;

use PDO;

abstract class PatientModel extends \Core\Model {

    public function receive($msg){
        // write msg to db 
    }

}