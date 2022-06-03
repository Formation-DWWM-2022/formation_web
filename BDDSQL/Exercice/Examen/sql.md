# Fiche examen SQL

## Déroulement :
> Vous avez accès à internet, support de cours, vous ne pouvez pas communiquer entre vous.

> Vous devrez me fournir un document avec toutes vos requêtes SQL dedans, toute requête manquante est comptée comme fausse (les jeux de tests sont aussi nécessaire !)

## Création de base de données :
Vous souhaitez créer un logiciel de gestion de bibliothèque musicale, appelons le DeeziFy.

Vous aurez besoin de stocker ces informations (le choix des types est votre, soyez rigoureux) :

- Les chansons :
    - Nom de la chanson
    - Le(s) artiste(s) qui ont participé à la chanson
    - La durée
- Les artistes :
    - Nom de l’artiste
    - Une description de celui-ci, qui peut être longue
    - URL vers le site web de l’artiste
    - Le(s) genre(s) de l’artiste
    - Année de début
- Les utilisateurs :
    - Nom de compte
    - Courriel de l’utilisateur
    - Mot de passe de l’utilisateur
    - Numéro de téléphone de l’utilisateur
    - Prénom de l’utilisateur
    - Nom de l’utilisateur
    - Date de naissance de l’utilisateur
    - Date de dernière connexion
- Les playlists, un utilisateur peut faire plusieurs playlists :
    - Nom de la playlist
    - Les chansons présentes dans la playlist, une chanson peut-être présente dans plusieurs playlists
    - Date de dernière modification

*Vous devez créer la base de données avec les tables et les relations nécessaires.
Ajoutez quelques lignes de données afin de tester que tout fonctionne.*

## Requêtes :
1. Faire une requête qui permet d’afficher toutes les chansons pour une playlist donnée.
2. Faire une requête qui permet de donner le genre le plus écouté par utilisateur.
3. Faire une requête qui permet d’afficher les 10 premières chansons pour une playlist donnée, puis une requête permettant d’afficher les 10 suivantes.
4. Afficher par chanson, les différentes playlists où elles sont utilisées, et uniquement celles étant dans une playlist.
5. Afficher l’âge des utilisateurs.
6. Afficher par âge, le style de musique le plus écouté.
7. Afficher la chanson la plus longue de l’application.
8. Faire une requête qui permet de supprimer les utilisateurs ne s’étant pas connecté depuis plus d’un an.
