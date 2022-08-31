# TP n ̊ 2. Dictionnaire de citations interactif

Ce TP est une première mise en œuvre simple d’une base de données MySQL. Le projet
consiste à créer un dictionnaire de citations littéraires interactif en ligne. Il ne s’agit pas
donc d’une banque de données statique mise en consultation. Chaque visiteur peut en enrichir le contenu avec ses citations préférées, qui sont ensuite rendues accessibles à tous. Le concept du site se rapproche de celui d’un forum puisque les données ne sont pas figées.

# L’interface
Pour créer une unité dans le site, chaque page doit incorporer les mêmes en-tête et pied
de page. L’interface comprend trois pages, la page d’accueil, la page d’affichage des
résultats et la page d’insertion.

## La page d’accueil
Nommée index.php, la page d’accueil comporte, outre les éléments décoratifs laissés à
votre libre choix, les éléments suivants :
- Bandeau contenant la citation du jour tirée au sort dans la base et affichée lors de
chaque connexion.
- Formulaire de recherche contenant une zone de saisie de texte dans laquelle le visiteur
saisit un mot-clé de recherche d’une citation. Il peut aussi préciser sa recherche en
choisissant dans une liste de sélection parmi les auteurs présents dans la base. Cette
liste est construite dynamiquement en interrogeant la base. Un dernier critère de sélec-
tion est constitué d’une seconde liste de sélection permettant de choisir le siècle des
citations, du XVI e au XXI e . Le critère de tri des résultats se fait par auteur ou par siècle
en fonction du choix effectué à l’aide de boutons radio. Aucun de ces critères n’étant
obligatoire, chaque choix doit posséder une valeur par défaut consistant à afficher
l’ensemble des citations. Le script de traitement de ce formulaire se trouve sur la page
d’affichage des résultats.
- Lien vers la page d’insertion de nouvelles citations.
La page d’affichage des résultats
Nommée affichecit.php, la page d’affichage des résultats contient les éléments suivants :
- Script gérant les saisies du formulaire. Ce script construit la requête SQL dynamique-
ment en fonction des choix opérés par le visiteur dans la page de recherche et gère
l’absence de mot-clé et de choix dans les listes de sélection afin de ne pas créer de
blocage du fait d’une requête mal construite.
- Résultats de la recherche effectuée par un visiteur. Chaque citation est présentée dans
une cellule de tableau HTML et est suivie du nom de l’auteur et de son siècle. Le tri
des citations se fait par siècle ou par nom d’auteur selon le choix fait par le visiteur.
- Lien vers la page d’accueil.
- Lien vers la page d’insertion.

## La page d’insertion
Nommée saisiecit.php, la page d’insertion comprend les éléments suivants :
- Formulaire contenant deux zones de saisie de texte pour le nom et le prénom de
l’auteur, une liste de sélection du siècle, une zone de saisie multiligne pour le texte
de la citation, ainsi que les habituels boutons d’effacement et d’envoi.
- Script de traitement des données situé dans le fichier lui-même, devant vérifier si
l’auteur existe déjà dans la base puis insérer les données et afficher un avis d’insertion
pour le visiteur.
- Lien vers la page d’accueil.

# La base de données MySQL
Nommée dico, la base de données doit répondre au modèle conceptuel de données représenté par les contraintes qui sont les suivantes :
- Un auteur peut avoir écrit plusieurs citations.
- Une citation donnée ne peut être l’œuvre que d’un seul auteur.

La base dico ne contient que deux tables.