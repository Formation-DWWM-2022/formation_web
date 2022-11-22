<https://welovedevs.com/app/fr/test-session/-N5nqs9cvtF1h656YMMR>

# Q1 : Quelle(s) affirmation(s) sont vraie(s) concernant le code suivant ?

```javascript
var bar = 'bar';
baz = 'baz';
this.bar = 'foo';
this.baz = 'foo';
```

Solution [1]: bar est une variable locale
Solution [3]: La variable bar vaut : bar

# Q2 : Qu'affichera le code suivant ?

```javascript
var names = ['Lea', 'John', 'Rachel', 'Yehuda'];
(function() {
 for (name in names) {
  console.log(name);
 }
})();
```

Solution [4] : Il affiche : `0 1 2 3`

# Q3 Quelle(s) égalité(s) parmi les suivantes sont vraie(s) ?

Solution [1]: 0 == ''
Solution [2]: 'f' + 1 == 'f1'

# Q4 Que vaut `obj.hello` après l'exécution de ces quelques lignes de code ?

```javascript
var obj = { hello: 'Hello' }, hello = 'Hello';
obj[hello] += ','
obj.hello += ' world';
obj['hello'] += '!';
```

Solution [3]: `Hello world!`

# Q5 À quoi servent les mots clés call et apply ?

- Solution [2]: Ils permettent d'appeler une fonction en précisant son contexte
- Solution [4]: Apply prend en second paramètre un tableau avec les arguments à passer à la fonction

# Q6 Quelle(s) assertion(s) à propos du code suivant sont vraie(s) ?

```javascript
var foo = function() {
  console.log(arguments);
};
foo(1, 2, 3);
```

Solution [3]: Ce code affiche: undefined
Solution ???

# Q7 Quelle sera la **première chose** qu'affichera le code suivant ?

```javascript
function Item() {
  this.name = 'item';
};
Item.prototype.take = function() {
  console.log('You can take ' + this.name);
};

function Lantern() {
  this.name = 'lantern';
  this.light = function() {
    console.log('Light the ' + this.name);
  }
};
Lantern.prototype = Object.create(Item.prototype);
Lantern.prototype.constructor = Lantern;

var lantern = new Lantern();
setTimeout(lantern.light, 1);
lantern.take();
```

Solution [2]: Il affichera d'abord : You can take lantern

# Q8 Comment se nomme le pattern utilisé dans ce bout de code

```javascript
var myModule = (function($, _) {

  function doSomethingPrivate() {
    // ...
  }

  return {
    publicMethod : function() {
      doSomethingPrivate();
    }
  };

})(jQuery, _);
```

Solution [2]: Module Pattern Variations

# Q9 Quelles affirmations sont vraies à propos de window.postMessage ?

Solution : ???

# Q10 Les événements déclenchés sur le DOM se propagent à travers celui-ci

Solution : ???

# Q11 Quelle(s) égalité(s) parmi les suivantes renvoie `true` ?

Solution [3]: typeof NaN === 'number'

# Q12 NodeJS est un portage du langage JavaScript sur une runtime, et pouvant s'exécuter côté serveur. Quelles affirmations sont justes à son sujet ?

Solution [2] : Il utilise le meme moteur que Chrome : V8
Solution [3] : Il est très rapide car il a un modèle événement non-bloquant

# Q13 Quel a été le nom de code de la version d'ES2015 (ou ES6) lors de sa sortie ?

Solution [1] : Harmony

# Q14 Qu'affichera le code suivant ?

```javascript
var funcs = {
    A : function() { console.log('A') },
    B : function() { console.log('B') },
    C : function() { console.log('C') },
    D : function() { console.log('D') }
};

['A','B','C','D'].forEach(function(letter, index) {
  setTimeout( funcs[letter] , index * 10 );
});
```

Solution [1] :

```
A
B
C
D
```

# Q15 Lequel des suivants **n'est pas** un **framework** JavaScript ?

Solution [4]: Polymer
Solution [5]: jQuery
Solution : ???

# Q16 Lesquelles des fonctionnalités suivantes font parties de la version ES2015 (anciennement ES6) ?

Solution : ??

# Q17 Soit le code suivant : Quel sera le message loggué ?

```javascript
function Player(name) {
    this.name = name;

    this.identity = function() {
        console.log('foo');
    }
}

Player.identity = function identity() {
    console.log('bar');
}

Player.prototype.identity = function identity() {
    console.log('baz');
}

let myObj = Player('qux'); // Création d'un player
myObj.identity();
```

Solution [4]: Uncaught TypeError: myObj is undefined

# Q18 Parmi les suivants, quel(s) code(s) permettront d'inverser la chaîne de caractères suivante : `var texte = 'Hello World!';`? *(Plusieurs bonnes réponses possibles)*

Solution [1]:

```javascript
var reversedText = texte.split('').reverse().join('');
```

Solution [2]:

```javascript
for (var i = 0, temp, texte = texte.split(''); i < Math.ceil(texte.length/2); i++) {
    temp = texte[i];
    texte[i] = texte[texte.length - i - 1];
    texte[texte.length - i - 1] = temp;
}
var reversedText = texte.join('');
```

# Q19 Quelle méthode parmi les suivantes reste celle **la plus optimisée** pour créer un objet littéral ?

Solution [1]:

```javascript
let myObj = { foo: 'bar' };
```

Solution : ???

# Q20 Lesquelles parmis les suivantes sont des API intégrées dans JavaScript ?

Solution: ???

# Q21 Identifiez les raisons pour lesquelles ce code ne fonctionnera pas correctement : *(Plusieurs bonnes réponses)*

```html
<form method="post" action="/app/send" name="myForm">
    ...
    <input type="submit">
</form>
```

```javascript
var form = document.querySelector('#myForm');

form.addEventListener('onsubmit', onSubmit);

function onSubmit() {
    // do check #myForm fields ...
}
```

Solution : ???

# Q22 Mon serveur est paramètré pour répondre sur `GET /api/articles` avec **exactement** le JSON suivant : Quel(s) code(s) parmi les suivants permettront de récupérer correctement ce tableau JSON dans la variable finale `data` depuis un navigateur web ?

```json
[
    { "title": "Lorem Ipsum", "category": "News", "author": "Chuck Norris" },
    { "title": "Dolor Sit", "category": "News", "author": "Bruce Lee" },
    { "title": "Amet Enebet", "category": "Sport", "author": "Ip Man" }
]
```

Solution : ???

# Q23 Quelles affirmations sont vraies à propos du mode strict de JavaScript ?

Solution : ???

# Q24 Quelle est la différence entre `__proto__` et `prototype` ?

Solution : ???

# Q25 Comment se nomme cette technique de programmation ?

```javascript
function add(n1) {
    return function (n2) {
        return function (n3) {
            return n1 + n2 + n3;
        }
    }
}

add(1)(2)(3); // 6
```

Solution : Un TypeError sera levée

# Q26 Quelle(s) affirmation(s) est/sont vraie(s) à propos de l'API `localStorage` ?

Solution : ???

# Q27 Quel opérateur n'existe pas en JavaScript ?

Solution [2] : ~

# Q28 Soit la fonction suivante : Que se passera t-il si on exécute l'expression suivante ?

```javascript
function sum() {
    return arguments.reduce(function(total, nb) {
        return total + nb;
    }, '');
}
```

`sum(1, 2, 3, 4);`
Solution [2]: TypeError will be raised

# Q29 Quelle est la sortie ?

```js
function ageOfW3D(data) {
  if (data === { age: 5 }) {
    console.log("WeLoveDevs a 5 ans");
  } else if (data == { age: 5 }) {
    console.log("WeLoveDevs a peut être 5 ans.");
  } else {
    console.log(`WeLoveDevs est fantastique.`);
  }
}

ageOfW3D({ age: 5 });
```

Solution [3]: WeLoveDevs est fantastique.

# Q30 Quelle est la sortie ?

```js
const obj = { a: "un", b: "deux", a: "trois" };
console.log(obj);
```

Solution [3]: { a: "trois", b: "deux" }

# Q31 J'ai besoin de faire un appel AJAX vers un domaine externe qui met à disposition des données publiques. De quoi dois-je m'assurer avant de coder cet appel ?

Solution : ???

# Q32 Soit le code suivant : Comment pourrions-nous utiliser la syntaxe ES2015 (ES6) pour améliorer ce code, de telle sorte à ce qu'il donne **exactement** le même résultat ?

```javascript
function Creature(name, age, strength) {
  this.name = name;
  this.age = age;
  this.strength = strength;
}

Creature.prototype.saySomething = function(words) {
  console.info(this.name + ' says : ' + words.toLowerCase());
}

function Orc(name, age, strength) {
  Creature.call(this, name, age, strength);
}

Orc.prototype = Object.create(Creature.prototype, { constructor : { value : Orc } });

Orc.prototype.scream = function(words) {
  console.info(this.name + ' screams : ' + words.toUpperCase() + ' !!!');
}
```

Solution : ???

# Q33 Lequel des objets suivants n'existe pas en JavaScript moderne ? (1 seule bonne réponse)

Solution : ???

# Q34 Soit le code suivant

```javascript
function MyObject() {
  this.one = function() {
    return 1;
  };
  function two() {
    return 2;
  };
}

MyObject.prototype.three = 3;
MyObject.four = 4;

var obj = new MyObject();
try { console.log(obj.one()); } catch(e) {}
try { console.log(obj.two()); } catch(e) {}
try { console.log(obj.three); } catch(e) {}
try { console.log(obj.four); } catch(e) {}
```

Solution [1]: Il affiche 1
Solution [3]: Il affichhe 3

# Q35 Que fait l'interpréteur JavaScript quand il exécute le code suivant

```javascript
function laugh() {
  return
  {
    ha: 'Haha!'
  }
}
laugh();
```

Solution [2] : L'appel à laugh() renvoie undefined
Solution [3] : L'appel à laugh() renvoie l'objet {ha: 'Haha!' }

# Q36 Qu'affichera le code suivant

```javascript
let myObj = {
    a : 'A',
    b : 'B',
    c : {
        d : 'D',
        e : 'E',
        f : {
            g : 'G'
        },
        h : 'H'
    }
};

let { c : { f : { g : foo }, e : baz, b : bar } } = myObj;

console.log(foo, bar, baz);
```

Solution [2] : G undefined E

# Q37 Que renverra l'expression suivante ?

```javascript
[
    { name:'Lisa'    , mark:'16' },
    { name:'Pascal'  , mark:'13' },
    { name:'Romain'  , mark:'12' },
    { name:'Lucas'   , mark:'4'  },
    { name:'Aurélie' , mark:'14' }
]
.map(function(student) { student.mark = Number(student.mark); return student })
.filter(function(student) { return student.mark >= 10 })
.reduce(function(acc, student) { return student.mark + acc }, 0);
```

Solution [4] : 55

# Q38 Considérons ces deux boucles : Quelles sont les sorties attendues?

```js
for (var i = 0; i < 3; i++) {
  setTimeout(() => console.log(i), 1);
}

for (let i = 0; i < 3; i++) {
  setTimeout(() => console.log(i), 1);
}
```

Solution [1] : 3 3 3 et 0 1 2

# Q39 Quelle est la sortie ?

```js
const shape = {
  radius: 10,
  diameter() {
    return this.radius * 2;
  },
  perimeter: () => 2 * Math.PI * this.radius
};

shape.diameter();
shape.perimeter();
```

Solution [2] : 20 et NaN

# EXO

## Q1

```js
var adresse = {
  rue: "Rue des gras",
  numero : 42,
  quartier : "Centre ville",
  ville : "Clermont-Ferrand",
  pays : "France"
};


let { rue, numero, quartier, ville, pays } = adresse;
console.log(`L’utilisateur habite à ${ville} / ${pays}, dans le quartier
${quartier}, sur la rue "${rue}" avec nº ${numero}.`);
```

## Q2

```js
const paires = (x, y) => {
  for (var i = x; i <= y; i++) {
    if (i % 2 === 0) {
      console.log(i);
    }
  }
};
paires(1, 20);
```

## Q3

```js
const habilite = skills => {
  if (skills.indexOf("Javascript") !== -1) {
    return console.log("true");
  } else {
    console.log("false");
  }
};
var skills = ["Boostrap", "React", "CSS", "HTML"];
habilite(skills);
habilite([...skills, "Javascript"]);
```

## Q4

```js
const experience = annees => {
  switch (true) {
    case annees >= 0 && annees <= 1:
      console.log(`Vous avez ${annees} années d’exp, votre niveau est : Débutant`);
      break;
    case annees >= 1 && annees <= 3:
      console.log(`Vous avez ${annees} années d’exp, votre niveau : Intermédiaire`);
      break;
    case annees >= 3 && annees <= 6:
      console.log(`Vous avez ${annees} années d’exp, votre niveau est : Avancé`);
      break;
    default :
      console.log(`Vous êtes ${annees} années d’exp, votre niveau est : Maître Jedi`);
      break;
  }
};
experience(1);
experience(3);
experience(6);
experience(10);
```

## Q5

```js
var user = [
{
    nom : "Corentin",
    competences : ["Javascript", "Reactjs", "Redux"]
},
{
    nom : "Gabriel",
    competences : ["Vuejs", "Ruby on Rails", "Elixir"]
}
];

const showMessage = users => {
  for (const user of users) {
    const { nom, competences } = user;
    console.log(`${nom} possède les compétences : ${competences.join(", ")}`);
  }
};

showMessage(user)

```
