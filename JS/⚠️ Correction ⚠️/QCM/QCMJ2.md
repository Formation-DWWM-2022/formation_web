# TP4

```js
function maFonction(param) {
    return param + 2;
}
```

Ceci est:

    un appel de fonction
    une définition de fonction
    une affectation de fonction
    une fonction qui ne fonctionne pas

```js
maFonction(4);
```

Ceci est:
    un appel de fonction
    une définition de fonction
    une affectation de fonction
    une fonction qui ne fonctionne pas

```js
// cette fonction concatène un zéro à la fin de la valeur passée en paramètre
function maFonction(param) {
    return param + '0';
}
```

Comment savoir si cette fonction fonctionne bien ? (c.a.d. sans bug)

    il suffit de la copier-coller dans la console
    il faut taper maFonction dans la console
    vérifier que le test passe: maFonction(1) === '10';
    vérifier que maFonction(1) renvoie bien true

Supposons que nous avons défini une fonction doubler() qui retourne le double du nombre passé en paramètre, lors de son appel.
Que se passe-t-il si on exécute l'instruction suivante:

```js
var maVariable = doubler(3);
```

    le résultat va être affecté à maVariable
    le résultat va s'afficher dans la console
    maVariable contient la définition de la fonction
    maVariable contient l'appel de la fonction

Définir une fonction soustraire qui retourne le résultat de la soustraction a - b , a et b étant des paramètres de cette fonction.
Respecter les conventions et règles d'indentation vues en cours.

```js
Saisissez votre code Javascript ici
```

Définir une fonction repeter qui affiche n fois 'Bonjour!' dans la console, puis
qui retourne n , n étant un paramètre de cette fonction.
Respecter les conventions et règles d'indentation vues en cours.

```js
Saisissez votre code Javascript ici
```

---

# TP5

Créez une variable nombres de type tableau et contenant les nombres 1 , 2 et 3 .

```js
Saisissez votre code Javascript ici
```

Vous disposez d'une variable fruits contenant un tableau de chaînes de caractères.
Saisissez le code JavaScript pour créer une variable troisieme et lui affecter la
valeur du 3ème élément de ce tableau.

```js
Saisissez votre code Javascript ici
```

Vous disposez d'une variable fruits contenant un tableau de chaînes de caractères.
Saisissez le code JavaScript permettant de retirer le dernier élément de ce tableau, et
d'afficher la valeur de cet élément dans la console.

```js
Saisissez votre code Javascript ici
```

Définir une fonction tableauContient qui prend deux paramètres:

- tableau : un tableau de chaînes de caractères
- chaine : une chaîne de caractères

...et retourne:

- false si la valeur chaine n'a pas été trouvée dans le tableau,
- ou le premier indice (à partir de 0) auquel a été trouvé la valeur chaine dans le tableau.

Exemples d'appels:

- tableauContient(['a', 'b', 'c'], 'b'); doit retourner 1 .
- tableauContient(['a', 'b', 'c'], 'd'); doit retourner false .

```js
Saisissez votre code Javascript ici
```

---

# TP6

Laquelle de ces instructions constitue un objet JavaScript valide:

    [ prop1: 3, prop2: 4 ]
    { prop1: 3, prop2: 4 }
    { 2, true, 'bonjour' }
    { 'a': 1; 'b': 2 }

Comment récupérer la valeur de la propriété nom d'un objet affecté à une variable personne ?

    personne.get('nom');
    personne.[nom];
    personne[nom];
    personne.nom;

Toujours dans notre objet personne , comment récupérer la valeur d'une propriété
dont la clé est stockée dans la variable laCle ?

    personne.get(laCle);
    personne.laCle;
    personne[laCle];
    personne['laCle'];

```js
var compteFacebook = {
    groupes: {
        maitresJedi: {},
        lolcats: {
            titre: 'Vive les chats !',
            membres: [ 'Patrick' ],
        },
    },
};
```

Quelle instruction faut-il saisir pour accéder à la valeur 'Patrick' ?

    compteFacebook.groupes.lolcats.membres[0]
    compteFacebook.membres[0]
    [comptesFacebook][groupes][lolcats][membres][0]
    ['comptesFacebook']['groupes']['lolcats']['membres'][0]

Définir un objet contenant une propriété texte ayant 'bonjour' comme valeur, et
stocker cet objet dans une variable message .

Ajouter l'instruction permettant d'afficher avec alert() la valeur de la propriété
texte de l'objet message , en récupérant cette valeur depuis l'objet.

```js
Saisissez votre code Javascript ici
```
