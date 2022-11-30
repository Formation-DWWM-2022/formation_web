# Le champ relationnel d’ACF

Le champ relationnel d’ACF est l’un des plus intéressants de l’extension. Il permet au rédacteur de choisir manuellement une liste de publications et leur ordre d’affichage, là où une WP Query est limitée par des critères.

## Présentation du champ relationnel

Le champ relationnel est un champ que j’ai mis longtemps à appréhender, et c’est bien dommage car il m’est utile sur presque tous mes projets aujourd’hui.

Je vais vous apprendre à créer une requête personnalisée au travers d’une WP Query. Cela permet par exemple de lister les 4 dernières publications sur la page d’accueil d’un site.

Et grâce aux nombreux critères on peut définir exactement ce que l’on veut : quel type de publication, quel ordre (ascendant ou descendant) et comment trier (par date, par ordre alphabétique, par nombre de commentaires…).

Un jour, alors que je venais de finir un site pour un client, celui-ci m’a demandé s’il pouvait sélectionner manuellement les 4 biens immobiliers qui étaient affichés sur la page d’accueil.

J’étais bien embêté car ma WP Query récupérait les 4 les plus récents. C’est alors que j’ai découvert l’utilité du champ relationnel d’ACF !

Il permet de faire une sélection manuelle de publications à afficher dans une page. Voici comment il se présente :

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-relationnel-1600x368.jpg.webp)

À gauche se trouve la liste des publications disponibles, et lorsqu’on clique sur l’une d’entre-elle, elle vient s’ajouter à la sélection à droite. Il est possible de glisser-déposer les éléments de cette sélection pour définir leur ordre d’affichage.

Le champ relationnel possède également un moteur de recherche et 2 champs pour filtrer les résultats : le premier pour sélectionner le type de publication et le second pour la taxonomie.

![](https://capitainewp.io/wp-content/uploads/2020/05/affichage-donnees-relationnel-1600x1000.jpg.webp)

Au niveau du template, on aura une boucle ACF qui nous permettra de récupérer les résultats, et les afficher comme on le souhaite.

On va voir 2 cas de figures : le premier, tout simple, permettra de faire un système d’articles similaires, et pour le second on verra une relation à double sens entre des agences de voyage et des destinations.

## Cas n°1 : articles similaires

Dans ce premier exemple, on va faire un système d’articles similaires. Nos articles seront en réalité des recettes de cuisine. J’aurais pu créer un type de publication personnalisé juste pour ça, mais on va rester simple et utiliser les articles natifs.

Le but est de pouvoir sélectionner d’autres recettes à proposer à la fin d’un article. Si par exemple on propose un gâteau au chocolat, on choisira alors d’afficher d’autres recettes à base de chocolat.

Une WP Query aurait pu cependant faire le travail : en utilisant des taxonomies pour lister les ingrédients, on aurait pu faire une requête personnalisée pour récupérer 3 autres recettes avec l’étiquette « chocolat ».

Mais du coup on n’aurait pas le choix des recettes à afficher, ni leur ordre. Le champ relationnel va nous permettre de dépasser ces limites.

## Configuration du groupe de champs

Pour commencer on va créer un nouveau groupe de champs dans lequel on va ajouter un champ relationnel avec pour slug related.

En terme d’options, on va cocher « Image à la Une » pour afficher l’image mise en avant de la recette à l’intérieur du champ, comme ça ce sera plus sympa visuellement.

![](https://capitainewp.io/wp-content/uploads/2020/05/options-champ-relationnel-1600x1001.jpg.webp)

On verra dans le prochain cas que l’on peut filtrer sur un type de publication en particulier ainsi que sur des taxonomies. Mais pour l’instant, on va les désactiver car on n’a qu’un seul type de publications : les recettes (ou plutôt, les articles).

Il est également possible de contraindre un nombre minimum et maximum d’éléments. On va limiter à 3 recettes afin de les afficher en colonnes.

Enfin, on laisse le format de sortie en « Objet Publication » car c’est le plus simple à manipuler dans le template.

On va en profiter pour ajouter un autre champ « Temps de préparation » qui est un simple champ texte.

> ACF s’avère particulièrement utile pour des publications comme les recettes de cuisine où l’on pourrait ajouter une liste d’ingrédients via un répéteur, mais aussi des données complémentaires comme la difficulté, le temps de préparation, la cuisson…

Mais pour cet exemple on va rester simple et on ajoute un seul champ.

Pour terminer, on va assigner ce groupe de champs au type de publication Article. C’est déjà la condition par défaut dans ACF donc on n’a normalement rien besoin de toucher.

Pour en savoir plus sur les réglages du champ relationnel, référez-vous à la documentation : https://www.advancedcustomfields.com/resources/relationship/

## Préparer les données

Maintenant, rendez-vous dans Articles > Ajouter et écrivez quelques recettes. Je crée en dernier celle du quatre-quarts au chocolat, et j’assigne des recettes similaires : cookies, brownie… mmh !

![](https://capitainewp.io/wp-content/uploads/2017/06/champ-relationnel-article-1600x1001.jpg.webp)

J’en profite pour saisir un temps de préparation pour chacune d’entre-elles. Tout est prêt, on va pouvoir aller s’occuper de notre template.

## Afficher les données dans le modèle

Puisqu’on est resté dans les articles, c’est la page single.php que l’on va modifier, conformément au template hierarchy de WordPress.

```php
<?php 
  $posts = get_field( 'related' ); // Slug du champ relationnel
  if( $posts ): 
?>
    <h2>Vous aimerez aussi</h2>
    <ul class="related">
        <?php 
            foreach( $posts as $post ): // Le nom $post est IMPORTANT
                setup_postdata( $post ); // Initialiser les données (comme la boucle WP)
        ?>
            <li class="related__post">
                <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'large' ); ?>
                    <h3><?php the_title(); ?></h3>
                    <p>Préparation : <?php the_field( 'duration' ); ?></p>
                </a>
            </li>
        <?php 
        	endforeach; 
        	wp_reset_postdata(); // IMPORTANT – réinitialise $post
        ?>
    </ul>
<?php endif; ?>
```

Tout d’abord, on récupère les données de notre champ related. On est sur le même principe de boucle que pour la galerie ou le répéteur.

Dans chaque itération de la boucle, on utilise la fonction WordPress setup_postdata() qui permet d’initialiser les données. C’est grâce à elle qu’on va pouvoir utiliser the_title(), the_content()…

> Cette fonction est également utilisée par la boucle WordPress, c’est elle qui permet d’initialiser les données pour utiliser nos templates tags.

On en profite pour afficher le temps de préparation de chaque recette, via la fonction ACF the_field().

> La fonction the_field() fonctionne même en dehors de la publication originale. Vous pouvez donc afficher des données ACF dans une WP Query par exemple.

On rajoute enfin un peu de CSS avec du flex pour établir nos 3 colonnes, et le tour est joué ! 

```css
.related {
  list-style-type: none;
  padding: 0;
  display: flex;
  margin: 0 -20px;
}

.related__post {
  flex: 1;
  padding: 0 20px;
}

.related__post a {
  text-decoration: none;
}

.related__post h3 {
  margin: .5em 0 1em;
}

.related__post + .related__post {
  border-left: 1px solid #EBEBEB;
}
```

Lorsque j’affiche mon quatre quart au chocolat, je devrais voir s’afficher les recettes sélectionnées à la fin de l’article !

![](https://capitainewp.io/wp-content/uploads/2020/05/affichage-donnees-relationnel-1600x1000.jpg.webp)

Le champ relationnel est donc très puissant pour créer un maillage interne fort dans votre site, ce qui a une importance capitale pour le référencement naturel, en plus de proposer des suggestions sympathiques à vos internautes.

Vous pourriez l’utiliser pour des produits similaires dans une boutique, mais WooCommerce propose déjà cette fonctionnalité.

## Cas n°2 : agences de voyages et destinations

On va maintenant voir un deuxième cas parce que j’ai encore une petite subtilité à vous montrer concernant ce champ relationnel.

Imaginons que vous présentiez sur votre site d’un côté des agences de voyage, et d’un autre des destinations. Chaque élément étant un type de publication à part entière, ou CPT.

Dans la page d’une agence, on va présenter les destinations disponibles en utilisant justement un champ relationnel. Jusque là tout va bien, on sait faire.

Maintenant, ce que je veux également, c’est que dans une page destination, on puisse voir la liste des agences proposant ce pays.

On va donc devoir faire appel à une requête inversée (une reverse query) pour retrouver les agences ayant cette destination dans leur champ relationnel. Et en fait, c’est moins compliqué que ce qu’on pourrait croire !
Préparer les CPT

Pour commencer on va déclarer nos types de publication à partir du fichier functions.php :

```php
<?php 
function capitaine_register_post_types() {
  
    // Agences (pour le champ Relationnel)
    $labels = array(
        'name' => 'Agences',
        'menu_name' => 'Agences'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'menu_position' => 6,
        'menu_icon' => 'dashicons-store',
    );

    register_post_type( 'agency', $args );

    // Destinations (pour le champ Relationnel)
    $labels = array(
        'name' => 'Destinations',
        'menu_name' => 'Destinations'
    );

    $args = array(
        …
        'menu_icon' => 'dashicons-palmtree',
    );

    register_post_type( 'country', $args );
}
add_action( 'init', 'capitaine_register_post_types' );
```

Suite à ça, il faut bien penser à aller dans Réglages > Permaliens et cliquer sur le bouton Enregistrer, sans rien changer, pour mettre à jour la structure des URL de WordPress.

Les deux menus Agences et Destinations devraient apparaitre dans le menu de l’admin. Vous pouvez déjà commencer par ajouter quelques destinations.

![](https://capitainewp.io/wp-content/uploads/2020/05/cpt-relationnel-1600x1003.jpg.webp)

Pour chacune d’entre elles, un titre et une image mise en avant trouvée sur Unsplash suffiront.

On va également créer les fichiers de templates correspondants, comme single-agency.php et single-country.php. En temps normal on devrait également créer les pages archive mais on n’en aura pas besoin dans cet exemple.

## Configuration du groupe de champs

On va aller créer notre groupe de champ et, ici, pas de surprise, ce sera un simple champ relationnel avec pour slug « destinations ».

Au niveau des réglages je vais filtrer les types de publication disponibles, pour ne garder que les destinations. J’en profite pour retirer les sélecteurs de type de publication et de taxonomie.