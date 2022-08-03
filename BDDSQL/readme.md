# Base de données / SQL

# Dates [7j9j]

- MARDI 17 MAI - Guillaume
- MERCREDI 18 MAI - Guillaume
- JEUDI 19 MAI
- MARDI 24 MAI
- MERCREDI 25 MAI
- MARDI 31 MAI
- MERCREDI 01 JUIN
- // JEUDI 02 JUIN
- // VENDREDI 03 JUIN

# Vidéo simples et efficace

Apprendre MySQL

Une base de données permet de stocker des informations pour ensuite les utiliser pour la création d'un site dynamique.
<https://grafikart.fr/formations/mysql>

Apprendre et maitriser SQL

SQL, pour Structured Query Language, est un langage qui permet d'interroger une base de données relationnelle afin de pouvoir modifier ou récupérer des informations. Les bases de données relationnelles permettent de sauvegarder les informations sous forme de tableau à 2 dimensions.
<https://grafikart.fr/formations/apprendre-sql>

# Résumé du cours

L'objectif de ce cours est de transmettre les compétences nécessaires pour concevoir et utiliser une base de données.

Il débutera par des généralités sur les bases de données : intérêt, origine, état du marché actuel; en s'attardant sur les notions de base de ces systèmes. Le cours s'attardera ensuite sur la modélisation d'une base de données. Le formalisme UML sera introduit et utilisé pour aider à établir des modèles de bases de données. Cette partie fera appel au bon sens et l'expérience permettra à l'apprenant d'éviter certains pièges de modélisation. Une dernière partie montrera enfin comment utiliser certains types de bases de données en utilisant le langage informatique SQL. Avec cette partie, le support de cours couvre toutes les étapes du cycle de vie d'une base de données : modélisation, implémentation, utilisation.

- [PIKOTARO - PPAP (Pen Pineapple Apple Pen)](https://youtu.be/Ct6BUPvE2sM)
- [Entretien d’embauche SQL : 50 Questions à préparer](https://analyticsinsights.io/sql-50-questions-2020/)

# Evaluation

L'évaluation de ce cours comportera trois points :

- des questions portant sur les aspects théoriques des bases de données introduits dans le cours;
- un premier exercice de modélisation d'une base de données : à partir de l'énoncé d'une problématique, il s'agit de proposer un modèle UML pour l'implémentation d'une base de données. La pertinence de la modélisation et la bonne utilisation du formalisme UML seront pris en compte dans la notation;
- un second exercice où, étant donnée le schéma d'une base de données relationnelle, il s'agit d'écrire des requêtes SQL permettant d'extraire des informations de cette base.

# Objectifs

- Savoir ce qu'est une base de données, un SGBD, un SGBDR, comment y sont représentées les données
- Connaître les principaux SGBD du marché
- Etre capable de modéliser un problème en utilisant le formalisme UML
- Savoir ce qu'est le language SQL et à quoi il sert
- Pouvoir écrire et exécuter des requêtes SQL simples

# Sommaire

## Introduction

- Qu'est ce qu'une base de données ?
- Historique rapide

## Préparation environnement de travail

- MySQL Server et MySQL Workbench
- PostgreSQL et pgadmin
- L'environnement WAMP

## Conception des bases de données

- Du cahier des charges au MCD
  - Analyser le cahier des charges
  - Décrire les entités et associations
- Du MCD au MLD
- Le Modèle Physique
  - Récapitulatif.

# Qu'est-ce que PHPMyAdmin?

L'administration d'une base de données MySQL sur Internet est gérée par un outil écrit dans PHP appelé PhpMyAdmin. La base de données elle-même est d'abord installée dans un serveur, mais phpmyadmin gère ses fonctions. Par exemple, phpmyadmin peut créer et modifier des bases de données. Vous pouvez l'utiliser pour ajouter, éditer, supprimer des champs, déposer des bases de données entières, exécuter des instructions SQL ou même transmettre des informations dans différents formats et administrer des clés. Fondamentalement, toute commande de table que vous exécuteriez à partir de la coquille à l'invite MySQL peut être accomplie ici dans cette interface utilisateur graphique.

![image](https://hw-images.hostwinds.com/cdn-cgi/image/f=auto%2cq=85%2cfit=scale-down%2cwidth=1800/strapi-images/IMG_Cpanel_Phpmyadmin_Overview_89ed49545a.png)

## Le langage SQL et fondamenataux des requetes SQL

- Présentation
  - Historique SQL
  - 4 familles de requetes
  - Documentation SQL
- SELECT
- SELECT DISTINCT
- WHERE et Les opérateurs de comparaison
- NULL
- AS (alias)
- LIMIT
- ORDER BY
- LIKE
- IN
- BETWEEN... AND
- Opérateurs logiques, arithmétiques et concaténation
  - Les opérateurs logiques.
  - Les opérateurs arithmétiques.
  - La concaténation.
- Les fonctions d’agrégations
  - COUNT()
  - MIN(), MAX()
  - SUM()
  - AVG()
- GROUP BY
- HAVING

## Jointures

- Introduction Jointures
- Types de Jointures
- Inner Join
- Left Join
- Right Join
- Outer Join
- Union

## SQL Avancé

- Fonctions de dates et d’heures
- Fonctions mathématiques
- Fonctions de chaîne caractère
- Sous-requêtes

## Création de base de données et tables

- Types de données
- Clé primaire
- Clé étrangère
- Create Table
- Insert
- Update
- Delete
- Alter Table
- Drop Table

## Optimisation

- Indexation
  - Qu'est-ce que l'indexation ?
  - L'indexation par arbre binaire.
  - Avantages et inconvénients.
- Les variables et la console MySQL
  - Les variables.
  - Utilisation avec la console MySQL.
- Les procédures stockées
  - Les procédures.
  - Les fonctions.
- Les triggers
  - Les triggers.

## Vues

- Introduction et Créations des Vues
- Renommer et Supprimer une Vue

# MariaDB

MariaDB est un Système de Gestion de Base de Données (SGBD) disponible sous licence GPL. Ce système est un fork de MySQL, ce qui signifie que c’est un nouveau logiciel créé à partir du code source de MySQL.

Le projet a été lancé par l’entreprise Monty Program AB et sa maintenance est assurée par la fondation MariaDB. Cette fondation est une organisation à but non lucrative qui permet de s’assurer que le projet restera libre et qu’il y a une protection légale autour du projet.

Sachant que MySQL a fini par devenir un projet de l’entreprise Oracle, l’informaticien Michael Widenius qui est le principal développeur de MySQL décide de créer MariaDB dans le but de remplacer MySQL et d’assurer une interropérabilité avec celui-ci.

Les versions de MariaDB sont basées au moins sur la version 5.1 de MySQL. L’objectif de MariaDB est de créer une communauté qui puisse maintenir et faire évoluer ce SGBD.

# Le NoSQL

Les technologies NoSQL sortent du cadre de ce cours. Néanmoins, nous invitons l'étudiant intéressé par cette problématique à consulter cette partie.

Depuis des années, SQL (Structured Query Language) est le langage standard normalisé pour interroger et mettre à jour des bases de données relationnelles. Il s'est imposé jusque dans les systèmes pour construire des sites Web, avec PHP-MySQL. Mais les exigences d'applications « extrêmes » ont conduit à remettre en question sa suprématie. On retrouve des demandes difficiles à satisfaire avec des systèmes relationnels dans deux grandes classes d'applications :

- Applications transactionnelles : on peut avoir des millions de transactions à traiter par seconde, et ce vingt-quatre heures sur vingt-quatre. C'est le cas par exemple pour des sites de E-commerce comme Amazon.
- Applications décisionnelles : on doit réaliser des calculs, notamment statistiques, sur des téraoctets de données. C'est le cas par exemple pour des sites de recommandation comme Netflix.

Enfin, certaines applications, comme le trading haute-fréquence (ou trading algorithmique) marient les contraintes du transactionnel (volume important de transactions, besoin évident de rapidité) et du décisionnel (calculs complexes à mettre en œuvre avant de prendre la décision d'acheter ou vendre).

Quand on utilise les bons vieux systèmes relationnels sur de telles applications, ça rame... Quand on essaie de comprendre pourquoi, on réalise que les systèmes relationnels paient un fort overhead pour leur universalité, c'est-à-dire le fait qu'ils sont destinés à traiter tout type d'application, avec des données très diverses dans leur représentation, dans leur structure et leur volumétrie. Les difficultés rencontrées pour les applications mentionnées ci-dessus ont conduit à considérer des systèmes de gestion de données spécialisés qui passent à l'échelle des grands systèmes transactionnels ou décisionnels, mais en abandonnant cette universalité.

Les systèmes relationnels permettent par exemple à plusieurs utilisateurs de partager des données de manière contrôlée grâce à un système de verrous; la pose de verrou sur une donnée ou sur un morceau d'index particulier par une application garantit qu’aucune autre application ne va toucher cette information. Ce système de verrous est essentiel pour assurer des propriétés fondamentales comme la cohérence d’une base de données et de son évolution, mais il est aussi complexe et coûteux en temps. On peut améliorer les performances en le remplaçant par un protocole de partage moins sûr mais plus performant. Dans le cadre des systèmes distribués, un théorème proposé par Eric Brewer vient encourager un tel abandon. Le Théorème CAP explique qu'il est impossible de répondre aux trois exigences suivantes à la fois :

- Cohérence (consistency) : la valeur d'une donnée à un instant donné est la même pour chaque participant au système;
- Disponibilité (availability) : une donnée doit toujours être accessible même en cas de panne;
- Tolérance au partionnement : le système doit continuer à fonctionner même quand il est fragmenté par des problèmes de réseaux.

Dans des situations très distribuées, comme c'est le cas pour des applications qui travaillent à l’échelle du Web, on peut choisir d'abandonner les exigences strictes en terme de cohérence (résumées par les propriétés ACID des transactions) au profit de la fluidité d'une exécution transactionnelle massive.

Une autre particularité fréquente des systèmes NoSQL est de s'appuyer sur des modèles de données plus simples que le modèle relationnel, des langages plus simples que SQL. Par exemple, plutôt que de considérer des tableaux à plusieurs colonnes, on va se limiter à associer des valeurs à des clés (comme dans un dictionnaire). On va aussi tirer un trait sur des opérations complexes comme la « jointure ». Quand on fait tout ça, on aboutit à des systèmes d'une grande pauvreté en termes de puissance de représentation et d'interrogation. C'est de là que vient le nom « No SQL » : ce n'est pas qu'on est « contre » SQL, mais plutôt qu'on n'est « même pas » SQL et qu'on en est fier! Certains préfèrent comprendre le sigle comme « Not only SQL ». Doit-on alors comprendre qu'on est au delà de SQL ou que SQL n'est pas la solution à tout? Dans le fourre-tout du NoSQL, on peut d'ailleurs trouver des propositions de modèles très spécialisés qui sur certains aspects sont plus riches que le modèle relationnel (par exemple pour représenter des graphes), avec des langages, eux aussi très spécialisés, qui proposent des opérations qui n’existent pas en SQL.

Mais nous nous intéressons surtout ici aux systèmes moins universels mais avec les performances extrêmes demandées. Ce n'est pas par miracle que ces systèmes arrivent à ces performances étonnantes : ils sont plus rapides parce qu'ils font moins de choses. C'est comme ça qu'on arrive à des passages à l'échelle de PétaOctets de données, de millions de transactions simultanées. C'est aussi parce qu'ils s'appuient typiquement sur des architectures massivement parallèles. La simplification des modèles trouve d'ailleurs là sa principale motivation : simplifier pour pouvoir paralléliser et donc passer à l'échelle d'infrastructures s'appuyant sur des milliers, voire des millions de machines. Parfois, le concept même de machine devient obsolète, et ce sont des (réseaux de) cartes graphiques (processeurs intrinsèquement massivement parallèles, mais aux propriétés de calculs bien spécifiques) qui sont utilisés. Le NoSQL s'est donc imposé dans le monde du Big Data et dans celui des applications Web démesurées.

Si les systèmes NoSQL connaissent de grands succès, il faut bien être conscient de ce tout qu'on perd. Ce qu'un système de gestion de données ne fait pas, c'est à l'application de le prendre en charge. On ne dispose pas des langages de haut niveau si pratiques pour déléguer la gestion des données à des systèmes évolués. Avec un système NoSQL qui ne sait faire (certes, efficacement) que des put() et des get(), il faut écrire du code relativement bas niveau et complexe pour la moindre fonctionnalité que l'on souhaite introduire, le moindre contrôle que l’on veut garantir, la moindre mise à jour, etc. Tout cela représente potentiellement des pertes énormes de productivité, de fiabilité, et même d’efficacité (les systèmes relationnels, quoiqu'on en dise, savent faire des choix d'exécution intelligents, performants et adaptés au contexte).

L'engouement actuel pour ces systèmes mal connus, mal compris, non normalisés, dont on peut penser parfois à tort qu'ils représentent un progrès alors qu'ils ne sont que des solutions alternatives pour certaines niches, risque de conduire à des désillusions. Dans la plupart des cas, il reste préférable de recourir à un système relationnel pour ses langages normalisés, sa richesse de fonctionnalité, sa robustesse et même ses performances (mais oui). Réservons au NoSQL les applications avec tellement de données ou tellement de transactions que la solution relationnelle est exclue.

- SQL vs NoSQL & les principes ACID : <https://youtu.be/Cq0yyYid-5Y>
- What is, Types of NoSQL Databases & Example [eng] : <https://www.guru99.com/nosql-tutorial.html>
- MongoDB cours [eng] : <https://www.w3schools.in/mongodb/overview>
- Maîtrisez les bases de données NoSQL [fr] : <https://openclassrooms.com/fr/courses/4462426-maitrisez-les-bases-de-donnees-nosql/4462433-choisissez-votre-famille-nosql>

# Des outils pour faire de l'UML

StarUML

    http://staruml.io
    version d'évaluation gratuite
    versions disponibles pour Windows, Mac, Linux
    supporte la norme UML, ce qui permet de s'assurer en temps réel de la validité des diagrammes

Modelio

    https://www.modeliosoft.com/fr/
    logiciel gratuit et OpenSource
    versions disponibles pour Windows, Mac, Linux; nécessite d'avoir installé Java (JRE)
    supporte la norme UML, ce qui permet de s'assurer en temps réel de la validité des diagrammes
    exports possibles en XMI pour échanger des modèles avec d'autres logiciels

draw.io

    https://www.draw.io
    utilisation gratuite en ligne; nécessite un compte Google
    exports possibles en XMI pour échanger avec d'autres logiciels
    logiciel de dessin de diagrammes, qui permet de dessiner des diagrammes UML mais pas de s'assurer de leur validité

yUML

    https://yuml.me
    utilisation gratuite en ligne
    ne permet de réaliser que trois types de diagrammes (cas d'utilisation, classes et activité)
