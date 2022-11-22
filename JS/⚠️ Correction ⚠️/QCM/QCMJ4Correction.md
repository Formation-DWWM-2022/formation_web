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