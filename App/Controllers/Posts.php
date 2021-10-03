<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        $posts = Post::getAll();
        
        View::render('Posts/index.php', [
            'posts' => $posts
        ]);
    }

    public function addNewAction()
    {
        echo "Hello from addNew in Posts";
    }

    public function editAction()
    {
        echo 'Hello from the edit action in Posts Controller';
        // echo '<p>Route parameters: <pre>' . 
        // htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}