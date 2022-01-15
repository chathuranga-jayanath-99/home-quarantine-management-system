<?php

namespace App\Controllers;

use \Core\View;
use App\Models\AdultPatientModel;

use App\PatientStatePattern\PatientState;
use App\PatientStatePattern\Pending;
use App\PatientStatePattern\Inactive;
use App\PatientStatePattern\Contact;
use App\PatientStatePattern\Positive;
use App\PatientStatePattern\Dead;

use App\RecordStatePattern\Record;
use App\RecordStatePattern\RecordState;
use App\RecordStatePattern\NotFilled;
use App\RecordStatePattern\Unchecked;
use App\RecordStatePattern\Checked;

class Adultpatient extends Patient{
    private $id;
    private $name;
    private $email;
    private $address;
    private $NIC;
    private $gender;
    private $age;
    private $contact_no;
    private $phi_range;
    private $phi_id;
    private $doctor_id;
    private $start_quarantine_date;
    private $end_quarantine_date;

    public function registerAction(){
        if(parent::checkPHISession()){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                if(trim($_POST['id_checked']) === 'yes'){
                    if($_POST['new']==='no'){
                        $data = [
                            'name'                  => htmlspecialchars(trim($_POST['name'])),
                            'email'                 => htmlspecialchars(trim($_POST['email'])),
                            'password'              => trim($_POST['password']),
                            'confirm_password'      => trim($_POST['confirm_password']),
                            'NIC'                   => strtoupper(trim($_POST['NIC'])),
                            'age'                   => htmlspecialchars(trim($_POST['age'])),
                            'contact_no'            => htmlspecialchars(trim($_POST['contact_no'])),
                            'address'               => htmlspecialchars(trim($_POST['address'])),
                            'gender'                => trim($_POST['gender']),
                            'name_err'              => '',
                            'email_err'             => '',
                            'password_err'          => '',
                            'confirm_password_err'  => '',
                            'id_checked'            => 'yes',
                            'nic_err'               => '',
                            'age_err'               => '',
                            'address_err'           => '',
                            'contact_no_err'        => ''
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
                        else if(strlen($data['password']) < 6){
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

                        if(empty($data['age'])){
                            $data['age_err'] = 'Please enter an age';
                        } else if (is_numeric($data['age'])) {
                            $data['age'] = (int) $data['age'];
                        } else {
                            $data['age_err'] = 'Please enter a valid age';
                        }

                        if(empty($data['contact_no'])){
                            $data['contact_no_err'] = 'Please enter contact no';
                        }

                        if(empty($data['address'])){
                            $data['address_err'] = 'Please enter address';
                        }

                        if (empty($data['name_err']) && empty($data['email_err']) &&
                        empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['address_err']) && 
                        empty($data['contact_no_err'])){
                            // validated
                            // Hash password
                            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                            // Register User
                            $id = AdultPatientModel::register($data);
                            if ($id) {
                                $this->initialize($data['NIC'], $data['email']);
                                $this->activeHelper($this);
                            }
                            else {
                                die('something went wrong');
                            }
                            die('SUCCESS');
                        }
                        else {
                            $nav = [
                                'page'       => "Registration",
                                'totalSteps' => 3,
                                'step'       => 3
                            ];
                            // load view with errors
                            View::render('AdultPatients/post_register.php', ['data'=> $data, 'nav' => $nav]);
                        }
                    }
                    else {
                        $data = [
                            'name'                  => '',
                            'email'                 => '',
                            'password'              => '',
                            'confirm_password'      => '',
                            'NIC'                   => htmlspecialchars(strtoupper(trim($_POST['NIC']))),
                            'age'                   => '',
                            'contact_no'            => '',
                            'address'               => '',
                            'gender'                => '',
                            'name_err'              => '',
                            'email_err'             => '',
                            'password_err'          => '',
                            'confirm_password_err'  => '',
                            'id_checked'            => 'yes',
                            'nic_err'               => '',
                            'age_err'               => '',
                            'address_err'           => '',
                            'contact_no_err'        => ''
                        ];
                        $nav = [
                            'page'       => "Registration",
                            'totalSteps' => 3,
                            'step'       => 3
                        ];
                        // load view
                        View::render('AdultPatients/post_register.php', ['data'=> $data, 'nav' => $nav]);
                    }
                }
                else {
                    $data = [
                        'name'                  => '',
                        'email'                 => '',
                        'password'              => '',
                        'confirm_password'      => '',
                        'NIC'                   => htmlspecialchars(strtoupper(trim($_POST['NIC']))),
                        'age'                   => '',
                        'contact_no'            => '',
                        'address'               => '',
                        'gender'                => '',
                        'name_err'              => '',
                        'email_err'             => '',
                        'password_err'          => '',
                        'confirm_password_err'  => '',
                        'id_checked'            => 'no',
                        'nic_err'               => '',
                        'age_err'               => '',
                        'address_err'           => '',
                        'contact_no_err'        => ''
                    ];
                    if (empty($data['NIC'])) {
                        $data['id_err'] = 'Please enter NIC';
                    } else {
                        if (parent::isValidNIC($data['NIC'])) {
                            $adultData = AdultPatientModel::searchByNIC($data['NIC']);
                            if($adultData){
                                $nav = [
                                    'page'       => "Registration",
                                    'totalSteps' => 3,
                                    'step'       => 2
                                ];
                                View::render('AdultPatients/register.php', ['adultData' => $adultData, 'nic' => $data['NIC'], 'nav' => $nav]);
                            }else{
                                $nav = [
                                    'page'       => "Registration",
                                    'totalSteps' => 3,
                                    'step'       => 3
                                ];
                                View::render('AdultPatients/post_register.php', ['data'=> $data, 'nav' => $nav]);
                            }
                            //View::render('AdultPatients/register.php', ['adultData' => $adultData, 'nic' => $data['NIC']]);
                        } else {
                            $data['nic_err'] = 'Invalid NIC';
                            $nav = [
                                'page'       => "Registration",
                                'totalSteps' => 3,
                                'step'       => 1
                            ];
                            View::render('AdultPatients/pre_register.php', ['data'=> $data, 'nav' => $nav]);
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
                    'NIC'                   => '',
                    'age'                   => '',
                    'contact_no'            => '',
                    'address'               => '',
                    'gender'                => '',
                    'name_err'              => '',
                    'email_err'             => '',
                    'password_err'          => '',
                    'confirm_password_err'  => '',
                    'id_checked'            => 'no',
                    'nic_err'               => '',
                    'age_err'               => '',
                    'address_err'           => '',
                    'contact_no_err'        => ''
                ];
                $nav = [
                    'page'       => "Registration",
                    'totalSteps' => 3,
                    'step'       => 1
                ];
                // load view
                View::render('AdultPatients/pre_register.php', ['data'=> $data, 'nav' => $nav]);
            }
        }
    }   
            
                
                
    public function loginAction()
    {
        if ($this->isLoggedIn()) {
            header('location: '.URLROOT.'/adult-patient');
            die();
        }
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
                $adultPatient = AdultPatientModel::login($data['email'], $data['password']);
                
                if($adultPatient){
                    // log in success
                    $this->createSession($adultPatient);
                    header('location: '.URLROOT.'/adult-patient');
                    die();
                
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
        unset($_SESSION['NIC']);
        unset($_SESSION['adult_email']);
        unset($_SESSION['adult_name']);
        session_destroy();
        header('location: '.URLROOT.'/adult-patient/login');
    }

    public function indexAction(){
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            View::render('AdultPatients/index.php', ['adultObj' => $this, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
                
    }

    private function createSession($adultPatient){
        $_SESSION['adult_id'] = $adultPatient->id;
        $_SESSION['NIC'] = $adultPatient->NIC;
        $_SESSION['adult_email'] = $adultPatient->email;
        $_SESSION['adult_name'] = $adultPatient->name;
        $_SESSION['adult_gender'] = $adultPatient->gender;
    }

    public function isLoggedIn(){
        if (isset($_SESSION['phi_id'])) {
            header('location: '.URLROOT.'/phi');
            die();
        } else if (isset($_SESSION['adult_id'])) {
            return true;
        } else if (isset($_SESSION['doctor_id'])) {
            header('location: '.URLROOT.'/doctor');
            die();
        } else if (isset($_SESSION['childPatient_id'])) {
            header('location: '.URLROOT.'/child-patient');
            die();
        } else {
            return false;
        }
    }

    public function activeAction() {
        if(parent::checkPHISession()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->initialize($_POST['nic'], $_POST['email']);
                $changed = false;
                if (isset($_POST['changed'])) {
                    if ($_POST['changed'] === 'true') {
                        $changed = true;
                        $this->activeHelper($this);
                    }
                }
                if (!$changed) {
                    $state = ucfirst($_POST['act']);
                    $state = 'set'.$state;
                    if (is_callable([$this, $state])) {
                        $this->$state();
                        $id_arr = AdultPatientModel::getDoctorToAssign();
                        $doctor_id = ($id_arr[0])->id;
                        $rows = AdultPatientModel::changeStateAndDoctor($this->email, $this->NIC, $_POST['act'], $doctor_id);
                        $this->phi_id = $_SESSION['phi_id'];
                        $this->phi_range = $_SESSION['phi_area'];
                        if($rows>0) {
                            $nav = [
                                'page'       => "Active Account",
                                'totalSteps' => 2,
                                'step'       => 2
                            ];
                            View::render('AdultPatients/accSuccess.php', ['adultObj' => $this, 'nav' => $nav]);
                        } else {
                            echo 'Failed';
                        }
                    } else {
                        echo 'Failed';
                    }
                }
            }
        }
    }

    public function markpositive(){
        if(parent::checkPHISession()) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'NIC' => htmlspecialchars(strtoupper(trim($_POST['NIC']))),
                    'nic_err' => ''
                ];

                if(parent::isValidNIC($data['NIC'])){
                    $adultData = AdultPatientModel::searchByNIC($data['NIC']);
                    $contact_patient = array();
                    foreach($adultData as $adult){
                        if($adult->state == 'contact'){
                            array_push( $contact_patient , $adult);
                        }
                    }
                    $nav = [
                        'page'       => "Mark Positive",
                        'totalSteps' => 3,
                        'step'       => 2
                    ];
                    View::render('AdultPatients/post_markpositive.php', ['contact_patient' => $contact_patient , 'nic' => $data['NIC'], 'nav' => $nav]);
                    
                                
                }
                else{
                    $data['nic_err'] = 'Invalid NIC';
                    $nav = [
                        'page'       => "Mark Positive",
                        'totalSteps' => 3,
                        'step'       => 1
                    ];
                    View::render('AdultPatients/pre_markpositive.php', ['data'=> $data, 'nav' => $nav]);
                }
            }
            else {
                $data = [
                    'NIC' => '' ,
                    'nic_err' => ''
                ] ;
                $nav = [
                    'page'       => "Mark Positive",
                    'totalSteps' => 3,
                    'step'       => 1
                ];
                View::render('AdultPatients/pre_markpositive.php', ['data'=> $data, 'nav' => $nav]); 
            }

        }
     }

    public function markpositiveHelper(){
        if(parent::checkPHISession()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->initialize($_POST['nic'], $_POST['email']);
                $state = 'Positive' ;
                $state = 'set'.$state;
                if (is_callable([$this, $state])) {
                    $this->$state();
                    $rows = AdultPatientModel::changeState($this->email, $this->NIC, 'positive');
                    if($rows>0) {
                        $nav = [
                            'page'       => "Mark Positive",
                            'totalSteps' => 3,
                            'step'       => 3
                        ];
                        View::render('AdultPatients/accSuccess.php', ['adultObj' => $this, 'nav' => $nav]);
                    } else {
                        echo 'Failed';
                    }
                } else {
                    echo 'Failed';
                }
            }
        }
    }

    public function markdead(){
        if(parent::checkPHISession()) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'NIC' => htmlspecialchars(strtoupper(trim($_POST['NIC']))),
                    'nic_err' => ''
                ];

                if(parent::isValidNIC($data['NIC'])){
                    $adultData = AdultPatientModel::searchByNIC($data['NIC']);
                    // $contact_children = array();
                    $nav = [
                        'page'       => "Mark Dead",
                        'totalSteps' => 3,
                        'step'       => 2
                    ];
                    View::render('AdultPatients/post_markdead.php', ['adultData' => $adultData , 'nic' => $data['NIC'], 'nav' => $nav]);
                    
                                
                }
                else{
                    $data['nic_err'] = 'Invalid NIC';
                    $nav = [
                        'page'       => "Mark Dead",
                        'totalSteps' => 3,
                        'step'       => 1
                    ];
                    View::render('AdultPatients/pre_markdead.php', ['data'=> $data, 'nav' => $nav]);
                }
            }
            else {
                $data = [
                    'NIC' => '' ,
                    'nic_err' => ''
                ] ;
                $nav = [
                    'page'       => "Mark Dead",
                    'totalSteps' => 3,
                    'step'       => 1
                ];
                View::render('AdultPatients/pre_markdead.php', ['data'=> $data, 'nav' => $nav]); 
            }
        }
    
    }
    
    public function markdeadHelper(){
        if(parent::checkPHISession()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->initialize($_POST['nic'], $_POST['email']);
                // if (is_callable([$this, $state])) {
                //  $this->$state();
                    parent::markDead();
                    $rows = AdultPatientModel::changeState($this->email, $this->NIC, 'dead');
                    if($rows>0) {
                        $nav = [
                            'page'       => "Mark Dead",
                            'totalSteps' => 3,
                            'step'       => 3
                        ];
                        View::render('AdultPatients/accSuccess.php', ['adultObj' => $this, 'nav' => $nav]);
                    } else {
                        echo 'Failed';
                    }
            }
        }
    }

    public function searchAction(){
        if(parent::checkPHISession()) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'NIC' => htmlspecialchars(strtoupper(trim($_POST['NIC']))),
                    'nic_err' => ''
                ];

                if(parent::isValidNIC($data['NIC'])){
                    $adultData = AdultPatientModel::searchByNIC($data['NIC']);
                    $nav = [
                        'page'       => "Search",
                        'totalSteps' => 3,
                        'step'       => 2
                    ];
                    View::render('AdultPatients/post_search.php', ['adultData' => $adultData , 'nic' => $data['NIC'], 'nav' => $nav]);

                // if(parent::isValidNIC($data['NIC'])){
                //     $adultData = AdultPatientModel::searchByNIC($data['NIC']);
                //     if($adultData){
                //     $this->initialize($adultData[0]->NIC,$adultData[0]->email);
                //     View::render('AdultPatients/accSuccess.php', ['adultObj' => $this]);
                //     }
                    
                                
                }
                else{
                    $nav = [
                        'page'       => "Search",
                        'totalSteps' => 3,
                        'step'       => 1
                    ];
                    $data['nic_err'] = 'Invalid NIC';
                    View::render('AdultPatients/pre_search.php', ['data'=> $data, 'nav' => $nav]);
                }
            }
            else {
                $data = [
                    'NIC' => '' ,
                    'nic_err' => ''
                ] ;
                $nav = [
                    'page'       => "Search",
                    'totalSteps' => 3,
                    'step'       => 1
                ];
                View::render('AdultPatients/pre_search.php', ['data'=> $data, 'nav' => $nav]); 
            }
        }
    }
        
    public function searchHelper(){
        
        if(parent::checkPHISession()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->initialize($_POST['nic'], $_POST['email']);
                $nav = [
                    'page'       => "Search",
                    'totalSteps' => 3,
                    'step'       => 3
                ];
                View::render('AdultPatients/accSuccess.php', ['adultObj' => $this, 'nav' => $nav]);
                   
            }
        }
    }

    public function activateExistingAccAction(){

        if(parent::checkPHISession()) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'NIC' => htmlspecialchars(strtoupper(trim($_POST['NIC']))),
                    'nic_err' => ''
                ];

                if(parent::isValidNIC($data['NIC'])){
                    $adultData = AdultPatientModel::searchByNIC($data['NIC']);
                    $nav = [
                        'page'       => "Activate Existing",
                        'subPage'    => "Search",
                        'totalSteps' => 2,
                        'step'       => 2
                    ];
                    View::render('AdultPatients/register.php', ['adultData' => $adultData , 'nic' => $data['NIC'], 'nav' => $nav]);
                }
                else{
                    $data['nic_err'] = 'Invalid NIC';
                    $nav = [
                        'page'       => "Activate Existing",
                        'subPage'    => "Search",
                        'totalSteps' => 2,
                        'step'       => 1
                    ];
                    View::render('AdultPatients/pre_search.php', ['data'=> $data, 'nav' => $nav]);
                }
            }
            else {
                $data = [
                    'NIC' => '' ,
                    'nic_err' => ''
                ] ;
                $nav = [
                    'page'       => "Activate Existing",
                    'subPage'    => "Search",
                    'totalSteps' => 2,
                    'step'       => 1
                ];
                View::render('AdultPatients/pre_activate.php', ['data'=> $data, 'nav' => $nav]); 
            }
        }

    }



    public function recordAction() {
        if ($this->isLoggedIn()) {
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $state = $this->stateToString();
            $record = new Record();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $temperature = $_POST['temperature'];
                if (is_numeric($temperature) || is_float($temperature)) {
                    if ($_POST['temp-unit'] === 'fahrenheit') {
                        $temperature = ($temperature - 32) * 5 / 9;
                        $temperature = round($temperature, 2);
                    }
                    $fever          = 0;
                    $cough          = 0;
                    $sore_throat    = 0;
                    $short_breath   = 0;
                    $runny_nose     = 0;
                    $chills         = 0;
                    $muscle_ache    = 0;
                    $headache       = 0;
                    $fatigue        = 0;
                    $abdominal_pain = 0;
                    $vomiting       = 0;
                    $diarrhea       = 0;
                    $other          = htmlspecialchars(trim($_POST['other']));
                    $checked_count  = 0;
                    $level = 'normal';
                    if ($_POST['fever'] === 'yes') {
                        $fever = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['cough'] === 'yes') {
                        $cough = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['sore_throat'] === 'yes') {
                        $sore_throat = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['short_breath'] === 'yes') {
                        $short_breath = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['runny_nose'] === 'yes') {
                        $runny_nose = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['chills'] === 'yes') {
                        $chills = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['muscle_ache'] === 'yes') {
                        $muscle_ache = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['headache'] === 'yes') {
                        $headache = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['fatigue'] === 'yes') {
                        $fatigue = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['abdominal_pain'] === 'yes') {
                        $abdominal_pain = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['vomiting'] === 'yes') {
                        $vomiting = 1;
                        $checked_count += 1;
                    }
                    if ($_POST['diarrhea'] === 'yes') {
                        $diarrhea = 1;
                        $checked_count += 1;
                    }
                    if ($checked_count > 7) {
                        $level = 'critical';
                    } else if ($checked_count > 4) {
                        $level = 'serious';
                    }
                    $symptoms = [
                        "patient_id"     => $this->id,
                        "doctor_id"      => $this->doctor_id,
                        "phi_id"         => $this->phi_id,
                        "type"           => "adult",
                        "feedback"       => "",
                        "checked"        => 0,
                        "temperature"    => $temperature,
                        "fever"          => $fever,
                        "cough"          => $cough,
                        "sore_throat"    => $sore_throat,
                        "short_breath"   => $short_breath,
                        "runny_nose"     => $runny_nose,
                        "chills"         => $chills,
                        "muscle_ache"    => $muscle_ache,
                        "headache"       => $headache,
                        "fatigue"        => $fatigue,
                        "abdominal_pain" => $abdominal_pain,
                        "vomiting"       => $vomiting,
                        "diarrhea"       => $diarrhea,
                        "other"          => $other,
                        "level"          => $level,
                        "checked_count"  => $checked_count
                    ];
                    if (AdultPatientModel::recordSymptoms($symptoms)) {
                        $record->initialize($symptoms);
                        $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
                        View::render('AdultPatients/recordSuccess.php', ['symptoms' => $record, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                    }
                }
            } else {
                $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
                View::render('AdultPatients/recordSymptoms.php', ['has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
            }
        } else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function passwordResetAction() {
        if (parent::checkPHISession()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'NIC'     => '',
                    'nic_err' => ''
                ];
                if ($_POST['id_checked'] === 'no') {
                    if(empty($_POST['NIC'])){
                        $nav = [
                            'page'       => "Password Reset",
                            'totalSteps' => 4,
                            'step'       => 1
                        ];
                        View::render('AdultPatients/pwdReset1.php', ['NIC' => '', 'nic_err' => 'Please enter NIC', 'nav' => $nav]);
                    } else {
                        $data['NIC'] = htmlspecialchars(strtoupper(trim($_POST['NIC'])));
                        if (parent::isValidNIC($data['NIC'])) {
                            $adultData = AdultPatientModel::searchByNIC($data['NIC']);
                            $nav = [
                                'page'       => "Password Reset",
                                'totalSteps' => 4,
                                'step'       => 2
                            ];
                            View::render('AdultPatients/pwdReset2.php', ['adultData' => $adultData, 'nic' => $data['NIC'], 'nav' => $nav]);
                        } else {
                            $data['nic_err'] = 'Enter a valid NIC';
                            $nav = [
                                'page'       => "Password Reset",
                                'totalSteps' => 4,
                                'step'       => 1
                            ];
                            View::render('AdultPatients/pwdReset1.php', ['data' => $data, 'nav' => $nav]);
                        }
                    }
                } else {
                    if ($_POST['entered'] === 'yes') {
                        $nic = $_POST['nic'];
                        $email = $_POST['email'];
                        $this->initialize($nic, $email);
                        $data = [
                            'password'          => $_POST['password'],
                            'conf_password'     => $_POST['conf_password'],
                            'password_err'      => '',
                            'conf_password_err' => ''
                        ];
                        if(empty($data['password'])){
                            $data['password_err'] = 'Please enter password';
                        }
                        else if(strlen($data['password']) < 6){
                            $data['password_err'] = 'Password must be at least 6 characters';
                        }

                        if(empty($data['conf_password'])){
                            $data['conf_password_err'] = 'Please confirm password';
                        }
                        else {
                            if($data['password'] != $data['conf_password']){
                                $data['conf_password_err'] = 'Passwords do not match';
                            }
                        }

                        if (empty($data['password_err']) && empty($data['conf_password_err'])){
                            // validated
                            // Hash password
                            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                            // Register User
                            $id = AdultPatientModel::changePassword($email, $nic, $data['password']);
                            if ($id) {
                                $this->initialize($nic, $email);
                                $nav = [
                                    'page'       => "Password Reset",
                                    'totalSteps' => 4,
                                    'step'       => 4
                                ];
                                View::render('AdultPatients/accSuccess.php', ['adultObj' => $this, 'nav' => $nav]);
                            }
                            else {
                                die('something went wrong');
                            }
                            die('SUCCESS');
                        } else {
                            $nav = [
                                'page'       => "Password Reset",
                                'totalSteps' => 4,
                                'step'       => 3
                            ];
                            View::render('AdultPatients/pwdReset3.php', ['nic' => $_POST['nic'], 'email' => $_POST['email'], 'name' => $this->name, 'data' => $data, 'nav' => $nav]);
                        }

                    } else {
                        $nic = $_POST['nic'];
                        $email = $_POST['email'];
                        $this->initialize($nic, $email);
                        $data = [
                            'password'          => '',
                            'conf_password'     => '',
                            'password_err'      => '',
                            'conf_password_err' => ''
                        ];
                        $nav = [
                            'page'       => "Password Reset",
                            'totalSteps' => 4,
                            'step'       => 3
                        ];
                        View::render('AdultPatients/pwdReset3.php', ['nic' => $nic, 'email' => $email, 'name' => $this->name, 'data' => $data, 'nav' => $nav]);
                    }
                }
            } else {
                $nav = [
                    'page'       => "Password Reset",
                    'totalSteps' => 4,
                    'step'       => 1
                ];
                View::render('AdultPatients/pwdReset1.php', ['data' => ['NIC' => '', 'nic_err' => ''], 'nav' => $nav]);
            }
        }
    }

    public function passwordChangeAction() {
        if ($this->isLoggedIn()) {
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'password'     => '',
                    'password_err' => ''
                ];
                if ($_POST['entered'] === 'no') {
                    if(empty($_POST['password'])){
                        View::render('AdultPatients/pwdChange1.php', ['data' => ['password' => '', 'password_err' => 'Please enter password'], 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                    } else {
                        $data['password'] = trim($_POST['password']);
                        if (empty($data['password_err'])) {
                            $adultPatient = AdultPatientModel::login($_SESSION['adult_email'], $data['password']);
                            if($adultPatient){
                                $data = [
                                    'password'          => '',
                                    'conf_password'     => '',
                                    'password_err'      => '',
                                    'conf_password_err' => ''
                                ];
                                View::render('AdultPatients/pwdChange2.php', ['data' => $data, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                            }
                            else{
                                $data['password_err'] = 'Invalid password';
                                View::render('AdultPatients/pwdChange1.php', ['data' => $data, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                            }
                        }
                    }
                } else {
                    $data = [
                        'password'          => $_POST['password'],
                        'conf_password'     => $_POST['conf_password'],
                        'password_err'      => '',
                        'conf_password_err' => ''
                    ];
                    if(empty($data['password'])){
                        $data['password_err'] = 'Please enter password';
                    }
                    else if(strlen($data['password']) < 6){
                        $data['password_err'] = 'Password must be at least 6 characters';
                    }

                    if(empty($data['conf_password'])){
                        $data['conf_password_err'] = 'Please confirm password';
                    }
                    else {
                        if($data['password'] != $data['conf_password']){
                            $data['conf_password_err'] = 'Passwords do not match';
                        }
                    }

                    if (empty($data['password_err']) && empty($data['conf_password_err'])){
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                        $id = AdultPatientModel::changePassword($this->email, $this->NIC, $data['password']);
                        if ($id) {
                            View::render('AdultPatients/pwdChangeSuccess.php', ['data' => $data, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                        }
                        else {
                            echo 'Failed';
                        }
                    } else {
                        View::render('AdultPatients/pwdChange2.php', ['data' => $data, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                    }
                }
            } else {
                View::render('AdultPatients/pwdChange1.php', ['data' => ['password' => '', 'password_err' => ''], 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
            }
        } else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function medHistoryAction(){
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            $medHistory = AdultPatientModel::getMedHistory($_SESSION['adult_id']);
            View::render('AdultPatients/medicalHistory.php', ['medHistory' => $medHistory, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
        
    }

    public function editMedHistoryAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $description          = htmlspecialchars(trim($_POST['description']));
                    
                $medicalHistory = [
                    "patient_id"     => $this->id,
                    "patient_type"   => "adult",
                    "description"    => $description
                ];
                if (AdultPatientModel::recordMedHistory($this->id, $medicalHistory)) {
                    View::render('AdultPatients/editMedHistorySuccess.php', ['description' => $description, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                }
            } else {
                $medHistory = AdultPatientModel::getMedHistory($_SESSION['adult_id']);
                View::render('AdultPatients/editMedHistory.php', ['medHistory' => $medHistory, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
            }
        } else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function profileAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            View::render('AdultPatients/profile.php', ['adultData' => $this, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function editProfileAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //TODO
                View::render('AdultPatients/editProfileSuccess.php', ['has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
            } else {
                $data = [
                    'name'                  => $this->name,
                    'email'                 => $this->email,
                    'NIC'                   => $this->NIC,
                    'age'                   => $this->age,
                    'contact_no'            => $this->contact_no,
                    'address'               => $this->address,
                    'gender'                => $this->gender,
                    'name_err'              => '',
                    'email_err'             => '',
                    'nic_err'               => '',
                    'age_err'               => '',
                    'address_err'           => '',
                    'contact_no_err'        => ''
                ];
                View::render('AdultPatients/editProfile.php', ['data' => $data, 'has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
            }
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function contactAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            View::render('AdultPatients/contact.php', ['has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function aboutUsAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            View::render('AdultPatients/aboutUs.php', ['has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function noRecordSelectedAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            View::render('AdultPatients/recordNotSelected.php', ['has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function viewRecordAction() {
        if ($this->isLoggedIn()){
            if (isset($_GET['recordID'])) {
                $record_id = $_GET['recordID'];
                if (is_numeric($record_id)) {
                    $record = AdultPatientModel::getRecord($_SESSION['adult_id'], $record_id);
                    if ($record) {
                        $symptoms = new Record();
                        $symptoms->initialize($record);
                        View::render('AdultPatients/symptomRecordView.php', ['symptoms' => $symptoms]);
                    }
                } else {
                    echo "Not Found";
                }
            } else {
                echo "Not Found";
            }
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function recordsHistoryAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            $res = AdultPatientModel::hasNotifications('adult', $_SESSION['adult_id']);
            $has_msg = array_values($res)[0];
            $last = AdultPatientModel::getLastRecord($_SESSION['adult_id']);
            $state = $this->stateToString();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['record_cnt'])) {
                    $rec_cnt = $_POST['record_cnt'];
                    if (is_numeric($rec_cnt)) {
                        $records = AdultPatientModel::getRecordsCnt($_SESSION['adult_id'], $rec_cnt);
                        if ($records) {
                            $cnt = count($records);
                            $data = [
                                'records'  => $records,
                                'rec_cnt'  => $rec_cnt,
                                'has_more' => true,
                                'cnt'      => $cnt,
                                'has_msg'  => $has_msg,
                                'last'     => $last,
                                'state'    => $state
                            ];
                            if ($cnt < $rec_cnt) {
                                $data['has_more'] = false;
                            }
                            View::render('AdultPatients/recordsAllView.php', $data);
                        }
                    } else {
                        View::render('AdultPatients/noRecord.php', ['has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                    }
                } else {
                    View::render('AdultPatients/noRecord.php', ['has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                }
            } else {
                $records = AdultPatientModel::getRecordsCnt($_SESSION['adult_id'], 10);
                if ($records) {
                    $cnt = count($records);
                    $data = [
                        'records'  => $records,
                        'rec_cnt'  => 10,
                        'has_more' => true,
                        'cnt'      => $cnt,
                        'has_msg'  => $has_msg,
                        'last'     => $last,
                        'state'    => $state
                    ];
                    if ($cnt < 10) {
                        $data['has_more'] = false;
                    }
                    View::render('AdultPatients/recordsAllView.php', $data);
                } else {
                    View::render('AdultPatients/noRecord.php', ['has_msg' => $has_msg, 'last' => $last, 'state' => $state]);
                }
            }
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function showNotificationsAction() {
        if ($this->isLoggedIn()) {
            $page = 'unread';
            $notifications = [];
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page === 'all') {
                    $notifications = AdultPatientModel::getNotificationsAll($_SESSION['adult_id']);
                } else if ($page === 'read') {
                    $notifications = AdultPatientModel::getNotificationsRead($_SESSION['adult_id']);
                } else if ($page === 'unread') {
                    $notifications = AdultPatientModel::getNotificationsUnread($_SESSION['adult_id']);
                } else {
                    echo '<h1>Not found</h1>';
                    die();
                }
            } else {
                $notifications = AdultPatientModel::getNotificationsUnread($_SESSION['adult_id']);
            }
            $cnt = 0;
            if ($notifications) {
                $cnt = count($notifications);
            }
            View::render('AdultPatients/notifications.php', ['page' => $page, 'notifications' => $notifications, 'cnt' => $cnt]);
        } else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function notificationReadAction() {
        if ($this->isLoggedIn()) {
            $msg_id = $_POST['msg_id'];
            $receive_type = 'adult';
            $receiver_id = $_SESSION['adult_id'];
            AdultPatientModel::readNotification($msg_id, $receive_type, $receiver_id);
        } else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    public function notificationReadAllAction() {
        if ($this->isLoggedIn()) {
            $receive_type = 'adult';
            $receiver_id = $_SESSION['adult_id'];
            AdultPatientModel::readNotificationAll($receive_type, $receiver_id);
        } else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }

    protected function activeHelper($patient) {
        $nav = [
            'page'       => "Active Account",
            'totalSteps' => 2,
            'step'       => 1
        ];
        View::render('AdultPatients/active.php', ['adultObj' => $patient, 'nav' => $nav]);
    }

    private function initializeFromSession() {
        $this->initialize($_SESSION['NIC'], $_SESSION['adult_email']);
    }

    public function initialize($NIC, $email) {
        $adultObj = AdultPatientModel::searchByEmailAndNIC($NIC, $email);
        if ($adultObj) {
            $this->id                    = $adultObj->id;
            $this->name                  = $adultObj->name;
            $this->email                 = $adultObj->email;
            $this->address               = $adultObj->address;
            $this->NIC                   = $adultObj->NIC;
            $this->gender                = $adultObj->gender;
            $this->age                   = $adultObj->age;
            $this->contact_no            = $adultObj->contact_no;
            $this->phi_range             = $adultObj->phi_range;
            $this->phi_id                = $adultObj->phi_id;
            $this->doctor_id             = $adultObj->doctor_id;
            $this->start_quarantine_date = $adultObj->start_quarantine_date;
            $this->end_quarantine_date   = $adultObj->end_quarantine_date;
            parent::transitionTo(PatientState::objFromName($adultObj->state));
        }
    }

    public function initializeById($id) {
        $adultObj = AdultPatientModel::getAdultById($id);
        if ($adultObj) {
            $this->id                    = $adultObj->id;
            $this->name                  = $adultObj->name;
            $this->email                 = $adultObj->email;
            $this->address               = $adultObj->address;
            $this->NIC                   = $adultObj->NIC;
            $this->gender                = $adultObj->gender;
            $this->age                   = $adultObj->age;
            $this->contact_no            = $adultObj->contact_no;
            $this->phi_range             = $adultObj->phi_range;
            $this->phi_id                = $adultObj->phi_id;
            $this->doctor_id             = $adultObj->doctor_id;
            $this->start_quarantine_date = $adultObj->start_quarantine_date;
            $this->end_quarantine_date   = $adultObj->end_quarantine_date;
            parent::transitionTo(PatientState::objFromName($adultObj->state));
        }
    }
    
    public function endQuarantinePeriod(){
        if (isset($_SESSION['doctor_id'])){
            $patientId = $_POST['id'];
            $this->initializeById($patientId);
            $this->setInactive();
            AdultPatientModel::markInactiveOrDead($patientId, $_SESSION['doctor_id'], 'inactive');
            
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNIC() {
        return $this->NIC;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getContactNo() {
        return $this->contact_no;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getPHIRange() {
        return $this->phi_range;
    }

    public function getStartQuarantineDate() {
        return $this->start_quarantine_date;
    }

    public function getEndQuarantineDate() {
        return $this->end_quarantine_date;
    }

}
