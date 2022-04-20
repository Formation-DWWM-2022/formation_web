Vous allez intégrer la maquette et ses déclinaisons responsives qui se trouvent dans le dossier _maquettes_
N'oubliez pas d'appeler le fichier _reboot.css_ pour pouvoir avoir des styles propres dès le départ.

## Astuces utiles
- On peut changer l'ordre d'un élément grâce à la propriété `order` si son parent est en `display: flex` ou `display: grid`. [Documentation](https://developer.mozilla.org/fr/docs/Web/CSS/order)
- Pour déclarer les valeurs qui se répètent beaucoup (couleurs, padding, …) dans le projet, vous pouvez utiliser des variables CSS. 🔥🔥 [Documentation](https://developer.mozilla.org/fr/docs/Web/CSS/--*)
- Pour bloquer le ratio d'un media (image, video), il faut utiliser la propriété `object-fit`. [Documentation](https://developer.mozilla.org/fr/docs/Web/CSS/object-fit)
- Pour insérer les icônes et images SVG, vous avez deux cas de figure :
  - Dans une balise `img` mais vous ne pourrez pas changer la couleur
  - Copié / collé du code svg dans votre page, ou un include si vous travaillez en php. Dans ce cas, vous pourrez selectionnez le svg et changer sa couleur.
