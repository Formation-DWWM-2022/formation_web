# Les champs personnalisés : custom fields

Les champs personnalisés permettent d’ajouter des informations dans une publication en plus du contenu principal. L’interface des custom fields est cependant très limitée, c’est pour cela qu’à terme on basculera sur un outil comme ACF.

## Quelle est l’utilité des champs additionnels ?

Pour ce cours je vais reprendre l’exemple du blog de jeux vidéo. Imaginons que l’on veut faire des tests de jeux, et qu’à la fin de l’article on veuille donner une note, un avis, ainsi que les plus et les moins. Un peu comme on le voit sur tous les sites de tests en quelques sortes :

![](https://capitainewp.io/wp-content/uploads/2019/02/test-jeu-768x717.jpg.webp)

Alors, aujourd’hui on pourrait très bien créer des blocs spécifiques avec Gutenberg.

Oui mais voilà, parfois ces informations n’apparaitront pas dans la zone « principale », mais peut-être ailleurs dans le design du site (par exemple en sidebar). Du coup dans ce cas, on sera obligé de faire appel aux champs additionnels.

## Activer les champs additionnels dans WordPress

Par défaut l’interface des champs additionnels est cachée. Dans votre éditeur visuel allez dans le menu 3 points en haut à droite, puis Options, et enfin cochez Champs personnalisés.

![](https://capitainewp.io/wp-content/uploads/2019/02/activer-custom-fields.jpg.webp)

L’interface des champs va alors apparaitre en bas de page et ressemble à ceci :

![](https://capitainewp.io/wp-content/uploads/2019/02/interface-custom-fields-1600x1125.jpg.webp)

Le fonctionnement est simple, et se base sur un duo clé / valeur : cliquez sur le bouton Saisissez-en un nouveau (comme on n’en n’a pas pour le moment), et indiquez par exemple note dans nom, et 7 dans Valeur.

Ajoutez un nouveau champ pour les plus, ainsi que pour les moins, et enfin l’avis.

![](https://capitainewp.io/wp-content/uploads/2019/02/saisie-custom-fields-1600x1116.jpg.webp)

Bon, autant dire que c’est très limité, on ne peut même pas faire de mise en forme du texte, ni même de liste à puce pour nos plus/moins.

## Et sinon, il n’y a pas un peu mieux ?

Nativement, WordPress ne nous permet pas d’aller plus loin, on pourrait créer nos propres champs à la main, mais on va voir plus tard qu’avec l’extension ACF (Advanced Custom Fields) on va pouvoir créer des champs additionnels bien plus sexy et fonctionnels !

Et ce n’est pas pour rien que cette extension est devenue incontournable chez les développeurs de thèmes !

> Je vous conseille d’attendre les cours sur l’extension ACF pour faire vos champs additionnels. On verra que sa prise en main est facile et ses possibilités illimitées.

Pour les plus impatients d’entre vous, vous pouvez vous rendre directement sur le cours dédié à la prise en main d’ACF.

## Afficher le contenu de vos champs additionnels

Maintenant que l’on a ajouté nos champs additionnels dans l’éditeur de WordPress, il va falloir les afficher dans notre template.

L’avantage, c’est qu’on va pouvoir les afficher où bon nous semble (et même en dehors de la boucle WordPress si on veut). Pour cela, on va utiliser la fonction get_post_meta() dans single.php ou même dans archive.php :

```php
<?php the_content(); ?>
<p>
    <strong>Avis :</strong> 
    <?php echo get_post_meta( get_the_ID(), 'avis', true ); ?>
</p>

<p>
    <strong>Note :</strong>
    <?php echo get_post_meta( get_the_ID(), 'note', true ); ?> / 10
</p>

<div class="plus-moins">
    <div class="plus">
        <?php echo get_post_meta( get_the_ID(), 'plus', true ); ?>
    </div>
    <div class="plus">
        <?php echo get_post_meta( get_the_ID(), 'moins', true ); ?>
    </div>
</div>
```

Le premier paramètre est l’identifiant de l’article, que l’on récupère pour l’article en cours grâce à la fonction get_the_ID(). Notez du coup qu’on pourrait très bien récupérer la valeur d’un autre article en fournissant un autre identifiant.

Le second paramètre est le nom de la meta que l’on a indiqué dans l’interface des champs personnalisés : avis, note, plus, moins…

Enfin, le troisième paramètre est un booléen qui, passé à true, permet de dire que la valeur de ce champ est unique pour l’article (il n’y aura pas 2 notes par exemple). Si on la passe à false, la meta renvoyée sera alors un tableau, et non pas une simple chaine.

Ça aurait d’ailleurs pu être utile pour nos plus/moins : un plus = un champ. Mais ne compliquons pas les choses pour le moment car ce sera bien plus simple avec ACF.

D’un point de vue technique, on appelle cela des Post Meta (des méta données de l’article) et elles sont stockées dans la table wp_postmeta de la base de données du site.

![](https://capitainewp.io/wp-content/uploads/2019/02/post-meta-database-1600x756.jpg.webp)

Pour plus d’informations concernant les Post Metas, je vous invite à consulter la documentation officielle : https://developer.wordpress.org/reference/functions/get_post_meta/

Vous connaissez maintenant les champs additionnels, mais vous savez surtout que c’est grâce à l’extension ACF que l’on va pouvoir aller bien plus loin en ce qui concerne les custom fields.