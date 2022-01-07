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
                            // load view with errors
                            View::render('AdultPatients/post_register.php', ['data'=> $data]);
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
            
                        // load view
                        View::render('AdultPatients/post_register.php', ['data'=> $data]);
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
                                View::render('AdultPatients/register.php', ['adultData' => $adultData, 'nic' => $data['NIC']]);
                            }else{
                                View::render('AdultPatients/post_register.php', ['data'=> $data]);
                            }
                            //View::render('AdultPatients/register.php', ['adultData' => $adultData, 'nic' => $data['NIC']]);
                        } else {
                            $data['nic_err'] = 'Invalid NIC';
                            View::render('AdultPatients/pre_register.php', ['data'=> $data]);
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

                // load view
                View::render('AdultPatients/pre_register.php', ['data'=> $data]);
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
            $adultData = AdultPatientModel::getPatientData($_SESSION['adult_id']);
            View::render('AdultPatients/index.php', ['adultData' => $adultData]);
            //View::render('AdultPatients/index.php', []);
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
                        $rows = AdultPatientModel::changeState($this->email, $this->NIC, $_POST['act']);
                        if($rows>0) {
                            View::render('AdultPatients/accSuccess.php', ['adultObj' => $this]);
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
                    View::render('AdultPatients/post_markpositive.php', ['contact_patient' => $contact_patient , 'nic' => $data['NIC']]);
                    
                                
                }
                else{
                    $data['nic_err'] = 'Invalid NIC';
                    View::render('AdultPatients/pre_markpositive.php', ['data'=> $data]);
                }
            }
            else {
                $data = [
                    'NIC' => '' ,
                    'nic_err' => ''
                ] ;
                View::render('AdultPatients/pre_markpositive.php', ['data'=> $data]); 
            }

        }


    }

    public function recordAction() {
        if ($this->isLoggedIn()) {
            $this->initializeFromSession();
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
                    $level = 0;
                    if ($_POST['fever'] === 'yes') {
                        $fever = 1;
                        $level += 1;
                    }
                    if ($_POST['cough'] === 'yes') {
                        $cough = 1;
                        $level += 1;
                    }
                    if ($_POST['sore_throat'] === 'yes') {
                        $sore_throat = 1;
                        $level += 1;
                    }
                    if ($_POST['short_breath'] === 'yes') {
                        $short_breath = 1;
                        $level += 1;
                    }
                    if ($_POST['runny_nose'] === 'yes') {
                        $runny_nose = 1;
                        $level += 1;
                    }
                    if ($_POST['chills'] === 'yes') {
                        $chills = 1;
                        $level += 1;
                    }
                    if ($_POST['muscle_ache'] === 'yes') {
                        $muscle_ache = 1;
                        $level += 1;
                    }
                    if ($_POST['headache'] === 'yes') {
                        $headache = 1;
                        $level += 1;
                    }
                    if ($_POST['fatigue'] === 'yes') {
                        $fatigue = 1;
                        $level += 1;
                    }
                    if ($_POST['abdominal_pain'] === 'yes') {
                        $abdominal_pain = 1;
                        $level += 1;
                    }
                    if ($_POST['vomiting'] === 'yes') {
                        $vomiting = 1;
                        $level += 1;
                    }
                    if ($_POST['diarrhea'] === 'yes') {
                        $diarrhea = 1;
                        $level += 1;
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
                        "checked_count"  => 0
                    ];
                    if (AdultPatientModel::recordSymptoms($symptoms)) {
                        View::render('AdultPatients/recordSuccess.php', $symptoms);
                    }
                }
            } else {
                View::render('AdultPatients/recordSymptoms.php', []);
            }
        } else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
    }


    protected function activeHelper($patient) {
        View::render('AdultPatients/active.php', ['adultObj' => $patient]);
    }

    private function initializeFromSession() {
        $this->initialize($_SESSION['NIC'], $_SESSION['adult_email']);
    }

    public function initialize($NIC, $email) {
        $adultObj = AdultPatientModel::searchByEmailAndNIC($NIC, $email);
        if ($adultObj) {
            $this->id          = $adultObj->id;
            $this->name        = $adultObj->name;
            $this->email       = $adultObj->email;
            $this->address     = $adultObj->address;
            $this->NIC         = $adultObj->NIC;
            $this->gender      = $adultObj->gender;
            $this->age         = $adultObj->age;
            $this->contact_no  = $adultObj->contact_no;
            $this->phi_range   = $adultObj->phi_range;
            $this->phi_id      = $adultObj->phi_id;
            $this->doctor_id   = $adultObj->doctor_id;
            parent::transitionTo(PatientState::objFromName($adultObj->state));
        }
    }

    public function medHistoryAction(){
        if ($this->isLoggedIn()){
            View::render('AdultPatients/medicalHistory.php', []);
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
        }
        
    }

    public function profileAction(){
        if ($this->isLoggedIn()){
            $adultData = AdultPatientModel::getPatientData($_SESSION['adult_id']);
            View::render('AdultPatients/profile.php', ['adultData' => $adultData]);
        }
        else {
            View::render('AdultPatients/notLoggedIn.php', []);
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

}
