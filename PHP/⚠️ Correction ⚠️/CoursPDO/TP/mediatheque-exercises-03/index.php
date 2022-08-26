<?php include './view/head.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Index</h1>
            <h4>
                <?php
                if (isset($_SESSION['pseudo'])) {
                    echo $_SESSION['pseudo'];
                    ?>
                    <a href="admin.php" class="btn btn-success">Admin</a>
                    <a class="btn btn-primary" href="router.php?action=deconnexion&type=auth">Deconnexion</a>

                    <?php
                }
                ?>
            </h4>
            <div class="row">
                <form method="post" class="col-6" action="router.php?action=inscription&type=auth">
                    <div class="mb-3">
                        <h3>Inscription</h3>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="pseudo" placeholder="Pseudo">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="email" name="mail" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="email" name="mail2" placeholder="Email confirmation">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" name="mdp" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" name="mdp2" placeholder="Password confirmation">
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Inscription">
                    </div>
                </form>

                <form class="col-6" method="post" action="router.php?action=connexion&type=auth">
                    <h3>Connexion</h3>
                    <div class="mb-3">
                        <input class="form-control" type="email" name="mail" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" name="mdp" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input mx-3" type="checkbox" name="cookie">Rester connecter
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Connexion">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include './view/footer.php'; ?>

