# 1. TP POO J1
<!-- https://github.com/TyTy-cf/hb-php/tree/main/poo/exo_1 -->

## Concept de l'exercice

Votre client souhaite concurrencer un grand site de musique en ligne.

Vous devrez modéliser les classes nécessaire pour le faire.

Votre application doit permettre de :
* Stocker des chansons (un nom, une durée, un prix, une chanson a plusieurs artistes)
* Stocker des albums (un nom, une année de sortie, prix, un album est composé de plusieurs chansons, mais une chanson peut avoir plusieurs albums...)
* Stocker les artistes (un nom, une nationalité, une année de début, un artiste a plusieurs albums, un artiste a plusieurs styles de musique
* Stocker les styles de musiques (un nom)
* Stocker les utilisateurs (??????)
* Stocker les playlists des utilisateurs, une playlist est composé de plusieurs chansons, une chanson peut -être dans plusieurs playlist, une playlist a un nom, une date de création et une date de modification)


Voici un jeu de donnée pour créer vos objets :

* Chansons :
* (1, 'Fight fire with fire', '00:04:45', 0.99)
* (2, 'Ride the lightning', '00:06:37', 0.99)
*(3, 'For whom the bell tolls', '00:05:10', 0.99)
* (4, 'Fade to black', '00:06:57', 0.99)
* (5, 'Trapped under ice', '00:04:04', 0.99)
* (6, 'Escape', '00:04:24', 0.99)
* (7, 'Creeping death', '00:06:36', 0.99)
* (8, 'The call of Ktulu', '00:08:53', 0.99)
* (9, 'The ringer', '00:05:38', 0.99)


* Album :
* (1, 'Ride the lightning', 1984, 0, 10.99)


* Artiste :
  *(1, 'Metallica', 'American', 1981)
  

* Styles :
 * (1, 'Heavy metal')
 * (2, 'Thrash metal')
 * (3, 'Hard rock')


# 2. TP POO J2

- Faites une fonction dans la classe Song, qui permet de récupérer la durée de celle-ci sous forme d'entier (en seconde)


- Faites une fonction dans la classe album, qui permet de calculer la durée total de celui-ci, et de l'afficher sous forme : "hh:mm:ss"