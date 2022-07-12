<?php
// Démarrage de la gestion de session, ce qui nous permet d'avoir accès tableau $_SESSION
session_start();

// On importe le fichier products.php qui défini un tableau $products contenant plusieurs produits
// Cela fait office de base de données.
require_once('./data/products.php');

// Définition d'une variable $page pour savoir sur quelle page on se trouve.
$page = 'index';
// Définition d'une variable pour définire le titre de la page.
$pageTitle = "Les produits";
// Définition d'une variable pour l'ajout de styles css spécifiques/necessaires pour cette page en particulier
// -> Voir fichier header.php
$customCssLinks = ['<link rel="stylesheet" href="/assets/index.css">'];

/*
    Mise en place de la pagination :
*/
// Définition d'une variable qui correspond au numéro de la page actuelle.
// On récupère la valeur depuis la variable "pagination" de l'url, si elle n'existe pas, on défini la page à "0"
// Pourquoi zero ? Qaudn l'on va parcourir notre tableau de produit, sur la première page on souhaite
// commencer du produit se trouvant à l'index 0 jusqu'à l'index 7 si le nombre de produit par page est de 8, puis à la seconde page
// on souhaite commencer à l'index 8, pour avoir les 8 prochains éléments à afficher dans la page etc...
// Si on laisse $pagination à 1, on commencera directement en page deux car 1 * 8 = 8 (Facile !)
// -> Voir le calcul au niveau de la boucle for plus bas
$pagination = isset($_GET['pagination']) ? $_GET['pagination'] - 1 : 0;
// Pour vous simplifier la lecture, je stock le numéro de page (sans diminution) dans une variable.
// Ce qui me permmettra de l'utiliser si besoin.
$realPageNumber = isset($_GET['pagination']) ? $_GET['pagination'] : 1;;

// Définition d'une variable qui correspond au nombre de produit que l'on souhaite afficher par page.
// On récupère la valeur depuis la variable "productsPerPages" de l'url, si elle n'existe pas, on défini le nombre à "8"
$productsPerPages = isset($_GET['productsPerPages']) ? $_GET['productsPerPages'] : 8;

// Définition d'une variable pour savoir combien l'on a de pages si l'on découpe
// la liste de produits par le nombre d'items par page, on arrondi toujours à la valeur supérieur.
// car si le résultat est 1.25, il nous faut une deuxième page, elle ne sera juste pas complète.
$totalNbPages = ceil(count($products) / $productsPerPages);
?>


<?php
// Inclusion du fichier header.php qui contient du code partagé par toutes nos pages.
include('./partials/header.php');
?>
    <main class="index-main">
        <div class="page-content-header">
            <h1>
                <?= $pageTitle ?>
            </h1>
            <div class="current-pagination">
                <?php
                // Comme on a diminuer le numéro de la page plus haut pour faciliter la lecture des calculs
                // plus bas, il faut ajouter 1 à la page actuel, sinon en page 1 on verra "Page 0" de noté
                ?>
                Page <?= $realPageNumber ?>
            </div>
        </div>

        <div class="page-content products">
            <?php
            // On parcours le tableau de produits pour les afficher
            // Rappel: le tableau $products est défini dans le fichier data/products.php importé plus haut.
            // Comme on utilise de la pagination, la variable $i doit être décalé en fonction de la page et du nombre de page
            // Par exemple: On a 8 items par page, on est en page 3, on souhaite donc afficher les produits
            // se trouvant de l'index 16 à 23 du tableau (car 2 * 8 = 16, n'oubliez pas, on a diminuer la pagination plus haut, donc page 3 -> $pagination = 2)
            $startIndex = $pagination * $productsPerPages;
            $endIndex = $startIndex + $productsPerPages;
            for($i = $startIndex; $i < $endIndex; $i++) {
                // On vérifie si un produit existe à l'index actuel.
                if (isset($products[$i])) {
                    // Pour faciliter la lecture et utiliser une variable $product dans notre fichier partials/cards/product-card.php
                    // on met le produit se trouvant à l'index courant de la boucle dans une variable.
                    $product = $products[$i];
                    // à chaque tour de boucle, on inclusion le code du fichier /partials/cards/product-card.php
                    // qui représente une carte des informations principales d'un produit.
                    include('./partials/cards/product-card.php');
                }
            } ?>
        </div>

        <div class="pagination">
            <?php
            // On boucle autant de fois que l'on a de page pour afficher un lien qui nous menera vers chaque page
            for($i = 1; $i <= $totalNbPages; $i++) {
                $activeClass = $i == $realPageNumber ? 'active' : '';    
            ?>
                <a href="/index.php?pagination=<?= $i ?>" class="pagination-link <?= $activeClass ?>"><?= $i ?></a>
            <?php } ?>
        </div>
    </main>
<?php
// Inlusion du code de bas de page partagé par toutes nos pages.
include('./partials/footer.php');
?>