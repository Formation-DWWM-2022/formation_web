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
