```
- npm install --global typescript@latest
- tsc --version ==> connaitre version TypeScript 
- tsc --init
- tsc --watch
```

# Comment utiliser TypeScript ?

[L'instant Code : Les bases de Typescript](https://youtu.be/Tsu7TFb3ir4)

Nous parlerons de ce qu'est TypeScript, pourquoi est-ce cool et comment pouvez-vous l'utiliser.

Sommaire :

- Introduction
- À propos des types
  - Cordes
  - Nombres
  - Booléens
  - Indéfini
  - Nul
  - Objets
  - Tableaux
  - Les fonctions
- Quel est le problème avec les types et JavaScript ?
- Dans vient TypeScript
- Principes de base de TypeScript
  - Types par inférence
  - Déclarer des types
    - Interfaces
    - Conditionnels
    - Les syndicats
    - Fonctions de saisie
    - Tableaux de typage
- Compilateur de TypeScript
- Comment créer un projet dactylographié
  - Un commentaire sur les bibliothèques
- Autres fonctionnalités de TypeScript
- Tour d'horizon

# Introduction

TypeScript est un sur-ensemble de JavaScript. Superset signifie qu'il ajoute des fonctionnalités en plus de ce que propose JavaScript. TypeScript prend toutes les fonctionnalités et structures que JavaScript fournit en tant que langage, et y ajoute quelques éléments.

La principale chose que TypeScript fournit est le typage statique . Donc, pour vraiment comprendre ce que cela signifie, nous devons d'abord comprendre quels sont les types. Entrons là-dedans.

# À propos des types

Dans un langage de programmation, les types font référence au type ou au type d'informations qu'un programme donné stocke. Les informations ou les données peuvent être classées en différents types en fonction de leur contenu.

Les langages de programmation ont généralement des types de données intégrés. En JavaScript, il existe six types de données de base qui peuvent être divisés en trois catégories principales :

- Types de données primitifs
- Types de données composites
- Types de données spéciaux

- String, Number et Boolean sont des types de données primitifs .
- Object, Array et Function (qui sont tous des types d'objets) sont des types de données composites .
- Alors que Undefined et Null sont des types de données spéciaux .

Les types de données primitifs ne peuvent contenir qu'une seule valeur à la fois , tandis que les types de données composites peuvent contenir des collections de valeurs et des entités plus complexes.

Examinons rapidement chacun de ces types de données.

## Strings

Le type de données chaîne est utilisé pour représenter des données textuelles (c'est-à-dire des séquences de caractères). Les chaînes sont créées à l'aide de guillemets simples ou doubles entourant un ou plusieurs caractères, comme indiqué ci-dessous :

```js
let a = "Hi there!";
```

## Numbers

Le type de données number est utilisé pour représenter des nombres positifs ou négatifs avec ou sans décimale :

```js
let a = 25;
```

Le type de données Number inclut également certaines valeurs spéciales qui sont : Infinity, -Infinity et NaN.

Infinity représente l'infini mathématique ∞, qui est supérieur à n'importe quel nombre. -Infinity est le résultat de la division d'un nombre différent de zéro par 0. Sinon NaN représente une valeur Not-a-Number spéciale. C'est le résultat d'une opération mathématique non valide ou indéfinie, comme prendre la racine carrée de -1 ou diviser 0 par 0, etc.

## Booleans

Le type de données booléen ne peut contenir que deux valeurs : true ou false. Il est généralement utilisé pour stocker des valeurs telles que yes (true) ou no (false), on (true) ou off (false), etc., comme illustré ci-dessous :

```js
let areYouEnjoyingTheArticle = true;
```

## Undefined

Le type de données indéfini ne peut avoir qu'une seule valeur, la valeur spéciale undefined. Si une variable a été déclarée, mais n'a pas reçu de valeur, elle a la valeur undefined.

```js
let a;
console.log(a); // Output: undefined
```

## Null

Une valeur nulle signifie qu'il n'y a pas de valeur. Ce n'est pas équivalent à une chaîne vide ("") ou 0, c'est simplement rien.

```js
let thisIsEmpty = null;
```

## Objects

L'objet est un type de données complexe qui vous permet de stocker des collections de données. Un objet contient des propriétés , définies comme une paire clé-valeur .

Une clé de propriété (nom) est toujours une chaîne, mais la valeur peut être n'importe quel type de données, comme des chaînes, des nombres, des booléens ou des types de données complexes comme des tableaux, des fonctions et d'autres objets.

```js
let car = {
  modal: "BMW X3",
  color: "white",
  doors: 5
};
```

## Arrays

Un tableau est un type d'objet utilisé pour stocker plusieurs valeurs dans une seule variable. Chaque valeur (également appelée élément) dans un tableau a une position numérique, connue sous le nom d' index , et elle peut contenir des données de n'importe quel type de données (nombres, chaînes, booléens, fonctions, objets et même d'autres tableaux).

L'index du tableau commence à partir de 0, de sorte que le premier élément du tableau est arr[0].

```js
let arr = ["I", "love", "dev"];
console.log(arr[2]); // Output: dev
```

## Functions

Une fonction est un objet appelable qui exécute un bloc de code. Vous déclarez d'abord la fonction et, à l'intérieur, le code que vous souhaitez qu'elle exécute. Et plus tard, vous appelez simplement la fonction chaque fois que vous voulez que son code s'exécute.

Les fonctions étant des objets, il est possible de les affecter à des variables, comme le montre l'exemple ci-dessous :

```js
let greeting = function () {
  return "Hello World!";
};
console.log(greeting()); // Output: Hello World!
```

# Quel est le problème avec les types et JavaScript ?

Maintenant que nous avons une idée claire de ce que sont les types, nous pouvons commencer à discuter de la façon dont cela fonctionne avec JavaScript - et pourquoi quelque chose comme TypeScript serait même nécessaire en premier lieu.

Le fait est que JavaScript est un langage faiblement typé et dynamique .
Cela signifie qu'en JavaScript, les variables ne sont pas directement associées à un type de valeur particulier, et toute variable peut être affectée (et réaffectée) à des valeurs de tous types.

Voir l'exemple suivant :

```js
let foo = 42; // foo is now a number
foo = "bar";  // foo is now a string
foo = true;   // foo is now a boolean
```

Vous pouvez voir comment nous pouvons changer le contenu et le type de la variable sans aucun problème.

Cela a été fait par conception lors de la création de JavaScript, car il était censé être un langage de script convivial pour les programmeurs et les concepteurs et utilisé uniquement pour ajouter des fonctionnalités aux sites Web.

Mais JavaScript a beaucoup grandi avec les années et a commencé à être utilisé non seulement pour ajouter des fonctionnalités simples aux sites Web, mais aussi pour créer d'énormes applications. Et lors de la création d'applications volumineuses, les types dynamiques peuvent entraîner des bogues stupides dans la base de code.

Voyons cela avec un exemple simple. Supposons que nous ayons une fonction qui reçoit trois paramètres et renvoie une chaîne :

```js
const personDescription = (name, city, age) =>
  `${name} lives in ${city}. he's ${age}. In 10 years he'll be ${age + 10}`;
```

Si nous appelons la fonction de cette manière, nous obtenons la sortie correcte :

```js
console.log(personDescription("Germán", "Buenos Aires", 29));
// Output: Germán lives in Buenos Aires. he's 29. In 10 years he'll be 39.
```

Mais si accidentellement nous passons le troisième paramètre à la fonction sous forme de chaîne, nous obtenons une mauvaise sortie :

```js
console.log(personDescription("Germán", "Buenos Aires", "29"));
// output: Germán lives in Buenos Aires. he's 29. In 10 years he'll be **2910**.
```

JavaScript n'affiche pas d'erreur car le programme n'a aucun moyen de savoir quel type de données la fonction doit recevoir. Il prend simplement les paramètres que nous avons donnés et exécute l'action que nous avons programmée, indépendamment du type de données.

Il est facile de commettre cette erreur en tant que développeur, en particulier lorsque vous travaillez avec de grandes bases de code et que vous n'êtes pas familier avec les paramètres requis par les fonctions ou les API. Et c'est exactement ce que TypeScript vient résoudre.

## Donc vient TypeScript

TypeScript a été lancé en 2012. Il a été développé et est actuellement maintenu par Microsoft.

Dans TypeScript, tout comme dans d'autres langages de programmation tels que Java ou C #, nous devons déclarer un type de données chaque fois que nous créons une structure de données.

En déclarant son type de données, nous donnons au programme des informations pour évaluer ultérieurement si les valeurs attribuées à cette structure de données correspondent ou non aux types de données déclarés.

S'il y a une correspondance, le programme s'exécute, sinon, nous obtenons une erreur. Et ces erreurs sont très précieuses, car en tant que développeurs, nous pouvons détecter les bogues plus tôt. ;)

Répétons l'exemple précédent mais maintenant avec TypeScript.

En TypeScript, ma fonction ressemblerait à ceci (voyez que c'est exactement la même chose, sauf qu'en plus de chaque paramètre, je déclare son type de données):

```js
const personDescription = (name: string, city: string, age: number) =>
  `${name} lives in ${city}. he's ${age}. In 10 years he'll be ${age + 10}.`;
```

Maintenant, si j'essaie d'appeler la fonction avec le mauvais type de données de paramètre, j'obtiens la sortie d'erreur suivante :

```js
console.log(personDescription("Germán", "Buenos Aires", "29"));
// Error: TSError: ⨯ Unable to compile TypeScript: Argument of type 'string' is not assignable to parameter of type 'number'.
```

La beauté de TypeScript est qu'il est toujours aussi simple que le code JavaScript, nous n'y ajoutons que les déclarations de type. C'est pourquoi TypeScript est appelé un sur-ensemble JavaScript, car TypeScript n'ajoute que certaines fonctionnalités à JavaScript.

# Principes de base de TypeScript

Jetons un coup d'œil à la syntaxe de TypeScript et apprenons à l'utiliser.

## Types par inférence

Il existe plusieurs façons de déclarer des types dans TypeScript.

Le premier que nous apprendrons est inference , dans lequel vous ne déclarez pas du tout de type, mais TypeScript le déduit (devine) pour vous.

Supposons que nous déclarions une variable chaîne comme celle-ci :

```js
let helloWorld = "Hello World";
```

Si plus tard j'essaie de le réaffecter à un numéro, j'obtiendrai l'erreur suivante :

```js
helloWorld = 20;
// Type 'number' is not assignable to type 'string'.ts(2322)
```

En créant une variable et en l'affectant à une valeur particulière, TypeScript utilisera la valeur comme type.

Comme mentionné dans les [docs TypeScript](https://www.typescriptlang.org/docs/handbook/typescript-in-5-minutes.html) :

> En comprenant le fonctionnement de JavaScript, TypeScript peut créer un système de types qui accepte le code JavaScript mais possède des types. Cela offre un système de type sans avoir besoin d'ajouter des caractères supplémentaires pour rendre les types explicites dans votre code.

C'est ainsi que TypeScript "sait" que helloWorld est une chaîne dans l'exemple ci-dessus.

Bien qu'il s'agisse d'une fonctionnalité intéressante qui vous permet d'implémenter TypeScript sans code supplémentaire, il est beaucoup plus lisible et recommandé de déclarer explicitement vos types.

## Déclarer des types

La syntaxe pour déclarer les types est assez simple : vous ajoutez simplement deux-points et son type à droite de ce que vous déclarez.

Par exemple, lors de la déclaration d'une variable :

```js
let myName: string = "Germán";
```

Si j'essaie de réaffecter ceci à un numéro, j'obtiendrai l'erreur suivante :

```js
myName = 36; // Error: Type 'number' is not assignable to type 'string'.
```

## Interfaces

Lorsque nous travaillons avec des objets , nous avons une syntaxe différente pour déclarer les types qui s'appelle une interface .

Une interface ressemble beaucoup à un objet JavaScript - mais nous utilisons le mot-clé interface, nous n'avons ni signe égal ni virgule, et en plus de chaque clé, nous avons son type de données au lieu de sa valeur.

Plus tard, nous pouvons déclarer cette interface comme type de données de n'importe quel objet :

```js
interface myData {
  name: string;
  city: string;
  age: number;
}

let myData: myData = {
  name: "Germán",
  city: "Buenos Aires",
  age: 29
};
```

Répétez que je passe l'âge sous forme de chaîne, j'obtiendrai l'erreur suivante :

```js
let myData: myData = {
  name: "Germán",
  city: "Buenos Aires",
  age: "29" // Output: Type 'string' is not assignable to type 'number'.
};
```

## Conditionals

Si par exemple je voulais rendre une clé conditionnelle, lui permettant d'être présente ou non, il suffit d'ajouter un point d'interrogation à la fin de la clé dans l'interface :

```js
interface myData {
  name: string;
  city: string;
  age?: number;
}
```

## Unions

Si je veux qu'une variable puisse se voir attribuer plus d'un type de données différent, je peux le déclarer en utilisant des unions comme ceci :

```js
interface myData {
  name: string;
  city: string;
  age: number | string;
}

let myData: myData = {
  name: "Germán",
  city: "Buenos Aires",
  age: "29" // I get no error now
};
```

## Fonctions de saisie

Lors du typage des fonctions, on peut taper ses paramètres ainsi que sa valeur de retour :

```js
interface myData {
  name: string;
  city: string;
  age: number;
  printMsg: (message: string) => string;
}

let myData: myData = {
  name: "Germán",
  city: "Buenos Aires",
  age: 29,
  printMsg: (message) => message
};

console.log(myData.printMsg("Hola!"));
```

## Tableaux de typage

Pour taper des tableaux la syntaxe est la suivante :

```js
let numbersArray: number[] = [1, 2, 3]; // We only accept numbers in this array
let numbersAndStringsArray: (number | string)[] = [1, "two", 3]; // Here we accept numbers and strings.
```

Les tuples sont des tableaux avec une taille et des types fixes pour chaque position. Ils peuvent être construits comme ceci :

```js
let skill: [string, number];
skill = ["Programming", 5];
```

# Compilateur de TypeScript

La façon dont TypeScript vérifie les types que nous avons déclarés se fait via son compilateur . Un compilateur est un programme qui convertit les instructions en un code machine ou sous une forme de niveau inférieur afin qu'elles puissent être lues et exécutées par un ordinateur.

Chaque fois que nous exécutons notre fichier TypeScript, TypeScript compile notre code et à ce stade, il vérifie les types. Ce n'est que si tout est ok que le programme s'exécute. C'est pourquoi nous pouvons détecter des erreurs avant l'exécution du programme.

D'autre part, en JavaScript, les types sont vérifiés au moment de l'exécution. Cela signifie que les types ne sont pas vérifiés tant que le programme n'est pas exécuté.

Il est également important de mentionner que TypeScript transpile le code en JavaScript.

> Le transpiling est le processus consistant à prendre le code source écrit dans une langue et à le transformer dans une autre langue.

Les navigateurs ne lisent pas TypeScript, mais ils peuvent exécuter des programmes écrits en TypeScript car le code est converti en JavaScript au moment de la construction.

Nous pouvons également sélectionner la "saveur" de JavaScript vers laquelle nous voulons transpiler, par exemple es4, es5, etc. Cette option et bien d'autres peuvent être configurées à partir du tsconfig.json fichier généré chaque fois que nous créons un projet TypeScript.

```json
{
  "compilerOptions": {
    "module": "commonjs",
    "esModuleInterop": true,
    "target": "es6",
    "moduleResolution": "node",
    "sourceMap": true,
    "outDir": "dist"
  },
  "lib": ["es2015"]
}
```

Nous n'irons pas en profondeur dans le compilateur de TypeScript car il s'agit d'une introduction. Mais sachez qu'il y a une tonne de choses que vous pouvez configurer à partir de ce fichier et d'autres, et ainsi adapter TypeScript exactement à ce dont vous avez besoin.
Comment créer un projet TypeScript

Nous pouvons démarrer un nouveau projet TypeScript en exécutant simplement quelques commandes dans notre terminal. Nous aurons besoin de Node et NPM installés dans notre système.

Une fois que nous sommes dans le répertoire de notre projet, nous exécutons d'abord npm i typescript --save-dev. Cela installera TypeScript et l'enregistrera en tant que dépendance de développement.

Puis nous courons npx tsc --init. Cela initialisera votre projet en créant un tsconfig.json fichier dans votre répertoire. Comme mentionné, ce fichier tsconfig.json vous permettra de configurer et de personnaliser davantage la manière dont TypeScript et le compilateur tsc interagissent.

Vous verrez que ce fichier est livré avec un ensemble d'options par défaut et de nombreuses options commentées, afin que vous puissiez voir tout ce que vous avez à votre disposition et l'implémenter au besoin.

```json
{
  "compilerOptions": {
    /*Visit <https://aka.ms/tsconfig.json> to read more about this file*/

    /* Projects */
    // "incremental": true,                              /* Enable incremental compilation */
    // "composite": true,                                /* Enable constraints that allow a TypeScript project to be used with project references. */
    // "tsBuildInfoFile": "./",                          /* Specify the folder for .tsbuildinfo incremental compilation files. */
    // "disableSourceOfProjectReferenceRedirect": true,  /* Disable preferring source files instead of declaration files when referencing composite projects */
    // "disableSolutionSearching": true,                 /* Opt a project out of multi-project reference checking when editing. */
    // "disableReferencedProjectLoad": true,             /* Reduce the number of projects loaded automatically by TypeScript. */

    ...
```

Et c'est tout. Nous pouvons ensuite créer un fichier avec l' .tsextension et commencer à écrire notre code TypeScript. Chaque fois que nous avons besoin de transpiler notre code en vanilla JS, nous pouvons le faire en exécutant tsc `<name of the file>`.

Par exemple, j'ai un index.tsfichier dans mon projet avec le code suivant :

```js
const personDescription = (name: string, city: string, age: number) =>
  `${name} lives in ${city}. he's ${age}. In 10 years he'll be ${age + 10}.`;
```

Après l'exécution de tsc index.ts, un nouveau index.js fichier est automatiquement créé dans le même répertoire avec le contenu suivant :

```js
var personDescription = function (name, city, age) { return name + " lives in " + city + ". he's " + age + ". In 10 years he'll be " + (age + 10) + "."; };
```

Assez simple, non? =)

# Un commentaire sur les bibliothèques

Si vous travaillez avec React, vous devez savoir que create-react-app fournit un modèle TypeScript, de sorte que TypeScript est installé et configuré pour vous lors de la création du projet.

Des modèles similaires sont également disponibles pour les applications back-end Node-Express et pour les applications React Native.

Un autre commentaire à faire est que lorsque vous travaillez avec des bibliothèques externes, elles vous fourniront normalement des types spécifiques que vous pouvez installer et utiliser pour vérifier le type de ces bibliothèques.

Par exemple, en utilisant le modèle TypeScript pour create-react-app que j'ai mentionné, la dépendance suivante sera installée :

```json
"@types/react":
```

Et cela va nous permettre de taper nos composants de la manière suivante :

```js
const AboutPage: React.FC = () => {
  return (
    <h1>This is the about page</h1>
  )
}
```

Nous verrons plus en détail comment utiliser TypeScript avec React à l'avenir. Mais pour commencer, sachez simplement que cela existe. ;)

# Autres fonctionnalités de TypeScript

TypeScript peut également être considéré comme un linter , un outil qui fait des suggestions en temps réel au développeur au fur et à mesure de l'écriture du code. Surtout lorsqu'il est combiné avec VS Code, TypeScript peut faire de douces suggestions basées sur nos types déclarés qui nous font souvent gagner du temps et des erreurs.

Une autre fonctionnalité de TypeScript est un outil de documentation automatique . Imaginez que vous obteniez un nouvel emploi et que vous deviez apprendre à connaître une énorme base de code. Avoir les types déclarés pour chaque fonction est d'une grande aide lors de leur première utilisation et réduit la courbe d'apprentissage pour tout projet.

# Tour d'horizon

Ce sont donc les bases de TypeScript. Comme nous l'avons vu, cela peut ajouter un peu de passe-partout à notre code. Mais cela porte certainement ses fruits en prévenant les bogues, en nous aidant à nous familiariser avec notre base de code et en améliorant simplement notre expérience de développement, en particulier lorsque nous travaillons sur des projets importants et complexes.
