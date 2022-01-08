<?php

namespace App\PatientStatePattern;

use App\Controllers\Patient;

class Positive extends PatientState {
    private static $instance;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset(static::$instance)) {
            static::$instance = new Positive();
        }
        return static::$instance;
    }

    public function nextState($patient) {
        $patient->transitionTo(Inactive::getInstance());
    }

    public function toString() {
        return "Positive";
    }

}