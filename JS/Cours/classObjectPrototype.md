# Introduction à l’orienté objet en JavaScript

Dans cette nouvelle partie, nous allons nous plonger dans ce qui fait toute la puissance du JavaScript : les objets et la programmation orientée objet. Cette première leçon n’est pas la plus simple à digérer car elle introduit de nombreux nouveaux concepts et pose des bases très théoriques.

Pas d’inquiétude donc si certaines notions restent floues et abstraites : nous allons redéfinir et illustrer les concepts de cette leçon dans tout le reste de cette partie. Il me semblait toutefois intéressant de commencer par poser certaines bases pour que vous les ayez en tête et que vous compreniez mieux ce qu’on va faire par la suite.

## Les paradigmes de programmation

Avant de parler de ce qu’est la programmation orientée objet en JavaScript en soi ou de définir ce qu’est un objet, il me semble essentiel de vous parler des paradigmes de programmation car cela devrait rendre la suite beaucoup plus claire.

Un « paradigme » de programmation est une façon d’approcher la programmation informatique, c’est-à-dire une façon de voir (ou de construire) son code et ses différents éléments.

Il existe trois paradigmes de programmation particulièrement populaires, c’est-à-dire trois grandes façons de penser son code :

    La programmation procédurale ;
    La programmation fonctionnelle ;
    La programmation orientée objet.

Une nouvelle fois, retenez bien que chacun de ces paradigmes ne correspond qu’à une façon différente de penser, d’envisager et d’organiser son code et qui va donc obéir à des règles et posséder des structures différentes.

La programmation procédurale est le type de programmation le plus commun et le plus populaire. C’est une façon d’envisager son code sous la forme d’un enchainement de procédures ou d’étapes qui vont résoudre les problèmes un par un. Cela correspond à une approche verticale du code où celui-ci va s’exécuter de haut en bas, ligne par ligne. Jusqu’à présent, nous avons utilisé cette approche dans nos codes JavaScript.

La programmation fonctionnelle est une façon de programmer qui considère le calcul en tant qu’évaluation de fonctions mathématiques et interdit le changement d’état et la mutation des données. La programmation fonctionnelle est une façon de concevoir un code en utilisant un enchainement de fonctions « pures », c’est-à-dire des fonctions qui vont toujours retourner le même résultat si on leur passe les mêmes arguments et qui ne vont retourner qu’une valeur sans modification au-delà de leur contexte.

La programmation orientée objet est une façon de concevoir un code autour du concept d’objets. Un objet est une entité qui peut être vue comme indépendante et qui va contenir un ensemble de variables (qu’on va appeler propriétés) et de fonctions (qu’on appellera méthodes). Ces objets vont pouvoir interagir entre eux.

Ces premières définitions doivent vous paraitre très abstraites et très floues. C’est tout à fait normal : on essaie ici de résumer des façons entières de penser la programmation en quelques lignes !

Les choses importantes à retenir pour le moment sont les suivantes :

1. Il existe différentes façons de penser / voir / concevoir son code qu’on appelle « paradigmes » ;
2. La plupart des langages supportent aujourd’hui plusieurs paradigmes et le JavaScript, en particulier, supporte chacun des trois paradigmes principaux cités ci-dessus ce qui signifie qu’on va pouvoir coder en procédural, en fonctionnel et en orienté objet en JavaScript ;
3. Un paradigme n’est qu’une façon de coder il est important de comprendre qu’un paradigme n’exclut pas les autres. Au contraire, on va souvent utiliser plusieurs paradigmes dans un même script en fonction de ce qu’on souhaite réaliser.

## Première définition de l’orienté objet et des objets en JavaScript

Le JavaScript est un langage qui possède un fort potentiel pour la programmation orientée objet (abrégée en POO).

En effet, vous devez savoir que le JavaScript est un langage qui intègre l’orienté objet dans sa définition même ce qui fait que tous les éléments du JavaScript vont soit être des objets, soit pouvoir être convertis et traités comme des objets. Il est donc essentiel de bien comprendre cette partie sur les objets pour véritablement maitriser le JavaScript et utiliser tout ce qui fait sa puissance.

Un objet, en informatique, est un ensemble cohérent de données et de fonctionnalités qui vont fonctionner ensemble. Pour le dire très simplement, un objet en JavaScript est un conteneur qui va pouvoir stocker plusieurs variables qu’on va appeler ici des propriétés. Lorsqu’une propriété contient une fonction en valeur, on appelle alors la propriété une méthode. Un objet est donc un conteneur qui va posséder un ensemble de propriétés et de méthodes qu’il est cohérent de regrouper.

Regardez plutôt le code suivant :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-illustration-objet-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-illustration-objet.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-illustration-objet-resultat.png)

On a ici créé notre premier objet (qui est en l’occurrence un objet littéral – nous reparlerons de ce concept plus tard). Comme vous pouvez le voir, pour créer un objet, on commence par définir et initialiser une variable.

Dans le cas présent, notre variable let utilisateur stocke notre objet. Par simplification, on dira que cette variable « est » un objet mais pour être tout à fait exact il faudrait plutôt dire qu’elle stocke une valeur de type objet.

Pour nous assurer qu’on a bien créé un objet, on peut utiliser l’opérateur typeof qui renvoie le type de valeur d’une variable. Sans surprise, c’est bien la valeur « object » (objet en anglais) qui est renvoyée.

Comme vous pouvez le voir, on utilise ici une syntaxe différente de celle dont on a l’habitude pour déclarer notre objet. Tout d’abord, vous pouvez remarquer qu’on utilise dans le cas de la création d’un objet littéral une paire d’accolades qui indiquent au JavaScript qu’on souhaite créer un objet.

Ce qui nous intéresse particulièrement ici sont les membres de notre objet. Un « membre » est un couple « nom : valeur », et peut être une propriété ou une méthode. Comme vous pouvez le voir, notre objet est ici composé de différents membres : 3 propriétés et 1 méthode.

La première propriété nom de notre objet est particulière puisque sa valeur associée est un tableau. Nous allons étudier les tableaux par la suite, contentez-vous pour le moment de retenir le fait que les tableaux sont eux-mêmes avant tout des objets en JavaScript.

Le membre nommé bonjour de notre objet est une méthode puisqu’une fonction anonyme lui est associée en valeur. Vous pouvez également remarquer l’usage du mot clef this et de l’opérateur . dans notre méthode. Nous reviendrons sur ces éléments dans la leçon suivante.

Chaque membre d’un objet est toujours composé d’un nom et d’une valeur qui sont séparées par :. Les différents membres d’un objet sont quant-à-eux séparés les uns des autres par des virgules (et non pas des points-virgules, attention !).

## Quels avantages et intérêts de coder en orienté objet en JavaScript ?

Le développement orienté objet correspond à une autre façon d’envisager et d’organiser son code en groupant des éléments cohérents au sein d’objets.

Les intérêts supposés principaux de développer en orienté objet plutôt qu’en procédural par exemple sont de permettre une plus grande modularité ou flexibilité du code ainsi qu’une meilleure lisibilité et une meilleure maintenabilité de celui-ci.

Dans tous les cas, les objets font partie du langage JavaScript natif et il est donc obligatoire de savoir les utiliser pour déverrouiller tout le potentiel du JavaScript.

En effet, vous devez bien comprendre ici que certains langages ne proposent pas de composants objets c’est-à-dire ne nous permettent pas de créer des objets et donc de créer du code orienté objet. Certains autres langages supportent l’utilisation d’objets et possèdent quelques objets natifs (objets prédéfinis et immédiatement utilisables).

Le langage JavaScript, pour sa part, possède une très grande composante objet et la plupart des éléments qu’on va manipuler en JavaScript proviennent d’objets natifs du langage. Il est donc indispensable de comprendre comment la programmation orientée objet fonctionne et de connaitre ces objets natifs pour utiliser pleinement le JavaScript.

# Création d’un objet JavaScript littéral et manipulation de ses membres

Un objet est un ensemble cohérent de propriétés et de méthodes. Le JavaScript dispose d’objets natifs (objets prédéfinis) qui possèdent des propriétés et des méthodes qu’on va pouvoir directement utiliser et nous permet également de définir nos propres objets.

Nous allons passer en revue certains objets natifs qu’il convient de connaitre dans les prochaines leçons. Avant tout, il est important de bien comprendre comment fonctionnent les objets et de savoir comment créer et manipuler un objet.

Nous pouvons créer des objets de 4 manières différentes en JavaScript. On va pouvoir :

    Créer un objet littéral ;
    Utiliser le constructeur Object() ;
    Utiliser une fonction constructeur personnalisée ;
    Utiliser la méthode create().

Ces différents moyens de procéder vont être utilisés dans des contextes différents, selon ce que l’on souhaite réaliser.

Dans cette leçon, nous allons commencer par créer un objet littéral et nous en servir pour expliquer en détail de quoi est composé un objet et comment manipuler ses membres. Nous verrons les autres techniques de création d’objet dans la leçon suivante.

## Création d’un objet littéral

Dans la leçon précédente, nous avons créé un premier objet nommé utilisateur. Pour être tout à fait précis, nous avons créé un objet littéral :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-definition-creation-objet-litteral.png)

On parle ici d’objet « littéral » car nous avons défini chacune de ses propriétés et de ses méthodes lors de la création, c’est-à-dire littéralement.

Pour créer un objet littéral, on utilise une syntaxe utilisant une paire d’accolades { … } qui indique au JavaScript que nous créons un objet.

Nos objets vont généralement être stockés dans des variables. Par abus de langage, on confondra alors souvent la variable et l’objet et on parlera donc « d’objet » pour faire référence à notre variable stockant une valeur de type objet. Dans l’exemple ci-dessus, on dira donc qu’on a créé un objet nommé « utilisateur ».

Un objet est composé de différents couples de « nom : valeur » qu’on appelle membres. Chaque nom d’un membre doit être séparé de sa valeur par un caractère deux-points : et les différents membres d’un objet doivent être séparés les uns des autres par une virgule.

La partie « nom » de chaque membre suit les mêmes règles que le nommage d’une variable. La partie valeur d’un membre peut être n’importe quel type de valeur : une chaine de caractère, un nombre, une fonction, un tableau ou même un autre objet littéral.

Les membres d’un objet qui ne servent qu’à stocker des données sont appelés des propriétés tandis que ceux qui manipulent des données (c’est-à-dire ceux qui contiennent des fonctions en valeur) sont appelés des méthodes.

## Utiliser le point pour accéder aux membres d’un objet, les modifier ou en définir de nouveaux

Pour accéder aux propriétés et aux méthodes d’un objet, on utilise le caractère point . qu’on appelle également un accesseur. On va ici commencer par préciser le nom de l’objet puis l’accesseur puis enfin le membre auquel on souhaite accéder.

Cet accesseur va nous permettre non seulement d’accéder aux valeurs de nos différents membres mais également de modifier ces valeurs. Regardez plutôt le code ci-dessous :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-acces-modification-membre-objet-litteral-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-acces-modification-membre-objet-litteral.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-acces-modification-membre-objet-litteral-resultat1.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-acces-modification-membre-objet-litteral-resultat2.png)

Ici, on commence par accéder aux propriétés nom et age de notre objet pierre en utilisant les notations pierre.nom et pierre.age. Cela nous permet de récupérer les valeurs des propriétés.

Dans le cas présent, on se contente d’afficher ces valeurs au sein de deux paragraphes de notre page HTML. Pour cela, on utilise la notation document.getElementById('{p1,p2}').innerHTML qu’on a déjà vu précédemment dans ce cours.

A ce niveau, vous devriez avoir remarqué qu’on utilise également des points pour accéder au contenu HTML de nos paragraphes et y placer les données souhaitées. En fait, c’est tout simplement parce que document est également un objet prédéfini d’une API (interface de programmation) appelée « DOM » (Document Object Model) que nous allons étudier dans la partie suivante.

Cet objet possède notamment une méthode getElementById() qui nous permet d’accéder à un élément HTML en fonction de son attribut id et une propriété innerHTML qui nous permet d’insérer du contenu entre les balises d’un élément HTML. Ici, on accède donc à nos paragraphes possédant les id='p1' et id='p2' et on place la valeur des propriétés nom et age de l’objet pierre entre les balises de ceux-ci.

En dessous, on utilise notre accesseur avec l’opérateur d’affectation = pour cette fois-ci modifier la valeur de la propriété age de notre objet pierre, et on affiche ensuite la nouvelle valeur pour bien montrer que la propriété a été modifiée.

Finalement, on utilise notre accesseur pour exécuter la méthode bonjour() de l’objet pierre. Pour faire cela, on procède de la même façon que pour exécuter une fonction anonyme placée dans une variable.

Enfin, on va encore pouvoir utiliser notre accesseur pour créer de nouveaux membres pour notre objet. Pour cela, il suffit de définir un nouveau nom de membre et de lui passer une valeur comme cela :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-ajout-membre-objet-litteral.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-ajout-membre-objet-litteral-resultat.png)

Ici, on ajoute une propriété taille et une méthode prez() à notre objet pierre. On invoque ensuite notre nouvelle méthode pour s’assurer qu’elle fonctionne bien.

## Utiliser les crochets pour accéder aux propriétés d’un objet, les modifier ou en définir de nouvelles

On va également pouvoir utiliser des crochets plutôt que le point pour accéder aux propriétés de nos objets, mettre à jour leur valeur ou en définir de nouvelles. Cela ne va en revanche pas fonctionner pour les méthodes.

Les crochets vont être particulièrement utiles avec les valeurs de type tableau (qui sont des objets particuliers qu’on étudiera plus tard dans ce cours) puisqu’ils vont nous permettre d’accéder à une valeur en particulier dans notre tableau.

Dans le code précédent, la valeur de la propriété nom par exemple est un tableau. Notez qu’on utilise également ces mêmes crochets pour définir un tableau (encore une fois, nous reviendrons plus tard là-dessus).

En programmation, un tableau correspond à un ensemble de valeurs auxquelles vont être associées des index ou des clefs. On appelle l’ensemble clef + valeur un élément du tableau.

La plupart des langages de programmation gèrent deux types de tableaux : les tableaux numérotés et les tableaux associatifs. Le principe des tableaux numérotés est que les clefs associées aux valeurs vont être des chiffres. Par défaut, la première valeur va recevoir la clef 0, la deuxième valeur sera associée à la clef 1 et etc. Les tableaux associatifs vont eux avoir des clefs textuelles qui vont être définies manuellement.

Pour accéder à une valeur en particulier dans un tableau, on utilise la syntaxe « nom_du_tableau[clef] ».

Le JavaScript est un langage qui ne supporte que l’utilisation de tableaux numérotés. Dans le cas présent, notre propriété nom contient un tableau qui possède deux éléments : la valeur du premier élément est « Pierre » et la clef associée par défaut est 0. La valeur du deuxième élément est « Giraud » est la clef associée par défaut est 1.

Ainsi, pour accéder à la valeur « Pierre » de notre propriété nom de l’objet pierre, on écrira pierre.nom[0]. Pour accéder à la valeur « Giraud », on écrira pierre.nom[1].

Comme je l’ai dit plus haut, on va pouvoir en JavaScript utiliser cette même syntaxe pour accéder à n’importe quelle propriété d’un objet, pour modifier la valeur d’une propriété ou encore pour définir de nouvelles propriétés.

Pour faire cela, on va faire « comme si » notre objet était un tableau associatif composés d’éléments dont les clefs sont les noms des propriétés et les valeurs sont les valeurs associées.

Pour accéder à la valeur complète de la propriété nom de l’objet pierre, on pourra ainsi écrire pierre['nom']. Pour accéder à la valeur de mail, on écrira pierre['mail']. Si on souhaite accéder à la valeur du premier élément de notre tableau nom, on pourra encore écrire pierre['nom'][0].

![](https://www.pierre-giraud.com/wp-content/uploads/2019/07/javascript-acces-propriete-objet-crochet.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/07/javascript-acces-propriete-objet-crochet-resultat.png)

Notez que le fait qu’on puisse utiliser ce genre d’écriture fait qu’on a souvent tendance à comparer les objets en JavaScript à des tableaux associatifs justement.

Une nouvelle fois, nous étudierons les tableaux plus en détail dans une prochaine leçon. Pour le moment, concentrez-vous sur les façons d’accéder aux membres d’un objet et de les modifier.

## L’utilisation du mot clef this

Il nous reste une dernière partie de notre objet à définir : le mot clef this qu’on utilise au sein de notre méthode bonjour().

Le mot clef this est un mot clef qui apparait fréquemment dans les langages orientés objets. Dans le cas présent, il sert à faire référence à l’objet qui est couramment manipulé.

Pour le dire très simplement, c’est un prête nom qui va être remplacé par le nom de l’objet actuellement utilisé lorsqu’on souhaite accéder à des membres de cet objet.

En l’occurrence, lorsqu’on écrit pierre.bonjour(), le mot clef this va être remplacé par pierre.

Quel intérêt d’utiliser this plutôt que directement pierre ? Dans le cas de la création d’un objet littéral, il n’y en a strictement aucun.

Cependant, vous allez voir qu’il va vite devenir indispensable d’utiliser this dès qu’on va commencer à créer des objets à la chaine de façon dynamique en utilisant par exemple un constructeur. Nous allons illustrer tout cela dès la prochaine leçon !

# Définition et création d’un constructeur d’objets en JavaScript

Dans la leçon précédente, nous avons appris à créer un objet littéral, précisé la structure d’un objet et vu comment manipuler les différents membres de nos objets.

Notez que ce que nous avons dit dans le cas d’un objet littéral va être vrai pour n’importe quel objet en JavaScript.

Dans cette leçon, nous allons voir d’autres méthodes de création d’objets et allons notamment apprendre à créer des objets à la chaine et de manière dynamique en utilisant une fonction constructeur personnalisée.

## Les usages de l’orienté objet et l’utilité d’un constructeur d’objets

La programmation orientée objet est une façon de coder basée autour du concept d’objets. Un objet est un ensemble cohérent de propriétés et de méthodes.

Les grands enjeux et avantages de la programmation orientée objet sont de nous permettre d’obtenir des scripts mieux organisés, plus clairs, plus facilement maintenables et plus performants en groupant des ensembles de données et d’opérations qui ont un rapport entre elles au sein d’objets qu’on va pouvoir manipuler plutôt que de réécrire sans cesse les mêmes opérations.

On va généralement utiliser la programmation orientée objet dans le cadre de gros projets où on doit répéter de nombreuses fois des opérations similaires. Dans la majorité des cas, lorsqu’on utilise l’orienté objet, on voudra pouvoir créer de multiples objets semblables, à la chaine et de manière dynamique.

Imaginons par exemple que l’on souhaite créer un objet à chaque fois qu’un utilisateur enregistré se connecte sur notre site. Chaque objet « utilisateur » va posséder des propriétés (un pseudonyme, une date d’inscription, etc.) et des méthodes similaires (possibilité de mettre à jour ses informations, etc.).

Dans ces cas-là, plutôt que de créer les objets un à un de manière littérale, il serait pratique de créer une sorte de plan ou de schéma à partir duquel on pourrait créer des objets similaires à la chaine.

Nous allons pouvoir faire cela en JavaScript en utilisant ce qu’on appelle un constructeur d’objets qui n’est autre qu’une fonction constructeur.

## La fonction construction d’objets : définition et création d’un constructeur

Une fonction constructeur d’objets est une fonction qui va nous permettre de créer des objets semblables. En JavaScript, n’importe quelle fonction va pouvoir faire office de constructeur d’objets.

Pour construire des objets à partir d’une fonction constructeur, nous allons devoir suivre deux étapes : il va déjà falloir définir notre fonction constructeur et ensuite nous allons appeler ce constructeur avec une syntaxe un peu spéciale utilisant le mot clefs new.

Dans une fonction constructeur, on va pouvoir définir un ensemble de propriétés et de méthodes. Les objets créés à partir de ce constructeur vont automatiquement posséder les (« hériter des ») propriétés et des méthodes définies dans le constructeur.

Comment une fonction peut-elle contenir des propriétés et des méthodes ? C’est très simple : les fonctions sont en fait un type particulier d’objets en JavaScript ! Comme tout autre objet, une fonction peut donc contenir des propriétés et des méthodes.

Pour rendre les choses immédiatement concrètes, essayons de créer un constructeur ensemble dont on expliquera ensuite le fonctionnement.

Pour cela, on va se baser sur l’objet littéral créé dans la leçon précédente. L’objectif ici va être de créer une fonction qui va nous permettre de créer des objets possédant les mêmes propriétés nom, age, mail et méthode bonjour() que notre objet littéral.

On va donc modifier notre script comme cela :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-definition-creation-fonction-constructeur-personnalisee-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-definition-creation-fonction-constructeur-personnalisee.png)

On définit ici une fonction Utilisateur() qu’on va utiliser comme constructeur d’objets. Notez que lorsqu’on définit un constructeur, on utilise par convention une majuscule au début du nom de la fonction afin de bien discerner nos constructeurs des fonctions classiques dans un script.

Comme vous pouvez le voir, le code de notre fonction est relativement différent des autres fonctions qu’on a pu créer jusqu’ici, avec notamment l’utilisation du mot clef this qui va permettre de définir et d’initialiser les propriétés ainsi que les méthodes de chaque objet créé.

Notre constructeur possède trois paramètres qu’on a ici nommé n, a et m qui vont nous permettre de transmettre les valeurs liées aux différentes propriétés pour chaque objet.

En effet, l’idée d’un constructeur en JavaScript est de définir un plan de création d’objets. Comme ce plan va potentiellement nous servir à créer de nombreux objets par la suite, on ne peut pas initialiser les différentes propriétés en leur donnant des valeurs effectives, puisque les valeurs de ces propriétés vont dépendre des différents objets créés.

A chaque création d’objet, c’est-à-dire à chaque appel de notre constructeur en utilisant le mot clef this, on va passer en argument les valeurs de l’objet relatives à ses propriétés nom, age et mail.

Dans notre fonction, la ligne this.nom suffit à créer une propriété nom pour chaque objet créé via le constructeur. Écrire this.nom = n permet également d’initialiser cette propriété.

## Créer des objets à partir d’une fonction constructeur

Pour créer ensuite de manière effective des objets à partir de notre constructeur, nous allons simplement appeler le constructeur en utilisant le mot clef new. On dit également qu’on crée une nouvelle instance.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-objet-via-constructeur-personnalise.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-objet-via-constructeur-personnalise-resultat.png)

Lorsqu’on écrit let pierre = new Utilisateur(['Pierre', 'Giraud'], 29, 'pierre.giraud@edhec.com'), on crée un nouvel objet pierre en appelant la fonction constructeur Utilisateur().

Ici, on passe le tableau ['Pierre', 'Giraud'] en premier argument, le nombre 29 en deuxième argument et la chaine de caractères « pierre.giraud@edhec.com » en troisième argument.

Lors de l’exécution du constructeur, la ligne this.nom = n va donc être remplacée par pierre.nom = ['Pierre', 'Giraud'] ce qui crée une propriété nom pour notre objet pierre avec la valeur ['Pierre', 'Giraud'] et etc.

Une fois l’objet créé, on peut accéder à ses propriétés et à ses méthodes comme pour tout autre objet. Dans le code ci-dessus, on affiche les valeurs de certaines propriétés de pierre et on exécute sa méthode bonjour() par exemple.

Comme notre constructeur est une fonction, on va pouvoir l’appeler autant de fois qu’on le veut et donc créer autant d’objets que souhaité à partir de celui-ci et c’est d’ailleurs tout l’intérêt d’utiliser un constructeur. Chaque objet créé à partir de ce constructeur partagera les propriétés et méthodes de celui-ci.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-objets-via-constructeur-personnalise.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-objets-via-constructeur-personnalise-resultat.png)

Ici, on crée trois objets pierre, mathilde et florian en appelant trois fois notre constructeur Utilisateur(). Chacun de ces trois objets va posséder une propriété age, une propriété mail, une propriété nom et une méthode bonjour() qui vont posséder des valeurs propres à l’objet.

Cet exemple devrait normalement également vous permettre de comprendre toute l’utilité du mot clef this. Ce mot clef sert à représenter l’objet couramment utilisé. A chaque nouvel objet crée, il va être remplacé par l’objet en question et cela va nous permettre d’initialiser différemment chaque propriété pour chaque objet.

## Constructeur et différenciation des objets

On pourrait à première vue penser qu’il est contraignant d’utiliser un constructeur puisque cela nous « force » à créer des objets avec une structure identique et donc n’offre pas une grande flexibilité.

En réalité, ce n’est pas du tout le cas en JavaScript puisqu’on va pouvoir, une fois un objet créé et à n’importe quel moment de sa vie, modifier les valeurs de ses propriétés et ses méthodes ou lui en attribuer de nouvelles.

La fonction constructeur doit vraiment être vue en JavaScript comme un plan de base pour la création d’objets similaires et comme un moyen de gagner du temps et de la clarté dans son code. On ne va définir dans cette fonction que les caractéristiques communes de nos objets et on pourra ensuite rajouter à la main les propriétés particulières à un objet.

On va ainsi par exemple tout à fait pouvoir rajouter une propriété taille à notre objet pierre après sa création.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-ajout-membre-objet-apres-creation-constructeur.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-ajout-membre-objet-apres-creation-constructeur-resultat.png)

Notre objet pierre dispose désormais d’une propriété taille qui lui est exclusive (les autres objets créés ne possèdent pas cette propriété).

# Constructeur Object, prototype et héritage en JavaScript

Dans cette nouvelle leçon, nous allons définir ce qu’est un prototype et comprendre comment le JavaScript utilise les prototypes pour permettre à certains d’objets d’avoir accès aux méthodes et propriétés définies dans d’autres objets.

## L’utilisation d’un constructeur et la performance

Dans la leçon précédente, nous avons pu créer plusieurs objets semblables en appelant plusieurs fois une fonction constructeur personnalisée Utilisateur() et en utilisant le mot clef new comme ceci :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-objet-constructeur-heritage.png)

Ici, on commence par définir une fonction constructeur puis on crée deux variables qui vont stocker deux objets créés à partir de ce constructeur. En procédant comme cela, chaque objet va disposer de sa propre copie des propriétés et méthodes du constructeur ce qui signifie que chaque objet créer va posséder trois propriétés nom, age et mail et une méthode bonjour() qui va lui appartenir.

L’équivalent de cette écriture sous forme d’objet littéral serait la suivante :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-objet-litteral-heritage.png)

L’un des enjeux principaux en tant que développeurs doit toujours être la performance de nos codes. Dans le cas présent, notre code n’est pas optimal puisqu’en utilisant notre constructeur plusieurs fois on va copier à chaque fois la méthode bonjour() qui est identique pour chaque objet.

Ici, l’idéal serait de ne définir notre méthode qu’une seule fois et que chaque objet puisse l’utiliser lorsqu’il le souhaite. Pour cela, nous allons recourir à ce qu’on appelle des prototypes.

## Le prototype en JavaScript orienté objet

Le JavaScript est un langage orienté objet basé sur la notion de prototypes.

Vous devez en effet savoir qu’il existe deux grands types de langages orientés objet : ceux basés sur les classes, et ceux basés sur les prototypes.

La majorité des langages orientés objets sont basés sur les classes et c’est souvent à cause de cela que les personnes ayant déjà une certaine expérience en programmation ne comprennent pas bien comme fonctionne l’orienté objet en JavaScript.

En effet, les langages objets basés sur les classes et ceux basés sur les prototypes vont fonctionner différemment.

Pour information, une classe est un plan général qui va servir à créer des objets similaires. Une classe va généralement contenir des propriétés, des méthodes et une méthode constructeur.

Cette méthode constructeur va être appelée automatiquement dès qu’on va créer un objet à partir de notre classe et va nous permettre dans les langages basés sur les classes à initialiser les propriétés spécifiques des objets qu’on crée.

Dans les langages orientés objet basés sur les classes, tous les objets sont créés à partir de classes et vont hériter des propriétés et des méthodes définies dans la classe.

Dans les langages orientés objet utilisant des prototypes comme le JavaScript, tout est objet et il n’existe pas de classes et l’héritage va se faire au moyen de prototypes.

Ce qui va suivre n’est pas forcément évident à se représenter mais est néanmoins essentiel pour bien maitriser le JavaScript orienté objet. Soyez donc bien attentif.

Avant tout, je tiens à vous rappeler que les fonctions en JavaScript sont avant tout des objets. Lorsqu’on créé une fonction, le JavaScript va automatiquement lui ajouter une propriété prototype qui ne va être utile que lorsque la fonction est utilisée comme constructeur, c’est-à-dire lorsqu’on l’utilise avec la syntaxe new.

Cette propriété prototype possède une valeur qui est elle-même un objet. On parlera donc de « prototype objet » ou « d’objet prototype » pour parler de la propriété prototype.

Par défaut, la propriété prototype d’un constructeur ne contient que deux propriétés : une propriété constructor qui renvoie vers le constructeur contenant le prototype et une propriété __proto__ qui contient elle-même de nombreuses propriétés et méthodes.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-prototype-constructeur.png)

Lorsqu’on crée un objet à partir d’un constructeur, le JavaScript va également ajouter automatiquement une propriété __proto__ à l’objet créé.

La propriété __proto__ de l’objet créé va être égale à la propriété __proto__ du constructeur qui a servi à créer l’objet.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-proto-objet.png)

A quoi servent la propriété prototype d’un constructeur et la propriété __proto__ dont disposent à la fois le constructeur mais également tous les objets créés à partir de celui-ci ?

En fait, le contenu de la propriété prototype d’un constructeur va être partagé par tous les objets créés à partir de ce constructeur. Comme cette propriété est un objet, on va pouvoir lui ajouter des propriétés et des méthodes que tous les objets créés à partir du constructeur vont partager.

Cela permet l’héritage en orienté objet JavaScript. On dit qu’un objet « hérite » des membres d’un autre objet lorsqu’il peut accéder à ces membres définis dans l’autre objet.

En l’occurrence, ici, les objets crées à partir du constructeur ne possèdent pas vraiment les propriétés et les méthodes définies dans la propriété prototype du constructeur mais vont pouvoir y accéder et se « partager » ces membres définis dans l’objet prototype du constructeur.

Pour faire fonctionner cela en pratique, il faut se rappeler que la propriété prototype est un objet et qu’on va donc pouvoir lui ajouter des propriétés et des méthodes comme pour tout autre objet. Regardez plutôt l’exemple ci-dessous :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-modification-prototype-constructeur.png)

Ici, on ajoute une propriété taille et une méthode bonjour() à la propriété prototype du constructeur Utilisateur(). Chaque objet créé à partir de ce constructeur va avoir accès à cette propriété et à cette méthode.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-modification-prototype-constructeur-resultat.png)

Définir des propriétés et des méthodes dans le prototype d’un constructeur nous permet ainsi de les rendre accessible à tous les objets créés à partir de ce constructeur sans que ces objets aient à les redéfinir.

Pour avoir le code le plus clair et le plus performant possible, nous définirons donc généralement les propriétés des objets (dont les valeurs doivent être spécifiques à l’objet) au sein du constructeur et les méthodes (que tous les objets vont pouvoir appeler de la même façon) dans le prototype du constructeur.

Ce que vous devez bien comprendre ici est que les différents objets se « partagent » ici la même propriété taille et la même méthode bonjour() définies dans le constructeur.

Pour bien comprendre comment cela est possible, il va falloir comprendre le rôle de la propriété __proto.

## La chaine des prototypes ou chaine de prototypage et l’objet Object

Comment un objet peut-il accéder à une propriété ou à une méthode définie dans un autre objet ?

Pour répondre à cette question, il faut savoir que lorsqu’on essaie d’accéder à un membre d’un objet, le navigateur (qui exécute le JavaScript) va d’abord chercher ce membre au sein de l’objet.

S’il n’est pas trouvé, alors le membre va être cherché au sein de la propriété __proto__ de l’objet dont le contenu est, rappelons-le, égal à celui de la propriété prototype du constructeur qui a servi à créer l’objet.

Si le membre est trouvé dans la propriété __proto__ de l’objet (c’est-à-dire s’il a été défini dans la propriété prototype du constructeur), alors il est utilisé. Si ce n’est pas le cas, alors on va aller chercher dans la propriété __proto__ dont dispose également le constructeur et qui va être égale au prototype du constructeur du constructeur.

On dit alors qu’on « remonte la chaine des prototypes ». A ce niveau, il faut savoir que tous les objets en JavaScript descendent par défaut d’un objet de base qui s’appelle Object.

Cet objet est l’un des objets JavaScript prédéfinis et permet notamment de créer des objets génériques vides grâce à la syntaxe new Object().

L’objet ou le constructeur Object() va être le parent de tout objet en JavaScript (sauf certains objets particuliers créés intentionnellement pour ne pas dépendre d’Object) et également posséder une propriété prototype.

Ainsi, lorsqu’on essaie d’accéder à un membre d’un objet, le membre en question sera d’abord cherché dans l’objet puis dans sa propriété __proto__ s’il n’est pas trouvé dans l’objet puis dans la propriété __proto__ de son constructeur et etc. jusqu’à remonter au constructeur Object().

Si finalement le membre demandé n’est pas trouvé dans le constructeur Object(), alors il sera considéré comme non présent.

Comprendre cela va nous permettre de créer des hiérarchies d’objets et notamment de mettre en place un héritage en orienté objet JavaScript.

## Mise en place d’une hiérarchie d’objets avec héritage en JavaScript

Lorsqu’on a compris comment le JavaScript utilise le prototypage, on est capable de créer une hiérarchie d’objets avec des objets qui héritent des membres d’autres objets.

Quel intérêt à faire cela ? Parfois, nous voudrons créer des types d’objets relativement proches. Plutôt que de redéfinir un constructeur entièrement à chaque fois, il va être plus judicieux de créer un constructeur de base qui va contenir les propriétés et méthodes communes à tous nos objets puis des constructeurs plus spécialisés qui vont hériter de ce premier constructeur.

Attention, à partir d’ici, on commence à toucher à des choses vraiment complexes et qui sont difficiles à assimiler et dont l’intérêt est dur à percevoir en particulier pour des débutants.

Pour autant, ces mécanismes sont au cœur du JavaScript et sont ce qui fait toute sa puissance. Il est donc essentiel de les comprendre tôt ou tard pour utiliser tout le potentiel du JavaScript.

Pour mettre en place un héritage ou plus exactement un système de délégation (qui est un mot beaucoup plus juste que le terme « héritage » dans le cas du JavaScript), nous allons toujours procéder en trois étapes :

1. On va déjà créer un constructeur qui sera notre constructeur parent ;
2. On va ensuite un constructeur enfant qui va appeler le parent ;
3. On va modifier la __proto__ de la propriété prototype de l’enfant pour qu’elle soit égale au parent.

Prenons immédiatement un exemple pratique :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-heritage-prototype.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-heritage-prototype.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-heritage-prototype-resultat.png)

Ce code semble complexe à première vue. Il l’est. Nous allons tenter de l’expliquer et de le décortiquer ligne par ligne.

Dans ce script, nous définissons 3 constructeurs : Ligne(), Rectangle() et Parallelepipede(). Ici, on veut que Rectangle() hérite de Ligne() et que Parallelepipede() hérite de Rectangle() (et donc par extension de Ligne().

Notre premier constructeur Ligne() possède une propriété longueur. Ce constructeur prend en argument la valeur relative à la propriété longueur d’un objet en particulier lorsqu’on crée un objet à partir de celui-ci.

On ajoute ensuite une première méthode dans le prototype de notre constructeur. Cette méthode appartient au constructeur et sera partagée par tous les objets créés à partir de celui-ci. Jusque-là, c’est du déjà vu.

On crée ensuite un deuxième constructeur Rectangle(). Dans ce constructeur, vous pouvez remarquer la ligne Ligne.call(this, longueur);.

Pour information, la méthode call() permet d’appeler une fonction rattachée à un objet donné sur un autre objet. La méthode call() est une méthode prédéfinie qui appartient au prototype de l’objet natif Function.

On l’utilise ici pour faire appel au constructeur Ligne() dans notre constructeur Rectangle(). Le mot clef this permet de faire référence à l’objet courant et de passer la valeur de l’objet relative à sa propriété longueur.

Ensuite, on va créer un objet en utilisant le prototype de Ligne grâce à la méthode create() qui est une méthode de l’objet Object() et on va assigner cet objet au prototype de Rectangle.

Le prototype de Rectangle possède donc en valeur un objet créé à partir du prototype de Ligne. Cela permet à Rectangle d’hériter des propriétés et méthodes définies dans le prototype de Ligne.

Il nous reste cependant une chose à régler ici : il va nous falloir rétablir la valeur de la propriété constructor de prototype de Rectangle car la ligne précédente a eu pour effet de définir Rectangle.prototype.constructor comme étant égal à celui de Ligne().

On ajoute finalement une méthode aire() au prototype de Rectangle.

On répète l’opération en création un deuxième niveau d’héritage avec le constructeur Parallélépipède() qui va hériter de Rectangle().

Enfin, on crée un objet geo à partir du constructeur Parallélépipède(). Cet objet va pouvoir utiliser les méthodes définies dans les prototypes de Parallélépipède(), de Rectangle() et de Ligne() !

Je vous rassure : ce script était l’un des plus durs voire peut être le plus dur à comprendre de ce cours.

# Les classes en JavaScript

Dans cette nouvelle leçon, nous allons étudier une syntaxe introduite récemment en JavaScript orienté objet utilisant des classes à la manière des langages orientés objet basés sur les classes.

Pour bien comprendre cette leçon, nous allons déjà étudier les spécificités des langages orientés objet basés sur les classes et découvrir rapidement la syntaxe d’une classe puis discuterons de l’implémentation des classes en JavaScript et de l’impact de celles-ci sur le fond de son modèle objet.

# Introduction aux langages orientés objet basés sur les classes

Il existe deux grands types de langages orientés objet : ceux basés sur les classes, et ceux basés sur les prototypes.

Le JavaScript est un langage orienté objet basé sur la notion de prototypes, mais la plupart des langages supportant l’orienté objet sont basés sur les classes.

Le modèle objet des langages orientés objet basés sur les classes est conçu autour de deux entités différentes : les classes et les objets.

Une classe est un plan général qui va servir à créer des objets similaires. Le code d’une classe va généralement être composé de propriétés et de méthodes dont vont hériter les objets qui vont être créés à partir de la classe.

Une classe va également contenir une méthode constructeur qui va être appelée automatiquement dès qu’on va créer un objet à partir de notre classe et va nous permettre d’initialiser les propriétés d’un objet.

Une classe pour les langages basés sur les classes va être plus ou moins l’équivalent d’un constructeur pour les langages prototypés comme le JavaScript.

Il existe de grandes différences conceptuelles entre les langages orientés objet basés sur les classes et ceux bases sur les prototypes. On peut notamment noter les suivantes :

- Dans les langages basés sur les classes, tous les objets sont créés en instanciant des classes ;
- Une classe contient toutes les définitions des propriétés et méthodes dont dispose un objet. On ne peut pas ensuite rajouter ou supprimer des membres à un objet dans les langages basés sur les classes ;
- Dans les langages basés sur les classes, l’héritage se fait en définissant des classes mères et des classes étendues ou classes enfants.

Regardez l’exemple ci-dessous. Ce code est un code PHP, un autre langage informatique très connu.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-exemple-php-objet.png)

Dans ce script, on définit une classe Utilisateur avec le mot clef class puis on crée trois objets à partir de cette classe : $pierre, $mathilde et $florian.

L’idée n’est bien évidemment pas ici de vous apprendre à coder en PHP mais que vous compreniez les différentes approches de l’orienté objet des différents langages.

Comme vous pouvez le constater, la plupart des éléments se ressemblent. Les éléments commençant par le signe $ sont des variables (ou des propriétés ici) PHP qui sont l’équivalent des variables JavaScript, $this sert à faire référence à l’objet courant comme en JavaScript et les éléments déclarés avec function sont des fonctions (ou des méthodes dans le cas présent).

Ce qui nous intéresse particulièrement ici sont les dernières lignes du script. On utilise le mot clef new pour instancier notre classe. Lorsqu’on crée une instance d’une classe, un objet est automatiquement créé et cet objet hérite des propriétés et des méthodes de la classe.

Une fois l’objet créé, la méthode constructeur __construct() est appelée et va, dans le cas présent, initialiser les propriétés $user_name et $user_age de l’objet créé, c’est-à-dire leur affecter des valeurs.

Ainsi, la propriété $user_name de l’objet $pierre va stocker la valeur « Pierre » tandis que la propriété $user_age de ce même objet va stocker la valeur « 29 ».
La propriété $user_name de l’objet $mathilde va elle stocker la valeur « Math » et etc.

Cela doit vous sembler relativement flou si vous n’avez jamais vu de PHP dans votre vie et c’est tout à fait normal. Retenez simplement qu’ici notre classe nous sert de plan pour créer des objets. On crée des objets en instanciant la classe et les objets créés à partir de la classe héritent tous des mêmes propriétés (avec des valeurs d’initialisation différentes) et des mêmes méthodes définies dans la classe.

Dans les langages orientés objet basés sur les classes, on va également pouvoir créer des hiérarchies de classes. En effet, on va pouvoir créer des sous-classes à partir d’une classe principale (on dit qu’on « étend » la classe). Les sous-classes vont hériter de toutes les propriétés et méthodes définies dans la classe principale et vont également pouvoir définir de nouvelles méthodes et de nouvelles propriétés.

# Les classes en JavaScript

Si je vous parle de cet autre modèle objet, c’est parce que le JavaScript a également dans ses dernières versions introduit un mot clef class qui va nous permettre de créer des architectures objets similaires à ce qu’on a vu au-dessus.

Attention cependant : le JavaScript est toujours un langage orienté objet à prototypes et, en tâche de fond, il va convertir nos « classes » selon son modèle prototypes.

Les classes JavaScript ne sont donc qu’une nouvelle syntaxe qui nous est proposée par le JavaScript notamment pour les gens plus habitués à travailler avec des langages orientés objet basés sur les classes.

Retenez bien qu’on va pouvoir imiter la forme des langages basés sur les classes mais que dans le fond le JavaScript reste un langage prototypé.

## Création d’une classe et d’objets en JavaScript

Voyons immédiatement comment créer une classe en JavaScript en pratique et les subtilités derrière l’utilisation de celles-ci.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-creation-classe-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-creation-classe.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-creation-classe-resultat.png)

On crée une nouvelle classe grâce au mot clef class. Dans notre classe, on définit une méthode constructor() qui va nous servir à initialiser les propriétés des objets créés par la suite à partir de la classe avec les valeurs courantes des objets.

Sous la méthode constructeur, nous allons définir des méthodes de classe auxquelles les objets auront accès.

Une fois notre définition de classe complète, on va pouvoir créer des objets à partir de celle-ci de la même manière que précédemment, c’est-à-dire en utilisant le mot clef new suivi du nom de la classe. On dit qu’on instancie la classe. Dans le cas présent, on crée deux objets geo1 et geo2.

## Classes étendues et héritage en JavaScript

Pour étendre une classe, c’est-à-dire pour créer une classe enfant qui va hériter des propriétés et des méthodes d’une classe parent, nous allons utiliser le mot clef extends.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-creation-classe-heritage-extends.png)

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-objet-creation-classe-heritage-extends-resultat.png)

Ici, on crée une classe Rectangle qui vient étendre notre classe de base Ligne avec la syntaxe class Rectangle extends Ligne.

La chose à savoir ici est que nous devons utiliser le mot clef super() qui permet d’appeler le constructeur parent dans le constructor() de notre classe fille afin que les propriétés soient correctement initialisées.

On peut ensuite créer des objets à partir de notre classe fille. Les objets vont également avoir accès aux propriétés et méthodes de la classe mère.

Nous pourrions aller plus loin dans l’étude des classes en JavaScript mais, en tant que débutant, je ne pense pas que cela vous soit bénéfique et allons donc nous contenter de ce qu’on a vu jusqu’ici.

## Conclusion sur l’orienté objet et sur les classes en JavaScript

Le JavaScript est un langage qui possède un fort potentiel objet. En effet, ce langage utilise les objets dans sa syntaxe même et la grande partie des éléments que nous manipulons en JavaScript sont en fait des objets ou vont pouvoir être convertis en objets et traités en tant que tel.

Le JavaScript est un langage objet basé sur les prototypes. Cela signifie que le JavaScript ne possède qu’un type d’élément : les objets et que tout objet va pouvoir partager ses propriétés avec un autre, c’est-à-dire servir de prototype pour de nouveaux objets. L’héritage en JavaScript se fait en remontant la chaine de prototypage.

Récemment, le JavaScript a introduit une syntaxe utilisant les classes pour son modèle objet. Cette syntaxe est copiée sur les langages orientés objets basés sur les classes et nous permet concrètement de mettre en place l’héritage en JavaScript plus simplement.

Attention cependant : cette syntaxe n’introduit pas un nouveau modèle d’héritage dans JavaScript ! En arrière-plan, le JavaScript va convertir les classes selon le modèle prototypé. Il reste donc essentiel de comprendre le prototypage en JavaScript.

En plus de la possibilité d’utiliser l’orienté objet pour créer nos propres objets et nos propres chaines de prototypage, le JavaScript possède des objets (constructeurs) prédéfinis ou natifs comme Object(), Array(), Function(), String(), Number(), etc. dont nous allons pouvoir utiliser les méthodes et les propriétés. Nous allons voir comment les utiliser dans la partie suivante.

# Valeurs primitives et objets prédéfinis en JavaScript

Dans la partie précédente, nous avons défini ce qu’était la programmation orientée objet ainsi que la façon dont le JavaScript l’implémentait.

Nous avons notamment vu en détail l’intérêt de programmer en orienté objet, ce qu’était un objet et de quoi était composé un objet ainsi que comment créer un objet littéral.

Nous sommes ensuite allés plus loin en définissant un constructeur d’objets personnalisé et en comprenant les subtilités de l’héritage en JavaScript avec la chaine de prototypage.

Vous devez savoir que le JavaScript dispose également de constructeurs d’objets prédéfinis dans son langage. Ces constructeurs vont disposer de propriétés et de méthodes intéressantes qu’on va pouvoir immédiatement utiliser avec les objets qu’on va créer à partir de ces constructeurs.

Dans cette nouvelle partie, nous allons voir certains de ces constructeurs (qu’on appellera désormais simplement des objets) et définirons ce que sont les valeurs primitives.

## Retour sur les types de valeurs

En JavaScript, il existe 7 types de valeurs différents. Chaque valeur qu’on va pouvoir créer et manipuler en JavaScript va obligatoirement appartenir à l’un de ces types. Ces types sont les suivants :

    string ou « chaine de caractères » en français ;
    number ou « nombre » en français ;
    boolean ou « booléen » en français ;
    null ou « nul / vide » en français;
    undefined ou « indéfini » en français ;
    symbol ou « symbole » en français ;
    object ou « objet » en français ;

Les valeurs appartenant aux 6 premiers types de valeurs sont appelées des valeurs primitives. Les valeurs appartenant au type object sont des objets.

## Définition des valeurs primitives et différence avec les objets

Le JavaScript possède deux grandes catégories de types de données : les valeurs primitives et les objets.

On appelle valeur primitive en JavaScript une valeur qui n’est pas un objet et qui ne peut pas être modifiée.

En effet, une fois un nombre ou une chaine de caractères définis, on ne va plus pouvoir les modifier en JavaScript. Bien évidemment, si on stocke une chaine de caractères dans une variable, par exemple, on va tout à fait pouvoir écraser cette chaine pour stocker une autre valeur. Pour autant, la chaine de caractères stockée n’aura pas été modifiée : elle aura été écrasée et c’est bien une nouvelle valeur complètement différente qui va être stockée dans notre variable dans ce cas.

Cela va être différent pour les objets : on va tout à fait pouvoir modifier les membres d’un objet.

Autre différence notable entre valeurs primitives et objets : les valeurs primitives sont passées et comparées par valeur tandis que les objets sont passés et comparés par référence.

Si deux valeurs primitives ont la même valeur, elles vont être considérées égales. Si deux objets définissent les mêmes propriétés et méthodes avec les mêmes valeurs, ils ne vont pas être égaux. Pour que deux objets soient égaux, il faut que les deux fassent référence aux mêmes membres.

Regardez l’exemple suivant pour bien comprendre :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-valeur-primitive-objet-valeur-reference-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-valeur-primitive-objet-valeur-reference.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-valeur-primitive-objet-valeur-reference-resultat.png)

A partir d’ici, il y a une chose que vous devez bien comprendre : chaque type de valeur primitive, à l’exception de null et de undfenied, possède un équivalent objet prédéfini en JavaScript.

Ainsi, le JavaScript possède quatre objets natifs String, Number, Boolean et Symbol qui contiennent des propriétés et des méthodes.

Regardez plutôt le code ci-dessous :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-valeur-primitive-objet-type-lie.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-valeur-primitive-objet-type-lie-resultat.png)

Ici, notre variable let ch1 contient une valeur primitive de type chaine de caractères (string) tandis que la variable ch2 contient un objet String.

## Valeur primitive ou objet : que préférer ?

Quel intérêt de pouvoir définir une chaine de caractères de deux façons et quelle syntaxe préférer ? Nous allons répondre à ces questions immédiatement.

Ici, vous devez bien comprendre que notre constructeur String() possède de nombreuses méthodes et propriétés dont va hériter notre objet let ch2 et qu’on va donc pouvoir utiliser.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-acces-methode-propriete-objet-predefini.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-acces-methode-propriete-objet-predefini-resultat.png)

Ici, on utilise la propriété length et la méthode toUpperCase() définies dans le constructeur String() sur notre objet de type string afin de connaitre la longueur de la chaine de caractères et de renvoyer cette chaine en majuscules.

A ce stade, vous devriez donc vous dire qu’il est beaucoup mieux de créer des objets que d’utiliser les valeurs primitives puisqu’on a accès de de nombreux nouveaux outils avec ceux-ci.

En fait, c’est le contraire : les valeurs primitives ont été mises en place par le JavaScript justement pour nous éviter d’avoir à créer des objets.

En effet, vous devez savoir que déclarer une valeur primitive offre de bien meilleurs résultats en termes de performances que de créer un nouvel objet et c’est la raison principale de l’existence de ces valeurs.

De plus, vous devez savoir qu’on va pouvoir utiliser les méthodes et propriétés définies dans les constructeurs relatifs avec nos valeurs primitives pour avoir en quelques sortes « le meilleur des deux mondes ».

Comment cela est-ce possible ? Pour comprendre cela, il faut savoir que lorsqu’on tente d’accéder à une propriété ou à une méthode depuis une valeur primitive, le JavaScript va convertir cette valeur en un objet relatif au type de la valeur primitive (un objet String pour une chaine de caractères, Number pour un nombre, etc.).

Ce processus est très complexe et n’a pas besoin d’être expliqué ici. Tout ce que vous devez retenir, c’est qu’on va tout à fait pouvoir utiliser les propriétés et méthodes du constructeur avec nos valeurs primitives :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-acces-methode-propriete-valeur-primitive.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-acces-methode-propriete-valeur-primitive-resultat.png)

Dans la suite de cette partie, nous allons étudier en détail les constructeurs liés aux types de valeurs primitives et découvrir leurs propriétés et méthodes les plus utiles. Nous allons également étudier quelques objets spéciaux qui ne permettent malheureusement pas l’établissement de valeurs primitives mais qui sont incontournables comme l’objet Math, l’objet Array (tableau) ou encore l’objet Date.

Tous les objets que nous verrons dans cette partie sont des objets prédéfinis en JavaScript. On appelle également ces objets natifs des objets « globaux ».

- [String MDN](https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/String)
- [Number MDN](https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Number)
- [Array MDN](https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Array)
- [Math MDN](https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Math)
- [Date MDN](https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Date)