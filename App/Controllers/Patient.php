<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

use App\statePattern\PatientState;

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

    public abstract function getEmail();
    public abstract function getNIC();
    public abstract function getName();
    public abstract function getAge();
    public abstract function getContactNo();
    public abstract function getAddress();
    public abstract function getGender();
    public abstract function getPHIRange();

    protected abstract function activeHelper($patient);

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
        $state_str = $this->stateToString();
        if ($state_str === 'Contact Person') {
            $this->state->nextState($this);
        } else if ($state_str === 'Pending' || $state_str === 'Inactive') {
            $this->setActive();
            $this->state->nextState($this);
        } else {
            echo "Invalid operation: Changing state from ".$state_str." to Positive is not allowed";
        }
    }

    public function setContact() {
        $this->setActive();
    }

    public function setInactive() {
        $state_str = $this->stateToString();
        if ($state_str === 'Contact Person') {
            $this->setActive();
            $this->state->nextState($this);
        } else if ($state_str === 'Positive') {
            $this->state->nextState($this);
        } else {
            echo "Invalid operation: Changing state from ".$state_str." to Inactive is not allowed";
        }
    }

    public function setActive() {
        $state_str = $this->stateToString();
        if ($state_str === 'Pending' || $state_str === 'Inactive') {
            $this->state->nextState($this);
        } else {
            echo "Invalid operation: Changing state from ".$state_str." to Contact Person is not allowed";
        }
    }

    public function markDead() {
        $this->state->markDead();
    }

    public function stateToString() {
        return $this->state->toString();
    }

}