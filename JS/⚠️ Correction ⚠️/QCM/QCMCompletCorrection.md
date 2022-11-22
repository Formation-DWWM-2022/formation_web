# TP1

En pressant Cmd-Alt-J ou Ctrl-Shift-J

string

decimal

var maVariable;

maVariable;

maVariable = 4;

la valeur de la variable va être remplacée par la chaine de caractères.

# TP2

B

A

une boîte de niveau 1, et une boîte de niveau 2

car ils sont trop laxistes

```js
if (nombre === 4) {
    resultat = 'egal';
}
```

# TP3

4 fois
> Les instructions vont être exécutées pour chaque valeur de i entre 0 et 4
(non compris), soit 0, 1, 2, puis 3. Ce qui fait 4 itérations.

3 fois
> Les instructions vont être exécutées pour chaque valeur de i entre 3 et 1
(compris), soit 3, 2, puis 1. Ce qui fait 3 itérations.

```js
for ( var i = 0; i < 50; i++ ) {
    console.log('Bonjour!');
}
```

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

# TP7
src

> - href est utilisé dans les éléments `<link>` et `<a>`
> - scr est mal épelé
> - type (optionnel) permet d'expliciter le langage employé dans le fichier, si autre que JavaScript
> L'attribut src est à utiliser dans l'élément `<script>` , et il ne faut pas oublier
d'ajouter une balise de fermeture `</script>` .

l'alert s'affichera à chaque (re)chargement de la page

> Quand on intègre un fichier .js à une page HTML (à l'aide de l'élément
`<script>` ), cela a pour effet d'exécuter les instructions du fichier à chaque
(re)chargement de la page dans le navigateur.
Pour que l' alert soit déclenché par un clic de l'utilisateur, il faut écrire
l'instruction à l'intérieur d'une définition de fonction affectée à la propriété
onclick d'un élément (ex: `<button>` ).

document.getElementById('deuxieme-paragraphe');

> L'API du DOM fournit la fonction getElementById() pour accéder à un élément
en connaissant son identifiant. Il suffit de passer l'identifiant en paramètre.

document.getElementById('prenom').value = 'nouveau prénom';

> Seule la première solution est valide.
Comme d'habitude, on commence par accéder au champ `<input>` en
spécifiant son id , puis on affecte une nouvelle valeur à la propriété value de
l'objet retourné par getElementById() .

```js
document.getElementById('pouet').onclick = function() {
    alert('pouet !');
};
```

# TP8
getElementById()

>- le deuxième choix n'existe pas, car getElement s ByClassName() prend
un s ;
> - le premier choix est plus direct, car le premier élément `<li>` porte un
attribut id (unique), et que getElementById() a l'avantage de le retourner
directement, alors que les autres retournent un tableau d'éléments.

getElementsByClassName()

> Pour référencer les éléments par classe, il faut utiliser
getElementsByClassName() .
Note: Cette fonction retourne un tableau d'éléments.

getElementsByTagName()

> Pour référencer les éléments par nom d'élément (appelé tag name en anglais), il
faut utiliser getElementsByTagName() .
Note: Cette fonction retourne un tableau d'éléments.

(il faut utiliser une boucle)

> className , setAttribute() et classList ne sont applicables que sur un
objet JavaScript représentant un élément HTML (ex: retourné par
getElementById() ), or document.getElementsByClassName('hidden')
retourne un tableau d'éléments.
Donc on ne peut pas utiliser ces propriétés/fonctions directement sur le tableau
retourné par document.getElementsByClassName('hidden') => Il faut utiliser
une boucle pour appeler classList.remove('hidden') sur chaque élément du
tableau.

```js
var bouton = document.getElementById('mon-bouton');
bouton.onclick = function() {
    bouton.classList.add('hidden');
};
```

# TP9

c'est un module qui a été conçu pour être intégré par d'autres développeurs

> Un composant est un module qui a été conçu pour être intégré par d'autres
développeurs.
Sur le Web, un composant est généralement composé d'un script JavaScript, et
éventuellement d'un fichier CSS en plus. Il est aussi accompagné d'une page
qui explique aux développeurs comment intégrer ce composant sur leur page.

Demander à l'intégrateur de modifier le code source du composant
> Tout composant doit être conçu de manière à ce que l'intégrateur n'ait pas
besoin de modifier le code source du composant, ni même de lire ce code
source.
Afin que le composant puisse s'instancier plus d'une fois sur une même page, le
développeur du composant peut s'y prendre de différentes manières,
notamment:
>
> - faire en sorte que le composant s'intègre à partir de groupes d'éléments.
(exemple d'instructions: chaque `<div>` contenant des `<img>` sera
transformé en galerie, au lieu de toutes les `<img>` de la page seront
regroupées dans une même galerie)
> - ou demander à l'intégrateur d'appeler une fonction pour chaque intégration.
(exemple d'instructions: pour chaque galerie à intégrer sur votre page,
appeler la fonction creerGalerie() en passant le `<div>` concerné en
paramètre)

document.getElementsByTagName['li'](1).getAttribute('data-number')
>
> - pour accéder au deuxième élément `<li>` , il faut utiliser la fonction
getElementsByClassName() puis accéder au 2ème élément du tableau
retourné par cet appel à l'aide de [1]
> - seuls les attributs standard définis par le DOM (ex: id, href, src...) sont
accessibles directement par des propriétés d'objet de classe Element, via la
notation pointée.
> - comme data-number n'est pas une propriété standard, il faut appeler la
méthode getAttribute() sur l'objet de classe Element pour y accéder.

lien.innerHTML = 'nouveau titre';
>
> - en HTML, le titre visible d'un lien est défini par le contenu de l'élément (ce
qu'il y a entre les balises `<a>` et `</a>` ); il ne faut donc pas modifier un
attribut de ce lien (ex: title et href ) mais son contenu.
> - pour modifier le contenu d'un élément, il faut utiliser la propriété
innerHTML .

un numéro de bouton incorrect apparaitra dans un alert
> réponse: un numéro de bouton incorrect apparaitra dans un alert

au moment du clic, la variable i vaudra boutons.length
>
> - Au moment du clic sur un élément, le navigateur appelle la fonction
rattachée à sa propriété onclick . Notre fonction onclick a bien accès à
la variable i , car cette fonction est définie dans le même contexte (scope)
que celui dans lequel cette variable a été créée.
il y a une erreur de syntaxe dans le code
au moment du clic, la variable i vaudra boutons.length
au moment du clic, la variable i vaudra 0
la variable i n'est pas accessible dans le contexte de la fonction onclick
> - Par contre, lorsque le navigateur appellera cette fonction (au moment où
l'utilisateur aura cliqué sur un bouton), la boucle aura déjà fini d'itérer, et
valeur de i aura donc atteint sa valeur maximale: boutons.length .

il faut passer la valeur de i en paramètre d'une autre fonction, à chaque itération
de la boucle
> Pour que la fonction onclick qu'on définit pour chaque bouton conserve la
valeur de la variable i , il faut que cette fonction soit définie dans un contexte
où la valeur sera stockée dans une variable séparée.
Vu que, en JavaScript, chaque variable est rattachée à la fonction dans laquelle
elle est créée, la bonne pratique consiste à définir une fonction qui prendra la
valeur de i en paramètre, puis retournera la fonction onclick qui utilisera
cette valeur.

# TP10

... appeler 2 méthodes, et dé

```js
var xhr = new XMLHttpRequest();
xhr.open('GET', 'https://jsonplaceholder.typicode.com/users/1');
xhr.onreadystatechange = function() {
if (xhr.readyState === 4) {
        alert(xhr.responseText);
    }
};
xhr.send();
```

> Dans le code de cette requête, on:
> - instancie la classe XMLHttpRequest dans la variable xhr ,
> - définit 1 fonction qu'on affecte à la propriété onreadystatechange de
xhr ,
> - et on appelle 2 méthodes de xhr : open() et send() .

> À noter que alert() est un appel de fonction, et non un appel de méthode, car
cette fonction n'est pas rattachée à une instance de classe.

l'oubli de l'appel à send()
> Dans ces trois cas, on aurait obtenu une erreur dans la console:
> - une erreur de syntaxe
> - une URL erronée
> - l'oubli de l'usage de JSON.parse()

> La bonne réponse est donc: l'oubli de l'appel à send() .
En effet, c'est cette méthode qui permet l'envoi de la requête. Sans cela, notre
code n'aura eu aucun effet, sauf l'initialisation de la requête dans l'instance
xhr .

JSON
> AJAX (Asynchronous Javascript And XML) a été initialement conçu pour
échanger des informations au format XML, très en vogue dans les années 90,
mais il permet d'utiliser n'importe quel format sérialisable sous forme d'une
chaine de caractères.
Aujourd'hui, on utilise majoritairement le format JSON dans les requêtes AJAX,
car il a l'avantage d'être concis (et peu consommateur de bande passante),
facilement lisible à l'oeil nu, et directement manipulable en JavaScript.

reponse.email

> - la propriété xhr.responseText est de type string (c'est la forme
sérialisée de l'objet contenu dans la réponse à la requête), donc on ne peut
pas utiliser directement la notation pointée pour accéder à la propriété
email demandée.
> - JSON.parse() a été appelé sur xhr.responseText , et l'objet résultant est
stocké dans la variable reponse . Il n'est donc pas nécéssaire d'appeler
JSON.parse() à nouveau.
> - responseText['email'] causerait une erreur car responseText est une
propriété de l'objet xhr , et non une variable existante.

> Il va donc falloir extraire la propriété email de l'objet contenu dans la variable
reponse (qui a été désérialisé par JSON.parse() ), en utilisant la notation
pointée: reponse.email .