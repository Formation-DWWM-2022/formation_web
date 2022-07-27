# Qu'est-ce qu'un diagramme d'interaction ?

Comme son nom l'indique, un diagramme d'interaction UML est un type de diagramme UML utilisé pour représenter le comportement interactif d'un système. Les diagrammes d'interaction se concentrent sur la description du flux de messages au sein d'un système, en fournissant du contexte pour une ou plusieurs lignes de vie. Ils peuvent également servir à illustrer des séquences ordonnées et permettre de visualiser des données en temps réel dans vos modélisations de systèmes UML.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-interaction-diagram/interaction-diagram@2x.png)

# Avantages des diagrammes d'interaction UML

Les diagrammes d'interaction peuvent être appliqués dans plusieurs cas de figure pour fournir un ensemble unique d'informations. Ils peuvent ainsi être utilisés pour :

- modéliser un système sous forme d'une séquence chronologique d'événements ;
- concevoir un système ou processus par ingénierie inverse ou directe ;
- organiser la structure de différents événements interactifs ;
- communiquer de manière simple le comportement des messages et des lignes de vie au sein d'un système ;
- identifier les liens éventuels entre différents éléments de la ligne de vie.

# Types de diagrammes d'interaction UML

Les diagrammes d'interaction sont répartis en quatre grandes catégories :

- Diagramme de communication
- Diagramme de séquence
- Diagramme de temps
- Diagramme d'aperçu des interactions

Chaque type de diagramme se concentre sur un aspect différent du comportement ou de la structure d'un système. Vous trouverez ci-dessous de plus amples informations sur les principes de base de chaque diagramme et sur la manière dont vous pouvez en tirer profit.

# Diagramme de communication (ou diagramme de collaboration)

En UML, les diagrammes de communication décrivent les relations et les interactions entre différents objets logiciels. Ils mettent l'accent sur les aspects structurels d'un diagramme d'interaction, en se concentrant sur l'architecture objet plutôt que sur le flux de messages.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-interaction-diagram/communication-diagram@2x.png)

Les diagrammes de communication offrent les avantages suivants :

- Ils mettent l'accent sur les relations entre les lignes de vie.
- Ils se concentrent sur les éléments d'un système plutôt que sur le flux de messages.
- Ils insistent davantage sur l'organisation que sur le temps.

Les diagrammes de communication peuvent également présenter les inconvénients suivants :

- Ils peuvent devenir très complexes.
- Ils compliquent l'étude d'objets spécifiques au sein d'un système.
- Leur création peut se révéler chronophage.

# Diagramme de séquence

Vous pouvez également représenter des interactions à l'aide d'un diagramme de séquence. Ce type de diagramme s'articule autour de cinq événements principaux :

- Passage d'une commande
- Paiement
- Confirmation de la commande
- Préparation de la commande
- Livraison de la commande

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-interaction-diagram/sequence-diagram@2x.png)

Si la séquence des événements évolue, des retards ou une défaillance du système peuvent se produire. Il est primordial de choisir la notation qui correspond à la séquence particulière de votre diagramme.

Les diagrammes de séquence offrent les avantages suivants :

- Ils sont faciles à générer et à gérer.
- Ils sont faciles à actualiser en fonction de l'évolution d'un système.
- Ils permettent une conception par ingénierie inverse ou directe.

Les diagrammes de séquence peuvent également présenter les inconvénients suivants :

- Ils peuvent devenir complexes, avec un trop grand nombre de lignes de vie et des notations différentes.
- Il est facile de les produire de manière incorrecte et le résultat dépend de l'exactitude avec laquelle vous saisissez votre séquence.

# Diagramme de temps

Une autre possibilité consiste à utiliser un diagramme de temps. Ces visuels sont utilisés pour représenter l'état d'une ligne de vie à tout moment donné, en indiquant les changements d'un objet d'une forme à une autre. Les formes d'onde sont utilisées dans les diagrammes de temps pour visualiser le flux du programme logiciel à différents moments.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-interaction-diagram/Boat_Manufacturing_Timing_Diagram.png)

Les diagrammes de temps offrent les avantages suivants :

- Ils permettent une conception par ingénierie inverse ou directe.
- Ils peuvent représenter l'état d'un objet à un moment précis dans le temps.
- Ils permettent de suivre tous les changements au sein d'un système.

Les diagrammes de temps peuvent également présenter les inconvénients suivants :

- Ils peuvent être difficiles à appréhender.
- Ils peuvent être difficiles à gérer sur la durée.

# Diagramme d'aperçu des interactions

Un diagramme d'aperçu des interactions fournit une vue d'ensemble d'une modélisation d'interaction. Ce type de diagramme donne un aperçu du flux de contrôle d'une interaction à l'autre, ainsi que du flux d'activité d'un diagramme à l'autre.

Les diagrammes de temps offrent les avantages suivants :

- Ils fournissent une vision simple de l'activité au sein d'une modélisation.
- Ils offrent un degré élevé de navigabilité entre les diagrammes.
- Ils permettent d'utiliser la plupart des annotations d'un diagramme d'activité, ainsi que des éléments supplémentaires pour plus de clarté.

Bien que les diagrammes d'interaction soient plutôt intuitifs, ils nécessitent des ramifications et des interactions pour suivre certains comportements, ce qui peut être limitant.

# Symboles et terminologie des diagrammes d'interaction UML

Voici quelques termes et symboles courants que vous rencontrerez dans un diagramme d'interaction :

Ligne de vie : une ligne de vie représente un participant unique dans une interaction donnée. Elle décrit comment une instance d'un classifieur spécifique participe à une interaction. 

Les attributs d'une ligne de vie sont les suivants :

- Nom : utilisé pour faire référence à la ligne de vie dans une interaction spécifique. Cet attribut est facultatif.
- Type : désigne le classifieur dont la ligne de vie représente une instance.
- Sélecteur : utilisé comme condition booléenne pour sélectionner une instance particulière qui satisfait à l'exigence.

Message : un message est un type spécifique de communication entre deux lignes de vie dans une interaction. Il peut être utilisé pour invoquer une opération, créer ou détruire une instance, ou envoyer un signal. Lorsque les lignes de vie reçoivent des messages et interagissent avec eux, cela crée un flux de contrôle qui se déplace de ligne de vie en ligne de vie.

Les messages utilisés dans un diagramme d'interaction sont les suivants :

- Message synchrone : l'expéditeur est bloqué jusqu'au signal de prise en compte par le destinataire. 
- Message asynchrone : l'expéditeur continue son activité sans attendre de savoir si le message est parvenu à son destinataire ou pris en compte par celui-ci.
- Message retour : le destinataire d'un message précédent retourne le flux de contrôle à l'expéditeur.
- Création d'objet : l'expéditeur du message crée une instance d'un classifieur.
- Destruction d'objet : l'expéditeur du message détruit l'instance créée.
- Message trouvé : l'expéditeur du message est en dehors du champ d'interaction.
- Message perdu : le message est perdu dans l'interaction et n'atteint jamais sa destination.

Opérateur : un opérateur spécifie comment les opérandes seront exécutés au sein d'une opération. En UML, un opérateur prend en charge les opérations sur les données sous forme d'arborescence et d'itérations.

Les différents opérateurs d'un diagramme d'interaction sont les suivants :

- Opt (option) : un opérande est exécuté si la condition est vraie.
- Alt (alternatives) : un opérande, dont la condition est vraie, est exécuté.
- Loop (boucle) : cet opérateur met en boucle une instruction pour une durée spécifique.
- Break (arrêt) : si la condition est vraie ou fausse, la boucle est rompue et l'instruction suivante exécutée.
- Ref (référence) : cet opérateur fait référence à une autre interaction.
- Par (traitements parallèles) : tous les opérandes sont exécutés en parallèle les uns des autres.

Arborescence : ce sont là certains des termes les plus cruciaux dans un diagramme d'interaction. Pour représenter l'arborescence d'un diagramme d'interaction, des conditions de garde sont ajoutées aux messages individuels. Ces conditions de garde sont utilisées pour vérifier si un message peut être transmis ou non. Un message ne peut être transmis que si les conditions de garde sont vérifiées. Un message peut avoir plusieurs conditions de garde, et plusieurs messages peuvent utiliser les mêmes conditions de garde.

Itération : une expression d'interaction se compose d'un spécificateur d'interaction et d'une clause d'itération. Une expression d'itération peut également être utilisée pour montrer une itération dans un diagramme d'interaction. Elle n'implique aucune syntaxe spécifique.

Les spécificateurs d'itération parallèle sont utilisés pour indiquer que des messages sont envoyés en parallèle. Ils sont accompagnés par le symbole *//. En UML, une itération est réalisée en utilisant un opérateur de boucle.

Invariants et contraintes d'état : dans un diagramme d'interaction, un état est une situation ou une condition au cours de la vie d'un objet – il satisfait à une contrainte, effectue diverses opérations et attend un événement. Un état peut être modifié lorsqu'une instance ou une ligne de vie reçoit un message, bien que tous les messages ne provoquent pas un changement d'état.

# Comment faire un diagramme d'interaction UML

Suivez ces étapes pour vous assurer que vous disposez des informations nécessaires pour commencer à créer votre diagramme d'interaction :

1. Déterminez le scénario que votre diagramme d'interaction représentera.
2. Identifiez les lignes de vie qui seront impliquées dans votre interaction.
3. Passez en revue chaque ligne de vie pour identifier les liens et connexions potentiels, puis classez-les.
4. Déterminez la séquence des flux de messages au sein de votre interaction.
5. Identifiez les différents types de messages au sein de votre interaction, ainsi qu'une séquence ordonnée des événements et les contraintes temporelles de chaque objet.
6. Dans votre logiciel de diagrammes UML, sélectionnez les formes, nœuds et lignes appropriés pour créer le flux d'activité de votre diagramme. Ou bien, sélectionnez un modèle et personnalisez-le selon vos besoins.
7. Nommez chaque forme, nœud et ligne pour représenter les événements, interactions et messages survenant dans votre système.

Veuillez noter que la conception de votre diagramme sera différente s'il s'agit d'un diagramme de séquence, de temps ou de communication, car chacun d'entre eux se concentre sur un aspect différent du comportement d'un système.

# Exemple de diagramme d'interaction UML

Voici un modèle de diagramme d'interaction élémentaire que vous pouvez utiliser pour modéliser les interactions entre les différents éléments d'une application Web de base. Vous pouvez modifier ce modèle pour visualiser le flux de contrôle d'un système et décrire les interactions entre les objets qui s'y trouvent.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/discovery-page/UML-interaction-diagram/UML-Interaction-Overview-Diagram@2x.png)

