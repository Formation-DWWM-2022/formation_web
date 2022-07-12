#### Chaque exercice sera fait dans un nouveau component, vous devez avoir un lien dans votre NavBar vers chaque exos ####

### Exercice 1 ###
Créer un compteur
Il commence à 0
On doit pouvoir l'incrémenter de 1 et de 5 (en positif et négatif)
On doit pouvoir le reset (retour à 0)
De plus, il change de couleur en fonction de sa valeur :
0 : jaune
Positif, il sera vert (#4af778)
Négatif, il sera rouge (#ff0016)

### Exercice 2 ###
Créer Une liste de Jeux (Uniquement le titre) Exemple : ['Elden Ring', 'Zelda', 'Mario', 'Sonic']
Affichez tout ces jeux dans une card bootstrap grace à un ngFor dans votre template HTML.
Je veux voir apparaitre dans les cards des jeux, un boutton Ajouter au panier.

Débrouillez vous pour que lorsque qu'un clique sur le bouton d'un jeu est effectué, le jeu est rajouté dans votre Panier.
Votre Panier sera Afficher juste en dessous des jeux.
Si votre Panier est à 0, affichez la phrase 'Aucun jeu dans le panier !'.
Si votre Panier comporte des jeux, affichez les tous.
Chaque Jeu dans votre panier va avoir un bouton 'Supprimer le jeu'.
Lorsque que l'on clique sur ce bouton, le jeu en question est effacé du panier.

Ajouter aussi une phrase indiquant le nombre de jeux dans votre panier : "Vous avez actuellement x jeux dans votre panier"

### Exercice 3 ###
Créer vous une classe Student dans votre dossier model. 
Student va avoir :
    - un nom,
    - un age,
    - un sexe
    - des activités (les activité seront listé sous forme de tableau ex: ['Badminton', 'Course à pied', 'Volley', 'FootBall'])

Créer vous un tableau de student dans votre component. (4 students)
En reprenant un tableau HTML sur bootstrap, affichez tous les students avec leur nom, age et sexe
Si le student a plus de 15 ans, Vous allez afficher dans votre tableau : Au lycée !
Si le student a moins ou 15 ans, Vous allez afficher dans votre tableau : Au collège !

Il va aussi falloir afficher leur activitées dans le tableau séparé par une virgule ! ex : Badminton, Course à pied, Volley, FootBall.

### Exercice 4 ###
Créer un jeu de memory !
- Soit vous partez avec votre idée pour le faire (Je veux au moins une Class MemoryCard pour chaque carte du jeu)
- Soit vous suivez les instructions ici :

    - Pour le jeu du memory on va se créer 2 Class :
        - MemoryCard (id: number, image: string, hasBeenFoud: boolean, hasBeenReturned: boolean)
            - hasBeenFound et hasBeenReturned NE SONT PAS a passer au constructeur, elles doivent etre a false de base.
        - MemoryConstructor (Une class sans propriété qui va juste nous servir à construire notre jeu de carte)

    - Dans un premier temps le but va être de créer notre tableau de MemoryCards (jeu de 12 cartes pour commencer)
        - Dans votre component vous devez appeler une methode de votre MemoryConstructor qui va vous retourner un tableau de MemoryCards
            - Dans ce tableau vous devez avoir vos 12 cartes, dont à chaque fois 2 identiques (meme id et meme images)
            - Ce tableau doit etre trié de facon random.

    - Votre tableau étant récupéré faite une boucle dans votre template html et affichez moi toutes vos cartes.
        - Débrouillez vous un peu comme voulez en css pour que quand hasBeenFound ou hasBeenReturned sont a true l'image apparaisse, sinon elle n'apparait pas.
    
    - Créer une fonction au clique sur une de vos cartes, pour que le hasBeenReturned passe à true ou à false
        - Vous devriez donc pouvoir enchainer les clics pour faire apparaitre disparaitre votre image !

    - A vous de réfléchir au reste de l'algo nécessaire pour faire fonctionner votre memory !  (si vous êtes trop perdu demandez moi)

    - une fois votre memory terminé : mettez en place des boutons au dessus de votre jeu pour recommencer la partie (un boutton pour jouer avec 12 cartes, l'autre pour jouer avec 24 cartes)

    
### Exercice 5 ###
## Exercice 5.1 ##
Attention pas mal long et pas mal difficile (surtout le dernier :P)
On va essayer de reproduire un jeux vidéo simple (RPG type Final Fantasy)

Commencer par créer :
    - une class Personnage
        - name (le nom du personnage)
        - pvMax (le nombre de points de vie du personnage) de base => 200
        - pv (le nombre de points de vie actuel du personnage) de base => 200
        - magicPower (un nombre entre 0 et 100 représentant la puissance magique) de base => 45
        - attackPower (un nombre entre 0 et 100 représentant la puissance d'attaque) de base => 45

    - une class Warrior qui va etendre de Personnage
        - ses pv et pvMax passent à 300
        - sa magicPower passe à 20
        - son attackPower passe à 70
    
    - une class Mage qui va étendre de Personnage
        - son magicPower passe à 70
        - son attackPower passe à 25

    - une class Healer qui va étendre de Personnage
        - ses pv et pvMax passent à 150
        - son magicPower passe à 80
        - son attackPower passe à 10


## Exercice 5.2 ##
Faites en sorte que tout vos personnage puisse attaquer un autre personnage !
- créer une instance de chacune de nos 3 personnages.
- créer la méthode attaque au sein de votre classe mère personnage
    - à chaque fois qu'un personnage en attaque un autre nous devons voir apparaître dans la console : "{nom_du_perso} a attaqué {nom_de_l'autre_perso} de 50 ! Il reste {nombre_de_pv} pvs à {nom_de_l'autre_perso}"
    - l'attaque que va faire le perso1 sur le perso2 sera calculé de cette manière : (nombre aléatoire entre 0.5 et 1) * l'attackPower.
    - Mettez en place à un critique ! -> quand un perso lance une attaque, mettez une chance de coup critique de 10%, si on tombe sur un coup critique l'attaque fera 20% de point de dégats en plus
        -  Vous devez rajouter un Message dans la console si jamais ça arrive : "Coup critique !"

## Exercice 5.3 ##
Faites battre 2 Warrior jusqu'à la mort ! 
Dans une boucle faites combattre 2 Warrior, quand l'un des deux persos à ses pv qui arrive à 0 ou en dessous de 0 sortez de la boucle et affichez ce message : {nom_du_joueur} a battu {nom_de_lautre_joueur} !


## Exercice 5.4 ##
Mettez en place une methode heal() sur votre class Healer
    - La méthode heal() devra soigner un personnage (attention le personnage qui est soigné ne peux pas depasser ses PV_MAX)
    - le heal sera calculé de la meme manière que la méthode attaque() mais est basé sur le magicPower au lieu de l'attackPower.
    - la console devra aussi affiché un message : {nom_du_perso} a soigné {nom_de_l'autre_perso} de 50 ! Il reste {nombre_de_pv} pvs à {nom_de_l'autre_perso}

## Exercice 5.5 ##
A vous devoir comment mettre en place une méthode attackMagick logique à votre class Mage.

## Exercice 5.6 ##
Pas mal difficile Attention ! 
Le but va être d'organiser un comabt entre 2 équipes !
chaque équipe contien : 1 Healer, 1 Warrior et 1 Mage, que vous allez stocker dans un tableau.
    - Déroulement du combat : le combat se passera au tour par tour : 
        - le premier à attaquer est le 1 perso de l'équipe 1, ensuite le 1 perso de l'équipe 2, suivi du 2eme perso de l'équipe, 2 eme perso de l'équipe 2 etc etc.
        - le warrior Attaquera avec la fonction attaque() un ennemi aléatoire de l'équipe ennemi
        - le healer fera la meme chose que le warrior à moin que un membre de son équipe est la moitier de ses pv en moins, dans ce cas il soignera la personne dans son équipe
        - le magicien fera la même chose que le warrior mais avec son attaque magique.

        - PREVOYER LES MORTS DANS UNE EQUIPE : un mort ne peux attaquer ou être attaquer ni être soigné.