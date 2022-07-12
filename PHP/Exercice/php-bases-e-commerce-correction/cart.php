<?php
// démarrage de la session.
session_start();

// Si le formulaire de suppression d'un produit du panier a été soumis
if(!empty($_POST)) {
    // On vérifie s'il existe bien dans le tableaux des produits du panier
    if(isset($_SESSION['cart'][$_POST['productIdToDelete']])) {
        // S'il existe, on le retire.
        unset($_SESSION['cart'][$_POST['productIdToDelete']]);
    }

    // solution alternative si l'on n'utilise pas les ids de produit comme index.
    // foreach($_SESSION['cart'] as $productCart) {
    //     if($_POST['productIdToDelete'] === $productCart['product']['id']) {
    //         unset($productCart);
    //     }
    // }

    // On redirige sur cette même page une fois le formulaire traité
    // pour éviter de resoumettre le formulaireà chaque rafraichissement de la page.
    header('Location: /cart.php');
}

// Définition d'une variable $page pour savoir sur quelle page on se trouve.
$page = 'cart';
// Définition d'une variable pour définire le titre de la page.
$pageTitle = "Panier";
// Définition d'une variable pour l'ajout de styles css spécifiques/necessaires pour cette page en particulier
// -> Voir fichier header.php
$customCssLinks = ['<link rel="stylesheet" href="/assets/cart.css">'];

// Initialisation d'une varaible qui comptabilisera le prix total du panier.
// Pour le moment est de zero.
$totalPrice = 0
?>

<?php
// Inclusion du fichier header.php qui contient du code partagé par toutes nos pages.
include('./partials/header.php');
?>
    <main class="cart-main">
        <div class="page-content-header">
            <h1>
                <?= $pageTitle ?>
            </h1>
        </div>

        <div class="page-content">
            <div class="cart-details">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th class="price-cell">Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // On parcours les produits du panier stocké en session
                        // Voir la fonction addToCartAlter du fichier function.php pour voir a quoi ressemble une entré
                        // du tableau $_SESSION['cart']
                        foreach($_SESSION['cart'] as $cartProduct) {
                        ?>
                            <tr>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="productIdToDelete" value="<?= $cartProduct['product']['id'] ?>">
                                        <button type="submit"><i class="fa-solid fa-xmark"></i></button>
                                    </form>
                                </td>
                                <td><?= $cartProduct['product']['name'] ?></td>
                                <td><?= $cartProduct['quantity'] ?></td>
                                <td class="price-cell"><?= number_format($cartProduct['product']['price'], 2) ?>€</td>

                                <?php
                                    // comme on boucle sur chaque produit du panier, on en profite pour cumuler leur prix
                                    // Attention à bien prendre en compte leur quantité !
                                    $totalPrice += $cartProduct['product']['price'] * $cartProduct['quantity'];
                                ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="price-cell" colspan="4">Total: <?= number_format($totalPrice, 2) ?>€</td>
                        </tr>
                    </tfoot>
                </table>
                <button>Commander</button>
            </div>
        </div>
    </main>
<?php
// Inlusion du code de bas de page partagé par toutes nos pages.
include('./partials/footer.php');
?>