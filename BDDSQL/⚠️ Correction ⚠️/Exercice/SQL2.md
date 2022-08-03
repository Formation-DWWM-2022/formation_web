# I / Premiere partie

Comme dans de nombreux domaines, pour progresser, il est nécessaire de s'entraîner. Vous trouverez ci-après une compilation d'exercices sur le SQL. Ces derniers balaient de nombreuses notions. La lecture de l'ensemble des chapitres du cours vous permettra de résoudre tous les exercices.

Il est possible de télécharger le fichier .sql avec les tables et les enregistrements.

I / Première partie

Ci-après la table à utiliser pour la première partie des exercices.

> lpecom_livres

| id_livre  | titre |  isbn_10 |  auteur |  prix
| ----------| ----------|----------|----------|----------|
| 1 |  Forteresse digitale |  2709626306 |  Dan Brown |  20.5
| 2 |  La jeune fille et la nuit |  2253237620 |  Guillaume Musso |  21.9
| 3 |  T'choupi se brosse les dents |  2092589547 |  Thierry Courtin |  5.7
| 4 |  La Dernière Chasse  | 2226439412 |  Jean-Christophe Grangé |  22.9
| 5 |  Le Signal |  2226319484 |  Maxime Chattam |  23.9

## Exercice 1

Quelle requête utiliser pour afficher l'ensemble des enregistrements de la table lpecom_livres ?

```sql
SELECT *
FROM lpecom_livres;
```

## Exercice 2

Quelle requête utiliser pour sélectionner uniquement les livres qui ont un prix strictement supérieur à 20 de la table lpecom_livres ?

```sql
SELECT *
FROM lpecom_livres
WHERE prix > 20;
```

## Exercice 3

Quelle requête utiliser pour trier les enregistrements de la table lpecom_livres du prix le plus élevé aux prix le plus bas ?

```sql
SELECT *
FROM lpecom_livres
ORDER BY prix DESC;
```

## Exercice 4

Quelle requête utiliser pour récupérer le prix du livre le plus élevé de la table lpecom_livres ?

```sql
SELECT MAX(prix)
FROM lpecom_livres;
```

## Exercice 5

Quelle requête utiliser pour récupérer les livres de la table lpecom_livres qui ont un prix compris entre 20 et 22 ?

```sql
SELECT *
FROM lpecom_livres
WHERE prix BETWEEN 20 AND 22;
```

## Exercice 6

Quelle requête utiliser pour récupérer tous les livres de la table lpecom_livres à l'exception de celui portant la valeur pour la colonne isbn_10 : 2092589547 ?

```sql
SELECT *
FROM lpecom_livres
WHERE isbn_10 != 2092589547;
```

## Exercice 7

Quelle requête utiliser pour récupérer le prix du livre le moins élevé de la table lpecom_livres en renommant la colonne dans les résultats par minus ?

```sql
SELECT MIN(prix) as minus
FROM lpecom_livres;
```

## Exercice 8

Quelle requête utiliser pour sélectionner uniquement les 3 premiers résultats sans le tout premier de la table lpecom_livres ?

```sql
SELECT *
FROM lpecom_livres
LIMIT 3 OFFSET 1;
```

# II / Deuxième partie

Ci-après les deux tables à utiliser pour la deuxième partie des exercices.

> lpecom_etudiants

| id_etudiant | prenom |nom
|----|----|---
| 30 | Joseph | Biblo
| 31 | Paul | Bismuth
| 32 | Jean | Michel
| 33 | Ted | Bundy
| 34 | Caroline | Martinez
| 35 | Joséphine | Henry

> lpecom_examens

| id | id_examen | id_etudiant | matiere | note
|---|---|---|---|---
| 788 | 45 | 30 | Histoire-Geographie | 10.5
| 789 | 87 | 33 | Mathématiques | 14
| 790 | 87 | 34 | Mathématiques | 4
| 791 | 45 | 31 | Histoire-Geographie | 15.5
| 792 | 45 | 32 | Histoire-Geographie | 8
| 793 | 87 | 31 | Mathématiques | 14
| 794 | 45 | 33 | Histoire-Geographie | 9.5
| 795 | 45 | 36 | Histoire-Geographie | 13
| 796 | 45 | 34 | Histoire-Geographie | 17
| 797 | 87 | 30 | Mathématiques | 7.5

## Exercice 1

Quelle requête utiliser pour afficher l'id des étudiants qui ont participés à au moins un examen ?

```sql
SELECT DISTINCT id_etudiant
FROM lpecom_examens;
```

## Exercice 2

Quelle requête utiliser pour compter le nombre d'étudiants qui ont participés à au moins un examen ?

```sql
SELECT COUNT(DISTINCT id_etudiant)
FROM lpecom_examens;
```

## Exercice 3

Quelle requête utiliser pour calculer la moyenne de l'examen portant l'id : 45 ?

```sql
SELECT AVG(note)
FROM lpecom_examens
WHERE id_examen = 45;
```

## Exercice 4

Quelle requête utiliser pour récupérer la meilleure note de l'examen portant l'id : 87 ?

```sql
SELECT MAX(note)
FROM lpecom_examens
WHERE id_examen = 87;
```

## Exercice 5

Quelle requête utiliser pour afficher l'id des étudiants qui ont eu plus de 11 à l'examen 45 ou plus de 12 à l'examen 87 ?

```sql
SELECT DISTINCT id_etudiant
FROM lpecom_examens
WHERE (id_examen = 45 AND note > 11)
OR (id_examen = 87 AND note > 12);
```

## Exercice 6

Quelle requête utiliser pour afficher tous les enregistrement de la table lpecom_examens avec en plus, si c'est possible, le prenom et le nom de l'étudiant ?

```sql
SELECT ex.*, et.prenom, et.nom
FROM lpecom_examens ex
LEFT JOIN lpecom_etudiants et ON ex.id_etudiant = et.id_etudiant;
```

## Exercice 7

Quelle requête utiliser pour afficher les enregistrement de la table lpecom_examens avec le prenom et le nom de l'étudiant, uniquement quand les étudiants sont présents dans la table lpecom_etudiants ?

```sql
SELECT ex.*, et.prenom, et.nom
FROM lpecom_examens ex
INNER JOIN lpecom_etudiants et ON ex.id_etudiant = et.id_etudiant;
```

## Exercice 8

Quelle requête utiliser pour afficher uniquement le nom et le prenom de l'étudiant avec l'id : 30 avec la moyenne de ses deux examens dans une colonne moyenne ?

```sql
SELECT et.prenom, et.nom, AVG(ex.note) as moyenne
FROM lpecom_examens ex
INNER JOIN lpecom_etudiants et ON ex.id_etudiant = et.id_etudiant
WHERE et.id_etudiant = 30;
```

## Exercice 9

Quelle requête utiliser pour afficher les 3 meilleures examens, du meilleur au moins bon, avec le prenom et le nom de l'étudiant associé ?

```sql
SELECT *
FROM lpecom_examens ex
INNER JOIN lpecom_etudiants et ON ex.id_etudiant = et.id_etudiant
ORDER BY ex.note DESC
LIMIT 3;
```

# III / Troisième partie

Ci-après les trois tables à utiliser pour la troisième partie des exercices. Pour cette nouvelle partie d'exercices, il est préférable de ne pas utiliser la console pour s'entrainer à comprendre les requêtes.

> lpecom_realisateurs

| id | nom | prenom | sexe | nation
| --- |--- | ---| --- |---
| 16 | Scott | Ridley | 0 | uk
| 22 | Aronofsky | Darren | 0 | us
| 47 | Jenkins | Patty | 1 | us
| 66 | Ritchie | Guy | 0 | uk

> lpecom_films

| id | nom | id_realisateur
| --- |--- | ---
| 121 | Requiem for a Dream | 22
| 546 | Gladiator | 16
| 666 | Fight Club | 61
| 775 | Blade Runner | 16
| 984 | Seul sur Mars | 16
| 986 | Black Swan | 22
| 987 | Wonder Woman | 47
| 988 | The Tomorrow Man | 85

> lpecom_films_notes

| id | id_film | note
| --- |--- | ---
| 1 | 546 | 4.5
| 2 | 546 | 2.5
| 3 | 775 | 5
| 4 | 984 | 3.5
| 5 | 987 | 3.1
| 6 | 666 | 4.2
| 7 | 986 | 3
| 8 | 986 | 4.3
| 9 | 121 | 1

## Exercice 1

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT id, prenom, nom
FROM lpecom_realisateurs
WHERE nation = "us"
AND sexe = 1;

| id | prenom | nom
| --- | --- | ---
| 47 | Patty | Jenkins

## Exercice 2

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT *
FROM lpecom_realisateurs
WHERE sexe = "0"
ORDER BY nom DESC
LIMIT 1;

| id | nom | prenom | sexe | nation
| --- | --- | --- | --- | ----
| 16 | Scott | Ridley | 0 | uk

## Exercice 3

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT f.id, f.nom AS film, r.prenom, r.nom
FROM lpecom_films f
INNER JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
ORDER BY f.id ASC;

| id | film | prenom | nom
| --- | --- | --- | ---
| 121 | Requiem for a Dream | Darren | Aronofsky
| 546 | Gladiator | Ridley | Scott
| 775 | Blade Runner | Ridley | Scott
| 984 | Seul sur Mars | Ridley | Scott
| 986 | Black Swan | Darren | Aronofsky
| 987 | Wonder Woman | Patty | Jenkins

## Exercice 4

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT f.id, f.nom AS film, r.prenom, r.nom
FROM lpecom_films f
LEFT JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
ORDER BY f.id ASC;

| id | film | prenom | nom
| --- | --- | --- | ---
| 121 | Requiem for a Dream | Darren | Aronofsky
| 666 | Fight Club | null | null
| 775 | Blade Runner | Ridley | Scott
| 984 | Seul sur Mars | Ridley | Scott
| 986 | Black Swan | Darren | Aronofsky
| 987 | Wonder Woman | Patty | Jenkins
| 988 | The Tomorrow Man | null | null

## Exercice 5

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT f.id, f.nom, fn.note
FROM lpecom_films f
LEFT JOIN lpecom_films_notes fn ON f.id = fn.id_film
ORDER BY f.id ASC;

| id | nom | note
| --- | ---- | ---
| 121 | Requiem for a Dream | 1
| 546 | Gladiator | 4.5
| 546 | Gladiator | 2.5
| 666 | Fight Club | 4.2
| 775 | Blade Runner | 5
| 984 | Seul sur Mars | 3.5
| 986 | Black Swan | 4.3
| 986 | Black Swan | 3
| 987 | Wonder Woman | 3.1
| 988 | The Tomorrow Man | null

## Exercice 6

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT f.nom, r.prenom AS realisateur_prenom, r.nom AS realisateur_nom, AVG(fn.note) AS moyenne_note
FROM lpecom_films f
INNER JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
INNER JOIN lpecom_films_notes fn ON f.id = fn.id_film
WHERE f.id = 546;

| nom | realisateur_prenom | realisateur_nom | moyenne_note
| --- | --- | --- | ----
| Gladiator | Ridley | Scott | 3.5

## Exercice 7

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT r.nation, AVG(fn.note) AS moyenne_note
FROM lpecom_films f
INNER JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
INNER JOIN lpecom_films_notes fn ON f.id = fn.id_film
WHERE r.nation = "us";

| nation | moyenne_note
| --- | ---
| us | 2.85

## Exercice 8

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT r.nation, MAX(fn.note) AS max_note
FROM lpecom_films f
INNER JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
INNER JOIN lpecom_films_notes fn ON f.id = fn.id_film
WHERE r.nation = "uk";

| nation | max_note
| --- | ---
| uk | 5

# IV / Quatrième partie

Ci-après les trois tables à utiliser pour la quatrième partie des exercices. Dans les tableaux, il y a seulement un extrait aléatoire des données, donc toutes les lignes des tables ne sont pas listées. Dernier point, dans la table lpecom_cities, il y a uniquement les villes de la région Île-de-France. Pour cette nouvelle partie d'exercices, vous pouvez bien évidemment utiliser la console afin de tester vos requêtes.

> lpecom_cities

| id |  department_code | insee_code | zip_code | name | gps_lat | gps_lng
| --- |--- | ---| --- |--- | ---| ---
| 30864 | 77 |  77236 | 77480 | Jaulnes | 48.41863547486034 | 3.28138541899442
| 31396 | 78 |  78643 | 78540 | Vernouillet | 48.96550000000000 | 1.97599000000000
| 31218 | 78 |  78193 | 78720 | Dampierre-en-Yvelines | 48.70825963302752 | 1.97073623853211
| 35532 | 95 |  95392 | 95630 | Mériel | 49.07733312500000 | 2.21302166666667
| 31082 | 77 |  77462 | 77230 | Thieux | 49.00079873563218 | 2.67002413793103

> lpecom_departments

| id | region_code | code | name | slug
| --- |--- | ---| --- |---
| 64 | 84 | 63 | Puy-de-Dôme | puy de dome
| 13 | 93 | 13 | Bouches-du-Rhône | bouches du rhone
| 68 | 44 | 67 | Bas-Rhin | bas | rhin
| 49 | 76 | 48 | Lozère | lozere
| 90 | 27 | 89 | Yonne | yonne

> lpecom_regions

| id | code | name | slug
| --- |--- | --- | ---
| 11 | 44 | Grand Est | grand est
| 7 | 24 | Centre-Val de Loire | centre val de loire
| 19 | COM | Collectivités d'Outre-Mer | collectivites doutre mer
| 6 | 11 | Île-de-France | ile de france
| 13 | 53 | Bretagne | bretagne

## Exercice 1

Quelle requête utiliser pour retrouver la ville qui possède les coordonnées GPS suivantes : 48.66913724637683, 1.87586057971015 ?

```sql
SELECT * FROM lpecom_cities WHERE gps_lat = 48.66913724637683 AND gps_lng = 1.87586057971015;
```

## Exercice 2

Sans jointure, quelle requête utiliser pour calculer le nombre de villes que compte le département de l'Essonne ?

```sql
SELECT COUNT(*) FROM lpecom_cities WHERE department_code = 91;
```

## Exercice 3

Sans jointure, quelle requête utiliser pour calculer le nombre de villes en Île-de-France se terminant par "-le-Roi" ?

```sql
SELECT COUNT(*) FROM lpecom_cities WHERE name LIKE "%-le-Roi";
```

## Exercice 4

Combien de villes possèdent le code postal (zip_code) 77320 ? Renommez la colonne de résultat n_cities.

```sql
SELECT COUNT(*) as n_cities FROM lpecom_cities WHERE zip_code = 77320;
```

## Exercice 5

Sans jointure, quelle requête utiliser pour calculer le nombre de villes commençant par "Saint-" en Seine-et-Marne ?

```sql
SELECT COUNT(*) FROM lpecom_cities WHERE name LIKE "SAINT-%" AND department_code = 77;
```

## Exercice 6

Quelles villes possèdent un code postal (zip_code) compris entre 77210 et 77810 ?

```sql
SELECT * FROM lpecom_cities WHERE zip_code BETWEEN 77210 AND 77810;
```

## Exercice 7

Sans jointure, quelles sont les deux villes de Seine-et-Marne à avoir le code postal (zip_code) le plus grand ?

```sql
SELECT * FROM lpecom_cities WHERE department_code = 77 ORDER BY zip_code DESC LIMIT 2;
```

## Exercice 8

Quel est le code postal (zip_code) le plus grand de la table lpecom_cities ?

```sql
SELECT MAX(zip_code) FROM lpecom_cities;
```

## Exercice 9

Avec un seul WHERE et aucun OR, quelle est la requête permettant d'afficher les départements des régions ayant le code suivant : 75, 27, 53, 84 et 93 ? Le résultat doit afficher le nom du département ainsi que le nom et le slug de la région associée.

```sql
SELECT d.name AS departement, r.name AS region, d.slug
FROM lpecom_departments d
INNER JOIN lpecom_regions r ON (d.region_code = r.code)
WHERE d.region_code IN (75, 27, 53, 84, 93);
```

## Exercice 10

Point important, il sera sans doute nécessaire d'utiliser AS pour obtenir le résultat souhaité.

Quelle requête utiliser pour obtenir en résultat, les noms de la région, du département et de chaque ville du département ayant pour code 77 ?

```sql
SELECT r.name as reg, d.name as dep, c.name as ville
FROM lpecom_cities c
INNER JOIN lpecom_departments d ON (c.department_code = d.code)
INNER JOIN lpecom_regions r ON (d.region_code = r.code)
WHERE d.code = 77;
```

# V / Cinquième partie

Ci-après les deux tables à utiliser pour la cinquième partie des exercices. Sujet d'actualité des années 2020 et 2021, la pandémie du COVID-19 va être au coeur de notre sujet pour cette nouvelle partie d'exercices. Nous utiliserons les tables lpecom_covid et lpecom_regions. La table lpecom_covid liste le nombre quotidien de personnes ayant reçu au moins une dose, par date d'injection, par région. Les colonnes n_cum_dose1 et n_cum_dose2 s'occupent de cumuler le nombre d'injection. Les colonnes couv_dose1 et couv_dose2 calculent la couverture vaccinale des régions chaque jour.

Dans les tableaux, seul un extrait des données est affiché, donc toutes les lignes des tables ne sont pas listées. Pour cette nouvelle partie d'exercices, vous pouvez bien évidemment utiliser la console afin de tester vos requêtes.

> lpecom_covid

| id | id_region | jour | n_dose1 | n_dose2 | n_cum_dose1 | n_cum_dose2 | couv_dose1 | couv_dose2
| --- |--- | --- | --- | --- | --- | --- | --- | ---
| 404 | 04 | 2021-04-06 | 486 | 676 | 633 | 40066 | 22082 | 4.70 | 2.60
| 202 | 02 | 2021-04-06 | 654 | 615 | 104 | 18330 | 5236 | 5.10 | 1.50
| 303 | 03 | 2021-04-06 | 156 | 301 | 300 | 10572 | 5199 | 3.60 | 1.80
| 505 | 06 | 2021-04-06 | 65 | 125 | 184 | 10236 | 4781 | 3.70 | 1.70
| 101 | 01 | 2021-04-06 | 145 | 227 | 166 | 10503 | 4027 | 2.80 | 1.10

> lpecom_regions

| id | code | name | slug
| --- |--- | --- |  ---
| 12 | 52 | Pays de la Loire | pays de la loire
| 14 | 75 | Nouvelle-Aquitaine | nouvelle aquitaine
| 5 | 06 | Mayotte | mayotte
| 9 | 28 | Normandie | normandie
| 8 | 27 | Bourgogne-Franche-Comté | bourgogne franche comte

## Exercice 1

Quelle requête utiliser pour afficher toutes les données de vaccination uniquement pour le 1er avril 2021 ?

```sql
SELECT c.*
FROM lpecom_covid c
WHERE jour = '2021-04-01';
```

## Exercice 2

Quelle requête utiliser pour afficher toutes les données de vaccination uniquement pour le 1er avril 2021 avec le nom de la région concernée ?

```sql
SELECT r.name, c.*
FROM lpecom_covid c
INNER JOIN lpecom_regions r ON c.id_region = r.code
WHERE jour = '2021-04-01';
```

## Exercice 3

Quelle requête utiliser pour afficher le nombre au cumulé de vaccination première dose toutes régions en 2020 ? Proposez également une solution pour les vaccination deuxième dose.

```sql
SELECT SUM(n_dose1)
FROM lpecom_covid c
WHERE jour <= '2020-12-31';

SELECT SUM(n_dose2)
FROM lpecom_covid c
WHERE jour <= '2020-12-31';
```

## Exercice 4

Quelle requête SQL utiliser pour afficher le nombre au cumulé de vaccination première dose pour la région avec le code 93 uniquement pour le mois de mars 2021 ?

```sql
SELECT SUM(n_dose1)
FROM lpecom_covid c
WHERE id_region = '93'
AND jour BETWEEN '2021-03-01' AND '2021-03-31';
```

## Exercice 5

Quelle requête utiliser pour afficher le nombre au cumulé de vaccination deuxième dose pour la région avec le code 11 uniquement pour le mois de mars 2021 ?

```sql
SELECT SUM(n_dose2)
FROM lpecom_covid c
WHERE id_region = '11'
AND jour BETWEEN '2021-03-01' AND '2021-03-31';
```

## Exercice 6

Quelle requête SQL utiliser pour afficher le record de vaccination première dose en une seule journée ? Avec une deuxième requête, afficher les informations de la région concernée, dont son nom, ainsi que le jour du record.

```sql
SELECT MAX(n_dose1)
FROM lpecom_covid c;

SELECT c.*, r.name
FROM lpecom_covid c
INNER JOIN lpecom_regions r ON c.id_region = r.code
WHERE c.n_dose1 >= 56661;
```

## Exercice 7

Quelle requête utiliser pour afficher le record de vaccination deuxième dose en une seule journée ? Avec une deuxième requête, afficher les informations de la région concernée, dont son nom, ainsi que le jour du record.

```sql
SELECT MAX(n_dose2)
FROM lpecom_covid c;

SELECT c.*, r.name
FROM lpecom_covid c
INNER JOIN lpecom_regions r ON c.id_region = r.code
WHERE c.n_dose2 >= 21524;
```

## Exercice 8

Quelles requêtes permettent de connaitre quelle région possède la plus grande couverture de vaccination avec une dose et deux doses ? Vous aurez besoin de 4 requêtes pour répondre aux deux questions. Vous aurez besoin du résultat de la première requête pour la deuxième.

```sql
SELECT MAX(couv_dose1)
FROM lpecom_covid c;

SELECT c.*, r.name
FROM lpecom_covid c
INNER JOIN lpecom_regions r ON c.id_region = r.code
WHERE c.couv_dose1 >= 19.7;

SELECT MAX(couv_dose2)
FROM lpecom_covid c;

SELECT c.*, r.name
FROM lpecom_covid c
INNER JOIN lpecom_regions r ON c.id_region = r.code
WHERE c.couv_dose2 >= 8;
```

## Exercice 9

Quelle requête utiliser pour afficher le nom de la région qui a le plus faible taux de couverture de vaccination avec une dose ? Vous aurez besoin de 2 requêtes pour répondre à la question.

```sql
SELECT MIN(c.couv_dose1)
FROM lpecom_covid c
WHERE c.jour = '2021-04-06';

SELECT c.*, r.name
FROM lpecom_covid c
INNER JOIN lpecom_regions r ON c.id_region = r.code
WHERE c.jour = '2021-04-06'
AND c.couv_dose1 <= 2.80;
```

## Exercice 10

Quelle requête utiliser pour calculer la couverture moyenne entre les différentes régions à la date la plus récente, pour les vaccinations une et deux doses ? Vous renommez les colonnes de résultats : couverture_dose1_avg et couverture_dose2_avg.

```sql
SELECT AVG(c.couv_dose1) AS couverture_dose1_avg, AVG(c.couv_dose2) AS couverture_dose2_avg
FROM lpecom_covid c
WHERE c.jour = '2021-04-06';
```

## Exercice 11

Quelle requête utiliser pour afficher les données de vaccination des régions (avec leur nom) qui possèdent une couveture vaccinale supérieure à 15 % pour la première dose et supérieure à 5 % pour la deuxième dose ?

```sql
SELECT c.*, r.name
FROM lpecom_covid c
INNER JOIN lpecom_regions r ON c.id_region = r.code
WHERE c.couv_dose1 >= 15
AND c.couv_dose2 >= 5
AND c.jour = '2021-04-06';
```

# VI / Sixième partie

Dans cette sixième partie d'exercices, nous nous intéresserons toujours au même sujet qui nous tient tous en haleine : le COVID-19. Dans cette nouvelle partie, nous travaillerons sur les différents types de vaccins. Nous utiliserons les tables lpecom_covid_vaccin, lpecom_covid_vaccin_type et lpecom_departments. La table lpecom_covid_vaccin liste le nombre quotidien de personnes ayant reçu au moins une dose, par date d'injection, par département. Il y a uniquement les données pour les différents départements de la région Ile-de-France. Les colonnes n_cum_dose1 et n_cum_dose2 s'occupent de cumuler le nombre d'injection.

La table lpecom_covid_vaccin_type liste les différents types de vaccins utilisés pour les injections.

Dans les tableaux, seul un extrait des données est affiché, donc toutes les lignes des tables ne sont pas listées. Pour rappel, il y a uniquement les données pour les différents départements de la région Ile-de-France. Pour cette nouvelle partie d'exercices, vous pouvez bien évidemment utiliser la console afin de tester vos requêtes.

> lpecom_covid_vaccin

| id | dep_code | vaccin | jour | n_dose1 | n_dose2 |  n_cum_dose1 | n_cum_dose2
| --- | ---| ---| ---| ---| ---| ---| ---
| 2526 | 75 | 0 | 2021-04-06 | 5273 | 3457 | 370829 | 116607
| 102 | 75 | 1 | 2021-04-06 | 4114 | 3384 | 240541 | 109520
| 203 | 75 | 2 | 2021-04-06 | 3 | 70 | 7579 | 6946
| 304 | 75 | 3 | 2021-04-06 | 1156 | 3 | 122709 | 141
| 2627 | 77 | 0 | 2021-04-06 | 2626 | 1915 | 142547 | 44880

> lpecom_covid_vaccin_type

| id | nom
| --- | ---
| 0 | Tous vaccins
| 1 | COMIRNATY Pfizer/BioNTech
| 2 | Moderna
| 3 | AstraZeneka

> lpecom_departments

| id | region_code | code | name | slug
| --- | --- | --- | --- | ---
| 43 | 84 | 42 | Loire | loire
| 61 | 32 | 60 | Oise | oise
| 58 | 44 | 57 | Moselle | moselle
| 77 | 28 | 76 | Seine-Maritime | seine maritime
| 66 | 76 | 65 | Hautes-Pyrénées | hautes pyrenees

## Exercice 1

Sans jointure, quelle requête SQL utiliser pour afficher toutes les données de vaccination du 14 février 2021 uniquement, pour le département de Seine-et-Marne (77) ?

```sql
SELECT *
FROM lpecom_covid_vaccin v
WHERE v.jour = '2021-02-14'
AND v.dep_code = 77;
```

## Exercice 2

Sans jointure, quelle requête SQL utiliser pour afficher le cumul de toutes les données de vaccination pour tous les vaccins du 14 février 2021 uniquement, pour les départements de l'Essonne (91) et de la Seine-et-Marne (77) ?

```sql
SELECT *
FROM lpecom_covid_vaccin v
WHERE v.jour = '2021-02-14'
AND v.dep_code IN (77, 91)
AND v.vaccin = 0;
```

## Exercice 3

Sans jointure, quelle requête utiliser pour afficher la somme des vaccinations première dose réalisées uniquement avec le vaccin AstraZeneka pour le mois de février 2021 pour le département de la Seine-et-Marne (77) ?

```sql
SELECT SUM(v.n_dose1)
FROM lpecom_covid_vaccin v
WHERE v.dep_code = 77
AND v.jour BETWEEN '2021-02-01' AND '2021-02-31'
AND v.vaccin = 3;
```

## Exercice 4

Sans jointure, quelle requête utiliser pour afficher la somme des vaccinations deuxième dose réalisées avec le vaccin AstraZeneka ou Moderna pour le mois de mars 2021 pour le département de la Seine-et-Marne (77) ?

```sql
SELECT SUM(v.n_dose2)
FROM lpecom_covid_vaccin v
WHERE v.dep_code = 77
AND v.jour BETWEEN '2021-03-01' AND '2021-03-31'
AND v.vaccin IN (2, 3);
```

## Exercice 5

Sans jointure, quelle requête utiliser pour afficher le record de vaccination première dose avec un type de vaccin en une seule journée ? Avec une deuxième requête qui exploitera une jointure, afficher toutes les informations possibles pour cette journée record et sur le type de vaccin.

```sql
SELECT MAX(v.n_dose1)
FROM lpecom_covid_vaccin v
WHERE v.vaccin != 0;

SELECT *
FROM lpecom_covid_vaccin v
INNER JOIN lpecom_covid_vaccin_type t ON t.id = v.vaccin
WHERE v.vaccin != 0
AND v.n_dose1 >= 7494;
```

## Exercice 6

Sans jointure, quelle requête utiliser pour afficher le record de vaccination deuxième dose avec un type de vaccin en une seule journée ? Avec une deuxième requête qui exploitera deux jointures, afficher toutes les informations possibles pour cette journée record, sur le type de vaccin et sur le département.

```sql
SELECT MAX(v.n_dose2)
FROM lpecom_covid_vaccin v
WHERE v.vaccin != 0;

SELECT *
FROM lpecom_covid_vaccin v
INNER JOIN lpecom_covid_vaccin_type t ON t.id = v.vaccin
INNER JOIN lpecom_departments d ON d.code = v.dep_code
WHERE v.vaccin != 0
AND v.n_dose2 >= 5046;
```

## Exercice 7

Quelle requête permet de savoir quel département possède le plus grand nombre d'injections première dose pour le vaccin AstraZeneka ? Avec une deuxième requête, afficher uniquement les colonnes suivantes :

    le nom du vaccin ;
    le jour ;
    le nom et le code du département ;
    le nombre cumulé d'injections.

```sql
SELECT MAX(v.n_cum_dose1)
FROM lpecom_covid_vaccin v
INNER JOIN lpecom_covid_vaccin_type t ON t.id = v.vaccin
INNER JOIN lpecom_departments d ON d.code = v.dep_code
WHERE jour = '2021-04-06'
AND v.vaccin = 3;

SELECT v.jour, t.nom, v.n_cum_dose1, d.code, d.name
FROM lpecom_covid_vaccin v
INNER JOIN lpecom_covid_vaccin_type t ON t.id = v.vaccin
INNER JOIN lpecom_departments d ON d.code = v.dep_code
WHERE jour = '2021-04-06'
AND v.vaccin = 3
AND v.n_cum_dose1 >= 122709;
```

## Exercice 8

Quelle requête permet de savoir quel département a eu le moins de vaccinations première dose avec le vaccin COMIRNATY Pfizer/BioNTech ? Avec une deuxième requête, afficher uniquement les colonnes suivantes :

    le nom du vaccin ;
    le jour ;
    le nom et le code du département ;
    le nombre cumulé d'injections.

```sql
SELECT MIN(v.n_cum_dose1)
FROM lpecom_covid_vaccin v
INNER JOIN lpecom_covid_vaccin_type t ON t.id = v.vaccin
INNER JOIN lpecom_departments d ON d.code = v.dep_code
WHERE jour = '2021-04-06'
AND vaccin = 1;

SELECT v.jour, t.nom, v.n_cum_dose1, d.code, d.name
FROM lpecom_covid_vaccin v
INNER JOIN lpecom_covid_vaccin_type t ON t.id = v.vaccin
INNER JOIN lpecom_departments d ON d.code = v.dep_code
WHERE jour = '2021-04-06'
AND v.vaccin = 1
AND v.n_cum_dose1 <= 90832;
```

## Exercice 9

Quelle requête permet de connaître la moyenne de vaccinations première dose dans tous les départements pour le vaccin Moderna ? Renommer la colonne de résultat avec avg_moderna.

```sql
SELECT AVG(n_cum_dose1) AS avg_moderna
FROM lpecom_covid_vaccin v
INNER JOIN lpecom_covid_vaccin_type t ON t.id = v.vaccin
INNER JOIN lpecom_departments d ON d.code = v.dep_code
WHERE v.jour = '2021-04-06'
AND v.vaccin = 2;
```

## Exercice 10

Quelle requête utiliser pour afficher les départements (avec leur nom) qui possèdent un nombre d'injections deuxième dose avec le vaccin Moderna supérieur à 9000 ou un nombre d'injections première dose avec le vaccin COMIRNATY Pfizer/BioNTech supérieur à 120000 ? Vous aurez besoin de deux jointures.

```sql
SELECT v.jour, t.nom, v.n_cum_dose1, d.code, d.name
FROM lpecom_covid_vaccin v
INNER JOIN lpecom_covid_vaccin_type t ON t.id = v.vaccin
INNER JOIN lpecom_departments d ON d.code = v.dep_code
WHERE (v.jour = '2021-04-06' AND v.vaccin = 1 AND v.n_cum_dose1 > 120000)
OR (v.jour = '2021-04-06' AND v.vaccin = 2 AND v.n_cum_dose2 > 9000);
```

# VII / Septième partie

Cette nouvelle partie d'exercices concerne les professionnels de santé. Chaque professionnel santé possède un numéro unique, le code RPPS (Répertoire Partagé des Professionnels de Santé). Dans la table lpecom_rpps, ce code unique est stocké dans la colonne id_pp_nat. Nous utiliserons pour cette partie d'exercices 4 tables : lpecom_rpps, lpecom_cities, lpecom_departments et lpecom_regions.

La table lpecom_rpps ne contient que les données pour les professionnels de santé de Seine-et-Marne (77).

Il est possible qu'un professionel de santé apparaisse plusieurs fois dans la table. En effet, un professionel de santé peut pratiquer dans plusieurs communes. Il y a donc des doublons sur la colonne id_pp_nat.

> lpecom_rpps

| id | id_pp_nat | nom | prenom | code_profession | lib_profession | code_savoir_faire | lib_savoir_faire | code_postal
| --- |  --- | --- | --- | --- | --- | --- | --- | ---
| 4201 | 810100703585 | GELY | Florence | 10 | Médecin | SM53 | Spécialiste en Médecine Générale | 77177
| 569 | 810001409373 | GUIGOU | DAVID | 10 | Médecin | SM26 | Qualifié en Médecine Générale | 77150
| 1320 | 810000707066 | ELBAZ | SERGE | 10 | Médecin | SM44 | Radio-diagnostic | 77450
| 1698 | 810000686203 | ELBAZ | Marc | 10 | Médecin | SM44 | Radio-diagnostic | 77200
| 4339 | 810101969797 | BAEZA | CAROLINE | 10 | Chirurgien-Dentiste | | | 77100

## Exercice 1

Quelle requête SQL utiliser pour compter, sans doublons, le nombre de professionnels de santé en Seine-et-Marne (77) ?

```sql
SELECT COUNT(DISTINCT id_pp_nat)
FROM lpecom_rpps;
```

## Exercice 2

Quelle requête SQL utiliser pour afficher pour tous les professionnels de santé avec le code postal 77300 les colonnes suivantes : id_pp_nat, prenom, nom, code_postal, ville, departement et région. Vous aurez besoin de plusieurs jointures.

```sql
SELECT rpps.id_pp_nat, rpps.prenom, rpps.nom, rpps.code_postal, c.name as ville, d.name as departement, r.name as region
FROM lpecom_rpps rpps
INNER JOIN lpecom_cities c ON (rpps.code_postal = c.zip_code)
INNER JOIN lpecom_departments d ON (c.department_code = d.code)
INNER JOIN lpecom_regions r ON (d.region_code = r.code)
WHERE rpps.code_postal = 77300;
```
