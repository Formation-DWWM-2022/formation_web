# Qu'est-ce qu'un diagramme de séquence dans le langage UML ?

- Vidéo d'explication : <https://youtu.be/fPm5NrvmXHc>

Pour comprendre ce qu’est un diagramme de séquence, il est important de connaître le rôle du langage de modélisation unifié, mieux connu sous le nom d'UML. L'UML est un outil de modélisation qui guide la création et la notation de nombreux types de diagrammes, y compris les diagrammes comportementaux, les diagrammes d’interaction et les diagrammes de structure.

Un diagramme de séquence est un type de diagramme d'interaction, car il décrit comment et dans quel ordre plusieurs objets fonctionnent ensemble. Ces diagrammes sont utilisés à la fois par les développeurs logiciels et les managers d'entreprises pour analyser les besoins d'un nouveau système ou documenter un processus existant. Les diagrammes de séquence sont parfois appelés diagrammes d'événements ou scénarios d'événements.

Notez qu'il existe deux types de diagrammes de séquence : les diagrammes UML et les diagrammes à base de code. Ces derniers proviennent des codes de programmation et ne seront pas abordés dans ce guide.

# Avantages des diagrammes de séquence

Les diagrammes de séquence peuvent constituer des références utiles pour les entreprises et d'autres organisations. Essayez de dessiner un diagramme de séquence pour :

- Représenter les détails d'un cas d'utilisation UML

- Modéliser le déroulement logique d'une procédure, fonction ou opération complexe

- Voir comment les objets et les composants interagissent entre eux pour effectuer un processus.

- Schématiser et comprendre le fonctionnement détaillé d'un scénario existant ou à venir

# Cas d’utilisation des diagrammes de séquence

Les scénarios suivants sont idéaux pour utiliser un diagramme de séquence :

- Scénario d'utilisation : un scénario d'utilisation est un diagramme décrivant comment votre système pourrait potentiellement être utilisé. C'est un bon moyen de s'assurer que vous avez pris en compte la logique de tous les scénarios d'utilisation du système.

- Logique de méthode : de la même façon que vous pouvez utiliser un diagramme de séquence UML pour analyser la logique d'un cas d'utilisation, vous pouvez aussi vous en servir pour analyser la logique d'une fonction, d'une procédure ou d'un processus complexe.

- Logique de service : si vous considérez un service comme étant une méthode générale utilisée par différents clients, un diagramme de séquence est le moyen idéal de le schématiser.

# Composants et symboles élémentaires

Pour comprendre ce qu'est un diagramme de séquence, vous devez connaître ses symboles et ses composants. Les diagrammes de séquence sont composés des icônes et des éléments suivants :

| Symbole | Nom | Description
| --- | --- | ---
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-object-symbol.svg) | Symbole d’objet | Représente une classe ou un objet en langage UML. Le symbole objet montre comment un objet va se comporter dans le contexte du système. Les attributs de classe ne doivent pas être énumérés dans cette forme.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-activation-box-symbol.svg) | Boîte d'activation | Représente le temps nécessaire pour qu'un objet accomplisse une tâche. Plus la tâche nécessite de temps, plus la boîte d'activation est longue.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-actor-symbol.svg) | Symbole d'acteur | Montre les entités qui interagissent avec le système ou qui sont extérieures à lui.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-package-symbol.svg) | Symbole de paquetage | Utilisé dans la notation UML 2.0 pour accueillir les éléments interactifs du diagramme. Également connue sous le nom de « cadre », cette forme rectangulaire est représentée par un petit rectangle intérieur qui contient l'intitulé du diagramme.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-lifeline-symbol.svg) | Symbole de ligne de vie | Représente le passage du temps qui se prolonge vers le bas. Cette ligne verticale en pointillés montre les événements séquentiels affectant un objet au cours du processus schématisé. Les lignes de vie peuvent commencer par une forme rectangulaire avec un intitulé ou par un symbole d'acteur.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-option-loop-symbol.svg) | Symbole de boucle optionnelle | On utilise ce symbole pour modéliser des scénarios ou une situation qui ne se produira qu'à certaines conditions.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-alternative-symbol.svg) | Symbole d'alternatives | Symbolise des choix (qui en général s'excluent mutuellement) entre deux séquences de messages ou plus. Pour représenter les alternatives, utilisez la forme rectangulaire comportant un intitulé et une ligne en pointillés à l'intérieur.

## Symboles de messages courants

Utilisez les flèches et les symboles de messages suivants pour indiquer comment les informations sont transmises entre des objets. Ces symboles peuvent représenter le début et l'exécution d'une opération, ou l'envoi et la réception d'un signal.

| Symbole | Nom | Description
|  --- | --- |  ---
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-synchronous-message-symbol.svg) | Symbole de messages synchrones | Représentés par une ligne pleine terminée par une pointe de flèche pleine. On utilise ce symbole lorsqu'un expéditeur doit attendre une réponse à un message avant de continuer. Le diagramme doit montrer à la fois l'appel et la réponse.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-asynchronous-message-symbol.svg) | Symbole de messages asynchrones | Représentés par une ligne pleine terminée par une pointe de flèche. Les messages asynchrones ne nécessitent pas de réponse avant que l'expéditeur ne continue. Seul l'appel doit être inclus dans le diagramme.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-return-message-symbol.svg) | Symbole de messages de retour asynchrones  | Représentés par une ligne en pointillés terminée par une tête de flèche.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-create-message-symbol.svg) | Symbole de messages de création asynchrones  | Représentés par une ligne en pointillés terminée par une pointe de flèche. Ces messages créent de nouveaux objets.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-return-message-symbol.svg) | Symbole de messages de réponse | Représentés par une ligne en pointillés terminée par une pointe de flèche, ces messages sont des réponses aux appels.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/discovery/UML/UML-Sequence/uml-deleted-message-symbol.svg) | Symbole de messages de suppression | Représentés par une ligne pleine terminée par une pointe de flèche pleine, suivie du symbole X. Ces messages détruisent un objet.

# Exemples de diagrammes de séquence

## Diagramme de séquence du système de gestion d'un hôpital

Comme pour la plupart des secteurs d'activité, la technologie a complètement transformé le domaine de la médecine. Un système d’information hospitalier aide les médecins, les administrateurs et le personnel de l'hôpital à gérer toutes les informations recueillies dans l'hôpital et toutes les activités qui s'y déroulent, y compris les examens, les ordonnances, les rendez-vous et les renseignements sur les patients et leurs soignants. Le diagramme ci-dessous fournit un aperçu simple des interactions dans le temps entre chacun des processus primaires.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/sequence-diagram-for-hospital-management-system-UML/sequence_diagram_hospital-900x982.png)

## Diagramme de séquence pour les systèmes de distributeurs automatiques de billets (DAB)

Un DAB permet aux clients d’accéder à leurs comptes bancaires par le biais d'un processus entièrement automatisé. Vous pouvez examiner les étapes de ce processus sous une forme pratique en dessinant ou en affichant un diagramme de séquence. L’exemple suivant décrit l’ordre séquentiel des interactions du système de DAB. Il suffit de cliquer pour modifier le modèle et personnaliser le diagramme de séquence selon vos besoins.
diagramme de séquence d'un système de DAB

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/sequence-diagram-for-ATM-system-UML/sequence_diagram_atm_example-800x1292.png)

<!--
https://lipn.univ-paris13.fr/~gerard/docs/corrections/uml-corr04.pdf
-->

# Exercice 1 : Types de messages

Question : Quand un courrier électronique est envoyé par l'émetteur, celui-ci ne veut pas attendre que
destinataire l'ait reçu et il n'y a pas d'intermédiaire. Peut-on utiliser un message synchrone ? Complétez la figure ci dessous par des fièches représentant des messages.

![](..\img\exericetypesmessages.png)

Question : Est-ce que transmettre est une opération ou un signal ? Dans tous les cas, donnez des
éléments d'un diagramme de classe cohérent avec le diagramme de séquence.

Question : Un serveur de messagerie sert d'intermédiaire entre l'émetteur et le récepteur d'un email.
Le serveur est toujours en fonction. Est-ce qu'on peut utiliser des messages synchrones pour l'envoi et la
récupération de emails ? Complétez la figure ci dessous par des fleèches représentant des messages

![](..\img\exericetypesmessagesv2.png)

Question : Est-ce que poster est une opération ou un signal ? Dans tous les cas, proposez un diagramme de classe cohérent avec le diagramme de séquence

# Exercice 2 : Modélisation d'une interaction interne

Le diagramme de classes présenté ci dessous modélise la structure interne de la bibliothèque.

![](..\img\exercicemodelisationinteractioninterne.png)

Un acteur adhérent peut emprunter un exemplaire d'une oeuvre donnée. L'emprunt se fait de la
façon suivante : la méthode emprunter est appelée avec un objet de classe Adhérent donné en argument ;
s'il reste des exemplaires dans la bibliothèque, l'un des exemplaires associés à l'oeuvre est extrait via
la méthode extraireExemplaire, une instance de la classe Prêt est créée, puis l'exemplaire extrait de la
bibliothèque est attribué à l'adhérent grâce à l'opération attribuer. S'il restait un exemplaire, l'oeuvre retourne "Ok" et dans le cas contraire, elle retourne "PasOk".

# Exercice 3 : Documentation d'un cas d'utilisation

La rubrique "enchaînement nominal" du cas d'utilisation "retrait d'espèces" contient les éléments suivants :

1. Le guichetier saisit le numéro de compte du client ;
2. L'application valide le compte auprès du système central ;
3. Le guichetier demande un retrait de 100 euros ;
4. Le système "guichet" interroge le système central pour s'assurer que le compte est suffisamment approvisionné ;
5. Le système central effectue le débit du compte ;
6. En retour, le système notifie au guichetier qu'il peut délivrer le montant demandé.

Question : Donner le diagramme de séquences associé à cette description textuelle

<!--
http://exercicecorrige.blogspot.com/2013/08/conversation-telephonique.html
-->
# Exercice 4 :  Conversation téléphonique

Décrire par un diagramme de séquences une conversation téléphonique (je décroche, tonalité, je compose le numéro, sonnerie...).

<!--
http://exercicecorrige.blogspot.com/2013/08/assistance-telephonique.html?spref=bl
-->

# Exercice 5 : Assistance téléphonique

Donner le diagramme de séquences correspondant au scénario suivant. Un utilisateur désire poser des questions à une assistance téléphonique. Soit un opérateur décroche dans les 10 secondes de l'appel téléphonique, et à ce moment il dialogue directement avec l'utilisateur; soit aucun opérateur n'est disponible et les 10 secondes s'écoulent, l'utilisateur est alors basculé sur un serveur vocal qui va enregistrer ses questions. Un opérateur disponible pourra ensuite consulter le serveur vocal, écouter les questions et, après réflexion, rappeler l'utilisateur. Entre le moment du premier appel et les réponses aux questions, il ne doit pas s'écouler plus d'une heure.

<!--
https://eeisti.fr/grug/ATrier/GI1/Semestre2/AnalyseOrienteObjet/TD6SequenceDiagramCORRIGE.pdf
-->

# Exercice 6 : Bibliothèque

On s'intéresse à la modélisation dynamique de la gestion d'une bibliothèque. Pour emprunter un
livre, on a le scénario suivant :

1) L'adhérent se présente au comptoir et la bibliothécaire saisit la fonctionnalité pour emprunter un
livre de l'application.
2) D'abord, il faut vérifier si l'adhérent a le droit d'emprunter des livres (carte valide, nombre de
livres déjà empruntés ne dépasse pas un seuil fixé, ...).
3) En suite, il faut vérifier si le livre est disponible.
4) Si tout va bien, on crée un nouveau prêt avec la date de prêt et la date de retour, associé avec
l'adhérent et le livre choisit.
5) On rend le livre indisponible.
6) On incrémente le nombre de livres empruntés par l'adhérent.

Etablir le diagramme de séquence de ce scénario de cas d'utilisation pour Emprunter livre.

# Exercice 7 : Gestion de trajet

Nous nous intéressons au développement d'un système automatique de réservation de billets de
trains. L'utilisateur se présente devant une billetterie automatique. Il peut consulter l'ensemble de
trains après avoir fixé le lieu de départ, le lieu d'arrivée ainsi qu'une heure approximative de départ.

Le système fournit plusieurs choix possibles. Chaque choix correspond à une liste de trains possibles
répondant à la requête de l'utilisateur (Le système élimine automatiquement chaque choix
contenant un train complet par rapport aux places disponibles). L'utilisateur peut ensuite choisir une
liste donnée et réserver sur l'ensemble de trains constituant cette liste.

1) Donner le diagramme de classes avec tous les attributs et les méthodes nécessaires

2) Donner le diagramme de séquence correspondant au scénario sunny-day pour le cas consulter.

<!--
https://www.clicours.com/exercice-uml-corrige-gestion-dentrepot-de-stockage-diagramme-de-sequence-classe/
-->

# Exercice 8

Pour faciliter sa gestion, un entrepôt de stockage envisage de s’informatiser. Le logiciel à produire doit allouer automatique un emplacement pour le chargement des camions qui convoient le stock à entreposer.

Le fonctionnent du système informatique doit être le suivant :

- déchargement d’un camion : lors de l’arrivée d’un camion, un employé doit saisir dans le système les caractéristiques de chaque article ; le système produit alors une liste où figure un emplacement pour chaque article ;
- chargement d’un camion : les caractéristiques des articles à charger dans un camion sont saisies par un employé afin d’indiquer au système de libérer des emplacements.

Le chargement et le déchargement sont réalisés manuellement.

Les employés de l’entrepôt sont sous la responsabilité d’un chef dont le rôle est de superviser la bonne application des consignes.
Travail à Faire :

- Donner  le Diagramme de séquence pour le cas déchargement d’un camion
- Donner le Diagramme de collaboration correspondant
- Donner le Diagramme des classes

<!--
http://exercicecorrige.blogspot.com/2013/08/gestion-dun-video-club-diagramme-de-cas.html?spref=bl
-->

# Exercice 9 : Gestion d'un vidéo club (diagramme de cas d'utilisation, diagramme de séquence)

Un vidéo club est un centre de distribution qui assure essentiellement la location de films pré-enregistrés.
Les éditeurs procurent les cassettes aux exploitants soit en location soit en vente. Les exploitants peuvent donc passer avec les éditeurs des contrats de location d'une durée moyenne  de  6  mois  ou  passer des commandes à partir de catalogues fournis régulièrement par les éditeurs.
Un vidéo club entretient des relations avec une trentaine d'éditeurs environ. Lorsque les exploitants constatent une usure des cassettes qui leur appartiennent, ils ont la possibilité de les vendre à des grossistes qui peuvent alors pratiquer des ventes au rabais.

Un seul  statut  est  proposé aux clients, celui d'adhérent. Chaque adhérent se voit attribuer une carte d'adhésion sur laquelle est mentionné un code adhérent. Il peut alors choisir  entre plusieurs types d’abonnement. Les tarifs  varient selon le  mode d'abonnement choisi. Quatre tarifs adaptés aux locations sont proposés en fonction des différents types d'abonnement. Toutefois, on peut louer des cassettes aux clients non abonnés sans leur faire profiter des avantages tarifaires réservés aux abonnés. Le but est de décrire la vue des besoins (use case view) de ce système.

- Donner le  diagramme des cas d'utilisation du système. Penser à utiliser la généralisation d’acteurs.
- Décrire le scénario « Location Cassettes »  par un diagramme de séquence.

# Exercice cas concret

Diagramme de classe et séquence - Lumière : <http://asi.insa-rouen.fr/enseignement/siteUV/genie_logiciel/2005P/supports/s10/EXU1598.correction.pdf>

Un de vos collègues a effectué la partie analyse du projet de développement « minik’s ». Il
vous a remis un DSS (Diagramme de Séquences Système) et une ébauche du modèle du
domaine.
Le métier étudié dans le cadre de « minik’s » est celui des boutiques (Très Petits Commerces)
qui disposerai à terme d’une caisse sur un ordinateur commun (PC Compatible) et
s’affranchirait ainsi des point de ventes propriétaire actuellement répandus.
<http://exercicecorrige.blogspot.com/2013/09/exercice-diagramme-de-sequence-par-insa.html?spref=bl>
