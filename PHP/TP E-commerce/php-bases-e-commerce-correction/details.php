<?php
// Démarrage de la gestion de session, ce qui nous permet d'avoir accès tableau $_SESSION
session_start();

// On importe le fichier products.php qui défini un tableau $products contenant plusieurs produits
// Cela fait office de base de données.
require_once('./data/products.php');

// On importe les fonctions que l'on va utiliser dans la page.
require_once('./functions.php');

// alternative :
// $product = ['name' => '', 'description' => '', 'price' => 0];

// On dispose d'une variable 'id' dans l'url, celle que l'on a passé dans les cartes des produits de l'index
// -> voir le fichier 'partials/cards/product-card.php'
// On peut donc parcourir le tableau $products du fichier data/products.php afin de retrouver le produit
// correspondant à l'id de l'url
foreach($products as $product) {
    // Si l'id du produit courant correspond à l'id passé dans l'url
    if($product['id'] === $_GET['id']) {
        // alternative :
        // $product = $productDb;

        // On break, c'est-à-dire que l'on quitte la boucle foreach, $product pourra etre utilisée partout dans la page
        // et aura les informations du produit actuel, donc celui que correspond à l'id de l'url.
        break;
    }
}

// Si j'ai soumis mon formulaire d'ajout au panier
if(!empty($_POST)) {
    // Avant d'ajouter au panier, je vérifie si le panier existe dans ma session
    // si non, j'en ajoute un.
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // j'appel ma fonction pour l'ajot au panier, sa définition est consultable dans le fichier function.php
    // addToCart($product, $_POST['quantity'], $_SESSION['cart']);
    addToCartAlter($product, $_POST['quantity'], $_SESSION['cart']);
    header('Location: details.php/?id='.$_GET['id']);
}

// Définition d'une variable $page pour savoir sur quelle page on se trouve.
$page = 'details';
// Définition d'une variable pour définire le titre de la page.
$pageTitle = "Détails: ".$product['name'];
// Définition d'une variable pour l'ajout de styles css spécifiques/necessaires pour cette page en particulier
// -> Voir fichier header.php
$customCssLinks = ['<link rel="stylesheet" href="/assets/details.css">'];
?>

<?php
// Inclusion du fichier header.php qui contient du code partagé par toutes nos pages.
include('./partials/header.php');
?>
    <main class="details-main">
        <div class="page-content-header">
            <h1>
                <?= $pageTitle ?>
            </h1>
        </div>

        <div class="page-content">
            <div class="product-img"></div>
            <div class="product-details">
                <div class="description">
                    <p><?= $product['description'] ?></p>
                </div>
                <div class="bottom-details">
                    <div class="price"><?= number_format($product['price'], 2) ?><span class="currency">€</span></div>
                    <form method="post" class="add-to-cart-form">
                        <input type="number" name="quantity" placeholder="Quantité..">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php
// Inlusion du code de bas de page partagé par toutes nos pages.
include('./partials/footer.php');
?>