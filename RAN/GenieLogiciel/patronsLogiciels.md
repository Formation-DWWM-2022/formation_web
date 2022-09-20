# Patrons logiciels

- OpenClassrooms - Écrivez du PHP maintenable avec les principes SOLID et les design patterns : https://openclassrooms.com/fr/courses/7415611-ecrivez-du-php-maintenable-avec-les-principes-solid-et-les-design-patterns

Ce chapitre présente les patrons logiciels (software patterns), qui sont des modèles de solutions à des problématiques fréquentes d'architecture ou de conception.

# Patrons d'architecture
Il n'existe pas une architecture logicielle parfaite qui s'adapterait à toutes les exigences.

Au fil du temps et des projets, plusieurs architectures-types se sont dégagées. Elles constituent des patrons d'architecture (architecture patterns) qui ont fait leurs preuves et peuvent servir d'inspiration pour un nouveau projet :

- Architecture Client/Server 
- Architecture Component-Based 
- Architecture Domain Driven Design
- Architecture Layered 
- Architecture Message-bus
- Architecture en étages : N-Tier / 3-Tier
- Architecture Object-Oriented
- Architecture Service-Oriented
- Architecture P2P : Pair à pair
- Architecture [MVC : Modèle-Vue-Contrôleur](../MVC/readme.md)
- Architecture MVP : Modèle-Vue-Présentation
- Architecture MVVM : Modèle-Vue-Vue-Modèle
- Architecture HMVC : Hierarchical model–view–controller

# Patrons de conception

- Qu’est-ce qu’un design Pattern ? : https://youtu.be/CNoMlt7LOmg

Les patrons de conception (design pattern) sont des solutions classiques à des problèmes récurrents de la conception de logiciels. Ce sont des sortes de plans ou de schémas que l’on peut personnaliser afin de résoudre un problème récurrent dans notre code. L'ensemble des patrons de conception constitue un catalogue de bonnes pratiques issu de l'expérience de la communauté. Leurs noms forment un vocabulaire commun qui permet d'identifier immédiatement la solution associée.

    On rencontre également le terme de "motif de conception".

Vous ne pouvez pas vous contenter de trouver un patron et de le recopier dans votre programme comme vous le feriez avec des fonctions ou des librairies prêtes à l’emploi. Un patron, ce n’est pas un bout de code spécifique, mais plutôt un concept général pour résoudre un problème précis. Vous pouvez suivre le principe du patron et implémenter une solution qui convient à votre propre programme.

Les patrons sont souvent confondus avec les algorithmes, car ils décrivent tous deux des solutions classiques à des problèmes connus. Un algorithme définit toujours clairement un ensemble d’actions qui va vous mener vers un objectif, alors qu’un patron, c’est la description d’une solution à un plus haut niveau. Le code utilisé pour implémenter un même patron peut être complètement différent s’il est appliqué à deux programmes distincts.

Un algorithme c’est un peu comme une recette de cuisine, ses étapes sont claires et vous guident vers un objectif précis. Un patron, c’est plutôt comme un plan : vous pouvez voir ses fonctionnalités et les résultats obtenus, mais la manière de l’implémenter vous revient.

## Que trouve-t-on dans un patron de conception ?

La majorité des patrons sont présentés de façon très générale, afin qu’ils soient reproductibles dans tous les contextes. Voici les différentes sections que vous retrouverez habituellement dans la description d’un patron :

- L’intention du patron permet de décrire brièvement le problème et la solution.
- La motivation explique en détail la problématique et la solution offerte par le patron.
- La structure des classes montre les différentes parties du patron et leurs relations.
- L’exemple de code écrit dans un des langages de programmation les plus populaires facilite la compréhension générale de l’idée derrière le patron.

Vous retrouverez dans certains catalogues de patrons, toute une liste de détails pratiques : des cas d’utilisation, les étapes de l’implémentation et les liens avec d’autres patrons.

## Histoire des patrons de conception

Qui a inventé les patrons de conception ? La question est légitime, mais le terme est mal choisi. Les patrons de conception ne sont pas des concepts obscurs et sophistiqués, c’est plutôt l’inverse. Ce sont des solutions classiques à des problèmes connus en conception orientée objet. Lorsqu’une question revient encore et encore dans différents projets, quelqu’un se décide finalement à détailler la solution et à lui donner un nom. C’est souvent comme cela qu’un patron est découvert.

Le concept de patron de conception a d’abord été décrit par Christopher Alexander dans A Pattern Language: Towns, Buildings, Construction. Le livre invente un « langage » pour concevoir un environnement urbain. Les unités de ce langage sont des patrons. Ils peuvent indiquer la hauteur attendue des fenêtres, le nombre d’étages qu’un bâtiment devrait avoir, la taille des espaces verts d’un quartier, etc.

Cette idée a été reprise par quatre auteurs : Erich Gamma, John Vlissides, Ralph Johnson, et Richard Helm. En 1994, ils ont publié Design Patterns : Catalogue de modèles de conception réutilisables, dans lequel ils ont appliqué ce concept de patrons à la programmation. Le livre contient 23 patrons qui résolvent différents problèmes de conception orientée objet et est très rapidement devenu un best-seller. Son nom était un peu trop long et au cours du temps, il a naturellement été remplacé par « the book by the Gang of Four » (le livre du gang des quatre), puis encore raccourci en « the GoF book ».

Depuis ce jour, des dizaines de nouveaux patrons de conception pour la programmation orientée objet ont été découverts. L’utilisation des patrons est devenue tellement populaire dans les autres domaines de la programmation, que de nombreux patrons leur sont spécifiques et ne s’appliquent pas à la programmation orientée objet.

## Pourquoi devrais-je apprendre les patrons de conception ?

En vérité, il est possible de travailler comme développeur pendant de nombreuses années sans avoir jamais appris un seul patron. C’est le cas pour de nombreuses personnes. Mais même si vous faites partie de ces personnes, il est fort probable que vous les utilisiez sans vous en rendre compte. Pourquoi devriez-vous donc prendre le temps de les apprendre ?

- Les patrons de conception sont une boîte à outils de solutions fiables et éprouvées utilisées en réponse à des problèmes classiques de la conception de logiciels. Même si vous n’avez jamais rencontré ces problèmes, le fait de connaitre les patrons est tout de même utile, car il vous enseigne des techniques qui permettent de résoudre toutes sortes de problèmes en utilisant les principes de la conception orientée objet.

- Les patrons de conception définissent un langage commun que vous et vos collègues pouvez utiliser pour mieux communiquer. Vous pouvez dire : « Oh, tu n’as qu’à utiliser un singleton. » et tout le monde comprendra instantanément ce que vous venez de suggérer. Nul besoin d’expliquer ce qu’est un singleton, si vous connaissez déjà son nom et son principe.

## Critique des patrons de conception

Il semblerait que seules les personnes paresseuses n’aient pas encore critiqué les patrons de conception. Regardons ensemble les critiques les plus fréquentes qu’ils reçoivent.

1. Bidouilles pour de mauvais langages de programmation 

Nous faisons généralement appel aux patrons de conception lorsque l’on choisit un langage de programmation ou une technologie qui ne possède pas un niveau suffisant d’abstraction. Dans ce cas, les patrons deviennent une bidouille qui octroie au langage des super-pouvoirs absolument nécessaires.

Par exemple, la Stratégie peut être implémentée avec une fonction anonyme toute simple (lambda) dans la majorité des langages de programmation modernes.

2. Solutions inefficaces

Les patrons tentent d’automatiser des approches qui sont déjà très largement utilisées. Cette unification est vue par beaucoup comme un dogme, et ils implémentent les patrons « à la virgule près », sans les adapter au contexte de leur projet.

3. Utilisation injustifiée

    Si tout ce que vous avez est un marteau, tout ressemble à un clou.

C’est le problème qui va hanter les novices qui viennent juste de se familiariser avec les patrons de conception. Maintenant qu’ils les connaissent, ils vont essayer de les appliquer partout, même dans des situations où du code basique aurait fait l’affaire.

4. [Anti-patterns](./anti-patterns.md)

Il existe également un catalogue d'anti-patterns. Comme son nom l'indique, un anti-pattern est un exemple de mauvaise pratique à ne surtout pas suivre.

    Certains patterns originaux du GoF sont maintenant plutôt considérés comme des anti-patterns. C'est par exemple le cas du pattern Singleton

## Classification des patrons de conception

Les patrons diffèrent par leur complexité, leur niveau de détails et l’échelle à laquelle ils sont applicables à un système en cours de conception. Je trouve l’analogie faite avec la construction d’une route plutôt parlante : vous pouvez installer des feux de circulation pour renforcer la sécurité d’une intersection ou construire un échangeur à plusieurs niveaux et muni de passages souterrains pour les piétons.

Les patrons les plus basiques et de plus bas niveau sont souvent appelés des idiomes. Ils sont généralement conçus pour un langage de programmation spécifique.

Les patrons de conception les plus universels et de plus haut niveau sont des patrons d’architecture. Les développeurs peuvent implémenter ces patrons dans à peu près n’importe quel langage. Contrairement aux autres patrons, ils peuvent être utilisés pour concevoir la totalité de l’architecture d’une application.

De plus, tous les patrons de conception peuvent être catégorisés selon leur intention ou leur objectif. Ce cours couvre les trois groupes principaux de patrons :

- Les patrons de création fournissent des mécanismes de création d’objets, ce qui augmente la flexibilité et la réutilisation du code. [Creational](./creationalPattern.md)

    - Fabrique (Factory Method) ⭐⭐⭐
        - Définit une interface pour la création d’objets dans une classe mère, mais délègue aux sous-classes le choix des types d’objets à créer.
        - [Article](https://refactoring.guru/fr/design-patterns/factory-method) - [PHP](https://refactoring.guru/fr/design-patterns/factory-method/php/example#lang-features)

    - Fabrique abstraite (Abstract Factory) ⭐⭐⭐
        - Permet de créer des familles d’objets apparentés sans préciser leur classe concrète.
        - [Article](https://refactoring.guru/fr/design-patterns/abstract-factory) - [PHP](https://refactoring.guru/fr/design-patterns/abstract-factory/php/example#lang-features)

    - Monteur (Builder) ⭐⭐⭐
        - Permet de construire des objets complexes étape par étape. Ce patron permet de construire différentes variations ou représentations d’un objet en utilisant le même code de construction.
        - [Article](https://refactoring.guru/fr/design-patterns/builder) - [PHP](https://refactoring.guru/fr/design-patterns/builder/php/example#lang-features)

    - Prototype ⭐⭐
        - Permet de créer de nouveaux objets à partir d’objets existants sans rendre le code dépendant de leur classe.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Singleton ⭐⭐
        - Permet de garantir que l’instance d’une classe n’existe qu’en un seul exemplaire, tout en fournissant un point d’accès global à cette instance.
        - [Article](https://refactoring.guru/fr/design-patterns/singleton) - [PHP](https://refactoring.guru/fr/design-patterns/singleton/php/example#lang-features)

Si les objets partagent les mêmes fonctions, mais sont de types différents, il faut privilégier le design pattern `Factory Method`.

Si vous souhaitez économiser l’instanciation d’un objet coûteux pour le modifier légèrement, vous implémenterez le design patten `Prototype`.

Si les objets à manipuler sont complexes, ou leur construction dynamique (elle dépend de nombreux paramètres passés par l’utilisateur), nous pourrons utiliser le design pattern `Builder`.

Enfin, le design pattern `Singleton` est particulier et présente des défauts majeurs de conception. Son usage est justifié dans certains cas très particuliers (gestion de la base de données), mais devrait être évité.

- Les patrons structurels expliquent comment assembler des objets et des classes en de plus grandes structures, tout en les gardant flexibles et efficaces. [Structural](./structuralPattern.md)

    - Adaptateur (Adapter) ⭐⭐⭐
        - Permet de faire collaborer des objets ayant des interfaces normalement incompatibles.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Composite ⭐⭐
        - Permet d'agencer les objets dans des arborescences afin de pouvoir traiter celles-ci comme des objets individuels.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Décorateur (Decorator) ⭐⭐
        - Permet d’affecter dynamiquement de nouveaux comportements à des objets en les plaçant dans des emballeurs qui implémentent ces comportements.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Façade (Facade) ⭐⭐
        - Procure une interface qui offre un accès simplifié à une librairie, un framework ou à n’importe quel ensemble complexe de classes.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Pont (Bridge) ⭐
        - Permet de séparer une grosse classe ou un ensemble de classes connexes en deux hiérarchies — abstraction et implémentation — qui peuvent évoluer indépendamment l’une de l’autre.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Procuration (Proxy) ⭐
        - Permet de fournir un substitut d’un objet. Une procuration donne le contrôle sur l’objet original, vous permettant d’effectuer des manipulations avant ou après que la demande ne lui parvienne.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Poids mouche (Flyweight)
        - Permet de stocker plus d’objets dans la RAM en partageant les états similaires entre de multiples objets, plutôt que de stocker les données dans chaque objet.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

Si vous êtes dans une situation où certaines parties de votre application sont incompatibles entre elles, mais doivent collaborer autour d’une interface commune, il faudra implémenter le design pattern `Adapter`.

Parfois, votre modèle est structuré sous forme d’un arbre où la relation enfant-parent est au cœur du système. Dans ce cas, ne tombez pas dans le piège de l’héritage ! Essayez plutôt d’implémenter le design pattern `Composite`.

Enfin, une bonne pratique logicielle consiste à favoriser la composition plutôt que l’héritage quand il s’agit d’ajouter de nouveaux comportements à un objet. Le design pattern `Decorator` répond à ce besoin, et il est très populaire en PHP.

- Les patrons comportementaux mettent en place une communication efficace et répartissent les responsabilités entre les objets. 
    - Commande (Command)  ⭐⭐⭐
        - Prend une action à effectuer et la transforme en un objet autonome qui contient tous les détails de cette action. Cette transformation permet de paramétrer des méthodes avec différentes actions, planifier leur exécution, les mettre dans une file d’attente ou d’annuler des opérations effectuées.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Itérateur (Iterator) ⭐⭐⭐
        - Permet de parcourir les éléments d’une collection sans révéler sa représentation interne (liste, pile, arbre, etc.).
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Observateur (Observer) ⭐⭐⭐
        - Permet de mettre en place un mécanisme de souscription pour envoyer des notifications à plusieurs objets, au sujet d’événements concernant les objets qu’ils observent.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Stratégie (Strategy) ⭐⭐⭐
        - Permet de définir une famille d’algorithmes, de les mettre dans des classes séparées et de rendre leurs objets interchangeables.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - État (State) ⭐⭐
        - Modifie le comportement d’un objet lorsque son état interne change. L’objet donne l’impression qu’il change de classe.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Patron de méthode (Template Method) ⭐⭐
        - Permet de mettre le squelette d’un algorithme dans la classe mère, mais laisse les sous-classes redéfinir certaines étapes de l’algorithme sans changer sa structure.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Chaîne de responsabilité (Chain of Responsibility)  ⭐
        - Permet de faire circuler une demande dans une chaîne de handlers. Lorsqu'un handler reçoit une demande, il décide de la traiter ou de l’envoyer au handler suivant de la chaîne.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Mémento (Memento) ⭐
        - Permet de sauvegarder et de rétablir l'état précédent d’un objet sans révéler les détails de son implémentation.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Visiteur (Visitor) ⭐
        - Permet de séparer les algorithmes et les objets sur lesquels ils opèrent.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

    - Médiateur (Mediator)
        - Permet de diminuer les dépendances chaotiques entre les objets. Ce patron restreint les communications directes entre les objets et les force à collaborer uniquement via un objet médiateur.
        - [Article](https://refactoring.guru/fr/design-patterns/prototype) - [PHP](https://refactoring.guru/fr/design-patterns/prototype/php/example#lang-features)

Il est rare de devoir implémenter son propre `Observer` ou `Event Dispatcher`. Par contre, la programmation événementielle est une très bonne stratégie pour développer des applications dynamiques, faciles à faire évoluer et à tester. Des applications solides.

Le design pattern `Strategy` servira dans un contexte d’application où vous devrez connecter différents types de services qui font la même chose, mais de différentes façons. Il ressemble étrangement au design pattern `Adapter`, non ? Relisez donc attentivement les passages relatifs à ces deux design patterns pour en comprendre les nuances.

Le design pattern `State` est beaucoup plus commun dans nos applications, car la notion d’état se retrouve dans une majorité de sites : publication, e-commerce, jeux, gestion logistique ou RH. Attention à ne pas complexifier trop vite vos applications ! Si le nombre d’états est fini et petit (disons 2, voire 3 états), on peut probablement se satisfaire de quelques "if/else" dans notre code.

# Patterns JS / Framework JS
- patterns.dev = https://www.patterns.dev/posts/
- JavaScript Design Patterns – Explained with Examples : https://www.freecodecamp.org/news/javascript-design-patterns-explained/
