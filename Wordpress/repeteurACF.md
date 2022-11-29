# Le champ répéteur d’ACF

Il existe des situations où l’on a besoin d’insérer plusieurs fois le même type de données, et pour cela il existe le champ répéteur d’ACF. On va voir comment l’utiliser, mais on va également réfléchir aux situations où il est préférable d’utiliser un Custom Post type par exemple.

## Présentation du champ répéteur

Plus qu’un simple champ, le répéteur est un groupe de champs qui ont la capacité d’être répétés un nombre de fois infini.

Il trouve son utilité dans de nombreuses situations, dont voici quelques exemples :

    Pour faire une carte des menus dans un restaurant ;
    Présenter une équipe dans une entreprise ;
    Lister plusieurs emplacements géographiques ;
    Afficher des témoignages ;
    Lister ses projets…

Pour le dernier exemple, si vous avez suivi la formation développeur de thèmes, vous allez me dire : Est-ce qu’un Custom Post Type ne serait pas plus approprié dans ce cas précis ? C’est justement la réflexion qu’on va avoir un peu plus tard dans ce cours.

Pour illustrer ce champ répéteur, j’ai opté pour la présentation d’une équipe de collaborateurs en entreprise. Voici à quoi va ressembler notre page une fois terminée :

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-repeteur-front-scaled.jpg.webp)

Et voici à quoi ressemblent nos formulaires dans l’interface d’administration :

![](https://capitainewp.io/wp-content/uploads/2020/05/repeteur-scaled.jpg.webp)

Sans plus attendre, allons configurer notre groupe de champs.

## Configuration du groupe de champs

Je commence par aller dans ACF > Ajouter et je créé un groupe de champ nommé Répéteur. Dans un vrai site je l’aurais sûrement appelé « Page Équipe » pour donner plus de contexte sur l’usage de mon groupe.

Je crée ensuite un premier champ que j’appelle « L’équipe » dont le slug est team et de type répéteur. Comme je le disais dans le cours précédent, mettez toujours les noms en anglais, car ce sont eux qu’on va récupérer dans notre code PHP.

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-repeteur-admin-scaled.jpg.webp)

C’est la section sous-champ qui va maintenant nous intéresser. Dans celle-ci on retrouve la même interface d’ajout de champs.

Voici les champs que j’y ajoute :

- Un champ image, que je nomme Photo avec le slug picture et l’ID en sortie ;
- Un champ texte, que je nomme Nom avec le slug name ;
- Un autre champ texte, nommé Poste avec le slug occupation ;
- Encore un champ texte, nommé Téléphone avec le slug phone ;
- Et enfin un champ e-mail, nommé E-mail avec le slug mail ;

## Paramètres du champ

Dans les autres paramètres du champ répéteur, on peut définir si on veut un nombre minimum d’éléments, et un nombre maximum. Imaginez que vous prévoyez un champ répéteur pour afficher jusqu’à 3 témoignages sur une page. Vous pouvez limiter afin que le rédacteur ne prenne pas l’idée d’en mettre 10.

Il y a aussi l’intitulé du bouton : par défaut ce sera Ajouter un élément, mais ce serait plus sympa d’avoir « Ajouter un collaborateur ».

![](https://capitainewp.io/wp-content/uploads/2020/05/bouton-intitule.jpg.webp)

Comme les champs répétés peuvent prendre beaucoup de place dans l’interface, on peut décider de « refermer » une ligne pour gagner de l’espace grâce à un petit bouton situé sur la gauche. Le réglage Refermé permet d’indiquer quel sera le seul champ affiché en mode refermé. J’ai choisi le nom :

![](https://capitainewp.io/wp-content/uploads/2020/05/refermer-ligne.jpg.webp)

Et enfin la disposition permet d’afficher nos champs de manière différente :

- Tableau affiche les champs les uns à côté des autres ;
- Bloc les affiche les uns sous les autres ;
- Et Rangée les affiche verticalement, avec l’intitulé à gauche.

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-disposiiton.jpg.webp)

En fonction des cas, une disposition peut être préférable à une autre. Tableau est surtout pratique si vous n’avez pas beaucoup de champs.

On va voir un peu plus tard comment grandement améliorer la disposition de nos champs, et rendre le tout plus sexy.

## Assigner le groupe de champs

On va faire exactement comme dans le cours précédent : on va créer une page templates/repeater.php dans laquelle on indique :

```php
<?php
/*
 Template Name: Champ Répéteur
*/
  
 get_header();
?>
```

Maintenant je vais pouvoir assigner le groupe de champ au Modèle de page Champ Répéteur.

Il ne reste maintenant qu’à créer une nouvelle page et assigner le modèle « Champ Répéteur » à droite dans Attributs de la page. Votre formulaire devrait apparaître !

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-repeteur-page-scaled.jpg.webp)

Il ne vous reste plus qu’à ajouter quelques données et publier votre page.

> Dans un vrai projet, le modèle de page se serait plutôt appelé « Équipe », tout comme le groupe de champ.

Pour en savoir plus sur toutes les configurations offertes par ce champ, consultez la documentation officielle. <https://www.advancedcustomfields.com/resources/repeater/>

## Astuces du champ répéteur

Avant de continuer, voici quelques astuces sur l’utilisation du champ Répéteur. Vous pouvez réorganiser les éléments par un simple glisser-déposer à partir de la zone de gauche :

![](https://capitainewp.io/wp-content/uploads/2020/05/glisser-deposer-repeteur-1000x386.jpg.webp)

Il est également possible d’intercaler une nouvelle entrée entre deux autres, au lieu de l’ajouter forcément à la fin. Pour cela survolez la zone à droite et cliquez sur le + situé à cheval entre les deux lignes.

![](https://capitainewp.io/wp-content/uploads/2020/05/inserer-element.jpg.webp)

Enfin, le bouton – dans cette même zone permet de supprimer une entrée.

On va maintenant pouvoir passer à l’étape suivante, qui consiste à afficher ces données dans notre template !

## Afficher les données sur le modèle

Passons maintenant à la partie code. Au niveau du PHP, c’est bien sûr un peu plus complexe qu’un the_field(), mais pas bien compliqué non plus. Surtout que c’est toujours exactement le même code que l’on utilisera.

En programmation, quand on doit afficher plusieurs données, on utilise une boucle while.

```php
<?php if( have_rows( 'team' ) ): ?>
  <div class="team">
    <?php while ( have_rows( 'team' ) ) : the_row(); ?>
      <div class="team__member">
        <?php the_sub_field( 'name' ); ?>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
```

have_rows() renvoie true s’il y a des données dans le répéteur, et false sinon. Le premier test if me permet de n’afficher ma <div> team seulement s’il y a quelque chose à afficher.

Ensuite, the_row() permet d’initialiser les données des sous-champs, et c’est comme ça qu’on va utiliser à l’intérieur de notre boucle non pas the_field(), mais the_sub_field() !

En fait ACF a utilisé la même façon de faire que pour la boucle WordPress standard ! De cette manière, on n’est pas dépaysés !

Voici maintenant le code au complet avec l’image et toutes les informations :

```php
<?php if( have_rows( 'team' ) ): ?>
  <div class="team">
    <?php while ( have_rows( 'team' ) ) : the_row(); ?>
      <div class="team__member">
          <div class="team__member__pic">
              <?php 
                $image_id = get_sub_field( 'picture' );
                echo wp_get_attachment_image( $image_id, 'full' );
              ?>
          </div>
          <div class="team__member__data">
              <p class="team__member__name"><?php the_sub_field( 'name' ); ?></p>
              <p class="team__member__occupation"><?php the_sub_field( 'occupation' ); ?></p>
              <p class="team__member__phone"><?php the_sub_field( 'phone' ); ?></p>
              <p class="team__member__mail">
                  <a href="mailto:<?php the_sub_field( 'mail' ); ?>">
                      <?php the_sub_field( 'mail' ); ?>
                  </a>
              </p>
          </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
```

Pour l’image, on récupère sa valeur qui est l’ID, et on utilise la fonctionwp_get_attachment_image() pour générer la balise, comme on l’a vu dans le cours sur le champ image.

Notez que du coup on utilise get_sub_field() et pas get_field().

En ce qui concerne les autres champs, un simple the_sub_field() fera l’affaire !

> N’oubliez pas d’utiliser the_sub_field() à l’intérieur d’un répéteur, et non pas the_field().

Pour rendre ça joli, on va ajouter un peu de CSS dans le fichier style.css de notre thème :

```css
.team {
    border: 1px solid #ddd;
    margin: 0 15%;
}

.team__member { display: flex; }
.team__member + .team__member { border-top: 1px solid #ddd; }

.team__member__pic {
    flex: 1;
    text-align: center;
    padding: 20px;
}

.team__member__data {
    flex: 4;
    padding: 20px;
    font-size: .8em;
}

.team__member__data p { margin: 0; }

.team__member__pic img {
    display: block;
    border-radius: 50%;
}

.team__member__name {
    font-size: 1.2em;
    font-weight: bold;
    color: #444;
}

.team__member__occupation { color: #777; }
```

Et voilà le résultat sur notre page :

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-repeteur-front-scaled.jpg.webp)

Libre à vous ensuite d’adapter le rendu. Le champ répéteur renvoie tous nos éléments, et on peut donc composer avec le HTML et le CSS comme on veut.

> Vous pouvez mettre un répéteur dans un répéteur. La logique reste la même mais attention car l’interface va devenir plutôt chargée côté administration.

## Dans quel cas utiliser le répéteur ?

Ce champ répéteur est tellement pratique que je l’utilise tout le temps. Mais il existe des cas où il n’est pas forcément le plus adapté ! 

Il allait très bien dans le cas de la présentation d’équipe car chaque membre n’avait pas besoin d’une page dédiée.

## Quand privilégier les CPT ?

Mais imaginez maintenant que vous vouliez faire une liste d’entreprises, et que chacune d’entre elles possède sa propre page dédiée. On aurait donc une page « Listing » et des publications « dédiées ».

Ça ne vous rappelle rien ? C’est exactement le principe des Custom Post Types. Dans ce cas, il vaudra donc mieux créer un type de publication personnalisé avec une archive, plutôt qu’un champ répéteur.

![](https://capitainewp.io/wp-content/uploads/2020/05/schema-cpt.jpg.webp)

Pour rappel le Custom Post Type aurait une archive avec l’URL /entreprise/ dans laquelle on retrouverait la liste des entreprises, puis une page pour chaque entreprise, avec une URL du type /entreprise/apple/.

Vous pourriez ensuite faire appel à une WP Query depuis n’importe quelle page pour récupérer et afficher la liste.

> La règle d’or est la suivante : vous avez besoin de pages dédiées ? Optez pour un CPT, sinon un champ répéteur suffira amplement !

Un des avantages du répéteur par rapport à la WP Query, c’est de pouvoir choisir manuellement l’ordre d’apparition des éléments. On verra plus tard qu’on pourra faire ça avec un CPT grâce au champ relationnel.

Avant de terminer, voici un dernier cas !

## Flexible + répéteur

Imaginons qu’on veuille faire une carte des menus pour un restaurant. On va avoir besoin d’un champ répéteur pour lister les plats. Mais on aimerait parfois intercaler des titres (Entrées, Plats, Desserts…) pour séparer en différentes sections.

![](https://capitainewp.io/wp-content/uploads/2020/05/schema-champ-flexible.jpg.webp)

On pourrait bien sûr faire plusieurs champs répéteurs, mais cela implique qu’on sait à l’avance combien il y a de « sections » et qu’elles ne bougeront pas.

Sinon, il existe le champ flexible qui permet de créer plusieurs groupes de champ qu’on va pouvoir répéter dans l’ordre que l’on veux. C’est justement l’objet du prochain cours !

Le champ répéteur est l’un des champs qui m’avait incité à acheter ACF en version Pro à l’époque. Et depuis je ne le regrette absolument pas. Il va grandement vous aider dans vos projets !