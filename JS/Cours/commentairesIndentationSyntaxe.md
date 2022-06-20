# Commentaires, indentation et syntaxe de base en JavaScript

Dans cette leçon, nous allons déjà discuter de quelques bonnes pratiques en programmation et notamment du fait de commenter et d’indenter son code.

## Les commentaires en JavaScript

Comme pour l’immense majorité des langages de programmation, on va également pouvoir commenter en JavaScript.

Les commentaires sont des lignes de texte (des indications) placées au milieu d’un script et servant à documenter le code, c’est-à-dire à expliquer ce que fait tel ou tel bout de script et éventuellement comment le manipuler.

Ces indications ne seront pas lues par le navigateur et seront donc invisibles pour les visiteurs (sauf s’ils affichent le code source de la page).

Commenter va donc servir aux développeurs à se repérer plus facilement dans un script, à le lire et à le comprendre plus vite. Cela peut être utile à la fois pour vous même si vous travaillez sur des projets complexes ou pour d’autres développeurs si vous êtes amené à distribuer votre code un jour ou l’autre.

En JavaScript, il existe deux types de commentaires qui vont s’écrire différemment : les commentaires mono-ligne et les commentaires multi-lignes.

Notez que la syntaxe des commentaires multi-lignes peut être utilisée pour écrire un commentaire mono-ligne. Vous pouvez donc vous contenter de n’utiliser que cette syntaxe.

Pour écrire un commentaire multilignes, il faudra entourer le texte de notre commentaire avec la syntaxe suivante /* */.

Pour écrire un commentaire monoligne, on utilisera un double slash // qui sera suivi du texte de notre commentaire (ou éventuellement la syntaxe multilignes).

Dans l’exemple ci-dessous, on crée trois commentaires dans notre fichier cours.js qui utilisent les deux syntaxes et couvrent tous les cas d’utilisation :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-commentaire-monoligne-multilignes-syntaxe.png)

## L’indentation en JavaScript

L’indentation correspond au fait de décaler certaines lignes de code par rapport à d’autres. Cela est généralement utilisé pour rendre son code plus lisible et donc plus simple à comprendre.

Pour savoir comment et quand indenter, il suffit de penser en termes de hiérarchie comme on le faisait déjà en HTML.

Une bonne pratique est d’effectuer un retrait vers la droite équivalent à une tabulation à chaque fois qu’on écrit une nouvelle ligne de code à l’intérieur d’une instruction JavaScript. Nous aurons l’occasion d’illustrer cela plus tard.

## Un premier point sur la syntaxe de base du JavaScript

Avant de véritablement apprendre à coder en JavaScript, j’aimerais discuter d’un point qui divise la communauté des développeurs JavaScript : l’usage du point-virgule.

En effet, sur le net, vous verrez certains tutoriels affirmer que « toute instruction en JavaScript doit être terminée explicitement avec un point-virgule » et d’autres auteurs dire que « les points virgules ne sont souvent pas nécessaires dans le code ».

Avant tout, vous devez savoir qu’un code JavaScript est composé d’instructions. On va avoir différents types d’instruction en JavaScript : la déclaration d’une variable ou d’une fonction, la création d’une boucle, d’une condition, etc. vont toutes être des instructions.

Le point-virgule est généralement utilisé en informatique pour indiquer la fin d’une instruction, c’est-à-dire pour séparer deux instructions l’une de l’autre et cela va également être le cas en JavaScript.

L’idée ici est que le langage JavaScript est très bien fait et ne nous oblige pas strictement à utiliser un point-virgule pour notifier la fin de chaque instruction. En effet, le JavaScript va être capable de « deviner » quand une instruction de termine et va ajouter automatiquement des points-virgules là où ça lui semble pertinent.

C’est la raison pour laquelle certains développeurs se passent tant que possible de ces points-virgules. Cependant, il y a une limite majeure à cela.

Celle-ci est que tout langage informatique repose sur un ensemble de règles. Ainsi, les points-virgules ne sont pas ajoutés automatiquement par le JavaScript au hasard mais selon un ensemble de règles précises.

Pour pouvoir se passer des points-virgules, il faut donc déjà bien connaitre le langage et les règles d’ajout automatique des points virgules pour créer un code avec une structure qui va pouvoir être interprétée correctement par la JavaScript.

Sans une connaissance parfaite du comportement du JavaScript et des règles d’ajout, on risque d’avoir des résultats inattendus voire un code non fonctionnel puisqu’il est possible que le JavaScript ajoute des points-virgules là où on ne s’y attend pas.

Pour cette raison, nous ajouterons explicitement des points-virgules à la fin de (presque) toutes les instructions dans ce cours. 