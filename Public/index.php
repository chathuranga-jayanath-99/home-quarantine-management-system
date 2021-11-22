<?php

require('../App/Config.php');

// Require Core
require '../Core/Router.php';
require '../Core/Controller.php';
require '../Core/View.php';
require '../Core/Model.php';

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

// Require models

require '../App/Models/DoctorModel.php';
require '../App/Models/PatientModel.php';
require '../App/Models/ChildPatientModel.php';
require '../App/Models/PHIModel.php';
require '../App/Models/AdultPatientModel.php';

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}', ['action' => 'index']);
$router->add('admin/{controller}', ['namespace' => 'Admin', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

// Match the requested route
$url = $_SERVER['QUERY_STRING'];
$router->dispatch($url);
