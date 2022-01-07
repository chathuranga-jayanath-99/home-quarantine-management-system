<?php

namespace App\RecordStatePattern;

abstract class RecordState {
    public abstract function nextState($record);
    public abstract function toString();

    protected function __construct() {
        
    }

}
