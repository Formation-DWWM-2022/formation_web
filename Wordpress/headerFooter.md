# L’en-tête et le pied de page

L’en-tête et le pied de page d’un site sont les éléments qui ne changent en général jamais d’une page à une autre. Afin d’éviter toute répétition de code, on va les envoyer dans leur propre fichier.

Dans le cours précédent, on a tout mis dans index.php, mais comme on s’apprête à le voir, il va y avoir au final plusieurs fichiers en fonction des cas de figures.

Par exemple, à terme, on appellera single.php pour afficher un article, et page.php pour afficher le contenu d’une page.

Pourtant sur le site, l’en-tête et le pied de page ne devraient pas changer d’une page à l’autre.

En programmation, l’un des concepts les plus importants est DRY : Don’t Repeat Yourself.

## Séparer l’en-tête et le pied de page du reste

On va donc isoler le haut et le bas du site dans des fichiers à part afin d’éviter toute répétition de code dans la suite de la formation.

Je vous invite alors à créer 2 nouveaux fichiers à la racine de votre thème :

- header.php : où l’on mettra la base du HTML et le haut du site ;
- footer.php : où l’on mettra le bas du site et les balises fermantes de notre page.

Dans header on vient placer ce code :

```php
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    
    <?php wp_body_open(); ?>
```

Puis dans footer :

```php
 <?php wp_footer(); ?>
</body>
</html>
```

C’est le strict minimum nécessaire pour le moment et on pourra agrémenter à terme en fonction des besoins.

Du coup, on va pouvoir modifier index.php et appeler nos nouveaux fichiers grâce à 2 fonctions fournies nativement par WordPress :

```php
<?php get_header(); ?>

<h1>Coucou</h1>

<?php get_footer(); ?>
```

Testez, vérifiez le code source de la page afin de vérifier si votre en-tête et pied de page sont bien correctement appelés :

![](https://capitainewp.io/wp-content/uploads/2019/01/header-footer-fonctionnel-1000x950.jpg)

Si la manipulation a bien fonctionné, vous devriez voir apparaitre la barre d’administration WordPress (en noir en haut du site) et le titre dans l’onglet du navigateur. Concernant le code de la page via l’inspecteur, on remarque qu’il y a bien plus de HTML que ce qu’on en a écrit ! C’est dû aux fonctions que l’on vient d’ajouter et que l’on va analyser juste après.

> À l’avenir, vous n’êtes pas obligé de vous arrêter après le `<body>` : le but c’est aussi d’y mettre le HTML du haut du site (logo, menu…) .

De manière générale, on utilisera les fonctions get_header() et get_footer() sur tous les templates de page que l’on créera par la suite avec WordPress.

## Découverte de nouvelles fonctions WordPress

Je reviens sur le code que l’on a écrit plus haut. Comme vous avez pu le remarquer on a ajouté quelques fonctions de WordPress dans notre HTML.

## Dans le header

Tout d’abord, on remarque la fonction language_attributes() qui permet de définir automatiquement la langue du document. Cette valeur est basée sur le réglage WordPress dans Réglages > Général > Langue du site.

Vient ensuite la fonction bloginfo('charset') qui permet de définir l’encodage du site. Par défaut c’est UTF-8 et c’est très bien comme ça : votre site prendra en charge les caractères spéciaux, accents, caractères non-latins…

Cette fonction nous permettra de récupérer d’autres informations utiles pour notre site.

> La fonction bloginfo est une très vieille fonction de WordPress, à l’époque où ce dernier était encore considéré comme une plateforme de blogging.

Je continue pour tomber sur une fonction wp_head() qui a une importance capitale : c’est par cette fonction que WordPress, votre thème et les extensions vont pouvoir venir déclarer le chargement des scripts et des styles. On verra un peu plus tard comment en tirer parti.

> Cette fonction est essentielle au bon fonctionnement de votre thème alors ne l’oubliez pas !

D’ailleurs c’est via cette fonction que WordPress va venir écrire la balise `<title>` que l’on a activé dans le functions.php dans le cours précédent.

Ensuite, la fonction body_class() nous permet d’obtenir des noms de classe CSS en fonction de la page visitée, ce qui pourra nous faciliter la création de nos styles.

Lorsque l’on observe le code HTML généré on obtient alors :

```html
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <!– plein de choses entre –>
</head>

<body class="home blog logged-in admin-bar no-customize-support">
```

La langue est définie sur fr-FR, l’encodage sur UTF-8, et dans les body classes on peut voir :

- home car on est sur la page d’accueil ;
- blog car par défaut la page d’accueil de WordPress affiche les derniers articles (on pourra changer ce réglage) ;
- logged-in car on est un utilisateur connecté ;
- admin-bar car la barre d’administration est affichée en haut du site.

Cette dernière classe nous sera très utile si on veut faire un menu fixe en position absolue ou fixe : la barre d’admin va décaler le site de 32px vers le bas (sa propre hauteur). On pourra donc appliquer un style de ce genre pour compenser :

```css
.menu {
    position: fixed;
    top: 0px;
}

.admin-bar .menu {
 top: 32px; /* on prend en compte le décalage */
}
```

La classe home vous permettra d’appliquer des styles différents des autres pages par exemple. On reverra ça plus tard, mais au moins vous avez compris leur utilité. D’ailleurs rien ne vous oblige à utiliser la fonction body_class(). Mais si vous le faites, pensez à ne pas réutiliser ces noms de classe proposés par WordPress afin d’éviter des conflits de styles.

Enfin, la fonction wp_body_open() a été ajoutée dans WordPress 5.2 afin de permettre à des extensions d’écrire du code au début du body. C’est utile notamment pour Yoast qui vient y placer le Google Tag Manager et autres codes de scripts.

## Dans le footer

Pour finir, on retrouve simplement dans le pied de page une fonction wp_footer()

Il a exactement le même rôle que wp_head() : afficher des scripts (et styles) mais cette fois en bas de page.

> En terme de performances, il est plus intéressant de charger en priorité les fichiers CSS (donc en haut de page) et reléguer les scripts en bas de page. Le JS n’est en réalité exécuté seulement lorsque la page est « prête » pour le navigateur, donc inutile de les charger trop tôt.

Pour conclure, ne confondez pas get_header() qui permet d’appeler le fichier d’en-tête et wp_head() qui permet de récupérer les scripts et styles.

## Ajouter un logo en haut du site

On va profiter du fichier header.php pour ajouter la partie haute du site, qui ne bougera jamais d’une page à l’autre.

Pour l’instant on va ajouter simplement un logo. Plus tard on mettra également un menu.

Tout d’abord on va créer un dossier /img/ à la racine du thème, et poser notre logo au format SVG à l’intérieur (ou format PNG, comme vous voulez).

> Travaillez toujours dans la mesure du possible avec des SVG pour les logos, icônes et illustrations sur votre site. Le format vectoriel est moins lourd pour ce genre d’images et surtout ne pixelise pas.

Ajoutez ensuite le code suivant dans le body :

```php
<body <?php body_class(); ?>>
  <header class="header">
    <a href="<?php echo home_url( '/' ); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo">
    </a>  
  </header>
```

Vous n’aurez pas le logo centré car on n’a pas encore ajouté de CSS, mais vous devriez pouvoir cliquer dessus, ce qui vous ramène à l’accueil du site grâce à la fonction home_url().

On utilise la fonction get_template_directory_uri() afin d’obtenir l’adresse absolue (c’est-à-dire complète) du logo. Sans ça, votre image ne s’affichera pas.

En regardant le code (clic droit, afficher le code source de la page) on voit bien l’url vers l’accueil ainsi que l’url de mon image : 

```html
<a href="http://wp.local/">
      <img src="http://wp.local/wp-content/themes/capitaine/img/logo.svg" alt="Logo" />
</a>
```

On peut bien sûr étoffer à volonté cet en-tête et c’est d’ailleurs ce que l’on fera à terme.

Maintenant que l’on a bien séparé l’en-tête et le pied de page du reste du site, on va pouvoir continuer. Avant de rendre notre site dynamique, il va nous falloir de la matière. Dans le prochain cours on va générer du faux contenu en un clic.
