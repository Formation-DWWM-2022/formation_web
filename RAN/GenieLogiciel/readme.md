# Analyse et conception

Ce cours constitue une introduction au génie logiciel. Il présente les grands enjeux et les bonnes pratiques liés à l'activité de réalisation de logiciels :

- Notion d'architecture logicielle.
- Principes de conception.
- Patrons logiciels.
- Production du code source.
- Gestion des versions.
- Travail collaboratif.
- Tests.
- Documentation.

"Le point de vue adopté par ce cours est essentiellement technique. Les aspects organisationnels (gestion de projet) et méthodologiques ne sont pas étudiés ici."

# Le génie logiciel
## Introduction
Le génie logiciel (software engineering) représente l'application de principes d'ingenierie au domaine de la création de logiciels. Il consiste à identifier et à utiliser des méthodes, des pratiques et des outils permettant de maximiser les chances de réussite d'un projet logiciel.

Il s'agit d'une science récente dont l'origine remonte aux années 1970. A cette époque, l'augmentation de la puissance matérielle a permis de réaliser des logiciels plus complexes mais souffrant de nouveaux défauts : délais non respectés, coûts de production et d'entretien élevés, manque de fiabilité et de performances. Cette tendance se poursuit encore aujourd'hui.

L'apparition du génie logiciel est une réponse aux défis posés par la complexification des logiciels et de l'activité qui vise à les produire.

## Enjeux
Le génie logiciel vise à rationaliser et à optimiser le processus de production d'un logiciel. Les enjeux associés sont multiples :
- Adéquation aux besoins du client.
- Respect des délais de réalisation prévus.
- Maximisation des performances et de la fiabilité.
- Facilitation de la maintenance et des évolutions ultérieures.

Comme tout projet, la réalisation d'un logiciel est soumise à des exigences contradictoires et difficilement conciliables ([triangle cout-delai-qualite](./triangleQualiteCoutDelai.md))

![](https://2847164876-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LDB4vgNE8GeGbLj6zqs%2F-LDB6opZ8PcgPlJl9qkn%2F-LDB8rSQJ0vMd-3sSUaD%2Ftriangle-qualite-cout-delai.jpg?generation=1527064789893413&alt=media)

La qualité d'un logiciel peut s'évaluer à partir d'un ensemble de facteurs tels que :

- Le logiciel répond-il aux besoins exprimés ?
- Le logiciel demande-t-il peu d'efforts pour évoluer aux regards de nouveaux besoins ?
- Le logiciel peut-il facilement être transféré d'une plate-forme à une autre ?
- ... (voir norme ISO [9126](https://fr.wikipedia.org/wiki/ISO/CEI_9126))

Sans etre une [solution miracle](https://fr.wikipedia.org/wiki/Pas_de_balle_en_argent), le génie logiciel a pour objectif de maximiser la surface du triangle en tenant compte des priorités du client.

## Dimensions
Le génie logiciel couvre l'ensemble du cycle de vie d'un logiciel. Il étudie toutes les activités qui mènent d'un besoin à la livraison du logiciel, y compris dans ses versions successives, jusqu'à sa fin de vie.

Les dimensions du génie logiciel sont donc multiples :
- Analyse des besoins du client.
- Définition de l'architecture du logiciel.
- Choix de conception.
- Règles et méthodes de production du code source.
- Gestion des versions.
- Test du logiciel.
- Documentation.
- Organisation de l'équipe et interactions avec le client.
- ...

# Sommaire
- [Architeture logicielle](./architectureLogicielle.md)
    - [UML](../../UML/readme.md)
- [Principes de conception](./principeConception.md)
    - Séparation des responsabilités
    - Réutilisation
    - Encapsulation maximale
    - Couplage faible
    - Cohésion forte
    - DRY
    - KISS
    - YAGNI
- [SOLID](./SOLID.md)
    - S : Single Responsibility Principle
    - O : Open/Closed Principle
    - L : Liskov’s Substitution Principle
    - I : Interface Segregation Principle
    - D : Dependency Inversion Principle
- [STUPID](./STUPID.md)
    - S : Singleton
    - T : Tight Coupling
    - U : Untestability
    - P : Premature Optimization
    - I : Indescriptive Naming
    - D : Duplication
- [Patrons logiciels](./patronsLogiciels.md)
    - Patrons d'architecture
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
    - [Anti-patterns](./anti-patterns.md)
    - Patron de conception
        - Fabrique (Factory Method) ⭐⭐⭐
        - Fabrique abstraite (Abstract Factory) ⭐⭐⭐
        - Monteur (Builder) ⭐⭐⭐
        - Prototype ⭐⭐
        - Singleton ⭐⭐
        - Adaptateur (Adapter) ⭐⭐⭐
        - Composite ⭐⭐
        - Décorateur (Decorator) ⭐⭐
        - Façade (Facade) ⭐⭐
        - Pont (Bridge) ⭐
        - Procuration (Proxy) ⭐
        - Poids mouche (Flyweight)
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
- [Production de code source](./productionCodeSource.md)
    - [Convetion de nommage pour PHP](https://github.com/Formation-DWWM-2022/formation_web/tree/main/PHP#notre-guide-de-style-php----quest-ce-que-le-psr-)
    - [Convetion de nommage pour JS](https://github.com/Formation-DWWM-2022/formation_web/tree/main/JS#notre-guide-de-style-javascript)
- [Gestion des versions](../../GIT/readme.md)
- [Travail collaboratif](../../GIT/readme.md)
- [Tests](../TestDevelopment/readme.md)
- [Documentation](../DocumentationTechnique/readme.md)
- [Refactoring](./refactoring.md)
