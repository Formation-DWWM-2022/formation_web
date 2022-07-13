## Les boucles [34 min] -> Q/R

<https://grafikart.fr/tutoriels/boucles-php-1118#autoplay>

Les boucles, tout comme les conditions, représentent l’une des fondations du PHP et il est donc essentiel de comprendre comment elles fonctionnent et de savoir les utiliser.

## Présentation des boucles

Les boucles vont nous permettre d’exécuter plusieurs fois un bloc de code, c’est-à-dire d’exécuter un code « en boucle » tant qu’une condition donnée est vérifiée.

Lorsqu’on code, on va en effet souvent devoir exécuter plusieurs fois un même code. Utiliser une boucle nous permet de n’écrire le code qu’on doit exécuter plusieurs fois qu’une seule fois.

Nous allons ainsi pouvoir utiliser les boucles pour parcourir et afficher plusieurs valeurs un une seule instruction, comme par exemple récupérer la liste des produits achetés dans une commande, afficher le prénom de tous les utilisateurs de notre site, récupérer des valeurs jusqu’à un certain point donné dans une variable tableau, etc.

Nous disposons de quatre boucles différentes en PHP :

- La boucle while (« tant que ») ;
- La boucle do… while (« faire… tant que ») ;
- La boucle for (« pour ») ;
- La boucle foreach (« pour chaque ») ;

Le fonctionnement général des boucles sera toujours le même : on pose une condition qui sera généralement liée à la valeur d’une variable et on exécute le code de la boucle « en boucle » tant que la condition est vérifiée.

Pour éviter de rester bloqué à l’infini dans une boucle, vous pouvez donc déjà noter qu’il faudra que la condition donnée soit fausse à un moment donné (pour pouvoir sortir de la boucle).

Pour que notre condition devienne fausse à un moment, on incrémentera ou on décrémentera la valeur de notre variable à chaque nouveau passage dans la boucle. Voyons immédiatement ce que tout cela signifie.

## Les opérateurs d’incrémentation et de décrémentation

Incrémenter une valeur signifie ajouter 1 à cette valeur tandis que décrémenter signifie enlever 1.

Les opérations d’incrémentation et de décrémentation vont principalement être utilisées avec les boucles en PHP. Elles vont pouvoir être réalisées grâce aux opérateurs d’incrémentation ++ et de décrémentation --.

Retenez déjà qu’il y a deux façons d’incrémenter ou de décrémenter une variable : on peut soit incrémenter / décrémenter la valeur de la variable puis retourner la valeur de la variable incrémentée ou décrémentée (on parle alors de pré-incrémentation et de pré-décrémentation), soit retourner la valeur de la variable avant incrémentation ou décrémentation puis ensuite l’incrémenter ou la décrémenter (on parle alors de post-incrémentation et de post-décrémentation).

Cette différence d’ordre de traitement des opérations va influer sur le résultat de nombreux codes et notamment lorsqu’on voudra en même temps incrémenter ou décrémenter la valeur d’une variable et l’afficher avec une instruction echo ou la manipuler d’une quelconque façon. Tenez-en donc bien compte à chaque fois que vous utilisez les opérateurs d’incrémentation ou de décrémentation.

Le tableau ci-dessous présente les différentes façons d’utiliser les opérateurs d’incrémentation et de décrémentation ainsi que le résultat associé :
| Exemple | Résultat
| --- | ---
| ++$x | Pré-incrémentation : incrémente la valeur contenue dans la variable $x, puis retourne la valeur incrémentée
| $x++ | Post-incrémentation : retourne la valeur contenue dans $x avant incrémentation, puis incrémente la valeur de $x
| --$x | Pré-décrémentation : décrémente la valeur contenue dans la variable $x, puis retourne la valeur décrémentée
| $x-- | Post-décrémentation : retourne la valeur contenue dans $x avant décrémentation, puis décrémente la valeur de $x

Prenons immédiatement un exemple concret pour illustrer les différences entre pré et post incrémentation ou décrémentation.
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
            $x = 2; $y = 2; $a = 2; $b = 2;
            
            echo 'Post incrémentation pour $x : ' .$x++. '<br>';
            echo '$x contient maintenant : ' .$x. '<br>';
            
            echo 'Pré incrémentation pour $y : ' .++$y. '<br>';
            echo '$y contient maintenant : ' .$y. '<br>';
            
            echo 'Post décrémentation pour $a : ' .$a--. '<br>';
            echo '$a contient maintenant : ' .$a. '<br>';
            
            echo 'Pré décrémentation pour $b : ' .--$b. '<br>';
            echo '$b contient maintenant : ' .$b. '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-operateurs-incrementation-decrementation-resultat.png)

Cet exemple montre les priorités de traitement du PHP selon que l’on place les signes ++ et -- avant ou après le nom de notre variable.

Dans le premier cas, on place l’opérateur d’incrémentation ++ après notre variable et on incrémente au sein d’un echo. On utilise ici la post-incrémentation : la valeur originale de $x va être affiché puis cette valeur va ensuite être incrémentée.

On voit que si on echo à nouveau la valeur dans $x ensuite, la valeur est bien incrémentée.

Dans le second cas, en revanche, on place l’opérateur ++ avant le nom de notre variable $y ce qui signifie qu’on va ici la pré-incrémenter. Ici, l’incrémentation va se faire avant toute autre opérateur et c’est donc la valeur après incrémentation qui va être affichée.

On réitère ensuite exactement les mêmes opérations mais en utilisant cette fois-ci des opérateurs de décrémentation avec nos variables â et $b.

## La boucle PHP while

La boucle while (« tant que » en français) est la boucle PHP la plus simple à appréhender.

La boucle while va nous permettre d’exécuter un certain bloc de code « tant qu’une » condition donnée est vérifiée.

Voyons immédiatement la syntaxe de cette boucle que je vais détailler par la suite :
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
            
            while($x <= 10){
                echo '$x contient la valeur ' .$x. '<br>';
                $x++;
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-boucle-while-resultat.png)

Dans l’exemple ci-dessus, on commence par stocker la valeur 0 dans notre variable $x. On dit également qu’on « initialise » notre variable.

Ensuite, on crée notre boucle while, qui va réutiliser $x puisque nous allons boucler sur les valeurs successives stockées dans $x jusqu’à ce que $x stocke une certaine valeur.

Que se passe-t-il exactement dans cette boucle ? Dans le cas présent, on demande à notre boucle d’afficher la phrase $x contient la valeur : suivie de la valeur de $x tant que la valeur stockée dans $x ne dépasse pas 10.

A la fin de chaque passage dans la boucle, on ajoute 1 à la valeur précédente contenue dans $x grâce à l’opérateur d’incrémentation ++. Cette étape d’incrémentation est indispensable. Sans celle-ci, $x contiendrait toujours la valeur 0 (sa valeur de départ) et on ne pourrait jamais sortir de la boucle.

Comment le PHP procède-t-il exactement avec une boucle while ? Ici, le PHP va commencer par vérifier la valeur de $x pour s’assurer que la condition est vérifiée. Si c’est le cas, alors il exécutera une première fois le code dans notre boucle avant de se replacer au départ de notre boucle pour évaluer à nouveau notre condition.

Au début de la boucle, $x contient 0. La condition est donc vérifiée puisque 0 est bien inférieur à 10. PHP exécuté donc le code à l’intérieur de la boucle, c’est-à-dire afficher la phrase $x contient la valeur 0 et ajouter 1 à la valeur de $x.

Le PHP se replace ensuite au début de notre boucle et réévalue notre condition. Lors de ce deuxième passage dans la boucle, notre variable $x contient désormais la valeur 1 (0 + 1). Comme 1 est toujours inférieur à 10, la condition de notre boucle est toujours vérifiée. Le PHP va donc à nouveau exécuter le code dans la boucle et se replacer au début de la boucle pour évaluer une troisième fois notre condition.

Lors de ce deuxième passage, c’est la phrase $x contient la valeur 1 qui est affichée puisque $x contient désormais 1. A la fin de la boucle, on incrémente également à nouveau $x. $x contient donc désormais la valeur 2 (1 + 1).

Le PHP va continuer à effectuer des passages dans la boucle jusqu’à ce que la valeur contenue dans $x soit strictement supérieure à 10, c’est-à-dire jusqu’à ce que la condition ne soit plus vérifiée. Dès que ce sera le cas, nous sortirons alors de la boucle.

Notez qu’il faut toujours bien penser à initialiser la variable utilisée dans la boucle en dehors de la boucle. En effet, ici, si j’avais initialisé $x dans ma boucle, sa valeur aurait été réinitialisée à chaque nouveau passage de boucle !

Pensez bien également une nouvelle fois qu’il faudra toujours s’arranger pour qu’à un moment ou un autre la condition de la boucle ne soit plus vérifiée, afin de pouvoir en sortir. Dans le cas contraire, le PHP ne pourra jamais sortir de la boucle et le code de celle-ci sera exécuté en boucle jusqu’à ce que le temps d’exécution du script dépasse le temps maximum autorisé par votre serveur et qu’une erreur soit renvoyée.

Évidemment, vous n’êtes pas obligés d’incrémenter la valeur de votre variable. Vous pouvez tout aussi bien décrémenter, multiplier par 2, etc. Le tout est qu’à un certain moment donné la condition ne soit plus vérifiée pour pouvoir sortir de la boucle.

## La boucle PHP do…while

La boucle PHP do… while (« faire… tant que » en français) ressemble à priori à la boucle while mais va fonctionner « en sens inverse » par rapport à while.

En effet, la boucle PHP do… while va également nous permettre d’exécuter un code tant qu’une condition donnée est vraie, mais cette fois-ci le code dans la condition sera exécuté avant que la condition soit vérifiée.

Ainsi, même si une condition est fausse dès le départ, on effectuera toujours au moins un passage au sein d’une boucle do…while, ce qui n’est pas le cas avec une boucle while.
``php
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
            $y = 20;
            
            do{
                echo '$x contient la valeur ' .$x. '<br>';
                $x++;
            }while($x <= 5);
            
            do{
                echo '$y contient la valeur ' .$y. '<br>';
                $y++;
            }while($y <= 5);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-boucle-do-while-resultat.png)

Faites bien attention : le while est bien en dehors des accolades.

Dans l’exemple ci-dessus, nous avons créé deux boucles do…while afin de bien illustrer ce que j’ai dit précédemment.

Dans la première boucle, $x contient la valeur 0 au départ. La phrase est affichée et la valeur de $x est incrémentée puis la comparaison est évaluée.

La deuxième boucle est strictement la même que la première à part qu’on utilise cette fois-ci une variable $y.

Notre variable $y contient la valeur 20 au départ et ainsi la condition de la boucle est fausse dès le départ. Cependant, dans le cadre d’une boucle do…while, la condition n’est vérifiée qu’en fin de boucle, c’est-à-dire après le passage dans la boucle.

Ainsi, même si la condition est fausse dès le départ, on effectue tout de même un premier passage dans la boucle (et on exécute donc le code à l’intérieur).

## La boucle PHP for

La boucle PHP for (« pour » en français) est plus complexe à appréhender à priori que les boucles précédentes.

Cependant, cette boucle est très puissante et c’est celle qui sera majoritairement utilisée dans nos scripts PHP, faites donc l’effort de comprendre comment elle fonctionne.

Nous pouvons décomposer le fonctionnement d’une boucle for selon trois phases :

- Une phase d’initialisation ;
- Une phase de test ;
- Une phase d’incrémentation.

Dans la phase d’initialisation, nous allons tout simplement initialiser la variable que nous allons utiliser dans la boucle.

Dans la phase de test, nous allons préciser la condition qui doit être vérifiée pour rester dans la boucle.

Dans la phase d’incrémentation, nous allons pouvoir incrémenter ou décrémenter notre variable afin que notre condition soit fausse à un moment donné.

Voyons immédiatement comment cette boucle va fonctionner en prenant un exemple concret :
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
            for($x = 0; $x <= 5; $x++){    
                echo '$x contient la valeur ' .$x. '<br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-boucle-for-resultat.png)

Comme vous pouvez le voir, on initialise cette fois-ci directement notre variable à l’intérieur de notre boucle. Vous pouvez également noter que chaque phase doit être séparée par un point-virgule.

Le fonctionnement général de la boucle for est ensuite similaire à celui des autres boucles. Dans l’exemple ci-dessus, on décrémente cette fois notre variable à chaque nouveau passage dans la boucle pour changer des exemples précédents.

## La boucle PHP foreach

La boucle PHP foreach est un peu particulière puisqu’elle a été créée pour fonctionner avec des variables tableaux, qui sont des variables spéciales que nous n’avons pas encore étudiées.

Nous étudierons donc le fonctionnement de cette boucle en même temps que le type de valeur PHP array (« tableau » en français).

## Déterminer la boucle à utiliser selon la situation

A ce stade, vous pourriez vous demander quand utiliser une boucle PHP plutôt qu’un autre. Il va être très simple de déterminer quelle boucle PHP utiliser dans chaque situation.

Tout d’abord, si vous travaillez avec des tableaux, vous utiliserez une boucle PHP for ou foreach selon le type de tableau sur lequel vous travaillez. Nous aurons le temps de détailler cela lorsqu’on étudiera les tableaux.

Ensuite, dans les autres cas, on choisira d’utiliser une boucle for lorsqu’on sait à priori combien de passages nous allons effectuer dans notre boucle. En effet, la boucle for permet de définir la valeur de base d’une variable ainsi que la condition de sortie de la boucle. C’est donc une convention d’utiliser une boucle for lorsqu’on sait combien de passage on va effectuer dans une boucle.

Si vous ne savez pas à priori combien de passages vous allez effectuer dans votre boucle, mais que votre code a besoin d’effectuer toujours au moins un passage dans la boucle, vous utiliserez une boucle PHP do…while.

Finalement, si vous ne savez pas combien de passages vous allez effectuer dans votre boucle et que vous ne souhaitez entrer dans la boucle que si la condition est vraie à un moment donné, vous utiliserez une boucle PHP while.

### Exo 3

- En utilisant la boucle while, afficher tous les codes postaux possibles pour le département 77.
- En utilisant la boucle for, afficher la table de multiplication du chiffre 5.
- En utilisant deux boucles for, écrire un script qui produit le résultat ci-dessous.

      1
      22
      333
      4444
      55555

- Déclarer une variable avec le nom de votre choix et avec la valeur 0. Tant que cette variable n'atteint pas 20, il faut :
  - l'afficher ;
  - incrémenter sa valeur de 2 ;
  - Si la valeur de la variable est égale à 10, la mettre en valeur avec la balise HTML appropriée.

### Exo 4

- Écrire une boucle qui produit une ligne horizontale de 8 étoiles.
- Imbriquer ce code dans une nouvelle boucle pour produire un carré de 8 lignes horizontales, chacune contenant 8 étoiles.
- Produire des triangles rectangles avec différentes orientations.

      *
      **
      ***
      ****
      *****
      ******
      *******
      ********
      *********
      **********

- Envisager les mêmes figures mais creuses et non plus pleines.
