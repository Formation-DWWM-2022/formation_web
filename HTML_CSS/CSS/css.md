# CSS Cheat Sheet

Урок CSS от Максима Монтаня (также известен как, самый офигенный препод на свете!)

## Unités de mesure

🤔
100% -> par rapport au parent !
16px -> 16 pixels
1em -> FUYEZ PAUVRES FOUS ! (très délicat à manipuler)
1rem -> 16px (par defaut. Se base sur la "font-size" de la racine :root)
1vh -> 1% de la hauteur de l'écran
1vw -> 1% de la largeur de l'écran
1vmin -> 1% de la largeur ou de la hauteur de l'écran (le plus petit des deux)
1vmax -> 1% de la largeur ou de la hauteur de l'écran (le plus grand des deux)

## Tricks utiles 🛹

- Réinitialiser toutes les marges et padding de tous les éléments en début de projet : 🧹

```css
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box; /*(évite des conflits avec les bordures)*/
}
```

- Réinitialiser un élément pour enlever son CSS : 🧹

```css
button {
  all: unset;
}
```

    (Utile pour styliser les Inputs, les liens ou les boutons)

- Rendre un bouton "plus gros"

  Mettez lui du PADDING ! 😜

- Rendre un Input plus gros:

        Mettez lui du PADDING (aussi) ! 😜

## Faire des RONDS:

```css
img {
  border-radius: 5px /*(ou plus, à vous de tester !)*/;
}
```

Avoir un élément ROND (ou "suppositoire 🧑‍⚕️🤒" si c'est pas un carré) :

```css
img {
  border-radius: 50%; /**/
}
```

Avoir un élément ROND (ou "capsule 💊" si c'est pas un carré)

```css
img {
  border-radius: 99999px;
}
```

## Mettre une bordure

```css
div {
  border: TAILLEpx TYPE COULEUR;
  /*(exemple : 2px solid orange)*/
}
```

- On peut préciser de quel côté on met la bordure !

```css
div {
  border-top: 2px solid red;
  border-right: 20px solid yellow;
  border-bottom: 1px solid green;
  border-left: 4px dotted blue;
}
```

## Centrer

### Centrer un bloc :

```css
div {
  margin: 0 auto;
  /*ou*/
  margin-inline: auto;

  width: 50%; /* MOINS que 100% !! Sinon il n'y a pas de place pour centrer l'élément*/
}
```

    Le bloc doit faire moins que la largeur de son contenaire pour pouvoir se centrer)

### Centrer un inline :

```css
.container-de-texte {
  text-align: center;
}

.container-de-texte span {
  /*Rien à ajouter ! Je suis déjà centré grâce à mon parent !*/
}
```

## Coller à Droite !

### Coller un Bloc à droite :

```css
div {
  margin-left: auto;
}
```

    Si l'élément ne fait pas toute la largeur bien sûr !

### Coller du texte à droite :

```css
.container-de-texte {
  text-align: right;
}
```

## Mettre des bordures sur une <table>

```css
th,
td {
  /*et oui, on selectionne les cases, pas la table ! Sinon on aurait une bordure seulement "autour" de la table mais pas un "cadrillage" */
  border: 1px solid black;
}
```

## Pseudo classes ("Etat" d'un élément)

Quelques exemples ⚡

a:hover
--> un lien quand on passe la souris dessus
a:active
--> un lien au moment où on CLIC dessus
a:visited
--> un lien qui a déja été visité par l'utilisateur
input:focus
--> quand l'élément a été selectionné
input[type="checkbox"]:checked
--> une checkbox quand elle a été "cochée"
input:required
--> un input si il a l'attribut "requis"

## Responsive Trick :phone:

- NE PAS "fixer" une hauteur ou une largeur sur les éléments avec du texte !! (débordement)
  Toujours favoriser "min-width"/"max-width", "min-height, max-height"

## Selecteurs CSS

### Selecteurs de base

-Selectionne toutes les balises <balise>

```css
div {
}
```

-Selectionne tous les éléments qui ont la classe "class"

```css
.class {
}
```

-Selectionne tous les éléments qui ont l'ID "id"

```css
/*TRES FORTEMENT DECONSEILLE !!!*/
#id {
}
```

-Selectionne un élément par rapport à son attribut

```css
/*selectionne tous les <input> de type "text"*/
input[type="text"] {
}
```

## Priorité

Attention à la priorité des Sélecteurs !
#ID > .class > balise

## Selecteurs avancés

Selectionne tous les .elements qui sont dans un .container

```css
.container .element {
}
```

Selectionne les elements qui ont la class1 ET la class2 en même temps

```css
.class1.class2 {
}
```

Selectionne les éléments qui ont la class1 ET ceux qui ont la class2

```css
.class1,
.class2 {
}
```

Selectionne les ENFANTS DIRECTES de class1

```css
.class1 > * {
}
```

Selectionne les .class2 qui SONT JUSTE APRES un .class1

```css
.class1 + .class2 {
}
```

## Les NTH Child
Attentions, essayez d'utiliser ce genre de selecteurs dans le cas où tous les "children" sont identiques (même balise, même classe) afin d'éviter les surprises.

Exemple : ces selecteurs fonctionnent à merveilles avec les <li> d'un <ul>/<ol>, car on sait que tous les enfants directs d'une liste sont forcément des <li>.

```css
.class:first-child 
    /*----> premier élement (dans un groupe) qui a cette classe*/
.class:last-child 
    /*---> idem mais le dernier*/
.class:nth-child(3)
    /*---> je selectionne le numero 3*/
.class:nth-child(2n+1) 
    /*---> pareil que IMPAIR (odd)*/
.class:nth-child(2n+2) 
    /*---> pareil que PAIR (even)*/
.class:nth-child(3n) 
    /*---> selectionne le 3eme de chaque groupe de 3 (3, 6, 9, 12 ...)*/
.class:nth-child(3n+1) 
    /*---> selectionne le 1er de chaque groupe de 3 (1, 4, 7, 10 ...)*/
```

## TRANSITION
Quand un élément HTML change de propriétés CSS (status:hover ou changement de classe en JS) on peut
appliquer une "transition" pour fluidifier le processus et rendre le site plus vivant/réactif.

Transition prend plusieurs parametres :
1)propriété à transitionner
2)durée de la transition
3)type de la transition (linear, ease-in, ease-out, ease-in-out ou un cubic-bezier perso)
4)délai de la transition

Exemple :
```css
	button {
		color: blue;
		transition: color 3s ease-in-out 1s
	}

	button:hover {
		color: red;
	}
```
Ici la COLOR sera transitionnée en 3secondes avec un TYPE "ease-in-out" après un DELAI d'une seconde

## ANIMATION

Les animations doivent être utilisées avec parcimonie ! Elles sont généralement gourmande en resources 
et peuvent distraire l'utilisateur.
Contrairement à la transition qui décrit le passage d'un état à un autre, l'animation se lance immédiatement.
Une animation doit également être DEFINIE et NOMMEE pour etre utilisée à l'aide du mot "keyframes"
```css
@keyframes monAnimation {
	0% {
		transform: rotate(0deg);
	}
	50% {
		transform: rotate(180deg);
	}
	100%{
		transform: rotate(360deg);
	}
}
```

On décrit dans le keyframes les étapes de notre animation. On peut utiliser les mots clés "from"/"to"
qui sont équivalents à 0% - 100% ou bien indiquer des pourcentages pour etre plus précis.

```css
	.jeSuisAnime {
		animation-name: example; (nom de notre keyframes)
  		animation-duration: 5s; (durée/vitesse de l'animation)
  		animation-timing-function: linear; (type d'animation)
  		animation-delay: 2s; (délai avant le lancement de l'animation)
  		animation-iteration-count: infinite; (nombre de fois que l'animation sera jouée)
		animation-direction: alternate; (voir ci dessous)
	}

	.versionCourte {
		animation: example 5s linear 2s infinite alternate;	
	}
```
Directions d'animation les plus utiles
	alternate : l'animation sera jouée en avant puis à l'envers
	forwards: l'animation est jouée normalement puis l'élément restera dans son état final

## FLEXBOX  -------------------------------------------------------------

Pour s'entrainer : [un petit jeu](https://flexboxfroggy.com/#fr)

Et vla une CheatSheet de référence : [ZE référence](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)

Flexbox est particulièrement utile pour placer plusieurs élément sur un même axe.
```css
	.parentFlex {
		display: flex; 
			/*OBLIGATOIRE pour pouvoir utiliser les propriétés ci -dessous*/
		flex-direction: 
			/*donne une direction au flex (rangée "row" ou colonne "column")*/
		justify-content: 
			/*algne sur l'axe principal (axeX sur une rangée ou axeY sur une colonne) */
		align-items: 
			/*aligne sur l'axe secondaire (axeY sur une rangée ou axeX sur une colonne)*/
		flex-wrap: 
			/*indique si l'on autorise les éléments de notre contenaire à passer à la ligne suivante
				si ils ont besoin de place*/
	}

	.enfantFlex {
		flex-grow: 0
			/*(de base, notre élément occupe la place dont il a besoin, si on donne un 
			flex-grow de 1, l'élément prend TOUTE la place disponible)*/
		flex-shrink: 1
			/*(capacité de notre élément à rapetisser si besoin)*/
		flex-basis: auto
			/*largeur(si row) ou hauteur(si column) de notre élément*/
	}
```

Trick avec Flx pour centrer un élément :
```css
	.parent {
		display: flex;
		justify-content: center;
		align-items: center;	
	}
```

Trick pour le responsive : autorisez le flexWrap pour éviter que les éléments dépassent
et transformez votre Row en Column sur les petits écrans :
```css
	.parent {
		display: flex;
		flex-wrap: wrap;
		flex-direction: row;
	}

	@media (max-width: 600px) {
		.parent {
			flex-direction: column;
		}
		
	}
```

## Grid 🌐
```diff
- Fortement déconseillé aux débutants ! Ne vous aventurez ici qu'une fois les bases et Flexbox BIEN maitrisées !
```
Pour les courageux :
Apprendre de manière intéractive et ludique: [commencez à regarder par là](https://cssgridgarden.com/#fr)
Pour les courageux : [commencez à regarder par là](https://css-tricks.com/snippets/css/complete-guide-grid/)
---------------------------------------------------------------------------------------

## SCSS et SASS 😎
SASS est une "surcouche" à CSS.
L'idée est d'écrire du SCSS (plus puissant que CSS), pour ensuite le compiler en "CSS" classique que les
navigateurs pourront comprendre.

### Installation manuelle :
```
	npm install -g sass
```
    (pour l'avoir en global, c'est votre cas, donc PAS BESOIN de le refaire)
```
	npm install sass --save-dev 
```
    (pour l'avoir dans le projet en local si besoin)

1) Générer un fichier "package.json" dans votre projet
```
	npm init 
```
2) Dans le "package.json", ajouter un "script" comme celui ci
```json
	"scripts" {
        "sass": "sass --watch CHEMIN/VERS/INDEX.SCSS:CHEMIN/VERS/INDEX.CSS"
		/*Remarquez qu'un ":" sépare les deux Paths*/
	}
```
Pour lancer ce script, il ne reste plus qu'à utiliser la commande :
```
	npm run sass
```

Grace au "--watch", SASS surveillera les changements faits dans index.scss

### ARCHITECTURE DU SCSS
Vous pouvez maintenant IMPORTER vos fichiers scss. Le but sera donc de ne compiler QUE index.scss
pour n'avoir qu'un seul fichier css à inclure dans votre HTML.

Essayez d'avoir dans votre dossier assets/styles/scss tout votre code SCSS découpé de façon pertinente.
Pour vous aider vous pouvez (ou DEVEZ si vous utilisez l'extension Live SASS) utiliser un underscore ( _ ) pour
indiquer les fichiers "partiels" (qui sont fait pour etre importés dans votre index.scss) 

Exemple d'architecture de dossier /SCSS :
	_fonts.scss (contient l'importation des polices d'écriture)
	_variables.scss (contient toutes les variables SCSS - $primary-color etc)
	_mixins.scss (contient les mixins (pseudo-fonctions) scss de notre projet)
	index.scss (contient tous les imports de tous les fichiers scss)

	Dossier /base
		_text.scss (contient les regles globales concernant les éléments texte h1, h2, h3, p, em, strong etc)
		_general.scss (contient les regles globales générales (html, body...)
		_form.scss (contient le style des formulaires du site)
		_header (contient le style du header et des éléments le composants (nav, logo..)
		_footer (contient le style du footer et de ses composants)

	Dossier /components
		contient un fichier scss par composant propre à ce site (cards, article, sections...)

	Dossier /libs
		contient les importations de SCSS des librairie externes (comme Bootstrap)
	
Tout ces fichiers doivent etre importés dans votre index.scss que vous pourrez ensuite compiler avec SASS en un fichier
CSS unique qui contiendra TOUT votre code. Pratique !


## BOOTSTRAP 💩 ------------------------------------------------------------------------------
Il faut toujours installer à la fois le CSS de Bootstrap et son Javascript
```
	npm install bootstrap
```

Puis dans le <head> de votre HTML
```html
	<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script defer src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
```

Plutot que d'importer le CSS de bootstrap directement, vous pouvez choisir d'importer le
SCSS de bootstrap dans votre index.scss afin de récupérer les variables et mixins bootstrap.
Comme Bootstrap est alors importé dans votre index.scss, il sera compilé par SASS avec le reste de votre code
donc il ne vous reste plus qu'à include VOTRE index.css dans le HTML.

### BOOTSTRAP - UTILISATION -----------------------------------------------------------------
Bootstrap c'est une boite à outils géante qui propose pleins de classes CSS utilitaires.
Exemple :
	m-5 : marge de niveau 5
	mx-3 : marge horizontale de niveau 3
	ps-1: padding gauche (start)
	text-end: équivalent d'un text-align: right

Mais aussi des composants pré-frabriqués qu'on peut juste copier/coller depuis le site officiel :
des navbar, des boutons, des accordéons, des dropdowns etc

```diff
- LISEZ LA DOCUMENTATION sur le site officiel !!!!
```
----------------------------------------------

### BOOTSTRAP CONTAINER -ROW et COLUMNS-------------------------------------------------------
Les outils les plus intéressants de Bootstrap sont ceux consacrées au LAYOUT (Disposition) de votre page

	Container -> Centre son contenu et applique des marges responsives
	Container-fluid -> occupe quant à lui toute la largeur comme une div classique

Pour utiliser les colonnes Bootstrap il faut d'abord définir une rangée 'ROW'
	Chaque rangée peut contenir 12 COLONNES (peu importe la taille de l'élément "row" !!)
pour placer 2 éléments l'un à côté de l'autre.
Exemple
```html
	<div class="container">
		<div class="row">
			
			<div class="col-3">
				Je suis un petit bloc
            		</div>

            		<div class="col-3">
						Je suis un petit bloc
            		</div>

            		<div class="col-6">
						Je suis un Gros bloc
            		</div>
        	</div>
    	</div>
```

Ici j'ai un container qui me donne de jolies marges et un contenu centrée
A l'intérieur je déclare une RANGEE (row) qui contient 3 bloc
Les deux premiers blocs COL-3  occupent 3 "colonnes" (sur 12) chacunes (c'est à dire 25% de la largeur dispo)
Le dernier bloc COL-6 occupe "colonnes" (sur 12) chacunes (c'est à dire 50% de la largeur dispo)

### Responsive 
Pour faire du responsive, on peut préciser des "breakpoints" :

sm : small (téléphone)
md: medium (tablette)
lg: large (écran d'ordi)
xl: extra large (grand écran)

Par exemple un élément qui a "col-md-6" occupera 6 colonnes TANT QUE l'ECRAN est plus GRAND que "md",
sinon, il occupera toute la rangée (col-12) et forcera les autres éléments à se placer en dessous.

col-sm-9 : occupe 9 colonnes si l'écran est plus grand qu'un écran de téléphone (small)
col-xl-2 : occupe 2 colonnes si l'écran est plus grand qu'un grand écran

```html
	<div class="col-sm-6 col-md-4 col-lg-3"></div>
```
	l'élément occupera 3 colonnes sur grand écran
	il occupera 4 colonnes sur un écran normal
	il occupera 6 colonnes sur tablette
	il occupera 12 colonnes sur téléphone


## FONTAWESOME 🦄
Installation manuelle via NPM
```
	npm install @fortawesome/fontawesome-free
```

Puis inclure ceci dans le <head> de votre HTML

```html
	<link rel="stylesheet" href="/node_modules/@fortawesome/fontawesome-free/css/all.css">

    <script defer src="/node_modules/@fortawesome/fontawesome-free/js/all.js"></script>
```

Sinon vous pouvez utiliser le CDN (mais on vous jugera) 👿
```html
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
```
	
