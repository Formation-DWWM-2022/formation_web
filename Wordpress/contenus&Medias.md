# Les principaux champs ACF (1/3) • Contenus et médias

Dans les 3 prochains cours on va découvrir plus en détails les différents champs proposés par ACF, et je vais vous donner quelques exemples où ils pourraient s’avérer utiles.

Dans le cours précédent, on a vu comment créer un groupe de champs et l’assigner à nos publications. Pour aller plus loin, on va maintenant voir plus en détails quels champs sont disponibles dans ACF, que ce soit la version gratuite ou la Pro. Il en existe pas mal et certains d’entre eux peuvent s’avérer très utiles !

Pour afficher leur valeur dans le template, c’est très simple, il suffit dans la majorité des cas d’utiliser la fonction the_field proposée par ACF :

```php
<?php the_field( 'mon_champ' ); ?>
```

Mais pour certains d’entre eux, ce sera légèrement différent. Dans ce cas je vous montrerai le code correspondant au cas par cas.

Pour tous les champs, je mettrai un lien vers leur documentation officielle car ACF a fait un effort considérable pour fournir des exemples clairs et faciles à comprendre.

> Prenez le temps d’essayer les différents réglages pour chaque champ. Je vais présenter les plus intéressants, mais il y en a trop pour tous les détailler ici, et certains pourraient présenter de l’intérêt selon vos besoins.

Passons maintenant en revue les différents champs et leurs particularités, et on commence avec les champs de contenu, et d’images.

## Les champs de texte

Lorsque vous souhaitez saisir du texte, il existe 3 possibilités :

## Le champ texte simple

Le champ texte est tout à fait basique et tient sur une seule ligne.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-texte.jpg.webp)

Il est idéal pour toute donnée texte courte.

Sa documentation : <https://www.advancedcustomfields.com/resources/text/>.

## Le champ zone de texte (textarea)

Si vous avez besoin d’écrire un texte plus long, optez pour la zone de texte.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-zone-texte.jpg.webp)

Le réglage Lignes vous permettra de choisir la hauteur du champ. Il est réglé sur 8 lignes par défaut mais ça peut très vite charger l’interface.

Vous pouvez également définir comment sont gérés les retours à la ligne : pas de formatage (ils seront ignorés), avec des retours à la ligne via la balise `<br>`, ou alors chaque ligne est un nouveau paragraphe.

Si vous choisissez paragraphe, alors il ne faudra pas entourer de balises <p> votre champ dans le template (car il est interdit en HTML d’imbriquer des `<p>`) :

```php
<!– Avec le réglage nouveau paragraphe –>
<div><?php the_field( 'textarea' ); ?></div>

<!– Résultat : –>
<div>
    <p>ligne 1</p>
    <p>ligne 2</p>
</div>

<!– Avec le réglage retour à la ligne –>
<p><?php the_field( 'textarea' ); ?></p>

<!– Résultat : –>
<p>
    ligne 1<br>
    ligne 2
</p>
```

Sa documentation : <https://www.advancedcustomfields.com/resources/textarea/>

## Le champ éditeur de contenu (WYSIWYG)

Ce champ permet d’appeler l’éditeur Tiny MCE (l’ancien éditeur visuel de WordPress) afin de proposer des mises en formes plus riches, comme le gras, l’italique, la possibilité d’insérer un lien et même pourquoi pas des médias.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-editeur-contenu.jpg.webp)

Parmi les réglages intéressants on retrouve la possibilité d’afficher ou cacher l’onglet HTML (texte brut). En général je choisis de cacher cet onglet afin de simplifier l’interface.

On peut aussi avoir la barre d’outil complète ou basique. Dans le cas où le champ ne devrait permettre que de faire du gras, italique et des liens, choisissez Basic. Mais si vous avez besoin des niveaux de titres, choisissez Full.

Vous pouvez également afficher ou cacher le bouton d’ajout de média, afin d’autoriser ou non l’insertion d’images dans ce champ.

Sa documentation : <https://www.advancedcustomfields.com/resources/wysiwyg-editor/>

## Les champs de nombres

Afin d’ajouter un peu de contraintes dans vos champs, vous allez pouvoir utiliser les champs e-mail, nombre, URL ou encore mot de passe.

## Le champ nombre

Pour le champ nombre, vous allez pouvoir fixer la valeur minimale, maximale et le pas (l’intervalle) entre chaque appui sur la flèche haut / bas.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-nombre.jpg.webp)

Vous pourriez également afficher un préfixe ou un suffixe dans le champ : ajoutez par exemple le suffixe € lorsque la valeur attendue est un prix. Pour autant c’est une information uniquement dédiée à l’interface d’administration, et il faudra à nouveau ajouter ce préfixe / suffixe à la main dans le template :

```php
<p><?php the_field( 'price' ); ?> € </p>
```

## Le champ curseur (range)

Pour aller encore plus loin avec les nombres, ACF vous propose également le champ curseur. Il permet de sélectionner une valeur grâce à un bouton à glisser de gauche à droite. Il y a également un champ nombre (qui a l’avantage d’être plus petit) pour définir la valeur à la main.

Du coup ce champ peut être pratique pour définir une valeur en pourcentage par exemple, ou n’importe quelle valeur devant se trouver dans un intervalle délimité.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-curseur.jpg.webp)

Sa documentation : <https://www.advancedcustomfields.com/resources/range/>

## Les champs URL et e-mail

Les champs URL et e-mail permettent de vérifier le format avant enregistrement afin de contrôler que le texte saisi est bien une URL ou une adresse e-mail valide. ACF utilise simplement les balises correspondantes en HTML5.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-url-email.jpg.webp)

## Le champ mot de passe

Ce n’est pas le champ que vous utiliserez le plus souvent, il permet de cacher une valeur saisie, mais elle ne sera pas chiffrée à l’enregistrement, et un simple coup d’inspecteur permettrait de révéler sa valeur. À utiliser donc avec des pincettes.

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-password.jpg.webp)

Sinon il possède les mêmes propriétés que le champ texte.

## Les champs de médias

Le principal avantage d’ACF est la possibilité d’ajouter des champs de médias comme des images, des galeries, des fichiers et même des contenus embarqués (les embeds).
Le champ image

Le champ image va vous permettre d’afficher une image où bon vous semble dans votre page, et pas forcément dans le contenu. C’est donc un champ très pratique !

![](https://capitainewp.io/wp-content/uploads/2017/06/acf-champ-image.jpg.webp)

Comme on l’a vu dans le cours précédent, il vaut mieux sélectionner en format de sortie l’identifiant (ID) de l’image, plutôt que l’URL (car ce serait toujours l’image originale, qui risque d’être trop grande selon le cas) ou un tableau de données (on n’a besoin que de l’ID car on utilisera ensuite les fonctions natives de WordPress).

Il faudra donc utiliser ce code pour afficher votre image dans votre template :

```php
<?php 
$image_id = get_field( 'image' );
if( $image_id ) { 
 echo wp_get_attachment_image( $image_id, 'full' );
}
```

Cette fonction va générer la balise image et même le srcset qui va avec. Le second paramètre permet d’indiquer la taille de base de l’image parmi les tailles proposées par WordPress par défaut : thumbnail, medium, medium-large, large, full ou même celles que vous auriez ajouté dans la configuration de votre thème.

Si vous souhaitez appliquer l’image en fond via CSS, utilisez plutôt ce code :

```php
<?php 
 $image_id = get_field( 'image' );
 $image = wp_get_attachment_image_src( $image_id, 'full' );
 $url = $image[0]; // $image est un tableau
?>
 <div style="background-image: url(<?php echo $url; ?>)"> … </div>
```

wp_get_attachment_image_src retourne un tableau contenant l’URL, la largeur et la hauteur. C’est pour cette raison qu’on récupère l’entrée 0 du tableau, qui correspond à l’URL.

Sa documentation : https://www.advancedcustomfields.com/resources/image/

## Le champ galerie [ACF Pro]

Le champ galerie permet d’insérer plusieurs images à la fois en vue d’en faire une galerie photo ou un diaporama par exemple. Il n’est présent que dans la version Pro d’ACF.

![](https://capitainewp.io/wp-content/uploads/2017/06/acf-champ-galerie-images.jpg.webp)

Dans les réglages, vous allez pouvoir ajouter des contraintes : taille minimale/maximale des images, poids limite des fichiers…

Dans l’administration de votre page, vous allez pouvoir réorganiser les images grâce à un glisser/déposer après les avoir sélectionnées.

Côté site, ACF ne vous renvoie que les images, c’est donc à vous de faire le nécessaire pour transformer ça en galerie, ou en diaporama animé par exemple, à l’aide de HTML, CSS, et un peu de Javascript. Et pourquoi pas en utilisant une librairie jQuery.

Je dédie un cours à ce sujet justement, pour ceux qui possèdent la version premium de cette formation.

Sa documentation : https://www.advancedcustomfields.com/resources/gallery/

## Le champ fichier

Le champ fichier permet de joindre un fichier à une page, en vue de le proposer en téléchargement par exemple. 

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-fichier.jpg.webp)

Vous pouvez contraindre le poids du fichier, ainsi que le type mime de celui-ci. Vous pourriez obliger par exemple l’import d’un fichier PDF uniquement.

En ce qui concerne le format de sortie, je choisis généralement l’URL, par mesure de simplicité, mais vous pourriez laisser sur Données du fichier afin de récupérer toutes ses informations (poids, type…).

Essayez un var_dump() pour voir toutes les données renvoyées par ACF.

```php
<?php var_dump( get_field( 'fichier' ) ); 
/*
si URL : 'wp-content/uploads/monfichier.pdf'
si Données : array( … ) 
*/
```

Sa documentation : https://www.advancedcustomfields.com/resources/file/

## Le champ oEmbed

Un contenu embarqué est un lien que l’on copie depuis Youtube, Vimeo, Twitter, ou encore Facebook et qui se transforme en élément interactif.

Cela permet d’éviter de copier un code `<iframe>` dans son éditeur pour intégrer un contenu externe.

Dans WordPress il suffit de coller l’URL d’un service web compatible pour le voir apparaitre dans l’éditeur visuel ou le champ Tiny MCE.

Au lieu d’utiliser le champ éditeur visuel pour un embed, ACF vous propose le champ oEmbed où il suffit de coller une URL. L’aperçu apparaît ensuite en temps réel. 

![](https://capitainewp.io/wp-content/uploads/2020/03/acf-champ-oembed.jpg.webp)

Essayez par exemple avec l’URL d’une vidéo Youtube ou d’un Tweet. Pour afficher le contenu, il suffit d’utiliser la fonction the_field() ! Mais si vous voulez ajouter des paramètres au code embarqué, la documentation d’ACF vous donnera la marche à suivre.

Sa documentation : https://www.advancedcustomfields.com/resources/oembed/

C’est donc la richesse des champs proposés par ACF qui fait sa force, mais également leur simplicité d’utilisation et une documentation très bien faite.

Pour autant on ne les a pas encore tous vu, et je vous invite donc à en découvrir davantage dans le prochain cours.