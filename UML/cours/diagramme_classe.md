# Qu'est-ce qu'un diagramme de classes dans le langage UML ?

- Vidéo d'explication : <https://youtu.be/UI6lqHOVHic>
- Vidéo d'explication : <https://youtu.be/8VMMu-vcF60> et <https://youtu.be/nRqTXoiNUHk> et <https://youtu.be/a3DWVNWg2Oo> et <https://youtu.be/RxkarRkq10o>

Le langage de modélisation unifié (UML) peut vous aider à modéliser des systèmes de plusieurs façons. Le diagramme de classes est l'un des types les plus populaires en langage UML. Très utilisé par les ingénieurs logiciel pour documenter l'architecture des logiciels, les diagrammes de classes sont un type de diagramme de structure, car ils décrivent ce qui doit être présent dans le système modélisé.

Le langage UML a été créé sous forme de modèle standardisé pour décrire une approche de la programmation orientée objet. Comme les classes sont les composantes des objets, les diagrammes de classes sont les composantes de l'UML. Les divers éléments d'un diagramme de classes peuvent représenter les classes qui seront effectivement programmées, les principaux objets ou les interactions entre classes et objets.

La forme de la classe à proprement parler se compose d'un rectangle à trois lignes. La ligne supérieure contient le nom de la classe, celle du milieu affiche les attributs de la classe et la ligne inférieure exprime les méthodes ou les opérations que la classe est susceptible d'utiliser. Les classes et sous-classes sont regroupées pour illustrer la relation statique entre chaque objet.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-Shape-Library.png)

# Avantages des diagrammes de classes

Les diagrammes de classes présentent de nombreux avantages pour n'importe quel type d'organisation. Vous pouvez les utiliser pour :

- Illustrer des modèles de données pour des systèmes d’information, quel que soit leur degré de complexité.
- Mieux comprendre l’aperçu général des schémas d’une application.
- Exprimer visuellement les besoins d'un système et diffuser cette information dans toute l'entreprise.
- Créer des schémas détaillés qui mettent l'accent sur le code spécifique qui doit être programmé et mis en œuvre dans la structure décrite.
- Fournir une description indépendante de l'implémentation des types utilisés dans un système, qui sont ensuite transmis entre ses composants.

# Composants de base d’un diagramme de classes

Le diagramme de classes standard est composé de trois sections :

- Section supérieure : contient le nom de la classe. Cette section est toujours nécessaire, que vous parliez du classifieur ou d'un objet.
- Section intermédiaire : contient les attributs de la classe. Utilisez-la pour décrire les qualités de la classe. Elle n'est nécessaire que lors de la description d'une instance spécifique d'une classe.
- Section inférieure : contient les opérations de la classe (méthodes), affichées sous forme de liste. Chaque opération occupe sa propre ligne. Les opérations décrivent la manière dont une classe interagit avec les données.

## Modificateurs d'accès des membres

Toutes les classes ont des niveaux d'accès différents, en fonction du modificateur d'accès (indicateur de visibilité). Voici les niveaux d'accès existants et les symboles qui leur sont associés :

- Public (+)
- Privé (-)
- Protégé (#)
- Paquetage (~)
- Dérivé (/)
- Statique (souligné)

## Portées des membres

Il existe deux portées pour les membres : les classifieurs et les instances.

Les classifieurs sont des membres statiques alors que les instances sont des instances spécifiques de la classe. Si les bases de la théorie orientée objet vous sont familières, alors il n'y a rien de révolutionnaire dans tout cela.

## Autres composants d'un diagramme de classes

Selon le contexte, les classes d'un diagramme de classes peuvent représenter les principaux objets, les interactions dans l'application ou les classes à programmer. Pour répondre à la question « Qu'est-ce qu'un diagramme de classes UML ? », il vous faut d'abord comprendre sa structure de base.

- Classes : modèle pour créer des objets et mettre en œuvre un comportement dans un système. En langage UML, une classe représente un objet ou un ensemble d'objets possédant une structure et un comportement communs. On les représente par un rectangle comprenant des lignes pour le nom de la classe, ses attributs et ses opérations. Lorsque vous dessinez une classe dans un diagramme de classes, seule la ligne supérieure est obligatoire, les autres sont facultatives et ne servent qu'à fournir des détails supplémentaires.

  - Nom : première ligne d'une forme de classe.

  - Attributs : deuxième ligne d'une forme de classe. Chaque attribut de la classe apparaît sur une ligne distincte.

  - Méthodes : troisième ligne d'une forme de classe. On les appelle aussi opérations ; elles apparaissent sous forme de liste, chaque opération occupant une ligne différente.

- Signaux : symboles qui représentent les communications à sens unique et asynchrones entre des objets actifs.

- Types de données : classifieurs qui définissent des valeurs de données. Les types de données peuvent modéliser les types primitifs et les énumérations.

- Paquetages : formes conçues pour organiser les classifieurs connexes d'un diagramme. On les symbolise par une grande forme rectangulaire à onglets.

- Interfaces : groupe de signatures d'opération et/ou de définitions d'attributs définissant un ensemble cohérent de comportements. Les interfaces sont semblables à des classes, sauf qu'une classe peut avoir une instance de son type et qu'une interface doit compter au moins une classe pour la mettre en œuvre.

- Énumérations : représentations de types de données définis par l'utilisateur. Une énumération comprend des groupes d'identificateurs qui représentent des valeurs de l'énumération.

- Objets : instances d'une ou plusieurs classes. On peut ajouter des objets à un diagramme de classes pour représenter des instances concrètes ou prototypiques.

- Artefacts : éléments du modèle qui représentent les entités concrètes d'un système logiciel, tels que des documents, des bases de données, des fichiers exécutables, des composants logiciels, etc.

## Interactions

Le terme « interactions » désigne les relations et liens divers qui peuvent exister dans les diagrammes de classes et d'objets. Voici quelques-unes des interactions les plus courantes :

- Héritage : également connu sous le nom de généralisation, il s'agit du processus par lequel un enfant ou une sous-classe adopte la fonctionnalité d'un parent ou d'une super-classe. On le symbolise par une ligne de connexion droite avec une pointe de flèche fermée orientée vers la super-classe.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/class-diagram/class-diagram-inheritance-175x279.PNG)

Dans cet exemple, l'objet « Voiture » hériterait de tous les attributs (vitesse, nombre de passagers, carburant) et méthodes (rouler(), s'arrêter(), changerDeDirection()) de la classe parent (« Véhicule »), en plus de ses attributs spécifiques (type de modèle, nombre de portes, constructeur) et des méthodes de sa propre classe (Radio(), essuie-glace(), climatisation/chauffage()). Dans un diagramme de classes, on représente l'héritage par une ligne pleine terminée par une flèche creuse et fermée.

- Association bidirectionnelle : relation par défaut entre deux classes. Chacune des deux classes a conscience de l'existence de l'autre et de sa relation avec elle. Cette association est représentée par une ligne droite entre deux classes.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/class-diagram/class-diagram-bi-directional-association-689x182.PNG)

Dans l'exemple ci-dessus, la classe Voiture et la classe RoadTrip sont interdépendantes. À une extrémité de la ligne, la Voiture accepte l'association de « voitureAttribuée » avec la valeur de multiplicité de 0..1, ce qui signifie que lorsque l'instance RoadTrip existe, elle peut être associée à 1 ou 0 instance de Voiture. Dans le cas présent, une classe Caravane distincte avec une valeur de multiplicité de 0..*est nécessaire pour démontrer qu'un RoadTrip pourrait être associé à plusieurs instances de Voitures. Puisqu'une instance de Voiture pourrait être associée à plusieurs « obtenirRoadTrip » – en d'autres termes, une voiture pourrait effectuer plusieurs road trips – la valeur de multiplicité est de 0..*

- Association unidirectionnelle : relation un peu moins courante entre deux classes. Une classe a conscience de l'existence de l'autre et interagit avec elle. Une association unidirectionnelle est représentée par une ligne de connexion droite avec une pointe de flèche ouverte allant de la classe « sachante » vers la classe « connue ».

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/class-diagram/class-diagram-unidirectional-association-600x184.PNG)

Par exemple, lors de votre road trip à travers l'Arizona, vous pourriez tomber sur un contrôle lors duquel un radar enregistrerait votre vitesse, mais vous n'en sauriez rien jusqu'à réception d'une notification par courrier. Cela n'est pas représenté sur l'image, mais dans ce cas, la valeur de multiplicité serait 0..*, en fonction du nombre de fois où vous passeriez devant le radar.

# Exemples de diagrammes de classes

Il est facile de créer un diagramme de classes pour cartographier des schémas de procédés. Examinez les deux exemples ci-dessous lorsque vous créez vos propres diagrammes de classes en langage UML.

## Diagramme de classes d'un système de gestion hôtelière

Un diagramme de classes peut montrer les relations entre chaque objet dans un système de gestion hôtelière, y compris les informations des clients, les tâches du personnel et l'occupation des chambres. L’exemple ci-dessous donne un aperçu utile du système de gestion hôtelière. Créez votre propre un diagramme de classes en cliquant sur le modèle ci-dessous.
modèle de diagramme de classes pour la gestion hôtelière

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/class-diagram-for-hotel-management-system-UML/UML_class_diagram_hotel-949x683.PNG)

## Diagramme de classes d'un système de DAB

Les distributeurs automatiques de billets (DAB) sont d’une simplicité trompeuse : même s'il suffit aux clients d'appuyer sur quelques boutons pour obtenir de l’argent, un DAB sécurisé et efficace doit traverser de nombreuses couches de sécurité pour éviter les fraudes et offrir une réelle valeur ajoutée aux clients de la banque. Les différentes parties humaines et inanimées d’un système de DAB sont illustrées par ce diagramme facile à lire, dans lequel chaque classe possède son titre, et où les attributs sont répertoriés au-dessous.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/class-diagram-for-ATM-system-UML/Class-Diagram-ATM-system-750x660.png)

<!-- 
http://fmi.univ-tiaret.dz/images/3lmd/2020-2021/TD_GL2_N4.pdf
-->

# Exercice 1: Propriétés d’une classe

Une personne est caractérisée par son nom, son prénom, son sexe et son âge. Les objets de classe "Personne" doivent pouvoir calculer leurs revenus et leurs charges. Les attributs de la classe sont privés ; le nom, le prénom ainsi que l'âge de la personne doivent être accessibles par des opérations publiques.

1. Donnez une représentation UML de la classe Personne, en remplissant tous les compartiments adéquats.

Deux types de revenus sont envisagés : d'une part le salaire et d'autre part toutes les autres
sources de revenus. Les deux revenus sont représentés par des nombres réels (float). Pour calculer
les charges globales, on applique un coefficient fixe de 20% sur les salaires et un coefficient de 15%
sur les autres revenus.

2. Enrichissez la représentation précédente pour prendre en compte ces nouveaux éléments.

Un objet de la classe Personne peut être créé à partir du nom et de la date de naissance. Il est
possible de changer le prénom d'une personne. Par ailleurs, le calcul des charges ne se fait pas de
la même manière lorsque la personne décède.

3. Enrichissez encore la représentation précédente pour prendre en compte ces nouveaux éléments.

# Exercice 2 : relations entre classes

Pour chacun des énoncés suivants, donnez un diagramme des classes :

1. Tout écrivain a écrit au moins une œuvre
2. Une librairie vend des livres, caractérisés par leur auteur et leur nombre de pages ; certains
livres possèdent également d’autres caractéristiques : une fourchette des âges pour les livres
pour enfants, et la discipline et le niveau pour les livres scolaires.
3. Les personnes peuvent être associées à des universités en tant qu'étudiants aussi bien qu'en
tant que professeurs.
4. Un rectangle a deux sommets qui sont des points. On construit un rectangle à partir des
coordonnées de deux points. Il est possible de calculer sa surface et son périmètre, ou encore
de le translater.
5. Les cinémas sont composés de plusieurs salles. Les films sont projetés dans des salles. Les
projections correspondantes ont lieu à chacune à une heure déterminée.
6. Tous les jours, le facteur distribue des recommandés dans une zone géographique qui lui est
affectée. Les habitants sont aussi associés à une zone géographique. Les recommandés sont
de deux sortes : lettres ou colis. Comme plusieurs facteurs peuvent intervenir sur la même
zone, on souhaite, pour chaque recommandé, le facteur qui l'a distribué, en plus du
destinataire.

# Exercice 3

Un hôtel est composé d'au moins deux chambres. Chaque chambre dispose d'une salle d'eau
: douche ou bien baignoire. Un hôtel héberge des personnes. Il peut employer du personnel et il est
impérativement dirigé par un directeur. On ne connaît que le nom et le prénom des employés, des
directeurs et des occupants. Certaines personnes sont des enfants et d'autres des adultes (faire
travailler des enfants est interdit). Un hôtel a les caractéristiques suivantes : une adresse, un nombre
de pièces et une catégorie. Une chambre est caractérisée par le nombre et de lits qu'elle contient, son prix et son numéro. On veut pouvoir savoir qui occupe quelle chambre à quelle date. Pour chaque jour de l'année, on veut
pouvoir calculer le loyer de chaque chambre en fonction de son prix et de son occupation (le loyer
est nul si la chambre est inoccupée). La somme de ces loyers permet de calculer le chiffre d'affaires
de l'hôtel entre deux dates.

1. Donnez un diagramme de classes pour modéliser le problème de l'hôtel.

<!--
http://david.roumanet.free.fr/BTS-SIO/SLAM5/UML%20diagramme%20de%20classe.pdf
-->

# Exerice 4

Une classe Véhicule a été caractérisée par les propriétés suivantes : Numéro du véhicule, date de fabrication du véhicule, pavillon du bateau, nombre de réacteurs, superficie des ailes, puissance fiscale, hauteur du mat, nombre de torpilles.

Quel est le défaut de cette classe ? Proposez une autre représentation à l’aide d’un diagramme de classes.

<!--
http://niedercorn.free.fr/iris/iris1/uml/umltd5.pdf
-->

# Exercice 5 : MonAuto

Une réparation est toujours relative à un véhicule. La facture est envoyée au propriétaire (qui est toujours un
client) du véhicule ou à une compagnie d'assurance en cas d'accident; une compagnie d'assurance est un client
pour le garage. En cas de réparation en garantie, aucune facture n'est envoyée.

Le modèle doit contenir les renseignements qui permettent de faire la facture, selon les règles suivantes :
Un véhicule vendu par MonAuto bénéficie d'une année de garantie à partir de la date de livraison.

Pour bénéficier d'une réparation sous garantie, le client doit amener son véhicule à l'atelier avant l'expiration du
délai de garantie. En fin de période de garantie, l'atelier peut être surchargé et le Chef d'atelier ne pourra pas
toujours effectuer la réparation avant la dateF d'expiration. Pour résoudre ce dilemme et éviter toute réclamation,
lorsqu'un client prend un rendez-vous pour effectuer une réparation en garantie le Chef d'atelier prépare une
fiche de réparation "garantie" et y indique la date de la demande de rendez-vous du client, en plus des 2 dates
de réception et restitution du véhicule pour la réparation; cette date de demande de rendez-vous sera utilisée
comme critère de réparation en garantie.

> Quelques précisions :

Nous ne gérons pas l'historique des changements de propriétaires des voitures; chaque fois qu'une voiture
change de propriétaire, un nouveau véhicule sera créé avec indication de la nouvelle immatriculation, du
nouveau propriétaire et de la date de livraison s'il s'agit d'une vente de MonAuto

# Exercice 6 : Système d'informations d'une agence immobilière

En tant qu'intermédiaire entre des propriétaires de biens immobiliers et d'éventuels locataires ou acheteur, une
agence immobilière propose les différents biens suivants:

- à louer ou à acheter : des biens immobiliers d'habitation (studios, appartements, maison) et des biens
immobiliers commerciaux (entrepôts, emplacements pour bureaux ou commerce);

De manière à pouvoir servir efficacement, à la fois, les propriétaires (offrants) et les clients (demandeurs), un
certain nombre de "classes standards" de biens immobiliers sont définies; par exemple: la classe des terrains à
bâtir de 10 ares et de moins de 300.000 Frs., la classe des maisons d'habitation à louer comprenant au minimum
deux chambres et dont le loyer mensuel serait inférieur à 15.000 Francs, la classe des maisons d'habitation à
acheter comprenant au minimum trois chambre et dont le prix demandé serait inférieur à 2.500.000 Francs.

Une classe standard est identifiée par un code de classe et caractérisée par le type de biens immobiliers qui la
composent (maison, appartements, studio, entrepôt, emplacement, terrain), leur mode d'offre (à louer, à
acheter), un prix maximum et une superficie minimum.

Dans le cas d'appartement à louer, le prix maximum correspond à un prix mensuel maximum de location; pour
les biens à acheter, il correspond à un prix maximum d'achat.

Dans le cas d'appartement ou maison, la superficie minimale correspond à un nombre de chambres; dans le cas
d'immeubles commerciaux ou de studios, à une superficie exprimée en m2; dans le cas d'un terrain à bâtir, à une
superficie exprimée en ares.

Pour exercer son activité, l'agence immobilière gère les informations suivantes :

- pour chaque propriétaire: son nom, son adresse (rue et numéro, code postal, localité), deux numéros de
téléphone (privé et travail) et les heures de présence à ces numéros, ainsi que la liste des biens qu'elle est
chargée de négocier pour eux.
- pour tout bien immobilier: son statut (disponible, loué ou acheté), la classe standard à laquelle il appartient,
la date à laquelle le bien lui a été soumis, sa localisation (rue et numéro, code postal et localité), la date de
mise en disposition, le revenu cadastral, la liste des clients qui ont demandé à visiter ainsi que, les dates et
heures de chaque visite, et les coordonnées de la personne de l'agence responsable de celle-ci. Enfin, s'il y a
lieu, les coordonnées du client acquéreur (nom, adresse, téléphone), les prix et date effectifs d'achat où de
location et le numéro de référence du contrat.
- pour tout bien immobilier à louer: le montant de la caution locative, le loyer mensuel, le montant mensuel
des charges, le type de bail, la "garniture" (meublé, non meublé).
- pour tout bien immobilier à acheter : le prix d'achat demandé.
- pour tout bien immobilier à acheter, sauf terrain : l'état (à restaurer, correct, impeccable).
- pour un client: son nom, son adresse, son numéro de téléphone, les types de biens qu'il recherche, c'est à
dire la liste des classes standards qui correspondent aux types de biens qui l'intéressent.

Pour l'agence immobilière, un client correspond à toute personne s'adressant à ses services pour louer ou
acheter un bien immobilier. Il devient acquéreur s'il loue ou achète un bien immobilier par son intermédiaire.

Un propriétaire est une personne qui possède des biens immobiliers et s'adresse à l'agence pour les présenter à
ses clients.

Un propriétaire peut posséder plusieurs biens immobiliers

Un bien immobilier ne peut être la propriété que d'un seul propriétaire.

Un bien immobilier est soit à louer, soit à acheter. Un numéro permet de l'identifier parmi tous les biens
immobiliers.

Un bien immobilier appartient toujours à une et une seule classe standard.

Une classe standard peut ne contenir aucun bien immobilier.
Un client peut être intéressé par plusieurs classes de biens.

Un client est identifié par un numéro attribué par compostage. Il peut visiter plusieurs fois le même bien
accompagné d'un responsable différent.

Un propriétaire est identifié par son numéro.
