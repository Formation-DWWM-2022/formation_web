<?php include 'head.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" class="my-3" action="router.php?action=search&type=type">
                <?php include '../form/TypeType.php' ?>
            </form>
            <table class="table my-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($types != null) {
                    foreach ($types as $type) { ?>
                        <tr>
                            <th scope="row"><?= $type->getId() ?></th>
                            <td><?= $type->getName() ?></td>
                            <td>
                                <a href="profil-type.php?action=profil&type=type&id=<?= $type->getId() ?>"
                                   class="btn btn-primary">voir type</a>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a class="page-link" href="liste-types.php?action=liste&type=type&page=<?= $currentPage - 1 ?>">Previous</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) { ?>
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a class="page-link" href="liste-types.php?action=liste&type=type&page=<?= $page ?>"><?= $page ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a class="page-link" href="liste-types.php?action=liste&type=type&page=<?= $currentPage + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>

            <a href="ajout-type.php" class="my-3 btn btn-primary">ajout type</a>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
