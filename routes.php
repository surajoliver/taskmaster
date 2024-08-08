<?php

$routes = [
    ['method' => 'GET', 'uri' => '/users', 'action' => "pages/users_read.php"],
    ['method' => 'GET', 'uri' => '/users/create', 'action' => "pages/users_create.php"],
    ['method' => 'GET', 'uri' => '/user/show', 'action' => "pages/users_single.php"],
    ['method' => 'GET', 'uri' => '/user/edit', 'action' => "pages/users_edit.php"],
    ['method' => 'POST', 'uri' => '/users', 'action' => "scripts/users_store.php"],
    ['method' => 'POST', 'uri' => '/user/edit', 'action' => "scripts/users_update.php"],
    ['method' => 'POST', 'uri' => '/user/delete', 'action' => "scripts/users_delete.php"],

    ['method' => 'GET', 'uri' => '/tasks', 'action' => "pages/tasks_read.php"],
    ['method' => 'GET', 'uri' => '/tasks/create', 'action' => "pages/tasks_create.php"],
    ['method' => 'GET', 'uri' => '/task/show', 'action' => "pages/tasks_single.php"],
    ['method' => 'GET', 'uri' => '/task/edit', 'action' => "pages/tasks_edit.php"],
    ['method' => 'POST', 'uri' => '/tasks', 'action' => "scripts/tasks_store.php"],
    ['method' => 'POST', 'uri' => '/task/edit', 'action' => "scripts/tasks_update.php"],
    ['method' => 'POST', 'uri' => '/task/delete', 'action' => "scripts/tasks_delete.php"],
];

foreach($routes as $route):
    if ($method === $route['method'] && getUri() === $route['uri']) {
        $params = uriParams();
        echo $route['action'];
        require $route['action'];
        die();
    }
endforeach;

dd(['message'=>'<b><h4>The route does not have any mapping</h4></b>', 'uri'=>getUri(), 'method'=>$method, 'routes'=>$routes]);