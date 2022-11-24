# Les images mises en avant, les tailles d’images et le srcset

WordPress propose par défaut 3 tailles d’images, configurables depuis l’interface d’administration. En tant que développeur de thèmes, on va pouvoir en définir de nouvelles qui seront optimisées en fonction du design de celui-ci.

## Les images mises en avant

Les images mises en avant permettent d’ajouter un visuel à votre publication. Sur Alex chaque cours ou article commence par une image mise en avant, en haut, que j’ai piochée sur Unsplash.

## Activer les images mises en avant via functions.php

Dans le cours sur la préparation des bases du thème, on avait déjà vu comment activer la fonctionnalité grâce à la fonction add_theme_support(). Il suffit de coller ce code dans le fichier functions.php :

```php
<?php 
add_theme_support( 'post-thumbnails' );
```

Cela a pour but de rajouter la metabox Image mise en avant dans l’interface de l’éditeur :

![](https://capitainewp.io/wp-content/uploads/2019/01/image-une-metabox-1600x613.jpg.webp)

## Afficher l’image mise en avant dans votre template

Et pour afficher cette image dans votre thème, il suffit d’appeler la fonction the_post_thumbnail() dans archive.php ou single.php par exemple, à l’intérieur de la boucle WordPress :

```php
<?php
  get_header();
  if ( have_posts() ) : while ( have_posts() ) : the_post();
?> 
 <h1><?php the_title(); ?></h1>
 <?php the_post_thumbnail(); ?>
<?php
  endwhile;
  endif;
  get_footer();
?>
```

Pas besoin de créer la balise `<img>` car la fonction la crée pour nous. Contrairement à ce que l’on pourrait croire, elle ne renvoie pas juste l’URL de l’image.

Voici le résultat dans mon HTML :

```html
<img 
     width="2507" 
     height="1002" 
     src="http://wp.local/wp-content/uploads/2019/01/chevaux.jpg" 
     class="attachment-post-thumbnail size-post-thumbnail wp-post-image" 
     alt="Mon image mise en avant" 
     srcset="http://wp.local/wp-content/uploads/2019/01/chevaux.jpg 2507w, http://wp.local/wp-content/uploads/2019/01/chevaux-300×120.jpg 300w, http://wp.local/wp-content/uploads/2019/01/chevaux-768×307.jpg 768w, http://wp.local/wp-content/uploads/2019/01/chevaux-1024×409.jpg 1024w" 
     sizes="(max-width: 2507px) 100vw, 2507px"
/>
```

Eh bien, c’est plutôt chargé, mais c’est parce que WordPress va automatiquement écrire les srcset et sizes, afin de proposer plusieurs formats au navigateur, pour qu’il sélectionne la taille la plus adaptée à l’écran. On en reparle juste après.

> Auparavant, on disait Image à la Une mais l’équipe de traduction francophone a changé le terme pour Image mise en avant. Mais c’est bel et bien la même chose.

## Configurer les tailles d’images

Dans WordPress, lorsque vous importez une image dans la bibliothèque de médias, elles sont automatiquement traitées et créées en tailles intermédiaires que vous pourrez utiliser pour les images mises en avant, mais aussi dans vos articles ou vos templates.

Vous pouvez personnaliser ces tailles dans l’administration : Réglages > Médias.

![](https://capitainewp.io/wp-content/uploads/2019/02/tailles-images-wordpress-1600x875.jpg.webp)

On constate que l’on peut modifier 3 tailles, et 3 tailles seulement :

- Le format miniature est carré par défaut, et sert à l’affichage des miniatures dans la bibliothèque de média. Je vous conseille donc de ne pas toucher à ce réglage ;
- La taille moyenne est configurée sur 300px maximum ;
- La taille grande est configurée sur 1024px maximum.

Je vous conseille de régler la taille moyenne en 1200px, et la grande taille en 1920px.

> Lorsque vous changez ces tailles, les images précédemment importées ne seront pas redimensionnées !

Du coup, si vous voulez redimensionner les images déjà présentes dans votre bibliothèque de média, il faudra utiliser une extension comme Regenerate Thumbnails.

Elle est très simple d’utilisation et permet de redimensionner en masse les images. Il propose en plus de supprimer les anciennes tailles devenues caduques.

Pour rappel, les images sont accessibles depuis la bibliothèque de médias (menu Médias dans WordPress) mais elles sont physiquement stockées dans le dossier `wp-content/uploads/<année>/<mois>/` :

![](https://capitainewp.io/wp-content/uploads/2019/02/dossier-upoads-1600x745.jpg.webp)

On voit pour chaque image son équivalent en 1024px, 300px et 150px. WordPress a ajouté un suffixe à la fin des noms de fichiers ce qui donne : `<nom>-<largeur>x<hauteur>.jpg`.

D’ailleurs, ça ne prend pas trop de place de créer tous ces formats intermédiaires ? Bien entendu, ça prend plus de place que si on n’avait gardé qu’une image. De plus, certaines images ne serviront jamais dans certains formats.

Mais aujourd’hui, avec des hébergements dont la capacité est quasiment illimitée, vous n’avez plus à vous soucier de cela !

## C’est quoi le srcset des images ?

Comme on a pu le voir, la balise `<img>` fournit les attributs srcset et sizes en plus du classique src.

C’est en fait une norme HTML5 pour améliorer l’affichage des images dans l’ère du web responsive et des périphériques aux multiples résolutions d’écran.

Son but est de permettre d’indiquer plusieurs tailles d’images au navigateur afin qu’il choisisse la plus adaptée en fonction de la taille de l’écran : Inutile de charger une image de 2000px de large sur un mobile qui n’a que 768px. Cela fait moins d’octets à charger, pour un affichage plus rapide, surtout sur des connexions mobiles lentes.

WordPress tire parti de cette technique lorsqu’il affiche une image dans une publication ou une image mise en avant. Il va récupérer toutes les tailles définies sur le site afin de les proposer au navigateur. Celui-ci optera pour la plus adaptée :

```html
<img 
     width="2507" 
     height="1002" 
     src="http://wp.local/wp-content/uploads/2019/01/chevaux.jpg" 
     class="attachment-post-thumbnail size-post-thumbnail wp-post-image" 
     alt="Mon image mise en avant" 
     srcset="http://wp.local/wp-content/uploads/2019/01/chevaux.jpg 2507w, http://wp.local/wp-content/uploads/2019/01/chevaux-300×120.jpg 300w, http://wp.local/wp-content/uploads/2019/01/chevaux-768×307.jpg 768w, http://wp.local/wp-content/uploads/2019/01/chevaux-1024×409.jpg 1024w" 
     sizes="(max-width: 2507px) 100vw, 2507px"
/>
```

Le fonctionnement de cette technologique est assez simple :

- Dans l’attribut scrset, WordPress liste toutes les tailles d’images, et indique leur largeur (300w, 1024w…) ;
- Dans l’attribut sizes, WordPress indique la plus grande taille de l’image.

## Les tailles cachées pour le responsive

Et du coup cette taille à 768px, elle vient d’où ? C’est WordPress qui la crée automatiquement depuis la version 4.4 afin d’être sûr d’avoir un format adapté aux smartphones et tablettes.

Depuis, on a même d’autres tailles créées automatiquement :

- Medium Large : 768px ;
- 2x Medium Large : 1536px ;
- 2x Large : 2048px ;
- Scaled: 2560px.

> Avec toutes ces tailles d’images à notre disposition, il devient de moins en moins nécessaire de créer ses propres tailles d’images. Préférez opter pour la taille existante la plus proche.

## Quelle compatibilité avec les navigateurs ?

Au niveau de la compatibilité, on monte à 90% de compatibilité auprès des navigateurs d’après CanIUse, ce qui est pas mal, mais Internet Explorer et Edge jusqu’à la version 15 ne prendront pas cet attribut en compte.

Au pire, si le navigateur ne comprend pas les srcset, il aura toujours l’attribut classique src. L’image n’aura pas une taille optimisée mais au moins, elle s’affichera.

## Déclarer de nouvelles tailles d’images

Bon, et si les 3 tailles d’images proposées par défaut ne suffisent pas ? Et bien vous allez pouvoir en créer d’autres grâce au functions.php !
PHP

```php
<?php

add_theme_support( 'post-thumbnails' );

// Définir la taille des images mises en avant
set_post_thumbnail_size( 2000, 400, true );

// Définir d'autres tailles d'images
add_image_size( 'products', 800, 600, false );
add_image_size( 'square', 256, 256, false );
```

La fonction set_post_thumbnail_size() permet de définir la taille des images mises en avant. Cette taille sera donc utilisée par défaut par the_post_thumbnail().

Le premier paramètre est la taille en largeur que doit avoir l’image, le second la hauteur maximale (passez ce paramètre à 0 pour ne pas limiter) et le dernier paramètre, s’il est passé à true permet de découper l’image pour se conformer à ces dimensions exactes.

Pour votre propre utilisation dans le thème, ou via les articles, vous pouvez ajouter autant de tailles que souhaitez grâce à add_image_size(). Le premier paramètre est le nom à donner à votre taille d’image. (Évitez large, medium, medium-large, et thumbnails car ils sont déjà utilisés par WordPress).

Essayez de téléverser une image sur votre site, et jetez un oeil à votre dossier uploads :

![](https://capitainewp.io/wp-content/uploads/2019/02/tailles-images-personnalisees-wordpress-1600x939.jpg.webp)

Mon image est désormais déclinée en 8 formats : l’originale, les 3 de WordPress par défaut, la version responsive en 768, le format pour les images mises en avant et mes deux tailles sur mesure.

## Utiliser les tailles dans vos templates

Pour appeler une taille d’image spécifique, c’est tout simple. Il suffit d’indiquer le nom de l’image que vous souhaitez afficher en paramètre :

```php
<?php the_post_thumbnail( 'square' ); ?>
```

Et le tour est joué !

Pour donner un peu de contexte, on va voir plus tard que l’on peut créer des Custom Post Types, ou types de publications personnalisées, lorsque les articles ou les pages ne suffisent plus.

On créera par exemple un Portfolio. Et on voudra que les images mises en avant dans ce portfolio soient carrées, alors que pour les articles du blog, elles auront le format défini par set_post_thumbnail_size().

Vous pourrez aussi utiliser ces tailles d’images lorsque l’on fera des champs image avec ACF (Advanced Custom Fields). Mais ça, c’est pour plus tard !

## Utiliser les tailles dans vos articles ?

Lorsque vous utilisez le bloc image dans l’éditeur visuel, vous pouvez afficher la taille d’image à afficher par défaut :

![](https://capitainewp.io/wp-content/uploads/2019/02/taille-image-1600x1113.jpg.webp)

Ça alors ! Mes tailles d’images n’apparaissent pas ! C’est voulu par WordPress. Mais en fait, on n’a pas à s’en soucier. Comme on l’a vu précédemment, le srcset va permettre de sélectionner l’image la plus adaptée, donc le rédacteur n’a pas besoin de se soucier de ce réglage !

À la limite, vous pouvez régler sur Grande pour ne jamais proposer le format original (qui peut être très lourd selon la photo importée).

Pour conclure, les tailles d’images personnalisées ne servent qu’au développeur dans le template.

Mine de rien, il y avait beaucoup à dire sur les images ! Et encore, on n’a pas parlé de l’optimisation des images. On abordera cet aspect très important un peu plus tard dans la formation, dans une partie dédiée aux performances d’un site. On verra que l’optimisation des images permet de faire économiser jusqu’à 80% du poids d’une page web.

Le prochain cours abordera les menus et le moteur de recherche du CMS.
