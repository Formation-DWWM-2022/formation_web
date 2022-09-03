# Définition et gestion des erreurs en PHP
 
- Les Exceptions  : https://youtu.be/210s8-uYSrg
- Les exceptions : https://youtu.be/vIdvm2ByPVg?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3
- exceptions : https://youtu.be/ePFxa2VcCoE
- Les Exception : le trou dans la raquette du typage : https://youtu.be/YfoLM0vWALM

![](https://miro.medium.com/max/800/1*o8_J0OCUyL_SDF6r6EeXNA.jpeg)

Dans cette nouvelle leçon, nous allons définir ce qu’est une erreur en PHP et comprendre comment les erreurs sont générées par le PHP ainsi que comment créer un gestionnaire d’erreurs personnalisé.

# Qu’est-ce qu’une erreur en PHP ?

Tout code peut rencontrer une situation anormale qui va l’empêcher de s’exécuter correctement.

Ces « situations anormales » peuvent parfois provenir du code lui-même, c’est-à-dire d’erreurs faites par les développeurs qui l’ont écrit comme par exemple l’utilisation d’une variable non définie ou le passage d’arguments incorrects dans une fonction ou encore l’oubli d’une parenthèse ou d’un point-virgule quelque part dans le code.

Parfois, également, un code ne va pas pouvoir s’exécuter correctement à cause d’un problème externe comme par exemple dans le cas où on souhaite inclure un fichier dans un script mais que le fichier en question ne peut pas être inclus pour le moment pour diverses raisons.

Dans ces cas-là, le PHP va signaler les problèmes rencontrés lors de l’exécution du code en renvoyant ce qu’on appelle une erreur. A chaque fois que HP génère une erreur, il inclut également un type qui prend la forme d’une constante. Selon le problème rencontré, le niveau ou « type » d’erreur renvoyé sera différent et selon le type d’erreur le script pourra continuer à s’exécuter normalement ou au contraire sera stoppé brutalement.

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
            //La variable $x n'a pas été définie
            echo $x;
            
            //Le fichier jenexistepas.php n'existe pas
            include 'jenexistepas.php';
            
            echo '<br>Ceci s\'affiche car simples warning renvoyé au dessus<br>';
            
            //Le fichier jenexistepas.php n'existe pas
            require 'jenexistepas.php';
            
            echo 'Ceci ne s\'affichera pas car erreur fatale ci-dessus';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
 
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-erreur-type-resultat.png)

Dans l’exemple ci-dessus, je commence par essayer d’echo une variable $x non définis. Comme PHP n’arrive pas à trouver la variable, il renvoie une erreur de type E_NOTICE.

Ensuite, je tente d’inclure un fichier qui n’existe pas avec include. PHP renvoie deux erreurs mais de type E_WARNING indiquant que la ressource n’a pas été trouvée et qu’elle n’a pas pu être ouverte (dans certains cas, le fichier sera trouvé mais ne pourra pas être ouvert pour telle ou telle raison).

Finalement, je tente à nouveau d’inclure un fichier qui n’existe pas mais en utilisant cette fois-ci require qui est plus stricte que include. Cette fois-ci, le PHP va renvoyer une erreur de type E_WARNING pour indiquer que le fichier n’a pas été trouvé et une deuxième de type E_ERROR (erreur fatale) qui va stopper l’exécution du script.

# La gestion des erreurs par le PHP et les types d’erreurs

Il existe 16 niveaux ou types d’erreurs différentes en PHP. Chaque type d’erreur possède une constante et une valeur associées et le script va se comporter différemment en fonction de l’erreur rencontrée.

Ces erreurs peuvent être rangées en différents groupes : les erreurs du code classiques (erreur du développeur), les erreurs liées au code source de PHP, les erreurs générées par le moteur Zend (le moteur ou « framework » sur lequel PHP se base) et les erreurs générées par l’utilisateur.

Si aucun gestionnaire d’erreur n’est défini, PHP gèrera les erreurs qui se produisent en fonction de sa configuration. La directive error_reporting du fichier php.ini (le fichier de configuration principal de PHP) va définir quelles erreurs vont être rapportées et quelles erreurs vont être ignorées.

Notez qu’on va tout à fait pouvoir définir quelles erreurs doivent être rapportées et quelles erreurs doivent être ignorées en modifiant manuellement cette directive. Dans la plupart des cas, il sera préférable de tout rapporter par défaut en utilisant la valeur E_ALL.

Ensuite, l’affichage ou le non affichage des erreurs rapportées va être défini par une autre directive du fichier php.ini qui est la directive display_errors. Si vous ne voyez pas les erreurs comme moi, il vous faudra probablement modifier la valeur de cette directive.

# Créer des gestionnaires d’erreurs personnalisés

Parfois, la prise en charge d’une erreur par défaut par le PHP ne va nous convenir. Dans ce cas-là, on voudra créer un gestionnaire personnalisé d’erreurs.

Pour réaliser cela, on va pouvoir utiliser la fonction set_error_handler() à laquelle on va passer une fonction de rappel qui sera notre gestionnaire d’erreurs.

Notez qu’on va également pouvoir passer en deuxième argument de set_error_handler() une constante d’erreur qui va définir le type d’erreurs pour lequel notre fonction gestionnaire d’erreurs doit être appelée. Si on ne précise rien, le gestionnaire sera appelé pour toutes les erreurs.

Notez également qu’on ne va pas pouvoir gérer tous les types d’erreurs de cette façon. En particulier, les types d’erreur E_ERROR, E_PARSE, E_CORE_ERROR, E_CORE_WARNING, E_COMPILE_ERROR, E_COMPILE_WARNING ainsi que la plupart des E_STRICT du fichier dans lequel set_error_handler() est appelée ne pourront pas être gérés de cette façon.

Le but de la fonction de rappel créée va être de récupérer les différentes informations renvoyées par le PHP en cas d’erreur et de les utiliser pour effectuer différentes opérations. Pour cela, on va pouvoir définir entre 2 et 4 paramètres pour notre fonction :

- Le premier paramètre va représenter le niveau d’erreur ;
- Le deuxième paramètre représente le message d’erreur renvoyé par le PHP ;
- Le troisième paramètre (optionnel) représente le nom du fichier dans lequel l’erreur a été identifiée ;
- Le quatrième paramètre (optionnel) représente le numéro de ligne à laquelle l’erreur a été identifiée.

Le PHP va lui-même transmettre les valeurs en arguments de notre fonction en cas d’erreur. Regardez plutôt l’exemple ci-dessous :

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
            $x = 5;
            $y = 0;
            
            set_error_handler(function($niveau, $message, $fichier, $ligne){
                echo 'Erreur : ' .$message. '<br>';
                echo 'Niveau de l\'erreur : ' .$niveau. '<br>';
                echo 'Erreur dans le fichier : ' .$fichier. '<br>';
                echo 'Emplacement de l\'erreur : ' .$ligne. '<br>';
            });
            
            echo $x / $y;
            echo '<br><br>';
            echo $z;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-set-error-handler-gestionnaire-erreur-resultat.png)

On utilise ici une fonction anonyme comme fonction de rappel de set_error_handler() et donc comme gestionnaire d’erreurs. On définit 4 paramètres pour cette fonction.

Dans le cas présent, la fonction va se contenter d’echo les différentes informations liées à l’erreur de façon structurée et elle n’est donc pas très utile en l’état. Cependant, on va également pouvoir définir des fonctions bien plus complexes qui vont effectuer telle ou telle action en fonction des valeurs reçues (par exemple « si l’erreur est de telle niveau alors exécute ceci…).

Deux erreurs sont générées ici : mathématiquement parlant, la division par zéro est une aberration (le résultat va tendre vers l’infini d’où le « INF » de renvoyé) et une première erreur est donc renvoyée. Ensuite, on tente d’echo une variable qui n’a pas été définie et une deuxième erreur est donc renvoyée.

# Déclenchement, capture et gestion des exceptions PHP : try, throw, catch

Dans cette nouvelle leçon, nous allons présenter une nouvelle façon de gérer les erreurs qui va s’avérer souvent meilleure que de simplement créer et passer un gestionnaire d’erreur à la fonction set_error_handler().

On va ainsi apprendre à gérer les erreurs en manipulant des objets qu’on appelle des exceptions et qui vont être crées et « lancés » dès qu’une erreur définie va survenir.

# Présentation des exceptions en PHP 5

La version 5 de PHP a introduit une nouvelle façon de gérer la plupart des erreurs en utilisant de qu’on appelle des exceptions. Cette nouvelle façon de procéder se base sur le PHP orienté objet et sur la classe Exception.

L’idée ici va être de créer ou de « lancer » un nouvel objet Exception lorsqu’une erreur spécifique est détectée. Dès qu’une exception est lancée, le script va suspendre son exécution et le PHP va chercher un endroit dans le script où l’exception va être « attrapée ».

Utiliser des exceptions va nous permettre de gérer les erreurs de manière plus fluide et de personnaliser la façon dont un script doit gérer certaines erreurs.

Notez que quasiment tous les langages serveurs utilisent le concept d’exceptions pour prendre en charge les erreurs car c’est la meilleure façon de procéder à ce jour.

# Lancer et attraper une exception

En pratique, la gestion d’une erreur via une exception va se faire en trois temps :

- On va définir quand une exception doit être lancée avec une instruction throw ;
- On va créer un bloc catch dont le but va être d’attraper l’exception si celle-ci a été lancée et de définir la façon dont doit être gérée l’erreur ;
- On va utiliser un bloc try dans lequel le code qui peut potentiellement retourner une erreur va être exécuté.

Illustrons immédiatement tout cela avec un exemple concret. Pour cela, imaginons que l’on définisse une fonction qui divise deux nombres non connus à l’avance entre eux. Comme vous le savez, on ne peut pas diviser un nombre par zéro. Si on tente de le faire, une erreur sera renvoyée par le PHP. Nous allons justement lancer une exception pour gérer ce cas particulier.

Commençons déjà par créer notre script sans aucune prise en charge des erreurs :

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
            <label for='n1'>Numérateur :</label>
            <input type='number' id='n1' name='n1'><br><br>
            <label for='n2'>Dénominateur :</label>
            <input type='number' id='n2' name='n2'><br>
            <input type='submit' value='Envoyer'><br><br>
        </form>
        <?php
            function division($x, $y){
                echo '<br>Résultat de' .$x. '/' .$y. ' : ' .($x / $y);
            }
            
            //En pratique, il faudrait vérifier les données envoyées
            if(isset($_POST['n1']) && isset($_POST['n2'])){
                division($_POST['n1'],$_POST['n2']);
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-erreur-warning-resultat.png)

Ici, on définit une fonction division() dont le rôle est de diviser un nombre par un autre et de renvoyer le résultat. Les nombres seront passés par nos utilisateurs via un formulaire. Évidemment, en pratique, il faudra vérifier les données envoyées avant de les manipuler mais ce n’est pas l’objet de la leçon.

Ici, on se contente simplement de s’assurer que des données ont bien été envoyées et si c’est le cas on exécute division(). Évidemment, si on renseigne 0 comme dénominateur, une erreur est renvoyée puisqu’on n’a pas le droit de diviser par zéro.

Pour gérer cette erreur, on pourrait tout à fait utiliser un gestionnaire d’erreurs et la fonction set_error_handler() comme ceci :

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
            <label for='n1'>Numérateur :</label>
            <input type='number' id='n1' name='n1'><br><br>
            <label for='n2'>Dénominateur :</label>
            <input type='number' id='n2' name='n2'><br>
            <input type='submit' value='Envoyer'><br><br>
        </form>
        <?php
            function division($x, $y){
                echo '<br>Résultat de' .$x. '/' .$y. ' : ' .($x / $y);
            }
            
            set_error_handler(function($niveau, $message, $fichier, $ligne){
                echo 'Erreur : ' .$message. '<br>';
                echo 'Niveau de l\'erreur : ' .$niveau. '<br>';
                echo 'Erreur dans le fichier : ' .$fichier. '<br>';
                echo 'Emplacement de l\'erreur : ' .$ligne. '<br>';
            });
            
            //En pratique, il faudrait vérifier les données envoyées
            if(isset($_POST['n1']) && isset($_POST['n2'])){
                division($_POST['n1'],$_POST['n2']);
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-erreur-warning-gestionnaire-set-error-handler-resultat.png)

Cela fonctionne bien ici. Cependant, vous devez savoir que dans un script plus complexe, il va être difficile de s’assurer que la fonction set_error_handler() soit appelée avec les bonnes valeurs et au bon moment. Pour ces raisons, on préfèrera souvent utiliser les exceptions pour gérer les erreurs. Regardez à nouveau le code :

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
            <label for='n1'>Numérateur :</label>
            <input type='number' id='n1' name='n1'><br><br>
            <label for='n2'>Dénominateur :</label>
            <input type='number' id='n2' name='n2'><br>
            <input type='submit' value='Envoyer'><br><br>
        </form>
        <?php
            function division($x, $y){
                if($y == 0){
                    throw new Exception('Division par zéro impossible', 15);
                }
                else{
                    echo '<br>Résultat de' .$x. '/' .$y. ' : ' .($x / $y);
                }
            }
            
            //En pratique, il faudrait vérifier les données envoyées
            if(isset($_POST['n1']) && isset($_POST['n2'])){
                try{
                    division($_POST['n1'],$_POST['n2']);
                }
                catch(Exception $e){
                    echo 'Message d\'erreur : ' .$e->getMessage();
                    echo '<br>';
                    echo 'Code d\'erreur : ' .$e->getCode();
                    echo '<br>';
                    echo $e->getFile();
                }
            } 
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-try-throw-catch-exception-resultat.png)

Dans l’exemple ci-dessus, on utilise cette fois-ci les exceptions pour prendre en charge les erreurs. L’idée derrière les exceptions va être d’anticiper les situations problématiques (situations qui vont pouvoir causer une erreur) et de lancer une exception si la situation est rencontrée.

C’est ce qu’on fait ici dans le code de notre fonction division() : on a identifié que le PHP renverrait une erreur dans le cas où un utilisateur tenterait une division par zéro. Dans ce cas là, on va lancer une exception. Pour cela, on utilise la syntaxe throw new Exception qui lance un objet de la classe Exception.

La classe Exception possède un constructeur qui va pouvoir accepter un message d’erreur et un code d’erreur personnalisé de notre choix. Ici, je passe le message « Division par zéro impossible » et je choisis le code « 15 ».

Ce code va être très utile dans le cas d’un « vrai » site si on souhaite effectuer un suivi et un rapport des erreurs survenues puisqu’on va ainsi pouvoir identifier très rapidement et précisément les erreurs.

Dès qu’une exception est lancée, il va falloir l’attraper. On va faire cela dans un deuxième bloc catch. Le but de ce bloc va déjà être de capturer une exception si une exception a été lancée. Ici, si c’est le cas, on place les informations liées à l’exception dans $e (le nom $e est choisi arbitrairement, vous pouvez choisir le nom de votre choix).

Au sein du bloc catch, nous allons préciser les actions à mener en cas d’exception. Ici, on se contente de renvoyer notre message d’erreur, notre code d’erreur et le fichier dans lequel l’exception a été lancée.

Pour comprendre ce code, vous devez savoir que $e est un objet de la classe Exception et que la classe Exception possède des méthodes dont notamment :

- getMessage() qui va renvoyer le message d’erreur défini lors du lancement de l’exception ;
- getCode() qui va renvoyer le code d’erreur défini lors du lancement de l’exception ;
- getFile() qui va renvoyer le chemin du fichier depuis lequel l’exception a été lancée ;
- getLine() qui va renvoyer la ligne du fichier depuis lequel l’exception a été lancée.

Finalement, on va exécuter le code potentiellement problématique dans un bloc try (bloc « d’essai »). Si aucune erreur n’est rencontrée, alors aucune exception ne sera lancée et le code s’exécutera normalement. Si une erreur est rencontrée, alors une exception sera lancée et attrapée dans le bloc catch dans lequel on va décider de la marche à suivre.

# Les exceptions et les erreurs en PHP 7

L’une des grandes limites du PHP 5 est qu’il était quasiment impossible de gérer des erreurs fatales. En effet, une erreur fatale n’appelait pas le gestionnaire d’erreurs défini dans set_error_handler() et il était également impossible de lancer une exception en cas d’erreur fatale.

Ainsi, en PHP 5, dès qu’une erreur fatale était rencontrée, le script s’arrêtait brutalement. Certains développeurs disent qu’il s’agit là d’un comportement normal puisqu’une erreur fatale ne devrait pas pouvoir être gérée d’une autre façon / ignorée. Ce point de vue est parfois vrai mais pas toujours justifié en fonction de l’erreur fatale.

La version 7 du PHP modifié cela et nous offre désormais un moyen de gérer certaines erreurs fatales via le lancement d’exceptions. La difficulté ici est que pour des raisons de rétrocompatibilité du code (cohérence entre différentes versions de PHP qui coexistent), les exceptions lancées par les erreurs fatales ne vont pas être des instances de la classe Exception mais d’une nouvelle classe créée en PHP 7 pour cela : la classe Error qui est très similaire dans sa construction à la classe Exception.

Note : A ce point du cours, vous n’êtes plus tout à fait débutants et il y a donc une notion que vous devriez intégrer et qui va grandement faciliter la compréhension des différents langages de programmation : les langages de programmation ne sont JAMAIS parfaits. Certains langages prennent des directions de développement puis reviennent sur leur pas ou intègrent de nouveaux composants au fil du temps. Cela fait que chaque langage dispose d’un héritage de composants désuets et que parfois il est difficile de maintenir un ensemble qui fasse du sens.

C’est le cas du PHP qui est un langage très performant mais cependant également très loin d’être parfait d’un point de vue sémantique et qui possède encore certains comportements qui ne font tout simplement aucun sens. Vous devez absolument garder cela en tête et essayer d’utiliser les langages au mieux tout en gardant à l’esprit que la perfection n’existe pas !

Retour à nos erreurs. Une nouvelle classe a donc été créée en PHP 7 pour utiliser les exceptions avec certains types d’erreurs. Pour apporter un peu de cohérence dans la gestion des erreurs et tenter une unification, une interface a également été créée : l’interface Throwable.

Cette interface est en PHP 7 l’interface de base pour tout objet qui peut être jeté ou lancé grâce à la déclaration throw et va être implémentée à la fois par la classe Error et par la classe Exception.

On va ainsi pouvoir utiliser l’interface Throwable pour attraper à la fois des exceptions issues de la classe Exception et des exceptions issues de la classe Error.

Cependant, comme Throwable est une interface, on ne va pas pouvoir l’instancier directement.

En PHP 7, lorsqu’une erreur fatale et récupérable (erreur fatale de type « recoverable ») survient, une exception de la classe Error est automatiquement lancée. On va ainsi pouvoir l’attraper dans un bloc catch comme nos exceptions « classiques » à part que cette fois-ci le bloc catch devra utiliser la syntaxe catch(Error $e){} ou éventuellement plus généralement catch(Throwable $t){} qui va permettre d’attraper les exceptions issues de la classe Error et celles de la classe Exception.

Notez qu’il est généralement considéré comme une bonne pratique d’utiliser les classes les plus précises pour attraper les exceptions et les gérer de la meilleure façon.

Regardez l’exemple ci-dessous pour bien comprendre :

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
            try{
                bonjour();
            }
            catch(Error $e){
               echo $e->getMessage();
            }
            
            echo '<br><br>';
            
            try{
                if(!function_exists('test')){
                    throw new Error('La fonction n\'est pas définie');
                }
            }
            catch(Error $e){
               echo $e->getMessage();
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-try-throw-catch-exception-error-resultat.png)

Ici, on commence par essayer d’appeler une fonction bonjour() qui n’est pas définie. Vous devez savoir que lorsqu’on tente d’exécuter une fonction non définie, le PHP lève une erreur fatale. En PHP 7, une exception de la classe Error est également lancée. On capture cette erreur dans le bloc catch juste en dessous et on affiche les informations relatives à l’erreur avec la méthode getMessage() de la classe Error.

On va ensuite gérer une autre erreur du même type en lançant nous-même l’exception cette fois-ci pour personnaliser le message par exemple. Pour cela, on utilise la fonction function_exists() qui vérifie si une fonction a été définie et renvoie true si c’est le cas ou false dans le cas contraire.

Ici, on demande à function_exists() de vérifier si une fonction test() a été définie. Ce n’est pas le cas ; notre fonction va donc renvoyer false et on va lancer une exception issue de la classe Error en précisant un message personnalisé.

Ici, notez bien qu’on rentre dans le if lorsque function_exists() renvoie false puisqu’on a utilisé l’opérateur ! pour inverser la valeur logique de notre test.

Ensuite, on utilise un bloc catch pour capturer l’exception et renvoyer le message personnalisé.

Ici, nous ne faisons qu’echo les informations relatives à l’erreur, ce qui n’est pas très utile en soi. Cependant, vous allez pouvoir définir toute sorte de code dans votre bloc catch pour dicter le comportement du script en cas d’exception.

# Le bloc finally

Depuis PHP 5.5, on va pouvoir spécifier un bloc finally à la suite des blocs catch.

L’intérêt principal de ce bloc est que le code contenu dans finally sera toujours exécuté à la suite des blocs try et catch et avant la reprise de l’exécution normale du script, et ceci qu’une exception ait été lancée ou pas.

On va donc vouloir utiliser ce bloc lorsqu’on souhaite absolument qu’un code s’exécute quelle que soit la situation, comme par exemple dans le cas où on voudrait fermer une connexion à une base de données.

La grande différence entre un code dans un bloc finally et un code dans l’espace global du script (en dehors des blocs cités précédemment) est qu’un code suivant les blocs try et finally et en dehors de ceux-ci ne sera pas exécuté dans le cas où une exception a été lancée mais pas attrapée (car dans ce cas une erreur fatale sera levée).

Regardez plutôt l’exemple ci-dessous :
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
            try{
                bonjour();
            }
            finally{
                echo 'Toujours affiché';
            }
            echo 'Non affiché ici car exception lancée et non capturée';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-exception-finally-resultat.png)