# Jointure naturelle
L'idée d'une jointure est donc de récupérer les informations d'une table B pour les "coller" à une table A, en liant les 2 tables selon un attribut ayant les memes valeurs (n'ayant pas forcément pas le meme nom - et éventuellement sur plusieurs attribus)

La jointure naturelle se fait sur des attributs ayant exactement les memes noms 

```
SELECT FROM tableA NATURAL JOIN tableB;
```

```
SELECT * FROM Etudiant NATURAL JOIN Department;
```

# Jointure interne
La jointure interne se fait sur des attributs ayant exactement des noms différents
Il faut noter que pour cette jointure (ainsi que la jointure naturelle), le résultat
contient les lignes présentes dans les 2 tables

```
SELECT ... FROM tableA INNER JOIN tableBON condition;
```
```
SELECT * FROM Etudiant INNER JOIN Departement ON Etudiant.NumDep = Departement.NumDep;
```

# Jointure externe
La jointure externe permet de garder les lignes de la table A (pour jointure gauche),
ou de la table B (pour jointure droite) ou les deux (pour jointure complète), non
présentes dans l’autre table

```
SELECT ... FROM tableA {LEFT | RIGHT | FULL } [OUTER] JOIN tableB ON condition;
```
```
SELECT * FROM Etudiant LEFT OUTER JOIN Departement ON Etudiant.NumDep = Departement.NumDep;
```

# Jointure “à la main”
On peut aussi faire les jointures internes “à la main”, i.e. faire les restrictions dans le
WHERE et lister toutes les tables dans le FROM
L’une ou l’autre des jointures donnent le même résultat, le choix dépendant des
habitudes de l’entreprise ou du développeur souvent
```
SELECT ... FROM tableA , tableB WHERE condition;
```
```
SELECT * FROM Etudiant, Departement WHERE Etudiant.NumDep = Departement.NumDep;
```

# Opération ensembliste
Ceci correspond à l’union, l’intersection et la différence
```
requêteA
UNION [ALL] | INTERSECT | EXCEPT requêteB;
```
```
SELECT * FROM Etudiant WHERE Age > 18 INTERSECT SELECT * FROM Etudiant WHERE Sexe = “H”;
```
Les 2 requêtes doivent retourner
strictement les mêmes colonnes

# Division
On cherche ici dans une requête des lignes pour lesquelles ils existent (ou non) un
résultat obtenue dans une sous-requête
```
SELECT ... FROM TableA WHERE [NOT] EXISTS (sous-requête incluant TableA);
```
```
SELECT * FROM Departement WHERE EXISTS (SELECT * FROM Etudiant WHERE NumDep = Departement.NumDep);
```