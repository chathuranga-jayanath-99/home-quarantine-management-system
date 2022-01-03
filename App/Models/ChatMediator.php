<?php

namespace App\Models;

interface ChatMediator{
    public function sendMessage($msg, $patient);
    public function addPatient($patient);
} 