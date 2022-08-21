# TP - Médiathèque

> Vous allez créer un système de gestion de médiathèque, qui contiendra une liste de médias (table `Media`) avec un type_id, correspondant à un type de média (musique, film, livre...) (table `Type`).

> Des utilisateurs (table `User`) peuvent louer un média.

## Base de données

Réalisation des tables suivantes :
```
Media
-------
id
title
creator
type_id
```

```
Type
-------
id
name
```

```
User
-------
id
name
media_id
```

## Affichage

Réalisez les pages suivantes, sans PHP pour le moment, avec des données brutes pour avoir un aperçu du rendu final.

```
ajout-type.php
ajout-user.php
ajout-media.php
liste-types.php
liste-users.php
liste-medias.php
index.php
```

> Le fichier `index.php` contiendra juste un lien vers chacune des 6 autres pages afin d'y accéder facilement.

## Formulaires

Maintenant que les pages sont prêtes, sans le PHP, on va ajouter la gestion des formulaires. Vous allez, pour les fichiers `ajout-*.php` :

- faire rediriger les formulaires vers les pages elles-même (par exemple, l'action de `ajout-type.php` sera `ajout-type.php`).

- gérer le formulaire (avec un `if ( !empty($_POST) ) { ... }` et enregistrer les données en base de données)

- Lorsque les données s'enregistrent **bel et bien en base de données** ( = vérifier dans PHPMyAdmin que les données s'enregistrent), vous redirigerez vers la page Liste, par exemple :

`Header('Location: liste-type.php');`

Attention à bien mettre cette ligne dans le `if ( !empty($_POST) ) { ... }` !

## Listes

Affichez les listes dans un tableau pour les fichiers `liste-*.php`.

## Bonus 

1. Afficher le type de média dans la page `liste-medias.php`
2. Afficher le média loué par un User dans la page `liste-users.php`
3. Faites un select pour gérer le type dans la page `ajout-media.php`
4. Faites une page profil-user.php, cliquable depuis la liste des users.
5. Faites un select pour ajouter un emprunt dans la page `profil-user.php`