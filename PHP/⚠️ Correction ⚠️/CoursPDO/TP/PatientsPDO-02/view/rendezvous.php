<?php include 'head.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="../loader.php?action=modify-rdv&id=<?= $resultat['id'] ?>">
                <div class="mb-3">
                    <label for="dateHour" class="form-label">dateHour</label>
                    <input type="datetime-local" class="form-control" id="dateHour" name="dateHour" required value="<?= $resultat['dateHour'] ?>">
                </div>
                <div class="mb-3">
                    <select class="form-select" name="idPatients" required>
                        <?php
                        foreach ($patients as $row): ?>
                            <option <?php echo $resultat['idPatients'] == $row['id'] ? 'selected' : ''; ?> value="<?= $row['id'] ?>"><?= $row['lastname'] ?> <?= $row['firstname'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a class="btn btn-primary" href="../loader.php?action=delete-rdv&id=<?= $resultat['id']?>">Supprimer rdv</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
