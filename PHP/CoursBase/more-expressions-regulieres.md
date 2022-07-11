## Introduction aux expressions rationnelles ou expressions régulières  [19min] -> Q/R

<https://www.youtube.com/watch?v=XJ0ChRpXyaw>

Testeur d'expressions régulières (Regex101) : https://regex101.com/

Dans cette nouvelle partie, nous allons nous intéresser aux expressions régulières qu’on appelle également expressions rationnelles.

Avant tout, vous devez bien comprendre que les expressions régulières ne font pas partie du langage PHP en soi mais que PHP a intégré un support pour les expressions régulières dans son langage car ces dernières vont s’avérer très pratiques, notamment pour vérifier la conformité formelle des données envoyées par des utilisateurs via des formulaires.

## Présentation des expressions régulières

Une expression régulière (aussi abrégé en « regex ») est une séquence de caractères qu’on va définir et qui va nous servir de schéma de recherche.

Les expressions régulières, en les utilisant de concert avec certains fonctions PHP, vont nous permettre de vérifier la présence de certains caractères dans une chaine de caractères en évaluant la chaine de caractères selon l’expression régulière passée.

Nous allons très souvent utiliser les expressions régulières pour filtrer et vérifier la validité des données envoyées par les utilisateurs via des formulaires par exemple.

Notez que les expressions régulières n’appartiennent pas au PHP mais constituent un langage en soi.

Cependant, le PHP supporte et reconnait les expressions régulières et nous fournit des fonctions qui vont nous permettre d’exploiter toute la puissance de celles-ci.

## Regex POSIX contre regex PCRE

Il existe deux types d’expressions régulières possédant des syntaxes et des possibilités légèrement différentes : les expressions régulières POSIX et PCRE.

L’acronyme POSIX signifie « Portable Operating System Interface for Unix ».

L’acronyme PCRE signifie lui Perl Compatible Regular Expression.

Ces deux types de regex vont posséder des syntaxes différentes, mais cela va nous importer peu puisque depuis la version 5.3 du PHP l’extension correspondant aux regex POSIX a été rendue obsolète.

Nous allons donc utiliser les PCRE, qui sont un type de regex dont la syntaxe est tirée du langage Perl.

## Création de premières expressions régulières

Les expressions régulières vont être formées d’un assemblage de caractères qui vont former ensemble un schéma de recherche ainsi que de délimiteurs. On appelle également l’ensemble schéma de recherche + délimiteurs un masque

Les caractères vont pouvoir être des caractères simples ou des caractères spéciaux qui vont avoir une signification particulière.

Un délimiteur peut être n’importe quel caractère, tant qu’il n’est pas alphanumérique, un caractère blanc, l’antislash (« \ ») ou le caractère nul. De plus, si le délimiteur choisi est réutilisé dans notre expression régulière, alors il faudra échapper ou « protéger » le caractère dans la regex en le précédant d’un antislash. Pour le moment, je vous conseille d’utiliser le caractère slash (« / ») comme délimiteur.

En PHP, nous enfermerons généralement nos regex dans des variables pour pouvoir les manipuler facilement.

Commençons par créer une première expression régulière ensemble afin de voir en pratique à quoi ça ressemble.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-exemple-expression-reguliere.png)

Ici, notre regex contient le schéma de recherche pierre et nous avons utilisé, comme convenu, des slashs pour entourer ce schéma de recherche. Ce schéma de recherche va nous permettre de rechercher la présence de la séquence « pierre » dans une chaine de caractères.

En soi, ici, notre regex ne nous sert pas à grand-chose. Cependant, nous allons ensuite pouvoir utiliser des fonctions PHP pour par exemple valider la présence de notre schéma de recherche dans une chaîne de caractères.

Le grand intérêt des expressions régulières est qu’elles vont nous permettre d’effectuer des recherches très puissantes.

En effet, dans le langage des expressions régulières, beaucoup de caractères possèdent un sens spécial, ce qui va nous permettre d’effectuer des recherches très précises.

Par exemple, les regex PCRE possèdent ce qu’on appelle des « options ». Ces options vont nous permettre d’ajouter des critères supplémentaires à nos recherches et vont être représentées par des lettres.

La lettre i, par exemple, va nous permettre de rendre notre regex insensible à la casse, ce qui signifie que notre regex ne fera pas de distinction entre majuscules et minuscules (on peut donc en déduire que les regex sont sensibles à la casse par défaut).

Les options doivent être placées en fin de regex, après le délimiteur, comme ceci :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-exemple-expression-reguliere-option.png)

Dans les chapitres qui vont suivre, nous allons créer des regex de plus en plus complexes et découvrir les fonctions PHP nous permettant d’exploiter toute la puissance des expressions régulières.

## Les fonctions PCRE PHP

Nous allons découvrir les différentes fonctions internes au PHP qui vont nous permettre d’exploiter toute la puissance des expressions régulières. Cela devrait rendre l’intérêt des expressions régulières beaucoup plus concret pour vous.

## Référence : liste des fonctions PCRE PHP

Le PHP dispose de fonctions internes qui vont nous permettre d’utiliser nos masques pour par exemple rechercher une expression dans une chaine, la remplacer par une autre, etc.

Les fonctions PHP relatives aux regex commencent toutes par preg_).

Voici la liste de ces fonctions, que nous allons étudier par la suite, ainsi qu’une courte description de leur action.
| Fonction | Description
| --- | ---
| preg_filter() | Recherche et remplace
| preg_grep() | Recherche et retourne un tableau avec les résultats
| preg_last_error() | Retourne le code d’erreur de la dernière regex exécutée
| preg_match() | Compare une regex à une chaine de caractères
| preg_match_all() | Compare une regex à une chaine de caractères et renvoie tous les résultats
| preg_quote() | Echappe les caractères spéciaux dans une chaine
| preg_replace() | Recherche et remplace
| preg_replace_callback() | Recherche et remplace en utilisant une fonction de rappel
| preg_replace_callback_array() | Recherche et remplace en utilisant une fonction de rappel
| preg_split() | Découpe une chaine

Dans cette partie, nous allons déjà voir comment utiliser chacune de ces fonctions. Cela vous permettra ainsi de voir immédiatement l’utilité des regex. Nous approfondirons par la suite le sujet des expressions régulières en soi.

## Les fonctions PHP preg_match() et preg_match_all()

Les fonctions PHP preg_match() et preg_match_all() vont être les fonctions qu’on va le plus utiliser avec nos expressions régulières.

Ces deux fonctions vont nous permettre de rechercher un schéma dans une chaine de caractères. Elles vont donc nous permettre de vérifier la présence d’une certaine séquence de caractères dans une chaine de caractères.

La fonction preg_match() va renvoyer la valeur 1 si le schéma recherché est trouvé dans la chaine de caractères ou 0 dans le cas contraire.

La fonction preg_match_all() va renvoyer le nombre total de fois où le schéma de recherche a été trouvé dans la chaîne de caractères sous forme de tableau.

Chacune de ces deux fonctions va pouvoir accepter jusqu’à 5 arguments mais seuls 2 arguments sont obligatoires à leur fonctionnement. Ces deux arguments sont le masque ou schéma de recherche passé sous forme de chaine de caractères ainsi que la chaine de caractères dans laquelle effectuer la recherche.

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
            $masque = '/r/';
            $chaine = 'Je suis Pierre Giraud';
            
            if(preg_match($masque, $chaine)){
                echo 'Le caractère "r" a été trouvé '
                .preg_match_all($masque, $chaine).
                ' fois dans "' .$chaine. '"<br>';
            }else{
                'Aucun "r" dans "' .$chaine. '"<br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-preg-match-all-expression-reguliere-resultat.png)

Dans l’exemple précédent, nous utilisons le schéma de recherche /r/ puis on demande à preg_match() de rechercher le présence de notre schéma de recherche r dans la chaine de caractères « Je suis Pierre Giraud ».

Si preg_match() trouve effectivement un r, elle renvoie 1 (qui va être évalué à true) et on rentre dans le if. Dans le cas contraire, notre fonction renvoie 0 (qui est évalué à false, rappelons-le) et on entre dans le else.

Au sein de contre condition if, on utilise également la fonction preg_match_all() pour compter le nombre de fois que le schéma r est rencontré dans notre chaine de caractères.

On va ensuite pouvoir passer d’autres arguments à nos fonctions preg_match() et preg_match_all() qui vont nous permettre d’effectuer des recherches plus ciblées ou d’obtenir des informations supplémentaires par rapport à notre recherche.

Le premier argument facultatif qu’on va pouvoir passer à ces deux fonctions va être une variable dans laquelle vont être stockés les résultats de la recherche sous forme d’un tableau.

Dans le cas de preg_match(), le tableau sera un tableau numéroté. La première valeur du tableau sera le texte qui satisfait le masque complet, la deuxième valeur sera le texte qui satisfait la première parenthèse capturante de notre masque et etc. Nous allons voir plus tard comment utiliser des parenthèses dans nos regex.

Dans le cas de preg_match_all(), le tableau sera un tableau multidimensionnel ordonné. Par défaut, notre tableau multidimensionnel principal va contenir en première valeur un tableau qui va lui-même contenir les résultats qui satisfont le masque complet, puis va contenir en deuxième valeur un tableau qui contient les résultats qui satisfont la première parenthèse capturante et etc. Une nouvelle fois, nous illustrerons cela lorsque nous aurons une plus grande connaissance des regex.

Le deuxième argument facultatif de nos fonctions va être un drapeau (une constante) qui va nous permettre de modifier la façon dont notre tableau passé en argument précédent va être créé. Nous ne rentrerons pas dans un tel niveau de précision ici.

Finalement, le dernier argument facultatif permet de préciser à partir de quel endroit dans la chaine de caractères passé la recherche doit commencer. Cet argument est très pratique pour n’effectuer une recherche que sur une partie de chaine. On va ici passer une valeur en octets.

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
            $masque = '/r/';
            $chaine = 'Je suis Pierre Giraud';
            $match = [];//On ititilise $match et $match_all (non obligatoire)
            $match_all = [];
            
            preg_match($masque, $chaine, $match);
            preg_match_all($masque, $chaine, $match_all);
            
            echo '<pre>';
            print_r($match);
            echo '<br><br>';
            print_r($match_all);
            echo '</pre>';
            
            $m2 = [];//On initialise $m2 (non obligatoire)
            $res = preg_match_all($masque, $chaine, $m2, PREG_PATTERN_ORDER, 15);
            echo 'On recherche "' .$match_all[0][0]. '" en partant 15 octets
            après le début de la chaine de caractères. ' .$res. ' résultat(s)
            trouvé(s).';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-preg-match-all-complet-expression-reguliere-resultat.png)

Ici, j’utilise le drapeau PREG_PATTERN_ORDER qui est la constante utilisée par défaut pour preg_match_all() (et qui importe donc peu) et on demande à preg_match_all() de rechercher notre schéma de recherche à partir du 15è octet de notre chaine de caractères.

Pour le moment, nos recherches sont très simples et ont donc peu d’intérêt. Cependant, nous allons ensuite apprendre à créer des schémas de recherche complexes qui vont nous permettre de valider des formats de données : on va par exemple pouvoir vérifier qu’une chaine donnée a bien la forme d’une adresse mail ou d’une URL ou encore d’un numéro de téléphone par exemple.

## Les fonctions PHP preg_filter(), preg_replace(), preg_replace_callback() et preg_replace_callback_array()

La fonction preg_filter() va nous permettre d’effectuer une recherche dans une chaine de caractères selon un schéma de recherche et de remplacer les correspondances par une autre chaine.

On va passer trois arguments à cette fonction : un schéma de recherche, une chaine de remplacement et la chaine dans laquelle faire la recherche.

La fonction preg_filter() va ensuite renvoyer la chaine transformée. Attention : la chaine de départ ne sera pas modifiée.

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
            $masque = '/jour/';
            $chaine = 'Bonjour, je suis Pierre';
            
            $res = preg_filter($masque, 'soir', $chaine);
            echo 'Chaine transformée : ' .$res. '<br>
                  Chaine de départ : ' .$chaine;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-preg-filter-expression-reguliere-resultat.png)

Ici, on se sert de preg_filter() pour rechercher le schéma jour dans notre chaine de caractères. Dans le cas où il est trouvé, on le remplace par la chaine soir dans le résultat retourné.

Encore une fois, notre chaine de départ n’est pas modifiée en soi. On peut le voir lorsqu’on echo le contenu de notre variable $filter_res après avoir utilisé preg_filter().

La fonction preg_replace() va fonctionner exactement comme preg_filter(). La seule différence entre ces deux fonctions va être dans la valeur retournée si le schéma de recherche n’est pas trouvé dans la chaine de caractères.

En effet, dans ce cas-là, la fonction preg_filter() va renvoyer la valeur null (correspondant à l’absence de valeur) tandis que preg_replace() va renvoyer la chaine de caractères de départ.

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
            $masque = '/jour/';
            $masque2 = '/azerty/';
            $chaine = 'Bonjour, je suis Pierre';
            
            $filter_res = preg_filter($masque, 'soir', $chaine);
            echo 'Chaine transformée : ' .$filter_res. '<br>
                  Chaine de départ : ' .$chaine. '<br><br>';
                  
            $replace_res = preg_filter($masque, 'ne année', $chaine);
            echo 'Chaine transformée : ' .$replace_res. '<br>
                  Chaine de départ : ' .$chaine. '<br><br>';
            
            //Essayons avec un schéma de recherche qui ne sera pas trouvé
            $filter_res2 = preg_filter($masque2, 'soir', $chaine);
            $replace_res2 = preg_replace($masque2, 'soir', $chaine);
            echo 'Résultat de preg_filter() : ' .$filter_res2. '<br>
                  Résultat de preg_replace() : ' .$replace_res2;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-preg-replace-expression-reguliere-resultat.png)

Finalement, les fonctions preg_replace_callback() et preg_replace_callback_array() vont fonctionner selon le même principe général que preg_replace() à la différence qu’il faudra préciser une fonction de rappel plutôt qu’une valeur de remplacement.

Ce sujet est un peu complexe à votre niveau et je ne veux pas vous embrouiller davantage pour le moment, nous laisserons donc cette fonction de côté pour l’instant.

## La fonction PHP preg_grep()

La fonction preg_grep() va nous permettre de rechercher un certain schéma dans un tableau. Les résultats trouvés (les correspondances) seront renvoyés dans un nouveau tableau en conservant les indices du premier tableau.

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
            $masque = '/Pierre/';
            $tb = ['Pierre Gr', 'Mathilde Ml', 'Pierre Dp', 'Florian Dc'];
            
            $grep_res = preg_grep($masque, $tb);
            
            echo '<pre>';
            print_r($grep_res);
            echo '</pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-preg-grep-expression-reguliere-resultat.png)

## La fonction PHP preg_split()

La fonction preg_split() va éclater une chaine de caractères en fonction d’un schéma de recherche et renvoyer un tableau.

A chaque fois que le schéma de recherche est trouvé dans la chaine de départ, preg_split() crée un nouvel élément dans le tableau renvoyé.

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
            $masque = '/j/';
            $chaine = 'Bonjour, je suis Pierre';
            
            $split_res = preg_split($masque, $chaine);
            echo '<pre>';
            print_r($split_res);
            echo '<pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-preg-split-expression-reguliere-resultat.png)

## La fonction PHP preg_quote()

La fonction preg_quote() va nous permettre d’échapper certains caractères spéciaux pour les regex.

Utiliser preg_quote() correspond à placer un antislash (le caractère d’échappement ou de protection) devant chaque caractère spécial.

Cette fonction peut s’avérer utile lorsque notre schéma de recherche possède beaucoup de caractères spéciaux dont on veut échapper le sens.

Nous reparlerons des caractères spéciaux et de l’échappement des caractères plus tard dans cette partie.

## La fonction PHP preg_last_error()

La fonction preg_last_error() va être surtout utilisée pour du débogage.

En effet, celle-ci va retourner le code d’erreur correspondant à la dernière regex utilisée.

On pourra donc utiliser cette fonction lorsqu’une de nos regex ne fonctionne pas, afin d’avoir plus d’informations sur la nature du problème.

## Les classes de caractères des regex

Nous allons découvrir les classes de caractères et commencer à créer des masques relativement complexes et intéressants pour nos expressions régulières.

## Les classes de caractères

Les classes de caractères vont nous permettre de fournir différents choix de correspondance pour un caractère en spécifiant un ensemble de caractères qui vont pouvoir être trouvés. En d’autres termes, elles vont nous permettre de rechercher n’importe quel caractère d’une chaine qui fait partie de la classe de caractères fournie dans le masque.

Pour déclarer une classe de caractères dans notre masque, nous allons utiliser une paire de crochets [ ] qui vont nous permettre de délimiter la classe en question.

Prenons immédiatement un exemple concret en utilisant des classes de caractères simples :

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
            $masque1 = '/[aeiouy]/';
            $masque2 = '/j[aeiouy]/';
            $masque3 = '/[aeiouy][aeiouy]/';
            $chaine = 'Bonjour, je suis Pierre';
            
            preg_match_all($masque1,$chaine,$tb1);
            preg_match_all($masque2,$chaine,$tb2);
            preg_match_all($masque3,$chaine,$tb3);
            echo '<pre>';
            print_r($tb1);
            echo '<br><br>';
            print_r($tb2);
            echo '<br><br>';
            print_r($tb3);
            echo '</pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-classe-caracteres-expression-reguliere-regex-resultat.png)

Ici, on utilise différentes classes de caractères dans nos masques pour rechercher différents caractères ou séquences de caractères dans nos chaines.

Notre premier masque est très simple : il contient uniquement la classe de caractères [aeiouy]. Cette classe de caractères va nous permettre de chercher tous les caractères de notre chaine qui sont des voyelles (soit un « a », soit « e », soit « i », soit « o », soit « u », soit « y »).

Notre fonction preg_match_all() va donc ici renvoyer toutes les voyelles de notre chaine une à une.

Notre deuxième masque permet de chercher la séquence « j suivi d’un voyelle ». En effet, ici, on place le caractère « j » en dehors de notre classe de caractères. Le masque va donc nous permettre de chercher des séquences de deux caractères dont le premier est un « j » et le deuxième fait partie de la classe [aeiouy].

Dans notre troisième masque, nous utilisons cette fois-ci deux classes de caractères d’affilée. Ici, les deux classes de caractères sont identiques (on aurait tout-à-fait pu spécifier deux classes de caractères différentes) et vont toutes les deux nous permettre de rechercher une voyelle. On va donc ici pouvoir chercher deux voyelles à la suite.

## Les classes de caractères et les méta caractères

Dans le langage des expressions régulières, de nombreux caractères vont avoir une signification spéciale et vont nous permettre de signifier qu’on recherche tel caractères ou telle séquence de caractères un certain nombre de fois ou à une certaine place dans une chaine.

Ces caractères spéciaux qu’on appelle des métacaractères vont nous permettre de créer des schémas ou masques de recherche très puissants et donc d’exploiter toute la puissance des expressions régulières. On a pu en voir un premier exemple avec les caractères crochets [ ] qui permettent de définir une classe de caractères.

Au sein des classes de caractères, nous n’avons accès qu’à 3 métacaractères, c’est-à-dire qu’il n’existe que trois caractères qui possèdent un sens spécial lorsqu’ils sont placés tels quels dans une classe de caractères. Ces métacaractères sont les suivants :
| Métacaractère | Description
| --- | ---
| \ | Caractère de protection qui va avoir plusieurs usages (on va pouvoir s’en servir pour donner un sens spécial à des caractères qui n’en possèdent pas ou au contraire pour neutraliser le sens spécial des métacaractères).
| ^ | Si placé au tout début d’une classe, permet de nier la classe c’est-à-dire de chercher tout caractère qui n’appartient pas à la classe.
| – | Entre deux caractères, permet d’indiquer un intervalle de caractères.

Si on souhaite rechercher le caractère représenté par un métacaractère et qu’on ne souhaite pas utiliser son sens spécial (par exemple si on souhaite rechercher le signe moins), il faudra alors le protéger avec un antislash.

Attention ici : pour rechercher le caractère antislash avec une expression rationnelle (c’est-à-dire à partir d’un masque stocké sous forme de chaine de caractères), il faudra préciser 4 antislashs d’affilée. En effet, l’analyseur PHP va ici considérer les 1er et 3è antislash comme des caractères d’échappement pour les deux autres et ne conserver donc que les 2è et 4è antislash puis la regex va considérer le 1er des deux antislashs restants comme un caractère de protection et va donc rechercher le caractère antislash placé derrière.

Notez qu’il faudra également protéger les signes crochets fermants ainsi que le délimiteur de masque choisi si on souhaite les inclure pour les rechercher dans une classe de caractères car dans le cas contraire le PHP penserait qu’on termine une classe de caractères ou notre masque.

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
            $masque1 = '/[^aeiouy]/';
            $masque2 = '/[\^aeiouy]/';
            $masque3 = '/[aei^ouy]/';
            $masque4 = '/[a-z]o/';
            $masque5 = '/[a-zA-Z]o/';
            $masque6 = '/[a\-z]/';
            $masque7 = '/[0-9az-]/';
            $masque8 = '/[\/[\]\\\\]/';
            $chaine = 'Bonjour, qui suis-je ? Je suis [Pierre] \0/ ^^';
    
            preg_match_all($masque1,$chaine,$tb1);
            preg_match_all($masque2,$chaine,$tb2);
            preg_match_all($masque3,$chaine,$tb3);
            preg_match_all($masque4,$chaine,$tb4);
            preg_match_all($masque5,$chaine,$tb5);
            preg_match_all($masque6,$chaine,$tb6);
            preg_match_all($masque7,$chaine,$tb7);
            preg_match_all($masque8,$chaine,$tb8);
            
            /*Ici, je sais que mes tableaux multidimensionnels ne contiennent
             *qu'un tableau à chaque fois. J'utilise la fonction implode()
             *qui renvoie les éléments d'un tableau sous forme de chaine de
             *caractères séparés par un séparateur choisi (ici la virgule)*/
            echo 'Caractères trouvés (masque 1) : ' .implode(', ', $tb1[0]). '<br>';
            echo 'Caractères trouvés (masque 2) : ' .implode(', ', $tb2[0]). '<br>';
            echo 'Caractères trouvés (masque 3) : ' .implode(', ', $tb3[0]). '<br>';
            echo 'Caractères trouvés (masque 4) : ' .implode(', ', $tb4[0]). '<br>';
            echo 'Caractères trouvés (masque 5) : ' .implode(', ', $tb5[0]). '<br>';
            echo 'Caractères trouvés (masque 6) : ' .implode(', ', $tb6[0]). '<br>';
            echo 'Caractères trouvés (masque 7) : ' .implode(', ', $tb7[0]). '<br>';
            echo 'Caractères trouvés (masque 8) : ' .implode(', ', $tb8[0]). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-classe-caracteres-metacaractere-expression-reguliere-regex-resultat.png)

Ici, nous avons créé 8 masques différents. Le premier masque utilise le caractère ^ en début de classe de caractère. Ce caractère va donc être interprété selon son sens de métacaractère et va nier la classe. Notre masque va donc nous permettre de chercher tous les caractères d’une chaine qui ne sont pas des voyelles minuscules. Notez que les espaces sont également des caractères et vont être trouvés ici.

Dans notre deuxième masque, on protège le métacaractère ^ avec un antislash. Notre masque va donc nous permettre de trouver toutes les voyelles de notre chaine plus le caractère « ^ ».

Dans notre troisième masque, on utilise le caractère « ^ » au milieu de la classe. Celui-ci ne possède donc pas son sens de métacaractère et nous n’avons pas besoin ici de le protéger. Ce troisième masque va nous permettre de chercher les mêmes choses que le précédent.

Notre quatrième masque utilise le métacaractère -. Dans le cas présent, il indique que notre classe de caractère contient toutes les lettres minuscules de a à z, c’est-à-dire tout l’alphabet. Notre masque va donc trouver toutes les séquences contenant une lettre de l’alphabet minuscule suivie d’un « o ».

Notez bien ici que les lettres qui ne font pas partie strictement de l’alphabet anglais commun (c’est-à-dire les lettres accentuées, les lettres avec cédilles, etc.) ne seront pas ici trouvées.

Dans notre cinquième masque, on définit deux plages ou intervalles de caractères grâce au métacaractère -. Ici, toutes les lettres de l’alphabet minuscules ou majuscules vont correspondre aux critères de la classe. Le masque va donc nous permettre de chercher toutes les séquences contenant une lettre de l’alphabet minuscule ou majuscule suivie d’un « o ».

Dans notre sixième masque, on protège cette fois-ci le caractère « – » . Notre masque va donc nous permettre de trouver les caractères « a », « – » et « z ».

Dans notre septième masque, on utilise cette fois-ci le métacaractère - pour définir une place numérique (les regex vont nous permettre de trouver n’importe quel caractère, que ce soit une lettre, un chiffre, un signe, etc.). Notre masque va donc trouver n’importe quel chiffre (de 0 à 9), la lettre « a », le lettre « z » et le caractère « – ». En effet, le caractère est ici également mentionné en fin de classe et ne possède donc pas de sens spécial et n’a pas besoin d’être protégé.

Finalement, notre dernier masque va nous permettre de trouver les caractères « / », « [ », « ] » et « \ ». Notez ici qu’il est nécessaire de protéger le caractère crochet fermant mais pas le crochet ouvrant qui sera recherché en tant que tel.

Dans cet exemple, on utilise preg_match_all() qui va renvoyer toutes les correspondances sous forme de tableau multidimensionnel. Nos masques restent pour le moment relativement simples et je sais ici que les différents tableaux renvoyés ne vont comporter qu’un seul tableau.

J’utilise donc ensuite la fonction implode() qui renvoie les différents éléments d’un tableau sous forme de chaine de caractères en les séparant avec un séparateur de notre choix. Je passe ici le séparateur virgule à cette fonction et lui passe le tableau contenu dans mes différents tableaux multidimensionnels pour qu’elle me renvoie tous les résultats.

Notez que j’aurais aussi bien pu me contenter d’utiliser print_r() comme précédemment mais comme on renvoie beaucoup de choses ce coup-ci, je voulais un rendu sous forme de chaine afin qu’il soit plus compacte et plus présentable.

## Les classes de caractères abrégées ou prédéfinies

Le caractère d’échappement ou de protection antislash va pouvoir avoir plusieurs rôles ou plusieurs sens dans un contexte d’utilisation au sein d’expressions régulières. On a déjà vu que l’antislash nous permettait de protéger certains métacaractères, c’est-à-dire que le métacaractères ne prendra pas sa signification spéciale mais pourra être cherché en tant que caractère simple.

L’antislash va encore pouvoir être utilisé au sein de classes de caractères avec certains caractères « normaux » pour au contraire leur donner une signification spéciale.

On va ainsi pouvoir utiliser ce qu’on appelle des classes abrégées ou prédéfinies pour indiquer qu’on recherche un type de valeurs plutôt qu’une valeur ou qu’une plage de valeurs en particuliers. Les classes abrégées disponibles sont les suivantes (faites bien attention aux emplois de majuscules et de minuscules ici !) :
| Classe abrégée | Description
| --- | ---
| \w | Représente tout caractère de « mot ». Équivalent à [a-zA-Z0-9_]
| \W | Représente tout caractère qui n’est pas un caractère de « mot ». Equivalent à [^a-zA- Z0-9_]
| \d | Représente un chiffre. Équivalent à [0-9]
| \D | Représente tout caractère qui n’est pas un chiffre. Équivalent à [^0-9]
| \s | Représente un caractère blanc (espace, retour chariot ou retour à la ligne)
| \S | Représente tout caractère qui n’est pas un caractère blanc
| \h | Représente un espace horizontal
| \H | Représente tout caractère qui n’est pas un espace horizontal
| \v | Représente un espace vertical
| \V | Représente tout caractère qui n’est pas un espace vertical

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
            $masque1 = '/[\W]/';
            $masque2 = '/[\d]/';
            $masque3 = '/[\h]/';
            $chaine = 'Je suis Pierre, j\'ai 29 ans. Et vous ?';
            
            preg_match_all($masque1, $chaine, $tb1);
            preg_match_all($masque2, $chaine, $tb2);
            $espaces = preg_match_all($masque3, $chaine);
            echo '<pre>';
            print_r($tb1);
            echo '<br>';
            print_r($tb2);
            echo '</pre><br>';
            echo 'Ma chaine contient ' .$espaces. ' espaces horizontaux';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-classe-caracteres-abregee-expression-reguliere-regex-resultat.png)

Ici, notre premier masque nous permet de trouver tous les caractères qui n’appartiennent pas à la classe [a-ZA-Z-0-9_], c’est-à-dire tout caractère qui n’est ni une lettre de l’alphabet de base ni un chiffre ni un underscore.

Notre deuxième masque nous permet de trouver tous les caractères de type chiffres dans une chaine de caractères.

Notre troisième masque nous permet de trouver tous les espaces. Ici, on choisit d’utiliser la valeur renvoyée par défaut par preg_match_all() qui correspond au nombre de fois où le masque a été trouvé dans a chaine pour renvoyer le nombre d’espaces dans notre chaine.

## Les métacaractères des regex PHP

Dans la leçon précédente, nous avons appris à créer des classes de caractères et avons découvert qu’on pouvait insérer dans nos classes de caractères des caractères qui possèdent une signification spéciale : les métacaractères.

Nous n’avons accès qu’à trois métacaractères au sein des classes de caractères : les métacaractères ^, - et \. A l’extérieur des classes de caractères, cependant, nous allons pouvoir en utiliser de nombreux autres.

Nous allons présenter ces différents métacaractères dans cette leçon.

## Le point

Le métacaractère . (point) va nous permettre de rechercher n’importe quel caractère à l’exception du caractère représentant une nouvelle ligne qui est en PHP le \n.

``` php
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
            $masque1 = '/./';
            $masque2 = '/[.]/';
            $chaine = 'Pierre, 29 ans. Et vous ?';
            
            preg_match_all($masque1, $chaine, $tb1);
            preg_match_all($masque2, $chaine, $tb2);
            echo '<pre>';
            print_r($tb1);
            echo '<br>';
            print_r($tb2);
            echo '</pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-point-expression-reguliere-resultat.png)

Comme vous pouvez le voir, le point a un sens bien différent selon qu’il soit spécifié dans une classe ou en dehors d’une classe de caractères : en dehors d’une classe de caractères, le point est un métacaractère qui permet de chercher n’importe quel caractère sauf une nouvelle ligne tandis que dans une classe de caractère le point sert simplement à rechercher le caractère point dans notre chaine de caractères.

Encore une fois, il n’existe que trois métacaractères, c’est-à-dire trois caractères qui vont posséder un sens spécial à l’intérieur des classes de caractères. Les métacaractères que nous étudions dans cette leçon ne vont avoir un sens spécial qu’en dehors des classes de caractères.

## Les alternatives

Le métacaractère | (barre verticale) sert à séparer des alternatives. Concrètement, ce métacaractère va nous permettre de créer des masques qui vont pouvoir chercher une séquence de caractères ou une autre.

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
            $masque1 = '/er|re/';
            $chaine = 'Pierre, 29 ans. Et vous ?';
            
            preg_match_all($masque1, $chaine, $tb1);
            echo '<pre>';
            print_r($tb1);
            echo '</pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-alternative-expression-reguliere-resultat.png)

Ici, on utilise le métacaractère | pour créer une alternative dans notre masque. Ce masque va nous permettre de chercher soit la séquence de caractères « er » soit la séquence « re » dans la chaine de caractères à analyser.

## Les ancres

Les deux métacaractères ^ et $ vont nous permettre « d’ancrer » des masques.

Le métacaractère ^, lorsqu’il est utilisé en dehors d’une classe, va posséder une signification différente de lors de l’utilisation dans une classe. Attention donc à ne pas confondre les deux sens !

Utiliser le métacaractère ^ en dehors d’une classe nous permet de rechercher la présence du caractère suivant le ^ du masque en début de la chaine de caractères à analyser.

Il va falloir le placer en début de du masque ou tout au moins en début d’alternative pour qu’il exprime ce sens.

Au contraire, le métacaractère $ va nous permettre de rechercher la présence du caractère précédant le métacaractère en fin de chaine.

Il va falloir placer le métacaractère $ en fin de du masque ou tout au moins en fin d’alternative pour qu’il exprime ce sens.

Prenons immédiatement quelques exemples concrets :

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
            $masque1 = '/^p/'; //Cherche "p" en début de chaine
            $masque2 = '/^p|^P/'; //Cherche "p" ou "P" en début de chaine
            $masque3 = '/^[A-Z]/'; //Cherche une majuscule en début de chaine
            $masque4 = '/\?$/'; //Cherche "?" en fin de chaine
            /*Cherche une chaine de deux caractères qui commence par "P" et finit
             *par "?"*/
            $masque5 = '/^p\?$|^P\?$/';
            $chaine = 'Pierre, 29 ans. Et vous ?';
            
            if(preg_match($masque1, $chaine)){
                echo '"p" trouvé en début de chaine <br>';
            }else{
                echo '"p" non trouvé en début de chaine <br>';
            }
            if(preg_match($masque2, $chaine)){
                echo '"p" ou "P" trouvé en début de chaine <br>';
            }else{
                echo '"p" ou "P" non trouvé en début de chaine <br>';
            }
            if(preg_match($masque3, $chaine)){
                echo 'La chaine commence par une lettre majuscule de A à Z <br>';
            }else{
                echo 'La chaine ne commence pas par une majuscule de A à Z <br>';
            }
            if(preg_match($masque4, $chaine)){
                echo '"?" trouvé en fin de chaine <br>';
            }else{
                echo '"?" non trouvé en fin de chaine <br>';
            }
            if(preg_match($masque5, $chaine)){
                echo 'La chaine est "p?" ou "P?"<br>';
            }else{
                echo 'La chaine n\'est pas "p?" ou "P?"<br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-ancre-expression-reguliere-resultat.png)

Nos masques commencent ici à être relativement complexes et il faut bien faire attention à leur écriture. Avant tout, j’ai dû protéger le caractère ? à chaque utilisation dans mes masques car c’est également un métacaractère que nous allons étudier juste après et car ici je souhaitais véritablement chercher la présence du caractère « ? » et non pas donner un sens différent à mon masque.

Mon premier masque nous permet de chercher la présence d’un « p » minuscule en début de chaine grâce au métacaractère ^ placé en début de masque.

Mon deuxième masque nous permet de chercher la présence d’un « p » minuscule ou d’un « P » majuscule en début de chaine. Ici, vous pouvez remarquer qu’on utiliser deux fois le métacaractère ^. En effet, ce métacaractère doit être placé soit en début de masque soit en début d’alternative pour qu’on puisse utiliser son sens spécial.

Le troisième masque nous permet cette fois-ci de chercher la présence d’une lettre majuscule de l’alphabet commun (lettre non accentuée et sans cédille) en début de chaine. Notez bien ici que j’utilise mon métacaractère ^ en dehors de ma classe de caractères.

Notre quatrième masque permet de chercher la présence d’un point d’interrogation en fin de chaine. Ici, il faut protéger le point d’interrogation pour le chercher comme caractère en tant que tel.

Notre cinquième et dernier masque est un peu plus complexe à comprendre. On utilise cette fois-ci à la fois le métacaractère ^ et le métacaractère $ ce qui va créer une vraie restriction sur ce qui va être recherché.

En effet, vous devez bien comprendre qu’ici on cherche une séquence de deux caractères avec le premier caractère qui doit être un « p » ou un « P » en début de chaine et le deuxième caractère qui doit être un « ? » et se situer en fin de chaine. On cherche donc exactement les chaines « p? » ou « P? ».

Nous allons voir ci-dessous comment spécifier qu’on cherche une chaine de taille quelconque qui commence par un certain caractère et se termine par un autre.

## Les quantificateurs

Les quantificateurs sont des métacaractères qui vont nous permettre de rechercher une certaine quantité d’un caractère ou d’une séquence de caractères.

Les quantificateurs disponibles sont les suivants :
Quantificateur | Description
| --- | ---
| a{X} | On veut une séquence de X « a »
| a{X,Y} | On veut une séquence de X à Y fois « a »
| a{X,} | On veut une séquence d’au moins X fois « a » sans limite supérieure
| a? | On veut 0 ou 1 « a ». Équivalent à a{0,1}
| a+ | On veut au moins un « a ». Équivalent à a{1,}
| a* | On veut 0, 1 ou plusieurs « a ». Équivalent à a{0,}

Bien évidemment, les lettres « a », « X » et « Y » ne sont données ici qu’à titre d’exemple et on les remplacera par des valeurs effectives en pratique.

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
            $masque1 = '/er?/';
            $masque2 = '/er+/';
            $masque3 = '/^[A-Z].{10,}\?$/';
            $masque4 = '/^\d{10,10}$/';
            $chaine = 'Pierre, 29 ans. Et vous ?';
            $chaine2 = '0665656565';
            
            preg_match_all($masque1, $chaine, $tb1);
            preg_match_all($masque2, $chaine, $tb2);
            preg_match_all($masque3, $chaine, $tb3);
            preg_match_all($masque4, $chaine2, $tb4);
            
            print_r($tb1);
            echo '<br>';
            print_r($tb2);
            echo '<br>';
            print_r($tb3);
            echo '<br>';
            print_r($tb4);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-quantificateur-expression-reguliere-resultat.png)

Notre premier masque va ici nous permettre de chercher un « e » suivi de 0 ou 1 « r ». La chose à bien comprendre ici est que si notre chaine contient un « e » suivi de plus d’un « r » alors la séquence « er » sera bien trouvée puisqu’elle est bien présente dans la chaine. Le fait qu’il y ait d’autres « r » derrière n’influe pas sur le résultat.

Notez également que les quantificateurs sont dits « gourmands » par défaut : cela signifie qu’ils vont d’abord essayer de chercher le maximum de répétition autorisé. C’est la raison pour laquelle ici « er » est renvoyé la première fois (séquence présente dans « Pierre ») et non pas simplement « e ». Ensuite, ils vont chercher le nombre de répétitions inférieur et etc. (le deuxième « e » de « Pierre » est également trouvé.

Notre deuxième masque va chercher un « e » suivi d’au moins un « r ». On trouve cette séquence dans « Pierre ». Comme les quantificateurs sont gourmands, c’est la séquence la plus grande autorisée qui va être trouvée, à savoir « err ».

Notre troisième masque est plus complexe et également très intéressant. Il nous permet de chercher une chaine qui commence par une lettre de l’alphabet commun en majuscule suivie d’au moins 10 caractères qui peuvent être n’importe quel caractère à part un retour à la ligne (puisqu’on utilise ici le métacaractère point) et qui se termine avec un « ? ».

Finalement, notre quatrième masque va nous permettre de vérifier qu’une chaine contient exactement et uniquement 10 chiffres. Ce type de masque va être très intéressant pour vérifier qu’un utilisateur a inscrit son numéro de téléphone correctement lors de son inscription sur notre site par exemple.

## Les sous masques

Les métacaractères ( et ) vont être utilisés pour délimiter des sous masques.

Un sous masque est une partie d’un masque délimités par un couple de parenthèses. Ces parenthèses vont nous permettre d’isoler des alternatives ou de définir sur quelle partie du masque un quantificateur doit s’appliquer.

De manière très schématique, et même si ce n’est pas strictement vrai, vous pouvez considérer qu’on va en faire le même usage que lors d’opérations mathématiques, c’est-à-dire qu’on va s’ne servir pour prioriser les calculs.

Par défaut, les sous masques vont être capturants. Cela signifie tout simplement que lorsqu’un sous masque est trouvé dans la chaine de caractères, la partie de cette chaine sera capturée.

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
            $masque1 = '/er|t/'; //Chercher "er" ou "t"
            $masque2 = '/e(r|t)/'; //Cherche "er", "et", "r" et "t"
            $masque3 = '/er{2}/'; //Cherche "e" suivi de "r" suivi de "r"
            $masque4 = '/(er){2}/'; //Cherche "er" suivi de "er"
            $chaine = 'Je suis Pierre et j\'ai 29 ans.';
            
            preg_match_all($masque1, $chaine, $tb1);
            preg_match_all($masque2, $chaine, $tb2);
            preg_match_all($masque3, $chaine, $tb3);
            preg_match_all($masque4, $chaine, $tb4);
            
            echo '<pre>';
            print_r($tb1);
            print_r($tb2);
            print_r($tb3);
            print_r($tb4);
            echo '</pre>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-sous-masque-expression-reguliere-resultat.png)

Notre premier masque n’utilise pas les métacaractères de sous masque ( ). Il nous permet de chercher « er » ou « t ».

Notre deuxième masque contient un sous masque. Ce masque va nous permettre de chercher « er », « et », « r » et « t » car je vous rappelle que les sous masques sont capturants : si un motif du sous masque correspond, la partie de la chaine de caractères dans laquelle on recherche sera capturée. Ici, notre sous masque chercher « r » ou « t ». Dès que ces caractères vont être trouvés dans la chaine, ils vont être capturés et renvoyés.

Notre troisième masque nous permet de chercher un « e » suivi du caractère « r » répété deux fois.

Notre quatrième masque, en revanche, va nous permettre de chercher la séquence « er » répétée deux fois.

## Les assertions

On appelle « assertion » un test qui va se dérouler sur le ou les caractères suivants ou précédent celui qui est à l’étude actuellement. Par exemple, le métacaractère $ est une assertion puisque l’idée ici est de vérifier qu’il n’y a plus aucun caractère après le caractère ou la séquence écrite avant $.

Ce premier exemple correspond à une assertion dite simple. Il est également possible d’utiliser des assertions complexes qui vont prendre la forme de sous masques.

Il existe à nouveau deux grands types d’assertions complexes : celles qui vont porter sur les caractères suivants celui à l’étude qu’on appellera également « assertion avant » et celles qui vont porter sur les caractères précédents celui à l’étude qu’on appellera également « assertion arrière ».

Les assertions avant et arrière vont encore pouvoir être « positives » ou « négatives ». Une assertion « positive » est une assertion qui va chercher la présence d’un caractère après ou avant le caractère à l’étude tandis qu’une assertion « négative » va au contraire vérifier qu’un caractère n’est pas présent après ou avant le caractère à l’étude.

Notez que les assertions, à la différence des sous masques, ne sont pas capturantes par défaut et ne peuvent pas être répétées.

Voici les assertions complexes qu’on va pouvoir utiliser ainsi que leur description rapide :
| Assertion | Description
| --- | ---
| a(?=b) | Cherche « a » suivi de « b » (assertion avant positive)
| a(?!b) | Cherche « a » non suivi de « b » (assertion avant négative)
| (?<=b)a | Cherche « a » précédé par « b » (assertion arrière positive)
| (?<!b)a | Cherche « a » non précédé par « b » (assertion arrière négative)

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
            $masque1 = '/e(?=r)/'; //Chercher "e" suivi de "r"
            $masque2 = '/e(?!r)/'; //Chercher "e" non suivi de "r"
            $masque3 = '/(?<=i)s/'; //Cherche "s" précédé de "i"
            $masque4 = '/(?<!i)s/'; //Cherche "s" non précédé de "i"
            $chaine = 'Je suis Pierre et j\'ai 29 ans.';
            
            $res1 = preg_match_all($masque1, $chaine);
            $res2 = preg_match_all($masque2, $chaine);
            $res3 = preg_match_all($masque3, $chaine);
            $res4 = preg_match_all($masque4, $chaine);
            
            echo 'La chaine complète est : "' .$chaine.'".<br>
                  Elle contient ' .$res1. ' "e" suivi d\'un "r". <br>
                  Elle contient ' .$res2. ' "e" non suivi d\'un "r". <br>
                  Elle contient ' .$res3. ' "s" précédé d\'un "i". <br>
                  Elle contient ' .$res4. ' "s" non précédé d\'un "i". <br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-assertion-expression-reguliere-resultat.png)

## Résumé : liste complète des métacaractères des expressions régulières

Voici la liste de tous les métacaractères qu’on va pouvoir utiliser en dehors des classes de caractères :
| Métacaractères | Description
| --- | ---
| \ | Caractère dit d’échappement ou de protection qui va servir notamment à neutraliser le sens d’un métacaractère ou à créer une classe abrégée
| [ | Définit le début d’une classe de caractères
| ] | Définit la fin d’une classe de caractères
| . | Permet de chercher n’importe quel caractère à l’exception du caractère de nouvelle ligne
| | | Caractère d’alternative qui permet de trouver un caractère ou un autre
| ^ | Permet de chercher la présence d’un caractère en début de chaine
| $ | Permet de chercher la présence d’un caractère en fin de chaine
| ? | Quantificateur de 0 ou 1. Peut également être utilisé avec « ( » pour en modifier le sens
| + | Quantificateur de 1 ou plus
| * | Quantificateur de 0 ou plus
| { | Définit le début d’un quantificateur
| } | Définit la fin d’un quantificateur
| ( | Début de sous masque ou d’assertion
| ) | Fin de sous masque ou d’assertion

## Les options des expressions régulières disponibles en PHP

En plus des métacaractères, nous allons également pouvoir ajouter des caractères qu’on appelle des options à nos masques pour construire nos expressions régulières.

Dans cette leçon, nous allons découvrir les différents caractères d’option disponibles et apprendre à les utiliser intelligemment.

## Présentation des options des regex

Les options, encore appelées modificateurs, sont des caractères qui vont nous permettre d’ajouter des options à nos expressions régulières.

Les options ne vont pas à proprement parler nous permet de chercher tel ou tel caractère mais vont agir à un niveau plus élevé en modifiant le comportement par défaut des expressions régulières. Elles vont par exemple nous permettre de rendre une recherche insensible à la casse.

On va pouvoir facilement différencier une option d’un caractère normal ou d’un métacaractère dans une expression régulière puisque les options sont les seuls caractères qui peuvent et doivent obligatoirement être placés en dehors des délimiteurs du masque, après le délimiteur final.

## Liste des options disponibles et exemples d’utilisation

Certaines options sont complexes dans leur fonctionnement, peu utilisées ou ne sont pas toujours compatibles. Le tableau suivant ne présente que les options toujours disponibles et les plus utiles selon moi.
| Option | Description
| --- | ---
| i | Rend la recherche insensible à la casse
| m | Par défaut, les expressions régulières considèrent la chaine dans laquelle on fait une recherche comme étant sur une seule ligne et font qu’on ne peut donc utiliser les métacaractères ^ et $ qu’une seule fois. L’option m permet de tenir compte des caractères de retour à la ligne et de retour chariot et fait que ^ et $ vont pouvoir être utilisés pour chercher un début et une fin de ligne
| s | Cette option permet au métacaractère . de remplacer n’importe quel caractère y compris un caractère de nouvelle ligne
| x | Permet d’utiliser des caractères d’espacement dans nos masques sans que ceux-ci soient analysés afin de clarifier nos masques. Attention cependant à ne pas ajouter d’espace dans es séquences spéciales d’un masque, comme entre un « ( » et un « ? » par exemple
| u | Cette option permet de désactiver les fonctionnalités additionnelles de PCRE qui ne sont pas compatibles avec le langage Perl. Cela peut être très utile dans le cas où on souhaite exporter nos regex

Voyons immédiatement comment utiliser ces options en pratique. Notez qu’on va tout à fait pouvoir ajouter plusieurs options à un masque.

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
            $masque1 = '/pie/';
            $masque2 = '/pie/i';
            $masque3 = '/e$/';
            $masque4 = '/e$/m';
            
            /*On utilise des guillemets ici afin que le PHP interprète bien
             *le retour à la ligne \n*/
            $chaine = "Je suis Pierre\nJ\'ai 29 ans";
            
            echo 'Chaine de recherche : "' .$chaine.'".<br>';
            if(preg_match($masque1, $chaine)){
                echo '"pie" trouvé dans la chaine<br>';
            }else{
                echo '"pie" non trouvé dans la chaine<br>';
            }
            
            if(preg_match($masque2, $chaine)){
                echo '"pie" (en min ou en maj) trouvé dans la chaine<br>';
            }else{
                echo '"pie" (en min ou en maj) non trouvé dans la chaine<br>';
            }
            
            if(preg_match($masque3, $chaine)){
                echo '"e" trouvé en fin de chaine<br>';
            }else{
                echo 'Pas de "e" trouvé en fin de chaine<br>';
            }
            
            if(preg_match($masque4, $chaine)){
                echo '"e" trouvé en fin de ligne ou de chaine<br>';
            }else{
                echo 'Pas de "e" trouvé en fin de ligne ou de chaine<br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-expression-reguliere-option-resultat.png)

Pour bien comprendre ce code, il faut déjà noter qu’on utilise ici un caractère de nouvelle ligne en PHP dans notre chaine (\n). Pour que ce caractère soit correctement interprété par le PHP, on entoure ici notre chaine de guillemets droits plutôt que d’apostrophes.

Je vous rappelle en effet que la grande différence entre les apostrophes et les guillemets lors de leur utilisation avec les chaines de caractères en PHP réside dans ce qui va être interprété ou pas par le PHP.

En utilisant des apostrophes, le PHP considèrera le contenu de la chaine comme du texte (à l’exception des caractères \\ et \' qui vont nous permettre d’échapper un antislash et un apostrophe) tandis qu’en utilisant des guillemets le PHP interprètera les noms de variables et les séquences d’échappement comme \n par exemple.

Notre premier masque nous permet ici de chercher la séquence « pie » en minuscules dans notre chaine. Celle-ci n’est pas trouvée.

Notre deuxième masque utilise cette fois-ci l’option i qui rend la recherche insensible à la casse. Ce masque va donc nous permettre de trouver n’importe quelle séquence « pie » en minuscules ou en majuscules.

Notre troisième masque cherche le caractère « e » en fin de chaine. En effet, comme l’option m n’est pas présente, PCRE considèrera que notre chaine est sur une seule ligne.

Notre quatrième masque utilise l’option m qui va changer le comportement par défaut de PCRE qui va alors tenir compte des retours à la ligne (\n) et des retours chariots (\r) dans notre chaine. Ce masque nous permet de cherche le caractère « e » en fin de ligne ou de chaine.

## Conclusion sur les expressions régulières en PHP

Nous avons couvert la majorité des concepts relatifs à l’utilisation des expressions régulières en PHP et sommes désormais capables de créer des masques de recherche puissants qui vont nous permettre d’analyser le contenu d’une chaine.

Une nouvelle fois, les expressions régulières vont s’avérer particulièrement utiles lorsqu’on voudra vérifier la forme des données envoyées par les utilisateurs. Elles vont par exemple nous permettre de nous assurer qu’un utilisateur a bien exactement envoyé une séquence de 10 chiffres lorsqu’on lui a demandé son numéro de téléphone, ou que le mot de passe choisi par l’utilisateur lors de son inscription contient au moins 8 caractères dont un caractère spécial, une majuscule et un chiffre par exemple.
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
        <form action='cours.php' method='post'>
            <label for='pass'>Choisissez un mot de passe.</label>
            <input type='password' name='pass' id='pass'>
            <br>
            <p>Note : Le mot de passe doit possèder au moins 8 caractères dont
            au moins une majuscule, un chiffre et un caractère spécial</p>
            <br>
            <input type='submit' value='Envoyer'>
        </form>
        <?php
            $m = '/^\S*(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/';
            
            if(isset($_POST['pass'])){
                if(preg_match($m, $_POST['pass'])){
                    echo 'Le mot de passe choisi convient';
                }else{
                    echo 'Le mot de passe choisi ne répond pas aux critères';
                }
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-expression-reguliere-validation-mot-passe-resultat.png)

Ici, on commence par créer un formulaire qui demande un mot de passe aux utilisateurs en utilisant la méthode post et en envoyant les données reçues vers la page courante pour traitement avec action='cours.php'.

Les données envoyées vont être automatiquement stockées dans la superglobale $_POST et on va pouvoir y accéder côté PHP en indiquant $_POST['pass'].

Côté traitement PHP, on s’assure déjà qu’une valeur a bien été envoyée grâce à la ligne if(isset($_POST['pass'])). Si une valeur a bien été envoyée, le test de notre condition est validé et on rentre dedans. Dans le cas contraire, le test échoue et rien n’est affiché.

On utilise ensuite un masque plus complexe que ce qu’on a pu voir jusqu’à présent et qui nous permet de tester qu’une chaine ne contient pas d’espace et contient bien au moins 8 caractères avec au moins une majuscule, un chiffre et un caractère spécial.

Pour cela, on commence par utiliser ^\S* et \S*$ qui indique qu’on attend n’importe quel caractère à l’exception d’un caractère blanc 0 fois ou plus en début et en fin de chaine.

Ensuite, on utilise des assertions qui, je vous le rappelle, ne sont pas capturantes par défaut :

- L’assertion (?=\S{8,}) permet de s’assurer que la chaine reçue fait au moins 8 caractères ;
- L’assertion (?=\S*[A-Z]) permet de s’assurer que la chaine reçue possède au moins une lettre appartenant à l’intervalle de classe [A-Z], c’est-à-dire au moins une lettre majuscule ;
- L’assertion (?=\S*[\d]) permet de s’assurer que la chaine reçue possède au moins un chiffre ;
- L’assertion (?=\S*[\W]) permet de s’assurer que la chaine reçue possède au moins un caractère spécial.

Encore une fois, ce masque est beaucoup plus complexe que tout ce qu’on a pu voir jusqu’à présent et nous commençons à utiliser différentes fonctionnalités du PHP ensemble dans cet exemple.

C’est donc tout à fait normal si cela vous semble « impossible à réaliser seul » de premier abord. Essayez simplement pour le moment de prendre un maximum de temps pour bien comprendre les différentes parties du masque ici et le reste viendra avec la pratique.