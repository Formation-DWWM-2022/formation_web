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