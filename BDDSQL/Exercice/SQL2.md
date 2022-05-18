# # Exercices - SQL

Comme dans de nombreux domaines, pour progresser, il est nécessaire de s'entraîner. Vous trouverez ci-après une compilation d'exercices sur le SQL. Ces derniers balaient de nombreuses notions. La lecture de l'ensemble des chapitres du cours vous permettra de résoudre tous les exercices.

Il est possible de télécharger le fichier .sql avec les tables et les enregistrements.

I / Première partie

Ci-après la table à utiliser pour la première partie des exercices.
| id_livre 	| titre | 	isbn_10 | 	auteur | 	prix
| ----------| ----------|----------|----------|----------|
| 1 | 	Forteresse digitale | 	2709626306 | 	Dan Brown | 	20.5
| 2 | 	La jeune fille et la nuit | 	2253237620 | 	Guillaume Musso | 	21.9
| 3 | 	T'choupi se brosse les dents | 	2092589547 | 	Thierry Courtin | 	5.7
| 4 | 	La Dernière Chasse 	2226439412 | 	Jean-Christophe Grangé | 	22.9
| 5 | 	Le Signal | 	2226319484 | 	Maxime Chattam | 	23.9

# Exercice 1

Quelle requête utiliser pour afficher l'ensemble des enregistrements de la table lpecom_livres ?

# Exercice 2

Quelle requête utiliser pour sélectionner uniquement les livres qui ont un prix strictement supérieur à 20 de la table lpecom_livres ?

# Exercice 3

Quelle requête utiliser pour trier les enregistrements de la table lpecom_livres du prix le plus élevé aux prix le plus bas ?

# Exercice 4

Quelle requête utiliser pour récupérer le prix du livre le plus élevé de la table lpecom_livres ?

# Exercice 5

Quelle requête utiliser pour récupérer les livres de la table lpecom_livres qui ont un prix compris entre 20 et 22 ?

# Exercice 6

Quelle requête utiliser pour récupérer tous les livres de la table lpecom_livres à l'exception de celui portant la valeur pour la colonne isbn_10 : 2092589547 ?

# Exercice 7

Quelle requête utiliser pour récupérer le prix du livre le moins élevé de la table lpecom_livres en renommant la colonne dans les résultats par minus ?

# Exercice 8

Quelle requête utiliser pour sélectionner uniquement les 3 premiers résultats sans le tout premier de la table lpecom_livres ?

II / Deuxième partie

Ci-après les deux tables à utiliser pour la deuxième partie des exercices.
| id_etudiant | prenom |nom
|----|----|---
| 30 |	Joseph |	Biblo
| 31 |	Paul |	Bismuth
| 32 |	Jean |	Michel
| 33 |	Ted |	Bundy
| 34 |	Caroline |	Martinez
| 35 |	Joséphine |	Henry

| id | id_examen |	id_etudiant |	matiere |	note
|---|---|---|---|---
| 788 |	45 |	30 |	Histoire-Geographie |	10.5
| 789 |	87 |	33 |	Mathématiques |	14
| 790 |	87 |	34 |	Mathématiques |	4
| 791 |	45 |	31 |	Histoire-Geographie |	15.5
| 792 |	45 |	32 |	Histoire-Geographie |	8
| 793 |	87 |	31 |	Mathématiques |	14
| 794 |	45 |	33 |	Histoire-Geographie |	9.5
| 795 |	45 |	36 |	Histoire-Geographie |	13
| 796 |	45 |	34 |	Histoire-Geographie |	17
| 797 |	87 |	30 |	Mathématiques |	7.5

# Exercice 1

Quelle requête utiliser pour afficher l'id des étudiants qui ont participés à au moins un examen ?

# Exercice 2

Quelle requête utiliser pour compter le nombre d'étudiants qui ont participés à au moins un examen ?

# Exercice 3

Quelle requête utiliser pour calculer la moyenne de l'examen portant l'id : 45 ?

# Exercice 4

Quelle requête utiliser pour récupérer la meilleure note de l'examen portant l'id : 87 ?

# Exercice 5

Quelle requête utiliser pour afficher l'id des étudiants qui ont eu plus de 11 à l'examen 45 ou plus de 12 à l'examen 87 ?

# Exercice 6

Quelle requête utiliser pour afficher tous les enregistrement de la table lpecom_examens avec en plus, si c'est possible, le prenom et le nom de l'étudiant ?

# Exercice 7

Quelle requête utiliser pour afficher les enregistrement de la table lpecom_examens avec le prenom et le nom de l'étudiant, uniquement quand les étudiants sont présents dans la table lpecom_etudiants ?

# Exercice 8

Quelle requête utiliser pour afficher uniquement le nom et le prenom de l'étudiant avec l'id : 30 avec la moyenne de ses deux examens dans une colonne moyenne ?

# Exercice 9

Quelle requête utiliser pour afficher les 3 meilleures examens, du meilleur au moins bon, avec le prenom et le nom de l'étudiant associé ?

III / Troisième partie

Ci-après les trois tables à utiliser pour la troisième partie des exercices. Pour cette nouvelle partie d'exercices, il est préférable de ne pas utiliser la console pour s'entrainer à comprendre les requêtes.

| id |	nom |	prenom |	sexe |	nation
| --- |--- | ---| --- |--- 
| 16 |	Scott |	Ridley |	0 |	uk
| 22 |	Aronofsky |	Darren	0 |	us
| 47 | Jenkins |	Patty |	1 |	us
| 66 |	Ritchie	| Guy |	0 |	uk

| id |	nom |	id_realisateur
| --- |--- | ---
| 121	Requiem for a Dream	22
| 546	Gladiator	16
| 666	Fight Club	61
| 775	Blade Runner	16
| 984	Seul sur Mars	16
| 986	Black Swan	22
| 987	Wonder Woman	47
| 988	The Tomorrow Man	85

| id |	id_film |	note
| --- |--- | ---
| 1	| 546 |	4.5
| 2	| 546 |	2.5
| 3	| 775 |	5
| 4	| 984 |	3.5
| 5	| 987 |	3.1
| 6	| 666 |	4.2
| 7	| 986 |	3
| 8	| 986 |	4.3
| 9	| 121 |	1
# Exercice 1

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT id, prenom, nom
FROM lpecom_realisateurs
WHERE nation = "us"
AND sexe = 1;

# Exercice 2

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT *
FROM lpecom_realisateurs
WHERE sexe = "0"
ORDER BY nom DESC
LIMIT 1;

# Exercice 3

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT f.id, f.nom AS film, r.prenom, r.nom
FROM lpecom_films f
INNER JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
ORDER BY f.id ASC;

# Exercice 4

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT f.id, f.nom AS film, r.prenom, r.nom
FROM lpecom_films f
LEFT JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
ORDER BY f.id ASC;

# Exercice 5

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT f.id, f.nom, fn.note
FROM lpecom_films f
LEFT JOIN lpecom_films_notes fn ON f.id = fn.id_film
ORDER BY f.id ASC;

# Exercice 6

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT f.nom, r.prenom AS realisateur_prenom, r.nom AS realisateur_nom, AVG(fn.note) AS moyenne_note
FROM lpecom_films f
INNER JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
INNER JOIN lpecom_films_notes fn ON f.id = fn.id_film
WHERE f.id = 546;

# Exercice 7

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT r.nation, AVG(fn.note) AS moyenne_note
FROM lpecom_films f
INNER JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
INNER JOIN lpecom_films_notes fn ON f.id = fn.id_film
WHERE r.nation = "us";

# Exercice 8

Quel est le résultat de la requête ci-dessous ?
SQL

SELECT r.nation, MAX(fn.note) AS max_note
FROM lpecom_films f
INNER JOIN lpecom_realisateurs r ON f.id_realisateur = r.id
INNER JOIN lpecom_films_notes fn ON f.id = fn.id_film
WHERE r.nation = "uk";



