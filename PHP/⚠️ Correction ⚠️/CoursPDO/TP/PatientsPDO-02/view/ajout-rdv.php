<?php include 'head.php' ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="../loader.php?action=add-rdv-insert">
                <div class="mb-3">
                    <label for="dateHour" class="form-label">dateHour</label>
                    <input type="datetime-local" class="form-control" id="dateHour" name="dateHour" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="idPatients" required>
                        <?php
                        foreach ($resultat as $row): ?>
                            <option value="<?= $row['id'] ?>"><?= $row['lastname'] ?> <?= $row['firstname'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
