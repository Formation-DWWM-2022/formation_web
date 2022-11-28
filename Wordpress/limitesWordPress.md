# Les limites de WordPress

Très vite, on se rend compte que WordPress nous limite pas mal lorsque l’on veut réaliser des mises en page modernes. Heureusement, il existe des outils et techniques qui vont nous permettre de lever tous les obstacles, comme les Page Builders ou encore ACF.

Si WordPress a gardé si longtemps sa réputation de « plateforme de blog », c’est parce que, nativement, le CMS manque d’outils lui permettant de proposer des mises en page de sites modernes (avec sections, colonnes …).

Mais depuis très longtemps, différentes solutions existent pour passer ces obstacles. C’est ce que nous allons voir dans ce cours.

## Le problème avec WordPress

Le principal souci avec WordPress, c’est que vous ne pouvez pas réaliser nativement une mise en page aussi poussée :

![](https://capitainewp.io/wp-content/uploads/2019/02/black-rhino-1600x1204.jpg.webp)

Pourquoi ? Tout simplement parce que ce design a plusieurs zones dans lesquelles se trouvent des contenus administrables, et que notre éditeur visuel (Gutenberg) ne nous le permet pas (encore).

![](https://capitainewp.io/wp-content/uploads/2018/04/article-gutenberg-1600x1076.jpg)

L’éditeur ne nous permet d’écrire qu’un seul contenu, à un seul endroit. Pour rappel il finira dans notre template à l’intérieur de la Boucle WordPress, à l’endroit où l’on a mis :

```php
<?php the_content(); ?>
```

Du moins, je ne pouvais pas faire des mises en pages poussées et tout rendre administrable.

Pendant un moment on a essayé avec les champs personnalisés (ou custom fields), mais comme on l’a vu dans un cours précédent, leur interface est bien trop limitée, et peu sexy. On s’est donc vite mis à la recherche d’une alternative.

On a d’abord envisagé de créer nos champs sur mesure. Après tout WordPress a tout un lot de fonctions bien documentées pour cela ! D’ailleurs c’est ce que l’on fait bien souvent lorsque l’on développe des extensions. Mais je ne vous cache pas que c’était bien trop chronophage ! Et plutôt fastidieux.

C’est alors qu’on a découvert l’incontournable ACF. À l’époque, c’était la seule réelle alternative. Aujourd’hui, il y a d’autres solutions comme les Page Builders, mais ACF reste encore la solution préférée des développeurs.

Je vais donc vous présenter rapidement les deux principales solutions, que l’on va voir plus en détails dans la suite de cette formation :

## Solutions pour lever les limites

L’avantage, c’est qu’aujourd’hui on ne manque pas d’alternatives pour mener WordPress plus loin ! Voici les deux qui me semblent les plus adaptées :

## Les Pages Builders

Depuis quelques années, les constructeurs de pages ont pris une place prépondérante dans l’univers WordPress. Tout le monde les utilise : les développeurs, mais surtout les non développeurs.

![](https://capitainewp.io/wp-content/uploads/2019/02/elementor-1600x893.jpg.webp)

Le principe est de concevoir ses pages sans code, grâce à des outils de mise en page que l’on utilise au clic.

Ils permettent de créer des sections, des colonnes, et d’ajouter des contenus et personnaliser le tout dans les moindres détails.

Parmi les plus connus, on retrouve Elementor, Beaver Builder et Divi Builder (qui est un thème premium à la base).

On va voir cette approche, mais pas tout de suite. Les constructeurs de page génèrent beaucoup de code, et laissent bien trop de possibilités aux rédacteurs.

Si vous faites un site pour un client, et que vous lui donnez l’accès à cet outil, il sera en face de quelque chose de très complexe, et il aura la main pour tout modifier et éventuellement tout casser.

À la place, je vais vous proposer une approche « encadrée » que je trouve bien plus saine :

## Advanced Custom Fields

L’autre solution, c’est le célèbre ACF : Advanced Custom Fields. C’est une extension qui ajoute une interface pour créer des champs personnalisés à nos contenus, que l’on va pouvoir personnaliser à volonté !

Le créateur de thème va créer des groupes de champs qu’il va ensuite assigner à des contenus : une page en particulier, aux articles …

Et ces champs peuvent être du texte, du contenu riche, des images, des liens, des fichiers…

Sur la capture d’écran, on voit les champs ACF Capitaine WP qui me permettent d’administrer le contenu de mes pages Formation.

![](https://capitainewp.io/wp-content/uploads/2019/02/champs-acf-1600x551.jpg.webp)

Il y a des champs select, texte, des boutons on/off …

Et ces champs, on va ensuite pouvoir les afficher très facilement dans nos templates, à l’endroit où on le souhaite !

## Alors pourquoi ACF ?

ACF c’est très simple à mettre en place, ça fait gagner énormément de temps au développeur, et ça permet de créer une interface plutôt sympa pour vos rédacteurs.

De plus, ACF utilise les mécanismes de base de WordPress en ce qui concerne les champs personnalisés. Il n’y a donc pas de surcouche qui viendrait ralentir votre site !

Que des bons points en somme !

## UX : Focus sur la saisie de contenu, pas sur le design

Le fait de proposer des champs administrables à vos rédacteurs va leur permettre de se focaliser sur une chose : la saisie du contenu. C’est un nouvel argument de taille en faveur d’ACF.

Le design de votre template est conçu par le designer, l’auteur va à l’essentiel et n’a donc qu’à remplir les « trous ». Il n’a pas besoin de penser au design ou au rendu.

Contrairement à un Page Builder, il n’a même pas accès à tous les outils de mise en page.

L’auteur se focalise donc sur la saisie des champs et uniquement sur ça. Le seul désavantage du coup c’est qu’on ne voit pas directement le rendu réel que cela va avoir sur la page.

![](https://capitainewp.io/wp-content/uploads/2019/02/acf-rendu-1600x759.jpg.webp)

Mais ça reste tout de même simple d’utilisation. J’ai utilisé ACF pour tous mes sites clients à l’époque, comme beaucoup d’agences aujourd’hui, et tous les utilisateurs ont toujours été ravis de cette approche : simple, et efficace !

> ACF est devenu aujourd’hui l’extension incontournable des développeurs de thème, à tel point que presque tous l’utilisent dans leurs projets.

C’est donc vers cette solution que l’on va se tourner maintenant. Grâce à ACF, vous allez vous ouvrir bon nombre de possibilités nouvelles ! Et très vite, vous ne pourrez plus vous en passer !

Les Pages Builders ne sont pas en reste pour autant, et on les abordera un peu plus tard dans la formation. Mais je préfère privilégier ACF car il permet au rédacteur de se focaliser sur la rédaction du contenu, et pas sur le design de la page.

Dans le prochain cours, on va voir comment créer notre premier groupe de champs, l’assigner à un contenu, et afficher les données dans votre template.
