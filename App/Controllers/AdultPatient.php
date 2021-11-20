<?php

namespace App\Controllers;

use \Core\View;
use App\Models\AdultPatientModel;

class Adultpatient extends \Core\Controller{

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
                $adPatient = AdultPatientModel::login($data['email'], $data['password']);
                
                if($adPatient){
                    // log in success
                    $this->createSession($adPatient);
                    header('location: '.URLROOT.'/adPatient');
                
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
        unset($_SESSION['adPatient_id']);
        unset($_SESSION['adPatient_email']);
        unset($_SESSION['adPatient_name']);
        session_destroy();
        header('location: '.URLROOT.'/doctor/login');
    }
}