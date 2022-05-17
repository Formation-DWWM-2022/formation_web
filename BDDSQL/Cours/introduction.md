# Introduction
- Qu'est ce qu'une base de données ?
- Historique rapide

# Introduction

Ce support de cours propose une vision d'ensemble des bases de données. Il aborde deux grands volets de ces systèmes : les principes de conception de bases de données relationnelles et l'utilisation des systèmes de gestion de bases de données, via l'utilisation du language SQL. Avant d'aborder ces deux aspects fondamentaux, nous rappelons quelques définitions pour le lecteur novice dans le domaine des bases de données ou plus généralement en informatique.

Le premier volet couvre les aspects de modélisation et de définition d'un schéma correct pour une base de données. A la fin de cette partie, nous serons capable, en utilisant le langage UML, d'étabir le schéma conceptuel d'un problème en vue de la création d'une base de données.

Dans le second grand volet, nous détaillons les grands principes de l'algèbre relationnelle et introduisons le langage SQL, utilisé pour communiquer avec les systèmes de bases de données relationnelles.

Il est courant de ranger les utilisateurs de bases de données en trois catégories :

- le non initié, qui utilise les bases de données parfois même sans le savoir (typiquement : j'utilise Facebook sans avoir à me soucier de la base de données utilisée);
- le concepteur ou développeur, qui est capable de concevoir une base de données ou d'éloborer des applications pour les utilisateurs non initiés;
- l'expert ou administrateur, qui maîtrise le fonctionnement interne de la base de données et optimise les usages des premières catégories.

# Définitions

La mémoire d'un ordinateur prend deux formes différentes répondant chacune à des besoins différents : la mémoire vive (dite aussi Random Access Memory (RAM)) est rapide d'accès mais couteuse et limité en quantité tandis que la mémoire de masse (ou Read Only Memory (ROM)) est lente d'accès mais très bon marché et quasi illimité en quantité.

La mémoire vive est aussi une mémoire volatile : à l'extinction de l'ordinateur, son contenu est perdu. C'est cette mémoire qui est utilisé pour exécuter les programmes. La mémoire de masse est quand à elle utilisée pour le stockage des données sur le long terme.

Aux débuts de l'informatique les données stockées étaient peu volumineuses. L'accès à cette donnée, tant en mémoire vive que de masse, n'était pas problématique. Puis les volumes se sont accrus, si bien qu'aujourd'hui il n'est pas rare de manipuler des giga ou des tera-octets de données qui ne tiennent plus dans la mémoire vive. L'accès efficace à cette masse de données est devenu un enjeu majeur de l'informatique. Pour s'y retrouver dans cette quantité de données, il devient alors nécessaire de disposer d'outils pour rechercher, insérer, modifier efficacement dans la mémoire de masse. Cet outil c'est la base de données.

> Une **base de données** est un ensemble de données qui sont stockées sur un support informatique, et structurées de manière à pouvoir facilement consulter et modifier leur contenu.

Une base de données est composée d'un ensemble de fichiers. Manipuler directement la base serait assez fastidieux pour l'utilisateur qui devrait connaître tous les détails de l'implémentation. Pour interagir avec une base de données, il passe donc par l'intermédiaire d'un logiciel ou d'une suite de logiciels : le système de gestion de bases de données.

> Le **système de gestion de bases de données (SGBD)** est le logiciel destiné au stockage et à la manipulation de bases de données.

Les accès à la mémoire de masse étant lents, la multiplication des requêtes à une base de données risque d'introduire des incohérences. Par exemple deux utilisateurs possesseur d'un même compte commun crédité de 600e et effectuent simultanément un virement de 500e : le système doit permettre à un des deux virements, mais doit interdire l'autre.

Le SGBD répond ainsi également à une problématique de cohérence des données stockées et de gestion des accès multiples. Il donne l'illusion à l'utilisateur, ou ce qui sera plus souvent le cas à un ensemble d'utilisateurs, de travailler tout seul sur les données. Pour cela, une sécurisation des accès est mise en oeuvre : classiquement l'utilisateur devra s'identifier et saisir un mot de passe pour pouvoir utiliser le SGBD; et chaque utilisateur se verra attribuer des droits sur les données.

Enfin nous attendons d'un SGBD qu'il soit capable de revenir à un état cohérent même après un incident : c'est la gestion des reprises sur incidents. Prenons l'exemple de M. Dupont qui effectue un virement de 500e sur le compte de M. Durant. Une coupure de courant survient sur le système alors l'opération est en cours : les 500e ont été débités du compte de M. Dupont mais pas encore crédités sur le compte de M. Durant. Dans ce cas, le SGBD doit permettre de revenir à un état cohérent : rendre l'argent à M. Dupont ou finaliser le virement en créditant M. Durant.

# Les différents types de bases de données
Il existe plusieurs grandes familles de bases de données. La manière de structurer les données dépendra du type de la base de données.

- Un modèle décrit de façon abstraite comment sont représentées les données dans une organisation métier, un système d'information ou une base de données.

Différents modèles de bases de données ont été inventés pour répondre à des problématiques évoluant au cours du temps. Certains de ces modèles sont, encore aujourd'hui, utilisés dans les SGBD du marché. Nous présentons dans ce paragraphe un bref historique des modèles de SGBD.

Les premiers fichiers apparaissent avec les premiers ordinateurs dans les années 1950 (le premier disque dur date de 1956). Les volumes de données manipulées restent alors modestes (quelques kilo octets) et ne nécessitent pas de système de gestion particuliers.

Dans les années 1960, la quantité de données commence à croître et les premiers SGBD font leur apparition. Le concept de base de données émerge pour la première fois en 1964. Il s'agit alors de systèmes hiérarchiques, comparable à des arborescences.

![image](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/modele_hierarchique.png)

Vers le milieu des années 1960, les SGBD réseaux complètent les SGBD hiérarchiques. Une manière imagée de considérer cette nouvelle organisation des données et de la voir comme des arborescences avec des raccourcis.

![image](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/modele_reseau.png)

Enfin les SGBD relationnels, les plus utilisés aujourd'hui, arrivent sur le marché dans les années 1970. Les données y sont organisées sous forme de tableaux liés les uns avec les autres. Un langage standardisé, le SQL, est créé pour interragir avec les SGBD relationnels.

![image](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/modele_relationnel.png)

D'autres systèmes d'organisation des données connaissent leurs heures de gloire dans les décennies qui suivent. Citons par exemple les SGBD orientés objets (années 1990) qui répondent à une problématique de la programmation orientée objet en forte progression à cette époque.

A partir des années 2000, l'explosion d'internet et des réseaux de communication a de forts impacts sur les systèmes de gestion de bases de données. Prévus initialement pour fonctionner avec des dixaines ou centaines d'utilisateurs, les SGBD sont maintenant confrontés à des milliers, voir millions d'utilisateurs (pensons aux réseaux sociaux Facebook ou Twitter par exemple). Les volumes de données croissent également considérablement et ne permettent plus d'être stockés sur un seul ordinateur. Les SGBD historiques ne répondent pas de manière satisfaisante à ces utilisations exceptionnelles. Le concept de base de données réparties apparait à la fin des années 1980 : une base de données n'est plus nécessairement stockée sur un seul support physique, ce qui permet de rendre son accès depuis différentes localités plus facile.

La mouvance des bases de données NoSQL (Not Only SQL) vise également à répondre à la problématique de multiplication des usages. L'approche la plus commune consiste à les classer les bases de données NoSQL en quatre grandes familles : les bases de données clé/valeur, les bases de données orientées documents, les bases de données orientés colonnes et les bases de données orientés graphes.

![image](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/modele_oriente_document.png)

Synthèse des grandes dates de l'histoire des SGBD :
- 1956 : premier disque dur
- 1964 : apparition du concept de base de données
- 1964 : moteur de base de données réseau IDS de General Electric
- 1966 : moteur de base de données hiérarchique IMS d'IBM
- 1970 : thèse de E. Codd introduisant le modèle relationnel
- 1974 : création du langage SQL
- 1974 : première version de INGRES
- 1977 : fondation de la société Oracle
- 1990 : systèmes orientés objets
- 1990 : bases de données réparties
- 2000 : mouvence NoSQL

Aujourd'hui les SGBD se retrouvent dans de nombreux domaines et métiers. Citons par exemple :

- les banques, pionnières en matière de base de données réseau;
- les producteurs de données, à l'image de l'Institut national de l'information géographique et forestière (IGN) dont le métier est de produir des bases de données géographiques;
- gestion des personnels, étudiants, cours, inscriptions, ... d’une université;
- système de réservation (hôtel, billet de trains etc. )
- les sites marchands sur internet (Amazon);
- les réseaux sociaux ou encore les moteurs de recherches qui, ces dernières années, ont fait avancer les technologies dans le domaines du NoSQL et du big data;
- et à une autre échelle : derrière chaque blog ou site sur internet se cache en général une base de données;

![image](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/logos_sgbd.png)

Dans la suite de ce cours nous ne nous intéresserons qu'aux systèmes de gestion de bases de données relationnelles (SGBDR) qui sont apparus dans les années 1980 et constituent à ce jour la famille de SGBD la plus utilisée.

# Composition d’un SGBD
L’architecture ANSI/SPARC

Trois couches principales :
- Couche Externe : dialogue avec les utilisateurs , vues associées à chaque groupe d’utilisateurs (Chaque vue correspond à la perception d’une partie desdonnées, mais aussi des données qui peuvent être
synthétisées à partir des informations représentées dans la BD (par ex. statistiques))
- Couche Logique : contrôle global et structure globale des données
- Couche Interne : stockage des données sur des supports physiques, gestion des
structures de mémorisation (fichiers) et d’accès (gestion des index, des clés, ...)

Exemple de parcours d’une requête
1. Analyse syntaxique et sémantique d’une requête
2. Traduction au niveau logique
3. Contrôles de confidentialité, concurrence...
4. Si la requête est acceptée, optimisation et découpage en sous-requêtes
élémentaires transférées au niveau interne
5. Au niveau interne, traduction des sous-requêtes en requêtes physiques
correspondantes.

# La notion de transation ###
La notion de transaction est fondamentale en base de données.

> Une **transaction** est une séquence d'actions sur une base de données.

Elle peut débuter lorsque la base se trouve dans une état initial cohérent et amène toujours la base dans un état final respectant lui aussi la cohérence des données.

"M. Dupont effectue un virement de 500e sur le compte de M. Durant" est une transaction constituée de deux opérations :

* débiter le compte de M. Dupont de 500e;
* créditer le comptre de M. Durant de 500e.

Des règles et mécanismes propres à certains types de SGBD garantissent que les transactions sont exécutées de manière fiable :

* l'**atomicité** : une transaction est un ensemble d'instructions indivisibles;
* la **cohérence** : une transaction ne peut amener à violer une des contraintes de la base;
* l'**isolation** : deux transactions concurrentes ne peuvent intéragir entre elles;
* la **durabilité** : si une panne survient pendant une transaction, l'ensemble de la transaction doit être annulé.

Si nous reprenons l'exemple précédent du virement de 500e :

* la transaction est constituée de deux instructions indivisibles : un débit et un crédit. Si nous n'effectuons pas l'une ou l'autre des instructions, la transaction ne correspond plus à un virement;
* la somme totale d'argent possédée par l'ensemble des personnes est identiques avant et après la transaction : la transaction amène bien la base dans un état cohérent;
* si un autre virement est effectué en même temps, le système traitera les deux transactions indépendament l'une de l'autre : il n'y a pas d'interférence entre elles;
* si une panne survient entre le débit et le crédit, l'opération de débit peut être annulée (on crédite le compte de M. Dupont) pour ramener la base dans une état cohérent.

Une transaction qui respecte ces quatre règles est dite **ACID** (nous parlerons aussi d'acidité du SQGB). Les SGBD hiérarchiques comme relationnels offrent la garanti d'effectuer des transactions acides. Les systèmes NoSQL, apparus pour répondre à de nouvelles demandes (haute disponibilité, volumes de données énormes, etc.), offrent de nouvelles possibilités en terme de stockage et de performance en sacrifiant une part de leur acidité : les systèmes NoSQL ne garantissent plus systématiquement l'acidité des transactions.

