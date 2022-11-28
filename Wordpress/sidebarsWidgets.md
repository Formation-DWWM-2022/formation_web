# Les sidebars et les widgets

Les widgets sont des éléments interactifs que l’on retrouve en général dans la barre latérale du blog, et permettant d’afficher des informations comme la liste des derniers articles, commentaires, catégories…

## Que sont les Widgets et les sidebars ?

Les widgets sont des éléments dynamiques généralement présents dans le blog qui permettent, dans une barre latérale, d’afficher des informations complémentaires.

Un widget peut afficher la liste des derniers articles, des derniers commentaires, des catégories, une archive mensuelle, un texte arbitraire, une galerie, un flux RSS, un moteur de recherche…

Des extensions peuvent même ajouter les leurs, comme par exemple un formulaire d’abonnement à votre newsletter, vos derniers tweets ou encore vos derniers clichés Instagram…

![](https://capitainewp.io/wp-content/uploads/2019/02/sidebar-flywheel-1600x1134.jpg.webp)

Dans WordPress, on place des widgets dans une zone que l’on appelle sidebar. Pour faire la liaison avec le cours précédent je dirais que :

- Les menus vont dans des emplacements de menus ;
- Les widgets vont dans des sidebars.

On va maintenant voir comment déclarer des sidebars, les afficher dans nos templates et y insérer des widgets.

> Les widgets natifs ont aujourd’hui été portés sous forme de blocs et disponibles dans Gutenberg. Depuis WordPress 5.9, la gestion des widgets est directement intégrée dans le nouvel éditeur de WordPress. Mais la méthode que l’on va voir fonctionnera toujours.

## Déclarer une sidebar et l’afficher dans le template

Pour déclarer une sidebar, c’est aussi simple que de déclarer un menu ! Pour cela on dispose d’une fonction register_sidebar() à placer dans le functions.php :

```php
<?php 
register_sidebar( array(
 'id' => 'blog-sidebar',
 'name' => 'Blog',
) );
```

Il faut a minima indiquer son nom et son identifiant (ou slug). Le nom est celui qui apparaitra dans l’interface d’administration de WordPress, et l’ID sera utilisé pour appeler notre sidebar.

Pour afficher notre sidebar dans le blog, on va ouvrir archive.php et ajouter la fonction dynamic_sidebar() :

```php
<?php get_header(); ?>

 <h1 class="site__heading">Le blog</h1>

 <div class="site__blog">
     <main class="site__content">
         <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
             <article class="post">
                    <!– … –>
                </article>
            <?php endwhile; endif; ?>
        </main>

        <aside class="site__sidebar">
         <ul>
             <?php dynamic_sidebar( 'blog-sidebar' ); ?>
            </ul>
        </aside>
 </div> 
<?php get_footer(); ?>
```

Indiquez comme seul paramètre l’identifiant défini auparavant dans functions.php.

## Autres paramètres pour déclarer une sidebar

Je vous ai montré le strict minimum pour déclarer une sidebar, mais il existe quelques autres paramètres qui peuvent se montrer intéressants.

Par défaut vous devez entourer votre sidebar d’un `<ul>` car chaque widget est écrit avec un `<li>`.

```html
<li id="search-4" class="widget widget_search">
    <h2 class="widgettitle">Rechercher</h2>
    …
</li>

<li id="text-2" class="widget widget_text">
 <h2 class="widgettitle">A propos de Alex</h2>
    …
</li>
```

Si vous n’êtes pas fan de ce fonctionnement, vous pouvez modifier cela, ainsi que les noms de classes, et le niveau hiérarchique des titres :

```php
<?php 
register_sidebar( array(
  'id' => 'blog-sidebar',
  'name' => 'Blog',
  'before_widget'  => '<div class="site__sidebar__widget %2$s">',
  'after_widget'  => '</div>',
  'before_title' => '<p class="site__sidebar__widget__title">',
  'after_title' => '</p>',
) );
```

En premier lieu, je change les `<li>` par de simples `<div>` comme ça je peux m’affranchir du `<ul>` dans ma sidebar. J’en profite pour personnaliser leur classe. Le %2$s permet à WordPress d’insérer ses autres classes (une classe spécifique par type de widget).

Ensuite je retire le titre de niveau 2 `<h2>` pour mettre simplement un `<p>`. En terme de référencement naturel, il est inutile d’appliquer des hiérarchies de titres en dehors du contenu principal.

## Ajouter des Widgets à notre sidebar

Maintenant que notre sidebar est créée, on va aller y ajouter quelques Widgets. Pour cela rendez-vous dans Apparence > Widgets afin de faire votre sélection :

![](https://capitainewp.io/wp-content/uploads/2019/02/widgets-wordpress-1600x993.jpg.webp)

Le principe est simple : faites glisser le widget désiré dans la sidebar à droite, vous pourrez ensuite le configurer via quelques réglages. J’ajoute : une recherche, un texte « À propos du blog », une galerie, la liste des articles récents et les catégories.

À tout moment vous pouvez faire glisser les éléments afin de les réorganiser.

Voici le résultat, avec un peu de CSS :

![](https://capitainewp.io/wp-content/uploads/2019/02/blog-sidebar-1600x1190.jpg.webp)

Certaines extensions proposeront leurs propres widgets dans vos sidebars. Pensez toutefois à ne pas trop encombrer cette barre afin de ne pas surcharger votre page.

En fait, les blogs aux designs modernes ont même tendance à ne plus utiliser les sidebars et widgets !

## Sidebar en guise de Footer

Vous pouvez créer autant de sidebars que vous le souhaitez dans votre thème. Par exemple la sidebar des archives peut être différente de la sidebar des singles. De cette manière vous pourrez afficher des widgets différents. C’est ce que proposent de nombreux thèmes premium.

D’ailleurs bien souvent, leur footer fonctionne sous forme de sidebar, ce qui permet de gérer les différentes colonnes du pied de page plus facilement :

![](https://capitainewp.io/wp-content/uploads/2019/02/salient-footer-cols-1600x1060.jpg.webp)

Certains thèmes proposent jusqu’à 4 sidebars différentes pour le pied de page (une par colonne) et d’autres une seule, dont les widgets sont affichés horizontalement.

De plus en plus, ce sont les Page Builders qui permettent de gérer la mise en forme du pied de page (on en reparlera plus tard dans cette formation).

Vous savez maintenant utiliser les sidebars de WordPress afin d’y ajouter vos widgets, et ajouter donc encore en interactivité !
