# Introduction aux expressions régulières ou expressions rationnelles en JavaScript

Dans cette nouvelle partie, nous allons nous intéresser aux expressions régulières encore appelées expressions rationnelles ou en abrégé « Regex ».

Avant de découvrir ce que sont les expressions régulières, vous devez bien comprendre que les expressions régulières ne sont pas un élément du langage JavaScript en soi mais constituent en fait un autre langage en soi.

Comme de nombreux autres langages, le JavaScript supporte l’utilisation des expressions régulières et nous fournit des outils pour utiliser toute leur puissance.

Nous allons donc ici découvrir ce que sont les expressions régulières, comment les construire et comment les utiliser intelligemment en JavaScript.

## Présentation des expressions régulières

Les expressions régulières sont des schémas ou des motifs utilisés pour effectuer des recherches et des remplacements dans des chaines de caractères.

Ces schémas ou motifs sont tout simplement des séquences de caractères dont certains vont disposer de significations spéciales et qui vont nous servir de schéma de recherche. Concrètement, les expressions régulières vont nous permettre de vérifier la présence de certains caractères ou suites de caractères dans une expression.

En JavaScript, les expressions régulières sont avant tout des objets appartenant à l’objet global constructeur RegExp. Nous allons donc pouvoir utiliser les propriétés et méthodes de ce constructeur avec nos expressions régulières.

Notez déjà que nous n’allons pas être obligés d’instancier ce constructeur pour créer des expressions régulières ni pour utiliser des méthodes avec celles-ci.

Nous allons également pouvoir passer nos expressions régulières en argument de certaines méthodes de l’objet String pour effectuer des recherches ou des remplacements dans une chaine de caractère.

## Création d’une première expressions régulière et syntaxe des Regex

Nous disposons de deux façons de créer nos expressions régulières en JavaScript : on peut soit déclarer nos expressions régulières de manière littérale, en utilisant des slashs comme caractères d’encadrement, soit appeler le constructeur RegExp().

De manière générale, on préfèrera comme souvent utiliser une écriture littérale tant que possible pour des raisons de performance.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-creation-expressoin-reguliere-litteral-objet-regexp.png)

Dans le code ci-dessus, on définit deux expressions régulières en utilisant les deux méthodes décrites précédemment. On les enferme dans des variables masque1 et masque2. Notez que les termes « masque de recherche », « schéma de recherche » et « motif de recherche » seront utilisés indifféremment et pour décrire nos expressions régulières par la suite.

Dans cet exemple, nos deux expressions régulières disposent du même motif qui est le motif simple /Pierre/. Ce motif va nous permettre de tester la présence de « Pierre » c’est-à-dire d’un « P » suivi d’un « i » suivi d’un « e » suivi d’un « r » suivi d’un autre « r » suivi d’un « e » dans une chaine de caractères.

Dans ce cas-là, notre masque n’est pas très puissant et le recours aux expressions régulières n’est pas forcément nécessaire. Cependant, nous allons également pouvoir construire des motifs complexes grâce aux expressions régulières qui vont nous permettre d’effectuer des tests de validation très puissants.

Pour créer des motifs de recherche complexes, nous allons utiliser ces caractères spéciaux, c’est-à-dire des caractères qui vont disposer d’une signification spéciale dans le contexte des expressions régulières. Ces caractères au sens spécial vont pouvoir être classés dans différents groupes en fonction de ce qu’ils apportent à notre schéma.

Dans la suite de cette partie, nous allons étudier chacun d’entre eux pour créer des motifs de plus en plus complexes qui vont pouvoir être utilisés de manière pratique avec certaines méthodes des objets String ou RegExp pour par exemple vérifier la validité d’un champ de formulaire ou la présence d’une certaine séquence de caractères ou d’un certain type de séquences dans une chaine.

# Utiliser les expressions régulières pour effectuer des recherches et remplacements en JavaScript

Dans cette nouvelle leçon, nous allons passer en revue les différentes méthodes des objets String et RegExp qu’on va pouvoir utiliser avec nos expressions régulières afin d’effectuer des recherches ou des remplacements dans des chaines de caractères.

Nous allons pour le moment nous contenter d’utiliser ces méthodes avec des expressions régulières très simples. Nous apprendrons à créer des masques de recherche plus complexes dans les leçons suivantes.

## La méthode match() de l’objet String

La méthode match() de l’objet String va nous permettre de rechercher la présence de caractères ou de séquences de caractères dans une chaine de caractères.

Pour cela, nous allons lui passer un objet représentant une expressions régulière en argument et match() va renvoyer un tableau avec les correspondances entre notre masque et la chaine de caractères c’est-à-dire un tableau contenant des caractères ou séquences de caractères trouvés dans la chaine de caractères qui satisfont à notre masque de recherche.

Dans le cas où aucune correspondance n’est trouvée, match() renverra la valeur null.

Notez que la méthode match() ne renvoie par défaut que la première correspondance trouvée. Pour que match() renvoie toutes les correspondances, il faudra utiliser l’option ou « drapeau » g qui permet d’effectuer des recherches globales.

Dans le cas où le drapeau g est utilisé, match() ne renverra alors pas les groupes capturants. Nous verrons plus tard exactement ce que sont les drapeaux et les groupes capturants.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-methode-string-regexp-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-match.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-match-resultat.png)

Ici, notre deuxième masque utilise un intervalle ou une classe de caractères. Cette expression régulière va permettre de rechercher toute lettre majuscule qui se situe dans l’intervalle « A-Z », c’est-à-dire en l’occurrence n’importe quelle lettre majuscule de l’alphabet (lettres accentuées ou avec cédille exclues). Nous étudierons les classes de caractères dans la prochaine leçon.

Notre troisième masque utilise en plus l’option ou le drapeau g qui permet d’effectuer une recherche dite globale et qui demande à match() de renvoyer toutes les correspondances. Notez que les drapeaux sont les seules entités dans les expressions régulières qui vont se placer à l’extérieur des délimiteurs.

## La méthode search() de l’objet String

La méthode search() permet d’effectuer une recherche dans une chaine de caractères à partir d’une expression régulière fournie en argument.

Cette méthode va retourner la position à laquelle a été trouvée la première occurrence de l’expression recherchée dans une chaîne de caractères ou -1 si rien n’est trouvé.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-search.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-search-resultat.png)

## La méthode replace() de l’objet String

La méthode replace() permet de rechercher un caractère ou une séquence de caractères dans une chaine et de les remplacer par d’autres caractère ou séquence. On va lui passer une expression régulière et une expression de remplacement en arguments.

Cette méthode renvoie une nouvelle chaine de caractères avec les remplacements effectués mais n’affecte pas la chaine de caractères de départ qui reste inchangée.

Tout comme pour match(), seule la première correspondance sera remplacée à moins d’utiliser l’option g dans notre expression régulière.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-replace.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-replace-resultat.png)

## La méthode split() de l’objet String

La méthode split() permet de diviser ou de casser une chaine de caractères en fonction d’un séparateur qu’on va lui fournir en argument.

Cette méthode va retourner un tableau de sous chaines créé à partir de la chaine de départ. La chaine de départ n’est pas modifiée.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-split.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-split-resultat.png)

Dans l’exemple ci-dessus, on utilise un masque de recherche d’expression régulière comme séparateur. Ce masque permet de trouver une espace, une virgule ou une apostrophe qui vont donc servir de séparateur.

Dès que l’un de ces trois symbole est rencontré dans la chaine de départ, la méthode split() crée une nouvelle sous chaîne et la stocke dans un tableau.

Ici, le deuxième élément du tableau crée est vide car nous avons une virgule et une espace qui se suivent. En effet, split() découpe la chaine dès qu’elle rencontre la virgule puis elle la découpe à nouveau dès qu’elle rencontre l’espace. L’élément crée ne contient ici aucun caractère.

## La méthode exec() de l’objet RegExp

La méthode exec() de RegExp va rechercher des correspondances entre une expression régulière et une chaine de caractères.

Cette méthode retourne un tableau avec les résultats si au moins une correspondance a été trouvée ou null dans le cas contraire.

Pour être tout à fait précis, le tableau renvoyé contient le texte correspondant en premier élément. Les éléments suivants sont composés du texte correspondant aux parenthèses capturantes éventuellement utilisées dans notre expression régulière (une nouvelle fois, nous verrons ce que sont les parenthèses capturantes plus tard).

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-exec.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-exec-resultat.png)

## La méthode test() de l’objet RegExp

La méthode test() de RegExp va également rechercher des correspondances entre une expression régulière et une chaine de caractères mais va cette fois-ci renvoyer le booléen true si au moins une correspondance a été trouvée ou false dans le cas contraire.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-test.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-test-resultat.png)

# Les classes de caractères et classes abrégées des expressions régulières JavaScript

Dans cette nouvelle leçon, nous allons découvrir les classes de caractères et commencer à créer des masques relativement complexes et intéressants pour nos expressions régulières.

## Les classes de caractères

Les classes de caractères vont nous permettre de fournir différents choix de correspondance pour un caractère en spécifiant un ensemble de caractères qui vont pouvoir être trouvés.

En d’autres termes, elles vont nous permettre de rechercher n’importe quel caractère d’une chaine qui fait partie de la classe de caractères fournie dans le masque, ce qui va rendre les expressions régulières déjà beaucoup plus puissantes et flexibles qu’une recherche classique.

Pour déclarer une classe de caractères dans notre masque, nous allons utiliser une paire de crochets [ ] qui vont nous permettre de délimiter la classe en question.

Prenons immédiatement un exemple concret en utilisant des classes de caractères simples :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-classe-caractere-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-classe-caractere.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-classe-caractere-resultat.png)

Notre premier masque est très simple : il contient uniquement la classe de caractères [aeiouy] et l’option g qui indique qu’on souhaite effectuer une recherche globale.

La classe de caractères [aeiouy] va trouver n’importe quelle voyelle minuscule dans une chaine. Ici, on utilise nos masques avec la méthode match() qui renvoie un tableau contenant les différentes correspondances trouvées entre la chaine de caractères donnée et le masque fourni.

Notre deuxième masque permet de chercher la séquence « un j suivi d’un voyelle ». En effet, ici, on place le caractère « j » en dehors de notre classe de caractères. Ce masque va donc nous permettre de chercher des séquences de deux caractères dont le premier est un « j » et le deuxième fait partie de la classe [aeiouy], c’est-à-dire les séquences « ja », « je », « ji », « jo », « ju » et « jy ».

Dans notre troisième masque, nous utilisons cette fois-ci deux classes de caractères d’affilée. Ici, les deux classes de caractères sont identiques (on aurait tout-à-fait pu spécifier deux classes de caractères différentes) et vont toutes les deux nous permettre de rechercher une voyelle. Ce masque permet donc de rechercher une séquence de deux voyelles, c’est-à-dire une voyelle suivie d’une autre voyelle.

Ici, vous pouvez déjà vous rendre compte à quel point les expressions régulières vont s’avérer puissantes et pratiques car on va pouvoir chercher plusieurs séquences de caractères différentes avec un seul masque.

## Les classes de caractères et les méta caractères

Dans le langage des expressions régulières, de nombreux caractères vont avoir une signification spéciale et vont nous permettre de signifier qu’on recherche tel caractères ou telle séquence de caractères un certain nombre de fois ou à une certaine place dans une chaine.

On appelle ces caractères qui possèdent une signification des métacaractères. Ceux-ci vont nous permettre de créer des masques complexes et donc des schémas de recherche puissants. Le premier exemple de métacaractères qu’on a pu voir est tout simplement les caractères [ et ] qui, ensemble, servent à délimiter une classe de caractères.

Il existe de nombreux métacaractères qu’on va pouvoir inclure dans nos masques. Cependant, au sein des classes de caractères, la plupart de ces métacaractères perdent leur signification spéciale. Il faudra donc toujours faire bien attention à bien distinguer les sens de ces caractères selon qu’ils sont dans une classe de caractères ou pas.

Au sein des classes de caractères, seuls les caractères suivants possèdent une signification spéciale et peuvent donc être considérés comme des méta caractères :

| Métacaractère | Description |
|---|---|
| \ | Caractère de protection ou d’échappement qui va avoir plusieurs usages (on va pouvoir s’en servir pour donner un sens spécial à des caractères qui n’en possèdent pas ou au contraire pour neutraliser le sens spécial des métacaractères). |
| ^ | Si placé au tout début d’une classe, permet de nier la classe c’est-à-dire de chercher tout caractère qui n’appartient pas à la classe. |
| – | Entre deux caractères, permet d’indiquer un intervalle de caractères (correspond à écrire les deux caractères et tous les caractères entre ces deux là). |

Si on souhaite rechercher le caractère représenté par l’un des métacaractères ci-dessus plutôt que de l’utiliser pour son sens spécial (par exemple si on souhaite rechercher le signe moins), il faudra alors le protéger ou « l’échapper » avec un antislash.

Notez qu’il faudra également protéger les caractères de classe (les crochets) ainsi que le délimiteur de masque (le slash) si on souhaite les inclure pour les rechercher dans une classe de caractères. Dans le cas contraire, cela peut poser des problèmes car le navigateur pourrait penser par exemple que ce n’est pas « ] » qui est cherché mais la classe qui est refermée.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-classe-caractere-metacaractere.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-classe-caractere-metacaractere-resultat.png)

Ici, nous avons créé 8 masques différents. Le premier masque utilise le caractère ^ en début de classe de caractère. Ce caractère va donc être interprété selon son sens de métacaractère et on va donc rechercher tout ce qui n’est pas dans la classe. Notre masque va donc nous permettre de chercher tous les caractères d’une chaine qui ne sont pas des voyelles minuscules. Notez que les espaces sont également des caractères et vont être trouvés ici.

Dans notre deuxième masque, on protège le métacaractère ^ avec un antislash. Cela neutralise le sens spécial du caractère « ^ » et nous permet de le rechercher comme n’importe quel autre caractère dans notre classe. Notre masque va donc nous permettre de trouver toutes les voyelles de notre chaine plus le caractère « ^ ».

Dans notre troisième masque, on utilise le caractère « ^ » au milieu de la classe. Celui-ci ne possède donc pas son sens de métacaractère et nous n’avons pas besoin ici de le protéger. Ce troisième masque va nous permettre de chercher les mêmes choses que le précédent.

Notre quatrième masque utilise le métacaractère -. Dans le cas présent, il indique que notre classe de caractère contient toutes les lettres minuscules de a à z, c’est-à-dire tout l’alphabet. Notre masque va donc trouver toutes les séquences contenant une lettre de l’alphabet minuscule suivie d’un « o ».

Notez bien ici que les lettres qui ne font pas partie strictement de l’alphabet anglais commun (c’est-à-dire les lettres accentuées, les lettres avec cédilles, etc.) ne seront pas ici trouvées.
Dans notre cinquième masque, on définit deux plages ou intervalles de caractères grâce au métacaractère -. Ici, toutes les lettres de l’alphabet minuscules ou majuscules vont correspondre aux critères de la classe. Le masque va donc nous permettre de chercher toutes les séquences contenant une lettre de l’alphabet minuscule ou majuscule suivie d’un « o ».

Dans notre sixième masque, on protège cette fois-ci le caractère « – » . Notre masque va donc nous permettre de trouver les caractères « a », « – » et « z ».

Dans notre septième masque, on utilise cette fois-ci le métacaractère - pour définir une place numérique (les regex vont nous permettre de trouver n’importe quel caractère, que ce soit une lettre, un chiffre, un signe, etc.). Notre masque va donc trouver n’importe quel chiffre (de 0 à 9), la lettre « a », le lettre « z » et le caractère « – ». En effet, le caractère est ici également mentionné en fin de classe et ne possède donc pas de sens spécial et n’a pas besoin d’être protégé.

Finalement, notre dernier masque va nous permettre de trouver un chiffre ou un caractère parmi les caractères « / », « [ » et « ] ». Ici, il faut échapper chacun de ces trois caractères afin de pouvoir les rechercher en tant que tels et afin que notre expression régulière fonctionne.

## Les classes de caractères abrégées ou prédéfinies

Le caractère d’échappement ou de protection antislash va pouvoir avoir plusieurs rôles ou plusieurs sens dans un contexte d’utilisation au sein d’expressions régulières. On a déjà vu que l’antislash nous permettait de protéger certains métacaractères, c’est-à-dire que le métacaractères ne prendra pas sa signification spéciale mais pourra être cherché en tant que caractère simple.

L’antislash va encore pouvoir être utilisé au sein de classes de caractères avec certains caractères « normaux » pour au contraire leur donner une signification spéciale.

On va ainsi pouvoir utiliser ce qu’on appelle des classes abrégées pour indiquer qu’on recherche un type de valeurs plutôt qu’une valeur ou qu’une plage de valeurs en particuliers.

Les classes abrégées les plus intéressantes sont les suivantes (faites bien attention aux emplois de majuscules et de minuscules ici !) :
| Classe abrégée | Description |
|---|---|
| \w | Représente tout caractère de « mot » (caractère alphanumérique + tiret bas). Équivalent à [a-zA-Z0-9_]
| \W | Représente tout caractère qui n’est pas un caractère de « mot ». Equivalent à [^a-zA- Z0-9_]
| \d | Représente un chiffre. Équivalent à [0-9]
| \D | Représente tout caractère qui n’est pas un chiffre. Équivalent à [^0-9]
| \s | Représente un caractère blanc (espace, retour chariot ou retour à la ligne)
| \S | Représente tout caractère qui n’est pas un caractère blanc
| \t | Représente une espace (tabulation) horizontale
| \v | Représente une espace verticale
| \n | Représente un saut de ligne

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-classe-caractere-abregee.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-classe-caractere-abregee-resultat.png)

Ici, notre premier masque correspond à n’importe quel caractère alphanumérique ainsi qu’au tiret bas et nous permet de rechercher ces caractères.

Notre deuxième masque nous permet lui de trouver tous les caractères qui n’appartiennent pas à la classe [a-ZA-Z-0-9_], c’est-à-dire tout caractère qui n’est ni une lettre de l’alphabet de base ni un chiffre ni un underscore.

Notre troisième masque nous permet de trouver tous les caractères qui sont des chiffres dans une chaine de caractères.

Finalement, notre dernier masque nous permet de trouver n’importe quel chiffre dans la chaine de caractères ainsi que toutes les lettres minuscules (hors lettres accentuées et à cédille). Vous pouvez remarquer qu’on inclue ici notre classe abrégée dans une classe « classique » définie avec des crochets. Cela est en effet tout à fait autorisé.

# Les métacaractères point, alternatives, ancres et quantificateurs des expressions régulières JavaScript

Dans la leçon précédente, nous avons appris à créer des classes de caractères et avons également parlé de caractères qui possèdent une signification spéciale : les métacaractères.

Nous n’avons accès qu’à trois métacaractères au sein des classes de caractères : les métacaractères ^, - et \.

A l’extérieur des classes de caractères, cependant, de nombreux autres caractères possèdent une signification spéciale comme le point, la barre verticale, l’accent circonflexe (qui va avoir une autre signification qu’au sein d’une classe), le signe dollar ou encore ce qu’on appelle les quantificateurs.

Nous allons étudier ces différents métacaractères dans cette leçon.

# Le point

Le métacaractère . (point) va nous permettre de rechercher n’importe quel caractère à l’exception du caractère représentant une nouvelle ligne.

Pour rechercher le caractère « . » dans une chaine de caractère, il faudra l’échapper ou le protéger avec un antislash dans notre masque comme pour tout métacaractère.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-metacaratere-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-metacaratere-point-resultat.png)

Comme vous pouvez le voir, le point a un sens bien différent selon qu’il soit spécifié dans une classe ou en dehors d’une classe de caractères : en dehors d’une classe de caractères, le point est un métacaractère qui permet de chercher n’importe quel caractère sauf une nouvelle ligne tandis que dans une classe de caractère le point sert simplement à rechercher le caractère point dans notre chaine de caractères.

Encore une fois, il n’existe que trois métacaractères c’est-à-dire trois caractères qui vont posséder un sens spécial à l’intérieur des classes de caractères. Les métacaractères que nous étudions dans cette leçon ne vont avoir un sens spécial qu’en dehors des classes de caractères.

## Les alternatives

Le métacaractère | (barre verticale) sert à proposer des alternatives. Concrètement, ce métacaractère va nous permettre de créer des masques qui vont pouvoir chercher une séquence de caractères ou une autre.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-metacaratere-alternative.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-metacaratere-alternative-resultat.png)

Ici, on utilise le métacaractère | pour créer une alternative dans nos deux masques de recherche. Le premier masque va trouver le caractère « o » ou le caractère « j » tandis que le second va trouver la séquence « Pierre » ou la séquence « Mathilde ».

## Les ancres

Les deux métacaractères ^ et $ vont nous permettre « d’ancrer » des masques.

Le métacaractère ^, lorsqu’il est utilisé en dehors d’une classe, va posséder une signification différente de lors de l’utilisation dans une classe. Attention donc à ne pas confondre les deux sens !

Utiliser le métacaractère ^ en dehors d’une classe nous permet d’exprimer le fait qu’on recherche la présence du caractère suivant le ^ du masque en début de la chaine de caractères à analyser.

Il va falloir le placer en début de du masque ou tout au moins en début d’alternative pour qu’il exprime ce sens.

Au contraire, le métacaractère $ va nous permettre de rechercher la présence du caractère précédant ce métacaractère en fin de chaine.

Il va falloir placer le métacaractère $ en fin de du masque ou tout au moins en fin d’alternative pour qu’il exprime ce sens.

Notez que si on souhaite rechercher les caractères « ^ » ou « $ » au sein de notre chaine, il faudra les échapper à l’aide d’un antislash comme pour tout autre métacaractère.

Prenons immédiatement quelques exemples concrets :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-metacaratere-ancre-limite.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-metacaratere-ancre-limite-resultat.png)

Notre premier masque utilise les métacaractères ^ et .. Ce masque trouve n’importe quel caractère à l’exception du caractère de nouvelle ligne en début de chaine.

Notre deuxième masque recherche une lettre majuscule de l’alphabet en début de chaine. Faites bien attention ici : le métacaractère ^ est bien en dehors de la classe de caractères.

Notre troisième masque recherche n’importe quel caractère à l’exception du caractère représentant une nouvelle ligne en fin de chaine.

Le quatrième masque recherche la séquence de caractères « a^$b ». En effet, les caractères « ^ » et « $ » sont ici utilisés au milieu de la chaine et perdent donc leur sens spécial. Cependant, il faut tout de même les protéger pour que tout fonctionne normalement.

Notre cinquième masque chercher un « e » ou un « «$ » dans la chaine. En effet,
Le caractère « $ » est ici utilisé au sein d’une classe de caractère et ne possède pas de sens spécial dans une classe. Il ne sert donc ici qu’à rechercher le caractère qu’il représente.

Notre sixième masque utilise deux fois le métacaractères ^ : une fois à l’extérieur de la classe de caractères du masque et une fois à l’intérieur. Ici, on cherche donc tout caractère qui n’est pas une lettre minuscule de l’alphabet en début de chaine.

Finalement, notre dernier masque nous permet de vérifier si notre chaine est composée exactement de trois caractères qui ne sont pas des retours à la ligne. En effet, vous devez bien comprendre ici qu’on recherche une séquence de trois caractères qui peuvent être n’importe quel caractère sauf un caractère de retour à la ligne avec le premier caractère en début de chaine et le dernier caractère en fin de chaine.

## Les quantificateurs

Les quantificateurs sont des métacaractères qui vont représenter une certaine quantité d’un caractère ou d’une séquence de caractères.

Nous allons pouvoir utiliser les quantificateurs suivants :
| Quantificateur |  Description
| --- | --- |
| a{X} | On veut une séquence de X « a »
| a{X,Y} | On veut une séquence de X à Y fois « a »
| a{X,} | On veut une séquence d’au moins X fois « a » sans limite supérieure
| a? | On veut 0 ou 1 « a ». Équivalent à a{0,1}
| a+ | On veut au moins un « a ». Équivalent à a{1,}
| a* | On veut 0, 1 ou plusieurs « a ». Équivalent à a{0,}

Bien évidemment, les lettres « a », « X » et « Y » ne sont données ici qu’à titre d’exemple et on les remplacera par des valeurs effectives en pratique.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-quantificateur.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-quantificateur-resultat.png)

Notre premier masque va ici nous permettre de chercher un « e » suivi de 0 ou 1 « r ». La chose à bien comprendre ici est que si notre chaine contient un « e » suivi de plus d’un « r » alors la séquence « er » sera bien trouvée puisqu’elle est bien présente dans la chaine. Le fait qu’il y ait d’autres « r » derrière n’influe pas sur le résultat.

Notez également que les quantificateurs sont dits « gourmands » par défaut : cela signifie qu’ils vont d’abord essayer de chercher le maximum de répétition autorisé. C’est la raison pour laquelle ici « er » est renvoyé la première fois (séquence présente dans « Pierre ») et non pas simplement « e ». Ensuite, ils vont chercher le nombre de répétitions inférieur et etc. (le deuxième « e » de « Pierre » est également trouvé.

Notre deuxième masque va chercher un « e » suivi d’au moins un « r ». On trouve cette séquence dans « Pierre ». Comme les quantificateurs sont gourmands, c’est la séquence la plus grande autorisée qui va être trouvée, à savoir « err ».

Notre troisième masque est plus complexe et également très intéressant. Il nous permet de chercher une chaine qui commence par une lettre de l’alphabet commun en majuscule suivie d’au moins 10 caractères qui peuvent être n’importe quel caractère à part un retour à la ligne (puisqu’on utilise ici le métacaractère point).

Finalement, notre quatrième masque va nous permettre de vérifier qu’une chaine contient exactement et uniquement 10 chiffres. Ce type de masque va être très intéressant pour vérifier qu’un utilisateur a inscrit son numéro de téléphone correctement lors de son inscription sur notre site par exemple.

# Créer des sous masques et des assertions dans les expressions régulières JavaScript

Dans cette nouvelle leçon, nous allons étudier les métacaractères ( et ) qui vont nous permettre de créer des sous masques et allons également voir ce que sont les assertions.

## Les sous masques

Les métacaractères ( et ) vont être utilisés pour délimiter des sous masques.

Un sous masque est une partie d’un masque de recherche. Les parenthèses vont nous permettre d’isoler des alternatives ou de définir sur quelle partie du masque un quantificateur doit s’appliquer.

De manière très schématique, et même si ce n’est pas strictement vrai, vous pouvez considérer qu’on va en faire le même usage que lors d’opérations mathématiques, c’est-à-dire qu’on va s’ne servir pour prioriser les calculs.

De plus, notez que les parenthèses vont par défaut créer des sous masques dits « capturants ». Cela signifie tout simplement que lorsqu’un sous masque est trouvé dans la chaine de caractères, la correspondance sera gardée en mémoire et pourra ainsi être réutilisée par la suite.

Pour qu’une partie de la chaîne de caractère corresponde mais que la correspondance ne soit pas gardée en mémoire, on pourra utiliser les signes ?: dans les parenthèses comme premiers caractères de celles-ci.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-parenthese-assertion-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-parenthese-capture.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-parenthese-capture-resultat.png)

Ici, je vous rappelle avant tout que lorsque l’option g est utilisée, la méthode match() renvoie toutes les correspondances mais ne renvoie pas le contenu capturé avec les parenthèses capturantes. En revanche, si on n’utilise pas g, seule la première correspondance est ses groupes capturants liés seront renvoyés.

Notre premier masque n’utilise pas les métacaractères de sous masque ( ). Il nous permet de chercher « er » ou « t ».

Notre deuxième masque contient un sous masque. Ce masque va nous permettre de chercher « er » ou « et », et de capturer les sous masques liés à la première correspondance trouvée avec match().

Le troisième masque va nous permettre de rechercher « Bonjour » dans notre chaine et va capturer « jour ». Notre quatrième masque est identique au troisième mais utilise en plus l’option g ce qui fait que les séquences capturées ne seront pas renvoyées par match().

## Les assertions

On appelle « assertion » un test qui va se dérouler sur le ou les caractères suivants ou précédent celui qui est à l’étude actuellement. Par exemple, le métacaractère $ est une assertion puisque l’idée ici est de vérifier qu’il n’y a plus aucun caractère après le caractère ou la séquence écrite avant $.

Ce premier exemple correspond à une assertion dite simple. Il est également possible d’utiliser des assertions complexes qui vont prendre la forme de sous masques.

Il existe à nouveau deux grands types d’assertions complexes : celles qui vont porter sur les caractères suivants celui à l’étude qu’on appellera également « assertion avant » et celles qui vont porter sur les caractères précédents celui à l’étude qu’on appellera également « assertion arrière ».

Les assertions avant et arrière vont encore pouvoir être « positives » ou « négatives ». Une assertion « positive » est une assertion qui va chercher la présence d’un caractère après ou avant le caractère à l’étude tandis qu’une assertion « négative » va au contraire vérifier qu’un caractère n’est pas présent après ou avant le caractère à l’étude.

Notez que les assertions, à la différence des sous masques, ne sont pas capturantes par défaut et ne peuvent pas être répétées.

Voici les assertions complexes qu’on va pouvoir utiliser ainsi que leur description rapide :
| Assertion | Description |
| --- | --- |
| a(?=b) | Cherche « a » suivi de « b » (assertion avant positive)
| a(?!b) | Cherche « a » non suivi de « b » (assertion avant négative)
| (?<=b)a | Cherche « a » précédé par « b » (assertion arrière positive)
| (?<!b)a | Cherche « a » non précédé par « b » (assertion arrière négative)

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-parenthese-assertion.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-parenthese-assertion-resultat.png)

# Les drapeaux, options ou marqueurs des expressions régulières JavaScript

En plus des métacaractères, nous allons également pouvoir ajouter des caractères d’options à nos masques pour construire nos expressions régulières.

Ces options vont nous permettre de changer le comportement par défaut de nos recherches. On les appelle également parfois « drapeaux » (flags en anglais) ou « marqueurs ».

## Présentation des options des regex

Les options, encore appelées modificateurs, sont des caractères qui vont nous permettre d’ajouter des options à nos expressions régulières.

Les options ne vont pas à proprement parler nous permettre de chercher tel ou tel caractère mais vont agir à un niveau plus élevé en modifiant le comportement par défaut des expressions régulières. Elles vont par exemple nous permettre de rendre une recherche insensible à la casse.

On va pouvoir facilement différencier une option d’un caractère normal ou d’un métacaractère dans une expression régulière puisque les options sont les seuls caractères qui peuvent et doivent obligatoirement être placés en dehors des délimiteurs du masque, après le délimiteur final.

## Liste des options disponibles et exemples d’utilisation

Certaines options sont complexes dans leur fonctionnement, peu utilisées ou ne sont pas toujours compatibles. Le tableau suivant ne présente que les options toujours disponibles et les plus utiles selon moi.
| Option | Description
| --- | ---
| g | Permet d’effectuer une recherche globale
| i | Rend la recherche insensible à la casse
| m | Par défaut, les expressions régulières considèrent la chaine dans laquelle on fait une recherche comme étant sur une seule ligne et font qu’on ne peut donc utiliser les métacaractères ^ et $ qu’une seule fois. L’option m permet de tenir compte des caractères de retour à la ligne et de retour chariot et fait que ^ et $ vont pouvoir être utilisés pour chercher un début et une fin de ligne
| s | Cette option permet au métacaractère . de remplacer n’importe quel caractère y compris un caractère de nouvelle ligne

Voyons immédiatement comment utiliser ces options en pratique. Notez qu’on va tout à fait pouvoir ajouter plusieurs options à un masque.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-marqueur-option-drapeau.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-marqueur-option-drapeau-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-expression-reguliere-marqueur-option-drapeau-resultat.png)

Pour bien comprendre ce code, il faut déjà noter qu’on utilise ici un caractère de nouvelle ligne dans notre chaine (\n).

Notre premier masque nous permet ici de chercher la séquence « pie » en minuscules dans notre chaine. Celle-ci n’est pas trouvée.

Notre deuxième masque utilise cette fois-ci l’option i qui rend la recherche insensible à la casse. Ce masque va donc nous permettre de trouver n’importe quelle séquence « pie » en minuscules ou en majuscules.

Notre troisième masque cherche le caractère « e » en fin de chaine. En effet, comme l’option m n’est pas présente, la regex considèrera que notre chaine est sur une seule ligne.

Notre quatrième masque utilise l’option m qui va changer le comportement par défaut de notre regex qui va alors tenir compte des retours à la ligne (\n) et des retours chariots (\r) dans notre chaine. Ce masque nous permet de cherche le caractère « e » en fin de ligne ou de chaine.

Notre cinquième et dernier masque permet de rechercher n’importe quel caractère dans une chaine.
