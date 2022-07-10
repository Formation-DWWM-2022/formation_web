## La session [8 min] -> Q/R

<https://grafikart.fr/tutoriels/session-php-1128#autoplay>

### Exo 20

Pour cet exercice, il faut réaliser un jeu de calcul. Les calculs doivent être générés au hasard parmi les opération +, - et *. Les 2 opérandes sont des nombres choisis aléatoirement entre 0 et 20.

- Il faut pouvoir :

        répondre au calcul proposé ;
        changer d'utilisateur ;
        clôturer la partie.

- Lors de la réponse, le résultat est vérifié; si celui-ci est correct, le joueur marque un point, sinon il perd un point.
- Lorsque l'on veut changer de joueur, 2 options sont possibles :

        le joueur existe déjà et peut être choisi dans un menu déroulant;
        le joueur n'existe pas et doit être ajouté via un champ de texte.

- Lors de la clôture d'une partie, on est dirigé vers une nouvelle page affichant les résultats de tous les joueurs. On affichera les points, le nombre de bonnes réponses, le nombre de mauvaises réponses et le pourcentage de bonnes réponses données. Les résultats sont affichés par ordre de points décroissants.

### Exo 21
#### 21a
Faire une page HTML permettant de donner à l'utilisateur :
- son User Agent
- son adresse ip
- le nom du serveur

#### 21b
Sur la page index, faire un liens vers une autre page. Passer d'une page à l'autre le contenu des variables **lastname**, **firstname** et **age** grâce aux sessions. Ces variables auront été définies directement dans le code.  
Il faudra afficher le contenu de ces variables sur la deuxième page.

#### 21c
Faire un formulaire qui permet de récupérer le login et le mot de passe de l'utilisateur. A la validation du formulaire, stocker les informations dans un cookie.

#### 21d
Faire une page qui va récupérer les informations du cookie créé à l'exercice 3 et qui les affiches.

#### 21e
Faire une page qui va pouvoir modifier le contenu du cookie de l'exercice 3.