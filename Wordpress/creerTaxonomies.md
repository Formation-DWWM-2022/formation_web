# Créer des Taxonomies

Pour classer les publications de nos Custom Post Types, on peut créer de nouvelles Taxonomies. Du coup, on n’est pas cantonné aux Catégories et aux étiquettes. Dans ce cours on va apprendre à déclarer des taxonomies et les assigner à nos types de publication.

Les taxonomies permettent de classer vos publications afin que vos internautes puissent filtrer un certain type seulement. Les catégories et étiquettes sont présentes par défaut et rattachées aux articles, mais on va bien sûr voir tout de suite comment créer les nôtres :

## Déclarer une taxonomie

Je continue sur l’exemple du Portfolio, dans lequel j’aimerais trier mes créations, par exemple : Photos, Vidéos, Web, 3D, Peinture…

C’est un peu des catégories en fait, mais comme cette taxonomie est déjà utilisée pour les articles, je vais en créer une nouvelle que j’appellerai Types de Projets.

## Où et comment la Déclarer ?

Pour déclarer une nouvelle taxonomie on utilise la fonction register_taxonomy() que l’on place dans le functions.php, à la suite de la déclaration du Custom Post Type :

```php
<?php 
function capitaine_register_post_types() {
 $labels = array( … );
    $args = array( … );
    
    register_post_type( 'portfolio', $args );
    
    // Déclaration de la Taxonomie
    $labels = array(
        'name' => 'Type de projets',
        'new_item_name' => 'Nom du nouveau Projet',
     'parent_item' => 'Type de projet parent',
    );
    
    $args = array( 
        'labels' => $labels,
        'public' => true, 
        'show_in_rest' => true,
        'hierarchical' => true, 
    );

    register_taxonomy( 'type-projet', 'portfolio', $args );
}
add_action( 'init', 'capitaine_register_post_types' );
```

On retrouve la même logique que pour les CPT. Étudions les différents paramètres :
Paramètres des taxonomies

## Les intitulés

Là aussi, il y a pleins de libellés disponibles mais on pourrait se cantonner seulement au nom. Consultez la documentation pour obtenir toute la liste des intitulés de taxonomie.

## Public

Afin que notre taxonomie soit visible publiquement sur le site, on passe cette valeur à true. Il faut également penser à mettre show_in_rest pour la voir apparaître dans l’éditeur visuel (Gutenberg).

## Comportement comme des catégories ou comme des étiquettes ?

C’est le paramètre le plus important. Souhaitez-vous que votre taxonomie soit hiérarchique, comme les catégories, avec des termes prédéfinis à l’avance, où plutôt volatile, comme les étiquettes ?

![](https://capitainewp.io/wp-content/uploads/2019/01/taxonomies-wordpress-1600x805.jpg.webp)

En ce qui concerne notre exemple, Types de projets, on va choisir hiérarchique : nos thèmes seront prédéfinis à l’avance et ne devraient pas trop bouger.

D’expérience, c’est le mode hiérarchique que l’on choisit dans une grande majorité des cas.

## Assigner la taxonomie à un ou plusieurs CPT

Maintenant, il ne nous reste plus qu’à déclarer notre taxonomie grâce à la fonction register_taxonomy(). Le premier paramètre est le slug de la taxonomie, le second celui du CPT et en troisième, les paramètres définis auparavant.

Mais il est également possible de l’assigner à plusieurs types de publication en même temps, même si on le fait rarement :

```php
<?php 

// Assigner à un CPT
register_taxonomy( 'type-projet', 'portfolio', $args );

// Assigner à plusieurs CPT
register_taxonomy( 'type-projet', array( 'portfolio', 'autre' ), $args );
```

## Afficher les taxonomies dans vos templates

Bien ! Il va falloir quelques termes dans cette taxonomie, et pour cela vous pouvez :

- Soit les créer via Portfolio > Types de projets ;
- Soit les créer directement lors de l’édition d’un projet.

![](https://capitainewp.io/wp-content/uploads/2017/06/ajouter-terme-taxonomie-1600x849.jpg.webp)

On va maintenant afficher notre taxonomie dans le template correspondant, soit dans `archive-portfolio.php` ou `single-portfolio.php` :

```php
<!– Version simple –>
<?php the_terms( get_the_ID() , 'type-projet' ); ?>

<!– Contrôle de l affichafge avant / séparateur / après –>
<?php the_terms( get_the_ID() , 'type-projet', 'Type de projet :', ', ', '' ); ?>
```

Vous pouvez aussi définir ce qui va apparaître avant, après, et définir un séparateur (par défaut une virgule). En soit, le but est de n’assigner qu’un type à chaque projet. Voici le résultat :

![](https://capitainewp.io/wp-content/uploads/2019/02/cpt-taxonomy-1600x1182.jpg.webp)

> Pensez à rafraîchir là aussi votre structure des Permaliens afin d’éviter toute erreur 404 !

## Les taxonomies au service du tri / filtrage

Si vous utilisez une extension comme FacetWP ou WP Grid Builder pour filtrer et trier vos publications de manière avancée, alors les taxonomies s’avéreront être des alliées puissantes !

![](https://capitainewp.io/wp-content/uploads/2019/02/home-bigbox@2x-768x503.png.webp)

Mais si vous n’utilisez pas ce genre de système, essayez de ne pas créer trop de taxonomies : restez seulement sur celles strictement nécessaires.

Si vous êtes un maniaque du rangement, vous saurez apprécier les possibilités offertes par ces taxonomies !
