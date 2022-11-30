# Timber pour WordPress : avantages d’une approche MVC

Bien souvent, ce qui rebute les développeurs web d’utiliser WordPress, c’est son absence de langage de templating pour coder “proprement”. Mais heureusement, grâce à Timber, on va pouvoir utiliser Twig afin de ne plus mélanger PHP et HTML dans les mêmes fichiers.

À ce niveau de la formation, vous maitrisez suffisamment WordPress pour faire des thèmes de qualité. Mais si vous êtes un développeur PHP qui a déjà développé avec des frameworks comme Symfony ou Laravel, vous avez l’habitude d’utiliser un système de templating comme Twig.

## Que sont Twig et Timber ?

Twig est le langage de templating utilisé par le framework PHP Symfony afin de diminuer la verbosité des fonctions PHP dans les templates.

C’est un langage très réputé dans la communauté PHP. Et depuis que Drupal utilise Symfony comme base, le CMS peut en bénéficier. Mais pas WordPress ! Du moins pas nativement.

Et pourtant ce serait bien, car après tout c’est bien plus joli d’avoir ceci :

```html
{% extends "base.twig" %}
{% block content %}
<article class="post">
    <h1 class="post__heading">{{post.title}}</h1>
    <div class="post__content">
        {{post.content}}
    </div>
    <ul class="post_meta">
    {% for term in post.terms('category') %}
     <li><a href="{{term.link}}">{{term.name}}</a></li>
    {% endfor %}
    </ul>
</article>
{% endblock %}
```

Plutôt que cela :

```php
<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
<article class="post">
 <h1 class="post__heading"><?php the_title(); ?></h1>
 <div class="post__content">
  <?php the_content(); ?>
    </div>
    <ul class="post_meta">
     <?php the_category(); ?>
    </ul>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
```

Eh bien pour utiliser Twig dans votre thème ou extension WordPress, vous allez pouvoir faire appel à Timber, réalisé par l’agence Upstatement à Boston. <https://www.upstatement.com/timber/>

Timber est un projet open source gratuit qui s’intègre à WordPress sous forme de plugin, ou sous forme de dépendance composer. Mais on en reparle juste après.

Je sais ce que certains vont me dire : “c’est tout ?”. Mais non, attendez un peu ! Timber a bien d’autres tours dans son sac. On va voir à quel point Timber et Twig vont nous simplifier le code de nos thèmes.

## Pourquoi utiliser Timber avec WordPress ?

Je vois beaucoup d’avantages à utiliser Timber dans la plupart de mes projets WordPress. Je vais me concentrer sur les 3 raisons principales :

- L’écriture Twig est plus légère et plus lisible que le PHP (moins verbeuse) ;
- Le code PHP (algorithme) et le template (HTML) sont séparés ;
- Et l’écriture de certaines fonctions est simplifiée (comme la boucle).

Il y a encore d’autres arguments en sa faveur, comme l’utilisation d’un contexte global à toutes les pages, et l’utilisation de filtres Twig.

## Pour une écriture plus légère et parfaitement intégrée à WordPress

Avec Timber, les templates Tags de WordPress ont tous leurs équivalents en Twig, et on retrouve des nommages plus simples pour certaines d’entre-eux, comme bloginfo() par exemple.

Voici à titre de comparaison l’en-tête d’un thème PHP, et celui d’un thème Twig :

![](https://capitainewp.io/wp-content/uploads/2020/04/comparatif-timber-php-scaled.jpg.webp)

On peut noter la présence de tags comme body_class ou wp_head, qui auront le même rôle que les fonctions du même nom : appeler les hooks WordPress.

Pour le nom du site ou l’encodage, exit la fonction bloginfo() au profit d’une variable globale site.

D’ailleurs Timber ne fonctionne pas avec un header.php et un footer.php. À la place, on a un fichier base.twig avec des zones qui vont bouger d’un template à un autre :

```html
<!DOCTYPE html>
<html {{site.language_attributes}}>
<head>
  <meta charset="{{site.charset}}" />
  {{wp_head}}
</head>

<body class="{{body_class}}">
  {{wp_body_open}}

  <header class="header">{{site.name}}</header>

  {% block content %}
   Le contenu des pages ira ici !
  {% endblock %}

  <footer class="footer">…</footer>

  {{wp_footer}}
</body>
</html>
```

Et en plus de ça, Timber est complètement compatible avec vos champs ACF, ce qui va encore plus simplifier les choses ! Finis les the_field(), Timber récupère les données directement pour vous !

En plus, la document de Timber est très complète et permet de bien comprendre les concepts. <https://timber.github.io/docs/>

La documentation de Twig sera également utile pour bien comprendre les subtilités de ce système de templating.

En ce qui concerne les performances, on me demande souvent si Timber augmente le temps d’exécution PHP. Eh bien non, je n’ai pas constaté de ralentissement. D’ailleurs, si Twig était une usine à gaz, je ne pense pas que tous les développeurs Symfony l’utiliseraient…

> Timber s’intègre parfaitement à WordPress et ses fonctions natives, prend en charge les champs ACF, et ne ralentit pas l’exécution des scripts PHP.

## Pour séparer le code PHP du template

En plus d’être plus esthétique, c’est également plus sain de séparer le code “métier”, du template. C’est la base de l’approche MVC :

- Le Modèle : le système qui va récupérer les données en base ;
- La Vue : ou template, l’affichage dans le HTML ;
- Le Contrôleur : la partie traitement de l’information, le PHP.

Dans WordPress, on n’a pas besoin de modèle puisque c’est la WP Query et le Template Hierarchy qui gèrent tout ça en interne.

On a donc juste besoin de séparer nos algorithmes, de l’affichage dans le template.

Timber va surtout montrer son intérêt lorsque vous aurez besoin d’ajouter du code PHP dans vos pages, par exemple aller chercher une WP Query. Jusqu’ici, on faisait comme ça :

```php
<div class="movies">
<?php
    // On passe en PHP en plein milieu du template…
    $args = array(
        'post_type' => 'post',
        'category_name' => 'films',
        'posts_per_page' => 3,
    );

    $my_query = new WP_Query( $args );

    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
    // Et on repasse dans le template…
?>   
    <h2><?php the_title(); ?></h2>
    <div><?php the_content(); ?></div>
    <div><?php the_post_thumbnail(); ?></div>
<?php 
    // Pour encore repasser en PHP…
    endwhile;
    endif;

    wp_reset_postdata();
?>
</div>
```

On interrompt donc notre template à plusieurs reprises pour faire du PHP. Alors qu’avec une approche Contrôleur + vue, on a 2 fichiers distincts, le contrôleur qui est appelé en premier :

```php
<?php
// Récupération du contexte (données globales)
$context = Timber::get_context();

// Récupération de la publication à afficher (équivalent de la boucle)
$context['post'] = new TimberPost();

// Équivalent de la WP Query
$args = array(
   'post_type' => 'post',
    'category_name' => 'films',
    'posts_per_page' => 3,
);
$context['movies'] = Timber::get_posts( $args );

// Et enfin, on appelle le template
Timber::render( 'page.twig', $context );
```

Et le template (la vue) en dernier :

```html
{% extends "base.twig" %}

{% block content %}
 <main class="content">
     <h1 class="blog__title">{{post.title}}</h1>
        {{post.content}}
 </main>
 <div class="movies">
 {% for movie in movies %}
        <h2>{{movie.title}}</h2>
        {{movie.content}}
 {% endfor %}
 </div>
{% endblock %}
```

Cette approche se montre indispensable sur des projets complexes, où vous allez avoir besoin de récupérer des informations et les traiter en amont.

> Cette séparation des rôles permet un code bien plus propre, et plus facile à maintenir sur le long terme.

## Pour simplifier l’écriture du code

Parfois, le système de template de WordPress nous joue des tours, et au final l’écriture prévue pour être simple, vient plutôt nous compliquer la chose.

    Simplifier la boucle

Timber apporte des simplifications dès la boucle WordPress. Lorsqu’il y a plusieurs publications à afficher, on écrit désormais :

```html
{% for post in posts %}
 <h2>{{post.title}}</h2>
 {{post.content}}
{% endfor %}
```

Plutôt que :

```php
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
 <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
<?php endwhile; endif; ?>
```

Et quand il n’y a qu’un élément à afficher (comme c’est le cas pour les pages), on n’a même pas besoin de boucle !

    Simplifier la WP Query

Timber simplifie pas mal l’écriture d’une WP Query lorsqu’elle se trouve dans la boucle principale. Rappelez-vous, dans le cours sur la WP Query on avait vu qu’il fallait utiliser wp_reset_postdata() pour réinitialiser les variables globales de WodPress.

```php
<?php
    $args = array( 'post_type' => 'post' );
    $my_query = new WP_Query( $args );

    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
     // …
    endwhile;
    endif;
 // Il faut réinitialiser les globales de WordPress
    wp_reset_postdata();
?>
```

Eh bien on n’a pas ce souci avec Timber ! Les données sont isolées et il n’y a jamais de conflit. Une simple boucle for permet de faire l’affaire.

```html
{% for post in posts %}
 <h2>{{post.title}}</h2>
 {{post.content}}
{% endfor %}

{% for movie in movies %}
 <h2>{{movie.title}}</h2>
 {{movie.content}}
{% endfor %}
```

Nous n’avons donc plus besoin d’englober toute la page de notre boucle WordPress.

    Simplifier l’écriture des menus et taxonomies

Il y a aussi les problèmes avec les menus ou les taxonomies, le fonctionnement de WordPress nous oblige à écrire des fonctions avec des paramètres dans tous les sens :

```php
<?php 
 wp_nav_menu( 
        array( 
            'theme_location' => 'main', 
            'container' => 'ul', 
            'menu_class' => 'header__menu' 
        ) 
    ); 
?>
```

Alors qu’au final avec Twig c’est bien plus simple. Un contexte global permet de définir les éléments communs à toutes les pages, comme les menus :

```php
<?php
function alex_add_to_context( $context ) {
    $context['menus'] = array(
      "main" => new \Timber\Menu( 'main' ),
      "footer" => new \Timber\Menu( 'footer' ),
    );
}
add_filter( 'timber/context', 'alex_add_to_context' );
```

Et du coup, dans votre template, vous pouvez simplement itérer sur menus.main :

```html
{% for item in menus.main.items %}
    <li class="nav-main-item">
     <a class="nav-main-link" href="{{item.get_path}}">{{item.title}}</a>
 </li>
{% endfor %}
```

En plus, grâce à cette méthode, on a un contrôle total sur le HTML et les classes CSS générées, là où WordPress impose habituellement un markup via ses fonctions.

> Timber permet de simplifier l’écriture de bon nombre de fonctions de WordPress, comme la boucle, les taxonomies ou encore les menus.

## Comment installer Timber sur WordPress ?

Pour installer Timber, il y a 2 façons de procéder, la première est la plus simple : il vous suffit d’installer l’extension gratuite Timber dans votre site, et vous pourrez utiliser les templates Twig tout de suite après.

Mais en tant que développeur de thèmes, il y a tout de même plus propre : installer Timber en tant que dépendance Composer, directement dans le dossier de votre thème, via 2 lignes de commandes.

```
composer require timber/timber
composer install
```

Il suffit ensuite d’ajouter la dépendance dans functions.php :

```php
<?php
require_once( __DIR__ . '/vendor/autoload.php' );
$timber = new Timber\Timber();
```

De cette manière, Timber est une dépendance PHP, versionnée sur Git avec votre thème, et ce sera bien plus propre, notamment pour travailler en équipe.

On va voir l’installation plus en détails dans le prochain cours.

Bref, si vous êtes un développeur aguérri, Timber est une nécessité dans vos projets WordPress, afin de bien séparer le code métier du template, et simplifier l’écriture du code.

En tous cas j’espère que mes arguments vous auront convaincu.
