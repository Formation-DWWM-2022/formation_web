<?php

require_once 'Entity/Router.php';

use App\Entity\Router;

$router = new Router($_GET['url']);

$router->get('/', function () {
    echo 'Index';
});

$router->get(
    '/admin/posts/', function () {
        echo 'Admin / Posts';
    }
);


$router->run();
