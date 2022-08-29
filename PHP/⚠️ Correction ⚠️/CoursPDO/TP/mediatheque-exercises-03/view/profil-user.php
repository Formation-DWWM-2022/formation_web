<?php include 'head.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="profil-user.php?action=modify&type=user&id=<?= $user->getId() ?>">
                <?php include '../form/UserType.php'; ?>
            </form>
            <a class="btn btn-primary my-3" href="../router.php?action=delete&type=user&id=<?= $user->getId() ?>">Supprimer user</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
