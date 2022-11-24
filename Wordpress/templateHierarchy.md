# Le Template Hierarchy

Le Template Hierarchy permet à WordPress de définir quel modèle de page afficher (template) en fonction de la page demandée. C’est l’un des concepts les plus importants à connaitre lorsque vous créez des thèmes sur-mesure.

Ces deux prochains cours sont les plus importants pour bien comprendre la création de thèmes avec WordPress car ils abordent les concepts clés permettant à vos pages d’être dynamiques.

On va commencer avec le Template Hierarchy, mais avant ça, étudions un site « type ».

## Typologie des pages d’un site

J’ai pris l’exemple du site [Flywheel](https://getflywheel.com/) (hébergeur spécialisé WordPress, qui propose aussi le logiciel Local By Flywheel que l’on a étudié plus tôt dans cette formation).

Dans ce site, comme dans tout site, il y a des pages, comme la page d’accueil et d’autres pages qui vont présenter le produit, ses fonctionnalités et ses tarifs.

![](https://capitainewp.io/wp-content/uploads/2019/02/page-1600x1549.jpg.webp)

Dans WordPress, c’est ce que l’on appelle (tout simplement) des pages.

Mais il y a aussi une partie actualité, le blog, et celui-ci propose une page qui liste les derniers articles :

![](https://capitainewp.io/wp-content/uploads/2019/02/archive-1600x1600.jpg.webp)

Dans WordPress, on appelle cette page une archive. Et c’est la même chose lorsque l’on clique sur une catégorie, une étiquette en particulier : cette fois la page n’affiche pas les 10 derniers articles en date, mais les 10 derniers articles de la catégorie ou étiquette sélectionnée.

Et lorsque l’on clique sur un article, on tombe sur une page qui l’affiche entièrement :

![](https://capitainewp.io/wp-content/uploads/2019/02/single-1600x1605.jpg.webp)

C’est ce que WordPress appelle un single.

Donc, si je résume :

- Les pages standard sont des pages ;
- La liste des articles d’un blog sont des archives ;
- Lorsque l’on clique sur une catégorie, c’est aussi une archive ;
- L’affichage d’un article est un single.

La question qui se pose à nous maintenant, c’est comment WordPress sait quel modèle afficher en fonction de la page demandée ? Eh bien grâce au Template Hierarchy.

## Le Template Hierarchy

Lorsque vous cliquez sur un lien, un menu… WordPress sait vers quel contenu vous emmener. Et selon le cas de figure, il va tenter de charger le template adapté.

Le développeur va donc pouvoir créer des modèles différents en fonction du type de contenu à afficher. C’est le principe même du Template Hierarchy.

> Le Template Hierarchy est un processus du coeur de WordPress qui lui permet de déterminer quel modèle de page utiliser en fonction de la page sélectionnée. Ce processus est lancé pour chaque page demandée par WordPress. On parle de hiérarchie car WordPress va procéder par ordre pour définir le bon fichier, en regardant d’abord dans les cas spécifiques, et en terminant sur des modèles plus génériques. Le développeur de thèmes peut donc aller créer des modèles de page pour chaque situation, en suivant une nomenclature spécifique définie par le schéma du Template hierarchy.

D’ailleurs, c’est encore ce fameux schéma qui est le plus explicite :

![](https://capitainewp.io/wp-content/uploads/2019/02/template-hierarchy-1600x998.png.webp)

Il parait très complexe, mais en réalité on n’utilise toujours qu’une petite partie de celui-ci.

Dans tous les cas, on commence par la gauche avec le type de page qui va être affiché. Pour chaque cas existe un fichier template correspondant :

- Une archive : triée par catégorie, mot clé, auteur, date… pointe sur archive.php ;
- Une page singulière : qui va afficher soit le contenu d’une page avec page.php, soit d’un article avec single.php  ;
- La page d’accueil du site est front-page.php dans le cas où le site est configuré pour afficher une page ;
- La page d’accueil du blog : qui est un type d’archive particulier et répond sur home.php ;
- La page 404 : en cas de page non trouvée (mauvaise URL) affiche 404.php ;
- La page des résultats d’une recherche affiche search.php lorsque l’on utilise le moteur de recherche du site ;

Entre temps, WordPress va regarder s’il trouve un fichier de template plus spécifique qui aurait été créé par le développeur du thème. Et s’il ne le trouve pas, il se rabat sur le modèle plus généraliste.

C’est d’ailleurs ce que l’on observe tout à droite : en l’absence d’autres fichiers présents dans le thème, WordPress se rabat toujours sur index.php. C’est pour ça que ce fichier est obligatoire, même si on ne l’utilise quasiment jamais.

> 9 fois sur 10, on n’utilisera pas les cas ultra spécifiques du Template Hierarchy. On reste quasiment tout le temps dans les cas généraux.

Disons qu’en bleu marine, ce sont les cas que l’on utilise presque tout le temps, et en vert et orange, les cas beaucoup plus rares et spécifiques.

Voyons maintenant chaque type de page en détails :

## Le cas des pages

![](https://capitainewp.io/wp-content/uploads/2017/05/template-page.png.webp)

En ce qui concerne les pages, WordPress va aller chercher page.php comme on a pu le voir, mais il va d’abord rechercher la présence de cas spécifiques.

Imaginez que vous ayez une page Contact. Si vous créez un template page-contact.php alors il sera chargé au lieu de simplement page.php.

Si cette page porte l’identifiant 12, vous pourriez également faire un template appelé page-12.php. Mais c’est tout de suite moins explicite.

Pour rappel, vous pouvez trouver facilement l’identifiant unique d’une page depuis l’administration, en regardant l’URL de la page lorsque vous la modifiez.

![](https://capitainewp.io/wp-content/uploads/2019/02/post-id.jpg.webp)

> Je vous déconseille d’utiliser cette technique (slug ou ID) car ils peuvent changer : une personne peut supprimer la page et la recréer (l’ID change) ou changer son permalien (le slug change) et le template ne serait plus appelé.

À la place, je vous conseillerai l’utilisation de modèles de pages personnalisés d’ici quelques cours. Alors pour l’instant, on utilisera simplement page.php.

## Le cas spécifique de la page d’accueil

![](https://capitainewp.io/wp-content/uploads/2019/02/template-home.png.webp)

La page d’accueil est traitée de sa propre manière dans WordPress et répond au template front-page.php. S’il n’est pas présent, WordPress va alors regarder qui est en page d’accueil :

- La page d’accueil est une page : WordPress va alors se rabattre sur page.php ;
- La page d’accueil est le blog : WordPress va alors chercher home.php ;

Pour rappel, vous pouvez changer ce paramètre dans Réglages > Lecture > La page d’accueil affiche.

## Le cas des archives

![](https://capitainewp.io/wp-content/uploads/2017/05/template-archive.png.webp)

Bon, ici ça peut paraitre compliqué, mais en réalité dans 99% des cas, on va simplement appeler archive.php, et c’est tout.

Les templates en vert permettent des mises en page différentes dans les catégories, étiquettes, auteurs…

On pourrait imaginer le blog en listing standard, et l’affichage des articles d’un auteur en mode grille.

Enfin, comme avec les pages, on peut cibler une catégorie, une étiquette ou un auteur spécifique grâce au slug ou l’ID. Voici par exemple les catégories :

![](https://capitainewp.io/wp-content/uploads/2019/02/template-category.png.webp)

Par exemple, vous pourriez avoir une catégorie Promotions qui aurait une mise en page complètement différente du reste du blog. Mais vous en conviendrez, ce genre de cas est très rare.

> La page d’accueil du blog, même si c’est une archive, répond au template home.php même si celui-ci n’est pas défini comme page d’accueil du site.

## Le cas des singles

![](https://capitainewp.io/wp-content/uploads/2019/02/template-single.png.webp)

Ici c’est plutôt simple. Lorsque c’est un article, il va aller chercher au final single.php. On peut aussi créer single-post.php mais ça ne présent que peu d’intérêt. Ce sera utile lorsque l’on utilisera des types de publication sur mesure, et encore.

## Autres cas

Si jamais votre site affiche la même chose dans une page et dans les articles alors vous pouvez retirer page.php et single.php et utiliser singular.php à la place. Mais en général les articles affichent la catégorie, les commentaires, l’article suivant et précédent… Mais ça aussi, je déconseille.

Enfin, pour le moment j’ai volontairement ignoré certains cas, comme la gestion des Custom Post Types, que l’on abordera plus loin dans la formation et une autre manière de gérer des templates de page, que l’on va voir dans quelques cours.

Pour vous aider dans les premiers temps, gardez ce cours à portée ainsi que la documentation officielle à ce sujet :
<https://developer.wordpress.org/themes/basics/template-hierarchy/>

## Le template hierarchy simplifié

Bon, du coup, autant simplifier notre schéma afin de plus facilement s’y retrouver. Si j’enlève tous les cas trop spécifiques, j’obtiens ceci :

![](https://capitainewp.io/wp-content/uploads/2019/02/template-hierarchy-simplifie.png.webp)

## Créer les fichiers template dans votre thème

On va dès maintenant créer les principaux fichiers de modèles afin d’être parés pour la suite, et on va se cantonner aux templates primaires (en violet sur le schéma).

![](https://capitainewp.io/wp-content/uploads/2019/02/fichiers-template-1600x797.jpg.webp)

Pour chacun, on va pour l’instant mettre le strict minimum : l’appel de l’en-tête et du pied de page, ainsi qu’un titre fixe affichant le nom du template :

    single.php : 

```php
<?php get_header(); ?>
 <h1>SINGLE</h1>
<?php get_footer(); ?>
```

    archive.php : 

```php
<?php get_header(); ?>
 <h1>ARCHIVE</h1>
<?php get_footer(); ?>
```

Créez simplement les fichiers :

- archive.php ;
- front-page.php ;
- home.php ;
- page.php ;
- single.php.

Mais ne vous inquiétez pas, dans le prochain cours, on va rendre ça un peu plus dynamique grâce à la Boucle WordPress.

## Le Template Hierarchy influence aussi les Body Classes

Le Template Hierarchy a également pour rôle de générer les Body Classes dans la balise body de votre page HTML :

```php
<body <?php body_class(); ?>>
```

Ce qui donne, dans le cas d’une page single :

```html
<body class="post-template-default single single-post postid-29 single-format-standard logged-in admin-bar no-customize-support">
```

De cette manière, vous pourrez gérer des cas spécifiques en CSS grâce à ces classes. Ici on peut voir une classe single indiquant qu’on est dans un article. Dans une archive on aurait eu la classe archive, tout simplement.

Et voilà, vous savez maintenant quel fichier WordPress appelle selon la page demandée. Grâce à cela, vous allez pouvoir créer des mises en page différentes en fonction du cas de figure.

Retenez toutefois que, malgré toutes les possibilités, on utilise quasiment tout le temps les templates principaux (en bleu dans le schéma).

Dans le prochain cours on va aborder la Boucle WordPress, qui va nous permettre d’afficher les données dynamiques dans nos modèles.
