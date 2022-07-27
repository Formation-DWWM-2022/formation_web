# Qu'est-ce qu'un diagramme de composants UML ?

Un diagramme de composants a pour objectif d'illustrer la relation entre les différents composants d'un système. Dans le cadre de l'UML 2.0, le terme « composant » fait référence à un module de classes qui représentent des systèmes ou des sous-systèmes indépendants ayant la capacité de s'interfacer avec le reste du système.

Il existe une approche de développement entièrement articulée autour des composants: la programmation orientée composant (POC). Dans cette approche, les diagrammes de composants permettent au responsable de la planification d'identifier les différents composants afin que l'ensemble du système fonctionne selon le cahier des charges.

Plus communément, dans une approche de programmation orientée objet, le diagramme de composants permet à un développeur senior de regrouper des classes autour d'un objectif commun afin que les parties prenantes et lui-même puissent disposer d'une vue d'ensemble sur un projet de développement logiciel.

# Avantages des diagrammes de composants UML

Bien que les diagrammes des composants puissent paraître complexes à première vue, ils sont d'une valeur inestimable pour la conception de votre système. Ils peuvent en effet aider votre équipe à :

- imaginer la structure physique du système ;

- faire ressortir les composants du système et à leurs relations ;

- mettre en évidence le comportement de chaque service vis-à-vis de l'interface.

# Comment utiliser les diagrammes de composants UML

Un diagramme de composants UML vous permet d'obtenir une vue d'ensemble de votre système logiciel. Comprendre le comportement précis du service fourni par chaque élément de votre logiciel vous aidera à devenir un meilleur développeur. Les diagrammes de composants peuvent représenter tout type de systèmes logiciels, quel que soit le langage ou style de programmation utilisé.

L'UML est un ensemble de conventions pour les diagrammes orientés objets avec un grand nombre d'applications possibles. Dans les diagrammes de composants, le langage de modélisation unifié (UML) prévoit que les composants et les packages (ou paquetages, en français) soient reliés les uns aux autres par des lignes représentant les connecteurs d'assemblage et les connecteurs de délégation.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/component-diagram/component-diagram-example-497x318.PNG)

# Formes et symboles des diagrammes de composants UML

Les diagrammes de composants s'étendent de la vue d'ensemble sommaire aux modèles plus détaillés et complexes. Quels que soient vos besoins, vous devrez vous familiariser avec les symboles UML appropriés. Voici les différents types de formes qu'il vous faut connaître lorsque vous consultez ou souhaitez réaliser des diagrammes de composants :
| Symbole | Nom | Description
| --- | --- | ---
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Component/uml-components-symbols.svg) | Symbole de composant | Entité tenue d'exécuter une fonction stéréotypée. Un composant fournit et consomme un comportement par le biais d'interfaces, ainsi que par le biais d'autres composants. Considérez les composants comme un type de classe. En UML 1.0, un composant est modélisé sous forme de bloc rectangulaire avec deux rectangles plus petits qui dépassent sur le côté. En UML 2.0, un composant est modélisé sous forme de bloc rectangulaire avec une petite image de l'ancienne forme UML 1.0.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Component/uml-node-symbol.svg) | Symbole de nœud | Représente des objets matériels ou logiciels situés à un niveau supérieur aux composants.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Class/uml-interface-symbols.svg) | Symbole d'interface | Indique les entrées ou les données qu'un composant reçoit ou fournit. Les interfaces peuvent être représentées par des notes textuelles ou des symboles, tels que des formes de sucette, de douille ouverte et d'articulation.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Component/uml-port-symbol.svg) | Symbole de port | Spécifie un point d'interaction distinct entre un composant et son environnement. Les ports sont symbolisés par un petit carré.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Use-Case/uml-package-symbol.svg) | Symbole de paquetage | Regroupe plusieurs éléments du système et est représenté par des dossiers de fichiers dans Lucidchart. Tout comme les dossiers de fichiers regroupent plusieurs feuilles, les packages peuvent englober plusieurs éléments.
![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Component/uml-notes-symbol.svg) | Remarque | Permet aux développeurs d'ajouter une méta-analyse sur le diagramme de composants.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Component/uml-dependency-symbol.svg) | Symbole de dépendance | Indique les relations de dépendance entre les différentes parties de votre système. Les dépendances sont représentées par des lignes pointillées reliant un composant (ou élément) à un autre.

# Comment utiliser les formes et symboles de composants UML

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/component-diagram/component-diagram-notation-504x110.gif)

Il existe trois manières courantes de créer un compartiment pour le nom d'un composant. Vous devez toujours inclure le texte du composant entre des chevrons et/ou le logo du composant. La distinction est importante, car un rectangle indiquant uniquement un nom à l'intérieur est réservé aux classificateurs (éléments de classe).

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/component-diagram/component-diagram-interface-197x187.gif)

Comme pour la notation de classe, les composants disposent également d'un espace facultatif pour énumérer les interfaces, de la même manière que vous ajoutez des attributs et des méthodes à la notation de classe. Les interfaces représentent les endroits où les groupes de classes du composant communiquent avec les autres composants du système. Une autre façon de représenter les interfaces consiste à étendre les symboles au-delà de la boîte du composant. Voici un rapide aperçu des symboles les plus couramment utilisés :

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-component-diagram-tutorial/ProvidedInterface.PNG)

Interfaces fournies : une ligne droite s'étend à partir de la boîte du composant avec un cercle à l'extrémité. Ces symboles représentent les interfaces où un composant produit des informations utilisées par l'interface requise d'un autre composant.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-component-diagram-tutorial/RequiredInterface.PNG)

Interfaces requises : une ligne droite s'étend à partir de la boîte du composant avec un demi-cercle à son extrémité (parfois également représenté par une ligne en pointillé avec une flèche ouverte). Ces symboles représentent les interfaces où un composant a besoin d'informations pour remplir sa fonction.

En UML, un diagramme de composants représente visuellement les relations entre les différents composants d'un système logiciel. Pour réaliser le vôtre, accédez à la bibliothèque de formes de diagrammes de composants personnalisées de Lucidchart. Les diagrammes de composants UML doivent communiquer :

- la portée de votre système ;

- la structure globale de votre système logiciel ;

- les objectifs que le système permet aux entités humaines ou non humaines (appelées acteurs) d'atteindre.

# Modèles et exemples de diagramme de composants UML

Les diagrammes de composants UML permettent de simplifier les processus, même les plus complexes. Consultez les exemples ci-dessous pour découvrir comment représenter les comportements de processus spécifiques avec des diagrammes de composants.

## Diagramme de composants UML pour un système de gestion bibliothécaire

Les systèmes de gestion bibliothécaire ont été parmi les premiers au monde à être principalement gérés par informatique. Aujourd'hui, beaucoup de ces systèmes sont administrés dans le cloud par des services tiers plutôt qu'en interne. Bien que le terme « système de gestion bibliothécaire » évoque généralement un moyen de suivre des livres imprimés, ces outils organisent aujourd'hui toutes sortes de données enregistrées et consultées par les utilisateurs.

Ces transactions génèrent un réseau de relations entre les composants du système de gestion bibliothécaire. Pour comprendre le fonctionnement de ces relations et celui du système dans son ensemble, examinez le diagramme UML ci-dessous. Vous ou votre équipe pouvez également utiliser ce diagramme comme modèle.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/component-diagram-for-library-management-system-UML/component_diagram_library_management_system-893x634.PNG)

## Diagramme de composants UML d'un système de DAB (Distributeur automatique de billets)

Un diagramme de composants est similaire à un diagramme de classes dans la mesure où il illustre les relations entre les éléments d'un système donné, mais les diagrammes de composants représentent des relations plus complexes et variées que la plupart des diagrammes de classes.

Dans le diagramme ci-dessous, chaque élément est contenu dans une petite boîte. Les lignes pointillées avec des flèches indiquent les relations de dépendance entre certains composants. Par exemple, le lecteur de carte, la page Web, l'ordinateur du client et le système de DAB dépendent tous de la base de données de la banque. Les lignes pointillées avec des cercles à l'extrémité, appelés symboles « sucette », indiquent une relation de réalisation.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/component-diagram-for-ATM-system-UML/component_diagram_ATM_system-843x746.PNG)
