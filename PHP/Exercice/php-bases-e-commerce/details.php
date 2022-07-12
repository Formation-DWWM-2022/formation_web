<?php
$page = 'details';
$pageTitle = "Détails: Product name";
$customCssLinks = ['<link rel="stylesheet" href="/assets/details.css">'];
?>

<?php include('./partials/header.php'); ?>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, eligendi, omnis nobis quisquam molestiae corporis molestias nemo sunt dolor ratione debitis! Maxime nulla modi repellendus. Rem impedit odit sequi non.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laboriosam eligendi voluptates? Adipisci culpa molestias quibusdam dolorem natus laboriosam accusamus facilis. Optio tempore sed praesentium ut ad ipsum earum rem!</p>
                </div>
                <div class="bottom-details">
                    <div class="price">99.99<span class="currency">€</span></div>
                    <form method="post" class="add-to-cart-form">
                        <input type="number" name="quantity" placeholder="Quantité..">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include('./partials/footer.php') ?>