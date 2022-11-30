# Créer un Custom Post Type dans un thème

On va maintenant voir comment déclarer de nouveaux types de publication dans notre thème WordPress afin de ne pas être limités aux articles et pages. Et c’est dans le fichier functions.php que ça se passe !

## Déclarer un Custom Post Type

On va maintenant déclarer un Custom Post Type qui ne sera ni une page, ni un article. Et pour ce faire on va aller ajouter une déclaration dans le fichier functions.php de notre thème.

On va imaginer que nous voulons présenter les travaux d’un designer. Les articles du blog sont déjà pris pour publier des tutoriels. On va donc créer un type de publication Portfolio.

## D’abord, le Hook

Mais avant cela, il va falloir placer le code dans un Hook WordPress. Le hook init fera l’affaire :

```php
<?php 

function alex_register_post_types() {
 // La déclaration de nos Custom Post Types et Taxonomies ira ici
}
add_action( 'init', 'alex_register_post_types' );
```

## CPT, version simple

La déclaration d’un type de publication s’effectue via la fonction register_post_type(). Elle possède de nombreux paramètres. Afin de nous simplifier la tâche, on va simplement définir le strict minimum pour l’instant :

```php
<?php 

function alex_register_post_types() {
 
    // CPT Portfolio
    $labels = array(
        'name' => 'Portfolio',
        'all_items' => 'Tous les projets',  // affiché dans le sous menu
        'singular_name' => 'Projet',
        'add_new_item' => 'Ajouter un projet',
        'edit_item' => 'Modifier le projet',
        'menu_name' => 'Portfolio'
    );

 $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-admin-customizer',
 );

 register_post_type( 'portfolio', $args );
}
add_action( 'init', 'alex_register_post_types' ); // Le hook init lance la fonction
```

On va d’abord vérifier que ça fonctionne : rendez-vous dans votre interface d’administration WordPress, et normalement vous devriez voir apparaître votre type de publication dans le menu de gauche :

![](https://capitainewp.io/wp-content/uploads/2019/01/wp-menu-post-type-1600x592.jpg.webp)

On va maintenant passer en revue les différents paramètres utilisés :

## Les libellés

Dans le tableau $labels vous allez pouvoir définir les phrases qui apparaissent dans l’administration de WordPress. Si vous ne mettez rien, le CMS utilisera les intitulés par défaut comme « Ajouter une publication, modifier la publication, supprimer la publication… ».

On va donc renseigner un minimum de choses pour donner du contexte. On doit entre autres définir les version du pluriel et du singulier de notre CPT. Si j’avais fait un CPT Recettes, le singulier aurait été recette.

Mais dans notre cas c’est un Portfolio, et un Portfolio contient des projets. Le nom du menu sera bien « Portfolio » mais mes intitulés seront plutôt « ajouter un projet, modifier le projet…

## Public ou non

Lorsque vous créez un Custom Post Type, vous pouvez dire s’il est public ou non. Dans le cas d’un thème, il le sera forcément : on veut qu’il puisse être affiché sur le site. C’est dans le cadre de la création d’extensions que l’on peut vouloir un CPT caché (un peu comme les révisions dans WordPress) : on ne le voit pas dans l’interface car il sert seulement à stocker des informations. On met donc public à true.

## Comportement : comme des pages ou des articles ?

Ce réglage est important. C’est là où vous dites si vous voulez que le CPT se comporte comme des articles, c’est à dire avec une archive et des singles, ou comme des pages (hiérarchique). Mais comme je le disais dans le cours précédent, c’est très rare qu’on l’utilise (si on veut faire une documentation par exemple). J’ai donc passé has_archive à true.

## Les fonctionnalités supportées

Vous allez pouvoir choisir les champs affichés dans l’interface d’administration de vos publications :

- title : le champ Titre (il vaut mieux le laisser) ;
- editor : l’éditeur visuel (classique ou Gutenberg) ;
- author : le champ pour choisir/changer l’auteur ;
- thumbnail : l’image mise en avant ;
- excerpt : le champ extrait ;
- comments : la prise en charge des commentaires ;
- revisions : la sauvegarde automatique de révisions (je conseille de le mettre) ;
- custom-fields : la prise en charge des champs additionnels (on verra mieux avec ACF) ;
- page-attributes : utile si vous voulez donner la possibilité de choisir un template personnalisé ;
- post-formats : les Posts Formats à la tumblr.

Comme vous le voyez vous n’êtes pas obligés de tout activer, afin d’alléger au maximum l’interface. Il m’est déjà arrivé de créer des CPT sans l’éditeur visuel (car j’y ajoutais mes propres champs). On verra ça un peu plus tard.

Concernant l’éditeur, par défaut il vous affichera l’éditeur classique Tiny MCE et pas Gutenberg.

> Pour créer un Custom Post Type avec l’éditeur visuel Gutenberg, il faut ajouter le paramètre show_in_rest à true dans sa déclaration.

Pourtant show_in_rest permet à la base d’afficher le type de publication dans l’API Rest. Mais en réalité Gutenberg a besoin de cette prise en charge de l’API pour fonctionner.

## La position dans le menu WordPress

Vous pouvez également choisir l’endroit où apparaitra votre CPT dans le menu WordPress :

- 5 : Le CPT apparait juste après Articles ;
- 10 : Sous Médias ;
- 20 : Sous Pages ;
- 65 : Sous Extensions ;
- 70 : Sous Utilisateurs ;
- 80 : Sous Réglages ;
- 100 : Tout en bas.

En général on laisse à 5 lorsque c’est un type de publication standard visant à afficher du contenu.

## L’icône du CPT

Afin de distinguer visuellement notre CPT, on peut lui assigner une icône et pour cela, il y a 3 façons de procéder :

- Soit choisir une Dashicons, la police de pictogrammes de WordPress ;
- Appeler un PNG dans votre thème ;
- Embarquer un SVG encodé en base64.

Voici les 3 exemples :

```php
<?php
// Choisissez l'une des trois solutions

$args = array(
 'menu_icon' => 'dashicons-portfolio',
 'menu_icon' => get_template_directory_uri() . '/img/cpt-icon.png',
 'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode( "<svg>…</svg>" ), 
);
```

Pour les Dashicons, il suffit de reporter le nom du pictogramme voulu, par exemple dashicons-portfolio:

![](https://capitainewp.io/wp-content/uploads/2019/02/dashicons-1600x1359.jpg.webp)

Pour aller chercher un PNG dans votre thème, utilisez la fonction get_template_directory_uri(), et enfin vous pouvez embarquer un SVG en le passant dans la fonction base64_encode() qui permet de transformer le code de l’image qui sera interprété directement en CSS (eh oui, CSS a pleins de possibilités souvent méconnues).

## Le nom du Custom Post Type

Et pour terminer, il ne nous reste plus qu’à déclarer ce CPT. On a $labels qui est passé dans $args, que l’on va passer à son tour dans la fonction :

```php
<?php register_post_type( 'porfolio', $args );
```

Le premier paramètre, c’est le nom unique, le slug donc, de votre type de publication.

C’est également cette valeur qui va servir pour générer l’URL de l’archive qui sera donc du type : https://wp.local/portfolio.

> Si vous changez le slug de votre CPT en cours de route, les publications ne seront plus accessibles (car elles répondent toujours à l’ancien nom).

Donc je vous déconseille de changer son nom. À la place on va pouvoir changer plutôt son URL grâce à rewrite, que l’on va voir un peu plus tard.

## CPT, version complète

Si on veut absolument utiliser tous les paramètres, il va y a voir pas mal de lignes. Je ne les mets pas toutes là, mais à la place je vous renvoie sur la documentation officielle : https://developer.wordpress.org/reference/functions/register_post_type/

Dans les exemples en bas de page vous pouvez constater qu’il y a plus de 30 libellés différents pour chaque Custom Post Type, et presque autant de paramètres possibles.

Bien sûr, on a rarement besoin de tout cela, c’est pour ça que la version simple suffit amplement à déclarer votre type de publication personnalisé.

## Afficher votre Custom Post Type

On va maintenant voir comment rend notre nouveau CPT sur le site. En premier lieu, on va déjà créer des articles dans notre Portfolio. D’ailleurs, ce sont des « projets » et non pas des « articles ».

Et puis on affiche notre CPT en tapant l’URL du site suivi du nom de notre CPT, dans mon cas ça donne : http://wp.local/portfolio/.

## Rafraîchir la structure des Permaliens

Laissez-moi deviner. Vous êtes tombés sur une erreur 404 c’est bien ça ? C’est dû au fait que l’on utilise la réécriture des URL (afin qu’elles soient sexy) et que l’on n’a pas demandé à WordPress de prendre en compte le nouveau CPT et sa nouvelle URL.

Afin de corriger ce problème il va falloir réenregistrer la structure des permaliens.

Pour cela allez dans Réglages > Permaliens, et cliquez simplement sur Enregistrer sans rien changer à vos réglages actuels.

![](https://capitainewp.io/wp-content/uploads/2019/02/structure-permaliens-1600x1120.jpg.webp)

C’est traitre car on a vite tendance à l’oublier, donc permettez-moi d’insister :

> N’oubliez pas d’aller systématiquement enregistrer la structure des Permaliens dans WordPress lorsque vous avez déclaré un nouveau Custom Post Type ou une taxonomie, afin d’éviter des erreurs 404.

## Afficher votre Custom Post Type

Maintenant, ça devrait marcher ! On retourne sur : http://wp.local/portfolio/ et vos projets devraient apparaître :

![](https://capitainewp.io/wp-content/uploads/2019/02/cpt-archive-1600x1102.jpg.webp)

Le problème, c’est que pour le moment on a exactement le même rendu que nos articles et même le titre « Le blog », puisque le CPT utilise par défaut archive.php.

Heureusement, on va voir dans les prochains cours comment créer son propre template archive-portfolio.php à partir du Template Hierarchy !

## Ajouter votre CPT dans un menu WordPress

Je pense qu’à ce niveau vous avez peut-être envie d’ajouter un lien vers votre CPT dans un de vos menus WP non ?

Allez dans Apparence > Menus et vous verrez un nouveau niveau Portfolio dans l’accordéon de gauche.

![](https://capitainewp.io/wp-content/uploads/2019/02/ajouter-cpt-menu.jpg.webp)

1. Cliquez sur l’onglet Afficher tout ;
2. Vous devriez maintenant voir Tous les Projets, sélectionnez-le et cliquez sur Ajouter au menu ;
3. Dans votre menu, positionnez l’entrée où vous le souhaitez puis changez l’intitulé pour Portfolio.

Et voilà ! La rubrique est maintenant accessible à vos visiteurs !

> Auparavant, on n’avait pas cette possibilité. Il fallait donc ajouter l’URL du CPT à la main grâce à un lien personnalisé.

## Custom Post Type et base de données

Pour terminer, on va aller voir dans la base de données comment sont gérés les Custom Post Types.

Rappel : vous pouvez accéder à votre base depuis Local By Flywheel depuis votre site, onglet Database, puis Adminer (sur Windows/Mac) ou Sequel Pro (uniquement Mac).

![](https://capitainewp.io/wp-content/uploads/2019/02/database-custom-post-type-1600x844.jpg.webp)

Comme on peut le voir, les publications de votre CPT sont bien enregistrées dans la table wp_posts et portent le slug de celui-ci dans la colonne post_type.

## Que se passe-t-il si je supprime la déclaration du CPT dans mon thème ?

Alors du coup, si vous retirez cette déclaration, les publications de votre CPT existeront toujours dans la base, mais seront ignorées. Si vous remettez votre déclaration plus tard, vous aurez accès à nouveau à vos publications. Elles ne seront donc pas supprimées.

Pareil si vous changez de thème : le functions.php étant différent, votre déclaration sera perdue, mais pas les publications.

Avec les types de publication personnalisés, ou custom post types, vous ajoutez encore des possibilités à votre thème ! Dans le prochain cours, on va voir comment créer un template sur mesure pour nos CPT et taxonomies.