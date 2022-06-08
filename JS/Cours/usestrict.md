# JavaScript "use strict"
Dans ce tutoriel, vous apprendrez à utiliser la syntaxe JavaScript 'strict' à l’aide d’exemples.

En JavaScript, 'use strict'; indique que le code doit être exécuté en 'strict mode'. Cela facilite l’écriture de bon code JS sécurisé. Par exemple,

```js
myVariable = 9;
```

Ici, myVariable est créé sans déclarer. Cela fonctionne comme une variable globale en JavaScript. Cependant, si vous utilisez ceci en mode strict, le programme lancera une erreur. Par exemple,

```js
'use strict';
// Error
myVariable = 9;
```

Le code ci-dessus lance une erreur car myVariable n’est pas déclaré. En mode strict, vous ne pouvez pas utiliser la variable sans les déclarer.
Vous pouvez déclarer le mode strict en ajoutant 'use strict'; ou "use strict"; au début d’un programme.
Lorsque vous déclarez le mode strict au début d’un programme, il aura une portée globale et tout le code du programme s’exécutera en mode strict.

## Things Not Allowed in Strict Mode

1. La variable non déclarée n’est pas autorisée.
```js
'use strict';
a = 'hello'; // throws an error
```

2. Les objets non déclarés ne sont pas autorisés.
```js
'use strict';
person = {name: 'Carla', age: 25}; // throws an error
```

3. La suppression d’un objet n’est pas autorisée.
```js
'use strict';
let person = {name: 'Carla'};
delete person; // throws an error
```

4. La duplication d’un nom de paramètre n’est pas autorisée.
```js
"use strict";
function hello(p1, p1) { console.log('hello')}; // throws an error
hello();
```
5. L'affectation à une propriété non accessible en écriture n'est pas autorisée.
```js
'use strict';
let obj1 = {};
Object.defineProperty(obj1, 'x', { value: 42, writable: false });
// assignment to a non-writable property
obj1.x = 9; // throws an error
```

6. L’attribution à une propriété getter-only n’est pas autorisée.
```js
'use strict';
let obj2 = { get x() { return 17; } };
// assignment to a getter-only property
obj2.x = 5; // throws an error
```

7. L’affectation à une nouvelle propriété sur un objet non extensible n’est pas autorisée.
```js
'use strict';
let obj = {};
Object.preventExtensions(obj);
// Assignment to a new property on a non-extensible object
obj.newValue = 'new value'; // throws an error
```

8. La syntaxe octale n’est pas autorisée.
```js
'use strict';
let a = 010; // throws an error
```

9. Les arguments de nom de variable et eval ne sont pas autorisés.
```js
'use strict';
let arguments = 'hello'; // throws an error
let eval = 44;
```

10. Vous ne pouvez pas également utiliser ces mots-clés réservés en mode strict.
```js
implements interface let package private protected public static yield
```

## Avantages du mode strict

L’utilisation du mode strict :

- aide à écrire un code plus propre
- modifie les erreurs silencieuses précédemment acceptées (mauvaise syntaxe) en erreurs réelles et envoie un message d’erreur
- facilite l’écriture de JavaScript « sécurisé »