<!doctype html>
<html lang="fr">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<?php
include 'C:\wamp64\www\mediatheque-exercises-03\router.php';
showMessage();
?>
<nav class="navbar bg-light">
    <div class="container">
        <a class="navbar-brand" href=".http://localhost/mediatheque-exercises-03/index.php">Index</a>
        <?php
        if (isset($_SESSION['pseudo'])) {
            ?>
            <a href="http://localhost/mediatheque-exercises-03/admin.php" class="btn btn-success">Admin</a>
            <a class="btn btn-primary" href="http://localhost/mediatheque-exercises-03/index.php?action=deconnexion&type=auth">Deconnexion</a>
            <?php
        }
        ?>
    </div>
</nav>



