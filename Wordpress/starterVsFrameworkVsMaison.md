# Starter themes, Frameworks WordPress ou fait-maison ?

Dans l’écosystème il existe des thèmes de base ou même des frameworks qui ont pour but de vous aider à accélérer le développement de vos sites. On va en découvrir certains et essayer de répondre à la question qui vous brûle les lèvres : dois-je tout faire à la main ou utiliser l’un de ces frameworks/starter ?

Lorsque l’on conçoit des sites avec WordPress, on fait face à plusieurs solutions :

    Utiliser un thème premium (vu dans le cours précédent) ;
    Utiliser un Starter Theme (un thème de départ) ;
    Utiliser un Framework (un thème de départ avec une structure et des outils particuliers) ;
    Ou alors, faire le tout sur-mesure.

Les thèmes premium, même s’ils sont très avancés, peuvent vite nous bloquer lorsque l’on a des besoins spécifiques. C’est pour ça que cette formation porte sur la création de thèmes sur mesure, afin d’être 100% indépendant.

Maintenant, il nous reste à savoir si on doit partir d’un Starter Theme, Framework, ou se retrousser les manches et faire tout à la main. Ne risque-t-on alors pas de réinventer la roue ?

## Les Starter Themes

Commençons avec les Starter Themes : Ce sont des structures de base vous permettant de démarrer un projet plus rapidement, et qui ne proposent pas encore d’apparence visuelle précise.

Leur but est de mettre en place les éléments communs à tout projet, afin de ne pas réinventer la roue à chaque fois. Il en existe quelques-uns, mais je vais vous présenter les plus connus :

## Underscores

_s, ou Underscores, est le Starter Theme plus ou moins officiel de WordPress. Il est conçu pour vous permettre de mettre plus rapidement en place un thème WordPress fait maison.

Quand vous l’activez, votre site n’aura pas une belle apparence : Underscores ne met en place que la structure de code et vous laisse la main pour créer le CSS qui vous conviendra le mieux.

Pour faire mon propre Starter Theme, je m’en suis parfois inspiré, mais avec l’objectif de simplifier des choses : beaucoup d’éléments de Underscores sont selon moi inutiles dans les projets habituels.

## Beans

Beans est un autre Starter Theme très connu de la communauté WordPress. Contrairement à Underscores, il propose par défaut un peu de CSS pour la mise en page de vos pages et même quelques templates prédéfinis (Une colonne, Deux colonnes…).

## Sage de Roots.io

Sage fait parti d’une suite d’outils de chez Roots plus adapté aux agences car il intègre un Workflow de développement qui s’intègre bien dans une logique de versionnement et de travail en équipe.

## Et d’autres…

Il en existe de nombreux autres mais ils n’apportent pas forcément grand chose de plus que ces 3 là. Histoire de les citer de manière non exhaustive, il y a : Bones, Ultimatum, FoundationPress, JointWP, UnderStrap, Thesis…

> Certains de ces thèmes proposent pleins d’outils comme Bootstrap, du templating, des préprocesseurs CSS… Mais est-ce qu’ils correspondent à vos besoins et process ?

Dans la quête de création de notre propre thème, on va mettre en place tous nos outils préférés, mais en maîtrisant complètement notre process.

## Les Frameworks

On distingue de moins en moins les différentes solutions pour créer des thèmes avec WordPress. Du coup ce que j’appelle Framework, d’autres l’appelleront simplement Starter Theme.

De plus, il n’en subsiste plus qu’un aujourd’hui, et c’est Genesis.

Il est payant, mais il vous suffira de débourser 60$ une bonne fois pour toutes pour en bénéficier à vie sur autant de projets que vous le voulez.

![](https://capitainewp.io/wp-content/uploads/2019/02/genesis-1000x875.jpg.webp)

D’ailleurs c’est quoi la différence entre un Starter Theme, et un Framework ? Après tout beaucoup ne font pas (ou plus) la distinction.

Pour moi ce qui distingue Genesis des Starter Themes, c’est qu’il propose une façon de faire différente du theming WordPress classique. Il a donc une méthodologie et des outils bien à lui,

Son objectif est de vous mâcher le travail : Genesis a déjà une apparence de base, et va vous permettre d’ajouter / modifier des éléments grâce à un système de Hooks. C’est en réalité un concept tiré de WordPress mais plutôt prévu à l’origine pour les extensions. On l’abordera en détails plus tard dans cette formation.

Alors, on aime ou on aime pas. Personnellement, je préfère rester sur un système standard.

D’expérience, on a plusieurs écoles : ceux qui sont absolument fan de Genesis et sa logique très particulière, et d’un autre côté les développeurs de métier qui n’ont pas du tout d’affinité avec cette logique et qui n’y sont pas sensibles.

C’est le cas notamment des développeurs dans les agences que j’ai accompagnées qui préfèrent une approche maison, plus classique « PHP ».

> Dans la formation, on ne verra pas Genesis plus en détails

## Fait maison ?

Reste maintenant la dernière solution : tout faire à la main ! Ça ne risque pas de prendre du temps ?

Eh bien pas tant que ça, mais on va faire ça de manière intelligente : le but de cette formation c’est de créer notre propre thème de base, que l’on réutilisera pour tous les futurs projets !

Vous pourriez cependant partir sur un starter existant, il n’y a pas de mal à ça, mais il faut bien le maîtriser et comprendre tout ce qu’il propose par défaut.

## Le Theming en PHP/HTML, ce n’est pas sexy

Et vous avez tout à fait raison. Souvent, les développeurs PHP qui ont l’habitude de Drupal ou Symfony me font la remarque suivante : Le theming sous WordPress n’est pas sexy car on n’a pas de langage de template.

Du coup, on est obligé de mettre du PHP et du HTML en même temps ? Heureusement, j’ai une solution pour vous ! Dans cette formation je vais vous présenter Timber, qui vous permettra d’utiliser le langage de templating Twig, bien connu par ceux qui font du Symfony.

Un chapitre est dédié à Timber et à la manière de grandement simplifier le templating dans WordPress.

## Est-ce que je peux utiliser un framework CSS comme BootStrap ?

Oui ! Il est très facile de les intégrer. Mais est-ce une bonne idée pour autant ? Pas sûr. Pour avoir interrogé bon nombre d’agences et entreprises, je me suis rendu compte que Bootstrap devient un obstacle à terme.

Pourquoi utilisez-vous Bootstrap ? Pour créer une structure HTML en sections / colonnes / blocs ?

Il vous faudra moins de 30 lignes de CSS pour reproduire ça !

Alors, je ne suis pas du genre à réinventer la roue. J’aime gagner du temps et utiliser des frameworks / outils… mais pour le theming WordPress, je fais exception. Mon objectif ici c’est de vous montrer qu’en construisant vous-même votre base, vous serez bien plus agile et efficace qu’avec des frameworks.

Vous pouvez vous baser sur un thème de base existant ou un framework pour accélérer le développement de vos thèmes WordPress, mais il y aura quelques contraintes. Mais je vous suggère de vous laisser le temps de la formation avant de faire votre choix définitif sur le sujet !
