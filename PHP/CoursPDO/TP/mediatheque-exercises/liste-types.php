<?php require_once 'pdo.php' ?>



<?php
// Récupérer les données avec PDO
$request = 'SELECT * FROM type';
$response = $bdd->query($request);
$types = $response->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- // Inclusion du header -->
<?php include ('partials/_header.php'); ?>
<a href="index.php" class="btn btn-sm btn-secondary">< retour à l'index</a>
<a href="ajout-type.php" class="btn btn-sm btn-primary float-right">Nouveau type</a>
<h1>Liste des types</h1>

<!-- // Foreach du tableau -->

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom du type</th>
        </tr>
    </thead>
<?php foreach($types as $type) : ?>
    <tr>
        <td><?= $type['id'] ?></td>
        <td><?= $type['name'] ?></td>
    </tr>
<?php endforeach; ?>
</table>
<!-- // Inclusion du footer -->
<?php include('partials/_footer.php'); ?>