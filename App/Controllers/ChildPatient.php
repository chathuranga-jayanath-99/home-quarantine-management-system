<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ChildPatientModel;

class ChildPatient extends Patient {

    public function registerAction() {
        //$PHI = new PHI([]);
        //if(isset($_SESSION['phi_id'])) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                if(trim($_POST['id_checked']) === 'yes') {
                    if ($_POST['new'] === 'no') {
                        $data = [
                            'name'                  => trim($_POST['name']),
                            'email'                 => trim($_POST['email']),
                            'password'              => trim($_POST['password']),
                            'confirm_password'      => trim($_POST['confirm_password']),
                            'mobile'                => '',
                            'NIC'                   => strtoupper(trim($_POST['NIC'])),
                            'name_err'              => '',
                            'email_err'             => '',
                            'password_err'          => '',
                            'confirm_password_err'  => '',
                            'id_checked'            => 'yes',
                            'nic_err'               => '',
                        ];

                        if(empty($data['name'])){
                            $data['name_err'] = 'Please enter name';
                        }

                        if(empty($data['email'])){
                            $data['email_err'] = 'Please enter email';
                        }
                        else {
                            if (ChildPatientModel::findUserByEmail($data['email'])){
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
                            if (ChildPatientModel::register($data)){
                                header('location: '.URLROOT.'/child-patient/login');
                            }
                            else {
                                die('something went wrong');
                            }
                            die('SUCCESS');
                        }
                        else {
                            // load view with errors
                            View::render('ChildPatient/post_registration.php', ['data'=> $data]);
                        }
                    } else {
                        $data = [
                            'name'                  => '',
                            'email'                 => '',
                            'password'              => '',
                            'confirm_password'      => '',
                            'mobile'                => '',
                            'NIC'                   => strtoupper(trim($_POST['NIC'])),
                            'name_err'              => '',
                            'email_err'             => '',
                            'password_err'          => '',
                            'confirm_password_err'  => '',
                            'id_checked'            => 'yes',
                            'nic_err'               => ''
                        ];
            
                        // load view
                        View::render('ChildPatients/post_registration.php', ['data'=> $data]);
                    }
                } else {
                    $data = [
                        'name'                  => '',
                        'email'                 => '',
                        'password'              => '',
                        'confirm_password'      => '',
                        'mobile'                => '',
                        'NIC'                   => strtoupper(trim($_POST['NIC'])),
                        'name_err'              => '',
                        'email_err'             => '',
                        'password_err'          => '',
                        'confirm_password_err'  => '',
                        'id_checked'            => 'no',
                        'nic_err'               => ''
                    ];
                    if (empty($data['NIC'])) {
                        $data['id_err'] = 'Please enter guardian NIC';
                    } else {
                        if (parent::isValidNIC($data['NIC'])) {
                            $childrenData = ChildPatientModel::searchByGuardianID($data['NIC']);
                            View::render('ChildPatients/register.php', ['childrenData' => $childrenData, 'nic' => $data['NIC']]);
                        } else {
                            $data['nic_err'] = 'Invalid NIC';
                            View::render('ChildPatients/pre_registration.php', ['data'=> $data]);
                        }
                    }
                }
            }
            else {
                $data = [
                    'name'                  => '',
                    'email'                 => '',
                    'password'              => '',
                    'confirm_password'      => '',
                    'mobile'                => '',
                    'NIC'                   => '',
                    'name_err'              => '',
                    'email_err'             => '',
                    'password_err'          => '',
                    'confirm_password_err'  => '',
                    'id_checked'            => 'no',
                    'nic_err'               => ''
                ];

                // load view
                View::render('ChildPatients/pre_registration.php', ['data'=> $data]);
            }
        /*} else if (isset($_SESSION['child_id'])) {
            header('location: '.URLROOT.'/child-patient');
            die();
        } else if (isset($_SESSION['doctor_id'])) {
            header('location: '.URLROOT.'/doctor');
            die();
        } else if (isset($_SESSION['adPatient_id'])) {
            header('location: '.URLROOT.'/adult-patient');
            die();
        } else {
            header('location: '.URLROOT);
            die();
        }*/
    }

    public function loginAction() {
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
                $childPatient = ChildPatientModel::login($data['email'], $data['password']);
                
                if($childPatient){
                    // log in success
                    $this->createSession($childPatient);
                    header('location: '.URLROOT.'/child-patient');
                
                }
                else{
                    // username or email is wrong
                    $data['email_err'] = 'User not found';
                }
                
            }
            View::render('ChildPatients/login.php', ['data' => $data]);
        }else {
        
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
                
            ];
            // load view
            View::render('ChildPatients/login.php', ['data' => $data]);
        }
    }

    public function logoutAction()
    {  
        unset($_SESSION['child_id']);
        unset($_SESSION['guardian_nic']);
        unset($_SESSION['child_email']);
        unset($_SESSION['child_name']);
        session_destroy();
        header('location: '.URLROOT.'/child-patient/login');
    }

    public function indexAction() {    
        if ($this->isLoggedIn()){
            View::render('ChildPatients/index.php', []);
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    private function createSession($childPatient){
        $_SESSION['child_id'] = $childPatient->id;
        $_SESSION['guardian_nic'] = $childPatient->guardian_id;
        $_SESSION['child_email'] = $childPatient->email;
        $_SESSION['child_name'] = $childPatient->name;
    }

    public function isLoggedIn(){
        if(isset($_SESSION['child_id'])){
            return true;
        }
        else {
            return false;
        }
    }
}