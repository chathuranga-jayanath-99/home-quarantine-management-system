<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

abstract class Patient extends \Core\Controller {

    protected function isValidNIC($nic) {
        if (strlen($nic) == 10) {
            $year = substr($nic, 0, 2);
            $day = substr($nic, 2, 3);
            $serial = substr($nic, 5, 3);
            $check = substr($nic, 8, 1);
            $letter = substr($nic, 9, 1);
            if ($letter !== 'V' && $letter !== 'X') {
                return false;
            }
            if (!is_numeric($year)) {
                return false;
            }
            if (is_numeric($day)) {
                $day = (int) $day;
                if ($day < 0) {
                    return false;
                } if ($day > 366) {
                    if ($day < 500 || day > 866) {
                        return false;
                    }
                }
            } else {
                return false;
            }
            if (!is_numeric($serial)) {
                return false;
            }
            if (!is_numeric($check)) {
                return false;
            }
        } else if (strlen($nic) == 12) {
            $year = substr($nic, 0, 4);
            $day = substr($nic, 4, 3);
            $serial = substr($nic, 7, 4);
            $check = substr($nic, 11, 1);
            if (is_numeric($year)) {
                if (!is_numeric($year)) {
                    $year = (int) $year;
                    if ($year < 1900 || $year > 2021) {
                        return false;
                    } 
                }
            }
            if (is_numeric($day)) {
                $day = (int) $day;
                if ($day < 0) {
                    return false;
                } if ($day > 366) {
                    if ($day < 500 || $day > 866) {
                        return false;
                    }
                }
            } else {
                return false;
            }
            if (!is_numeric($serial)) {
                return false;
            }
            if (!is_numeric($check)) {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

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