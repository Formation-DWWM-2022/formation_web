# Créer des requêtes personnalisées avec la WP Query

La WP Query est une classe du coeur de WordPress que l’on va pouvoir utiliser pour lancer des requêtes personnalisées. Son but ? Récupérer les données de notre choix, comme par exemple les derniers articles ou une page en particulier, grâce à différents critères mis à notre disposition.

Si vous êtes dans le cas où vous avez une page standard, dans laquelle vous aimeriez faire une zone qui afficherait les 3 derniers articles, alors la WP Query est faite pour vous !

Voici ce que je peux vous dire de la WP Query :

> La WP Query est une classe PHP WordPress permettant d’effectuer une requête pour récupérer des données spécifiques du CMS sans écrire une requête SQL. En fournissant des paramètres parmis plus de 100 proposés, il est possible de demander n’importe quelles publications triées selon certains critères comme l’auteur, la date de publication, le nombre de commentaires, le statut de publication, la catégorie et permet même de choisir le nombre de résultats et leur ordre d’affichage. La WP Query est tout d’abord utilisée par le coeur de WordPress lorsqu’il affiche les pages, mais elle est également disponible aux développeurs pour créer leurs propres requêtes complémentaires.

Ce qu’il faut retenir, c’est que cette WP Query est un élément essentiel de WordPress, utilisée en interne, mais également disponible pour les développeurs !

Et ça tombe bien, car on en aura régulièrement besoin dans nos thèmes.

## Dans quels cas utiliser la WP Query dans son thème ?

Imaginons que vous concevez une belle page d’accueil, avec plusieurs sections, et qu’à un moment, vous souhaitez afficher les 3 derniers articles du blog :

![](https://capitainewp.io/wp-content/uploads/2020/03/wordpress-wp-query.jpg.webp)

Les sections en vert représentent le contenu de la page. En plein milieu, on voudrait insérer une section (en jaune) affichant les 3 derniers articles parus.

Nativement, WordPress ne vous permet pas de le faire. Soit vous affichez les derniers articles seulement, en plaçant le blog en page d’accueil, soit vous définissez une page qui affichera un contenu “statique”.

La solution réside donc dans l’intégration d’une WP Query au sein de votre modèle de page.

Mais en utilisant le bloc “Derniers articles” de Gutenberg, je pourrais le faire non ?

C’est vrai, mais ce bloc est très limité en terme de données affichées, et de style ! Du coup, on va privilégier l’approche à la main !

Au delà des articles, la WP Query marche pour tous les types de publication. Vous pourriez alors vous en servir pour différents cas de figure : comme par exemple afficher les dernières recettes sur un site de cuisine, ou encore les formations disponibles sur un site e-learning (et c’est d’ailleurs ce que j’ai fait sur ce site)…

Au fur et à mesure, vous vous rendrez compte qu’il existe de nombreux cas dans lesquels elle vous sera utile. À tel point que j’en ai eu l’utilité sur tous mes projets, sans exception !

> Il faut voir WordPress comme un framework qui vous fournit tous les outils nécessaires pour vous aider à créer votre thème. Du coup, il est très peu probable que vous ayez besoin de manipuler directement la base via SQL.

Dans la suite de ce cours on va par utiliser la WP Query pour faire nos requêtes sur mesure, et on verra dans le prochain cours comment modifier celle qui a permis de générer la page affichée.

## Créer sa propre requête grâce à la WP Query

On va maintenant créer notre propre requête, et pour cela on va procéder en 4 étapes. Voici le code PHP correspondant, qu’il faudra placer dans le modèle de votre page (par exemple front-page.php), à l’endroit où vous souhaiter afficher le contenu.

Pour savoir quel modèle utiliser, il faudra se référer au Template Hierarchy, que l’on a vu plus tôt dans cette formation.

```php
<?php 
// 1. On définit les arguments pour définir ce que l'on souhaite récupérer
$args = array(
    'post_type' => 'post',
    'category_name' => 'films',
    'posts_per_page' => 3,
);

// 2. On exécute la WP Query
$my_query = new WP_Query( $args );

// 3. On lance la boucle !
if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
    
    the_title();
    the_content();
    the_post_thumbnail();

endwhile;
endif;

// 4. On réinitialise à la requête principale (important)
wp_reset_postdata();
```

## 1 • Les paramètres (query vars)

Les paramètres sont les critères qui vont nous permettre de filtrer les résultats que l’on souhaite obtenir. Ils sont passés sous forme de tableau PHP (array) à notre requête. Il en existe plus d’une cinquantaine différents et on les appelle les query vars.

Vous allez donc pouvoir trier vos résultats par type de publication, date, auteur, catégorie, mais aussi choisir l’ordre d’affichage…

Pour s’y retrouver, il faut impérativement consulter la documentation officielle de la WP Query : <https://developer.wordpress.org/reference/classes/wp_query/>

C’est le genre de ressources qui, comme le template hierarchy, aurait tout intérêt à finir dans les favoris de votre navigateur.

Dans l’exemple ci-dessus, j’ai indiqué 3 paramètres ou query vars :

- Le type de publication doit être un article (post). J’aurais pu choisir une page, ou tout autre type de publication (custom post type) que vous auriez créé.
- La catégorie doit être un film. category_name permet de chercher via le slug de la catégorie, mais j’aurais pu tout autant indiquer l’ID en utilisant cat.
- Et enfin le nombre d’articles à récupérer est défini par posts_per_page, et je l’ai défini à 3.

Plus vous utiliserez de paramètres et plus vous allez pouvoir préciser votre besoin.

## 2 • La requête

Une fois les paramètres définis, on lance la classe PHP WP_Query() via le mot clé new. Et on passe nos paramètres en argument. WordPress s’occupe du reste : il va notamment générer lui-même la requête SQL. Notre classe est stockée dans la variable que j’ai appelée $my_query.

## 3 • La boucle

Ensuite, on va lancer une boucle WordPress, de la même manière qu’on lance la boucle principale dans nos templates. Il y a une petite différence tout de même puisque on ajoute le préfixe $my_query.

```php
<?php 
// Boucle principale de WordPress
if( have_posts() ) : while( have_posts() ) : the_post();

// Boucle pour une WP Query sur mesure
if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
```

Dans cette boucle, on a utilise les mêmes templates tags que dans la boucle principale, tels que the_title(), the_content()… Notre requête personnalisée a donc en quelques sorte écrasé la requête principale !

## 4 • La réinitialisation

Du coup comment faire pour y revenir lorsqu’on en a fini avec notre WP Query personnalisée ? Eh bien on va utiliser la fonction wp_reset_postdata().

Qu’est-ce qu’il se passe concrètement dans WordPress à ce moment là ?

Au début de notre boucle, the_post() initialise les fonctions comme the_title() et the_content(), qui afficheront les données de notre requête.

Mais une fois qu’on en a terminé, il faut revenir à la boucle principale afin d’accéder à nouveau aux données originales de la page. Heureusement, WordPress a gardé ces informations de côté et on les retrouve grâce à wp_reset_postdata().

```php
<?php 
get_header();

// Boucle principale
if( have_posts() ) : while( have_posts() ) : the_post(); 
 the_title(); // Titre de la page
 
 $my_query = new WP_Query( array( 'post_type' => 'post' ) );
 
 // Boucle personnalisée
 if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : 
  $my_query->the_post();
        
  the_title(); // Titre de chaque article
        the_content(); // Contenu de chaque article

 endwhile; endif;
 wp_reset_postdata(); // On réinitialise les données

 the_content(); // Contenu de la page

endwhile; endif;
get_footer();
```

Je ne vous cache pas que c’est un peu de gymnastique, puisqu’on imbrique notre boucle dans la boucle principale. C’est la manière dont est conçu WordPress qui apporte cette complexité inutile mais on verra plus tard qu’en utilisant Timber, on n’aura plus ce souci.

> N’oubliez donc jamais de terminer vos requêtes personnalisées par wp_reset_postdata afin de retourner dans la boucle principale.

## Les paramètres les plus courants de la WP Query

On va maintenant voir les paramètres les plus courants de la WP Query, ceux dont vous serez le plus susceptible d’utiliser au quotidien. Je ne vais pas tous vous les montrer, car il en existe un sacré nombre ! D’ailleurs il suffit de voir la hauteur de la page de la documentation officielle pour s’en rendre compte. <https://developer.wordpress.org/reference/classes/wp_query/>

## Filtrer par type de publication

En général lorsqu’on veut récupérer des données, c’est dans un type de publication en particulier : on va alors vouloir récupérer en particulier des articles, une page, ou bien tout autre custom post type créé par vos soins comme on a pu l’apprendre précédemment.

```php
<?php 
$args = array(
 'post_type' => 'portfolio', // post, page, portfolio …    
);
$query = new WP_Query( $args );
```

## Faire une recherche

Vous pouvez également lancer une recherche avec un mot-clé. Pour cela il faut utiliser le paramètre s. WordPress s’occupera ensuite de chercher une occurence dans le contenu ou le titre de la publication. Vous pourriez également limiter la recherche à un type de publication en particulier, et non pas sur tout le site.

```php
<?php 

$keyword = sanitize_text_field( $_GET['keyword'] );
$args = array(
 's' => $keyword, // Mot clé à rechercher
    'post_type' => 'post', // Articles seulement (pas les pages)
);
$query = new WP_Query( $args );
```

## Ordre d’affichage

En plus du filtre, on aura souvent besoin de ranger les résultats dans un certain ordre, et pour cela on a deux paramètres à notre disposition :

- order permet de choisir si on veut un rangement ascendant ou descendant (123 ou 321) ;
- orderby permet de choisir sur quelle donnée faire ce tri : le titre, la date, le nombre de commentaires, ou même sur la valeur d’un champ personnalisé (champ ACF compris).

```php
<?php 
$args = array(
 'order' => 'DESC', // ASC ou DESC 
    'orderby' => 'date', // title, date, comment_count…
);
$query = new WP_Query( $args );
```

Dans cet exemple je récupère les articles, par ordre chronologique du plus récent au plus ancien.

## Rangement basé sur un champ ACF

Imaginons maintenant que votre article possède un champ ACF Note, comme on l’a vu quand on a créé un système de notation de jeu vidéo via ACF. Votre objectif étant récupérer les 5 jeux les mieux notés. Voici à quoi ressemble notre array de paramètres :

```php
<?php 
$args = array(
    'post_type' => 'post', // type de publication
    'category_name' => 'jeux-video', // Slug de la catégorie
 'order' => 'DESC', // De la meilleure note à la moins bonnte
    'orderby' => 'meta_value', // Rangé selon un champ personnalisé
    'meta_key' => 'note', // C'est ici qu'on indique quel est ce champ
    'posts_per_page' => 5 // 5 articles
);
$query = new WP_Query( $args );
```

Pas mal non ? Avec les bons paramètres, la WP Query nous permet d’aller très loin et récupérer tout ce dont on a besoin.

## Limiter le nombre de résultats et pagination

Par défaut, la requête vous renvoie le nombre d’articles définis dans Réglages > Lecture, donc 10 si vous n’avez pas touché à ce paramètre. Si je les avais tous voulus, j’aurais indiqué -1.

```php
<?php 
$args = array(
    'posts_per_page' => get_option( 'posts_per_page'), // Valeur par défaut
    'posts_per_page' => 5, // 5 articles
    'posts_per_page' => -1, // tous les articles
);
$query = new WP_Query( $args );
```

Il existe également le paramètre offset qui permet de gérer une pagination. Il permet de dire par exemple : je veux 10 articles mais en commençant à la page 3 . On obtiendra alors les articles 21 à 30.

```php
<?php 
$args = array(
    'posts_per_page' => 10, // 10 articles
    'offset' => 20, // à partir du vingtième
);
$query = new WP_Query( $args );
```

Grâce à cela vous pouvez créer facilement une pagination. Il suffirait d’un bouton page suivante avec une valeur qui s’incrémente de 10 en 10, et passée en paramètre GET.

```php
<?php 
$per_page = 10;
$offset = $_GET['page'] ?? 0; // On récupère le paramètre GET dans l'URL

$args = array(
    'posts_per_page' => $per_page, 
    'offset' => $offset,
);
$query = new WP_Query( $args );
?>
<a href="<?php echo home_url( '?page=' . $offset + $per_page ); ?>">Page suivante</a>
```

## Requêtes sur les dates

On peut également faire des requêtes très poussées sur les dates. On peut par exemple récupérer un article publié dans un intervalle précis, ou publié avant ou après telle date. 

```php
<?php
$args = array(
    'date_query' => array(
        array(
            'after'     => 'January 1st, 2020',
            'before'    => array(
                'year'  => 2021,
                'month' => 12,
                'day'   => 31,
            ),
            'inclusive' => true,
        ),
    ),
);
$query = new WP_Query( $args );
```

Il y a plusieurs façons d’écrire les dates : vous pourriez l’écrire à l’américaine (comme dans le after), ou en distinguant l’année, le mois et le jour (comme dans le before). Vous pourriez même utiliser des dates relatives comme 1 year ago (il y a un an). Référez-vous à la section dates de la documentation pour plus d’exemples. https://developer.wordpress.org/reference/classes/wp_query/#date-parameters

## Requêtes sur les champs personnalisés (dont ACF)

On a vu comment ranger nos résultats via une valeur contenue dans un champ ACF, mais on va pouvoir aller encore plus loin, et carrément filtrer les articles en fonction de valeurs contenues dans nos champs. 

```php
<?php 
$args = array(
    'post_type' => 'post',
    'category' => 'jeux-video',
    'meta_key' => 'prix', // nom du champ personnalisé
    'meta_value_num' => 20, // ou meta_value pour tester un texte
    'meta_compare' => '<' // < > != >= <=
);
$query = new WP_Query( $args );
```

Dans cet exemple je souhaite récupérer seulement les jeux vidéos dont le prix est inférieur à 20€.

Et on va même aller encore plus loin grâce à la possibilité d’en cumuler plusieurs ! Mais dans ce cas l’écriture sera un peu plus complexe : on va utiliser une meta_query :

```php
<?php
$args = array(
    'post_type'  => 'post',
    'category' => 'jeux-video',
    'meta_query' => array(
        'relation' => 'AND', // Toutes les conditions doivent être réunies
        array(
            'key'     => 'prix',
            'value'   => array( 20, 49 ),
            'type' 	  => 'numeric',
            'compare' => 'BETWEEN',
        ),
        array(
            'key' => 'note',
            'value'   => 16,
            'type'    => 'numeric',
            'compare' => '>',
        ),
    ),
);
$query = new WP_Query( $args );
```

Alors qu’est-ce qu’on récupère ici selon vous ? On a demandé des jeux vidéo dont le prix serait situé entre 20 et 49€, ET dont la note serait supérieure à 16/20.

En changeant la relation pour OR, on aurait plutôt récupéré les jeux répondant au minima à l’une des 2 conditions.

Bien sûr, si vous testez une requête aussi restrictive, pensez à vérifier que vous avez bien des articles qui correspondent à tous ces critères en même temps, au risque sinon de ne rien voir s’afficher.

Dans ce cas on commence à aller dans des logiques de tableaux et sous-tableaux, et du coup attention à ne pas se tromper dans l’écriture de votre requête !

> La WP Query permet de faire des requêtes sur les champs ACF sans souci de compatibilité, ce qui vous ouvre tout un champ des possibles.

## Comment connaitre le nombre d’articles retournés par la WP Query ?

Une fois votre WP Query effectuée, vous aurez peut-être des fois besoin d’afficher le nombre de résultats trouvés. On peut pour cela utiliser la méthode found_posts. 

```php
<?php 
$args = array(
    'post_type' => 'post'
);
$my_query = new WP_Query( $args );
echo $my_query->found_posts . " articles trouvés"; 
```

La WP Query est un élément essentiel du coeur de WordPress, et un outil très utile pour le développeur de thèmes. Dans la pratique, on l’utilise très régulièrement même si parfois on préférera utiliser le champ relationnel d’ACF.

Dans le prochain cours, on va voir cette fois comment modifier la WP Query utilisée par WordPress pour générer une page, dans le cas où l’on aurait besoin de rajouter des filtres avant le chargement de la page.