## Création d'une table ##
La syntaxe pour créer une table est  :

```
CREATE TABLE nom_table (colonne1 type1 [contrainte], colonne2 type2 [contrainte], ...);
```

Quelques types classiques :
* Caractères: VARCHAR2(n), CHAR(n)
* Numérique: NUMBER, INTEGER (ou INT)
* Temporel: DATE, TIMESTAMP
* 
Où les contraîntes possibles peuvent être :

* `NOT NULL` : un attribut doit toujours avoir une valeur (ie. sa valeur ne peut être `NULL`; cela n'empèche pas d'être égal à 0 ou à une chaîne de caractères vide `""`)
* `PRIMARY KEY` pour indiquer qu'une colonne fait office de clé primaire 
* `REFERENCES` pour indiquer la colonne de référencéepar une clé étrangère 
* `UNIQUE` : deux lignes ne peuvent contenir la même valeur (cette contrainte ne s'applique pas aux valeurs `NULL`)
* `CHECK` : pour indiquer une règle à vérifier (par exemple : supérieur à, inférieur à...)

Considérons le modèle suivant décrivant une base composée de deux tables : `Region` et `Departement` (une région est composée de plusieurs départements)

![Modèle des tables Region et Departement](https://github.com/ClementDelgrange/Cours_bases_de_donnees/raw/master/img/sql/Region_Departement.png)

La requête pour créer la table `Région` sera :
```
CREATE TABLE Region (id integer PRIMARY KEY, 
					 nom varchar(50) NOT NULL, 
					 pays varchar(50));
```

La requête pour créer la table `Departement` sera :
```
CREATE TABLE Departement (id integer PRIMARY KEY, 
						  nom varchar(50) NOT NULL, 
						  surface float CHECK(surface > 0), 
						  id_region integer REFERENCE Region(id));
```

Pour ce qui est des clé primaires et étrangères, elles peuvent être indiquées sous forme de contrainte comme montré précédement, ou à la fin de la déclaration :
```
CREATE TABLE Departement (id integer, 
						  nom character(50) NOT NULL, 
						  surface float CHECK(surface > 0), 
						  id_region integer,
						  PRIMARY KEY (id),
						  CONSTRAINT dep_fk FOREIGN KEY (id_region) REFERENCE Region(id)));
```

Cette possibilité est notament utile lorsque la clé implique plusieurs colonnes (exemple : création d'une clé primaire sur le nom et le prénom des employés d'une entreprise) :
```
CREATE TABLE Employe (nom character(50),
					  prenom character(50),
					  salaire float,
					  PRIMARY KEY (nom, prenom));
```


## Modification du schéma ##
Bien souvent, nous avons besoin de modifier le schéma d'une table après l'avoir créée. En SQL, une requête de modification de la structure d'une table utilisera l'instruction clé `ALTER TABLE`. La syntaxe générale, pour toutes les modifications sera :
```
ALTER TABLE nom_table ACTION description
```

La suite de cette partie donne la syntaxe des différentes modifications possibles.

### Suppression/ajout d'une colonne
```
--suppression--
ALTER TABLE nom_table DROP COLUMN colonne;

--ajout--
ALTER TABLE nom_table ADD COLUMN colonne type {contrainte};
```

Par exemple, nous supprimons la colonne `id` de la table `Departement` précédement créée et la redéfinissons en utilisant une colonne de type `serial` (entier auto-incrémenté; type spécifique à PostgreSQL) :
```
ALTER TABLE Departement DROP COLUMN id;
ALTER TABLE Departement ADD COLUMN id serial PRIMARY KEY;
ALTER TABLE Departement ADD (sexe CHAR(1) CHECK(sexe IN c('H','F')));
```


### Ajout d'une contrainte
```
ALTER TABLE nom_table ADD CONSTRAINT nom_contrainte contrainte;
```

Par exemple, nous précisons que le nom d'un département doit être unique :
```
ALTER TABLE Departement ADD CONSTRAINT unique_nom UNIQUE (nom);
ALTER TABLE Etudiant ADD CONSTRAINT ck_Etudiant_Age_inf100 CHECK (age < 100);
```

### Suppression d'une contrainte
```
ALTER TABLE nom_table DROP CONSTRAINT nom_contrainte;
```

Par exemple:
```
ALTER TABLE Departement DROP CONSTRAINT unique_nom;
ALTER TABLE Etudiant DROP CONSTRAINT ck_Etudiant_Age_inf100;
```

### Suppression d'une table
Il faut faire attention lors de la suppression d'une table, s'il y a des références sur celle-ci. Cela produira par défaut une erreur.

Il existe des mécanismes pour contourner cela, mais l'idéal est de supprimer d'abord les tables qui pointent sur celle-ci ou les références à celle-ci.
```
DROP TABLE nom_table;
```

Par exemple, pour supprimer la table `Employe` :
```
DROP TABLE Employe;
```

## Mises à jour des données ##
Nous avons vu dans la partie précédente comment traduire en SQL un modèle relationnel. Nous pouvons maintenant étudier la manière d'insérer, modifier ou encore supprimer des éléments dans une table.

### Insertion ###
```
INSERT INTO nom_table (colonne1, colonne1, ...) VALUES (valeur1, valeur2, ...);
```

Nous indiquons les noms des colonnes pour lesquelles nous connaissons les valeurs à insérer. La valeur des autres colonnes restera à `NULL`. 

Dans l'exemple ci-dessous, nous ajoutons l'Occitanie dans la table `Region`, puis l'Arriège dans la table `Departement`. 
```
INSERT INTO Region (id, nom) 
VALUES (1, 'Occitanie');

INSERT INTO Departement (id_region, surface, nom) 
VALUES (1, 4890, 'Arriège');
```

Notons que nous n'indiquons pas le pays de l'Occitanie ni l'identifiant de l'Arriège. La pays restera vide, mais l'identifant sera rempli automatiquement car nous avons utilisé le type `serial` pour cette colonne. Vous remarquerez également que l'ordre des colonnes n'a pas d'importance : il faut uniquement s'assurer que les colonnes et les valeurs à insérer sont passées dans le même ordre.

### Modifications ###
```
UPDATE nom_table SET colonne = valeur WHERE condition;
```

Par exemple, nous indiquons que le pays de l'Occitanie (région dont l'id vaut 1) est la France :
```
UPDATE Region SET pays = 'France' WHERE id=1;
```

### Suppression ###
```
DELETE FROM nom_table WHERE condition;
```

Nous ajoutons une région NoWhereLand que nous supprimons ensuite :
```
-- insertion
INSERT INTO Region (id, nom, pays) 
VALUES (2, 'NoWhereLand', 'NoWhereCountry`);

-- suppression
DELETE FROM Region WHERE id=2;
```

