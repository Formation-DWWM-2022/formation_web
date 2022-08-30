# Mettre en place une pagination en PHP

Il arrive souvent de devoir afficher notre contenu en le découpant sur plusieurs pages.

Dans ce cas, nous devons gérer la pagination au moyen de nos requêtes SQL.

# La base

Partons d'une page affichant une liste d'articles issus de notre base de données, triés du plus récent au plus ancien.

Cette page exécute la requête suivante
```sql
SELECT * FROM `articles` ORDER BY `created_at` DESC;
```

Pour exécuter cette requête nous aurons le code PHP suivant

```php
<?php
// On se connecte à là base de données
require_once('connect.php');

$sql = 'SELECT * FROM `articles` ORDER BY `created_at` DESC;';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>
```

Nous affichons ensuite un tableau avec tous les articles comme ci-dessous (l'exemple utilise Bootstrap)

```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des articles</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur tous les articles
                        foreach($articles as $article){
                        ?>
                            <tr>
                                <td><?= $article['id'] ?></td>
                                <td><?= $article['titre'] ?></td>
                                <td><?= $article['created_at'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>
```

# Mettre en place la pagination

Pour pouvoir paginer, il nous faut connaître plusieurs informations :
- Le numéro de la page sur laquelle on se trouve
- Le nombre d'articles au total
- Le nombre d'articles souhaités par page
- Le nombre de pages au total

# Numéroter les pages

Nous ferons passer le numéro de la page dans l'URL, afin de pouvoir récupérer l'information en PHP. Si aucun numéro de page n'est fourni, nous considérerons que nous sommes en page 1.

L'url ressemblera, par exemple, à

```
https://monsite.fr/index.php?page=2
```

Nous aurons donc à récupérer la valeur du paramètre "page"

Le code PHP sera le suivant

```php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
```

# Connaître le nombre d'articles

Pour connaître le nombre d'articles dans notre base de données, nous utiliserons le "COUNT" en SQL au moyen de la requête ci-dessous

```sql
SELECT COUNT(*) AS nb_articles FROM `articles`;
```

Pour exécuter cette requête nous utiliserons le code PHP suivant

```php
// On détermine le nombre total d'articles
$sql = 'SELECT COUNT(*) AS nb_articles FROM `articles`;';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbArticles = (int) $result['nb_articles'];
```

# Calcul du nombre de pages
Une fois le nombre total d'articles connu, nous pourrons calculer le nombre de pages nécessaires.

Nous diviserons le nombre total d'articles par le nombre l'articles par page et nous arrondirons à l'entier supérieur.

```php
// On détermine le nombre d'articles par page
$parPage = 10;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);
```

# Mise en place de la pagination

Maintenant que nous connaissons toutes les informations, nous allons pouvoir définir quels articles nous devons afficher en fonction de la page chargée.

Nous allons modifier la requête en utilisant l'instruction "LIMIT" de SQL comme ceci (par exemple pour la 1ère page)

```sql
SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT 0, 10;
```

Il nous faut donc définir le numéro du 1er article (0 dans l'exemple) en plus du nombre d'articles par page (10 dans l'exemple) que nous avons déjà.

Nous ferons donc le calcul suivant

```php
// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;
```

Nous exécuterons ensuite la requête comme ceci

```php
$sql = 'SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $db->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
```

Enfin, nous mettrons en place le code HTML pour afficher la pagination (ici avec bootstrap)

```php
<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
```

# Fichier complet

Voici le fichier complet correspondant à la mise en place de la pagination

```php
<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
// On se connecte à là base de données
require_once('connect.php');

// On détermine le nombre total d'articles
$sql = 'SELECT COUNT(*) AS nb_articles FROM `articles`;';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbArticles = (int) $result['nb_articles'];

// On détermine le nombre d'articles par page
$parPage = 10;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `articles` ORDER BY `created_at` DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $db->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des articles</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($articles as $article){
                        ?>
                            <tr>
                                <td><?= $article['id'] ?></td>
                                <td><?= $article['titre'] ?></td>
                                <td><?= $article['created_at'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </main>
</body>
</html>
```