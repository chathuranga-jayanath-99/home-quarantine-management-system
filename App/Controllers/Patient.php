<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

abstract class Patient extends \Core\Controller {
    public abstract function registerAction();
    public abstract function loginAction();
    public abstract function logoutAction();
    public abstract function indexAction();
    public abstract function isLoggedIn();
    public abstract function activeAction();
    public abstract function markpositive();
    public abstract function recordAction();

    protected abstract function activeHelper($nic, $email);

    protected function checkPHISession() {
        if (isset($_SESSION['phi_id'])) {
            return true;
        } else if (isset($_SESSION['child_id'])) {
            header('location: '.URLROOT.'/child-patient');
            die();
        } else if (isset($_SESSION['doctor_id'])) {
            header('location: '.URLROOT.'/doctor');
            die();
        } else if (isset($_SESSION['adPatient_id'])) {
            header('location: '.URLROOT.'/adult-patient');
            die();
        } else {
            header('location: '.URLROOT);
            die();
        }
    }

}