# Le champ galerie d’ACF, avec lightbox et diaporama

Dans ce cours nous allons voir comment tirer parti du champ galerie d’ACF pour créer, comme vous vous en doutez, une galerie, mais aussi un diaporama animé, et ajouter une Lightbox grâce à un petit peu de Javascript.

## Présentation du champ galerie

Le champ galerie est l’un de mes champs préférés, car il permet de faire plein de choses avec les images : une galerie certes, mais également un diaporama animé (slider). Et pour couronner le tout on va terminer avec une Lightbox toute simple.

![](https://capitainewp.io/wp-content/uploads/2020/05/acf-galerie-recadre-scaled.jpg.webp)

ACF nous offre un joli champ pour gérer facilement plusieurs images et les réorganiser :

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-galerie-admin-scaled.jpg.webp)

Passons sans plus attendre à la configuration !

## Configuration du groupe de champs

On va commencer par créer notre groupe de champ. Allez dans ACF > Groupes de champs > Ajouter. Si vous avez importé mon fichier JSON, le groupe de champ devrait déjà être pésent.

## Les réglages du champ

On va ajouter un seul champ pour le moment, qu’on va appeler Galerie et qui sera du type Galerie.

![](https://capitainewp.io/wp-content/uploads/2020/05/configuration-galerie-valeurs-scaled.jpg.webp)

Par contre, j’aime bien mettre le nom du champ (son slug) en anglais, car il sera utilisé dans le code source. Du coup, j’opte pour gallery.

En ce qui concerne le format de sortie, on va choisir ID de l’image. On n’a besoin que de leurs identifiants, car on va faire appel par la suite à des fonctions natives de WordPress qui vont générer le HTML des images pour nous.

On ne touche pas aux autres options mais certaines pourraient être intéressantes selon votre besoin :

- Vous pouvez par exemple demander un minimum de 4 images ;
- Interdire les images plus petites que 1000px ;
- Interdire les fichiers plus lourds que 2Mo ;
- Ou encore restreindre à des formats jpg seulement ;

Ces paramètres peuvent s’avérer très pratiques si votre site possède des rédacteurs qui ne feraient pas forcément attention à l’optimisation des images. Ces gardes-fous vous permettraient de garantir les meilleures performances possibles.

## Assigner le groupe de champs

On va maintenant assigner notre groupe à un modèle de page. Mais avant ça j’ai créé un modèle de page nommé gallery.php et que j’ai placé dans le dossier templates de mon thème.

```php
<?php 
/*
  Template Name: Champ Galerie
*/

  get_header();
  if( have_posts() ) : while( have_posts() ) : the_post();
?>
```

Dans le bloc « Assigner ce groupe de champs » de ACF, vous devriez pouvoir sélectionner Modèle de page • est égal à • Champ Galerie.

![](https://capitainewp.io/wp-content/uploads/2020/05/configuration-galerie-acf-scaled.jpg.webp)

Donc, notre champ Galerie va apparaitre lorsque je vais créer une nouvelle page et lui assigner le modèle de page Champ Galerie. On va tester.

Allez dans Pages > Ajouter, puis dans la colonne des réglages à droite cherchez Attributs de page, et choisissez le modèle Champ Galerie.

![](https://capitainewp.io/wp-content/uploads/2020/05/assigner-modele-page.jpg.webp)

À ce moment là, le groupe de champs devrait apparaitre en bas de la page ! C’est le moment d’ajouter quelques images à notre galerie :

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-galerie-admin-scaled.jpg.webp)

Une fois vos images choisies, vous allez pouvoir les réorganiser par un simple glisser / déposer. Vous pouvez supprimer une image en cliquant sur la croix qui apparaît au survol, et des actions de groupe sont disponibles pour réorganiser les images ou inverser leur ordre.

Bien, maintenant que tout est prêt, passons au code pour afficher notre galerie.

Pour plus d’informations sur les réglages possibles du champ galerie, rendez-vous sur la documentation officielle d’ACF. <https://www.advancedcustomfields.com/resources/gallery/>

## Créer une galerie

Tout est prêt côté backend, mais c’était la partie la plus facile. Maintenant place au code ! Bon, en réalité, ce n’est pas très compliqué car le code qu’on va utiliser est toujours le même, peu importe le cas !

Pour ce premier exemple, on va afficher une simple galerie, à l’aide de PHP et d’un petit peu de CSS.

## Côté PHP

Le code PHP est à mettre à l’endroit où on veut afficher la galerie, dans notre template. Ça peut être avant the_content(), ou après. Comme vous voulez !

```php
<?php 
    $images = get_field( 'gallery' );
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    
    if( $images ): 
 ?>
    <ul class="acf-gallery">
     <?php foreach( $images as $image_id ): ?>
         <li>
             <a href="<?php echo wp_get_attachment_url( $image_id ); ?>">
             <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                </a>
         </li>
       <?php endforeach; ?>
    </ul>
 <?php endif; ?>
```

La première chose qu’on fait, c’est récupérer le contenu de notre champ via la fonction get_field(). Et c’est bien notre slug de champ que l’on indique ici, donc le nom gallery en anglais que l’on a défini précédemment.

Ensuite, on définit la taille d’image qu’on va vouloir récupérer, on choisit Full pour le moment.

On continue avec un test : si la galerie a au moins une image, alors on va créer une balise `<ul>` pour commencer notre « liste » d’images.

Enfin, on lance une boucle Foreach (pour chaque image trouvée…). La seule donnée qu’on a pour le moment est l’identifiant de l’image.

On va donc utiliser 2 fonctions de WordPress pour nous aider :

- wp_get_attachment_url() permet de récupérer l’URL de l’image en grande taille ;
- Et wp_get_attachment_image() permet de générer la balise image, avec la prise en charge du srcset.

Pour cette dernière, on indique en second paramètre la taille de l’image à afficher, donc notre taille full. Dans WordPress cela veut dire qu’il va prendre la version originale de l’image.

Le srcset sera généré automatiquement et proposera au navigateur des versions plus petites pour le responsive.

## Coté CSS

Si vous essayez en l’état, vos images devraient déjà apparaitre, mais sans aucune mise en forme. Alors afin de rentre le tout plus esthétique, on va ajouter une petite dizaine de lignes de CSS, en utilisant notamment Flexbox pour créer une grille simple.

```css
.acf-gallery {
  list-style-type: none; /* Retirer le style de liste */
  padding: 0;
  margin: 0;
  display: flex;
  flex-wrap: wrap; /* Autoriser le retour à la ligne */
}

.acf-gallery li {
  flex: 33.333%; /* 3 images par ligne, mettez 25% pour en avoir 4 */
  padding: 10px;
}
```

Pas besoin de plus pour un résultat sympathique. Les images s’affichent 3 par 3 et comme j’en ai sélectionné 8 en tout, les 2 dernières occupent l’espace restant et s’affichent plus grandes.

![](https://capitainewp.io/wp-content/uploads/2020/05/acf-galerie-non-cadre-scaled.jpg.webp)

## Améliorer l’alignement et le ratio des images

Par contre, comme les images n’ont pas toutes le même ratio, c’est-à-dire la même proportion hauteur / largeur, elles ne sont pas toutes alignées par le bas, ce qui n’est pas très esthétique. On va donc aller corriger ça.

Pour cela on doit contraindre les images à avoir la même taille. Et on a vu comment le faire dans le cours sur les tailles d’images :

```php
<?php 
// Ajouter une taille d'image
add_image_size( 'gallery-thumb', 1200, 800, true );
```

Le dernier paramètre est le plus important : passé à true, il indique que je veux forcer cette taille exactement. WordPress va donc faire en sorte de « découper » ce qui dépasse. En créant une taille d’image gallery-thumb, j’assure donc des images à 1200px de large sur 800px de haut.

Mais cette taille ne sera appliquée que lorsque l’on importera de nouvelles images. On va donc faire appel à un plugin pour regénérer les différentes tailles de mes images :  Regenerate Thumbnails

Il va passer sur toutes les images de ma bibliothèque, et appliquer les nouveaux formats.

Allez dans Outils > Regénérer les miniatures d’images. Vous devriez voir votre nouvelle taille d’image dans la liste. Cliquez sur Regénérer les miniatures et laissez faire l’outil.

![](https://capitainewp.io/wp-content/uploads/2020/05/regenerate-thumbnails-scaled.jpg.webp)

Maintenant, on va retourner dans le PHP et on va changer notre variable $size. On lui indique cette fois qu’on veut notre nouveau format gallery-thumb de 1200×800.

```php
<?php 
    $images = get_field( 'gallery' );
    $size = 'gallery-thumb'; // Le même nom que dans add_image_size
```

Enregistrez, rechargez la page, et ça devrait être beaucoup mieux !

![](https://capitainewp.io/wp-content/uploads/2020/05/acf-galerie-recadre-scaled.jpg.webp)

Nos images ont maintenant toutes la même taille et le même ratio largeur/hauteur, ce qui donne un rendu bien plus esthétique dans notre galerie.

## Ajouter une Lightbox

Maintenant on va ajouter une lightbox pour, qu’au clic sur une image, on puisse l’agrandir sans quitter la page. Et comme on est des guedins, on va la faire nous même, sans faire appel à une librairie jQuery.

Vous allez voir que c’est bien plus simple que ce qu’il n’y paraît.

## Les (trop) grandes images

On a déjà préparé le terrain en mettant un lien sur chaque image. L’URL de celle-ci était récupérée via la fonction wp_get_attachment_url().

```php
<a href="<?php echo wp_get_attachment_url( $image_id ); ?>">
    <?php echo wp_get_attachment_image( $image_id, $size ); ?>
</a>
```

> WordPress n’ira pas chercher l’image en taille originale si celle-ci dépasse 2560px, à la place, il affichera une version plus petite, automatiquement redimensionnée par WordPress, à 2560px tout pile.

De cette manière, on évite de charger en lightbox des images lourdes. Ayant pris mes images sur Unsplash, celles-ci peuvent parfois faire plus de 8000px et dépasser les 20Mo !

Quand je fais le test en cliquant sur l’image, on voit à la fin de son URL -scaled.jpg. C’est la version à 2560px de WordPress. En téléchargeant l’image et en ouvrant l’inspecteur du Mac, j’en ai bien la confirmation.

![](https://capitainewp.io/wp-content/uploads/2020/05/image-scaled-1.jpg.webp)

C’est une bonne taille, ça permet d’avoir une image nette et pas trop lourde, même sur des écrans à haute densité de pixels comme les écrans Retina.

## Le code de notre lightbox

On va maintenant ajouter le code nécessaire à notre lightbox, et pour cela on va intervenir dans le HTML, le CSS, et le JS.

Lorsque l’on va cliquer sur une image, on aura un fond noir transparent et l’image par-dessus :

![](https://capitainewp.io/wp-content/uploads/2020/05/lightbox-scaled.jpg.webp)

## Côté PHP

Côté template, on va simplement ajouter une `<div>` dans le pied de page. C’est elle qui servira de support plein écran pour afficher à la fois notre image, et le fond noirci.

```php
 </main>

  <div class="lightbox"></div> <!– On a juste besoin d ajouter ça ! –>

  <footer class="site__footer">
    Formation ACF
  </footer>
  
  <?php wp_footer(); ?>

</body>
</html>
```

## Côté CSS

Pour le CSS, une seule classe suffira. On va créer un élément qui est caché par défaut, qui prendra tout l’écran une fois affiché, avec un fond noir transparent

```css
.lightbox {
  display: none; /* cachée par défaut */
  position: fixed; /* fixée et qui prend tout l'écran */
  z-index: 1000; /* Pour être sûr de passer au dessus du reste */
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background-color: rgba(0,0,0,.7); /* noire avec transparence */
  background-size: contain; /* l'image occupe tout l'espace disponible */
  background-repeat: no-repeat; 
  background-position: center;
  cursor: pointer; /* Le curseur a la même forme que sur un lien */
}
```

On prépare aussi notre image qui sera affichée en image de fond. Elle sera : centrée, non répétée, et elle occupera le plus d’espace disponible grâce à la propriété CSSbackground-size: contain.

Habituellement, on utilise cette propriété pour mettre des images en fond de section, mais on applique alors cover : l’image occupe toute la zone, quitte à être rognée. Mais dans notre cas, on veut que l’image apparaisse en entier. Il y aura donc des zones inoccupées, et c’est pour cela qu’on applique un voile noir autour.

Afin de bien comprendre la différence visuelle entre les deux, j’ai réalisé un CodePen à ce sujet. N’hésitez pas à le consulter !

## Côté JS

Et enfin, au niveau Javascript, une petit quinzaine de lignes fait également l’affaire :

```js
var $lightbox = $('.lightbox'); // L'élément HTML

// Ouvrir la lightbox
$('.acf-gallery a').click(function(e) {
    e.preventDefault(); // On empêche le changement de page
    var url = $(this).attr('href'); // On récupère l'URL de l'image dans href

    // On applique l'image en fond
    $lightbox.css('background-image', 'url(' + url + ')'); 
    $lightbox.fadeIn(); // Et on fait apparaitre la lightbox
});

// Fermer la lightbox
$lightbox.click(function () {
    $lightbox.fadeOut();
});
```

On récupère tout d’abord l’élément du DOM de notre Lightbox, désigné par la classe .lightbox.

Ensuite on a 2 fonctions : la première pour ouvrir la lightbox, et la seconde pour la fermer.

l’instruction e.preventDefault() permet de capter l’événement navigateur et l’annuler. Si on ne le fait pas, le lien sera suivi et on quittera la page.

On va récupérer juste après l’URL de l’image, qui se trouve dans l’attribut href de notre lien. Et la magie intervient au moment où on indique cette URL en image de fond de notre lightbox, qu’on fait apparaitre juste après.

> J’ai fait le flemmard en utilisant jQuery mais il n’aurait pas été bien plus compliqué de le faire en JS natif.

Essayez, et si tout s’est bien passé, votre Lightbox devrait apparaitre lorsque vous cliquez sur une image, de la même manière que sur ce site !

## Créer un diaporama animé

Le champ galerie nous permet d’afficher une liste d’image, mais rien ne nous oblige à l’afficher sous forme de galerie. Après tout, on pourrait très bien faire un diaporama animé avec l’aide d’une bibliothèque jQuery !

![](https://capitainewp.io/wp-content/uploads/2020/05/flexslider-galerie-acf-scaled.jpg.webp)

Pour cet exemple, je vous propose d’utiliser la librairie Flexslider de WooCommerce. Elle est simple à mettre en place, légere et responsive. <https://woocommerce.com/flexslider/>

Une fois l’archive téléchargée, je vais faire le tri. On a seulement besoin de ces fichiers :

- Les styles, nommé flexliser.css ;
- Le script, nommé jquery.flexslider-min.js ;
- Et le dossier fonts qui contient les flèches précédent / suivant.

Je les place dans un dossier lib/flexslider que je crée dans mon thème. Par convention on dira que lib contient les librairies externes, mais c’est complètement arbitraire.

On va maintenant aller charger ces ressources depuis notre functions.php :

```php
<?php 
// Script et styles
function alex_assets() {

  // … autres styles et scripts (dont jQuery)

  // Flexlider (pour le cours sur la galerie)
  wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/lib/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '2.7.2', true );
  
  wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/lib/flexslider/flexslider.css', array(), '2.7.2' );
    
  // Pensez à ajouter la dépendance à Flexslider ! 
  wp_enqueue_script( 'alex', get_template_directory_uri() . '/js/script.js', array( 'jquery', 'flexslider' ), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'alex_assets' );
```

Notez que notre script dépend désormais de jQuery, mais également de Flexslider !

Je vous montre comment charger proprement les styles et scripts dans la formation développeur de thèmes, c’est dans le même hook que ça se passe. Il faut juste bien penser à mettre jquery en dépendance de flexslider, afin que celui-ci soit chargé toujours après. Sinon ça va planter.

## Préparer le champ ACF

Et maintenant je vais aller créer un nouveau champ ACF, toujours dans mon groupe “Galerie”. Ce sera là encore un champ galerie, mais cette fois je l’appellerai slider.

![](https://capitainewp.io/wp-content/uploads/2020/05/champ-slider-scaled.jpg.webp)

On va également en profiter pour renvoyer cette fois un tableau de données (array) à la place de l’ID des images.

Enregistrez, et retournez dans votre page pour ajouter quelques images à ce champ.

## Ajouter le code PHP et JS

Voici maintenant le code PHP à ajouter dans notre template, à la suite de l’autre par exemple.

```php
<?php 
 $images = get_field( 'slider' ); // Cette fois notre champ s'appelle slider
 if( $images ): 
  // var_dump($images); // Pour voir les données renvoyées
?>
    <div id="slider" class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                    <a href="<?php echo esc_url( $image['url'] ); ?>">
                     <img 
                          src="<?php echo esc_url( $image['sizes']['gallery-thumb'] ); ?>" 
                          alt="<?php echo esc_attr( $image['alt'] ); ?>" 
                     />
                     <p><?php echo esc_html( $image['caption'] ); ?></p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
```

La classe .flexslider est importante car c’est elle qui va dire qu’on veut en faire un slider en JS.

Vous pouvez mettre un var_dump() afin de voir quelles données ACF nous renvoie sur les images sélectionnées. Et il y en a pas mal !

![](https://capitainewp.io/wp-content/uploads/2020/05/var-dump-images-scaled.jpg.webp)

On voit notamment qu’on a un sous-tableau sizes contenant les URL vers chaque format d’image. Pour afficher l’image en 1200px, je peux donc appeler $image['sizes']['gallery-thumb'].

Et enfin, pour activer notre slider, il nous suffira d’une seule ligne de JS à ajouter à la suite de notre script :

```js
// Flexslider 
$('.flexslider').flexslider();
```

Normalement, si tout va bien, ça devrait fonctionner ! Si ce n’est pas le cas, ouvrez la console par un clic droit > Inspecter, puis en allant dans l’onglet Console. Vérifiez qu’il n’y a pas de souci :

- Est-ce qu’une erreur est affichée dans la console en rouge ?
- Est-ce qu’un fichier n’a pas réussi à être chargé : erreur 404 ?

Pour ce dernier cas, vérifiez que vous avez indiqué les bonnes URL lors des chargements de scripts.

Pour terminer en beauté, rendons notre diaporama compatible avec notre lightbox. Pour cela, il suffit d’ajouter notre sélecteur dans le JS :

```js
// Ouvrir la lightbox
$('.acf-gallery a, .flexslider a').click(function(e) {}
```

N’oubliez pas la virgule entre les 2 sélecteurs, afin de bien les distinguer (ils n’ont pas de relation de parenté). Et voilà !

Vous savez maintenant utiliser le champ galerie d’ACF et l’utiliser pour tous vos besoins ! Peu importe le cas de figure, ce sera toujours le même code PHP à utiliser.

On a vu la méthode avec les ID d’image, et celle avec les données sous forme de tableau PHP. À vous de choisir la solution qui vous convient le mieux.

Et après, libre à vous de choisir la mise en forme, et venir y ajouter des scripts par-dessus !