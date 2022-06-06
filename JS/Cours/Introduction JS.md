https://apprendre-html.3wa.fr/javascript/intro-javascript
http://adrienjoly.com/cours-javascript/

# Introduction à JavaScript
## Qu’est-ce que JavaScript ?

L’année dernière, des millions d’apprenants ont commencé avec JavaScript. Pourquoi ? JavaScript est principalement connu comme le langage de la plupart des navigateurs Web modernes, et ses premières bizarreries lui a donné un peu d’une mauvaise réputation. Toutefois, le langage a continué d’évoluer et de s’améliorer. JavaScript est un langage de programmation puissant, flexible et rapide maintenant utilisé pour un développement web de plus en plus complexe et au-delà !

Puisque JavaScript reste au cœur du développement web, c’est souvent la première langue apprise par les codeurs autodidactes désireux d’apprendre et de construire. Nous sommes ravis de ce que vous pourrez créer avec la fondation JavaScript que vous gagnez ici. JavaScript alimente le comportement dynamique sur la plupart des sites Web, y compris celui-ci.

Dans cette leçon, vous apprendrez des concepts de codage d’introduction, y compris les types de données et les objets intégrés, des connaissances essentielles pour tous les développeurs en herbe. Assurez-vous de prendre des notes. Cette base vous permettra de comprendre les concepts plus complexes que vous rencontrerez plus tard.

## Console

La console est un panneau qui affiche des messages importants, comme des erreurs, pour les développeurs. Une grande partie du travail que l’ordinateur fait avec notre code est invisible pour nous par défaut. Si nous voulons voir des choses apparaître sur notre écran, nous pouvons imprimer, ou enregistrer, sur notre console directement.

En JavaScript, le mot-clé console fait référence à un objet, un ensemble de données et d’actions, que nous pouvons utiliser dans notre code. Les mots-clés sont des mots qui sont intégrés dans le langage JavaScript, de sorte que l’ordinateur les reconnaît et les traite spécialement.

Une action, ou méthode, qui est intégrée dans l’objet console est la méthode .log(). Lorsque nous écrivons console.log() ce que nous mettons entre parenthèses sera imprimé, ou enregistré, sur la console.

Il nous sera très utile d’imprimer des valeurs sur la console, pour que nous puissions voir le travail que nous faisons.

```js
console.log(5); 
```

Cet exemple enregistre 5 sur la console. Le point-virgule indique la fin de la ligne ou de l’instruction. Bien qu’en JavaScript votre code fonctionne généralement comme prévu sans point-virgule, nous vous recommandons d’apprendre l’habitude de terminer chaque instruction avec un point-virgule afin que vous ne laissez jamais un dehors dans les rares cas où ils sont nécessaires.

Vous verrez plus loin que nous pouvons utiliser console.log() pour imprimer différents types de données.

## Commentaires

La programmation est souvent très collaborative. De plus, notre propre code peut rapidement devenir difficile à comprendre lorsque nous y revenons, parfois seulement une heure plus tard! Pour ces raisons, il est souvent utile de laisser des notes dans notre code pour d’autres développeurs ou nous-mêmes.

Comme nous écrivons JavaScript, nous pouvons écrire des commentaires dans notre code que l’ordinateur ignorera que notre programme s’exécute. Ces commentaires n’existent que pour les lecteurs humains.

Les commentaires peuvent expliquer ce que fait le code, laisser des instructions aux développeurs qui l’utilisent ou ajouter toute autre annotation utile.

Il existe deux types de commentaires de code en JavaScript :

1. Un commentaire d’une seule ligne commente une seule ligne et est indiqué par deux barres obliques avant // qui la précèdent.
```js
// Imprime 5 sur la console
console.log(5);
```
Vous pouvez également utiliser une seule ligne de commentaire après une ligne de code:
```js
console.log(5);  // Imprime 5 
```
2. Un commentaire à plusieurs lignes commente plusieurs lignes et est indiqué par /* pour commencer le commentaire, et */ pour terminer le commentaire.
```js
/*
Tout cela est commenté 
console.log(10);
Rien de tout ça ne va s’enfuir !
console.log(99);
*/
```
Vous pouvez également utiliser cette syntaxe pour commenter quelque chose au milieu d’une ligne de code :
```js
console.log(/*IGNORED!*/ 5);  // Imprime encore 5 
```