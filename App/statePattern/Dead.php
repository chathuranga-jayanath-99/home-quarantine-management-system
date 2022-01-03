<?php

namespace App\statePattern;

use App\Controllers\Patient;

class Dead extends State {
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
        //TODO
    }

    public function toString() {
        return "Dead";
    }

}