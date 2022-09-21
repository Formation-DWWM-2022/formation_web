# Les design patterns - Behavioral

# Chain of responsibility

Ce pattern permet de séparer les objets émetteurs de requêtes et les objets chargés de recevoir et traiter les requêtes. On va donc éliminer le couplage entre les éléments en donnant une chance à plusieurs récepteurs de gérer une requête. C’est très pratique lorsque la chaine est composée dynamiquement et que les récepteurs sont déterminés à l’exécution (~ runtime).

La requête va être transmise de récepteur en récepteur jusqu’à ce qu’elle soit traitée. Il est possible d’arrêter la chaine dès qu’un récepteur est capable de traiter la requête ou bien de la laisser traverser l’ensemble de la chaine pour lui appliquer plusieurs traitements (cf. pattern Pipeline ci-dessous).

Chaque récepteur est un objet “simple” chargé d’une tâche spécifique et ne connaissant pas la logique de fonctionnement de la chaine. La compréhension et la maintenance sont donc relativement aisées.

Ce pattern implique 2 participants :
- Handler : interface que les handlers “concrets” devront implémenter. C’est le garant de la logique de chainage. En règle générale, il possède une référence vers le premier handler de la chaine, mais ne connait pas le reste.
- Handler “concret” : traite les requêtes dont il est responsable. Il connait et peut accéder à son successeur dans la chaine. S’il sait traiter la requête, il le fait, sinon, il la passe à son successeur.
- Attention, si la chaine est composée de nombreux handlers, le risque est que la requête mette du temps à être “analysée”. Dans ce cas, il est important de soigner l’ordre des différents composants (avec les plus susceptibles d’être utilisés en début de chaine).

Plutôt que d’écrire un énième exemple de code pour ce pattern, je préfère vous donner 2 liens :
- Un exemple avec une chaine de traitement d’un nombre (NegativeProcess, ZeroProcessor, PositiveProcessor…)
- Un excellent exemple de refactoring d’un code existant avec l’aide du pattern Chain of Responsibility

# Pipeline

Il existe une variante intéressante de ce pattern : le pipeline. C’est un pattern inspiré du pattern CoR (Chain of Responsability) et qui ne fait donc pas partie de la spécification originale. La principale différence est que la requête va forcément traverser l’ensemble des étapes pour y subir une opération ou un traitement. Il est aussi nécessaire de standardiser le format de données que chaque composant va recevoir et émettre, car la sortie d’un composant doit correspondre à l’entrée d’un autre.

Il est aussi possible de rendre le pipeline dynamique en ajoutant, modifiant ou supprimant des étapes au cours de l’exécution (étape conditionnelle par exemple). Dans le cas où l’un des composants est un goulot d’étranglement (car son traitement est long), il est possible de le paralléliser pour répartir la charge et réduire les temps de traitement (et même de les répartir sur différents serveurs).

# Command

Ce pattern consiste à encapsuler dans un objet l’ensemble des informations nécessaires pour effectuer une action, immédiatement ou à une date ultérieure. C’est très utile dans le cas où l’on souhaite décaler ou empiler des requêtes (~queue) ou que l’on a besoin de suivre facilement toutes les opérations (et donc de pouvoir envisager la gestion des annulations/rollback). On peut le rapprocher d’un mécanisme de callback en mode orienté objet.

Ce pattern permet de respecter les principes SOLID SRP (Single Responsibility Principle) et Open/Closed.

Il nécessite l’implication de 5 participants :

- Un exécutant (~ invoker) chargé de gérer l’exécution des actions. Cette classe doit posséder un système pour stocker les références vers les commandes. Celui-ci peut prendre plusieurs formes :
    - Une file (~ queue) dans le cas où l’on souhaite exécuter les actions à un autre moment (~ éloignement temporel)
    - Un pool dans le cas où les actions peuvent être exécutées par d’autres applications/serveurs (~ éloignement physique)
        N’importe quelle autre structure en fonction du besoin :)
- Une commande qui représente l’abstraction d’une action. C’est le plus souvent une interface (voir une classe abstraite) et c’est elle qui permet le découplage. Au minimum, elle contient une méthode pour exécuter la commande.
- Une commande “concrète” qui est l’implémentation d’une commande spécifique.
- Un récepteur qui est l’objet final sur lequel sera appliquée l’action portée par la commande.
- Un client qui va se charger d’instancier les commandes “concrètes” et de les passer à l’exécutant.

# Interpreter

C’est l’un des patterns les plus puissants, mais aussi l’un des plus complexes. Il permet de représenter la grammaire d’un langage et d’utiliser cette représentation pour interpréter ce langage.

On va modéliser notre grammaire via un ensemble de règles, chacune pouvant être soit composée (une règle référençant d’autres règles), soit finale (une feuille dans une structure de type arbre). L’interpréteur n’aura plus qu’à parcourir récursivement l’arbre pour obtenir le résultat désiré.

Dans la vie courante, on peut citer plusieurs exemples :

- une partition de musique (le langage) et un musicien (l’interpréteur) vont permettre de jouer un son
- un compilateur va interpréter le code écrit par un développeur pour créer un programme interprétable par une machine
- le système numérique Romain qui permet d’obtenir des chiffres à partir d’un ensemble de lettres

# Iterator

Les collections font partie des types de données les plus utilisées en développement. En résumé, une collection est un conteneur pour un ensemble d’éléments, ce conteneur pouvant être très simple (une liste) ou au contraire complexe (un arbre). Le pattern Iterator propose un moyen standard de parcourir les objets d’une liste sans avoir besoin d’exposer la structure interne de cette liste.

Il est mis en œuvre avec l’aide de 5 participants :

- L’itérateur : interface déclarant les opérations pour parcourir la collection (élément suivant, élément précédent, récupérer la position courante, retourner au début…).
- L’itérateur “concret” : implémente l’interface ci-dessus pour parcourir une collection via un algorithme spécifique (il est donc possible d’avoir plusieurs algorithmes différents pour une même collection).
- La collection : interface déclarant une ou plusieurs méthodes pour récupérer les itérateurs compatibles avec la collection.
- La collection “concrète” : permets de récupérer une instance d’un itérateur “concret” pour la collection (et bien sûr, contiens aussi le reste du code nécessaire à faire fonctionner la collection).
- Le client : travaille avec les itérateurs et les collections via les interfaces (pour limiter le couplage). En général, le client ne va jamais directement créer des itérateurs, mais va les récupérer via les collections.

# Mediator

Le médiator est un élément dont la vocation est la gestion et le contrôle des interactions dans un ensemble d’objets sans que ceux-ci aient besoin de se connaitre mutuellement. Il n’y a donc plus d’interactions directes entre les objets, tout va passer par le médiator. Les composants étant désormais indépendants, cela va permettre de les réutiliser plus facilement dans d’autres applications, seul le médiator étant spécifique. Ce pattern permet, une fois encore, de solutionner un problème de couplage entre composants.

Ce pattern est similaire au pattern Facade, à la différence que ce dernier fonctionne uniquement avec des échanges unidirectionnels entre les composants du système (de l’extérieur vers l’intérieur).

Attention à ne pas tomber dans l’excès qui tend parfois à se retrouver avec un “God-object” comme Médiator !

Une excellente illustration dans le monde réel est la tour de contrôle d’un aéroport. En effet, pour que chaque avion puisse décoller et atterrir dans de bonnes conditions (dans le bon ordre et sans accidents… !), il est nécessaire d’avoir un interlocuteur unique chargé de transmettre les informations. Si chaque avion devait gérer cela seul en communiquant de lui-même avec les autres avions, cela causerait de nombreux soucis…

# Memento

Ce pattern permet de “photographier” et de stocker l’état exact d’un objet (autrement dit, faire un “snapshot”) dans le but de pouvoir le restaurer à l’identique ultérieurement (sans violer le principe d’encapsulation). L’état courant d’un objet étant séparé de son état précédent (passé), s’il arrive quoi que ce soit sur l’état courant, on peut donc restaurer simplement l’état précédent via son Memento.

Un bon exemple est la gestion de la progression de son personnage à travers les niveaux d’un jeu vidéo d’aventure (type Super Mario). Chaque niveau possède un ou plusieurs checkpoints qui permettent de ne pas recommencer depuis le tout début en cas de mort subite :) Chaque passage à un checkpoint crée une instance de Memento et lorsque l’on a plus de vie, on va avoir la possibilité de recommencer le niveau à partir du dernier checkpoint visité. On va donc restaurer l’état exact dans lequel on était au moment du passage à ce checkpoint.

Ce pattern va donc avoir 3 acteurs :

- Originator (~ MainClass) : classe chargée de maintenir les données principales (dans notre cas, le niveau du personnage, son score…). C’est elle qui peut créer un snapshot des données (via Memento CreateSnapshot()) et en restaurer (via void RestoreSnapshot(Memento instance)).
- Memento : classe utilisée pour stocker les données de la classe Originator (le “snapshot”).
- CareTaker : classe qui va contenir les instances du(des) Memento(s) (via une simple propriété ou un objet plus complexe comme une liste).

# Observer

C’est un pattern très souvent utilisé lors du développement d’une application. Il offre le moyen à un objet (le sujet) d’avertir (~ notifier) d’autres objets d’un évènement. Du point de vue des objets cibles (les observateurs), il est possible de s’abonner ou de se désabonner des notifications à loisir. Cela permet donc de choisir de suivre uniquement les objets qui nous intéressent ou nous concerne. On a donc établi une relation de type 1-n entre le sujet et les observateurs, sachant que le sujet conserve une liste de ses souscripteurs pour pouvoir les notifier au moment voulu.

Cela permet quand un objet change d’état, que tous les objets en relation soient notifiés et puissent adapter leur comportement (cas d’une interface graphique par exemple).

Le monde regorge d’exemple de ce pattern, mais je pense que le plus évident est l’abonnement à une newsletter ou à un journal.

# State

Ce pattern repose sur le principe de la machine à état et est très utile pour modéliser des workflows.

- A un moment précis, une application est dans un seul et unique état et répond à certaines règles. A partir de cet état, elle peut passer dans un autre état (en respectant les règles de transition évidemment) qui répondra à d’autres règles.

Le pattern State permet de gérer cela en évitant l’utilisation abusive des instructions conditionnelles (if… else…) et en assouplissant l’ajout d’un nouvel état. Chaque état sera modélisé par une classe dédiée (héritant d’une interface commune) contenant les comportements spécifiques à cet état. Une classe dite “de contexte” permet de garder une référence vers l’état courant. Le principal inconvénient de ce pattern est que la logique du workflow est diluée dans plusieurs classes.

De nombreux automates ou machines industrielles fonctionnent sur le principe du pattern State.

# Strategy

Le pattern Strategy permet de mettre en place plusieurs algorithmes pour une même tâche (un tri par exemple) et de pouvoir en changer de manière simple et transparente.

Chaque algorithme aura sa classe dédiée appelée “XXXStrategy” (RoadStrategy, WalkingStrategy, PublicTransportStrategy… dans le cas d’une application de calcul d’itinéraire par exemple), chacune héritant d’une interface commune (IRoadStrategy). C’est le client qui choisit la stratégie qu’il souhaite utiliser. La classe chargée d’effectuer l’action doit pouvoir fonctionner avec l’ensemble des stratégies.

Dans le cas où il y a peu d’algorithmes différents en jeu, l’utilisation de ce pattern n’est pas forcément pertinente. Cela va alourdir le code sans réel intérêt.

# Template

Il permet de mettre en place la trame générale d’un algorithme (c’est-à-dire les étapes) et offre la possibilité de déléguer la réalisation d’une ou plusieurs étapes à d’autres objets.

Les étapes invariantes seront implémentées dans la classe abstraite de base tant dit que les étapes variables (~ personnalisables) n’auront qu’une implémentation de base (voir pas d’implémentation du tout). Cette dernière pourra/devra être surchargée dans une classe dérivée. L’ordre et le caractère obligatoire de chaque étape sont donc fixes et définis par le créateur de l’algorithme, qui laisse tout de même de la liberté à l’utilisateur de personnaliser certaines étapes.

Deux exemples intéressants :
- la construction d’une maison neuve : le constructeur propose un plan de base avec des éléments obligatoires (des murs, une chape, un toit…) et des options (triple vitrage, porte de garage électrique, terrasse carrelée…). Chaque étape de la construction peut donc être modifiée pour obtenir le résultat désiré.
- la commande d’un sandwich dans une enseigne de fast-food bien connue ;) : on peut choisir le pain, la garniture et la sauce, mais quoi qu’il arrive, il faut les 3 et on doit le faire dans cet ordre !

Le pattern Template ressemble au pattern Strategy à la différence que ce dernier n’impose pas de structure (les étapes) et qu’il permet donc de faire varier la totalité de l’algorithme. L’autre différence fondamentale est que Strategy utilise la délégation alors que Template se base sur l’héritage.

# Visitor

Ce pattern permet une séparation entre les données et les traitements (~algorithmes). On va donc obtenir 2 hiérarchies distinctes :
- les objets représentant les données. Chaque classe implémentera une méthode accept(T visitor) permettant d’injecter le visiteur.
- les objets contenant les traitements sur les données (~ les visiteurs). Ils implémenteront pour chaque type de données une méthode visit(T data) permettant de réaliser l’opération sur les données.

Il permet d’ajouter de nouvelles fonctionnalités à une famille de classes sans modifier ses classes directement. C’est très pratique lorsque l’on a un ensemble de classes fermées (fourni par un tiers par exemple) et que l’on souhaite ajouter un nouveau traitement sur ces classes ou que l’on possède une liste d’objets hétérogènes auxquels on souhaite appliquer des comportements.