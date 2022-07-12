<?php 
// Fichier contenant l'HTML de la barre de navigation.
// A inclure dans les page où l'on en a besoin.

// La variable $page est utilisé pour ajouter la classe active sur les liens vers nos diverses pages
// Normalement cette variable est définie dans les page où ce fichier est inclus.
// Mais si ce n'est pas le cas, on l'initialise à vide pour éviter les erreurs.
if(!isset($page)) {
    $page = "";
}

// On vérifie si une session existe et si elle a des produits dans son panier.
// Ce qui nous permettra d'afficher le nombre de produits dans le lien de navigation.
$cartProductCount = 0;
if(isset($_SESSION) && isset($_SESSION['cart'])) {
    // On récupère le nombre de produit dans le panier (On ne prend pas en compte les quantités des produits)
    $cartProductCount = count($_SESSION['cart']);
}
?>

<nav>
    <div class="nav-part nav-left">
        <a href="/index.php" class="<?= 'index' == $page ? 'active': '' ?>">PHP Bases</a>
    </div>
    <div class="nav-part nav-right">
        <a href="/cart.php" class="<?= 'cart' == $page ? 'active': '' ?>">Panier<?= $cartProductCount > 0 ? "($cartProductCount)" : '' ?></a>
        <?php
        // Si une session existe et qu'un utilisateur est enregistré on affiche le lien pour se déconnecter
        if(isset($_SESSION) && isset($_SESSION['user'])) {
        ?>
            <a href="/logout.php">Déconnexion</a>
        <?php } else { // Sinon un lien vers la page connexion ?>
            <a href="/login.php" class="<?= 'login' == $page ? 'active': '' ?>">Connexion</a>
        <?php } ?>
    </div>
</nav>