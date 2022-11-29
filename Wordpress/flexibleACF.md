# Le champ flexible d’ACF

Le champ flexible c’est un peu un champ répéteur sous stéroïdes. Il va vous permettre non pas de répéter toujours les mêmes champs, mais de choisir parmi plusieurs dispositions de votre création. On pourrait même en faire un mini page-builder maison !

## Présentation du champ

Pour comprendre le champ contenu flexible, il faut imaginer un champ répéteur, mais au lieu de répéter inlassablement les mêmes sous-champs, vous allez pouvoir définir plusieurs groupes de sous-champs distincts, et choisir lequel afficher au moment de l’ajout.

On va voir qu’il y a pleins d’utilisations à ce champ, mais imaginez : vous pourriez créer un constructeur de pages maison en permettant au rédacteur de choisir parmi différentes dispositions :

![](https://capitainewp.io/wp-content/uploads/2020/05/dispositions-champ-flexible.jpg.webp)

Bon nombre d’agences utilisent d’ailleurs le champ flexible en ce sens, et on va voir un exemple à la fin de ce cours. Mais pour commencer, on va voir comment l’utiliser pour faire une carte des menus d’un restaurant.

Je peux l'utilisé pour me permettre d’administrer mon programme de formation.

Mon champ flexible possède plusieurs sous-groupes, que l’on appelle des dispositions.

    Les parties, qui distinguent les concepts majeurs ;
    Les chapitres, qui permettent de découper une partie en sous-parties ;
    Ainsi que les listes de cours.

Dans WordPress, à chaque fois que je clique sur le bouton Ajouter une section, je peux choisir laquelle je veux afin de composer mon programme à ma guise.

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-flexible-bouton-ajouter.jpg.webp)

C’est tout simplement génial. Alors certes, ce n’est pas très visuel puisqu’on enchaine des groupes de champs, et ça ne ressemble en rien au rendu final sur le site, mais c’est rapide et efficace à administrer.

J’aurais très bien pu faire des blocs Gutenberg pour avoir un aperçu en temps réel mais dans ce cas le champ ACF flexible s’avère bien plus simple à mettre en place et la saisie des données très rapide.

J’ai mis des années avant d’expérimenter ce champ et comprendre ce qu’il fait, mais depuis que j’ai découvert ses possibilités, je l’adore.

Mais revenons-en à notre menu de restaurant. Voici donc à quoi il va ressembler une fois terminé :

![](https://capitainewp.io/wp-content/uploads/2020/05/flexible-apercu-scaled.jpg.webp)

Passons sans plus tarder à la configuration de notre groupe.

## Configuration du groupe de champs

Avant de se lancer dans la configuration, on va prendre le temps de réfléchir à ce dont on a besoin.

On voudrait :

- Une disposition pour mettre le titre d’une section (entrées, plats, desserts…) ;
- Une disposition pour lister les plats, leur composition et leur prix ;
- Et une disposition pour mettre un produit phare en avant, avec une photo.

Je crée maintenant un nouveau groupe de champs et j’ajoute un champ de type contenu flexible. Je l’appelle « Carte des menus » et je mets comme slug menus.

![](https://capitainewp.io/wp-content/uploads/2020/05/flexible-gerer-disposition-scaled.jpg.webp)

## Configurer les dispositions

Maintenant, on va ajouter nos 3 dispositions. Dans la colonne de gauche, vous allez pouvoir réorganiser (via un glisser-déposer), supprimer, dupliquer et ajouter de nouvelles dispositions, et à l’intérieur, ajouter des sous-champs.

Les dispositions fonctionnent comme les champs : elles ont un intitulé, et un slug.

Dans chaque disposition, on retrouve la même interface de sous-champs que pour le champ répéteur. Passons en revue les dispositions à créer :

## Disposition 1 : la section

Dans cette disposition que j’appelle Section, qui a pour slug section, j’ajoute 2 champs :

- Titre : un champ texte simple avec pour nom title ;
- Description : une zone de texte de hauteur 2 avec pour nom description ;

## Disposition 2 : la liste de plats

Dans la disposition Liste de plats, qui porte le slug dishes_list, j’ajoute un seul champ Plats, qui sera de type répéteur et avec pour nom dishes. Dans ce champ répéteur, je créé des sous-sous-champs.

- Nom du plat : un champ texte simple, avec pour slug name ;
- Ingrédients : un autre champ texte avec le slug ingredients ;
- Et le prix : un champ nombre avec pour suffixe €, prix minimum 0 et le slug price.

D’ailleurs sur un petit écran, l’interface devient un peu serrée :

![](https://capitainewp.io/wp-content/uploads/2020/05/champception-scaled.jpg.webp)

On arrive à 4 niveaux : Flexible > Disposition > Répéteur > Sous-champs. Et là ACF commence à montrer ses limites en terme d’ergonomie d’administration. Heureusement pour nous, on n’ira pas plus loin dans cet exemple.

> Ne donnez pas le même nom à une disposition et l’un de ses champs, afin d’éviter toute confusion plus tard dans le template. C’est pour ça que j’ai choisi dishes_list pour la disposition et dishes pour le répéteur.

## Disposition 3 : Le produit Phare

Et enfin, notre dernière disposition s’appelle Produit phare avec pour slug featured. À l’intérieur de celle-ci j’ajoute 3 champs :

- Photo : un champ image avec l’ID en sortie et le slug picture ;
- Nom du plat : un champ texte simple avec pour slug name ;
- Prix : un champ nombre avec pour suffixe €, prix minimum 0 et le slug price.

Notre groupe de champ est enfin prêt ! On va pouvoir aller saisir nos données.

Au niveau des autres réglages de ce champ, vous allez pouvoir choisir le nombre minimum et maximum de dispositions à utiliser dans votre page, et même limiter certaines d’entre elles.

![](https://capitainewp.io/wp-content/uploads/2020/05/limiter-dispositions-flexibles.jpg.webp)

Vous pourriez par exemple limiter l’utilisation d’une disposition Titre à une seule fois, et forcer le rédacteur à utiliser au moins une fois une disposition Call to action par exemple.

Pour en savoir plus sur toutes les options proposées par le champ flexible, voici le lien vers la documentation officielle : <https://www.advancedcustomfields.com/resources/flexible-content/>

## Saisir les données

Comme d’habitude, on va aller dans Pages > Ajouter, puis on va tout de suite appliquer le modèle de page Champ Flexible. Notre groupe de champs devrait apparaitre :

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-flexible-vide-scaled.jpg.webp)

Ajoutez comme vous le souhaitez des sections, par exemple : Entrées, Makis, Plateaux, ainsi que des listes de plats. Et de temps en temps je vais intercaler un produit phare.

L’avantage du flexible c’est que je ne suis pas limité. Je peux très bien commencer une liste de produits, la couper par un produit phare, recommencer sur une autre liste de produits puis enfin ajouter une nouvelle section qui ne sera pas tenue de respecter la même architecture.

![](https://capitainewp.io/wp-content/uploads/2020/05/saisie-champ-flexible-scaled.jpg.webp)

Maintenant que nos données sont prêtes, on va pouvoir aller ajouter le code dans notre template pour afficher le tout.

## Afficher les champs

Comme vous vous en doutez, le code va ressembler à celui du champ répéteur, puisqu’on doit boucler un certain nombre de fois selon le nombre de dispositions trouvées.

La différence va résider dans le fait que pour chaque itération de la boucle, on va ajouter un test pour vérifier quelle est la disposition utilisée, et selon le cas afficher le code correspondant.

```php
<?php if( have_rows( 'menus' ) ): ?>
    <div class="menus">
        <?php while ( have_rows( 'menus' ) ) : the_row(); ?>

            <?php
                // Disposition : section
                if( get_row_layout() == 'section' ):
          
            ?>
    <div class="menus__section"><?php the_sub_field( 'title' ) ?></div>
            <?php
                // Disposition : Liste de plats
                elseif( get_row_layout() == 'dishes_list' ):
            ?>
                <div class="menus__dishes">(répéteur…)</div>
            <?php
                // Disposition : Produit phare
                elseif( get_row_layout() == 'featured' ):
            ?>
                <div class="menus__featured"><?php the_sub_field( 'name' ) ?></div>
            <?php endif; ?>

        <?php endwhile; ?>
    </div> <!– menus –>
<?php endif; ?>
```

Le code commence exactement comme celui du répéteur, en s’inspirant du code de la boucle WordPress.

Une fois dans le while, on va utiliser la fonction get_row_layout() d’ACF pour vérifier quelle disposition est utilisée. En fonction de cela, on appellera le HTML et les sous-champs adéquats.

Dans chaque disposition, on utilise la fonction the_sub_field() pour afficher les données. Par contre, on va avoir différents niveaux de `<div>`, du PHP avec des boucles avec le répéteur (notre liste de plats) et du coup le code va vite devenir compliqué à lire.

Alors on va utiliser des templates intermédiaires et séparer notre code monolithique en plusieurs fichiers grâce à la fonction get_template_part().

```php
?php
    while ( have_rows( 'menus' ) ) : the_row();
        if( get_row_layout() == 'section' ) {
            get_template_part( 'flexible/section' );
        
        } elseif( get_row_layout() == 'dishes_list' ) {
            get_template_part( 'flexible/dishes_list' );

        } elseif( get_row_layout() == 'featured' ) {
            get_template_part( 'flexible/featured' );
        }
    endwhile;
?>
```

Et on va aller créer un dossier flexible à la racine de notre thème, dans lequel on aura section.php, featured.php…

> On ne met jamais le « .php » dans la fonction get_template_part().

Oh et puis vous savez quoi ? On peut même pousser le délire encore plus loin :

```php
<?php if( have_rows( 'menus' ) ): ?>
    <div class="menus">
        <?php
            while ( have_rows( 'menus' ) ) : the_row();
                get_template_part( 'flexible/' . get_row_layout() );
            endwhile;
        ?>
    </div> <!– menus –>
<?php endif; ?>
```

Si on nomme nos templates comme nos dispositions, alors au lieu de tester la valeur de get_row_layout(), on l’injecte directement dans le get_template_part().

Et là on a simplifié au maximum notre boucle ! Ça me plait déjà beaucoup mieux. On va maintenant pouvoir s’occuper de chaque disposition dans les fichiers séparés.

## La disposition « Section »

Cette disposition est toute simple puisqu’il nous suffit d’afficher le titre et une petite description au dessous.

```php
<div class="menus__section">
    <h2><?php the_sub_field( 'title' ); ?></h2>
    <p><?php the_sub_field( 'description' ); ?></p>
</div>
```

## La disposition « Liste de plats »

Pour la liste de plats, on a utilisé un champ répéteur, on utilise donc la boucle ACF :

```php
<?php if( have_rows( 'dishes' ) ): ?>
  <div class="menus__dishes">
    <?php while( have_rows( 'dishes' ) ): the_row(); ?>

    <div class="menus__dishes__row">
      <div class="menus__dishes__name"><?php the_sub_field( 'name' ); ?></div>
      <div class="menus__dishes__ingredients"><?php the_sub_field( 'ingredients' ); ?></div>
      <div class="menus__dishes__price"><?php the_sub_field( 'price' ); ?>€</div>
    </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
```

On pourrait penser qu’imbriquer un répéteur dans un flexible serait compliqué, mais en réalité pas du tout, il existe une documentation ACF spécifique à ce sujet qui indique qu’on utilise nos boucles comme d’habitude. Pas de fonction the_sub_sub_field donc !

> D’ailleurs le fait d’avoir séparé le fichier nous simplifie bien la tâche : ce serait beaucoup moins lisible si tout le code était dans un seul fichier.

## La disposition « Produit phare »

Et enfin, la seule complexité du produit phare est d’afficher une image, mais on sait désormais très bien le faire :

```php
<div class="menus__featured">
    <div class="menus__featured__pic">
        <?php 
            $image_id = get_sub_field( 'picture' );
            echo wp_get_attachment_image( $image_id, 'full' );
        ?>
    </div>
    <div class="menus__featured__name">
        <?php the_sub_field( 'name' ); ?>
    </div>
    <div class="menus__featured__price">
        <?php the_sub_field( 'price' ); ?>€
    </div>
</div>
```

## Le CSS

Pour terminer, on y ajoute un peu de CSS pour rendre le tout sexy, et on va pouvoir aller contempler le résultat.

Comme j’ai près de 100 lignes de CSS pour cet exemple, je n’affiche pas le code directement ici.

```css
/* Flexible */

.menus {
  margin: 0 auto;
  max-width: 680px;
  border: 2px solid #EBEBEB;
  border-radius: 10px;
  padding: 20px 50px;
}

.menus__section { … }
.menus__dishes { … }
.menus__featured { … }
```

Et le tour est joué ! Joli, non ? Je sais pas vous, mais tous ces sushis m’ont mis en appétit !

![](https://capitainewp.io/wp-content/uploads/2020/05/affichage-flexible-scaled.jpg.webp)

Comme vous pouvez le voir, je n’ai pas toujours utilisé le même « pattern ». J’ai un titre de section juste après le Saumon cheese, mais pour le Mega mix, je repars sur une liste de plats. C’est là tout l’avantage du champ contenu flexible.

Si vous avez des erreurs PHP, vérifiez que vos boucles sont bien formées et bien fermées. Mine de rien, on commence à avoir un peu de complexité en jouant avec le flexible + le répéteur.

Avec le champ flexible, vous avez entre vos mains toute la puissance des champs ACF, et plus aucun obstacle ne vous résistera. Vous verrez qu’à l’usage, il se montrera indispensable dans bien des cas.
