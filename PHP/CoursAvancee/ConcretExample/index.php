<?php

require_once 'Autoloader.php';

use App\Entity\Router;
use App\Autoloader;
use App\Controller\Front\HomeController;
use App\Controller\Back\PostController;
use App\Exception\RouterException;
use App\Repository\PostRepository;
use App\Service\Database;

Autoloader::$folderList =
    [
        "Entity/",
        "Controller/Front/",
        "Controller/Back/",
        "Repository/",
        "Exception/",
        "Service/"
    ];
Autoloader::register();

try {
    $db = new Database("localhost", "cours", "root", "");
    $router = new Router($_GET['url']);

    $router->get('/', function () {
        $homeController = new HomeController();
        echo $homeController->invoke();
    });

    $postRepository = new PostRepository($db);
    $postController = new PostController($postRepository);

    $router->get(
        '/admin/posts/',
        $postController->invoke()
    );
} catch (Exception $e) {
    var_dump('cc');
}


$router->run();
