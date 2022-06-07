# Exercices 1 :
## Q1 :  
Créer une fonction qui compte tenu de l’objet suivant:
```js
var adresse = {
		rue "Rue des pins",
		numéro : 1293,
		quartier : "Centro",
		ville : "São Paulo",
		uf : "SP"
};
```
Retourner le contenu suivant:
L’utilisateur habite à São Paulo / SP, dans le quartier Centro, sur la rue "Rua dos Pinheiros" avec nº 1293.

## Q2 : 
Créer une fonction qui donne un intervalle (entre x et y) affiche tous les nombres pairs:
```js
function paires(x, y) {
// code ici
}
paires(32, 321);
```

## Q3 :
Saisissez une fonction qui vérifie si le tableau de compétences passé possède la capacité "Javascript" et retourne un booléen true/false s’il existe ou non.
```js
fonction temHabilité(skills) {
// code ici
}
var skills = ["Javascript", "Reactjs", "React Native"];
temHabilité(skills); // true ou false
```
> Astuce : pour vérifier si un vecteur contient une valeur, utilisez la méthode indexOf.

## Q4 :
Écrivez une fonction qui donne un total d’années d’étude renvoie à quel point l’utilisateur est expérimenté:
```js
function experiencia(années) {
// code ici
}
var anosEstudo = 7;
expérience(anosEstudo);
/ / De 0-1 an : Débutant
/ / de 1 à 3 ans : Intermédiaire
// de 3 à 6 ans : Avancé
// De 7 ci-dessus : Maître Jedi
```

## Q5 :

Compte tenu du vecteur d’objets suivant:
```js
var usuarios = [
{
nom : "Diego",
compétences : ["Javascript", "Reactjs", "Redux"]
},
{
nom : "Gabriel",
compétences : ["Vuejs", "Ruby on Rails", "Elixir"]
}
];
```
Écrivez une fonction qui produit le résultat suivant:

Diego possède les compétences : Javascript, Reactjs, Redux Gabriel possède les compétences : Vuejs, Ruby on Rails, Elixir

> Astuce : Pour parcourir un vecteur, vous devez utiliser la syntaxe for...of et pour fusionner les valeurs d’un tableau avec un séparateur, utilisez join.

# Exercice 2 :
## Q1 :
Créez un bouton qui en cliquant crée un nouvel élément sur écran en forme de carré rouge avec 100px de hauteur et de largeur. Chaque fois que le bouton est cliqué un nouveau carré doit apparaître sur l’écran.

## Q2 :
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

## Q3 :
À partir du vecteur suivant:
```js
var noms = ["Diego", "Gabriel", "Lucas"];
```

Remplissez une liste `<ul>` en HTML avec les éléments suivants:

- Diego 
- Gabriel 
- Lucas

## Q4 :

Après le résultat de l’exercice précédent, ajoutez une entrée à l’écran et un bouton comme suit:

```js
<input type="text" name="nom">
<button onClick="ajouter()">Ajouter</button>
```

En cliquant sur le bouton, la fonction ajouter() doit être activée en ajoutant un nouvel élément à la liste de noms basée sur le nom rempli dans l’entrée et en rendant le nouvel élément à l’écran ensemble avec les autres éléments précédents. En outre, le contenu de l’entrée doit être effacé après le clic.

# Exercice 3 :
Application créée ToDoList dans laquelle vous stockez les données sur localStorage. Crée et supprime des éléments dans la liste ToDoList.

# Exercice 4 :
## Q1 :
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

## Q2 :
Créez un écran avec un `<input>` qui doit recevoir le nom d’utilisateur dans Github. Après avoir entré le nom de l’utilisateur et cliqué sur le bouton Rechercher l’application, vous devez chercher dans l’API de Github (comme URL ci-dessous) les données des dépôts de l’utilisateur et les afficher à l’écran : URL d’exemple : https://api.github.com/users/diego3g/repos Il suffit de changer "diego3g" par le nom de l’utilisateur.

```js
<input type="text" name="user">
<button onclick="">Ajouter</button>
```

Après avoir rempli l’entrée et l’ajout, la liste suivante doit apparaître ci-dessous:

```js
<ul>
 <li>repo1</li>
 <li>repo2</li>
 <li>repo3</li>
 <li>repo4</li>
 <li>repo5</li>
</ul>
```

## Q3 
À partir du résultat de l’exemple précédent, ajoutez un indicateur de chargement à l’écran à la place de la liste uniquement lorsque la requête est en cours :

```js
<li>Chargement...</li>
```

Ajoutez également un message d’erreur à l’écran si l’utilisateur n’est pas présent sur Github. 

> Astuce : Si l’utilisateur n’existe pas, la requête tombera sur .catch avec code d’erreur 404.
