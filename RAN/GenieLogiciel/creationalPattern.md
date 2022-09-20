# Les design patterns - Creational

# Singleton

C’est probablement le design pattern le plus connu et le plus utilisé. Il permet de s’assurer qu’une classe ne peut posséder qu’une seule instance à un moment donné et fournit un accès unique à cette instance. Il y a plusieurs façons d’implémenter ce pattern, chacune ayant un niveau de qualité et d’élégance différent (problématique thread-safe et lazy-instanciation), mais elles comportent toutes les mêmes composants :
- Un constructeur privé et sans paramètre pour éviter une instanciation par d’autres classes. Cela implique donc l’absence d’héritage qui serait une violation du principe d’unicité**.**
- Sécurité supplémentaire par rapport au point précédent, le verrouillage de la classe permet d’éviter la création de sous-classe et donc l’instanciation par un autre biais que celui prévu par défaut. Ce point n’est pas indispensable au pattern Singleton mais d’optimiser certaines choses.
- Une variable statique maintenant la référence vers l’instance unique de la classe. Par convention, celle-ci est souvent nommée Instance.
- Un accès public (propriété ou méthode statique) à cette variable permettant donc de récupérer cette référence.

Ce pattern est très utile lorsque l’on souhaite accéder à un périphérique physique (imprimante, disque dur…) ou que l’on a besoin de garantir l’accès à un interlocuteur unique (gestionnaire de logs, d’exceptions…).

Pour illustrer ce pattern par une situation de la vie courante, je trouve que l’exemple du gouvernement d’un pays est excellent. En effet, un pays n’a qu’un seul et unique gouvernement officiel. Ce gouvernement est composé de plusieurs personnes (ministres) mais son point d’entrée unique est le 1er ministre (en France en tous cas ;)).

# Factory

Les principes d’une bonne conception objet recommandent l’utilisation d’interfaces plutôt que des implémentations dans le but de découpler au maximum l’appelant et les classes concrètes (ce qui permet de remplacer facilement une implémentation par une autre sans tout modifier). Cela est d’autant plus vrai avec les mécanismes d’injection de dépendances. On va donc privilégier le passage d’interfaces (ou classes abstraites, on verra la subtilité juste après) en paramètres de nos méthodes. A un moment donné, en général lors de l’exécution, il sera tout de même nécessaire d’instancier des objets concrets : c’est là qu’intervient le pattern Factory. Ce pattern se base justement sur les interfaces pour permettre à l’application de ne manipuler qu’un seul type (l’interface) et de masquer l’origine réelle des objets.

Avant d’attaquer sur les factories, un rapide rappel sur comment choisir entre une classe abstraite et une interface :
- La classe abstraite est pertinente dans le cas où la classe doit contenir des comportements par défaut. Par exemple, une méthode qui pourra être utilisée par l’ensemble des implémentations. Attention tout de même, son utilisation est à manipuler avec précaution et en toute connaissance de cause !
- L’interface dans tous les autres cas, c’est-à-dire où chaque classe concrète a sa propre implémentation.

Vous l’avez compris, une factory (au sens “fabrique”, usine en français) est un bloc de code ayant vocation à construire (instancier) des objets. Ce pattern est très utile dans le cas ou il n’est pas possible de savoir à l’avance quelle implémentation concrète sera utilisée. Nous allons voir quelques exemples pour illustrer cette définition :
- Une liste d’éléments possédant plusieurs algorithmes de tri, au choix de l’utilisateur : alphabétique, numérique, par priorité, par statut…
- Une application de calcul de trajet proposant différents types d’itinéraires : plus rapide, plus court, moins cher, passant par des monuments historiques…
- Un jeu de course proposant de conduire différents types de véhicules : voiture, camion, moto, quad…
- Un système de log proposant plusieurs destinations : fichier, mail, console, base de données…

Dans les cas ci-dessus, l’idée est de n’avoir qu’une seule interface à manipuler (que ce soit pour obtenir des informations ou pour effectuer des opérations) du point de vue de l’appelant (découplage). Si demain je souhaite modifier la hiérarchie des classes, seule ma factory sera impactée (il suffira de modifier les redirections vers les nouvelles implémentations).

# Abstract Factory

Très proche du pattern Factory, l’Abstract Factory est chargée de créer des familles d’objets (liés ou dépendants).

Commençons par quelques rappels. En POO, l’abstraction est un mécanisme permettant de regrouper des comportements communs à un ensemble d’objets. Cet ensemble va représenter une famille :
- Chat, chien, lapin et oiseau sont de la famille des animaux. “Animal” est donc la classe abstraite correspondante et pourra contenir un nom, un genre, un nombre de pattes, une couleur…
- Carré, rond, rectangle et triangle sont des formes géométriques. “Shape” est donc la classe abstraite et pourra contenir un nombre de côtés, une longueur, une largeur et une superficie (calculée en fonction de la forme)…

En fonction d’un choix, une factory “générale” (via une méthode GetFactory(…)) retourne une factory “spécialisée”. C’est cette dernière qui se charge de créer les instances souhaitées. On aura donc autant de factory “spécialisée” que de famille et chacune va implémenter une interface commune. Ces factories vont donc exposer autant de méthodes de création qu’il y a de produits dans une famille. Cela offre de nombreux avantages :
- L’isolation des classes concrètes : comme pour le pattern Factory, le client travaille uniquement avec les interfaces.
- Un changement facilité des familles de produit en remplaçant simplement la fabrique concrète.
- Une cohérence garantie entre les éléments d’une même famille. En effet, ceux-ci sont faits pour travailler ensemble et il est important que l’on ne mélange pas des éléments de familles différentes.

Par contre, il est vrai que ce pattern nécessite une certaine gymnastique intellectuelle en particulier à cause du grand nombre d’acteurs, de classes et d’interfaces.

Un scénario d’utilisation d’un tel pattern peut-être un gestionnaire de composants d’interfaces multiplateformes avec différents styles et/ou comportements en fonction de l’OS. 

# Builder

Ce pattern permet de séparer la construction d’un objet de sa représentation. Il est très utile pour créer, à partir d’un même processus, des représentations différentes. Les cas d’utilisations privilégiés pour ce pattern sont :
- La construction d’un objet dont le processus de création est complexe :
    - Une voiture est composée d’un moteur, de roues, d’une carrosserie, de sièges… chaque pièce nécessitant un assemblage précis et minutieux
- La construction d’un objet nécessitant de nombreux paramètres, ceux-ci pouvant être optionnels ou avec différents formats :
    - Une pizza est composée d’une pâte avec des ingrédients dessus (fromage, bacon, olive, cheddar) que l’on peut mettre… ou pas ! De plus, on a des options comme la taille (S/M/L), le type de base (crème fraiche ou tomate) ainsi que l’épaisseur de la pâte.
    - Autre exemple avec la construction d’une maison, qui nécessite des fondations (différentes en fonction du type de terrain), des murs (4 en général mais ça peut-être plus), une toiture (tuile ou ardoise ?), des portes et des fenêtres (en nombre variable en fonction de la luminosité souhaitée), un ou plusieurs étages, un garage…

Plutôt que d’utiliser un constructeur géant avec une multitude de paramètres, on va configurer notre objet via une succession de setter, puis appeler une méthode de construction (par convention, on l’appelle build()) qui va se charger de valider la cohérence des informations (champs obligatoires, vérification du format des données…) et de faire des traitements avancés si nécessaire. Cela évite d’avoir un objet dans un état incohérent (en cours de construction). Une fois la méthode “build” exécutée, on est assuré que notre objet est valide. Cette méthode est là pour servir de garde-fou et il sera très simple d’y lever une exception si un paramètre obligatoire a été oublié par exemple.

Le pattern Builder va donc permettre de conserver une bonne lisibilité du code appelant et surtout d’éviter la mise en place d’une multitude de constructeurs avec chacun ses propres paramètres !

# Are you fluent ?

Une syntaxe spécifique du Builder que j’affectionne particulièrement est le Builder Fluent. Celui-ci se présente sous la forme d’un ensemble de méthodes chaînables. Comme pour la syntaxe classique, la méthode build finale peut, ou pas, réaliser des actions complexes par rapport aux paramètres précédents.

Pour y voir un peu plus clair, prenons un exemple simple avec un mécanisme permettant de créer des animaux :

```C#
// Standard
var myAnimal = new Animal();
myAnimal.Name = "Miaouss";
myAnimal.Size = 5;
myAnimal.Fur = true;
myAnimal.Paw = 4;
myAnimal.build();

// Fluent
var builder = new AnimalBuilder();
Animal myCat = builder.CreateAnimal("Miaouss").WithSize(20).WithFur(true).WithPaw(4);
```

La syntaxe Fluent permet généralement d’assurer une meilleure compréhension de l’utilisation d’une classe (cette propriété est-elle obligatoire ? comment s’en servir ?). Les capacités de ma classe sont préfixées par with…(), et je les utilise si je le souhaite. Ces méthodes peuvent être définies directement au sein de ma classe ou dans des méthodes d’extensions si je souhaite conserver la simplicité de mon modèle (attention à bien retourner l’entité dans chaque méthode pour permettre le chainage).

Voilà un exemple de l’implémentation du Builder Fluent pour le cas de la création d’un animal (j’ai utilisé la conversion implicite à la place de la méthode build mais le principe est exactement le même) :

```C#
public class AnimalBuilder() 
{
    private string _name;
    private int _size;
    private bool _fur;
    private int _paw;

    public AnimalBuilder CreateAnimal(string name) 
    {
        this._name = name;
        return this;
    }
    
    public AnimalBuilder WithSize(int size) 
    {
        this._size = size;
        return this;
    }
    
    public AnimalBuilder WithFur(bool hasFur) 
    {
        this._fur = hasFur;
        return this;
    }
    
    public AnimalBuilder WithPaw(int paw) 
    {
        this._paw = paw;
        return this;
    }
    
    public static implicit operator Animal(TeamBuilder builder) 
    {
        return new Animal(builder._size, builder._hasFur, builder._paw);
    }
}
```

# Prototype

Ce pattern permet de créer de nouvelles instances en copiant (dupliquant) puis modifiant des instances existantes plutôt qu’en en créant de nouvelles. C’est intéressant dans le cas où la création initiale de l’instance est complexe ou longue. Par exemple, dans le cas où l’instanciation de la classe nécessite un accès à des ressources externes (une base de données ou un service web), seule la 1ère instance nécessitera ce traitement. Les futures seront dupliquées (effet de cache) et seront plus performantes.

C’est aussi très pratique dans le cas où l’on doit créer de multiples instances d’un même objet, lesquelles vont partager de nombreuses propriétés (voir toutes), comme par exemple, les couleurs. Une couleur est composée des mêmes propriétés et des mêmes méthodes, seule va changer la composition colorimétrique (RGB par exemple).

Évidemment, ce pattern est surtout pertinent dans le cas où la création d’une nouvelle instance est significativement plus lente que son clonage.