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
        View::render('Home/index.php', [
            'name' => 'Chathuwa',
            'colors' => ['red', 'green', 'blue']
        ]);
    }

}