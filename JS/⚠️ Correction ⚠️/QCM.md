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

---
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

Définir une fonction repeter qui affiche n fois 'Bonjour!' dans la console, puis
qui retourne n , n étant un paramètre de cette fonction.
Respecter les conventions et règles d'indentation vues en cours.

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

--- 
# TP7
Quel est le nom de l'attribut à utiliser pour donner le nom du fichier .js à charger dans
une page HTML:

    href
    src
    scr
    type

Si je crée une fichier .js qui ne contient que la ligne `alert('bonjour');` et que
j'intègre ce fichier à une page HTML, que se passera-t-il ?

    rien

    l'alert ne s'affichera que si on copie-colle le code dans la console
    
    l'alert s'affichera quand l'utilisateur cliquera sur un bouton
    
    l'alert s'affichera chaque (re)chargement de la page

Soit la page HTML suivante:
```html
<body>
    <p id="premier-paragraphe">Bonjour</p>
    <p id="deuxieme-paragraphe">le monde</p>
</body>
```
Quelle instruction JavaScript dois-je exécuter pour accéder au deuxième paragraphe
?

    document.paragraphes[1];
    document.getElementById(1);
    document.getElementById('deuxieme-paragraphe');
    document.deuxieme-paragraphe;

Soit la page HTML suivante:
```html
<body>
    <form>
        <input id="nom" value="Michel" />
        <input id="prenom" value="Jean" />
    </form>
</body>
```
Quelle instruction JavaScript dois-je exécuter pour modifier la valeur du champ
`<input>` dont l'identifiant est prenom ?

    document.getElementById('prenom').value = 'nouveau prénom';
    document.getElementById('prenom', 'nouveau prénom');
    document.prenom = 'nouveau prénom';
    document.input = '<input id="prenom" value="nouveau prénom" />'

Imaginez que vous disposez de la page HTML suivante:
```html
<bouton id="pouet">cliquez ici !</bouton>
```

Écrivez le code JavaScript nécéssaire pour que le message pouet ! s'affiche dans
un alert à chaque fois que l'utilisateur cliquera sur le bouton:

```js
Saisissez votre code Javascript ici
```

---
# TP8

Soit le fichier HTML suivant:
```html
<ul>
    <li class="displayed" id="first-item">premier</li>
    <li class="hidden">deuxième</li>
    <li class="hidden">troisième</li>
</ul>
```
Quelle est la fonction du DOM la plus directe pour:

Accéder au premier élément `<li>` depuis JavaScript ?
   
    getElementById()
    getElementByClassName()
    getElementsByClassName()
    getElementsByTagName()

Accéder à tous les éléments `<li>` portant la classe "hidden" ?

    getElementById()
    getElementByClassName()
    getElementsByClassName()
    getElementsByTagName()

Accéder à tous les éléments `<li>` ?

    getElementById()
    getElementByClassName()
    getElementsByClassName()
    getElementsByTagName()

Comment retirer la classe "hidden" des deux derniers éléments `<li>` ?

    document.getElementsByClassName('hidden').className = '';
    document.getElementsByClassName('hidden').setAttribute('class', '');
    document.getElementsByClassName('hidden').classList.remove('hidden');
    (il faut utiliser une boucle)


Imaginez que vous disposez de la page HTML suivante:
```html
<bouton id="mon-bouton">cliquez ici !</bouton>
```
Et de la règle CSS suivante:
```css
.hidden {
    display: none;
}
```
Écrivez le code JavaScript nécéssaire pour que la classe hidden soit ajoutée au
bouton une fois que l'utilisateur aura cliqué dessus, à l'aide de la propriété
classList .
```js
Saisissez votre code Javascript ici
```

---
# TP9
Qu'est-ce qu'un composant ?
- c'est le nom qu'on donne à tout programme JavaScript
- c'est le nom qu'on donne à tout div d'une page HTML
- c'est un module qui a été conçu pour être intégré par d'autres développeurs
- c'est une page web de documentation

Nous avons vu en cours que tout composant devait être conçu de manière à pouvoir
être intégré plusieurs fois sur une même page.
Parmi ces stratégies de conception, laquelle ne permet PAS l'intégration multiple d'un
composant:

    Faire en sorte que le composant s'applique des éléments groupés
    Demander à l'intégrateur d'appeler une fonction pour chaque intégration
    Demander à l'intégrateur de modifier le code source du composant

Soit le fichier HTML suivant:
```html
<ul>
    <li data-number="1">premier</li>
    <li data-number="2">deuxième</li>
</ul>
```
Comment récupérer la valeur de l'attribut data-number du deuxième élément `<li>`
?

    document.getElementById('2').data-number
    document.getElementsByTagName('li')[1].data-number
    document.getElementsByTagName('li').getAttribute('data-number')[1]
    document.getElementsByTagName('li')[1].getAttribute('data-number')

```js
var lien = document.getElementById('mon-lien-a');
```
Comment changer le titre du lien `<a>` (tel qu'il sera affiché à l'écran) référencé par la variable lien ?

    lien.title = 'nouveau titre';
    lien.innerHTML = 'nouveau titre';
    lien.href = 'nouveau titre';
    lien.setAttribute('title', 'nouveau titre');

Soit le code JS suivant:
```js
// supposons que boutons référence un ensemble de boutons
for (var i = 0; i < boutons.length; i++) {
    boutons[i].onclick = function() {
        alert('vous avez cliqué sur le bouton nº' + i);
    }
}
```
Que se passera-t-il quand on cliquera sur chaque bouton ?

    on verra l'alerte: "vous avez cliqué sur le bouton nºi"
    le numéro du bouton cliqué apparaitra dans un alert
    un numéro de bouton incorrect apparaitra dans un alert
    il ne se passera rien

Expliquez la raison du comportement observé à la question ci-dessus.

    il y a une erreur de syntaxe dans le code
    au moment du clic, la variable i vaudra boutons.length
    au moment du clic, la variable i vaudra 0
    la variable i n'est pas accessible dans le contexte de la fonction onclick

Quelle est la meilleure manière de résoudre le problème de la question ci-dessus ?

    il faut ralentir les itérations de la boucle
    il faut écrire une fonction onclick par bouton
    il faut passer la valeur de i en paramètre de notre fonction onclick
    il faut passer la valeur de i en paramètre d'une autre fonction, à chaque itération
    de la boucle

---
# TP10
Pour effectuer une requête AJAX GET, et afficher la réponse du serveur dans un
alert() , il faut instancier la classe XMLHttpRequest puis...

    ... appeler 2 méthodes, et définir 1 fonction
    ... appeler 1 méthode, et définir 2 fonctions
    ... appeler 3 méthodes
    ... définir 3 fonctions

J'ai écrit le code permettant d'envoyer une requête HTTP GET, mais rien ne se passe, et rien n'apparait dans la console.
Cela pourrait être dû à:

    une erreur de syntaxe
    une URL erronée
    l'oubli de l'appel à send()
    l'oubli de l'usage de JSON.parse()

Quel est le format le plus couramment utilisé de nos jours pour échanger des
informations en AJAX avec une API ?

    HTML
    XML
    JSON
    texte brut

```js
var xhr = new XMLHttpRequest();
xhr.open('GET', 'https://jsonplaceholder.typicode.com/users/1');
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
        var reponse = JSON.parse(xhr.responseText);
        alert(/* A SAISIR */);
    }
};
xhr.send();
```
Si on veut afficher la propriété email de l'objet contenu dans la réponse à notre
requête, par quoi faut-il replacer /* A SAISIR */ ?

    JSON.parse(xhr.responseText.email)
    xhr.responseText.email
    reponse.email
    responseText['email']

https://javascript.info/
https://github.com/javascript-tutorial/fr.javascript.info/tree/master/1-js/01-getting-started
https://www.foolishdeveloper.com/2022/03/responsive-image-slider.html
https://www.foolishdeveloper.com/2022/02/custom-video-player-using-javascript.html
https://www.foolishdeveloper.com/2022/02/faq-section-html-css.html
https://www.foolishdeveloper.com/2021/11/day-and-night-mode-javascript.html
https://www.codingnepalweb.com/create-todo-list-app-html-javascript/
https://freshman.tech/todo-list/
https://jsfiddle.net/ayoisaiah/0gxLab39/18/