# Qu'est-ce qu'un diagramme de package ?

Les diagrammes de package (ou diagramme de paquetages) sont des diagrammes structurels utilisés pour représenter l'organisation et la disposition de divers éléments modélisés sous forme de paquetages. Un paquetage est un regroupement d'éléments UML apparentés, tels que des diagrammes, des documents, des classes ou même d'autres paquetages. Tous les éléments du diagramme sont imbriqués dans des paquetages, qui sont eux-mêmes représentés sous forme de dossiers de fichiers et organisés de manière hiérarchique. Les diagrammes de paquetages sont le plus souvent utilisés pour donner un aperçu visuel de l'architecture en couches d'un classifieur UML, tel qu'un système logiciel.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-package-diagram/UML-Package-Diagram@2x.png)

## Avantages d'un diagramme de paquetages

Un diagramme de package bien conçu offre de nombreux avantages aux personnes souhaitant créer une représentation graphique de leur système ou projet UML.

- Ils fournissent une perspective précise de la structure hiérarchique des différents éléments UML au sein d'un système donné.
- Ces diagrammes permettent de simplifier les diagrammes de classes complexes sous une forme visuelle bien ordonnée.
- Ils offrent une vue d'ensemble précieuse pour les projets et systèmes de grande ampleur.
- Les diagrammes de paquetages peuvent être utilisés pour clarifier visuellement de nombreux types de projets et systèmes.
- Ces visuels peuvent être facilement mis à jour au fur et à mesure de l'évolution des systèmes et des projets.

# Composants de base d'un diagramme de package

Les éléments qui composent un diagramme de paquetages sont relativement simples. En effet, ces derniers ne comportent que deux symboles :

| Image du symbole | Nom de symbole | Description
| --- | --- | ---
| ![](https://cdn-cashy-static-assets.lucidchart.com/marketing/symbols/uml-package-symbol.png) | Package | Regroupe des éléments apparentés en fonction des données, du comportement ou de l'interaction avec les utilisateurs
| ![](https://cdn-cashy-static-assets.lucidchart.com/marketing/symbols/uml-package-dependency-symbol.png) |  Interdépendance | Décrit la relation entre un élément (paquet, élément nommé, etc.) et un autre

Ces symboles peuvent être utilisés de plusieurs manières pour représenter différentes itérations de paquetages, de dépendances et d'autres éléments au sein d'un système. Voici les composants de base que vous trouverez dans un diagramme de package :

- Paquetage : espace de noms utilisé pour regrouper un ensemble d'éléments liés de manière logique au sein d'un système. Tous les éléments contenus dans un paquetage doivent être empaquetables et porter un nom unique.
- Élément empaquetable : élément nommé, appartenant éventuellement de manière directe à un paquetage. Il peut s'agir d'événements, de composants, de cas d'utilisation et même de paquetages. Les éléments empaquetables peuvent également être représentés sous la forme d'un rectangle à l'intérieur d'un paquetage, marqués avec le nom correspondant.
- Dépendances : représentation visuelle de la façon dont un élément (ou un ensemble d'éléments) dépend d'un autre ou l'influence. Les dépendances sont divisées en deux groupes : les dépendances d'accès et les dépendances d'importation. (Voir la section suivante pour plus d'informations).
- Element import : relation dirigée entre un espace de noms d'importation et un élément empaquetable importé. Ce symbole est utilisé pour importer des éléments particuliers sans avoir recours à l'importation de paquetages et sans les rendre publics dans l'espace de noms. 
- Package import : relation dirigée entre un espace de noms d'importation et un paquetage importé. Ce type de relation dirigée ajoute le nom des membres du paquetage importé à son propre espace de noms.
- Package merge : relation dirigée dans laquelle le contenu d'un paquetage s'ajoute au contenu d'un autre. En d'autres termes, le contenu de deux paquetages fusionne pour former un nouveau paquetage.

# Nomenclature des dépendances dans un diagramme de paquetages

Les diagrammes de paquetages sont utilisés, en partie, pour représenter les dépendances d'importation et d'accès entre les paquetages, les classes, les composants et les autres éléments nommés de votre système. Chacune des dépendances est représentée par une ligne de connexion avec une flèche symbolisant le type de relation entre deux éléments ou plus.

Il existe deux principaux types de dépendances :

Dépendance d'accès : indique qu'un paquetage nécessite le soutien d'un autre paquetage.

Exemple :

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-package-diagram/access.png)

Dépendance d'importation : indique que la fonctionnalité a été importée d'un paquetage à un autre.

Exemple :

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-package-diagram/import.png)

Les dépendances peuvent également être subdivisées dans les catégories suivantes :

- Utilisation : intervient lorsqu'un élément nommé donné en nécessite un autre pour sa définition complète et son déploiement. Exemple : client et fournisseur.
- Abstraction : relie deux éléments représentant le même concept à différents niveaux d'abstraction au sein du système (généralement une relation entre un client et son fournisseur).
- Déploiement : représente le déploiement d'un artefact sur une cible.

# Utilisation des paquetages dans les autres diagrammes UML

Comme nous l'avons vu précédemment dans ce guide, les paquetages sont des constructions UML qui peuvent être utilisées pour organiser les éléments d'un classifieur UML dans différents types de diagrammes UML. Les diagrammes de package sont le plus souvent utilisés dans les :

- Diagrammes de cas d'utilisation : chaque cas d'utilisation est représenté comme un paquetage individuel.
- Diagrammes de classes : les classes sont organisées en paquetages.

Les paquetages peuvent également être utilisés dans d'autres types de modélisations UML pour organiser et structurer des éléments tels que des classes, des entités de données et des cas d'utilisation. En utilisant la structure des diagrammes de paquetages dans d'autres diagrammes UML, vous pouvez simplifier n'importe quel type de modélisation et faciliter encore davantage sa compréhension.

## Diagrammes de modélisation

Les diagrammes de paquetages peuvent également être utilisés avec des diagrammes de modélisation. Les diagrammes de modélisation sont un type de diagramme de structure auxiliaire UML qui peut être utilisé pour représenter les aspects logiques, comportementaux ou structurels d'un système. Même les modélisations simples peuvent être difficiles à comprendre sans un certain degré d'organisation visuelle. L'utilisation de paquetages peut fournir aux utilisateurs une vue d'ensemble d'une modélisation avec une désignation clairement indiquée pour chacun des éléments qu'elle contient. En outre, des dépendances clairement identifiées permettent de clarifier les relations entre chaque élément.

# Exemple de diagramme de package

Consultez le modèle suivant pour examiner la manière dont un diagramme de paquetages modélise les paquetages d'une application Web de commerce électronique de base. 

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-package-diagram/UML-Package-Diagram@2x.png)
