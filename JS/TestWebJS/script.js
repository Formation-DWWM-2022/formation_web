// 1. créer l'élément
var bouton = document.createElement('button');
bouton.classList.add('yellow');

// 2. créer le contenu du bouton (noeud textuel)
var texteDuBouton = document.createTextNode('Mon beau bouton');

// 3. ajouter le contenu au bouton
bouton.appendChild(texteDuBouton);
// 4. ajouter le bouton au body de la page
document.body.appendChild(bouton);