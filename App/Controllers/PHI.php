<?php
namespace App\Controllers;

use \Core\View ;

class PHI extends \Core\Controller{

    public function registerAction(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name'  => trim($_POST['name']),
            ]
        }
    }
    
}