<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>PDO : PHP Data Objects</h1>
            <?php
            include "controllers.php";

            var_dump($resultat_1);
            var_dump($resultat_2);
            var_dump($resultat_3);
            var_dump($resultat_4);
            ?>
            <ul>
                <?php foreach ($resultat_5 as $client) : ?>
                    <li>
                        <strong>Prénom :</strong> <?= $client['firstName'] ?>
                        <strong>Nom :</strong> <?= $client['lastName'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul>
                <?php foreach ($resultat_6 as $show) : ?>
                    <?= $show['title'] ?> par <?= $show['performer'] ?>, le <?= $show['date'] ?> à <?= $show['startTime'] ?>.
                    <br>
                <?php endforeach; ?>
            </ul>

            <ul>
                <?php foreach ($resultat_7 as $client) :
                    $hasCard = 'Non';
                    if ($client['card']) {
                        $hasCard = $client['cardNumber'];
                    }

                    $hasCard = ($client['card']) ? $client['cardNumber'] : 'Non';

                    ?>
                    <li>
                        <ul>
                            <li>Nom : <?= $client['firstName'] ?></li>
                            <li>Prénom : <?= $client['lastName'] ?></li>
                            <li>Date de naissance : <?= $client['birthDate'] ?></li>
                            <li>Carte de fidélité: <?= $hasCard ?></li>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php
            $db = null;
            ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>
</html>
