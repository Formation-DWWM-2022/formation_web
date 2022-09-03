<?php
$page = 'login';
$pageTitle = "Connexion";
$customCssLinks = ['<link rel="stylesheet" href="/assets/login.css">'];
?>

<?php include('./partials/header.php'); ?>
    <main class="login-main">
        <form method="post" class="login-form">
            <h1 class="page-title"><?= $pageTitle ?></h1>
            <div class="input-field">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="email@exemple.com...">
            </div>
            <div class="input-field">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe...">
            </div>

            <input type="submit" value="Se connecter">
        </form>
    </main>
<?php include('./partials/footer.php') ?>