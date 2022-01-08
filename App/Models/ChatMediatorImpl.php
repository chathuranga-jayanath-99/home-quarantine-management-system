<?php

namespace App\Models;

class ChatMediatorImpl implements ChatMediator{
    private $users;

    public function __construct(){
        $this->users = array();
    }

    public function addUser($user){
        array_push($this->users, $user);
    }

    public function sendMessage($msg, $officer){
        foreach ($this->users as $user){
            $user->receive($msg);
        }
    }
}