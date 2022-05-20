https://aymeric-auberton.fr/academie/mysql/# Exercices

https://developpement-informatique.com/article/45/# Exercices-corriges-de-langage-sql

https://github.com/ponsfrilus/kata-sql

https://github.com/XD-DENG/SQL-exercise/tree/master/SQL_exercise_01

# Exercice 1

Soit la base de données d’un festival de musique : Dans une représentation peut participer un ou plusieurs musiciens. Un musicien ne peut participer qu’à une seule représentation.

    Representation (Num_Rep , titre_Rep , lieu)
    Musicien (Num_mus , nom , #Num_Rep)
    Programmer (Date , #Num_Rep , tarif)

La liste des titres des représentations.
?

La liste des titres des représentations ayant lieu au « théâtre allissa ».
?

La liste des noms des musiciens et des titres et les titres des représentations auxquelles ils participent.
?

La liste des titres des représentations, les lieux et les tarifs du 25/07/2008.
?

Le nombre des musiciens qui participent à la représentations n°20.
?

Les représentations et leurs dates dont le tarif ne dépasse pas 20DH.
?


# Exercice 2

Soit la base de données suivante :

    Départements :( DNO, DNOM, DIR, VILLE)
    Employés : ( ENO, ENOM, PROF, DATEEMB, SAL, COMM, #DNO)

Exprimez en SQL les requêtes suivantes :

Donnez la liste des employés ayant une commission
?

Donnez les noms, emplois et salaires des employés par emploi croissant, et pour chaque emploi, par salaire décroissant
?

Donnez le salaire moyen des employés
?

Donnez le salaire moyen du département Production
?

Donnes les numéros de département et leur salaire maximum
?

Donnez les différentes professions et leur salaire moyen
?

Donnez le salaire moyen par profession le plus bas
?

Donnez le ou les emplois ayant le salaire moyen le plus bas, ainsi que ce salaire moyen
? 

# Exercice 3

Soit le modèle relationnel suivant relatif à la gestion des notes annuelles d’une promotion d’étudiants :

    ETUDIANT(NEtudiant, Nom, Prénom)
    MATIERE(CodeMat, LibelléMat, CoeffMat)
    EVALUER(#NEtudiant, #CodeMat, Date, Note)

Exprimez en SQL les requêtes suivantes :

Quel est le nombre total d’étudiants ?
?

Quelles sont, parmi l’ensemble des notes, la note la plus haute et la note la plus basse ?
?

Quelles sont les moyennes de chaque étudiant dans chacune des matières ?
?

Quelles sont les moyennes par matière ? Avec la vue MGETU de la question 3 ( MOYETUMAT)
?

Quelle est la moyenne générale de chaque étudiant ? Avec la vue MGETU de la question 3 ( MOYETUMAT)
?

Quelle est la moyenne générale de la promotion ? Avec la vue MGETU de la question 5 :
?

Quels sont les étudiants qui ont une moyenne générale supérieure ou égale à la moyenne générale de la promotion? Avec la vue MGETU de la question 5
?


# Exercice 4

Soit la base de données intitulée "gestion_projet" permettant de gérer les projets relatifs au développement de logiciels. Elle est décrite par la représentation textuelle simplifiée suivante :

    Developpeur (NumDev, NomDev, AdrDev, EmailDev, TelDev)
    Projet (NumProj, TitreProj, DateDeb, DateFin)
    Logiciel (CodLog, NomLog, PrixLog, #NumProj)
    Realisation (#NumProj, #NumDev)

Ecrire les requêtes SQL permettant :

D’afficher les noms et les prix des logiciels appartenant au projet ayant comme titre « gestion de stock », triés dans l’ordre décroissant des prix .
?

D’afficher le total des prix des logiciels du projet numéro 10. Lors de l’affichage, le titre de la colonne sera « cours total du projet ».
?

Afficher le nombre de développeurs qui ont participé au projet intitulé « gestion de stock »
?

Afficher les projets qui ont plus que 5 logiciels
?

Les numéros et noms des développeurs qui ont participés dans tout les projets.
?

Les numéros de projets dans lesquelles tous les développeurs y participent dans sa réalisation.
?


# Exercice 5

Ci-après, on donne la représentation textuelle simplifiée d’une base de données concernant un cycle de formation destiné à des étudiants. Il regroupe un ensemble de matières. On considère que chaque enseignant n’enseigne qu’une seule matière et qu’à la fin du cycle de formation, une note par matière, est attribuée à chaque étudiant. D’autre par, les étudiants peuvent ne pas suivre les mêmes matières.

    ETUDIANT(CodeEt, NomEt, DatnEt)
    MATIERE(CodeMat, NomMat, CoefMat)
    ENSEIGNANT(CodeEns, NomEns, GradeEns, #CodeMat)
    NOTE(#CodeEt, #CodeMat, note)

Ecrire les requêtes SQL permettant d’afficher :

Les informations relatives aux étudiants (Code, Nom et Date de naissance) selon l’ordre alphabétique croisant du nom
?

Les noms et les grades des enseignants de la matière dont le nom est ‘BD’.
?

La liste distincte formée des noms et les coefficients des différentes matières qui sont enseignées par des enseignants de grade ‘Grd3’.
?

La liste des matières (Nom et Coefficient) qui sont suivies par l’étudiant de code ‘Et321’.
?

Le nombre d’enseignants de la matière dont le nom est ‘Informatique’
?


# Exercice 6

On considère la base de données BD_AIR_MAROC suivante :

    PILOTE (NUMPIL, NOMPIL, VILLE, SALAIRE)
    AVION (NUMAV, NOMAV, CAPACITE, VILLE)
    VOL (NUMVOL, #NUMPIL, #NUMAV, VILLE_DEP, VILLE_ARR, H_DEP, H_ARR)

Donnez la liste des avions dont la capacité est supérieure à 350 passagers.
?

Quels sont les numéros et noms des avions localisés à Marrakech ?


Quels sont les numéros des pilotes en service et les villes de départ de leurs vols ?


Donnez toutes les informations sur les pilotes de la compagnie.
?

Quel est le nom des pilotes domiciliés à Meknès dont le salaire est supérieur à 20000 DH ?


Quels sont les avions (numéro et nom) localisés à Marrakech ou dont la capacié est inférieure à 350 passagers ?
?

Quels sont les numéros des pilotes qui ne sont pas en service ?
?

Donnez le numéro des vols effectués au départ de Marrakech par des pilotes de Meknès ?
?

Quels sont les vols effectu"s par un avion qui n’est pas localisé à Marrakech ?
?

Quelles sont les villes desservies à partir de la ville d’arrivée d’un vol au départ de Guelmim ?
?


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

Nom et adresse des employés qui travaillent au département de recherche.
?

Nom et Prénom des employés dont le supérieur est Taha Lamharchi.
?

Nom des employés qui travaillent plus de 10heures sur un projet à Guelmim
?

Nom des projets sur lesquelles travaillent Taha Lamharchi et Dounia Mahmoud.
?

Nom et prénom des employés qui ne travaillent sur aucun projet.
?

Numéro des projets qui ont au moins un participant de chaque département.
?

Nom des employés qui ne travaillent pas sur un projet à Guelmim.
?


# Exercice 8

Soit le schéma relationnel suivant qui représente la base de données d’une agence de voyage en ligne.

    CLIENT (NumCli, Nom, Prénom, e-mail, NumCB )
    VOYAGE (CodeVoyage, Destination, Durée, Prix )
    RESERVATION (#NumCli, #CodeVoyage, DateRes )

Formuler en SQL les requêtes suivantes :

Nom, prénom et e-mail des clients ayant une réservation en cours
?

Nom, prénom et e-mail des clients n’ayant aucune réservation en cours
?

Destination et liste des clients ayant réservés pour un voyage de plus de 10 jours et coûtant moins de 1000 DH.
?

Numéros de tous les clients ayant réservés sur tous les voyages proposés.
?

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

Nom des villes abritant un cinéma nommé « RIF »
?

Nom des cinémas situés à Meknès ou contenant au moins une salle de plus 100 places
?

Nom, adresse et ville des cinémas dans lesquels on joue le film « Hypnose » la semaine 18
?

Numéro d’exploitation des films projetés dans toutes les salles
?

Titre des films qui n’ont pas été projetés
?


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

Quel est le nombre de kilomètres total du Tour de France 97 ?
?

Quel est le nombre de kilomètres total des étapes de type "Haute Montagne" ?
?

Quels sont les noms des coureurs qui n’ont pas obtenu de bonifications ?
?

Quels sont les noms des coureurs qui ont participé à toutes les étapes ?
?

Quel est le classement général des coureurs (nom, code équipe, code pays et temps des coureurs) à l’issue des 13 premières étapes sachant que les bonifications ont été intégrées dans les temps réalisés à chaque étape ?
?

Quel est le classement par équipe à l’issue des 13 premières étapes (nom et temps des équipes) ?
?


# Exercice 11 : Extrait HEC 2014

A partir du système d’information de l’entreprise. le service des ressources humaines peut extraire et analyser les infor- mations relatives à tous les personnels. celui-ci lui permet en particulier d’exercer un suivi dans le domaine de la formation. un extrait de ce domaine est présenté sours forme d’un schéma relation :

![image](https://developpement-informatique.com/upload/33b7c9db414ef0f2cdf22c6f2f180df68b74f91c.png)

Construire les requêtes en langage SQL permettant de répondre aux questions suivantes :

Quel est le nombre de formations suivies par catégories de salariés ayant débuté au cours de la période du 01/06/2011 au 31/12/2011 ?
?

Quelles sont les catégories pour lesquelles le nombre d’heures de formation est supérieur à la moyenne du nombre d’heures des formations suivies par l’ensemble des personnels ?
?

le responsable des ressources humaines souhaite intégrer dans la base de données une nouvelle formation liée au sertissage des boîtes de conserve.
Les nouvelles données à insérer sont les suivantes : "FORM587, sertissage niveau 1, 25j, perfectionnement, 12, 525 " Ecrire la requête permettant de mettre à jour la base.
?


# Exercice 12

La société X utilise le logiciel de gestion de base de données Access pour gérer ses clients et ses représentants. Voici la liste des tables crées dans Access :

![image](https://developpement-informatique.com/upload/93743ff2b843f6a730722fb5618f7c296d3aa6c0.png)

Ecrire les requêtes suivantes

Afficher la liste des clients appartenant à la catégorie tarifaire n°1, classée par ordre alphabétique
?

Afficher la liste des clients (code, nom de client) rattachés au représentant HINAUD
?

Afficher la liste des clients bénéficiant d’une remise de 10%
?

Afficher la liste des représentants (Numéro et nom) dépendant du chef de secteur PONS
?

Afficher la liste des départements (code, nom, chef de secteur)
?

Afficher la liste des chefs de secteur
?


# Exercice 13

Le responsable du SAV d’une entreprise d’électroménager a mis en place une petite base de données afin de gérer les interventions de ces techniciens. Le modèle relationnel à la source de cette base de données est le suivant :

    Client (Codecl, nomcl, prenomcl, adresse, cp, ville)
    Produit (Référence, désignation, prix)
    Techniciens (Codetec, nomtec, prenomtec, tauxhoraire)
    Intervention (Numéro, date, raison, #codecl, #référence, #codetec)

Le responsable vous demande d’écrire en langage SQL les requêtes suivantes :

La liste des produits (référence et désignation) classées du moins cher au plus cher.
?

Le nombre d’intervention du technicien n°2381.
?

La liste des clients ayant demandé une intervention pour des produits d’un prix supérieur à 300 dhs.
?

Les interventions effectuées par le technicien : ‘Mestiri Mohamed’ entre le 1er et le 31 août 2009.
?

Par ailleurs il vous informe que le produit référencé 548G a vu son prix augmenter (nouveau prix = 320 dhs).
?

Vous apprenez également par le directeur des ressources humaines qu’un nouveau technicien a été recruté : son code est le 3294, il s’appelle ‘El Abed Ridha’ et est rémunéré à un taux horaire de 15 dhs.
?


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

la liste des clients de marrakech.
?

la liste des produits (Numprod, désignation, prix) classés de plus cher au moins cher.
?

noms et adresses des vendeurs dont le nom commence par la lettre ‘M’.
?

la liste des commandes effectuées par le vendeur "Mohammed" entre le 1er et 30 janvier 2020.
?

le nombre des commandes contenant le produit n° 365.
?

# Exercice 15

Soit la base de données suivante :

![image](https://developpement-informatique.com/upload/93466eff73d076c3f4b5e440bff356e1da98975d.png)

Ecrire les commandes SQL permettant de rechercher :

La liste de tous les étudiants.
?

Nom et coefficient des matières.
?

Les numéros des cartes d’identité des étudiants dont la moyenne entre 7 et 12.
?

La liste des étudiants dont le nom commence par ‘ben’.
?

Le nombre des étudiants qui ont comme matière ‘12518’.
?

La somme des coefficients des matières.
?

Les noms des étudiants qui une note_examen >10.
?

Afficher les noms et les coefficients des matières étudier par l’étudiant "01234568".
?

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

Rédiger la requête SQL permettant d’obtenir la liste des phases ayant connue un incident de "sur-chauffage" pour le mois Mai 2019.
?

Rédiger la requête SQL permettant d’obtenir le nombre d’incidents non clôturés.
?

Rédiger la requête SQL permettant d’obtenir la liste des noms des stations ayant eu plus de dix incidents.
?

# Exercice 17

Voici un extrait de la base de données gestion des ventes :

    Produit (Ref, Designation, PrixUnitaire, Dimension, #code_Machine)
    Vente (Ncom, #Ref, Qte , DateLiv)
    Commande (Ncom, DateCmd, #CodeClt,#Code_Salarie)
    Produit_concurrent(Ref,Designation,PrixUnitaire,PrixUnitaire,Dimension,#code_Machine,Nom_Concurrent)

Donner la requête qui permet d’obtenir le chiffre d’affaire mensuel de l’année en cours
?

Donner la requête qui calcule le taux de vente de chaque produit.
?

Donner la requête qui affiche le produit le plus vendu du mois en cour.
?

La table produit concurrent est composée des informations sur les produits vedettes des concurrents ; Donner la requête qui permet d’ajouter tous les produits du concurrent GleenAlu à la table Produits.
?