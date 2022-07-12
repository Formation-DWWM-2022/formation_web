<?php 
if(!isset($page)) {
    $page = "";
}
?>

<nav>
    <div class="nav-part nav-left">
        <a href="index.php" class="<?= 'index' == $page ? 'active': '' ?>">PHP Bases</a>
    </div>
    <div class="nav-part nav-right">
        <a href="cart.php" class="<?= 'cart' == $page ? 'active': '' ?>">Panier(2)</a>
        <a href="login.php" class="<?= 'login' == $page ? 'active': '' ?>">Connexion</a>
    </div>
</nav>