<?php

require_once 'config/config.php';
require_once 'Autoloader.php';

use App\Autoloader;
use App\Controller\Back\SportController;
use App\Controller\Front\HomeController;
use App\Exception\RouterException;
use App\Repository\SportRepository;
use App\Repository\UserRepository;
use App\Security\Auth;
use App\Service\Database;
use App\Service\Router;
use App\Service\Session;

Autoloader::$folderList =
    [
        "App/Entity/",
        "App/Controller/Front/",
        "App/Controller/Back/",
        "App/Repository/",
        "App/Exception/",
        "App/Service/",
        "App/Security/",
        "App/Form/",
        "App/Validator/"
    ];
Autoloader::register();

session_start();

try {

    $router = new Router($_GET['url']);

    // Auth
    $router->post('/', function () {
        (new Auth())->postRegister();
    });

    $router->get('user/new-password', function () {
        echo (new Auth())->getUpdatePassword();
    });

    $router->post('user/new-password', function () {
        echo (new Auth())->postUpdatePassword();
    });

    // HomePage
    $router->get('/', function () {
        echo (new HomeController())->invoke();
    });

    // Sport CRUD methods
    $router->get('/admin/sport/', function () {
        echo (new SportController())->invoke();
    });

    $router->get('/admin/sport/create', function () {
        echo (new SportController())->addSport();
    });

    $router->post('/admin/sport/add', function () {
        (new SportController())->addSport();
    });

    $router->post('/admin/sport/delete/:id', function ($params) {
        (new SportController())->deleteSportById($params);
    });

    $router->post('/admin/sport/update/:id', function ($params) {
        (new SportController())->updateSportById($params);
    });

    $router->get('/admin/sport/:id', function ($params) {
        echo (new SportController())->getSportById($params);
    });

    $router->run();
} catch(RouterException|Exception $e) {
    die('Error: ' . $e->getMessage());
}


