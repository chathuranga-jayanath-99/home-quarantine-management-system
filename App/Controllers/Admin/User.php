<?php

namespace App\Controllers\Admin;

use App\Models\AdminUserModel;
use \Core\View;

class User extends \Core\Controller
{   
    protected function before(){
        if ($this->isLoggedIn()){
            return true;
        }
        else{
            header('location: '.URLROOT.'/admin/user/login');
        }
    }

    public function isLoggedIn(){
        if(isset($_SESSION['admin_id'])){
            return true;
        }
        else {
            return false;
        }
    }

    public function indexAction()
    {
        $adminCount = AdminUserModel::getAdminCount();
        $doctorCount = AdminUserModel::getDoctorCount();
        $phiCount = AdminUserModel::getPHICount();

        $data = [
            'adminCount' =>$adminCount,
            'doctorCount' => $doctorCount,
            'phiCount' => $phiCount,
        ];

        View::render('Admins/index.php', ['data'=> $data]);
    }

    public function addNewAction()
    {
        echo "Hello from addNew in Admin/Users";
    }

    public function manageAdminAction(){

        $admins = AdminUserModel::getAdmins();

        View::render('Admins/manage-admin.php', ['admins' => $admins]);
    }

    public function manageDoctorAction(){

        $doctors = AdminUserModel::getDoctors();

        View::render('Admins/manage-doctor.php', ['doctors' => $doctors]);
    } 

    public function managePHIAction(){

        $phis = AdminUserModel::getPHIs();
        
        View::render('Admins/manage-phi.php', ['phis' => $phis]);
    } 

    public function resetPasswordAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $adminId = $_REQUEST['admin_id'];
            echo $adminId;
        }
        else{
            View::render('Admins/reset-password.php');
        }
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
                'confirm_password' => '',
            ];

            if (empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }
            if (empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }
            else{
                if (AdminUserModel::findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }
            if (empty($data['password'])){
                $data['email_err'] = 'Please enter email';
            }
            else if (strlen($data['password'] < 4)){
                $data['password_err'] = 'Password must be at least 4 characters';
            }
            if (empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            }
            else {
                if ($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            if (empty($data['name_err']) && empty($data['email_err'] 
            && empty($data['password_err']) && empty($data['confirm_password_err']))){

                // hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // register admin user
                if (AdminUserModel::register($data)){
                    flash('register_success', 'You are registered. Now you can log in', "alert alert-success");
                    header('location: '.URLROOT.'/admin/user/login'); 
                }
                else{
                    die('couldn\'t write to database');
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

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'email' => htmlspecialchars(trim($_POST['email'])),
                'password' => htmlspecialchars($_POST['password']),
            ];

            $admin = AdminUserModel::login($data['email'], $data['password']);

            if ($admin){
                // login success
                $this->createSession($admin);
                header('location: '.URLROOT.'/admin/user');
            }
            else{
                flash('login_fail', 'Please enter a valid email and password', "alert alert-danger");
                header('location: '.URLROOT.'/admin/user/login');
            }
        }
        else{
            View::render('Admins/login.php');
        }
    }

    public function logoutAction(){
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['admin_name']);
        session_destroy();
        header('location: '.URLROOT.'/admin/user/login');
    }

    public function createSession($admin){
        $_SESSION['admin_id'] = $admin->id;
        $_SESSION['admin_email'] = $admin->email;
        $_SESSION['admin_name'] = $admin->name;
    }
}