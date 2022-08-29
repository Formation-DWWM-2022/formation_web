<?php include 'head.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" class="my-3" action="router.php?action=search&type=media">
                <?php include '../form/MediaType.php' ?>
            </form>
            <table class="table my-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">creator</th>
                    <th scope="col">type_id</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($medias != null) {
                    foreach ($medias as $media) { ?>
                        <tr>
                            <th scope="row"><?= $media->getId() ?></th>
                            <td><?= $media->getTitle() ?></td>
                            <td><?= $media->getCreator() ?></td>
                            <td><?= $media->getTypeId()->getName() ?></td>
                            <td>
                                <a href="profil-media.php?action=profil&type=media&id=<?= $media->getId() ?>"
                                   class="btn btn-primary">voir media</a>
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
                        <a class="page-link" href="liste-medias.php?action=liste&type=media&page=<?= $currentPage - 1 ?>">Previous</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) { ?>
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a class="page-link" href="liste-medias.php?action=liste&type=media&page=<?= $page ?>"><?= $page ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a class="page-link" href="liste-medias.php?action=liste&type=media&page=<?= $currentPage + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>

            <a href="ajout-media.php?action=ajout&type=media" class="my-3 btn btn-primary">ajout media</a>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
