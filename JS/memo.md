```js
console.log('Hi there!');
// Prints: Hi there!
```
La méthode console.log() est utilisée pour enregistrer ou imprimer des messages sur la console. Elle peut également être utilisée pour imprimer des objets et d’autres informations.

## JavaScript
JavaScript est un langage de programmation qui alimente le comportement dynamique sur la plupart des sites Web. Avec HTML et CSS, c’est une technologie de base qui fait fonctionner le web.

## Méthodes
```js
// Retourne un nombre compris entre 0 et 1
Math.random();
```
Les méthodes renvoient des informations sur un objet, et sont appelées en ajoutant une instance avec un point . , le nom de la méthode et des parenthèses.

## Bibliothèques [Libraries]
```js
Math.random();
// ☝️ Math est la bibliothèque
```
Les bibliothèques contiennent des méthodes qui peuvent être appelées en ajoutant le nom de la bibliothèque avec un point . , le nom de la méthode et un ensemble de parenthèses.

## Chiffres [Numbers]
```js
let amount = 6;
let price = 4.99;
```
Les nombres sont un type de données primitif. Ils incluent l’ensemble des nombres entiers et flottants.

## String .length
```js
let message = 'good nite';
console.log(message.length);
// Prints: 9
 
console.log('howdy'.length);
// Prints: 5
```
La propriété . length d’une chaîne renvoie le nombre de caractères qui composent la chaîne.

## Instances de données [Data Instances]
Lorsqu’une nouvelle donnée est introduite dans un programme JavaScript, le programme en garde la trace dans une instance de ce type de données. Une instance est un cas individuel d’un type de données.

## Booléens
```js
let lateToWork = true;
```
Les booléens sont un type de données primitif. Ils peuvent être vrais ou faux.

## Math.random()
```js
console.log(Math.random());
// Impressions : 0 - 0,9
```
La fonction Math.random() renvoie un nombre aléatoire à virgule flottante dans la plage de 0 (inclusivement) à 1, mais pas inclus.

## Math.floor()
```js
console.log(Math.floor(5.95)); 
// Prints: 5
```
La fonction Math.floor() renvoie le plus grand nombre entier inférieur ou égal au nombre donné.

## Commentaires sur une seule ligne
// Cette ligne indiquera un commentaire
En JavaScript, les commentaires d’une seule ligne sont créés avec deux slashes avant //.

## Null
```js
let x = null;
```
Null est un type de données primitif. Il représente l’absence intentionnelle de valeur. En code, il est représenté comme null.

## Strings
```js
let single = 'Wheres my bandit hat?';
let double = "Wheres my bandit hat?";
```
Les chaînes de caractères sont un type de données primitif. Il s’agit de tout regroupement de caractères (lettres, espaces, chiffres ou symboles) entouré de guillemets simples ' ou de guillemets doubles ".

## Opérateurs arithmétiques
```js
/ Ajout
5 + 5
// Soustraction
10 à 5
/ Multiplication
5 * 10
/ Division
10 / 5
// Modulo
10 % 5
```
JavaScript prend en charge les opérateurs arithmétiques pour :

    + addition
    - soustraction
    * multiplication
    / division
    % modulo

## Commentaires sur plusieurs lignes
```js
/*   
La configuration ci-dessous doit être 
changé avant le déploiement. 
*/
 
let baseUrl = 'localhost/taxwebapp/country';
```
En JavaScript, les commentaires multi-lignes sont créés en entourant les lignes avec /* au début et */ à la fin. Les commentaires sont de bons moyens pour diverses raisons, comme expliquer un bloc de code ou donner des indices, etc.

## Reste / Opérateur Modulo
```js
// calcule le nombre de semaines dans une année, arrondit au nombre entier le plus proche
const weeksInYear = Math.floor(365/7);
 
// calcule le nombre de jours restant après 365 est divisé par 7
const daysLeftOver = 365 % 7 ;
 
console.log("A year has " + weeksInYear + " weeks and " + daysLeftOver + " days");
```
L’opérateur restant, parfois appelé modulo, renvoie le nombre qui reste après que le nombre de droite se divise en nombre de gauche autant de fois qu’il peut uniformément.

## Opérateurs d’affectation
```js
let number = 100;
 
// Les deux relevés ajouteront 10
nombre = nombre + 10;
nombre += 10;
 
console.log(numéro); 
// Impressions : 120
```
Un opérateur d’assignation assigne une valeur à son opérande gauche en fonction de la valeur de son opérande droit. En voici quelques-unes :

    += ajout de tâches
    -= affectation de soustraction
    *= attribution de multiplication
    /= attribution de la division

## Interpolation de chaînes
```js
let age = 7;
 
// Concaténation de chaînes
'Tommy a ' + age + ' ans. ';
 
// Interpolation de chaîne
`Tommy a ${age} ans.`;
```
L’interpolation de chaînes est le processus d’évaluation des littératures de chaînes contenant un ou plusieurs espaces réservés (expressions, variables, etc.).

Il peut être réalisé en utilisant des modèles littéraux : text ${expression} text.

## Variables
```js
const currency = '$';
let userIncome = 85000; 

console.log(currency + userIncome + ' est supérieur au revenu moyen.');
// Impressions : 85000 $ est plus que le revenu moyen.
```
Les variables sont utilisées chaque fois qu’il est nécessaire de stocker une donnée. Une variable contient des données qui peuvent être utilisées dans le programme ailleurs. L’utilisation de variables assure également la réutilisation du code puisqu’il peut être utilisé pour remplacer la même valeur à plusieurs endroits.

```js
// exemples de variables
let name = "Tammy";
const found = false;
var age = 3;
console.log(nom, found, age);
// Tammy, false, 3
```
Une variable est un conteneur de données qui est stocké dans la mémoire de l’ordinateur. Il est référencé par un nom descriptif qu’un programmeur peut appeler pour assigner une valeur spécifique et la récupérer.

```js
var age;
let weight;
const numberOfFingers = 20;
```
Pour déclarer une variable en JavaScript, n’importe lequel de ces trois mots-clés peut être utilisé avec un nom de variable:

- var est utilisé dans les versions antérieures à ES6 de JavaScript.
- let est la manière préférée de déclarer une variable lorsqu’elle peut être réaffectée.
- const est la méthode préférée pour déclarer une variable avec une valeur constante.

## Indéfini [Undefined]
```js
var a;
 
console.log(a); 
// Imprime : undefined
```
undefined est une valeur JavaScript primitive qui représente l’absence de valeur définie. Les variables déclarées mais non initialisées à une valeur auront la valeur indéfinie.

## Modèles de documents
```js
let name = "Codecademy";
console.log(`Hello, ${name}`) ; 
// Impressions : Bonjour, Codecademy
 
console.log(`Billy a ${6+8} ans.`); 
// Impressions : Billy a 14 ans.
```
Les modèles littéraux sont des chaînes qui autorisent les expressions incorporées, ${expression}. Alors que les chaînes régulières utilisent des guillemets simples ' ou doubles ", les modèles littéraux utilisent des backticks à la place.

## let Mot-clé
```js
let count; 
console.log(count); // Impressions : undefined
count = 10;
console.log(count); // Impressions : 10
```
let crée une variable locale en JavaScript et peut être réaffectée. L’initialisation lors de la déclaration d’une variable let est optionnelle. Une variable let contiendra indéfini si rien ne lui est assigné.

## const Mot-clé
```js
const numberOfColumns = 4;
numberOfColumns = 8;
// TypeError : Affectation à une variable constante.
```
Une variable constante peut être déclarée en utilisant le mot-clé const. Elle doit avoir une affectation. Toute tentative de réattribution d’une variable const entraînera une erreur d’exécution JavaScript.

## Concaténation de chaînes
```js
let service = 'carte de crédit';
let month = '30 mai'; 
let displayText = 'Your ' + service  + ' bill is due on ' +  month + '.';
 
console.log(displayText);
// Imprime : Votre facture de carte de crédit est due le 30 mai.
```
En JavaScript, plusieurs chaînes peuvent être concaténées ensemble en utilisant l’opérateur + . Dans l’exemple, plusieurs chaînes et variables contenant des valeurs de chaînes ont été concaténées. Après l’exécution du bloc de code, la variable displayText contiendra la chaîne concaténée.







