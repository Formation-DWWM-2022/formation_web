# Patrons logiciels

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
- Architecture MVC : Modèle-Vue-Contrôleur 
- Architecture MVP : Modèle-Vue-Présentation
- Architecture MVVM : Modèle-Vue-Vue-Modèle

# Patrons de conception
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

4. Anti-patterns

Il existe également un catalogue d'anti-patterns. Comme son nom l'indique, un anti-pattern est un exemple de mauvaise pratique à ne surtout pas suivre.

    Certains patterns originaux du GoF sont maintenant plutôt considérés comme des anti-patterns. C'est par exemple le cas du pattern Singleton

## Classification des patrons de conception

Les patrons diffèrent par leur complexité, leur niveau de détails et l’échelle à laquelle ils sont applicables à un système en cours de conception. Je trouve l’analogie faite avec la construction d’une route plutôt parlante : vous pouvez installer des feux de circulation pour renforcer la sécurité d’une intersection ou construire un échangeur à plusieurs niveaux et muni de passages souterrains pour les piétons.

Les patrons les plus basiques et de plus bas niveau sont souvent appelés des idiomes. Ils sont généralement conçus pour un langage de programmation spécifique.

Les patrons de conception les plus universels et de plus haut niveau sont des patrons d’architecture. Les développeurs peuvent implémenter ces patrons dans à peu près n’importe quel langage. Contrairement aux autres patrons, ils peuvent être utilisés pour concevoir la totalité de l’architecture d’une application.

De plus, tous les patrons de conception peuvent être catégorisés selon leur intention ou leur objectif. Ce cours couvre les trois groupes principaux de patrons :

- Les patrons de création fournissent des mécanismes de création d’objets, ce qui augmente la flexibilité et la réutilisation du code.
    - Fabrique (Factory Method) ⭐⭐⭐
    - Fabrique abstraite (Abstract Factory) ⭐⭐⭐
    - Monteur (Builder) ⭐⭐⭐
    - Prototype ⭐⭐
    - Singleton ⭐⭐

- Les patrons structurels expliquent comment assembler des objets et des classes en de plus grandes structures, tout en les gardant flexibles et efficaces.
    - Adaptateur (Adapter) ⭐⭐⭐
    - Composite ⭐⭐
    - Décorateur (Decorator) ⭐⭐
    - Façade (Facade) ⭐⭐
    - Pont (Bridge) ⭐
    - Procuration (Proxy) ⭐
    - Poids mouche (Flyweight)

- Les patrons comportementaux mettent en place une communication efficace et répartissent les responsabilités entre les objets.
    - Commande (Command)  ⭐⭐⭐
    - Itérateur (Iterator) ⭐⭐⭐
    - Observateur (Observer) ⭐⭐⭐
    - Stratégie (Strategy) ⭐⭐⭐
    - État (State) ⭐⭐
    - Patron de méthode (Template Method) ⭐⭐
    - Chaîne de responsabilité (Chain of Responsibility)  ⭐
    - Mémento (Memento) ⭐
    - Visiteur (Visitor) ⭐
    - Médiateur (Mediator)

