# Présentation d’Arduino

- Les bases de l'Arduino ! <https://www.youtube.com/watch?v=TV6ELrQOCcw>
- PROGRAMMER DES ARDUINO en 10 MIN !! (Tuto débutant) <https://www.youtube.com/watch?v=ihhID9Uvunk>
- TOP 10 des projets Arduino de tous les temps | 2022 <https://www.youtube.com/watch?v=-p_8u_0GNZE&pp=ugMICgJmchABGAE%3D>

Arduino, ce sont des cartes électroniques programmables, avec un certain nombre d'entrées/sorties. Quoi ? c'est pas précis ? OK, je recommence.

Une carte Arduino, ça ressemble (de manière non exhaustive, parce qu'il y a enormément de modèles et de clones) à ceci :

![](https://putaindecode.io/public/images/articles/2018-05-07-programmation-arduino-presentation-pour-les-debutants/Arduino_Uno.jpg)

C'est une carte électronique open source, constituée essentiellement de :

- un microcontrôleur fabriqué par Atmel,
- un port USB,
- des connecteurs d'entrés/sortie (plus ou moins nombreux selon les modèles).

L'open hardware, par analogie à l'open software, permet de partager les plans pour pouvoir répliquer, améliorer, comprendre un dispositif matériel.

Arduino, c'est aussi un IDE (disons plutôt un éditeur de code) qui permet d'envoyer les programmes sur la carte à travers un port USB.

Comment faire de l’électronique en utilisant un langage de programmation ? La réponse, c’est le projet Arduino qui l’apporte. Vous allez le voir, celui-ci a été conçu pour être accessible à tous par sa simplicité. Mais il peut également être d’usage professionnel, tant les possibilités d’applications sont nombreuses.

Une équipe de développeurs composée de Massimo Banzi, David Cuartielles, Tom Igoe, Gianluca Martino, David Mellis et Nicholas Zambetti a imaginé un projet répondant au doux nom de Arduino et mettant en œuvre une petite carte électronique programmable et un logiciel multiplateforme, qui puisse être accessible à tout un chacun dans le but de créer facilement des systèmes électroniques. Étant donné qu’il y a des débutants parmi nous, commençons par voir un peu le vocabulaire commun propre au domaine de l’électronique et de l’informatique.

"Qu'est-ce qu'on peut faire d'un bidule pareil aujourd'hui ?"

Eh bien on peut interagir avec le monde réel, car contrairement à un PC qui dispose de 3 ou 4 ports USB (et je ne parle même pas des Mac), une petite carte comme celle-ci peut gérer des moteurs, des systèmes d'affichage, des capteurs (accéléromètres, température, pression atmosphérique, luminosité, et la liste est loin d'être exhaustive).

Au final, ça sert à fabriquer des machines. Elles peuvent être autonomes, discuter entre elles ou avec un PC, et réagir à leur environnement.

La grosse vague des imprimantes 3D a eu lieu grâce à ces petits bidules.

Le projet ArduPilot propose des firmwares et shields (extensions qui se connectent directement sur la carte) destinés à gérer des drones (multicoptères, avions, rovers) dans toutes leurs fonctions (moteurs, stabilisation, GPS, altimètre…)

## Une carte électronique

Une carte électronique est un support plan, flexible ou rigide, généralement composé d'epoxy ou de fibre de verre. Elle possède des pistes électriques disposées sur une, deux ou plusieurs couches (en surface et/ou en interne) qui permettent la mise en relation électrique des composants électroniques. Chaque piste relie tel composant à tel autre, de façon à créer un système électronique qui fonctionne et qui réalise les opérations demandées.

Évidemment, tous les composants d’une carte électronique ne sont pas forcément reliés entre eux. Le câblage des composants suit un plan spécifique à chaque carte électronique, qui se nomme le schéma électronique.

Enfin, avant de passer à la réalisation d’un carte électronique, il est nécessaire de transformer le schéma électronique en un schéma de câblage, appelé typon.

![](https://zestedesavoir.com/media/galleries/954/46a27fd4-4c04-4076-8692-f3ca0a2b8250.png.960x960_q85.jpg)

## Une fois que l’on a une carte électronique, on fait quoi avec ?

Eh bien une fois que la carte électronique est faite, nous n’avons plus qu’à la tester et l’utiliser ! Dans notre cas, avec Arduino, nous n’aurons pas à fabriquer la carte et encore moins à la concevoir. Elle existe, elle est déjà prête à l’emploi et nous n’avons plus qu’à l’utiliser. Et pour cela, vous allez devoir apprendre comment l’utiliser, ce que je vais vous montrer dans ce tutoriel.

## Programmable ?

J’ai parlé de carte électronique programmable au début de ce chapitre. Mais savez-vous ce que c’est exactement ? Non pas vraiment. Alors voyons ensemble de quoi il s’agit. La carte Arduino est une carte électronique qui ne sait rien faire sans qu’on lui dise quoi faire. Pourquoi ? Eh bien c’est dû au fait qu’elle est programmable. Cela signifie qu’elle a besoin d’un programme pour fonctionner. Un programme est une liste d’instructions qui est exécutée par un système.

Il va attendre que vous lui demandiez quelque chose pour aller le chercher et ensuite vous le montrer. Eh bien, tout aussi simplement que ces deux cas, une carte électronique programmable suit une liste d’instructions pour effectuer les opérations demandées par le programme.

## Et on les trouves où ces programmes ? Comment on fait pour le mettre dans la carte ? o_O

Des programmes, on peut en trouver de partout. Mais restons concentrés sur Arduino. Le programme que nous allons mettre dans la carte Arduino, c’est nous qui allons le réaliser. Oui, vous avez bien lu : nous allons programmer cette carte Arduino. Bien sûr, ce ne sera pas aussi simple qu’une liste de course, mais rassurez-vous cependant car nous allons réussir quand même ! Je vous montrerai comment y parvenir, puisque avant tout c’est un des objectifs de ce cours. Voici un exemple de programme :

```c++
// définition de la broche 2 de la carte en tant que variable
const int led_rouge = 2;

// fonction d'initialisation de la carte
void setup()
{
    // initialisation de la broche 2 comme étant une sortie
    pinMode(led_rouge, OUTPUT);
}

void loop()
{
    // allume la LED
    digitalWrite(led_rouge, LOW);
    // fait une pause de 1 seconde
    delay(1000);
    // éteint la LED
    digitalWrite(led_rouge, HIGH);
    // fait une pause de 1 seconde
    delay(1000);
}
```

Vous le voyez comme moi, il s’agit de plusieurs lignes de texte, chacune étant une instruction. Ce langage ressemble à un véritable baragouin et ne semble vouloir a priori rien dire du tout… Et pourtant, c’est ce que nous saurons faire dans quelques temps

## Et un logiciel ?

Bon, je ne vais pas vous faire le détail de ce qu’est un logiciel, vous savez sans aucun doute de quoi il s’agit. Ce n’est autre qu’un programme informatique exécuté sur un ordinateur. Oui, pour programmer la carte Arduino, nous allons utiliser un programme ! En fait, il va s’agir d’un compilateur. Alors qu’est-ce que c’est exactement ?

## Un compilateur

En informatique, ce terme désigne un logiciel qui est capable de traduire un langage informatique, ou plutôt un programme utilisant un langage informatique, vers un langage plus approprié afin que la machine qui va le lire puisse le comprendre. C’est un peu comme si le patron anglais d’une firme Chinoise donnait des instructions en anglais à un de ses ouvriers chinois. L’ouvrier ne pourrait comprendre ce qu’il doit faire. Pour cela, il a besoin que l’on traduise ce que lui dit son patron. C’est le rôle du traducteur. Le compilateur va donc traduire les instructions du programme précédent, écrites en langage texte, vers un langage dit "machine". Ce langage utilise uniquement des 0 et des 1. Nous verrons plus tard pourquoi. Cela pourrait être imagé de la façon suivante :

![](https://zestedesavoir.com/media/galleries/954/2575329f-0088-4c95-8a8e-da4bfc1d8c06.png.960x960_q85.jpg)

Donc, pour traduire le langage texte vers le langage machine (avec des 0 et des 1), nous aurons besoin de ce fameux compilateur. Et pas n’importe lequel, il faut celui qui soit capable de traduire le langage texte Arduino vers le langage machine Arduino. Et oui, sinon rien ne va fonctionner. Si vous mettez un traducteur Français vers Allemand entre notre patron anglais et son ouvrier chinois, ça ne fonctionnera pas mieux que s’ils discutaient directement. Vous comprenez ?

> Et pourquoi on doit utiliser un traducteur, on peut pas simplement apprendre le langage machine directement ?

Comment dire… non ! Non parce que le langage machine est quasiment impossible à utiliser tel quel. Par exemple, comme il est composé de 0 et de 1, si je vous montre ça : "0001011100111010101000111", vous serez incapable, tout comme moi, de dire ce que cela signifie ! Et même si je vous dis que la suite "01000001" correspond à la lettre "A", je vous donne bien du courage pour coder rien qu’une phrase ! :P Bref, oubliez cette idée. C’est quand même plus facile d’utiliser des mots anglais (car oui nous allons être obligés de faire un peu d’anglais pour programmer, mais rien de bien compliqué rassurez-vous) que des suites de 0 et de 1. Vous ne croyez pas ?

## Pourquoi choisir Arduino ?

Avec Arduino, nous allons commencer par apprendre à programmer puis à utiliser des composants électroniques. En fin de compte, nous saurons créer des systèmes électroniques plus ou moins complexes. Mais ce n’est pas tout…

D’abord, Arduino c’est… une carte électronique programmable et un logiciel gratuit :

![](https://zestedesavoir.com/media/galleries/954/4d259bf8-aae4-4476-9bd3-84dc431f2fec.png.960x960_q85.jpg)

Mais aussi

- Un prix dérisoire étant donné l’étendue des applications possibles. On comptera 20 euros pour la carte simple. Le logiciel est fourni gratuitement !
- Une compatibilité sous toutes les plateformes, à savoir : Windows, Linux et Mac OS.
- Une communauté ultra développée ! Des milliers de forums d’entre-aide, de présentations de projets, de propositions de programmes et de bibliothèques, …
- Un site en anglais arduino.cc et un autre en français arduino.cc où vous trouverez tout de la référence Arduino, le matériel, des exemples d’utilisations, de l’aide pour débuter, des explications sur le logiciel et le matériel, etc.
- Une liberté quasi absolue. Elle constitue en elle-même deux choses :
  - Le logiciel : gratuit et open source, développé en Java, dont la simplicité d’utilisation relève du savoir cliquer sur la souris.
  - Le matériel : cartes électroniques dont les schémas sont en libre circulation sur internet.

Cette liberté a une condition : le nom « Arduino » ne doit être employé que pour les cartes « officielles ». En somme, vous ne pouvez pas fabriquer votre propre carte sur le modèle Arduino et lui assigner le nom « Arduino ».

Et enfin, les applications possibles

Voici une liste non exhaustive des applications possibles réalisées grâce à Arduino :

- contrôler des appareils domestiques
- donner une "intelligence" à un robot
- réaliser des jeux de lumières
- permettre à un ordinateur de communiquer avec une carte électronique et différents capteurs
- télécommander un appareil mobile (modélisme)
- etc.

Il y a une infinité d’autres utilisations, vous pouvez simplement chercher sur votre moteur de recherche préféré ou sur Youtube le mot "Arduino" pour découvrir les milliers de projets réalisés avec !

## Arduino à l’école

Pédagogiquement, Arduino a aussi pas mal d’atouts. En effet, ses créateurs ont d’abord pensé ce projet pour qu’il soit facile d’accès. Il permet ainsi une très bonne approche de nombreux domaines et ainsi d’apprendre plein de choses assez simplement.

Voici quelques exemples d’utilisation possible :

- Simuler le fonctionnement des portes logiques
- Permettre l’utilisation de différents capteurs
- Mettre en œuvre et faciliter la compréhension d’un réseau informatique
- Se servir d’Arduino pour créer des maquettes animées montrant le fonctionnement des collisions entres les plaques de la croûte terrestre, par exemple ^^
- Donner un exemple concret d’utilisation des matrices avec un clavier alphanumérique 16 touches ou plus
- Être la base pour des élèves ayant un TPE à faire pour le BAC
- …

De plus, énormément de ressources et tutoriels (mais souvent en anglais) se trouvent sur internet, ce qui offre un autonomie particulière à l’apprenant.

## Des outils existant

Enfin, pour terminer de vous convaincre d’utiliser Arduino pour découvrir le monde merveilleux de l’embarqué, il existe différents outils qui peuvent être utilisés avec Arduino. Je vais en citer deux qui me semblent être les principaux : Ardublock est un outil qui se greffe au logiciel Arduino et qui permet de programmer avec des blocs. Chaque bloc est une instruction. On peut aisément faire des programmes avec cet outil et même des plutôt complexes. Cela permet par exemple de se concentrer sur ce que l’on doit faire avec Arduino et non se concentrer sur Arduino pour ensuite ce que l’on doit comprendre avec. Citons entre autre la simulation de porte logique : il vaut mieux créer des programmes rapidement sans connaitre le langage pour comprendre plus facilement comment fonctionne une porte logique. Et ce n’est qu’un exemple. Cela permet aussi à de jeunes enfants de commencer à programmer sans de trop grandes complications.

![](https://zestedesavoir.com/media/galleries/954/b217f285-f7bc-49a0-8568-d47e54c7eabc.png.960x960_q85.png)

## Les cartes Arduino

Le matériel que j’ai choisi d’utiliser tout au long de ce cours n’a pas un prix excessif et, je l’ai dit, tourne aux alentours de 25 € TTC. Il existe plusieurs magasins en ligne et en boutiques qui vendent des cartes Arduino. Je vais vous en donner quelques-uns, mais avant, il va falloir différencier certaines choses.

### Les fabricants

Le projet Arduino est libre et les schémas des cartes circulent librement sur internet. D’où la mise en garde que je vais faire : il se peut qu’un illustre inconnu fabrique lui-même ses cartes Arduino. Cela n’a rien de mal en soi, s’il veut les commercialiser, il peut. Mais s’il est malhonnête, il peut vous vendre un produit défectueux. Bien sûr, tout le monde ne cherchera pas à vous arnaquer. Mais la prudence est de rigueur. Faites donc attention où vous achetez vos cartes.

### Les types de cartes

Il y a trois types de cartes :

- Les dites « officielles », qui sont fabriquées en Italie par le fabricant officiel : Smart Projects.
- Les dits « compatibles », qui ne sont pas fabriqués par Smart Projects, mais qui sont totalement compatibles avec les Arduino officielles.
- Les « autres », fabriquées par diverses entreprises et commercialisées sous un nom différent (Freeduino, Seeduino, Femtoduino, …).

### Les différentes cartes

Des cartes Arduino il en existe beaucoup ! Voyons celles qui nous intéressent… Les cartes Uno et Duemilanove . Nous choisirons d’utiliser la carte portant le nom de « Uno » ou « Duemilanove ». Ces deux versions sont presque identiques.

Le modèle Uno dispose, accrochez-vous, de :

- 32 ko de mémoire pour stocker les programmes,
- 2 ko de RAM, une EEPROM 1 ko pour stocker… 2 ou 3 trucs, typiquement des paramètres. Impossible d'y stocker des logs GPS, par exemple ;
- et tout ce petit monde est cadencé à la fréquence totalement dingo de 16 MHz !

Tout ça pour la modique somme d'une vingtaine d'euros (pour les authentiques), et une dizaine d'euros — voire moins — pour les clones.

La carte Mega . La carte Arduino Mega est une autre carte qui offre toutes les fonctionnalités de la carte précédente, mais avec des fonctionnalités supplémentaires. On retrouve notamment un nombre d’entrées et de sorties plus important ainsi que plusieurs liaisons séries. Bien sûr, le prix est plus élevé : > 40 € !

Les autres cartes. Il existe encore beaucoup d’autres cartes, je vous laisse vous débrouiller pour trouver celle qui conviendra à vos projets. Cela dit, je vous conseil dans un premier temps d’utiliser la carte Arduino Uno ou Duemilanove d’une part car elle vous sera largement suffisante pour débuter et d’autre part car c’est avec celle-ci que nous présentons le cours.

### Liste d’achat

Attention, cette liste ne contient que les composants en quantités minimales strictes. Libre à vous de prendre plus de LED et de résistances par exemple (au cas où vous en perdriez ou détruisiez…). Pour ce qui est des prix, j’ai regardé sur différents sites grand public (donc pas Farnell par exemple), ils peuvent donc paraître plus élevés que la normale dans la mesure où ces sites amortissent moins sur des ventes à des clients fidèles qui prennent tout en grande quantité…

Avant que j’oublie, quatre éléments n’apparaîtront pas dans la liste et sont indispensables :

- Une Arduino Uno ou Duemilanove
- Un câble USB A mâle/B mâle
- Une BreadBoard (plaque d’essai)
- Un lot de fils pour brancher le tout !

![](https://zestedesavoir.com/media/galleries/954/9983e5d0-4ca2-4087-9bb5-62f82213e998.png.960x960_q85.png)
