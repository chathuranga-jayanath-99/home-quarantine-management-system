<?php

namespace App\statePattern;

use App\Controllers\Patient;

class Inactive extends PatientState {
    private static $instance;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset(static::$instance)) {
            static::$instance = new Inactive();
        }
        return static::$instance;
    }

    public function nextState($patient) {
        $patient->transitionTo(Contact::getInstance());
    }

    public function toString() {
        return "Inactive";
    }

}