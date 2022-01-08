<?php

namespace App\Models;

abstract class User extends \Core\Model{
    protected $mediator;
    protected $name;

    public function __construct($chatMediator, $name){
        $this->mediator = $chatMediator;
        $this->name = $name;
    }

    public abstract function send($msg);
    public abstract function receive($msg);    
}
