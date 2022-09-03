<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Coucou</h1>

            <?php foreach ($users as $user) { ?>
                <p><?= $user['name'] ?></p>
            <?php } ?>
        </div>
    </div>
</div>