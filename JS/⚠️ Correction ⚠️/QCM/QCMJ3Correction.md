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