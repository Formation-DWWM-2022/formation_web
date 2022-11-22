# TP1

Comment ouvrir la console JavaScript dans Google Chrome ?

    En tapant "console"
    En appelant le prof
    En demandant gentiment à Siri
    En pressant Cmd-Alt-J ou Ctrl-Shift-J

Que retourne typeof quand il est appliqué sur "bonjour" ?

    "string"
    string
    "object"
    undefined

Types de valeurs en JavaScript. Quel est l'intrus ?

    string
    boolean
    decimal
    number

Comment créer une variable en JavaScript ?

    maVariable;
    var maVariable;
    x = 0;
    maVariable = 'bonjour';

Comment afficher la valeur d'une variable appelée maVariable depuis la console ?

    maVariable;
    var maVariable;
    maVariable?
    show maVariable

Comment changer la valeur d'une variable existante ? (déjà créée)

    var maVariable = 4;
    maVariable = 4;
    maVariable(4);
    4 = maVariable;

Si j'ai créé une variable dont la valeur est un nombre, que se passera-t-il si je lui affecte ensuite une chaine de caractères ?

    erreur, car le type est différent.
    erreur, car on ne peut pas changer la valeur d'une variable.
    la valeur de la variable va être remplacée par la chaine de caractères.
    les deux valeurs vont être concaténées.

---
# TP2

Quel section va être exécutée, si on exécute le code suivant ?
```js
var nb = 2;
if (nb === 1) {
// A
} else {
// B
}
```
    A
    B
    A et B
    aucune

Quel section de va être exécutée, si on exécute le code suivant ?
```js
var nb = 2;
if (nb === 2) {
// A
} else if (nb > 1) {
// B
} else {
// C
}
```
    A
    B
    A et B
    A, B et C

À quoi ressemblerait l'arbre de décision correspondant à ce code:
```js
var reponse = prompt('as-tu faim ?')
if (reponse === 'oui') {
var reponse2 = prompt('aimes-tu les burgers ?');
if (reponse2 === 'oui') {
alert('alors je t\'en offre un !');
} else {
alert('dommage !');
}
} else {
alert('désolé');
}
```
    une boîte et deux branches
    deux boîtes de même niveau
    une boîte de niveau 1, et une boîte de niveau 2
    une boîte et trois branches

Pourquoi faut-il éviter d'utiliser les opérateurs == et != ?

    car il vaut mieux utiliser une affectation =
    car ils sont trop stricts
    car ils sont trop laxistes
    var === et !== sont plus lisibles

Implémenter une condition qui affecte 'egal' à une variable resultat seulement si
une autre variable nombre vaut strictement 4 . Indenter correctement.
```js
Saisissez votre code Javascript ici
```

---
# TP3
Combien de fois les instructions vont-elles être exécutées ?
```js
for ( var i = 0; i < 4; i++ ) {
// instructions
}
```
    0 fois
    1 fois
    3 fois
    4 fois

Combien de fois les instructions vont-elles être exécutées ?
```js
for ( var i = 3; i >= 1; i-- ) {
// instructions
}
```
    0 fois
    1 fois
    3 fois
    4 fois

Implémenter un programme de moins de 4 lignes qui affiche 50 fois 'Bonjour!'
dans la console. Respecter les conventions et règles d'indentation vues en cours.