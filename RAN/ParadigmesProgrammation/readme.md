# Paradigmes de programmation - Exemples de paradigmes pour les débutants

Nous allons jeter un œil aux paradigmes de programmation, un titre fantaisiste pour décrire les manières ou les styles populaires d'organiser votre programmation.

Je vais essayer de le décomposer en morceaux et de donner une explication simple de chaque paradigme. De cette façon, vous pouvez comprendre de quoi les gens parlent quand ils disent "orienté objet", "fonctionnel" ou "déclaratif".

Ce sera une introduction théorique superficielle et brève plus qu'autre chose, même si nous allons également voir des exemples de pseudo-code et de code.

## Sommaire

- Qu'est-ce qu'un paradigme de programmation
- Ce qu'un paradigme de programmation n'est pas
- Pourquoi devrais-je m'en soucier?
- Paradigmes de programmation populaires
  - Programmation impérative
  - Programmation procédurale
  - Programmation fonctionnelle
  - Programmation déclarative
  - Programmation orientée objet
- Tour d'horizon

# Qu'est-ce qu'un paradigme de programmation ?

Les paradigmes de programmation sont différentes manières ou styles dans lesquels un programme ou un langage de programmation donné peut être organisé. Chaque paradigme consiste en certaines structures, caractéristiques et opinions sur la manière dont les problèmes de programmation courants doivent être résolus.

La question de savoir pourquoi existe-t-il de nombreux paradigmes de programmation différents est similaire à pourquoi existe-t-il de nombreux langages de programmation. Certains paradigmes sont mieux adaptés à certains types de problèmes, il est donc logique d'utiliser différents paradigmes pour différents types de projets.

De plus, les pratiques qui composent chaque paradigme se sont développées au fil du temps. Grâce aux progrès des logiciels et du matériel, différentes approches sont apparues qui n'existaient pas auparavant.

Et enfin, je pense, il y a la créativité humaine. En tant qu'espèce, nous aimons simplement créer des choses, améliorer ce que d'autres ont construit dans le passé et adapter les outils à nos préférences ou à ce qui nous semble le plus efficace.

Tout cela se traduit par le fait qu'aujourd'hui, nous avons le choix entre de nombreuses options lorsque nous voulons écrire et structurer un programme donné. 🥸

# Ce qu'un paradigme de programmation n'est pas

Les paradigmes de programmation ne sont pas des langages ou des outils. Vous ne pouvez rien "construire" avec un paradigme. Ils ressemblent davantage à un ensemble d'idéaux et de lignes directrices sur lesquels de nombreuses personnes se sont mises d'accord, ont suivi et développé.

Les langages de programmation ne sont pas toujours liés à un paradigme spécifique. Il existe des langages qui ont été construits avec un certain paradigme à l'esprit et qui ont des fonctionnalités qui facilitent ce type de programmation plus que d'autres ( Haskel et la programmation fonctionnelle en sont un bon exemple).

Mais il existe aussi des langages "multi-paradigmes", c'est-à-dire que vous pouvez adapter votre code à tel ou tel paradigme (JavaScript et Python en sont de bons exemples).

Dans le même temps, les paradigmes de programmation ne sont pas mutuellement exclusifs, dans le sens où vous pouvez utiliser des pratiques de différents paradigmes en même temps sans aucun problème.

# Pourquoi devrais-je m'en soucier?

![](https://www.freecodecamp.org/news/content/images/2022/04/whatever-yeah-1.gif)

Réponse courte : connaissances générales.

Réponse longue : je trouve intéressant de comprendre les nombreuses façons de programmer. Explorer ces sujets est un bon moyen d'ouvrir votre esprit et de vous aider à sortir des sentiers battus et des outils que vous connaissez déjà.

De plus, ces termes sont beaucoup utilisés dans le monde du codage, donc avoir une compréhension de base vous aidera également à mieux comprendre d'autres sujets.

# Paradigmes de programmation populaires

Maintenant que nous avons présenté ce que sont et ne sont pas les paradigmes de programmation, passons en revue les plus populaires, expliquons leurs principales caractéristiques et comparons-les.

Gardez à l'esprit que cette liste n'est pas exhaustive. Il existe d'autres paradigmes de programmation qui ne sont pas couverts ici, bien que je couvrirai les plus populaires et les plus largement utilisés.

## Programmation impérative

La programmation impérative consiste en des ensembles d'instructions détaillées qui sont données à l'ordinateur pour s'exécuter dans un ordre donné. C'est ce qu'on appelle "impératif" parce qu'en tant que programmeurs, nous dictons exactement ce que l'ordinateur doit faire, d'une manière très spécifique.

La programmation impérative se concentre sur la description du fonctionnement d'un programme, étape par étape.

Dites que vous voulez faire un gâteau. Votre programme impératif pour ce faire pourrait ressembler à ceci (je ne suis pas un grand cuisinier, alors ne me jugez pas 😒) :

```
1- Pour flour in a bowl
2- Pour a couple eggs in the same bowl
3- Pour some milk in the same bowl
4- Mix the ingredients
5- Pour the mix in a mold
6- Cook for 35 minutes
7- Let chill
```

En utilisant un exemple de code réel, disons que nous voulons filtrer un tableau de nombres pour ne conserver que les éléments supérieurs à 5. Notre code impératif pourrait ressembler à ceci :

```js
const nums = [1,4,3,6,7,8,9,2]
const result = []

for (let i = 0; i < nums.length; i++) {
    if (nums[i] > 5) result.push(nums[i])
}

console.log(result) // Output: [ 6, 7, 8, 9 ]
```

Voyez que nous disons au programme de parcourir chaque élément du tableau, de comparer la valeur de l'élément avec 5, et si l'élément est supérieur à 5, de le pousser dans un tableau.

Nous sommes détaillés et précis dans nos instructions, et c'est ce que représente la programmation impérative.

## Programmation procédurale

La programmation procédurale est une dérivation de la programmation impérative, en lui ajoutant la fonctionnalité de fonctions (également appelées "procédures" ou "sous-routines").

Dans la programmation procédurale, l'utilisateur est encouragé à subdiviser l'exécution du programme en fonctions, comme un moyen d'améliorer la modularité et l'organisation.

En suivant notre exemple de gâteau, la programmation procédurale peut ressembler à ceci :

```js
function pourIngredients() {
    - Pour flour in a bowl
    - Pour a couple eggs in the same bowl
    - Pour some milk in the same bowl
}

function mixAndTransferToMold() {
    - Mix the ingredients
    - Pour the mix in a mold
}

function cookAndLetChill() {
    - Cook for 35 minutes
    - Let chill
}

pourIngredients()
mixAndTransferToMold()
cookAndLetChill()
```

Vous pouvez voir que, grâce à l'implémentation des fonctions, nous pourrions simplement lire les trois appels de fonction à la fin du fichier et avoir une bonne idée de ce que fait notre programme.

Cette simplification et cette abstraction sont l'un des avantages de la programmation procédurale. Mais dans les fonctions, nous avons toujours le même vieux code impératif.

## Programmation fonctionnelle

La programmation fonctionnelle pousse le concept de fonctions un peu plus loin.

Dans la programmation fonctionnelle, les fonctions sont traitées comme des citoyens de première classe , ce qui signifie qu'elles peuvent être affectées à des variables, transmises en tant qu'arguments et renvoyées par d'autres fonctions.

Un autre concept clé est l'idée de fonctions pures . Une fonction pure est une fonction qui s'appuie uniquement sur ses entrées pour générer son résultat. Et étant donné la même entrée, il produira toujours le même résultat. De plus, il ne produit aucun effet secondaire (tout changement en dehors de l'environnement de la fonction).

Avec ces concepts à l'esprit, la programmation fonctionnelle encourage les programmes écrits principalement avec des fonctions (surprise 😲). Il défend également l'idée que la modularité du code et l'absence d'effets secondaires facilitent l'identification et la séparation des responsabilités au sein de la base de code. Cela améliore donc la maintenabilité du code.

En revenant à l'exemple de filtrage de tableau, nous pouvons voir qu'avec le paradigme impératif, nous pourrions utiliser une variable externe pour stocker le résultat de la fonction, ce qui peut être considéré comme un effet secondaire.

```js
const nums = [1,4,3,6,7,8,9,2]
const result = [] // External variable

for (let i = 0; i < nums.length; i++) {
    if (nums[i] > 5) result.push(nums[i])
}

console.log(result) // Output: [ 6, 7, 8, 9 ]
```

Pour transformer cela en programmation fonctionnelle, nous pourrions le faire comme ceci :

```js
const nums = [1,4,3,6,7,8,9,2]

function filterNums() {
    const result = [] // Internal variable

    for (let i = 0; i < nums.length; i++) {
        if (nums[i] > 5) result.push(nums[i])
    }

    return result
}

console.log(filterNums()) // Output: [ 6, 7, 8, 9 ]
```

C'est presque le même code, mais nous encapsulons notre itération dans une fonction, dans laquelle nous stockons également le tableau de résultats. De cette façon, nous pouvons nous assurer que la fonction ne modifie rien en dehors de sa portée. Il crée uniquement une variable pour traiter ses propres informations, et une fois l'exécution terminée, la variable disparaît également.

## Programmation déclarative

La programmation déclarative consiste à cacher la complexité et à rapprocher les langages de programmation du langage et de la pensée humains. C'est l'opposé direct de la programmation impérative dans le sens où le programmeur ne donne pas d'instructions sur la manière dont l'ordinateur doit exécuter la tâche, mais plutôt sur le résultat recherché.

Ce sera beaucoup plus clair avec un exemple. Suivant la même histoire de filtrage de tableau, une approche déclarative pourrait être :

```js
const nums = [1,4,3,6,7,8,9,2]

console.log(nums.filter(num => num > 5)) // Output: [ 6, 7, 8, 9 ]
```

Voyez qu'avec la fonction de filtre, nous ne disons pas explicitement à l'ordinateur d'itérer sur le tableau ou de stocker les valeurs dans un tableau séparé. On dit juste ce qu'on veut ("filter") et la condition à remplir ("num > 5").

Ce qui est bien, c'est qu'il est plus facile à lire et à comprendre, et souvent plus court à écrire. filterLes fonctions , mapet reducede JavaScript sortsont de bons exemples de code déclaratif.

Un autre bon exemple sont les frameworks/bibliothèques JS modernes comme React. Prenez ce code par exemple :

```js
<button onClick={() => console.log('You clicked me!')}>Click me</button>
```

Ici, nous avons un élément de bouton, avec un écouteur d'événement qui déclenche une fonction console.log lorsque le bouton est cliqué.

La syntaxe JSX (ce que React utilise) mélange HTML et JS dans la même chose, ce qui facilite et accélère l'écriture d'applications. Mais ce n'est pas ce que les navigateurs lisent et exécutent. Le code React est ensuite transpilé en HTML et JS normaux, et c'est ce que les navigateurs exécutent en réalité.

JSX est déclaratif, dans le sens où son but est de donner aux développeurs une interface plus conviviale et plus efficace avec laquelle travailler.

Une chose importante à noter à propos de la programmation déclarative est que sous le capot, l'ordinateur traite de toute façon cette information comme un code impératif.

En suivant l'exemple du tableau, l'ordinateur parcourt toujours le tableau comme dans une boucle for, mais en tant que programmeurs, nous n'avons pas besoin de coder cela directement. Ce que fait la programmation déclarative, c'est de cacher cette complexité à la vue directe du programmeur.

Voici une belle [comparaison entre la programmation impérative et déclarative](https://youtu.be/E7Fbf7R3x6I).

## Programmation orientée objet

L'un des paradigmes de programmation les plus populaires est la programmation orientée objet (POO).

Le concept de base de la POO est de séparer les préoccupations en entités qui sont codées comme des objets. Chaque entité regroupera un ensemble donné d'informations (propriétés) et d'actions (méthodes) pouvant être effectuées par l'entité.

La POO fait un usage intensif des classes (qui sont un moyen de créer de nouveaux objets à partir d'un plan ou d'un passe-partout défini par le programmeur). Les objets créés à partir d'une classe sont appelés instances.

En suivant notre exemple de cuisine en pseudo-code, disons maintenant que dans notre boulangerie, nous avons un cuisinier principal (appelé Frank) et un assistant cuisinier (appelé Anthony) et chacun d'eux aura certaines responsabilités dans le processus de cuisson. Si nous utilisions la POO, notre programme pourrait ressembler à ceci.

```js
// Create the two classes corresponding to each entity
class Cook {
 constructor constructor (name) {
        this.name = name
    }

    mixAndBake() {
        - Mix the ingredients
     - Pour the mix in a mold
        - Cook for 35 minutes
    }
}

class AssistantCook {
    constructor (name) {
        this.name = name
    }

    pourIngredients() {
        - Pour flour in a bowl
        - Pour a couple eggs in the same bowl
        - Pour some milk in the same bowl
    }
    
    chillTheCake() {
     - Let chill
    }
}

// Instantiate an object from each class
const Frank = new Cook('Frank')
const Anthony = new AssistantCook('Anthony')

// Call the corresponding methods from each instance
Anthony.pourIngredients()
Frank.mixAndBake()
Anthony.chillTheCake()
```

Ce qui est bien avec la POO, c'est qu'elle facilite la compréhension d'un programme, par la séparation claire des préoccupations et des responsabilités.

Dans cet exemple, je viens de gratter la surface des nombreuses fonctionnalités de la POO. Si vous souhaitez en savoir plus, voici deux excellentes tutoriels expliquant les bases de la POO :

- [POO vidéo en anglais](https://www.youtube.com/watch?v=pTB0EiLXUC8)
- [POO cours](./POO.md)

Et voici une belle [comparaison entre la programmation impérative, fonctionnelle et orientée objet](https://youtu.be/08CWw_VD45w).

# Tour d'horizon

Comme nous l'avons vu, les paradigmes de programmation sont différentes manières de faire face aux problèmes de programmation et d'organiser notre code.

Les paradigmes impératifs, procéduraux, fonctionnels, déclaratifs et orientés objet sont parmi les paradigmes les plus populaires et les plus largement utilisés aujourd'hui. Et connaître les bases à leur sujet est bon pour les connaissances générales et aussi pour mieux comprendre d'autres sujets du monde du codage.

Bravo et à la prochaine ! =D
