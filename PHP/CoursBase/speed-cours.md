https://www.freecodecamp.org/news/the-php-handbook/

# PHP est un langage de programmation incroyablement populaire.

Les statistiques indiquent qu'il est utilisé par 80% de tous les sites Web. C'est le langage qui alimente WordPress, le système de gestion de contenu largement utilisé pour les sites Web.

Et il alimente également de nombreux frameworks différents qui facilitent le développement Web, comme Laravel. En parlant de Laravel, c'est peut-être l'une des raisons les plus convaincantes d'apprendre PHP de nos jours.

# Pourquoi apprendre PHP ?

PHP est un langage assez polarisant. Certaines personnes l'aiment, et certaines personnes le détestent. Si nous dépassons les émotions et considérons le langage comme un outil, PHP a beaucoup à offrir.

Bien sûr, ce n'est pas parfait. Mais laissez-moi vous dire qu'aucune langue ne l'est.

Dans ce manuel, je vais vous aider à apprendre PHP.

Ce livre est une introduction parfaite si vous êtes nouveau dans la langue. C'est aussi parfait si vous avez fait « du PHP » dans le passé et que vous voulez y revenir.

Je vais vous expliquer le PHP moderne, version 8+.

PHP a beaucoup évolué ces dernières années. Donc, si la dernière fois que vous avez essayé, c'était PHP 5 ou même PHP 4, vous serez surpris de toutes les bonnes choses que PHP offre maintenant.

Allons-y!

Voici ce que nous allons couvrir dans ce manuel :

    Introduction à PHP
    Quel type de langage est PHP ?
    Comment configurer PHP
    Comment coder votre premier programme PHP
    Bases du langage PHP
    Comment travailler avec des chaînes en PHP
    Comment utiliser les fonctions intégrées pour les nombres en PHP
    Comment fonctionnent les tableaux en PHP
    Comment fonctionnent les conditions en PHP
    Comment fonctionnent les boucles en PHP
    Comment fonctionnent les fonctions en PHP
    Comment parcourir des tableaux avec map(), filter() et reduce() en PHP
    Programmation orientée objet en PHP
    Comment inclure d'autres fichiers PHP
    Constantes, fonctions et variables utiles pour le système de fichiers en PHP
    Comment gérer les erreurs en PHP
    Comment gérer les exceptions en PHP
    Comment travailler avec des dates en PHP
    Comment utiliser les constantes et les énumérations en PHP
    Comment utiliser PHP comme plateforme de développement d'applications Web
    Comment utiliser Composer et Packagist
    Comment déployer une application PHP
    Conclusion

# Introduction à PHP

PHP est un langage de programmation que de nombreux développeurs utilisent pour créer des applications Web, entre autres.

En tant que langue, il a eu un humble début. Il a été créé en 1994 par Rasmus Lerdorf pour créer son site Web personnel. Il ne savait pas à l'époque qu'il deviendrait éventuellement l'un des langages de programmation les plus populaires au monde. Il est devenu populaire plus tard, en 1997/8, et a explosé dans les années 2000 lorsque PHP 4 a débarqué.

Vous pouvez utiliser PHP pour ajouter un peu d'interactivité à une page HTML.

Ou vous pouvez l'utiliser comme moteur d'application Web qui crée des pages HTML dynamiquement et les envoie au navigateur.

Il peut évoluer jusqu'à des millions de pages vues.

Saviez-vous que Facebook est propulsé par PHP ? Avez-vous déjà entendu parler de Wikipédia ? Mou? Etsy ?

# Quel type de langage est PHP ?

Entrons dans un jargon technique.

Les langages de programmation sont divisés en groupes en fonction de leurs caractéristiques. Par exemple interprété/compilé, fortement/faiblement typé, dynamiquement/statiquement typé.

PHP est souvent appelé un "langage de script" et c'est un langage interprété . Si vous avez utilisé des langages compilés comme C ou Go ou Swift, la principale différence est que vous n'avez pas besoin de compiler un programme PHP avant de l'exécuter.

Ces langages sont compilés et le compilateur génère un programme exécutable que vous exécutez ensuite. C'est un processus en 2 étapes.

L' interpréteur PHP est chargé d'interpréter les instructions écrites dans un programme PHP lors de son exécution. C'est juste une étape. Vous dites à l'interprète d'exécuter le programme. C'est un flux de travail complètement différent.

PHP est un langage typé dynamiquement . Les types de variables sont vérifiés au moment de l'exécution, plutôt qu'avant l'exécution du code, comme cela se produit pour les langages à typage statique. (Ceux-ci sont également compilés - les deux caractéristiques vont souvent de pair.)

PHP est également faiblement (faiblement) typé. Par rapport aux langages fortement typés comme Swift, Go, C ou Java, vous n'avez pas besoin de déclarer les types de vos variables.

Être interprété et typé de manière lâche/dynamique rendra les bogues plus difficiles à trouver avant qu'ils ne se produisent au moment de l'exécution.

Dans les langages compilés, vous pouvez souvent détecter des erreurs au moment de la compilation, ce qui ne se produit pas dans les langages interprétés.

Mais d'un autre côté, un langage interprété a plus de flexibilité.

Fait amusant : PHP est écrit en interne en C, un langage compilé et typé statiquement.

De par sa nature, PHP est similaire à JavaScript, un autre langage typé dynamiquement, faiblement typé et interprété.

PHP prend en charge la programmation orientée objet, ainsi que la programmation fonctionnelle. Vous pouvez l'utiliser comme vous préférez.

# Comment configurer PHP

Il existe de nombreuses façons d'installer PHP sur votre machine locale.

Le moyen le plus pratique que j'ai trouvé pour installer PHP localement est d'utiliser MAMP.

MAMP est un outil disponible gratuitement pour tous les systèmes d'exploitation - Mac, Windows et Linux. C'est un package qui vous donne tous les outils dont vous avez besoin pour être opérationnel.

PHP est exécuté par un serveur HTTP, qui est chargé de répondre aux requêtes HTTP, celles faites par le navigateur. Ainsi, vous accédez à une URL avec votre navigateur, Chrome ou Firefox ou Safari, et le serveur HTTP répond avec du contenu HTML.

Le serveur est généralement Apache ou NGINX.

Ensuite, pour faire quelque chose de non trivial, vous aurez besoin d'une base de données, comme MySQL.

MAMP est un package qui fournit tout cela, et plus encore, et vous offre une interface agréable pour tout démarrer/arrêter en même temps.

Bien sûr, vous pouvez configurer chaque pièce seule si vous le souhaitez, et de nombreux tutoriels expliquent comment procéder. Mais j'aime les outils simples et pratiques, et MAMP en fait partie.

Vous pouvez suivre ce manuel avec n'importe quel type de méthode d'installation PHP, pas seulement MAMP.

Cela dit, si vous n'avez pas encore installé PHP et que vous souhaitez utiliser MAMP, rendez-vous sur https://www.mamp.info et installez-le.

Le processus dépendra de votre système d'exploitation, mais une fois l'installation terminée, une application « MAMP » sera installée.

Lancez-le et vous verrez une fenêtre semblable à celle-ci :
Capture d'écran 2022-06-24 à 15.14.05.jpg

Assurez-vous que la version PHP sélectionnée est la dernière disponible.

Au moment d'écrire ces lignes, MAMP vous permet de choisir 8.0.8.

REMARQUE : j'ai remarqué que MAMP a une version un peu en retard, pas la dernière. Vous pouvez installer une version plus récente de PHP en activant la démo MAMP PRO, puis installez la dernière version à partir des paramètres MAMP PRO (dans mon cas, c'était 8.1.0). Fermez-le ensuite et rouvrez MAMP (version non pro). MAMP PRO a plus de fonctionnalités donc vous voudrez peut-être l'utiliser, mais il n'est pas nécessaire de suivre ce manuel.

Appuyez sur le bouton Démarrer en haut à droite. Cela démarrera le serveur HTTP Apache, avec PHP activé, et la base de données MySQL.

Allez à l'URL http://localhost:8888 et vous verrez une page similaire à celle-ci :
Capture d'écran 2022-06-24 à 15.19.05.jpg

Nous sommes prêts à écrire du PHP !

Ouvrez le dossier répertorié comme « Racine du document ». Si vous utilisez MAMP sur un Mac, c'est par défaut /Applications/MAMP/htdocs.

Sous Windows c'est C:\MAMP\htdocs.

Le vôtre peut être différent selon votre configuration. En utilisant MAMP, vous pouvez le trouver dans l'interface utilisateur de l'application.

Vous y trouverez un fichier nommé index.php.

Il est responsable de l'impression de la page ci-dessus.
Capture d'écran 2022-06-24 à 15.17.58.jpg
Comment coder votre premier programme PHP

Lors de l'apprentissage d'un nouveau langage de programmation, nous avons cette tradition de créer un "Hello, World!" application. Quelque chose qui imprime ces chaînes.

Assurez-vous que MAMP est en cours d'exécution et ouvrez le htdocsdossier comme expliqué ci-dessus.

Ouvrez le index.phpfichier dans un éditeur de code.

Je recommande d'utiliser VS Code , car c'est un éditeur de code très simple et puissant. Vous pouvez consulter https://flaviocopes.com/vscode/ pour une introduction.
Capture d'écran 2022-06-24 à 15.37.36.jpg

C'est le code qui génère la page "Bienvenue dans MAMP" que vous avez vue dans le navigateur.

Supprimez tout et remplacez-le par :

<?php
echo 'Hello World';
?>

Enregistrez, actualisez la page sur http://localhost:8888 , vous devriez voir ceci :
Capture d'écran 2022-06-24 à 15.39.00.jpg

Super! C'était votre premier programme PHP.

Expliquons ce qui se passe ici.

Nous avons le serveur Apache HTTP qui écoute sur le port 8888de localhost, votre ordinateur.

Lorsque nous accédons à http://localhost:8888 avec le navigateur, nous faisons une requête HTTP, demandant le contenu de la route /, l'URL de base.

Apache, par défaut, est configuré pour servir cette route en servant le index.htmlfichier inclus dans le htdocsdossier. Ce fichier n'existe pas - mais comme nous avons configuré Apache pour qu'il fonctionne avec PHP, il recherchera alors un index.phpfichier.

Ce fichier existe et le code PHP est exécuté côté serveur avant qu'Apache ne renvoie la page au navigateur.

Dans le fichier PHP, nous avons une <?phpouverture, qui dit "ici commence du code PHP".

Nous avons une fin ?>qui ferme l'extrait de code PHP, et à l'intérieur, nous utilisons l' echoinstruction pour imprimer la chaîne entre guillemets dans le HTML.

Un point-virgule est requis à la fin de chaque instruction.

Nous avons cette structure d'ouverture/fermeture car nous pouvons intégrer PHP dans HTML. PHP est un langage de script, et son but est de pouvoir « décorer » une page HTML avec des données dynamiques.

Notez qu'avec le PHP moderne, nous évitons généralement de mélanger PHP dans le HTML. Au lieu de cela, nous utilisons PHP comme "framework pour générer le HTML" - par exemple en utilisant des outils comme Laravel. Mais nous parlerons de PHP simple dans ce livre, il est donc logique de commencer par les bases.

Par exemple, quelque chose comme ceci vous donnera le même résultat dans le navigateur :

Hello
<?php
echo 'World';
?>

Pour l'utilisateur final, qui regarde le navigateur et n'a aucune idée du code en coulisse, il n'y a aucune différence.

La page est techniquement une page HTML, même si elle ne contient pas de balises HTML mais juste une Hello Worldchaîne. Mais le navigateur peut comprendre comment afficher cela dans la fenêtre.
Bases du langage PHP

Après le premier "Hello World", il est temps de plonger dans les fonctionnalités du langage avec plus de détails.
Comment fonctionnent les variables en PHP

Les variables en PHP commencent par le signe dollar $, suivi d'un identifiant, qui est un ensemble de caractères alphanumériques et le caractère de soulignement _.

Vous pouvez affecter à une variable n'importe quel type de valeur, comme des chaînes (définies à l'aide de guillemets simples ou doubles) :

$name = 'Flavio';

$name = "Flavio";

Ou des nombres :

$age = 20;

ou tout autre type autorisé par PHP, comme nous le verrons plus tard.

Une fois qu'une variable a reçu une valeur, par exemple une chaîne, nous pouvons lui réaffecter un autre type de valeur, comme un nombre :

$name = 3;

PHP ne se plaindra pas que maintenant le type est différent.

Les noms de variables sont sensibles à la casse. $nameest différent de $Name.

Ce n'est pas une règle stricte, mais généralement les noms de variables sont écrits au format camelCase, comme ceci : $brandOfCarou $ageOfDog. Nous gardons la première lettre en minuscule et les lettres des mots suivants en majuscule.
Comment écrire des commentaires en PHP

Une partie très importante de tout langage de programmation est la façon dont vous écrivez des commentaires.

Vous écrivez des commentaires sur une seule ligne en PHP de cette manière :

// single line comment

Les commentaires multi-lignes sont définis de la manière suivante :

/*

this is a comment

*/

//or

/*
 *
 * this is a comment
 *
 */

//or to comment out a portion of code inside a line:

/* this is a comment */

Que sont les types en PHP ?

J'ai mentionné les chaînes et les nombres.

PHP a les types suivants :

    boolvaleurs booléennes (vrai/faux)
    intnombres entiers (pas de décimales)
    floatnombres à virgule flottante (décimaux)
    stringcordes
    arraytableaux
    objectobjets
    nullune valeur qui signifie "aucune valeur attribuée"

et quelques autres plus avancés.
Comment imprimer la valeur d'une variable en PHP

Nous pouvons utiliser la var_dump()fonction intégrée pour obtenir la valeur d'une variable :

$name = 'Flavio';

var_dump($name);

L' var_dump($name)instruction s'imprimera string(6) "Flavio"sur la page, ce qui nous indiquera que la variable est une chaîne de 6 caractères.

Si nous avons utilisé ce code :

$age = 20;

var_dump($age);

nous aurions int(20)en retour, en disant que la valeur est 20 et que c'est un entier.

var_dump()est l'un des outils essentiels de votre ceinture d'outils de débogage PHP.
Comment fonctionnent les opérateurs en PHP

Une fois que vous avez quelques variables, vous pouvez faire des opérations avec elles :

$base = 20;
$height = 10;

$area = $base * $height;

Le *I utilisé pour multiplier $base par $height est l'opérateur de multiplication.

Nous avons pas mal d'opérateurs - alors faisons un rapide tour d'horizon des principaux.

Pour commencer, voici les opérateurs arithmétiques : +, -, *, /(division), %(reste) et **(exponentielle).

Nous avons l'opérateur d'affectation =, que nous avons déjà utilisé pour affecter une valeur à une variable.

Ensuite, nous avons des opérateurs de comparaison, comme <, >, <=, >=. Ceux-ci fonctionnent comme ils le font en mathématiques.

2 < 1; //false
1 <= 1; // true
1 <= 2; // true

==renvoie vrai si les deux opérandes sont égaux.

===renvoie vrai si les deux opérandes sont identiques.

Quelle est la différence?

Vous le trouverez avec l'expérience, mais par exemple :

1 == '1'; //true
1 === '1'; //false

Nous devons également !=détecter si les opérandes ne sont pas égaux :

1 != 1; //false
1 != '1'; //false
1 != 2; //true

//hint: <> works in the same way as !=, 1 <> 1

et !==pour détecter si les opérandes ne sont pas identiques :

1 !== 1; //false
1 !== '1'; //true

Les opérateurs logiques fonctionnent avec des valeurs booléennes :

// Logical AND with && or "and"

true && true; //true
true && false; //false
false && true; //false
false && false; //false

true and true; //true
true and false; //false
false and true; //false
false and false; //false

// Logical OR with || or "or"

true || true; // true
true || false //true
false || true //true
false || false //false

true or true; // true
true or false //true
false or true //true
false or false //false

// Logical XOR (one of the two is true, but not both)

true xor true; // false
true xor false //true
false xor true //true
false xor false //false

On a aussi l' opérateur not :

$test = true

!$test //false

J'ai utilisé les valeurs booléennes trueet falseici, mais en pratique, vous utiliserez des expressions qui évaluent soit vrai soit faux, par exemple :

1 > 2 || 2 > 1; //true

1 !== 2 && 2 > 2; //false

Tous les opérateurs listés ci-dessus sont binaires , ce qui signifie qu'ils impliquent 2 opérandes.

PHP a aussi 2 opérateurs unaires : ++et --:

$age = 20;
$age++;
//age is now 21

$age--;
//age is now 20

Comment travailler avec des chaînes en PHP

J'ai déjà introduit l'utilisation des chaînes lorsque nous avons parlé de variables et nous avons défini une chaîne en utilisant cette notation :

$name = 'Flavio'; //string defined with single quotes

$name = "Flavio"; //string defined with double quotes

La grande différence entre l'utilisation de guillemets simples et doubles est qu'avec les guillemets doubles, nous pouvons étendre les variables de cette manière :

$test = 'an example';

$example = "This is $test"; //This is an example

et avec des guillemets doubles, nous pouvons utiliser des caractères d'échappement (pensez à de nouvelles lignes \nou tabulations \t):

$example = "This is a line\nThis is a line";

/*
output is:

This is a line
This is a line
*/

PHP vous propose un ensemble de fonctions très complet dans sa bibliothèque standard (la bibliothèque de fonctionnalités que le langage propose par défaut).

Tout d'abord, nous pouvons concaténer deux chaînes à l'aide de l' .opérateur :

$firstName = 'Flavio';
$lastName = 'Copes';

$fullName = $firstName . ' ' . $lastName;

Nous pouvons vérifier la longueur d'une chaîne en utilisant la strlen()fonction :

$name = 'Flavio';
strlen($name); //6

C'est la première fois que nous utilisons une fonction.

Une fonction est composée d'un identifiant ( strlendans ce cas) suivi de parenthèses. À l'intérieur de ces parenthèses, nous passons un ou plusieurs arguments à la fonction. Dans ce cas, nous avons un argument.

La fonction fait quelque chose et quand c'est fait, elle peut renvoyer une valeur. Dans ce cas, il renvoie le nombre 6. Si aucune valeur n'est renvoyée, la fonction renvoie null.

Nous verrons comment définir nos propres fonctions plus tard.

Nous pouvons obtenir une partie d'une chaîne en utilisant substr():

$name = 'Flavio';
substr($name, 3); //"vio" - start at position 3, get all the rest
substr($name, 2, 2); //"av" - start at position 2, get 2 items

Nous pouvons remplacer une partie d'une chaîne en utilisant str_replace():

$name = 'Flavio';
str_replace('avio', 'ower', $name); //"Flower"

Bien sûr, nous pouvons affecter le résultat à une nouvelle variable :

$name = 'Flavio';
$itemObserved = str_replace('avio', 'ower', $name); //"Flower"

Il existe de nombreuses autres fonctions intégrées que vous pouvez utiliser pour travailler avec des chaînes.

Voici une petite liste non exhaustive juste pour vous montrer les possibilités :

    trim()supprime l'espace blanc au début et à la fin d'une chaîne
    strtoupper()met une chaîne en majuscule
    strtolower()met une chaîne en minuscule
    ucfirst()met le premier caractère en majuscule
    strpos()trouve la première occurrence d'une sous-chaîne dans la chaîne
    explode()diviser une chaîne en un tableau
    implode()pour joindre des éléments de tableau dans une chaîne

Vous pouvez trouver une liste complète ici .
Comment utiliser les fonctions intégrées pour les nombres en PHP

J'ai précédemment listé les quelques fonctions que nous utilisons couramment pour les chaînes.

Faisons une liste des fonctions que nous utilisons avec les nombres :

    round()pour arrondir un nombre décimal, vers le haut/vers le bas selon si la valeur est > 0,5 ou moins
    ceil()arrondir un nombre décimal au supérieur
    floor()arrondir un nombre décimal à l'inférieur
    rand()génère un entier aléatoire
    min()trouve le plus petit nombre parmi les nombres passés en arguments
    max()trouve le nombre le plus élevé parmi les nombres passés en arguments
    is_nan()renvoie vrai si le nombre n'est pas un nombre

Il existe une tonne de fonctions différentes pour toutes sortes d'opérations mathématiques comme le sinus, le cosinus, les tangentes, les logarithmes, etc. Vous pouvez trouver une liste complète ici .
Comment fonctionnent les tableaux en PHP

Les tableaux sont des listes de valeurs regroupées sous un nom commun.

Vous pouvez définir un tableau vide de deux manières différentes :

$list = [];

$list = array();

Un tableau peut être initialisé avec des valeurs :

$list = [1, 2];

$list = array(1, 2);

Les tableaux peuvent contenir des valeurs de n'importe quel type :

$list = [1, 'test'];

Même d'autres tableaux :

$list = [1, [2, 'test']];

Vous pouvez accéder à l'élément dans un tableau en utilisant cette notation :

$list = ['a', 'b'];
$list[0]; //'a' --the index starts at 0
$list[1]; //'b'

Une fois qu'un tableau est créé, vous pouvez lui ajouter des valeurs de la manière suivante :

$list = ['a', 'b'];
$list[] = 'c';

/*
$list == [
  "a",
  "b",
  "c",
]
*/

Vous pouvez utiliser array_unshift()pour ajouter l'élément au début du tableau à la place :

$list = ['b', 'c'];
array_unshift($list, 'a');

/*
$list == [
  "a",
  "b",
  "c",
]
*/

Comptez le nombre d'éléments dans un tableau à l'aide de la count()fonction intégrée :

$list = ['a', 'b'];

count($list); //2

Vérifiez si un tableau contient un élément à l'aide in_array()de la fonction intégrée :

$list = ['a', 'b'];

in_array('b', $list); //true

Si en plus de confirmer l'existence, vous avez besoin de l'index, utilisez array_search():

$list = ['a', 'b'];

array_search('b', $list) //1

Fonctions utiles pour les tableaux en PHP

Comme pour les chaînes et les nombres, PHP fournit de nombreuses fonctions très utiles pour les tableaux. Nous avons vu count(), in_array(), array_search()– voyons un peu plus :

    is_array()pour vérifier si une variable est un tableau
    array_unique()pour supprimer les valeurs en double d'un tableau
    array_search()pour rechercher une valeur dans le tableau et renvoyer la clé
    array_reverse()inverser un tableau
    array_reduce()pour réduire un tableau à une seule valeur à l'aide d'une fonction de rappel
    array_map()pour appliquer une fonction de rappel à chaque élément du tableau. Généralement utilisé pour créer un nouveau tableau en modifiant les valeurs d'un tableau existant, sans le modifier.
    array_filter()pour filtrer un tableau en une seule valeur à l'aide d'une fonction de rappel
    max()pour obtenir la valeur maximale contenue dans le tableau
    min()pour obtenir la valeur minimale contenue dans le tableau
    array_rand()pour obtenir un élément aléatoire du tableau
    array_count_values()pour compter toutes les valeurs du tableau
    implode()transformer un tableau en chaîne
    array_pop()pour supprimer le dernier élément du tableau et renvoyer sa valeur
    array_shift()identique array_pop()mais supprime le premier élément au lieu du dernier
    sort()trier un tableau
    rsort()trier un tableau dans l'ordre inverse
    array_walk()de la même manière que array_map()fait quelque chose pour chaque élément du tableau, mais en plus, il peut modifier les valeurs du tableau existant

Comment utiliser les tableaux associatifs en PHP

Jusqu'à présent, nous avons utilisé des tableaux avec un index numérique incrémentiel : 0, 1, 2…

Vous pouvez également utiliser des tableaux avec des index nommés (clés), et nous les appelons tableaux associatifs :

$list = ['first' => 'a', 'second' => 'b'];

$list['first'] //'a'
$list['second'] //'b'

Nous avons quelques fonctions particulièrement utiles pour les tableaux associatifs :

    array_key_exists()pour vérifier si une clé existe dans le tableau
    array_keys()pour obtenir toutes les clés du tableau
    array_values()pour obtenir toutes les valeurs du tableau
    asort()pour trier un tableau associatif par valeur
    arsort()pour trier un tableau associatif par ordre décroissant de valeur
    ksort()pour trier un tableau associatif par clé
    krsort()pour trier un tableau associatif par ordre décroissant de clé

Vous pouvez voir toutes les fonctions liées aux tableaux ici .
Comment fonctionnent les conditions en PHP

J'ai précédemment introduit les opérateurs de comparaison : <, >, <=, >=, ==, ===, !=, !==... et ainsi de suite.

Ces opérateurs vont être super utiles pour une chose : les conditionnels .

Les conditions sont la première structure de contrôle que nous voyons.

Nous pouvons décider de faire quelque chose, ou autre chose, sur la base d'une comparaison.

Par exemple:

$age = 17;

if ($age > 18) {
  echo 'You can enter the pub';
}

Le code entre parenthèses ne s'exécute que si la condition est évaluée à true.

Utilisez elsepour faire autre chose dans le cas où la condition est false:

$age = 17;

if ($age > 18) {
  echo 'You can enter the pub';
} else {
  echo 'You cannot enter the pub';
}

REMARQUE: j'ai utilisé cannotau lieu de can'tparce que le guillemet simple mettrait fin à ma chaîne avant qu'il ne le faille. Dans ce cas, vous pouvez échapper 'de la manière suivante :echo 'You can\'t enter the pub';

Vous pouvez avoir plusieurs ifdéclarations enchaînées en utilisant elseif:

$age = 17;

if ($age > 20) {
  echo 'You are 20+';
} elseif ($age > 18) {
  echo 'You are 18+';
} else {
  echo 'You are <18';
}

En plus de if, nous avons la switchdéclaration.

Nous l'utilisons lorsque nous avons une variable qui peut avoir plusieurs valeurs différentes, et nous n'avons pas besoin d'un long bloc if / elseif :

$age = 17

switch($age) {
  case 15:
		echo 'You are 15';
    break;
  case 16:
		echo 'You are 16';
    break;
  case 17:
		echo 'You are 17';
    break;
  case 18:
		echo 'You are 18';
    break;
  default:
    echo "You are $age";
}

Je sais que l'exemple n'a aucune logique, mais je pense qu'il peut vous aider à comprendre comment switchfonctionne.

La break;déclaration après chaque cas est essentielle. Si vous n'ajoutez pas cela et que l'âge est de 17 ans, vous verrez ceci :

You are 17
You are 18
You are 17

Au lieu de juste ça :

You are 17

comme vous vous en doutez.
Comment fonctionnent les boucles en PHP

Les boucles sont une autre structure de contrôle super utile.

Nous avons différents types de boucles en PHP : while, do while, foret foreach.

Voyons-les tous !
Comment utiliser une whileboucle en PHP

Une whileboucle est la plus simple. Il continue d'itérer pendant que la condition évalue àtrue :

while (true) {
  echo 'looping';
}

Ce serait une boucle infinie, c'est pourquoi nous utilisons des variables et des comparaisons :

$counter = 0;

while ($counter < 10) {
  echo $counter;
  $counter++;
}

Comment utiliser une do whileboucle en PHP

do whileest similaire, mais légèrement différent dans la façon dont la première itération est effectuée :

$counter = 0;

do {
  echo $counter;
  $counter++;
} while ($counter < 10);

Dans la do whileboucle, on fait d'abord la première itération, puis on vérifie la condition.

Dans la whileboucle, on vérifie d' abord la condition, puis on fait l'itération.

Faites un test simple en réglant $countersur 15 dans les exemples ci-dessus, et voyez ce qui se passe.

Vous voudrez choisir un type de boucle ou l'autre, selon votre cas d'utilisation.
Comment utiliser une foreachboucle en PHP

Vous pouvez utiliser la foreachboucle pour parcourir facilement un tableau :

$list = ['a', 'b', 'c'];

foreach ($list as $value) {
  echo $value;
}

Vous pouvez également obtenir la valeur de l'index (ou de la clé dans un tableau associatif) de cette manière :

$list = ['a', 'b', 'c'];

foreach ($list as $key => $value) {
  echo $key;
}

Comment utiliser une forboucle en PHP

La forboucle est similaire à while, mais au lieu de définir la variable utilisée dans le conditionnel avant la boucle, et au lieu d'incrémenter la variable d'index manuellement, tout est fait sur la première ligne :

for ($i = 0; $i < 10; $i++) {
  echo $i;
}

//result: 0123456789

Vous pouvez utiliser la boucle for pour parcourir un tableau de la manière suivante :

$list = ['a', 'b', 'c'];

for ($i = 0; $i < count($list); $i++) {
  echo $list[$i];
}

//result: abc

Comment utiliser les instructions breaket continueen PHP

Dans de nombreux cas, vous souhaitez pouvoir arrêter une boucle à la demande.

Par exemple, vous voulez arrêter une forboucle lorsque la valeur de la variable dans le tableau est 'b':

$list = ['a', 'b', 'c'];

for ($i = 0; $i < count($list); $i++) {
	if ($list[$i] == 'b') {
    break;
  }
  echo $list[$i];
}

//result: a

Cela arrête complètement la boucle à ce point et l'exécution du programme se poursuit à l'instruction suivante après la boucle.

Si vous souhaitez simplement ignorer l'itération de la boucle en cours et continuer à chercher, utilisez à la continueplace :

$list = ['a', 'b', 'c'];

for ($i = 0; $i < count($list); $i++) {
	if ($list[$i] == 'b') {
    continue;
  }
  echo $list[$i];
}

//result: ac

Comment fonctionnent les fonctions en PHP

Les fonctions sont l'un des concepts les plus importants en programmation.

Vous pouvez utiliser des fonctions pour regrouper plusieurs instructions ou plusieurs lignes de code et leur donner un nom.

Par exemple, vous pouvez créer une fonction qui envoie un e-mail. Appelons-le sendEmail, et nous le définirons comme ceci :

function sendEmail() {
  //send an email
}

Et vous pouvez l'appeler n'importe où en utilisant cette syntaxe :

sendEmail();

Vous pouvez également passer des arguments à une fonction. Par exemple, lorsque vous envoyez un e-mail, vous souhaitez l'envoyer à quelqu'un - vous ajoutez donc l'e-mail comme premier argument :

sendEmail('test@test.com');

Dans la définition de la fonction, nous obtenons ce paramètre de cette manière (nous les appelons paramètres dans la définition de la fonction et arguments lorsque nous appelons la fonction) :

function sendEmail($to) {
  echo "send an email to $to";
}

Vous pouvez envoyer plusieurs arguments en les séparant par des virgules :

sendEmail('test@test.com', 'subject', 'body of the email');

Et nous pouvons obtenir ces paramètres dans l'ordre dans lequel ils ont été définis :

function sendEmail($to, $subject, $body) {
  //...
}

Nous pouvons éventuellement définir le type de paramètres :

function sendEmail(string $to, string $subject, string $body) {
  //...
}

Les paramètres peuvent avoir une valeur par défaut, donc s'ils sont omis, nous pouvons toujours leur attribuer une valeur :

function sendEmail($to, $subject = 'test', $body = 'test') {
  //...
}

sendEmail('test@test.com')

Une fonction peut renvoyer une valeur. Une seule valeur peut être renvoyée par une fonction, pas plus d'une. Vous faites cela en utilisant le mot- returnclé. Si omis, la fonction renvoie null.

La valeur renvoyée est super utile car elle vous indique le résultat du travail effectué dans la fonction et vous permet d'utiliser son résultat après l'avoir appelée :

function sendEmail($to) {
	return true;
}

$success = sendEmail('test@test.com');

if ($success) {
  echo 'email sent successfully';
} else {
  echo 'error sending the email';
}

Nous pouvons éventuellement définir le type de retour d'une fonction en utilisant cette syntaxe :

function sendEmail($to): bool {
	return true;
}

Lorsque vous définissez une variable à l'intérieur d'une fonction, cette variable est locale à la fonction, ce qui signifie qu'elle n'est pas visible de l'extérieur. Lorsque la fonction se termine, elle cesse simplement d'exister :

function sendEmail($to) {
	$test = 'a';
}

var_dump($test); //PHP Warning:  Undefined variable $test

Les variables définies en dehors de la fonction ne sont pas accessibles à l'intérieur de la fonction.

Cela impose une bonne pratique de programmation car nous pouvons être sûrs que la fonction ne modifie pas les variables externes et ne provoque pas d'"effets secondaires".

Au lieu de cela, vous renvoyez une valeur de la fonction, et le code extérieur qui appelle la fonction se chargera de mettre à jour la variable extérieure.

Comme ça:

$character = 'a';

function test() {
  return 'b';
}

$character = test();

Vous pouvez passer la valeur d'une variable en la passant comme argument à la fonction :

$character = 'a';

function test($c) {
  echo $c;
}

test($character);

Mais vous ne pouvez pas modifier cette valeur depuis la fonction.

Il est passé par value , ce qui signifie que la fonction en reçoit une copie, et non la référence à la variable d'origine.

C'est toujours possible en utilisant cette syntaxe (notez que j'ai utilisé &dans la définition du paramètre):

$character = 'a';

function test(&$c) {
  $c = 'b';
}

test($character);

echo $character; //'b'

Les fonctions que nous avons définies jusqu'à présent sont nommées functions .

Ils ont un nom.

Nous avons également des fonctions anonymes , qui peuvent être utiles dans de nombreux cas.

Ils n'ont pas de nom en soi, mais ils sont affectés à une variable. Pour les appeler, vous invoquez la variable avec des parenthèses à la fin :

$myfunction = function() {
  //do something here
};

$myfunction()

Notez que vous avez besoin d'un point-virgule après la définition de la fonction, mais elles fonctionnent alors comme des fonctions nommées pour les valeurs de retour et les paramètres.

Fait intéressant, ils offrent un moyen d'accéder à une variable définie en dehors de la fonction via use():

$test = 'test';

$myfunction = function() use ($test) {
  echo $test;
  return 'ok';
};

$myfunction()

Un autre type de fonction est une fonction fléchée .

Une fonction fléchée est une fonction anonyme qui n'est qu'une expression (une ligne) et renvoie implicitement la valeur de cette expression.

Vous le définissez ainsi :

fn (arguments) => expression;

Voici un exemple :

$printTest = fn() => 'test';

$printTest(); //'test'

Vous pouvez passer des paramètres à une fonction fléchée :

$multiply = fn($a, $b) => $a * $b;

$multiply(2, 4) //8

Notez que comme le montre l'exemple suivant, les fonctions fléchées ont un accès automatique aux variables de la portée englobante, sans avoir besoin de use().

$a = 2;
$b = 4;

$multiply = fn() => $a * $b;

$multiply()

Les fonctions fléchées sont super utiles lorsque vous devez passer une fonction de rappel. Nous verrons plus tard comment les utiliser pour effectuer certaines opérations sur les tableaux.

Nous avons donc au total 3 types de fonctions : les fonctions nommées , les fonctions anonymes et les fonctions fléchées .

Chacun d'eux a sa place, et vous apprendrez à les utiliser correctement au fil du temps, avec de la pratique.
Comment parcourir des tableaux avec map(), filter()et reduce()en PHP

Un autre ensemble important de structures de bouclage, souvent utilisé dans la programmation fonctionnelle, est l'ensemble de array_map()/ array_filter()/ array_reduce().

Ces 3 fonctions PHP intégrées prennent un tableau et une fonction de rappel qui, à chaque itération, prend chaque élément du tableau.

array_map()renvoie un nouveau tableau contenant le résultat de l'exécution de la fonction de rappel sur chaque élément du tableau :

$numbers = [1, 2, 3, 4];
$doubles = array_map(fn($value) => $value * 2, $numbers);

//$doubles is now [2, 4, 6, 8]

array_filter()génère un nouveau tableau en récupérant uniquement les éléments dont la fonction de rappel renvoie true:

$numbers = [1, 2, 3, 4];
$even = array_filter($numbers, fn($value) => $value % 2 === 0)

//$even is now [2, 4]

array_reduce()est utilisé pour réduire un tableau à une seule valeur.

Par exemple, nous pouvons l'utiliser pour multiplier tous les éléments d'un tableau :

$numbers = [1, 2, 3, 4];

$result = array_reduce($numbers, fn($carry, $value) => $carry * $value, 1)

Remarquez le dernier paramètre - c'est la valeur initiale. Si vous omettez cela, la valeur par défaut est 0mais cela ne fonctionnerait pas pour notre exemple de multiplication.

Notez que array_map()l'ordre des arguments est inversé. Vous avez d'abord la fonction de rappel, puis le tableau. C'est parce que nous pouvons passer plusieurs tableaux en utilisant des virgules ( array_map(fn($value) => $value * 2, $numbers, $otherNumbers, $anotherArray);). Idéalement, nous aimerions plus de cohérence, mais c'est comme ça.
Programmation orientée objet en PHP

Passons maintenant tête la première dans un grand sujet : la programmation orientée objet avec PHP.

La programmation orientée objet vous permet de créer des abstractions utiles et de rendre votre code plus simple à comprendre et à gérer.
Comment utiliser les classes et les objets en PHP

Pour commencer, vous avez des classes et des objets.

Une classe est un modèle ou un type d'objet.

Par exemple vous avez la classe Dog, définie de cette façon :

class Dog {

}

Notez que la classe doit être définie en majuscules.

Ensuite, vous pouvez créer des objets à partir de cette classe - des chiens spécifiques et individuels.

Un objet est assigné à une variable, et il est instancié en utilisant la new Classname()syntaxe :

$roger = new Dog();

Vous pouvez créer plusieurs objets à partir de la même classe, en affectant chaque objet à une variable différente :

$roger = new Dog();
$syd = new Dog();

Comment utiliser les propriétés en PHP

Ces objets partageront tous les mêmes caractéristiques définies par la classe. Mais une fois qu'ils sont instanciés, ils auront leur propre vie.

Par exemple, un chien a un nom, un âge et une couleur de fourrure.

Nous pouvons donc les définir comme des propriétés dans la classe :

class Dog {
  public $name;
  public $age;
  public $color;
}

Ils fonctionnent comme des variables, mais ils sont attachés à l'objet, une fois qu'il est instancié à partir de la classe. Le publicmot-clé est le modificateur d'accès et définit la propriété pour qu'elle soit accessible au public.

Vous pouvez attribuer des valeurs à ces propriétés de la manière suivante :

class Dog {
  public $name;
  public $age;
  public $color;
}

$roger = new Dog();

$roger->name = 'Roger';
$roger->age = 10;
$roger->color = 'gray';

var_dump($roger);

/*
object(Dog)#1 (3) {
  ["name"]=> string(5) "Roger"
	["age"]=> int(10)
	["color"]=> string(4) "gray"
}
*/

Notez que la propriété est définie comme public.

C'est ce qu'on appelle un modificateur d'accès. Vous pouvez utiliser deux autres types de modificateurs d'accès : privateet protected. Privé rend la propriété inaccessible de l'extérieur de l'objet. Seules les méthodes définies à l'intérieur de l'objet peuvent y accéder.

Nous en verrons plus sur les protégés lorsque nous parlerons de l'héritage.
Comment utiliser les méthodes en PHP

J'ai dit méthode ? Qu'est-ce qu'une méthode ?

Une méthode est une fonction définie à l'intérieur de la classe, et elle est définie de cette manière :

class Dog {
  public function bark() {
    echo 'woof!';
  }
}

Les méthodes sont très utiles pour attacher un comportement à un objet. Dans ce cas on peut faire aboyer un chien.

Remarquez que j'utilise le mot- publicclé. C'est-à-dire que vous pouvez invoquer une méthode depuis l'extérieur de la classe. Comme pour les propriétés, vous pouvez marquer les méthodes comme privatetoo, ou protected, pour restreindre leur accès.

Vous invoquez une méthode sur l'instance d'objet comme ceci :

class Dog {
  public function bark() {
    echo 'woof!';
  }
}

$roger = new Dog();

$roger->bark();

Une méthode, tout comme une fonction, peut également définir des paramètres et une valeur de retour.

À l'intérieur d'une méthode, nous pouvons accéder aux propriétés de l'objet à l'aide de la variable intégrée spéciale $thisqui, lorsqu'elle est référencée dans une méthode, pointe vers l'instance actuelle de l'objet :

class Dog {
  public $name;

  public function bark() {
    echo $this->name . ' barked!';
  }
}

$roger = new Dog();
$roger->name = 'Roger';
$roger->bark();

Remarquez que j'avais l'habitude $this->namede définir et d'accéder à la $namepropriété, et non $this->$name.
Comment utiliser la méthode constructeur en PHP

Un type spécial de méthode nommé __construct()est appelé un constructeur .

class Dog {
	public function __construct() {

  }
}

Vous utilisez cette méthode pour initialiser les propriétés d'un objet lorsque vous le créez, car il est automatiquement appelé lors de l'appel de new Classname().

class Dog {
  public $name;

	public function __construct($name) {
		$this->name = $name;
  }

  public function bark() {
    echo $this->name . ' barked!';
  }
}

$roger = new Dog('Roger');
$roger->bark();

C'est une chose tellement courante que PHP (à partir de PHP 8) inclut quelque chose appelé promotion de constructeur où il fait automatiquement cette chose :

class Dog {
  public $name;

	public function __construct($name) {
		$this->name = $name;
  }

  //...

En utilisant le modificateur d'accès, l'affectation du paramètre du constructeur à la variable locale se fait automatiquement :

class Dog {
	public function __construct(public $name) {
  }

  public function bark() {
    echo $this->name . ' barked!';
  }
}

$roger = new Dog('Roger');
$roger->name; //'Roger'
$roger->bark(); //'Roger barked!'

Les propriétés peuvent être saisies .

Vous pouvez exiger que le nom soit une chaîne en utilisant public string $name:

class Dog {
  public string $name;

	public function __construct($name) {
		$this->name = $name;
  }

  public function bark() {
    echo $this->name . ' barked!';
  }
}

$roger = new Dog('Roger');
$roger->name; //'Roger'
$roger->bark(); //'Roger barked!'

Maintenant, tout fonctionne bien dans cet exemple, mais essayez de changer cela public int $namepour exiger qu'il soit un entier.

PHP lèvera une erreur si vous initialisez $nameavec une chaîne :

TypeError: Dog::__construct():
Argument #1 ($name) must be of type int,
string given on line 14

Intéressant, non ?

Nous pouvons appliquer des propriétés pour avoir un type spécifique entre string, int, float, string, object, array, boolet other .
Qu'est-ce que l'héritage en PHP ?

Le plaisir de la programmation orientée objet commence lorsque nous permettons aux classes d'hériter des propriétés et des méthodes d'autres classes.

Supposons que vous ayez une Animalclasse :

class Animal {

}

Chaque animal a un âge et chaque animal peut manger. Nous ajoutons donc une agepropriété et une eat()méthode :

class Animal {
  public $age;

  public function eat() {
    echo 'the animal is eating';
  }
}

Un chien est un animal et a un âge et peut aussi manger, donc la Dogclasse - au lieu de réimplémenter les mêmes choses que nous avons Animal- peut étendre cette classe :

class Dog extends Animal {

}

Nous pouvons maintenant instancier un nouvel objet de classe Doget nous avons accès aux propriétés et méthodes définies dans Animal:

$roger = new Dog();
$roger->eat();

Dans ce cas, nous appelons Dog la classe enfant et Animal la classe parent .

À l'intérieur de la classe enfant, nous pouvons utiliser $thispour référencer n'importe quelle propriété ou méthode définie dans le parent, comme si elles étaient définies à l'intérieur de la classe enfant.

Il convient de noter que même si nous pouvons accéder aux propriétés et aux méthodes du parent à partir de l'enfant, nous ne pouvons pas faire l'inverse.

La classe parent ne sait rien de la classe enfant.
protectedPropriétés et méthodes en PHP

Maintenant que nous avons introduit l'héritage, nous pouvons discuter de protected. Nous avons déjà vu comment utiliser le publicmodificateur d'accès pour définir des propriétés et des méthodes appelables de l'extérieur d'une classe, par le public.

privateles propriétés et les méthodes ne sont accessibles qu'à partir de la classe.

protectedles propriétés et les méthodes sont accessibles depuis la classe et depuis les classes enfants.
Comment remplacer les méthodes en PHP

Que se passe-t-il si nous avons une eat()méthode Animalet que nous voulons la personnaliser Dog? Nous pouvons remplacer cette méthode.

class Animal {
  public $age;

  public function eat() {
    echo 'the animal is eating';
  }
}

class Dog extends Animal {
  public function eat() {
    echo 'the dog is eating';
  }
}

Désormais, toute instance de Dogutilisera l' Dogimplémentation de la eat()méthode.
Propriétés et méthodes statiques en PHP

Nous avons vu comment définir des propriétés et des méthodes qui appartiennent à l'instance d'une classe , un objet.

Parfois, il est utile de les affecter à la classe elle-même.

Lorsque cela se produit, nous les appelons static , et pour les référencer ou les appeler, nous n'avons pas besoin de créer un objet à partir de la classe.

Commençons par les propriétés statiques. Nous les définissons avec le mot- staticclé :

class Utils {
  public static $version = '1.0';
}

Nous les référençons depuis l'intérieur de la classe en utilisant le mot-clé self, qui pointe vers la classe :

self::$version;

et depuis l'extérieur de la classe en utilisant :


Utils::version

Voici ce qui se passe pour les méthodes statiques :

class Utils {
  public static function version() {
    return '1.0';
  }
}

De l'extérieur de la classe, nous pouvons les appeler de cette façon :

Utils::version();

Depuis l'intérieur de la classe, nous pouvons les référencer en utilisant le mot- selfclé, qui fait référence à la classe actuelle :

self::version();

Comment comparer des objets en PHP

Lorsque nous avons parlé d'opérateurs, j'ai mentionné que nous avions l' ==opérateur pour vérifier si deux valeurs sont égales et ===pour vérifier si elles sont identiques.

La principale différence est que ==vérifie le contenu de l'objet, par exemple la '5'chaîne est égale au nombre 5, mais elle n'est pas identique à celui-ci.

Lorsque nous utilisons ces opérateurs pour comparer des objets, ==vérifiera si les deux objets ont la même classe et si les mêmes valeurs leur sont attribuées.

===d'autre part vérifiera s'ils font également référence à la même instance (objet).

Par exemple:

class Dog {
  public $name = 'Good dog';
}

$roger = new Dog();
$syd = new Dog();

echo $roger == $syd; //true

echo $roger === $syd; //false

Comment itérer sur les propriétés d'objet en PHP

Vous pouvez boucler sur toutes les propriétés publiques d'un objet à l'aide d'une foreachboucle, comme ceci :

class Dog {
  public $name = 'Good dog';
  public $age = 10;
  public $color = 'gray';
}

$dog = new Dog();

foreach ($dog as $key => $value) {
  echo $key . ': ' . $value . '<br>';
}

Comment cloner des objets en PHP

Lorsque vous avez un objet, vous pouvez le cloner en utilisant le clonemot clé :

class Dog {
  public $name;
}

$roger = new Dog();
$roger->name = 'Roger';

$syd = clone $roger;

Cela effectue un clone peu profond , ce qui signifie que les références à d'autres variables seront copiées en tant que références - il n'y aura pas de "clonage récursif" de celles-ci.

Pour faire un clone profond , vous devrez faire un peu plus de travail.
Que sont les méthodes magiques en PHP ?

Les méthodes magiques sont des méthodes spéciales que nous définissons dans les classes pour effectuer un certain comportement lorsque quelque chose de spécial se produit.

Par exemple, lorsqu'une propriété est définie ou accédée, ou lorsque l'objet est cloné.

Nous avons déjà vu __construct().

C'est une méthode magique.

Il y en a d'autres. Par exemple, nous pouvons définir une propriété booléenne "cloned" sur true lorsque l'objet est cloné :

class Dog {
  public $name;

  public function __clone() {
    $this->cloned = true;
  }
}

$roger = new Dog();
$roger->name = 'Roger';

$syd = clone $roger;
echo $syd->cloned;

D'autres méthodes magiques incluent __call(), __get(), __set(), __isset(), __toString()et d'autres.

Vous pouvez voir la liste complète ici
Comment inclure d'autres fichiers PHP

Nous avons maintenant fini de parler des fonctionnalités orientées objet de PHP.

Explorons maintenant d'autres sujets intéressants !

Dans un fichier PHP, vous pouvez inclure d'autres fichiers PHP. Nous avons les méthodes suivantes, toutes utilisées pour ce cas d'utilisation, mais elles sont toutes légèrement différentes : include, include_once, requireet require_once.

includecharge le contenu d'un autre fichier PHP, en utilisant un chemin relatif.

requirefait la même chose, mais s'il y a une erreur, le programme s'arrête. includene générera qu'un avertissement.

Vous pouvez décider d'utiliser l'un ou l'autre en fonction de votre cas d'utilisation. Si vous voulez que votre programme se ferme s'il ne peut pas importer le fichier, utilisez require.

include_onceet require_oncefont la même chose que leurs fonctions correspondantes sans _once, mais ils s'assurent que le fichier n'est inclus/requis qu'une seule fois lors de l'exécution du programme.

Ceci est utile si, par exemple, plusieurs fichiers chargent un autre fichier et que vous souhaitez généralement éviter de le charger plus d'une fois.

Ma règle d'or est de ne jamais utiliser includeou requireparce que vous pourriez charger le même fichier deux fois. include_onceet require_oncevous aider à éviter ce problème.

À utiliser include_oncelorsque vous souhaitez charger conditionnellement un fichier, par exemple « charger ce fichier au lieu de cela ». Dans tous les autres cas, utilisez require_once.

Voici un exemple :

require_once('test.php');

//now we have access to the functions, classes
//and variables defined in the `test.php` file

La syntaxe ci-dessus inclut le test.phpfichier du dossier en cours, le fichier où se trouve ce code.

Vous pouvez utiliser des chemins relatifs :

require_once('../test.php');

pour inclure un fichier dans le dossier parent ou aller dans un sous-dossier :

require_once('test/test.php');

Vous pouvez utiliser des chemins absolus :

require_once('/var/www/test/file.php');

Dans les bases de code PHP modernes qui utilisent un framework, les fichiers sont généralement chargés automatiquement, vous aurez donc moins besoin d'utiliser les fonctions ci-dessus.
Constantes, fonctions et variables utiles pour le système de fichiers en PHP

En parlant de chemins, PHP vous propose plusieurs utilitaires pour vous aider à travailler avec les chemins.

Vous pouvez obtenir le chemin complet du fichier actuel en utilisant :

    __FILE__, une constante magique
    $_SERVER['SCRIPT_FILENAME'](plus $_SERVERtard !)

Vous pouvez obtenir le chemin complet du dossier où le fichier actuel utilise :

    la getcwd()fonction intégrée
    __DIR__, une autre constante magique
    combiner __FILE__avec dirname()pour obtenir le chemin complet du dossier actuel :dirname(__FILE__)
    utilisation$_SERVER['DOCUMENT_ROOT']

Comment gérer les erreurs en PHP

Chaque programmeur fait des erreurs. Nous sommes des humains, après tout.

On pourrait oublier un point-virgule. Ou utilisez le mauvais nom de variable. Ou passez le mauvais argument à une fonction.

En PHP nous avons :

    Avertissements
    Avis
    les erreurs

Les deux premières sont des erreurs mineures, et elles n'arrêtent pas l'exécution du programme. PHP affichera un message, et c'est tout.

Les erreurs mettent fin à l'exécution du programme et impriment un message vous indiquant pourquoi.

Il existe de nombreux types d'erreurs, telles que les erreurs d'analyse, les erreurs fatales d'exécution, les erreurs fatales de démarrage, etc.

Ce sont toutes des erreurs.

J'ai dit « PHP imprimera un message », mais... où ?

Cela dépend de votre configuration.

En mode développement, il est courant de consigner les erreurs PHP directement dans la page Web, mais également dans un journal des erreurs.

Vous voulez voir ces erreurs le plus tôt possible, afin de pouvoir les corriger.

En production, par contre, vous ne voulez pas les afficher dans la page Web, mais vous voulez tout de même les connaître.

Donc que fais-tu? Vous les enregistrez dans le journal des erreurs.

Tout est décidé dans la configuration PHP.

Nous n'en avons pas encore parlé, mais il y a un fichier dans la configuration de votre serveur qui décide de beaucoup de choses sur la façon dont PHP s'exécute.

Ça s'appelle php.ini.

L'emplacement exact de ce fichier dépend de votre configuration.

Pour savoir où se trouve le vôtre, le plus simple est de l'ajouter à un fichier PHP et de l'exécuter dans votre navigateur :

<?php
phpinfo();
?>

Vous verrez alors l'emplacement sous "Fichier de configuration chargé":
Capture d'écran 2022-06-27 à 13.42.41.jpg

Dans mon cas c'est /Applications/MAMP/bin/php/php8.1.0/conf/php.ini.

Notez que les informations générées par phpinfo()contiennent de nombreuses autres informations utiles. Rappelez-vous cela.

À l'aide de MAMP, vous pouvez ouvrir le dossier de l'application MAMP et ouvrir bin/php. Allez dans votre version spécifique de PHP (8.1.0 dans mon cas) puis allez dans conf. Vous y trouverez le php.inifichier :
Capture d'écran 2022-06-27 à 12.11.28.jpg

Ouvrez ce fichier dans un éditeur.

Il contient une très longue liste de paramètres, avec une excellente documentation en ligne pour chacun.

Nous sommes particulièrement intéressés par display_errors:
Capture d'écran 2022-06-27 à 12.13.16.jpg

En production, vous voulez que sa valeur soit Off, comme le disent les documents ci-dessus.

Les erreurs n'apparaîtront plus sur le site Web, mais vous les verrez dans le php_error.logfichier dans le logsdossier de MAMP dans ce cas :
Capture d'écran 2022-06-27 à 12.16.01.jpg

Ce fichier sera dans un dossier différent selon votre configuration.

Vous définissez cet emplacement dans votre php.ini:
Capture d'écran 2022-06-27 à 12.17.12.jpg

Le journal des erreurs contiendra tous les messages d'erreur générés par votre application :
Capture d'écran 2022-06-27 à 12.17.55.jpg

Vous pouvez ajouter des informations au journal des erreurs en utilisant la error_log()fonction :

error_log('test');

Il est courant d'utiliser un service de journalisation pour les erreurs, comme Monolog .
Comment gérer les exceptions en PHP

Parfois, les erreurs sont inévitables. Comme si quelque chose de complètement imprévisible se produisait.

Mais souvent, nous pouvons anticiper et écrire du code capable d'intercepter une erreur et de faire quelque chose de sensé lorsque cela se produit. Comme montrer un message d'erreur utile à l'utilisateur ou essayer une solution de contournement.

Nous le faisons en utilisant des exceptions .

Les exceptions sont utilisées pour que nous, développeurs, soyons conscients d'un problème.

Nous enveloppons du code qui peut potentiellement déclencher une exception dans un trybloc, et nous avons un catchbloc juste après cela. Ce bloc catch sera exécuté s'il y a une exception dans le bloc try :

try {
  //do something
} catch (Throwable $e) {
  //we can do something here if an exception happens
}

Notez que nous avons un Exceptionobjet $epassé au catchbloc, et nous pouvons inspecter cet objet pour obtenir plus d'informations sur l'exception, comme ceci :

try {
  //do something
} catch (Throwable $e) {
  echo $e->getMessage();
}

Prenons un exemple.

Disons que par erreur je divise un nombre par zéro :

echo 1 / 0;

Cela déclenchera une erreur fatale et le programme s'arrêtera sur cette ligne :
Capture d'écran 2022-06-26 à 20.12.59.jpg

En enveloppant l'opération dans un bloc try et en imprimant le message d'erreur dans le bloc catch, le programme se termine avec succès, m'indiquant le problème :

try {
  echo 1 / 0;
} catch (Throwable $e) {
  echo $e->getMessage();
}

Capture d'écran 2022-06-26 à 20.13.36.jpg

Bien sûr, c'est un exemple simple mais vous pouvez voir l'avantage : je peux intercepter le problème.

Chaque exception a une classe différente. Par exemple, nous pouvons attraper cela au fur et à mesure DivisionByZeroErroret cela me permet de filtrer les problèmes possibles et de les gérer différemment.

Je peux avoir un fourre-tout pour toute erreur jetable à la fin, comme ceci:

try {
  echo 1 / 0;
} catch (DivisionByZeroError $e) {
  echo 'Ooops I divided by zero!';
} catch (Throwable $e) {
  echo $e->getMessage();
}

Capture d'écran 2022-06-26 à 20.15.47.jpg

Et je peux aussi ajouter un finally {}bloc à la fin de cette structure try/catch pour exécuter du code après que le code soit exécuté avec succès sans problème, ou qu'il y ait eu un catch :

try {
  echo 1 / 0;
} catch (DivisionByZeroError $e) {
  echo 'Ooops I divided by zero!';
} catch (Throwable $e) {
  echo $e->getMessage();
} finally {
  echo ' ...done!';
}

Capture d'écran 2022-06-26 à 20.17.33.jpg

Vous pouvez utiliser les exceptions intégrées fournies par PHP, mais vous pouvez également créer vos propres exceptions.
Comment travailler avec des dates en PHP

Travailler avec des dates et des heures est très courant en programmation. Voyons ce que PHP fournit.

Nous pouvons obtenir l'horodatage actuel (nombre de secondes depuis le 1er janvier 1970 00:00:00 GMT) en utilisant time():

$timestamp = time();

Lorsque vous avez un horodatage, vous pouvez le formater en tant que date en utilisant date(), dans le format que vous préférez :

echo date('Y-m-d', $timestamp);

Yest la représentation à 4 chiffres de l'année, mest le numéro du mois (avec un zéro en tête) et dest le numéro du jour du mois, avec un zéro en tête.

Consultez la liste complète des caractères que vous pouvez utiliser pour formater la date ici .

Nous pouvons convertir n'importe quelle date en horodatage en utilisant strtotime(), qui prend une chaîne avec une représentation textuelle d'une date et la convertit en nombre de secondes depuis le 1er janvier 1970 :

echo strtotime('now');
echo strtotime('4 May 2020');
echo strtotime('+1 day');
echo strtotime('+1 month');
echo strtotime('last Sunday');

... c'est assez souple.

Pour les dates, il est courant d'utiliser des bibliothèques qui offrent beaucoup plus de fonctionnalités que ce que le langage peut faire. Une bonne option est Carbon .
Comment utiliser les constantes et les énumérations en PHP

Nous pouvons définir des constantes en PHP en utilisant la define()fonction intégrée :

define('TEST', 'some value');

Et puis on peut utiliser TESTcomme s'il s'agissait d'une variable, mais sans le $signe :

define('TEST', 'some value');

echo TEST;

Nous utilisons des identificateurs en majuscules comme convention pour les constantes.

Fait intéressant, à l'intérieur des classes, nous pouvons définir des propriétés constantes à l'aide du mot- constclé :

class Dog {
  const BREED = 'Siberian Husky';
}

Par défaut, ils le sont publicmais nous pouvons les marquer comme privateou protected:

class Dog {
  private const BREED = 'Siberian Husky';
}

Les énumérations vous permettent de regrouper des constantes sous une « racine » commune. Par exemple, vous voulez avoir une Statusénumération qui a 3 états : EATING SLEEPING RUNNING, les 3 états d'une journée canine.

Donc tu as :

enum Status {
  case EATING;
  case SLEEPING;
  case RUNNING;
}

Nous pouvons maintenant référencer ces constantes de cette manière :

class Dog {
  public Status $status;
}

$dog = new Dog();

$dog->status = Status::RUNNING;

if ($dog->status == Status::SLEEPING) {
  //...
}

Les énumérations sont des objets, elles peuvent avoir des méthodes et bien plus de fonctionnalités que ce que nous pouvons aborder ici dans cette courte introduction.
Comment utiliser PHP comme plateforme de développement d'applications Web

PHP est un langage côté serveur et il est généralement utilisé de deux manières.

L'un se trouve dans une page HTML, donc PHP est utilisé pour "ajouter" des éléments au HTML qui est défini manuellement dans le .phpfichier. C'est une excellente façon d'utiliser PHP.

Une autre façon considère PHP plus comme le moteur qui est chargé de générer une « application ». Vous n'écrivez pas le HTML dans un .phpfichier, mais à la place vous utilisez un langage de template pour générer le HTML, et tout est géré par ce que nous appelons le framework .

C'est ce qui se passe lorsque vous utilisez un framework moderne comme Laravel.

Je considérerais la première façon comme un peu « démodée » de nos jours, et si vous débutez, vous devriez connaître ces deux styles différents d'utilisation de PHP.

Mais envisagez également d'utiliser un framework comme le "mode facile", car les frameworks vous donnent des outils pour gérer le routage, des outils pour accéder aux données d'une base de données, et ils facilitent la création d'une application plus sécurisée. Et ils accélèrent le développement.

Cela dit, nous n'allons pas parler de l'utilisation des frameworks dans ce manuel. Mais je vais parler des éléments de base fondamentaux de PHP. Ce sont des éléments essentiels que tout développeur PHP doit connaître.

Sachez simplement que « dans le monde réel », vous pourriez utiliser la façon de faire de votre framework préféré plutôt que les fonctionnalités de niveau inférieur offertes par PHP.

Cela ne s'applique pas seulement à PHP bien sûr - c'est un "problème" qui se produit avec n'importe quel langage de programmation.
Comment gérer les requêtes HTTP en PHP

Commençons par gérer les requêtes HTTP.

PHP propose un routage basé sur les fichiers par défaut. Vous créez un index.phpfichier et qui répond sur le /chemin.

Nous l'avons vu lorsque nous avons créé l'exemple Hello World au début.

De même, vous pouvez créer un test.phpfichier et automatiquement ce sera le fichier qu'Apache servira sur la /testroute.
Comment utiliser $_GET, $_POSTet $_REQUESTen PHP

Les fichiers répondent à toutes les requêtes HTTP, y compris GET, POST et autres verbes.

Pour toute demande, vous pouvez accéder à toutes les données de la chaîne de requête à l'aide de l' $_GETobjet. Il s'appelle superglobal et est automatiquement disponible dans tous nos fichiers PHP.

Ceci est bien sûr très utile dans les requêtes GET, mais d'autres requêtes peuvent également envoyer des données sous forme de chaîne de requête.

Pour les requêtes POST, PUT et DELETE, vous aurez probablement besoin des données publiées sous forme de données encodées en URL ou en utilisant l'objet FormData, que PHP met à votre disposition en utilisant $_POST.

Il y a aussi $_REQUESTqui contient tous $_GETet $_POSTcombinés dans une seule variable.
Comment utiliser l' $_SERVERobjet en PHP

Nous avons également la variable superglobale $_SERVER, que vous utilisez pour obtenir de nombreuses informations utiles.

Vous avez vu comment utiliser phpinfo()avant. Utilisons-le à nouveau pour voir ce que $_SERVER nous offre.

Dans votre index.phpfichier à la racine de MAMP lancez :

<?php
phpinfo();
?>

Générez ensuite la page sur localhost:8888 et recherchez $_SERVER. Vous verrez toute la configuration stockée et les valeurs attribuées :
Capture d'écran 2022-06-27 à 13.46.50.jpg

Les éléments importants que vous pourriez utiliser sont :

    $_SERVER['HTTP_HOST']
    $_SERVER['HTTP_USER_AGENT']
    $_SERVER['SERVER_NAME']
    $_SERVER['SERVER_ADDR']
    $_SERVER['SERVER_PORT']
    $_SERVER['DOCUMENT_ROOT']
    $_SERVER['REQUEST_URI']
    $_SERVER['SCRIPT_NAME']
    $_SERVER['REMOTE_ADDR']

Comment utiliser les formulaires en PHP

Les formulaires sont la façon dont la plate-forme Web permet aux utilisateurs d'interagir avec une page et d'envoyer des données au serveur.

Voici un formulaire simple en HTML :

<form>
  <input type="text" name="name" />
  <input type="submit" />
</form>

Vous pouvez le mettre dans votre index.phpfichier comme s'il s'appelait index.html.

Un fichier PHP suppose que vous y écriviez du HTML avec quelques « saupoudrages PHP » <?php ?>afin que le serveur Web puisse le publier sur le client. Parfois, la partie PHP prend toute la page, et c'est là que vous générez tout le HTML via PHP - c'est un peu le contraire de l'approche que nous adoptons ici maintenant.

Nous avons donc ce index.phpfichier qui génère ce formulaire en HTML brut :
Capture d'écran 2022-06-27 à 13.53.47.jpg

En appuyant sur le bouton Soumettre, une requête GET sera envoyée à la même URL en envoyant les données via une chaîne de requête. Notez que l'URL est devenue localhost:8888/?name=test .
Capture d'écran 2022-06-27 à 13.56.46.jpg

Nous pouvons ajouter du code pour vérifier si ce paramètre est défini à l'aide de la isset()fonction :

<form>
  <input type="text" name="name" />
  <input type="submit" />
</form>

<?php
if (isset($_GET['name'])) {
  echo '<p>The name is ' . $_GET['name'];
}
?>

Capture d'écran 2022-06-27 à 13.56.35.jpg

Voir? Nous pouvons obtenir les informations de la chaîne de requête de requête GET via $_GET.

Ce que vous faites habituellement avec les formulaires, c'est que vous effectuez une requête POST :

<form **method="POST"**>
  <input type="text" name="name" />
  <input type="submit" />
</form>

<?php
if (isset($_POST['name'])) {
  echo '<p>The name is ' . $_POST['name'];
}
?>

Vous voyez, nous avons maintenant les mêmes informations mais l'URL n'a pas changé. Les informations du formulaire n'ont pas été ajoutées à l'URL.
Capture d'écran 2022-06-27 à 13.59.54.jpg

En effet, nous utilisons une requête POST , qui envoie les données au serveur d'une manière différente, via des données encodées en URL.

Comme mentionné ci-dessus, PHP servira toujours le index.phpfichier car nous envoyons toujours des données à la même URL que celle sur laquelle se trouve le formulaire.

Nous mélangeons un tas de code et nous pourrions séparer le gestionnaire de demande de formulaire du code qui génère le formulaire.

Donc on peut avoir ça dans index.php:

<form **method="POST" action="/post.php"**>
  <input type="text" name="name" />
  <input type="submit" />
</form>

et nous pouvons créer un nouveau post.phpfichier avec :

<?php
if (isset($_POST['name'])) {
  echo '<p>The name is ' . $_POST['name'];
}
?>

PHP affichera ce contenu maintenant après avoir soumis le formulaire, car nous avons défini l' actionattribut HTML sur le formulaire.

Cet exemple est très simple, mais le post.phpfichier est l'endroit où nous pourrions, par exemple, enregistrer les données dans la base de données ou dans un fichier.
Comment utiliser les en-têtes HTTP en PHP

PHP nous permet de définir les en-têtes HTTP d'une réponse via la header()fonction.

Les en-têtes HTTP sont un moyen de renvoyer des informations au navigateur.

Nous pouvons dire que la page génère une erreur de serveur interne 500 :

<?php
header('HTTP/1.1 500 Internal Server Error');
?>

Vous devriez maintenant voir le statut si vous accédez à la page avec les outils de développement du navigateur ouverts :
Capture d'écran 2022-06-27 à 14.10.29.jpg

Nous pouvons définir le content/typed'une réponse :

header('Content-Type: text/json');

On peut forcer une redirection 301 :

header('HTTP/1.1 301 Moved Permanently');
header('Location: https://flaviocopes.com');

Nous pouvons utiliser des en-têtes pour dire au navigateur « cache cette page », « ne cache pas cette page », et bien plus encore.
Comment utiliser les cookies en PHP

Les cookies sont une fonctionnalité du navigateur.

Lorsque nous envoyons une réponse au navigateur, nous pouvons définir un cookie qui sera stocké par le navigateur, côté client.

Ensuite, chaque demande faite par le navigateur inclura le cookie qui nous sera renvoyé.

Nous pouvons faire beaucoup de choses avec les cookies. Ils sont principalement utilisés pour créer une expérience personnalisée sans que vous ayez à vous connecter à un service.

Il est important de noter que les cookies sont spécifiques à un domaine, nous ne pouvons donc lire que les cookies que nous avons définis sur le domaine actuel de notre application, pas les cookies d'autres applications.

Mais JavaScript peut lire les cookies (sauf s'il s'agit de cookies HttpOnly mais nous commençons à entrer dans un terrier de lapin) donc les cookies ne doivent pas stocker d'informations sensibles.

Nous pouvons utiliser PHP pour lire la valeur d'un cookie référençant le $_COOKIEsuperglobal :

if (isset($_COOKIE['name'])) {
  $name = $_COOKIE['name'];
}

La setcookie()fonction vous permet de paramétrer un cookie :

setcookie('name', 'Flavio');

Nous pouvons ajouter un troisième paramètre pour dire quand le cookie expirera. S'il est omis, le cookie expire à la fin de la session/lorsque le navigateur est fermé.

Utilisez ce code pour faire expirer le cookie dans 7 jours :

setcookie('name', 'Flavio', time() + 3600 * 24 * 7);

Nous ne pouvons stocker qu'une quantité limitée de données dans un cookie, et les utilisateurs peuvent effacer les cookies côté client lorsqu'ils effacent les données du navigateur.

De plus, ils sont spécifiques au navigateur / appareil, nous pouvons donc définir un cookie dans le navigateur de l'utilisateur, mais s'il change de navigateur ou d'appareil, le cookie ne sera pas disponible.

Faisons un exemple simple avec le formulaire que nous avons utilisé auparavant. Nous allons stocker le nom saisi sous forme de cookie :

<?php
if (isset($_POST['name'])) {
  setcookie('name', $_POST['name']);
}
if (isset($_POST['name'])) {
  echo '<p>Hello ' . $_POST['name'];
} else {
  if (isset($_COOKIE['name'])) {
    echo '<p>Hello ' . $_COOKIE['name'];
  }
}
?>

<form method="POST">
  <input type="text" name="name" />
  <input type="submit" />
</form>

J'ai ajouté quelques conditions pour gérer le cas où le cookie était déjà défini et pour afficher le nom juste après la soumission du formulaire, lorsque le cookie n'est pas encore défini (il ne sera défini que pour la prochaine requête HTTP).

Si vous ouvrez les outils de développement du navigateur, vous devriez voir le cookie dans l'onglet Stockage.

De là, vous pouvez inspecter sa valeur et la supprimer si vous le souhaitez.
Capture d'écran 2022-06-27 à 14.46.09.jpg
Comment utiliser les sessions basées sur les cookies en PHP

Un cas d'utilisation très intéressant pour les cookies est celui des sessions basées sur les cookies.

PHP nous offre un moyen très simple de créer une session basée sur des cookies en utilisant session_start().

Essayez d'ajouter ceci :

<?php
session_start();
?>

dans un fichier PHP et chargez-le dans le navigateur.

Vous verrez un nouveau cookie nommé par défaut PHPSESSIDavec une valeur attribuée.

C'est l'identifiant de session. Celui-ci sera envoyé pour chaque nouvelle requête et PHP l'utilisera pour identifier la session.
Capture d'écran 2022-06-27 à 14.51.53.jpg

De la même manière que nous avons utilisé les cookies, nous pouvons désormais les utiliser $_SESSIONpour stocker les informations envoyées par l'utilisateur - mais cette fois, elles ne sont pas stockées côté client.

Seul l'ID de session l'est.

Les données sont stockées côté serveur par PHP.

<?php
session_start();

if (isset($_POST['name'])) {
  $_SESSION['name'] = $_POST['name'];
}
if (isset($_POST['name'])) {
  echo '<p>Hello ' . $_POST['name'];
} else {
  if (isset($_SESSION['name'])) {
    echo '<p>Hello ' . $_SESSION['name'];
  }
}
?>

<form method="POST">
  <input type="text" name="name" />
  <input type="submit" />
</form>

Capture d'écran 2022-06-27 à 14.53.24.jpg

Cela fonctionne pour les cas d'utilisation simples, mais bien sûr pour les données intensives, vous aurez besoin d'une base de données.

Pour effacer les données de session, vous pouvez appeler session_unset().

Pour effacer l'utilisation des cookies de session :

setcookie(session_name(), '');

Comment travailler avec des fichiers et des dossiers en PHP

PHP est un langage côté serveur, et l'une des choses pratiques qu'il fournit est l'accès au système de fichiers.

Vous pouvez vérifier si un fichier existe en utilisant file_exists():

file_exists('test.txt') //true

Obtenir la taille d'un fichier en utilisant filesize():

filesize('test.txt')

Vous pouvez ouvrir un fichier en utilisant fopen(). Ici, nous ouvrons le test.txtfichier en mode lecture seule et nous obtenons ce que nous appelons un descripteur de fichier dans $file:

$file = fopen('test.txt', 'r')

Nous pouvons mettre fin à l'accès au fichier en appelant fclose($fd).

Lit le contenu d'un fichier dans une variable comme ceci :

$file = fopen('test.txt', 'r')

fread($file, filesize('test.txt'));

//or

while (!feof($file)) {
	$data .= fgets($file, 5000);
}

feof()vérifie que nous n'avons pas atteint la fin du fichier car fgetslit 5000 octets à la fois.

Vous pouvez également lire un fichier ligne par ligne en utilisant fgets():

$file = fopen('test.txt', 'r')

while(!feof($file)) {
  $line = fgets($file);
  //do something
}

Pour écrire dans un fichier, vous devez d'abord l'ouvrir en mode écriture , puis utiliser fwrite():

$data = 'test';
$file = fopen('test.txt', 'w')
fwrite($file, $data);
fclose($file);

Nous pouvons supprimer un fichier en utilisant unlink():

unlink('test.txt')

Ce sont les bases, mais bien sûr il y a plus de fonctions pour travailler avec les fichiers .
PHP et bases de données

PHP propose diverses bibliothèques intégrées pour travailler avec des bases de données, par exemple :

    PostgreSQLName
    MySQL /MariaDB
    MongoDB

Je ne couvrirai pas cela dans le manuel car je pense que c'est un sujet important et qui nécessiterait également que vous appreniez SQL.

Je suis également tenté de dire que si vous avez besoin d'une base de données, vous devez utiliser un framework ou un ORM qui vous éviterait des problèmes de sécurité avec l'injection SQL. Eloquent de Laravel en est un excellent exemple.
Comment travailler avec JSON en PHP

JSON est un format de données portable que nous utilisons pour représenter des données et envoyer des données du client au serveur.

Voici un exemple de représentation JSON d'un objet contenant une chaîne et un nombre :

{
  "name": "Flavio",
  "age": 35
}

PHP nous propose deux fonctions utilitaires pour travailler avec JSON :

    json_encode()encoder une variable en JSON
    json_decode()pour décoder une chaîne JSON en un type de données (objet, tableau…)

Exemple:

$test = ['a', 'b', 'c'];

$encoded = json_encode($test); // "["a","b","c"]" (a string)

$decoded = json_decode($encoded); // [ "a", "b", "c" ] (an array)

Comment envoyer des e-mails avec PHP

L'une des choses que j'aime à propos de PHP, ce sont les commodités, comme l'envoi d'un e-mail.

Envoyez un email en utilisant mail():

mail('test@test.com', 'this subject', 'the body');

Pour envoyer des e-mails à grande échelle, nous ne pouvons pas compter sur cette solution, car ces e-mails ont tendance à atteindre le dossier spam le plus souvent. Mais pour un test rapide, c'est juste utile.

Des bibliothèques comme https://github.com/PHPMailer/PHPMailer seront très utiles pour des besoins plus solides, en utilisant un serveur SMTP.
Comment utiliser Composer et Packagist

Composer est le gestionnaire de packages de PHP.

Il vous permet d'installer facilement des packages dans vos projets.

Installez-le sur votre machine ( Linux/Mac ou Windows ) et une fois que vous avez terminé, vous devriez avoir une composercommande disponible sur votre terminal.
Capture d'écran 2022-06-27 à 16.25.43.jpg

Maintenant, dans votre projet, vous pouvez exécuter composer require <lib>et il sera installé localement. Par exemple, installons la bibliothèque Carbon qui nous aide à travailler avec les dates en PHP

composer require nesbot/carbon

Cela fera un peu de travail:
Capture d'écran 2022-06-27 à 16.27.11.jpg

Une fois cela fait, vous trouverez quelques nouveautés dans le dossier composer.jsonqui liste la nouvelle configuration des dépendances :

{
    "require": {
        "nesbot/carbon": "^2.58"
    }
}

composer.lockest utilisé pour "verrouiller" les versions du package dans le temps, afin que la même installation que vous ayez puisse être répliquée sur un autre serveur. Le vendordossier contient la bibliothèque qui vient d'être installée et ses dépendances.

Maintenant dans leindex.php fichier, nous pouvons ajouter ce code en haut :

<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

et puis nous pouvons utiliser la bibliothèque!

echo Carbon::now();

Capture d'écran 2022-06-27 à 16.34.47.jpg

Voir? Nous n'avons pas eu à télécharger manuellement un package sur Internet et à l'installer quelque part... tout était rapide, rapide et bien organisé.

La require 'vendor/autoload.php';ligne est ce qui permet le chargement automatique . Rappelez-vous quand nous avons parlé require_once()etinclude_once() ? Cela résout tout cela - nous n'avons pas besoin de rechercher manuellement le fichier à inclure, nous utilisons simplement le mot- useclé pour importer la bibliothèque dans notre code.
Comment déployer une application PHP

Lorsque vous avez une application prête, il est temps de la déployer et de la rendre accessible à tous sur le Web.

PHP est le langage de programmation avec la meilleure histoire de déploiement de déploiement sur le Web.

Croyez-moi, tous les autres langages de programmation et écosystème souhaitent être aussi simples que PHP.

La grande chose à propos de PHP, la chose qu'il a bien faite lui a permis d'avoir l'incroyable succès qu'il a eu, c'est le déploiement instantané.

Vous placez un fichier PHP dans un dossier servi par un serveur Web, et voilà , ça marche.

Pas besoin de redémarrer le serveur, de lancer un exécutable, rien.

C'est encore quelque chose que beaucoup de gens font. Vous obtenez un hébergement mutualisé pour 3 $/mois, téléchargez vos fichiers via FTP et le tour est joué.

Ces jours-ci, cependant, je pense que le déploiement de Git est quelque chose qui devrait être intégré à chaque projet, et l'hébergement partagé devrait appartenir au passé.

Une solution consiste à toujours avoir votre propre VPS privé (Virtual Private Server), que vous pouvez obtenir auprès de services comme DigitalOcean ou Linode.

Mais gérer votre propre VPS n'est pas une blague. Cela nécessite des connaissances sérieuses et un investissement en temps, ainsi qu'un entretien constant.

Vous pouvez également utiliser le soi-disant PaaS (Platform as a Service), qui sont des plates-formes qui se concentrent sur la prise en charge de tous les trucs ennuyeux (gestion des serveurs) et vous venez de télécharger votre application et elle fonctionne.

Des solutions comme DigitalOcean App Platform (qui est différente d'un VPS DigitalOcean), Heroku et bien d'autres sont idéales pour vos premiers tests.

Ces services vous permettent de connecter votre compte GitHub et de le déployer chaque fois que vous apportez une nouvelle modification à votre référentiel Git .

Vous pouvez apprendre à configurer Git et GitHub à partir de zéro ici .

Il s'agit d'un flux de travail bien meilleur que les téléchargements FTP.

Faisons un exemple simple.

J'ai créé une application PHP simple avec juste un index.phpfichier :

<?php
echo 'Hello!';
?>

J'ajoute le dossier parent à mon application GitHub Desktop, j'initialise un dépôt Git et je le pousse vers GitHub :
Capture d'écran 2022-06-27 à 17.26.24.jpg

Allez maintenant sur digitalocean.com .

Si vous n'avez pas encore de compte, utilisez mon code de parrainage pour vous inscrire, obtenez 100 $ de crédits gratuits au cours des 60 prochains jours et vous pourrez travailler gratuitement sur votre application PHP.

Je me connecte à mon compte DigitalOcean et je vais dans Applications → Créer une application.

Je connecte mon compte GitHub et sélectionne le repo de mon application.

Assurez-vous que "Autodeploy" est coché, afin que l'application se redéploie automatiquement en cas de modification :
Capture d'écran 2022-06-27 à 17.31.54.jpg

Cliquez sur "Suivant" puis sur Modifier le plan :
Capture d'écran 2022-06-27 à 17.32.24.jpg

Par défaut, le plan Pro est sélectionné.

Utilisez Basic et choisissez le forfait à 5 $/mois.

Notez que vous payez 5 $ par mois, mais que la facturation est à l'heure. Vous pouvez donc arrêter l'application à tout moment.
Capture d'écran 2022-06-27 à 17.32.28.jpg
Capture d'écran 2022-06-27 à 17.33.15.jpg

Ensuite, revenez en arrière et appuyez sur "Suivant" jusqu'à ce que le bouton "Créer des ressources" apparaisse pour créer l'application. Vous n'avez besoin d'aucune base de données, sinon cela coûterait 7 $ de plus par mois.
Capture d'écran 2022-06-27 à 17.33.46.jpg

Attendez maintenant que le déploiement soit prêt :
Capture d'écran 2022-06-27 à 17.35.00.jpg

L'application est maintenant opérationnelle !
Capture d'écran 2022-06-27 à 17.35.31.jpg
Conclusion

Vous avez atteint la fin du manuel PHP !

Merci d'avoir lu cette introduction au monde merveilleux du développement PHP. J'espère que cela vous aidera à obtenir votre travail de développement Web, à devenir meilleur dans votre métier et à vous permettre de travailler sur votre prochaine grande idée.

Remarque : vous pouvez obtenir une version PDF, ePub ou Mobi de ce manuel pour une référence plus facile, ou pour une lecture sur votre Kindle ou votre tablette.
