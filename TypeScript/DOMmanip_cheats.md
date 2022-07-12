## CREER UN ELEMENT -----------------------------------------

const newDiv = document.createElement('div');

Mais l'élément n'apparaitra pas ! Il est juste stocké dans notre variable newDiv et prêt à l'emploi.

## AJOUTER UN ELEMENT A LA PAGE -------------------------------------

const body = document.body <--- l'element <body> de notre HTML
body.append(newDiv);
(variante : body.appendChild(newDiv))

la méthode "append()" permet d'injecter un élément HTML ou du texte AVANT LA FIN d'un élément HTML parent.
pour injecter un élément AU DEBUT d'un parent, on utilise .prepend();

Différence entre append et appendChild : 
	avec append, on passe un élément HTML ou du texte.
	avec appendChild on passe uniquement un élément HTML

## SELECTIONNER UN ELEMENT DE LA PAGE
Avec des selecteurs CSS
	document.querySelector('#unId') <--- id
	document.querySelector('.uneClasse') <--- nom de classe
	document.querySelector('[href]') <--- attribut html
	document.querySelector('a') <--- balise

	document.querySelectorAll('div') <---- retour un tableau avec TOUTES les "divs"

A l'ancienne (plus performant)
	document.getElementById('monid'); <--- retourne un seul element

	---retourne des tableaux d'elements----
	document.getElementsByClassName('maclasse');
	document.getElementsByTagName('p');
	document.getElementByAttribute('href');

## MODIFIER UN ELEMENT
Un élément HTML est un OBJET de la classe "HTMLElement", cela signifie qu'il possède
	des propriétés (classList, dataset, id, href ...)
	des méthodes (append(), prepend(), getAttribute(), remove()...)

Les propriétés correspondent tout simplement aux ATTRIBUTS HTML de l'élément
Exemple :
	<a href="google.com"></a>
	console.log(myLink.href) -----> resultat : "google.com"

Modifier le style d'un élément
	maDiv.style.color = 'red'
	maDiv.style.backgroundColor = "blue"; (<-- attention à adapter les props CSS en camelCase !!!)

	maDiv.classList (liste des classes de l'élément)
	maDiv.classList.add('nvllClasse') ---> ajoute la classe
	maDiv.classList.remove('nvllClasse') ---> retire la classe
	maDiv.classList.toggle('nvllClasse') ---> ajoute la classe si elle manque ou la retire si elle est présente
	maDiv.classList.contains('nvllClasse') ---> retour TRUE si la classe est présente sur l'élément


## EVENT
Ajouter un Event Listenner sur un élément :

	monElement.addEventListener('click', maFonction);

-premier argument, le TYPE d'évènement:
	click : détecte un clic gauche
	contextmenu : détecte un clic droit
	mousedown : détecte un clic ou le fait que le clic gauche soit "enfoncé"
	mouseup : détecte le fait de "relacher" le clic droit
	mouseenter : la sourise "rentre" dans l'élément
	mouseleave : la souris "sort" de l'élément
	mousemove : la souris bouge sur l'élément

	keydown : une touche du clavier est enclenchée (enfoncée)
	keyup : une touche du clavier est "relevée"

	change: l'élément subit une modification
	
	transitionend: détecte la fin de l'animation
	animationend: détecte la fin de l'animation

	submit : détecte la soumission d'un formulaire
	scroll: détecte le scroll

-le 2nd argument est la fonction que vous voulez déclencher quand l'évènement est détectée
	
avec fonction anonyme :
	form.addEventListener('submit', function() {
		console.log('Je me déclenche !!')
	})
avec fonction existante:
	form.addEventListener('submit', maFonction);


Quand vous crez une fonction qui se déclenche par évenement, vous obtenez par défaut une variable que vous devez
nommer pour l'utiliser.
Par convention, on l'appelle généralement "event", "ev" ou "e";

	form.addEventListener('submit', function(event) {
		console.log(event);
	})

L'objet "event" possède les informations concernant l'évènement.
	event.key : la touche qui a été pressée
	event.target : l'élément qui a été cliqué

	Pour empécher qu'un évènement se déclenche, vous pouvez empêcher son execution :
		form.addEventListener('submit', function(event) {
			event.preventDefault();    <--- empeche la soumission "classique" du formulaire
			//Mon code
		})

