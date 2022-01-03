<?php

namespace App\Models;

use PDO;

abstract class PatientModel extends \Core\Model {
    protected $mediator;
    protected $name;

    public function __construct($chatMediator, $name){
        $this->mediator = $chatMediator;
        $this->name = $name;
    }

    public function receive($msg){
        // write msg to db 
    }

}