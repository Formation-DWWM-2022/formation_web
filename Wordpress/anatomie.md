# Introduction : anatomie d’un thème

Avant de commencer, on va passer en revue les différentes zones et composants typiques d’un thème simple de type « blog ».

Tous les sites sont faits de la même manière, du moins pour les fondations. On va se les remettre en tête, car ça va nous aider à comprendre comment WordPress se base sur ces codes pour la conception de thèmes.

## Les zones typiques d’un site

En me basant sur la structure d’un thème de type « blog » classique, je peux le découper en 4 zones :

![](https://capitainewp.io/wp-content/uploads/2019/01/anatomie-site-1000x887.jpg.webp)

En général, on a :

- Le Header : l’en-tête, en haut, toujours la même selon la page ;
- Le Footer : le pied de page, en bas, également toujours le même sur chaque page ;
- Le Content : Le contenu principal, différent sur chaque page ;
- La Sidebar : Une éventuelle barre latérale contenant des informations transverses ;

WordPress respecte ce découpage et on créera un fichier de thème pour chacune de ces zones.

## Les composants typiques d’un site

Si je creuse un peu plus en détails, on y trouve des composants communs :

![](https://capitainewp.io/wp-content/uploads/2017/05/anatomie-site-details-1000x887.jpg.webp)

Le rôle de ces composants est de rendre le thème dynamique, et le site administrable. On retrouve :

- Les menus : un dans le header en général, et certains dans la sidebar ou le footer
- Les commentaires : à la suite d’un article (dans les pages articles seulement)
- Les widgets : dans les sidebars ou le footer pouvant afficher les derniers articles, les catégories, un contenu statique…
- La navigation : pour aller à l’article suivant ou précédent.

Dans la suite de la formation, on va apprendre à utiliser ces zones et composants mais pour le moment on va déjà mettre en place le strict minimum pour déclarer notre thème.

> Pour l’instant, ça ressemble à un blog, mais pas d’inquiétude, le but de cette formation c’est de savoir faire tout type de sites, même les plus complexes. Les outils pour faciliter cela arriveront un peu plus tard. Patience !

Dans le prochain cours, on va s’équiper de notre éditeur de code et créer les fondations de notre premier thème.