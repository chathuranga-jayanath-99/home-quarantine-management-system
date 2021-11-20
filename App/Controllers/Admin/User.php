<?php

namespace App\Controllers\Admin;

class User extends \Core\Controller
{   
    protected function before(){
        return $this->isLoggedIn();
    }

    public function isLoggedIn(){
        if(isset($_SESSION['admin_user_id'])){
            return true;
        }
        else {
            return false;
        }
    }

    public function indexAction()
    {
        echo "Hello from index in Admin/Users";
    }

    public function addNewAction()
    {
        echo "Hello from addNew in Admin/Users";
    }

    public function registerAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }
            
        }
    }
}