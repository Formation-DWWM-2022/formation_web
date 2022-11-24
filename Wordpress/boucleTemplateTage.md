# La boucle WordPress et les templates tags

C’est grâce au mécanisme appelé Boucle WordPress (en anglais The Loop) que l’on peut afficher dans nos templates les données administrées dans le CMS. Voyons comment les utiliser.

## Qu’est-ce que la boucle WordPress ?

Lorsque l’on développe un thème WordPress, impossible de passer à côté de la boucle WordPress. Voyons à quoi ce concept correspond :

> La boucle WordPress est le mécanisme matérialisé par un petit bout de code PHP qui permet d’afficher les données entrées via l’interface d’administration. Elle permet de préparer les données (titre, contenu, catégories, lien, image à la Une…) et de les appeler via des fonctions dédiées au nom explicite, comme the_content().

Cette boucle a la particularité d’être exactement la même sur tous les templates de page que l’on va créer. Il suffira alors de la copier/coller dans tous nos modèles.

Maintenant que l’on a vu le template hierarchy, on va commencer par aller modifier le fichier front-page.php qui s’affichera lorsqu’on demande la page d’accueil :

```php
<?php get_header(); ?>
 <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
     <h1><?php the_title(); ?></h1>
     <?php the_content(); ?>
 <?php endwhile; endif; ?>
<?php get_footer(); ?>
```

Copiez exactement le même code pour page.php. À l’avenir notre page d’accueil sera différente des pages « standard » mais pour le moment ça nous suffira.

Lorsque l’on affiche le site dans le navigateur, on a bien le contenu de notre page d’accueil qui s’affiche :

![](https://capitainewp.io/wp-content/uploads/2019/01/accueil-site-1600x1005.jpg.webp)

Cool ! Il faudra ajouter un peu de CSS pour que ça rende plus « joli », mais ce n’est pas l’objet de ma formation.

Bon, là, vous êtes en train de vous dire que pour faire des grosses mises en page, WordPress sera vite limité. En effet. Pour aller plus loin il faudra utiliser un Page builder comme Elementor ou ajouter des champs personnalisés avec ACF. Et c’est ce que l’on verra plus tard, alors patience !

Pour le moment, revenons-en à ma boucle. On va l’étudier un peu plus en détails :

```php
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
 …
<?php endwhile; endif; ?>
```

La première fonction, have_posts() contrôle qu’il y a bien quelque chose à afficher, quel que soit le cas de figure (afficher le contenu d’une page, un article, une liste d’articles…).

Vient ensuite une boucle PHP while. Vous allez me dire : à quoi bon ? Puisqu’il n’y a qu’un seul contenu à afficher : la page ? Eh bien comme je disais plus haut, ce code a été conçu pour être valide dans toutes les situations. Il marchera donc que ce soit pour afficher un seul contenu (un article ou une page) ou le blog (liste des articles).

La fonction qui suit, the_post() permet de préparer les données de l’article afin de les afficher à l’intérieur de la boucle, via les template tags.

# Que sont les templates tags ?

> Les Templates Tags sont des fonctions incluses dans WordPress permettant d’afficher dans votre thème les contenus que vous avez administré dans l’interface d’édition. Ces fonctions sont à destination des développeurs de thèmes afin de rendre leurs pages dynamiques. Il en existe des dizaines, certaines permettant d’afficher le contenu de l’article comme the_title() et the_content(), d’autres sont là pour afficher les commentaires, l’auteur… ou même encore certaines qui permettent de récupérer des informations générales du site comme bloginfo().

Ils en existe de plusieurs sortes mais on va se concentrer pour le moment sur ceux permettant d’afficher les données de notre article. Dans le code vu plus haut, on en a utilisé deux :

```php
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
<?php endwhile; endif; ?>
```

La fonction the_title() permet d’afficher le titre et the_content() va afficher le contenu de la page, c’est-à-dire ce que l’on a écrit avec l’éditeur visuel.

Ce sont les deux template tags les plus utilisés ! Il en existe d’autres que l’on va voir avec les pages du blog, mais pour les pages, on n’a pas besoin de grand chose de plus.

> Les template tags doivent impérativement être utilisés à l’intérieur de la boucle WordPress afin de fonctionner de manière optimale.

## La boucle dans le cas du blog

On va maintenant aller voir ce que donne la boucle dans le cas du blog ! Et ici, on va pouvoir utiliser d’autres templates tags. Pour cela on va ajouter quelques lignes de PHP dans nos templates :

## La liste des derniers articles (archive et home)

On commence avec la page d’archives, qui liste par défaut les 10 derniers articles publiés sur le blog :

```php
<?php get_header(); ?>
  <h1>Le blog</h1>

 <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
  
  <article class="post">
   <h2><?php the_title(); ?></h2>
      
         <?php the_post_thumbnail(); ?>
            
            <p class="post__meta">
                Publié le <?php the_time( get_option( 'date_format' ) ); ?> 
                par <?php the_author(); ?> • <?php comments_number(); ?>
            </p>
            
        <?php the_excerpt(); ?>
              
        <p>
            <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
        </p>
  </article>

 <?php endwhile; endif; ?>
<?php get_footer(); ?>
```

D’après le template hierarchy, la page d’accueil du blog a un modèle différent, via home.php, au cas où vous voudriez que la page principale du blog soit différente des autres archives (affichage par auteur ou catégorie par exemple). En fait c’est rarement le cas. Du coup pour le moment on va copier le même code dans archive.php, ainsi que dans home.php. Un peu plus tard, on viendra corriger cette répétition de code.

Comme on n’a pas (encore) de menu sur notre site pour accéder au blog, on va passer par l’admin WordPress : Pages > Toutes les pages, puis survoler notre page Blog et cliquer sur Afficher. Si votre page s’appelle blog, ajoutez simplement /blog/ à la fin de l’adresse de votre site. On tombe sur la liste des articles :

![](https://capitainewp.io/wp-content/uploads/2019/01/blog-archive-1600x1405.jpg.webp)

Notez que cette fois, on met des `<h2>` pour les titres d’article, et le titre principal de la page est « Le blog Capitaine WP ». Comme vous le savez sûrement, il devrait toujours n’y avoir qu’un seul `<h1>` par page.

Voyons maintenant les nouveaux templates tags ajoutés :

    L’image mise en avant

La fonction the_post_thumbnail() permet d’afficher l’image mise en avant (anciennement image à la Une).

Pour rappel on avait activé cette fonctionnalité grâce à la fonction add_theme_support('post-thumbnails') dans le fichier functions.php

L’image mise en avant se configure dans la barre d’outils latérale :

![](https://capitainewp.io/wp-content/uploads/2019/01/image-une-metabox-1600x613.jpg.webp)

Cette fonction ne renvoie pas que l’URL de l’image, mais carrément toute la balise `<img>`: Cela permet de ne pas afficher une balise vide si aucune image n’a été définie.

    La date

Pour afficher la date, on dispose de 2 fonctions : the_date(), et the_time(). Dans cette dernière on doit indiquer le format d’affichage via les paramètres de Date PHP classiques. D’ailleurs je récupère, grâce à la fonction get_option(), la valeur indiquée dans Réglages > général > Format de date.

Mais pas besoin de tout cela sur la première fonction. Alors pourquoi diantre ne pas utiliser the_date() tout simplement ?

```php
<?php 
 // Affichée une fois par date différente
 the_date();

 // Affichée pour chaque article avec le format défini 
 // dans WordPress
 the_time( get_option( 'date_format' ) );
 
 // Affichée pour chaque article, avec un format de date 
 // et heure personnalisé (ici : 02 Avril 2019 à 17:23)
 the_time( 'j F Y à H:i' );
?>
```

En fait cette fonction n’affiche qu’une seule fois la même date : si plusieurs articles sont publiés le même jour, seul le premier affichera la date. En réalité on s’en sert pour un classement chronologique ou on affiche d’abord une date, puis la liste des articles publiés ce jour-ci.

C’est pour cela que dans notre cas précis, the_time() sera plus indiqué.

    L’auteur

La fonction the_author() permet d’afficher le nom de l’auteur, tel qu’il l’a défini dans Utilisateurs > Votre profil > Nom à afficher publiquement. Par mesure de sécurité, évitez d’afficher votre identifiant de connexion.

    Le nombre de commentaires

Et pour finir il existe également des template tags dédiés aux commentaires comme comments_number() qui affiche le nombre de commentaires publiés dans cet article.

Par défaut il va afficher : Pas de commentaire, 1 commentaire ou X commentaires. Mais vous allez pouvoir personnaliser cet affichage. Si on s’en réfère à la documentation, on voit qu’on peut ajouter 3 paramètres : un pour chaque cas.

```php
<?php comments_number( 'no responses', 'one response', '% responses' ); ?>
<?php comments_number( '0', '1', '%' ); ?>
```

Dans le cas du site, j’ai opté pour n’afficher que le nombre de commentaires, suivi d’une icône « bulle ». Le signe % est un caractère magique qui sera remplacé par le nombre réel de commentaires, lorsqu’il y en a au moins deux (pluriel).

    L’extrait

Cette fois on utilise la fonction the_excerpt() à la place de the_content() afin de n’afficher qu’un extrait de l’article, et pas l’article en entier. Le but reste que la personne clique sur l’article de son choix pour l’afficher.

L’extrait fonctionne en trois temps. Il va d’abord regarder si l’auteur a renseigné le champ extrait dans la barre latérale à droite :

![](https://capitainewp.io/wp-content/uploads/2019/01/champ-extrait-1600x515.jpg.webp)

Si le champ est vide, il va cette fois regarder dans l’article si le bloc Lire la suite est présent :

![](vhttps://capitainewp.io/wp-content/uploads/2019/01/bloc-lire-la-suite-1600x920.jpg.webp)

Et sinon il va couper automatiquement l’article après 55 mots (on pourra d’ailleurs modifier cette valeur plus tard).

Je déconseille la dernière option : en général le découpage se fait en plein milieu d’une phrase et ce n’est pas élégant.

Utilisez :

- Le bloc Lire la suite pour faire apparaitre le début (controlé) de l’article ;
- Le champ Extrait si vous voulez une description de l’article différente du contenu.

## Aparté: The Excerpt VS The Content

En réalité c’est légèrement plus compliqué que ça ! Vous pourriez aussi conserver the_content() : dans le cas d’une page archive il s’arrête aussi dès qu’il voit le bloc « Lire la suite ». De plus il ajoutera un lien (lire la suite) mais qui est plus difficile à personnaliser en CSS.

Par contre il ignore complètement le champ « Extrait » et affiche l’article en entier si le bloc « Lire la suite » n’est pas présent.

En définitive je préconise l’utilisation de the_excerpt() en priorité sur les pages archive.

Ah, et une dernière chose importante :

> Ne mettez pas de balise `<p>` autour du contenu ou de l’extrait car ils en auront sûrement déjà et il est impossible d’imbriquer plusieurs paragraphes ensemble en HTML. Vous pouvez par contre les entourer d’une `<div>`.

    Le Permalien

La fonction the_permalink() permet d’afficher le lien vers l’article. il faut placer cette fonction dans l’attribut href de la balise `<a>`. On appelle ces liens des permaliens et ils sont générés automatiquement par WordPress.

Vous pouvez configurer la structure des permaliens dans Réglages > Permaliens.

Dans cet exemple je n’ai mis le lien que sur le texte « Lire la suite », mais j’aurais pu également l’appliquer sur le titre ainsi que sur l’image mise en avant, de la même manière.

> Pour de belles URLs et un meilleur référencement optez pour la configuration « Titre de publication » /%postname%/ qui est normalement le réglage par défaut.

## Afficher un article (single)

Passons maintenant aux articles. En cliquant sur un lien dans la page du blog, c’est la page single.php qui est appelée. Voici le code PHP que j’ai choisi d’y mettre :

```php
<?php get_header(); ?>
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <article class="post">
      <?php the_post_thumbnail(); ?>

      <h1><?php the_title(); ?></h1>

      <div class="post__meta">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
        <p>
          Publié le <?php the_date(); ?>
          par <?php the_author(); ?>
          Dans la catégorie <?php the_category(); ?>
          Avec les étiquettes <?php the_tags(); ?>
        </p>
      </div>

      <div class="post__content">
        <?php the_content(); ?>
      </div>
    </article>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>
```

Copiez-le dans single.php et affichez un article sur votre blog :

![](https://capitainewp.io/wp-content/uploads/2017/05/single-article-1600x1433.jpg.webp)

On va passer en revue les nouveaux template tags utilisés dans cette page :

    L’avatar de l’auteur

La fonction get_avatar() permet de récupérer l’avatar de l’auteur, en se servant du service Gravatar. Si vous n’en n’avez pas déjà fait un, allez le créer gratuitement sur ce site.

> Gravatar appartient à Automattic, la maison mère de WordPress. Ce service d’avatars décentralisé est utilisé par de nombreux services web comme Github ou Stack Overflow par exemple.

Vous allez me demander pourquoi je n’ai pas utilisé the_avatar() : tout simplement parce que cette fonction n’existe pas ! Pourquoi ? Eh bien, euh, bonne question !

Le premier paramètre attendu est l’identifiant de l’utilisateur dont on doit afficher l’avatar. Dans notre cas, c’est l’auteur. On récupère son identifiant par un autre template tag get_the_author_meta('ID').

```php
<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
```

Le second paramètre est la taille de l’image. En effet Gravatar peut la générer à la volée pour vous. J’ai défini 40 pour une image carrée de 40px de côté.

## Les catégories et les étiquettes

Et enfin on utilise the_category() et the_tags() pour afficher la catégorie et les éventuelles étiquettes (anciennement mots-clés).

Cela aura pour effet d’afficher des listes `<ul><li>`. En cliquant sur une catégorie, vous afficherez une archive des derniers articles de cette catégorie seulement.

Notez que je n’ai pas affiché les catégories ni les étiquettes dans la page archive, mais j’aurais pu tout à fait le faire : le choix des informations que vous allez afficher ou non est complètement arbitraire en fonction des besoins de votre site. Les template tags fonctionnent dans n’importe quelle boucle.

## Liste des Template Tags les plus utilisés

Pour résumer, voici la liste des templates tags que l’on va utiliser le plus régulièrement :

    - the_title() : affiche le titre de l’article ou la page ;
    - the_content() : affiche le contenu, écrit depuis l’éditeur visuel (Gutenberg ou TinyMCE) ;
    - the_post_thumbnail() : affiche l’éventuelle image mise en avant ;
    - the_excerpt() : affiche un extrait de l’article, soit le contenu du champ extrait, soit le début de l’article jusqu’à la balise Lire la suite ;
    - the_category() : affiche une liste de la ou des catégories sélectionnées ;
    - the_tags() : affiche une liste des éventuelles étiquettes de l’article ;
    the_author() : affiche le nom de l’auteur ;
    the_author_link() : affiche le nom de l’auteur avec un lien vers son site personnel ;
    - the_date() : affiche une fois les dates où des articles ont été publiés ;
    - the_time() : affiche la date de publication de chaque article ;
    - the_permalink() : affiche l’URL vers l’article, à mettre dans une balise <a> ;
    - comment_number() : affiche le nombre de commentaires publiés dans l’article ;
    get_avatar() : Récupère l’avatar d’un utilisateur depuis le service Gravatar ;

Utilisez-les comme bon vous semble dans vos templates !

Pour connaitre la liste complète de tous les templates tags, référez-vous à la documentation officielle : liste des template tags.

En règle générale, allez toujours faire un tour dans la documentation développeurs afin de tout savoir de la fonction que vous souhaitez utiliser et ses éventuels paramètres (comme on a pu le voir avec le nombre de commentaires) et en découvrir de nouvelles.

Un bon développeur lit la documentation ! Comme on dit dans le métier : RTFM ! <https://developer.wordpress.org/reference/>

## Les équivalents en « get »

Parfois, vous aurez besoin de récupérer la valeur sans directement l’afficher dans votre template, afin de la traiter en PHP. Si vous souhaitez récupérer la valeur du titre sans l’afficher par exemple, the_title() ne fonctionnera pas, il faudra alors utiliser son équivalent get_the_title() :

```php
<?php 
 $title = get_the_title();
 
 // Si le titre contient le mot "promo", j'ajoute un emoji
 if( strpos( $title, 'promo' ) !== false ) {
  $title = '💰' . $title; 
 }
?>
<h1><?php echo $title; ?></h1>
```
 
Retenez donc que :

    Les fonctions en the_ affichent directement la donnée dans le template ;
    Les fonctions en get_ la récupèrent sans l’afficher, en vue d’un traitement.

Comme vous pouvez vous en douter, il existe un équivalent « get » à chacun des template tags.

Grâce à la boucle WordPress, aux template tags et au template hierarchy, on a ajouté pas mal de dynamisme à notre thème ! Dans les cours suivants, on va voir quelques autres concepts utiles pour gérer nos templates.