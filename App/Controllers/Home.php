<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
{
    protected function before()
    {
        // echo "(before) ";
        // return false;
    }

    protected function after()
    {
        // echo " (after)";
        // return false;
    }

    public function indexAction()
    {
        if (isset($_SESSION['phi_id'])) {
            header('location: '.URLROOT.'/phi');
            die();
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
            View::render('Home/index.php', []);
        }
    }

    public function aboutAction() {
        if (isset($_GET['logged'])) {
            if ($_GET['logged'] === 'yes') {
                View::render('Home/about.php', ['page' => 'about-logged']);
            } else {
                View::render('Home/about.php', ['page' => '']);
            }
        }else {
            View::render('Home/about.php', ['page' => '']);
        }
    }

    public function contactAction(){
        View::render('Home/contact_details.php', []);
    }

}