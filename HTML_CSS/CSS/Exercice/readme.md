# Exercice 1
Tous les exercices de cette page utilisent le code HTML ci-après comme base.

``` html
<section>
	<h1>Mon titre 1</h1>
	<article>
		<h2>Mon Titre 2</h2>
		<p>Premier paragraphe</p>
		<p class="maclasse">Deuxième paragraphe</p>
		<p>Troisième paragraphe</p>
		<p id="monid">Quatrième paragraphe</p>
	</article>
	<article>
		<h2 class="maclasse">Mon Titre 3</h2>
		<p id="superid" class="maclasse">Cinquième paragraphe</p>
		<p>Sixième paragraphe</p>
	</article>
</section>
```

## Q1
Pour cet exercice, il faut :
- Changer la couleur du texte de tous les paragraphes
- Changer la couleur de fond et ajouter une marges intérieure aux éléments de classe maclasse
- Ajouter une bordure en trait continu, une marge intérieure et une marge extérieure à l'élément d'identifiant monid

## Q2
Pour cet exercice, il faut :
- Définir la couleur de texte des sections en vert et de marge d'au moins 100 pixels
- Définir la taille de police des titres 1 à 2.5em et petites majuscules
- Définir la taille de police des paragraphes à 14px
- Définir la taille de police des titres 2 à 2vw et la police de caractère en Helvetica

## Q2.2
Dans l'exercice 2, tout le texte apparaît en vert ?
- [ ] Oui, mais ce n'est pas normal
- [ ] Oui, c'est normal tout les textes dans la section ont hérités de cette propriété
- [ ] Non, tout le texte n'est pas vert

## Q2.3
Dans l'exercice 2, la marge appliquée au section ne s'est pas transmise à ces 'enfants' ?
- [ ] Ce n'est pas normal, les balises enfants auraient du hériter aussi
- [ ] C'est le hasard
- [ ] Toutes les propriété ne sont pas transmisent aux balises enfants

## Q3
Pour cet exercice, il faut :
- Changer la couleur du texte de tous les paragraphes en bleu
- Changer la couleur du texte des éléments de classe maclasse en vert
- Changer la couleur du texte des éléments d'identifiant superid en rouge

## Q3.2
Quel est l'ordre de propriété pour l'application des styles (du plus prioritaire au moins prioritaire)?
- [ ] Balise - Classe - Identifiant
- [ ] Classe - Identifiant - Balise
- [ ] Identifiant - Classe - Balise
- [ ] Identifiant - Balise - Classe

## Q4 
Pour cet exercice, il faut :
- Définir le police des sections à helvetica.
- Pour les paragraphes définir une marge tout autour de 20px et faire en sorte que chaque mots s'écrivent avec une majuscule.
- Les titres de niveau 1 doivent être aligné au centre, écrit en rouge et de taille 2em.
- Les titres de niveau 2 doivent avoir une marge intérieure de 10px, être sur un fond rouge et avoir une bordure à gauche de 50px noire continue.

## Q5
Faire disparaître l'élément #hidden.

``` html
<body>
   <p>Le <strong>Moscow mule</strong> est un cocktail à base de vodka, de bière de gingembre épicée et de jus de citron vert.</p>
   <p id="hidden">Un <strong>French Connection</strong> est un cocktail composé de parts égales de cognac et d'amaretto.</p>
   <p>Le <strong>Long Island Iced Tea</strong> est un cocktail à base de tequila, de gin, de vodka, de rhum et de liqueur d'oranges.</p>
</body>
```

## Q6
Définir une couleur différente avec le nom de votre choix pour les deux paragraphes.

``` html
<body>
   <p class="b-52">Le B-52 est un cocktail composé en proportions égales de Kahlua, de Baileys et de Cointreau.</p>
   <p class="basil-smash">Le Basil Smash est un cocktail rafraîchissant de gin, de citron, de sirop de sucre et de basilic frais.</p>
</body>
``` 

``` css
body {
   font-size: 14px;
}
```

## Q7
Définir une couleur différente avec un code hexadécimal pour les éléments span et h1.

``` html
<body>
   <h1>Tequila sunrise</h1>
   <p>Le <span>Tequila sunrise</span> est un cocktail à base de tequila, de jus d'orange, et de grenadine.</p>
</body>
``` 
``` css
body {
   font-size: 14px;
}
``` 

## Q8
Centrer horizontalement les paragraphes à l'intérieur du premier élément div.

``` html
<body>
   <div class="super1">
      <p>Le Moscow mule est un cocktail à base de vodka, de bière de gingembre épicée et de jus de citron vert, accompagné d'une rondelle de citron.</p>
      <p>Le Long Island Iced Tea est un cocktail à base de tequila, de gin, de vodka, de rhum et de liqueur d'oranges.</p>
   </div>
   <div class="super2">
      <p>Un French Connection est un cocktail composé de parts égales de cognac et d'amaretto.</p>
      <p>Le Tequila sunrise est un cocktail à base de tequila, de jus d'orange, et de grenadine.</p>
   </div>
</body>
``` 
``` css
body {
   font-size: 14px;
}
```

## Q9
Transformer les titres en majuscules.

``` html
<body>
   <h1>Titre 1</h1>
   <h2>Titre 2</h2>
   <h3>Titre 3</h3>
</body>
```
``` css
body {
   font-size: 14px;
}
```

## Q10
Supprimer le souligné des liens et barrer les éléments span.

``` html
<body>
   <p>Le <a href="https://fr.wikipedia.org/wiki/Mule_de_Moscou">Moscow mule</a> est un cocktail à base de <span>vodka</span>, de <span>bière</span> de gingembre épicée et de jus de citron vert, accompagné d'une rondelle de citron.</p>
   <p>Le <a href="https://fr.wikipedia.org/wiki/Long_Island_Iced_Tea">Long Island Iced Tea</a> est un cocktail à base de <span>tequila</span>, de <span>gin</span>, de <span>vodka</span>, de <span>rhum</span> et de <span>liqueur d'oranges</span>.</p>
</body>
```
``` css
body {
   font-size: 14px;
}
```

# Exercice 2
Tous les exercices de cette page utilisent le code HTML ci-après comme base.

``` html
<h1>Mon titre 1</h1>
<p>Premier paragraphe</p>
<p>Deuxième paragraphe</p>	
<article>
	<h2>Mon Titre 2</h2>
	<p>Troisième paragraphe</p>
	<p>Quatrième paragraphe</p>
	<section>
		<h2>Mon Titre 3</h2>
		<p>Cinquième paragraphe</p>
		<p>Sixième paragraphe</p>		
	</section>
</article>
```

## Q1
En utilisant les sélecteurs réaliser les mises en forme suivantes :
- le corps du document doit être écrit en helvetica.
- les titres de niveau 1 doivent être centrés et écrits en rouge.
- tous les titres de niveau 2 doivent soulignés.
- les titres de niveau 2 dans les sections doivent être verts.
- les titres 2 de niveau dans les articles doivent être bleus.
- les paragraphes suivant directement un titre de niveeau 2 doivent être en rouge italique.
- les paragraphes suivant un titre de niveau 1 doivent être en violet.

## Q2
Écrire le code HTML et la feuille de style CSS pour obtenir le rendu ci-dessous, en utilisant l'image ci-dessous. 
- https://aymeric-auberton.fr/img/css/nyamcatrainbow.gif

![image](https://aymeric-auberton.fr/img/css/css-exo14.png)

# Exercice 3
Tous les exercices de cette page utilisent le code HTML ci-après comme base.

``` html
<table>
	<tr>
		<td>Ligne 1 - Colonne 1</td>
		<td>Ligne 1 - Colonne 2</td>
		<td>Ligne 1 - Colonne 3</td>
	</tr>
	<tr>
		<td>Ligne 2 - Colonne 1</td>
		<td>Ligne 2 - Colonne 2</td>
		<td>Ligne 2 - Colonne 3</td>
	</tr>
	<tr>
		<td>Ligne 3 - Colonne 1</td>
		<td>Ligne 3 - Colonne 2</td>
		<td>Ligne 3 - Colonne 3</td>
	</tr>
	<tr>
		<td>Ligne 4 - Colonne 1</td>
		<td>Ligne 4 - Colonne 2</td>
		<td>Ligne 4 - Colonne 3</td>
	</tr>
	<tr>
		<td>Ligne 5 - Colonne 1</td>
		<td>Ligne 5 - Colonne 2</td>
		<td>Ligne 5 - Colonne 3</td>
	</tr>
	<tr>
		<td>Ligne 6 - Colonne 1</td>
		<td>Ligne 6 - Colonne 2</td>
		<td>Ligne 6 - Colonne 3</td>
	</tr>
	<tr>
		<td>Ligne 7 - Colonne 1</td>
		<td>Ligne 7 - Colonne 2</td>
		<td>Ligne 7 - Colonne 3</td>
	</tr>
	<tr>
		<td>Ligne 8 - Colonne 1</td>
		<td>Ligne 8 - Colonne 2</td>
		<td>Ligne 8 - Colonne 3</td>
	</tr>
	<tr>
		<td>Ligne 9 - Colonne 1</td>
		<td>Ligne 9 - Colonne 2</td>
		<td>Ligne 9 - Colonne 3</td>
	</tr>
</table>
```

## Q1
Pour cet exercice, il faut :
- mettre une bordure et une marge interne sur chaque case du tableau.
- colorier le fond des lignes impaires du tableau.
- colorier le texte de la dernière ligne du tableau.

## Q2
Modifier le code HTML et la feuille de style CSS pour obtenir le rendu ci-dessous, en utilisant les images suivantes.
- https://aymeric-auberton.fr/img/css/black.png
- https://aymeric-auberton.fr/img/css/white.png
- https://aymeric-auberton.fr/img/css/red.png

![image](https://aymeric-auberton.fr/img/css/css-exo15.png)

``` html
<body>
    <table></table>
</body>
```
``` css
img {
    display: block;
}
table {
    margin: auto;
    border-collapse: collapse;
    border-spacing: 0;
}
td {
    padding: 20px;
    border: 1px black solid;
}	
```

## Q3
Écrire le code HTML et la feuille de style CSS pour obtenir le rendu ci-dessous, en utilisant les images ci-après.
- https://aymeric-auberton.fr/img/css/bg.webp
- https://aymeric-auberton.fr/img/css/planet-1.png
- https://aymeric-auberton.fr/img/css/planet-2.png
- https://aymeric-auberton.fr/img/css/planet-3.png
 
![image](https://aymeric-auberton.fr/img/css/css-exo16.jpg)

## Q4
Écrire le code HTML et la feuille de style CSS pour obtenir le rendu ci-dessous, en utilisant les codes couleurs ci-après.
- Couleur de fond : #5c94fc
- Couleur 1 : #4976c9
- Couleur 2 : #375897
- Couleur 3 : #243b64
- Couleur 4 : #121d32
  
![image](https://aymeric-auberton.fr/img/css/css-exo18.jpg)

## Q5
Écrire le code HTML et la feuille de style CSS pour obtenir le rendu ci-dessous, en utilisant l'image ci-après.

- https://aymeric-auberton.fr/img/css/snow-black.gif

Pour centrer le contenu d'un élément avec avec la propriété display à block, il faut utiliser la propriété et la valeur suivante : margin: auto;.

![image](https://aymeric-auberton.fr/img/css/css-exo20.png)


# Exercice 4
Tous les exercices de cette page utilisent le code HTML ci-après comme base.
``` html
<form action="" method="post">
	<label for="nom">Nom</label>
	<input type="text" name="nom" id="nom" required>
	<label for="prenom">Prénom</label>
	<input type="text" name="prenom" id="prenom" required>
	<fieldset>
		<legend>Adresse</legend>
		<label for="rue">rue</label>
		<input type="text" name="rue" id="rue">
		<label for="num">Numéro</label>
		<input type="number" name="num" id="num">
		<label for="cp">Code Postal</label>
		<input type="number" name="cp" id="cp">
		<label for="loc">Localité</label>
		<input type="text" name="loc" id="loc">
	</fieldset>
	<input type="submit" value="Envoyer">
</form>
```

Pour cet exercice :
- Les textes du formulaire sont en Helvetica, la largeur globale du formulaire est de 400px, il doit être centré dans la page et écarté du bord supérieur de la page de 100px.
- Des input avec une bordure noire continue de 1 pixel, des bords arrondis, une largeur fixée à 200px et faire en sorte que les champs soient espacés les uns des autres. Attention à ne pas commencer la frappe dans l'arrondi du champ.
- Des label de 100px de large à gauche des champs de saisie.
- Le bouton d'envoi doit avoir une couleur de fond modifiée, faire 400px de large et l'écriture doit être en gras au centre du bouton.
- L'input ayant le focus doit avoir un bord de 2px bleu.

![images](https://www.codingame.com/servlet/fileservlet?id=23338673856321)

# Exercice 5 - CSS Flexbox
Pour faciliter la mise en page des sites internet et donner plus de flexibilité, flexbox a été ajouté en CSS3. Il est maintenant suffisament compatible pour pouvoir l'utiliser sur un site en production. Pour vous aider dans les exercices suivants, vous pouvez vous référer au cours et aux site suivants :

- CSS Tricks – A Complete Guide to Flexbox (en)
- Scotch.io – A Visual Guide to CSS3 Flexbox Properties (en)
- La Cascade – Flexbox, guide complet (fr) 

## Q1
Telecharger la base d'exercice --- Flexbox-Exercice/flexboxQ1 ---

Utiliser les propriétés display: flex et flex-wrap pour créer une première mise en forme du contenu.

Occuper tout le viewport avec les boîtes basculées à la verticale.

![image](https://mescours.ovh/img/casestudy_flexbox_1_1.png)

## Q1.2
Autoriser le retour à la ligne, et placer 4 items par ligne en déterminant leur largeur (2 propriétés possibles).

![image](https://mescours.ovh/img/casestudy_flexbox_1_2.png)

## Q1.3
Appliquer des marges aux boîtes, puis centrer le contenu. Ajouter de nouvelles boîtes et observer le comportement d'affichage.

![image](https://mescours.ovh/img/casestudy_flexbox_1_3.png)

## Q2
Telecharger la base d'exercice --- Flexbox-Exercice/flexboxQ2 ---

Cibler les boîtes et modifier leur comportement en fonction de la résolution.

Modifier la composition 1.3 pour étendre la boîte 5 à toute la largeur.

![image](https://mescours.ovh/img/casestudy_flexbox_2_1.png)

## Q2.2
Modifier la composition 2.1 avec un breakpoint à 1024px de large.

![image](https://mescours.ovh/img/casestudy_flexbox_2_2.png)

## Q2.3
Modifier la composition 2.2 avec un breakpoint à 600px de large.

![image](https://mescours.ovh/img/casestudy_flexbox_2_3.png)

## Q3
Telecharger la base d'exercice --- Flexbox-Exercice/flexboxQ3 ---

Organiser les boîtes depuis le centre.

Centrer horizontalement et verticalement les contenus. Ajouter de nouvelles boîtes et observer le comportement d'affichage.

![image](https://mescours.ovh/img/casestudy_flexbox_3_1.png)

## Q4
Telecharger la base d'exercice --- Flexbox-Exercice/flexboxQ4 ---

Créer un display similaire à Tumblr ou Pinterest en répartissant les contenus en colonnes.

Répartir les contenus sur 2 à 3 colonnes centrées (limiter la largeur de la <section> parente au besoin). Changer la hauteur du viewport et observer le comportement d'affichage.

![image](https://mescours.ovh/img/casestudy_flexbox_4_1.png)

## Q5

Telecharger la base d'exercice --- Flexbox-Exercice/flexboxQ5 ---

Créer un menu responsive et en changer l'orientation.

Présenter le menu à l'horizontal. Etendre la surface cliquable à chaque la surface colorée.

![image](https://mescours.ovh/img/casestudy_flexbox_5_1.png)

## Q5.2
Présenter le menu à la verticale avec un breakpoint à 600px.

![image](https://mescours.ovh/img/casestudy_flexbox_5_2.png)

## Q5.3
Au survol, étirer le li

![image](https://mescours.ovh/img/casestudy_flexbox_5_3.png)

## Q6
Telecharger la base d'exercice --- Flexbox-Exercice/flexboxQ6 ---

Jouer des orientations et de l'ordre des éléments. <header> et <footer> ont une hauteur fixe, les éléments contenus dans <main> doivent s'adapter à l'espace vertical libre.

Présenter le menu à l'horizontal en résolution supérieure à 600px. Le menu a une largeur fixe de 200px.

![image](https://mescours.ovh/img/casestudy_flexbox_6_1.png)

## Q6.2
Les contenus se présentent à la verticale avec un breakpoint à 600px de large. Le menu passe sous l'article.

![image](https://mescours.ovh/img/casestudy_flexbox_6_2.png)

# Exercice 6 - CSS Grid
Pour faciliter la mise en page, la W3C a ajouté assez récement le systeme Grid a CSS3. Pour les exercices suivants, vous pouvez utiliser le cours et les références suivantes

- mozilla.org – Grille CSS (CSS Grid) (fr)
- w3schools.com – CSS Grid Layout (en)

Telecharger la base d'exercice --- Grid-Exercice ---

## Q1 Grille basique

En utilisant Grid, reproduisez le template suivant grace a grid-template-columns, en partant de la base d'exercice

![images](https://mescours.ovh/img/grid_1.png)

## Q2 Grille basique avec gestion des lignes

Augmenter la hauteur de vos ligne grace à grid-template-rows, en repartant de l'exercice 1, pour obtenir le résultat suivant

![images](https://mescours.ovh/img/grid_2.png)

## Q3 Grille complexe

Mettez en page votre site, sur une hauteur de 300px, comme sur la capture d'écran ci-dessous, en vous aidant de grid-template-columns, grid-template-rows, grid-column, grid-row et de span

![images](https://mescours.ovh/img/grid_3.png)

## Q4 Grille complexe avec responsive

Rendez la page de l'exercice 3 responsive pour qu'a partir de 640px tout le site soit sur une colonne. Attention au positionnement du footer qui doit etre en dernier.

![images](https://mescours.ovh/img/grid_4.png)

## Q5 Grille complexe, adaptation au contenu

Modifiez la page grace a align-self pour que le NAV et le ASIDE soit coller en haut et s'adapte a la hauteur de leur contenu.

![images](https://mescours.ovh/img/grid_5.png)

# Exercice 7 - CSS 3D
Le CSS vous permet d'agrémenter votre page web d'effet 3D grace a l'attribut transform. Pour vous aider, reportez vous au cours, a la W3School et a CSS-Tricks

## Q1 - Mise en place

Créez une page avec une mise en page flexbox et 3 blocs sur une seule ligne. Chaques bloc fera 200px de large pour 400px de haut et contiendra une carte (face avant, face arrière). Chaque face aura une couleur de fond différente et un texte qui lui est propre. Seul la face avant doit etre visible.

Quelques conseils
- Pensez a utiliser les positions relative et absolue
- Revoir Flexbox
- N'oubliez pas le backface-visible

![image](https://mescours.ovh/img/3D-1.jpg)

## Q2 - Transition

Au survol d'un bloc, la carte doit se retourner pour pouvoir voir la face arrière. Pensez a ajouter de la perspective pour améliorer l'effet

![image](https://mescours.ovh/img/3D-2.jpg)
