

# 1/ Afficher le nom de famille et le prénom de tous les étudiants

SELECT last_name, first_name

FROM students;



# 2/ Afficher les étudiants M de moins de 160cm ou les F de plus de 160

SELECT *

FROM students

WHERE
	(
		sex = 'M' AND height < 160
	)
	OR
	(
		sex = 'F' AND height > 160
	);
	
	
# 3/ Afficher la taille minimum parmi tous les étudiants

SELECT *

FROM students

ORDER BY height ASC

LIMIT 1;


# 4/ Afficher la moyenne de la taille pour les hommes (M)

SELECT AVG(height) AS 'Taille moyenne'

FROM students

WHERE sex = 'M';


# 5/ Afficher le nombre d étudiants par sexe

SELECT 	sex,
		COUNT(*) AS 'Nb par sexe'

FROM students

GROUP BY sex;


# 6/ Même question que la 5, mais pour les étudiants M de moins de 160cm ou les F de plus de 160

SELECT 	sex,
		COUNT(*) AS 'Nb par sexe'

FROM students

WHERE
	(
		sex = 'M' AND height < 160
	)
	OR
	(
		sex = 'F' AND height > 160
	)

GROUP BY sex;


# 7/ Afficher le nombre d étudiants par taille, et uniquement celles ayant plus d un étudiant

SELECT 	height,
		COUNT(*) AS 'Nb par taile'

FROM students

GROUP BY height

HAVING COUNT(*) > 1;


# 8/ Afficher les étudiants ayant une taille comprise entre 170 et 190cm

SELECT *

FROM students

WHERE
	height > 170 AND height < 190;


# 9/ Afficher les étudiants ayant une taille comprise entre 170 et 190cm

SELECT *

FROM students

WHERE
	height IN (160, 170, 180, 190);
	
	
# 1/ Créer un étudiant avec les informations suivantes :
#- Last_name : Parker
#- First_name : Antony
#- Height : 199
#- Sex : M

INSERT INTO students VALUES
(NULL, 'Parker', 'Antony', 199, 'M');


# 2/ Afficher tous les étudiants et afficher leur taille au format « 1.26m » au lieu de 126

SELECT	first_name,
		last_name,
		sex,
		CONCAT(ROUND(height/100, 2), 'm') AS 'height'
		
FROM students;


# 3/ Modifier les étudiants dont le « last_name » vaut « Parker » afin qu’ils aient une taille de 189

UPDATE students
SET height = 189
WHERE last_name = 'Parker';


# 4/ Supprimer les étudiants dont le « first_name » vaut « Maxine »

DELETE FROM students
WHERE first_name = 'Maxine';


# 5/ Afficher les étudiants, mais en précisant que « F » est « Femme » et « M » est « Homme »

SELECT	last_name,
		first_name,
		height,
		IF(sex = 'F', 'Femme', 'Homme') AS 'sex'
		
FROM students;


# 6/ Cumulez l’affichage des étudiants avec la question 2 et la question 5

SELECT	last_name,
		first_name,
		CONCAT(ROUND(height/100, 2), 'm') AS 'height',
		IF(sex = 'F', 'Femme', 'Homme') AS 'sex'
		
FROM students;


# 7/ Question bonus : je veux que vous repreniez la 6, en ajoutant une donnée supplémentaire, qui est :
# La concaténation de la première lettre en minuscule du first_name avec le last_name en minuscule
# La "colonne" aura le nom 'login'

SELECT	last_name,
		first_name,
		CONCAT(ROUND(height/100, 2), 'm') AS 'height',
		IF(sex = 'F', 'Femme', 'Homme') AS 'sex',
		LOWER(CONCAT(SUBSTR(first_name, 1, 1), last_name)) AS 'login'
		
FROM students;
