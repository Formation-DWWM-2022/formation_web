<div class="container">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="<?= URL_ROOT.'admin/user/'?>">User</a>

            <?= $formUser->create(); ?>

            <?php include 'delete-form.php'; ?>
        </div>
    </div>
</div>
