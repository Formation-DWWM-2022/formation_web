
# 1/ Afficher le nom des pokémons n’étant pas la forme par défaut (colonne is_default)

SELECT *
FROM pokemon
WHERE is_default = 0;


# 2/ Afficher la moyenne de chaque statistique pour tous les pokemons (hp, atk, def, spa, spd et spe)

SELECT	AVG(hp) AS 'avg hp',
		AVG(atk) AS 'avg atk',
		AVG(def) AS 'avg def',
		AVG(spa) AS 'avg spa',
		AVG(spd) AS 'avg spd',
		AVG(spe) AS 'avg spe'

FROM pokemon;


# 3/ Afficher le pokémon le plus lourd

SELECT *

FROM pokemon

ORDER BY weight DESC

LIMIT 1;


# 4/ Afficher le pokémon le plus petit

SELECT *

FROM pokemon

HAVING height = (SELECT MIN(height) FROM pokemon);


# 5/ Afficher le pokémon le plus lent

SELECT *

FROM pokemon

HAVING spe = (SELECT MIN(spe) FROM pokemon);


# 6/ Afficher les pokémons par atk, dont l’atk est supérieur à 150

SELECT COUNT(*), atk

FROM pokemon

WHERE atk >= 150

GROUP BY atk;


# 7/ Afficher la somme des statistiques avec le nom du pokémon lié

SELECT	name,
		(atk + def + spa + spd + spe + hp) AS 'stats'
		
FROM pokemon;


# 8/ Afficher les pokémons dont le « slug » est égal au « name_api »

SELECT *

FROM pokemon

WHERE slug = name_api;


# 9/ Afficher les pokémons dont l’atk est supérieure à la moyenne d’atk de tous les pokémons

SELECT *

FROM pokemon

HAVING atk >= (SELECT AVG(atk) FROM pokemon);


# 10/ Afficher les pokémons dont le name contient le mot « Mew »

SELECT *

FROM pokemon

WHERE name LIKE '%Mew%';


# 11/ Afficher les pokémons dont le name est inférieure à 3 lettres

SELECT *

FROM pokemon

HAVING LENGTH(name) <= 3;


# 12/ Afficher le pokémon dont le name est le plus long

SELECT *

FROM pokemon

ORDER BY LENGTH(name) DESC

LIMIT 1;


# 13/ Afficher le pokémon ayant la somme de statistique (hp, atk, def, spa, spd, spe) la plus élevée

SELECT	name,
		(atk + def + spa + spd + spe + hp) AS stats
		
FROM pokemon

ORDER BY stats DESC

LIMIT 1;


# 14/ Afficher le pokémon le plus facile à monter de niveau (base_experience la plus basse)

SELECT	name,
		base_experience
		
FROM pokemon

HAVING base_experience = (SELECT MIN(base_experience) FROM pokemon);


# 15/ Afficher le pokémon le rapport « efficace » pour chaque pokémon
# - Rapport efficace : (somme des statistiques / base_experience) * 100
# (arrondie à 2 après la virgule et avec un % à la fin)

SELECT	*,
		CONCAT(ROUND(((atk + def + spa + spd + spe + hp) / base_experience) * 100, 2), '%')
		
FROM pokemon;
		
		