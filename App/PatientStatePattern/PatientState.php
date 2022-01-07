<?php

namespace App\PatientStatePattern;

use App\Controllers\Patient;

abstract class PatientState {
    public abstract function nextState($patient);
    public abstract function toString();

    public function markDead($patient) {
        $patient->transitionTo(Dead::getInstance());
    }

    protected function __construct() {
        
    }

    protected function setPatient($patient) {
        $this->patient = $patient;
    }

    public static function objFromName($stateName) {
        $stateName = 'App\PatientStatePattern\\'.ucfirst($stateName);
        if (class_exists($stateName)) {
            return $stateName::getInstance();
        } else {
            return false;
        }
    }

}
