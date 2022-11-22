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
