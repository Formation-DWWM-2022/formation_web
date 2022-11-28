# CPT, Template Hierarchy et Conditionnal tags

Maintenant que l’on a vu comment créer des Custom Post Types et des Taxonomies, on va voir comment leur assigner un template sur mesure grâce au Template Hierarchy ainsi que quelques Conditionnal Tags qui leur sont dédiés.

CPT et Template Hierarchy

Vous vous souvenez du cours sur le Template Hierarchy ? J’avais volontairement passé sous silence les cas spécifiques des Custom Post Types, comme on ne les avait pas encore abordés. Eh bien le moment est venu ! Voici à nouveau le fameux schéma :

![](https://capitainewp.io/wp-content/uploads/2019/02/template-hierarchy-1600x998.png.webp)

On va maintenant voir ce que l’on peut faire avec notre CPT et nos taxonomies.

## Templates pour les archives et le single

Dans les cours précédents, on a créé un type de publication personnalisé appelé Portfolio, qui se comportait comme des articles (avec des archives et des single donc).

En l’absence d’un template sur mesure, notre portfolio se basait sur archive.php et avait le même rendu que le blog :

![](https://capitainewp.io/wp-content/uploads/2019/02/cpt-archive-1600x1102.jpg.webp)

Or, ce n’est pas ce que nous voulons ! Là on a besoin d’un design complètement différent. En d’autres termes, on a besoin d’un nouveau fichier de template. Voici ce que l’on aimerait obtenir :

![](https://capitainewp.io/wp-content/uploads/2019/02/cpt-archive-speciale-1600x1235.jpg.webp)

D’après le Template Hierarchy, on va justement pouvoir créer un template dédié. Voici le cheminement qui nous intéresse :

![](https://capitainewp.io/wp-content/uploads/2019/02/template-hierarchy-cpt-1.png.webp)

Il est donc possible de créer un fichier `archive-<type>.php` et `single-<type>.php` pour gérer notre Post Type.

Dans mon cas je créé donc archive-portfolio.php et single-portfolio.php ! Au niveau du code, on va conserver la boucle WordPress (le CMS sait ce qu’il doit afficher) et on va simplement modifier le HTML ainsi que les classes CSS :

```php
<?php get_header(); ?>

<h1 class="site__heading"><?php post_type_archive_title(); ?></h1>

<main class="site__portfolio">
 <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
     <div class="project">
         <h2 class="project__title">
                <a href="<?php the_permalink(); ?>">
                 <?php the_title(); ?>
                </a>
            </h2>
          <?php the_post_thumbnail(); ?>
     </div>
    <?php endwhile; endif; ?>
</main> 

<?php the_posts_pagination(); ?>
<?php get_footer(); ?>
```

Bien entendu, ce n’est qu’un exemple : adaptez le template selon vos besoins ! Notez la présence de la fonction post_type_archive_title() qui va afficher « PortFolio » en titre `<h1>`.

Mine de rien, grâce à ça, on vient grandement d’augmenter notre capacité de mise en page sur nos sites !

## Templates pour les Taxonomies et termes

On peut aussi créer des templates spécifiques pour les taxonomies et leurs termes. Par exemple, on pourrait vouloir une mise en page différente lorsque je clique sur le type de projet « Photos ».

![](https://capitainewp.io/wp-content/uploads/2019/02/template-hierarchy-taxonomie.png.webp)

On peut donc avoir un template `taxonomy-<taxo>–<term>.php` ou plus simplement `taxonomy-<taxo>.php`.

Dans mon cas cela pourrait être taxonomy-type-projet-photo.php ou taxonomy-type-projet.php.

En pratique, ça n’arrive presque jamais ! La seule utilisation où je pourrais y voir un intérêt c’est si on souhaitait afficher des films, musiques… Dans ce cas on pourrait adapter le rendu en fonction des formats de pochettes, différentes entre les deux. Encore que, je pense qu’un Conditionnal Tag pourrait suffire pour cette mince différence. D’ailleurs en parlant de ça :

## CPT et Conditionnal Tags

Comme vous pouvez vous en douter, il existe aussi des Conditionnal Tags adaptés à notre CPT et les Taxonomies.
Conditionnal Tags pour les Custom Post Types

## is_post_type_archive()

Vous vous êtes peut-être dit qu’un is_archive('portfolio') fonctionnerait ? Eh bien non, pourquoi faire simple quand on peut faire compliqué ? En réalité vous devez utiliser le tag spécifique is_post_type_archive() :

```php
<?php if( is_post_type_archive( 'portfolio' ) ) { … }
```

## is_singular()

Là ici, petit piège ! Pour tester si vous êtes dans la page single d’un Custom Post Type, il faut utiliser is_singular( 'portfolio' ) et non pas is_single().

```php
<?php if( is_singular( 'portfolio' ) ) { … }
```

## Conditionnal Tags pour les Taxonomies

On peut également tester si on est dans une taxonomie en particulier, ou même si on a sélectionné un terme dans cette taxonomie.

```php
<?php 

if( is_tax( 'type-projet' ) { … } // Si on est dans une page taxonomie
if( is_tax( 'type-projet', 'photo' ) { … } // Et que le terme est photo
```

Pour consulter tous les Conditionnal Tags qui existent, rendez-vous sur la documentation ! <https://developer.wordpress.org/themes/basics/conditional-tags>

Les Custom Post Types n’ont presque plus de secrets pour vous ! Dans le prochain cours on va voir comment déclarer une taxonomie et l’associer à notre type de publication.
