# EXERCICE - Histoire des langages de programmations
- Date de création ?
- Usage ?
- Fortement ou faiblement typé ?
- Typage dynamique ?
- Interprété ou natif ?
- Classement ?

## Langage (17) - 3 par groupe :
- FORTRAN (Francois)
- Cobol (Bruno / Maxime)
- Basic (Frank)
- C (Baptiste)
- SQL (Ousmane)
- C++ (Baptise)
- Objectif-C (Alexis)
- Caml (Frank)
- Bash (Francois)
- Python (Alexis)
- Visual Basic (Frank)
- Brainfuck (Francois)
- Java (Alexis)
- PHP (Bruno / Maxime)
- Javascript (Baptise)
- C# (Ousmane)
- Swift (Bruno / Maxime)

# Cours - Histoire des langages de programmations
Des premiers langages à ceux d’aujourd’hui.

## Terminolgie
Quelques définitions pour mieux comprendre


## Variable
En informatique, les variables sont des éléments qui associent un nom (l’identifiant) à une valeur. La valeur peut être de nature différente : nombre, texte, etc. Les variables sont physiquement implantées dans la mémoire du système programmé (ordinateur, microprocesseur…)
Une variable contient une valeur qui peut varier au cours de l’exécution du programme, comme la couleur des habits d’un personnage, le nombre d’activations d’un capteur...

## Typage (des variables)
Dans l’univers des développeurs, on utilise le terme "langage" de manière générique. Tous les langages ne sont pas identiques par leur syntaxe, leurs fonctionnalités ou encore leur mode de fonctionnement. Pourquoi parle-t-on de langage typé, non typé, de langage interprété ou natif, langage statique ou dynamique… ? Décryptons ensemble ce sujet, pour mieux savoir de quoi on parle.

Savoir si on parle d’un langage typé, dynamique, interprété ou objet, c’est savoir immédiatement de quoi on parle et comprendre les avantages et les inconvénients.

Vous le savez, en programmation informatique tout est une histoire de code. Le code source d’une application, d’un logiciel ou même d’une page web dépend du langage de programmation choisi. Il existe un grand nombre de langages : PHP, C, Perl, Java, Swift, Python, JavaScript pour n’en citer que quelques-uns.  Chaque information, ou instruction, transmise par le code, ou la langue, est programmée par des variables, des opérateurs, des fonctions, des objets, etc. Chaque langage possède une syntaxe et un type spécifique : fortement ou faiblement, mais aussi dynamique, statique, interprété, etc.

### Typé ou fortement typé

En informatique, un langage typé, aussi appelé fortement typé, est un langage dans lequel les types utilisés dans le code source (fonction, variable, etc.) sont vérifiés au moment de la compilation. Le compilateur vérifie la cohérence des types et des données (valeurs) utilisées. Parmi les langages de programmation fortement typés on peut noter C ou PHP (utilisé pour le Web notamment), par exemple. Ce typage fort n’est pas permissif, dans le sens où le développeur ne peut pas contourner le typage imposé et il doit respecter le type défini.

Par exemple, vous ne pouvez pas utiliser un nombre entier sur une valeur flottante, ou encore une chaîne de caractères, alors que l’on attend un entier. Vous devez donc respecter les types de valeurs / données. Ce typage fort évite les mauvaises surprises en exécution, comme des erreurs de calcul et des exceptions. Parfois, quand on reprend un ancien code, on découvre, avec surprise, les problèmes de typage, et il faut alors redonner de la cohérence afin d’obtenir un résultat correct et éviter l'apparition d'une erreur après passage dans le compilateur. Le typage fort est contraignant, car on doit être rigoureux.

Un langage définit, par défaut, des types que l’on retrouve partout : booléen (vrai / faux, 0 ou 1), entier, caractères, virgule flottante, string, etc. Vous l’aurez compris, dans un langage typé, il n’est pas possible d’avoir une autre valeur pour un booléen qu’un flag true ou false, ou 0 ou 1. Toute autre valeur génère une erreur en compilation ou en exécution, si vous êtes dans un langage dynamique / interprété (comme Ruby ou Python). Quand le typage est vérifié à la compilation, on parle de langage typé statique (Java, Pascal, VB).

On peut manipuler les valeurs d’un type. Par exemple, si vous utilisez un type char (caractère) vous pouvez transformer la chaîne. Par exemple, on met en minuscule la valeur en majuscule en utilisant un char tolower. La syntaxe changera selon le langage, mais le principe reste le même. Même si le typage fort apporte une certaine sécurité et cohérence, il est possible de convertir des valeurs typées vers un autre type. Il est fréquent de convertir un float en int (integer, entier) ou inversement.

### Typage dynamique

Une autre approche existe : les langages à typage dynamique (typed dynamic). Dans ces langages, le typage est réalisé dynamiquement par le langage. Il va définir lui-même le type selon la nature de la valeur : un string, un integer, etc. Ce typage est fait à l’exécution du code. Vous l’aurez compris, le typage n’est pas analysé en compilation. L’avantage est un codage plus souple et souvent plus rapide. Dans certains contextes, le développeur ne connaît pas à l’avance la type de valeur qui sera fourni.

Cependant, le typage dynamique n’a pas toujours bonne réputation : consommation de mémoire et temps de processeur pour pouvoir typer à la volée, difficulté de debug, performances, codes moins maintenables. Parmi les langages dynamiques les plus connus on peut compter Python ou javaScript.

### Non typé ou faiblement typé

Un langage dit non typé, ou faiblement typé, se préoccupe peu des types. Cela permet de chaîner des valeurs de différents types. Ces langages sont très flexibles et, par définition, on peut utiliser n’importe quelle variable pour tout type de valeur. Cependant, attention, un typage faible signifie aussi que vous perdez une certaine cohérence et qu’il devient très difficile de vérifier ou de déterminer le typage d’une valeur d’une variable.

Il est aussi possible d’utiliser ce que l’on appelle l’inférence de types. Dans un langage à typage statique, on peut demander au compilateur de déterminer le type. C# et Java, pour ne citer qu’eux, permettent cette souplesse. Dans ces langages, on utilise l’inférence avec le mot-clé var.

D’une manière générale, quand vous connaissez les valeurs, évitez d’utiliser l’inférence partout et pour n’importe quoi. Oui, l’inférence apporte un typage dynamique, notamment pour les variables locales ou dans des contextes de données incertains, mais comme souvent en programmation, il ne faut pas en abuser et ne pas transformer votre langage typé en langage faiblement typé. Vous allez à contre-sens de la structure du langage.

### Interprété ou natif

Dans les apps mobiles, on parle souvent d’applications natives et d’applications hybrides. L’app native signifie que le code est écrit avec un langage compilé. Typiquement, C++, C, Swift, Kotlin, etc. Une application Kotlin ou Swift est un binaire exécutable que l’on installe sur l’OS. Si vous faites du multiplateforme avec C# (Xamarin), vous générez des exécutables pour chaque cible (target de compilation). Il faut générer un binaire exécutable par target.

Un langage interprété nécessite un interpréteur, un runtime, pour pouvoir exécuter le code. Par exemple, un code Java a besoin d’une JVM (machine virtuelle), et Perl a besoin de perl. Python est, lui aussi, un langage interprété. Un langage interprété est réputé portable, mais on perd souvent en performance. Même si, aujourd’hui, les runtimes et les moteurs d’exécution ont fait énormément de progrès. Il est possible de faire du JIT (Just in Time) en Python par exemple, avec l’implémentation PyPy. Le JIT est une compilation à la volée du code. On retrouve le JIT en Java ou en JavaScript.

JavaScript est un langage interprété. Pour l’exécution, il faut utiliser un moteur d’exécuteur JS. L’un des plus connus est V8, de Google. Mais, pour l’utilisateur, c’est transparent car c’est le navigateur qui embarque ce moteur (quand vous êtes en JavaScript front-end).

[ https://medium.com/@touskar/les-syst%C3%A8mes-de-typage-des-variables-e095648e4c87 ]

## Paradigmes / styles de programmation
Dans le monde de la programmation, il existe de nombreux paradigmes (ou styles de programmation) qui sont implémentés dans les langages de programmation, comme la programmation impérative, la programmation séquentielles, la programmation événementielle etc... Néanmoins, deux paradigmes en particuliers sont mis en avant, à savoir, la programmation procédurale et la programmation orientée objet. 

### Procédurale VS Orienté Objet
La différence entre la programmation procédurale et la programmation orientée objet (POO) réside dans le fait que dans la programmation procédurale, les programmes sont basés sur des fonctions, et les données peuvent être facilement accessibles et modifiables, alors qu’en programmation orientée objet, chaque programme est constitué d’entités appelées objets, qui ne sont pas facilement accessibles et modifiables.

Dans la programmation procédurale le programme est divisé en petites parties appelées procédures ou fonctions. Comme son nom l’indique, la programmation procédurale contient une procédure étape par étape à exécuter. Ici, les problèmes sont décomposés en petites parties et ensuite, pour résoudre chaque partie, une ou plusieurs fonctions sont utilisées. N'importe quelle procédure peut être appelée à n'importe quelle étape de l'exécution du programme, incluant d'autres procédures voire la procédure elle-même (récursivité).
Durant ces étapes, l'ensemble des variables mises en jeu sont modifiées par le biais de procédures ou fonctions qui se succèdent.
La programmation procédurale est souvent un meilleur choix qu'une simple programmation non-structurée, les avantages possibles sont la possibilité de réutiliser le même code à différents emplacements dans le programme sans avoir à le retaper.
Malgré la simplicité que l'on peut toucher lors de la programmation procédurale, celle ci a plusieurs inconvénients que je vais résumer dans les points suivants:

    - Entretien du programme complexe: puisque le programme s’exécute séquentiellement du début à la fin, le fait de vouloir modifier son comportement (même légèrement) revient à faire des modifications (parfois majeures) dans plusieurs endroits.
    - Avancement lent dans les grandes applications: le fait de coder de grandes applications à l'aide d'un langage de programmation procédurale requière beaucoup de temps. Chose qui n'est pas toujours à portée de main lorsqu'on est face à des clients exigeants.
    - Travail en groupe non favorable: les grands projets sont généralement réalisés par une équipe constituée de plusieurs programmeurs, chacun s'attribut une tâche (ou une partie du projet). Le fait de vouloir reconstituer l'application finale n'est pas toujours chose aisée, ce qui demande généralement de repasser en vue certains bouts de code.

Les langages de programmation procédurale les plus connus sont: C, Pascal, Perl, PHP4, PL/SQL... 

La programmation orientée objet (POO), ou programmation par objet, a été élaborée par Alan Kay dans les années 1970. C'est un paradigme de programmation informatique qui consiste en la définition et l'interaction de briques logicielles appelées objets ; un objet représente un concept, une idée ou toute entité du monde physique, comme une voiture, une personne ou encore une page d'un livre. Il possède une structure interne et un comportement, et il sait communiquer avec ses pairs. Il s'agit donc de représenter ces objets et leurs relations ; la communication entre les objets via leur relation permet de réaliser les fonctionnalités attendues, de résoudre le ou les problèmes.
Si la programmation orientée objet gagne du terrain c'est principalement grâce à ses nombreux avantages qu'on peut résumer dans ces points:

    - Plus intuitif: La POO permet de manipuler des objets qui peuvent interagir entre eux. Ce concept est plus proche du monde physique où nous vivons.
    - Plus organisé: Les objets étant indépendants les uns des autres (même s'ils peuvent interagir entre eux), le code source devient plus organisé et plus claire.
    - Plus évolutif: Un code organisé est plus facile à maintenir.
    Code réutilisable: En POO le code peut être divisé en modules plus faciles à réutiliser, non seulement dans le projet courant, mais dans d'autres projets.
    - Favorise le travail en équipe: A l'inverse de la programmation procédurale, la POO favorise le travail en équipe en découpant les parties du projet qui sont faciles à regrouper après.

Les langages de programmation orientés objet les plus connus sont: C++, Java, PHP5 (et PHP7), C#, Ruby, Python... 

Les failles de la programmation procédurale posent le besoin de la programmation orientée objet. La programmation orientée objet corrige les défauts du programmation procédurale en introduisant le concept «objet» et «classe». Il améliore la sécurité des données, ainsi que l’initialisation et le nettoyage automatiques des objets. La programmation orientée objet permet de créer plusieurs instances de l’objet sans aucune interférence.

### Évènementielle VS Fonctionnelle
Certains algorithmes, comme par exemple des calculs mathématiques, n'ont pas besoin de prendre en compte un état quelconque pour être réalisé. Dans ce cas, le résultat final ne dépend que des données d'entrée, sur lesquelles sont appliquées une fonction. C'est ce que l'on appelle la programmation fonctionnelle, qui se concentre donc sur l'utilisation de fonctions. Si un bug apparaît, il est très simple à repérer car il se trouve forcément dans la fonction ne présentant pas le résultat voulu. En effet, il n'y a pas de variables partagées ou d'état global. Autrement dit, un langage fonctionnel offre la possibilité de passer par des fonctions pour atteindre le résultat voulu. Ces fonctions renverront toujours le même résultat pour les mêmes données en entrées sans modifier l'état potentiel qui se trouve à l'extérieur de ces fonctions.

Alors que la programmation événementielle est un paradigme de programmation dans lequel l'exécution d'actions est déclenchée automatiquement lorsqu'un événement survient. Un événement correspond en général à un changement d'état dans l'univers, ou bien à une intervention explicite de l'utilisateur (ou d'un système externe). On peut noter ces associations (événement, action) sous la forme : événement → action.

La programmation événementielle est souvent utilisée dans les cas suivants :

    La programmation d'automates (systèmes de régulation par exemple) Par exemple : température < 20 → déclencher chauffage ;
    La programmation d'interface graphique. En effet, chaque action de l'utilsateur (clic souris, etc.) peut être vu comme un événement (JS)

La plupart des langages sont multi-paradigmes, c'est-à-dire qu'ils supportent simultanément les paradigmes fonctionnel et événementiel ...
JavaScript est un langage multi-paradigme. TypeScript est un sur-ensemble de JavaScript encore plus multi-paradigme car il complète les lacunes objet de JavaScript, tout en permettant de continuer à écrire du JavaScript.

## Langages

En 1950, l'invention de l'assembleur par Maurice V. Wilkes de l'université de Cambridge ouvre la voie aux langages dits "de haut niveau". Avant, la programmation s'effectuait directement en binaire. Grace Murray Hopper (1906-1992), une américaine, mobilisée comme auxiliaire dans la marine américaine, développe pour Remington Rand le tout premier compilateur, nommé A0. Il permet de générer un programme binaire à partir d'un "code source". Alors que le langage Fortran commence à apparaître vers 1955 notamment chez IBM, Grace Hopper s'intéresse aux langages qui utilisent des mots voire des expressions du "langage naturel". 

Fortran signifie FORmula TRANslation system .C'est John BACKUS qui a réalisé cette implémentation. Dès 1962 une version complète qui restera un standard pendant de nombreuses années s'appelle Fortran IV. Les deux améliorations notables suivantes sont Fortran77 et Fortran90 qui comme leur nom l'indique, ont mis une quinzaine d'annés pour voir le jour. Depuis, Fortran reste tel qu'il est. Il sera difficile d'en faire un fortran-objet compte-tenu de sa syntaxe de base peu adaptable... Fortran est un langage à visée scientifique. Il est "le champion des boucles simples". IBM a essayé de se le réserver en le rendant propriétaire, c'est à dire dépendant des machines IBM. Dès 1958, FortranII définit les sous-programmes et leur appel. Fortran77 améliore la lisibilité de fortran, sa modularité pour le traitement des fichiers. 

Après B0 et Flowmatic, elle participe, dès 1959, à l'élaboration de ce qui deviendra le langage Cobol. 

Cobol signifie COmmon Business Oriented Language . Lors d'une rencontre à Washington, le CODASYL (COnference on DAta SYstems languages) qui est un consortium comprenant le Department of Defense américain décide de réaliser un langage (commun) de traitement de données orienté gestion. Délibérément « verbeux », le Cobol emploie des mots et une syntaxe proches de l'anglais courant. C'est en avril 1960 qu'apparait la première version stable nommée évidemment COBOL60. Une version étendue et très stable date de 1965 ; elle sera reconnue comme un standard en 1968. Il faut attendre 1974 pur voir apparaitre le "nouveau" standard nommé CobolANS74 (ANS est l'acronyme de American National Standard). Deux évolutions majeures auront encore lieu : Ocobol en 1997 et Cobol IsoAnsi en 2002. 

Avec la fin des années 50 s'achève ce qu'on nomme aujourd'hui l'ère des ordinateurs de première génération qui utilisent principalement les cartes perforées. La seconde génération, celle qui utilise les transistors va prendre pleinement son essor.

Fortran et Cobol s'installent comme langages principaux : pendant 20 ans Cobol sera le langage le plus utilisé au monde. Aujourd'hui, il détient toujours le record du grand nombre de lignes écrites dans un langage de programmation. 

Thomas Kurtz et John Kemeny créent en 1964 un langage au Dartmouth College pour leurs étudiants. Ce langage pour "débutants" se nomme avec un jeu de mots BASIC.Basic est dès le départ un langage simple qui peut être rapidement utilisé par des "profanes". On le conseille à l'époque pour les écoles maternelles, les petites entreprises et aux "ménagères". Après MSBasic 2 en 1976 c'est Visual Basic en 1992 renommé un peu plus tard VBA (Visual Basic pour Applications) qui donne au Basic ses lettres de noblesse : il permet de programmer Word, Excel, Access... 

--------------------------------

Depuis 1968 Niklaus WIRTH développe le langage PASCAL. Ce langage est bien structuré, très lisible, trés "coercitif" et se trouve donc bien adapté à l'enseignement de la programmation. Il va être pendant une quinzaine d'années le langage préféré de nombreux enseignants en informatique. Passé au monde objet avec Pascal Object puis Turbo Pascal for Windows, il se nomme aujourd'hui... Delphi. 

Dès 1970, Ken Thompson, pensant que le système d'exploitation UNIX ne serait pas complet sans un langage de programmation de haut niveau commence à porter le Fortran sur le PDP 7 (mini-ordinateur) mais change rapidement d'avis et crée en fait un nouveau langage, le B. 2 ans plus tard, Dennis Ritchie du Bell Lab d'ATT reprend ce langage B pour mieux l'adapter au PDP/11 (mini-ordinateur) sur lequel UNIX vient juste d'être porté. Il fait évoluer le langage et le dote d'un vrai compilateur générant du code machine PDP/11 : c'est la naissance du langage C. Les développements et les succès du langage C et d'UNIX sont intimement liés. C a évolué en C++ et reste un standard pour le développement de "grosses" applications dont les systèmes d'explotations. C est un langage de haut niveau, mais il peut aussi être utilisé comme un assembleur car il permet de programmer des instructions au plus près de la «physique» de la machine : beaucoup de logiciels pour les entreprises sont écrits dans ce langage souple, dont l'utilisation est dangereuse pour le débutant : comme il permet de tout faire il comporte peu de «garde-fous», car c'est au programmeur de savoir ce qu'il fait... 

En 1974 IBM développe SEQUEL, qui devient peu après SQL (Structured Query Language). Au départ, c'est un langage d'interrogation de base de données, sans contraintes d'implémentation ni de stockage. Dès 1979 SQL couplé avec Oracle devient le langage de référence pour les bases de données. Les versions pour le Web (MySql, PostGresSql) l'ont rendu plus accessible au grand public. 

Le début des années 80 consacre le développement de la petite informatique et de la micro-informatique : on y voit naitre les premiers PC et les premiers Apple (mais Windows n'existe pas encore). 

Pourtant, la révolution objet est en marche ; elle permet d'écrire de plus gros programmes mieux structurés, plus facilement modifiables et plus surs. En 1983 Bjarn Stroustrup développe une extension orientée objet au langage C qui deviendra le langage C++. Il faudra pourtant quelques années avant que les "objets" deviennents prépondérants en programmation... 

En 1983, développé par Brad Cox et Tom Love, Objective-C est le principal langage de programmation utilisé pour écrire des logiciels pour macOS et iOS, les systèmes d'exploitation d'Apple.

Vers la fin des années 80, les langages de commandes et de script se développent pour tous les types d'ordinateurs. Parallèlement, la notion d'interface graphique pour utilisateur (GUI) commence à entrer dans les moeurs pour les "grands systèmes".

Enfin, même s'il n'est pas vraiment considéré comme un langage de programmation, le langage HTML (Hypertext Markup Language) est développé en 1989 par Tim Berners-Lee. Ce sera "LE" langage du Web.

----
Les années 90 voient s'installer un peu partout dans le monde un produit logiciel qui révolutionne Dos : c'est Windows. C'est en 1990 que Microsoft sort son produit Windows 3.0 qui est une version complétement revue des premiers "Microsoft Windows". Un an plus tard, mais sans publicité, Linux 0.01 est annoncé par un étudiant, Linus Torvald à l'Université d'Helsinki. Linux va se développer très rapidement grâce à Internet et grâce à deux concepts-phare : la disponibilité du code-source des programmes et la gratuité.

En 1991, nommé d'après la troupe de comédiens britanniques "Monty Python", Python a été développé par Guido Van Rossum. Il s'agit d'un outil d'usage généralLe langage de programmation de haut niveau, créé pour supporter une variété de styles de programmation et être amusant à utiliser. Python est, à ce jour, l'un des langages de programmation les plus populaires au monde, utilisé par des sociétés telles que Google, Yahoo et Spotify.

Le développement très fort d'Internet influence fortement les concepteurs de langage. En 1995, suite à de nombreuses réunions de comité du WWW, le langage LiveScript est renommé en Javascript et est considéré comme une "bonne" solution pour gérer dynamiquement les pages Web. Il est aussitot incorporé dans Netscape 2. Mais il manque toujours un langage complet, objet, capable de dialoguer avec les serveurs Web et les bases de données. Dans la même année 95, Java est introduit comme langage de développement objet "multi-OS" pour combler ce manque. Sa gestion des sous-programmes et son approche objet en font un langage de développement universel de plus en plus utilisé. 

JavaScript a été créé par Brendan Eich, ce langage est principalement utilisé pour le développement web dynamique, les documents PDF, les navigateurs web et les widgets de bureau. Presque tous les grands sites web utilisent JavaScript. Gmail, Adobe Photoshop et Mozilla Firefox en sont des exemples bien connus.

Java est un langage universel de haut niveau créé par James Gosling pour un projet de télévision interactive. Il possède des fonctionnalités multi-plateformes et figure constamment parmi les meilleurs langages de programmation au monde. On trouve Java partout, des ordinateurs aux smartphones en passant par les parcmètres.

La gestion des formulaires et des bases de données accessibles par le Web voit apparaitre pratiquement en même temps le langage Php, souvent couplé au langage de base de données Sql notamment dans ses implémentations Mysql et PosgresSql. 

Anciennement connu sous le nom de "page d'accueil personnelle", qui signifie maintenant "préprocesseur hypertexte", PHP a été développé par Rasmus Lerdorf. Ses principales utilisations comprennent la création et la maintenance de pages web dynamiques, ainsi que le développement côté serveur. Certaines des plus grandes entreprises du monde entier utilisent PHP, notamment Facebook, Wikipedia, Digg, WordPress et Joomla.

Parallèlement, la domination de Windows comme système d'exploitation pour le grand public avec ses deux logiciels phares Word et Excel induit progressivement l'utilisation de "macros" pour tirer pleinement profit des possibilités de ces logiciels : le langage Basic, remanié, rendu objet avec ses fonctions liées aux documents devient VBA c'est à dire "Visual Basic for Applications".

Visual Basic permet aux programmeurs d'utiliser un style de glisser-déposer pour choisir et modifier des morceaux de code présélectionnés grâce à une interface utilisateur graphique (GUI). Le langage n'est pas trop utilisé de nos jours, mais Microsoft a utilisé des parties de Visual Basic pour un certain nombre de ses applications comme Word, Excel et Access.

---
Les années 2000 ne voient pas apparaitre de nouveau langage marquant. La tendance est plutôt à l'amélioration et à l'enrichissement des langages présents. L'omniprésence d'Internet force les langages développés pour le Web à progresser encore : un programme (ou "application" en anglais) pour le Web devient une "applet", une "weblet" ou quelquechose en let" ainsi un script général imbriqué dans une page Web est un "scriptlet". Pour répondre à ces attentes, les langages accumulent version sur version jusqu'à fournir un produit "stable" et "complet".

Il faut noter que Java 1.5 est une version très mûre, très stable de Java, enrichie de nouvelles biblothèques de sous-programmes (plus précisément de "classes"), disponible pour tout système d'exploitation : Unix, MacOs, Dos et Windows et qui devient une référence pour la programmation et le développement de tous types d'applications.

En 2000, développé chez Microsoft avec l'espoir de combiner la capacité informatique de C++ Avec la simplicité de Visual Basic, le C# est basé sur C++ et partage de nombreuses similitudes avec Java. Ce langage est utilisé dans presque tous les produits Microsoft et se retrouve principalement dans le développement d'applications de bureau.

Il faut toutefois signaler une mini-révolution dans la façon de penser de penser les langages, due à Microsoft. Devant la diversité des systèmes d'exploitation et de façon à réutiliser le même programme sur tous les ordinateurs et sur tous les systèmes dans tous les modes (local, distant) Bill Gates propose de fonctionner en mode : tout programme doit être traduit en un code intermédiaire exécutable par un programme spécial, sur l'ordinateur de l'utilisateur ou sur celui du serveur Web. Les logiciels classiques, comme Word et Excel pourraient même être utilisés à partir de serveurs de logiciels, plutôt que d'être installés sur l'ordinateur...

----
Les pages Web prenant de plus en plus d'ampleur, les langages de script Ruby et Python deviennent, via leurs "frameworks de développement" phares respectifs, nommés Rails et Django, des langages très adaptés aux méthodes AGILES et RAD même si le langage PHP reste un grand classique pour le développement de sites Web. L'importance de "grands" sites Web comme Facebook, Flicker... qui ne peuvent pas fonctionner sans Javascript font de Javascript et ses librairies comme Jquery, Prototype... le langage incontournable du développement Web. 

En 2014, développé par Apple en remplacement du C, du C++ et de l'Objective-C, Swift a été développé avec l'intention d'être plus facile que les langages précités et de laisser moins de place à l'erreur. La polyvalence de Swift signifie qu'il peut être utilisé pour des applications de bureau, mobiles et dans le nuage. L'application Duolingo, le langage de référence, a lancé une nouvelle application écrite en Swift.

## Popularité des langages (Classement)
...

## Questions ?
...
