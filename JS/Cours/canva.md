# Présentation de l’élément HTML canvas et de l’API Canvas

L’élément HTML canvas est un élément qui va servir de conteneur et au sein duquel on va pouvoir dessiner toutes sortes de graphiques en utilisant le JavaScript.

On va pouvoir dessiner au sein d’un élément canvas en utilisant les propriétés et méthodes fournies par l’API JavaScript Canvas ou en utilisant celles de l’API WebGL.

La différence principale entre ces deux API réside dans le fait que Canvas est centré autour du dessin 2D tandis que WebGL va plutôt être utilisé pour du 3D. Dans ce cours, nous allons nous concentrer sur l’API Canvas uniquement.

## L’élément HTML canvas

L’élément HTML canvas va servir de conteneur pour nos dessins et figures. Nous allons dessiner à l’intérieur de celui-ci.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/06/javascript-support-html-presentation-element-canvas.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/06/javascript-exemple-definition-canvas-html.png)

Par défaut, l’élément canvas est représenté visuellement par une zone rectangulaire de 300px de large par 150px de haut dans la page HTML, est transparent et ne possède ni contenu, ni bordure.

Pour modifier la taille d’un élément canvas, on peut soit utiliser les attributs HTML width (pour la largeur) et height (pour la hauteur), soit les propriétés width et height de l’interface HTMLCanvasElement qui hérite de l’interface DOM HTMLElement qu’on connait bien.

## Dessiner dans un canevas en JavaScript la théorie

Pour dessiner au sein d’un élément canvas en JavaScript, nous allons devoir suivre les étapes suivantes :

1. Accéder à l’élément canvas en JavaScript ;
2. Accéder au contexte de rendu du canevas ;
3. Utiliser les propriétés et méthodes adaptées pour dessiner.

Pour dessiner dans un élément canvas en JavaScript, il va avant tout falloir accéder à cet élément. Pour cela, on peut utiliser document.querySelector() ou document.getElementById() par exemple.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/06/javascript-acces-element-canvas.png)

Ensuite, il va falloir accéder au contexte de rendu du canevas ou « l’extraire ». L’élément canvas crée en effet une surface de dessin qui va exposer plusieurs contextes sur lesquels on va se baser pour dessiner.

Les deux contextes les plus connus et utilisés sont le contexte 2D et le contexte 3D. Encore une fois, nous allons ici nous concentrer sur le contexte 2D.

Pour accéder à ce contexte 2D, nous allons utiliser la méthode getContext() de l’interface HTMLCanvasElement.

On va passer le contexte auquel on va accéder (2d dans notre cas) en argument de cette méthode.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/06/javascript-acces-contexte-canvas.png)

La méthode getContext() renvoie un objet appartenant à l’interface CanvasRenderingContext2D. Nous allons utiliser cet objet pour accéder aux méthodes de cette interface qui vont nous permettre de dessiner. 

# Dessiner des rectangles dans un élément HTML canvas en Javascript

L’élément canvas ne supporte qu’un type de figure géométrique : le rectangle. Les autres types de figures vont êtes construites en traçant des lignes à partir de coordonnées de points qu’on va donner.

On va pouvoir dessiner deux types de rectangles au sein de notre canevas : des rectangles vides et des rectangles pleins.

## Dessiner un rectangle vide

Pour dessiner un rectangle vide, nous allons utiliser la méthode strokeRect() avec notre objet CanvasRenderingContext2D.

On va passer quatre arguments à cette méthode : les deux premiers correspondent respectivement au retrait de notre rectangle par rapport aux bords gauche et supérieur de notre canevas tandis que les deux autres servent à indiquer la largeur et la hauteur de notre rectangle.

Attention à ne pas préciser d’unités avec les arguments de strokeRect() : en effet, la plupart des longueurs sont automatiquement converties en équivalent pixel par le canevas lui-même et on ne précisera donc jamais d’unité pour éviter de dessiner des figures qui vont être déformées.

En utilisant strokeRect(), seul le contour du rectangle sera dessiné. Ce contour sera dessiné en utilisant la valeur de la propriété strokeStyle qui appartient également à CanvasRenderingContext2D.

La propriété strokeStyle peut prendre une couleur, un dégradé ou un motif.

Pour dessiner un rectangle vide dans notre canevas, on va donc déjà commencer par fournir une valeur à la propriété strokeStyle puis on utilisera la méthode strokeRect() pour définir l’emplacement et la taille de notre rectangle vide comme ceci.

Attention ici : si on exécute la méthode strokeRect() avant d’avoir passé une valeur à strokeStyle, cette valeur ne pourra pas être utilisée pour dessiner les contours de notre rectangle vide.

```js
let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

ctx.strokeStyle = '#4444CC'; //Nuance de bleu
ctx.strokeRect(50, 25, 200, 100);
```

## Dessiner un rectangle plein

Pour dessiner un rectangle plein dans notre canevas, on va plutôt utiliser la méthode fillRect() de l’interface CanvasRenderingContext2D.

Cette méthode s’utilise exactement de la même façon que strokeRect() et prend donc également 4 arguments correspondent au retrait de notre rectangle par rapport aux bords gauche et supérieur de notre canevas et servent à indiquer la largeur et la hauteur de notre rectangle.

Une nouvelle fois, on ne précisera pas d’unités lorsqu’on passe des arguments à fillRect().

La méthode fillRect() va nous permettre de dessiner un rectangle plein. Le remplissage du rectangle va se faire à partir de la valeur de la propriété fillStyle cette fois-ci.

La propriété fillStyle, tout comme strokeStyle, peut prendre une couleur, un dégradé ou un motif qui va ensuite être utilisé pour remplir les figures du canevas.

On va donc à nouveau devoir commencer par fournir une valeur à fillStyle puis utiliser ensuite fillRect()pour dessiner un rectangle plein dans le canevas.

```js
let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

ctx.strokeStyle = '#4444CC'; //Nuance de bleu
ctx.strokeRect(50, 25, 200, 100);
```

## Dessiner plusieurs rectangles dans le canevas

On va tout à fait pouvoir dessiner plusieurs figures à la suite dans un canevas et notamment dessiner plusieurs rectangles. La dernière figure créée sera au-dessus (visuellement) de la précédente et etc.

Si on souhaite dessiner plusieurs figures pleines ou plusieurs figures vides avec des styles différents, il faudra bien penser à modifier la valeur des propriétés strokeStyle et fillStyle afin d’obtenir les styles souhaités.

```js
let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

ctx.fillStyle = '#4444CC'; //Nuance de bleu
ctx.fillRect(50, 25, 200, 100);

ctx.fillStyle = '#DDDD44'; //Nuance de jaune
ctx.fillRect(350, 25, 200, 100);

ctx.strokeStyle = 'purple'; //Violet
ctx.strokeRect(50, 175, 200, 100);

ctx.strokeRect(350, 175, 200, 100);
```
 
## Effacer une zone rectangulaire dans le canevas

On va également pouvoir effacer une zone rectangulaire dans notre élément canvas en utilisant cette fois-ci la méthode clearRect().

Cette méthode va prendre 4 arguments qui vont correspondre aux mêmes données que les méthodes précédentes et va tout simplement effacer les dessins dans la zone précisée.

```js
let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

ctx.fillStyle = '#4444CC'; //Nuance de bleu
ctx.fillRect(50, 25, 200, 100);

ctx.fillStyle = '#DDDD44'; //Nuance de jaune
ctx.fillRect(350, 25, 200, 100);

ctx.strokeStyle = 'purple'; //Violet
ctx.strokeRect(50, 175, 200, 100);

ctx.strokeRect(350, 175, 200, 100);

ctx.clearRect(150, 75, 300, 150);
```

# Définir des tracés pour dessiner des formes dans un canevas en JavaScript

En dehors des rectangles, on va également pouvoir définir des tracés pour créer toutes formes de figures et de dessins.

Un tracé va être représenté par un point d’origine, une suite de points intermédiaire et un point d’arrivée. Des segments vont ensuite être tracés pour relier les différents points entre eux pour former des figures plus complexes.

On va donc devoir suivre les étapes suivantes pour créer des figures complexes :

1. Définition d’un tracé (points d’origine, intermédiaires et d’arrivée) ;
2. Choix de la forme (courbé, droit, etc.) et de la couleur de chaque segment ;
3. Remplissage de l’espace entre les segments ou définition des contours ;
4. Fermeture du tracé.

## Dessiner une ligne

Pour démarrer un tracé, on va déjà utiliser la méthode beginPath(). Cette méthode ne prend pas d’argument et sert simplement à signaler qu’on démarre un tracé.

Chaque tracé va posséder ses propres styles (couleur, épaisseur, forme) mais on ne va pouvoir appliquer qu’un style à chaque tracé. En d’autres mots, il faudra créer un nouveau tracé à chaque fois qu’on souhaite changer de style.

Pour définir une ligne, nous allons utiliser la méthode lineTo(). Cette méthode prend en arguments une paire de coordonnées qui indiquent le point final de la ligne.

Le point de départ de la ligne va dépendre du tracé précédent (par défaut, la fin d’un tracé correspond au début du tracé suivant dans un canevas). On va également pouvoir définir un point de départ pour notre ligne grâce à la méthode moveTo().

La méthode moveTo() permet de définir un point à partir duquel faire quelque chose. Cette méthode prend une paire de coordonnées en arguments qui correspondent à la distance par rapport aux bords gauche et haut du canevas.

Pour dessiner la ligne en soi (pour qu’elle soit visible), on utilisera la méthode stroke() qui permet d’appliquer les styles définis avec strokeStyle à notre ligne.

Notez qu’on va également pouvoir choisir l’épaisseur de notre ligne en passant une valeur (sans unité) à la propriété lineWidth.

```js
let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

ctx.beginPath();
ctx.moveTo(50, 25);
ctx.lineTo(250, 125);
ctx.strokeStyle= '#4488EE'; //Nuance de bleu
ctx.lineWidth= 3;
ctx.stroke();
```

## Dessiner des figures en utilisant plusieurs lignes à la suite

On va pouvoir dessiner toutes sortes de figures en dessinant plusieurs lignes à la suite dans le canevas. L’une des figures les plus simples à créer est le triangle.

Pour dessiner plusieurs lignes à la suite, il suffit d’utiliser plusieurs fois lineTo() : les coordonnées du point défini par la première méthode lineTo() serviront de point de départ pour la ligne tracé par le deuxième appel à la méthode lineTo() et etc.

Pour ne dessiner que les contours du triangle et ne pas remplir l’intérieur, on va à nouveau utiliser la méthode stroke(). Pour remplir notre triangle, on utilisera plutôt la méthode fill() qui va appliquer les styles définis avec fillStyle à notre figure.

A noter : lorsqu’on définit plusieurs tracés dans un canevas, il est essentiel de fermer un tracé avec la méthode closePath() avant d’en définir un autre afin que ceux-ci s’affichent bien. La méthode closePath() permet en fait le retour du stylo au point de départ du sous-traçé courant, en ajoutant si nécessaire une ligne droite entre le point courant et le point rejoint.

Un appel à la méthode fill() ferme automatiquement le tracé (c’est la raison pour laquelle on l’appelle en dernier) et donc closePath() n’a aucun effet et n’est pas nécessaire. Cependant, si on utilise stroke(), le tracé n’est pas fermé et il faut donc absolument utiliser closePath().

```js
document.getElementById('c1');
let ctx = canvas.getContext('2d');

ctx.beginPath();
ctx.moveTo(25, 25);
ctx.lineTo(25, 125);
ctx.lineTo(125, 125);
ctx.lineTo(25, 25);
ctx.strokeStyle = '#4488EE'; //Nuance de bleu
ctx.lineWidth = 3;
ctx.closePath();
ctx.stroke();

ctx.beginPath();
ctx.moveTo(275, 25);
ctx.lineTo(275, 125);
ctx.lineTo(175, 125);
ctx.lineTo(275, 25);
ctx.fillStyle = 'red'; 
ctx.fill();

ctx.beginPath();
ctx.moveTo(150, 25);
ctx.lineTo(150, 125);
ctx.strokeStyle = 'black';
ctx.lineWidth = 1;
ctx.closePath();
ctx.stroke();
```

Bien évidemment, on va de cette manière pouvoir créer de la même façon toutes sortes de figures géométriques en ajoutant autant de lineTo() qu’on le souhaite.

## Dessiner plusieurs lignes avec des arrivées et origines différentes

Notez que pour créer plusieurs lignes indépendantes, il suffit d’utiliser moveTo() pour définir de nouvelles coordonnées de départ pour chaque nouvelle ligne.

```js
let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

ctx.beginPath();
ctx.moveTo(50, 25);
ctx.lineTo(250, 25);
ctx.moveTo(275, 50);
ctx.lineTo(275, 100);
ctx.moveTo(250, 125);
ctx.lineTo(50, 125);
ctx.moveTo(25, 100);
ctx.lineTo(25, 50);
ctx.strokeStyle = 'black';
ctx.lineWidth = 1;
ctx.stroke();
```

## Dessiner des arcs de cercle

Pour dessiner des arcs de cercle, on va pouvoir utiliser l’une des deux méthodes arc() ou arcTo().

La méthode arc() prend six arguments :

1. Un nombre correspondant au décalage du point central de l’arc de cercle par rapport au bord gauche du canvas ;
2. Un nombre correspondant au décalage du point central de l’arc de cercle par rapport au bord supérieur du canvas ;
3. Un nombre correspondant à la taille du rayon ;
4. L’angle de départ, exprimé en radians ;
5. L’angle de fin, exprimé en radians ;
6. Un booléen (facultatif) qui indique si l’arc de cercle doit être dessiné dans le sens des aiguilles d’une montre (false, valeur par défaut) ou dans le sens inverse (true). 

Pour rappel, un tour de cercle complet = 360deg = 2PI radian. Pour convertir facilement les degrés en radians, vous pouvez retenir l’équation suivante : radians = PI*deg / 180. Pour obtenir la valeur de PI, on peut utiliser Math.PI.

De la même façon que précédemment, on va pouvoir dessiner des arcs de cercle vides ou pleins en utilisant stroke() ou fill().

```js
let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

//Arc de cercle vert
ctx.beginPath();
ctx.lineWidth = '5';
ctx.strokeStyle = '#4C8';
ctx.arc(50,50,35,0.8*Math.PI, 2*Math.PI);
ctx.closePath();
ctx.stroke();

//Cercle complet violet
ctx.beginPath();
ctx.lineWidth = '5';
ctx.fillStyle = '#A4A';
ctx.arc(150,85,40,0,2*Math.PI);
ctx.fill();

//Arc de cercle bleu
ctx.beginPath();
ctx.lineWidth = '5';
ctx.strokeStyle = '#48C';
ctx.arc(250,50,35,0.2*Math.PI, Math.PI, true);
ctx.closePath();
ctx.stroke();
```

La méthode arcTo() va elle se servir de tangentes pour dessiner des arcs de cercle. On va devoir lui passer 5 arguments : une paire de coordonnées définissant l’emplacement du premier point de contrôle, une autre paire de coordonnées définissant l’emplacement du deuxième point de contrôle et le rayon du cercle.

Note : La tangente à une courbe est une droite qui touche cette courbe en un seul point, sans jamais la croiser. La première tangente va être tracée grâce au point de départ et au premier point de contrôle tandis que la seconde tangente va être tracée grâce au premier et au deuxième point de contrôle.

En fond, ArcTo() va tracer deux segments qui vont être utilisés comme tangentes pour tracer notre arc de cercle : un premier segment entre le point de départ du tracé et le premier point de contrôle et un deuxième segmente entre le premier point de contrôle et le deuxième point de contrôle.

```js
let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

ctx.beginPath();
ctx.lineWidth = '5';
ctx.strokeStyle = '#A4A';
ctx.moveTo(50, 25);
ctx.arcTo(50, 125, 250, 50, 50);
ctx.stroke();
```

Notez que si on indique une taille de rayon aberrante, c’est-à-dire une taille trop grande pour que l’arc puisse tenir entre les points indiqués, on obtiendra des comportements inattendus avec un arc qui risque de ne pas apparaitre à l’endroit attendu.

## Dessiner avec les courbes de Bézier

Les courbes de Bézier sont des courbes définies à partir d’un certain nombre de points. La théorie mathématique derrière la création de ces courbes est relativement complexe et dépasse le cadre de ce cours, je ne l’expliquerai donc pas ici.

Sachez simplement que si un jour vous avez besoin de les utiliser, vous disposez des méthodes bezierCurveTo() et quadraticCurveTo().

La méthode bezierCurveTo() prend 6 arguments : une première paire de coordonnées indiquant l’emplacement d’un premier point de contrôle, une deuxième paire de coordonnées indiquant l’emplacement d’un deuxième point de contrôle et une troisième paire de coordonnées indiquant l’emplacement du point d’arrivée.

La méthode quadraticCurveTo() n’utilise qu’un point de contrôle et ne va donc avoir besoin que de 4 arguments.

Ces points de contrôle vont servir à déterminer un certain arc en traçant de multiples tangentes entre le point de départ et d’arrivée. 