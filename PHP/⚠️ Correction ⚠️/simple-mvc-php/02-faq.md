# PHP et MVC: FAQ

  - [1. Rappels sur les models, views, controllers](#1-Rappels-sur-les-models-views-controllers)
  - [2. Comparaison MVC et classique : comment créer des pages ?](#2-Comparaison-MVC-et-classique--comment-cr%C3%A9er-des-pages)
  - [3. Ajout des pages principales: liste, ajout, affichage](#3-Ajout-des-pages-principales-liste-ajout-affichage)
  - [4. Ajouter un CSS ou un JS](#2-Ajouter-un-CSS-ou-un-JS)
  - [5. Récupérer des données en jointures](#3-R%C3%A9cup%C3%A9rer-des-donn%C3%A9es-en-jointures)
  - [6. Uploder et afficher les photos](#4-Uploder-et-afficher-les-photos)
  - [7. Page show() pour afficher un élément](#5-Page-show-pour-afficher-un-%C3%A9l%C3%A9ment)

## 1. Rappels sur les models, views, controllers

En MVC, on a 3 groupes de fichiers : le but est de séparer notre code de façon prévisible par tous les développeurs, et prévisible par le développeur lui même qui se posera bien moins de question sur où se trouvent quels fichiers !

On a :

1. Les *Models* sont les fichiers qui gèrent la base de données: c'est une classe qui content des setters, getters, et des fonctions d'enregistrement ou de lecture de la base de données.
   1. Son nommage est le suivant : `Exemple.php` et `class Example extends Db { /$ ... */ }`

2. Les *Views*, ce sont les **seuls** fichiers qui contiennent du HTML.
   1. Leur nommage est le suivant :
      1. Un dossier `examples` situé dans `public/views`
         1. Des fichiers dedans, nommés toujours de la même manière quel que soit la table :
            1. `examples/index.php`
            2. `examples/add.php`
            3. `examples/show.php`

3. Les *Controllers*, ce sont les "chefs d'orchestre" du MVC : lorsqu'un client demande une URL, le routeur pointe vers un controller. Le rôle du controller est de récupérer les données (en demandant au *Model*) et d'afficher les données (en demandant à la *View*).
   1. Son nommage est le suivant : `ExamplesController.php` et `class ExamplesController { /**/ }`


> **Model** : fichier en PascalCase, SINGULIER (Example.php)

> **Vues** : dossier kebab-case, PLURIEL (examples/)

> **Controller** : fichier en PascalCase, PLURIEL (ExamplesController.php)


## 2. Comparaison MVC et classique : comment créer des pages ?
Voici un équivalent en développement "classique" vs "MVC" :

### Développement classique : `http://localhost/project/ajout-produit.php`
```php
<?php

    // On teste si on vient du formulaire en POST
    if (!empty($_POST)) {

        // On teste les champs
        if ( strlen($_POST['title']) < 5) {
            throw new Exception ('titre trop court');
        }
        // Si oui, on enregistre en bdd les données du formulaire
        $bdd = new PDO();

        $request = "INSERT INTO products VALUES ...";
        $bdd->prepare($request);
        $bdd->execute([
            'title' => $_POST['title'],
            ...
        ]);
    }
?>

// On affiche le formulaire quand on arrive sur la page en GET
<html>
<body>
    <form action="ajout-produit.php" method="post">
        <input type="text" name="title" placeholder="nom produit">
    </form>
</body>
</html>
```

> Dans cet exemple, on a beaucoup de choses de mélangées :
> 1. Le nom du fichier correspond à l'URL : si jamais le déplace le fichier, je dois changer tous les liens de mon site
> 2. On a du PHP qui vérifie si je viens sur la page en GET ou en POST
> 3. J'ai des validations de données
> 4. Si je suis en POST, j'ai du PHP qui enregistre en base de données
> 5. J'ai du HTML ensuite

> Dans cet exemple, tout est mélangé ! C'est peut être très pratique pour des petits projets mais pour des projets plus gros (plus de 2 ou 3 tables) ce fonctionnement est impossible à maintenir car le code se répète de partout.


### Développement MVC : `http://localhost/project/produits/add`

Router :
```php
$routes->get('produits/add', 'ProduitsController@add');
$routes->post('produits/add', 'ProduitsController@save');
```

Controller : `ProduitsController.php`

```php
class ProduitsController {

    public function add() {
        view('produits.add');
    }

    public function save() {
        $produit = new Produit;
        $produit->setTitle($_POST['title']);
        $produit->save();
    }
}
```

Model : `Produit.php`

```php
class Produit {
    private $id;
    private $title;

    public function setTitle($title) {

        if (strlen($title) > 5) {
            throw new Exception('titre trop long');
        }
        $this->title = $title;
        return $this;
    }

    public function save() {
        Db::dbSave($this);
    }
}
```

View : `produits/add.php`

```php
<?php ob_start(); ?>

<form action="<?= url('produits/add') ?>" method="post">
    <input type="text" name="title" placeholder="nom produit">
</form>

<?php $content = ob_get_clean(); view('template', compact('content')); ?>
```


Dans le projet en MVC, **tout** est séparé !

1. Je déclare mes URL : j'aurai une route en GET pour voir mon formulaire et une route en POST pour traiter mon formulaire.
> Avantage par rapport au classique : je n'ai pas besoin de me souvenir des noms de fichiers, d'avoir des tas de fichiers éparpillés qui affichent quelque chose : tous les liens existants pour mon site sont répertoriés dans mes routes.

2. Je créée un contrôleur **PAR TABLE** : le rôle des contrôleurs est d'avoir des petites fonctions qui vont chapeauter chaque URL : cette url a besoin de données, cette url a besoin d'afficher ceci, cette url a besoin d'enregister ça...

> Avantage par rapport au classique : toute la logique (traitement de données, récupération de données...) est déportée dans le controller : si j'ai un souci de PHP et que je suis dans le module "Produits" (listing, ajouts, page produit...), je sais que ça sera dans `ProduitsController.php`.

3. Je créée un Model **PAR TABLE** : le rôle du Model est de me permettre de faire des enregistrements en base de données et de récupérer des données. Ils sont un peu longs à écrire mais une fois écrits une bonne fois pour toute (et ils se ressemblent tous de toute façon), je peux en une ligne enregistrer ou lire quelque chose en bdd. De plus, c'est aussi son rôle de faire les validations avant d'enregistrer les données, grâce aux setters.

> Avantage par rapport au classique : le code propre aux données reste dans des fichiers dédiés : les Models. Ainsi si j'ai une erreur de base de données ou de récupération de données, je sais que le problème vient de `Produit.php` !

1. Je créée mes vues: **UN DOSSIER PAR TABLE** : le rôle des vues est simplement d'avoir le HTML isolé dans un fichier dédié. Attention, ce n'est pas parce que ce sont des fichiers qui contiennent du HTML que ce sont des fichiers accessibles directement via un lien vers le fichier !! Ce sont juste des morceaux de fichiers, appelés par le contrôleur.

> Avantage par rapport au classique : mon HTML est isolé de tout le reste, n'importe quel développeur ne connaissant pas PHP ou le MVC peut travailler dessus après quelques instructions.


## 3. Ajout des pages principales: liste, ajout, affichage

### 1. Créer les routes

> Voici les routes principales à créer **par table** :
> - une liste (index ou list)
> - une page d'ajout (add)
> - une route pour traiter l'ajout (save)
> - une page pour afficher un élément (show)

> Une route est construite ainsi : l'url attendue, le contrôleur et la fonction appelés.
>
`routes.php`
```php

/**
 * Pour plus de lisibilité sur les routes, on peut créer des routes nommées avec des slash :

 * localhost/project/produits pour les produits
 * localhost/project/produits/add pour ajouter un produit
 * localhost/project/produits/23 pour afficher le produit 23
 */

$routes->get('produits', 'ProduitsController@list');        // Liste des éléments (on peut pointer sur la fonction index ou list, peu importe)
$routes->get('produits/add', 'ProduitsController@add');     // Formulaire
$routes->post('produits/add', 'ProduitsController@save');    // Traitement formulaire
$routes->get('produits/{id}', 'ProduitsController@show');   // Afficher un élément, trouvé par son {id}
```

### 2. Créer le controller

> Il s'agit du contrôleur et des fonctions appelés par les routes ci-dessus.

`ProduitsController.php`

```php
class ProduitsController {

    // Ça peut être index ou list, peu importe
    public function list() {
        $produits = Produit::findAll();


        /**
         * 1. On appelle le fichier `public/views/produits/list.php
         * 2. On passe à ce fichier la variable $produits

         * Donc : view('produits.list') (dossier produits, fichier list.php)
         *  et compact('produits') (on passe la variable $produits)
         */
        view('produits.list', compact('produits'));
    }

    public function add() {

        // Ici, on a juste à appeler la vue pour le moment :

        view('produits.add');

    }

    public function save() {

        // Ici, pas de vues à appeler ! Mais un produit à enregistrer.

        $produit = new Produit;
        $produit->setTitle($_POST['title']);
        $produit->save();

        // À l'issue de l'enregistrement, on redirige vers la liste des produits en appelant la fonction dédiée à l'affichage de la liste :

        ProduitsController::list();

    }

    // Cette fonction prend un id en paramètre: celui passé dans la route!
    public function show($id) {

        // Ici, on va chercher le produit puis l'envoyer à la vue qui affiche un produit.

        $produit = Produit::findOne($id);

        view('produits.show', compact('produit'));
    }
}
```

### 3. Créer le Model

> Il s'agit du Model appelé par le contrôleur ci-dessus.
Pour composer le model, inspirez vous du fichier `src/models/Example.php`.

Le Model contient :
- des Setters (insérer des données dans un objet Produit)
- des Getters (récupérer des données d'un Produit)
- des fonctions CRUD (save(), findAll(), findOne($id)...)

### 4. Créer les vues
> Il s'agit des vues appelées par le contrôleur ci-dessus.
Pour créer les vues, inspirez vous du dossier `public/views/examples`.


## 4. Ajouter un CSS ou un JS
## 5. Récupérer des données en jointures
## 6. Uploder et afficher les photos
## 7. Page show() pour afficher un élément