# Qu'est-ce qu'un diagramme de déploiement ?

Dans le contexte du langage de modélisation unifié (UML), un diagramme de déploiement fait partie de la catégorie des diagrammes structurels, car il décrit un aspect du système même. Dans le cas présent, le diagramme de déploiement décrit le déploiement physique des informations générées par le logiciel sur des composants matériels. On appelle artefact l'information qui est générée par le logiciel. Attention, ne confondez cette utilisation du terme avec celle qui existe dans d'autres approches de modélisation comme le BPMN.

Les diagrammes de déploiement sont constitués de plusieurs formes UML. Les boîtes en trois dimensions, appelées nœuds, représentent les composants du système, qu'ils soient logiciels ou matériels. Les lignes entre les nœuds indiquent les relations et les petites formes à l'intérieur des boîtes représentent les artefacts logiciels qui sont déployés.

# Applications des diagrammes de déploiement

Les diagrammes de déploiement sont utiles dans plusieurs domaines. Vous pouvez les utiliser pour :

- Montrer quels éléments logiciels sont déployés par quels éléments matériels.

- Illustrer le traitement d'exécution du point de vue matériel

- Visualiser la topologie du système matériel

# Indications relatives aux diagrammes de déploiement

Avant de commencer à créer des diagrammes, posez-vous les questions suivantes :

1. Avez-vous identifié la portée de votre système ? Par exemple, vous devez savoir si votre diagramme concerne une application unique ou le déploiement de tout un réseau d'ordinateurs.

2. Quelles sont les limites de votre infrastructure physique ? Avec quels systèmes existants aurez-vous besoin d'interagir ? Assurez-vous de connaître le logiciel d'exploitation et les protocoles avec lesquels vous allez travailler, et la surveillance que vous allez mettre en place.

3. Quelle architecture de distribution utilisez-vous ? Vous devez savoir combien de niveaux votre application comptera et vers quelle application elle sera déployée.

4. Disposez-vous de tous les nœuds dont vous aurez besoin ? Savez-vous comment ils sont tous connectés ?

5. Savez-vous quels composants vont se trouver sur quels nœuds ?

# Éléments d'un diagramme de déploiement

Les diagrammes de déploiement sont composés de nombreuses formes. La liste suivante offre un aperçu des principaux éléments que vous pourriez rencontrer. Vous pouvez apercevoir la plupart d'entre eux dans l'image ci-dessous.

- Artefact : produit développé par le logiciel, symbolisé par un rectangle avec le nom et le mot « artefact » entourés de flèches doubles.

- Association : ligne indiquant un message ou tout autre type de communication entre deux nœuds.

- Composant : rectangle avec deux onglets indiquant un élément logiciel.

- Dépendance : ligne en pointillés terminée par une flèche, qui indique qu'un nœud ou composant est dépendant d'un autre.

- Interface : cercle qui indique une relation contractuelle. Les objets qui réalisent l'interface doivent remplir une sorte d'obligation.

- Nœud : élément matériel ou logiciel représenté par une boîte en relief.

- Nœud conteneur : nœud qui en contient un autre, comme dans l'exemple ci-dessous où les nœuds contiennent des composants.

- Stéréotype : dispositif contenu dans le nœud, présenté dans la partie supérieure du nœud et dont le nom est entouré de flèches doubles.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/what-is-a-deployment-diagram-in-UML/deployment_diagram_real_estate-700x573.png)

# Symboles et nomenclature des diagrammes de déploiement

Utilisez ces formes lors de la création de diagrammes de déploiement UML.

## Nœuds

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/deployment-diagram/node-deployment-diagram-140x143@2x.jpeg)

Il existe deux types de nœuds dans un diagramme de déploiement : les nœuds de périphériques et les nœuds d'environnement d'exécution. Les premiers sont des ressources de calcul ayant des capacités de traitement et pouvant exécuter des programmes. Un PC, un ordinateur portable ou un téléphone mobile sont autant de nœuds de périphériques.

Un nœud d'environnement d'exécution ou EEN est un système informatique qui réside dans un nœud de périphérique. Il peut s'agir d'un système d'exploitation, d'une machine virtuelle Java ou d'un autre conteneur de servlets.

## Base de données

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/deployment-diagram/database-deployment-diagram-140x150.jpeg)

Les bases de données représentent les données stockées par le système déployé. Dans certains cas, la base de données est représentée comme un simple nœud, mais on trouve parfois cette forme pour représenter une base de données.

## Autres formes

- Voie de communication : ligne droite qui représente la communication entre deux nœuds de périphériques.

- Artefacts : une boîte comportant le titre « <> » suivi du nom du fichier.

- Paquetage : une boîte en forme de dossier qui regroupe tous les nœuds de périphériques pour contenir l'intégralité du déploiement.

- Composant : entité nécessaire à l'exécution d'une fonction stéréotypée. Jetez un œil à ce guide sur la notation des composants UML.

# Exemple de diagramme de déploiement

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/deployment-diagram/deployment-diagram-example-700x412@2x.jpeg)

Cet exemple montre un diagramme de déploiement élémentaire pour Lucidchart. On y voit un serveur web, un serveur de base de données et la machine depuis laquelle l'utilisateur consulte le site web. Vous pouvez complexifier ce diagramme en montrant les différentes parties du serveur web et les interactions entre JavaScript et le client, mais cet exemple vous donne une idée de l'apparence d'un diagramme de déploiement avec la notation UML.
