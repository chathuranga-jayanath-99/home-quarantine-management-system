<?php

namespace App\RecordStatePattern;

class Checked extends RecordState {
    private static $instance;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset(static::$instance)) {
            static::$instance = new Checked();
        }
        return static::$instance;
    }

    public function nextState($record) {
        $record->transitionTo(Checked::getInstance());
    }

    public function toString() {
        return "Checked";
    }

}