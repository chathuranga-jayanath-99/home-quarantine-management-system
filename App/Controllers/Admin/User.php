<?php

namespace App\Controllers\Admin;

use App\Models\AdminUserModel;
use \Core\View;

class User extends \Core\Controller
{   
    protected function before(){
        return true;
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
                'name' => htmlspecialchars(trim($_POST['name'])),
                'email' => htmlspecialchars(trim($_POST['email'])),
                'password' => htmlspecialchars($_POST['password']),
                'confirm_password' => htmlspecialchars($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            if ($data['password'] == $data['confirm_password']){
                // register user
                if (AdminUserModel::register($data)){
                    header('location:'.URLROOT.'/admin/user/login');
                }
                else{
                    //error occured
                }
            }
            
        }
        else{
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => ''
            ];

            View::render('Admins/register.php', ['data' => $data]);
        }
    }
}