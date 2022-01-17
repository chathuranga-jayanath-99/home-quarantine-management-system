<?php
namespace App\Controllers;

use \Core\View ;
use App\Models\PHIModel;
use App\Models\ChatMediatorImpl;
use App\Models\ChildPatientModel;
use App\Models\AdultPatientModel;
use App\RecordStatePattern\Record;

class PHI extends \Core\Controller{

    public function registerAction(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){      //POST method used to access the page
            $data = [
                'name'  => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'moh_area' => trim($_POST['moh_area']),
                'PHI_station' => trim($_POST['PHI_station']),
                'PHI_id' => trim($_POST['PHI_id']),
                'NIC' => trim($_POST['NIC']),
                'contact_number' => trim($_POST['contact_number']) ,
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'nic_err' => '',
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
                    
                    header('location: '.URLROOT.'/PHI/login'); 
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
                'PHI_id' => '',
                'NIC' => '',
                'contact_number' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'nic_err' => '',
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
        unset($_SESSION['phi_id']);
        unset($_SESSION['phi_email']);
        unset($_SESSION['phi_name']);
        unset($_SESSION['phi_area']);
        session_destroy();
        header('location: '.URLROOT.'/PHI/login');
    }

    public function indexAction(){
        
        if ($this->isLoggedIn()){
            // echo $_SESSION['doctor_id'];
            // $patients = DoctorModel::getAssingedPatients($_SESSION['doctor_id']);
            //echo ($_SESSION['phi_name']);
            $data = [
                'name' =>  $_SESSION['phi_name']
                
            ];
            View::render('PHI/index.php',['data' => $data]);  /// changed
        }
        else {
            echo 'not logged in';
        }
                
    }


    private function createSession($curr_phi){
        $_SESSION['phi_id'] =   $curr_phi->id;
        $_SESSION['phi_email'] = $curr_phi->email;
        $_SESSION['phi_name'] = $curr_phi->name;
        $_SESSION['phi_area'] = $curr_phi->PHI_station;
    }

    public function isLoggedIn(){
        if(isset($_SESSION['phi_id'])){
            return true;
        }
        else {
            return false;
        }
    }

    public function addpatientAction(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $type = $_POST['Patient_type'];
            
            if($type == 'child'){
                header('location: '.URLROOT.'/PHI/child-patient/register');
            
            }
            else {
                header('location: '.URLROOT.'/PHI/adult-patient/register');
            }
        }

        else{

            View::render('PHI/add_account.php');

        }
    }

    public function markpositive(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $type = $_POST['Patient_type'];
            
            if($type == 'child'){
                header('location: '.URLROOT.'/PHI/child-patient/markpositive');
            
            }
            else {
                header('location: '.URLROOT.'/PHI/adult-patient/markpositive');
            }
        }

        else{

            View::render('PHI/mark_positive_view.php');

        }
    }

    public function markdead(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $type = $_POST['Patient_type'];
            
            if($type == 'child'){
                header('location: '.URLROOT.'/PHI/child-patient/markdead');
            
            }
            else {
                header('location: '.URLROOT.'/PHI/adult-patient/markdead');
            }
        }

        else{

            View::render('PHI/mark_dead_view.php');

        }

    }

    public function searchPatientAction(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $type = $_POST['Patient_type'];
            
            if($type == 'child'){
                header('location: '.URLROOT.'/PHI/child-patient/search');
            
            }
            else {
                header('location: '.URLROOT.'/PHI/adult-patient/search');
            }
        }

        else{

            View::render('PHI/search_view.php');

        }
    }


    public function checkRecordsAction(){

        if ($this->isLoggedIn()){
            $records = PHIModel::getRecords($_SESSION['phi_id']);
            View::render('PHI/check-records.php', ['records' => $records]);
        }
    }

    public function checkRecordAction(){
        if ($this->isLoggedIn()){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // $feedback = $_POST['feedback'];
                // $recordId = $_POST['id'];
                
                // $res = PHIModel::giveFeedback($recordId, $feedback);
                // if ($res){
                //     flash('check_success', 'You mark a record.', "alert alert-success");
                //     header('location: '.URLROOT.'/doctor/check-records');
                // }
                // else{
                //     flash('check_fail', 'Failed to mark record.', "alert alert-danger");
                //     header('location: '.URLROOT.'/doctor/check-records');
                // }
            }
            else{
                if ($_GET['id']){
                    $recordId = $_GET['id'];
    
                    $record = PHIModel::getRecord($recordId);
                    
                    if ($record){
                        $medicalId = PHIModel::getMedicalHistoryId($record['patient_id'], $record['type']);
                        View::render('PHI/check-record.php', ['record' => $record, 'medical_history_id' => $medicalId]);
                    }
                    else{
                        echo "Record is empty.";
                    }
                }
            }
            
        }
    }

    public function activeExistingAccAction(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $type = $_POST['Patient_type'];
            
            if($type == 'child'){
                header('location: '.URLROOT.'/PHI/child-patient/activate-existing-acc');
            
            }
            else {
                header('location: '.URLROOT.'/PHI/adult-patient/activate-existing-acc');
            }
        }

        else{

            View::render('PHI/active_existing_acc_view.php');

        }
        
    }
    public function sendMsgToMyPatientsAction(){
        // send-msg-to-my-patients
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $msg = $_POST['msg'];

        $myPatients = PHIModel::getPatientsOfPHI($_SESSION['phi_id']);

        $mediator = new ChatMediatorImpl;
        
        $phi = new PHIModel($mediator, $_SESSION['phi_name']);

        foreach ($myPatients['adult'] as $adultPatient){
            $patient = new AdultPatientModel($adultPatient->id, $mediator, $adultPatient->name);

            $mediator->addUser($patient);
        }

        foreach ($myPatients['child'] as $childPatient){
            $patient = new ChildPatientModel($childPatient->id, $mediator, $childPatient->name);

            $mediator->addUser($patient);
        }

        $mediator->sendMessage($msg, $phi);
        $data['success'] = 'Message sent successfully' ;
        View::render('PHI/send-msg-view.php',['data'=>$data]);

    }

    else {
        $data = ['success' => ''] ;
        View::render('PHI/send-msg-view.php',['data'=>$data]);
    }
}

    public function formNotFilledAction(){

        $yesterday =  date('Y-m-d',strtotime("-1 days")) ;
        $records = PHIModel::getFormNotfilledPatients($yesterday , $_SESSION['phi_id'] ) ;
        View::render('PHI/form-not-filled.php', ['records' => $records]);
        

    }

    public function approveUpdateAction(){

    }

    public function getUpdatesAction(){
        if ($this->isLoggedIn()){
            $updates = PHIModel::getUpdates($_SESSION['phi_id'] ) ;
            View::render('PHI/get-updates.php', ['updates' => $updates]);
        }
    }

    public function getUpdateAction(){
        if ($_GET['id']){
            $updateId = $_GET['id'];
            $type = $_GET['type'];
            $changes = PHIModel::getUpdate($updateId,$type) ;
            //print_r($changes ) ;
            View::render('PHI/get-update.php', ['changes' => $changes]);
            
        
        }

    }
}