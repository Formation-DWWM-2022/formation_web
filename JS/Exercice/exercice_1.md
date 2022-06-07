# Exercice 0

A l'aide de la fonction prompt(). Insérer dans la page HTML la chaine de caractères inscrites dans la boite de dialogue.

# Exercice 1

Créer une variable result qui contient la somme des variables a et b. Afficher le résultat de la somme dans une boite de dialogue.

# Exercice 2

Modifier le code ci-dessous pour calculer la moyenne des notes.

```js
let note_maths = 11;
let note_francais = 9;
let note_hg = 16;
let ??? = ???;
alert('La moyenne est de ' + ???);
```

# Exercice 3

Déclarer une variable budget qui contient le budget de votre choix. Déclarer une variable achats qui contient le montant de votre choix. Afficher si le budget permet de payer les achats.

# Exercice 4 - Prix HT > TTC, level 1

A l'aide de la fonction prompt(), demander un prix HT à l'utilisateur puis insérer le prix TTC (TVA 20 %) dans la page HTML à l'aide de document.body.innerText.

# Exercice 5 - Prix HT > TTC, level 2

A l'aide de la fonction prompt(), demander un prix HT puis un taux de la TVA à l'utilisateur puis insérer le prix TTC dans la page HTML à l'aide de document.body.innerText.

# Exercice 6 - Prix HT > TTC, level 3

A l'aide de la fonction prompt(), demander un prix HT puis un taux de la TVA à l'utilisateur puis insérer le prix TTC dans la page HTML à l'aide de document.body.innerHTML. Si le prix TTC est strictement supérieur à 100 on affichera le prix en rouge sinon en vert. Pour simplifier on utilisera les bouts de code suivants sur l'élément HTML de votre choix :

- Rouge : style="color: red;"
- Vert : style="color: green;"

Par exemple : `<h1 style="color: red;">...</h1>`

# Exercice 7

A partir de la page HTML suivante, remplacer le contenu de l'élément HTML #cocktail par Long Island Iced Tea à l'aide d'un script JS.

```html
<body>
   <h1>Mes <span>cocktails préférés</span></h1>
   <p>Mojito</p>
   <p>Gin Fizz</p>
   <p>Bloody mary<p>
   <p>Long Island Iced Tea</p>
   <p>Mais si je ne devais qu'en retenir qu'un : <strong id="cocktail"></strong></p>
</body>
```

# Exercice 8

Grâce à la boucle de votre choix, afficher en console tous les multiples de 10 jusqu'à 1000.

# Exercice 9

Grâce à la fonction prompt(), demander l'âge de l'utilisateur, puis à l'aide d'une condition, déterminer et afficher via une boite de dialogue si l'utilisateur est mineur ou majeur. Pour cet exercice on considère qu'un individu est majeur à partir de 18 ans.

# Exercice 10

En utilisant la boucle while(), afficher dans la console tous les codes postaux possibles pour le département 77.

# Exercice 11

En utilisant la boucle for, afficher la table de multiplication du chiffre 5 dans la page HTML.

# Exercice 12

En utilisant deux boucles for, écrire un script qui produit le résultat ci-dessous, dans la page HTML.

    1
    22
    333
    4444
    55555

# Exercice 13

Déclarer une variable avec le nom de votre choix et avec la valeur 0. Tant que cette variable n'atteint pas 20, il faut :

- l'afficher dans la page HTML;
- incrémenter sa valeur de 2 ;

# Exercice 14 - Tableau, level 1

Construire un tableau HTML, sans en-tête, avec X lignes et avec Y colonnes dans un élément `<table>`. Ajouter dans les celulles un contenu aléatoire de votre choix. Enfin, placer ce tableau dans la page HTML.

# Exercice 15 - Tableau, level 2

Avec le code de l'exercice précédent (14) demander via la fonction prompt(), X lignes et Y colonnes puis constuire le tableau HTML et l'insérer dans la page HTML.

# Exercice 16 - Nombre aléatoire, level 1

L'instruction JS suivante permet d'obtenir un nombre aléatoire entre 0 et 100. La limite haute (100) n'est pas incluse dans le tirage aléatoire.

```js
Math.floor(Math.random() * 100);
```

A l'aide de cette instruction, insérer dans la page HTML 10 nombres aléatoires sous la forme d'une liste à puces.

# Exercice 17 - Nombre aléatoire, level 2

A l'aide du code de l'exercice précédent, insérer dans la page HTML 10 nombres aléatoires sous la forme d'une liste à puces, compris entre 0 et 10 (inclus). Via une condition, afficher en console si le nombre 10 fait partie du tirage.

# Exercice 18 - Nombre aléatoire, level 3

A l'aide du code de l'exercice précédent, insérer dans la page HTML 10 nombres aléatoires sous la forme d'une liste à puces, compris entre 0 et 10 (inclus). Via une condition, compter le nombre de fois où le nombre 10 fait partie du tirage. A la fin du script, insérer en plus dans la page HTML le nombre en question.

# Exercice 19 - Nombre aléatoire et arrière-plan, level 4

L'instruction JS suivante permet de modifier la couleur d'arrière-plan de l'élément HTML <body>.
JS
```js
document.body.style.background = 'red'; // Modifie la couleur d'arrière-plan en rouge (couleur texte CSS)
document.body.style.background = 'rgb(69, 24, 67)'; // Modifie la couleur d'arrière-plan en violet (couleur en RGB)
document.body.style.background = '#FF1493'; // Modifie la couleur d'arrière-plan en violet (couleur en hexadécimal)
```
A l'aide du code de l'exercice précédent et de cette nouvelle instruction, écrire un code JS qui modifie aléatoirement la couleur d'arrière-plan de l'élément HTML <body>.

# Exercice 20 - Nombre aléatoire et images, level 5

Le service Picsum permet d'obtenir des images libres de droit depuis une adresse web. Par exemple, le lien ci-dessous affiche l'image avec l'identifiant #42 en résolution 350x350 :
https://picsum.photos/id/42/350/350

A l'aide de ce service, insérer dans la page HTML 12 images alétoires depuis le service Picsum.