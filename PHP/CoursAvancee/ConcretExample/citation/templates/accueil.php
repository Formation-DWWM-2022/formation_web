<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <?php foreach ($citations as $citation) { ?>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> <?= $citation->getCitation(); ?> </h5>
                                <p class="card-text"> <?= $citation->getAuteur(); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?= $formCitation->create() ?>
        </div>
    </div>
</div>
