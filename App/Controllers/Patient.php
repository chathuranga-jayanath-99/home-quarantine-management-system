<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

use App\statePattern\State;
use App\statePattern\Pending;
use App\statePattern\Inactive;
use App\statePattern\Contact;
use App\statePattern\Positive;
use App\statePattern\Dead;

abstract class Patient extends \Core\Controller {
    protected $state;

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

    public function transitionTo($state) {
        $this->state = $state;
    }

    public function setPositive() {
        //TODO
    }

    public function setContact() {
        //TODO
    }

    public function setInactive() {
        //TODO
    }

    public function setActive() {
        //TODO
    }

    public function markDead() {
        //TODO
    }

}