<?php
namespace App\Controllers;

use \Core\View ;
use App\Models\PHIModel;
use App\Models\ChatMediatorImpl;
use App\Models\ChildPatientModel;
use App\Models\AdultPatientModel;
use App\RecordStatePattern\Record;

class PHI extends MedicalOfficer{

    private $phi_id ;
    private $name;
    private $email ;
    private $contact_no ;
    private $moh_area;
    private $PHI_station;
    private $NIC;

    // public function registerAction(){

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST'){      //POST method used to access the page
    //         $data = [
    //             'name'  => trim($_POST['name']),
    //             'email' => trim($_POST['email']),
    //             'password' => trim($_POST['password']),
    //             'confirm_password' => trim($_POST['confirm_password']),
    //             'moh_area' => trim($_POST['moh_area']),
    //             'PHI_station' => trim($_POST['PHI_station']),
    //             'PHI_id' => trim($_POST['PHI_id']),
    //             'NIC' => trim($_POST['NIC']),
    //             'contact_number' => trim($_POST['contact_number']) ,
    //             'name_err' => '',
    //             'email_err' => '',
    //             'password_err' => '',
    //             'nic_err' => '',
    //             'confirm_password_err' => ''
    //         ];


    //         if(empty($data['name'])){
    //             $data['name_err'] = 'Please enter name';
    //         }

    //         if(empty($data['email'])){
    //             $data['email_err'] = 'Please enter email';
    //         }
    //         else {
    //             if (PHIModel::findUserByEmail($data['email'])){
    //                 $data['email_err'] = 'Email is already taken';
    //             }
    //         }
            
    //         if(empty($data['password'])){
    //             $data['password_err'] = 'Please enter password';
    //         }
    //         else if(strlen($data['password']) < 6){
    //             $data['password_err'] = 'Password must be at least 6 characters';
    //         }

    //         if(!$this->isValidNIC($data['NIC'])){
    //             $data['nic_err'] = 'Invalid NIC' ;
    //         }

    //         if(empty($data['confirm_password'])){
    //             $data['confirm_password_err'] = 'Please confirm password';
    //         }
    //         else {
    //             if($data['password'] != $data['confirm_password']){
    //                 $data['confirm_password_err'] = 'Passwords do not match';
    //             }
    //         }

    //         if (empty($data['name_err']) && empty($data['email_err']) &&
    //         empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['nic_err'])){
    //             // validated

    //             // Hash password
    //             $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    //             // Register User
    //             if (PHIModel::register($data)){
                    
    //                 header('location: '.URLROOT.'/PHI/login'); 
    //             }
    //             else {
    //                 die('something went wrong');
    //             }

    //             die('SUCCESS');
                
                
    //         }
    //         else {
    //             // load view with errors
    //             View::render('PHI/register.php', ['data'=> $data]);
    //         }

    //     }

    //     else {
    //         $data = [
    //             'name' => '',
    //             'email' => '',
    //             'password' => '',
    //             'confirm_password' => '',
    //             'moh_area' => '',
    //             'PHI_station' => '',
    //             'PHI_id' => '',
    //             'NIC' => '',
    //             'contact_number' => '',
    //             'name_err' => '',
    //             'email_err' => '',
    //             'password_err' => '',
    //             'nic_err' => '',
    //             'confirm_password_err' => ''
                 
    //         ];

    //         // load view
    //         View::render('PHI/register.php', ['data'=> $data]);


    //     }
    // }

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
            
            $updateCount = $this->getUpdatesCount();
            View::render('PHI/index.php',['count'=> $_SESSION['patient_count'], 'update_count' => $updateCount, 'form_not_filled'=> $_SESSION['form_not_filled_count'] ]); 
        }
        else {
            echo 'not logged in';
        }
                
    }

    public function getFormNotFilledCount(){

        $yesterday =  date('Y-m-d',strtotime("-1 days")) ;
        $patients = PHIModel::getPatientsOfPHI($_SESSION['phi_id']);
        $adultPatients = 0;
        $childPatients = 0;

        foreach ($patients['adult'] as $adultPatient){
            
            if(PHIModel::getFormNotfilledAdultPatients($yesterday , $adultPatient->id )) {
                    $adultPatient->type = 'adult' ;
                    $adultPatients ++ ;
                    
            }
        }

        foreach($patients['child'] as $childPatient){
            if(PHIModel::getFormNotfilledChildPatients($yesterday , $childPatient->id )){
                $childPatient->type = 'child' ;
                $childPatients ++ ;
            }
        }

        $result = ['adult'=> $adultPatients , 'child' => $childPatients] ;
        return $result ; 

    }

    public function getUpdatesCount(){

        $updates = PHIModel::getUpdates($_SESSION['phi_id'] ) ;
        $updateCount = 0 ; 
        foreach ($updates['adult'] as $adultUpdate){
            $updateCount ++ ;
        }
        foreach($updates['child'] as $childUpdate){
            $updateCount ++ ;
        }
        return $updateCount ;
    
    }

    public function getAssignedPatientCount(){
        
        $patients = PHIModel::getPatientsOfPHI($_SESSION['phi_id']);
        $positive_count = 0;
        $contact_count = 0;

        foreach ($patients['adult'] as $adultPatient){
            if($adultPatient->state == 'contact'){
                $contact_count ++ ;

            }
            elseif($adultPatient->state == 'positive'){
                $positive_count ++ ;
            }
        }
        foreach($patients['child'] as $childPatient){
            if($childPatient->state == 'contact'){
                $contact_count ++ ;

            }
            elseif($childPatient->state == 'positive'){
                $positive_count ++ ;
            }
        }

        $total_count = $positive_count + $contact_count ;
        $result = ['positive' => $positive_count , 'contact' => $contact_count, 'total'=> $total_count] ; 
        return $result ;

    }


    private function createSession($curr_phi){
         
        $_SESSION['phi_id'] =   $curr_phi->id;
        $_SESSION['phi_email'] = $curr_phi->email;
        $_SESSION['phi_name'] = $curr_phi->name;
        $_SESSION['phi_area'] = $curr_phi->PHI_station;

        $form_not_filled_count = $this->getFormNotFilledCount();
        $count = $this->getAssignedPatientCount();
        $_SESSION['patient_count'] = $count ;
        $_SESSION['form_not_filled_count'] = $form_not_filled_count ;
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
        if ($this->isLoggedIn()){
            
        }
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
        $mediator->addUser($phi);
        
        $adultPatientPrototype = new AdultPatientModel(null, null, null);
        $childPatientPrototype = new ChildPatientModel(null, null, null);

        foreach ($myPatients['adult'] as $adultPatient){
            // $patient = new AdultPatientModel($adultPatient->id, $mediator, $adultPatient->name);
            $patient = clone $adultPatientPrototype;
            $patient->setParams($adultPatient->id, $mediator, $adultPatient->name);
            $mediator->addUser($patient);
        }

        foreach ($myPatients['child'] as $childPatient){
            // $patient = new ChildPatientModel($childPatient->id, $mediator, $childPatient->name);
            $patient = clone $childPatientPrototype;
            $patient->setParams($childPatient->id, $mediator, $childPatient->name);
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
        $patients = PHIModel::getPatientsOfPHI($_SESSION['phi_id']);
        $adultPatients = array();
        $childPatients = array();

        foreach ($patients['adult'] as $adultPatient){
            
            if(PHIModel::getFormNotfilledAdultPatients($yesterday , $adultPatient->id )) {
                    $adultPatient->type = 'adult' ;
                    array_push($adultPatients,$adultPatient);
            }
        }

        foreach($patients['child'] as $childPatient){
            if(PHIModel::getFormNotfilledChildPatients($yesterday , $childPatient->id )){
                $childPatient->type = 'child' ;
                array_push($childPatients,$childPatient);
            }
        }

        $records = ['adult' => $adultPatients , 'child' => $childPatients];
        View::render('PHI/form-not-filled.php', ['records' => $records]);
    }

    public function approveUpdateAction(){
        if ($this->isLoggedIn()){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
               $update = ['update_id' => $_POST['update_id'],
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'contact_no' => $_POST['contact_no'],
                        'address' => $_POST['address'],
                        'name_change' => $_POST['name_change'],
                        'email_change' => $_POST['email_change'],
                        'contact_no_change' => $_POST['contact_no_change'],
                        'address_change' => $_POST['address_change'],
                        'type' => $_POST['type'],
                        'patient_id' => $_POST['patient_id']
                        ] ;
               
               $approve = PHIModel::approveUpdate($update) ;
               header('location: '.URLROOT.'/PHI/get-updates'); 

               
            }
        }


    }

    public function declineUpdateAction(){
        if($this->isLoggedIn()){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $update_id = $_POST['update_id'];
                $type = $_POST['type'] ;
                $patientID = $_POST['patient_id'] ;
                $decline = PHIModel::declineUpdate($update_id , $type , $patientID);
                header('location: '.URLROOT.'/PHI/get-updates'); 

            }
        }

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

            if($type == 'child'){
                $email_exist = ChildPatientModel::findUserByEmail($changes[0]['email_change']);
            }
            else{
                $email_exist = AdultPatientModel::findUserByEmail($changes[0]['email_change']);
            }
            
            View::render('PHI/get-update.php', ['changes' => $changes , 'email_exist' => $email_exist]);
            
        }

    }

    public function profileAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            View::render('PHI/profile.php', ['phiData' => $this]);
        }
        else {
           echo "Please log in first";
        }
    }

    public function editProfileAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = [
                        'name'                  => htmlspecialchars(trim($_POST['name'])),
                        'NIC'                   => $this->NIC,
                        'email'                 => htmlspecialchars(trim($_POST['email'])),
                        'contact_no'            => htmlspecialchars(trim($_POST['contact_no'])),
                        'phi_id'                => $_SESSION['phi_id'],
                        'MOH_Area'              => $this->moh_area,
                        'PHI_Range'             => $this->PHI_station,
                        'name_err'              => '',
                        'email_err'             => '',
                        
                        'contact_no_err'        => ''
                    ];

                    if(empty($data['name'])){
                        $data['name_err'] = 'Please enter name';
                    }
        
                    if(empty($data['email'])){
                        $data['email_err'] = 'Please enter email';
                    }

                    if(empty($data['contact_no'])){
                        $data['contact_no_err'] = 'Please enter contact no';
                    }

                    if(empty($data['address'])){
                        $data['address_err'] = 'Please enter address';
                    }

                    if (empty($data['name_err']) && empty($data['email_err']) &&
                      empty($data['contact_no_err'])){
                        $id = PHIModel::recordEditProfile($data);
                        View::render('PHI/editProfileSuccess.php', ['data' => $data]);

                    }
                    else{
                        
                        View::render('PHI/editProfile.php', ['data' => $data]);
                    }
                } else {
                    $data = [
                        'name'                  => $this->name,
                        'email'                 => $this->email,
                        'NIC'                   => $this->NIC,
                        'contact_no'            => $this->contact_no,
                        'MOH_Area'              => $this->moh_area,
                        'PHI_Range'             => $this->PHI_station,
                        'name_err'              => '',
                        'email_err'             => '',
                        'contact_no_err'        => ''
                    ];
                    View::render('PHI/editProfile.php', ['data' => $data]);
                }
        }
        else {
           // View::render('ChildPatients/notLoggedIn.php', []);
        }
    }


    private function initializeFromSession() {
        $this->initialize($_SESSION['phi_id']);
    }

    public function initialize($phi_id) {
        $phiObj = PHIModel::findUserByID($phi_id);
        
        if ($phiObj) {
            
            $this->phi_id                = $phiObj->phi_id;
            $this->name                  = $phiObj->name;
            $this->email                 = $phiObj->email;
            $this->contact_no            = $phiObj->contact_number;
            $this->moh_area              = $phiObj->moh_area;
            $this->PHI_station           = $phiObj->PHI_station;
            $this->NIC                   = $phiObj->NIC;
        }
    }

    public function getPhiID(){
        return $this->phi_id ;
    }
    public function getName(){
        return $this->name ;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getContactNo(){
        return $this->contact_no;
    }
    public function getMohArea(){
        return $this->moh_area;
    }

    public function getPHIStation(){
        return $this->PHI_station;
    }
    public function getNIC(){
        return $this->NIC ;
    }
}