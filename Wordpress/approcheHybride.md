# Page builders + développement sur mesure : une approche hybride

Certains rechignent à utiliser les constructeurs de pages à cause des contraintes techniques qu’ils imposent. En tant que développeur, il est toutefois possible d’outrepasser ces limites en créant des widgets sur mesure.

Au début de la formation, on s’était demandé s’il fallait faire des thèmes sur mesure ou utiliser des constructeurs de pages. j’avais parlé d’une miraculeuse approche hybride. C’est justement l’objet de ce cours.

Plus récemment on s’est demandé quel est le constructeur de pages le plus adapté, en agence notamment. Et je vous ai recommandé Elementor car il permet de créer des widgets sur mesure, avec une documentation très bien construite.

## L’approche hybride

En tant que professionnel, dès qu’un nouveau projet arrive, on doit faire face à des choix.

Si on laissait faire les développeurs, ils feraient tout maison. Mais voilà, il y a un budget et une rentabilité à respecter.

En général il faut :

    Aller vite ;
    Être souple ;
    Être rentable ;
    Et enfin répondre aux éventuels besoins spécifiques.

Les trois premiers points sont plus faciles à atteindre avec un constructeur de pages. Mais en ce qui concerne les besoins spécifiques, il sera difficile de ne pas faire de développement sur mesure.

> C’est bien souvent le budget qui va conditionner le choix technologique d’un projet.

## Code + Page builder = approche hybride

L’approche hybride, c’est donc le fait d’utiliser un constructeur de pages, pour créer des pages plus vite, tout en gardant la possibilité de faire du code sur-mesure pour les besoins plus spécifiques.

![](https://capitainewp.io/wp-content/uploads/2020/04/elementor-dev.jpg.webp)

Les rédacteurs et designers pourront utiliser un outil qu’ils connaissent bien, et les développeurs de votre équipe s’en serviront de plateforme de base pour y ajouter des fonctionnalités.

L’objectif de l’approche hybride, c’est de ne faire aucune concession. C’est d’avoir à disposition la souplesse de mise en page du constructeur, qui permet de faire des mises en page en un temps record, tout en pouvant faire appel à du code lorsque c’est nécessaire.

Et ça, Elementor, Oxygen ou encore Divi l’ont compris très tôt : c’est pourquoi ils proposent une documentation développeur, ainsi qu’une API pour que vous puissiez vous-même étendre les possibilités natives, en créant des blocs (ou widgets) et en y ajoutant des réglages.

Bien sûr, on a vu plus tôt qu’on pouvait également opter pour une approche à base de champs personnalisés, avec ACF notamment. Eh bien, ce n’est pas incompatible avec Elementor !

## Elementor, extensible comme WordPress

Ce serait une erreur de voir Elementor comme un simple outil, plutôt qu’une plateforme, comme WordPress.

Avec WordPress, on a accès à des hooks et fonctions pour en étendre ses possibilités. Et bien figurez-vous que c’est la même chose avec Elementor. De nombreux hooks et fonctions sont mises à la disposition des développeurs.

La documentation officielle d’Elementor montre à quel point il est possible d’aller loin en terme de personnalisation :

- On peut créer des widgets sur mesure ; <https://developers.elementor.com/docs/widgets/>
- Utiliser des filtres ou des actions (les hooks) pour personnaliser un comportement ; <https://developers.elementor.com/docs/hooks/>
- Et même ajouter de nouveaux réglages (controls). <https://developers.elementor.com/docs/controls/>

> C’est pour moi la solution idéale pour réaliser tous types de sites : les widgets sur mesure sont réutilisés et adaptés en fonction de mes projets clients, ce qui apporte un gain de temps non négligeable. J’utilise également beaucoup ACF, et Elementor est le seul constructeur de page à prévoir une intégration avec cette extension.

Pas mal ! Nous nous sommes focalisés sur Elementor, mais Oxygen et Divi ont également leur propre documentation développeurs. À vous de choisir !

Divi a beaucoup recours à Javascript là ou Elementor se base surtout sur PHP.

> Avant de choisir votre constructeur de pages de prédilection, consultez sa documentation développeurs afin d’entrevoir les possibilités qu’il offre.

On va maintenant voir quelles sont les principales limites imposées par les constructeurs, et les solutions pour les contourner, à l’aide d’un peu de code.

## Les limites d’un constructeur de pages

On va se mettre en situation, ce qui nous permettra de voir quelques problèmes qu’on pourrait avoir avec une approche 100% page builder. A partir de ces problématiques, on verra les solutions de développement à notre disposition.

## Afficher une liste de publications selon un critère

Prenons un exemple simple. Imaginez que vous souhaitez afficher la liste des jeux vidéos les mieux notés sur votre page d’accueil, qui proviennent d’un type de publication personnalisé ou CPT.

![](https://capitainewp.io/wp-content/uploads/2020/04/classement-jeux-scaled.jpg.webp)

Le widget Publications d’Elementor serait le candidat idéal mais il va manquer d’options : on peut choisir le type de publication que l’on souhaite afficher, ainsi que l’ordre d’affichage selon le titre ou la date.

![](https://capitainewp.io/wp-content/uploads/2020/04/elementor-tri-posts.jpg.webp)

Mais on ne peut pas les classer par la valeur d’un champ additionnel, le champ note dans notre cas. On est également limité par la mise en page des éléments.

Pour solutionner ça, Elementor nous offre plusieurs approches :

- On peut ajouter un filtre en PHP dans le widget Publications, pour trier les résultats ;
- On peut aussi modifier le template d’affichage, pour personnaliser le HTML, et afficher la note ;
- Ou encore carrément créer un widget sur mesure.

Avec cette dernière solution, on a contrôle total, à la fois sur la requête et le template. On va donc pouvoir bénéficier de toute la puissance de la WP Query et des libertés qu’elle offre ! C’est donc cette piste que je vais privilégier par la suite.

## Autres exemples

Pour rester sur le même type d’exemple, on pourrait imaginer vouloir afficher des événements, classés cette fois non pas par leur date de publication, mais la date de déroulement de l’événement : les événements les plus proches en premier.

![](https://capitainewp.io/wp-content/uploads/2020/04/liste-evenements-scaled.jpg.webp)

Un widget sur mesure sera là aussi parfaitement adapté.

On pourrait également imaginer de nombreux autres cas :

- Une mise en forme particulière qui pas proposée nativement (une zone d’appel à l’action par exemple, une grille en CSS grid un peu complexe…) ;
- Un formulaire d’abonnement ou de connexion à une application externe ;
- Un outil de personnalisation d’un produit ;
- …

Bref, dès que ça fait appel à du « très spécifique », vous pouvez faire appel à vos compétences de développeurs.

## Un exemple concret

J’ai eu besoin de créer des éléments sur mesure pour le site d’un ami, qui tient un food truck. Il voulait pouvoir facilement administrer :

- D’une part, les burgers du moment (un CPT) ;
- Et d’autre les emplacements de la semaine (un autre CPT).

Voici à quoi ressemble sa page :

![](https://capitainewp.io/wp-content/uploads/2020/04/black-rhino-exemple.jpg.webp)

J’ai créé 2 zones sur mesure qui sont générées automatiquement. Mon ami n’a qu’à simplement aller sélectionner les emplacements et burgers à partir de champs ACF relationnels.

De cette manière, il n’a même pas besoin de toucher à la page, et gagne énormément de temps.

## Le sur-mesure et les constructeurs de page

Vous l’aurez compris, le plus simple c’est de créer un élément sur mesure que l’on va intégrer dans notre constructeur, et pour cela il existe plusieurs solutions :

## Solution 1 : via un shortcode

Tout d’abord, voici ce qu’est un shortcode :

> Le shortcode (code court en français) est un code entre crochets à intégrer dans le contenu d’un site WordPress. Un code court fait appel à une fonction définie en PHP, appelée par WordPress au moment de la génération de la page. [gallery] générera par exemple une galerie photo. Beaucoup d’extensions les utilisent pour s’interfacer facilement avec le CMS

Les shortcodes c’est un petit peu la vieille méthode de WordPress. Dans le passé on les utilisaient beaucoup. Ça reste encore une solution de choix pour intégrer un formulaire dans une page par exemple, dans le cas ou l’extension ne propose pas de bloc pour ça.

Si vous utilisez Ninja Forms, il faut utiliser le code [ninja_form id=1] à l’endroit où vous souhaitez l’afficher dans votre site.

Heureusement pour nous, un tel code va être immédiatement interprété une fois collé, et on verra le résultat s’afficher en temps réel, à la place d’un simple [mon_code] au milieu de votre contenu.

De plus, il est très simple de déclarer un shortcode au niveau du code :

```php
<?php 
// Déclaration d'un shortcode
// Si [heure] est trouvé dans un contenu, l'heure actuelle sera affichée à la place

function alex_display_time( $atts ) {
    return date_i18n( 'H:i', time() );
}
add_shortcode( 'heure', 'alex_display_time' );
```

Ce n’est donc pas la solution la plus sexy. Par contre elle est rapide à mettre en place et compatible de partout : dans Gutenberg, dans Divi, dans Elementor…

On la voit en détails dans le prochain cours.

## Solution 2 : avec un bloc sur mesure

L’autre solution, c’est de développer un bloc spécifique en se basant sur la documentation développeur d’Elementor.

L’avantage, c’est que votre widget sera listé dans les widgets disponibles, et on pourra même y ajouter des réglages. Et c’est l’avantage majeur par rapport à la méthode des shortcodes.

![](https://capitainewp.io/wp-content/uploads/2020/04/elementor-custom-widget.jpg.webp)

Que ce soit pour le widget ou les réglages, très peu de code sera nécessaire : on va tirer parti de ce que propose déjà Elementor, à grands coups de copier/coller dans la doc ! On aura donc accès à des champs texte, numérique, couleur…

Bien, maintenant que l’on sait qu’on est plus limité par les contraintes imposées par le constructeur, on va voir dans le prochain cours comment tirer parti des shortcodes.
