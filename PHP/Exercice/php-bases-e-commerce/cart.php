<?php
$page = 'cart';
$pageTitle = "Panier";
$customCssLinks = ['<link rel="stylesheet" href="/assets/cart.css">'];
?>

<?php include('./partials/header.php'); ?>
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
                        <?php for($i = 0; $i < 4; $i++) { ?>
                            <tr>
                                <td><i class="fa-solid fa-xmark"></i></td>
                                <td>Product name</td>
                                <td>5</td>
                                <td class="price-cell">99.99€</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="price-cell" colspan="4">Total: 549.99€</td>
                        </tr>
                    </tfoot>
                </table>
                <button>Commander</button>
            </div>
        </div>
    </main>
<?php include('./partials/footer.php') ?>