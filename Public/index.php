<?php

// Require Core
require '../Core/Router.php';
require '../Core/Controller.php';
require '../Core/View.php';
require '../Core/Model.php';

// Require the controller classes
require '../App/Controllers/Posts.php';
require '../App/Controllers/Home.php';
require '../App/Controllers/Admin/Users.php';

// Require models
require '../App/Models/Post.php';

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

// Match the requested route
$url = $_SERVER['QUERY_STRING'];
$router->dispatch($url);
