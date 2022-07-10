# Requêtes MySQL de base

- [Requêtes MySQL de base](#requ%C3%AAtes-mysql-de-base)
  - [Base de données et table](#base-de-donn%C3%A9es-et-table)
    - [Créer une base de données](#cr%C3%A9er-une-base-de-donn%C3%A9es)
    - [Créer une table](#cr%C3%A9er-une-table)
    - [Modifier une table](#modifier-une-table)
  - [SELECT](#select)
    - [Séléctionner tous les champs](#s%C3%A9l%C3%A9ctionner-tous-les-champs)
    - [Séléctionner certains champs](#s%C3%A9l%C3%A9ctionner-certains-champs)
    - [Séléctionner certains champs et les renommer (aliases)](#s%C3%A9l%C3%A9ctionner-certains-champs-et-les-renommer-aliases)
  - [WHERE](#where)
    - [Where simple](#where-simple)
    - [OR/AND](#orand)
    - [Like, modulos, underscores](#like-modulos-underscores)
    - [BETWEEN](#between)
  - [DISTINCT](#distinct)
    - [Séléctionner les valeurs distinctes de champ1](#s%C3%A9l%C3%A9ctionner-les-valeurs-distinctes-de-champ1)
    - [Séléctionner les valeurs distinctes sur plusieurs champs](#s%C3%A9l%C3%A9ctionner-les-valeurs-distinctes-sur-plusieurs-champs)
  - [Fonctions d'agrégation](#fonctions-dagr%C3%A9gation)
    - [Nombre d'entrées dans la table](#nombre-dentr%C3%A9es-dans-la-table)
    - [Valeur minimale dans l'ensemble](#valeur-minimale-dans-lensemble)
    - [Valeur maximale dans l'ensemble](#valeur-maximale-dans-lensemble)
    - [Valeur moyenne de l'ensemble](#valeur-moyenne-de-lensemble)
    - [Somme de l'ensemble](#somme-de-lensemble)
  - [GROUP BY](#group-by)
    - [Grouper des résultats par un champ](#grouper-des-r%C3%A9sultats-par-un-champ)
  - [ORDER BY](#order-by)
    - [Du plus petit au plus grand](#du-plus-petit-au-plus-grand)
    - [Du plus grand au plus petit](#du-plus-grand-au-plus-petit)
    - [Classement par plusieurs champs](#classement-par-plusieurs-champs)
  - [INSERT](#insert)
    - [Insérer des données](#ins%C3%A9rer-des-donn%C3%A9es)
    - [Insertion multiple](#insertion-multiple)
  - [UPDATE](#update)
  - [DELETE](#delete)
    - [Supprimer des données](#supprimer-des-donn%C3%A9es)

## Base de données et table

### Créer une base de données

```sql
CREATE DATABASE IF NOT EXISTS nom_base;
USE nom_base;
```

### Créer une table

> Types de champs <https://www.w3schools.com/sql/sql_datatypes.asp>

```sql
CREATE TABLE IF NOT EXISTS Animal (
    id          SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    espece      VARCHAR(40) NOT NULL,
    sexe        CHAR(1),
    birthdate   DATETIME NOT NULL,
    nom         VARCHAR(30),
    commentaires TEXT,
    PRIMARY KEY (id)
)
ENGINE=INNODB;
```

### Lister les tables

```sql
SHOW TABLES;
```

### Afficher les informations d'une table

```sql
DESCRIBE tableName;
```

### Modifier une table

```sql
ALTER TABLE Test
CHANGE prenom nom VARCHAR(30) NOT NULL; -- Changement du type + changement du nom

ALTER TABLE Test
CHANGE id id BIGINT NOT NULL; -- Changement du type sans renommer

ALTER TABLE Test
MODIFY id BIGINT NOT NULL AUTO_INCREMENT; -- Ajout de l'auto-incrémentation

ALTER TABLE Test
MODIFY nom VARCHAR(30) NOT NULL DEFAULT 'Blabla'; -- Changement de la description (même type mais ajout d'une valeur par défaut)
```

## SELECT

### Séléctionner tous les champs

```sql
SELECT  *
FROM    tableName
```

### Séléctionner certains champs

```sql
SELECT  champ1, champ2
FROM    tableName
```

### Séléctionner certains champs et les renommer (aliases)

```sql
SELECT  champ1, champ2, champ3 as "Nom du champ renommé"
FROM    tableName
```

## WHERE

### Where simple

```sql
SELECT  *
FROM    tableName
WHERE   champ3 > 10
```

### OR/AND

```sql
SELECT  *
FROM    tableName
WHERE   champ3 > 10
AND     champ2 = 'value'
OR      champ1 LIKE 'value'
```

### Like, modulos, underscores

```sql
SELECT  *
FROM    tableName
WHERE   champ1 = 'value'        # Exactement 'value'
OR      champ2 LIKE 'value'     # Exactement 'value'
OR      champ3 LIKE '%value'    # Finit par '...value'
OR      champ4 LIKE 'value%'    # Commence par 'value...'
OR      champ5 LIKE 'va%ue'     # Commence par 'va...' et finit par '..ue'
OR      champ6 LIKE '_alue'     # 1 caractère avant '..alue'
OR      champ7 LIKE 'va_ue'     # 1 caractère entre 'va' et 'ue'
```

### BETWEEN

```sql
SELECT  *
FROM    tableName
WHERE   champ1 BETWEEN 10 AND 20
```

### NULL

```sql
SELECT  *
FROM    tableName
WHERE   champ1 IS NULL
```

### NULL

```sql
SELECT  *
FROM    tableName
WHERE   champ1 IS NOT NULL
```

## DISTINCT

### Séléctionner les valeurs distinctes de champ1

> Par exemple, dans une table d'adresses, tous les codes postaux distincts sans doublon

```sql
SELECT  DISTINCT champ1
FROM    tableName
```

### Séléctionner les valeurs distinctes sur plusieurs champs

> Par exemple dans une table de jeux vidéos, tous les ensemble "catégorie de jeux + classification", exemple :
>
> - "Action - PEGI 12"
> - "Action - PEGI 18"
> - "Stratégie - PEGI 3"
> - "Stratégie - PEGI 12"
>
```sql
SELECT  DISTINCT champ1, champ2
FROM    tableName
```

## Fonctions d'agrégation

> Ces fonctions retournent une valeur unique et non une liste d'entrées.

### Nombre d'entrées dans la table

``` sql
SELECT  count(*)
FROM    tableName
```

### Valeur minimale dans l'ensemble

``` sql
SELECT  count(champ1)
FROM    tableName
```

### Valeur maximale dans l'ensemble

``` sql
SELECT  count(champ1)
FROM    tableName
```

### Valeur moyenne de l'ensemble

``` sql
SELECT  avg(champ1)
FROM    tableName
```

### Somme de l'ensemble

``` sql
SELECT  sum(champ1)
FROM    tableName
```

## GROUP BY

### Grouper des résultats par un champ

> Par exemple, combien d'entrées pour chaque code postal

``` sql
SELECT  champ1, count(*) as 'Nombre de résultats'
FROM    tableName
GROUP BY champ1
```

## ORDER BY

### Du plus petit au plus grand

``` sql
SELECT  *
FROM    tableName
ORDER BY champ1 ASC # Classement ascendant
```

### Du plus grand au plus petit

``` sql
SELECT  *
FROM    tableName
ORDER BY champ1 DESC # Classement descendant
```

### Classement par plusieurs champs

``` sql
SELECT  *
FROM    tableName
ORDER BY champ1 DESC champ2 ASC # classement par champ1 descendant puis au sein de même valeurs de champ1, classement par champ2 ascendant
```

## INSERT

### Insérer des données

```sql
INSERT INTO TableName (champ1, champ3, champ4)
VALUES (valueA, valueB, valueC);
```

### Insertion multiple

```sql
INSERT INTO TableName (champ1, champ3, champ4)
VALUES  (valueA, valueB, valueC),
        (valueA, valueB, valueC),
        (valueA, valueB, valueC);
```

## UPDATE

> **ATTENTION :** n'oubliez pas la clause WHERE lors d'un delete ou d'un update !

```sql
UPDATE  tableName
SET     champ1 = 'value', champ2 = 'value', champ8 = 'value'
WHERE   id = 12
```

## DELETE

### Supprimer des données

> **ATTENTION :** n'oubliez pas la clause WHERE lors d'un delete ou d'un update !

```sql
DELETE FROM tableName
WHERE id = 13
```
