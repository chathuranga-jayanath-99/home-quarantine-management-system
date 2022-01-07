<?php

namespace App\statePattern;

use App\Controllers\Patient;

class Contact extends PatientState {
    private static $instance;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset(static::$instance)) {
            static::$instance = new Contact();
        }
        return static::$instance;
    }

    public function nextState($patient) {
        $patient->transitionTo(Positive::getInstance());
    }

    public function toString() {
        return "Contact Person";
    }

}