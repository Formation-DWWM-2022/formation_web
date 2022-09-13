<?php

require_once 'Entity/Router.php';

use App\Service\Router;
use App\Exception\RouterException;
use App\Controller\HomeController;


try {
    $router = new Router($_GET['url']);

    $router->get('/', function () {
        echo 'Index';
    });

    $router->get(
        '/admin/posts/',
        function () {
            echo 'Admin / Posts';
        }
    );

    $router->post('/add', function () {
        echo (new HomeController())->add();
    });


    $router->run();
} catch (RouterException | Exception $e) {
    die('Error: ' . $e);
}
