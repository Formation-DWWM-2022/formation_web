# Les principaux champs ACF (3/3) • Dispositions et champs de la version Pro

Pour terminer cette visite des champs ACF, on va aborder les champs de la version pro comme le répéteur, le contenu flexible mais également les champs qui vont permettre d’améliorer leur mise en page dans l’interface d’administration.

Il reste 2 types de champs à voir avec ACF : les champs de type répétition, et les champs de disposition. Ces derniers portent d’ailleurs mal leur nom puisque ce ne sont pas des champs à proprement parler, mais des outils de mise en forme de nos formulaires. On finira par quelques options utiles pour améliorer encore la mise en page.

## Les champs de répétition [ACF Pro]

Lorsqu’une donnée ne doit pas être unique, et que son nombre est indéfini, on peut faire appel aux différents champs de répétitions.

## Le champ répéteur

Jusqu’à maintenant, on était limités à une seule donnée par champ, mais que se passe-t-il si je veux en avoir plusieurs ? Par exemple, si vous souhaitez afficher une liste de numéros de téléphones d’une entreprise, vous ne savez pas à l’avance de combien vous en aurez besoin : 3, 4, plus ? C’est là qu’entre en jeu le champ répéteur.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-repeteur.jpg.webp)

Dans ce champ, vous allez avoir une zone pour créer des sous-champs. Ce sont eux qui seront répétés lorsque vous cliquez sur le bouton Ajouter un élément. D’ailleurs il est possible de changer cet intitulé pour quelque chose de plus sensé, comme par exemple Ajouter un contact.

Au niveau du code, l’approche est un peu plus complexe puisqu’il va falloir itérer selon le nombre d’entrées :

```php
<?php 
if( have_rows( 'repeteur' ) ): while ( have_rows( 'repeteur' ) ) : the_row();
 the_sub_field( 'sous_champ' );
endwhile; endif;
```

Le code permettant d’itérer dans les résultats ressemble volontairement à celui de la boucle WordPress native. À l’intérieur, il faut par contre utiliser la fonction the_sub_field() et non plus the_field().

Sa documentation : <https://www.advancedcustomfields.com/resources/repeater/>

## Le champ contenu flexible

Le champ flexible va encore plus loin puisqu’il permet de définir plusieurs petits groupes de champs (des dispositions), que le rédacteur pourra appeler dans l’ordre qu’il souhaite. C’est un peu un système de champs à la demande, ce qui en fait l’outil idéal pour créer un constructeur de pages maison !

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-contenu-flexible.jpg.webp)

Chaque sous-groupe permet donc de faire une mise en page particulière (par exemple texte + image, colonnes, bannière…), un peu à l’instar des blocs de l’éditeur visuel (Gutenberg).

Vous pouvez voir ce champ en action sur le site Détours de Canal+, où chaque section de la page d’accueil est un groupe dont la mise en page pourrait être inversée à tout moment, sans avoir à faire appel aux développeurs.

Sa documentation : <https://www.advancedcustomfields.com/resources/flexible-content/>

## Le champ Groupe

Ce champ n’a pas grande utilité, à part pour celui qui crée les groupes de champs. Le fait de regrouper des champs permet, dans l’interface d’ACF, de les réunir en tant que sous-champ. À quoi bon, me demanderez-vous ? L’utilité que j’y vois c’est que si vous avez besoin de dupliquer les champs qu’il contient, ou les déplacer, c’est plus facile en manipulant le groupe, plutôt que les champs uns par uns.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-groupe.jpg.webp)

Ça permet également une liste moins grande et donc plus facile à traiter. L’interface d’ACF a tendance à devenir vite complexe lorsque beaucoup de champs y sont déclarés.

Sa documentation : <https://www.advancedcustomfields.com/resources/group/>

## Le champ Clone

Enfin, le champ clone va s’avérer utile si jamais vous comptez réutiliser des champs à d’autres endroits (dans le champ flexible par exemple, ou même depuis un autre groupe de champ assigné à un autre type de publication).

Au lieu de re-déclarer à chaque fois les mêmes champs, il suffit d’appeler le champ clone, et de sélectionner ceux que l’on veut récupérer.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-clone.jpg.webp)

On arrive à ce niveau sur des logiques complexes, mais ça m’a tout de même été utile quelques fois, et j’ai gagné un temps précieux grâce à cette approche.

Sa documentation : https://www.advancedcustomfields.com/resources/clone/

## Les champs de disposition [ACF Pro]

Une fois qu’on a créé des dizaines de champs dans une seule page, on se rend vite compte que ça prend de la place, et que ce n’est pas très sexy. Voici donc quelques champs qui vont nous aider à y voir un peu plus clair.
Le message

Besoin de donner des instructions aux rédacteurs du site ? Vous pourriez les donner sous les champs concernés, mais parfois il n’y a pas assez d’espace. Donc si vous avez besoin d’une zone pour afficher un texte plus long, le champ message est fait pour ça !

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-message.jpg.webp)

## Les accordéons

Les accordéons permettent de regrouper plusieurs champs et de les afficher et cacher au besoin. Pour cela, un simple clic sur l’en-tête permet d’en afficher ou cacher son contenu.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-accordeon.jpg.webp)

Les options vous permettent de choisir le comportement des accordéons : si un seul peut être ouvert simultanément ou plusieurs, et lesquels doivent être ouverts ou fermés par défaut au chargement de la page.

Sa documentation : https://www.advancedcustomfields.com/resources/accordion/

## Les onglets

Les onglets ont le même but que les accordéons, mais leur disposition sera horizontale plutôt que verticale. C’est d’ailleurs mon approche préférée. 

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-onglet.jpg.webp)

Sa documentation : https://www.advancedcustomfields.com/resources/tab/

> Les champs de disposition n’ont d’utilité que dans l’interface d’administration de WordPress, car leur but est de permettre d’améliorer la mise en page des champs côté backend. Ils n’auront donc aucune existence sur le site.

## Les options de mise en page [ACF Pro]

Et pour finir, voici quelques options supplémentaires de la version pro qui vont grandement aider à améliorer la mise en page de vos formulaires. Un cours leur est d’ailleurs dédié un peu plus tard dans cette formation.

## Les colonnes

Cette fonctionnalité pro s’avère très utile car elle permet d’afficher plusieurs champs sur la même ligne. Du coup vous allez énormément gagner d’espace, car au lieu d’avoir un champ par ligne, vous pourrez en avoir plusieurs.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-colonnes.jpg.webp)

Pour permettre cela, il suffit de définir une taille en pourcentage dans les attributs du champ : 

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-colonnes-reglage.jpg.webp)

Tant que la somme ne dépasse pas les 100%, les champs vont s’aligner les uns à côté des autres. Un champ plus grand que l’espace restant viendra forcément se positionner à la ligne.

## La logique conditionnelle

Enfin, toujours dans le but d’alléger la mise en page, vous pouvez utiliser la logique conditionnelle, c’est-à-dire permettre d’afficher des champs seulement si une case est cochée ou si une valeur est sélectionnée. 

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-logique-conditionnelle.jpg.webp)

On peut par exemple se baser sur un bouton vrai/faux appelé « quiz » : Les champs du quiz n’apparaissent alors que si la case est cochée. La logique conditionnelle s’applique sur les champs que vous souhaitez cacher :

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-reglage-logique-conditionnelle.jpg.webp)

Dans cet exemple j’indique la règle suivante : Montrer ce champ si la valeur du champ Ajouter un quiz est égale à coché.

ACF propose de nombreux champs ainsi qu’une documentation bien fournie afin de facilement les mettre en application dans vos thèmes 