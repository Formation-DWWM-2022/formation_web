<?php include 'head.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table my-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">pseudo</th>
                    <th scope="col">email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($users != null) {
                    foreach ($users as $user) { ?>
                        <tr>
                            <th scope="row"><?= $user->getId() ?></th>
                            <td><?= $user->getPseudo() ?></td>
                            <td><?= $user->getEmail() ?></td>
<!--                            <td>-->
<!--                                <a href="profil-user.php?action=profil&type=user&id=--><?//= $user->getId() ?><!--"-->
<!--                                   class="btn btn-primary">voir user</a>-->
<!--                            </td>-->
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a class="page-link" href="liste-users.php?action=liste&type=user&page=<?= $currentPage - 1 ?>">Previous</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) { ?>
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a class="page-link" href="liste-users.php?action=liste&type=user&page=<?= $page ?>"><?= $page ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a class="page-link" href="liste-users.php?action=liste&type=user&page=<?= $currentPage + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
