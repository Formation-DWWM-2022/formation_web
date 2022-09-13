<!doctype html>
<html lang="fr">

<head>
   <title><?= $title ?></title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
   <header>
      <nav class="navbar bg-light">
         <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL_ROOT ?>"><?= SITE_NAME ?></a>
         </div>
      </nav>
      <?php //Session::showMessage(); ?>
   </header>
   <?= $content ?>
   <footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   </footer>
</body>

</html>