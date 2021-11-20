<?php
namespace App\Controllers;

use \Core\View ;

class PHI extends \Core\Controller{

    public function registerAction(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name'  => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'moh_area' => '',
                'mobile' => '',
                'NIC' => '',
                'slmc_reg_no' => '',
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

            


        }
    }
    
}