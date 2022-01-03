<?php

namespace App\statePattern;

use App\Controllers\Patient;

class Positive extends State {
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
        //TODO
    }

    public function toString() {
        return "Positive";
    }

}