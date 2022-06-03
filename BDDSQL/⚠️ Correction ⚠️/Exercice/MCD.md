# Exercice 1 - Chaîne d’approvisionnement

Construire un MCD modélisant la chaîne d’approvisionnement : 

Nous souhaitons gérer un secrétariat pédagogique. Nous recensons les étudiants en utilisant leurs noms, prénoms et adresse. Des formations sont organisées en modules, qui eux-mêmes sont répartis sur des semestres. Un étudiant ne peut être inscrit que dans une formation à la fois, et un module est affecté à un seul semestre dans une formation. On tiendra compte du fait qu’un étudiant peut redoubler ou suspendre sa formation en prenant des congés. 

![image](https://enseignement.alexandre-mesle.com/analyse/analyse045.png)


# Exercice 2 - Secrétariat pédagogique

Représentez un MCD associé au secrétariat pédagogique.
Nous souhaitons gérer une chaîne d’approvisionnement. Nous tenons une liste de produits et une liste de fournisseurs. Certains produits peuvent être proposés par plusieurs fournisseurs, à des prix qui peuvent être différents. Nous garderons l’historique des livraisons en mémoire, avec pour chacune d’entre elle, le fournisseur qui l’a effectué, la date de livraison ainsi que le détail des produits livrés. 

![image](https://enseignement.alexandre-mesle.com/analyse/analyse044.png)

# Exercice 3 - Arbre généalogique

Représentez un arbre généalogique avec un MCD.
Nous souhaitons mettre au point un logiciel permettant de représenter un arbre généalogique. C’est à dire listage des personnes, mariages et filiation. Nous tiendrons compte du fait que les parents peuvent être inconnus. Par contre, nous ne gérerons que les mariages hétérosexuels et nous ferons abstraction de certains pratiques en vogue comme la transexualité (si vous êtes sages nous ferons un TP là-dessus plus tard dans l’année). 

![image](https://enseignement.alexandre-mesle.com/analyse/analyse046.png)
![image](https://enseignement.alexandre-mesle.com/analyse/analyse050.png)

# Exercice 4 - CMS

Réalisez un MCD permettant de représenter un CMS.
Nous voulons gérer un CMS (Content Management System). Un CMS est un logiciel permettant de gérer le contenu d’un ou plusieurs sites web. Chaque site porte un nom, est caractérisé par une URL, et est découpé en catégories, imbricables les unes dans les autres. Des utilisateurs sont répertoriés dans le CMS, et chacun peut avoir le droit (ou non) d’écrire dans un site web. Chaque utilisateur doit avoir la possibilité de publier des articles dans une catégorie d’un site web (pourvu qu’il dispose de droits suffisants sur le site). Un article, en plus de son titre et de son texte d’introduction, est constitué de chapitres portant chacun un nom et contenant un texte. Il va de soi qu’on doit avoir la possibilité pour chaque site de conserver l’historique de quel article a été publié par quel utilisateur. 

![image](https://enseignement.alexandre-mesle.com/analyse/analyse047.png)
![image](https://enseignement.alexandre-mesle.com/analyse/analyse054.png)

# Exercice 5 - Bibliothèque

Réalisez un MCD permettant de représenter un Bibliothèque.
Nous souhaitons gérer une bibliothèque simple. La base de données devra recenser une liste d’ouvrages, avec pour chacun le titre et l’auteur (éventuellement plusieurs). Vous tiendrez compte du fait que des ouvrages peuvent exister en plusieurs exemplaires, certains pouvant ne pas être disponibles pour le prêt (consultables uniquement sur place, ou détruits). Une liste d’adhérents devra être tenue à jour, les adhésions devant se renouveler une fois par an. Il devra être possible de vérifier qu’une adhésion est à jour (c’est-à-dire qu’elle a été renouvelée il y a moins d’un an), mais il ne sera pas nécessaire de connaître l’historique des renouvellements. Les adhérents peuvent emprunter jusqu’à 5 livres simultanément et chaque livre emprunté doit être retourné dans les deux semaines. On devra conserver un historique permettant de savoir quel abonné a emprunté quels livres, les dates d’emprunts et de retours.

![image](https://enseignement.alexandre-mesle.com/analyse/analyse051.png)

# Exercice 6 - Forum
Réalisez un MCD permettant de représenter un Forum.
Nous souhaitons gérer un forum. Un forum est constitué de catégories, une catégorie pouvant elle-même être contenue dans une autre catégorie. Chaque catégorie peut contenir des conversations, elles-même constituées de messages, un message pouvant etre la réponse à un autre message. Les utilisateurs doivent s’inscrire pour publier, et certains d’entre eux peuvent être nommés modérateurs par les administrateurs.

Les utilisateurs disposent aussi d’une messagerie privée, permettant de faire des conversations à deux. Les utilisateurs peuvent aussi contacter les modérateurs en messagerie privée, tous les modérateurs peuvent alors répondre dans la conversation.

Les utilisateurs peuvent signaler des contenus inappropriés aux modérateurs. Il sera important de savoir, en plus du message qui a été signalé, quel est l’utilisateur qui a effectué le signalement.

Il faut que les utilisateurs connectés puissent voir quels sont les messages qu’ils ont lu et ceux qu’ils n’ont pas lu. Le fait de savoir quels messages n’ont pas été lu permettra d’envoyer les notifications aux utilisateurs.
![image](https://enseignement.alexandre-mesle.com/analyse/analyse048.png)

# Exercice 7 - Covoiturage

Réalisez un MCD permettant de modéliser un site de covoiturage.
Nous allons étudier la modélisation d’une plate-forme de co-voiturage.

Des utilisateurs peuvent être :

    des conducteurs
    des passagers
    des modérateurs de la société de co-voiturage.
    ou encore prendre plusieurs rôles à la fois... 

On mémorisera leur nom, prénom, mail, téléphone, coordonnées bancaires.

Les utilisateurs peuvent en tant que conducteurs s’inscrire et donner des informations sur leurs véhicules (marque, modèle, immatriculation).

Les conducteurs peuvent créer des trajets (point et date de départ, d’arrivée, véhicule, nombre de places disponibles, étapes).

Les points de départ, d’arrivée, et les étapes, sont :

    soit des points covoiturage prédéfinis,
    soit des adresses utilisant des villes prédéfinies. 

Le conducteur doit indiquer pour chaque étape :

    l’heure à laquelle il doit passer
    le coût de prise en charge d’un passager 

Les utilisateurs, en tant que passagers peuvent :

    rechercher des trajets,
    contacter le conducteur avec une messagerie interne,
    faire une réservation sur un trajet ou une partie du trajet.
    annuler leur réservation
    valider leur trajet, ce qui déclenche le paiement. 

Une fois un trajet validé, les passagers peuvent noter le conducteur et le conducteur peut noter ses passagers. Une note est constituée :

    d’un nombre d’étoiles (1 à 5)
    d’un commentaire 

Les commentaires doivent être validés par un modérateur. Un usager ne peut pas voir un commentaire le concernant tant qu’il n’a pas lui-même rédigé un commentaire. Si au bout de 15 jours il n’a pas répondu, alors le commentaire est publié et l’usager concerné ne peut pas répondre.

La note moyenne d’un utilisateur est toujours publiée sur son profil.

![image](https://enseignement.alexandre-mesle.com/analyse/analyse049.png)