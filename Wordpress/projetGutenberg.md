# Présentation du projet Gutenberg

Dans ce cours nous allons découvrir Gutenberg et surtout comprendre d’où vient le besoin pour WordPress de s’équiper d’un nouvel éditeur.

## Qu’est-ce que Gutenberg ?

Gutenberg est le nouvel éditeur visuel de WordPress, et remplace TinyMCE lors de l’édition de contenus (articles, pages…) dans l’interface d’administration.

TinyMCE, est présent depuis les débuts du CMS et n’a presque pas évolué en 15 ans de bons et loyaux services.

Le projet Gutenberg est arrivé dans le coeur de WordPress dans la version 5.0 fin 2018 après plusieurs années de développement intensif.

La grosse nouveauté c’est que vous voyez en temps réel de ce que vous écrivez (pour de vrai cette fois) ainsi que la possibilité de créer des mises en page plus poussées grâce aux blocs.

Voici une petite vidéo qui montre Gutenberg en action :

![](https://youtu.be/wxmza8girkI)

Cette approche par blocs permet de distinguer différents types de contenus : des titres, des textes, des images, des citations, des séparateurs…

A chaque nouvelle ligne vous pouvez simplement écrire un paragraphe ou le transformer en autre chose grâce au bouton + situé à gauche.

![](https://capitainewp.io/wp-content/uploads/2018/02/ajouter-bloc-gutenberg-600x618.jpg)

Vous pouvez d’ailleurs déplacer et réorganiser facilement vos blocs dans la page.

Le but est de supprimer à terme l’utilisation des shortcodes (codes courts) qui sont tout sauf intuitifs pour un utilisateur standard.

Les deux principaux objectifs de Gutenberg sont :

1. d’apporter une richesse visuelle des contenus grâce à des blocs de mise en page
2. et une meilleure expérience utilisateur (UX) pour le rédacteur, plus fluide et plus légère.

Comparons les deux : tout d’abord TinyMCE :

![](https://capitainewp.io/wp-content/uploads/2018/02/tiny-mce.jpg)

Et maintenant Gutenberg :

![](https://capitainewp.io/wp-content/uploads/2018/02/gutenberg.jpg)

L’interface est épurée, l’écriture plus fluide.

Gutenberg permet également une interface d’administration plus rapide : les enregistrements et la publication ne nécessitent plus de recharger la page et font donc gagner beaucoup de temps.

Bien entendu, il faudra à chacun un petit temps d’adaption, mais le jeu en vaut largement la chandelle : après quelques mois d’utilisation j’avoue que je pourrais difficilement faire marche arrière, tant l’expérience d’écriture est plaisante et rafraichissante.

Le plus beau dans tout ça ? C’est que Gutenberg est bien ancré dans le coeur de WordPress : les développeurs pourront très facilement créer leur propres blocs et proposer à leur client une expérience d’écriture enrichie.

Et c’est d’ailleurs le but de cette formation.

## Un peu d’histoire

L’idée d’un nouvel éditeur visuel plus performant a été abordée par Matt Mullenweg, le créateur de WordPress, pendant le WordCamp US 2016 lors de la conférence « State of the Word ».

C’est la conférence annuelle tenue par Matt, pendant laquelle il annonce les nouveautés à venir ainsi que les directions que prendra le CMS.

Le nom de code « Gutenberg » est entendu pour la première fois au WordCamp Europe 2017, qui s’est déroulé à Paris. Le développement avançait bien et on a eu droit à une première démonstration.

Aux alentours d’octobre une version beta, sous forme d’extension, est présentée au grand public.

Je dois avouer que je n’ai pas été tout de suite conquis par Gutenberg. Je lui ai tout de même redonné sa chance quelques semaines plus tard et j’ai enfin vu son potentiel.

J’ai tout d’abord réalisé que Gutenberg n’est PAS un page builder, mais un éditeur visuel de contenu (le prochain cours est d’ailleurs dédié à ce sujet).

Pour simplifier on pourrait le comparer à l’éditeur de Medium.com.

J’ai été réellement été impressionné quand j’ai commencé à regarder sous le capot, et que j’ai vu à quel point Gutenberg pouvait d’être étendu, comme le reste de WordPress.

Il offre aux développeurs la possibilité de créer leurs propres blocs sur mesure qui bénéficient de l’aperçu en temps réel.

C’est un travail titanesque qui a été réalisé par les core développeurs de WordPress et les différents contributeurs. À partir de là je n’ai plus eu aucun doute que Gutenberg allait révolutionner l’écriture de contenu.

En fin d’année, au WordCamp US 2017, Matt annonce que le projet a bien progressé et sera intégré dans le coeur courant 2018, probablement pour la version 5.0 du CMS. <https://wordpress.tv/2017/12/04/matt-mullenweg-state-of-the-word-2017/>

Habituellement les versions se succèdent, après la 4.8 vient la 4.9, puis la 5.0, mais ce n’est pas le signe d’une version plus majeure que les autres.

Mais cette fois-ci, la version 5 tombe pile pour Gutenberg et pourrait signer le début d’une révolution pour WordPress.

## Pourquoi Gutenberg est nécessaire ?

Il y a plusieurs facteurs qui font que Gutenberg est un projet nécessaire pour le futur de WordPress.

Entre un éditeur vieillissant, l’avènement des pages builders et des concurrents qui jouent la carte de la modernité, WordPress se devait de réagir.

    Tiny MCE et les shortcodes sur la touche

Comme on l’a vu,  Gutenberg a pour but de moderniser l’écriture de contenu. L’éditeur précédent, TinyMCE, un projet Open Source indépendant, a équipé WordPress depuis plus de 15 ans. Et croyez-moi qu’il était grand temps de changer.

La raison principale est la limitation de Tiny MCE, qui se dit être un éditeur visuel WYSIWYG (What you see is what you get) mais qui en réalité est loin de tenir ses promesses.

Pour le rendre plus dynamique, et n’étant pas réellement extensible, WordPress a mis au point les shortcodes (ou codes courts), qui se présentent sous la forme suivante :

[form id="1"]

Ce code, inséré dans le contenu, sera interprété par WordPress lors du rendu et affichera le formulaire portant l’identifiant 1. Ca fonctionne, mais ce n’est ce n’est pas ce que j’appelle du WYSIWYG.

    L’avènement des Page Builders

Avec l’explosion des thèmes premium ces dernières années, les seuls outils proposés nativement par WordPress ne pouvaient plus suffire.

C’est alors que sont apparus les Page Builders, des constructeurs de page, plus ou moins visuels, qui permettent beaucoup  plus de possibilités et devenus aujourd’hui quasiment incontournables.

Le Divi builder (inclus dans le thème le plus vendu au monde, Divi), dans ses premières version, permettait une mise en page complexe avec des sections, colonnes et blocs, mais n’offrait pas un aperçu temps réel.

![](https://capitainewp.io/wp-content/uploads/2018/02/divi-builder.jpg)

Elementor, plus récent, permet dès le début de composer sa mise en page en temps réel. C’est pratique et surtout très ergonomique !

![](https://capitainewp.io/wp-content/uploads/2018/02/elementor-page-builder.jpg)

Les développeurs quant-à-eux préfèrent en général l’approche des champs personnalisés, notamment avec l’extension Advanced Custom Fields. <https://wordpress.org/plugins/advanced-custom-fields/>

Cette  extension permet de donner des possibilités au rédacteur, sans lui donner trop de responsabilités pour autant. C’est donc moins risqué qu’un page builder et ses milliers d’options.

Gutenberg aborde les avantages de chaque solution : le temps réel des pages builder mais une limitation des possibilités de design pour donner une expérience fluide et simple de la rédaction de contenu.

Ce qu’il faut donc retenir ici c’est que, depuis déjà bien des années, la limitation des possibilités de TinyMCE était problématique.

Et même si des solutions tierces sont apparues comme les page builders, chacun d’entre eux apporte sa propre logique et l’expérience peut grandement varier d’un thème à un autre.

On retrouve alors une communauté divisée, ce qui n’est pas la meilleure chose sur le long terme.

WordPress devait donc innover et proposer une approche plus centrale, intégrée au coeur.

    WordPress face aux concurrents

En parallèle, bon nombre de solutions de CMS (open source ou hébergés) ont vu le jour. Chacun proposant sa propre vision de ce que devait être une plateforme d’édition de contenu.

Les technologies ayant évolué depuis la création de WordPress, ces concurrents ont pu développer sur des bases plus modernes.

C’est notamment le cas de Wix, qui est aujourd’hui l’un des plus gros concurrents de WordPress.

Il propose un éditeur de site en temps réel. Et il n’a pas hésité à mettre cette fonctionnalité en avant pour convaincre ses utilisateurs que c’était plus sexy et mieux que WordPress.

![](https://capitainewp.io/wp-content/uploads/2018/02/wix-editor.jpg)

Du coup notre CMS préféré n’avait plus le choix : le chantier du nouvel éditeur devait démarrer au plus vite afin que le CMS rattrape son retard en la matière.

## Concernant la rétrocompatibilité

Alors bien évidemment, même si le travail de compatibilité a été énorme (un aspect cher aux développeurs de WordPress), un tel changement risque de ne pas passer sans créer quelques soucis.

Et Il y aura forcément des râleurs qui sauteront sur l’occasion pour dire que c’était très bien avant. Mais le web est en constante évolution et il est nécessaire de s’adapter de temps à autres.

Le changement de version majeure de WordPress n’a jamais été un souci, contrairement à Drupal. Chaque nouvelle version de Drupal est complètement différente et donc par définition incompatible avec la version précédente.

Ce n’est pas un mauvais choix en soi, cela permet à Drupal de s’adapter plus facilement aux nouvelles techniques de programmation, évolutions des langages et avancées technologiques.

Par contre les utilisateurs ne peuvent pas facilement mettre à jour leur site sans prévoir une refonte.

Pour WordPress c’est le choix de la rétrocompatibilité qui a été fait : peu importe la mise à jour, elle doit très bien se passer sans poser de souci.

Cependant cette fois la mise à jour risque d’être moins fluide. Je vous conseille donc de bien faire des sauvegardes en amont et de tester préalablement vos sites en local.

Il est impossible d’apporter un tel changement sans quelques couacs, malgré le fait que les développeurs ont tout de même bien travaillé sur l’intégration et le passage d’un éditeur à l’autre.

D’ailleurs il y a toujours de nombreuses issues ouvertes sur le projet Github de Gutenberg, dont parfois plus de 2000. Mais c’est normal : tout projet a son lot d’issues, et n’est jamais réellement terminé (VSC a parfois jusqu’à 3000 issues ouvertes en même temps.

![](https://capitainewp.io/wp-content/uploads/2019/01/github-gutenberg-issues.jpg.webp)

Dans le prochain cours nous allons bien faire la part des choses entre le rôle des pages builders et celui de Gutenberg, qui n’ont pas été conçus pour la même utilisation.
