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
| Mir      | Abel        | 05/07/1990      |
| Fonfec           | Sophie      | 14/09/1989      |
| Deuf             | John        | 22/05/1993      |

1. Proposez une clé primaire pour la relation `Ville`.
2. Même question pour la relation `Personne`.
3. En modifiant le modèle, comment traduire le fait qu'une personne est née dans une ville (mais plusieurs peuvent naître dans la même ville) ?
4. En modifiant le modèle, comment traduire le fait qu'une personne peut posséder des logements dans différentes villes ?

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
2. En utilisant le modèle relationnel, proposez un schéma logique représentant le problème décrit ci-dessus.
3. Explicitez les domaines pour deux des colonnes que vous avez identifiées.

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
2. Par quelle(s) opération(s) du modèle relationnel peut-on obtenir la relation suivante ?

| nom         | longueur |
|:------------|:--------:|
| Ourcq       | 87       |
| Morbras     | 17,3     |

3. Quel est le résultat de la jointure de la relation Ville avec la relation `traverse` en utilisant comme condition de jointure `Ville.id = Traverse.idv` ?

4. Quelle(s) opération(s) du modèle relationnel permettent d'obtenir la relation suivante ?

| Nom ville      | Nom rivière |
|:--------------:|:------------|
| Coulommier     | Grand Morin |
| Lizy-sur-Ourcq | Ourcq       |
| Mary-sur-Marne | Ourcq       |
| Mary-sur-Marne | Marne       |
| Meaux          | Marne       |

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

2. Quel sera la cardinalité de la relation *voie d'accès*-*point remarquable* ? Au choix : 1-1, 1-N ou M-N.

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

<details>
    <summary>Indice</summary>
Nous identifions initialement quatre objets intervenant dans le problème à décrire : les randonnées, les étapes, les hébergements et les avis sur les hébergements.

Une randonnées est composée d'étapes qui peuvent appartenir à plusieurs randonnées. Le lien entre étape et randonnée est de cardinalité M-N.

Un hébergement se trouve sur une étape mais il peut y avoir plusieurs hébergement pour une étape. Le lien est de cardinalité 1-N.

Il nous reste enfin à intégrer les avis sur les hébergements. Ceux-ci étant nominatifs, nous décidons d'ajouter une table pour représenter les adhérents de l'association. Cet table nous permettra de retrouver tous les avis d'un adhérent donné.

Les avis sont ajoutés sous forme de table d'association liant les adhérents et les hébergements. La cardinalité entre ces deux table des de type M-N : un adhérent peut évaluer plusieurs hébergement et un hébergement peut être évalué par plusieurs adhérents.
</details>

### Exercice 3 - compagnie aérienne

Une compagnie aérienne possède un ensemble d'avions, qui ont un nom, une capacité ainsi qu'un aéroport d'attache. Par ailleurs, la compagnie emploie des personnels (pilote, personnel navigants ou non), qui ont un nom, une adresse et un salaire.

Les villes reliées par la compagnie ne possèdent qu'un aéroport.

Un vol est défini avec un pilote, un avion, une ville de départ, une ville d'arrivée, une date et heure de départ et d'arrivée.

=> Proposez une modélisation du problème en utilisant le formalisme UML.

### Exercice 4 - service technique départemental

Un service technique départemental souhaite enregistrer dans une base de données les informations sur l'état des routes de sont département afin d'en faciliter la gestion.

Une route (ex : départementale D702, voie communale C12) est composée de différents tronçons linéaires, avec pour chacun un numéro, un nombre et une largeur de voie. Chaque tronçon commence et se termine obligatoirement par un noeud routier (un carrefour s'il relie plusieurs tronçons, une impasse sinon).

Les interventions des services techniques sont enregistrées dans la base de données (date, nature de l'intervention, tronçons impactés). De cette manière, un historique des interventions pour chaque tronçon est disponible.

Dans une visée de gestion des équipements, un dernier éléments important à prendre en compte concerne les franchissements de tronçons les uns au dessus/dessous des autres, sans qu'il y ait nécessairement de croisement. Ces franchissements sont nommés, typés (tunnel ou pont) et localisées précisément (coordonnées de l'intersection). La base de données doit permettre de retrouver quel tronçon passe au dessus de quel autre.

=> Vous proposerez à l'aide du formalisme UML une modélisation de système à représenter dans la base de données. Nous vous encourageons à accompagner votre diagramme de commentaires permettant de mieux comprendre les choix de modélisation effectués. Les types des objets géométriques apparaîtrons dans le diagramme.

<!--
https://aymeric-auberton.fr/academie/mysql/# Exercices

https://developpement-informatique.com/article/45/# Exercices-corriges-de-langage-sql

https://github.com/ponsfrilus/kata-sql

https://github.com/XD-DENG/SQL-exercise/tree/master/SQL_exercise_01
-->
