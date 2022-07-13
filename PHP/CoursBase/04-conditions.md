## Les conditions [22 min] -> Q/R

<https://grafikart.fr/tutoriels/conditions-php-1117#autoplay>

Dans cette nouvelle partie, nous allons étudier et comprendre l’intérêt des structures de contrôle en PHP. Une structure de contrôle est un ensemble d’instructions qui permet de contrôler l’exécution du code.

Il existe différents types de structures de contrôle. Les deux types les plus connus et les plus utilisés sont les structures de contrôle conditionnelles qui permettent d’exécuter un bloc de code si une certaine condition est vérifiée et les structures de contrôle de boucle qui permettent d’exécuter un bloc de code en boucle tant qu’une condition est vérifiée.

Nous allons déjà commencer avec l’étude des structures de contrôle conditionnelles.

## Présentation des conditions en PHP

Les structures de contrôle conditionnelles (ou plus simplement conditions) vont nous permettre d’exécuter différents blocs de code selon qu’une condition spécifique soit vérifiée ou pas.

Par exemple, on va pouvoir utiliser les conditions pour afficher un message de bienvenue différent en PHP sur notre site selon que l’utilisateur soit connu ou un simple visiteur qui ne s’est jamais inscrit sur notre site.

Nous allons très souvent utiliser les conditions avec des variables : selon la valeur stockée dans une variable, nous allons vouloir exécuter un bloc de code plutôt qu’un autre.

Les conditions vont ainsi être un passage incontournable pour rentre un site dynamique puisqu’elles vont nous permettre d’exécuter différents codes et ainsi afficher différents résultats selon le contexte.

En PHP, nous allons pouvoir utiliser les conditions suivantes :

- La condition if (si) ;
- La condition if… else (si… sinon) ;
- La condition if… elseif… else (si… sinon si… sinon).

Nous allons étudier chacune de ces conditions dans la suite de cette partie.

## Présentation des opérateurs de comparaison

Comme je l’ai précisé plus haut, nous allons souvent construire nos conditions autour de variables : selon la valeur d’une variable, nous allons exécuter tel bloc de code ou pas.

En pratique, nous allons donc comparer la valeur d’une variable à une certaine autre valeur donnée et selon le résultat de la comparaison exécuter un bloc de code ou pas. Pour comparer des valeurs, nous allons devoir utiliser des opérateurs de comparaison.

Voici ci-dessous les différents opérateurs de comparaison disponibles en PHP ainsi que leur signification :
| Opérateur | Définition
| ---- | ---
| == | Permet de tester l’égalité sur les valeurs
| === | Permet de tester l’égalité en termes de valeurs et de types
| != | Permet de tester la différence en valeurs
| <> | Permet également de tester la différence en valeurs
| !== | Permet de tester la différence en valeurs ou en types
| < | Permet de tester si une valeur est strictement inférieure à une autre
| > | Permet de tester si une valeur est strictement supérieure à une autre
| <= | Permet de tester si une valeur est inférieure ou égale à une autre
| >= | Permet de tester si une valeur est supérieure ou égale à une autre

Certain de ces opérateurs nécessitent certainement une précision de ma part. Avant tout, vous devez bien comprendre que lorsqu’on utilise un opérateur de comparaison en PHP, on n’indique pas au PHP que telle valeur est supérieure, inférieure, égale ou différente de telle autre.

Au contraire, les opérateurs de comparaisons nous servent à demander au PHP de comparer deux opérandes (les « opérandes » sont les valeurs situées de chaque côté d’un opérateur), c’est-à-dire d’évaluer si telle valeur est bien supérieure, inférieure, égale ou différente (selon l’opérateur utilisé) à telle autre valeur. Le PHP va ensuite renvoyer une valeur selon le résultat de la comparaison.

Revenons à nos opérateurs. Tout d’abord, notez que notre « égal » mathématique (l’égalité en termes de valeurs) se traduit en PHP par le double signe égal ==.

Ensuite, certains d’entre vous doivent certainement se demander ce que signifie le triple égal. Lorsqu’on utilise un triple égal ===, on cherche à effectuer une comparaison non seulement sur la valeur mais également sur le type des deux opérandes.

Prenons un exemple simple pour illustrer cela. Imaginons que l’on possède une variable $x dans laquelle on stocke le chiffre 4. On veut ensuite comparer la valeur stockée dans notre variable à la chaîne de caractères « 4 ».

Si on utilise le double signe égal pour effectuer la comparaison, l’égalité va être validée par le PHP car celui-ci ne va tester que les valeurs, et 4 est bien égal à « 4 » en termes de valeurs.

En revanche, si on utilise le triple signe égal, alors l’égalité ne va pas être validée car nous comparons un nombre à une chaine de caractères (donc des types différents de valeurs).

On va suivre exactement le même raisonnement pour les deux opérateurs != et !== qui vont nous permettre de tester respectivement la différence en termes de valeurs simplement et la différence en termes de valeurs ou de type.

## Utiliser les opérateurs de comparaison

Il y a différentes choses que vous devez savoir et comprendre pour bien utiliser les opérateurs de comparaison.

La première chose à savoir est que lorsqu’on utilise un opérateur de comparaison, le PHP va comparer la valeur à gauche de l’opérateur à celle à droite. On dit également qu’il évalue la comparaison.

Si la comparaison est vérifiée ou validée, alors le PHP renvoie la valeur booléenne true. Si le test de comparaison échoue, alors PHP renvoie la valeur booléenne false. Cela est très important à comprendre car nos conditions vont s’appuyer sur cette valeur booléenne pour décider du code à exécuter ou pas.
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
            $x = 4; //On affecte la valeur 4 à $x
            
            /*On compare la valeur contenue dans $x à 4 en valeur.
             *On renvoie le résultat de la comparaison grâce à var_dump()*/
            var_dump($x == 4);
            echo '<br>';
            
            var_dump($x > 7);
            echo '<br>';
            
            /*On compare la valeur de $x à la chaine de caractères "4" en
             *valeur simplement*/
            var_dump($x == "4");
            echo '<br>';
            
            /*On compare la valeur de $x à la chaine de caractères "4" en
             *termes de valeur et de type*/
            var_dump($x === "4");
            echo '<br>';
            
            var_dump($x != "4");
            echo '<br>';
            
            var_dump($x !== "4");
            echo '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-operateurs-comparaison-resultat.png)

Expliquons les résultats obtenus. Tout d’abord, vous remarquez qu’on a utilisé la fonction var_dump() pour afficher les résultats plutôt qu’un echo.

Cela a été fait pour une raison simple : echo va transformer toute valeur en chaîne de caractères avant de l’afficher. Or, l’équivalent de la valeur booléenne true en chaîne de caractères est la chaine de caractères « 1 » tandis que false devient « 0 » ou une chaine de caractères vide.

Comme je voulais absolument vous montrer que le PHP renvoyait bien une valeur booléenne après l’utilisation d’opérateurs de comparaison, j’ai donc été obligé d’utiliser la fonction var_dump() à la place de echo.

Le rôle de la fonction PHP var_dump() est en effet d’afficher les informations structurées d’une variable ou d’une expression et notamment son type et sa valeur. C’est pour cela que le navigateur nous affiche des bool(true) ou bool(false).

Ceci étant dit, analysons maintenant chacune de nos opérations en détail et expliquons les résultats en soi.

Pour commencer, on compare la valeur contenue dans $x au chiffre 4. Si le PHP considère l’égalité vérifiée, il renvoie le booléen true. Dans le cas contraire, il renverra code>false. Comme vous pouvez le voir, c’est la valeur true qui est renvoyée. En effet, la valeur de notre variable est bien égale en valeur au chiffre 4.

On compare ensuite la valeur contenue dans $x au chiffre 7 avec l’opérateur de supériorité absolue. Si le PHP détermine que la valeur contenue dans $x est strictement supérieure au chiffre 7, il renvoie true. Dans le cas contraire, il renvoie code>false. Dans le cas présent, $x contient le chiffre 4, qui n’est pas strictement supérieur au chiffre 7. C’est donc la valeur code>false qui est renvoyée.

Pour notre troisième comparaison, on décide de comparer la valeur de $x à la chaine de caractères « 4 ». On utilise le double signe égal pour cela, on ne va donc comparer que les valeurs. Comme la valeur 4 est bien égale en valeur à la chaine de caractères « 4 », PHP renvoie true.

Ensuite, on compare à nouveau la valeur contenue dans notre variable $x à la chaine de caractères « 4 ». Cependant, cette fois-ci, on utilise le triple signe égal.
En faisant cela, on signifie que l’on veut comparer les valeurs mais également les types de chacune des deux valeurs. Comme un nombre et une chaine de caractères n’ont pas le même type, PHP renvoie cette fois-ci false.

Dans notre cinquième opération, on demande à PHP de déterminer si la valeur contenue dans $x différente (en valeur) de la chaine de caractères « 4 ». Comme le chiffre 4 n’est pas différent en valeur de la chaine de caractères « 4 », le PHP renvoie false (car rappelez-vous qu’on teste ici la différence).

Enfin, on demande à PHP de déterminer si la valeur contenue dans $x est différente en valeur ou en type de la chaine de caractères « 4 ». Le chiffre 4 est bien d’un type différent de la chaine de caractères « 4 », et donc le PHP renvoie true.

## Les opérateurs de comparaison ternaire, spaceship et fusion null

La dernière version majeure du PHP, le PHP 7 a introduit deux nouveaux opérateurs de comparaison qui se comportent différemment des précédents puisque le PHP ne va pas renvoyer true ou false à l’issue de la comparaison.

Le premier de ces opérateurs est l’opérateur « spaceship » <=>. A l’issue de la comparaison des deux opérandes, le PHP va ici renvoyer :

- 0 dans le cas où les deux opérandes sont égaux ;
- -1 si l’opérande à gauche de l’opérateur est plus petit que celui de droite ;
- 1 si l’opérande à gauche de l’opérateur est plus grand que celui de droite.

Le deuxième opérateur est l’opérateur « fusion null » ??. Cet opérateur va principalement nous permettre de comparer le contenu de deux variables. Le PHP va ici renvoyer :

- La valeur de l’opérande à droite de l’opérateur si la valeur de l’opérande à gauche est NULL ;
- La valeur de l’opérande à gauche de l’opérateur dans tous les autres cas.

Le dernier opérateur est l’opérateur ternaire ? :. Nous allons étudier en détail ces trois opérateurs dans une prochaine leçon.

## Les conditions if, if…else et if…elseif…else PHP
Nous savons désormais utiliser les opérateurs de comparaison. Il est donc temps d’entrer dans le vif du sujet et d’apprendre à créer nos premières structures conditionnelles.

Dans cette nouvelle leçon, nous allons étudier les structures de contrôle conditionnelles if, if…else et if… elseif… else.

## La condition if en PHP

La structure de contrôle conditionnelle, ou plus simplement « condition » if est l’une des plus importantes et des plus utilisées dans l’ensemble des langages de programmation utilisant les structures de contrôle et en particulier en PHP.

La condition if est également la plus simple, puisqu’elle va nous permettre d’exécuter un bloc de code si et seulement si le résultat d’un test vaut true.

Créons immédiatement nos premières conditions if :
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
            $x = 4; //On affecte la valeur 4 à $x
            $y = 2; //On affecte la valeur 2 à $y
            
            if($x > 1){
                echo '$x contient une valeur supérieure à 1';
            }
            
            if($x == $y){
                echo '$x et $y contiennent la même valeur';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-condition-if-resultat.png)

Ici, j’ai créé deux conditions if avec une comparaison qui va être évaluée à true et une autre qui va être évaluée à false.

Commencez par noter la syntaxe de nos conditions qui est la suivante : if(test){code à exécuter si le test est validé}. Il convient de différencier ici « test » et « comparaison » : le test correspond à l’ensemble du code écrit dans les parenthèses et peut être composé de plusieurs comparaisons comme on va le voir par la suite.

Dans notre première condition, le résultat de la comparaison renvoyé par le PHP est true puisque notre variable $x stocke le chiffre 4 qui est bien supérieur à 1. Le code dans la condition est alors exécuté.

Dans notre deuxième condition, la comparaison est cette fois-ci évaluée à false car la valeur contenue dans $x n’est pas égale en valeur à la valeur contenue dans $y. Le code contenu dans la condition ne sera donc pas lu ni exécuté.

## Inverser la valeur logique d’une condition

Dans les exemples ci-dessus, le code placé dans notre condition n’est exécuté que si le résultat de la comparaison est true.

Dans certaines situations, nous préférerons créer nos conditions de telle sorte à ce que le code dans la condition soit exécuté si le résultat de la comparaison est false.

Nous allons pouvoir faire cela de deux manières : soit en utilisant l’opérateur logique inverse ! que nous étudierons dans la leçon suivante, soit en comparant le résultat de notre comparaison à false.

Concentrons-nous pour le moment sur cette deuxième méthode qui demande de bien connaitre l’ordre de priorité des opérateurs et de bien comprendre l’associativité de ceux-ci.

Il y a deux choses à savoir ici :

- Les opérateurs <, <=, > et >= ont une priorité plus importante que les opérateurs ==, ===, !=, !==, <> et <> qui ont eux-mêmes une priorité plus importante que l’opérateur ??;
- Les opérateurs de comparaison sont non-associatifs (à l’exception de l’opérateur ?? dans l’associativité se fait par la droite), ce qui signifie que si ils ont une priorité équivalente on ne pourra pas les utiliser entre eux. Cela signifie qu’on n’aura pas le droit d’écrire la comparaison 2 < 4 > 2 par exemple en PHP car les opérateurs < et > ont le même ordre de priorité et sont non associatifs.

Ainsi, si on écrit par exemple 2 < 4 == false, PHP va d’abord effectuer la comparaison 2 < 4 puis comparer le résultat de cette comparaison (qui est ici true car 2 est bien inférieur à 4) à false. Ici, true est différent de false et donc le test va finalement échouer.

Pour inverser la valeur logique d’une condition, c’est-à-dire pour exécuter le code de la condition uniquement lorsque notre première comparaison est évaluée à false, il suffit donc de comparer le résultat de cette première comparaison à la valeur false.

Si notre première comparaison n’est pas vérifiée et est évaluée à false, alors le test de notre condition va devenir if(false == false) ce qui va être finalement évalué à true et donc le code de notre condition va bien être exécuté !

Notez qu’on va également pouvoir utiliser les parenthèses pour forcer la priorité d’un opérateur sur un autre, ce qui peut être utile lorsqu’on souhaite utiliser plusieurs opérateurs de comparaison qui ont une priorité équivalente par défaut.
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
            $x = 4; //On affecte la valeur 4 à $x
            $y = 2; //On affecte la valeur 2 à $y
            
            if(($x <= 1) == false){
                echo '$x contient une valeur supérieure à 1';
            }
            
            if(($x != $y) == false){
                echo '$x et $y contiennent la même valeur';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-test-condition-false-resultat.png)

Ici, notre variable $x stocke la valeur 4 qui est supérieure à 1. La partie $x <= 1 de notre première condition va donc être évaluée à false. On compare ensuite le résultat de la comparaison à false. On obtient donc ici if(false == false) qui va être évalué à true puisque c’est le cas et donc le code dans notre condition va bien être exécuté.

On utilise le même procédé pour notre deuxième condition que je vous laisse décortiquer seul pour que vous puissiez vous entrainer.

## La condition if…else en PHP

Avec la condition if, nous restons relativement limités puisque cette condition nous permet seulement d’exécuter un bloc de code selon que le résultat d’un test soit évalué à true.

La structure conditionnelle if…else (« si… sinon » en français) va être plus complète que la condition if puisqu’elle va nous permettre d’exécuter un premier bloc de code si un test renvoie true ou un autre bloc de code dans le cas contraire.
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
            $x = 4; //On affecte la valeur 4 à $x
            $y = 2; //On affecte la valeur 2 à $y
            
            if($x > 1){
                echo '$x contient une valeur stric. supérieure à 1 <br>';
            }else{
                echo '$x contient une valeur inférieure ou égale à 1 <br>';
            }
            
            if($x == $y){
                echo '$x et $y contiennent la même valeur <br>';
            }else{
                echo '$x et $y contiennent des valeurs différentes <br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-condition-if-else-resultat.png)

Notez la syntaxe de la condition if…else : on place notre comparaison et on effectue notre test dans le if mais pas dans le else.

En effet, la structure else est une structure qui a été créée pour prendre en charge tous les cas nos gérés précédemment. Ainsi, on ne précisera jamais de condition au sein d’un else puisque par défaut cette structure prend en charge tous les autres cas (tous les cas non gérés par le if ici).

Si le test de notre condition est validé, le code dans le if va s’exécuter et le code dans le else va alors être ignoré.

Si au contraire le test n’est pas validé alors le code dans le if va être ignoré et c’est le cas dans le else qui va être exécuté.

## La condition if…elseif…else en PHP

La condition if…elseif…else (« si…sinon si…sinon ») est une structure conditionnelle encore plus complète que la condition if…else puisqu’elle va nous permettre cette fois-ci de générer autant de cas que l’on souhaite.

En effet, nous allons pouvoir écrire autant de elseif (en un seul mot, attention) que l’on veut dans notre condition if…elseif…else, chacun avec un test différent.
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
            $x = 4; //On affecte la valeur 4 à $x
            $y = 2; //On affecte la valeur 2 à $y
            
            if($x > 1){
                echo '$x contient une valeur stric. supérieure à 1 <br>';
            }elseif($x == 1){
                echo '$x contient la valeur 1 <br>';
            }else{
                echo '$x contient une valeur stric. inférieure à 1 <br>';
            }
            
            if($x == $y){
                echo '$x et $y contiennent la même valeur <br>';
            }elseif($x < $y){
                echo '$x contient une valeur stric. inférieure à $y <br>';
            }elseif($x > $y){
                echo '$x contient une valeur stric. supérieure à $y <br>';
            }else{
                echo 'Les valeurs de $x et $y n\'ont pas pu être comparées';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-condition-if-elseif-else-resultat.png)

Comme vous pouvez le constater, les elseif occupent un rôle similaire au if de départ puisque chacun d’entre eux va posséder son propre test (qui est obligatoire).

Notez que dans le cas où plusieurs elseif possèdent un test qui va être évalué à true, seul le code du premier elseif rencontré sera exécuté. En effet, dès qu’un test va être validé, le PHP va ignorer les tests suivants.

Notez également qu’on devra toujours obligatoirement terminer notre condition if…elseif…else avec un else qui servira à gérer toutes les issues (ou les cas) non pris en charge par le if ou par les elseif.

## Créer des conditions robustes avec les opérateurs logiques
Dans cette nouvelle leçon, nous allons apprendre à créer des conditions complexes qui vont utiliser plusieurs comparaisons grâce aux opérateurs logiques.

## Imbriquer plusieurs conditions

Souvent, nous allons vouloir comparer plusieurs valeurs au sein d’une même condition, c’est-à-dire n’exécuter son code que si plusieurs conditions sont vérifiées.

Pour faire cela, nous allons pouvoir soit utiliser les opérateurs logiques, soit imbriquer plusieurs conditions les unes dans les autres.

Les opérateurs logiques vont nous permettre de créer des conditions plus puissantes mais dans certains cas il sera plus intéressant et plus rapide d’imbriquer des conditions.
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
            $inscrit = true;
            $age = 21;
            
            if($inscrit){
                if($age >= 18){
                    echo 'Utilisateur inscrit et majeur, accès autorisé';
                }else{
                    echo 'Utilisateur inscrit et mineur, accès restreint';
                }
            }else{
                echo 'Utilisateur non inscrit, accès refusé';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-conditions-imbriquees-resultat.png)

Dans cet exemple, on veut tester les critères « utilisateur inscrit ou non » et « utilisateur majeur ou non » et répondre de façon différente en fonction de chaque situation.

La façon la plus simple de faire cela est de créer une première condition if…else et d’imbriquer une deuxième condition if…else à l’intérieur du premier if.

Le PHP va d’abord évaluer la comparaison du premier if. Si le test est validé, on entre alors dans le deuxième if et on évalue la condition de celui-ci. Si le test du premier if échoue, alors on passe directement au else sans jamais rentrer dans le deuxième if…else.

Notez par ailleurs que comme dans notre cas notre variable $inscrit stocke une valeur booléenne on n’a pas besoin de faire de comparaison explicite puisque la valeur true est elle-même évaluée à true tandis que false est évaluée à false par le PHP.

## Présentation des opérateurs logiques

Les opérateurs logiques vont être principalement utilisés avec les conditions puisqu’ils vont nous permettre d’écrire plusieurs comparaisons au sein d’une même condition ou encore d’inverser la valeur logique d’un test.

En PHP, nous pouvons utiliser les opérateurs logiques suivants :
| Opérateur | Définition
| --- | ---
| AND | Renvoie true si toutes les comparaisons valent true
| && | Renvoie true si toutes les comparaisons valent true
| OR | Renvoie true si une des comparaisons vaut true
| || | Renvoie true si une des comparaisons vaut true
XOR | Renvoie true si une des comparaisons exactement vaut true
| ! | Renvoie true si la comparaison vaut false (et inversement)

Comme vous pouvez le constater, les opérateurs logiques « ET » et « OU » peuvent s’écrire de deux façons différentes : soit avec les mots clefs AND et OR, soit avec les signes && et ||.

Ces deux écritures ne sont pas tout à fait équivalentes : la différence réside dans l’ordre des priorités de traitement des opérations. En effet, l’écriture avec des signes a une priorité plus importante que l’écriture avec des mots clefs.

Attention également à ne pas confondre les opérateurs logiques OR et XOR en PHP : si on utilise l’opérateur OR, le PHP va renvoyer true si au moins une des comparaisons vaut true et renverra donc true si plusieurs comparaisons valent true tandis qu’en utilisant l’opérateur XOR le PHP ne renverra true que si une seule comparaison vaut true (et reverra false si plusieurs comparaisons valent true).

## Récapitulatif : l’ordre de priorité des opérateurs

Au cours des leçons précédentes, nous avons vu les types d’opérateurs les plus communs : opérateurs arithmétiques, d’affectation, de chaine, de comparaison et maintenant logiques.

Les seuls types d’opérateurs communs que nous n’avons pas encore étudié sont les opérateurs d’incrémentation et de décrémentation ainsi que l’opérateur ternaire.

A ce niveau du cours, il me semble donc important de faire un récapitulatif global de la priorité de tous ces opérateurs et de leur associativité afin de pouvoir les utiliser de la meilleure manière.

La tableau suivant liste les différents opérateurs vus jusqu’ici ainsi que les opérateurs d’incrémentation et de décrémentation et le ternaire qu’on étudiera plus tard selon leur priorité (la première ligne du tableau contient les opérateurs avec la plus grande priorité et etc. jusqu’à la dernière ligne contenant les opérateurs avec la plus petite priorité).
| Opérateurs | Associativité
| --- | ---
| ** | droite
| ++ | (incrémentation), -- (décrémentation) | droite
| ! | droite
| *, /, % | gauche
| +, -, . | gauche
| <, <=, >, >= | non-associatif
| ==, ===, !=, !==, <>, <=> | non-associatif
| && | gauche
| || | gauche
| ?? | droite
| ? : (ternaire) | gauche
| =, +=, -=, *=, /=, %=, **=, .= | droite
| AND | gauche
| XOR | gauche
| OR | gauche

Je sais que ça fait beaucoup de choses à retenir et que ce genre de choses ne fait pas partie des choses les plus marrantes ou intéressantes à apprendre à priori. Cependant, connaitre la priorité des opérateurs est indispensable pour bien les utiliser et nous allons beaucoup utiliser les opérateurs en PHP.

Je vous demande donc ici de faire votre maximum pour ne pas directement « passer à la suite » mais plutôt pour prendre le temps de comprendre et de retenir ces différentes priorités et l’associativité des différents opérateurs.

## Utilisation des opérateurs logiques avec les conditions
### Une condition avec plusieurs comparaisons

Les opérateurs logiques AND, &&, OR, || et XOR vont nous permettre de créer des conditions avec plusieurs comparaisons.

On va ainsi pouvoir choisir d’exécuter un code uniquement si toutes les comparaisons valent true, ou si au moins l’une d’entre elles vaut true, ou encore si seulement l’une d’entre elles vaut true.
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
            $x = 4; //On affecte la valeur 4 à $x
            $y = -12; //On affecte la valeur -12 à $y
            
            if($x >= 0 AND $x <= 5){
                echo '$x contient une valeur entre 0 et 5 <br>';
            }
            
            if($x >= 0 AND $y >= 0){
                echo '$x et $y contiennent une valeur positive <br>';
            }
            
            if($x >= 0 OR $y >= 0){
                echo '$x ou $y (ou les deux) contient une valeur positive <br>';
            }
            
            if($x >= 0 XOR $y >= 0){
                echo '$x ou $y contient une valeur positive mais pas les deux';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-operateurs-logiques-condition-resultat.png)

Dans l’exemple ci-dessus, notre première condition utilise l’opérateur AND. Chacune des deux comparaisons va devoir être évaluée à true pour que le code de la condition soit exécuté.

Notre deuxième condition est équivalente dans sa structure à la première. LA seule différence est qu’on effectue deux comparaisons avec deux variables différentes.

Notre troisième condition utilise l’opérateur OR. Dans ce cas, il suffit qu’une comparaison soit évaluée à true pour que le code de notre condition soit exécuté.

Notre dernière condition utilise elle l’opérateur XOR. Pour que le code de la condition soit exécuté, il va falloir ici qu’une comparaison exactement soit évaluée à true.

De plus, on va tout à fait pouvoir utiliser plusieurs opérateurs logiques dans une même condition pour ajouter des règles et des comparaisons à celle-ci. Il faudra ici faire bien attention à la priorité des différents opérateurs pour obtenir le résultat voulu ou utiliser des parenthèses pour forcer la priorité de certains opérateurs par rapport à d’autres.
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
            $x = 4; //On affecte la valeur 4 à $x
            $y = -12; //On affecte la valeur -12 à $y
            $z = 1; //On affecte la valeur 1 à $z
            
            if($x >= 0 AND $x <= 5 AND $y <= 0){
                echo '$x contient une valeur entre 0 et 5 et $y contient une valeur
                négative <br>';
            }
            
            if($x >= 0 AND $y >= 0 XOR $z >= 0){
                echo '$x et $y contiennent tous les deux une valeur positive et $z
                une valeur stric. négative ou le contraire<br>';
            }
            
            if($x >= 0 AND ($y >= 0 XOR $z >= 0)){
                echo '$x contient une valeur positive et soit $y, soit $z contient
                une valeur positive mais pas les deux <br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-priorite-operateurs-logiques-condition-resultat.png)

Pour comprendre comment fonctionnent les conditions ci-dessus, il faut savoir que l’opérateur AND possède une priorité plus importante que XOR.

Notre première condition utilise deux opérateurs AND. Ici, c’est relativement simple : il va falloir que chacune des trois comparaisons soit évaluée à true pour que le code dans notre condition soit exécuté.

Notre deuxième condition utilise les opérateurs AND et XOR. L’opérateur AND a la priorité sur XOR et donc le test va être analysé comme suivant : on va d’abord tester si $x et $y contiennent toutes les deux une valeur positive puis on va tester si $z contient une valeur négative.

Si l’un de ces deux tests et seulement l’un d’entre eux renvoie true, alors le code de la condition est exécuté.

Dans notre troisième condition, on utilise cette fois-ci des parenthèses pour imposer la priorité des opérations. Ici, on va tester d’un côté si $x contient une valeur positive et renvoyer true si c’est le cas puis si $y ou $z possèdent une valeur positive et renvoyer true si c’est le cas pour seulement l’une des deux variables. Si nos deux tests renvoient true et true, le code dans la condition sera exécuté.

### Inverser la valeur logique d’une variable, d’une condition ou d’un test

L’opérateur logique inverse ! va nous permettre d’inverser la valeur logique d’une variable, d’une condition ou d’un test. Grosso modo, cela signifie qu’à chaque fois que le PHP va évaluer quelque chose à true à false, l’opérateur ! va inverser cette valeur (true va devenir false et inversement).

Cet opérateur va donc très simplement nous permettre d’exécuter le code de nos conditions lorsque le test de la condition a échoué (c’est-à-dire lorsque PHP renvoie false).
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
            $x = 4; //On affecte la valeur 4 à $x
            $y = -12; //On affecte la valeur -12 à $y
            
            if(!$x >= 0 AND !$y >= 0){
                echo 'Ce texte est toujours affiché !<br>';
            }
            
            if(!($x >= 0) AND !($y >= 0)){
                echo 'Ce texte s\'affiche uniquement si $x et $y contiennent
                toutes les deux une valeur stric. négative <br>';
            }
            
             if(!($x >= 0 AND $y >= 0)){
                echo 'Soit $x contient une valeur stric. négative, soit $y
                contient une valeur stric. négative, soit les deux variables
                contiennent une valeur stric. négative';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-operateur-logique-inverse-transtypage-resultat.png)

Pour comprendre les résultats ci-dessus, il convient à nouveau de bien connaitre les priorités des opérateurs.

Dans le cas présent, l’opérateur ! a une priorité plus importante que les autres opérateurs logiques et que les opérateurs de comparaison.

Le résultat de notre première condition est peut-être le moins évident à comprendre car de nombreux mécanismes entrent en jeu ici. Essayons d’expliquer ce qu’il se passe.

Dans notre première condition, nous plaçons l’opérateur ! devant nos deux variables $x et $y sans utiliser de parenthèses. Ici, il faut bien comprendre que PHP va commencer par évaluer !$x et !$y et renvoyer un booléen (true ou false).

L’opérateur logique ! inverse une valeur logique, c’est-à-dire transforme true en false et false en true.

Le PHP va donc déjà effectuer un transtypage et commencer par évaluer les valeurs de $x et $y en termes booléen pour ensuite pouvoir inverser la valeur obtenue.

Ici, vous devez savoir que lors d’une conversion en booléen, seules les valeurs suivantes sont évaluées à false :

- Le booléen false lui-même ;
- Le chiffre 0 ;
- La chaine de caractères vide et la chaine de caractères « 0 » ;
- Le type NULL ;
- Un tableau vide.

Toute autre valeur est évaluée à true.

La variable $x contient 4 tandis que $y contient -12. En termes booléen, les deux variables vont être évaluées à true et donc !$x et !$y vont renvoyer false.

Ensuite, on va comparer les valeurs obtenues à 0 avec l’opérateur >= pour nos deux variables. Ici, le PHP va effectuer un nouveau transtypage et convertir les valeurs booléennes obtenues en entier. La booléen false évalué comme entier est égal à 0 (true est égal à 1).

Or, 0 est bien supérieur ou égal à 0 et donc !$x >= 0 et !$y >= 0 sont évalués à true et donc notre test renvoie finalement true.

Dans ce premier cas, le test ne peut finalement jamais renvoyer false puisque quelles que soient les valeurs de $x et $y ces variables vont d’abord être évaluées en termes booléen et donc l’inverse (qui sera l’autre booléen) sera toujours soit true soit false qui, une fois trantypées en entiers, donneront 1 ou 0 qui est bien dans tous les cas supérieur ou égal à 0.

Ce premier exemple, je vous rassure, était complexe et particulièrement à votre niveau mais il permet de bien comprendre comment l’opérateur ! fonctionne et comment PHP évalue les variables selon les opérateurs.

Dans notre deuxième condition, on utilise cette fois-ci des parenthèses pour indiquer que les comparaisons $x >= 0 et $y >= 0 doivent être évaluées avant d’inverser la valeur logique obtenue.

Ici, $x >= 0 renvoie true puisque 4 est bien supérieur à 0 et $y >= 0 renvoie false puisque -12 est strictement inférieur à 0. Ces deux valeurs sont ensuite inversées et on obtient if(false AND true) qui est évalué à false.

Dans notre troisième et dernière condition, on inverse le résultat final des comparaisons. Ici, on a toujours $x >= 0 qui renvoie true et $y >= 0 qui renvoie false et donc $x >= 0 AND $y >= 0 qui renvoie false. On inverse ensuite la valeur logique et on obtient finalement true.

## Ecrire des conditions condensées avec les opérateurs ternaire et fusion null
Dans cette nouvelle leçon, nous allons étudier en détail deux opérateurs de comparaison qu’on a jusqu’à présent laissé volontairement de côté : l’opérateur ternaire ? : et l’opérateur fusion null ??.

Ces deux opérateurs vont nous permettre d’écrire des conditions plus condensées et donc d’alléger nos scripts et de gagner du temps en développement.

## L’opérateur ternaire et les structures conditionnelles ternaires

Les structures conditionnelles ternaires (souvent simplement abrégées “ternaires”) correspondent à une autre façon d’écrire nos conditions en utilisant une syntaxe basée sur l’opérateur ternaire ? : qui est un opérateur de comparaison.

Les ternaires vont utiliser une syntaxe très condensée et nous allons ainsi pouvoir écrire toute une condition sur une ligne et accélérer la vitesse d’exécution de notre code.

Avant de vous montrer les écritures ternaires, je dois vous prévenir : beaucoup de développeurs n’aiment pas les ternaires car elles ont la réputation d’être très peu lisibles et très peu compréhensibles.

Ce reproche est à moitié justifié : d’un côté, on peut vite ne pas comprendre une ternaire si on est un développeur moyen ou si le code qui nous est présenté n’est pas ou mal commenté. De l’autre côté, si vous indentez et commentez bien votre code, vous ne devriez pas avoir de problème à comprendre une structure ternaire.

Il reste cependant fortement recommandé de ne pas imbriquer les structures ternaires les unes dans les autres tout simplement car votre code deviendrait vite illisible et car le comportement de PHP lors de l’utilisation de plus d’un opérateur ternaire dans une seule instruction n’est pas évident.

Les structures ternaires vont se présenter sous la forme suivante : test ? code à exécuter si true : code à exécuter si false.

Illustrons immédiatement cela avec un exemple :
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
            $x = 4; //On affecte la valeur 4 à $x
            
            //Ecrire ceci :
            if($x >= 0){
                echo '$x stocke un nombre positif<br>';
            }else{
                echo '$x stocke un nombre négatif<br>';
            }
            
            //Est equivalent à cela :
            echo $x >= 0 ? '$x stocke un nb positif' : '$x stocke un nb négatif'; 
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-operateur-structure-ternaire-resultat.png)

Notez également qu’on va pouvoir abréger encore plus nos ternaires en omettant la partie centrale de l’opérateur ternaire, c’est-à-dire le code entre le point d’interrogation et les deux points.

En utilisant cette écriture, c’est la partie située avant l’opérateur qui sera renvoyée si le test est évalué à true et la partie après l’opérateur sinon.
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
            $x = 4; //On affecte la valeur 4 à $x
            
            //Ecrire ceci :
            if($x >= 0){
                echo ($x >= 0).'<br>';
            }else{
                echo '$x stocke un nombre négatif<br>';
            }
            
            //Est equivalent à cela :
            echo $x >= 0 ?: '$x stocke un nb négatif'; 
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-operateur-structure-ternaire-raccourcie-resultat.png)

Ici, il faut bien comprendre que PHP ne va pas renvoyer le contenu de $x mais le résultat de la comparaison $x >= 0, c’est-à-dire true, convertie sous forme d’entier (c’est-à-dire 1).

On est ici obligés d’utiliser un couple de parenthèses dans notre instruction if pour que le point soit bien considéré comme un opérateur de concaténation et pas comme appartenant à 0.

## L’opérateur fusion null

L’opérateur fusion null ?? ressemble dans sa syntaxe et dans son fonctionnement à l’opérateur ternaire.

Cet opérateur utilise la syntaxe suivante : test ?? code à renvoyer si le résultat du test est NULL.

Si l’expression à gauche de l’opérateur vaut NULL, alors l’expression à droite de l’opérateur sera renvoyée. Dans tous les autres cas, c’est l’expression à gauche de l’opérateur qui sera renvoyée.

On va généralement utiliser cet opérateur pour tester si une variable contient quelque chose ou pas et, dans le cas où la variable est vide, lui faire stocker une valeur.
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
            $x = 4; //On affecte la valeur 4 à $x
            $y = NULL;
            $z;
            
            $resultatx = $x ?? 'NULL';
            $resultaty = $y ?? 'NULL';
            $resultatz = $z ?? 'NULL';
            
            echo '$x contient ' .$resultatx. '<br>
                  $y contient ' .$resultaty. '<br>
                  $z contient ' .$resultatz;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-operateur-fusion-null-resultat.png)

Ici, on teste nos variables $x, $y et $z en utilisant l’opérateur fusion null. Si la variable est vide ou contient NULL, la valeur NULL sera renvoyée et stockée dans $resultatx, $resultaty ou $resultatz. Dans le cas contraire, c’est le contenu de la variable qui sera stocké.

On affiche ensuite le contenu de nos variables stockant les résultats suite à l’utilisation de l’opérateur fusion null en utilisant echo.

## L’instruction switch en PHP
L’instruction switch va nous permettre d’exécuter un code en fonction de la valeur d’une variable. On va pouvoir gérer autant de situations ou de « cas » que l’on souhaite.

En cela, l’instruction switch représente une alternative à l’utilisation d’un if…elseif…else mais qui est plus limitante puisque le switch ne va gérer que l’égalité comme type de comparaison.

En dehors de cela, on va pouvoir utiliser un switch ou une condition « classique » de manière équivalente en PHP. Il n’y a donc pas de réel intérêt à utiliser le switch plutôt qu’un if…elseif…else.

Cependant, dans certains cas, utiliser un switch peut rendre le code plus clair et légèrement plus rapide dans son exécution.

La syntaxe d’une instruction switch va être différente de celle des conditions vues jusqu’ici. Regardez plutôt l’exemple ci-dessous :
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
            $x = 2; 
            
            switch($x){
                case 0:
                    echo '$x stocke la valeur 0';
                    break;
                case 1:
                    echo '$x stocke la valeur 1';
                    break;
                case 2:
                    echo '$x stocke la valeur 2';
                    break;
                case 3:
                    echo '$x stocke la valeur 3';
                    break;
                case 4:
                    echo '$x stocke la valeur 4';
                    break;
                default:
                    echo '$x ne stocke pas de valeur entre 0 et 4';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-structure-controle-switch-resultat.png)

La première chose à noter ici est qu’on doit fournir une variable sur laquelle on va « switcher ».

Ensuite, l’instruction switch va s’articuler autour de case qui sont des cas. Si la valeur de notre variable est égale à celle du case, alors on exécute le code qui est à l’intérieur.

Par exemple, le code contenu dans case 0: va être exécuté si la valeur contenue dans notre variable est 0, le code contenu dans case 1: va être exécuté si la valeur contenue dans notre variable est 1, etc.

Chaque case d’un switch doit se terminer par une instruction break. Cette instruction indique au PHP qu’il doit sortir du switch.

Sans break, le PHP continuerait à tester les différents autres case du switch même si un case égal à la valeur de la variable a été trouvé, ce qui ralentirait inutilement le code et pourrait produire des comportements non voulus.

Enfin, à la fin de chaque switch, il convient d’indiquer une instruction default. Le default est l’équivalent du else des conditions vues précédemment : il sert à gérer tous les autres cas et son code ne sera exécuté que si aucun case ne correspond à la valeur de la variable.

Pas la peine d’utiliser une instruction break au sein de default puisque default sera toujours placée en fin de switch. Si le PHP arrive jusqu’au default, alors il sortira ensuite naturellement du switch puisque celui-ci ne contient plus aucun code après default.

Encore une fois, le switch ne présente pas en PHP de réel intérêt par rapport à l’utilisation d’une condition classique en dehors du fait qu’utiliser un switch peut dans certains cas réduire le temps d’exécution d’un script et que cette structure est parfois plus claire qu’un if…elseif…else contenant des dizaines de elseif.

Pour le moment, je vous conseille tout de même de vous entrainer avec tous les outils que je vous présente. Vous pourrez par la suite décider de ne pas utiliser ceci ou cela, mais pour le moment il est essentiel que vous ayez une vue d’ensemble des fonctionnalités de base proposées par PHP.

### Exo 2

### 2a

- Déclarer une variable $sexe qui contient une chaîne de caractères. Créer une condition qui affiche un message différent en fonction de la valeur de la variable.
- Déclarer une variable $budget qui contient la somme de 1 553,89 €. Déclarer une variable $achats qui contient la somme de 1 554,76 €. Afficher si le budget permet de payer les achats.
- Déclarer une variable $age qui contient la valeur de type integer de votre choix. Réaliser une condition pour afficher si la personne est mineure ou majeure.
- Déclarer une variable $heure qui contient la valeur de type integer de votre choix comprise entre 0 et 24. Créer une condition qui affiche un message si l'heure est le matin, l'après-midi ou la nuit.

### 2b

Créer une variable **age** et l'initialiser avec une valeur.  
Si l'âge est supérieur ou égale à 18, afficher **Vous êtes majeur**. Dans le cas contraire, afficher **Vous êtes mineur**.

## 2c

Créer une variable **isEasy** de type booléan et l'initialiser avec une valeur.  
Afficher **C'est facile!!** si c'est vrai. Dans le cas contraire afficher **C'est difficile !!!**.  
**Bonus :** L'écrire de deux manières différentes.

## 2d

Créer deux variables **age** et **gender**. La variable **gender** peut prendre comme valeur :

- Homme
- Femme  

En fonction de l'âge et du genre afficher la phrase correspondante :

- **Vous êtes un homme et vous êtes majeur**
- **Vous êtes un homme et vous êtes mineur**
- **Vous êtes une femme et vous êtes majeur**
- **Vous êtes une femme et vous êtes mineur**  

Gérer tous les cas.

## 2e

L'échelle de Richter est un outil de mesure qui permet de définir la magnitude de moment d'un tremblement de terre. Cette échelle va de 1 à 9.  
Créer une variable **magnitude**. Selon la valeur de **magnitude**, afficher la phrase correspondante.  

Magnitude   |   Phrase
------      |    ---
1           |   Micro-séisme impossible à ressentir.
2           |   Micro-séisme impossible à ressentir mais enregistrable par les sismomètres.
3           |   Ne cause pas de dégats mais commence à pouvoir être légèrement ressenti.
4           |   Séisme capable de faire bouger des objets mais ne causant généralement pas de dégats.
5           |   Séisme capable d'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.
6           |   Fort séisme capable d'engendrer des destructions majeures sur une large distance (180 km) autour de l'épicentre.  
7           |   Séisme capable de destructions majeures à modérées sur une très large zone en fonction de la distance.
8           |   Séisme capable de destructions majeures sur une très large zone de plusieurs centaines de kilomètres.
9           |   Séisme capable de tout détruire sur une très vaste zone.  

Gérer tous les cas.  
*Utilser autre chose que des if else*

## 2f

Traduire ce code avec des if et des else :  

    <?php
      echo ($gender != 'Homme') ? 'C\'est une développeuse !!!' : 'C\'est un développeur !!!';
    ?>

## 2g

Traduire ce code avec des if et des else :  

    <?php
      echo ($age >= 18) ? 'Tu es majeur' : 'Tu n\'es pas majeur';
    ?>

## 2h

Traduire ce code avec des if et des else :  

    <?php
      echo ($isOk == false) ? 'c\'est pas bon !!!' : 'c\'est ok !!';
    ?>

## 2i

Traduire ce code avec des if et des else :  

    <?php
      echo ($isOk) ? 'c'est ok !!' : 'c'est pas bon !!!';
    ?>
