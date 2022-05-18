# Le langage SQL #

## Introduction ##
La première partie du cours s'est concentrée sur la modélisation d'une base de données relationnelle. A l'issue de la phase de modélisation, nous sommes capable d'établir un modèle de données, qu'il nous reste à implémenter dans une base de données pour pouvoir profiter de toute la puissance de cet outil.

En informatique, une **architecture client-serveur** désigne un mode d'organisation ou de déploiement d'applications sur un réseau : une application, qualifiée de **client**, envoie des requêtes, tandis que l'autre, qualifiée de **serveur**, attend les requêtes des clients, les traite et retourne une réponse.

L'utilisation d'un SGBD respecte cette architecture client-serveur. Le serveur est le SGBD proprement dit. L'utilisateur du SGBD envoie depuis des applications clientes des requêtes au serveur. 

Dans le cas des bases de données relationnelles, l'envoi de requêtes au serveur se fait sous forme normalisée en s'appuyant sur le **Structured Query Language** (SQL). Ce langage peut être utilisé pour tous les types de communication avec une base de données rélationnelle : définition de la structure, recherche d'éléments, ajout ou modification de données, etc.

SQL est un langage qui a été développé dans les années 60, sur les bases théoriques du Dr Codd, dans le but de dialoguer avec les grandes banques de données. Les premières versions utilisables ont été développées par IBM et Oracle (à l'époque Relational Software) dans les années 70. Créé et utilisé pour la première fois en 1974, le langage SQL a été normalisé pour l'ensemble des SGBD relationnels en 1986 (version dite **SQL-86**). La norme a ensuite été révisée plusieurs fois : le **SQL-92** (ou **SQL2**) sera longtemps utilisé; la dernière version étant le **SQL-2011** adoptée en décembre 2011. Notons par ailleurs que si la norme SQL est adoptée par la plupart des SGBD relationnels, ils proposent également tous des extensions de cette norme pour traiter des cas particuliers.

Il existe une différence notable entre les langages traditionnels (Fortran, Pascal, C, C++, Java) et SQL. Ces langages permettent de décrire des procédures de calcul et de traitement. On indique donc au processeur ce qu’il doit faire, et dans quel ordre. Ce que l'on indique au processeur, c'est donc comment un calcul ou un traitement doit être mené. On appelle ces langages des langages procéduraux, tout simplement parce qu'ils décrivent des procédures.

SQL est un langage non procédural. Une commande SQL n’explique pas comment les traitements doivent être menés, mais quel doit en être le résultat. La marche à suivre pour déterminer le bon résultat est à la charge du logiciel serveur, le programmeur SQL n’a a priori pas à s’en soucier. Il s’en soucie en fait, notamment pour des raisons d’optimisation et de temps de calcul. Les logiciels serveurs ont entre autres toute liberté pour utiliser toutes les procédures d'optimisation qu'ils veulent.

Malgré les efforts de standardisation, les différents acteurs du marché des bases de données ont développé leur propre SQL, et il reste des différences notables entre les serveurs disponibles sur le marché. Ces différences peuvent apparaître à trois niveaux :

- Le serveur ne supporte pas certaines fonctionnalités, et les instructions SQL correspondantes n’ont pas été implémentées ;
- Les types de données ne correspondent pas toujours en syntaxe d’un serveur à l’autre, ou certains serveurs supportent des types de données différents, ou encore ont leur propre syntaxe de déclaration (c'est notamment le cas pour les dates) ;
- Certaines fonctions n’ont tout simplement pas la même syntaxe d'un serveur à l'autre.

Consulter la documentation du serveur que l’on utilise est donc toujours une précaution élémentaire à prendre avant de commencer un projet.

La documentation la plus compléte ce trouve : https://sql.sh/

Remarque sur la syntaxe employée dans la suite du cours :
* Les commandes SQL seront systématiquement écrites en majuscule : il s'agit juste pour facilier la lecture, SQL est insensible à la casse.
* Dans une syntaxe générale, une expression entre crochets `[...]` correspond à une partie optionnelle. 

L'ensemble des exemples de la suite de cette partie constitue un scénario cohérent qui peut être répété par l'étudiant.

## Articulation en plusieurs grandes parties
On divise en général les commandes SQL en quatre parties :
- Les commandes qui peuvent agir sur la structure des données : tables, colonnes, etc... On appelle cette partie du langage le DDL (Data Definition Language) :
  - Création, suppression et modificationdes tables
  - CREATE, ALTER, DROP
- Les commandes qui permettent d'interroger la base, de sélectionner des données, de les trier, de les classer, d'en créer, de les modifier, etc... Ces commandes sont regroupées dans ce que l'on appelle le DML (Data Manipulation Language).
  - Insertion, suppression et mise à jour des données dans les tables
  - INSERT, UPDATE, DELETE
- DQL : Data Query Language
  - Requetage (récupération) des données dans la tables
  - SELECT
- DCL/TCL : Data / Transaction Control Language
  - Les commandes qui permettent de gérer la sécurité des données, le DCL (Data Control Language)  : GRANT, REVOKE
  - Les commandes qui permettent d'agir sur les transactions, appelées TCL (Transaction Control Language) :  COMMIT, ROLLBACK, SAVEPOINT

## Opérations sur une seule table ##
Nous nous intéressons dans cette partie à la traduction dans le langage SQL des opérations l'algèbre relationnel étudiées au début de cours. Nous commencerons par les opérations n'impliquant qu'une seule table (projection, sélection et renommage) et dans la partie suivante nous nous intéresserons aux opérations impliquant plusieurs tables.

À quoi cela servirait-il d'enregistrer des données dans une base, si l'on ne disposait pas d'outil pour les extraire ? La commande SELECT est probablement la plus utilisée du langage, et peut-être aussi la plus complexe. On se propose de commencer son étude par quelques exemples simples, avant de voir les cas les plus compliqués.

## Extraire des données d'une table unique

Nous avons déjà vu l'utilisation de cette commande sur des cas très simples dans notre partie d'introduction. La forme la plus simple de la commande select est la suivante.

Forme simple de select
```
SELECT [DISTINCT] [nom_de_table.]nom_de_colonne | * | expression [AS alias_de_colonne], ...
    FROM nom_de_table [AS alias_de_table]
   [WHERE predicat]
   [ORDER  BY nom_de_colonne [ASC |  DESC], ...
```

### Liste des colonnes et expressions
Le premier argument d'un select est la liste des colonnes ou expressions que l'on souhaite voir afficher. Chaque élément de cette liste peut être préfixé par un nom de table s'il s'agit d'une colonne. Ce préfixage est obligatoire si deux colonnes de mêmes noms cohabitent dans cette liste, dans ce cas il est nécessaire de lever l'ambigüité.

Chaque nom de colonne ou expression peut être associé à un alias, de façon à rendre lisible l'affichage final.

Voyons quelques exemples :

Colonnes et expressions dans une requête SELECT

```
select nom, prenom ...
 select max(ddnaissance)...
 select Marins.nom  as nom_marin,
```

### Liste de tables : clause from
Vient ensuite la liste des tables sur laquelle notre sélection opère. Normalement il ne doit y en avoir qu'une, puisque l'on s'interdit d'utiliser l'ancienne forme d'expression des jointures, comme nous le verrons dans la suite. Mais cette syntaxe est toujours autorisée, et utilisée.

Là encore, il est possible de définir un alias sur les tables que l'on déclare, dans un but de meilleure lisibilité du code SQL écrit.

Voyons quelques exemples :

Spécifications des tables dans une requête SELECT

```
select ...  from Marins, Commune ...
 select max(ddnaissance)…
 select m1.nom, m2.nom  from Marins  as m1, Marin  as m2 …
```

Nous verrons dans la suite qu'il est également possible de mettre une requête select dans la clause from. On appelle cela une requête imbriquéee.

### Conditions de sélection : clause where

Les conditions de sélection sont facultatives. Si elles ne sont pas présentes, alors toutes les lignes des tables spécifiées sont renvoyées. Sinon seules les lignes pour lesquelles les conditions de sélection sont vraies sont sélectionnées.

Cette clause est assez complexe, aussi allons-nous la traiter dans un un paragraphe ultérieur.

### Classement du résultat : clause order by
Le résultat d'un select n'est en général pas classé. Si l'on souhaite le classer par ordre alphabétique, ou numérique, il faut utiliser une clause order by. Cette clause peut prendre une liste de colonnes en paramètres.

Cette première requête classe les marins par nom, dans l'ordre croissant.

Clause ORDER BY ASC
```
select nom, age  from Marins  order  by nom  asc ;
```

Cette seconde requête les classe par ordre croissant de nom, puis par ordre décroissant d'âge.

Clause ORDER BY DESC
```
select nom, age  from Marins  order  by nom  asc, age  desc ;
```

### Mot-clé distinct

Enfin, le mot-clé distinct permet de supprimer les doublons du résultat final.

## Clause where

Cette clause consiste à évaluer une expression booléenne pour toutes les lignes de la table (ou des tables) en paramètre de la clause from de cette requête. L'argument d'une clause where doit donc toujours se réduire à une expression dont le résultat ne peut prendre que deux valeurs : true ou false.

### Opérateurs de comparaison

Les opérateurs de comparaison sont les opérateurs classiques de tout langage de programmation. La différence éventuelle, c'est qu'ils opèrent sur des données de nature différentes, et qu'il faut donc définir précisément leur fonctionnement.

Opérateurs de comparaison
| Opérateur  | Comparaison numérique | Comparaison textuelle | Comparaison temporelle |
|---|---|---|---|
| =  | Égal  | Égal  | Même moment  |
| <  | Plus petit  | Avant  | Plus tôt  |
| >  | Plus grand  | Après  | Ensuite  |
| <=  | Plus petit ou égal  | Avant ou égal  | Pas après  |
| >=  | Plus grand ou égal  | Après ou égal  | Pas avant  |
| <>  | Différent  | Différent  | Pas au même moment   |

On notera qu'il n'y a pas d'opérateur de négation dans cette table.

### Composition de comparaison

Il est possible de composer ces opérations logiques à l'aide des opérateurs suivants :

    and : et logique classique ;
    or : ou logique classique ;
    not : négation logique classique.

Tout se passerait comme dans n'importe quel langage de programmation, si le SQL n'introduisait pas la notion de valeur nulle, et autorisait leur prise en compte dans les opérations booléennes.

Par exemple, quel est le résultat du and entre une valeur true et une valeur null ? Ou encore, quel valeur nulle est-elle inférieure ou supérieure à 2 ? La réponse du SQL est spécifiée : elle est unknown.

### Prédicat is, cas des valeurs null et unknown

Dès qu'une valeur, numérique, textuelle, temporelle ou booléenne, est comparée à un valeur nulle, alors le résultat de la comparaison prend la valeur unknown.

Il n'existe qu'une seule manière de savoir si une valeur est nulle ou inconnue, c'est de la tester explicitement grâce au prédicat is, qui s'utilise comme dans les exemples suivants.

Ce premier exemple nous donne tous les marins dont on a oublié de renseigner le prénom.

Prédicat IS NULL
```
select *  from Marins  where prenom  is  null ;
```

Ce second exemple nous donne tous les marins pour lesquels la date de mort ou la date de naissance est nulle (il s'agit surtout d'une exemple jouet permettant d'illustrer l'utilisation de is unknown).

Prédicat IS UNKNOWN
```
select nom, (ddmort > ddnaissance)  as age_de_mort 
    from Marins 
    where (ddmort > ddnaissance)  is unknown ;
```

On notera l'utilisation du prédicat is avec null et unknown. C'est ce prédicat qu'il faut utiliser si l'on veut tester qu'une valeur vaut true ou false.

Il est très important de noter que null et unknown ne sont égaux à rien, pas même à eux-mêmes.

L'algèbre booléenne du SQL est donc un peu particulière, en ce sens qu'elle gère un troisième état en plus des habituels true et false : unknown. Toute opération booléenne avec unknown a pour résultat unknown.

### Prédicat like

Le prédicat like est utilisé pour comparer les chaînes de caractères à l’aide de caractères de substitution. On compare une chaîne à un motif, dont les caractères _ et % représentent respectivement n’importe quel caractère unique, et n’importe quelle suite de caractères, éventuellement de longueur nulle. L’utilisation du caractère % peut conduire à des recherches très longues, ce prédicat est donc à utiliser avec précaution.

Voyons quelques exemples simples. La requête suivante sélectionne tous les marins dont le nom commence M.

Prédicat LIKE
```
select *  from Marins  where nom  like  'M%' ;
```

La requête suivante sélectionne tous les marins dont le nom ne comporte pas 4 lettres et se termine par "ly".

Prédicat NOT LIKE
```
select *  from Marins  where nom  not  like  '__ly' ;
```

Notons que la comparaison de chaînes à l’aide de like compare les chaînes caractère par caractère, à la différence du comparateur =. Donc si A = 'Bart' et B = 'Bart ' (notons les espaces en fin de chaîne), alors (A = B) renverra true, alors que (A like B) renverra false.

Si une comparaison de chaînes est tentée alors qu’une des deux chaînes vaut null, alors le résultat sera unknown.
### Prédicat between

Le prédicat between permet de tester si une valeur se trouve entre deux autres valeurs. Voici un exemple d'utilisation.

Prédicat BETWEEN
```
select *  from Marins  where ddnaissance  between 1750  and 1950 ;
```

### Prédicat in

Ce prédicat retourne true si l'élément comparé est dans la liste en paramètre du in. Cette liste peut être explicite (comme sur notre exemple), ou peut être exprimée par une sous-requête. La négation de in ne renvoie par nécessairement le complément, c'est notamment le cas s'il se trouve des valeurs nulles.

Prédicat IN
```
select *  from Marins  where id_commune  in (1, 3, 6) ;
```

### Prédicat exists

Ce prédicat permet de tester si une requête renvoie ou non un résultat. Cette requête est en général une sous-requête. Encore une fois, l’utilisation de la négation de exists ne renvoie pas nécessairement le complément, du fait des valeurs nulles.

On peut vérifier la validité d’une jointure à l’aide de ce prédicat. Écrivons par exemple une requête qui teste que tous les champs de notre colonne id_commune ont bien une correspondance dans la table Communes :

Prédicat EXISTS
```
select nom, prenom, id_commune
    from Marin
    where  not  exists (
       select * 
       from Commune, Marin 
       where Commune.id = Marin.id_commune) ;
```

## Requêtes imbriquées

Les requêtes imbriquées (ou sous-requêtes) peuvent être utilisées en plusieurs endroits d'une requête :

* en paramètre d'une clause where, dans ce cas la sélection a lieu sur le résultat de cette requête imbriquée ;
* en paramètre d'un prédicat exists ou in.

Voyons un exemple simple d'une requête imbriquée dans une clause where.

Requête imbriquée dans une clause where
```
select *  from (
     select Marins.nom  as nom, Marins.prenom  as prenom, Communes.nom  as nom_commun
     from Marins
         join Communes  on Marins.id_commune = Communes.id
)  as marin_commune 
 order  by nom, prenom ;
```

Écrire une requête imbriquée crée en fait une table locale à la requête, qui ne peut pas être référencée ailleurs, avec obligatoirement son propre nom, défini ici par as marin_commune, et sa propre liste de champs, également définie par des alias. Cette table locale est aussi appelée inline view dans la documentation en anglais.

Une fois cette table locale créée, elle peut être utilisée exactement comme une table normale.

## Fonctions d'agrégation, groupage

Comme nous l'avons vu dans le chapitre d'introduction, il est possible de grouper plusieurs lignes entre elles sur des critères précis, et de calculer des expressions sur certaines colonnes particulières de ces lignes.

La syntaxe du select se complexifie alors un peu, et devient la suivante.

Forme simple de select avec fonction d'agrégation
```
SELECT [DISTINCT] [nom_de_table.]nom_de_colonne | * | expression [AS alias_de_colonne], ...
    FROM nom_de_table [AS alias_de_table]
   [WHERE predicat]
   [GROUP  BY liste_de_colonne_a_grouper]
   [HAVING condition_sur_les_groupes]
   [ORDER  BY nom_de_colonne [ASC |  DESC], ...
```

### Fonctions d'agrégation

Voici les principales fonctions d'agrégations de SQL.

Fonctions d'agrégations

| Nom  | Opération effectuée  |
|---|---|
| AVG() | Calcule la moyenne de ses argument.  |
| COUNT() | Retourne le nombre d'arguments passés.  |
| MAX() | Retourne la plus grande valeur de ses arguments.  |
| MIN() | Retourne la plus petite valeur de ses arguments.  |
| SUM() | Retourne la somme des arguments.  |

### Exemples d'agrégation

Voyons immédiatement l'exemple le plus simple, qui permet de compter le nombre de lignes de toute table.

Utilisation de COUNT()
```
select count(*)  from Marins ;
```

Voyons un premier exemple simple, qui retourne la moyenne d'âge calculée sur toute la table Marins.

Utilisation de AVG()
```
select avg(age)  from Marins ;
```

Ce deuxième exemple calcule la moyenne d'âge des marins par commune.

Utilisation de AVG() ... GROUP BY
```
select nom_commune, avg(age)  as age_moyen  from Marins 
    group  by nom_commune ;
```

La clause group by indique au serveur SQL qu'il doit regrouper les marins par commune avant de calculer la moyenne d'âge de ces marins, groupe par groupe. Le résultat comportera donc autant de lignes qu'il y a de communes différentes dans la table Marins.

L'utilisation de la clause having permet de filtrer ce type de résultat. Dans l'exemple qui suit, on ne s'intéresse qu'aux communes pour lesquelles la moyenne d'âge est supérieure à 20 ans.

Utilisation de AVG() ... GROUP BY ... HAVING
```
select nom_commune, avg(age)  as age_moyen  from Marins 
    group  by nom_commune
    having age_moyen > 20 ;
```

Il est important de bien comprendre la différence qu'il y a entre la clause where et la clause having. Dans ce type de requête, la clause where agit comme filtre sur les données avant l'application du regroupement des données. La clause having agit une fois les groupages effectués et les fonctions d'agrégation évaluées.
