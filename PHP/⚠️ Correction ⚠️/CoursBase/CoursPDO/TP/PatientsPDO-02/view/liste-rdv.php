<?php include 'head.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">dateHour</th>
                    <th scope="col">idPatients</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if ($resultat != null) {
                    foreach ($resultat as $row) { ?>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= $row['dateHour'] ?></td>
                            <td><?= $row['idPatients'] ?></td>
                            <td>
                                <a href="rendezvous.php?action=rendezvous&id=<?= $row['id'] ?>" class="btn btn-primary">voir rdv</a>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>
            <a href="ajout-rdv.php?action=add-rdv-view" class="btn btn-primary">ajout rdv</a>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
