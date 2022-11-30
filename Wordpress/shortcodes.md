# Les Shortcodes

Il y a un concept WordPress que l’on a pas encore vu, et qui tend peu à peu à disparaitre pour des approches plus modernes, ce sont les shortcodes, ou codes courts en français. Mais ils peuvent tout de même trouver leur utilité.

Les shortcodes sont pratiques pour le développeur, mais une vraie plaie pour le rédacteur. Ces petits codes interactifs ont souvent été sujet de discorde, et ils tendent désormais à disparaitre au profit des blocs (Gutenberg, Page Builders…). Mais on va voir qu’il est parfois utile de les utiliser encore, à petite dose.

## Que sont les shortcodes ?

Tout d’abord, voici une définition des codes courts :

> Le shortcode (code court en français) est un code entre crochets à intégrer dans le contenu d’un site WordPress. Un code court fait appel à une fonction définie en PHP, appelée par WordPress au moment de la génération de la page. [gallery] générera par exemple une galerie photo. Beaucoup d’extensions les utilisent pour s’interfacer facilement avec le CMS

Par exemple, lorsque vous installez une extension comme Ninja Forms, vous créez votre formulaire, et pour l’intégrer dans une page vous avez deux choix :

Soit utiliser le shortcode, de la forme [ninja_form id=2], qui est l’approche classique :

![](https://capitainewp.io/wp-content/uploads/2020/04/shortcode-ninja-forms-scaled.jpg.webp)

Soit utiliser directement le bloc prévu à cet effet dans votre éditeur (Gutenberg, Elementor…) :

![](https://capitainewp.io/wp-content/uploads/2020/04/bloc-ninja-forms-scaled.jpg.webp)

Dans la plupart des extensions modernes, vous aurez les deux choix, et du coup il sera bien plus simple d’utiliser directement le bloc.

Reste donc à savoir si les codes courts trouvent encore leur utilité aujourd’hui, ou si on doit les jeter aux rebuts. Mais avant tout, un peu d’histoire !

## L’époque des shortcodes

Les shortcodes ont eu leur grande époque dans les années 2010, et ce n’était pas vraiment l’époque la plus sympa pour faire des sites WordPress. L’expérience utilisateur proposée n’était pas très compatible avec le grand public.

À cette époque tout le monde utilisait les codes courts : extensions mais aussi les thèmes premium. C’était l’époque avant la révolution Javascript et l’arrivée des constructeurs de pages.

![](https://capitainewp.io/wp-content/uploads/2020/04/shortcodes-builder-scaled.jpg.webp)

En fait, on utilisait même des shortcodes pour faire la structure d’une page. Au final c’était presque comme faire du HTML. Donc franchement pas pratique.

Alors imaginez donner ce genre d’outil à un client…

Heureusement, les choses ont changé avec l’apparition des constructeurs de pages modernes comme Divi, Elementor ou encore l’éditeur visuel de WordPress Gutenberg à partir de 2015.

Mais si on regarde de plus près, en désactivant Divi par exemple, vous pouvez voir que derrière le constructeur se cache encore une utilisation massive des codes courts !

Ce qui a changé par contre aujourd’hui, c’est que lorsque vous collez un code court dans votre éditeur de contenu, il est directement interprété et converti en son affichage réel.

C’est donc une bonne chose, mais est-ce suffisant ?

## Les shortcodes sont-ils encore utiles ?

Alors sont-ils toujours utiles ? Eh bien de moins en moins. L’objectif secret de WordPress est de s’en passer à terme, mais sans pour autant les rendre inutilisables : on pourra toujours les intégrer dans un contenu car WordPress se veut rétrocompatible avec les anciennes versions.

Mais aujourd’hui on va privilégier la création de blocs sur mesure, selon l’éditeur utilisé : Gutenberg, Elementor, Divi…

Mais pour un créateur d’extension, ça peut demander pas mal de travail supplémentaire, alors parfois, le shortcode reste encore l’approche la plus simple.

Et ça peut être une bonne solution pour ajouter une mise en page particulière dans votre projet sans trop de difficultés, comme on a pu en parler dans le cours précédent avec l’approche hybride.

## Créer son propre shortcode

Pour déclarer un code court dans votre thème, mettez simplement le code qui va suivre dans functions.php. Dans une extension, il peut être placé dans n’importe quel fichier.

## Un shortcode simple

La création d’un shortcode est très simple puisqu’il suffit de le déclarer via la fonction add_shortcode().

```php
<?php
function alex_shortcode_first_name( $atts ) {
    
    if( ! is_user_logged_in() ) {
        return 'invité'; 
    }
    
    $current_user = wp_get_current_user();
    
    return $current_user->user_firstname;
}
add_shortcode( 'prenom', 'alex_shortcode_first_name' );
    
// « Bonjour [prenom] » deviendra « Bonjour Maxime »
```

Dans le premier paramètre, on indique l’identifiant que l’on veut donner à son shortcode, dans mon cas [prenom]. Le deuxième paramètre est le nom de la fonction qui sera exécutée lorsque ce code court sera trouvé dans un contenu.

Dans cet exemple, on va simplement afficher le prénom de l’utilisateur connecté, ou « invité » le cas échéant.

Notez qu’on utilise pas echo, mais à la place on va retourner la valeur à afficher via return. C’est dû au fait que WordPress va injecter la valeur dans le contenu, qui ne sera affiché que plus tard, lors de la génération du template.

## Passer des attributs dans un shortcode

Pour aller un peu plus loin, on peut définir des attributs dans un shortcode. C’est ce qui va nous permettre d’y passer des paramètres.

On va reprendre notre exemple mais cette fois, on permet d’indiquer l’identifiant d’un utilisateur en particulier. Au lieu d’avoir [prenom], on aurait par exemple [prenom id=12].

```php
<?php
function alex_shortcode_first_name( $atts ) {
    
    $atts = shortcode_atts( array(
        'id' => get_current_user_id(),
    ), $atts, 'prenom' );
    
    if( ! $atts['id'] ) {
        return 'invité'; 
    }
    
    $user = get_userdata( $atts['id'] );
    
    return $user->user_firstname;
}
add_shortcode( 'prenom', 'alex_shortcode_first_name' );
```

Tous les paramètres sont automatiquement récupérés par $atts en attribut de votre fonction.

Ensuite, j’utilise la fonction shortcode_atts qui permet de définir les valeurs par défaut si elles ne sont pas fournies.

Du coup si j’utilise encore [prenom], ça fonctionnera toujours, car l’id par défaut sera celui de l’utilisateur actuellement connecté et récupéré via get_current_user_id(). C’est une bonne pratique pour définir à la fois les valeurs par défaut, ainsi que les attributs autorisés.

Vous pouvez ajouter autant d’attributs que vous le souhaitez.

## Shortcodes englobants (wrap)

En plus des attributs, on peut se servir des shortcodes de manière englobante, à la façon d’une balise HTML. C’est cette technique qu’utilisaient les builders de l’ancienne époque.

Par exemple pour faire une colonne : [column]Mon texte[/column]. Le contenu entre les deux codes courts est récupéré cette fois par le deuxième attribut de votre fonction.

```php
<?php
function alex_shortcode_column( $atts, $content ) {
    
    return '<div class="column">' . $content . '</div>' ;
}
add_shortcode( 'column', 'alex_shortcode_column' );
```

Ce n’est pas forcément la méthode qui vous servira le plus souvent, mais au moins vous savez qu’elle existe.

## Exécuter un shortcode hors contenu

Les fonctions d’affichage comme the_content() traitent automatiquement les shortcodes qui se trouvent dans leur contenu.

Mais si vous avez besoin d’afficher un code court à un endroit précis de votre template, vous allez pouvoir utiliser la fonction apply_shortcode().

```php
<div class="games">
    <?php echo apply_shortcode( '[jeux]' ); ?>
</div>
```

Comme le shortcode renvoie une valeur, et ne l’affiche pas, il faut ajouter echo en amont.

> Vous verrez parfois la fonction do_shortcode() qui a exactement le même but, mais préférez l’utilisation de la nouvelle notation : apply_shortcode().

Si les shortcodes vous intéressent, consultez la documentation officielle pour en apprendre davantage : <https://developer.wordpress.org/reference/functions/add_shortcode/>

## Shortcodes, WP Query et Templates Part

Dans un shortcode, vous avez accès à toutes les fonctions de WordPress. Cela veut dire que vous allez pouvoir, entre autres, lancer une WP Query, et même appeler un template !

## La WP Query

Du coup, il est tout à fait possible de lancer une requête filtrée, et récupérer les données de votre choix. On pourrait par exemple récupérer la liste des 3 jeux vidéos les mieux notés.

```php
<?php

function alex_shortcode_best_games( $atts ) {
    
    $args = array(
     'post_type' => 'post',
     'category_name' => 'jeux-video',
        'posts_per_page' => 3,
        'order' => 'DESC', 
     'orderby' => 'meta_value',
     'meta_key' => 'note',
    );

 $my_query = new WP_Query( $args );

    if( $my_query->have_posts() ) : 
    while( $my_query->have_posts() ) : $my_query->the_post();

        the_title();
        the_content();
        the_post_thumbnail();

    endwhile;
    endif;

wp_reset_postdata();
    
    return $html ;
}
add_shortcode( 'jeux', 'alex_shortcode_best_games' );
```

On va cependant avoir un souci : comme je le disais précédemment, il ne faut pas afficher une valeur dans le shortcode, mais la retourner à la fin. Du coup, si on utilise des fonctions telles que the_title() et the_content(), les valeurs vont s’afficher trop tôt, sans attendre le bon moment.

On va donc utiliser des fonctions natives PHP qui permettent de retenir tout ce que devrait être affiché, et le stocker dans une variable à la place. C’est celle-ci qui sera renvoyée par le return. C’est ce que l’on appelle de l’Output Buffering (ob).

```php
<?php
function alex_shortcode_best_games( $atts ) {
    
    $args = array( '…' );
 $my_query = new WP_Query( $args );
 
    ob_start(); // On démarre la rétention
    
    if( $my_query->have_posts() ) : 
    while( $my_query->have_posts() ) : $my_query->the_post();

        the_title();
        the_content();
        the_post_thumbnail();

    endwhile;
    endif;
    
    $html = ob_get_contents(); // On récupère les contenus retenus
 ob_end_clean(); // On vide
    
 wp_reset_postdata();
    
    return $html; // On renvoie le contenu
}
add_shortcode( 'jeux', 'alex_shortcode_best_games' );
```

La fonction ob_start() permet de dire : à partit de ce moment, je récupère tout ce qui est sensé être affiché (par un echo ou une fonction the_), et ce jusqu’à la fonction ob_end_clean().

Juste avant de vider le buffer, on récupère son contenu dans une variable que j’ai appelée $html.

Pour plus d’informations sur l’output buffering, consultez la documentation officielle PHP.

## Shortcodes et Templates Parts

Et pour être encore plus propre, et ne pas mélanger du PHP avec de l’HTML, vous pouvez tirer parti de la fonction get_template_part() qui vous permet d’appeler un autre fichier PHP, consacré au template.

```php
<?php
function alex_shortcode_best_games( $atts ) {
    
    $args = array( '…' );
 $my_query = new WP_Query( $args );
 
    ob_start(); // On démarre la rétention
    
    if( $my_query->have_posts() ) : 
    while( $my_query->have_posts() ) : $my_query->the_post();
  
     // Le HTML va dans un template PHP à part
        get_template_part( 'parts/games' );

    endwhile;
    endif;
    
    $html = ob_get_contents();
 ob_end_clean(); 
    
 wp_reset_postdata();
    
    return $html;
}
add_shortcode( 'jeux', 'alex_shortcode_best_games' );
```

Et là, on est très très propre !

Du coup vous l’aurez compris, vous pouvez faire absolument tout ce que vous voulez dans un shortcode, sans aucune limite !

## Utiliser un shortcode dans un page builder

Quand vous collez un shortcode dans Elementor, il va instantanément se transformer ! Vous verrez donc directement ce qu’il affiche !

![](https://capitainewp.io/wp-content/uploads/2020/04/shortcode-elementor-scaled.jpg.webp)

Pour ce faire, ajoutez simplement un bloc texte ou un bloc code court dans votre éditeur. Collez ensuite le code court, attendez un petit instant, et le tour est joué !

Et c’est exactement la même chose avec Divi :

![](https://capitainewp.io/wp-content/uploads/2020/04/shortcode-divi-scaled.jpg.webp)

Malheureusement, Gutenberg ne propose pas d’aperçu pour le moment. Il faut donc prévisualiser la page pour voir le rendu !

Même si les shortcodes appartiennent à l’ancien WordPress, ils restent tout de même très utiles pour créer rapidement un bloc sur mesure dans un constructeur de page, et peuvent trouver leur utilité ailleurs, tant qu’ils sont utilisés avec parcimonie.
