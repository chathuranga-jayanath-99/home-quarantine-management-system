<?php

namespace App\Controllers;

use \Core\View;
use App\Models\AdultPatientModel;

class Adultpatient extends Patient{

    public function registerAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(trim($_POST['id_checked']) === 'yes'){
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'mobile' => trim($_POST['mobile']),
                    'NIC' => strtoupper(trim($_POST['NIC'])),
                    'birthday'=> trim($_POST['birthday']),
                    //'gender' => trim($_POST['gender']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'mobile_err' => '',
                    'NIC_err' => '',
                    'birthday_err'=>'',
                    'id_checked'=> 'yes'
                ];
                
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter name';
                }
    
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }
                else {
                    if (AdultPatientModel::findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }
                
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }
                else if(strlen($data['password']) < 1){
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
    
                if (empty($data['name_err']) && empty($data['email_err']) &&
                empty($data['password_err']) && empty($data['confirm_password_err'])){
                    // validated
    
                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                    // Register User
                    $id = AdultPatientModel::register($data);
                    if ($id){
                        header('location: '.URLROOT.'/adult-patient/login');
                    }
                    else {
                        die('something went wrong');
                    }
    
                    die('SUCCESS');

                }
                else {
                    // load view with errors
                    View::render('AdultPatients/register.php', ['data'=> $data]);
                }
                    
                    
            }else{
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'mobile' => '',
                    'NIC' => strtoupper(trim($_POST['NIC'])),
                    'birthday'=>'',
                    //'gender' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'mobile_err' => '',
                    'NIC_err' => '',
                    'birthday_err'=>'',
                    'id_checked'=>'no'
                ];

                if(empty($data['NIC'])){
                    $data['NIC_err'] = 'Please enter NIC';
                    //View::render('AdultPatients/nic_register.php', ['data'=> $data]);
                }else{
                    // if (parent::isValidNIC($data['NIC'])) {
                    //     $childrenData = ChildPatientModel::searchByGuardianID($data['NIC']);
                    //     View::render('ChildPatients/register.php', ['childrenData' => $childrenData, 'nic' => $data['NIC']]);
                    // } else {
                    //     $data['nic_err'] = 'Invalid NIC';
                    //     View::render('ChildPatients/pre_registration.php', ['data'=> $data]);
                    // }
                    $adultData = AdultPatientModel::searchByNIC($data['NIC']);
                    if($adultData){
                        View::render('AdultPatients/pre_register.php', ['adultData' => $adultData]);
                    }else{
                        View::render('AdultPatients/register.php', ['data'=> $data]);
                    }
                }
            }
                
        }
        else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'mobile' => '',
                'NIC' => '',
                'birthday'=>'',
                //'gender' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'mobile_err' => '',
                'NIC_err' => '',
                'birthday_err'=>'',
                'id_checked'=>'no'
                 
            ];

            // load view
            View::render('AdultPatients/nic_register.php', ['data'=> $data]);
        }
    }
    public function loginAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }

            if (empty($data['email_err']) && empty($data['password_err'])){
                
                // check user exists
                $adult = AdultPatientModel::login($data['email'], $data['password']);
                
                if($adult){
                    // log in success
                    $this->createSession($adult);
                    header('location: '.URLROOT.'/adult-patient');
                
                }
                else{
                    // username or email is wrong
                    $data['email_err'] = 'User not found';

                    
                }
                
            }
            View::render('AdultPatients/login.php', ['data' => $data]);
        }else {
        
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
                
            ];
            // load view
            View::render('AdultPatients/login.php', ['data' => $data]);
        }
    }

    public function logoutAction()
    {  
        unset($_SESSION['adult_id']);
        unset($_SESSION['adult_email']);
        unset($_SESSION['adult_name']);
        session_destroy();
        header('location: '.URLROOT.'/adult-patient/login');
    }

    public function indexAction(){
        
        if ($this->isLoggedIn()){
            // echo $_SESSION['doctor_id'];
            // $patientName = AdultPatientModel::getPatientName($_SESSION['adult_id']);
            // View::render('AdultPatinets/index.php', ['name' => $patientName]);
            $adultData = AdultPatientModel::getPatientName($_SESSION['adult_id']);
            View::render('AdultPatients/index.php', ['adultData' => $adultData]);
        }
        else {
            echo 'not logged in';
        }
                
    }

    private function createSession($adult){
        $_SESSION['adult_id'] = $adult->id;
        $_SESSION['adult_email'] = $adult->email;
        $_SESSION['adult_name'] = $adult->name;
    }

    public function isLoggedIn(){
        if(isset($_SESSION['adult_id'])){
            return true;
        }
        else {
            return false;
        }
    }
    
    protected function activeHelper($nic, $email) {
        
    }
}