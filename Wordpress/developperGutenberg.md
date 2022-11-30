# Pourquoi apprendre à développer avec Gutenberg

Gutenberg nous permet d’écrire des contenus plus riches rapidement, mais c’est avant tout une superbe opportunité pour nous les développeurs afin de créer des blocs sur mesure à nos besoins et ceux de nos clients.

## Gutenberg est le nouveau standard

Avec, ou sans vous !

Gutenberg est intégré en standard dans WordPress, volant la place longuement occupée par Tiny MCE. Ce qui veut dire que vous n’aurez pas d’autre choix que de vous y mettre.

Alors je comprend les réticents : le cerveau humain va à l’encontre du changement, car cela bouscule les habitudes. Il est biologiquement conçu pour économiser sa consommation d’énergie et créé donc des habitudes, des réactions machinales pour épargner du temps de calcul.

C’est ce qu’il se passe avec l’arrivée de Gutenberg : nos habitudes longuement ancrées sont bousculées et il faut s’adapter d’abord soi même au nouvel éditeur, et pour certain éduquer également les clients.

Cependant je pense qu’anticiper au maximum ce changement, et s’y préparer, est la meilleure chose à faire. Le cerveau arrête d’aller à reculons à partir du moment où il se rend compte que la nouvelle solution propose beaucoup de bénéfices, et que la tâche de réapprentissage ne sera pas trop difficile.

Et je peux vous assurer qu’après 5 petites minutes, vous trouverez Gutenberg réellement simple et intuitif à utiliser !

Je vais justement essayer dans ce cours de passer en revue les avantages que je vois à se préparer au passage de Gutenberg, qui à terme vous fera gagner en temps et en tranquillité.

## Un avantage concurrentiel pour votre agence

Imaginons un blogueur culinaire qui pourra avoir son bloc « liste d’ingrédients », ou un bloc affichant les informations de base (temps de cuisson, prix, difficulté) dans une mise en page sympathique.

Tous vos concurrents ne se mettront pas à jour aussi rapidement et c’est là que vous pouvez marquer une grande différence. Pour la petite histoire aux alentours de 2010 j’étais la première agence de la région à proposer spécifiquement des sites WordPress, avec en prime du responsive web design. Ces arguments m’ont été grandement utiles pour gagner des contrats.

C’est aussi un avantage concurrentiel pour vos extensions : si vous proposez des blocs à la place de shortcodes et que vos concurrents ne le font pas, les utilisateurs risquent bien de vous préférer.

Aujourd’hui les plus grosses extensions sont déjà en train d’ajouter du support pour Gutenberg.

## Une meilleure expérience pour vos utilisateurs

Si vous écrivez régulièrement des articles avec WordPress, vous avez certainement eu quelques frustrations à utiliser TinyMCE : la zone d’écriture est assez restreinte, la barre d’outils est chargée d’options pas forcément utiles, il est impossible de faire un simple bouton, et les styles et mises en pages sont ultra limitées.

![](https://capitainewp.io/wp-content/uploads/2018/02/tiny-mce-toolbar.jpg)

Bref, même si j’ai réussi à partiellement contourner le problème avec l’extension ACF, et que d’autres ont opté pour un page builder (qui ne corrige pas pour autant la complexité, et vient même en ajouter), aucune des solutions envisagées n’était idéale.

Je trouve que l’approche de Gutenberg vise justement à corriger ces problèmes et apporte fluidité et simplicité.

Chaque bloc propose sa propre barre d’outil, épurée et adaptée pour l’occasion :

![](https://capitainewp.io/wp-content/uploads/2018/02/toolbar-gutenberg.jpg)

Elle n’apparait que lorsque l’on clique sur l’un des blocs, ce qui permet de ne pas saturer inutilement l’interface. Un gros travail d’expérience utilisateur (UX) a été fait de ce côté là : il est difficile de proposer une interface simple, épurée et à la fois performante.

De plus, certains blocs disposent d’options de personnalisation via l’inspecteur, la barre latérale de droite, comme c’est le cas notamment pour le paragraphe ou le bouton : <https://youtu.be/NpttTGltoow>

Et le plus beau dans tout cela, c’est que les modifications sont apportées en temps réel, ce qui pourrait paraitre « normal ». On a pris l’habitude du temps réel avec le web moderne.

Pourtant WordPress avait un très gros retard à rattraper de ce côté là. Et c’est chose faite avec Gutenberg. On y est donc enfin : un vrai éditeur WYSIWYG (What you see is what you get).

Comme on l’a déjà vu précédemment, on va enfin pouvoir se passer de l’utilisation des shortcodes, qui sont clairement contre intuitifs :  [form id="1"].

A la place, on aura un aperçu en temps réel, dans l’exemple ci-dessus on verra directement le formulaire.

Je n’ai à ce jour entendu personne dire qu’il appréciait utiliser des shortcodes tous les jours.

Pour résumer, Gutenberg apporte du temps réel et de la simplicité dans l’interface qui vont offrir d’énormes possibilités à vos utilisateurs qu’ils apprécieront très surement.

## Technologies plus modernes, plus rapides…

Gutenberg se base sur les dernières avancées en Javascript et sur l’arrivée de librairies open source comme ReactJS, créée par Facebook. Sans elles il aurait été bien plus difficile de parvenir à un tel résultat.

jQuery, qui est largement utilisé dans l’interface d’administration de WordPress, ne permet pas d’aller aussi loin.

Sans rentrer dans le détail pour le moment, il faut savoir que cette nouvelle approche en Javascript permet d’enregistrer un brouillon, publier et mettre à jour sans recharger la page.

Et vous le savez aussi bien que moi : le rechargement d’une page dans l’interface d’administration peut s’avérer très très long, en fonction du nombre d’extensions installées, de la puissance de votre hébergement et de la charge du serveur.

Sur certains de mes sites, il se passe parfois près de 10 secondes pour un chargement de page après enregistrement. C’est frustrant.

Avec Gutenberg la sauvegarde se fait en moins d’une seconde. Imaginez le temps gagné par un rédacteur qui passe ses journées dans son admin WordPress.

A l’avenir l’interface d’administration entière s’orientera vers cette approche « tout Javascript ».

## … Et extensibles, afin de créer ses propres blocs

Ce qui fait la force de WordPress, c’est de pouvoir venir brancher des extensions à volonté, et de modifier / améliorer le comportement par défaut du CMS comme en attestent les plus de 50 000 extensions du répertoire.

Par conséquent c’est ce qui a motivé la création de Gutenberg : pouvoir calquer cette extensibilité dans la seule partie manquante du CMS : l’éditeur de contenu.

Et ça tombe bien puisque c’est aussi la philosophie de React : la conception des applications se fait via une approche par ‘composants’ qui peuvent être extensibles et réutilisables facilement.

Cette logique était presque impossible avec Tiny MCE, d’où les shortcodes.

C’est pourquoi les développeurs de WordPress ont créé un nouvel éditeur complètement personnalisable à l’image du CMS lui-même.

Ca veut dire qu’un développeur peut créer des blocs sur mesure qui possèderont leurs propres options. WordPress propose en plus une série de fonctions qui permettent de coder des blocs plus facilement, et c’est ce que nous allons aborder dans cette formation !

Voici quelques blocs que l’on peut coder soi-même pour augmenter les capacités de Gutenberg : <https://youtu.be/2TW7_evtHqg>

La seule différence par rapport à d’habitude, c’est que la plupart du code sera fait en JS et React, et non pas en PHP. Mais cela reste assez abordable et même si vous n’avez pas de trop grosses bases en JS, vous devriez pouvoir vous en sortir !

## Le cas d'un site de formation

J’ai simplement besoin de pouvoir écrire des contenus riches facilement, ce qui n’était pas le cas avec tinyMCE, ni avec ACF.

Par contenu riche j’entend les textes, images, mais aussi d’autres blocs comme les définitions, présenter une extension, mettre en avant une citation ou un texte, ajouter un séparateur et le tout sans devoir passer par les shortcodes.

Jusqu’à présent j’utilisais, comme beaucoup ACF et son champ flexible. Mais l’interface au final restait lourde dans l’administration et je n’avais pas d’aperçu temps réel.

![](https://capitainewp.io/wp-content/uploads/2018/02/acf-flexible.jpg)

Et c’est le cas de beaucoup d’agences qui utilisent cette technique pour créer des mises en page complexes, personnalisables à juste niveau, sans donner trop de pouvoir à l’utilisateur.

A l’époque où j’était en agence, on utilisait tout le temps ACF. Les clients étaient tous très satisfaits par la simplicité de cette approche (puisqu’ils ont juste à remplir les cases, sans penser au design, ce qui était le boulot du designer et de l’intégrateur de maquettes).

Le gros souci était le fait de ne pas avoir d’aperçu visuel en temps réel. Il fallait donc enregistrer, et recharger la page du site pour voir le résultat.

Avec des blocs personnalisés Gutenberg, je peut obtenir aujourd’hui la même simplicité que j’avais avec ACF, mais avec le gros avantage d’avoir un vrai WYSIWYG : ce que je fais est exactement ce que j’aurais en front.

![](https://capitainewp.io/wp-content/uploads/2018/02/capitaine-gutenberg.jpg)

À mon avis, le pire dans l’approche ACF était d’avoir plusieurs éditeurs TinyMCE chargés en même temps , ce qui était lourd en terme de performances et d’interface utilisateur : il y avait plein de scrollbars imbriquées, ce qui rendait la navigation peu pratique.

Pour moi le plus grand avantage de Gutenberg est la liberté d’esprit qu’il va créer : rédiger du contenu demande une forte concentration mentale.

L’éditeur est tellement fluide, sans friction, qu’il se fait oublier et permet de se concentrer purement sur l’écriture.

Je peux également proposer des blocs personnalisés fait sur mesure à mes clients pour améliorer leur propre expérience de rédaction. C’est bon pour votre business, et c’est bon pour WordPress !
