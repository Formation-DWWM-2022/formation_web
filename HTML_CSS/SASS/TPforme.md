# HTML
```html
<div class="carre"></div>
<div class="rond"></div>
<div class="losange"></div>
```

# CSS
```css
body {
  padding: 10px;
}

.carre {
  display: inline-block;
  background-color: #ccc;
  width: 50px;
  height: 50px;
}

.rond {
  display: inline-block;
  background-color: #ccc;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.losange {
  display: inline-block;
  background-color: #ccc;
  width: 50px;
  height: 50px;
  transform: rotate(45deg) scale(0.7, 0.7);
}
```

# Objectif
Afficher 3 formes (carré, rond, losange) de différentes couleurs qui changent au survol
  Vous ne pouvez utiliser que le CSS (donc pas le d'ajouter de class ou d'autres tags !). 

Exercice :
1. Factorisation ! Créez un mixin qui regroupe tous les attributs commun aux différentes formes
2. Utilisez la mixin pour paramétrer :
  - La couleur de fond des formes (1 pour chaque forme)
  - La taille des formes
3. Implémentez le changement de couleur des formes au survol de la souris
4. Utilisez la méthode lighten de SASS (cf la doc SASS - merci google !) pour que la couleur de survol soit 30% plus clair que la couleur d'origine