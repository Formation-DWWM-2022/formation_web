<?php include './view/head.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="my-3">Admin</h1>

            <a class="btn btn-primary" href="router.php?action=deconnexion">Deconnexion</a>

            <h4>
                <?php
                if (isset($_SESSION['pseudo']) and isset($_SESSION['email']) OR isset($_COOKIE['pseudo']) and isset($_COOKIE['email'])) {
                    echo $_SESSION['pseudo'];
                } else {
                    addMessage('danger', 'Vous devez etre connecter !');
                    header("location: index.php");
                }
                ?>
            </h4>

            <h1>Accueil de la médiathèque</h1>

            <h2>Ajouts</h2>
            <ul>
                <li><a href="./view/ajout-media.php?action=ajout&type=media">Ajoutez un média</a></li>
                <li><a href="./view/ajout-type.php?action=ajout&type=type">Ajoutez un type de média</a></li>
            </ul>

            <h2>Listes</h2>
            <ul>
                <li><a href="./view/liste-medias.php?action=liste&type=media">Liste des médias</a></li>
                <li><a href="./view/liste-types.php?action=liste&type=type">Liste des types de média</a></li>
                <li><a href="./view/liste-users.php?action=liste&type=user">Liste des utilisateurs</a></li>
            </ul>
        </div>
    </div>
</div>
<?php include './view/footer.php'; ?>

