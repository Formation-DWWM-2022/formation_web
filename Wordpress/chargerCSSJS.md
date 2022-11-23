# Charger les scripts et les styles

Le fichier functions.php permet de charger les scripts JS et les feuilles de styles CSS de la bonne manière, afin de prendre en compte les éventuelles dépendances.

Dans notre thème, on va avoir besoin de charger une feuille de styles CSS et bien souvent un script JS pour ajouter de l’interactivité, mais on va voir qu’on ne les appelle pas directement depuis le code de notre header.php. C’est dans functions.php que ça se passe, et il y a une bonne raison à cela !

## Pourquoi ne pas charger scripts et styles directement dans le head ?

Après tout, qu’est-ce qui nous empêche de les charger « à la main », en dur dans le code ?

En fait il faut voir votre site WordPress comme un écosystème dans lequel interagissent le coeur du CMS, les extensions et votre thème.

Et tout ce petit monde aura ses propres scripts et styles à charger, mais encore faut-il que ce soit fait dans le bon ordre : Imaginez que votre script utilise la librairie select2, qui elle-même a besoin de jQuery. Il vous faudra alors :

- Charger jQuery en premier ;
- Charger ensuite Select2 ;
- Charger enfin votre script, qui pourra appeler le composant Select2 sans souci.

```html
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?ver=3.3.1'></script>
<script type='text/javascript' src='http://wp.local/wp-content/themes/capitaine/js/select2.min.js?ver=4.0.6'></script>
<script type='text/javascript' src='http://wp.local/wp-content/themes/capitaine/js/script.js?ver=1.0'></script>
```

D’autres scripts, en provenance des extensions, auront également besoin de mettre jQuery comme une dépendance.

Pareil pour les styles : vous aurez peut-être envie de charger votre feuille de style en dernier afin d’écraser plus facilement des styles CSS apportés par une extension.

Le principe est donc simple : le thème et les extensions vont déclarer leurs scripts et styles à WordPress, indiquer les dépendances nécessaires à chacun d’entre eux. Et c’est le CMS qui va automatiquement charger le tout dans le bon ordre, au travers de la fonction wp_head() que l’on avait mise dans notre fichier header.php (d’où l’importance capitale de cette fonction).

## Bien déclarer ses scripts et styles dans functions.php

Pour déclarer tout cela, on va utiliser le hook suivant :add_action( 'wp_enqueue_scripts', 'votre_fonction' );

Pour rappel, le principe des Hooks est de dire à WordPress que lorsqu’il arrive au point clé wp_enqueue_scripts, il lance notre fonction nommée en deuxième paramètre (on appelle cela une fonction de callback).

Voici ce que ça peut donner dans votre functions.php :

```php
<?php
function alex_register_assets() {
    
    // Déclarer jQuery
    wp_enqueue_script('jquery' );
    
    // Déclarer le JS
    wp_enqueue_script( 
        'alex', 
        get_template_directory_uri() . '/js/script.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );
    
    // Déclarer le fichier style.css à la racine du thème
    wp_enqueue_style( 
        'alex',
        get_stylesheet_uri(), 
        array(), 
        '1.0'
    );
   
    // Déclarer le fichier CSS à un autre emplacement
    wp_enqueue_style( 
        'alex', 
        get_template_directory_uri() . '/css/main.css',
        array(), 
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'alex_register_assets' );
```

La fonction wp_enqueue_script() permet d’inscrire un fichier JS à afficher dans la page. Et la fonction wp_enqueue_style() permet d’inscrire un fichier CSS.

Il y a plusieurs paramètres à renseigner :

## Le handle : nom du style / script

Le premier paramètre est le handle, c’est le nom unique que vous allez donner à votre fichier. Je met en général le nom du thème pour les deux.

Si vous venez à ajouter d’autres fichiers, il faudra alors leur donner un nom différent, le but étant de distinguer les différentes ressources avec des noms uniques :

```php
<?php 
 // Déclarer un autre fichier JS
 wp_enqueue_script( 
        'diaporama', 
        get_template_directory_uri() . '/js/diaporama.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );
```

En ce qui concerne jQuery, vous noterez que c’est le seul paramètre que l’on indique, et il y a une bonne raison à cela : en fait WordPress a déjà déclaré le script avec tous ses paramètres, du coup on a juste besoin de le lister pour l’insérer dans notre code.

## L’adresse du fichier

C’est l’emplacement absolu où se trouve le fichier. Pour cela on va utiliser get_template_directory_uri() pour donner le chemin vers le thème, suivi du nom de fichier et éventuellement des sous-répertoires intermédiaires. En général, on place les CSS dans un dossier /css et les scripts dans un dossier /js.

> Dans le cas des thèmes enfants, il faut utiliser la fonction get_stylesheet_directory_uri() à la place. Si c’est votre cas, rendez-vous à la fin de ce cours.

Si vous voulez charger directement le fichier style.css à la racine du thème, utilisez alors la fonction get_stylesheet_uri() seule.

Pour rappel ce fichier style.css est toujours obligatoire car c’est lui qui contient la définition du thème, même si vous ne l’utilisez pas pour écrire vos styles.

> En général, on utilise un fichier autre que style.css, surtout si on utilise des préprocesseurs car les commentaires qui servent à la définition du thème seraient écrasés à la compilation.

## Les éventuelles dépendances

C’est ici que prend tout l’intérêt de ce système : pouvoir déclarer des dépendances, autrement dit indiquer à WordPress que mon script/style devrait absolument être chargé après les scripts/styles indiqués en dépendances.

Pour cela on indique un tableau via array(), et on liste le handle des scripts/styles qui devront être chargés avant.

Voici le rendu en HTML lorsque je demande jQuery en dépendance de mon script :

```html
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?ver=3.3.1'></script>
<script type='text/javascript' src='http://wp.local/wp-content/themes/capitaine/js/script.js?ver=1.0'></script
```

## Le numéro de version

Ce numéro de version est important car il va permettre d’invalider le cache du navigateur lorsque vous changerez la valeur. Il permet d’ajouter un paramètre à la fin de l’URL du fichier : script.js?ver=1.0.

Lorsque vous ferez évoluer votre thème et votre script, incrémentez le numéro de version vers 1.1 par exemple. La fin de l’URL sera alors script.js?ver=1.1. Pour votre navigateur, c’est une nouvelle URL (même si c’est le même fichier) et du coup ça invalidera son cache.

Cela vise à répondre à une problématique de longue date : le navigateur de l’internaute met en cache certains fichiers afin d’éviter de les charger à chaque fois depuis votre site. Mais lorsque ceux-ci changent sur le serveur, ils ne sont pas pris en compte tout de suite. Ce qui peut résulter en des défauts d’affichage de votre site.

Avec le numéro de version : plus de soucis !

Si vous utilisez un script externe (jQuery par exemple), indiquez simplement le numéro de version utilisé. Dans mon exemple, c’est la version 3.3.1.

## Le chargement en haut ou en bas de page (scripts seulement)

Et enfin, le dernier paramètre pour les scripts est un booléen : s’il est passé à true, le script sera chargé en bas de page, via le wp_footer et non pas wp_header, en haut.

> Pour de meilleures performances de chargement de la page, préférez appeler vos scripts en bas de page.

En effet, les scripts ne sont généralement pas exécutés par le navigateur tant que la page n’a pas reçu le signal comme quoi elle est « prête » (en termes techniques, que le DOM est ready).

Donc à quoi bon les charger tout de suite ? Le navigateur, quand il interprète votre page HTML, va charger les styles, scripts, et images dans l’ordre où il les a trouvés.

Pour voir tout ce qui est chargé dans une page, et toutes les requêtes HTTP que fait le navigateur, ainsi que le temps que ça prend, ouvrez la console de votre navigateur (clic droit, inspecter) puis allez dans l’onglet Network. Rechargez votre page :

![](https://capitainewp.io/wp-content/uploads/2019/02/console-network-1000x616.jpg.webp)

L’optimisation des pages web est une thématique importante lorsque l’on développe des sites sur mesure !

> Notez qu’il y a aussi des fonctions wp_register_script() et wp_register_style() qui permettent de déclarer un script sans pour autant l’ajouter dans la page. Mais ce n’est pas utile à notre niveau.

Pour en savoir plus au sujet de ces fonctions, direction la documentation !

## Charger un script uniquement sur certaines pages

Dans certains cas, vous n’aurez besoin d’un certain script uniquement sur des pages spécifiques. Ça pourrait être le cas par exemple pour un script de diaporama, qui ne serait présent que sur la page d’accueil.

Pour cela, on va faire appel aux conditional tags, que l’on a déjà vu plus tôt dans cette formation.

Voici à quoi ressemblerait le code : 

```php
<?php 

function alex_register_assets() {
    
    // Déclarer jQuery
    wp_enqueue_script('jquery' );
    
    // Déclarer le JS
    wp_enqueue_script( 'alex', … );
    
    // Seulement sur la page d'accueil
    if( is_front_page() ) {
    	wp_enqueue_script( 'diaporama', … );
    }
}
add_action( 'wp_enqueue_scripts', 'alex_register_assets' );
```

C’est une très bonne pratique pour améliorer les performances de votre site, en ne chargeant que ce qui est nécessaire pour la page affichée.

## Le cas des thèmes enfants

Si vous utilisez un thème enfant, vous vous retrouverez avec une erreur en utilisant get_template_directory_uri(). C’est normal car cette fonction va aller chercher le fichier dans le thème parent.

C’est ce qu’il se passe lorsque vous générez un thème enfant. Il faut aller récupérer la feuille de style du thème parent car elle n’est pas chargée toute seule (ligne 6) :

```php
<?php

function alex_child_register_assets() {
  
    // Chargement de la feuille du style du theme parent
 	wp_enqueue_style( 'alex-theme', get_template_directory_uri() . '/style.css' );

    // Chargement de la feuille de style complémentaire du thème enfant
 	wp_enqueue_style( 'alex-child-theme', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'alex_child_register_assets' );
```

Par contre, pour appeler des scripts ou styles sur mesure stockés dans votre thème enfant, il faudra utiliser plutôt cette fonction : get_stylesheet_directory_uri() (ligne 9).

En résumé :

- Utilisez get_template_directory_uri() pour des fichiers dans le thème parent.
- Utilisez get_stylesheet_directory_uri() pour ceux du thème enfant.

Et voilà, vous savez désormais comment bien charger vos scripts et styles dans WordPress, et surtout pourquoi c’est une bonne pratique. Dans le prochain cours on va aborder les tailles d’images et l’image mise en avant.