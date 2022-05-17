# Dates :
- MARDI 17 MAI - Guillaume
- MERCREDI 18 MAI - Guillaume
- JEUDI 19 MAI
- // VENDREDI 20 MAI
- MARDI 24 MAI
- MERCREDI 25 MAI
- MARDI 31 MAI
- MERCREDI 01 JUIN
- // JEUDI 02 JUIN
- // VENDREDI 03 JUIN

# Résumé du cours
L'objectif de ce cours est de transmettre les compétences nécessaires pour concevoir et utiliser une base de données.

Il débutera par des généralités sur les bases de données : intérêt, origine, état du marché actuel; en s'attardant sur les notions de base de ces systèmes. Le cours s'attardera ensuite sur la modélisation d'une base de données. Le formalisme UML sera introduit et utilisé pour aider à établir des modèles de bases de données. Cette partie fera appel au bon sens et l'expérience permettra à l'apprenant d'éviter certains pièges de modélisation. Une dernière partie montrera enfin comment utiliser certains types de bases de données en utilisant le langage informatique SQL. Avec cette partie, le support de cours couvre toutes les étapes du cycle de vie d'une base de données : modélisation, implémentation, utilisation.

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
    - Utiliser MoCoDO
- Les entités, les attributs, le MCD et l'EAD
    - Un cahier des charges très simple.
    - L'entité produit.
    - Les attributs d'un produit.
    - La syntaxe MoCoDo des entités.
    - Obtenir le diagramme EAD du MCD.
    - Le formalisme Merise.
- Les associations et les cardinalités
    - Perfectionnons le cahier des charges.
    - L'entité categorie.
    - L'association appartenir.
    - La syntaxe MoCoDo des associations et des cardinalités.
    - Obtenir le diagramme du MCD.
- Les associations et les cardinalités (suite 1)
    - Perfectionnons le cahier des charges.
    - L'entité client.
    - L'association commander.
    - Obtenir le diagramme du MCD.
    - Est-ce correct ?
- Les associations et les cardinalités (suite 2)
    - L'entité commande.
    - L'association contenir.
    - Le diagramme final.
    - Les différentes cardinalités possibles.
- Du MCD au MLD
    - Règles de traduction du MCD en MLD.
- Le Modèle Physique
    - Récapitulatif.
    - Nécessité du MPD.
- Les types de données
    - Les types numériques.
    - Les chaînes de caractères.
    - Les dates.
    - Quelques autres types.
    - La valeur NULL.
- Jeu de caractères et interclassement
    - Le codage des caractères.
    - Les jeux de caractères.
    - L'interclassement.
- Modéliser avec Workbench
    - Créer le projet acme.
    - Créer la table client.
- Modéliser avec Workbench (suite)
    Ajouter les relations.
- Normalisation
    - Clé primaire.
    - Atomicité.
    - Stabilité dans le temps.
    - Dépendances fonctionnelles.
- Dénormalisation
    - Dénormaliser le projet acme.

## Le langage SQL et fondamenataux des requetes SQL
- Présentation
    - Historique SQL
    - Trois familles de requetes
    - Documentation SQL
- Créer une nouvelle base et son jeu de données
    - Créer une nouvelle base entreprise.
    - Créer un jeu de test.
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
- Jointures

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

