<?php
// Fichier utilisé pour partager du code similaire sur plusieurs pages.
// De ce fait, si l'on doit rajouter par exemple une balise link vers un css,
// Nous n'aurons pas besoin de rajouter la balise sur toutes les pages, mais juste ce fichier.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/style.css">
    <?php
        // On vérifie si le tableau $customCssLinks existe
        if(isset($customCssLinks)) {
            // Si le tableau $customCssLinks existe, on le parcours et on echo les liens qu'il contient.
            foreach($customCssLinks as $customCssLink) {
                echo $customCssLink;
            }
        }
    ?>
    <title><?= $pageTitle ?></title>
</head>
<body>
    <header>
        <?php
        // Inclusion de la barre de navigation.
        include('./partials/nav.php')
        ?>
    </header>