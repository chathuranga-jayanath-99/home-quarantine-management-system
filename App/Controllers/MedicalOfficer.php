<?php

namespace App\Controllers;

use \Core\View;
use App\Models\DoctorModel;

abstract class MedicalOfficer extends \Core\Controller{

    public abstract function searchPatientAction();
    
}