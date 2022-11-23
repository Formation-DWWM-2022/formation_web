# Créer la base de son thème WordPress

On va maintenant créer la structure de code minimale qui va nous permettre de déclarer notre thème afin de l’activer dans l’interface d’administration de WordPress.

## Minimum pour déclarer son thème

Allez c’est parti ! C’est le moment de s’équiper de son éditeur de code favori.

En tout premier lieu, on va se rendre dans le dossier wp-content/themes de notre site WordPress et créer un nouveau dossier qui va accueillir les fichiers de notre thème.

Je l’appelle alex puis je l’ouvre avec mon éditeur de code. On va créer quelques fichiers :

- index.php, requis, qui contiendra pour l’instant l’unique page de notre thème ;
- style.css , requis, qui va contenir nos styles mais aussi déclarer notre thème à WordPress ;
- functions.php, dans lequel on va pouvoir activer et ajouter des fonctionnalités ;
- screenshot.png qui permet d’afficher un aperçu du thème dans l’interface d’administration de WordPress et qui doit faire 880×660 pixels.

![](https://capitainewp.io/wp-content/uploads/2017/05/fichiers-theme-1000x669.jpg.webp)

Oui vous avez bien lu : c’est style.css qui permet à WordPress de savoir que c’est un thème, grâce aux quelques commentaires que l’on va insérer dedans.

En fait WordPress considère qu’un thème aura toujours a minima une feuille de style, d’où le fait qu’il ait choisi le fichier CSS pour déclarer les informations du thème.

## Dans le fichier Style.css

Dans la feuille de style j’ajoute :

```css
/*
Theme Name: Alex
Theme URI: https://alex.io
Author: Alexandre BOUGRAT
Author URI: https://alex.fr
Description: Mon premier thème !
Requires at least: WordPress 5.0
Version: 1.0
*/
```

On indique le nom du thème, son auteur, une description et le numéro de version.

> Ne mettez pas d’espace avant les deux points « : », sinon ça ne fonctionnera pas !

## Dans le fichier index.php

Puis, dans le fichier index.php on va se contenter du minimum syndical :

```php
<!DOCTYPE html>
<html>
<head></head>
<body>
	<h1>Coucou !</h1>
</body>
</html>
```

Pour l’instant on reste simple, on va juste afficher « Coucou ».

## Dans le fichier functions.php

Ce fichier est essentiel puisque c’est ici que l’on va activer toutes les fonctionnalités nécessaires de WordPress, mais également ajouter nos propres fonctions sur mesure.

Pour le moment, on va simplement demander à WordPress 2 choses : 

```php
<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );
```

> Dans les fichiers qui contiennent exclusivement du PHP, comme functions.php, on ne referme pas la balise PHP à la fin du fichier.

En effet, cela pourrait laisser trainer un espace à la fin, ce qui enclencherait prématurément le rendu de la page alors que WordPress n’est pas encore totalement initialisé, générant ainsi des erreurs PHP comme Headers already sent.

    Activer la gestion des images mises en avant

La première chose que l’on demande, c’est d’activer la prise en charge des images mise en avant pour le blog. Ce sont les visuels qui accompagnent l’article et son résumé, anciennement appelés « image à la une » et en anglais les post thumbnails.

Cela aura pour rôle d’ajouter la metabox suivante dans votre éditeur de contenu :

![](https://capitainewp.io/wp-content/uploads/2019/01/image-une-metabox-1000x383.jpg.webp)

Les images mises en avant seront abordées plus tard, dans un cours qui leur seront dédié.

    Activer la gestion automatique du titre de la page

On lui demande également de créer automatiquement la balise `<title>` dans l’en-tête. C’est le titre qui apparait dans l’onglet du navigateur, il est d’ailleurs important pour le référencement naturel.

> En laissant la gestion du titre à WordPress, il pourra être dynamique et différent pour chaque page. Une extension SEO comme Yoast pourra du coup venir écrire des titres optimisés pour le référencement.

Par défaut WordPress va simplement afficher à la suite les valeurs Titre du site et Slogan définies dans Réglages > Général. À terme on aura ça :

![](https://capitainewp.io/wp-content/uploads/2019/01/titre-site-wp-1000x235.jpg.webp)

Tous les préparatifs sont terminés, il ne nous reste plus qu’à…

## Activer le thème

On a fait le minimum syndical pour notre thème, mais cela suffira amplement pour le moment. On va donc aller l’activer. Pour cela rendez-vous dans la rubrique Apparence / Thèmes de votre interface d’administration :

![](https://capitainewp.io/wp-content/uploads/2019/01/activer-theme-1000x610.jpg.webp)

Si vous n’avez pas fait d’erreur, le thème devrait être listé. Cliquez sur Activer.

Si le thème n’apparait pas dans la liste, vérifiez :
– que vous avez bien enregistré vos fichiers ;
– dans le bon dossier ;
– dans style.css, il ne faut pas mettre d’espace avant les deux points « : » ;
– que vous avez correctement écrit les commentaires « /* */».

Si tout est bon, rendez-vous sur le site afin de voir le résultat :

![](https://capitainewp.io/wp-content/uploads/2019/01/theme-actif-1000x672.jpg.webp)

Ohlala ! Un truc de fou ! Bon déçu(e) ? Je vous comprend, pour l’instant notre thème ne fait pas grand chose… En plus il n’affiche même pas le titre du site, pour l’instant. Mais patience, ça prendra forme dès le prochain cours !

> Afin d’éviter des allers-retours incessants entre l’admin WordPress et le site, je vous propose d’ouvrir en permanence 2 onglets dans votre navigateur : un pour l’interface d’administration, et l’autre pour afficher la partie publique.

Et voilà, les bases sont posées ! Dans les prochains cours on va ajouter de l’interactivité et du design à ce thème qui fait pour le moment pâle figure.