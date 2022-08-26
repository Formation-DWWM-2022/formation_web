<?php include 'head.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="profil-type.php?action=modify&type=type&id=<?= $type->getId() ?>">
                <?php include '../form/TypeType.php'; ?>
            </form>
            <a class="btn btn-primary my-3" href="../router.php?action=delete&type=type&id=<?= $type->getId() ?>">Supprimer type</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
