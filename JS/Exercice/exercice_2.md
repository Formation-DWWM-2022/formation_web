## Q1

Créez un bouton qui en cliquant crée un nouvel élément sur écran en forme de carré rouge avec 100px de hauteur et de largeur. Chaque fois que le bouton est cliqué un nouveau carré doit apparaître sur l’écran.

## Q2

En utilisant le résultat du premier défi, chaque fois que l’utilisateur passe la souris sur un carré bascule sa couleur dans une couleur aléatoire générée par la fonction ci-dessous:

```js
function getRandomColor() {
 var letters = "0123456789ABCDEF";
 var color = "#";
 for (var i = 0; i < 6; i++) {
 color += letters[Math.floor(Math.random() * 16)];
 }
 return color;
}
var newColor = getRandomColor(); // #E943F0
```

## Q3

À partir du vecteur suivant:

```js
var noms = ["Diego", "Gabriel", "Lucas"];
```

Remplissez une liste `<ul>` en HTML avec les éléments suivants:

- Diego
- Gabriel
- Lucas

## Q4

Après le résultat de l’exercice précédent, ajoutez une entrée à l’écran et un bouton comme suit:

```js
<input type="text" name="nom">
<button onClick="ajouter()">Ajouter</button>
```

En cliquant sur le bouton, la fonction ajouter() doit être activée en ajoutant un nouvel élément à la liste de noms basée sur le nom rempli dans l’entrée et en rendant le nouvel élément à l’écran ensemble avec les autres éléments précédents. En outre, le contenu de l’entrée doit être effacé après le clic.

## Q5

Créer une fonction qui prend en charge l’âge d’un utilisateur et retourne une Promise qui, après 2 secondes, retourne si l’utilisateur est âgé ou non de 18 ans. Si l’utilisateur a plus de 18 ans le résultat devrait tomber dans le . then, sinon, dans le . catch

```js
fonction checaIité(âge) {
 / / Retourner une promise
}
vérification(20)
 .then(function() {
 console.log("Plus de 18");
 })
 .catch(function() {
 console.log("Moins de 18");
 });
```
