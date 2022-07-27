# Qu'est-ce qu'un diagramme d'état transition dans le langage UML ?

- Vidéo d'explication : <https://youtu.be/Jds1irUw2GI> et <https://youtu.be/J3HxmysDj4k>
- Vidéo d'explication : <https://youtu.be/6ptw_9ZFX8g>

Un automate désigne tout appareil qui enregistre l'état d’un objet à un moment donné et peut changer l'état ou provoquer d'autres actions selon les informations qu’il reçoit. Les états correspondent aux différentes combinaisons d'informations qu'un objet peut contenir et non la façon dont celui-ci se comporte. Pour comprendre les différents états d’un objet, vous pouvez visualiser tous les états possibles et montrer comment un objet parvient à chaque état à l'aide d'un diagramme d'état transition UML.

Un diagramme d'état transition commence généralement par un rond noir qui indique l'état initial et se termine par un rond cerclé indiquant l'état final. Toutefois, bien qu'ils aient des points de départ et des extrémités bien définis, les diagrammes d'états-transitions ne sont pas forcément le meilleur outil pour représenter la progression d'une série d'événements. Ils sont plutôt indiqués pour illustrer des types de comportements spécifiques, notamment les changements d'état.

Les diagrammes d'états-transitions représentent principalement des états et des transitions (comme sont noms l'indique). Les états sont représentés par des rectangles aux coins arrondis qui portent le nom de "l'état concerné". Les transitions sont indiquées par des flèches qui vont d'un état à un autre, en montrant l'évolution des états. Vous pouvez voir ces deux éléments à l'œuvre ci-dessous dans un diagramme simple en rapport avec la vie étudiante (aux Etats-Unis, Freshman est l'équivalent de L1, Sophmore L2, Junior L3 et Senior L4, même si cela n'existe pas en France).

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/what-is-a-state-diagram-in-UML/state_diagram_basic_example-500x281.PNG)

# Applications des diagrammes d'états-transitions

Comme la plupart des diagrammes UML, les diagrammes d'états-transitions ont plusieurs usages. Leurs principales applications sont les suivantes :

- Représenter des objets liés à un événement dans un système réactif

- Illustrer des cas d'utilisation dans un contexte d'entreprise

- Décrire comment un objet change d'état au cours de son existence

- Montrer le comportement global d'un automate ou le comportement d'un ensemble connexe d'automates.

# Symboles et composants des diagrammes d'états-transitions

Vous pouvez inclure de nombreuses formes différentes dans un diagramme états-transitions, surtout si vous décidez de l'associer à un autre diagramme. Voici la liste des formes les plus courantes que vous trouverez :

## État composite

État qui intègre des sous-états. Voir l'exemple de diagramme états-transitions d'une université ci-dessous. Dans cet exemple, « Inscriptions » représente l’état composite, car il englobe plusieurs sous-états dans le processus d’inscription.

## Pseudo-état choix

Losange qui indique un état dynamique avec des résultats potentiels variables.
![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-state-diagram-tutorial/ChoicePseudostate.PNG)

## Événement

Instance qui déclenche une transition. Son nom figure au-dessus de la flèche de transition applicable. Dans le cas présent, « fin des cours » est l’événement qui déclenche la fin de l’état « Enseigné actuellement » et le début de l’état « Examens finaux ».
![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-state-diagram-tutorial/EventShape.PNG)

## Point de sortie

Point auquel un objet quitte l'état composite ou l'automate, symbolisé par un cercle barré d'une croix. En règle générale, on l'utilise si le processus n’est pas terminé mais doit être quitté en raison d'une erreur ou d'un autre problème.
![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/state-machine-diagram/flow-final-35x26@2x.jpeg)

## Premier état

Marqueur du premier état du processus, représenté par un cercle noir avec une flèche de transition.
![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-state-diagram-tutorial/FinalStateShape.PNG)

## Garde

Condition booléenne qui autorise ou bloque une transition, inscrite au-dessus de la flèche de transition.

## État

Rectangle aux coins arrondis qui indique la nature actuelle d'un objet.
![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-state-diagram-tutorial/StateShape.PNG)

## Sous-état

État contenu dans la zone d'un état composite. Dans le diagramme états-transitions de l'université ci-dessous, « Ouvert aux inscriptions » est un sous-état du plus grand état composite intitulé « Inscriptions ».

## Terminator

Cercle avec un point à l'intérieur, qui signifie qu'un processus est terminé.
![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/state-machine-diagram/end-35x35@2x.jpeg)

## Transition

Flèche allant d'un état à un autre et indiquant un changement d'état.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-state-diagram-tutorial/TransitionArrow.PNG)

# Comportement de transition

Comportement résultant de la transition d'un état, inscrit au-dessus de la flèche de transition.

## Déclencheur

Type de message qui déplace activement un objet d'un état à un autre, inscrit au-dessus de la flèche de transition. Dans cet exemple, « Problème avec la réservation » est l’élément déclencheur qui enverrait la personne à l’agence de voyage de l’aéroport au lieu de l'acheminer vers l'étape suivante du processus.
![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-state-diagram-tutorial/Trigger.PNG)

# Exemples de diagrammes états-transitions

## Exemple de diagramme d'état transition des disponibilités dans un agenda

Cet exemple de diagramme d'état transition montre le processus par lequel une personne fixe un rendez-vous dans son agenda. Dans l’état composite « Vérifier la date », le système vérifie les disponibilités dans l'agenda avec plusieurs sous-états différents. Si la date n’est pas disponible, on quitte le processus. Mais si l'agenda présente une disponibilité, le rendez-vous est ajouté.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/uml/state-machine-diagram/state-diagram-525x626@2x.jpeg)

## Exemple de diagramme d'état transition d'une université

Ce diagramme d'état transition montre le processus d’inscription et des cours d'une université. L’état composite « Inscriptions » est composé de plusieurs sous-états qui guident les étudiants à travers le processus d’inscription. Une fois que l’étudiant est inscrit, il passe à « Enseigné actuellement » et, pour finir, à « Examens finaux ».

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-state-diagram-tutorial/EnrollmentExample.PNG)

## Exemple de diagramme d'état transition du processus d'enregistrement dans un aéroport

L’exemple suivant simplifie les étapes d'enregistrement dans un aéroport. Pour les compagnies aériennes, un diagramme d'état-transition permet de rationaliser les processus et d'éliminer les étapes inutiles.

![](https://d2slcw3kip6qmk.cloudfront.net/marketing/pages/chart/UML-state-diagram-tutorial/AirportCheckInExample.PNG)

<!--
https://eeisti.fr/grug/ING-1/Info%20/UML/AnalyseConceptionUML/Analyse-et-conception-orient-es-objets/D8StateMachineDiagramCORRIGE.pdf
-->

# Exercice 1 : Bibliothèque

On reprend dans cet exercice la gestion de la bibliothèque. Plus particulièrement à la vie des objets
de la classe Livre et ceux de la classe Adhérent. On rappelle quelques règles de gestion de la
bibliothèque :

- Un adhérent peut emprunter des livres.
- Il ne peut avoir au plus cinq emprunts en cours.
- S'il tarde à rendre un livre, il est suspendu.

Représenter le diagramme d'états d'un objet de la classe Livre et le diagramme d'états d'un objet de
la classe Adhérent.

# Exercice 2 : Machine à café

On dispose d’une machine à café qui propose des expressos à partir d’eau et de capsules pré-remplie
de café. La machine à café possède 3 boutons :

- Un bouton ON pour mettre la machine à café sous tension.
- Un bouton OFF pour éteindre la machine à café à tout moment.
- Un bouton lumineux :
  - Au démarrage, il est clignotant tant que l’eau n’est pas sous pression. Si l’utilisateur
appuie dessus, il ne se passe rien.
  - Il est lumineux et non clignotant quand la machine est finalement sous-pression. Si
l’utilisateur appuie dessus, le café coule.
  - Il est clignotant aussi au moment de servir le café. Si l’utilisateur appuie dessus, le café
s’arrête de couler et on peut le déguster.

On admet que la mise sous pression peut commencer seulement si le réservoir d’eau est
suffisamment plein. Quand le réservoir d’eau se vide, la machine n’a plus de pression et restera sans
pression tant que le réservoir n’a pas été re-rempli.

On admet aussi qu’il y a toujours une capsule de café dans la machine (aucune vérification n’est donc
nécessaire !)

Proposer un diagramme d’états de la classe Machine à café

<!--
http://exercicecorrige.blogspot.com/2013/08/boite-de-vitesse.html?spref=bl
-->

# Exercice 3 : Boite de vitesse

On considère une boîte de vitesses automatique de voiture. La boîte au démarrage est au point mort. La marche arrière ainsi que la position parking peuvent être enclenchées à partir du point mort. La première marche avant peut également être enclenchée à partir du point mort. En revanche, les autres marches avant, la seconde et la troisième, sont enclenchées en séquence: 123 pour une accélération, et 321 pour une décélération. Seules la marche arrière, la position parking et la première marche avant peuvent être ramenées directement au point mort.

<!--
http://niedercorn.free.fr/iris/iris1/uml/umltd3.pdf
-->

# Exercice 4 : formation d’un contrat

Dessinez un diagramme d’état/transition résumant les états possibles d’un objet “contrat” tel que décrit dans
l’énoncé suivant.

Un ensemble de personnes décident d’établir un contrat. Pour ce faire elles rédigent un projet par itération
successive. Le contrat est ensuite informellement accepté par les parties, et devient ce que l’on appelle un
préaccord. A ce stade il peut toujours être l’objet de modification et revenir à l’état de projet. Une fois le
préaccord définitivement établi, le contrat est signé par les parties. Dès ce moment les partenaires sont liés. Une
fois signé, le contrat peut être rendu exécutoire par une décision d’une des parties. Un contrat en exécution peut
faire l’objet de discussions qui sont réglées par un arbitre désigné à cet effet. Le contrat une fois exécuté prend
fin.

<!--
http://exercicecorrige.blogspot.com/2013/08/montre-digitale.html?spref=bl
-->

# Exercice 5 :  Montre digitale

Une montre digitale simple possède un cadran et deux boutons, que l’on nommera A et B, pour la mettre à l’heure. La montre a deux modes d’opérations, affichage  de l’heure et mise à l’heure. En mode d’affichage, les heures  et les minutes sont affichées, séparées par un signe « deux points » intermittent.
Le mode de mise à l’heure à deux sous-modes, heures et minutes. Le bouton A s’utilise pour les modes. A chaque fois que l’on appuie dessus, le mode change suivant la séquence: affichage, configurer heures, configurer minutes, affichage, etc. Dans une sous-mode, le bouton B s’emploie pour avancer les heures ou les minutes à chaque fois que l’on appuie dessus. Les boutons doivent être relâchés avant de pouvoir produire un autre événement.
Préparez un diagramme d’états de la montre.

<!--
http://exercicecorrige.blogspot.com/2013/08/montre-digitale_31.html?spref=bl
-->

# Exercice 6 :  Montre digitale (détaillé)

On désire modéliser le mécanisme d'une montre digitale. Une montre digitale simple comporte un affichage et deux boutons de réglage. On considère pour l'instant la montre avec deux modes de fonctionnement (affichage et réglage). Le mode réglage possède deux sous-modes (réglage des minutes et réglage des heures). Le bouton A est utilisé pour changer de mode, ce qui s'effectue de manière cyclique:

    affichage -> réglage minutes -> réglage heures -> affichage...

Dans les deux sous-modes de réglage, le bouton B permet d'augmenter d'une minute ou d'une heure chaque fois qu'il est appuyé. On ajoute ensuite les modes chronomètre et alarme à la montre. L'alarme se programme avec le bouton B (de la même manière que le réglage simple de la montre). Le chronomètre est lancé et stoppé également avec le bouton B. Le passage d'un mode à l'autre s'effectue toujours avec le bouton A:

    affichage -> réglage -> alarme -> chronomètre -> affichage...

Le chronomètre fonctionne en parallèle avec les autres modes, et l'alarme possède un état interne (activée ou désactivée), indépendant des autres états, qui se règle avec le bouton B.
