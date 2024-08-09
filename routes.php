<?php

$routes = [
    ['method' => 'GET', 'uri' => '/users', 'action' => "pages/users_read.php", 'access'=>'admin'],
    ['method' => 'GET', 'uri' => '/users/create', 'action' => "pages/users_create.php", 'access'=>'admin'],
    ['method' => 'GET', 'uri' => '/user/show', 'action' => "pages/users_single.php", 'access'=>'admin'],
    ['method' => 'GET', 'uri' => '/user/edit', 'action' => "pages/users_edit.php", 'access'=>'admin'],
    ['method' => 'POST', 'uri' => '/users', 'action' => "scripts/users_store.php", 'access'=>'admin'],
    ['method' => 'POST', 'uri' => '/user/edit', 'action' => "scripts/users_update.php", 'access'=>'admin'],
    ['method' => 'POST', 'uri' => '/user/delete', 'action' => "scripts/users_delete.php", 'access'=>'admin'],

    ['method' => 'GET', 'uri' => '/tasks', 'action' => "pages/tasks_read.php", 'access'=>'auth'],
    ['method' => 'GET', 'uri' => '/tasks/create', 'action' => "pages/tasks_create.php", 'access'=>'auth'],
    ['method' => 'GET', 'uri' => '/task/show', 'action' => "pages/tasks_single.php", 'access'=>'auth'],
    ['method' => 'GET', 'uri' => '/task/edit', 'action' => "pages/tasks_edit.php", 'access'=>'auth'],
    ['method' => 'POST', 'uri' => '/tasks', 'action' => "scripts/tasks_store.php", 'access'=>'auth'],
    ['method' => 'POST', 'uri' => '/task/edit', 'action' => "scripts/tasks_update.php", 'access'=>'auth'],
    ['method' => 'POST', 'uri' => '/task/delete', 'action' => "scripts/tasks_delete.php", 'access'=>'auth'],

    ['method' => 'GET', 'uri' => '/register', 'action' => "pages/register.php", 'access'=>'guest'],
    ['method' => 'POST', 'uri' => '/register', 'action' => "scripts/register.php", 'access'=>'guest'],
    ['method' => 'GET', 'uri' => '/login', 'action' => "pages/login.php", 'access'=>'guest'],
    ['method' => 'POST', 'uri' => '/login', 'action' => "scripts/login.php", 'access'=>'guest'],
    ['method' => 'POST', 'uri' => '/logout', 'action' => "scripts/logout.php", 'access'=>'auth'],
];

foreach($routes as $route):
    if ($method === $route['method'] && getUri() === $route['uri']) 
    {
        $params = uriParams();
        if ($route['access'] !== 'guest' && $_SESSION["username"] === "") {
            require "pages/login.php";
        } else {
            require $route['action'];
        }
        die();
    }
endforeach;

dd(['message'=>'<b><h4>The route does not have any mapping</h4></b>', 'uri'=>getUri(), 'method'=>$method, 'routes'=>$routes]);