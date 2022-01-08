<?php

namespace App\Models;

use PDO;

abstract class PatientModel extends User {
    protected $id;

    public function __construct($id, $mediator, $name)
    {
        parent::__construct($mediator, $name);
        $this->id = $id;
    }

    public function receive($msg){
        // write msg to db 
    }
    public function send($msg){
        // no need of this.
    }
}