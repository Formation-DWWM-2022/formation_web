<?php

require_once 'config/config.php';
require_once 'Autoloader.php';

use App\Autoloader;
use App\Controller\Back\SportController;
use App\Controller\Front\HomeController;
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
        "App/Form/"
    ];
Autoloader::register();

session_start();

try {

    $router = new Router($_GET['url']);

    // Auth
    $router->post('/', function () {
        $db = new Database();
        $userRepository = new UserRepository($db->getDb());
        $auth = new Auth($userRepository);
        $auth->postRegister();
    });

    $router->get('user/new-password', function () {
        $db = new Database();
        $userRepository = new UserRepository($db->getDb());
        $auth = new Auth($userRepository);
        echo $auth->getUpdatePassword();
    });

    $router->post('user/new-password', function () {
        $db = new Database();
        $userRepository = new UserRepository($db->getDb());
        $auth = new Auth($userRepository);
        echo $auth->postUpdatePassword();
    });

    // HomePage
    $router->get('/', function () {
        $db = new Database();
        $sportRepository = new SportRepository($db->getDb());
        $homeController = new HomeController($sportRepository);
        echo $homeController->invoke();
    });

    // Sport CRUD methods
    $router->get('/admin/sport/', function () {
        $db = new Database();
        $sportRepository = new SportRepository($db->getDb());
        $sportController = new SportController($sportRepository);
        echo $sportController->invoke();
    });

    $router->get('/admin/sport/:id', function ($params) {
        $db = new Database();
        $sportRepository = new SportRepository($db->getDb());
        $sportController = new SportController($sportRepository);
        echo $sportController->getSportById($params);
    });

    $router->get('/admin/sport/delete/:id', function () {
        $db = new Database();
        $sportRepository = new SportRepository($db->getDb());
        $sportController = new SportController($sportRepository);
        echo $sportController->deleteSportById();
    });

    $router->get('/admin/sport/add', function () {
        $db = new Database();
        $sportRepository = new SportRepository($db->getDb());
        $sportController = new SportController($sportRepository);
        echo $sportController->addSport();
    });

    $router->get('/admin/sport/update/:id', function () {
        $db = new Database();
        $sportRepository = new SportRepository($db->getDb());
        $sportController = new SportController($sportRepository);
        echo $sportController->updateSportById();
    });

    $router->run();


} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}


