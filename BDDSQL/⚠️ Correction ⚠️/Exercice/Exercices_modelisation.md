## Le modèle relationnel
### Exercice 1 - clé primaires et étrangères
> Remarque : temps de travail estimé = moins de 1 minute par question.. Il n'est pas nécessaire de rédiger proprement les réponses. C'est la réflexion que vous menez qui est intéressante.

Nous considérons les relations `Ville` et `Personne` suivantes :

| NOM              | CODE_INSEE  | POPULATION  |
|:-----------------|:-----------:|------------:|
| Paris            | 75000       | 2229621     |
| Champs-sur-Marne | 77083       | 24913       |
| Ajaccio          | 2A004       | 67507       |

| NOM              | PRENOM      | DATE_NAISSANCE  |
|:-----------------|:-----------:|----------------:|
| Bonneau          | Jean        | 20/02/1995      |
| Mir			   | Abel        | 05/07/1990      |
| Fonfec           | Sophie      | 14/09/1989      |
| Deuf             | John        | 22/05/1993      |

1. Proposez une clé primaire pour la relation `Ville`.

La colonne `CODE_INSEE` peut être utilisée comme clé primaire car un code INSEE n'existe que pour une seule ville.

2. Même question pour la relation `Personne`.


Aucune des colonnes de la table `Personne` ne peut constituer de manière absolue une clé primaire. Le choix dépendra de l'usage qui est fait de la base :
- S'il s'agit juste de stocker des informations sur un groupe très restreint de personnes (élèves d'une classe par exemple), la colonne `NOM` devrait suffire (à priori deux élèves ne porterons pas le même nom).
- S'il s'agit d'enregistrer des informations sur un groupe un peu plus important (ensemble des élèves d'une école par exemple), il sera probablement nécessaire d'utiliser les colonnes `NOM` et `PRENOM` (peut de chance de doublons, alors qu'il pourrait y avoir deux élèves portant le même nom).
- Si l'usage de la base est encore plus important, il sera peut-être nécessaire d'ajouter la colonne `DATE_NAISSANCE` aux deux précédentes pour identifier de manière certaine une personne.
- Enfin, si l'usage est vraiment important (usage national par exemple), les trois colonnes pourraient ne pas suffire à identifier de manière unique une personne (deux personnes pourraient être née le même jour et porter les mêmes nom/prénom). Il sera alors nécessaire d'ajouter une colonne supplémentaire comme le numéro de sécurité sociale pour disposer d'une bonne clé primaire.

3. En modifiant le modèle, comment traduire le fait qu'une personne est née dans une ville (mais plusieurs peuvent naître dans la même ville) ?

Pour ajouter l'information sur la ville de naissance d'une personne, il nous faut ajouter une colonne `ID_VILLE_NAISSANCE`, de type texte sur 5 caractères, à la table `Personne`. Cette colonne est une clé étrangère qui fait référence à la clé primaire de la table `Ville`.

4. En modifiant le modèle, comment traduire le fait qu'une personne peut posséder des logements dans différentes villes ?

L'informations sur la ville des logements possédés par une personne ne peut être ajoutée sous forme de clé étrangère à la table `Personne` (une personne peut posséder plusieurs villes). Elle ne peut pas non plus l'être dans la table `Ville` (il peut y avoir plusieurs logements dans une ville). La seule solution est d'ajouter une nouvelle relation, que nous appelerons par exemple `Logement`, consituée de deux colonnes `ID_PERSONNE` et `ID_VILLE`,  respectivement clés étrangères faisant référence aux clés primaires des relations `Personne` et `Ville`. Cette nouvelle relation est une table d'association.


### Exercice 2 - Représentation dans le modèle relationnel
> Remarque : temps de travail estimé = moins de 3 minutes par question. C'est l'idée générale de votre réponse qui est importante ici. Il n'est pas nécessaire qu'elle soit strictement identique à la correction.

Nous souhaitons représenter dans une base de données l'ensemble des élèves de terminal d'un lycée en sachant qu'ils sont regroupés par classe.

Les élèves et les classes présentent diverses caractéristiques : le nom d'un élève, sa moyenne au bac en 1ère, la filière d'une classe (S, ES, L, etc.), le numéro de la classe au sein de l’établissement (T1, T4, etc.).

Nous voulons pouvoir rechercher facilement :

* les élèves appartenant à une même classe ;
* les élèves partageant un attribut commun, par exemple ceux ayant effectué leur terminale dans un lycée donné.

Prenons pour exemple trois classes d'un lycée nommé Jeanne d'Arc :

* T1S :
	* Léa (moyenne bac : 12)
	* Paul (moyenne bac : 10)
* T2ES :
	* Jean  (moyenne bac : 11,3)
	* Marion  (moyenne bac : 10,5)
* T3S :
	* Lilianne  (moyenne bac : 13,1)
	* Maxime  (moyenne bac : 17)

1. Pour commencer à établir le modèle conceptuel de la base, identifiez les entités qui interviennent dans le problème. Précisez leurs caractéristiques principales.

Les entités à identifier sont les filières, les classes et les étudiants. 

Les caractéristiques importantes qui peuvent être soulignées dans votre réponse sont :

* Un étudiant possède un nom, une note moyenne au bac. Il est inscrit dans une classe.
* Une classe possède un numéro. Elle fait parti d'une filière.
* Une filière possède un nom et un numéro.

2. En utilisant le modèle relationnel, proposez un schéma logique représentant le problème décrit ci-dessus.

 Nous prévoyons donc trois relations : `Filiere(nom, numero)`, `Classe(numero, numero_filiere)` et `Etudiant(nom, moyenne_bac, classe)`. 

Dans la relation `Filiere` :

* `numero` est une clé primaire. 

Dans la relation `Classe` :

* la colonne `numero` est une clé primaire;
* `numero_filiere` est une clé étrangère faisant référence à la clé primaire de `Filiere`.

Dans la relation `Etudiant` :

* `classe` est une clé étrangère vers la clé primaire de `Classe`.

Avec ce modèle, un étudiant est rattaché à une classe, qui est elle-même rattachée à une filière. Nous pouvons donc reconstruire toutes les informations demandées.

3. Explicitez les domaines pour deux des colonnes que vous avez identifiées.

Nous détaillons dans cette correction les domaines de l'ensemble des colonnes.
 
* `Filiere(nom, numero)`
	* Domaine de la colonne `nom` :
		* Type : texte
		* Longueur : 3 caractères
		* Lettres en majuscule uniquement
		* Pas de valeur par défaut
	* Domaine de la colonne `numero` :
		* Type : nombre entier
		* Valeur positive ou nulle
		* Pas de valeur par défaut
* `Classe(numero, numero_filiere)`
	* Domaine de la colonne `numero` :
		* Type : nombre entier
		* Valeur positive ou nulle
		* Pas de valeur par défaut
	* Domaine de la colonne `numero_filiere` :
		* Type : nombre entier
		* Valeur positive ou nulle
		* Pas de valeur par défaut
* `Etudiant(nom, moyenne_bac, classe)`
	* Domaine de la colonne `nom` :
		* Type : texte
		* Longueur : 50 caractères
		* Les caractères autorisés sont les suivants : 0-9, a-z, A-Z, caractères accentuées, espace, "- / ' &"
		* Valeur nulle non autorisée
		* Pas de valeur par défaut
	* Domaine de la colonne `moyenne_bac` :
		* Type : nombre à virgule
		* Longueur : 16 bits (simple précision)
		* Valeur positive ou nulle
		* Pas de valeur par défaut
	* Domaine de la colonne `classe` :
		* Type : nombre entier
		* Valeur positive ou nulle
		* Pas de valeur par défaut

### Exercice 3 - les opérations du modèle relationnel
> Remarque : temps de travail estimé = 2 minutes par question (ne pas passer plus de 5 minutes sur une question).

Nous considérons les relations suivantes dans le modèle relationnel.

Relation `Riviere`, où `id` est une clé primaire de la relation.

| id | nom         | longueur |
|:--:|:------------|:--------:|
| 1  | Ourcq       | 87       |
| 2  | Marne       | 514      |
| 3  | Morbras     | 17,3     |
| 4  | Grand Morin | 118,2    |


Relation `Ville`, où `id` est une clé primaire de la relation et `port` un booléen (vrai/faux) indiquant si un port est présent dans cette ville.

| id | nom            | port  |
|:--:|:--------------:|:-----:|
| 1  | Coulommier     | false |
| 2  | Lizy-sur-Ourcq | false |
| 3  | Mary-sur-Marne | false |
| 4  | Meaux          | true  |

Relation `Traverse` dans laquelle un enregistrement est présent à chaque fois qu'une rivière traverse une ville. `idr` est une clé étrangère vers la clé primaire de `Riviere` et `idv` est une clé étrangère vers la clé primaire de `Ville`. `idr` et `idv` forment une clé primaire pour cette relation.

| idv | idr |
|:---:|:---:|
| 1   | 4   |
| 2   | 1   |
| 3   | 1   |
| 3   | 2   |
| 4   | 2   |

1. Quelle relation obtient-on en effectuant le produit cartésien des relations `Ville` et `Riviere` ? La table résultant est un peu grosse, inutile de l'écrire en entier si vous visualisez bien le résultat final, les 6-8 lignes suffisent. Quel est la signification du résultat obtenu ?

| id | nom         | longueur | id | nom            | port  |
|:--:|:------------|:--------:|:--:|:--------------:|:-----:|
| 1  | Ourcq       | 87       | 1  | Coulommier     | false |
| 2  | Marne       | 514      | 1  | Coulommier     | false |
| 3  | Morbras     | 17,3     | 1  | Coulommier     | false |
| 4  | Grand Morin | 118,2    | 1  | Coulommier     | false |
| 1  | Ourcq       | 87       | 2  | Lizy-sur-Ourcq | false |
| 2  | Marne       | 514      | 2  | Lizy-sur-Ourcq | false |
| 3  | Morbras     | 17,3     | 2  | Lizy-sur-Ourcq | false |
| 4  | Grand Morin | 118,2    | 2  | Lizy-sur-Ourcq | false |
| 1  | Ourcq       | 87       | 3  | Mary-sur-Marne | false |
| 2  | Marne       | 514      | 3  | Mary-sur-Marne | false |
| 3  | Morbras     | 17,3     | 3  | Mary-sur-Marne | false |
| 4  | Grand Morin | 118,2    | 3  | Mary-sur-Marne | false |
| 1  | Ourcq       | 87       | 4  | Meaux          | true  |
| 2  | Marne       | 514      | 4  | Meaux          | true  |
| 3  | Morbras     | 17,3     | 4  | Meaux          | true  |
| 4  | Grand Morin | 118,2    | 4  | Meaux          | true  |

Cette relation contient toutes les combinaisons possibles des villes avec les rivières. Elle n'a pas de sens physique particulier.

2. Par quelle(s) opération(s) du modèle relationnel peut-on obtenir la relation suivante ?

| nom         | longueur |
|:------------|:--------:|
| Ourcq       | 87       |
| Morbras     | 17,3     |

Le résultat s'obtient en effectuant une sélection sur la relation `Riviere`, avec comme condition de sélection `longueur < 100` par exemple, et une projection sur les colonnes `nom` et `longueur`.

3. Quel est le résultat de la jointure de la relation Ville avec la relation `traverse` en utilisant comme condition de jointure `Ville.id = Traverse.idv` ?

| id | nom            | port  | idv | idr |
|:--:|:--------------:|:-----:|:---:|:---:|
| 1  | Coulommier     | false | 1   | 4   |
| 2  | Lizy-sur-Ourcq | false | 2   | 1   |
| 3  | Mary-sur-Marne | false | 3   | 1   |
| 3  | Mary-sur-Marne | false | 3   | 2   |
| 4  | Meaux          | true  | 4   | 2   |

4. Quelle(s) opération(s) du modèle relationnel permettent d'obtenir la relation suivante ?

| Nom ville      | Nom rivière |
|:--------------:|:------------|
| Coulommier     | Grand Morin |
| Lizy-sur-Ourcq | Ourcq       |
| Mary-sur-Marne | Ourcq       |
| Mary-sur-Marne | Marne       |
| Meaux          | Marne       |

Pour obtenir le résultat présenté, il faut effectuer plusieurs opérations :
1. jointure entre `Ville` et `Traverse` avec comme condition `Ville.id = Traverse.idv`
2. jointure entre la relation obtenue et `Riviere`  avec comme condition `Riviere.id = Traverse.idr`
3. projection pour ne retenir que les colonnes `Riviere.nom` et `Ville.nom`
4. renommage pour appeler ces colonnes `Nom riviere` et `Nom ville`

## Exercices de modélisation
Pour les exercices de modélisation avec UML, vous pouvez utiliser :

* le plus basique : un papier et un crayon;
* un logiciel de dessin proposant une intégration d'UML : <https://www.draw.io> ou <https://www.lucidchart.com/> le proposent gratuitement après avoir créé un compte sur leurs plateforme;
* un logiciel spécifique à la modélisation UML comme [Modelio](https://www.modeliosoft.com/fr/) ou [StarUML](http://staruml.io), tout deux gratuits.

### Exercice 1 - Massifs montagneux
> Remarque : temps de travail estimé = 10-12 minutes (ne pas passer plus de 20 minutes sur cet exercice)

Un massif montagneux est composé de sommets à différentes altitudes. Le massif, comme chacun des sommets, possède un nom qui est unique. Un sommet, localisé par sa longitude et sa latitude, est situé sur un seul pays. Ce n'est pas forcément le cas du massif complet qui peut s'étendre sur plusieurs pays.

Des voies d'accès d'escalade permettent parfois de gravir un sommet. Ces voies peuvent être nommées et sont toujours caractérisées par leur difficulté (exemple : 1A, 1B, 1C, 2A, ... 7C). Pour retrouver la trace d'une voie, les cordonnées de points remarquables la constituant sont enregistrées. Un point peut être utilisé pour plusieurs voies d'accès. Enfin, un texte libre complète parfois la description du point remarquable.

1. Parmi les propositions suivantes, identifiez les entités qui constitueront les relations du système à modéliser : massif, randonnée, escalade, pays, altitude, difficulté, voie d'accès, point remarquable, point secondaire, sommet, surface, coordonnée, description.

Les bonnes réponses sont : massif, pays, voie d'accès, point remarquable et sommet.

2. Quel sera la cardinalité de la relation *voie d'accès*-*point remarquable* ? Au choix : 1-1, 1-N ou M-N.

La bonne réponse est M-N. Une voie d'accès peut être composée de plusieurs points remarquables et un point remarquable peut être utilisé pour plusieurs voies d'accès.

Explications : 
1. Un sommet appartient à un massif (*lien 1-N*) et est situé dans un pays (*lien 1-N* également). Une voie d'aacès permet de gravir un sommet, mais plusieurs voies permettent de gravir le même sommet (*lien 1-N*). Enfin la voie d'accès est constituée d'une suite de points remarquables qui peuvent être utilisés pour plusieurs voie d'accès (*lien M-N*).
2. Nous implémentons les lien 1-N à l'aide de clés étrangères dans la relation *du côté N* du lien. Pour le lien M-N, nous ajoutons une table d'association entre les relations `VoieDAcces` et `PointRemarquable`. Elle contient trois colonnes : deux clés étrangères faisant référence aux clés primaires des deux relations liées et une position permettant de reconstituer l'ordre des points remarquables dans la voie d'accès.

![](https://cdn.discordapp.com/attachments/1003619465038139486/1003623493033791648/PXL_20220729_120253005.jpg)

![](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/exercices/MCD_Massifs_montagneux.png)

### Exercice 2 - association de randonneurs
> Remarque : temps de travail estimé = 20 minutes (ne pas passer plus de 35 minutes sur cet exercice). En cas de blocage, des indices peuvent vous guider (ne pas ouvrir les indices au bout de 30 secondes ;-)).

Une association de randonneurs souhaite mettre en place une base de données qui permettra à ses adhérents de consulter via un site internet les possibilités de randonnées qui respectent des critères tels que :

* le temps et la difficulté du parcours;
* le fait de vouloir faire une boucle ou non;
* la zone géographique;
* les possibilités d'hébergement.

Une randonnée est décrite sous forme d'étapes qui sont caractérisées par les points suivants :

* le nom d'un lieu remarquable (village, lieu-dit, croisement de chemin, col, chapelle, etc.);
* le temps de parcours de l'étape (ie. temps pour arriver au lieu remarquable depuis le lieu remarquable précédent);
* la distance et/ou le dénivelé de l'étape;
* une description textuelle de l'étape (chemins à emprunter, difficultés particulières, etc.) sous forme d'un court paragraphe;
* éventuellement, des informations sur ce que l'on peut trouver à proximité de l'étape, notamment en termes de ravitaillement ou de logement.

Bien sûr, pour chaque étape, le futur randonneur peut accéder à une carte de l'itinéraire sur un fond de plan IGN au 1/25000ème[dans la base de données, nous nous contenterons de sauvegarder le chemin d'accès à la carte de la randonnée]. Pour la randonnée complète, un assemblage des cartes des étapes est disponible.

Une étape peut être empruntée par plusieurs randonnées.

L'association dispose également d'une liste d'hébergements avec les notes (entre 0 et 5) et les commentaires nominatifs des adhérents y ayant déjà séjourné.

=> Proposez une modélisation du problème en utilisant le formalisme UML.

Nous commençons par créer deux tables : `Randonnee` et `Etape`.

Nous créons ensuite une table `Hebergement`. Une clé étrangère dans `Hebergement`, faisant référence à la clé primaire de `Etape`, permet de lier ces tables.

Une nouvelle table `Adherent` contient uniquement leurs noms et prénoms. Ces deux colonnes nous servent de clé primaire : nous supposons ici que l'associaiton n'est pas trop importante et que le couple nom/prénom nous suffira pour identifier de manière unique un adhérent.

La table `Avis` est une table d'association entre `Adherent` et `Hebergement`. La note et le commentaire sont des colonnes supplémentaires de la table `Avis`.

![](https://cdn.discordapp.com/attachments/1003619465038139486/1003623885759070259/PXL_20220729_122505559.jpg)

![](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/exercices/MCD_Association_randonneurs.png)

### Exercice 3 - compagnie aérienne
Une compagnie aérienne possède un ensemble d'avions, qui ont un nom, une capacité ainsi qu'un aéroport d'attache. Par ailleurs, la compagnie emploie des personnels (pilote, personnel navigants ou non), qui ont un nom, une adresse et un salaire.

Les villes reliées par la compagnie ne possèdent qu'un aéroport.

Un vol est défini avec un pilote, un avion, une ville de départ, une ville d'arrivée, une date et heure de départ et d'arrivée.

=> Proposez une modélisation du problème en utilisant le formalisme UML.

???

### Exercice 4 - service technique départemental
Un service technique départemental souhaite enregistrer dans une base de données les informations sur l'état des routes de sont département afin d'en faciliter la gestion.

Une route (ex : départementale D702, voie communale C12) est composée de différents tronçons linéaires, avec pour chacun un numéro, un nombre et une largeur de voie. Chaque tronçon commence et se termine obligatoirement par un noeud routier (un carrefour s'il relie plusieurs tronçons, une impasse sinon).

Les interventions des services techniques sont enregistrées dans la base de données (date, nature de l'intervention, tronçons impactés). De cette manière, un historique des interventions pour chaque tronçon est disponible.

Dans une visée de gestion des équipements, un dernier éléments important à prendre en compte concerne les franchissements de tronçons les uns au dessus/dessous des autres, sans qu'il y ait nécessairement de croisement. Ces franchissements sont nommés, typés (tunnel ou pont) et localisées précisément (coordonnées de l'intersection). La base de données doit permettre de retrouver quel tronçon passe au dessus de quel autre.

=> Vous proposerez à l'aide du formalisme UML une modélisation de système à représenter dans la base de données. Nous vous encourageons à accompagner votre diagramme de commentaires permettant de mieux comprendre les choix de modélisation effectués. Les types des objets géométriques apparaîtrons dans le diagramme.

![](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/exercices/MCD_reseau_routier.png)

### Exercice 5 - club d'oenologie
Un club d'œnologie souhaite enregistrer les résultats des dégustations qu'il organise avec ces adhérents afin d'effectuer des analyses permettant de proposer les vins les plus appréciés lors des sessions suivantes.

L'association possède le nom, le prénom, l'âge et la ville de résidence de chaque adhérent.

Elle note déjà sur un cahier pour chaque dégustation la date, les participants, les vins dégustés (appellation, millésime, degré, cépage principal, quantité consommée) ainsi que les impressions (sous forme de note allant de 1 à 5).

=> Vous proposerez à l'aide du formalisme UML une modélisation de la base de données à mettre en place.

En utilisant le langage SQL, écrivez les requêtes permettant d'effectuer les actions suivantes :

    création de la table Buveur
    suppression de la colonne naissance de la table Buveur
    ajout de la colonne naissance à la table Buveur en y ajoutant une contrainte pour qu'un buveur ne puisse pas avoir moins de 18 ans
    ajout du Pinot Noir dans la table Cepage
    ajout dans la table des buveurs de Abel Mir, né en 1990 et résidant à Bordeaux
    affichage des buveurs
    affichage du nom de cru des vins
    affichage des buveurs dont le nom est Mir
    affichage des cépages dont le nom commence par un M
    affichage du prénom des buveurs nés avant 1992
    affichage des vins et leur cépage
    affichage du prénom des buveurs ayant participé à la dégustation du 07/05/2015
    affichage des vins dégustés par le buveur d'identifiant 3 à la dégustation du 07/05/2015
    affichage, pour la dégustation du 07/05/2015, de la note de chaque dégustation, en les triant dans l'ordre croissant, avec les nom/prénom du buveur, ainsi que le cru et le millésime du vin
    passage de la ville de résidence de Deuf John de Toulouse à Dijon
    suppression des dégustations ayant eu lieu le 12/12/2012

# Indices

## Exercices de modélisation

### Exercice 2 - association de randonneurs
Nous identifions initialement quatre objets intervenant dans le problème à décrire : les randonnées, les étapes, les hébergements et les avis sur les hébergements.

Une randonnées est composée d'étapes qui peuvent appartenir à plusieurs randonnées. Le lien entre étape et randonnée est de cardinalité M-N.

Un hébergement se trouve sur une étape mais il peut y avoir plusieurs hébergement pour une étape. Le lien est de cardinalité 1-N.

Il nous reste enfin à intégrer les avis sur les hébergements. Ceux-ci étant nominatifs, nous décidons d'ajouter une table pour représenter les adhérents de l'association. Cet table nous permettra de retrouver tous les avis d'un adhérent donné.

Les avis sont ajoutés sous forme de table d'association liant les adhérents et les hébergements. La cardinalité entre ces deux table des de type M-N : un adhérent peut évaluer plusieurs hébergement et un hébergement peut être évalué par plusieurs adhérents.

https://aymeric-auberton.fr/academie/mysql/# Exercices

https://developpement-informatique.com/article/45/# Exercices-corriges-de-langage-sql

https://github.com/ponsfrilus/kata-sql

https://github.com/XD-DENG/SQL-exercise/tree/master/SQL_exercise_01
