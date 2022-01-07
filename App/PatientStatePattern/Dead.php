<?php

namespace App\PatientStatePattern;

use App\Controllers\Patient;

class Dead extends PatientState {
    private static $instance;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset(static::$instance)) {
            static::$instance = new Dead();
        }
        return static::$instance;
    }

    public function nextState($patient) {
        echo "Invalid operation: Changing state from Dead is not allowed";
    }

    public function toString() {
        return "Dead";
    }

}