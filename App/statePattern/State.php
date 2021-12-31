<?php

namespace App\statePattern;

use App\Controllers\Patient;

abstract class State {
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
        $stateName = 'App\statePattern\\'.ucfirst($stateName);
        if (class_exists($stateName)) {
            return $stateName::getInstance();
        } else {
            return false;
        }
    }

}
