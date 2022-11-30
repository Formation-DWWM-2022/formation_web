# Gutenberg n’est pas (encore) un page builder

On compare souvent Gutenberg aux Page Builders existant mais en réalité, leur but n’est pas du tout le même. Dans ce cours je vais vous expliquer les différences fondamentales qui existent entre les deux, et comment ils peuvent coexister.

Page Builder, une structure en sections, colonnes et blocs

Un page builder permet d’éditer 3 niveaux d’un site Web :

1. La section :  une strate horizontale dont on peut personnaliser la couleur, l’image, ou la vidéo de fond
2. Les colonnes : une seule, 2, 3… avec des ratios personnalisables (par exemple 2/3 + 1/3)
3. Les blocs : des éléments qui s’empilent dans les colonnes : titres, textes, images, vidéo…

Si je schématise :

![](https://capitainewp.io/wp-content/uploads/2018/02/schema-section-colonne-bloc.png)

Et voici un exemple basé sur ce schéma :

![](https://capitainewp.io/wp-content/uploads/2018/02/elementor-section.jpg)

La section est la zone grise, qui prend toute la largeur. Viennent ensuite les 2 colonnes, celle de gauche comprenant 2 blocs : un titre et un texte, et celle de droite affichant un bloc image.

Le succès des Page Builders vient de cette capacité à personnaliser chaque niveau dans les moindres détails de couleur, tailles, espacement, typographie et même les animations.

## Qui utilise les Page Builders ?

Aujourd’hui plus de 60% des professionnels de WordPress ne sont pas développeurs : ils conçoivent des sites à base de Page Builder et d’extensions, et réussissent parfaitement à répondre à la plupart des besoins clients sans taper une seule ligne de code.

![](https://capitainewp.io/wp-content/uploads/2017/05/repartition-developpeurs.png)

J’aborde d’ailleurs ce sujet plus en détails dans la formation développeur de thème, dans le cours Thème sur mesure ou thème premium ?

## Quel est le problème des Pages Builders ?

Le principal problème, c’est la complexité de ces outils. Il y a tellement de possibilités, d’options, qu’il est plus facile de faire du moche que de faire du beau.

En effet, sans aucune compétence de designer, il est très compliqué de réaliser un site cohérent, visuellement beau. Sans un minimum de talent de rédacteur web, il sera difficile d’allier le bon contenu au bon design et ainsi réaliser un site percutant.

Le design et l’expérience utilisateur, la rédaction web, restent des domaines complexes, et des métiers à part entière.

Les Page Builders permettent donc de faire des sites plus facilement, mais ne permettant pas de les faire plus jolis pour autant. Ils proposent un panel d’outils conséquent, destinés à un public large, tel qu’une agence, un freelance, ou encore un simple utilisateur.

Si vous êtes une agence, et que vous mettez en place cet outil à un client, il aura alors accès à toutes les fonctions. Dans ce cas il pourra très facilement faire des modifications en profondeur et défigurer le site.

Et si vous êtes une personne qui souhaite réaliser son propre site web, maitriser WordPress ainsi qu’un page builder prendra énormément du temps.

Cela dit je ne fais pas le procès des Page Builders. Ils existent pour une bonne raison : proposer des solutions évoluées aux besoins des utilisateurs de WordPress, que ce dernier a mis trop de temps à prendre en compte.

Ils apportent un grand pouvoir, mais également une grande responsabilité à son utilisateur.

![](https://capitainewp.io/wp-content/uploads/2017/05/grand-pouvoir.gif)

Ce n’est donc pas la solution à mettre dans toutes les mains.

## Pourquoi Gutenberg n’en n’est pas (encore) un ?

De retour à Gutenberg, j’avoue entendre souvent : Gutenberg est un page builder peu évolué qui n’a donc aucun intérêt face à Elementor (ou autre)

Vu comme ça, en effet : Gutenberg ne permet pas de gérer des sections et tout juste des colonnes. Quel piètre Page Builder il fait !

Mais en réalité, Gutenberg n’est pas un Page Builder ! Pour le moment…

Il reste le successeur de Tiny MCE : c’est-à-dire un éditeur visuel. Il est fait pour écrire du contenu, celui d’un article par exemple, mais pas pour faire de la mise en page avancée, qui est le rôle du thème et du personnaliseur de thème (le customizer, même si personne ne l’aime).

Son objectif est de remplacer Tiny MCE qui, après 15 ans de bons et loyaux services, a bien mérité sa retraite (spoiler alerte : en réalité on retrouve encore TinyMCE, quelque peu maquillé, dans Gutenberg).

## Alors à quoi sert Gutenberg ?

Le plus simple est de le comparer à Medium. Pour ceux qui ne connaissent pas, c’est une tribune où chacun peut écrire des articles sans pour autant pouvoir modifier la mise en page (exceptés l’en-tête pour les groupes).

![](https://capitainewp.io/wp-content/uploads/2018/02/article-medium.jpg)

Le focus est bien là : l’écriture. Et tout comme Medium, Gutenberg propose des blocs et styles assez sympathiques pour sublimer son contenu (notamment avec des emphases de texte, des citations…)

D’ailleurs, le nouveau thème twentynineteen inclus dans WordPress 5 ne laisse planer aucun doute : on dirait bien un medium-like !

![](https://capitainewp.io/wp-content/uploads/2018/02/twentynineteen.jpg.webp)

Il vise donc à améliorer l’expérience d’écriture de contenu d’articles. Et ceci avec simplicité. Un utilisateur doit pouvoir s’en servir de manière intuitive et sans effort.

Bien entendu, pour les habitués de WordPress, le changement (comme tout changement) demandera quelques efforts d’adaptation.

Gutenberg est donc l’allié idéal de l’écriture d’articles, de contenus long, de cours (comme celui-ci), ou encore des pages simples, mais pas pour faire des mises en page complexes et designer son site.

C’est n’est pas son objectif, pour le moment du moins. Je pense qu’il évoluera (et WordPress aussi par ailleurs) afin de prendre de plus en plus d’importance dans le coeur du CMS.

J’imagine très bien une approche similaire pour le customizer de thème d’ici un avenir proche, et à terme une édition complètement front-end du contenu et du design.

## Gutenberg et le Full site Editing (FSE)

L’équipe du core de WordPress travaille sur le projet de full site editing, où l’éditeur prendra un rôle plus important encore dans le coeur de WordPress, et deviendra à terme un constructeur de page. Il absorbera les widgets, l’outil de personnalisation de site…

Il faut donc se dire que WordPress va encore beaucoup changer, et en profondeur, dans les quelques années à venir.

Javascript et React continueront alors d’augmenter leur emprise sur la base code.

> Vous pouvez tester une beta du Full Site Editing en téléchargeant l’extension Gutenberg dans le répertoire des extensions.

## Faire coexister les deux ? Comment tout cela va évoluer à l’avenir ?

Les créateurs des principaux Page Builders n’étaient pas sereins à l’annonce de Matt en décembre 2017, en voyant avec quelle vitesse Gutenberg allait arriver dans nos vies.

Mais après réflexion il n’y a aucun souci à se faire. Gutenberg ne remplacera pas les Pages Builders (du moins pas avant quelques temps).

Et rien ne vous empêchera d’utiliser les 2 en même temps, le page builder pour construire vos pages (par exemple la page d’accueil ou une page charnière de votre site) et conserver Gutenberg pour les pages plus simples et les articles.

Imaginez tous les sites qui demain, seront capables d’écrire de manière plus poussée sans effort : les mises en pages type medium seront alors à la portée de tous (et il était grand temps que cela soit possible).

Je pense surtout aux sites de la presse qui vont vraiment pouvoir sublimer leurs articles.

Selon moi Gutenberg va clairement aider WordPress à progresser encore plus, en apportant au grand public un outil agréable à utiliser au jour le jour.