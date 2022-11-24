# Les templates de pages personnalisés

Dans ce cours nous allons aborder un moyen pour créer des templates personnalisés que le rédacteur pourra manuellement assigner à ses pages. Cela permettra de créer des mises en page complètement différentes pour chaque page du site.

Dans le cours sur le Template Hierarchy on a vu que l’on pouvait créer des templates spécialisés pour les pages en ciblant leur ID ou leur Slug :

![](https://capitainewp.io/wp-content/uploads/2017/05/template-page.png.webp)

Mais je vous ai également dit que ce n’était pas une bonne idée pour autant :

- L’ID peut changer si un rédacteur supprime puis recrée la page ;
- Le slug peut également changer si le rédacteur modifie l’URL de la page pour améliorer le référencement par exemple.

Du coup, on ne peut pas trop se fier à cette méthode. Comme vous vous en doutez, je vais vous proposer dans ce cours une alternative bien plus pérenne.

## Déclarer un template personnalisé

Dans un site moderne, les pages principales (accueil, services…) sont bien différentes, et plus complexes que des pages standard comme les mentions légales ou la page contact.

C’est pour cela que l’on va créer des fichiers templates qui leur seront dédiés.

Pour cela il suffit de créer un nouveau fichier, par exemple services.php et d’y indiquer :

```php
<?php
/*
  Template Name: Services
*/
 get_header();
 if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
 <h1><?php the_title(); ?></h1>
    <div class="content">
     <?php the_content(); ?>
    </div>
<?php
 endwhile; endif;
 get_footer();
?>
```

C’est le commentaire PHP Template Name qui permet à WordPress de détecter cette page comme un template !

Pour une meilleure organisation de vos fichiers, vous pouvez également mettre ce fichier dans un sous-dossier nommé templates par exemple. WordPress le trouvera tout aussi bien !

> Vérifiez qu’il n’y a pas d’espace entre Template Name et les deux points : sinon WordPress ne détectera pas votre modèle.

Ok super ! Maintenant rendez-vous dans l’administration WordPress, éditez une page et vous verrez apparaitre la section Modèle permettant de sélectionner votre template dans la barre latérale de l’éditeur visuel :

![](https://capitainewp.io/wp-content/uploads/2022/05/selection-template-personnalise-1600x682.jpg.webp)

Et voilà le travail ! Le seul souci avec cette méthode c’est qu’il faut bien penser à assigner manuellement ce template.

## Autoriser le template dans d’autres types de publication

On peut également autoriser la sélection de ces templates pour les articles ou autres types de publication (concept que l’on va aborder très bientôt).

On pourrait imaginer des mises en page différentes pour les articles. Prenons un blog de jeux vidéo : on pourrait se dire qu’un test d’un jeu pourrait avoir une apparence différente des actualités classiques.

Les thèmes premium utilisent cette technique pour proposer des articles standards, et des articles « full width » (pleine largeur).

Pour autoriser plusieurs types de publication, il faut ajouter une seconde ligne avec Template Post Type :

```php
<?php
    /*
    Template Name: Full-width
    Template Post Type: post, page, product
    */
    get_header(); 
?>
```

Pour cet exemple j’ai autorisé dans les articles (post), pages et même les produits (product) dans le cas où WooCommerce est installé.

Ces templates personnalisés vont nous être très utiles pour réaliser des sites dont chaque page peut avoir une apparence complètement différente.

Dans le prochain cours on va aborder cette fois les champs personnalisés afin d’ajouter des informations dans nos articles.
