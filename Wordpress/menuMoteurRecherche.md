# Les menus et le moteur de recherche

WordPress nous permet d’administrer des menus, et d’afficher un moteur de recherche sur le site. On va voir les notions de menus et emplacements de menus, et voir pourquoi cette distinction est fondamentale.

Jusqu’à maintenant on s’est débrouillés sans menu, mais on voit bien que ça nous manquait : en effet le menu est l’un des éléments les plus importants d’un site. C’est lui qui va porter votre internaute vers les réponses qu’il recherche. C’est pour cela qu’il ne faut jamais négliger la réflexion de l’arborescence d’un site.

Dans ce cours, on va voir comment créer nos menus administrables dans notre thème.

## Les menus dans WordPress

Il y a deux façons de gérer les menus dans WordPress, soit en passant par Apparence > Menus, soit via le customizer dans Apparence > Personnaliser > Menus.

Mais pour le moment, comme on n’a pas déclaré de menus dans notre thème, vous ne trouverez pas ces entrées dans l’administration WordPress.

![](https://capitainewp.io/wp-content/uploads/2019/02/creer-menu-wordpress-1600x1080.jpg.webp)

Dans les deux cas, c’est exactement la même chose. À vous de choisir la technique que vous préférez.

Le Customizer est surtout utile pour les personnes qui utilisent un thème premium, qui propose alors plein d’options de personnalisation à ses utilisateurs.

Vous, quand vous créez votre thème, c’est soit pour vous, soit pour le client, du coup le but c’est d’avoir un thème qui répond a un besoin précis.

![](https://capitainewp.io/wp-content/uploads/2019/02/customizer-wp-menus-1600x957.jpg.webp)

Depuis chacune de ces deux interfaces, on voit que l’on peut créer plusieurs menus. Mais pour le voir apparaitre il faut l’assigner à un emplacement de menu.

## Menus et emplacement de menus, quelle différence ?

On peut utiliser un menu de plusieurs manières dans WordPress : l’assigner quelque part dans le thème, ou le mettre dans un Widget.

Ce qui va nous intéresser ici c’est d’assigner le menu dans notre thème. Mais pour cela on va devoir déclarer un ou plusieurs emplacements de menus.

L’emplacement de menu est une zone dans laquelle l’utilisateur va pouvoir créer et assigner un menu qu’il aura créé.

    Alors pourquoi distinguer un menu et un emplacement de menus ?

Imaginez que vous utilisez un thème comme twentynineteen. Vous créez un menu et vous l’assignez à l’emplacement « Menu Principal ». Mais demain, vous décidez de changer de thème. Cette fois les emplacements ne seront pas forcément les mêmes, il n’y aura plus d’emplacement « Menu Principal », mais à la place « Menu primaire ». C’est la même chose, seul le nom change.

Du coup, votre menu saute : mais heureusement, il ne disparaitra pas pour autant. Il existe toujours sous forme de menu dans WordPress, la seule chose à faire est de l’assigner dans le nouvel emplacement.

![](https://capitainewp.io/wp-content/uploads/2019/02/definir-emplacement-menu-1600x516.jpg.webp)

Les emplacements sont également utiles dans le cas d’un site multilingue : un même emplacement pourra accueillir plusieurs menus, un pour chaque langue !

C’est pour ces raisons qu’il est utile de distinguer un emplacement de menu, et le menu lui même.

## Déclarer un emplacement de menu

On va maintenant aller déclarer 2 emplacements dans notre thème, un que l’on mettra dans l’entête, ce sera le menu principal, et un autre en pied de page (pour les mentions légales, la politique de confidentialité, le lien vers contact… ).

Pour cela, rendez-vous dans functions.php et ajoutez :

```php
<?php 

register_nav_menus( array(
 'main' => 'Menu Principal',
 'footer' => 'Bas de page',
) );
```

Le premier paramètre est le slug du menu, le second le nom qui apparaitra dans l’administration de WordPress.

On vient de déclarer nos emplacements de menu, ce qui aura pour effet d’afficher le menu Apparence > Menu dans notre administration WordPress. On va alors pouvoir créer un nouveau menu, et l’assigner à notre emplacement.

Mais une minute ! On n’a toujours pas dit où se trouvaient ces menus dans notre template. On va donc ouvrir header.php et ajouter la fonction wp_nav_menu() :

```php
<body <?php body_class( 'site' ); ?>>

  <header class="site__header">
    <a href="<?php echo home_url( '/' ); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo">
    </a>

    <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
  </header>
  ```

Le paramètre theme_location me permet de définir le slug de l’emplacement, parmi ceux définis juste au-dessus dans le functions.php.

Et faire de même dans footer.php mais cette fois avec le slug footer :

```php
<footer class="site__footer">
  <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
 </footer>
  
 <?php wp_footer(); ?>
</body>
</html>
```

wp_nav_menu() va nous permettre d’afficher le contenu d’un emplacement de menu, donc un menu si celui-ci est bien assigné.

Il existe d’autres paramètres qui vont par exemple nous permettre de contrôler le HTML et le CSS généré par ce menu. Dans mes thèmes j’applique ces deux paramètres :

```php
<?php 
 wp_nav_menu( 
        array( 
            'theme_location' => 'main', 
            'container' => 'ul', // afin d'éviter d'avoir une div autour 
            'menu_class' => 'site__header__menu', // ma classe personnalisée 
        ) 
    ); 
?>
```

Ici j’indique que je ne veux pas de conteneur supplémentaire autour de mon menu : WordPress a la fâcheuse tendance d’ajouter une `<div>` par forcément très utile autour du `<ul>`.

Et je personnalise aussi la classe CSS afin qu’elle soit en accord avec les autres classes de mon document.

Comparez le HTML généré avec et sans ces paramètres, afin de voir la différence :

```html
<!– Sans les paramètres –>
<div class="menu">
    <ul>
  <li class="page_item page-item-10"><a href="http://wp.local/blog/">Blog</a></li>
  <li class="page_item page-item-12"><a href="http://wp.local/contact/">Contact</a></li>
    </ul>
</div>

<!– Avec les paramètres –>
<ul class="header__menu">
 <li class="page_item page-item-10"><a href="http://wp.local/blog/">Blog</a></li>
 <li class="page_item page-item-12"><a href="http://wp.local/contact/">Contact</a></li>
</ul>
```

Il existe d’autres paramètres que vous pourrez retrouver dans la documentation des menus WordPress.

> Si vous n’assignez pas de menu à un emplacement, WordPress listera automatiquement les Pages que vous avez créées.

## Créer un menu et l’assigner à un emplacement

On peut maintenant aller créer notre menu, y ajouter des pages, le blog, éventuellement des catégories…

![](https://capitainewp.io/wp-content/uploads/2019/02/creer-menu-wordpress-1600x1080.jpg.webp)

Et enfin l’assigner à notre emplacement « Menu Principal ».

Je crée des pages « Mentions légales » et je publie « Politique de confidentialité », puis je les ajoute dans un nouveau menu que j’assigne cette fois en pied de page.

Voici le résultat :

![](https://capitainewp.io/wp-content/uploads/2019/02/site-menus-1600x955.jpg.webp)

Vous êtes maintenant parés pour créer autant d’emplacements de menus que vous le désirez dans votre thème !

## Ajouter un moteur de recherche

WordPress nous propose également son moteur de recherche, afin de trouver facilement un contenu dans une page ou les articles du blog. Et pour l’utiliser, c’est extrêmement simple. Ajoutez simplement cette fonction dans votre header.php par exemple :

```php
<?php get_search_form(); ?>
```

Notez qu’il n’y a pas besoin de mettre de echo avant car le formulaire s’affiche par défaut dans votre template. Voici le résultat :

![](https://capitainewp.io/wp-content/uploads/2019/02/moteur-recherche-wordpress-1600x948.jpg.webp)

Il est également possible de personnaliser le HTML du moteur de recherche si celui par défaut ne vous convient pas. Pour cela créez un fichier searchform.php à la racine de votre thème et ajoutez ce code de base que vous pourrez personnaliser selon votre envie :

```php
<form action="<?php echo home_url( '/' ); ?>" method="get">
    <label for="search">Rechercher :</label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
</form>
```

C’est intéressant de le faire pour notamment retirer le label « Rechercher » qui prend de la place et le mettre en placeholder du champ de recherche.

Lorsque vous faites une recherche, c’est le template search.php qui est appelé par le Template Hierarchy de WordPress.

Vous pourrez également ajouter le moteur de recherche sous forme de Widget, et c’est justement ce que l’on va aborder dans le prochain cours.

Votre thème possède maintenant des zones dynamiques permettant d’afficher des menus administrables ! Dans le prochain cours, on va voir ce que sont les Widgets, et leur utilité dans le blog.
