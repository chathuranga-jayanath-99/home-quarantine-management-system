<?php

namespace App\Controllers\Admin;

use App\Models\AdminUserModel;
use App\Models\DoctorModel;
use App\Models\PHIModel;
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
            $reset_admin_id = htmlspecialchars($_POST['reset_admin_id']);

            $data = [
                'current_password' => htmlspecialchars($_POST['current_password']),
                'new_password' => htmlspecialchars($_POST['new_password']),
                'confirm_password' => htmlspecialchars($_POST['confirm_password']),
                'password_err' => '',
            ];

            if ((strlen($data['new_password']) < 4) || (strlen($data['confirm_password']) < 4)){
                $data['password_err'] = 'Password must be at least 4 characters';
            }
            else{
                if (strcmp($data['new_password'], $data['confirm_password']) != 0) {
                    $data['password_err'] = 'Passwords do not match';
                }
            }
            if (empty($data['password_err'])){
                $data['current_password'] = $data['current_password'];
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                $data['confirm_password'] = $data['new_password'];
                
                $res = AdminUserModel::resetPassword($reset_admin_id, $data);

                if ($res){
                    flash('reset_password', 'Password reset successful.', 'alert alert-success');
                    header('location: '.URLROOT.'/admin/user/manage-admin');
                }
                else{
                    flash('reset_password', 'Password reset failed.', 'alert alert-danger');
                    header('location: '.URLROOT.'/admin/user/manage-admin');
                }
            }
            else{
                View::render('Admins/reset-password.php', ['data' => $data]);
            }
        }
        else{

            $data = [
                'current_password' => '',
                'new_password' => '',
                'confirm_password' => '',
                'password_err' => '',
            ];
            View::render('Admins/reset-password.php', ['data' => $data]);
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
            else {
                // load view with errors
                View::render('Admins/register.php', ['data'=> $data]);
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

    public function registerDoctorAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name' => htmlspecialchars(trim($_POST['name'])),
                'email' => htmlspecialchars(trim($_POST['email'])),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'moh_area' => htmlspecialchars(trim($_POST['moh_area'])),
                'contact_no' => htmlspecialchars(trim($_POST['contact_no'])),
                'NIC' => htmlspecialchars(trim($_POST['NIC'])),
                'slmc_reg_no' => htmlspecialchars(trim($_POST['slmc_reg_no'])),
                'gender' => htmlspecialchars(trim($_POST['gender'])),
                'birthday' => htmlspecialchars(trim($_POST['birthday'])),
                // 'assigned_patients' => 0,
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'moh_area_err' => '',
                'contact_no_err' => '',
                'NIC_err' => '',
                'slmc_reg_no_err' => '',
                'gender_err' => '',
                'birthday_err' => '',
            ];
            
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }
            else {
                if (DoctorModel::findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }
            
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }
            else if(strlen($data['password']) < 4){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            }
            else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            if(empty($data['gender'])){
                $data['gender_err'] = 'Please select a gender';
            }

            if(empty($data['birthday'])){
                $data['birthday_err'] = 'Please enter a birthday';
            }

            if (empty($data['name_err']) && empty($data['email_err']) &&
            empty($data['password_err']) && empty($data['confirm_password_err'] &&
            empty($data['gender_err']) && empty($data['birthday_err']))){
                // validated
                
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if (DoctorModel::register($data)){
                    flash('register_doctor', 'Registration of doctor successful', "alert alert-success");
                    header('location: '.URLROOT.'/admin/user/manage-doctor');
                }
                else {
                    flash('register_doctor', 'Doctor registration failed', "alert alert-danger");
                    header('location: '.URLROOT.'/admin/user/manage-doctor');
                }
                
            }
            else {
                // load view with errors
                View::render('Admins/register-doctor.php', ['data'=> $data]);
            }
        }
        else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'moh_area' => '',
                'contact_no' => '',
                'NIC' => '',
                'slmc_reg_no' => '',
                'gender' => '',
                'birthday' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'moh_area_err' => '',
                'contact_no_err' => '',
                'NIC_err' => '',
                'slmc_reg_no_err' => '',
                'gender_err' => '',
                'birthday_err' => '',
            ];

            // load view
            View::render('Admins/register-doctor.php', ['data'=> $data]);
        }
    }

    public function registerPHIAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){      //POST method used to access the page
            $data = [
                'name'                 => trim($_POST['name']),
                'email'                => trim($_POST['email']),
                'password'             => trim($_POST['password']),
                'confirm_password'     => trim($_POST['confirm_password']),
                'moh_area'             => trim($_POST['moh_area']),
                'PHI_station'          => trim($_POST['PHI_station']),
                'PHI_id'               => trim($_POST['PHI_id']),
                'NIC'                  => trim($_POST['NIC']),
                'contact_number'       => trim($_POST['contact_number']) ,
                'name_err'             => '',
                'email_err'            => '',
                'password_err'         => '',
                'nic_err'              => '',
                'confirm_password_err' => ''
            ];

            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }
            else {
                if (PHIModel::findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }
            
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }
            else if(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            if(!$this->isValidNIC($data['NIC'])){
                $data['nic_err'] = 'Invalid NIC' ;
            }

            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            }
            else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            if (empty($data['name_err']) && empty($data['email_err']) &&
            empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['nic_err'])){
                // validated
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // Register User
                if (PHIModel::register($data)){
                    flash('register_PHI', 'Registration of PHI successful', "alert alert-success");
                    header('location: '.URLROOT.'/admin/user/manage-PHI');
                }
                else {
                    flash('register_PHI', 'PHI registration failed', "alert alert-danger");
                    header('location: '.URLROOT.'/admin/user/manage-PHI');
                }
            }
            else {
                // load view with errors
                View::render('Admins/register-phi.php', ['data'=> $data]);
            }

        }

        else {
            $data = [
                'name'                 => '',
                'email'                => '',
                'password'             => '',
                'confirm_password'     => '',
                'moh_area'             => '',
                'PHI_station'          => '',
                'PHI_id'               => '',
                'NIC'                  => '',
                'contact_number'       => '',
                'name_err'             => '',
                'email_err'            => '',
                'password_err'         => '',
                'nic_err'              => '',
                'confirm_password_err' => ''
            ];

            // load view
            View::render('Admins/register-phi.php', ['data'=> $data]);
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

    public function viewDoctorAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $doctorID = $_POST['doctor_id'];
            $doctor = AdminUserModel::getDoctor($doctorID);
            if ($doctorID) {
                View::render('Admins/viewDoctor.php', ['doctor' => $doctor]);
            } else {
                echo 'Not Found';
                die();
            }
        } else {
            header('location: '.URLROOT.'/admin/user/manage-doctor');
            die();
        }
    }

    public function viewPHIAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phiID = $_POST['phi_id'];
            $phi = AdminUserModel::getPHI($phiID);
            if ($phiID) {
                View::render('Admins/viewPhi.php', ['phi' => $phi]);
            } else {
                echo 'Not Found';
                die();
            }
        } else {
            header('location: '.URLROOT.'/admin/user/manage-phi');
            die();
        }
    }

    public function viewAdminAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $adminID = $_POST['admin_id'];
            $admin = AdminUserModel::getAdmin($adminID);
            if ($adminID) {
                View::render('Admins/viewAdmin.php', ['admin' => $admin]);
            } else {
                echo 'Not Found';
                die();
            }
        } else {
            header('location: '.URLROOT.'/admin/user/manage-admin');
            die();
        }
    }

}
