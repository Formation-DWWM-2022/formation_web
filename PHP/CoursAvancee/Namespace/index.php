<?php

require_once './model/Client/Compte.php';
require_once './model/Banque/Compte.php';
require_once './model/Banque/CompteCourant.php';

$compteB = new App\Banque\Compte();
$compteB->helloWorld();

use App\Client\Compte;
use App\Banque\CompteCourant;

$compteC = new Compte();
$compteC->helloWorld();


$CompteCourant = new CompteCourant();
$CompteCourant->helloWorld();