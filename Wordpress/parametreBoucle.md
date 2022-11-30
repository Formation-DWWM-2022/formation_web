# Modifier les paramètres de la boucle WordPress

Dans le cours précédent, on a vu comment créer sa propre WP Query. Mais comment faire lorsque l’on veut modifier les paramètres de celle que WordPress a utilisé pour générer la page ? C’est ce qu’on va voir dans ce cours !

Vous savez maintenant écrire votre propre requête et récupérer n’importe quel type de contenu, depuis n’importe quelle page de votre site. Et comme WordPress utilise aussi cette WP Query pour générer le contenu initial des pages, vous allez pouvoir l’intercepter pour en modifier ses paramètres.

## Pourquoi modifier la WP Query d’une page générée par WordPress ?

Imaginez un site où vous avez d’un côté les articles du blog, listés verticalement, et d’un autre votre portfolio, affiché sous forme de grille.

![](https://capitainewp.io/wp-content/uploads/2020/03/dispositions-scaled.jpg.webp)

Dans le premier cas, on liste 10 articles par page, conformément au réglage par défaut de WordPress (dans Réglages > Lecture).

Mais dans le cas de notre grille, on souhaite un nombre d’entrées qui soit un multiple de 3, par exemple 12, afin de ne pas laisser de ligne incomplète. Ce qui ne serait pas très esthétique, avouons-le.

C’est donc dans ce cas du portfolio qu’on va avoir besoin de modifier la WP Query avant qu’elle soit exécutée, afin d’en modifier ses paramètres.

Et pour cela, on va utiliser un hook prévu à cet effet.

## Le hook pour modifier la WP Query

C’est le hook pre_get_posts qui va nous permettre de modifier la WP Query juste avant son exécution par WordPress. Le code suivant est à placer dans le fichier functions.php de votre thème.

```php
<?php 
function alex_override_query( $wp_query ) {
    if( $wp_query->is_main_query() and is_post_type_archive( 'portfolio' ) ): 
        $wp_query->set( 'posts_per_page', 12 );
    endif;
}
add_action( 'pre_get_posts', 'alex_override_query' );
```

Il y a plusieurs choses à prendre en compte pour faire ça correctement :

    Cibler la requête principale seulement

Il va falloir tout d’abord faire quelques tests avant de modifier les paramètres. Comme pre_get_posts se lance pour toute WP Query, on va contrôler en tout premier lieu qu’on a bien affaire à notre requête principale (et non pas une requête personnalisée comme on a vu au cours précédent).

Pour cela on utilise la méthode is_main_query(). Mais ce n’est pas tout !

    Cibler la bonne requête grâce aux conditionals tags

Comme notre hook se lance pour absolument toute WP Query de notre site, il va également falloir contraindre à seulement celle voulue. Dans notre exemple, la requête lancée dans notre portfolio.

Et pour cela il va falloir faire appel à notre Template Hierarchy. Si vous vous rappelez bien ce cours, on a vu qu’on pouvait créer une page archive-portfolio.php qui serait utilisée pour afficher la liste de mes projets du Portfolio.

![](https://capitainewp.io/wp-content/uploads/2019/02/template-hierarchy-cpt-1.png.webp)

Pour écrire notre contrainte, on va donc utiliser les conditional tags, que l’on a également vu précédemment.

Et dans notre exemple c’est is_post_type_archive( 'portfolio' ) qui va nous être utile.

Si on avait voulu cibler la page d’accueil, on aurait utilisé à la place is_front_page(), et ainsi de suite.

    Modifier les paramètres de la requête

C’est grâce à la fonction $wp_query->set() que l’on va pouvoir ajouter, ou modifier des paramètres existants. Utilisez cette fonction autant de fois que vous avez de paramètre à personnaliser.

```php
<?php 
$wp_query->set( 'posts_per_page', 12 );
$wp_query->set( 'order', 'ASC' );
$wp_query->set( 'author_name', 'maxime' );
```

Du coup, vous allez pouvoir modifier n’importe quel paramètre de la requête, les mêmes paramètres que l’on a vu dans le cours précédent et qui sont listés dans la documentation officielle :  <https://developer.wordpress.org/reference/classes/wp_query/>

## Comment savoir quels sont les paramètres de la requête initiale de WordPress ?

WordPress a donc défini lui même quels étaient les paramètres de sa WP Query, les query vars, en fonction du template choisi par le Template Hierarchy.

Si vous êtes curieux de connaitre la valeur de ces paramètres, voici le code pour les afficher :

```php
<?php
function alex_override_query( $wp_query ) {
  var_dump( $wp_query->query_vars );
}
add_action( 'pre_get_posts', 'alex_override_query' );
```

Cela peut-être pratique pour mieux comprendre ce que WordPress va chercher dans une page, ou vous aider à débugguer une WP Query qui ne se comporte pas comme prévu.

Que ce soit pour ajouter un filtre dans une page existante, ou récupérer des données d’une autre page, la WP Query est votre alliée idéale et vous fournit toutes les options pour vous simplifier la vie. Vous n’aurez donc jamais besoin en théorie de faire une requête SQL à la base de données directement.
