<div class="container">
    <div class="row">
        <div class="col-12">
            <h3> Liste des sports existants</h3>
            <div class="row">
                <?php if (isset($sports) && !empty($sports)) {
                    foreach ($sports as $sport) {
                        include 'templates/front/partials/component/card/sport-card.php';
                    }
                } ?>
            </div>
            <div class="my-3">
                <?= $formUser->create(); ?>
            </div>
            <a href="ajout.php" title="S'inscrire" class="btn btn-primary">
                S'inscrire
            </a>
            <p>Vous pourrez accéder à la page de recherche ou vous inscrire dans un autre sport après vous être
                identifié</p>
        </div>
    </div>
</div>


