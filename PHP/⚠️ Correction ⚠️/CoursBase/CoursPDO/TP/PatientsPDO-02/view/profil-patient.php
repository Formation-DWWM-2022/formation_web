<?php include 'head.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">

            <form method="POST" action="../loader.php?action=modify-patient&id=<?= $resultat['id'] ?>">
                <div class="mb-3">
                    <label for="lastname" class="form-label">lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required
                           value="<?= $resultat['lastname'] ?>">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required
                           value="<?= $resultat['firstname'] ?>">
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required
                           value="<?= $resultat['birthdate'] ?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?= $resultat['phone'] ?>">
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">mail</label>
                    <input type="email" class="form-control" id="mail" name="mail" value="<?= $resultat['mail'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a class="btn btn-primary" href="../loader.php?action=delete-patient&id=<?= $resultat['id']?>">Supprimer patient</a>


            <h3 class="mt-3">Liste des rendez vous :</h3>

            <div class="row">
                <?php foreach ($rdvs as $rdv) { ?>
                    <div class="col-3 my-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $rdv['dateHour'] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
