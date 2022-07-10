```php
<?php
/**
 * Printing
 */
echo "";

echo "<pre>";
  print_r($arr);
echo "</pre>";

var_dump($arr);

/**
 * Loops
 */

// Foreach
foreach ($arr as $key => $value) {
    echo "L'élément " . $key . " du tableau a la valeur " . $value;
}

// For
for ($i = 0; $i < 100; $i++) {
    echo "Répétition n°" . $i;
}

// While
$i = 0;
while ($i < 100) {
    echo "Répétition n°" . $i;
    $i++;
}

// Switch
switch ($value) {
    case 1:
        // Do something
        break;
    case 2:
        // Do something
        break;
    case 3:
        // Do something
        break;
    default:
        // Cas par défaut
}

// If/elseif/else

if ($value === 1) {
    // Cas si $value égal à 1
}
else if ($value === 2 || ($value > 3 && $value < 10) ) {
    // Cas si $value égal à 2 OU ( $value supérieur à 3 ET inférieur à 10 )
}
else {
    // PAS de condition pour le else ! En effet else c'est "tous les autres cas"
}

/**
 * Arrays
 */

$arrayVide = [];

$array = [
    'val1',
    'val2',
    'val3'
];

// Accès aux données :
$value = $array[2];

$arrayAssociatif = [
    "key1" => "val1",
    "key2" => "val2"
];

// Accès aux données :
$value = $arrayAssociatif["key1"];

$arrayMultidimentionnel = [
    "key1" => [
        "sousKey1" => "val1",
        "sousKey2" => "val2",
        "sousKey3" => "val3",
    ],
    "key2" => [
        "sousKey1" => "val1",
        "sousKey2" => "val2",
        "sousKey3" => "val3",
    ]
];

// Accès aux données
$value = $arrayMultidimentionnel["key1"]["sousKey1"];

/**
 * Functions
 */

// Arguement3 est facultatif, en effet il a une valeur par défaut (42)
function nomDeMaFonction($argument1, $argument2, $argument3 = 42)
{

    // Traitements dans la fonction
    $result = [];

    // Ajouter la somme de $argument1 + $argument2 dans un tableau $result, autant de fois que $argument3.
    for ($i = 0; $i < $argument3; $i++) {
        $result[] = $argument1 + $argument2;
    }

    return $result;
}

// Utilisation :
$patates = 12;
$carottes = 10;
$paniers = 32;

nomDeMaFonction($patates, $carottes, $paniers);

/*
 * Variables GET
 */

// URL : localhost/test.php?key1=val1&key2=val2

// Cette URL nous donne deux variables : "key1" et "key2"

// Dans test.php, on y accède ainsi :
$valeurKey1 = $_GET['key1'];

// On teste leur existence ainsi :

if ( isset($_GET['key1']) && isset($_GET['key2']) ) {
    $valeurKey1 = $_GET['key1'];
}

/*
 * Variables POST
 */

// Dans une page formulaire.php, on créée un formulaire avec plusieurs inputs, ayant les "name" suivants : key1, key2.
// L'action du formulaire pointe vers traitement.php

// Quand l'utilisateur clique sur "Envoyer", on accède aux données dans traitement.php ainsi :
$valeurKey1 = $_POST['key1'];

// On teste leur existence ainsi :
if (isset($_POST['key1']) && isset($_POST['key2'])) {
    $valeurKey1 = $_POST['key1'];
}

/**
 * Includes et Requires
 */

// Erreur fatale si le fichier est introuvable (un bout de code de base de données par exemple - très critique)
require 'file.php';

// Warning si le fichier est introuvable (un bout de template par exemple - moins critique)
include 'file.php';

// Erreur fatale si le fichier est introuvable. Ne réinclut pas le fichier s'il a déjà été inclus
require_once 'file.php';

// Warning si le fichier est introuvable. Ne réinclut pas le fichier s'il a déjà été inclus
include_once 'file.php';

// Usage recommandé :
// require_once()   : Dépendances critiques (classes, functions, constants).
// require()        : Fichiers de templates (morceaux de pages, le template d'un produit sur une page produits...)
// include_once()   : Chargement de dépendances optionnelles (classes, functions, constants).
// include()        : Fichiers de templates optionnels

/**
 * Base de données
 */

// 1. Connexion à la base de données

$dbHost = "localhost";
$dbPort = 3306;
$dbName = "blog";
$dbUser = "root";
$dbPswd = "";

$bdd = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8;port=' . $dbPort, $dbUser, $dbPswd);

// 2. Exécution d'une requête
$request = 'SELECT * FROM articles WHERE content LIKE = "%Star Wars%"';
$response = $bdd->query($request);

// 3. Récupération des résultats de la requête
$articles = $response->fetchAll(PDO::FETCH_ASSOC);

// 4. Utilisation de $articles comme d'un array classique, par exemple dans un template HTML :
foreach ($articles as $article) { ?>

    <tr>
        <td>
            <?= $article['title'] ?> écrit par <?= $article['author'] ?>
        </td>
        <td>
            Catégorie de l'article : <?= $article['category'] ?> (rédigé le <?= $article['created_at'] ?>)
        </td>
        <td>
            <?= $article['content'] ?>
        </td>
    </tr>

<?php } ?>
