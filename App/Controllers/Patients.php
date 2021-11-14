<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Patients extends \Core\Controller
{
    public function __construct()
    {
        
    }

    public function registerAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                
            ];

            // load view
            View::render('Patients/register.php', $data);
        }
    }

    public function __login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        else {
            $data = [
                'email' => '',
                'password' => '',
                
            ];

            // load view
            View::render('Patients/login.php', $data);
        }
    }
}