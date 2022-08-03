# Exercice 1

Soit la base de données d’un festival de musique : Dans une représentation peut participer un ou plusieurs musiciens. Un musicien ne peut participer qu’à une seule représentation.

    Representation (Num_Rep , titre_Rep , lieu)
    Musicien (Num_mus , nom , #Num_Rep)
    Programmer (Date , #Num_Rep , tarif)

La liste des titres des représentations.
?

```sql
SELECT titre_Rep FROM Representation 
```

La liste des titres des représentations ayant lieu au « théâtre allissa ».
?

```sql
SELECT titre_Rep FROM Representation WHERE lieu="theatre␣allissa"
```

La liste des noms des musiciens et des titres et les titres des représentations auxquelles ils participent.
?

```sql
SELECT M.nom, R.titre_Rep FROM Musicien M INNER JOIN Representation R ON R.Num_rep=M.Num_rep 
```

La liste des titres des représentations, les lieux et les tarifs du 25/07/2008.
?

```sql
SELECT R.titre_Rep, R.lieu,P.tarif FROM Programmer P INNER JOIN Representation R 
ON P.Num_rep=R.Num_rep WHERE P.date="25-07-2008"
```

Le nombre des musiciens qui participent à la représentations n°20.
?

```sql
SELECT COUNT (*) FROM Musicien WHERE Num_rep =20 
```

Les représentations et leurs dates dont le tarif ne dépasse pas 20DH.
?

```sql
SELECT R.Num_Rep , R.titre_Rep , P.Date FROM Representation R INNER JOIN Programmer P 
ON R.Num_Rep=P.Num_Rep WHERE P.tarif<=20 
```

# Exercice 2

Soit la base de données suivante :

    Départements :( DNO, DNOM, DIR, VILLE)
    Employés : ( ENO, ENOM, PROF, DATEEMB, SAL, COMM, #DNO)

Exprimez en SQL les requêtes suivantes :

Donnez la liste des employés ayant une commission
?

```sql
SELECT * FROM Employes WHERE COMM NOT NULL
```

Donnez les noms, emplois et salaires des employés par emploi croissant, et pour chaque emploi, par salaire décroissant
?

```sql
SELECT ENOM,PROF, SAL FROM Employes ORDER BY PROF ASC, SAL DESC
```

Donnez le salaire moyen des employés
?

```sql
SELECT AVG(SAL) FROM Employes 
```

Donnez le salaire moyen du département Production
?

```sql
SELECT AVG(E.SAL) FROM Employes E INNER JOIN Departement D
ON E.DNO=D.DNO WHERE D.DNOM="production"
```

Donnes les numéros de département et leur salaire maximum
?

```sql
SELECT PROF, MAX(SAL) FROM Employes GROUP BY PROF 
```

Donnez les différentes professions et leur salaire moyen
?

```sql
SELECT PROF, MAX(SAL) FROM Employes GROUP BY PROF 
```

Donnez le salaire moyen par profession le plus bas
?

```sql
SELECT PROF, AVG(SAL) as moy FROM Employes 
GROUP BY PROF 
ORDER BY moy ASC
LIMIT 1 
```

Donnez le ou les emplois ayant le salaire moyen le plus bas, ainsi que ce salaire moyen
? 

```sql
SELECT PROF FROM Employes GROUP BY PROF
HAVING AVG(SAL)=(SELECT AVG(SAL) as moy FROM Employes
GROUP BY PROF ORDER BY moy ASC LIMIT 1) 
```

# Exercice 3

Soit le modèle relationnel suivant relatif à la gestion des notes annuelles d’une promotion d’étudiants :

    ETUDIANT(NEtudiant, Nom, Prénom)
    MATIERE(CodeMat, LibelléMat, CoeffMat)
    EVALUER(#NEtudiant, #CodeMat, Date, Note)

Exprimez en SQL les requêtes suivantes :

Quel est le nombre total d’étudiants ?
?

```sql
SELECT count(*) FROM ETUDIANT 
```

Quelles sont, parmi l’ensemble des notes, la note la plus haute et la note la plus basse ?
?

```sql
SELECT MIN(Note) as ’plus basse note’, MAX(Note) as ’plus haute note’ FROM EVALUER 
```

Quelles sont les moyennes de chaque étudiant dans chacune des matières ?
?

```sql
SELECT E.NEtudiant, M.LibelléMat, AVG(EV.Note) AS MoyEtuMat 
FROM EVALUER EV, MATIERE M, ETUDIANT E WHERE EV.CodeMat = M.CodeMat AND EV.NEtudiant = E.NEtudiant 
GROUP BY E.NEtudiant, M.LibelléMat 
```

Quelles sont les moyennes par matière ? Avec la vue MGETU de la question 3 ( MOYETUMAT)
?

```sql
SELECT LibelleMat, AVG(MoyEtuMat) FROM MOYETUMAT GROUP BY LibelleMat 
```

Quelle est la moyenne générale de chaque étudiant ? Avec la vue MGETU de la question 3 ( MOYETUMAT)
?

```sql
SELECT NEtudiant, SUM(MoyEtuMat*CoeffMat)/SUM(CoeffMat) AS MgEtu
FROM MOYETUMAT GROUP BY NEtudiant 
```

Quelle est la moyenne générale de la promotion ? Avec la vue MGETU de la question 5 :
?

```sql
SELECT AVG(MgEtu) FROM MGETU 
```

Quels sont les étudiants qui ont une moyenne générale supérieure ou égale à la moyenne générale de la promotion? Avec la vue MGETU de la question 5
?

```sql
SELECT NEtudiant , Nom , Prenom , MgEtu FROM MGETU
WHERE MgEtu >= (SELECT AVG(MgEtu) FROM MGETU) 
```

# Exercice 4

Soit la base de données intitulée "gestion_projet" permettant de gérer les projets relatifs au développement de logiciels. Elle est décrite par la représentation textuelle simplifiée suivante :

    Developpeur (NumDev, NomDev, AdrDev, EmailDev, TelDev)
    Projet (NumProj, TitreProj, DateDeb, DateFin)
    Logiciel (CodLog, NomLog, PrixLog, #NumProj)
    Realisation (#NumProj, #NumDev)

Ecrire les requêtes SQL permettant :

D’afficher les noms et les prix des logiciels appartenant au projet ayant comme titre « gestion de stock », triés dans l’ordre décroissant des prix .
?

```sql
SELECT L.NomLog, L.PrixLog FROM Logiciel L INNER JOIN Projet P
ON L.NumProj=P.NumProj WHERE P.TitreProj="gestion␣de␣stock"
ORDER BY L.PrixLog DESC
```

D’afficher le total des prix des logiciels du projet numéro 10. Lors de l’affichage, le titre de la colonne sera « cours total du projet ».
?

```sql
SELECT SUM(PrixLog) as "cout␣total␣du␣projet" FROM Logiciel WHERE NumPRoj=10 
```

Afficher le nombre de développeurs qui ont participé au projet intitulé « gestion de stock »
?

```sql
SELECT count(*) FROM Developpeur D INNER JOIN Realisation R
ON D.NumDev=R.NumDev INNER JOIN Projet P ON P.NumProj=R.NumProj 
```

Afficher les projets qui ont plus que 5 logiciels
?

```sql
SELECT NumProj, TitreProj FROM PRojet P INNER JOIN Logiciel L ON P.NumProj=L.NumProj 
GROUP BY NumProj, TitreProj 
HAVING count(*)>5
```

Les numéros et noms des développeurs qui ont participés dans tout les projets.
?

```sql
SELECT NumDev, NomDev FROM Developpeur D INNER JOIN Realisation R ON D.NumDev=R.NumDev
GROUP BY NumDev, NomDev
HAVING count(*)=(SELECT COUNT(*) FROM Projet) 
```

Les numéros de projets dans lesquelles tous les développeurs y participent dans sa réalisation.
?

```sql
SELECT NumProj, TitreProj FROM Projet P INNER JOIN Realisation R ON P.NumProj=R.NumProj
GROUP BY NumProj, TitreProj
HAVING count(*)=(SELECT COUNT(*) FROM Developpeur) 
```

# Exercice 5

Ci-après, on donne la représentation textuelle simplifiée d’une base de données concernant un cycle de formation destiné à des étudiants. Il regroupe un ensemble de matières. On considère que chaque enseignant n’enseigne qu’une seule matière et qu’à la fin du cycle de formation, une note par matière, est attribuée à chaque étudiant. D’autre par, les étudiants peuvent ne pas suivre les mêmes matières.

    ETUDIANT(CodeEt, NomEt, DatnEt)
    MATIERE(CodeMat, NomMat, CoefMat)
    ENSEIGNANT(CodeEns, NomEns, GradeEns, #CodeMat)
    NOTE(#CodeEt, #CodeMat, note)

Ecrire les requêtes SQL permettant d’afficher :

Les informations relatives aux étudiants (Code, Nom et Date de naissance) selon l’ordre alphabétique croisant du nom
?

```sql
SELECT * FROM ETUDIANT ORDER BY NomEt ASC
```

Les noms et les grades des enseignants de la matière dont le nom est ‘BD’.
?

```sql
SELECT E.NomEns, E.GradeEns FROM ENSEIGNANT E INNER JOIN MATIERE M
ON M.CodeMat=E.CodeMat WHERE M.NomMat="BD"
```

La liste distincte formée des noms et les coefficients des différentes matières qui sont enseignées par des enseignants de grade ‘Grd3’.
?

```sql
SELECT DISTINCT(M.NomMat), M.CoefMat FROM ENSEIGNANT E INNER JOIN MATIERE M 
ON M.CodeMat=E.CodeMat WHERE E.GradeEns="Grd3"
```

La liste des matières (Nom et Coefficient) qui sont suivies par l’étudiant de code ‘Et321’.
?

```sql
SELECT M.NomMat, M.CoefMat FROM MATIERE M INNER JOIN NOTE N
ON M.CodeMat=N.CodeMat INNER JOIN ETUDIANT E ON E.CodeEt=N.CodeEt
WHERE E.CodeEt="Et321"
```

Le nombre d’enseignants de la matière dont le nom est ‘Informatique’
?

```sql
SELECT COUNT(*) FROM ENSEIGNANT E INNER JOIN MATIERE M ON M.CodeMat=E.CodeMat 
WHERE M.NomMat="Informatique"
```

# Exercice 6

On considère la base de données BD_AIR_MAROC suivante :

    PILOTE (NUMPIL, NOMPIL, VILLE, SALAIRE)
    AVION (NUMAV, NOMAV, CAPACITE, VILLE)
    VOL (NUMVOL, #NUMPIL, #NUMAV, VILLE_DEP, VILLE_ARR, H_DEP, H_ARR)

Donnez la liste des avions dont la capacité est supérieure à 350 passagers.
?

```sql
SELECT * FROM AVION WHERE CAPACITE>350 
```

Quels sont les numéros et noms des avions localisés à Marrakech ?

```sql
SELECT NUMAV, NOMAV FROM AVION WHERE VILLE=’Marrakech’ 
```

Quels sont les numéros des pilotes en service et les villes de départ de leurs vols ?

```sql
SELECT NUMPIL , VILLE_DEP FROM VOL 
```

Donnez toutes les informations sur les pilotes de la compagnie.
?

```sql
SELECT * FROM PILOTE 
```

Quel est le nom des pilotes domiciliés à Meknès dont le salaire est supérieur à 20000 DH ?

```sql
SELECT NOMPIL FROM PILOTE WHERE VILLE=’Meknes’ AND SALAIRE>20000 
```

Quels sont les avions (numéro et nom) localisés à Marrakech ou dont la capacié est inférieure à 350 passagers ?
?

```sql
SELECT NUMAV, NOMAV FROM AVION WHERE VILLE=’Marrakech’ AND CAPACITE< 350 
```

Quels sont les numéros des pilotes qui ne sont pas en service ?
?

```sql
SELECT NUMPIL FROM PILOTE WHERE NUMPIL NOT IN (SELECT DISTINCT NUMPIL FROM VOL) 
```

Donnez le numéro des vols effectués au départ de Marrakech par des pilotes de Meknès ?
?

```sql
SELECT DISTINCT V.NUMVOL FROM VOL AS V, PILOTE AS P 
WHERE V.NUMPIL=P.NUMPIL AND V.VILLE_DEP=’Marrakech’ AND P.VILLE=’Meknes’ 

ou

SELECT DISTINCT NUMVOL FROM VOL WHERE V.VILLE_DEP=’Marrakech’ AND
NUMPIL NOT IN (SELECT NUMPIL FROM PILOTE WHERE VILLE=’Meknes’)
```

Quels sont les vols effectu"s par un avion qui n’est pas localisé à Marrakech ?
?

```sql
SELECT DISTINCT V.NUMVOL FROM VOL V, AVION A WHERE A.NUMAV=V.NUMAV AND A.VILLE !=’Marrakech’ 
```

Quelles sont les villes desservies à partir de la ville d’arrivée d’un vol au départ de Guelmim ?
?

```sql
SELECT DISTINCT VILLE_ARR FROM VOL WHERE VILLE_DEP=’Guelmim’ AND VILLE_DEP != VILLE_ARR 
```

# Exercice 7

Soit le schéma relationnel suivant :

    Departement (NomD, N_Dep, Directeur)
    Employe (Matricule, Nom, Prénom, DateNaissance, Adresse, Salaire, #N_dep, superieur)
    Projet (NomP, N_pro, Lieu, #N_Dep)
    Travaille (#Matricule, #N_Proj, Heures)

L’attribut supérieur dans la relation Employe contient le matricule du supérieur direct de l’employé. Chaque employé appartient à un département et travaille sur zéro, un ou plusieurs projets. Chaque projet est rattaché à un département qui peut être différent de celui des employés travaillant sur ce projet.

Exprimer en SQL les requêtes suivantes :

Date de naissance et l’adresse de Taha Lamharchi.
?

```sql
SELECT DateNaissance, Adresse FROM Employe WHERE Nom=’Lamharchi’ AND Prenom =’Taha’ 
```

Nom et adresse des employés qui travaillent au département de recherche.
?

```sql
SELECT E.Nom, E.Adresse FROM Employe as E, Departement as D 
WHERE E.N_dep=D.N_dep AND NomD=’recherche’ 
```

Nom et Prénom des employés dont le supérieur est Taha Lamharchi.
?

```sql
SELECT Nom , Prenom FROM Employe 
WHERE superieur=(SELECT Matricule FROM Employe WHERE Nom=’Lamharchi’ AND Prenom =’Taha’) 
```

Nom des employés qui travaillent plus de 10heures sur un projet à Guelmim
?

```sql
SELECT E.Nom FROM Employe as E, Travaille as T , Projet P 
WHERE E.Matricule=T.Matricule AND T.N_proj=P.N_proj AND T.heures >=10 AND P.Lieu=’Guelmim’ 
```

Nom des projets sur lesquelles travaillent Taha Lamharchi et Dounia Mahmoud.
?

```sql
SELECT T.N_proj FROM Travaille as T,Employe as E WHERE T.Matricule=E.Matricule AND E.Nom=’Lamharchi’ AND E.Prenom=’Taha’
INTERSECT
SELECT T.N_proj FROM Travaille as T,Employe as E WHERE T.Matricule=E.Matricule AND E.Nom=’Mahmoud’ AND E.Prenom=’Dounia’ 
```

Nom et prénom des employés qui ne travaillent sur aucun projet.
?

```sql
SELECT Nom , Prenom FROM Employe 
WHERE Matricule NOT IN ( SELECT Matricule FROM Travaille) 
```

Numéro des projets qui ont au moins un participant de chaque département.
?

```sql
SELECT T.N_proj FROM Travaille as T,Projet as P, Employe as E 
WHERE T.N_proj=P.N_proj AND T.Matricule=E.Matricule 
GROUP BY T.N_proj 
HAVING count(DISTINCT E.N_dep)=(SELECT count(*) FROM Departement) 
```

Nom des employés qui ne travaillent pas sur un projet à Guelmim.
?

```sql
SELECT Nom FROM Employe 
WHERE Matricule NOT IN(SELECT T.Matricule FROM Travaille as T, Projet as P WHERE T.N_proj=P.N_proj AND P.Lieu=’Guelmim’) 
```

# Exercice 8

Soit le schéma relationnel suivant qui représente la base de données d’une agence de voyage en ligne.

    CLIENT (NumCli, Nom, Prénom, e-mail, NumCB )
    VOYAGE (CodeVoyage, Destination, Durée, Prix )
    RESERVATION (#NumCli, #CodeVoyage, DateRes )

Formuler en SQL les requêtes suivantes :

Nom, prénom et e-mail des clients ayant une réservation en cours
?

```sql
SELECT Nom, Prenom, e-mail FROM CLIENT 
WHERE NumCli IN (SELECT DISTINCT NumCli FROM RESERVATION) 
```

Nom, prénom et e-mail des clients n’ayant aucune réservation en cours
?

```sql
SELECT Nom, Prenom, e-mail FROM CLIENT 
WHERE NumCli NOT IN (SELECT DISTINCT NumCli FROM RESERVATION) 
```

Destination et liste des clients ayant réservés pour un voyage de plus de 10 jours et coûtant moins de 1000 DH.
?

```sql
SELECT C.Nom, C.Prenom, V.Destination FROM CLIENT as C, VOYAGE as V, RESERVATION as R
WHERE C.NumCli=R.NumCli and V.CodeVoyage = R.CodeVoyage AND Duree >=10 AND Prix < 1000 
```

Numéros de tous les clients ayant réservés sur tous les voyages proposés.
?

```sql
SELECT NumCli FROM RESERVATION 
GROUP BY NumCli 
HAVING count(*)=(SELECT count(*) FROM VOYAGE) 
```

# Exercice 9

Soit la base de données « cinéma » dont le schéma relationnel est donné ci-dessous :

    VILLE (CodePostal, NomVille )
    CINEMA (NumCine, NomCine, Adresse, #CodePostal )
    SALLE (NumSalle, Capacité, #NumCine )
    FILM (NumExploit, Titre, Durée)
    PROJECTION (#NumExploit, #NumSalle, NumSemaine, Nbentrees)

Ecrivez les requêtes suivantes en algèbre relationnelle :

Titre des films dont la durée est supérieure ou égale à deux heures
?

```sql
SELECT NumExploit , Titre FROM FILM WHERE Duree >=2 
```

Nom des villes abritant un cinéma nommé « RIF »
?

```sql
SELECT NomVille FROM VILLE
WHERE CodePostal IN (SELECT CodePostal FROM CINEMA WHERE NomCine=’RIF’) 
```

Nom des cinémas situés à Meknès ou contenant au moins une salle de plus 100 places
?

```sql
SELECT NomCine FROM CINEMA 
WHERE CodePostal=(SELECT CodePostal FROM VILLE WHERE NomVille=’Meknes’) 
OR NumCine IN (SELECT NumCine FROM SALLE WHERE Capacite>=100) 
```

Nom, adresse et ville des cinémas dans lesquels on joue le film « Hypnose » la semaine 18
?

```sql
SELECT C.NomCine , C.Adresse , V.NomVille FROM CINEMA as C, VILLE as V
WHERE C.CodePostal=V.CodePostal AND
C.NumCine IN (SELECT S.NumCine FROM SALLE as S, FILM as F, PROJECTION as P WHERE P.NumExploit=F.NumExploit AND P.NumSalle=S.NumSalle AND F.Titre=’Hypnose’ AND P.NumSemaine=18)  
```

Numéro d’exploitation des films projetés dans toutes les salles
?

```sql
SELECT NumExploit FROM PROJECTION 
GROUP BY NumExploit 
HAVING count(*)=(SELECT count(*) FROM SALLE) 
```

Titre des films qui n’ont pas été projetés
?
```sql
SELECT Titre FROM FILM WHERE NumExploit NOT IN (SELECT NumExploit FROM PROJECTION) 
```

# Exercice 10

Soit le modèle relationnel suivant relatif à la gestion simplifiée des étapes du Tour de France 97, dont une des étapes de type "contre la montre individuel" se déroula à Saint-Etienne :

    EQUIPE(CodeEquipe, NomEquipe, DirecteurSportif)
    COUREUR(NuméroCoureur, NomCoureur, #CodeEquipe, #CodePays)
    PAYS(CodePays, NomPays)
    TYPE_ETAPE(CodeType, LibelleType)
    ETAPE(NuméroEtap, DateEtape, VilleDép, VilleArr, NbKm, #CodeType
    PARTICIPER(#NuméroCoureur, #NuméroEtape, TempsRealisé)
    ATTRIBUER_BONIFICATION(#NuméroEtape, #NuméroCoureur, km, Rang, NbSecondes)

Exprimez en SQL les requetes suivantes

Quelle est la composition de l’équipe Festina (Numéro, nom et pays des coureurs) ?
?

```sql
SELECT NumeroCoureur , NomCoureur , NomPays FROM EQUIPE A, COUREUR B, PAYS C 
WHERE A.CodeEquipe=B.CodeEquipe And B.CodePays=C.CodePays And NomEquipe="FESTINA"
```

Quel est le nombre de kilomètres total du Tour de France 97 ?
?

```sql
SELECT SUM(Nbkm) FROM ETAPE 
```

Quel est le nombre de kilomètres total des étapes de type "Haute Montagne" ?
?

```sql
SELECT SUM(Nbkm) FROM ETAPE A, TYPE_ETAPE B 
WHERE A.CodeType=B.CodeType And LibelleType="HAUTE MONTAGNE"
```

Quels sont les noms des coureurs qui n’ont pas obtenu de bonifications ?
?

```sql
SELECT NomCoureur FROM COUREUR
WHERE NumeroCoureur NOT IN (SELECT NumeroCoureur FROM ATTRIBUER_BONIFICATION) 
```

Quels sont les noms des coureurs qui ont participé à toutes les étapes ?
?

```sql
SELECT NomCoureur FROM PARTICIPER A, COUREUR B WHERE A.NumeroCoureur=B.NumeroCoureur 
GROUP BY NomCoureur
HAVING COUNT(*)=(SELECT COUNT(*) FROM ETAPE) 
```

Quel est le classement général des coureurs (nom, code équipe, code pays et temps des coureurs) à l’issue des 13 premières étapes sachant que les bonifications ont été intégrées dans les temps réalisés à chaque étape ?
?

```sql
SELECT NomCoureur , CodeEquipe , CodePays , SUM(TempsRealise) AS Total
FROM PARTICIPER A, COUREUR B
WHERE A.NumeroCoureur=B.NumeroCoureur and NumeroEtape <=13 
GROUP BY NomCoureur , CodeEquipe , CodePays ORDER BY Total 
```

Quel est le classement par équipe à l’issue des 13 premières étapes (nom et temps des équipes) ?
?

```sql
SELECT NomEquipe , SUM(TempsRealise) AS Total
FROM PARTICIPER A, COUREUR B, EQUIPE C
WHERE A.NumeroCoureur=B.NumeroCoureur And B.CodeEquipe=C.CodeEquipe  And NumeroEtape <=13
GROUP BY NomEquipe 
ORDER BY Total 
```

# Exercice 11 : Extrait HEC 2014

A partir du système d’information de l’entreprise. le service des ressources humaines peut extraire et analyser les infor- mations relatives à tous les personnels. celui-ci lui permet en particulier d’exercer un suivi dans le domaine de la formation. un extrait de ce domaine est présenté sours forme d’un schéma relation :

![image](https://developpement-informatique.com/upload/33b7c9db414ef0f2cdf22c6f2f180df68b74f91c.png)

Construire les requêtes en langage SQL permettant de répondre aux questions suivantes :

Quel est le nombre de formations suivies par catégories de salariés ayant débuté au cours de la période du 01/06/2011 au 31/12/2011 ?
?

```sql
SELECT Libellecategorie , count(distinct Codeform) FROM SUIVRE , SALARIE , CATEGORIE 
WHERE SUIVRE.Matriculesal=SALARIE.Matriculesal AND SALARIE.codecategorie=CATEGORIE.codecategorie
AND Datedebut BETWEEN "01/06/2011" AND "31/12/2011"
GROUP BY Libellecategorie 
```

Quelles sont les catégories pour lesquelles le nombre d’heures de formation est supérieur à la moyenne du nombre d’heures des formations suivies par l’ensemble des personnels ?
?

```sql
SELECT Libellecategorie FROM SUIVRE , SALARIE , CATEGORIE , FORMATION
WHERE SUIVRE.Matriculesal=SALARIE.Matriculesal AND SALARIE.codecategorie=CATEGORIE.codecategorie 
AND FORMATION.Codeform=SUIVRE.Codeform
GROUP BY Libellecategorie
HAVING SUM(Dureeform) > (SELECT AVG(Dureeform) SUIVRE, FORMATION WHERE SUIVRE.Codeform=FORMATION.Codeform)
```

le responsable des ressources humaines souhaite intégrer dans la base de données une nouvelle formation liée au sertissage des boîtes de conserve.
Les nouvelles données à insérer sont les suivantes : "FORM587, sertissage niveau 1, 25j, perfectionnement, 12, 525 " Ecrire la requête permettant de mettre à jour la base.
?

```sql
INSERT INTO FORMATION VALUES("FORM587","sertissage␣niveau␣1",600, "perfectionnement",12,525) 
```

# Exercice 12

La société X utilise le logiciel de gestion de base de données Access pour gérer ses clients et ses représentants. Voici la liste des tables crées dans Access :

![image](https://developpement-informatique.com/upload/93743ff2b843f6a730722fb5618f7c296d3aa6c0.png)

Ecrire les requêtes suivantes

Afficher la liste des clients appartenant à la catégorie tarifaire n°1, classée par ordre alphabétique
?

```sql
SELECT CODE_CLT , NOM_CLT FROM client WHERE NUM_CAT =1 
ORDER BY NOM_CLT ASC
```

Afficher la liste des clients (code, nom de client) rattachés au représentant HINAUD
?

```sql
SELECT CODE_CLT , NOM_CLT FROM client , representant 
WHERE client.NUM_REP=representant.NUM_REP AND NOM_REP="HINAUD"
```

Afficher la liste des clients bénéficiant d’une remise de 10%
?

```sql
SELECT CODE_CLT, NOM_CLT FROM client,categorie_tarifaire 
WHERE client.NUM_CAT=categorie_tarifaire.NUM_CAT AND REMISE="10%"
```

Afficher la liste des représentants (Numéro et nom) dépendant du chef de secteur PONS
?

```sql
SELECT NUM_REP ,NOM_REP FROM representant ,couvrir ,departement 
WHERE reprsentant.NUM_REP=couvrir.NUM_REP AND couvrir.CODE_DEP=departement.CODE_DEP 
AND CHEF_SECTEUR="PONS"
```

Afficher la liste des départements (code, nom, chef de secteur)
?

```sql
SELECT * FROM departement 
```

Afficher la liste des chefs de secteur
?

```sql
SELECT DISTINCT CHEF_SECTEUR FROM departement 
```

# Exercice 13

Le responsable du SAV d’une entreprise d’électroménager a mis en place une petite base de données afin de gérer les interventions de ces techniciens. Le modèle relationnel à la source de cette base de données est le suivant :

    Client (Codecl, nomcl, prenomcl, adresse, cp, ville)
    Produit (Référence, désignation, prix)
    Techniciens (Codetec, nomtec, prenomtec, tauxhoraire)
    Intervention (Numéro, date, raison, #codecl, #référence, #codetec)

Le responsable vous demande d’écrire en langage SQL les requêtes suivantes :

La liste des produits (référence et désignation) classées du moins cher au plus cher.
?

```sql
Select Reference, designation from produit order by prix ASC
```

Le nombre d’intervention du technicien n°2381.
?

```sql
Select count (*) from Intervention where codetec =2381 
```

La liste des clients ayant demandé une intervention pour des produits d’un prix supérieur à 300 dhs.
?

```sql
SELECT nomcl FROM Client clt, Produit prod, Intervention inter
WHERE clt.codecl=inter.codecl AND prod.Reference=inter.Reference AND prod.prix>300
```

Les interventions effectuées par le technicien : ‘Mestiri Mohamed’ entre le 1er et le 31 août 2009.
?

```sql
Select Numero , date , raison from Intervention int , Techniciens tec
where int.codetec=tec.codetec and tec.nomtec="Mestiri" and tec.prenomtec="Mohamed"
and int.date between "2009-08-01" and "2009-08-31" 
```

Par ailleurs il vous informe que le produit référencé 548G a vu son prix augmenter (nouveau prix = 320 dhs).
?

```sql
update Produit set prix=320 where Reference="548G"
```

Vous apprenez également par le directeur des ressources humaines qu’un nouveau technicien a été recruté : son code est le 3294, il s’appelle ‘El Abed Ridha’ et est rémunéré à un taux horaire de 15 dhs.
?

```sql
Insert into Technicien values(3294,"EL Abed","Ridha",15) 
```

# Exercice 14

La représentation textuelle suivante est une description simplifiée d’une base de données de gestion de facturation d’une entreprise commerciale.

    Client (Numcli, Nomcli, Prenomcli, adressecli, mailcli)
    Produit (Numprod, désignation, prix , qte_stock)
    Vendeur (Idvendeur, Nomvendeur, adresse_vend)
    Commande (Numcom, #Numcli, #Idvendeur, #Numprod, date_com, qte_com)

On suppose que Numcli, Numprod, Idvendeur et Numcom sont de type numérique.
Le nom, le prénom et l’adresse des clients ainsi que les vendeurs sont des informations obligatoires, le mail peut ne pas être indiqué.
La valeur par défaut de la quantité en stock des produits (qte_stock) est égale à 0

Exprimer en SQL les requêtes suivantes :

Créer les tables : Client, Produit, Vendeur et Commande.
?

```sql
CREATE TABLE Produit(
    Numprod int primary key , 
    designation varchar(30), 
    prix float,
    qte_stock int default 0
);
CREATE TABLE commande(
    Numcom int primary key , 
    Numcli int , 
    idvendeur int , 
    Numprod int,
    date_com date,
    qte_com int,
    FOREIGN KEY(Numcli) REFERENCES Client(Numcli), 
    FOREIGN KEY(idvendeur) REFERENCES Vendeur(idvendeur), 
    FOREIGN KEY(Numprod) REFERENCES Produit(Numprod) 
)
```

la liste des clients de marrakech.
?

```sql
select * from Client where adressecli like "%marrakech%"
```

la liste des produits (Numprod, désignation, prix) classés de plus cher au moins cher.
?

```sql
select Numprod , designation , prix from Produit order by prix ASC
```

noms et adresses des vendeurs dont le nom commence par la lettre ‘M’.
?

```sql
select Nomvendeur, adresse_vend from Vendeur where Nomvendeur like "M%"
```

la liste des commandes effectuées par le vendeur "Mohammed" entre le 1er et 30 janvier 2020.
?

```sql
Select Nymcom, Numcli, Idvendeur, Numprod, date_com, qte_com
FROM Commande cmd, Vendeur vend
WHERE cmd.Idvendeur=vend.Idvendeur AND vend.Nomvendeur="mohammed"
AND cmd.date_com BETWEEN "2020-01-01" AND "2020-01-30"
```

le nombre des commandes contenant le produit n° 365.
?

```sql
select count (*) from Commande where Numprod =365 
```

# Exercice 15

Soit la base de données suivante :

![image](https://developpement-informatique.com/upload/93466eff73d076c3f4b5e440bff356e1da98975d.png)

Ecrire les commandes SQL permettant de rechercher :

La liste de tous les étudiants.
?

```sql
select * from Etudiant 
```

Nom et coefficient des matières.
?

```sql
select nom_matiere , coefficient from Matiere 
```

Les numéros des cartes d’identité des étudiants dont la moyenne entre 7 et 12.
?

```sql
SELECT numero_carte_etudiant FROM Note, Matiere mat 
WHERE Note.code_matiere=Mat.code_matiere
GROUP BY numero_carte_etudiant 
HAVING (sum(note_examen*coefficient)/sum(coefficient)) between 7 and 12 
```

La liste des étudiants dont le nom commence par ‘ben’.
?

```sql
select * from Etudiant where Nom like "Ben%"
```

Le nombre des étudiants qui ont comme matière ‘12518’.
?

```sql
select * from Note where code_matiere=12518 
```

La somme des coefficients des matières.
?

```sql
select sum(coefficient) from Matiere 
```

Les noms des étudiants qui une note_examen >10.
?

```sql
SELECT distinct Nom FROM Note , Etudiant
WHERE Note.numero_carte_etudiant=Etudiant.numero_carte_etudiant AND note_examen >10 
```

Afficher les noms et les coefficients des matières étudier par l’étudiant "01234568".
?

```sql
SELECT nom_matiere , coefficient FROM Note , Matiere 
WHERE Note.numero_carte_etudiant="01234568"
```

# Exercice 16

Afin d’assurer la qualité des produits attendues par les Clients, l’entreprise cherche à optimiser la gestion des pannes pouvant survenir dans les infrastructures de production nécessaires à la fabrication du Ciment. voici un extrait de la base de données :

TECHNICIEN (idTech, nom, prénom, spécialité)
STATION (idstat, nom, Position, coordLat, coordLong,phase)
MACHINE (idmach, état, dateMiseEnService, dateDernièreRévision, #idStat)
TYPEINCIDENT (id, description, tempsRéparationPrévu)
INCIDENT (idInd, remarques, dateHeure, dateHeureCloture,#idmach,#idType)
INTERVENTION (idInterv, dateHeureDébut, dateHeureFin, #idInd, #idTech)

Rédiger la requête SQL permettant d’obtenir la liste par ordre alphabétique des noms et prénoms des techniciens ayant réalisé une intervention sur la Machine identifiée par Ber001.
?

```sql
SELECT nom , prenom FROM TECHNICIEN tec , INCIDENT inc , INTERVENTION int
WHERE tec.idTech=int.idTech and int.idInd=inc.idInd and idmach="Ber001"
ORDER BY nom ASC , prenom ASC
```

Rédiger la requête SQL permettant d’obtenir la liste des phases ayant connue un incident de "sur-chauffage" pour le mois Mai 2019.
?

```sql
SELECT distinct phase FROM STATION st, MACHINE mch, INCIDENT inc, TYPEINCDENT type
WHERE inc.idmach=mch.idmach AND st.idstat=mch.idstat AND type.id=inc.idType 
AND type.description="sur-chauffage" AND MONTH(dateHeure)=5 AND YEAR(dateHeure)=2019 
```

Rédiger la requête SQL permettant d’obtenir le nombre d’incidents non clôturés.
?

```sql
SELECT count(*) FROM INCIDENT WHERE dateHeureCloture is NULL
```

Rédiger la requête SQL permettant d’obtenir la liste des noms des stations ayant eu plus de dix incidents.
?

```sql
SELECT nom FROM STATION st, MACHINE mch, INCIDENT inc 
WHERE inc.idmach=mch.idmach and st.idstat=mch.idstat
GROUP by nom 
having count (*) >10 
```

# Exercice 17

Voici un extrait de la base de données gestion des ventes :

    Produit (Ref, Designation, PrixUnitaire, Dimension, #code_Machine)
    Vente (Ncom, #Ref, Qte , DateLiv)
    Commande (Ncom, DateCmd, #CodeClt,#Code_Salarie)
    Produit_concurrent(Ref,Designation,PrixUnitaire,PrixUnitaire,Dimension,#code_Machine,Nom_Concurrent)

Donner la requête qui permet d’obtenir le chiffre d’affaire mensuel de l’année en cours
?

```sql
SELECT sum(Qte*PrixUnitaire), MONTH(DateCmd) FROM Produit, Vente, Commande 
WHERE Produit.Ref=Vente.Ref AND Vente.Ncom=Commande.Ncom AND YEAR(DateCmd)=YEAR(NOW()) 
GROUP BY MONTH(DateCmd) 
```

Donner la requête qui calcule le taux de vente de chaque produit.
?

```sql
SELECT Ref, sum(Qte)/(select sum(Qte) FROM Vente) FROM Vente 
GROUP BY Ref 
```

Donner la requête qui affiche le produit le plus vendu du mois en cour.
?

```sql
SELECT Ref, Designation, tot 
FROM (SELECT Ref, Designation, SUM(Qte) as tot FROM Produit, Vente WHERE Produit.Ref=Vente.Ref GROUP BY Ref) 
ORDER BY tot DESC LIMIT 1
```

La table produit concurrent est composée des informations sur les produits vedettes des concurrents ; Donner la requête qui permet d’ajouter tous les produits du concurrent GleenAlu à la table Produits.
?

```sql
INSERT INTO Produit (Ref,Designation,PrixUnitaire,Dimension,code_machine) 
(SELECT Ref, Designation, PrixUnitaire, Dimension,code_machine FROM Produit_concurrent where Nom_Concurent="GleenAlu") 
```