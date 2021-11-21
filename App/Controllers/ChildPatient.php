<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ChildPatientModel;

class ChildPatient extends \Core\Controller{

    public function registerAction() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(trim($_POST['id_checked']) === 'yes') {
                if ($_POST['new'] === 'no') {
                    $data = [
                        'name'                  => trim($_POST['name']),
                        'email'                 => trim($_POST['email']),
                        'password'              => trim($_POST['password']),
                        'confirm_password'      => trim($_POST['confirm_password']),
                        'mobile'                => '',
                        'NIC'                   => trim($_POST['NIC']),
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
                        'NIC'                   => trim($_POST['NIC']),
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
                    'NIC'                   => trim($_POST['NIC']),
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
                    if ($this->isValidNIC($data['NIC'])) {
                        $childrenData = ChildPatientModel::searchByGuardianID($data['NIC']);
                        View::render('ChildPatients/register.php', ['childrenData' => $childrenData, 'nic' => $data['NIC']]);
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
    }

    public function loginAction() {
        
    }

    public function logoutAction()
    {  
        
    }

    public function indexAction() {    

    }

    private function createSession($childPatient){
        
    }

    public function isLoggedIn(){
        
    }

    public function isValidNIC($data) {
        return true;
    }
}