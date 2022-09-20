# Les design patterns - Structural

# Adapter

L’objectif du pattern Adapter est de faire passer quelque chose pour autre chose sans perturber le reste de l’application. Il est ainsi capable de rendre compatible deux éléments ne parlant pas le même langage, par exemple, une application travaillant avec le format XML mais utilisant un service de données qui renvoi du JSON. C’est très utile dans le cas où le logiciel évolue et que l’on souhaite conserver au mieux la rétrocompatibilité descendante ou encore si l’on n’a pas accès aux objets mais que l’on souhaite les personnaliser. Toute la complexité d’adaptation est cachée. En plus de s’adapter à la cible, il est aussi possible de réaliser des opérations de conversion si nécessaire. 

Attention, sa seule vocation est de changer l’interface d’une classe, pas son comportement. Autrement dit, on va fournir au client l’interface qu’il s’attend à trouver et ce, quelle que soit la classe réelle.

La vie courante regorge d’exemples pour illustrer ce pattern :
- Les adaptateurs pour les prises de courant en fonction des normes de chaque pays (France, USA, Angleterre…).
- La récupération et l’agrégation des informations de capteurs similaires mais de fabricants ou de marques différentes pour pouvoir enregistrer et traiter les données, et ce, sans changer l’implémentation des capteurs.

# Bridge

Le pattern Bridge permet de découpler l’interface d’une classe de son implémentation de manière à ce qu’elles puissent évoluer séparément. Autrement dit, on va ajouter un intermédiaire entre l’interface et l’implémentation. Les classes concrètes vont donc pouvoir évoluer indépendamment de leurs interfaces, tant qu’elles continuent à respecter le contrat de l’interface. Il peut s’utiliser dans les cas suivants :
- On veut éviter un lien permanent entre l’abstraction et l’implémentation (en particulier si cette dernière est choisie à l’exécution)
- Les modifications subies par l’implémentation ou l’abstraction ne doivent pas avoir d’impacts sur le client (pas de recompilation). C’est par exemple le cas lorsque l’on va publier une nouvelle version d’une application apportant des “breaking changes” tout en souhaitant continuer à cohabiter avec l’ancienne version toujours en place.

A 1ère vue, les patterns Adapter et Bridge paraissent proches, mais il faut tout de même noter quelques différences fondamentales :
- Adapter fait que les choses fonctionnent après qu’elles aient été conçues. Bridge les fait travailler avant d’être. Autrement dit, Bridge est conçu dès le départ pour séparer l’abstraction et l’implémentation alors que Adapter intervient généralement ultérieurement pour faire travailler des classes ensemble alors que ce n’était pas prévu à l’origine.
- Bridge est basé sur le principe “préférer la composition à l’héritage”.

On peut citer deux exemples de la vie courante permettant d’illustrer ce pattern :
- L’interrupteur : celui-ci a pour rôle d’allumer ou d’éteindre un appareil et ce, quel que soit cet appareil. En réalité, l’interrupteur peut-être un simple interrupteur à 2 positions, un poussoir, un variateur…
- Le volant de voiture : il permet de changer la direction d’une voiture sans avoir besoin de savoir exactement ce qui se passe réellement derrière. Cela évite d’avoir à se préoccuper de tous les détails techniques, surtout si ces détails peuvent être amenés à changer à l’avenir. De plus, un volant n’est pas spécifique à une voiture, on peut en trouver dans un avion, un bateau, un vélo… son rôle est à chaque fois le même (modifier la direction du véhicule) mais son fonctionnement est généralement différent.

# Composite

Le pattern Composite permet de créer des objets complexes par assemblage d’objets simples. Ce pattern a du sens uniquement si votre modèle peut-être représenté sous la forme d’un arbre. Il va aussi permettre de traiter les objets individuels de la même façon que l’ensemble de l’arbre. Pour cela, les objets regroupés doivent posséder des opérations communes.

Ce pattern peut s’appliquer aux cas suivants (exemples non exhaustifs) :
- Manipulation des fichiers et de dossiers
- Manipulation de formes géométriques (carré, rond, rectangle…)
- Manipulation d’opérations arithmétiques
- …

# Decorator

Imaginons que l’on souhaite ajouter un ou plusieurs comportements à une classe existante. Le plus simple est d’ajouter directement les comportements voulus à la classe mais plusieurs raisons peuvent empêcher de faire cela :
- Ne pas casser le principe de responsabilité unique
- Comportements communs à plusieurs classes (dans ce cas, il est peut-être plus judicieux de créer un nouvel objet que l’on va intégrer dans les classes en ayant besoin)
- Comportements nécessitant d’être réversibles, configurables ou débrayables
- Présence de tests (qui devront donc être mis à jour suite à l’ajout des nouveaux comportements)

Pour éviter de contrevenir à l’ensemble des points ci-dessus, il est temps de commencer à utiliser le pattern Decorator ! Celui-ci permet d’apporter de nouvelles responsabilités (~ fonctionnalités ou comportements) à un objet existant, tout en gardant plus de souplesse qu’avec l’héritage : 
- Utilisation des services “à la carte” (contrairement à l’héritage)
- Introduction des services de manière conditionnelle ET dynamique (le décorateur étant instancié au runtime)

Ce pattern fonctionne via une interface, qui est implémentée à la fois par l’objet décoré et les objets qui le décorent.

L’inconvénient de ce pattern est qu’il peut complexifier la construction (~ instanciation) de l’objet, en particulier si celui-ci dispose de nombreuses décorations. Cela peut-être réglé via l’utilisation du pattern Builder.

La vie regorge d’exemples pour illustrer ce pattern. Je vais en citer un : les vêtements ! Si vous avez froid, vous mettez un pull, voir un manteau s’il fait vraiment froid. Vous avez aussi la possibilité de mettre des gants et/ou un bonnet. S’il pleut, vous prenez un K-Way ou un parapluie. Si le temps se découvre, vous pouvez retirer ces vêtements pour retrouver votre t-shirt et en cas de fort ensoleillement, vous pouvez même porter des lunettes de soleil ! Les vêtements vous apportent de nouvelles possibilités mais ne font pas partie de vous et vous pouvez les enlever quand vous le souhaitez.

# Façade

Le pattern Façade permet de fournir une interface simple pour manipuler un système complexe. Contrairement à l’Adapter, le pattern Façade a pour objectif de simplifier une interface. Ce pattern peut donc choisir de n’exposer qu’une partie des services sous-jacents. Il répond à plusieurs besoins :
- Présenter volontairement un objet plus adapté par rapport à un client spécifique ou limiter les méthodes et/ou propriétés exposées
- En cas d’utilisation de plusieurs objets, permets d’agréger les appels dans un seul objet (pour réduire le nombre d’appels)

Dans le cas ou une interface doit-être consommée par une classe cliente, il est courant de vouloir la simplifier :
- Cacher la complexité de l’implémentation interne et présenter une interface simple à utiliser. Cela permet de réduire la courbe d’apprentissage nécessaire à la compréhension du sous-système.
- Simplifier l’appel à de nombreux objets internes
- Limiter les dépendances des classes clientes en exposant le moins possible d’objets internes (permets de simplifier et faciliter les évolutions futures sans casser les dépendances)

La Façade est un point d’entrée unique et unidirectionnel (de l’extérieur vers l’intérieur) pour accéder à un sous-système. Attention à ne pas tomber dans le travers d’une classe façade fourre-tout !

Quelques exemples de la vie courante :
- Quand vous appelez votre banquier, celui-ci est votre façade pour réaliser toute une série d’opérations : virement, ouverture et fermeture d’un compte, souscription à un service…
- Un concierge d’hôtel est une façade entre le client et les opérations de réservation, de renseignement et de room service. Ce n’est pas au client de s’occuper des différents services proposés par l’hôtel. Il adresse sa demande au concierge, son interlocuteur principal, et celui-ci se charge de la réaliser en faisant appel au bon service.
- Encapsulation d’un processus (par exemple, le paiement via CB sur un site web) ou l’accès à une librairie, l’encodage/cryptage d’un fichier…

# Flyweight

Le pattern Flyweight (“poids mouche” en français dans le texte !) est utilisé pour optimiser le nombre d’objets présent en mémoire. Il est particulièrement utile dans le cas d’une application utilisant un grand nombre d’objets, comme un jeu vidéo par exemple. En effet, si l’on affiche de grosses explosions à l’écran, comment ne pas surcharger la mémoire si chaque particule de l’explosion est représentée par un objet en mémoire ? Pour cela, Flyweight va chercher à mutualiser les propriétés communes entre objets. Un objet possède deux types de données :
- des données intrinsèques : propre à l’objet (caractère ASCII…) et peut donc être partagé.
- des données extrinsèques: propre au contexte (couleur, taille, position du caractère…) et ne peut donc pas être partagé.

Une excellente illustration de ce pattern dans le cas de la simulation de particules dans un jeu vidéo. Il y a notamment un calcul très intéressant du gain en mémoire suite à l’application du pattern Flyweight.

# Proxy

En préambule de la présentation de ce pattern, je souhaite insister sur l’importance de ne pas le confondre avec les patterns Adapter et Façade ! Ces trois patterns sont en effet proches, que ce soit en matière de modélisation (diagramme) ou d’implémentation (code), mais leur intention est elle bien différente. C’est d’ailleurs l’objectif d’un pattern, qui ne formalise pas un code ou un diagramme mais une intention !

Un proxy est une classe utilisée à la place d’une autre classe. Contrairement au pattern Adapter, le pattern Proxy va proposer une classe de substitution lorsque la classe réelle n’est pas directement utilisable. Proxy peut donc affecter le comportement, mais pas l’interface. C’est pour cela que la classe réelle va elle aussi implémenter l’interface IProxy.

Ce pattern est particulièrement utilisé dans les cas suivants :
- Accès à des objets distants (base de données, disque dur réseau…) et donc potentiellement inaccessibles.
- Accès à des objets volumineux ou consommateur en ressources et devant être manipulé avec précaution.
- Accès à des objets nécessitant des droits d’accès spécifiques.

Proxy va donc permettre de gérer correctement le cycle de vie d’un service sans que le client ait besoin de s’en soucier.

Une illustration de la vie courante est le chèque (c’est valable aussi pour la carte bancaire) ! Un chèque et de l’espèce ont le même pouvoir (la même interface) de permettre de payer une tierce personne. Mais un chèque est un proxy pour une (grande) quantité d’espèces. C’est pratique pour le client qui peut éviter de se balader avec beaucoup d’argent liquide et c’est aussi pratique pour le vendeur qui peut facilement et à tout moment convertir son chèque en véritable argent liquide à la banque la plus proche.
