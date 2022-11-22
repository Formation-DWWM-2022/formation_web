# TP4
une définition de fonction
> C'est une définition de fonction.
On la reconnait à l'usage du mot clé function et des accolades entourant le
code qui sera exécuté lorsque cette fonction sera appelée.

un appel de fonction
> C'est un appel de fonction.
Un appel de fonction = le nom de la fonction, suivi par les paramètres entre
parenthèses. Sans le mot clé function .
Cette instruction va exécuter le code défini dans la fonction, et affecter les
valeurs fournies à chaque paramètre.

vérifier que le test passe: maFonction(1) === '10';
> Pour vérifier le bon fonctionnement il faut définir et exécuter des tests unitaires.
Ceux-ci permettent de comparer le résultat attendu d'une fonction, à celui
effectivement retourné par l'implémentation actuelle de cette fonction.
maFonction(1) === '10'; est un bon test unitaire car son exécution retourne
true si la fonction retourne le résultat attendu ( 10 ) lorsqu'on lui passe 1 en paramètre.

le résultat va être affecté à maVariable
> Il s'agit ici d'un appel de fonction. De la même façon que pour une opération
élémentaire (ex: 2 + 2 ), tout appel de fonction sera remplacé par la valeur
retourné par l'exécution de cette fonction.
Ici, le résultat de l'exécution de la fonction doubler avec le paramètre 3 , soit
la valeur 6 , va être affectée à maVariable .

```js
function soustraire(a, b) {
    return a - b;
}
```

```js
function repeter(n) {
    for (var i = 0; i < n; i++) {
        console.log('Bonjour!');
    }
    return n;
}
```

# TP5
```js
var nombres = [1, 2, 3];
```

```js
var troisieme = fruits[2];
```

```js
console.log(fruits.pop());
```

```js
function tableauContient(tableau, chaine) {
    var indice = tableau.indexOf(chaine);
    if (indice === -1) {
        return false;
    } else {
        return indice;
    }
}
```

# TP6
{ prop1: 3, prop2: 4 }
> Un objet JavaScript:
- accolades
- propriétés définis par paires clé-valeur (syntaxe: clé: valeur )
- propriétés séparées par des virgules

personne.nom;
> Sachant qu'on connaît littéralement la clé de la propriété (il s'agit de nom ), on peut utiliser la notation pointée.

personne[laCle];
> Sachant qu'on ne connaît pas a priori la clé de la propriété (car elle est stockée
dans une variable), on ne peut PAS utiliser la notation pointée. => Il faut utiliser
les crochets, comme pour récupérer la valeur d'un élément de tableau.
Et, sachant que laCle est une variable, et non la valeur littérale de notre clé, il
ne faut pas l'écrire entre apostrophes.

compteFacebook.groupes.lolcats.membres[0]
> Il faut préciser tout le cheminement à effectuer, niveau par niveau, en partant de
la racine de l'arbre: la variable qui contient l'objet principal.
Vu qu'on connaît les clés de chaque propriété de cet objet hiérarchique (objets
imbriqués), on peut utiliser la notation pointée, sauf pour accéder au premier
élément du tableau contenant la valeur 'Patrick' .
Il est possible d'utiliser des crochets au lieu de la notation pointée, à condition
de mettre les noms de chaque clé entre apostrophes (car on connaît leur valeur
littérale à priori), et de ne pas mettre le nom de la variable contenant l'objet
( compteFacebook ) entre crochets, car ce n'est pas une clé de propriété.

```js
var message = { texte: 'bonjour' };
alert(message.texte);
```