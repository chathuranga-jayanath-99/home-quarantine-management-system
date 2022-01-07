<?php

namespace App\RecordStatePattern;

class Unchecked extends RecordState {
    private static $instance;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset(static::$instance)) {
            static::$instance = new Unchecked();
        }
        return static::$instance;
    }

    public function nextState($record) {
        $record->transitionTo(Checked::getInstance());
    }

    public function toString() {
        return "Unhecked";
    }

}