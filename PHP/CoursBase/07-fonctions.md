## Les fonctions [40 min] -> Q/R

<https://grafikart.fr/tutoriels/fonctions-php-1119#autoplay>

Les fonctions sont l’un des outils les plus puissants et les plus pratiques du PHP et vous devez absolument savoir les manipuler.

Nous allons donc définir ce que sont les fonctions, comprendre comment elles fonctionnent et apprendre à créer nos propres fonctions.

## Définition des fonctions et fonctions internes ou prêtes à l’emploi

Une fonction correspond à une série cohérente d’instructions qui ont été créées pour effectuer une tâche précise. Pour exécuter le code contenu dans une fonction, il va falloir appeler la fonction.

Nous avons déjà croisé des fonctions dans ce cours avec notamment la fonction gettype() dont le rôle est de renvoyer le type d’une variable.

La fonction gettype() fait partie des fonctions dites « internes » au PHP ou « prêtes à l’emploi » tout simplement car sa définition fait partie du langage PHP.

En effet, vous devez bien comprendre ici que la fonction gettype() contient une série d’instructions qui permettent de définir le type d’une variable.

Comme cette fonction a été créée et définie par le PHP lui-même, nous n’avons pas à nous soucier des instructions qu’elle contient : nous n’avons qu’à appeler gettype() en précisant son nom et le nom d’une variable dont on souhaite connaitre le type dans le couple de parenthèses pour que la série d’instructions qu’elle contient soient exécutées et pour obtenir le type de notre variable.

Les fonctions prêtes à l’emploi sont l’une des plus grandes forces du PHP puisqu’il en existe plus de 1000 qui vont couvrir quasiment tous nos besoins. Nous allons en voir une bonne partie dans la suite de ce cours.

## Les fonctions utilisateurs [32 min] -> Q/R

<https://grafikart.fr/tutoriels/fonctions-utilisateurs-php-1120#autoplay>

En plus des fonctions internes, le PHP nous laisse la possibilité de définir nos propres fonctions. Cela va s’avérer très pratique dans le cas où nous travaillons sur un projet avec des besoins très spécifiques et pour lequel on va souvent devoir répéter les mêmes opérations.

Pour utiliser nos propres fonctions, nous allons déjà devoir les définir, c’est-à-dire préciser une première fois la série d’instructions que chaque fonction devra exécuter lors de son appel.

Pour déclarer une fonction, il faut déjà commencer par préciser le mot clef function qui indique au PHP qu’on va définir une fonction personnalisée.

Ensuite, nous allons devoir préciser le nom de notre fonction (sauf dans le cas des fonctions anonymes que nous étudierons plus tard). Le nom des fonctions va suivre les mêmes règles que celui des variables, à savoir qu’il devra commencer par une lettre ou un underscore et ne devra pas être un nom déjà pris par le langage PHP (comme le nom d’une fonction déjà existante par exemple).

En plus de cela, notez qu’à la différence des variables le nom des fonctions est insensible à la casse. Cela signifie que l’utilisation de majuscules et des minuscules ne servent pas à différencier une fonction d’une autre.

Par exemple, si on crée une fonction bonjour(), les notations BONJOUR(), bonJOUR(), etc. feront référence à la même fonction.

Après le nom de notre fonction, nous devons obligatoirement mentionner un couple de parenthèses puis ensuite placer les instructions que la fonction devra exécuter lors de son appel entre des crochets.

Créons immédiatement une première fonction très simple pour voir comment cela fonctionne en pratique :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-creation-fonction-function.png)

Ici, nous créons une fonction qu’on appelle bonjour() dont le rôle est de renvoyer le message « Bonjour à tous » en utilisant un echo. Bien évidemment, cette fonction n’a pas grand intérêt ici mais il faut bien commencer par quelque chose pour un jour créer des choses complexes !

Une fonction ne va pas s’exécuter toute seule ou « automatiquement » lors du chargement de la page. Au contraire, il va falloir l’appeler quelque part dans le code pour déclencher son exécution. C’est un autre point fort des fonctions puisque cela nous permet de n’exécuter certains codes que lorsqu’on le souhaite dans un script.

Pour appeler une fonction à un point dans notre script, il suffit d’écrire son nom suivi d’un couple de parenthèses. Notez qu’on va pouvoir appeler une fonction autant de fois qu’on le veut dans un script et c’est ce qui fait le plus grand intérêt des fonctions.

En effet, plutôt que d’avoir à réécrire les instructions dans une fonction à chaque fois, il suffit de créer une fonction et de l’appeler autant de fois qu’on le souhaite. Cela peut faire gagner beaucoup de temps de développement et rend le code bien plus facilement maintenable puisque nous n’avons qu’à éditer la définition de notre fonction si on souhaite changer quelque chose dans son fonctionnement.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            function bonjour(){
                echo 'Bonjour à tous <br>';
            }
            bonjour();
            bonjour();
            bonjour();
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-execution-appel-fonction-resultat.png)

## Les paramètres et arguments des fonctions PHP

Souvent, les fonctions vont avoir besoin d’informations qui leurs sont externes, c’est-à-dire d’informations qui ne se situent pas dans la définition de la fonction pour fonctionner correctement.

Par exemple, notre fonction gettype() va avoir besoin qu’on lui fournisse ou qu’on lui « passe » une variable pour pouvoir déterminer son type.

Les informations qu’on va passer à une fonction sont appelées des arguments. Nous allons toujours passer les arguments dans les parenthèses de notre fonction. Certaines fonctions ne vont pas avoir besoin d’argument pour fonctionner, d’autres vont avoir besoin d’un argument, d’autres encore de deux, etc. Par ailleurs, certains arguments vont parfois être facultatifs tandis que d’autres seront obligatoires.

Quelles différences entre un paramètre et un argument ? On parlera de paramètre lors de la définition d’une fonction. Un paramètre sert à indiquer qu’une fonction va avoir besoin d’un argument pour fonctionner mais ne correspond pas à une valeur effective : ce n’est qu’un prête nom. Un argument en revanche correspond à la valeur effective passée à une fonction.

Vous pouvez retenir ici qu’un paramètre correspond à la valeur générale définie dans la définition d’une fonction tandis qu’un argument correspond à la valeur effective qu’on va passer à la fonction.

Imaginons par exemple qu’on définisse une fonction dont le rôle est de renvoyer « Bonjour + un prénom ». Cette fonction va avoir besoin qu’on lui passe un prénom pour fonctionner correctement.

Dans sa définition, on va donc indiquer le fait que notre fonction va avoir besoin d’une donnée pour fonctionner en précisant un paramètre entre les parenthèses. On peut fournir n’importe quel nom ici. La chose importante va être de réutiliser le même nom dans le code de notre fonction à l’endroit où la fonction s’en sert.

Ensuite, lorsqu’on appelle notre fonction, nous allons lui passer un prénom effectif, soit en lui passant une variable qui contient un prénom, soit en lui passant directement une chaine de caractères. La valeur effective va alors ici remplacer le paramètre de la définition de la fonction et on parle d’argument.

Regardez plutôt l’exemple suivant :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prenom = 'Pierre';
            $x = 4;
            $y = 5;
            
            function bonjour($p){
                echo 'Bonjour ' .$p. '<br>';
            }
            
            function addition($p1, $p2){
                echo $p1. ' + ' .$p2. ' = ' .($p1 + $p2). '<br>';
            }
            
            bonjour($prenom);
            bonjour('Mathilde');
            addition($x, $y);
            addition(1, 1);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-creation-fonction-parametre-argument-resultat.png)

Ici, on crée deux fonctions : une première fonction bonjour() qui va avoir besoin qu’on lui passe un argument pour fonctionner et une deuxième fonction addition() dont le rôle va être d’additionner deux nombres et de renvoyer le résultat et qui va donc avoir besoin qu’on lui fournisse deux nombres pour fonctionner.

Notez qu’on est obligé d’utiliser des parenthèses ici pour calculer la somme de nos deux variables à cause de la priorité des opérateurs et des règles d’associativité.

En effet ici les opérateurs . et + ont la même priorité et l’associativité se fait par la gauche. Sans parenthèses, ce serait tout le bloc de gauche qui serait additionné à la valeur à droite du +. Comme le bloc de gauche est une chaine de caractères, PHP va essayer de la convertir en nombre pour pouvoir l’additionner.

Ici, il faut savoir que PHP procède de la manière suivante pour la conversion : si la chaine de caractères commence par un nombre, alors c’est ce nombre qui sera utilisé. Dans le cas contraire, la valeur 0 sera utilisée.

## Un point sur le cours jusqu’ici

Jusqu’à présent, nous avons parlé de variables, d’opérateur, de conditions, de boucles, de fonctions… Si vous êtes nouveau dans la programmation et n’avez jamais étudié d’autres langages qui s’exécutent côté serveur, il est fortement probable que vous soyez un peu perdu à ce niveau du cours.

Je vous rassure : cela est tout à fait normal. J’essaie d’expliquer un maximum et le plus simplement possible chaque nouvelle notion et de donner le plus d’exemples possibles concrets mais cela n’est pas toujours évident car la plupart des outils du PHP nécessitent de connaitre d’autres outils pour être utilisés intelligemment.

L’idée principale à retenir ici est que dans tous les cas personne n’apprend à coder en quelques jours car il ne suffit pas d’apprendre les différentes notions d’un langage mais il faut surtout comprendre comment elles fonctionnent indépendamment et entre elles.

Pas de panique donc : faites l’effort de vous concentrer à chaque leçon, de refaire tous les exemples que je vous propose et vous allez voir qu’au fur et à mesure qu’on avancera dans le cours vous allez comprendre de mieux en mieux les notions précédentes.

Pour cette raison, je vous conseille fortement de faire le cours dans son entièreté au moins deux fois : le deuxième passage vous permettra de voir chaque notion sous un nouveau jour puisque vous aurez déjà abordé les notions connexes lors de votre première lecture.

Par ailleurs, il est possible que vous ne compreniez pas bien l’intérêt des conditions, des boucles ou des fonctions pour le moment car on ne fait que passer des valeurs pour obtenir d’autres valeurs. C’est à nouveau tout à fait normal puisque pour le moment nous définissons nous-mêmes la valeur de nos variables, ce qui enlève tout l’intérêt de la plupart des exercices.

Cependant, vous devez bien comprendre et vous imaginer que nous allons par la suite travailler avec des variables dont nous ne connaissons pas les valeurs à priori (comme par exemple dans le cas où on récupère les données envoyées par nos utilisateurs via un formulaire). C’est à ce moment là où tout ce que nous avons vu jusqu’à présent va devenir vraiment intéressant.

## Contrôler le passage des arguments
Dans la leçon précédente, nous avons défini ce qu’était une fonction et vu comment utiliser les fonctions internes au PHP ou comment créer et utiliser nos propres fonctions.

Nous avons également compris la différence entre paramètre et argument et pourquoi certaines fonctions avaient besoin qu’on leur passe des arguments pour fonctionner correctement.

Dans cette leçon, nous allons aller plus loin et apprendre notamment à définir une valeur par défaut pour nos arguments, à passer nos arguments par référence et à faire des déclarations de type.

## Passer des arguments par référence

Jusqu’à présent, nous avons passé nos arguments par valeur à nos fonctions ce qui correspond au passage par défaut en PHP.

Lorsqu’on passe une variable comme argument par valeur à une fonction, le fait de modifier la valeur de la variable à l’intérieur de la fonction ne va pas modifier sa valeur à l’extérieur de la fonction.

Imaginons par exemple qu’on crée une fonction donc le rôle est d’ajouter 3 à la valeur d’un argument. Notre fonction va ressembler à cela :
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $x = 0;
            
            function plus3($p){
                $p = $p + 3;
                echo 'Valeur dans la fonction : ' .$p;
            }
            
            plus3($x);
            echo '<br>Valeur en dehors de la fonction : ' .$x;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

Ici, on a défini une variable $x = 0 en dehors de notre fonction puis on a passé $x en argument de notre fonction.

Notre fonction va ajouter 3 à la valeur de $x et echo le résultat.

Cependant, à l’extérieur de la fonction, notre variable $x va toujours stocker 0. On peut s’en assurer en affichant la valeur de la variable hors fonction avec echo.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-passage-argument-valeur-fonction-resultat.png)

Parfois, on voudra cependant que nos fonctions puissent modifier la valeur des variables qu’on leur passe en argument. Pour cela, il va falloir passer ces arguments par référence.

Pour indiquer qu’on souhaite passer un argument par référence à une fonction, il suffit d’ajouter le signe & devant le paramètre en question dans la définition de la liste des paramètres de la fonction.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-passage-argument-reference-fonction.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-passage-argument-reference-fonction-resultat.png)

Comme vous pouvez le voir, en passant notre argument par référence, la fonction peut modifier la valeur de celui-ci et cette valeur sera conservée dans le reste du script.

## Définir des valeurs par défaut pour les paramètres de nos fonctions

Le PHP va également nous permettre de définir une valeur par défaut pour un paramètre d’une fonction. Cette valeur sera utilisée si aucun argument n’est fourni lors de l’appel de la fonction.

Notez ici que la valeur par défaut doit obligatoirement être une valeur constante et ne peut pas être une variable.

Notez également que si on définit une fonction avec plusieurs paramètres et qu’on choisit de donner des valeurs par défaut à seulement certains d’entre eux, alors il faudra placer les paramètres qui ont une valeur par défaut après ceux qui n’en possèdent pas dans la définition de la fonction.

Dans le cas contraire, le PHP renverra une erreur et notre fonction ne pourra pas être exécutée.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php 
            function bonjour($prenom, $role='abonné(e)'){
                echo 'Bonjour ' .$prenom. ' vous êtes un(e) ' .$role. '.<br>';
            }
            
            bonjour('Mathilde');
            bonjour('Pierre', 'administrateur');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-valeur-defaut-argument-fonction-resultat.png)

## Créer une fonction avec un nombre de paramètres variables

Nous allons encore pouvoir définir des fonctions qui vont pouvoir accepter un nombre variable d’arguments en valeurs.

Pour cela, il suffit d’ajouter … avant la liste des paramètres dans la définition de la fonction pour indiquer que la fonction pourra recevoir un nombre d’arguments variable.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php 
            function bonjour(...$prenoms){
                foreach($prenoms as $p){
                    echo 'Bonjour ' .$p. '<br>';
                }
            }
            
            bonjour('Mathilde', 'Pierre', 'Victor');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fonction-arguments-variables-resultat.png)

Cette syntaxe va créer un tableau avec nos différents arguments. Je dois donc utiliser une boucle foreach pour parcourir mon tableau. Nous étudierons cela plus tard. Pour le moment, contentez-vous de retenir cette syntaxe avec … avant la définition du paramètre dans notre fonction.

## Le PHP, un langage au typage faible

Une autre chose importante que vous devez savoir à propos du langage PHP est que le PHP est un langage qui ne possède pas un typage fort (on parle de « loosely typed language » en anglais).

Cela signifie de manière concrète qu’on n’a pas besoin de spécifier le type de données attendues lorsqu’on définit des paramètres pour une fonction car le PHP va déterminer lui-même le type des données passées à notre fonction en fonction de leur valeur.

Une conséquence de cela est qu’il va être possible de passer des arguments qui n’ont aucun sens à une fonction sans déclencher d’erreur.

On va par exemple pouvoir parfaitement passer deux chaines de caractères à notre fonction addition() créée dans la leçon précédente sans déclencher d’erreur.

## Le typage des arguments

Depuis sa dernière version majeure (PHP7), le PHP nous offre néanmoins la possibilité de préciser le type de données attendues lorsqu’on définit une fonction. Si une donnée passée ne correspond pas au type attendu, le PHP essaiera de la convertir dans le bon type et s’il n’y arrive pas une erreur sera cette fois-ci renvoyée.

Cela va permettre à nos fonctions de ne s’exécuter que si les valeurs passées en argument sont valides et donc d’obtenir toujours un résultat cohérent par rapport à nos attentes.

Les types valides sont les suivants :
| Type | Définition
| --- | ---
| string | L’argument passé doit être de type string (chaine de caractères)
| int | L’argument passé doit être de type integer (nombre entier)
| float | L’argument passé doit être de type float ou double (nombre décimal)
| bool | L’argument passé doit être de type boolean (booléen)
| array | L’argument passé doit être de type array (tableau)
| iterable | L’argument passé doit être de type array (tableau) ou une instance de l’interface Traversable
| callable | L’argument passé doit être de type callable (fonction de rappel)
Nom de classe / d’interface | L’argument passé doit être une instance de la classe ou de l’interface donnée
| self | L’argument passé doit être une instance de la même classe qui a défini la méthode
| object | L’argument passé doit être de type object (objet)

Certains types nous sont encore inconnus, nous les étudierons plus tard dans ce cours. Concentrez-vous pour le moment sur les types connus, à savoir string, int, float et bool.

Voici comment on va pouvoir utiliser les déclarations de type concrètement avec nos fonctions :
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            function test($a, $b){
                echo $a. ' + ' .$b. ' = ' .($a + $b). '<br>';
            }
        
            function addition(float $a, float $b){
                echo $a. ' + ' .$b. ' = ' .($a + $b). '<br>';
            }
            
            test(3, 4);
            test(3, '4Pierre');//'4Pierre' est converti en 4 par PHP
            test(3, 'Pierre');//'Pierre' est converti en 0 par PHP
            addition(3, 4);
            addition(3, 4.5);
            addition(3.5, 4.2);
            addition(3, '4Pierre');//'4Pierre' est converti en 4 par PHP
            addition(3, 'Pierre');//Renvoie une erreur qui termine l'exécution
            
            //Nous étudierons les erreurs plus tard dans le cours
            echo 'Ce message ne s\'affichera pas ';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-typage-argument-fonction-resultat.png)

Ici, l’utilisation de l’opérateur arithmétique + fait que PHP va convertir les valeurs à gauche et à droite de l’opérateur en nombres. Si le PHP doit convertir une chaine de caractères, il va regarder si un nombre se situe au début de celle-ci. Si c’est le cas, il conserve le nombre. Sinon, la chaine sera évaluée à 0.

Notre deuxième fonction utilise le typage : on demande que les arguments fournis soient de type float (nombres décimaux). Ici, si le PHP n’arrive pas à convertir les arguments passés vers le type attendu, une erreur va être reournée.

## Le typage strict

Nous allons pouvoir aller entre plus loin et activer un typage strict pour nos fonctions. En utilisant le mode strict, les fonctions ne vont plus accepter que des arguments dont le type correspond exactement au type demandé dans leur définition.

Notez ici que l’ensemble des nombres entiers fait partie de l’ensemble des nombres décimaux. Ainsi, si on passe un nombre entier en argument d’une fonction qui attend d’après sa définition un nombre décimal, la fonction s’exécutera normalement même avec le mode strict activé.

Pour activer le typage strict, nous allons utiliser la structure de contrôle declare qui sert à ajouter des directives d’exécution dans un bloc de code.

Nous allons pouvoir passer trois directives différentes à declare :

- La directive ticks ;
- La directive encoding ;
- La directive strict_types.

La directive qui va nous intéresser ici est strict_types. Pour activer le mode strict, nous écrirons declare(strict_types= 1). Afin que le typage strict soit activé, il faudra que declare(strict_types= 1) soit la première déclaration de notre fichier.

```php
<?php declare(strict_types= 1);?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            function addition(float $a, float $b){
                echo $a. ' + ' .$b. ' = ' .($a + $b). '<br>';
            }
            addition(3, 4);
            addition(3, 4.5);
            addition(3.5, 4.2);
            addition(3, '4Pierre');//Ne fonctionne pas car typage strict activé
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-typage-strict-argument-fonction-resultat.png)

Faites bien attention ici : le typage strict ne va s’appliquer que s’il est activé dans le fichier depuis lequel la fonction est appelée. Ainsi, si vous définissez une fonction dans un premier fichier qui possède le typage strict activé puis que vous appelez cette fonction dans un autre fichier qui ne possède pas le typage strict activé, le typage strict ne s’appliquera pas.

Notez également que le typage strict ne s’applique que pour les déclarations de type scalaire, c’est-à-dire pour les types string, int, float et bool.

## Contrôler les valeurs de retour d’une fonction
Nous allons comprendre l’intérêt de la structure de contrôle return et apprendre à l’utiliser pour retourner le résultat d’une fonction.

## Avantages et spécificités de l’instruction return

Jusqu’à présent, le seul moyen que nous avions d’avoir accès au résultat d’une fonction qu’on avait créée était d’afficher ce résultat en utilisant un echo dans la définition de la fonction lors de sa création.

Le problème de cette méthode est que nous n’avons aucun contrôle sur le résultat de la fonction : dès que l’on appelle la fonction en question, le echo à l’intérieur est exécuté et le résultat est immédiatement affiché.

La structure de contrôle return va nous permettre de demander à une fonction de retourner un résultat qu’on va ensuite pouvoir stocker dans une variable ou autre pour le manipuler.

Cela va être utile dans de nombreux cas puisqu’on voudra souvent récupérer le résultat d’une fonction pour effectuer d’autres calculs ou d’autres opérations avec celui-ci dans un script plutôt que simplement l’afficher.

Attention cependant : l’instruction return va terminer l’exécution d’une fonction, ce qui signifie qu’on placera généralement cette instruction en fin de fonction puisque le code suivant une instruction return dans une fonction ne sera jamais lu ni exécuté.

Pour illustrer cela, créons deux fonctions dont le rôle est de multiplier deux nombres entre eux et de renvoyer le résultat de la multiplication. La première fonction va utiliser un echo, la seconde utilisera plutôt return.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            /*Note : l'opérateur "*" a une priorité plus grande que "."
             *pas besoin de () ici donc pour faire le calcul*/
            function multecho(float $a, float $b){
                echo $a. ' * ' .$b. ' = ' .$a * $b. '<br>';
            }
            
            function multreturn(float $a, float $b){
                return $a. ' * ' .$b. ' = ' .$a * $b. '<br>';
            }
        
            multecho(2, 3);
            multreturn(4, 5);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fonction-echo-return-resultat.png)

Ici, on utilise un echo pour afficher le résultat dans notre fonction multecho(). Le echo s’exécute lors de l’appel à la fonction et résultat est donc affiché immédiatement après l’appel à notre fonction. Ici, nous n’avons aucun contrôle sur le résultat puisque celui-ci est affiché automatiquement.

En revanche, on utilise return pour simplement retourner le résultat de notre fonction multreturn(). Ici, le résultat n’est pas affiché, il est simplement retourné par la fonction.

Cela explique le fait qu’aucun résultat ne s’affiche lorsqu’on appelle notre fonction multreturn(). Le résultat a bien été calculé et a bien été retourné, mais il attend qu’on en fasse quelque chose.

On va alors pouvoir placer ce résultat dans une variable pour ensuite l’utiliser pour effectuer différents calculs ailleurs dans notre script.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            /*Note : l'opérateur "*" a une priorité plus grande que "."
             *pas besoin de () ici donc pour faire le calcul*/
            function multecho(float $a, float $b){
                echo $a. ' * ' .$b. ' = ' .$a * $b. '<br>';
            }
            
            function multreturn(float $a, float $b){
                return $a * $b;
            }
        
            multecho(2, 3);
            
            //On exécute multreturn() et on place le résultat dans $res
            $res = multreturn(4, 5);
            
            echo $res+= 2;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fonction-return-valeur-retour-resultat.png)

Ici, notre fonction multreturn () retourne le résultat de la multiplication de deux nombres. On place la valeur retournée dans une variable $res. On ajoute 2 à cette variable et on affiche le résultat final. Les opérations ne sont bien évidemment pas très intéressantes ici mais en pratique il va être très utile de pouvoir se servir d’une valeur retournée par une fonction.

## La déclaration des types de valeurs de retour

Depuis PHP7, nous allons de façon similaire à la déclaration de type des arguments pouvoir déclarer les types de retour.

Les déclarations du type de retour vont permettre de spécifier le type de la valeur qui sera retournée par une fonction. On va ici pouvoir utiliser les mêmes types que les types pour les arguments vus dans la leçon précédente.

Notez que le typage strict affecte également les types de retour : si celui-ci est activé, alors la valeur retournée doit être du type attendu. Dans le cas contraire, une exception sera levée par le PHP. Nous étudierons les exceptions bien plus tard dans ce cours. Pour faire simple, vous pouvez pour le moment retenir qu’une exception est une erreur.

```php
<?php declare(strict_types= 1);?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            function multreturn($a, $b): int{
                return $a * $b;
            }
            
            echo multreturn(2, 4);
            echo '<br><br>';
            echo multreturn(2, 4.1);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fonction-typage-valeur-retour-strict-resultat.png)

Dans le cas où le typage strict n’est pas activé (qui est le cas par défaut), si les valeurs retournées ne sont pas du type attendu alors elles seront transtypées, ce qui signifie que le PHP va essayer de transformer leur type pour qu’il corresponde au type attendu.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fonction-typage-valeur-retour.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fonction-typage-valeur-retour-resultat.png)

## La portée des variables en PHP
Nous allons étudier un concept très important concernant les variables et leur utilisation qui est la notion de portée des variables en PHP.

## Définition : la portée des variables en PHP

En PHP, nous pouvons déclarer des variables n’importe où dans notre script : au début du script, à l’intérieur de boucles, au sein de nos fonctions, etc.

L’idée principale à retenir ici est que l’endroit dans le script où on déclare une variable va déterminer l’endroit où la variable va être accessible c’est-à-dire utilisable. La « portée » d’une variable désigne justement la partie du script où la variable va être accessible.

Pour faire très simple, vous pouvez considérer que les variables peuvent avoir deux portées différentes : soit une portée globale, soit une portée locale.

Toute variable définie en dehors d’une fonction a une portée globale. Par définition, une variable qui a une portée globale est accessible « globalement », c’est-à-dire dans tout le script sauf dans les espaces locaux d’un script.

Au contraire, toute variable définie à l’intérieur d’une fonction va avoir une portée locale à la fonction. Cela signifie que la variable ne sera accessible qu’au sein de la fonction et notre variable sera par ailleurs par défaut détruite dès la fin de l’exécution de la fonction.

Regardez plutôt les exemples suivants pour bien comprendre la notion de portée des variables :
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $x = 10;
            
            function portee1(){
                echo 'La valeur de $x globale est : ' .$x. '<br>';
            }
            function portee2(){
                $x = 5;
                echo 'La valeur de $x locale est : ' .$x. '<br>';
            }
            function portee3(){
                $y = 0;
                $y++;
                echo '$y contient la valeur : ' .$y. '<br>';
            }
            function portee4(){
                $z = 1;
            }
            portee1();
            portee2();
            portee3();
            portee3();
            portee4();
            echo 'La variable locale $z contient : ' .$z;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-portee-variable-locale-globale-resultat.png)

Ici, on commence par déclarer une variable $x en dehors de toute fonction. Notre variable possède donc une portée globale.

Dans notre première fonction portee1(), on tente d’afficher le contenu de notre variable $x déclarée globalement. Cela ne va pas fonctionner puisqu’une variable globale n’est par défaut pas accessible dans un espace local.

Notre deuxième fonction portee2() définit sa propre variable $x et a pour but d’afficher son contenu. Ici, vous devez bien comprendre que les deux variables $x globale et $x locale sont différentes pour le PHP. On le voit bien lorsqu’on affiche ensuite le contenu de notre variable $x globale qui n’a pas été modifié par son homologue locale.

Notre troisième fonction portee3() définit elle une variable $y = 0 et son but est d’incrémenter la valeur de notre variable puis de la renvoyer. Si on appelle plusieurs fois portee3(), on se rend compte que le résultat est toujours 1. Cela s’explique par le fait que la variable est détruite à la fin de l’exécution de chaque fonction et est donc réinitialisée sur sa valeur $y = 0 à chaque fois qu’on appelle la fonction.

Finalement, notre quatrième fonction portee4() définit une variable $z. Lorsqu’on essaie d’afficher le contenu de $z depuis l’espace global, aucune valeur n’est renvoyée puisqu’une variable définie localement n’est accessible que dans l’espace dans laquelle elle a été définie par défaut.

## Accéder à une variable de portée globale depuis un espace local

Parfois, nous voudrons nous servir de variables possédant une portée globale (c’est-à-dire définies en dehors d’une fonction) à l’intérieur d’une fonction.

Pour cela, on va pouvoir utiliser le mot clef global avant la déclaration des variables qu’on souhaite utiliser dans notre fonction. Cela va nous permettre d’indiquer que les variables déclarées dans la fonction sont en fait nos variables globales. Pour être tout à fait précis, on dit que les variables globales sont importées dans le contexte local par référence.

On va ainsi pouvoir utiliser nos variables globales localement. Attention ici : si on modifie la valeur de ces variables dans notre fonction, la valeur des variables globales sera également modifiée puisque ce sont essentiellement les mêmes variables qu’on manipule à l’intérieur de notre fonction.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $x = 10;
            
            function portee(){
                global $x;
                echo 'La valeur de $x globale est : ' .$x. '<br>';
                $x = $x + 5; //On ajoute 5 à la valeur de $x
            }
            
            portee();
            echo '$x contient maintenant : ' .$x;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-portee-variable-global-resultat.png)

On va également pouvoir utiliser la variable super globale $GLOBALS pour accéder localement à de variables de portée globale. Nous verrons comment faire cela lorsqu’on étudiera les variables super globales.

## Accéder à une variable définie localement depuis l’espace global

Il n’y a aucun moyen d’accéder à une variable définie localement depuis l’espace global. Cependant, on va tout de même pouvoir récupérer la valeur finale d’une variable définie localement et la stocker dans une nouvelle variable globale en utilisant l’instruction return.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            function portee(){
                $y = 5;
                echo 'Valeur de $y (depuis la fonction) :' .$y. '<br>';
            }
            
            function portee2(){
                $z = 5;
                return $z;
            }
            
            portee();
            echo 'Valeur de $y (depuis l\'espace global) : ' .$y. '<br>';
            
            $a = portee2(); //On stocke la valeur renvoyée par portee2() dans $a
            echo '$z contient la valeur : ' .$a;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-variable-locale-resultat.png)

Notez cependant bien ici qu’une variable locale n’aura toujours qu’une portée locale et que sa portée ne pourra pas être étendue dans l’espace global.

## Le mot clef static

Une variable définie localement va être supprimée ou détruite dès la fin de l’exécution de la fonction dans laquelle elle a été définie.

Parfois, nous voudrons pouvoir conserver la valeur finale d’une variable locale pour pouvoir s’en resservir lors d’un prochain appel à la fonction. Cela va notamment être le cas pour des fonctions dont le but va être de compter quelque chose.

Pour qu’une fonction de « souvienne » de la dernière valeur d’une variable définie dans la fonction, nous allons pouvoir utiliser le mot clef static devant la déclaration initiale de la variable.

La portée de la variable sera toujours statique, mais la variable ne sera pas détruite lors de la fin de l’exécution de la fonction mais plutôt conservée pour pouvoir être réutilisée lors d’une prochaine exécution.

Notez par ailleurs que lorsque nous initialisons une variable en utilisant static, la variable ne sera initialisée que lors du premier appel de la fonction (si ce n’était pas le cas, le mot clef static n’aurait pas grand intérêt).
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            function compteur(){
                static $x = 0;
                echo '$x contient la valeur : ' .$x. '<br>';
                $x++;
            }
            
            compteur();
            compteur();
            compteur();
            compteur();
            compteur();
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-portee-variable-static-resultat.png)

Ici, notre fonction commence par initialiser une variable $x, affiche sa valeur puis l’incrémente. Lors du premier appel, $x contient la valeur 0. Lors du deuxième appel, la fonction va réutiliser la dernière valeur de $x qui n’a pas été détruite grâce à l’utilisation du mot clef static et va à nouveau afficher la valeur contenue dans notre variable (1 donc) puis l’incrémenter à nouveau. Notez qu’ici la fonction ne réinitialise pas notre variable.

Sans le mot clef static, chaque nouvel appel de notre fonction renverrait la valeur 0 puisqu’à la fin de chaque exécution de la fonction les variables utilisées seraient détruites et seraient donc réinitialisées à chaque nouvel appel.

## Constantes et constantes magiques en PHP
Nous allons définir ce que sont les constantes en PHP, présenter les constantes magiques qui sont des constantes pré-définies ou internes au PHP et apprendre à créer nos propres constantes.

## Définition des constantes PHP

Une constante est un identifiant ou un nom qui représente une valeur simple. Les constantes, tout comme les variables, vont donc être des conteneurs qui vont nous servir à stocker une valeur.

Cependant, à la différence des variables, la valeur stockée dans une constante ne va pas pouvoir être modifiée : elle va être « constante » (sauf dans le cas des constantes magiques dont nous allons reparler plus tard).

Notez également que les constantes vont par défaut être toutes accessibles dans tout le script : on va pouvoir les définir n’importe où dans le script et pouvoir y accéder depuis n’importe quel autre endroit du script.

Notez de plus que par convention, les constantes seront toujours écrites en majuscules pour bien les différencier des autres objets du langage PHP.

## Créer ou définir une constante en PHP

Pour définir une constante en PHP, nous allons pouvoir utiliser la fonction define() ou le mot clef const.

Pour créer une constante en utilisant define(), nous allons devoir passer le nom de la constante que l’on souhaite créer et la valeur que doit stocker la constante en arguments de cette fonction. Une fois qu’une constante est définie, elle ne peut jamais être modifiée ni détruite.

Si vous souhaitez créer une constante en utilisant le mot clef const, alors vous devez noter que seules des données de type string, integer, float, boolean et array (dans les dernières versions de PHP) vont pouvoir être stockées dans notre constante.

En dehors de cela, le nom des constantes suit les mêmes règles que n’importe quel nom en PHP, à savoir qu’il doit obligatoirement commencer par une lettre ou éventuellement par un underscore. Notez également que par défaut le nom des constantes est sensible à la casse mais cela ne devrait pas importer puisque vous devriez toujours déclarer vos constantes en majuscules. De plus, à la différence des variables, nous ne devrons pas préfixer le nom d’une constante avec le signe $.

Pour ensuite utiliser la valeur d’une constante ou l’afficher, il suffit d’appeler la constante par son nom comme on en a l’habitude avec les variables.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            define('DIX', 10);
            
            echo 'La constante DIX stocke la valeur ' .DIX;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-creation-affichage-constante-resultat.png)

## Les constantes prédéfinies et les constantes magiques en PHP

Le PHP nous fournit également un certain nombre de constantes prédéfinies qui vont généralement nous donner des informations de type « meta » comme la version de PHP actuellement utilisée, le plus petit entier supporté par PHP, des constantes de rapport d’erreur etc.

Ces constantes prédéfinies ne vont pas toujours être toutes disponibles car certaines sont définies par des extensions PHP. Une extension PHP est une librairie (un ensemble de feuilles de codes) qui permettent d’ajouter des fonctionnalités au PHP de base.

Parmi ces constantes prédéfinies, il y en a neuf qui vont retenir notre attention et qu’on appelle des constantes « magiques ». Ces constantes se distinguent des autres puisque leur valeur va changer en fonction de l’endroit dans le script où elles vont être utilisées.

Les constantes magiques sont reconnaissables par le fait que leur nom commence par deux underscores et se termine de la même manière (excepté pour une). Ce sont les suivantes :
| Nom de la constante | Description
| --- | ---
| __FILE__ | Contient le chemin complet et le nom du fichier
| __DIR__ | Contient le nom du dossier dans lequel est le fichier
| __LINE__ | Contient le numéro de la ligne courante dans le fichier
| __FUNCTION__ | Contient le nom de la fonction actuellement définie ou {closure} pour les fonctions anonymes
| __CLASS__ | Contient le nom de la classe actuellement définie
| __METHOD__ | Contient le nom de la méthode actuellement utilisée
| __NAMESPACE__ | Contient le nom de l’espace de noms (« namespace ») courant
| __TRAIT__ | Contient le nom du trait (incluant le nom de l’espace de noms dans lequel il a été déclaré)
| ClassName::class | Contient le nom entièrement qualifié de la classe

Pour le moment, nous allons nous concentrer sur les quatre premières constantes citées, car vous ne disposez pas encore de connaissances suffisantes pour bien comprendre les quatre dernières.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            //Affiche le numéro de la ligne où la constante a été appelée (dans le code)
            echo 'Numéro de ligne : ' .__LINE__. '<br>';
            
            //Affiche le chemin du ficher et son nom
            echo 'Chemin complet du fichier : ' .__FILE__. '<br>';
            
            //Affiche le nom du dossier qui contient le fichier
            echo 'Dossier contenant le fichier : ' .__DIR__. '<br>';
             
            //Affiche à nouveau la ligne où la constante a été appelée
            echo 'Numéro de ligne : ' .__LINE__. '<br>';
            
            //Renvoie le nom de la fonction depuis laquelle la constante est appelée
            function test(){
                echo 'Constante appelée depuis la fonction ' .__FUNCTION__;
            }
            //Ne pas oublier d'exécuter la fonction pour qu'elle echo la valeur de la constante magique !
            test();
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-constantes-magiques-resultat.png)

Les constantes magiques vont notamment être utiles pour récupérer des adresses de fichiers et les utiliser dans des fichiers de configuration ou lors d’appels à nos bases de données SQL ou encore pour effectuer des actions de débogage.

### Exo 7

- Faite en sorte que la fonction HelloWorld retourne exactement la valeur Hello World!
- Créer une fonction from scratch qui s'appelle quiEstLeMeilleurProf(). Elle doit retourner Le prof de programmation Web
- Créer une fonction from scratch qui s'appelle jeRetourneMonArgument(). Exemple : Arg = "abc" ==> Return abc Arg = 123 ==> Return 123
- Créer une fonction from scratch qui s'appelle concatenation(). Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux. Exemple : argument 1 = Antoine Argument 2 = Griezmann; Resultat : AntoineGriezmann
- Créer une fonction from scratch qui s'appelle concatenationAvecEspace(). Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux. Exemple : argument 1 = Ngolo Argument 2 = Kante; Resultat : Ngolo Kante
- Créer une fonction from scratch qui s'appelle somme(). Elle prendra deux arguments de type int. Elle devra retourner la somme des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 10
- Créer une fonction from scratch qui s'appelle soustraction(). Elle prendra deux arguments de type int. Elle devra retourner la soustraction des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 0
- Créer une fonction from scratch qui s'appelle multiplication(). Elle prendra deux arguments de type int. Elle devra retourner la multiplication des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 25
- Créer une fonction from scratch qui s'appelle estIlMajeure(). Elle prendra un argument de type int. Elle devra retourner un boolean. Si age >= 18 elle doit retourner true si age < 18 elle doit retourner false Exemple : age = 5 ==> false age = 34 ==> true
- Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra deux arguments de type int. Elle devra retourner le plus grand des deux.
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra deux arguments de type int. Elle devra retourner le plus petit des deux.
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra trois arguments de type int. Elle devra retourner le plus petit des trois.

### Exo 8

- Créer une fonction from scratch qui s'appelle premierElementTableau(). Elle prendra un argument de type array. Elle devra retourner le premier élement du tableau. Si l'array est vide, il faudra retourner null;
- Créer une fonction from scratch qui s'appelle dernierElementTableau(). Elle prendra un argument de type array. Elle devra retourner le dernier élement du tableau. Si l'array est vide, il faudra retourner null;
- Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra un argument de type array. Elle devra retourner le plus grand des élements présent dans l'array. Si l'array est vide, il faudra retourner null;
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra un argument de type array. Elle devra retourner le plus petit des élements présent dans l'array. Si l'array est vide, il faudra retourner null;
- Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password fait au moins 8 caractères et false si moins.
- Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password respecte les règles suivantes :
  - Faire au moins 8 caractères
  - Avoir au moins 1 chiffre
  - Avoir au moins une majuscule et une minuscule
- Créer une fonction from scratch qui s'appelle capital(). Elle prendra un argument de type string. Elle devra retourner le nom de la capitale des pays suivants :
  - France ==> Paris
  - Allemagne ==> Berlin
  - Italie ==> Rome
  - Maroc ==> Rabat
  - Espagne ==> Madrid
  - Portugal ==> Lisbonne
  - Angleterre ==> Londres
  - Tout autre pays ==> Inconnu
  - Il faudra utiliser la structure SWITCH pour faire cette exercice.
- Créer une fonction from scratch qui s'appelle listHTML(). Elle prendra deux arguments :
  - Un string représentant le nom de la liste
  - Un array représentant les élements de cette liste
  - Elle devra retourner une liste HTML. Chaque element de cette liste viendra du tableau passé en paramètre.
  - Exemple : Paramètre : Titre : Capitale Liste : ["Paris", "Berlin", "Moscou"] Résultat : <h3>Capitale</h3><ul><li>Paris</li><li>Berlin</li><li>Moscou</li></ul>
  - Comme vous pouvez le voir il n'y a pas d'espace ni de retour à la ligne entre les élements de la liste. Pas d'espace non plus entre le titre et la liste.
  - Si le titre est null et vide il faut que la fonction retourne null. Si l'array est vide, il faut que la fonction retourne null.
- Créer une fonction from scratch qui s'appelle remplacerLesLettres(). Elle prendra un argument de type string. Elle devra retourner cette même string mais en remplacant les e par des 3, les i par des 1 et les o par des 0 Exemple :
  - input : "Bonjour les amis" ==> Output : B0nj0ur l3s am1s
  - input : "Les cours de programmation Web sont trops cools" ==> Output : L3s c0urs d3 pr0grammat10n W3b s0nt tr0ps c00ls

### Exo 9

Avec des fonctions et des tableaux :

- affiche tous les éléments d'un tableau,
- calcule la moyenne des nombres contenus dans un tableau donné,
- indique combien d'éléments sont supérieurs ou égaux à 10,
- teste si la note 20 est présente ou non,
- détermine la meilleure note obtenue.
- On souhaite stocker les notes d'étudiants, vous utiliserez un tableau associatif pour ça :
  - Albert : 12, 8, 9, 7, 13
  - Michel : 14, 13, 12, 11, 10
  - Vincent : 17, 16, 15, 18, 13
  - Faite une fonction qui prend en paramètre un tableau de note et permet de calculer la moyenne de l'étudiant

### Exo 10

Il faut écrire la fonction check_form. Celle-ci prend un tableau associatif en paramètre. Ce dernier contient les clés suivantes :

    nom
    prenom
    CP
    naissance
    banque

La fonction check_form doit vérifier que les données sont valides. Pour être valides les données doivent respecter les contraintes suivantes :

    Le nom doit exclusivement être composé des caractères de a à z, de - et (d'espace).
    Le prenom doit exclusivement être composé des caractères de a à z, de - et (d'espace).
    CP est une valeur numérique comprise entre 1000 et 9999.
    naissance doit être une date valide au format jour/mois/année.
    banque doit être un numéro de compte belge au format européen (eg. BE15 1234 5678 9012)

Pour vous aider dans la vérification des données vous pouvez utiliser les expressions régulières (voir fonction preg_match). Voici des expressions régulières pouvant vous aider :

    #^[A-Za-z -]*$# vérifie qu'une chaîne est composée des caractères de a à z, de - et (d'espace).
    #^[0-9]{1,2}/[0-9]{1,2}/[0-9]{1,4}$# vérifie qu'une chaine est au format xx/xx/xxxx où x est un nombre.
    #^BE[0-9]{2}( ?[0-9]{4}){3}$# vérifie qu'une chaîne correspond à un numéro de compte belge au format européen.

La fonction retournera un tableau associatif contenant les informations suivantes :

    valide valeur booléenne TRUE ou FALSE selon que toutes les données sont valides ou non
    nom
        valide valeur booléenne TRUE ou FALSE selon que les données dans nom sont valides ou non.
        message un message d'erreur relatif à nom si valide est FALSE.
    prenom
        valide valeur booléenne TRUE ou FALSE selon que les données dans prenom sont valides ou non.
        message un message d'erreur relatif à prenom si valide est FALSE.
    CP
        valide valeur booléenne TRUE ou FALSE selon que les données dans CP sont valides ou non.
        message un message d'erreur relatif à CP si valide est `FALSE
    naissance
        valide valeur booléenne TRUE ou FALSE selon que les données dans naissance sont valides ou non.
        message un message d'erreur relatif à naissance si valide est FALSE.
    banque
        valide valeur booléenne TRUE ou FALSE selon que les données dans banque sont valides ou non.
        message un message d'erreur relatif à banque si valide est FALSE.

## Exo 11

1. Créez une fonction qui retourne "Bonjour à tous !". Affichez le résultat avec un `echo`.

2. Créez une fonction qui calcule une vitesse en mètres par secondes (`m/s`) : `vitesse (m/s) = temps (s)/distance (m)` et qui prend en argument des mètres et des secondes. Affichez la valeur dans un echo qui dit : "La durée est de xxx secondes, la distance est de xxx mètres, la vitesse est de xxx m/s".

## Calculer la différence entre deux brins d'ADN

> Des généticiens ont besoin de calculer les différences entre deux brins d'ADN représentés par exemple comme suit:

```
GAGCCTACTAACGGGAT
CATCGTAATGACGGCCT
^ ^ ^  ^ ^    ^^
```

> Les différences sont représentées par `^`. Par exemple ici, la réponse est 7.

Créez une fonction qui prend en paramètres obligatoires deux `string` et retournez le nombre de différences entre les deux brins d'ADN.

Étapes :

1. Vérifier que les deux strings soient de la même taille
2. Couper chaque strings en deux tableaux distincts : ces tableaux auront 1 index par lettre
3. Trouver une fonction qui liste les différences entre deux tableaux
4. Retourner le nombre de différences entre les deux tableaux

<details>
  <summary>Spoiler warning</summary>

```php
function difference(string $a, string $b) {

    if( strlen($a) === strlen($b) ) {
        $arr1 = str_split($a);
        $arr2 = str_split($b);
        $diff = array_diff_assoc($arr1, $arr2);
        return count($diff);
    }

    return false;
}
```

</details>

## Changer de l'ADN en ARN

Des scientifiques (toujours les même), ont besoin de changer de l'ADN en ARN de sorte à pouvoir créer un chat-lapin mutant.
Les quatre nucléotides de l'ADN sont : l'adénine (A), la cytosine (C), la guanine (G) et la thymine (T).

The quatre nucléotides de l'ARN dont : l'adénine (A), la cytosine (C), la guanine (G) et l'uracil (U).

On convertit un brin d'ADN en ARN en remplaçant chaque nucléotide par
son complément :

```
G -> C
C -> G
T -> A
A -> U
```

En utilisant la fonction `strtr()`, créez une fonction qui transpose de l'ADN en ARN.

<details>
  <summary>Spoiler warning</summary>

```php
function toARN(string $adn): string {
    $transposition = [
        'C' => 'G',
        'G' => 'C', 
        'T' => 'A', 
        'A' => 'U'
    ];

    return strtr($adn, $transposition);
}
```

</details>

## Gérer le nom du robot

Les scientifiques ont réussi, ou presque, leur mutation de chat-lapin. En réalité, ils ont créé un robot simulant leur expérience. Ils ont besoin d'une fonction qui permette de gérer l'identifiant du robot (qui peut ressembler à RXW-4382 ou WSR-3455 par exemple), qui doit changer à chaque reboot de sa carte mère.

Créez une fonction qui génère un nom aléatoire pour le robot.
Les conditions sont les suivantes :

1. Respecter le format `AAA-0000` (3 lettres, un tiret, 4 chiffres)
2. Les lettres doivent être au hasard parmi `R, Z, S, X, W, T`
3. Les chiffres doivent être au nombre 4

<details>
  <summary>Spoiler warning</summary>

##### Étapes

- Faire un tableau contenant les 6 lettres autorisées
- Déclarer la variable $nomRobot = '';
- Choisir au hasard 1 élément du tableau (fonction native PHP à trouver)
- Faire une boucle pour le faire 3 fois
- Dans la boucle : concaténer la lettre trouvée à une variable de retour
- Concaténer un tiret
- Générer un nombre entre 0 et 9999 et le stocker dans $nomRobotNumber
- Gérer les cas où $nomRobotNumber ne fait que 3 chiffres :
  - [0;9] : concaténer '000' à $nomRobot
  - [10;99] : concaténer '00' à $nomRobot
  - [100:999] : concaténer '0' à $nomRobot
- Concatène $nomRobotNumber
- return $nomRobot

```php
function robotName() {

    // 1. Faire un tableau contenant les lettres autorisées
    $validLetters = ["R", "Z", "S", "X", "W", "T"];

    // 2. Déclarer la variable $nomRobot = '';
    $newName = "";

    // 3. Choisir au hasard 1 élément du tableau (fonction native PHP à trouver)
    // 4. Faire une boucle pour le faire 3 fois
    for ($i=0; $i < 3; $i++) {
        // une lettre aléatoire choisie par ID grâce à rand(0,5)
        // 5. Dans la boucle : concaténer la lettre trouvée à une variable de retour

        $newName.= $validLetters[rand(0, 5)];
    }

    // 6. Concaténer un tiret
    $newName.="-";

    // 7. Générer un nombre entre 0 et 9999 et le stocker dans $nomRobotNumber
    $robotNumber = rand(0, 9999);

    // 8. Gérer les cas où $nomRobotNumber ne fait que 3 chiffres :
    if ($robotNumber < 1000 && $robotNumber > 99) { // [0;9] : concaténer '000' à $nomRobot
        $newName .= "0";
    }
    elseif ($robotNumber < 100 && $robotNumber > 9) { // [10;99] : concaténer '00' à $nomRobot
        $newName .= "00";
    }
    elseif ($robotNumber < 10 ) { // [100:999] : concaténer '0' à $nomRobot
        $newName .= "000";
    };

    // 9. Concatène $nomRobotNumber
    $newName .= $robotNumber;
    
    // 10. return $nomRobot
    return $newName;
}
```

</details>

## Endiguer la guerre des clones

Les scientifiques ont oublié quelque chose dans leur précédente demande ! Les identifiants n'étant pas uniques, des clones de chat-lapin-robots ont apparu et menacent de faire sauter le laboratoire.

Gérez l'unicité des noms dans la fonction précédente.

- Créez un array en dehors de la fonction précécente qui contiendra les noms générés
- Appelez cet array dans la fonction afin de comparer le nom généré au tableau contenant les noms générés. Pour appeler une variable venue de l'extérieur au sein d'une fonction, on utilise le mot clé `global` :

```php
$a = 0;

function maFonction() {
    global $a;  // On importe $a qui vaut 0
    $a += 1;    // On ajoute 1
    return $a;
}
var_dump($a);   // a = 0
maFonction();   // Ajout de 1 à la globale a
var_dump($a);   // a = 1
```

<details>
  <summary>Spoiler warning</summary>

```php
// On prépare un tableau vide qui contiendra la liste des noms de robots édités
$namesList = [];

function robotName() {

    // On utilise la variable $namesList au sein de la fonction pour la remplir
    // à chaque appel de la fonction.
    // Comme elle vient du scope (la portée) global, on l'appelle avec global.
    // Ainsi, quand on la modifie DANS la fonction, elle est aussi modifiée en
    // dehors de la fonction.
    global $namesList;

    $validLetters = ["R", "Z", "S", "X", "W", "T"];
    $newName = "";

    for ($i=0; $i < 3; $i++) {
        $newName.= $validLetters[rand(0, 5)];
    }

    $newName.="-";
    $robotNumber = rand(0, 9999);

    if ($robotNumber < 1000 && $robotNumber > 99) {
        $newName .= "0";
    }
    elseif ($robotNumber < 100 && $robotNumber > 9) {
        $newName .= "00";
    }
    elseif ($robotNumber < 10 ) {
        $newName .= "000";
    };

    $newName .= $robotNumber;

    // On teste si le nouveau nom n'existe pas dans le tableau :
    if (!in_array($newName, $namesList)) {
        // S'il n'existe pas, on l'ajoute au tableau et on retourne le nouveau nom
        $namesList[] = $newName; // Autre écriture: array_push($namesList, $newName);
        return $newName;
    }

    // Sinon, on emmet une erreur :
    throw new Error('Vous êtes sur le point de cloner ce robot !');
}
```

#### Solution 2 (passage de variable par référence)

```php
$robotNames = [];

// Dans les arguments de la fonction, on peut préciser un passage par référence avec & : cela indique que la variable du scope supérieur passée en paramètres de la fonction, si elle est modifiée par la fonction appelée, restera modifiée dans son scope :

function nameRobot(&$robotNames)
{
    $name = "";
    $letters = ["R", "Z", "S", "X", "W", "T"];
    while (strlen($name) < 3) {
        $name .= $letters[rand(0, count($letters) - 1)];
    }
    $name .= "-";
    while (strlen($name) < 8) {
        $name .= strval(rand(0, 9));
    }
    
    if (!in_array($name, $robotNames)) {
    
        // On ajoute à $robotNames le nouveau nom
        array_push($robotNames, $name);
        var_dump($robotNames);
        return true;
    }
    // Si il y a une correspondance (le nom existe), on relance la fonction elle-même
    nameRobot($robotNames);
}

var_dump($robotNames); // tableau vide
nameRobot($robotNames); // on lance la fonction avec $robotNames en référence
var_dump($robotNames); // tableau contenant dorénavant 1 élément !
```

</details>
