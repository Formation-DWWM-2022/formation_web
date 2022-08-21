<?php require_once 'pdo.php' ?>



<?php
// Récupérer les données avec PDO
?>

<!-- // Inclusion du header -->
<?php include ('partials/_header.php'); ?>
<a href="index.php" class="btn btn-sm btn-secondary">< retour à l'index</a>
<a href="ajout-type.php" class="btn btn-sm btn-primary float-right">Nouveau média</a>

<h1>Liste des médias</h1>

<!-- // Foreach du tableau -->
<?php foreach($a as $b) : ?>

<?php endforeach; ?>

<!-- // Inclusion du footer -->
<?php include('partials/_footer.php'); ?>