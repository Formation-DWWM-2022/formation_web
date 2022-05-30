![image](https://cartman34.fr/wp-content/uploads/2017/01/sql_joins.jpg)
![image](https://storage.googleapis.com/gweb-cloudblog-publish/images/joins_1.max-1600x1600.png)
![image](https://dataschool.com/assets/images/how-to-teach-people-sql/sqlJoins/sqlJoins_7.png)

| user_id | user_prenom | user_nom | user_email                   | user_ville | pays_id |
| ------- | ----------- | -------- | ---------------------------- | ---------- | ------- |
| 1       | Jérémie     | Marechal | jeremie.marechal@example.com | Paris      | 1       |
| 2       | Damien      | Lefort   | damien.lefort@example.com    | Montréal   | 2       |
| 3       | Sophie      | Prevost  | sophie.prevost@example.com   | Marseille  | NULL    |
| 4       | Yann        | Rolland  | yann.rolland@example.com     | Lille      | 9999    |
| 5       | Léa         | Esmée    | lea.esmee@example.com        | Paris      | 1       |

| pays_id | pays_nom |
| ------- | -------- |
| 1       | France   |
| 2       | Canada   |
| 3       | Belgique |
| 4       | Suisse   |

| utilisateur_id | date_achat | num_facture | prix_total |
| -------------- | ---------- | ----------- | ---------- |
| 1              | 2013-01-23 | A00103      | 203.14     |
| 1              | 2013-02-14 | A00104      | 124.00     |
| 2              | 2013-02-17 | A00105      | 149.45     |
| 2              | 2013-02-21 | A00106      | 235.35     |
| 6              | 2013-03-02 | A00107      | 47.58      |

# Jointure naturelle
L'idée d'une jointure est donc de récupérer les informations d'une table B pour les "coller" à une table A, en liant les 2 tables selon un attribut ayant les memes valeurs (n'ayant pas forcément pas le meme nom - et éventuellement sur plusieurs attribus)

La jointure naturelle se fait sur des attributs ayant exactement les memes noms 

```
SELECT FROM tableA NATURAL JOIN tableB;
```

```
SELECT * FROM utilisateur NATURAL JOIN pays;
```

| pays_id | user_id | user_prenom | user_ville | pays_nom                     |
| ------- | ------- | ----------- | ---------- | ---------------------------- |
| 1       | 1       | Jérémie     | Marechal   | jeremie.marechal@example.com | Paris     | France |
| 2       | 2       | Damien      | Lefort     | damien.lefort@example.com    | Montréal  | Canada |
| NULL    | 3       | Sophie      | Prevost    | sophie.prevost@example.com   | Marseille | NULL   |
| 9999    | 4       | Yann        | Rolland    | yann.rolland@example.com     | Lille     | NULL   |
| 1       | 5       | Léa         | Esmée      | lea.esmee@example.com        | Paris     | France |

# Jointure interne
La jointure interne se fait sur des attributs ayant exactement des noms différents
Il faut noter que pour cette jointure (ainsi que la jointure naturelle), le résultat
contient les lignes présentes dans les 2 tables

```
SELECT ... FROM tableA INNER JOIN tableBON condition;
```

```
SELECT * FROM utilisateur INNER JOIN commande ON utilisateur.id = commande.utilisateur_id;
```

| id  | prenom  | nom      | email                        | ville    | pays_id | date_achat | num_facture | prix_total |
| --- | ------- | -------- | ---------------------------- | -------- | ------- | ---------- | ----------- | ---------- |
| 1   | Jérémie | Marechal | jeremie.marechal@example.com | Paris    | 1       | 2013-01-23 | A00103      | 203.14     |
| 1   | Jérémie | Marechal | jeremie.marechal@example.com | Paris    | 1       | 2013-02-14 | A00104      | 124.00     |
| 2   | Damien  | Lefort   | damien.lefort@example.com    | Montréal | 2       | 2013-02-17 | A00105      | 149.45     |
| 2   | Damien  | Lefort   | damien.lefort@example.com    | Montréal | 2       | 2013-02-21 | A00106      | 235.35     |

# Jointure externe
La jointure externe permet de garder les lignes de la table A (pour jointure gauche),
ou de la table B (pour jointure droite) ou les deux (pour jointure complète), non
présentes dans l’autre table

```
SELECT ... FROM tableA {LEFT | RIGHT | FULL } [OUTER] JOIN tableB ON condition;
```
```
SELECT * FROM utilisateur LEFT OUTER JOIN commande ON tilisateur.id = commande.utilisateur_id;
```

| user_id | user_prenom | user_nom | user_email                   | user_ville | pays_id | date_achat | num_facture | prix_total |
| ------- | ----------- | -------- | ---------------------------- | ---------- | ------- | ---------- | ----------- | ---------- |
| 1       | Jérémie     | Marechal | jeremie.marechal@example.com | Paris      | 1       | 2013-01-23 | A00103      | 203.14     |
| 1       | Jérémie     | Marechal | jeremie.marechal@example.com | Paris      | 1       | 2013-02-14 | A00104      | 124.00     |
| 2       | Damien      | Lefort   | damien.lefort@example.com    | Montréal   | 2       | 2013-02-17 | A00105      | 149.45     |
| 2       | Damien      | Lefort   | damien.lefort@example.com    | Montréal   | 2       | 2013-02-21 | A00106      | 235.35     |
| 3       | Sophie      | Prevost  | sophie.prevost@example.com   | Marseille  | NULL    | NULL       | NULL        | NULL       |
| 4       | Yann        | Rolland  | yann.rolland@example.com     | Lille      | 9999    | NULL       | NULL        | NULL       | 
| 5       | Léa         | Esmée    | lea.esmee@example.com        | Paris      | 1       | NULL       | NULL        | NULL       |

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