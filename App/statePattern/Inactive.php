<?php

namespace App\statePattern;

use App\Controllers\Patient;

class Inactive extends State {
    private $instance;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset($instance)) {
            $instance = new Inactive();
        }
    }

    public function nextState($patient) {
        //TODO
    }

}