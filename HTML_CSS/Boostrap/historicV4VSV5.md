## Bootstrap 4

Les développeurs ont travaillé en continu pour enrichir l’expérience développeur de l’utilisation de Bootstrap pour personnaliser les pages Web assez facilement. Ils ont publié de nombreuses versions mineures et majeures. Mais les principales versions qui sont les plus populaires sont le Bootstrap v4.x et Bootstrap v5.x. Regardons ce que tous les v4.x offert et comment ces choses ont évolué dans la version v5.x avec des fonctionnalités supplémentaires.
Bootstrap v4.x

Bootstrap 4 a été lancé en janvier 2018, et c’était une grande amélioration par rapport aux versions précédentes. Cependant, les caractéristiques les plus aimées étaient les suivantes.

    Grille Flexbox

Flexbox grids a donné le pouvoir aux développeurs web d’aligner les colonnes avec facilité. Maintenant, vous pouvez positionner les colonnes à n’importe quelle partie de la vue simplement en utilisant des classes comme justify-content-center ou align-items-end, et ainsi de suite. Vous pouvez également changer la direction des lignes, ce qui rend les mises en page verticales beaucoup plus faciles à mettre en œuvre et maintient la réactivité en même temps.

    Niveaux de la grille

Bootstrap 3 n’avait que quatre niveaux, mais Bootstrap 4 a apporté des améliorations en fournissant une nouvelle largeur d’appareil pour améliorer le soutien des phablets aux plus petits appareils. Les nouveaux niveaux de grille précisaient les largeurs d’appareils suivantes.

- sm : 576px et plus
- md : 768px et plus
- lg : 992px et plus
- xl : 1200px et plus

Les nouveaux niveaux de grille précisaient les largeurs d’appareils suivantes.

    Feuilles de style syntaxiquement impressionnantes (Sass)

Bootstrap 4 a ajouté le support pour Sass, qui est un préprocesseur CSS très utilisé et très populaire. Une feuille de style Sass offre un meilleur contrôle et la personnalisation et permet de définir comment vous voulez exactement utiliser Bootstrap.

    Cartes

Vous n’avez plus besoin de concevoir plusieurs éléments et de les combiner pour fournir une vue carte aux utilisateurs. Avec l’introduction du composant Cartes, vous pouvez directement utiliser ce composant et le personnaliser en utilisant des classes bootstrap nouvellement disponibles pour redéfinir l’apparence des structures de cartes, comme les cartes de profil ou les tuiles d’information. Le composant de carte n’a pas non plus de largeur fixe et se dissout dans le conteneur dans lequel il est placé.

    Outils d’espacement

Les utilitaires d’espacement vous facilitent la vie en fournissant des classes de marges et de remplissage prêtes à l’emploi que vous pouvez simplement appliquer à chaque composant visuel. Les classes de marge sont comme mt-2 ou mx-2, et les classes de remplissage sont comme pt-2 ou px-2, où m représente la marge, p représente le remplissage, le t pour le haut ou x pour les deux côtés gauche et droit, et le nombre indique la quantité dont vous avez besoin.

## Bootstrap 5
Bootstrap 5 est entré en vigueur en mai 2021. Cette version a été lancée après plusieurs itérations de versions alpha et bêta et a donc eu une pile d’ajouts majeurs et de nouvelles fonctionnalités.

## Boostrap 4 VS 5

Nous allons plonger dans ses caractéristiques en comparant comment les choses ont changé dans Bootstrap 5 et de comprendre quelles meilleures perspectives de conception qu’il offre aux développeurs.

    Système de grille amélioré

Le système de grille est conservé dans Bootstrap 5. Cependant, un niveau de grille supplémentaire xxl a été introduit pour minimiser l’effort de rendre les pages réactives sur les affichages à haute résolution.

Les colonnes n’ont pas de position relative par défaut dans Bootstrap 5.

Des classes ont été ajoutées pour traiter l’espacement vertical.

    Éléments de formulaire améliorés

Les éléments de formulaire dans Bootstrap 4 ont par défaut la vue fournie par le navigateur. Cependant, dans Bootstrap 5, les éléments de formulaire ont un design personnalisé qui leur permet d’avoir une apparence uniforme dans tous les navigateurs.

Les nouveaux contrôles de formulaire sont basés sur des contrôles de formulaire complètement sémantiques et standard. Cela aide les développeurs à éviter d’ajouter des balises supplémentaires pour les contrôles de formulaire.

    API des utilitaires

Contrairement à Bootstrap 4, Bootstrap 5 permet aux développeurs de modifier et de créer leurs propres utilitaires.

Vous pouvez simplement utiliser sass pour créer vos propres utilitaires.

Vous pouvez utiliser l’option d’état pour générer des variations de classe fictives comme hover et focus.

``` css
Services publics : (
  "opacité" : (
    propriété : opacité,
    classe : opacité,
    état : stationner,
    valeurs : (
      0 : 0,
      25 : . 25,
      50 : . 5,
      75 : . 75,
      100 : 1,
    )
  )
);
```

    Soutien à IE

Bootstrap 5 ne prend plus en charge Internet Explorer 10 et 11 comme son prédécesseur, Bootstrap 4.

    Couleurs étendues

Bootstrap 4 avait des options de couleur limitées. Mais Bootstrap 5 a inclus de nombreuses nouvelles options de couleur à sa palette de couleurs, vous permettant de choisir parmi les différentes nuances disponibles. Vous pouvez trouver quelques-unes des nuances de couleur ci-dessous.

![image](https://www.loginradius.com/blog/static/4b5ffdd71eeb7f85b97b02e4af17a88b/74866/colors.png)

    Icônes d’amorçage

Bootstrap 4 n’avait pas de bibliothèque d’icônes SVG. Vous deviez utiliser d’autres bibliothèques tierces comme Font Awesome pour utiliser des icônes dans vos applications. Mais Bootstrap 5 a résolu ce problème en introduisant sa propre bibliothèque SVG avec plus de 1000 icônes.

Il comprend également une version de police web dans la version stable de la bibliothèque d’icônes.

![image](https://www.loginradius.com/blog/static/c0c3f76afb2d4b85a44266a248169923/e5715/BootStrapIcons.png)

    Stratégie de génération de site

Bootstrap 5 a déménagé à Hugo pour sa génération de site statique sur Jekyll. Hugo est un générateur de site statique rapide implémenté dans Go et est très populaire. 

    Mise à jour de Popper.js

Bootstrap 5 mise à jour apporte une mise à jour pour Popper.js ainsi, Popper.js v2. Popper.js aide généralement à concevoir les infobulles et popovers. 

- fallbackPlacement option devient fallbackPlacements
- L’option offset n’est plus disponible. Cependant, vous pouvez utiliser le paramètre popperConfig pour y parvenir.

Avec v2, les changements suivants entrent en jeu

    Composantes de l’espace réservé

Bootstrap 5 permet de charger des espaces réservés dans vos pages. Cela signifie que vous pouvez utiliser l’espace des composants en montrant les espaces réservés à leur place pendant qu’ils chargent encore le contenu réel.

![image](https://www.loginradius.com/blog/static/2368a2aec32e17c9c21c107e4d039e5c/2c288/placeholders.png)

    Étiquettes flottantes

Bootstrap 5 ajoute le support pour les étiquettes flottantes dans les formulaires pour les champs de saisie. Vous pouvez simplement utiliser la classe form-floating pour activer une étiquette flottante. Lorsque vous entrez une valeur dans les champs de saisie, ils ajustent automatiquement leur position à leur zone flottante.

![image](https://www.loginradius.com/blog/static/b8c7c0c42fcfdb4ad477e37aea1b7ac7/bca35/flabels.png)

    Soutien RTL

Bootstrap 5 a ajouté le support pour RTL (droite-gauche), ce qui signifie que vous pouvez développer du contenu qui a besoin d’écriture du côté droit de la page et continue vers la gauche. En conséquence, des sites Web dans des langues comme l’arabe, le sindhi et l’ourdou peuvent facilement être développés.

![image](https://www.loginradius.com/blog/static/6a4ae736793c0804d6c89471e9c8680a/8ce22/rtl.png)

jQuery Deprecation

Bootstrap a utilisé jQuery dès le début comme une dépendance pour offrir des fonctionnalités dynamiques. Avec Bootstrap 5, jQuery est abandonné, et Vanilla JS est présenté comme son remplacement.

NOTE : Il y a encore des dépendances JS qui dépendent des modules Popper et Vanilla JS. Cependant, jQuery est optionnel et peut être ajouté en fonction des exigences du projet.

Autres changements importants : 

- Bootstrap 5 introduit une nouvelle structure de nommage des attributs de données. l’attribut data-* a été renommé data-bs-*.
- Bootstrap 5 fournit maintenant des personnalisations plus faciles sur les pages de thème v4 et fournit des extraits de code à construire en utilisant les fichiers Sass de Bootstrap.
- Bootstrap 5 a ajouté un nouveau composant en accordéon qui inclut des icônes qui ont un état et peuvent être cliquées. La classe accordéon-flush peut être utilisée pour supprimer la couleur d’arrière-plan par défaut, les bordures ou les coins pour éventuellement rendre les accordéons bord à bord avec l’élément parent.
- Le site de documentation Bootstrap 5 est maintenant amélioré pour améliorer la lisibilité de l’utilisateur, et de nouveaux exemples ont été ajoutés avec des extraits de code.
- La propriété inline-block est supprimée dans Bootstrap 5, et la classe dropdown-menu-dark se charge maintenant avec une liste noire par défaut.
- Le support pour jumbotron a été terminé dans Bootstrap 5.
- Avec les classes verticales dans Bootstrap 5, les colonnes peuvent être positionnées relatives.
- Les gouttières peuvent maintenant être appliquées en utilisant la classe g* au lieu de gouttière. La taille de la police est maintenant définie à rem au lieu de px.
- Enfin, Bootstrap 5 ajoute également un nouveau composant offcanvas qui vous permet de créer des fenêtres d’affichage cachées qui apparaîtraient lorsque vous interagissez avec le composant qui y est lié, par exemple, les barres de navigation latérales, les paniers, etc. Voici un exemple du composant offcanvas inférieur.

## Conclusion
Bootstrap 4 avait l’habitude de faire un excellent travail en offrant toute la flexibilité et la réactivité pour la conception des pages web. Cependant, Bootstrap 5 ajoute plusieurs nouveaux aspects qui aident à réduire l’effort pour faire de même. Mais encore, vous devez garder certains paramètres à l’esprit avant de choisir l’un ou l’autre de ces deux.

Si vous avez un projet existant qui doit soutenir IE 10 et 11 ou dépend de jQuery, vous devriez probablement coller à Bootstrap 4. Bootstrap 5 peut être écrasante, mais pourrait briser votre structure de projet si pas migré correctement.

Mais si vous démarrez un nouveau projet et que vous voulez fournir une interface utilisateur plus immersive pour les utilisateurs, optez certainement pour Bootstrap 5 pour utiliser ses composants modernes, dont cet article a discuté ci-dessus.

C’est tout pour ce billet de blog en ce moment. J’espère que vous avez passé un bon moment à lire ceci et appris quelque chose de nouveau. Faites-moi savoir dans les commentaires si vous avez aimé le contenu.