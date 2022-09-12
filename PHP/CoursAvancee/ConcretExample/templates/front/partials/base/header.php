<?php

use App\Service\Session;

?>

<header>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL_ROOT ?>">Site de rencontre</a>
        </div>
    </nav>
    <?php Session::showMessage(); ?>
</header>
