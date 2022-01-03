<?php

namespace App\Models;

class ChatMediatorImpl implements ChatMediator{
    private $patients;

    public function __construct(){
        $this->patients = array();
    }

    public function addPatient($patient){
        array_push($this->patients, $patient);
    }

    public function sendMessage($msg, $officer){
        foreach ($this->patients as $patient){
            $patient->receive($msg);
        }
    }
}