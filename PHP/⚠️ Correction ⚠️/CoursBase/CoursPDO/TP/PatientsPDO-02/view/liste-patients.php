<?php include 'head.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">lastname</th>
                    <th scope="col">firstname</th>
                    <th scope="col">birthdate</th>
                    <th scope="col">phone</th>
                    <th scope="col">mail</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <form method="GET" action="liste-patients.php?action=search-patient">
                        <th scope="col">
                            OR
                            <input type="hidden" name="action" value="search-patient"/>
                        </th>
                        <th scope="col">
                            <input type="text" name="search-lastname" placeholder="lastname..."
                                   value="<?php echo (isset($_GET['search-lastname']) and $_GET['search-lastname'] != '') ? $_GET['search-lastname'] : '' ?>">
                        </th>
                        <th scope="col">
                            <input type="text" name="search-firstname" placeholder="firstname..."
                                   value="<?php echo (isset($_GET['search-firstname']) and $_GET['search-firstname'] != '') ? $_GET['search-firstname'] : '' ?>">
                        </th>
                        <th scope="col">
                            <input type="date" name="search-birthdate" placeholder="birthdate..."
                                   value="<?php echo (isset($_GET['search-birthdate']) and $_GET['search-birthdate'] != '') ? $_GET['search-birthdate'] : '' ?>">
                        </th>
                        <th scope="col">
                            <input type="text" name="search-phone" placeholder="phone..."
                                   value="<?php echo (isset($_GET['search-phone']) and $_GET['search-phone'] != '') ? $_GET['search-phone'] : '' ?>">
                        </th>
                        <th scope="col">
                            <input type="text" name="search-mail" placeholder="mail..."
                                   value="<?php echo (isset($_GET['search-mail']) and $_GET['search-mail'] != '') ? $_GET['search-mail'] : '' ?>">
                        </th>
                        <th scope="col">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </th>
                    </form>
                </tr>

                <?php
                if ($resultat != null) {
                    foreach ($resultat as $row) { ?>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= $row['lastname'] ?></td>
                            <td><?= $row['firstname'] ?></td>
                            <td><?= $row['birthdate'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['mail'] ?></td>
                            <td>
                                <a href="profil-patient.php?action=patient&id=<?= $row['id'] ?>"
                                   class="btn btn-primary">voir patient</a>
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
                        <a class="page-link" href="liste-patients.php?action=list-patients&page=<?= $currentPage - 1 ?>">Previous</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) { ?>
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a class="page-link" href="liste-patients.php?action=list-patients&page=<?= $page ?>"><?= $page ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a class="page-link" href="liste-patients.php?action=list-patients&page=<?= $currentPage + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>

            <a href="ajout-patient.php" class="my-3 btn btn-primary">ajout patient</a>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
