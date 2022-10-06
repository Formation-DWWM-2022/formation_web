<?php

use SebastianBergmann\Timer\Timer;

require __DIR__ . '/vendor/autoload.php';

$timer = new Timer();
$timer->start();

// your code

$time = $timer->stop();

var_dump($time);

print $time->asString();

$servname = "sql306.epizy.com";
$user = "epiz_32733643";
$pass = "k3F3bpPDj1ZLsL";
$dbname = "epiz_32733643_demo";

try {
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
     *users pour chaque entrée de la table*/
    $sth = $dbco->prepare("SELECT prenom, mail FROM users");
    $sth->execute();

    /*Retourne un tableau associatif pour chaque entrée de notre table
     *avec le nom des colonnes sélectionnées en clefs*/
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

    /*print_r permet un affichage lisible des résultats,
     *<pre> rend le tout un peu plus lisible*/
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet" integrity="sha384">
    <title>title</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-bg-dark">Coucou !</h1>
        </div>
    </div>
</div>
</body>
</html>
