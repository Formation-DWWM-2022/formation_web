# Exercice 1

Un fan de rock souhaite créer un site consacré à ses groupes préférés. Il doit donc tenir l'inventaire des disques, avec pour chacun d'eux le titre, l'artiste, le label et l'année. En ce qui concerne les groupes et les musiciens, une analyse fine montre que le problème est redoutable - on se contentera ici d'une approche simple.

On traitera successivement de deux hypothèses :

    la discothèque ne comprend aucune compilation de différents artistes
    la discothèque comprend des compilations

Etablir le MCD et le MLD dans ces deux cas.

# Exercice 2

Un comité d'entreprise souhaite gérer les informations concernant les enfants de ses salariés. Un employé a réalisé le tableau suivant :

![image](..\Cours\image\exerice2MCDMLD.png)					

Quelles critiques peut-on adresser à cette solution ? Quelles propositions peut-on faire pour adopter une solution plus adéquate ?

# Exercice 3

Une casse automobile souhaite gérer son stock de pièces. Chaque pièce est identifiée par une référence, une catégorie (carosserie, mécanique, électricité, etc.), une date de récupération et un prix de vente. On souhaite également pouvoir établir une correspondance entre les pièces et les véhicules pour lesquels elles conviennent, ces véhicules étant repérés par marque, modèle et année.

Etablir le MCD adéquat dans les deux hypothèses suivantes :

    toutes les pièces d'une même référence possèdent un prix unique
    chaque pièce possède un prix propre.

Etablir le MCD et le MLD dans ces deux cas.

# Exercice 4

Une bibliothèque de prêt dispose d'un certain nombre d'ouvrages, classés par rayon (Littérature, Histoire, Géographie, etc.). Chaque ouvrage est l'oeuvre d'un ou plusieurs auteurs, et doit également être référencé selon un certain nombre de mots-clés.

Chaque adhérent peut emprunter jusqu'à 5 livres en même temps, et dispose d'un certain délai passé lequel il doit recevoir des relances puis des pénalités.

On se place dans quatre cas successifs, de complexité croissante :

    la bibliothèque ne possède qu'un seul exemplaire de chaque ouvrage. Elle enregistre uniquement les emprunts présents (il n'y a pas d'historique des emprunts passés).
    la bibliothèque ne possède qu'un seul exemplaire de chaque ouvrage, mais elle tient un historique de tous les emprunts qui ont été effectués.
    la bibliothèque tient un historique... et elle est maintenant susceptible de posséder plusieurs exemplaires de certains ouvrages
    en plus de cela, il existe une bibliothèque centrale et des antennes locales. Chaque antenne possède un fonds qui lui est propre, et peut de surcroit se procurer certains ouvrages auprès de la bibliothèque centrale (mais pas d'une autre bibliothèque locale). Tout adhérent peut automatiquement emprunter des ouvrages dans toutes les antennes locales.

Etablir le MCD et le MLD adéquats dans les quatre cas.

# Exercice 5

Un historien souhaite établir des statistiques sur des soldats de la Première Guerre mondiale. Pour chaque soldat, outre l'état-civil, il souhaite avoir la trace :

    de la date de son décès si celui-ci est survenu suite aux combats
    des blessures reçues (type et date de la blessure, en plus de la bataille où elle a été infligée. Les batailles seront référencées dans une liste comportant le lieu, les dates de début et de fin)
    des grades obtenus (avec les dates)
    de l'unité de rattachement (avec les dates)

Etablir le MCD et le MLD adéquats.

# Exercice 6

Un club sélect désire informatiser le fichier de ses membres. Pour chacun d'eux, outre les informations d'état-civil ordinaires, on souhaite tenir à jour les commissions de rattachement et en tenir l'historique (il existe une liste de commissions, et chaque membre peut librement intégrer - et quitter - autant de commissions qu'il le souhaite).

Par ailleurs, le recrutement du club fonctionne sous forme de parrainage : un membre ordinaire ne peut le rejoindre que s'il a été parrainé par trois autres membres. On souhaite là aussi conserver l'historique, et pouvoir retrouver qui a parrainé qui et à quelle date. Certains membres n'ont cependant jamais été parrainés : ils sont qualifiés de "fondateurs".

Etablir le MCD et le MLD adéquat.

# Exercice 7

Un aquarium souhaite gérer ses petites bêtes. Il dispose pour cela de plusieurs bassins, répartis dans plusieurs pièces. Des animaux de différentes espèces sont achetés, immatriculés, et disposent d'un suivi médical personnalisé - on garde donc la trace de la date et de la nature des soins dont ils bénéficient. Les animaux sont mélangés dans les bassins, et il arrive qu'on les déplace - là encore, on souhaite savoir à quelle date un animal donné a quitté tel bassin pour être placé dans tel autre.

Les biologistes classent les animaux selon une arborescence à quatre niveaux. De plus général au particulier : ordre, famille, genre, espèce. Il va de soi que chaque animal de l'aquarium doit être correctement identifié dans cette arborescence.

Etablir le MCD et le MLD adéquats.

# Exercice 8 (difficile)

On reprend le problème de la CDthèque, en s'attelant cette fois pour de bon à la question des artistes ayant signé les disques. Un disque peut avoir été signé par un groupe, par un individu, ou par plusieurs. Les groupes sont naturellement formés d'individus, dont on note de surcroît quels instruments ils jouent. Et en plus, sur un CD, il peut y avoir des guest-stars, qui sont venus jouer sans pour autant être signataires du disque. Pour ajouter à la difficulté, un même individu peut à la même époque avoir participé à un (ou plusieurs) groupes, et avoir collaboré à un (ou plusieurs) disques en tant qu'invité. Bref, il faut prévoir toutes les situations posibles et pouvoir restituer toutes les informations, qu'elles soient relatives aux disques, aux groupes, à leurs membres, à l'historique de chaque instrumentiste, etc.

Etablir le MCD et le MLD adéquat.

On réalisera deux versions successives de cet exercice. L'une, en plaçant les groupes et les musiciens dans deux entités distinctes. L'autre, en les réunissant dans une entité unique.

# Exercice 9

On veut réaliser le site web d'une boutique de vente de produits audiovisuels. Pour cela, il convient de référencer chaque produit par un code, une description, un prix et un nombre de produits disponibles en stock. Les produits doivent tous être rattachés à une (et une seule) catégorie. Attention, il existe une hiérarchie de catégories, par exemple :

Livres > Romans > En français

La modélisation doit permettre de restituer l'ensemble de ces informations (produits + hiérarchie des catégories à laquelle il appartient)

Etablir le MCD et le MLD adéquat.

# Exercice 10

On cherche à stocker dans une base de données la structure administrative du territoire français. Celle-ci se décompose en plusieurs étages. Dans l'ordre : la commune, le canton, l'arrondissement, le département, la région. A chaque fois, un étage ne peut être rattaché qu'à un seul étage supérieur, tandis que l'étage supérieur contient plusieurs éléments de l'étage inférieur. Chaque étage à partir du canton possède une commune « capitale », qui est obligatoirement chef de tous les niveaux inférieurs (on ne peut pas avoir une capitale de région qui ne soit aussi capitale de département, d'arrondissement et de canton).

On ajoute à cela la question des contiguïtés territoriales des communes : on veut savoir, pour chaque commune, avec quelles autres communes elle possède une limite commune.

Etablir le MCD et le MLD adéquat.

# Exercice 11

Une école veut modéliser ses informations afin de gérer ses étudiants (répartis pour chaque année en groupes), ses enseignants et ses locaux. On traitera successivement trois hypothèses :

    Chaque enseignant a en charge chaque année un certain nombre de groupes d'étudiants, et chaque groupe a toujours cours dans la même salle
    Au coup par coup, un enseignant prend en charge un groupe et fait cours dans une salle, elle aussi attribuée au coup par coup.
    Les enseignants ont en charge chaque année certains groupes, qui ont toujours cours dans les mêmes salles. Mais sur certains créneaux horaires, les salles servent aussi de lieux de permanence pour les enseignants.


# Exercice 12 : Gestion d'une clinique
On se propose de modéliser la base de données d'un hôpital. L'analyse de l'existant a dégagé
les informations suivantes:
- L'hôpital a un ensemble d'employés qui sont des docteurs et des infirmières. Chaque
employé possède un numéro d'employé, un nom, un prénom, une adresse et un numéro
de téléphone.
- L'hôpital est composé de plusieurs services, pour lesquels on connaît le code, le nom, le
bâtiment et le directeur, qui est en fait un docteur.
- Chaque service contient plusieurs salles. Une salle est représentée par un numéro, un
surveillant et le nombre de lits qu'elle possède. Le numéro de salle est local à un service
(i.e., chaque service possède une salle numéro 1). Un surveillant est un infirmier.
- Un infirmier est affecté à un service et à un seul.
- Les docteurs ne sont pas affectés à un service particulier, mais on connaît sa spécialité.
- On connaît aussi pour chaque infirmier sa rotation et son salaire.
- Les malades de l'hôpital sont représentés par un numéro, un nom, un prénom, une
adresse et un numéro de téléphone.

- Un malade est hospitalisé dans une salle avec un numéro de lit et son diagnostic. Il est
soigné par un docteur. Au cas où il y a des complications, il peut être transféré dans un
autre service avec une autre salle.

Question 1. Définir l'ensemble des propriétés de ce système.

Question 2. Définir les entités de ce système.

Question 3. Définir le dictionnaire de données de ce système.

Question 4. Définir le MCD de ce système.

# Exercice 13 : Suivi de la scolarité à l'EISTI
L'EISTI a mis en place une réforme dites des spécialités en 2007/2008. A l'occasion de cette
réforme il a été demandé à la DOSI une refonte du système d'information de la scolarité du
cycle ingénieur. Des interviews au niveau de la direction des sites et de la direction des études
ont été faites. Nous vous présentons ci-dessous le compte-rendu volontairement simplifiée.

Pou gérer le suivi de la scolarité d'un étudiant dans le cycle ingénieur, on commence par
l'inscrire avec son nom, son prénom et son origine scolaire (DUT, CPI, CPGE, ...). Chaque
année scolaire un étudiant est inscrit à un ou plusieurs programmes. En 1ère année il n'y a
qu'un seul programme : ING1 TC. En deuxième année, il y a plusieurs programmes : ING2
TC, Spécialité : GI ou GM, Orientation : MSI ou TSI ou IFI ou SNHP ou IAD. En 3ème
année, il y a 12 programmes de type option : ISIN, GL, ISICO, IDSI, Télécoms, ICOM, IFI,
IAD, SNHP, Infomécatronique, DSI. Certains programmes nécessitent comme pré-requis
d'autres programmes. Pour passer en année supérieure, l'étudiant doit obtenir une moyenne
générale supérieure ou égale à 10 sur l'ensemble de matières contenues dans les programmes
dans lesquels il est inscrit. Le calcul de la moyenne se fait à l'aide d'une moyenne pondérée.
Les pondérations de chaque matière peuvent être revues lors de chaque année scolaire. Des
projets regroupant plusieurs matières sont réalisés par les étudiants et notés par le corps
professoral. La note obtenue dans une matière est une moyenne pondérée dans laquelle
intervient des notes d'épreuves surveillées et éventuellement le projet (si projet il y a). Une
matière est renseignée à travers un nom, son objectif. Pour chaque année scolaire elle est
enseignée pendant un semestre donné. A la fin de chaque année, un étudiant peut se trouver
dans un des trois cas : passage en année supérieure, redoublant, exclu. On mémorise pour
chaque année et pour chaque étudiant l'ensemble des notes de matières, sa moyenne générale
et son statut de fin d'année.

Question 1. Définir l'ensemble des propriétés de ce système.

Question 2. Définir les entités de ce système.

Question 3. Définir le dictionnaire de données de ce système.

Question 4. Définir le MCD de ce système.