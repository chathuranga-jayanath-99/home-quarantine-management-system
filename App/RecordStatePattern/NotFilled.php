<?php

namespace App\RecordStatePattern;

class NotFilled extends RecordState {
    private static $instance;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() {
        if (!isset(static::$instance)) {
            static::$instance = new NotFilled();
        }
        return static::$instance;
    }

    public function nextState($record) {
        $record->transitionTo(Unchecked::getInstance());
    }

    public function toString() {
        return "Not-Filled";
    }

}