<?php

namespace App\statePattern;

use App\Controllers\Patient;

class Pending extends State {

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset($instance)) {
            $instance = new Pending();
        }
        return $instance;
    }

    public function nextState($patient) {
        //TODO
    }

    public function toString() {
        return "Pending";
    }

}