<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

            var_dump($result[0]);
            var_dump($result[1]);
            var_dump($result[2]);
            var_dump($result[3]);
            ?>

            <ul>
                <?php foreach ($result[4] as $client) : ?>
                    <li>
                        <strong>Prenom : </strong><?php echo $client['firstName']; ?>
                        <strong>Nom : </strong><?php echo $client['lastName']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <ul>
                <?php foreach ($result[5] as $show) :
                    $date = new DateTime($show['date']);
                    $date = $date->format('d-m-Y');

                    $startTime = new DateTime($show['startTime']);
                    $startTime = $startTime->format('H:i');
                ?>
                    <li><?php echo $show['title'] ?> par <?php echo $show['performer'] ?>,
                        le <?php echo $date ?> à <?php echo $startTime ?></li>
                <?php endforeach; ?>
            </ul>

            <ul>
                <?php foreach ($result[6] as $client) :
                    $hasCard = 'Non';
                    if ($client['card']) {
                        $hasCard = $client['cardNumber'];
                    }
                    ?>
                    <li>
                        <ul>
                            <li>Nom : <?= $client['lastName'] ?></li>
                            <li>Prenom : <?= $client['firstName'] ?></li>
                            <li>Date de naissance : <?= $client['birthDate'] ?></li>
                            <li>Carte de fidelite : <?= $hasCard ?></li>
                        </ul>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
