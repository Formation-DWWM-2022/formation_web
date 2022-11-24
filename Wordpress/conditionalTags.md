# Les conditional tags

Les Conditional Tags sont des fonctions fournies par WordPress et qui permettent d’éviter des répétitions de code dans les templates en testant différentes situations comme « est-on sur la page d’accueil ? » ou encore « l’utilisateur est-il connecté ? ».

## Que sont les Conditional Tags ?

Commençons par une petite définition :

> Les Conditional Tags sont des fonctions PHP fournies par WordPress à utiliser dans le template ou vos fonctions et qui permettent de savoir dans quelle situation se trouve la page actuelle. Par exemple, ils permettent de savoir si l’utilisateur est connecté, si la page actuelle est l’accueil, une archive, un single, une page… Elles renvoient toujours vrai ou faux (true/false). Leur rôle est de permettre, au sein d’un même template, de distinguer des cas de figure différents et agir en conséquence.

Ce sont donc des tests que l’on met dans nos templates pour connaitre l’état de la page. Et il en existe plein ! On va en voir certains dans ce cours, mais pas tous !

## Comment les utiliser ?

Leur utilisation est très simple. Les fonctions sont utilisées en général dans une condition et renvoient toujours une valeur booléenne true/false.

Par exemple, il existe la fonction is_user_logged_in() qui permet de savoir si l’internaute est connecté ou non. C’est d’ailleurs cette fonction que j’utilise pour savoir si vous êtes connecté ou non, et si oui, afficher votre nom en haut à droite du site :

```php
<?php 
if ( is_user_logged_in() ):
 $current_user = wp_get_current_user(); 
    echo "Bonjour, " . $current_user->user_firstname;
else:
    echo "Bonjour, visiteur !";
endif;
```

Ces Conditional Tags commencent en général par is_ou has_ (est quelque chose ou a quelque chose).

## Exemple avec la page archive

Dans les cours précédents, nous avions cout-circuité le Template Hierarchy afin de renvoyer la recherche et la home vers les archives.

Grâce aux Conditional Tags, on va pouvoir savoir dans quel cas on est, afin d’afficher le titre de la page en conséquence :

```php
<?php 
    if ( is_category() ) {
        $title = "Catégorie : " . single_tag_title( '', false );
    }
    elseif ( is_tag() ) {
        $title = "Étiquette : " . single_tag_title( '', false );
    }
    elseif ( is_search() ) {
        $title = "Vous avez recherché : " . get_search_query();
    }
    else {
        $title = 'Le Blog';
    }
?>
<h1><?php echo $title; ?></h1>
```

Plutôt pratique non ? Grâce à ces fonctions on comprend tout de suite nos conditions.

Malgré le fait que l’on ait un seul template archive.php, les Conditional Tags nous permettent de gérer plusieurs cas de figure (archive, home, recherche…).

la fonction single_tag_title() permet d’afficher l’étiquette ou la catégorie actuellement sélectionnée et get_search_query() permet de récupérer l’expression recherchée.

## Quelques conditional tags les plus utiles

Voyons maintenant quelques-uns d’entre eux :

    is_single()

Ce tag permet de savoir si on est sur une page single ou non. Bien sûr il n’y a aucun intérêt à l’utiliser en l’état dans single.php (puisque ce serait toujours vrai).

Mais on peut également tester si on affiche un article en particulier grâce à son ID ou son slug :

```php
<?php 
 if( is_single() ) { } // Teste si la page est de type single
 if( is_single( 12 ) ) { } // Teste si l'article porte l'ID 12
 if( is_single( 'mon-article' ) ) { } // Teste si le slug est 'mon-article'
```

Mais en général, on utilise plutôt la version globale.

    is_page()

Sur le même principe que précédemment, on peut tester si on est dans une page, n’importe laquelle ou spécifique :

```php
<?php 
 if( is_page() ) { } // Teste si la page est de type page
 if( is_page( 16 ) ) { } // Teste si la page porte l'ID 16
 if( is_page( 'contact' ) ) { } // Teste si le slug est 'contact'
```

    is_archive()

Pour ce tag pas de paramètre. Il teste simplement si vous êtes dans une archive ou non.

```php
<?php 
 if( is_archive() ) { }
```

Attention cependant, si vous faites des Custom Post Types, il faudra utiliser is_post_type_archive() mais on va l’aborder plus tard dans la formation.

    is_front_page()

Pour tester si vous êtes sur la page d’accueil du site ou non, utilisez :

```php
<?php
 if ( is_front_page() ) { }
```

Ce Conditional Tag fonctionne autant lorsque le blog est en page d’accueil (réglage par défaut de WordPress) que lorsque c’est une page.

    is_home()

A contrario, ce tag renvoie true seulement si vous êtes sur la page d’accueil des articles du blog.

```php
<?php
 if ( is_home() ) { } // Vrai sur la page des articles du blog seulement
```

Donc attention :

- Si le blog est en page d’accueil du site, is_home() et is_front_page() répondront tous deux true ;
- Si le blog est défini par exemple sur la page « blog », alors is_home() sera true seulement sur cette page.

    is_user_logged_in()

Comme on l’a vu précédemment, ce tag permet de controller si l’utilisateur est connecté ou non. On peut du coup afficher son nom et le lien de déconnexion, ou alors afficher le lien de connexion :

```php
<?php 
if ( is_user_logged_in() ):
 $current_user = wp_get_current_user(); 
?>
 <p>
    <?php echo $current_user->user_firstname; ?>
    <a href="<?php echo wp_logout_url(); ?>"> Déconnexion </a>
 </p>
<?php else: ?>
 <p>
    <a href="<?php echo wp_login_url(); ?>"> Connexion </a>
 </p>
<?php endif; ?>
```

    has_post_thumbnail()

Cette fonction permet de controller si l’article possède ou non une image mise en avant. Par défaut on en n’a pas forcément besoin : la fonction the_post_thumbnail() ne génère la balise de l’image seulement si l’article en a une définie.

Mais ça peut être utile dans le cas où vous voudriez également ajouter un peu de markup HTML autour, comme une `<div>` par exemple :

```php
<?php if ( has_post_thumbnail() ): ?>
 <div class="post__thumbnail">
     <?php the_post_thumbnail(); ?>
 </div>
<?php endif; ?>
```

Comme ça, inutile d’afficher la `<div>` s’il n’y a pas d’image à afficher.

Il en existe beaucoup et on ne les a pas tous vus, mais le principe reste le même pour chacun d’entre eux. Je vous invite à garder de côté la documentation officielle à ce sujet : <https://developer.wordpress.org/themes/references/list-of-conditional-tags/>

## Tester la valeur de vos Conditional Tags

Si vous voulez afficher la valeur d’un tag, dans le but de débugguer votre thème, utilisez la fonction var_dump() de PHP, par exemple juste après le `<body>` :

```php
<body <?php body_class( 'site' ); ?>>
<?php var_dump( is_front_page() ); die; ?>
```

Vous devriez voir apparaitre à l’écran, à la place de votre site : bool(true) ou bool(false).

Bien, vous avez maintenant en main plusieurs outils pour gérer vos templates WordPress. Rappelez-vous que les Conditional Tags peuvent être utiles afin de gérer des cas légèrement différents dans le même fichier et ainsi vous éviter des répétitions de code inutiles.

Dans le prochain cours on va voir encore un concept essentiel du développement de thèmes avec WordPress : les templates personnalisés pour les pages et articles.