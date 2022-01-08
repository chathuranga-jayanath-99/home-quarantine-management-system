<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ChildPatientModel;

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

class ChildPatient extends Patient {
    private $id;
    private $name;
    private $email;
    private $address;
    private $guardian_id;
    private $gender;
    private $age;
    private $contact_no;
    private $phi_range;
    private $phi_id;
    private $doctor_id;

    public function registerAction() {
        if(parent::checkPHISession()) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                if(trim($_POST['id_checked']) === 'yes') {
                    if ($_POST['new'] === 'no') {
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
                            if (ChildPatientModel::findUserByEmail($data['email'])){
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
                            $id = ChildPatientModel::register($data);
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
                            View::render('ChildPatients/post_registration.php', ['data'=> $data]);
                        }
                    } else {
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
                        View::render('ChildPatients/post_registration.php', ['data'=> $data]);
                    }
                } else {
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
                View::render('ChildPatients/pre_registration.php', ['data'=> $data]);
            }
        }
    }

    public function loginAction() {
        if ($this->isLoggedIn()) {
            header('location: '.URLROOT.'/child-patient');
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
                $childPatient = ChildPatientModel::login($data['email'], $data['password']);
                
                if($childPatient){
                    // log in success
                    $this->createSession($childPatient);
                    header('location: '.URLROOT.'/child-patient');
                    die();
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
        $_SESSION['child_id']     = $childPatient->id;
        $_SESSION['guardian_nic'] = $childPatient->guardian_id;
        $_SESSION['child_email']  = $childPatient->email;
        $_SESSION['child_name']   = $childPatient->name;
        $_SESSION['child_gender'] = $childPatient->gender;
    }

    public function isLoggedIn(){
        if (isset($_SESSION['phi_id'])) {
            header('location: '.URLROOT.'/phi');
            die();
        } else if (isset($_SESSION['child_id'])) {
            return true;
        } else if (isset($_SESSION['doctor_id'])) {
            header('location: '.URLROOT.'/doctor');
            die();
        } else if (isset($_SESSION['adPatient_id'])) {
            header('location: '.URLROOT.'/adult-patient');
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
                        $rows = ChildPatientModel::changeState($this->email, $this->guardian_id, $_POST['act']);
                        if($rows>0) {
                            View::render('ChildPatients/accSuccess.php', ['childObj' => $this]);
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

    public function markpositiveHelper(){
        if(parent::checkPHISession()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->initialize($_POST['nic'], $_POST['email']);
                $state = 'Positive' ;
                $state = 'set'.$state;
                if (is_callable([$this, $state])) {
                    $this->$state();
                    $rows = ChildPatientModel::changeState($this->email, $this->guardian_id, 'positive');
                    if($rows>0) {
                        View::render('ChildPatients/accSuccess.php', ['childObj' => $this]);
                    } else {
                        echo 'Failed';
                    }
                } else {
                    echo 'Failed';
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
                    $childrenData = ChildPatientModel::searchByGuardianID($data['NIC']);
                    $contact_children = array();
                    foreach($childrenData as $child){
                        if($child->state == 'contact'){
                            array_push( $contact_children , $child);
                        }
                    }
                    View::render('ChildPatients/post_markpositive.php', ['contact_children' => $contact_children , 'nic' => $data['NIC']]);
                    
                }
                else{
                    $data['nic_err'] = 'Invalid NIC';
                    View::render('ChildPatients/pre_markpositive.php', ['data'=> $data]);
                }
            }
            else {
                $data = [
                    'NIC' => '' ,
                    'nic_err' => ''
                ] ;
                View::render('ChildPatients/pre_markpositive.php', ['data'=> $data]); 
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
                    $childrenData = ChildPatientModel::searchByGuardianID($data['NIC']);
                    $contact_children = array();
                    View::render('ChildPatients/post_markdead.php', ['childrenData' => $childrenData , 'nic' => $data['NIC']]);
                    
                                
                }
                else{
                    $data['nic_err'] = 'Invalid NIC';
                    View::render('ChildPatients/pre_markdead.php', ['data'=> $data]);
                }
            }
            else {
                $data = [
                    'NIC' => '' ,
                    'nic_err' => ''
                ] ;
                View::render('ChildPatients/pre_markdead.php', ['data'=> $data]); 
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
                    $rows = ChildPatientModel::changeState($this->email, $this->guardian_id, 'dead');
                    if($rows>0) {
                        View::render('ChildPatients/accSuccess.php', ['childObj' => $this]);
                    } else {
                        echo 'Failed';
                    }
                // } else {
                //     echo 'Failed';
                // }
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
                    $childrenData = ChildPatientModel::searchByGuardianID($data['NIC']);
                    $contact_children = array();
                    View::render('ChildPatients/post_markdead.php', ['childrenData' => $childrenData , 'nic' => $data['NIC']]);
                    
                                
                }
                else{
                    $data['nic_err'] = 'Invalid NIC';
                    View::render('ChildPatients/pre_markdead.php', ['data'=> $data]);
                }
            }
            else {
                $data = [
                    'NIC' => '' ,
                    'nic_err' => ''
                ] ;
                View::render('ChildPatients/pre_markdead.php', ['data'=> $data]); 
            }
        }

    }

    public function recordAction() {
        if ($this->isLoggedIn()) {
            $this->initializeFromSession();
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
                    $level          = 'normal';
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
                        "type"           => "child",
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
                    if (ChildPatientModel::recordSymptoms($symptoms)) {
                        $record->initialize($symptoms);
                        View::render('ChildPatients/recordSuccess.php', ['symptoms' => $record]);
                    }
                }
            } else {
                View::render('ChildPatients/recordSymptoms.php', []);
            }
        } else {
            View::render('ChildPatients/notLoggedIn.php', []);
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
                        View::render('ChildPatients/pwdReset1.php', ['NIC' => '', 'nic_err' => 'Please enter NIC']);
                    } else {
                        $data['NIC'] = htmlspecialchars(strtoupper(trim($_POST['NIC'])));
                        if (parent::isValidNIC($data['NIC'])) {
                            $childrenData = ChildPatientModel::searchByGuardianID($data['NIC']);
                            View::render('ChildPatients/pwdReset2.php', ['childrenData' => $childrenData, 'nic' => $data['NIC']]);
                        } else {
                            $data['nic_err'] = 'Enter a valid NIC';
                            View::render('ChildPatients/pwdReset1.php', ['data' => $data]);
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
                            $id = ChildPatientModel::changePassword($email, $nic, $data['password']);
                            if ($id) {
                                $this->initialize($nic, $email);
                                View::render('ChildPatients/accSuccess.php', ['childObj' => $this]);
                            }
                            else {
                                die('something went wrong');
                            }
                            die('SUCCESS');
                        } else {
                            View::render('ChildPatients/pwdReset3.php', ['nic' => $_POST['nic'], 'email' => $_POST['email'], 'name' => $this->name, 'data' => $data]);
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
                        View::render('ChildPatients/pwdReset3.php', ['nic' => $nic, 'email' => $email, 'name' => $this->name, 'data' => $data]);
                    }
                }
            } else {
                View::render('ChildPatients/pwdReset1.php', ['data' => ['NIC' => '', 'nic_err' => '']]);
            }
        }
    }

    public function passwordChangeAction() {
        if ($this->isLoggedIn()) {
            $this->initializeFromSession();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'password'     => '',
                    'password_err' => ''
                ];
                if ($_POST['entered'] === 'no') {
                    if(empty($_POST['password'])){
                        View::render('ChildPatients/pwdChange1.php', ['data' => ['password' => '', 'password_err' => 'Please enter password']]);
                    } else {
                        $data['password'] = trim($_POST['password']);
                        if (empty($data['password_err'])) {
                            $childPatient = ChildPatientModel::login($_SESSION['child_email'], $data['password']);
                            if($childPatient){
                                $data = [
                                    'password'          => '',
                                    'conf_password'     => '',
                                    'password_err'      => '',
                                    'conf_password_err' => ''
                                ];
                                View::render('ChildPatients/pwdChange2.php', ['data' => $data]);
                            }
                            else{
                                $data['password_err'] = 'Invalid password';
                                View::render('ChildPatients/pwdChange1.php', ['data' => $data]);
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
                        $id = ChildPatientModel::changePassword($this->email, $this->guardian_id, $data['password']);
                        if ($id) {
                            View::render('ChildPatients/pwdChangeSuccess.php', []);
                        }
                        else {
                            echo 'Failed';
                        }
                    } else {
                        View::render('ChildPatients/pwdChange2.php', ['data' => $data]);
                    }
                }
            } else {
                View::render('ChildPatients/pwdChange1.php', ['data' => ['password' => '', 'password_err' => '']]);
            }
        } else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    public function medHistoryAction() {
        if ($this->isLoggedIn()){
            View::render('ChildPatients/medicalHistory.php', []);
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    public function editMedHistoryAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //TODO
                View::render('ChildPatients/editMedHistorySuccess.php', []);
            } else {
                //TODO
                View::render('ChildPatients/editMedHistory.php', []);
            }
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    public function profileAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            View::render('ChildPatients/profile.php', ['childData' => $this]);
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    public function editProfileAction() {
        if ($this->isLoggedIn()){
            $this->initializeFromSession();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //TODO
                View::render('ChildPatients/editProfileSuccess.php', []);
            } else {
                $data = [
                    'name'                  => $this->name,
                    'email'                 => $this->email,
                    'NIC'                   => $this->guardian_id,
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
                View::render('ChildPatients/editProfile.php', ['data' => $data]);
            }
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    public function contactAction() {
        if ($this->isLoggedIn()){
            View::render('ChildPatients/contact.php', []);
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    public function aboutUsAction() {
        if ($this->isLoggedIn()){
            View::render('ChildPatients/aboutUs.php', []);
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    public function viewRecordAction() {
        if ($this->isLoggedIn()){
            if (isset($_GET['recordID'])) {
                $record_id = $_GET['recordID'];
                if (is_numeric($record_id)) {
                    $record = ChildPatientModel::getRecord($_SESSION['child_id'], $record_id);
                    if ($record) {
                        $symptoms = new Record();
                        $symptoms->initialize($record);
                        $record = null;
                        View::render('ChildPatients/symptomRecordView.php', ['symptoms' => $symptoms]);
                    }
                } else {
                    echo "Not Found";
                }
            } else {
                echo "Not Found";
            }
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    public function recordsAction() {
        if ($this->isLoggedIn()){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['record_cnt'])) {
                    $rec_cnt = $_POST['record_cnt'];
                    if (is_numeric($rec_cnt)) {
                        $records = ChildPatientModel::getRecordsCnt($_SESSION['child_id'], $rec_cnt);
                        if ($records) {
                            $data = [
                                'records'  => $records,
                                'rec_cnt'  => $rec_cnt,
                                'has_more' => true
                            ];
                            if (count($records) < $rec_cnt) {
                                $data['has_more'] = false;
                            }
                            View::render('ChildPatients/recordsAllView.php', $data);
                        }
                    } else {
                        echo "Not Found";
                    }
                } else {
                    echo "Not Found";
                }
            } else {
                $records = ChildPatientModel::getRecordsCnt($_SESSION['child_id'], 10);
                if ($records) {
                    $data = [
                        'records'  => $records,
                        'rec_cnt'  => 10,
                        'has_more' => true
                    ];
                    if (count($records) < 10) {
                        $data['has_more'] = false;
                    }
                    View::render('ChildPatients/recordsAllView.php', $data);
                } else {
                    echo 'Not found';
                }
            }
        }
        else {
            View::render('ChildPatients/notLoggedIn.php', []);
        }
    }

    protected function activeHelper($patient) {
        View::render('ChildPatients/active.php', ['childObj' => $patient]);
    }

    private function initializeFromSession() {
        $this->initialize($_SESSION['guardian_nic'], $_SESSION['child_email']);
    }

    public function initialize($guardianNIC, $email) {
        $childObj = ChildPatientModel::searchByEmailAndGuardianID($guardianNIC, $email);
        if ($childObj) {
            $this->id          = $childObj->id;
            $this->name        = $childObj->name;
            $this->email       = $childObj->email;
            $this->address     = $childObj->address;
            $this->guardian_id = $childObj->guardian_id;
            $this->gender      = $childObj->gender;
            $this->age         = $childObj->age;
            $this->contact_no  = $childObj->contact_no;
            $this->phi_range   = $childObj->phi_range;
            $this->phi_id      = $childObj->phi_id;
            $this->doctor_id   = $childObj->doctor_id;
            parent::transitionTo(PatientState::objFromName($childObj->state));
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNIC() {
        return $this->guardian_id;
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
