## Les tableaux [14 min] -> Q/R

<https://grafikart.fr/tutoriels/tableaux-php-1116#autoplay>

Dans cette nouvelle partie, nous allons étudier les variables tableau (type array en anglais).

Les tableaux vont nous servir à stocker plusieurs valeurs en même temps et vont donc se révéler très utiles pour stocker les résultats successifs d’une boucle par exemple ou n’importe quelle liste de valeurs pour laquelle il serait long de créer une variable pour chaque valeur.

## Présentation des tableaux en PHP

Les tableaux en PHP sont des variables spéciales qui peuvent stocker plusieurs valeurs en même temps.

Dans un tableau, chaque valeur va être associée à une clef unique. Cette clef va nous permettre notamment de récupérer la valeur associée. Nous allons pouvoir définir les différentes clefs ou laisser le PHP générer automatiquement les clefs pour les différentes valeurs d’un tableau.

On va pouvoir créer trois types de tableaux différents en PHP :

- Des tableaux numérotés ou indexés (les clefs vont être des nombres) ;
- Des tableaux associatifs (nous allons définir la valeur que l’on souhaite pour chaque clef) ;
- Des tableaux multidimensionnels (tableaux qui stockent d’autres tableaux en valeur).

Nous allons bien évidemment étudier chacun de ces trois types de tableaux dans la suite de ce cours et présenter leurs spécificités.

Pour créer un tableau, on peut soit utiliser la structure de langage array(), soit le nouvelle syntaxe plus courte [].

On va pouvoir passer autant d’argument qu’on souhaite stocker de valeurs dans notre tableau à array() ou dans []. Les arguments vont pouvoir être soit des valeurs simples (auquel cas les clefs seront des entiers générés automatiquement), soit des paires clef => valeur.

## Création d’un tableau numéroté ou indexé en PHP

Les tableaux numérotés sont le type de tableaux le plus simple à créer en PHP puisque les clefs vont être générées automatiquement par le PHP.

Pour créer un tableau numéroté en PHP, il suffit en fait d’indiquer une série de valeurs et le PHP associera automatiquement une clef unique à chaque valeur, en commençant avec la clef 0 pour la première valeur, la clef 1 pour la deuxième valeur, la clef 2 pour la troisième valeur, etc.

Regardez plutôt le code ci-dessous. On crée ici deux tableaux numérotés $prenoms et $ages en utilisant les deux syntaxes vues précédemment.
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
            $prenoms = array('Mathilde', 'Pierre', 'Amandine', 'Florian');
            $ages = [27, 29, 21, 29];
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

Ici, on crée deux variables tableau $prenoms et $ages. Notez bien qu’on va toujours stocker nos tableaux dans des variables. Notre premier tableau stocke 4 valeurs qui sont ici des chaines de caractères. Notre deuxième tableau stocke 4 chiffres.

On peut tout à fait créer des tableaux qui vont stocker des chaines de caractères, des nombres, des booléens, etc. Comme d’habitude, seules les chaines de caractères doivent être entourées d’apostrophes ou de guillemets droits.

Ici, le PHP va automatiquement créer les clefs qu’on appelle également indices ou index et les associer aux différentes valeurs. La valeur Mathilde de notre premier tableau va avoir la clef 0, la valeur Pierre la clef 1, etc. De même, la clef 0 va être associée à la valeur 27 de notre deuxième tableau, la deuxième valeur (le premier 29) va être associée à la clef 1 et etc.

On va également pouvoir créer un tableau indice par indice et valeur par valeur en précisant ici les indices à associer à chaque valeur. Dans ce cas-là, il faudra utiliser la syntaxe suivante :
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
            $prenoms[0] = 'Mathilde';
            $prenoms[1] = 'Pierre';
            $prenoms[2] = 'Amandine';
            $prenoms[3] = 'Florian';
            
            $ages[0] = 27;
            $ages[1] = 29;
            $ages[2] = 21;
            $ages[3] = 29;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
# Afficher les valeurs d’un tableau numéroté

Pour afficher les valeurs d’un tableau numéroté une à une, il suffit d’echo notre variable tableau en précisant l’indice (entre crochets) correspondant à la valeur que l’on souhaite afficher.
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
            $prenoms = ['Mathilde', 'Pierre', 'Amandine', 'Florian'];
            
            echo $prenoms[0]. '<br>';
            echo $prenoms[2];
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-affichage-valeur-tableau-numerote-resultat.png)

Pour afficher toutes les valeurs d’un tableau numéroté d’un coup, nous allons cette fois-ci devoir utiliser une boucle for.

Nous allons boucler sur les indices de notre tableau et nous allons récupérer la valeur associée à l’indice en question à chaque nouveau passage dans la boucle.

Il va donc avant tout falloir déterminer la taille de notre tableau, c’est à dire le nombre de valeurs contenues dans notre tableau. Bien évidemment, nous travaillons pour le moment avec des tableaux qu’on crée manuellement et on peut donc ici compter le nombre de valeurs à la main mais notez bien ici qu’en pratique on ne saura pas forcément à priori combien de valeurs sont stockées dans un tableau.

La façon la plus simple de déterminer la taille d’un tableau est d’utiliser la fonction count() qui va tout simplement prendre un tableau en argument et va retourner le nombre d’éléments de ce tableau.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-calcul-nombre-elements-tableau-count.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-calcul-nombre-elements-tableau-count-resultat.png)

Une fois qu’on a déterminé la taille de notre tableau, il va être très simple de créer notre boucle for.
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
            $prenoms = ['Mathilde', 'Pierre', 'Amandine', 'Florian'];
            
            //On récupère la taille du tableau et on la stocke dans $taille
            $taille = count($prenoms);
            
            //On peut soit parcourir le tableau et afficher les valeurs une à une
            for($i = 0; $i < $taille; $i++){
                echo $prenoms[$i]. ', ';
            }
            
            echo '<br><br>';
            
            //...soit les stocker dans une autre variable et echo cette variable
            for($i = 0; $i < $taille; $i++){
                $p .= $prenoms[$i]. ', ';
            }
            echo $p;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-parcourir-tableau-numerote-for-resultat.png)

Ici, on utilise la fonction count() pour déterminer le nombre de valeurs dans notre tableau puis on boucle sur les indices en partant de l’indice 0. Lors du premier passage dans la boucle, on va donc récupérer la valeur associée à l’indice 0 du tableau ; lors du deuxième passage, nous allons récupérer la valeur associée à l’indice 1 et etc.

Notre première boucle for va echo la valeur associée à la clef à chaque passage de boucle tandis que notre deuxième boucle for va stocker les valeurs liées à chaque clef dans la variable $p grâce à l’opérateur d’affectation +=.

Cette technique va très bien fonctionner tant que nos tableaux numérotés vont avoir des indices « naturels ». En effet, il est tout à fait possible d’attribuer les indices manuellement et de sauter certains indices pour stocker nos valeurs dans nos variables tableaux.

Dans ce cas-là, on ne pourra pas récupérer toutes les valeurs en bouclant sur les indices comme ci-dessus mais on utilisera plutôt une boucle foreach qui est une boucle spécialement créée pour les tableaux.

Nous allons utiliser cette syntaxe :
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
            $prenoms = ['Mathilde', 'Pierre', 'Amandine', 'Florian'];
            
            //On rajoute une valeur à $prenoms et on lui associe la clef 8
            $prenoms[8] = 'Lisa';  
            
            $taille = count($prenoms);
            
            /*On tente d'afficher les valeurs de notre tableau en utilisant le
             *résultat de count() et en bouclant sur les indices*/
            for($i = 0; $i < $taille; $i++){
                $p .= $prenoms[$i]. ', ';
            }
            echo $p. '<br><br>';
            
            //On utilise une boucle foreach ($tableau as $valeurs)
            foreach ($prenoms as $valeurs){
                $resultat .= $valeurs. ', ';
            }
            echo $resultat;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-parcourir-tableau-numerote-foreach-resultat.png)

Ici, boucler sur les indices avec une boucle for ne permet pas de renvoyer toutes les valeurs du tableau tout simplement car notre boucle va s’arrêter avant d’atteindre l’indice 8. En effet, count() sert à compter le nombre d’éléments d’un tableau. Ici, notre fonction renvoie donc 5. On va donc ensuite boucler sur les indices de 0 à 4, ce qui ne nous apporte pas le résultat attendu.

La boucle foreach, au contraire, va nous permettre de parcourir des tableaux élément par élément. A chaque nouveau passage dans la boucle, la valeur d’un élément du tableau va être placée dans la variable qu’on a ici appelé $valeurs et la boucle va aller chercher la valeur suivante jusqu’à arriver à la fin du tableau.

## Les tableaux associatifs en PHP
Nous allons voir ce que sont les tableaux associatifs et leurs différences avec les tableaux numérotés. Nous allons également apprendre à créer des tableaux associatifs et à les parcourir et à afficher leurs valeurs.

## Présentation des tableaux associatifs en PHP

Un tableau associatif est un tableau qui va utiliser des clefs textuelles qu’on va associer à chaque valeur.

Les tableaux associatifs vont s’avérer intéressant lorsqu’on voudra donner du sens à nos clefs, c’est-à-dire créer une association forte entre les clefs et les valeurs d’un tableau.

Imaginons par exemple qu’on souhaite stocker les âges de nos différents utilisateurs dans un tableau. Ici, plutôt que d’utiliser un tableau numéroté dans lequel il serait difficile de dire à qui appartient chaque âge, il serait judicieux d’utiliser un tableau associatif en utilisant par exemple les pseudonymes de nos membres comme clefs.

## Créer un tableau associatif en PHP

Les tableaux associatifs vont être différents des tableaux numérotés au sens où nous allons devoir définir chacune des clefs : le PHP ne va pas ici pouvoir nommer automatiquement nos clefs.

Tout comme pour les tableaux numérotés, on va pouvoir créer notre tableau en une fois en utilisant la structure de langage array() ou la syntaxe [] ou le construire clef par clef et valeur par valeur.
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
            $ages = ['Mathilde' => 27, 'Pierre' => 29, 'Amandine' => 21];
            
            $mails['Mathilde'] = 'math@gmail.com';
            $mails['Pierre'] = 'pierre.giraud@edhec.com';
            $mails['Amandine'] = 'amandine@lp.fr';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
 
On crée notre premier tableau $ages d’un seul coup en utilisant la syntaxe []. Ici, « Mathilde », « Pierre » et « Amandine » sont les clefs ou indices du tableau et 27, 29 et 21 sont les valeurs associées. Notez bien l’utilisation du signe => qui sert à associer une clef à une valeur.

## Récupérer et afficher les valeurs d’un tableau associatif

On va pouvoir afficher une valeur en particulier d’un tableau associatif très simplement de la même façon que pour les tableaux numérotés :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-affichage-valeur-tableau-associatif.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-affichage-valeur-tableau-associatif-resultat.png)

Pour parcourir un tableau associatif et par exemple afficher les valeurs les unes après les autres, nous allons en revanche être obligés d’utiliser une boucle foreach qui est une boucle créée spécialement pour les tableaux.

Ici, nous allons utiliser la boucle foreach de la manière suivante :
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
            $ages = ['Mathilde' => 27, 'Pierre' => 29, 'Amandine' => 21];
            
            /*Identique à
             *$ages = array('Mathilde' => 27, 'Pierre' => 29, 'Amandine' => 21);
             */
            
            $mails['Mathilde'] = 'math@gmail.com';
            $mails['Pierre'] = 'pierre.giraud@edhec.com';
            $mails['Amandine'] = 'amandine@lp.fr';
            
            foreach($ages as $clef => $valeur){
                echo $clef. ' a ' .$valeur. ' ans<br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-parcourir-valeur-tableau-associatif-foreach-resultat.png)

Ici, nous utilisons une syntaxe de type foreach($tableau as $clef => $valeur). Cette syntaxe nous permet de récupérer à la fois les valeurs du tableau qui vont être stockées dans la variable qu’on a ici appelée $valeur ainsi que les clefs associées à chaque valeur.

Lors du premier passage dans la boucle, la première paire clef => valeur du tableau va être récupérée et affichée grâce à echo puis foreach va nous permettre de passer à la paire suivante clef => valeur du tableau qu’on va afficher lors du deuxième passage dans la boucle et etc. jusqu’à la fin de notre tableau.

## Les tableaux multidimensionnels en PHP

Nous allons étudier un nouveau type de tableaux PHP : les tableaux multidimensionnels.

## Définition des tableaux multidimensionnels en PHP

Un tableau multidimensionnel est un tableau qui va lui-même contenir d’autres tableaux en valeurs.

On appelle ainsi tableau à deux dimensions un tableau qui contient un ou plusieurs tableaux en valeurs, tableau à trois dimensions un tableau qui contient un ou plusieurs tableaux en valeurs qui contiennent eux-mêmes d’autres tableaux en valeurs et etc.

Les « sous » tableaux vont pouvoir être des tableaux numérotés ou des tableaux associatifs ou un mélange des deux.

Nous ne sommes pas limités dans le nombre de dimensions d’un tableau : le PHP sait tout à fait travailler avec des tableaux à 2, 3, 4, 5… dimensions. Cependant, il est généralement déconseillé de créer trop de dimensions de tableaux tout simplement car cela rend le code très vite très peu lisible et très peu compréhensible pour nous autres développeurs.

Vous pouvez déjà noter que le nombre de dimensions d’un tableau va indiquer le nombre d’indices nécessaires pour accéder à une valeur du tableau (nous allons illustrer cela par la suite).

## Créer un tableau multidimensionnel en PHP

Un tableau multidimensionnel est un tableau dont les valeurs peuvent elles-mêmes être des tableaux qui vont à nouveau pouvoir contenir d’autres tableaux et etc.

Commençons déjà par créer des tableaux à deux dimensions. Vous pourrez ensuite créer des tableaux à 3, 4, 5… dimensions en suivant le même modèle.
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
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux numérotés*/
            $suite = [
                [1, 2, 4, 8, 16],
                [1, 3, 9, 27, 81]
            ];
            
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux associatifs et une valeur simple*/
            $utilisateurs = [
                ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
                ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
                ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr'],
                'Florian'
            ];
            
            /*Tableau multidimensionnel associatif stockant
             *des tableaux associatifs*/
            $produits = [
                'Livre' => ['poids' => 200, 'quantite' => 10, 'prix' => 15],
                'Stickers' => ['poids' => 10, 'quantite' => 100, 'prix' => 1.5]
            ]
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

Ici, on a créé trois tableaux $suite, $utilisateurs et $produits à deux dimensions.

Notre premier tableau, $suite, est un tableau multidimensionnel numéroté qui contient deux valeurs qui vont elles-mêmes être des tableaux numérotés : les valeurs [1, 2, 4, 8, 16] et [1, 3, 9, 27, 81].

Notre deuxième tableau est à nouveau un tableau multidimensionnel numéroté qui contient cette fois-ci 4 valeurs : trois tableaux associatifs et la valeur « florian ». En effet, chaque valeur d’un tableau multidimensionnel ne doit pas forcément être elle-même un tableau : il suffit au contraire qu’une valeur d’un tableau soit elle-même un tableau pour que le tableau de départ soit multidimensionnel.

Finalement, notre dernier tableau est un tableau multidimensionnel associatif qui stocke deux valeurs qui sont elles-mêmes des tableaux associatifs. Ici, les clefs de notre tableau multidimensionnel sont Livre et Stickers et les valeurs associées sont les tableaux ['poids' => 200, 'quantite' => 10, 'prix' => 15] et ['poids' => 10, 'quantite' => 100, 'prix' => 1.5].

## Récupérer ou afficher une valeur en particulier d’un tableau multidimensionnel

Pour récupérer une valeur en particulier dans un tableau numéroté ou associatif à une dimension, il suffisait simplement d’indiquer la clef associée à la valeur en question.

Dans le cas d’un tableau multidimensionnel qui ne contient que des tableaux en valeur, nous allons donc accéder aux différents sous tableaux si on ne précise qu’une seule clef.

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
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux numérotés*/
            $suite = [
                [1, 2, 4, 8, 16],
                [1, 3, 9, 27, 81]
            ];
            
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux associatifs et une valeur simple*/
            $utilisateurs = [
                ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
                ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
                ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr'],
                'Florian'
            ];
            
            /*Tableau multidimensionnel associatif stockant
             *des tableaux associatifs*/
            $produits = [
                'Livre' => ['poids' => 200, 'quantite' => 10, 'prix' => 15],
                'Stickers' => ['poids' => 10, 'quantite' => 100, 'prix' => 1.5]
            ];
            
            //$sous_suite = [1, 2, 4, 8, 16]
            $sous_suite = $suite[0];
            echo $sous_suite[0]. '<br>'.$sous_suite[2]. '<br>';
            
            //$sous_util = ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr']
            $sous_util = $utilisateurs[2];
            echo $sous_util['nom']. '<br>';
            
            //$sous_produits = ['poids' => 200, 'quantite' => 10, 'prix' => 15]
            $sous_produits = $produits['Livre'];
            echo $sous_produits['prix'];
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-affichage-valeur-tableau-multidimensionnel-resultat.png)

Ici, on procède en deux étapes à chaque fois pour bien comprendre ce qu’il se passe. Notre but est d’afficher certaines valeurs finales de nos tableaux multidimensionnels à deux dimensions.

A chaque fois, on commence par récupérer l’une des valeurs de nos tableaux multidimensionnels qui sont elles-mêmes des tableaux.

On récupère la valeur liée à l’indice 0 de notre tableau $suite c’est-à-dire le tableau [1, 2, 4, 8, 16] qu’on place dans une variable $sous_suite qui devient de fait une variable tableau. On affiche ensuite les valeurs liées aux clefs 0 et 2 de notre tableau sous-suite, c’est-à-dire 1 et 4.

On effectue le même type d’opérations avec nos deux autres tableaux multidimensionnels, en faisant bien attention à préciser les bonnes clefs textuelles lorsque nos tableaux et / ou sous tableaux sont des tableaux associatifs.

La chose à retenir ici est qu’il nous faut donc deux indices pour récupérer l’une des valeurs finales d’un tableau à deux dimensions qui ne contient que des tableaux en valeurs : un premier indice qui va nous permettre d’accéder à une valeur-tableau de notre tableau multidimensionnel et un deuxième indice qui va nous permettre d’accéder à une valeur effective dans notre valeur-tableau.

Nous allons alors pouvoir abréger l’écriture de la façon suivante :
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
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux numérotés*/
            $suite = [
                [1, 2, 4, 8, 16],
                [1, 3, 9, 27, 81]
            ];
            
            /*Tableau multidimensionnel numéroté stockant
             *des tableaux associatifs et une valeur simple*/
            $utilisateurs = [
                ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
                ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
                ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr'],
                'Florian'
            ];
            
            /*Tableau multidimensionnel associatif stockant
             *des tableaux associatifs*/
            $produits = [
                'Livre' => ['poids' => 200, 'quantite' => 10, 'prix' => 15],
                'Stickers' => ['poids' => 10, 'quantite' => 100, 'prix' => 1.5]
            ];
            
            echo $suite[0][0]. '<br>'.$suite[0][2]. '<br>';
            echo $utilisateurs[2]['nom']. '<br>';
            //Affichage d'une valeur simple contenue directement dans $utilisateurs
            echo $utilisateurs[3]. '<br>';
            echo $produits['Livre']['prix'];
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-affichage-rapide-valeur-tableau-multidimensionnel-resultat.png)

Pour accéder aux valeurs finales d’un tableau à 2 dimensions, nous allons devoir préciser deux indices : le premier indice permet d’accéder à une valeur (qui est un tableau) du tableau multidimensionnel et le deuxième indice sert à accéder à une valeur en particulier dans ce sous tableau.

Nous allons suivre exactement le même schéma pour les tableaux à 3, 4, 5… dimensions en précisant autant de clefs que notre tableau possède de dimensions.

Notez toutefois ici que dans le cas où notre tableau multidimensionnel contient à la fois des tableaux et des valeurs simples, alors on accèdera aux valeurs simples de manière « classique », c’est-à-dire en précisant seulement le nombre d’indices nous permettant d’accéder à la valeur en question. Il est cependant très rare d’avoir des tableaux multidimensionnels composés de valeurs-tableaux et de valeurs simples.

## Parcourir et afficher les valeurs d’un tableau multidimensionnel

Pour parcourir toutes les valeurs d’un tableau multidimensionnel (et éventuellement les afficher ou effectuer d’autres opérations dessus), la meilleure manière de faire va être d’utiliser plusieurs boucles foreach imbriquées.

On va ici utiliser autant de boucles foreach qu’on a de dimensions dans le tableau qu’on souhaite parcourir. La première boucle foreach va nous permettre de parcourir les valeurs de notre tableau multidimensionnel de base, puis la deuxième boucle foreach va nous permettre de parcourir les valeurs des tableaux contenus directement dans le tableau multidimensionnel et etc.

Essayons d’afficher toutes les valeurs de nos tableaux précédents (note : j’ai enlevé la valeur simple « Florian » de mon tableau utilisateur car elle aurait été complexe à traiter ici).
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
            $suite = [
                [1, 2, 4, 8, 16],
                [1, 3, 9, 27, 81]
            ];
            $utilisateurs = [
                ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
                ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
                ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr'],
            ];
            $produits = [
                'Livre' => ['poids' => 200, 'quantite' => 10, 'prix' => 15],
                'Stickers' => ['poids' => 10, 'quantite' => 100, 'prix' => 1.5]
            ];
            foreach ($suite as $suitenb => $n){
                echo 'Suite ' .($suitenb + 1). ' : ';
                foreach($n as $ni => $nn){
                    echo $nn. ', ';
                }
                echo '<br><br>';
            }
            foreach($utilisateurs as $nb => $infos){
                echo 'Utilisateur n°' .($nb + 1). ' :<br>';
                foreach ($infos as $c => $v){
                    echo $c. ' : ' .$v. '<br>';
                }
                echo '<br>';
            }
            foreach ($produits as $clef => $produit){
                echo 'Produit : ' .$clef. '<br>';
                foreach($produit as $caracteristique => $valeur){
                    echo $caracteristique. ' : ' .$valeur. '<br>';
                }
                echo '<br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-parcourir-tableau-multidimensionnel-foreach-resultat.png)

Ici, nos trois tableaux sont trois tableaux à deux dimensions. Nous allons donc utiliser deux boucles foreach à chaque fois. La première boucle foreach notre premier tableau $suite va nous servir à accéder aux éléments de ce tableau multidimensionnel, c’est-à-dire aux deux clefs numérotées et aux deux valeurs qui sont des tableaux. On echo déjà à partir de cette première boucle le numéro de la suite qui va être affichée en rajoutant 1 à la valeur de son index (puisque les index numérotés commencent à 0).

Lors du premier passage dans cette première boucle foreach, on va donc accéder à notre première suite et on va echo « Suite 1 : » et rentrer dans notre deuxième boucle foreach. Cette deuxième boucle foreach va parcourir le sous tableau [1, 2, 4, 8, 16] et echo les différentes valeurs du tableau à chaque fois.

Dès qu’on arrive à la fin de ce premier sous tableau, on retourne dans notre première boucle foreach pour un deuxième passage et ce sont cette fois-ci les valeurs de notre deuxième sous tableau qui vont être affichées.

La chose à bien comprendre dans ce code est que notre boucle foreach interne ou imbriquée va renvoyer toutes les valeurs d’un sous tableau puis on va ensuite retourner dans notre première boucle pour effectuer un autre passage.

## Afficher rapidement la structure d’un tableau en PHP

Parfois, on voudra simplement afficher la structure d’un tableau PHP sans mise en forme pour vérifier ce qu’il contient ou pour des questions de débogage.

Le PHP nous fournit deux possibilités de faire cela : on va pouvoir soit utiliser la fonction print_r(), soit la fonction var_dump() que nous connaissons déjà pour afficher n’importe quel type de tableaux (numérotés, associatifs ou multidimensionnels).

Notez que var_dump() va nous fournir davantage d’informations que print_r().

On va généralement utiliser cette fonction avec l’élément HTML pre pour avoir un meilleur affichage de la structure du tableau qu’on souhaite afficher (je vous rappelle que pre va permettre de conserver la mise en forme de notre code).
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
            $suite = [
                [1, 2, 4, 8, 16],
                [1, 3, 9, 27, 81]
            ];
            $utilisateurs = [
                ['nom' => 'Mathilde', 'mail' => 'math@gmail.com'],
                ['nom' => 'Pierre', 'mail' => 'pierre.giraud@edhec.com'],
                ['nom' => 'Amandine', 'mail' => 'amandine@lp.fr'],
            ];
            $produits = [
                'Livre' => ['poids' => 200, 'quantite' => 10, 'prix' => 15],
                'Stickers' => ['poids' => 10, 'quantite' => 100, 'prix' => 1.5]
            ];
            
            echo '<pre>';
            print_r($produits);
            var_dump($produits);
            echo '</pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-affichage-structure-tableau-printr-vardump-resultat.png)

### Exo 5

- Déclarer une variable de type array qui stocke les informations suivantes :
  - France : Paris
  - Allemagne : Berlin
  - Italie : Rome
  - Afficher les valeurs de tous les éléments du tableau en utilisant la boucle foreach.
- En utilisant la fonction rand(), remplir un tableau avec 10 nombres aléatoires. Puis, tester si le chiffre 42 est dans le tableau et afficher un message en conséquence. Enfin, afficher le contenu de votre tableau avec var_dump.
- En utilisant la fonction rand(), remplir un tableau avec 10 nombres aléatoires. Puis, trier les valeurs dans deux tableaux distincts. Le premier contiendra les valeurs inférieures à 50 et le second contiendra les valeurs supérieures ou égales à 50. Enfin, afficher le contenu des deux tableaux.
- En utilisant le tableau ci-dessous, afficher seulement les pays qui ont une population supérieure ou égale à 20 millions d'habitants.

  ```php
  <?php
    $pays_population = array(
      France' => 67595000,
      Suede' => 9998000,
      Suisse' => 8417000,
      Kosovo' => 1820631,
      Malte' => 434403,
      Mexique' => 122273500,
      Allemagne' => 82800000,
    );
  ?>
  ```

- En reutilisant le tableau ci-dessus, compter le nombre d'éléments du tableau.
- Quelle syntaxe permet d'afficher le deuxième élément du tableau $cocktails ?

  ```php
  <?php
    $cocktails = array('Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule');
  ?>
  ```

- Quelle syntaxe permet d'afficher l'âge de Manuel ?

  ```php
  <?php
    $personnes = array(
      Jean' => 16,
      Manuel' => 19,
      André' => 66
    );  
  ?>
  ```

  - Écrivez un programme PHP pour supprimer les doublons d’un tableau triée.

### Exo 6

1. Soit un tableau `$a = array( 0, 1, 2, 3, 4 );`, comment afficher la valeur `3` du tableau ?

2. Afficher la valeur 3 du tableau suivant :

```php
$a = [
  "zero"  => 0,
  "un"    => 1,
  "deux"  => 2,
  "trois" => 3,
  "quatre"=> 4,
];
```

3. Afficher la valeur 3 du tableau suivant :

```php
$a = [
  [0, 1],
  [2,[3]],
  "zero"  => 0,
  "un"    => 1,
  "deux"  => 2,
  "quatre"=> 4,
];
```

4. Afficher la valeur 3 du tableau suivant :

```php
$a = [
    "a" => [
        "b" => 0,
        "c" => 1,
    ],
    "d" => [
        "e" =>  2,
        "f" => [
            "g" => 3
        ]
    ]
];
```

5. Terreur ! Un élève a oublié d'indenter son code. Indentez cet array correctement et corrigez l'erreur.

```php
$a = [ "a" => [
   "b" => 0,  "c" => 1,],"d" => [
 2, "f" =>    [
   "g" => 3
 ]];
```

6. Trouver la somme de cet tableau de nombres : `$a = [ 0, 1, 2, 3, 4, 5, 6 ];`.

7. Créez un array $films contenant les données suivantes :

```
- The Shawshank Redemption
    Année : 1994
    Note : 9.2  
- The Godfather
    Année : 1972
    Note : 9.1  
- The Dark Knight
    Année : 2008
    Note : 9.0  
- The Lord of the Rings: The Return of the King
    Année : 2003
    Note : 8.9
- Pulp Fiction
    Année : 1994
    Note : 8.9
```

8a. Créez le tableau suivant :

```
- The Shawshank Redemption 
- The Godfather
- The Dark Knight
- The Lord of the Rings: The Return of the King
- Pulp Fiction
```

8b. Affichez tous ses éléments grâce à une boucle `foreach($films as $film) { /*...*/ }` :
<details>
  <summary>Spoiler warning</summary>
  
  Exemple :

  ```php
  foreach($saisons as $saison) {
    var_dump($saison);
  }
```

</details>

8c. Affichez, toujours grâce à une boucle, plutôt avec à un `echo`. N'oubliez pas de sauter une ligne entre chaque film !

<details>
  <summary>Spoiler warning</summary>
> Exemple :

```
// Afficher du PHP et du HTML en même temps :

// Solution 1 : concaténation
<body>
  <?php
  echo "<h1>" . $prenom . "</h1>";
  ?>
</body>

// Solution 2 : PHP dans HTML
<body>
  <h1><?php echo $prenom; ?></h1>
</body>
```

</details>

8d. Affichez ces éléments, toujours grâce à une boucle, plutôt dans une liste `<ul>` `<li>`.

9a. Soit le tableau suivant :

```
- The Shawshank Redemption : Frank Darabont
- The Godfather : Francis Ford Coppola
- The Dark Knight : Christopher Nolan
- The Lord of the Rings: The Return of the King : Peter Jackson
- Pulp Fiction : Quentin Tarantino
```

Créez un tableau de clés => valeurs avec ce tableau, avec le film en clé et le réalisateur en valeur rappel :

```php
$array = [
    "cle" => "valeur",
    "cle2" => "valeur2",
]
```

9b. Reprennez le tableau de l'exercice 9a. Grâce à une boucle dans une boucle, affichez le tableau
dans une liste `<ul>` `<li>` toutes les informations affichées de la façon suivante :

- The Shawshank Redemption : Frank Darabont
- The Godfather : Francis Ford Coppola
- The Dark Knight : Christopher Nolan
- The Lord of the Rings: The Return of the King : Peter Jackson
- Pulp Fiction : Quentin Tarantino

<details>
  <summary>Spoiler warning</summary>
> Exemple :

```php

// Soit un tableau :

$saisons = [
  "ete" => "juin",
  "automne" => "septembre",
  "hiver" => "decembre",
  "printemps" => "mars"
];

// Il s'agit d'un tableau de clés/valeurs.
// La clé : le nom de la saison
// La valeur : le tableau contenant les détails de la saison

// Dans ce cas, on précise dans le foreach qu'il s'agit non plus d'une simple valeur (comme l'exemple ci-dessus, $saisons)
// mais d'un ensemble de clés => valeurs : $saison => $detail

// Ainsi, on a accès à la clé avec $saison, et au détail avec $detail

foreach($saisons as $saison => $detail) {

  // Afficher la saison :
  echo $saison;
  
  // Afficher le détail :
  echo $detail;

  // Afficher les deux en concaténation sous la forme "la saison $saison débute en $detail"
  echo "La saison " $saison . " débute en ". $detail;
}
```

</details>

9c. Reprennez le tableau de l'exercice 6. Grâce à une boucle dans une boucle, affichez le tableau
dans une liste `<ul>` `<li>` toutes les informations affichées de la façon suivante :

```
- The Shawshank Redemption
    Année : 1994
    Note : 9.2  
- The Godfather
    Année : 1972
    Note : 9.1  
- The Dark Knight
    Année : 2008
    Note : 9.0  
- The Lord of the Rings: The Return of the King
    Année : 2003
    Note : 8.9
- Pulp Fiction
    Année : 1994
    Note : 8.9
```

<details>
  <summary>Spoiler warning</summary>
> Exemple

```php
$saisons = [
    "ete" => [
        "debut" => "juin",
        "fin"   => "septembre",
    ],
    "hiver" => [
        "debut" => "decembre",
        "fin"   => "mars",
    ]
];


foreach ($saisons as $saison => $details) {

    // Afficher la saison
    echo $saison;

    // Afficher le détail de chaque saison, on boucle le sous-tableau $details :

    foreach ($details as $detail) {

        // Afficher le début de la saison
        echo $detail['debut'];

        // Afficher la fin de la saison
        echo $detail['fin'];
    }

}
```

</dtails>
