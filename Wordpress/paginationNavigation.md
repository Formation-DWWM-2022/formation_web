# La pagination et la navigation entre articles

WordPress propose des fonctions qui vont nous permettre de naviguer vers les entrées plus anciennes des pages archives, mais aussi d’un article à l’autre en allant facilement au suivant, ou au contraire en retournant au précédent.

Dans ce cours on va voir comment ajouter des liens afin de faciliter la navigation à notre internaute. Ici plus besoin du functions.php par contre, tout se fait directement dans les templates concernés (archive et single).

## La Pagination pour les archives

La pagination est plutôt simple à gérer dans WordPress puisqu’il nous fournit pour cela des fonctions prêtes à l’emploi.

Pour ajouter une pagination simple, il vous suffit d’ajouter cette fonction dans votre fichier archive.php, après la fin de la boucle :

```php
<?php posts_nav_link(); ?>
```

C’est important de mettre cette fonction hors boucle WordPress afin d’éviter des soucis de répétition. Voici un exemple :

```php
<?php get_header(); ?>
  <h1 class="site__heading">Le blog</h1>
  <div class="site__blog">
    <main>
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <!– Contenu de l article –>
      <?php endwhile; endif; ?>
      <?php posts_nav_link(); // Après la boucle ?>
    </main>
      
    <aside>
      <?php dynamic_sidebar( 'blog' ); ?>
    </aside>
  </div> 
<?php get_footer(); ?>
```

Voici le résultat sur votre site :

![](https://capitainewp.io/wp-content/uploads/2019/02/navigation-wp-1600x1004.jpg.webp)

Bon, le souci avec cette fonction c’est qu’elle ne nous laisse que peu de choix de mise en forme. Voici le HTML affiché :

```php
<a href="https://wp.local/blog/">« Page précédente</a>
 — 
<a href="https://wp.local/blog/page/3/">Page suivante »</a>
```

Cela pourrait suffire, mais si vous voulez un peu plus de contrôle sur cet affichage, on va pouvoir utiliser 2 autres fonctions à notre disposition :

```php
<div class="site__navigation">
 <div class="site__navigation__prev">
  <?php previous_posts_link(); ?>
 </div>
 <div class="site__navigation__next">
    <?php next_posts_link(); ?> 
 </div>
</div>
```

Et du coup, grâce à un peu de CSS on obtient facilement :

![](https://capitainewp.io/wp-content/uploads/2019/02/navigation-wp-amelioree-1600x1009.jpg.webp)

Mieux non ? Il reste encore un détail qui me chiffonne : les guillemets en guise de flèche qui ne sont pas jolis. Heureusement on peut remplacer le texte par défaut en ajoutant un paramètre aux fonctions :

```php
<div class="site__navigation">
 <div class="site__navigation__prev">
  <?php previous_posts_link( 'Page Précédente' ); ?>
 </div>
 <div class="site__navigation__next">
    <?php next_posts_link( 'Page Suivante' ); ?> 
 </div>
</div>
```

Et comme bien souvent dans WordPress, une version en get_ existe dans le cas où vous voudriez récupérer le lien sans l’afficher :

```php
<?php 
$next_posts = get_next_posts_link(); 
$prev_posts = get_previous_posts_link();
```

Mais ce n’est pas très intéressant quand ça vous renvoie le lien `<a>` déjà généré et non pas juste l’URL de la page suivante.

## Une pagination numérique

Depuis la version 4.1 de WordPress, une nouvelle fonction a fait son apparition et vous permet de créer une navigation paginée :

```php
<?php the_posts_pagination(); ?>
```

Pensez bien là encore à mettre cette ligne en dehors de votre boucle, à la fin de celle-ci.

> Afin de tester la navigation numérotée, j’ai volontairement réduit le nombre d’articles par page à 3 au lieu de 10. Vous pouvez en faire de même dans Réglages > Lecture.

Voici le résultat avec un peu de CSS :

![](https://capitainewp.io/wp-content/uploads/2019/02/navigation-numerotee-1600x1009.jpg.webp)

En plus des liens Précédent et Suivant on a maintenant les numéros de page adjacents, et 5 pages plus loin. Plutôt pas mal non ?

Et le HTML généré :

```php
<nav class="navigation pagination" role="navigation">
 <h2 class="screen-reader-text">Navigation des articles</h2>
 <div class="nav-links">
  <a class="prev page-numbers" href="https://wp.local/blog/">Précédent</a>
  <a class="page-numbers" href="https://wp.local/blog/">1</a>
  <span aria-current="page" class="page-numbers current">2</span>
  <a class="page-numbers" href="https://wp.local/blog/page/3/">3</a>
  <span class="page-numbers dots">…</span>
  <a class="page-numbers" href="https://wp.local/blog/page/6/">6</a>
  <a class="next page-numbers" href="https://wp.local/blog/page/3/">Suivant</a>
 </div>
</nav>
```

Il y a un `<h2>` un peu gênant qu’il faudra cacher en CSS. Il est là dans un but d’accessibilité : il permet à un lecteur de site (pour les personnes malvoyantes par exemple) d’indiquer que c’est la navigation entre les articles. Le lecteur (screen reader en anglais) sait déjà que l’on est dans une navigation grâce au rôle défini dessus.

On reparlera d’accessibilité et de son importance dans le développement d’un thème un peu plus tard dans cette formation.

Pour en revenir au CSS, vous disposez de beaucoup de classes afin de personnaliser au mieux votre pagination, ce qui est plutôt agréable.

## Alternative : pagination en utilisant une extension

Et si ça ne suffit pas, vous pouvez toujours opter pour une extension comme WP-PageNavi qui va vous permettre de configurer et personnaliser votre pagination. De plus, elle est fournie avec un thème CSS prédéfini afin d’aller plus vite : WP-PageNavi

Pour mettre en place la navigation c’est très simple, il suffit d’ajouter cette fonction dans votre template à la place de celles vues précédemment :

```php
<?php wp_pagenavi(); ?>
```

Alors, quelle méthode choisir ? En fait, ça dépend. Parfois il est suffisant et bien plus efficace de rester sur des liens « précédents / suivants » simples et d’autres fois, la navigation par numéro de pages peut être utile. À vous de choisir !

## La navigation entre les articles

On va maintenant voir que l’on peut également ajouter des liens vers l’article suivant ou précédent au sein des templates single.php.

Ici aussi, on va placer ce code après la boucle WordPress.

```php
<div class="site__navigation">
 <div class="site__navigation__prev">
  <?php previous_post_link( 'Article Précédent<br>%link' ); ?>
 </div>
 <div class="site__navigation__next">
    <?php next_post_link( 'Article Suivant<br>%link' ); ?> 
 </div>
</div>
```

C’est presque la même fonction. Remarquez simplement que désormais post est écrit au singulier, et non plus au pluriel ! J’ai également ajouté %link qui sera remplacé par le nom réel de l’article ciblé.

Voici ce que ça donne dans un article :

![](https://capitainewp.io/wp-content/uploads/2019/02/navigation-article-1600x1013.jpg.webp)

Afin d’en savoir plus sur toutes les fonctions que l’on vient de voir, je vous recommande comme d’habitude d’aller faire un tour sur la documentation développeurs officielle : <https://developer.wordpress.org/themes/functionality/pagination/>

Votre site permet de simplifier de plus en plus la navigation entre les pages grâce à ces liens. C’est ce que l’on appelle le maillage interne. Votre internaute pourra alors trouver facilement ce qu’il recherche, et les moteurs de recherche comprendre plus facilement l’architecture de votre site.

Dans le prochain cours, on va ajouter les commentaires à nos articles !
