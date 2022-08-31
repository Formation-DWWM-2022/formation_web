# Exercice
## Etape 1
Dans les classes POO, c’est comme si le plan et l’objet étaient l’instance. Par exemple, un plan de maison serait la classe, mais les maisons qui seront construites à partir de ce plan seront les objets.

Votre premier défi est de créer une classe Produit et de créer une instance de ce nom de classe product1

## Etape 2 
Nous avons donc une classe appelée Produit. Un produit peut avoir des propriétés comme le nom, la description, le prix, etc. Nous pouvons définir des variables comme $name, $description, et $price pour contenir les valeurs de ces propriétés.

Lorsque les objets individuels (product1, product2, etc.) sont créés, ils héritent de toutes les propriétés et comportements de la classe, mais chaque objet aura des valeurs différentes pour les propriétés.

Pour le deuxième exercice, ajoutez des propriétés (nom, description et prix) à la classe Produit. Un petit conseil. Nous créons des propriétés comme nous créons une variable mais la propriété doit avoir un préfixe de modificateur d’accès : public, privé ou protégé. Nous y reviendrons plus tard. Pour l’instant, utilisez le préfixe public.

Ensuite, allez dans l’objet instancié1 et modifiez le nom de propriété pour 'iPhone 12'. Ensuite, vous pouvez : echo product1->name pour voir le résultat.

Enfin, créez un deuxième nom d’objet product2 et définissez la propriété name à 'iPhone 12 Pro' et faites écho à cette propriété.

## Etape 3 

Pour cet exercice, ajoutez une méthode d’initialisation d’objet dans la classe Produit. (hint : function __construct())

Avec cette fonction de construction, obtenez comme paramètre le nom, la description et le prix et attribuez-les aux attributs d’instance du même nom (indice : L’instance courante est référencée par le mot-clé '$this')

Après cela, créez deux objets (product1 et product2). Quand vous allez initialiser l’objet ex. $product1 = new Product('iPhone 12', 'This is a great iPhone', 799.99) vous passez les trois paramètres (nom, description et prix)

## Etape 4
Dans la nouvelle version de PHP 8. LE Constructeur de classe ont un nouveau raccourci pour déclarer les propriétés. Cette fonctionnalité est appelée 'Promotion de la propriété du constructeur'

Votre défi est de convertir la classe et la propriété créées dans le dernier exercice et de le refacturer avec la syntaxe 'promotion de propriété du constructeur'. Vous pouvez chercher en ligne si vous n’avez jamais entendu parler de cette nouvelle syntaxe.

# Etape 5
Votre défi est de créer un getter et un setter pour modifier la propriété name.
> Conseil : Getter et Setter sont 2 méthodes:
- La méthode getter est une méthode qui récupère (renvoie) la valeur de la propriété de l’instance objet.
- La méthode setter définit la valeur de la propriété d’instance courante sur une nouvelle valeur d’alimentation.

# Etape 6
Lorsque vous définissez le nom de la propriété. Assurez-vous que le prénom du nom est en majuscules.