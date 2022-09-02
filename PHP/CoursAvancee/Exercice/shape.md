# PHP POO

Pour cet exercice de code PHP, nous allons explorer la programmation orientée objet en PHP en créant des classes de forme : Shape.php, Rectangle.php et Circle.php.

Shape.php est la classe de base. Les exigences de la classe de forme sont :
- Une constante de classe nommée SHAPE_TYPE avec une valeur de 1.
- Quatre propriétés avec des visibilités différentes : un nom public, une longueur et une largeur protégées, et un ID privé.
- Un constucteur qui accepte un paramètre longueur et largeur pour initialiser les propriétés respectives.
- Le constructeur doit également initialiser la propriété id à un id unique. (conseil : utilisez la fonction [uniqid()](https://www.php.net/uniqid) de PHP)
- Méthodes Getter et Setter pour la propriété name.
- Une méthode Getter pour la propriété id.
- Une méthode d’espace public qui calcule et retourne la surface de l’objet Shape.
- Une méthode publique statique getTypeDescription qui renvoie la chaîne Type : avec le SHAPE_TYPE concaténé à la fin.
- Une méthode publique getFullDescription qui retourne la chaîne : Shape<#id> : name - length x width avec les variables id, name, length et width a substitué les valeurs des objets.

Rectangle.php devrait hériter de la classe Shape. Les exigences de la classe Rectangle sont :
- Une constante de classe nommée SHAPE_TYPE avec une valeur de 2.

> Remarque : si vous avez utilisé l’héritage correctement, la classe Rectangle ne devrait pas nécessiter de propriétés ou de méthodes.

Circle.php devrait hériter de la classe Shape. Les exigences de la classe Circle sont :
- Une constante de classe nommée SHAPE_TYPE avec une valeur de 3.
- Une propriété à rayon protégé.
- Un constucteur qui accepte un paramètre de rayon et initialise la propriété rayon. **N’oubliez pas d’appeler le constructeur de la classe Shape.
- Une méthode d’espace public qui calcule et retourne l’aire de l’objet Cercle.
- Une méthode publique getFullDescription qui retourne la chaîne : Circle<#id> : name - rayon avec les variables id, name, et rayon a substitué les valeurs des objets.