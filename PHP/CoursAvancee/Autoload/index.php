<?php
require_once 'Autoloader.php';

use App\Autoloader;
use App\controller\Compte;

/**
 *                      /!\ IMPORTANT /!\
 * à remplir avec les Chemins depuis la racine du projet vers les class
 *                      /!\    /!\    /!\
 */
Autoloader::$folderList =
    [
        "model/",
        "controller/",
        "src/repository/",
    ];
// On charge la méthode statique
Autoloader::register();

$compteB = new Compte();
$compteB->helloWorld();
