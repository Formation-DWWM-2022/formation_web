<div class="container">
    <div class="row">
        <div class="col-12">
            <h3> Liste des sports existants</h3>
            <div class="row">
                <?php foreach ($sports as $sport) { ?>
                    <div class="col-3">
                        <li><?php echo $sport->design; ?></li>
                    </div>
                <?php } ?>
            </div>
            <?= $formUser->create(); ?>
            <a href="ajout.php" title="S'inscrire" class="btn btn-primary">
                S'inscrire
            </a>
            <p>Vous pourrez accéder à la page de recherche ou vous inscrire dans un autre sport après vous être
                identifié</p>
        </div>
    </div>
</div>


