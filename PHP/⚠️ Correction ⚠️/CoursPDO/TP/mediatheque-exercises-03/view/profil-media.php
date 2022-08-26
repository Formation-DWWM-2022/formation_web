<?php include 'head.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="profil-media.php?action=modify&type=media&id=<?= $media->getId() ?>">
                <?php include '../form/MediaType.php'; ?>
            </form>
            <a class="btn btn-primary my-3" href="../router.php?action=delete&type=media&id=<?= $media->getId() ?>">Supprimer media</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
