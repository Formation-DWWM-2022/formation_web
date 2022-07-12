<?php
$page = 'index';
$pageTitle = "Les produits";
$customCssLinks = ['<link rel="stylesheet" href="/assets/index.css">'];
?>

<?php include('./partials/header.php'); ?>
    <main class="index-main">
        <div class="page-content-header">
            <h1>
                <?= $pageTitle ?>
            </h1>
            <div class="current-pagination">
                Page 1
            </div>
        </div>

        <div class="page-content products">
            <?php for($i = 0; $i < 8; $i++) { 
                include('./partials/cards/product-card.php');
            } ?>
        </div>

        <div class="pagination">
            <a href="#" class="pagination-link active">1</a>
            <a href="#" class="pagination-link">2</a>
            <a href="#" class="pagination-link">3</a>
        </div>
    </main>
<?php include('./partials/footer.php') ?>