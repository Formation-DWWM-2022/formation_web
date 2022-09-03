<?php
include 'View.php';

$view = new View();
$users[] = ['name' => 'Alexandre'];
$users[] = ['name' => 'Pierre'];
$users[] = ['name' => 'Jack'];

echo $view->render('SUPER TITRE' , './templates/indexpage.php', ['users' => $users]);