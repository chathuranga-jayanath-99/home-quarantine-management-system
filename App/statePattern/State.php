<?php

namespace App\statePattern;

use App\Controllers\Patient;

abstract class State {
    public abstract function nextState($patient);

    public function markDead($patient) {
        $patient->transitionTo(Dead::getInstance());
    }
    
    protected function __construct($patient) {
        setPatient($patient);
    }

    protected function setPatient($patient) {
        $this->patient = $patient;
    }

    public static function objFromName($stateName) {
        $stateName = ucfirst($stateName);
        if (class_exists($stateName)) {
            return $stateName::getInstance();
        }
        return false;
    }

}
