<?php

namespace App\statePattern;

use App\Controllers\Patient;

class Contact extends State {

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset($instance)) {
            $instance = new Contact();
        }
        return $instance;
    }

    public function nextState($patient) {
        //TODO
    }

    public function toString() {
        return "Contact Person";
    }

}