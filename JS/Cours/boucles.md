# Les boucles while, do… while, for et for… in et les instructions break et continue en JavaScript

Dans cette leçon, nous allons passer en revue les différentes boucles à notre disposition en JavaScript et comprendre comment elles fonctionnent et quand utiliser une boucle plutôt qu’une autre.

Pour rappel, nous pouvons utiliser les boucles suivantes en JavaScript :

    La boucle while ;
    La boucle do… while ;
    La boucle for ;
    La boucle for… in ;
    La boucle for… of ;
    La boucle for await… of.

 
## La boucle JavaScript while

La boucle while (« tant que » en français) va nous permettre de répéter une série d’instructions tant qu’une condition donnée est vraie c’est-à-dire tant que la condition de sortie n’est pas vérifiée.

L’une des boucles while les plus simples qu’on puisse créer pour illustrer le fonctionnement de cette première boucle va être une boucle while qui va itérer sur une valeur numérique d’une variable.

Regardez l’exemple suivant :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-while-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-while.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-while-resultat.png)

Ici, on commence par initialiser une variable let x en lui passant la valeur 0. Ensuite, on crée notre boucle while en précisant la condition de sortie entre parenthèses et le code à exécuter tant que la condition donnée est vérifiée.

Dans l’exemple ci-dessus, notre condition de sortie est vérifiée dès que la valeur affectée à let x atteint ou dépasse 10. Vous devez bien comprendre que ce que j’appelle ici « condition de sortie » est la condition selon laquelle on va pouvoir sortir de la boucle.

Note : Selon moi, il ferait plus de sens d’appeler ce qui se situe entre parenthèses (ici, x < 10) une « condition de non-sortie » mais la plupart des développeurs ne sont pas d’accord avec moi apparemment donc je me plie à la majorité.

Quoiqu’il en soit, vous pouvez retenir qu’ici notre boucle va pouvoir être traduite littéralement de la façon suivante : « tant que la variable let x stocke une valeur strictement inférieure à 10, ajoute le texte « x stocke la valeur {valeur de x} lors du passage n°{valeur de x + 1} dans la boucle » au paragraphe portant l’id= 'p1' et ajoute 1 à la dernière valeur connue de let x.

Tant que let x stocke une valeur strictement inférieure à 10, on exécute le code de la boucle et on retourne au début de la boucle pour refaire un passage dedans.

Ici, on utilise l’opérateur de concaténation combiné += pour stocker une nouvelle ligne de texte dans notre paragraphe à chaque nouveau passage de boucle. On utilise également la notation x + 1 pour compter les passages dans la boucle car on sait que let x stocke initialement la valeur 0 et qu’on ajoute 1 à la valeur stockée dans notre variable à la fin de chaque passage dans la boucle.

Profitez-en également pour noter que dans le cas d’une boucle while, la condition de sortie est analysée avant d’entrer dans la boucle. Cela implique que si let x stocke une valeur égale ou supérieure à 10 au départ, on ne rentrera jamais dans notre boucle while.

## La boucle JavaScript do… while

La boucle do… while (« faire… tant que ») est relativement semblable à la boucle while dans sa syntaxe.

La grande différence entre les boucles while et do… while va résider dans l’ordre dans lequel vont se faire les opérations.

En effet, lorsqu’on utilise une boucle do… while, le code de la boucle va être exécuté avant l’évaluation de la condition de sortie.

Cela signifie qu’à la différence de la boucle while, on effectuera toujours un passage dans une boucle do… while même si la condition de sortie n’est jamais vérifiée et donc le code de la boucle sera toujours exécuté au moins une fois.

Prenons un exemple pour illustrer la différence de structure et de fonctionnement entre les boucles while et do… while.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-do-while-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-do-while.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-do-while-resultat.png)

Dans l’exemple ci-dessus, nous créons deux boucles while et deux boucles do… while.

La première boucle while est la même que précédemment. La première boucle do… while est identique à la première boucle while : même valeur d’initialisation puis incrémentation dans la boucle et finalement même condition de sortie.

Comme les variables let x et let a stockent bien des valeurs inférieures à 10, la condition de sortie est valide au départ et nos deux boucles vont s’exécuter exactement de la même façon. Dans cette situation, on préférera utiliser une boucle while qui est plus simple à écrire.

Une nouvelle fois, la différence entre les boucles while et do… while ne va être visible que lorsque la condition de sortie n’est pas valide dès le début. On peut le voir avec notre deuxième couple de boucles while et do… while.

En effet, les deux dernières boucles de notre script sont les mêmes que les deux premières mais elles utilisent cette fois-ci des variables initialisées à 10, ce qui rend la condition de sortie non valide dès le départ. Dans le cas d’une boucle while, la condition de sortie est évaluée en premier et, si elle est invalide, on ne rentre pas dans la boucle. Dans le cas d’une boucle do… while, en revanche, la condition de sortie n’est évaluée qu’en fin de boucle, après le passage dans la boucle. Le code de la boucle sera donc exécuté au moins une fois.

Il va donc être intéressant d’utiliser une boucle do… while plutôt qu’on boucle while lorsque notre script a besoin que le code dans notre boucle s’exécute au moins une fois pour fonctionner.

## La boucle JavaScript for

La boucle for (« pour » en français) est structurellement différente des boucles while et do… while puisqu’on va cette fois-ci initialiser notre variable à l’intérieur de la boucle.

La boucle for utilise une syntaxe relativement condensée et est relativement puissante ce qui en fait la condition la plus utilisée en JavaScript.

Prenons immédiatement un exemple :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-for.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-for-resultat.png)

Une boucle for contient trois « phases » à l’intérieur du couple de parenthèses : une phase d’initialisation, une phase de test (condition de sortie) et une phase d’itération (généralement une incrémentation). Chaque phase est séparée des autres par un point-virgule.

Ici, on commence par initialiser une variable let i en lui passant la valeur 0. Notre boucle va s’exécuter en boucle tant que la valeur de let i est strictement inférieure à 10 et à chaque nouveau passage dans la boucle on va ajouter 1 à la valeur précédente de la variable let i.

Comme vous pouvez le constater, l’incrémentation se fait à la fin de chaque passage dans la boucle (on le voit car lors du premier passage la valeur de let i est toujours 0).

Notez qu’on utilise généralement la lettre « i » (pour « iterator ») dans les boucles en général et particulièrement au sein des boucles for pour les reconnaitre plus rapidement dans un script. Cependant, ce n’est pas obligatoire et vous pouvez utiliser n’importe quel autre nom de variable.

## Utiliser une instruction continue pour passer directement à l’itération suivante d’une boucle

Pour sauter une itération de boucle et passer directement à la suivante, on peut utiliser une instruction continue. Cette instruction va nous permettre de sauter l’itération actuelle et de passer directement à l’itération suivante.

Cette instruction peut s’avérer très utile pour optimiser les performances d’une boucle et économiser les ressources lorsqu’on utilise une boucle pour rechercher spécifiquement certaines valeurs qui répondent à des critères précis.

Par exemple, on pourrait imaginer en reprenant la boucle précédente qu’on ne souhaite afficher de message que pour les valeurs paires de let i. On va donc utiliser une instruction continue pour passer directement à l’itération suivante si let i contient une valeur impaire.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-continue.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-continue-resultat.png)

Ici, on utilise le modulo (c’est-à-dire le reste d’une division Euclidienne) pour déterminer si let i contient une valeur paire ou impaire. En effet, on sait que let i stocke toujours un entier (compris entre 0 et 10).

Or, tout entier pair p est multiple de 2, ce qui signifie qu’il existe un nombre n entier tel que 2 * n = p. Par exemple, 4 = 2 * 2 ; 6 = 2 * 3 ; 18 = 2 * 9, etc.

Ainsi, lorsqu’on divise un entier pair par deux, le reste sera toujours nul (le modulo sera égal à 0). Dans le cas d’un entier impair, en revanche, il y aura toujours un reste puisqu’un nombre impair n’est par définition pas un multiple de 2.

Dans notre boucle, on utilise donc une condition if qui va exécuter une instruction continue dans le cas où le reste de la division i / 2 n’est pas égal à 0 c’est-à-dire dans le cas où let i stocke un entier impair.

Cette instruction continue va indiquer au JavaScript qu’il doit sauter l’itération de boucle actuelle et passer immédiatement à la suivante.

## Utiliser une instruction break pour sortir prématurément d’une boucle

On va également pouvoir complètement stopper l’exécution d’une boucle et sortir à un moment donné en utilisant une instruction break au sein de la boucle.

Utiliser cette instruction peut à nouveau s’avérer très intéressant pour optimiser les performances de notre script lorsqu’on utilise une boucle pour chercher une valeur en particulier en itérant parmi un grand nombre de valeurs.

Comme pour l’instruction continue, il est difficile d’illustrer l’intérêt réel de l’utilisation de break avec les boucles à ce stade du cours car ces instructions prennent tout leur sens lorsqu’on recherche une valeur dans un tableau par exemple.

Je préfère tout de même vous les montrer dès maintenant et pas d’inquiétude, nous pourrons montrer la force de ces instructions plus tard dans ce cours.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-break.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-boucle-break-resultat.png)

Dans cet exemple, on modifie à nouveau notre boucle for de départ en modifiant notamment la condition de sortie. Par défaut, cette boucle for va boucler tant que la valeur de let i n’atteint pas 1000.

Cependant, dans la boucle, on utilise cette fois une instruction break qui va s’exécuter si la valeur de let i atteint 13.

L’instruction break met fin à la boucle. Ainsi, dès que let i atteint 13, on va sortir de la boucle.

## Les boucles for… in, for… of et for await…of

Les boucles for… in, for… of et for await…of vont être utilisées pour parcourir des objets. Nous les étudierons donc lorsque nous aborderons les objets. 