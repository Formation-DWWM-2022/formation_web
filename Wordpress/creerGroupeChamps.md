# Advanced Custom fields : Créer son premier groupe de champs

ACF est l’outil incontournable pour ajouter des champs additionnels à vos publications et ainsi permettre au rédacteur de saisir plus facilement les différentes données d’une page. Dans ce cours on va voir comment créer notre premier groupe de champs, l’assigner à un contenu et afficher les données sur notre page.

Dans le cours précédent, on a vu les bienfaits d’ACF qui nous propose d’ajouter des champs additionnels bien plus sexy dans notre interface de rédaction. On va maintenant mettre en place des champs ACF, et pour cela on va reprendre le même exemple que pour le cours sur les champs personnalisés, à savoir un test de jeux vidéo.

Mais on va voir que c’est bien plus propre et efficace avec ACF ! Alors sans plus attendre, jetons-nous dans le bain !

## Comment fonctionne ACF ?

Dans notre cas, on souhaite ajouter des champs à nos tests de jeux vidéo : la note globale, les plus, les moins, mais également la pochette du jeu, son prix et sa date de sortie !

Sur le site, ça donnera ça :

![](https://capitainewp.io/wp-content/uploads/2019/02/template-champs-1600x1051.jpg.webp)

Voici comment on procède habituellement avec ACF :

1. Tout d’abord on créé un groupe de champs et on y ajoute nos champs (contenus, images…) ;
2. On assigne ensuite ce groupe à une page, des articles, une catégorie en particulier…
3. Et enfin on modifie le template concerné via PHP pour afficher ces champs.

Appliqué à notre exemple, cela donne :

1. On va créer un groupe contenant nos champs note, plus, moins, pochette, date de sortie et prix ;
2. On va ensuite assigner ce groupe aux articles de la catégorie Jeux vidéo seulement ;
3. Puis on va afficher ces champs dans notre single.php ;

Le rédacteur (nous pour l’instant) n’aura plus qu’à rédiger son contenu depuis son interface d’administration !

On va maintenant installer ACF à partir du répertoire des extensions afin de pouvoir l’utiliser.

## Installer ACF

Rendez-vous dans votre interface d’administration de WordPress puis Extensions > Ajouter. Recherchez Advanced Custom Fields (et pas juste ACF, sinon il ne trouvera pas) et installez-la, puis activez-la !

Cette version est gratuite et propose déjà pas mal de fonctionnalités. Mais il existe aussi une version Pro qui vous permettra d’aller encore plus loin avec encore plus de champs et d’options ! Il vous en coutera 49$ par an pour un site ou 249$ pour un nombre de sites illimité (idéal pour les agences).

Pour le moment et pour bon nombre de projets, la version gratuite suffira amplement !

Si vous avez opté pour la version Pro, vous allez télécharger l’archive de l’extension, la décompresser et placer le dossier ACF manuellement dans le wp-content/plugins/ de votre site. Ensuite, allez dans votre interface d’administration, Extensions > Extensions installées, puis cliquez sur Activer sous Advanced Custom Fields.

Profitez-en pour aller insérer votre clé de licence dans ACF > Mises à jour afin d’activer les mises à jour.

## Déclarer un groupe de champs

Une fois ACF activé, vous devriez voir une nouvelle entrée ACF (ou Custom Fields en anglais) en bas du menu latéral de WordPress :

![](https://capitainewp.io/wp-content/uploads/2019/02/menu-acf-1600x510.jpg.webp)

Cliquez dessus puis sélectionnez Ajouter. Vous tomberez sur cette interface :

![](https://capitainewp.io/wp-content/uploads/2019/02/creer-groupe-champs-acf-1600x1020.jpg.webp)

On va commencer par donner un nom à notre groupe de champ, je vais l’appeler Tests de jeux.

## Déclarer les champs

Ensuite, on va ajouter notre premier champ. Pour cela cliquez sur le bouton bleu + Ajouter nous permettant de définir un nouveau champ.

## La note

On va lui donner un titre, par exemple Note, et définir le type de champ sur Nombre. Le Nom du champ est défini automatiquement à partir du titre. C’est l’identifiant qui doit être unique, et qu’on utilisera dans le template pour afficher la valeur. Autrement dit, c’est un Slug.

Ils y a plusieurs options dessous, mais pour le moment celles qui vont nous intéresser c’est :

- Suffixe : mettez /10 afin d’ajouter une indication sur le champ pour le rédacteur ;
- Valeur minimale : 0 (je ne vous fait pas un dessin) ;
- Valeur maximale : 10 (ou 20, comme vous voulez) ;

On va procéder de la même manière pour les autres champs :

Les plus

    Titre : Les plus ;
    Nom : les_plus ;
    Type de champ : Éditeur WYSIWYG ;
    Barre d’outils : Basic ;
    Boutons d’ajout de médias : non.

Les moins

    Titre : Les moins ;
    Nom : les_moins ;
    Type de champ : Éditeur WYSIWYG ;
    Barre d’outils : Basic ;
    Boutons d’ajout de médias : non.

Date de sortie

    Titre : Date de sortie ;
    Nom : date_de_sortie ;
    Type de champ : Date.

Prix

    Titre : Prix ;
    Nom : prix ;
    Type de champ : Nombre.
    Suffixe: €.
    Valeur minimale : 0.

Pochette

    Titre : Pochette ;
    Nom : pochette ;
    Type de champ : Image ;
    Format dans le modèle : Données de l’image (array) ;
    Taille de prévisualisation : Moyen.

C’est grâce à ce genre de champs comme les images qu’ACF va prendre tout son intérêt !

Si vous n’avez pas envie de créer les champs à la main, vous pouvez télécharger mon export JSON

Il vous suffit ensuite d’aller dans ACF > Outils > Importer les groupes de champs.

Vous devriez maintenant avoir tous ces champs :

![](https://capitainewp.io/wp-content/uploads/2019/02/champs-du-groupe-1600x1010.jpg.webp)

Vous pourrez à tout moment venir modifier ou ajouter des paramètres à ce groupe. Pour l’instant, on va laisser comme ça.

## Un champ ou une taxonomie ?

D’ailleurs, on pourrait ajouter un champ Plateforme, où l’on pourrait indiquer si le jeu sort sur XBox, Playstation, PC…

Mais en fait là, ce serait plutôt une façon de « classer » le jeu. Même constat si on voulait définir le type de jeu : Action, Course, Plateau, Multi…

Du coup, dans ces deux cas, créer un champ n’est pas la meilleure approche. À la place, il faudrait plutôt créer une taxonomie ! Et ça tombe bien, car maintenant vous savez faire !

![](https://capitainewp.io/wp-content/uploads/2019/01/taxonomies-wordpress-1600x805.jpg.webp)

## Assigner le groupe de champs à des publications

On a créé un groupe de champs, mais il faut maintenant indiquer à ACF où et quand il doit apparaitre.

Nous ce que l’on veut, c’est qu’il apparaisse dans les articles de la catégorie Jeux vidéo seulement. (Vérifiez que vous avez bien une telle catégorie créée dans votre site).

Sous l’interface d’ajout de champs que l’on vient de manipuler, vous trouverez une autre Metabox nommée Assigner ce groupe de champs.

![](https://capitainewp.io/wp-content/uploads/2019/02/assigner-groupe-champs-acf-1600x1022.jpg.webp)

Le but ici est d’indiquer que :

- On veut montrer ces champs lorsque le type de publication est Article ;
- ET que la catégorie de l’article est Jeux vidéo ;

Si votre blog est entièrement dédié aux jeux vidéo, alors la deuxième condition n’est même pas nécessaire. En général, on se cantonne à une seule condition, ce qui suffit largement.

Il existe plein d’autres conditions, par exemple afficher le groupe lorsque :

- Le type de publication est une page ;
- Le modèle de la page est Service ;
- Que la taxonomie Type de projet est Photo…

Bref, avec ce système vous allez pouvoir couvrir un bon nombre de cas.

D’ailleurs vous pouvez tout à fait créer plusieurs groupes de champs et les assigner à une même publication, rien ne l’interdit et ça peut s’avérer pratique pour aérer vos champs ou les regrouper par utilité.

Bien, notre groupe est prêt, alors pensez à l’enregistrer en cliquant sur Publier ou Mettre à jour à droite, et on peut passer à la suite.

> Tiens d’ailleurs, vous savez comment sont enregistrées les données de ces groupes de champs dans WordPress ? Regardez l’URL de la page : on y retrouve post_type ! Eh oui : Les groupes de champs ACF sont enregistrés dans un type de publication personnalisé non public ! Dans le cours dédié aux CPT je vous avais dit que certaines extensions les utilisaient parfois pour enregistrer des données. C’est le cas d’ACF !

Si vous retournez dans ACF > Groupes de champs, vous verrez votre premier groupe apparaitre. À terme, tous les groupes seront listés de cette manière :

![](https://capitainewp.io/wp-content/uploads/2020/12/acf-groupes-champs-1-1600x1025.jpg.webp)

On y retrouve plusieurs informations utiles : la description du groupe, son identifiant unique, son emplacement sur le site et le nombre de champs qu’il contient.

## Saisie du contenu

On va maintenant se rendre dans Articles > Ajouter pour créer un nouveau test de Jeux vidéo. Pour l’instant on ne voit pas nos champs, car il faut d’abord sélectionner la catégorie Jeux vidéo. Ils devraient ensuite apparaitre automatiquement. Si ce n’est pas le cas, enregistrez votre article et rechargez la page.

Vos champs apparaissent après le contenu :

![](https://capitainewp.io/wp-content/uploads/2019/02/saisie-champs-acf-1-1600x908.jpg.webp)

Plutôt sympa non pour saisir le contenu ? Pas besoin de réfléchir, il suffit de remplir les cases ! L’éditeur visuel WYSIWYG me permet d’accéder aux options de mise en forme du texte, dont la liste à puces.

J’ai joué sur quelques paramètres pour améliorer la mise en page des champs en les disposants les uns à côté des autres grace à un système de colonnes. Dans votre cas, ils seront simplement listés les uns sous les autres. On verra comment rendre cela plus joli un peu plus tard !

## Afficher les champs dans le template

Dernière étape : afficher les valeurs de nos champs dans notre article !

Pour cela ACF propose une fonction pour récupérer et afficher le contenu des champs dans votre template :

```php
<!– Afficher une valeur –>
<?php the_field( 'note' ); ?>

<!– Récupérer la valeur –>
<?php $note = get_field( 'note' ); ?>
```

C’est la même logique qu’avec les Templates Tags natifs de WordPress : une fonction the_permet d’afficher directement le résultat, et une fonction get_ pour récupérer la valeur.

En fait la fonction the_field utilise la fonction native get_post_meta que l’on avait pu voir dans le cours sur les champs personnalisés. On pourrait d’ailleurs utiliser cette dernière fonction mais celle d’ACF simplifie un peu les choses.

> Si vous utilisez un thème premium, et pas un thème fait sur mesure, il va falloir générer un thème enfant. Je vous montre comment créer un thème enfant et pourquoi dans un cours dédié.

Mis en application avec mes champs dans la page, ça donne ça :

```php
<?php if( has_category( 'jeux-video' ) ): ?>

    <div class="review">
        <div class="review__score">Note : <?php the_field( 'note' ); ?> / 10</div>

        <div class="review__cols">
            <div class="review__pros">Les plus : <?php the_field( 'les_plus' ); ?></div>
            <div class="review__cons">Les moins : <?php the_field( 'les_moins' ); ?></div>
        </div>

        <div class="review__date">Sortie le <?php the_field( 'date_de_sortie' ); ?></div>

        <?php 
         if( get_field( 'pochette' ) ): 
          $picture = get_field( 'pochette' );
          //var_dump( $picture );  
        ?>
            <div class="review__picture">
                <img 
                     src="<?php echo $picture['sizes']['post-thumbnail']; ?>" 
                     alt="Pochette de <?php $picture['title']; ?>">
            </div>
        <?php endif; ?>
    </div>

<?php endif; ?>
```

Pour commencer, j’ai utilisé le Conditional Tag (ou marqueur conditionnel) has_category('jeux-video') afin de vérifier que la catégorie de l’article est bien Jeux vidéo, sinon inutile d’afficher mon bloc avec mes champs. Cela n’est utile que dans ce cas précis car je souhaite n’afficher ma critique que dans cette catégorie.

> Ne confondez pas avec is_category() qui permet de tester si une page archive affiche actuellement la liste des publications d’une catégorie.

Ensuite, j’utilise simplement les fonctions the_field là où je souhaite afficher les valeurs de mes champs ACF. Pensez bien à indiquer en paramètre le slug de ces champs, et non pas leur titre.

Plutôt facile pour le moment non ?

## Le cas particulier de l’image

Pour l’image, c’est un peu différent : ACF ne renvoie pas la balise image, ni même juste l’URL de celle-ci, mais un tableau contenant plusieurs données. Si je fais un var_dump de mon image j’obtiens :

![](https://capitainewp.io/wp-content/uploads/2019/02/var-dump-image-768x730.jpg.webp)

C’est dû au fait que, lorsque l’on a défini notre champ ACF, on a demandé un tableau de données en format de sortie :

![](https://capitainewp.io/wp-content/uploads/2019/02/format-donnee-image-1600x322.jpg.webp)

On observe qu’ACF nous fournit pas mal d’informations sur l’image, comme son nom ou son titre. Mais ce qui va nous intéresser c’est le sous-tableau sizes qui contient toutes les tailles d’images intermédiaires que l’on a créées dans le cours sur les tailles d’images personnalisées.

On aurait pu également demander de ne recevoir que l’URL de l’image, ou encore simplement son ID. C’est d’ailleurs la solution que je vous conseillerai à terme.

En fait, recevoir directement l’URL est une mauvaise idée car vous n’aurez que celle de l’image originale, et si celle-ci fait plus de 2000px de large, on va avoir un souci de performances. C’est pour cela que l’on préfère récupérer l’une des tailles d’images intermédiaires.

Vous pouvez sinon récupérer l’ID de l’image. Dans ce cas quelques fonctions WordPress vont vous permettre de récupérer votre image :

```php
<?php 
 $image_id = get_field( 'pochette' ); // On récupère cette fois l'ID
 if( $image_id ) { 
  echo wp_get_attachment_image( $image_id, 'full' );
}
```

On utilise la fonction native wp_get_attachment_image pour générer le code HTML de l’image. Le second paramètre permet d’indiquer quelle taille d’image on souhaite.

Si vous souhaitez en savoir plus sur la gestion des champs ACF, je vous invite à consulter la documentation officielle qui est extrêmement bien réalisée. Et on va détailler tout cela dès le prochain cours. <https://www.advancedcustomfields.com/resources/>

Et voici maintenant le résultat final :

![](https://capitainewp.io/wp-content/uploads/2019/02/template-champs-1600x1051.jpg.webp)

Pas mal du tout !

Maintenant que votre groupe est en place, vos rédacteurs n’ont plus qu’à saisir leur contenu dans les champs ACF.

> Dans cette situation les rédacteurs n’ont aucun contrôle sur le design. Ils peuvent simplement remplir du contenu donc aucun risque de tout casser, contrairement à un Page Builder.

Vous savez désormais utiliser ACF pour ajouter des champs à vos contenus ! Vous allez pouvoir aller extrêmement loin grâce à WordPress et ACF, c’est un peu comme si vous veniez de découvrir vos nouveaux super pouvoirs !

Sachez enfin qu’aujourd’hui, pour cet exemple concret, on aurait pu créer un bloc Gutenberg. 

Dans les prochains cours, on va voir plus en détails les champs proposés par ACF, ainsi que leurs particularités.
