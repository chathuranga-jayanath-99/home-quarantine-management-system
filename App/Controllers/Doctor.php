<?php

namespace App\Controllers;

use \Core\View;
use App\Models\DoctorModel;

class Doctor extends \Core\Controller{

    public function registerAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'moh_area' => trim($_POST['confirm_password']),
                'contact_no' => trim($_POST['confirm_password']),
                'NIC' => trim($_POST['confirm_password']),
                'slmc_reg_no' => trim($_POST['confirm_password']),
                'assigned_patients' => 0,
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'moh_area_err' => '',
                'contact_no_err' => '',
                'NIC_err' => '',
                'slmc_reg_no_err' => ''
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
                if (DoctorModel::register($data)){
                    
                    header('location: '.URLROOT.'/doctor/login');
                }
                else {
                    die('something went wrong');
                }

                die('SUCCESS');
                
                
            }
            else {
                // load view with errors
                View::render('Doctors/register.php', ['data'=> $data]);
            }
        }
        else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'moh_area' => '',
                'mobile' => '',
                'NIC' => '',
                'slmc_reg_no' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'moh_area_err' => '',
                'mobile_err' => '',
                'NIC_err' => '',
                'slmc_reg_no_err' => ''
                 
            ];

            // load view
            View::render('Doctors/register.php', ['data'=> $data]);
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
                $doctor = DoctorModel::login($data['email'], $data['password']);
                
                if($doctor){
                    // log in success
                    $this->createSession($doctor);
                    header('location: '.URLROOT.'/doctor');
                
                }
                else{
                    // username or email is wrong
                    $data['email_err'] = 'User not found';

                    
                }
                
            }
            View::render('Doctors/login.php', ['data' => $data]);
        }
        else {
        
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
                
            ];
            // load view
            View::render('Doctors/login.php', ['data' => $data]);
        }
    }

    public function logoutAction()
    {  
        unset($_SESSION['doctor_id']);
        unset($_SESSION['doctor_email']);
        unset($_SESSION['doctor_name']);
        session_destroy();
        header('location: '.URLROOT.'/doctor/login');
    }

    public function indexAction(){
        
        if ($this->isLoggedIn()){
            // echo $_SESSION['doctor_id'];
            $patients = DoctorModel::getAssingedPatients($_SESSION['doctor_id']);
            View::render('Doctors/index.php', ['count' => sizeof($patients)]);
        }
        else {
            $this->loginAction();
        }
                
    }

    public function checkPatientsAction(){
        if ($this->isLoggedIn()){
            $typed_patients = DoctorModel::getAssingedPatients($_SESSION['doctor_id']);
            View::render('Doctors/check-patients.php', ['typed_patients' => $typed_patients]);
        }
        else {
            $this->loginAction();
        }
    }

    public function checkPatientAction(){
        if ($this->isLoggedIn()){
            
            if ($_GET['id'] && $_GET['type']){
                $patinetId = $_GET['id'];
                $patientType = $_GET['type'];
                $patient = DoctorModel::getAssingedPatient($patinetId, $patientType);
                View::render('Doctors/check-patient.php', ['patient' => $patient]);
            }
            else{
                $this->loginAction();
            }

        }
        else {
            $this->loginAction();
        }
    }

    private function createSession($doctor){
        $_SESSION['doctor_id'] = $doctor->id;
        $_SESSION['doctor_email'] = $doctor->email;
        $_SESSION['doctor_name'] = $doctor->name;
    }

    public function isLoggedIn(){
        if(isset($_SESSION['doctor_id'])){
            return true;
        }
        else {
            return false;
        }
    }

    private function validate($data){
        // check empty
        foreach ($data as $key => $value){
            if (empty($value)){
                
            }
        }
    }
}