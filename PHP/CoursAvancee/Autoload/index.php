<?php
require_once 'Autoloader.php';

use App\Autoloader;
use App\controller\Compte;

// On charge la méthode statique
Autoloader::register();

$compteB = new Compte();
$compteB->helloWorld();
