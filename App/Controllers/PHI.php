<?php
namespace App\Controllers;

use \Core\View ;
use App\Models\PHIModel;

class PHI extends \Core\Controller{

    public function registerAction(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name'  => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'moh_area' => trim($_POST['moh_area']),
                'PHI_station' => trim($_POST['PHI_station']),
                'NIC' => trim($_POST['NIC']),
                'contact_number' => trim($_POST['contact_number']) ,
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
            else {
                if (PHIModel::findUserByEmail($data['email'])){
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
                if (PHIModel::register($data)){
                    
                    header('location: '.URLROOT.'/PHI/login'); // check
                }
                else {
                    die('something went wrong');
                }

                die('SUCCESS');
                
                
            }
            else {
                // load view with errors
                View::render('PHI/register.php', ['data'=> $data]);
            }

        }

        else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'moh_area' => '',
                'PHI_station' => '',
                'NIC' => '',
                'contact_number' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
                 
            ];

            // load view
            View::render('PHI/register.php', ['data'=> $data]);


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
                $curr_phi = PHIModel::login($data['email'], $data['password']);
                
                if($curr_phi){
                    // log in success
                    $this->createSession($curr_phi);
                    header('location: '.URLROOT.'/PHI');
                
                }
                else{
                    // username or email is wrong
                    $data['email_err'] = 'User not found';

                    
                }
                
            }
            View::render('PHI/login.php', ['data' => $data]);
        }else {
        
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
                
            ];
            // load view
            View::render('PHI/login.php', ['data' => $data]);
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
            echo 'not logged in';
        }
                
    }

    public function checkPatientsAction(){
        if ($this->isLoggedIn()){
            $patients = DoctorModel::getAssingedPatients($_SESSION['doctor_id']);
            View::render('Doctors/check-patients.php', ['patients' => $patients]);
        }
        else {
            echo 'not logged in';
        }
    }

    private function createSession($curr_phi){
        $_SESSION['phi_id'] = $curr_phi->id;
        $_SESSION['phi_email'] = $curr_phi->email;
        $_SESSION['phi_name'] = $curr_phi->name;
    }

    public function isLoggedIn(){
        if(isset($_SESSION['doctor_id'])){
            return true;
        }
        else {
            return false;
        }
    }




    
}