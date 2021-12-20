<?php

namespace App\Controllers;

use \Core\View;
use App\Models\DoctorModel;

class Doctor extends \Core\Controller{

    public function registerAction()
    {
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
                // 'assigned_patients' => 0,
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

            if (empty($data['name_err']) && empty($data['email_err']) &&
            empty($data['password_err']) && empty($data['confirm_password_err'])){
                // validated
                
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if (DoctorModel::register($data)){
                    flash('register_success', 'You are registered. Now you can Log in', "alert alert-success");
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
                'contact_no' => '',
                'NIC' => '',
                'slmc_reg_no' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'moh_area_err' => '',
                'contact_no_err' => '',
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
                'email' => htmlspecialchars(trim($_POST['email'])),
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
            $patients = DoctorModel::getAssingedPatients($_SESSION['doctor_id']);
            $count = sizeof($patients['adult']) + sizeof($patients['child']);
            View::render('Doctors/index.php', ['count' => $count]);
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
                header('location:'.URLROOT.'/doctor/login');
            }

        }
        else {
            header('location:'.URLROOT.'/doctor/login');
        }
    }

    public function checkRecordsAction(){
        if ($this->isLoggedIn()){
            $records = DoctorModel::getRecords($_SESSION['doctor_id']);
            View::render('Doctors/check-records.php', ['records' => $records]);
        }
    }

    public function checkRecordAction(){
        if ($this->isLoggedIn()){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $feedback = $_POST['feedback'];
                $recordId = $_POST['id'];
                
                $res = DoctorModel::giveFeedback($recordId, $feedback);
                if ($res){
                    flash('check_success', 'You mark a record.', "alert alert-success");
                    header('location: '.URLROOT.'/doctor/check-records');
                }
                else{
                    flash('check_fail', 'Failed to mark record.', "alert alert-danger");
                    header('location: '.URLROOT.'/doctor/check-records');
                }
            }
            else{
                if ($_GET['id']){
                    $recordId = $_GET['id'];
    
                    $record = DoctorModel::getRecord($recordId);
                    
                    if ($record){
                        $medicalId = DoctorModel::getMedicalHistoryId($record['patient_id'], $record['type']);
                        View::render('Doctors/check-record.php', ['record' => $record, 'medical_history_id' => $medicalId]);
                    }
                    else{
                        echo "Record is empty.";
                    }
                }
            }
            
        }
    }

    public function updateAction(){
        if ($this->isLoggedIn()){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
                $data = [
                    'doctor_id' => $_SESSION['doctor_id'],
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'moh_area' => trim($_POST['moh_area']),
                    'contact_no' => trim($_POST['contact_no']),
                    'NIC'=> trim($_POST['NIC']),
                    'slmc_reg_no' => trim($_POST['slmc_reg_no']),
                    // 'password' => trim($_POST['password']),
                    'name_err' => '',
                    'email_err' => '',
                    'moh_area_err' => '',
                    'contact_no_err' => '',
                    'NIC_err' => '',
                    'slmc_reg_no_err' => ''
                ];

                if($data['email'] != $_SESSION['doctor_email']){
                    if(DoctorModel::findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already in use';
                    }
                     
                }

                if (empty($data['email_err'])){
                    DoctorModel::updateAccount($data);
                    flash('update_result', 'Account succesfully updated.', "alert alert-success");
    
                }else {
                    flash('update_result', 'Failed to update', "alert alert-success");
                }
                header('location: '.URLROOT.'/doctor');
            }
            else {
                $doctor = DoctorModel::getDetails();

                $data = [
                    'name' => $doctor['name'],
                    'email' => $doctor['email'],
                    'moh_area' => $doctor['moh_area'],
                    'contact_no' => $doctor['contact_no'],
                    'NIC'=> $doctor['NIC'],
                    'slmc_reg_no' => $doctor['slmc_reg_no'],
                    // 'password' => $doctor['password'],
                    'name_err' => '',
                    'email_err' => '',
                    'moh_area_err' => '',
                    'contact_no_err' => '',
                    'NIC_err' => '',
                    'slmc_reg_no_err' => ''

                    
                ];
                View::render('Doctors/update-account.php', ['data'=> $data]);
            }
                
            

        }
        else {
            header('location:'.URLROOT.'/doctor/login');
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


}