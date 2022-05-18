# Fonctions de dates et d’heures
Il est important en SQL de pouvoir connaître la date et l’heure. Il existe une multitude de fonction qui concerne les éléments temporels pour pouvoir lire ou écrire plus facilement des données à une date précise ou à un intervalle de date.

https://sql.sh/fonctions/date-heure

# Fonctions mathématiques
Dans le langage SQL il existe une multitude de fonctions pour retourner les résultats de la façon souhaités. Il existe également de nombreuses fonctions mathématiques pour effectuer des calculs ou des statistiques concernant les données contenus dans une base de données.

https://sql.sh/fonctions/mathematiques

# Fonctions de chaîne caractère
Les fonctions de chaîne effectuent des opérations sur les valeurs de chaîne et renvoient des valeurs numériques ou de chaîne.

À l'aide des fonctions de chaîne, vous pouvez, par exemple, combiner des données, extraire une sous-chaîne, comparer des chaînes ou convertir une chaîne en caractères majuscules ou minuscules.

https://sql.sh/fonctions/chaines-de-caracteres

# Sous-requêtes
Une sous-requête, également appelée requête imbriquée ou sous-sélection, est une requête SELECT intégrée à la clause WHERE ou HAVING d'une autre requête SQL. Les données renvoyées par la sous-requête sont utilisées par l'instruction externe de la même manière qu'une valeur littérale serait utilisée.

Les sous-requêtes constituent un moyen simple et efficace de gérer les requêtes qui dépendent des résultats d'une autre requête. Elles sont presque identiques aux instructions SELECT normales, mais il existe peu de restrictions. Les plus importantes sont énumérées ci-dessous:

- Une sous-requête doit toujours apparaître entre parenthèses.
- Une sous-requête doit renvoyer une seule colonne. Cela signifie que vous ne pouvez pas utiliser SELECT * dans une sous-requête à moins que la table à laquelle vous faites référence ne comporte qu'une seule colonne. Vous pouvez utiliser une sous-requête qui renvoie plusieurs colonnes si le but est la comparaison de lignes.
- Vous ne pouvez utiliser que des sous-requêtes renvoyant plusieurs lignes avec des opérateurs de valeurs multiples, tels que l'opérateur IN ou NOT IN.
- Une clause ORDER BY ne peut pas être utilisée dans une sous-requête, bien que la requête principale puisse utiliser un ORDER BY. La clause GROUP BY peut être utilisée pour exécuter la même fonction que ORDER BY dans une sous-requête.
- Une sous-requête ne peut pas être une UNION. Une seule instruction SELECT est autorisée.

Les sous-requêtes sont le plus souvent utilisées avec l'instruction SELECT. Toutefois, vous pouvez également les utiliser dans une instruction INSERT, UPDATE ou DELETE ou dans une autre sous-requête.
Pendant ce cours, nous allons travailler sur ces 4 tables

Table - Departement
| Id_dep | Nom_dep      |
|--------|--------------|
|      1 | Informatique |
|      2 | RH           |
|      3 | Vente        |
|      4 | Strategies   |

Table - Employes
| Id | Nom     | Age | Salaire | Profession | Dep  |
|----|---------|-----|---------|------------|------|
|  1 | Ismail  |  25 | 6000.00 | Assistant  |    2 |
|  2 | Mohamed |  30 | 8000.40 | Directeur  |    1 |
|  3 | Fatima  |  29 | 6000.00 | Directeur  |    3 |
|  4 | Dounia  |  30 | 7000.00 | Assistant  |    4 |
|  5 | Omar    |  30 | 9000.00 | Ingenieur  |    1 |
|  6 | Mostafa |  29 | 7500.00 | Ingenieur  |    3 |

Table - Projet
| Id_p | Titre      | Cout      | Date_realisation |
|------|------------|-----------|------------------|
|    1 | SIG Meknes | 200000.00 | 2019-01-25       |
|    2 | SI Vente   | 130000.00 | 2019-03-12       |
|    3 | Blog RH    |  30000.00 | 2018-05-03       |

Table - Participer
| Emp | Proj |
|-----|------|
|   1 |    1 |
|   2 |    1 |
|   2 |    3 |
|   3 |    1 |
|   6 |    2 |
|   6 |    3 |


# Sous-requêtes avec l'instruction SELECT

Les sous-requêtes sont le plus souvent utilisées avec l'instruction SELECT. La syntaxe de base est la suivante :
Syntaxe :
?
```	
SELECT nom_colonne [, nom_colonne ]
FROM   table1 [, table2 ]
WHERE  nom_colonne OPERATOR
    (SELECT nom_colonne [, nom_colonne ]
    FROM table1 [, table2 ]
    [WHERE])
```	
Il existe principalement deux types de sous-requêtes :
- Sous-requêtes indépendantes
- Sous-requêtes corrélées

## Sous-requêtes indépendantes

Dans les sous-requêtes indépendantes, l'exécution de la requête commence de la requête la plus interne vers la plus externe. L'exécution d'une requête interne est indépendante de la requête externe, mais le résultat de la requête interne est utilisé dans l'exécution de la requête externe. Divers opérateurs tels que IN, NOT IN, ANY, ALL, etc. sont utilisés pour l'écriture de sous-requêtes indépendantes.

Exemple :

Si nous voulons connaître les Ids des employés qui participent aux projets «Vente SI» ou «Blog RH», nous pouvons l’écrire à l’aide d’une sous-requête indépendante et d’un opérateur IN. A partir de la table Projet, nous pouvons trouver Id_p pour les projet «SI Vente» ou «Blog RH» et nous pouvons utiliser ces Id_p pour trouver Ids des employés à partir de la table Particper.

Nous pouvons le faire en deux étapes :

Etape 1 - Trouver Id_p pour les projet «SI Vente» ou «Blog RH»
?

```		
SELECT Id_p FROM Projet WHERE Titre="Blog RH" OR Titre="Vente SI"
```	

Etape 2 - utiliser les Id_p pour de la première etape pour trouver les Ids des employés à partir de la table Particper
?
```		
SELECT DISTINCT Emp FROM Participer 
WHERE Proj IN (SELECT Id_p FROM Projet WHERE Titre="Blog RH" OR Titre="Vente SI");
```	

Cette requête produira le jeu de résultats suivant :


| Emp |
|-----|
|   2 |
|   6 |


Exemple :

Si nous voulons les noms de départements dans lesquels un employé a participé à un projet
Etape 1 - Trouver Dep des employés ayant participés dans un projet
?

```		
SELECT DISTINCT E.Dep FROM Employes AS E INNER JOIN Participer AS P ON E.Id=P.Emp;
```	

| Dep  |
|------|
|    2 |
|    1 |
|    3 |


Etape 2 - Utiliser ces Ids pour trouver les noms des départements de la table Departement
?

```	
SELECT Nom_dep FROM Departement 
WHERE ID_dep IN (SELECT DISTINCT E.Dep FROM Employes AS E INNER JOIN Participer AS P ON E.Id=P.Emp);
```	

Cette requête produira le jeu de résultats suivant :


| Nom_dep      |
|--------------|
| Informatique |
| RH           |
| Vente        |


Exemple :

Pour trouver des employés qui ne participent à aucun projet
?

```	
SELECT Nom FROM Employes 
WHERE Id NOT IN (SELECT DISTINCT Emp FROM Participer);
```	

Cette requête produira le jeu de résultats suivant :

| Nom    |
|--------|
| Dounia |
| Omar   |


## Sous-requêtes corrélées

Une sous-requête corrélée est une sous-requête dont le résultat est différent selon les valeurs de la ligne de la requête externe pour laquelle la sous-requête est exécutée. Cela rend nécessaire d'exécuter la sous-requête pour chaque ligne extraite par la requête externe et ajoute au coût de performance de la requête.
Exemple :

Trouver l'employé avec le plus grand salaire dans son département
?

```	
SELECT Nom FROM Employes AS e1 
WHERE e1.Salaire=(SELECT MAX(e2.Salaire) FROM Employes AS e2 WHERE e1.Dep=e2.Dep);
```	

Cette requête produira le jeu de résultats suivant :

| Nom     |
|---------|
| Ismail  |
| Dounia  |
| Omar    |
| Mostafa |

Dans la requête ci-dessus, la sous-requête doit être exécutée pour chaque ligne de la table Employes, car chaque employé peut appartenir à un service différent. Par conséquent, comparer son salaire au salaire maximum de son service signifie qu'il peut potentiellement être comparé à un nombre différent.

La requête doit exécuter la sous-requête pour chaque valeur distincte de Dep. Elle peut également trouver un moyen de mettre en cache les résultats de ces sous-requêtes et de les utiliser pour comparer les lignes d'employés suivantes avec le même Dep. Certaines implémentations SQL peuvent effectuer cette optimisation, d'autres non.

Si la sous-requête n'est pas corrélée, elle renverra logiquement le même résultat, quelles que soient les valeurs de la ligne de la requête externe. L'optimiseur SQL peut être conçu pour factoriser complètement la sous-requête, de sorte qu'elle n'ait à exécuter qu'une seule fois, quel que soit le nombre de lignes de la requête externe qui utilisent le résultat. C'est souvent une grande amélioration pour la performance.
Sous-requêtes vs jointures

Comparées aux jointures, les sous-requêtes sont simples à utiliser et à lire. Ils ne sont pas aussi compliqués que les jointures. Par conséquent, les débutants en SQL l'utilisent fréquemment.

Mais les sous-requêtes posent des problèmes de performances. L'utilisation d'une jointure au lieu d'une sous-requête peut parfois vous donner un gain de performances jusqu'à 500 fois. Si vous avez le choix, il est recommandé d'utiliser une jointure plutôt qu'une sous-requête.

Les sous-requêtes ne doivent être utilisées comme solution de secours que lorsque vous ne pouvez pas utiliser une opération JOIN pour atteindre les objectifs ci-dessus.
Sous-requêtes avec l'instruction INSERT

La sous-requête SQL peut également être utilisée avec l'instruction INSERT. Dans l'instruction INSERT, les données renvoyées par la sous-requête sont utilisées pour être insérées dans une autre table.

Dans la sous-requête, les données sélectionnées peuvent être modifiées avec n’importe laquelle des fonctions de caractère et de date.
Syntaxe :
?

```		
INSERT INTO nom_table [ (col1 [, col2 ]) ]
    SELECT [ *|col1 [, col2 ]
    FROM table1 [, table2 ]
    [ WHERE VALUE OPERATOR ]
```	

Exemple :

Considérons une table Employes_SAUVEGARDE avec une structure similaire à la table Employes. Maintenant, pour copier la table Employes dans la table Employes_SAUVEGARDE, vous pouvez utiliser la syntaxe suivante.
?

```		
INSERT INTO Employes_SAUVEGARDE
    SELECT * FROM Employes
Sous-requêtes avec l'instruction UPDATE
```	

La sous-requête peut être utilisée conjointement avec l'instruction UPDATE.
Lorsqu'une sous-requête est utilisée avec l'instruction UPDATE, une ou plusieurs colonnes d'une table peuvent être mises à jour.
Syntaxe :
?

```		
UPDATE table
    SET nom_colonne = nouvelle_valeur
    [ WHERE OPERATOR [ VALUE ]
       (SELECT COLUMN_NAME
       FROM TABLE_NAME)
       [ WHERE) ]
```	

Exemple :
En supposant que nous ayons une table Employes_SAUVEGARDE disponible qui est une sauvegarde de la table Employes. L'exemple suivant met à jour le salaire de 0,25 fois dans la table Employes pour tous les employés dont l'âge est supérieur ou égal à 30.
?

```		
UPDATE Employes  
    SET Salaire = Salaire * 0.25  
    WHERE Age IN (SELECT Age FROM Employes_SAUVEGARDE  
       WHERE Age >= 30); 
```	

Cette requête produira le jeu de résultats suivant :

Table - Employes

| Id | Nom     | Age | Salaire | Profession | Dep  |
|----|---------|-----|---------|------------|------|
|  1 | Ismail  |  25 | 6000.00 | Assistant  |    2 |
|  2 | Mohamed |  30 | 2000.10 | Directeur  |    1 |
|  3 | Fatima  |  29 | 6000.00 | Directeur  |    3 |
|  4 | Dounia  |  30 | 1750.00 | Assistant  |    4 |
|  5 | Omar    |  30 | 2250.00 | Ingenieur  |    1 |
|  6 | Mostafa |  29 | 7500.00 | Ingenieur  |    3 |

Sous-requêtes avec l'instruction DELETE

La sous-requête peut être utilisée en conjonction avec l'instruction DELETE, exactement comme toutes les instructions mentionnées ci-dessus.

Exemple :

Supposons que nous ayons une table Employes_SAUVEGARDE disponible qui est une sauvegarde de la table Employes. L'exemple donné supprime les enregistrements de la table Employes pour tous les employés dont l'âge est inférieur ou égal à 29.
?

```		
DELETE FROM Employes  
    WHERE Age IN (SELECT Age FROM Employes_SAUVEGARDE  
       WHERE Age <= 29 );
```	

Cette requête produira le jeu de résultats suivant :

Table - Employes
| Id | Nom     | Age | Salaire | Profession | Dep  |
|----|---------|-----|---------|------------|------|
|  2 | Mohamed |  30 | 2000.10 | Directeur  |    1 |
|  4 | Dounia  |  30 | 1750.00 | Assistant  |    4 |
|  5 | Omar    |  30 | 2250.00 | Ingenieur  |    1 |
