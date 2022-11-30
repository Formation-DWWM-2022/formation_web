# Les principaux champs ACF (2/3) • Choix, relations et jQuery

Il existe d’autres champs ACF qui peuvent s’avérer utiles comme les cases à cocher, les vrai/faux, ou encore d’autres champs à base de jQuery.

On continue l’exploration des champs ACF avec une nouvelle fournée de champs tous plus utiles les uns que les autres.
Les champs de choix

Jusqu’à présent on a vu des champs ouverts, permettant d’insérer ce que l’on souhaite. On va maintenant aborder les champs proposant des choix prédéfinis.

## Le champ liste déroulante

La liste déroulante utilise un champ `<select>` afin de proposer diverses options. Dans les réglages vous pourrez activer l’interface avancée, qui va appeler la librairie Select2 qui permet d’améliorer les possibilités natives :

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-liste-deroulante-select.jpg.webp)

Avec l’interface avancée, le champ possède un moteur de recherche qui s’avère très pratique si votre liste déroulante est longue.

C’est le réglage Choix qui va nous permettre d’indiquer les valeurs possibles. Le principe est d’indiquer une valeur par ligne, ou même sous la forme clé : valeur. La clé est enregistrée en base et la valeur est affichée à l’écran.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-valeurs-liste-deroulante.jpg.webp)

Dans format de sortie vous pouvez indiquer si vous voulez récupérer la clé (intitulé), la valeur, ou bien les deux sous forme de tableau PHP.

Vous pouvez également choisir s’il est possible de sélectionner plusieurs valeurs. D’ailleurs, si vous optez pour plusieurs valeurs, activez l’interface avancée, car le champ HTML natif de sélection multiple nécessite de maintenir la touche CTRL pour sélectionner plusieurs éléments.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-liste-avancee-multiple.jpg.webp)

L’affichage avancé par tags (étiquettes) est bien plus pratique en terme d’expérience utilisateur.

Lorsque vous utilisez des valeurs multiples, il faut légèrement adapter le code car vous recevrez un tableau de données PHP :

```php
<?php
$colors = get_field( 'colors' );

// Solution 1
if( $colors ) {
    echo implode( ', ', $colors );
}

// Solution 2
foreach( $colors as $color ) {
    echo $color; 
}
```

Sinon, on va voir juste après que les cases à cocher ou encore le groupe de boutons sont plus judicieux lorsque le nombre de choix proposé est restreint.

Sa documentation :  <https://www.advancedcustomfields.com/resources/select/>

## La case à cocher et les boutons radio

Les deux champs fonctionnent de la même manière. La différence fondamentale est que vous pouvez cocher plusieurs cases d’un coup, alors que le bouton radio impose un et un seul choix.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-case-cocher-radio.jpg.webp)

Les options vous permettront d’afficher les cases horizontalement ou verticalement, et vous donneront la possibilité de permettre une valeur personnalisée.

Leur documentation : <https://www.advancedcustomfields.com/resources/radio-button/>

## Le groupe de boutons

Le groupe de boutons permet de choisir plusieurs valeurs, au même titre que les cases à cocher. La différence est purement esthétique, mais les 2 champs ont la même finalité.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-groupe-boutons.jpg.webp)

Sa documentation : <https://www.advancedcustomfields.com/resources/button-group/>

## Le champ Vrai / Faux

Ce champ permet d’afficher une simple case à cocher pour un résultat binaire oui / non. On pourra s’en servir dans le code du template pour écrire une condition logique.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-vrai-faux.jpg.webp)

L’interface avancée (dans la version pro) permet d’afficher un interrupteur on/off plutôt mignon.

Dans mon exemple, si la case est cochée, c’est que je recommande la recette, et dans le code ça se traduit ainsi :

```php
<?php 
if( get_field( 'approved' ) ) { // True or False
    echo 'Cette recette est approuvée par les chefs !';
}
```

Ce genre de champ va également nous permettre de créer des logiques conditionnelles, afin d’afficher ou cacher d’autres champs en fonction de la valeur. On en reparlera dans les prochains cours de cette formation.

Sa documentation : <https://www.advancedcustomfields.com/resources/true-false/>

## Les champs relationnels

Les champs relationnels sont parmi les plus puissants d’ACF car ils vont permettre de faire la liaison entre plusieurs publications. C’est de cette manière que j’ai réussi à créer une relation parent / enfant entre mes formations (qui est un CPT) et mes cours (un autre CPT).

## Les champs de lien

Il existe 2 champs pour faire des liens : le champ Lien classique qui permet de faire un lien vers n’importe quelle URL, et le champ Lien vers une publication, qui permet de créer un lien vers une ressource de votre site grâce à un moteur de recherche :

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champs-liens.jpg.webp)

Si vous voulez autoriser n’importe quel type de lien : interne ou externe, alors optez pour le champ Lien, mais si vous voulez contraindre le choix d’un lien interne au site, rabattez plutôt sur le champ Lien vers une publication.

Concernant le format de sortie, vous pouvez afficher directement l’URL, ou récupérer un tableau PHP contenant en plus le titre de la publication. Là aussi, faites un var_dump() pour voir toutes les données proposées.

```php
<!– Valeur de sortie : URL du lien –>
<a href="<?php the_field( 'lien' ); ?>">Cliquez ici</a>

<!– Valeur de sortie : Tableau de données –>
<?php 
 $link = get_field( 'lien' ); 
 $link_url = $link['url'];
    $link_title = $link['title'];
?>
<a href="<?php echo $link_url; ?>"><?php echo $link_title; ?></a>
```

Leur documentation : <https://www.advancedcustomfields.com/resources/page-link/>

## Le champ Objet publication

Le problème du champ lien, c’est qu’il ne renvoie que l’URL d’un article. Si vous avez besoin de récupérer son identifiant et son contenu, alors il faudra plutôt utiliser le champ Objet publication.

Il permet par exemple d’afficher le contenu d’un article dans une autre publication. Je l’utilise d’ailleurs pour afficher un résumé de mes tarifs sur la page d’accueil de ce site. Tarifs qui se trouvent initialement dans leur propre page.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-objet-publication.jpg.webp)

Ce champ utilise également la libraire Select2 de jQuery et vous permet donc de rechercher facilement l’une de vos publications dans WordPress.

Ses options vous permettent même de limiter les choix à un type de publication ou une taxonomie particulière.

En sortie, on peut récupérer l’ID de l’article, ou bien un objet contenant toutes les informations de celui-ci, et même ses propres champs ACF.

```php
<?php
$post_object = get_field( 'publication' );

if( $post_object ) { 
 $post = $post_object;
 setup_postdata( $post ); // permet d'initialiser les templates tags
 the_title(); 
 the_content();
    the_field( 'mon_champ' ); // ça marche aussi avec les champs ACF
}
```

Sa documentation : <https://www.advancedcustomfields.com/resources/post-object/>

## Le champ relationnel [ACF Pro]

Le champ relationnel est original, puissant, et très pratique. Il permet de sélectionner plusieurs publications, et de choisir dans quel ordre elles doivent apparaitre. La colonne de gauche liste les publications disponibles, et celle de droite affiche notre sélection.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-relationnel.jpg.webp)

On l’utilise pour afficher des publications choisies : à la place d’afficher les dernières en date (à la manière de la WP Query qu’on abordera plus tard), ce champ permet au rédacteur de choisir quelles publications il veut mettre en avant.

J’ai mis longtemps à comprendre l’intérêt de ce champ, mais au final c’est l’un de mes préférés ! Un cours avec des exemples pratiques lui est dédié dans la partie premium de cette formation.

Sa documentation : <https://www.advancedcustomfields.com/resources/relationship/>

## Les champs Taxonomie et Utilisateur

Ce sont peut-être les deux champs les moins utiles d’ACF, mais ils pourraient trouver leur utilité dans certains cas.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champs-taxonomie-utilisateur.jpg.webp)

Le champ Taxonomie permet de lister et choisir une catégorie ou une étiquette. Mais il vaut du coup mieux utiliser l’interface native des taxonomies.

Le champ Utilisateur permet de choisir un utilisateur, un peu comme c’est le cas avec l’auteur. Dans le cadre de Alex, je suis l’auteur de toutes les publications, mais j’utilise ce champ pour définir quelle personne présente telle ou telle formation.

Leur documentation : <https://www.advancedcustomfields.com/resources/taxonomy/>

## Les champs jQuery

Il existe également certains champs qui font appel à jQuery pour proposer une expérience agréable, comme c’est le cas avec le champ de date et d’heure, de couleur ou encore la Google Map.

## Les champs de date et d’heure

Il existe 3 champs pour sélectionner une date, une heure ou alors une date et une heure. Chacun d’entre eux propose un sélecteur qui apparait au clic sur le champ.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champs-date-heure.jpg.webp)

Pour chacun de ces champs vous allez pouvoir choisir le format d’affichage dans l’administration, ainsi que le format affiché dans votre modèle.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-formats-date-heure.jpg.webp)

Ce sont les formats de date en PHP qui sont utilisés ici. Pour afficher ensuite votre date/heure dans le modèle, utilisez ce code :

```php
<?php 
// Si vous n'avez pas besoin de manipuler la date
the_field( 'date' ); 

// Pour manipuler la date
$date_string = get_field( 'date' );
$date = DateTime::createFromFormat( 'Ymd', $date_string );
$date->modify( '+1 day' ); // Ajouter un jour par exemple
echo $date->format( 'j M Y' );
```

Vous pourriez utiliser ce champ pour afficher une date directement dans le template (pour gérer des événements par exemple), ou alors l’utiliser pour créer un filtre dans une WP Query (que l’on verra très bientôt dans cette formation).

Leur documentation : https://www.advancedcustomfields.com/resources/date-time-picker/

## Le champ couleur

Le champ couleur va permettre de sélectionner une couleur en tapant son code héxadécimal ou en sélectionnant la couleur directement avec le sélecteur natif de WordPress.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-couleur.jpg.webp)

Il va prendre tout son intérêt lorsque l’on abordera les pages d’options ACF (version pro), qui vont nous permettre de créer des réglages non pas liés à une publication en particulier, mais à tout le site.

Pour afficher une couleur en fond par exemple, utilisez ce code :

```php
<div style="background-color: <?php the_field( 'color' ); ?>"></div>
```

Sa documentation : https://www.advancedcustomfields.com/resources/color-picker/

## Le champ Google Map

Et enfin, le champ Google Map va vous permettre d’afficher une carte Google avec autant de marqueurs que vous le souhaitez, et ce sans avoir besoin de faire appel à une extension ! 

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-google-map.jpg.webp)

Mais pour faire en sorte que cela fonctionne, il va vous falloir une clé d’API Google Map valide via Google Cloud Platform. Ajoutez ensuite dans votre functions.php ce code : 

```php
<?php 
function alex_acf_google_map_api( $api ){
    $api['key'] = 'votre_clé_api_ici';
    return $api;
}
add_filter( 'acf/fields/google_map/api', 'alex_acf_google_map_api' );
```

Au niveau des réglages vous allez pouvoir choisir le centrage par défaut, le niveau de zoom, et la hauteur de la carte.

Pour l’affichage sur le site, il va falloir un peu de Javascript. Mais la documentation d’ACF fournit tout le nécessaire pour que ça fonctionne facilement. Dans la suite des cours, je vous montrerai une étude de cas d’une Google Map ACF pour créer notamment les emplacements d’un food-truck, à l’aide de Custom Post Types.

Sa documentation : https://www.advancedcustomfields.com/resources/google-map/

On vient de voir une nouvelle fournée de champs tous autant utiles les uns que les autres ! Mais ACF ne s’arrête pas là, car il existe encore d’autres champs seulement disponibles dans la version pro. Et croyez-moi, elle vaut entièrement l’investissement !

On va profiter du prochain cours pour les découvrir, et ainsi clore cette série de présentation des champs ACF.