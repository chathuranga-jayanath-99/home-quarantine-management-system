<?php

require('../App/Config.php');

// Require Core
require '../Core/Router.php';
require '../Core/Controller.php';
require '../Core/View.php';
require '../Core/Model.php';
require '../Core/Database.php';

// Require helpers
require '../App/helpers/session_helper.php';

// Require the controller classes
require '../App/Controllers/Doctor.php';
require '../App/Controllers/Patient.php';
require '../App/Controllers/ChildPatient.php';
require '../App/Controllers/Home.php';
require '../App/Controllers/PHI.php' ;    // require the controller PHI
require '../App/Controllers/AdultPatient.php';
require '../App/Controllers/Admin/User.php';
require '../App/Controllers/Image.php';

// Require patient state pattern classes
require '../App/PatientStatePattern/PatientState.php';
require '../App/PatientStatePattern/Pending.php';
require '../App/PatientStatePattern/Inactive.php';
require '../App/PatientStatePattern/Contact.php';
require '../App/PatientStatePattern/Positive.php';
require '../App/PatientStatePattern/Dead.php';

// Require record state pattern classes
require '../App/RecordStatePattern/Record.php';
require '../App/RecordStatePattern/RecordState.php';
require '../App/RecordStatePattern/NotFilled.php';
require '../App/RecordStatePattern/Unchecked.php';
require '../App/RecordStatePattern/Checked.php';

require '../App/Models/User.php';
require '../App/Models/ChatMediator.php';
require '../App/Models/ChatMediatorImpl.php';

// Require models
require '../App/Models/MedicalOfficerModel.php';
require '../App/Models/DoctorModel.php';
require '../App/Models/PatientModel.php';
require '../App/Models/ChildPatientModel.php';
require '../App/Models/PHIModel.php';
require '../App/Models/AdultPatientModel.php';
require '../App/Models/AdminUserModel.php';

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('admin/{controller}', ['namespace' => 'Admin', 'action' => 'index']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('{controller}', ['action' => 'index']);
$router->add('{controller}/', ['action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('phi/{controller}/{action}');


// Match the requested route
$url = $_SERVER['QUERY_STRING'];
$router->dispatch($url);
