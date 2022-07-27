# Qu'est-ce qu'un diagramme d'activités ?

Le langage de modélisation unifié regroupe plusieurs sous-catégories de diagrammes, notamment les diagrammes de structure, les diagrammes d'interaction et les diagrammes comportementaux. Les diagrammes d’activités, ainsi que les diagrammes de cas d’utilisation et d'états-transitions sont considérés comme des diagrammes comportementaux, car ils décrivent ce qui doit arriver dans le système modélisé.

Les parties prenantes ont de nombreux problèmes à gérer ; il est donc important de communiquer avec clarté et concision. Dans une entreprise, les diagrammes d’activités aident les différents intervenants – côté commercial et côté développement – à collaborer pour comprendre un même procédé et un même comportement. Vous utiliserez un ensemble de symboles spécialisés – y compris ceux que l'on emploie pour commencer, terminer, fusionner ou recevoir des étapes dans le flux – pour faire un diagramme d’activités, ce que nous étudierons plus en détail dans ce guide du diagramme d’activités.

# Avantages des diagrammes d'activités

Les diagrammes d'activités présentent plusieurs avantages pour les utilisateurs. Songez à créer un diagramme d’activités pour :

- Démontrer la logique d'un algorithme

- Décrire les étapes effectuées dans un cas d'utilisation d'UML

- Illustrer un processus métier ou un flux de travail entre les utilisateurs et le système

- Simplifier et améliorer n'importe quel processus en clarifiant les cas d'utilisation complexes

- Modéliser des éléments de l'architecture de logiciels, tels que la méthode, la fonction et l'utilisation

# Composants de base d’un diagramme d'activités

Avant de commencer à créer un diagramme d'activités, vous devez d'abord comprendre de quoi il est constitué. Voici quelques-uns des composants les plus courants d'un diagramme d'activités :

- Action : étape dans l'activité où les utilisateurs ou le logiciel exécutent une tâche donnée. Dans Lucidchart, les actions sont symbolisées par des rectangles aux bords arrondis.

- Nœud de décision : embranchement conditionnel dans le flux, qui est représenté par un losange. Il comporte une seule entrée et au moins deux sorties.

- Flux de contrôle : autre nom donné aux connecteurs qui illustrent le flux entre les étapes du diagramme.

- Nœud de départ : élément symbolisant le début de l'activité, que l'on représente par un cercle noir.

- Nœud de fin : élément symbolisant l'étape finale de l'activité, que l'on représente par un cercle noir avec un contour.

# Symboles des diagrammes d'activités

Ces formes et ces symboles de diagrammes d'activités sont parmi les plus courants que l'on trouve dans les diagrammes UML.

| Symbole | Nom | Description
| --- | --- | ---
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/initial-state-33x31.PNG) | Symbole de début | Représente le début d'un processus ou d'un flux de travail dans un diagramme d'activités. Il peut être utilisé seul ou avec un symbole de note qui explique le point de départ.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/activity-66x35.PNG) | Symbole d'activité | Indique les activités qui composent un processus modélisé. Ces symboles, qui comprennent de brèves descriptions dans la forme, sont les principales composantes d’un diagramme d’activités.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/arrow-66x11.PNG) | Symbole de raccord | Indique le flux directionnel, ou flux de contrôle, de l'activité. Une flèche entrante marque le début d'une étape d'une activité ; une fois l'étape terminée, le flux se poursuit avec la flèche sortante.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/join-66x57.PNG) | Symbole de raccord/barre de synchronisation | Associe deux activités simultanées et les réintroduit dans un flux où n'a lieu qu'une seule activité à la fois. Représenté par une ligne verticale ou horizontale épaisse.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml-activity-diagram-symbols-meaning/UML_activity_diagram_notation6-60x63.PNG) | Symbole d'embranchement | Divise un flux d'activités en deux activités simultanées. Symbolisé par plusieurs lignes fléchées qui partent d'un raccord.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/decision-33x30.PNG) | Symbole de décision | Représente une décision et possède toujours au moins deux embranchements avec le texte de la condition pour permettre aux utilisateurs de voir les options. Ce symbole représente la ramification ou la fusion de différents flux et sert de cadre ou de conteneur.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/note-33x26@2x.PNG) | Remarque | Permet aux créateurs d'un diagramme ou à leurs collaborateurs de communiquer des messages supplémentaires qui n'entrent pas dans le diagramme à proprement parler. Permet de laisser des notes pour plus de clarté et de précision.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml-activity-diagram-symbols-meaning/UML_activity_diagram_notation11-60x25.PNG) | Symbole de signal d'émission | Indique qu'un signal est envoyé à une activité réceptrice.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml-activity-diagram-symbols-meaning/UML_activity_diagram_notation10-60x25.PNG) | Symbole du signal de réception | Représente l'acceptation d'un événement. Une fois l'événement reçu, le flux qui vient de cette action est terminé.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml-activity-diagram-symbols-meaning/UML_activity_diagram_notation12-60x42.PNG) | Symbole de pseudo-état historique simple | Représente une transition qui appelle le dernier état actif.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml-activity-diagram-symbols-meaning/UML_activity_diagram_notation13-60x40.PNG) | Symbole de boucle optionnelle | Permet au créateur de modéliser une séquence répétitive.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/final-flow-33x31.PNG) | Symbole de fin de flux | Représente la fin d’un schéma de procédé spécifique. Ce symbole ne doit pas représenter la fin de tous les flux dans une activité ; dans ce cas, vous devez utiliser le symbole de fin. Le symbole de fin de flux doit être placé à la fin d’un procédé dans un flux d’activités unique.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/condition-text-66x22.PNG) | Texte de condition | Placé à côté d'un marqueur de décision pour vous permettre de savoir dans quelle condition un flux d'activités doit se diviser dans cette direction.
| ![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/activity-diagram/end-state-33x32.PNG) | Symbole de fin | Marque l’état final d’une activité et représente l’achèvement de tous les flux d’un procédé.

# Exemples de diagrammes d'activités

Les diagrammes d'activités représentent les schémas de procédés d'une manière facile à comprendre. Examinez les deux exemples ci-dessous lorsque vous désirez créer des diagrammes d’activités UML.

## Diagramme d'activités d'une page de connexion

Un grand nombre des activités que les gens souhaitent accomplir en ligne – vérifier leurs e-mails, gérer leur argent, commander des vêtements, etc. – exigent de se connecter à un site web. Ce diagramme d'activités montre le processus de connexion à un site web, de la saisie d'un nom d'utilisateur et d'un mot de passe à la connexion établie au système. Il utilise différentes formes de conteneurs pour les activités, les décisions et les notes.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/activity-diagram-for-login-UML/activity-diagram-for-login-UML-650x797.png)

## Diagramme d'activités d'un système bancaire

Ce diagramme montre le procédé de retrait ou de dépôt d’argent sur un compte bancaire. La possibilité d’afficher les retraits et les dépôts sur un même diagramme constitue l'un des avantages de la représentation visuelle du flux de travail en langage UML.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/activity-diagram-for-banking-system-UML/activity-diagram-for-banking-system-UML-650x665.png)

<!--
https://www.studocu.com/fr/document/universite-devry-val-dessonne/modelisation-objet/td-1-uml2-diagramme-dactivites/6693621
-->

# Exerice 1

Tracer un diagramme d’activités pour calculer une addition au restaurant aux USA. Tout
article servi est facturé. Le montant total est assujetti à la TVA et il faut ajouter 18% de
service pour tout groupe de 6 personnes ou plus. Si le groupe est plus petit, l’entrée
« service » est en blanc et laissée à la discrétion du client. Tout coupon ou chèque-cadeau
remis par le client doit être soustrait.

# Exercice 2

Tracer un diagramme d’activités du traitement d’un ordre de transaction reçu par un système
de courtage en ligne. Le système de courtage vérifie que l’ordre est compatible avec le
compte du client, puis l’exécute. Si l’ordre est exécuté avec succès, alors le système réalise
les opérations suivantes : envoyer un courrier de confirmation au client, mettre à jour le
portefeuille en ligne et conclure la transaction auprès de l’autre partie en transférant des liquidités ou des actions. Dans le cas d’un échec, le système envoie une notification d’échec
au client et clôture l’ordre.

# Exercice 3

Décrire à l’aide d’un diagramme d’activités le processus de traitement des demandes de
crédit « en ligne » dans un organisme financier, dont voici une description textuelle :

Un internaute fait une demande de crédit en ligne, en renseignant ses nom, prénom,
coordonnées postales, téléphone, adresse mail, revenus mensuels, montant et durée du
crédit demandé. Ces demandes sont étudiées sous 24 heures par le service clientèle de
l’organisme. A la suite de cette étude, le service clientèle indique sa décision quant à la
demande : accord de principe, refus, étude complémentaire nécessaire.
Si une étude complémentaire est nécessaire, la demande est transmise au service de
gestion des risques, qui, après étude du dossier, renvoie au service clientèle un accord de
principe ou un refus. L’étude du dossier peut nécessiter des compléments d’informations de
la part du client. Celui-ci est alors contacté par mail et répond au mail pour fournir les
compléments d’informations demandés.
Tout refus fait l’objet d’une notification au client.
En cas d’accord de principe, le client est averti et reçoit les conditions commerciales relatives
au crédit demandé. Il dispose alors de 7 jours pour accepter l’offre proposée. Pour accepter
une offre, le client renvoie l’offre, signée, ainsi que les éléments justifiant les informations
fournies lors de la demande (bulletins de salaire, justificatif de domicile, …).
Après avoir vérifié que le dossier était complet, l’offre est transmise au service financier par
le service clientèle.

# Exercice 4

Réaliser un diagramme d’activités présentant les principales activités du processus métier de
traitement d’une demande d’échographie cardiaque dans un hôpital, dont voici une
description.
Il existe trois processus de demande en fonction de la situation du patient :

- Pour un patient hospitalisé, c’est le médecin en charge du patient à l’hôpital qui effectue
la demande. Cette demande doit être étudiée par un cardiologue de l’hôpital, qui au vu
du dossier médical du patient accepte ou refuse la demande d’échographie.
- Pour un patient ambulant, la demande est faite par le patient lui-même, par téléphone,
télécopie ou courrier.
- Pour un patient admis aux urgences, la demande est faite par le médecin des urgences
en charge du patient.

La demande est traitée par un technicien qui réalise la planification (recherche d’une date et
d’un cardiologue disponible), puis confirme le rendez-vous (indication de la date et du
cardiologue qui réalisera l’échographie). Dans le cas d’une urgence, il n’y a pas de
planification, le technicien recherche un cardiologue immédiatement disponible pour réaliser
l’échographie et confirme immédiatement le nom du cardiologue au médecin des urgences.


<!--
https://eeisti.fr/grug/ATrier/GI1/Semestre2/AnalyseOrienteObjet/TD6ActivityDiagramCORRIGE.pdf
--> 

# Exercice 5 : Mousse au chocolat

Voici la recette pour faire une bonne mousse au chocolat :
- Commencer par casser le chocolat en morceaux, puis le faire fondre.
- En parallèle, casser les œufs en séparant les blancs des jaunes.
- Quand le chocolat est fondu, ajouter les jaunes d’œuf.
- Battre les blancs en neige jusqu’à ce qu’ils soient bien fermes.
- Les incorporer délicatement à la préparation chocolat sans les briser.
- Verser dans des ramequins individuels.
- Mettre au frais au moins 3 heures au réfrigérateur avant de servir.

Question 1 : Etablir le diagramme d’activités pour modéliser la recette.
Question 2 : Dans le diagramme d’activité de la question 1, on ne voit pas encore les ingrédients manipulés. Ajouter les flots d’objets (objet et son état) pour compléter le diagramme.
Question 3. Le chef et son assistant vont partager le travail pour préparer la recette. Créer un autre les partitions représentant les entités responsables des actions.

<!--
http://niedercorn.free.fr/iris/iris1/uml/umltd2.pdf
-->

# Exercice 6 : Cafetiere

Construire un diagramme d’activité représentant l’utilisation d’une cafetière électrique:

- premier état: chercher du café
- dernier état: Servir du café

# Exercice 7 : Commander un produit

Construire un diagramme d’activité pour modéliser le processus de commander d’un produit. Le processus
concerne les acteurs suivants:

- Client: qui commande un produit et qui paie la facture
- Caisse: qui encaisse l’argent du client
- Vente: qui s’occupe de traiter et de facturer la commande du client
- Entrepôt: qui est responsable de sortir les articles et d’expédier la commande.

# Exercice 8 : MonAuto : Use Case

## Exercice 8.1 : Créer un diagramme d’activité pour tout le traitement d’une réparation

Le logiciel de gestion des réparations est destiné en priorité au chef d'atelier, il devra lui permettre de saisir les
fiches de réparations et le travail effectué par les divers employés de l'atelier.
Pour effectuer leur travail, les mécaniciens et autres employés de l'atelier vont chercher des pièces de rechange
au magasin. Lorsque le logiciel sera installé, les magasiniers ne fourniront des pièces que pour les véhicules
pour lesquels une fiche de réparation est ouverte; ils saisiront directement les pièces fournies depuis un terminal
installé au magasin.

Lorsqu'une réparation est terminée, le chef d'atelier va essayer la voiture. Si tout est en ordre, il met la voiture
sur le parc clientèle et bouclera la fiche de réparation informatisée. Les fiches de réparations bouclées par le
chef d'atelier devront pouvoir être importées par le comptable dans le logiciel comptable.

## Exercice 8.2 : Créer un diagramme d’activité pour le use case « Créer une fiche de réparation »

Pour créer une fiche de réparation, le chef d’atelier saisit les critères de recherche de voitures dans le système.
Le logiciel de gestion des réparations lui donne la liste des voitures correspondant aux critères entrés. Si la
voiture existe, le chef d’atelier va sélectionner la voiture. Le logiciel va, ensuite, fournir les informations sur le
véhicule. Si la voiture est sous garantie, le chef devra saisir la date de demande de réparation. Si la voiture
n’existe pas, le chef va saisir les informations concernant ce nouveau véhicule. Dans tous les cas, le chef
d’atelier devra saisir la date de réception et de restitution. Si le dommage de la voiture est payé par l’assurance,
le logiciel va fournir une liste d’assurances au chef d’atelier. Ce dernier sélectionnera l’assurance adéquate.
Enfin, le logiciel enregistre la fiche de réparation.

<!--
https://mrproof.blogspot.com/2012/10/diagramme-dactivites-exercice-corrige.html
-->
# Exercice 9

- Quand un distributeur a un projet d’aménagement ou d’extension de ses équipements, il doit obtenir l’aval du siège, qui se traduit par sa participation au financement de l’opération.

- Une fois établi, le dossier de projet est donc soumis simultanément à la banque et au siège, qui répond très rapidement.

- Si le siège est défavorable, le projet est abandonné et la banque est prévenue.

- Si le siège accepte de co-financer le projet, on attend la réponse de la banque pour décider de poursuivre ou de réétudier le dossier.

- Quand les deux réponses sont positives, un dossier de financement définitif est établi puis le projet est lancé.

Question : Établir de diagramme d’activités correspondant au processus de financement et de lancement d’un projet.

<!--
https://eeisti.fr/grug/ATrier/GI1/Semestre2/AnalyseOrienteObjet/TD6ActivityDiagramCORRIGE.pdf
-->
# Exercice 10 : Distributeur de billet

Le client introduit sa carte dont la validité est immédiatement vérifiée. Il est ensuite invité à saisir le
code de la carte. Après trois tentatives infructueuses, la carte est avalée. Sinon le client peut indiquer
le montant qu'il désire retirer, le solde de son compte bancaire est alors consulté pour s'assurer que
le retrait est possible. En cas de solde insuffisant, le client en est informé et peut alors saisir un
montant inférieur. Si le solde du compte est suffisant, le distributeur restitue la carte et délivre alors
les billets accompagnés d'un reçu. Décrire le fonctionnement de ce distributeur de billets via un
diagramme d’activités.
