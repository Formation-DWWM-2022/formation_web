## Lecture de fichiers [35 min] -> Q/R

<https://grafikart.fr/tutoriels/file-get-contents-1125#autoplay>

Dans cette nouvelle section, nous allons apprendre à manipuler des fichiers en PHP. Nous allons ainsi apprendre à ouvrir et lire un fichier déjà existant ou à créer des fichiers de différents formats (fichiers texte, etc.) grâce aux fonctions PHP et à écrire des informations dedans.

Le PHP met à notre disposition de nombreuses fonctions nous permettant de travailler avec les fichiers (quasiment une centaine !) car la manipulation de fichiers est un sujet complexe et pour lequel les problématiques peuvent être très différentes et très précises.

Nous n’allons pas dans ce cours explorer le sujet à 100% car cela serait très indigeste et rajouterait beaucoup de complexité « inutilement » mais allons plutôt présenter les cas de manipulation de fichiers les plus généraux et les fonctions communes liées.

## La manipulation de fichiers en PHP

En PHP, nous allons pouvoir manipuler différents types de fichiers comme des fichiers texte (au format .txt) ou des fichiers image par exemple. Bien évidemment, nous n’allons pas pouvoir effectuer les mêmes opérations sur chaque type de fichier.

Dans ce cours, nous allons particulièrement nous intéresser à la manipulation de fichiers texte puisque ce sont les fichiers qu’on manipule le plus souvent en pratique et car nous allons pouvoir stocker du texte dans ce type de fichier.

En effet, jusqu’à présent, nous n’avons appris à stocker des informations que de manière temporaire en utilisant les variables « classiques », les cookies ou les sessions. L’utilisation de fichiers en PHP va nous permettre entre autres de stocker de façon définitive des informations.

Les fichiers vont donc nous offrir une alternative aux bases de données qui servent également à stocker des informations de manière organisée et définitive et que nous étudierons plus tard dans le cours même s’il faut bien admettre qu’on préférera dans la majorité des cas utiliser les bases de données plutôt que les fichiers pour enregistrer les données.

Il reste néanmoins intéressant d’apprendre à stocker des données dans des fichiers car on préfèrera dans certains cas stocker des données dans des fichiers plutôt que dans des bases de données (par exemple lorsqu’on laissera la possibilité aux utilisateurs de télécharger ensuite le fichier avec ses différentes informations à l’intérieur).

Par ailleurs, la manipulation de fichiers ne se limite pas au stockage de données : nous allons pouvoir effectuer toutes sortes d’opérations sur nos fichiers ce qui représente un avantage indéniable.

## Lire un fichier entier en PHP

L’une des opérations de base relative aux fichiers en PHP va tout simplement être de lire le contenu d’un fichier.

Il existe deux façons de faire cela : on peut soit lire le contenu d’un fichier morceau par morceau, chose que nous apprendrons à faire dans la prochaine leçon, soit lire un fichier entièrement c’est-à-dire afficher tout son contenu d’un coup.

Pour faire cela, on va pouvoir utiliser l’une des fonctions suivantes :

- La fonction file_get_contents() ;
- La fonction file() ;
- La fonction readfile () ;

On va devoir passer le chemin relatif menant au fichier qu’on souhaite lire en argument de chacune de ces fonctions.

La fonction file_get_contents() va retourner le contenu du fichier dans une chaine de caractères qu’il faudra echo pour afficher ou la valeur booléenne false en cas d’erreur.

La fonction file() est identique à file_get_contents() à la seule différence que le contenu du fichier sera renvoyé dans un tableau numéroté. Chaque ligne de notre fichier sera un nouvel élément de tableau.

La fonction readfile() va elle directement lire et afficher le contenu de notre fichier.

Pour illustrer le fonctionnement de ces trois fonctions, je vous invite à créer un premier fichier de texte, c’est-à-dire un fichier enregistré avec l’extension .txt.

Personnellement, j’utiliserai un fichier que j’ai appelé exemple.txt et qui contient le texte suivant :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fichier-texte-exemple.png)

Pour créer ce fichier texte, vous pouvez par exemple vous servir de votre éditeur. Je vous conseille ici de l’enregistrer dans le même dossier que notre fichier cours.php pour plus de simplicité.

Dès que le fichier est créé et enregistré, nous allons tenter de l’afficher dans notre script :

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
            echo file_get_contents('test.txt');
            echo '<br><br>';
            
            echo '<pre>';
            print_r(file('test.txt'));
            echo '</pre>';
            echo '<br><br>';
            
            readfile('test.txt');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-lecture-fichier-file-get-contents-readfile-resultat.png)

Ici, on utilise nos trois fonctions file_get_contents(), file() et readfile() à la suite pour lire et afficher notre fichier. Comme vous pouvez le voir, file_get_contents() et readfile() produisent un résultat similaire mais il faut echo le résultat renvoyé par file_get_contents() pour l’afficher tandis que readfile() affiche directement le résultat.

La fonction file_get_contents() nous donne donc davantage de contrôle sur la valeur renvoyée puisqu’on va pouvoir l’enfermer dans une variable pour la manipuler à loisir.

## Conserver la mise en forme d’un fichier avant affichage

Dans l’exemple ci-dessus, on s’aperçoit que les retours à la ligne et les sauts de ligne contenus dans notre fichier texte ne sont pas conservés lors de l’affichage du texte dans le navigateur.

Cela est normal puisque nos fonctions vont renvoyer le texte tel quel sans y ajouter des éléments HTML indiquant de nouvelles lignes ou des sauts de ligne et donc le navigateur va afficher le texte d’une traite.

Pour conserver la mise en forme du texte, on va pouvoir utiliser la fonction nl2br() qui va se charger d’ajouter des éléments br devant chaque nouvelle ligne de notre texte. On va passer le texte à mettre en forme en argument de cette fonction.

On va par exemple pouvoir utiliser cette fonction sur le résultat renvoyé par file_get_contents() avant de l’afficher. En revanche, on ne va pas pouvoir l’utiliser avec readfile() puisque cette fonction va directement afficher le résultat sans que nous puissions exercer un quelconque contrôle dessus.

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
            echo nl2br(file_get_contents('test.txt'));
            echo '<br><br>';
            
            echo '<pre>';
            print_r(file('test.txt'));
            echo '</pre>';
            echo '<br><br>';
            
            readfile('test.txt');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-retour-ligne-fichier-nl2br-resultat.png)

Ici, on effectue plusieurs opérations en une seule ligne. Comme d’habitude, lorsqu’on utilise plusieurs fonctions ensemble, c’est la fonction la plus interne dans notre code qui va s’exécuter en premier puis la fonction qui l’englobe va s’exécuter ensuite sur le résultat de la première fonction.

Dans notre cas, file_get_contents() s’exécute donc en premier et renvoie le contenu de notre fichier puis nl2br() s’exécute ensuite sur le résultat renvoyé par file_get_contents() (c’est-à-dire le texte de notre fichier) et ajoute des éléments br à chaque nouveau retour à la ligne. Finalement, la structure de langage echo permet d’afficher le résultat (le texte avec nos éléments br.

Souvent, cependant, nous ne voudrons lire et récupérer qu’une partie d’un fichier.

## Ouvrir un fichier en PHP

Pour lire un fichier partie par partie, nous allons avant tout devoir l’ouvrir. Pour ouvrir un fichier en PHP, nous allons utiliser la fonction fopen(), abréviation de « file open » ou « ouverture de fichier » en français.

On va devoir passer le chemin relatif menant à notre fichier ainsi qu’un « mode » en arguments à cette fonction qui va alors retourner en cas de succès une ressource de pointeur de fichier, c’est-à-dire pour le dire très simplement une ressource qui va nous permettre de manipuler notre fichier.

Le mode choisi détermine le type d’accès au fichier et donc les opérations qu’on va pouvoir effectuer sur le fichier. On va pouvoir choisir parmi les modes suivants :

| Mode d’ouverture | Description
| --- | ---
| r | Ouvre un fichier en lecture seule. Il est impossible de modifier le fichier.
| r+ | Ouvre un fichier en lecture et en écriture.
| a | Ouvre un fichier en écriture seule en conservant les données existantes. Si le fichier n’existe pas, le PHP tente de le créer.
| a+ | Ouvre un fichier en lecture et en écriture en conservant les données existantes. Si le fichier n’existe pas, le PHP tente de le créer.
| w | Ouvre un fichier en écriture seule. Si le fichier existe, les informations existantes seront supprimées. S’il n’existe pas, crée un fichier.
| w+ | Ouvre un fichier en lecture et en écriture. Si le fichier existe, les informations existantes seront supprimées. S’il n’existe pas, crée un fichier.
| x | Crée un nouveau fichier accessible en écriture seulement. Retourne false et une erreur si le fichier existe déjà.
| x+ | Crée un nouveau fichier accessible en lecture et en écriture. Retourne false et une erreur si le fichier existe déjà.
| c | Ouvre un fichier pour écriture seulement. Si le fichier n’existe pas, il sera crée. Si il existe, les informations seront conservées.
| c+ | Ouvre un fichier pour lecture et écriture. Si le fichier n’existe pas, il sera crée. Si il existe, les informations seront conservées.
| e | Le mode e est particulier et n’est pas toujours disponible. Nous n’en parlerons pas ici.

Comme vous pouvez le constater, le choix du mode influe fortement sur les opérations que nous allons pouvoir réaliser sur le fichier en question.

Par exemple lorsqu’on ouvre un fichier en lecture seulement toute modification de ce fichier est impossible, ce qui n’est pas le cas si on choisit un mode permettant l’écriture dans ce fichier.

Notez par ailleurs qu’on ajoutera généralement la lettre b au paramètre « mode » de fopen(). Cela permet une meilleure compatibilité et évite les erreurs pour les systèmes qui différencient les fichiers textes et binaires comme Windows par exemple.

## Lire un fichier partie par partie

PHP met à notre disposition plusieurs fonctions qui vont nous permettre de lire un fichier partie par partie :

- La fonction fread() ;
- La fonction fgets() ;
- La fonction fgetc().

### Lire un fichier jusqu’à un certain point avec fread()

La fonction fread() (abréviation de « file read » ou « lecture de fichier » en français) va prendre en arguments le fichier renvoyé par fopen() ainsi qu’un nombre qui correspond aux nombres d’octets du fichier qui doivent être lus.

Pour lire le fichier entièrement, on peut utiliser la fonction filesize() en lui passant le nom du fichier qu’on souhaite lire en deuxième argument de fread(). En effet, filesize() renvoie la taille d’un fichier. Cela va donc nous permettre de lire entièrement un fichier à condition de commencer la lecture au début.

Illustrons cela avec un exemple concret. Pour cet exemple, je réutilise le fichier test.txt créé dans la leçon précédente.

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
            $ressource = fopen('test.txt', 'rb');
            echo fread($ressource, filesize('test.txt'));
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fopen-fread-resultat.png)

Ici, on commence par utiliser fopen() pour lire notre fichier et on récupère la ressource renvoyée par la fonction dans une variable $ressource.

On passe ensuite le contenu de notre variable à fread() et on lui demande de lire le fichier jusqu’au bout en lui passant la taille exacte du fichier obtenue avec filesize().

Finalement, on affiche le résultat renvoyé par fread() grâce à une structure echo.

### Lire un fichier ligne par ligne avec fgets()

La fonction fgets() va nous permettre de lire un fichier ligne par ligne. On va passer le résultat renvoyé par fopen() en argument de fgets() et à chaque nouvel appel de la fonction, une nouvelle ligne du fichier va pouvoir être lue.

On peut également préciser de manière facultative un nombre en deuxième argument de fgets() qui représente un nombre d’octets. La fonction lira alors soit le nombre d’octets précisé, soit jusqu’à la fin du fichier, soit jusqu’à arriver à une nouvelle ligne (le premier des trois cas qui va se présenter). Si aucun nombre n’est précisé, fgets() lira jusqu’à la fin de la ligne.

Notez que si on précise un nombre d’octets maximum à lire inférieur à la taille de notre ligne et qu’on appelle successivement fgets(), alors la fin de la ligne courante sera lue lors du deuxième appel de fgets().

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
            $ressource = fopen('test.txt', 'rb');
            
            //Lit les 30 premiers caractères du fichier
            echo 'Premier appel : ' .fgets($ressource, 30). '<br>';
            
            //Lit le reste de la première ligne
            echo 'Deuxième  appel : ' .fgets($ressource). '<br>'; 
            
            //Lit la deuxième ligne du fichier
            echo 'Troisième appel : ' .fgets($ressource). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fgets-resultat.png)

### Lire un fichier caractère par caractère avec getc()

Dans certains cas, il va également être intéressant de lire un fichier caractère par caractère notamment pour récupérer un caractère en particulier ou pour arrêter la lecture lorsqu’on arrive à un certain caractère.

Pour faire cela, nous allons cette fois-ci utiliser la fonction fgetc(). Cette fonction va s’utiliser exactement comme fgets(), et chaque nouvel appel à la fonction va nous permettre de lire un nouveau caractère de notre fichier. Notez que les espaces sont bien entendus considérés comme des caractères.

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
            $ressource = fopen('test.txt', 'rb');
            
            //Lit le premier caractère du fichier
            echo 'Premier appel : ' .fgetc($ressource). '<br>';
            
            //Lit le deuxième caractère
            echo 'Deuxième  appel : ' .fgetc($ressource). '<br>'; 
            
            //Lit le troisième caractère
            echo 'Troisième appel : ' .fgetc($ressource). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fgetc-resultat.png)

## Trouver la fin d’un fichier de taille inconnue

Dans ce cours, nous travaillons pour l’instant sur des exemples simples. Ici, par exemple, nous avons nous mêmes créé un fichier pour effectuer différentes opérations dessus.

En pratique, cependant, nous utiliserons généralement les fichiers pour stocker des informations non connues à l’avance. Dans ce cas-là, il est impossible de prévoir à l’avance la taille de ces fichiers et on risque donc de ne pas pouvoir utiliser les fonctions fgets() et fgetc() de manière optimale.

Il existe plusieurs moyens de déterminer la taille ou la fin d’un fichier. La fonction filesize(), par exemple, va lire la taille d’un fichier. Dans le cas présent, cependant, nous cherchons plutôt à déterminer où se situe la fin d’un fichier (ce qui n’est pas forcément équivalent à la taille d’un fichier à cause de la place du curseur, notion que nous allons voir en détail par la suite).

La fonction PHP feof() (« eof » signifie « end of the file » ou « fin du fichier ») va nous permettre de savoir si la fin d’un fichier a été atteinte ou pas. Dès que la fin d’un fichier est atteinte, cette fonction va renvoyer la valeur true. Avant cela, elle renverra la valeur false. On va donc pouvoir utiliser cette fonction pour boucler dans un fichier de taille inconnue.

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
            $res = fopen('test.txt', 'rb');
            
            /*Tant que la fin du fichier n'est pas atteninte, c'est-à-dire
             *tant que feof() renvoie FALSE (= tant que !feof() renvoie TRUE)
             *on echo une nouvelle ligne du fichier*/
            while(!feof($res)){
                $ligne = fgets($res);
                echo 'La ligne "' .$ligne. '" contient
                ' .strlen($ligne). ' caractères <br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-feof-resultat.png)

Ici, tant que la fin du fichier n’est pas atteinte, on affiche une nouvelle ligne de notre fichier et on calcule le nombre de caractères de la ligne grâce à la fonction strlen(), abréviation de « string length » ou « longueur de la chaine » en français.

Notez qu’ici le fait de retourner à la ligne compte comme un caractère et que la fonctions fgets() s’arrête après ce passage à la ligne. C’est la raison pour laquelle lorsqu’on compte le nombre de caractères de nos lignes, on a un caractère de plus que ce à quoi on pouvait s’attendre (sauf pour la dernière).

## La place du curseur interne ou pointeur de fichier

La position du curseur (ou « pointeur de fichier ») va impacter le résultat de la plupart des manipulations qu’on va pouvoir effectuer sur les fichiers. Il est donc essentiel de toujours savoir où se situe ce pointeur et également de savoir comment le bouger.

Le curseur ou pointeur est l’endroit dans un fichier à partir duquel une opération va être faite. Pour donner un exemple concret, le curseur dans un document Word, dans un champ de formulaire ou lorsque vous effectuez une recherche Google ou tapez une URL dans votre navigateur correspond à la barre clignotante.

Ce curseur indique l’emplacement à partir duquel vous allez écrire votre requête ou supprimer un caractère, etc. Le curseur dans les fichiers va être exactement la même chose à la différence qu’ici on ne peut pas le voir visuellement.

Le mode d’ouverture choisi va être la première chose qui va influer sur la position du pointeur. En effet, selon le mode choisi, le pointeur de fichier va se situer à une place différente et va pouvoir ou ne va pas pouvoir être déplacé :
| Mode utilisé | Position du pointeur de fichier
| --- | ---
| r / r+  | Début du fichier
| a / a+  | Fin du fichier
| w / w+  | Début du fichier
| x / x+  | Début du fichier
| c / c+  | Début du fichier

Ensuite, vous devez également savoir que certaines fonctions vont modifier la place du curseur à chaque exécution. Cela va par exemple être le cas des fonctions fgets() et fgetc() qui servent à lire un fichier ligne par ligne ou caractère par caractère.

En effet, la première fois qu’on appelle fgets() par exemple, le pointeur est généralement au début de notre fichier et c’est donc la première ligne de notre fichier est lue par défaut. Cependant, lors du deuxième appel à cette fonction, c’est bien la deuxième ligne de notre fichier qui va être lue.

Ce comportement est justement dû au fait que la fonction fgets() déplace le pointeur de fichier du début de la première ligne au début de la seconde ligne dans ce cas précis.

Pour savoir où se situe notre pointeur de fichier, on peut utiliser la fonction ftell() qui renvoie la position courante du pointeur. Nous allons devoir lui passer la valeur renvoyée par fopen() pour qu’elle fonctionne correctement.

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
            $res = fopen('test.txt', 'rb');
            
            while(!feof($res)){
              echo 'Le pointeur est au niveau du caractère ' .ftell($res). '<br>';
              $ligne = fgets($res);
              echo 'La ligne "' .$ligne. '" contient
              ' .strlen($ligne). ' caractères <br><br>';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-ftell-resultat.png)

## Déplacer le curseur manuellement

Pour commencer la lecture d’un fichier à partir d’un certain point, ou pour écrire dans un fichier à partir d’un endroit précis ou pour toute autre manipulation de ce type, nous allons avoir besoin de contrôler la position du curseur. Pour cela, nous allons pouvoir utiliser la fonction fseek().

Cette fonction va prendre en arguments l’information renvoyée par fopen() ainsi qu’un nombre correspondant à la nouvelle position en octets du pointeur.

La nouvelle position du pointeur sera par défaut calculée par rapport au début du fichier). Pour modifier ce comportement et faire en sorte que le nombre passé s’ajoute à la position courante du curseur, on peut ajouter la constante SEEK_CUR en troisième argument de fseek().

Notez cependant que si vous utilisez les modes a et a+ pour ouvrir votre fichier, utiliser la fonction fseek() ne produira aucun effet et votre curseur se placera toujours en fin de fichier.

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
          $res = fopen('test.txt', 'rb');
            
          echo 'Le pointeur est derrière le caractère ' .ftell($res). '<br>';
          echo 'Le caractère ' .(ftell($res) + 1). ' est un ' .fgetc($res). '<br>';
          echo 'Le pointeur est derrière le caractère ' .ftell($res). '<br>';
          fseek($res, 20);
          echo 'Le pointeur est derrière le caractère ' .ftell($res). '<br>';
          echo 'Le caractère ' .(ftell($res) + 1). ' est un ' .fgetc($res). '<br>';
          echo 'Le pointeur est derrière le caractère ' .ftell($res). '<br>';
          fseek($res, 40, SEEK_CUR);
          echo 'Le pointeur est derrière le caractère ' .ftell($res). '<br>';
          echo 'Le caractère ' .(ftell($res) + 1). ' est un ' .fgetc($res). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fseek-resultat.png)

## Fermer un fichier

Pour fermer un fichier en PHP, nous utiliserons cette fois la fonction fclose().

On va une nouvelle fois passer le résultat renvoyé par fopen() en argument de cette fonction.

Notez que la fermeture d’un fichier n’est pas strictement obligatoire. Cependant, cela est considéré comme une bonne pratique : cela évite d’user inutilement les ressources de votre serveur.

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
          $res = fopen('test.txt', 'rb');
            
          echo fread($res, filesize('test.txt'));
          fclose($res);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fclose-resultat.png)

## Écriture de fichiers [16 min] -> Q/R

<https://grafikart.fr/tutoriels/file-put-contents-1126#autoplay>

Dans la leçon précédente, nous avons appris à ouvrir un fichier et avons découvert l’importance du mode d’ouverture qui va conditionner les opérations qu’on va pouvoir effectuer sur le fichier ouvert.

Nous avons également appris à gérer la place du pointeur, ce qui va se révéler essentiel pour écrire dans un fichier en PHP contenant déjà du texte.

Nous allons apprendre à créer un fichier et à écrire dans un fichier vierge ou contenant déjà du texte.

## Créer et écrire dans un fichier en PHP : les méthodes disponibles

Il existe différentes façons de créer un fichier et d’écrire dans un fichier déjà existant ou pas et contenant déjà du texte ou pas en PHP.

Les deux façons les plus simples vont être d’utiliser soit la fonction file_put_contents(), soit les fonctions fopen() et fwrite() ensemble.

Notez déjà que l’utilisation des fonctions fopen() et fwrite() va nous donner plus de contrôle sur notre écriture, en nous permettant de choisir un mode d’ouverture, d’écrire à un endroit du fichier, etc.

## Écrire dans un fichier avec file_put_contents()

La fonction file_put_contents() va nous permettre d’écrire simplement des données dans un fichier.

Cette fonction va accepter en argument le chemin vers le fichier dans lequel on doit écrire les données, les données à écrire (qui peuvent être une chaine de caractères ou un tableau) ainsi qu’un drapeau (nous reviendrons là-dessus plus tard).

Si le fichier spécifié dans le chemin du fichier n’existe pas, alors il sera créé. S’il existe, il sera par défaut écrasé, ce qui signifie que ses données seront supprimées.

Vous pouvez déjà noter qu’appeler file_put_contents() correspond à appeler successivement les fonctions fopen(), fwrite() et fclose().

Utilisons immédiatement cette fonction pour écrire dans un premier fichier :

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
            file_put_contents('exemple.txt', 'Ecriture dans un fichier');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-file-put-contents-fichier-vide-resultat.png)

Ici, on passe le chemin de fichier exemple.txt à notre fonction file_put_contents(). On va donc chercher un fichier qui s’appelle exemple.txt et qui se situe dans le même répertoire que notre script.

Comme ce fichier n’existe pas, il va être créé et le texte précisé en deuxième argument de notre fonction va être inséré dedans.

Note : Pensez bien à exécuter votre script en rechargeant l’URL de la page dans votre navigateur à chaque fois pour que les différentes opérations dans le script s’exécutent bien !

Si on essaie maintenant de répéter l’opération et d’écrire un texte différent dans notre fichier, on s’aperçoit que le nouveau texte remplace l’ancien qui est écrasé. C’est le comportement par défaut :

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
            file_put_contents('exemple.txt', 'Ecriture dans un fichier');
            file_put_contents('exemple.txt', '**NOUVEAU TEXTE**');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-file-put-contents-fichier-texte-resultat.png)

Pour « ajouter » du texte à notre fichier, une astuce simple consiste ici à récupérer le texte d’origine de notre fichier dans une variable, puis à le concaténer avec le texte qu’on souhaite écrire dans notre fichier, puis à passer le nouveau texte à file_put_contents(). L’ancien contenu du fichier sera alors remplacé par le nouveau comme précédemment.

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
            //On écrit un premier texte dans notre fichier  
            file_put_contents('exemple.txt', 'Ecriture dans un fichier');
            
            //On récupère le contenu du fichier
            $texte = file_get_contents('exemple.txt');
            
            //On ajoute notre nouveau texte à l'ancien
            $texte .= "\n**NOUVEAU TEXTE**";
            
            //On écrit tout le texte dans notre fichier
            file_put_contents('exemple.txt', $texte);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-file-put-contents-ajout-texte-concatenation-resultat.png)

Ici, vous pouvez noter que j’utilise le caractère \n. Celui-ci sert à créer un retour à la ligne en PHP. Ici, on l’utilise donc que notre nouveau texte soit inséré dans la ligne suivante de notre fichier. On est obligés d’utiliser des guillemets plutôt que des apostrophes ici pour que le \n soit bien interprété comme un retour à la ligne par le PHP.

Cette astuce pour rajouter du texte dans un fichier fonctionne mais nous force finalement à faire plusieurs opérations et à écraser le contenu de base du fichier pour placer le nouveau (qui contient le contenu original).

Pour maintenant véritablement conserver les données de base de notre fichier et lui ajouter de nouvelles données à la suite des données déjà précédentes, on va également plus simplement pouvoir passer le drapeau FILE_APPEND en troisième argument de notre fonction file_put_contents().

Un drapeau est une constante qui va correspondre à un nombre. De nombreuses fonctions utilisent des drapeaux différents. Le drapeau ou la constante FILE_APPEND va ici nous permettre d’ajouter des données en fin de fichier (c’est-à-dire à la suite du texte déjà existant) plutôt que d’écraser les données déjà existantes.

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
            //On écrit un premier texte dans notre fichier  
            file_put_contents('exemple.txt', 'Ecriture dans un fichier');
            
            //On rajoute du texte dans notre fichier
            file_put_contents('exemple.txt', "\n**NOUVEAU TEXTE**", FILE_APPEND);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-file-put-contents-ajout-texte-file-append-resultat.png)

Ici, on utilise une première fois file_put_contents() sans le drapeau FILE_APPEND pour écrire Ecriture dans un fichier dans notre fichier. Ce texte va donc écraser les données déjà présentes dans notre fichier. Ensuite, on rajoute un autre texte en utilisant notre drapeau.

## Créer un fichier PHP avec fopen()

Pour créer un nouveau fichier en PHP (sans forcément écrire dedans), nous allons à nouveau utiliser la fonction fopen(). En effet, rappelez-vous que cette fonction va pouvoir créer un fichier si celui-ci n’existe pas à condition qu’on utilise un mode adapté.

Pour créer un fichier avec fopen(), nous allons devoir lui passer en arguments un nom de fichier qui sera le nom du fichier créé ainsi qu’un mode d’ouverture adapté. En mentionnant simplement cela, le fichier sera par défaut créé dans le même dossier que notre page PHP.

Essayons immédiatement de créer un fichier qu’on va appeler exemple2.txt.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fopen-creation-fichier.png)

Ici, nous créons un nouveau fichier avec le mode c+. Le fichier est donc accessible en lecture et en écriture et si celui-ci existait et contenait déjà des informations, celles-ci ne seraient pas effacées à la différence du mode w+.

On pense bien également à rajouter l’option b (pour binaire) afin de maximiser la compatibilité pour les différents systèmes.

Bien évidemment, afin de véritablement créer le fichier, le code de votre page doit être exécuté. Pensez donc bien toujours à ouvrir votre fichier .php dans votre navigateur pour exécuter le script au moins une fois.

Une fois cela fait, vous pouvez aller vérifier dans le dossier contenant votre page PHP qu’un fichier nommé exemple2.txt a bien été créé.

## Écrire dans un fichier avec fwrite()

Une fois un fichier ouvert ou créé avec fopen(), on va pouvoir écrire dedans en utilisant la fonction fwrite().

Cette fonction va prendre la valeur retournée par fopen() ainsi que la chaine de caractères à écrire dans le fichier en arguments.

Si notre fichier est vide, on va très simplement pouvoir écrire du texte dedans :

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
            $fichier = fopen('exemple2.txt', 'c+b');
            fwrite($fichier, 'Un premier texte dans mon fichier');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fwrite-fichier-vide-resultat.png)

Dans le cas où le fichier ouvert contient déjà du texte, cela va être un peu plus complexe. En effet, il va déjà falloir se poser la question d’où se situe notre pointeur.

Si on utilise la fonction fwrite() plusieurs fois de suite, le texte va être ajouté à la suite car fwrite() va déplacer le pointeur après le texte inséré après chaque utilisation.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fwrite-plusieurs-appels.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fwrite-plusieurs-appels-resultat.png)

Le problème va si situer lors de la première utilisation de fwrite() dans un fichier qui contient déjà du texte. En effet, la plupart des modes de fopen() vont placer le curseur en début de fichier. Les informations vont donc être écrites par-dessus les anciennes.

Regardez plutôt l’exemple suivant.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fwrite-fichier-texte.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fwrite-fichier-texte-resultat.png)

Ici, notre fichier contient le texte « Un premier texte dans mon fichier. Un autre texte » lors de son ouverture. Lors du premier appel à fwrite(), le curseur se situe au début du fichier. Les informations « abc » vont alors être écrites par-dessus celles déjà présentes.

Après sa première utilisation, fwrite() déplace le curseur à la fin du texte ajouté, c’est-à-dire juste derrière le caractère « c ». Si on appelle fwrite() à nouveau immédiatement après, les nouvelles informations vont être insérées après le « c ».

On va ici pouvoir utiliser la fonction fseek() pour modifier la position du pointeur et écrire à partir d’un autre endroit dans le fichier. En faisant cela, le nouveau texte sera écrit à partir d’un certain point dans le fichier. Si on tente d’écrire du texte au milieu du fichier, cependant, les données déjà présentes à cet endroit continueront d’être écrasées.

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
            /*Notre fichier contient toujours le texte :
             *"abcdefmier texte dans mon fichier. Un autre texte"
             *ajouté précédemment*/
            $fichier = fopen('exemple2.txt', 'c+b');
            fwrite($fichier, 'abc');
            fwrite($fichier, 'def');
            
            //On déplace le curseur de 20 octets
            fseek($fichier, 20, SEEK_CUR);
            fwrite($fichier, 'ghijk');
            
            //On place le curseur en fin de fichier
            fseek($fichier, filesize('exemple2.txt'));
            fwrite($fichier, 'lmnop');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fwrite-fseek-resultat.png)

Si on souhaite rajouter du texte au milieu d’un fichier tout en conservant le texte précédent, nous allons devoir procéder en plusieurs étapes.

L’idée va être ici de récupérer la première partie du texte de notre fichier jusqu’au point d’insertion du nouveau contenu, puis de concaténer le nouveau contenu à ce texte, puis de de récupérer la deuxième partie du texte de notre fichier et de la concaténer au reste avant de finalement écrire le tout dans notre fichier.

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
            /*On appelle fopen() avec le mode c : le pointeur se situe
             *au début du fichier. Le fichier contient le texte :
             *"abcdefmier texte dans mon ghijker. Un autre textelmnop"*/
            $fichier = fopen('exemple2.txt', 'c+b');
            
            /*On lit les 20 premiers octets du fichier avec fread(), le
             *pointeur se situe là où fread() arrête sa lecture*/
            $texte = fread($fichier, 20);
            
            //On ajoute du texte dans notre variable
            $texte .= ' TEXTE AJOUTE AU MILIEU ';
            
            /*On lit la suite du fichier (fread() reprend sa lecture là où se
             *trouve le pointeur) et on ajoute le texte lu dans $texte*/
            $texte .= fread($fichier, filesize('exemple2.txt'));
            
            /*On replace le pointeur en début de fichier et on écrase l'ancien
             *texte avec le nouveau (qui est plus long)*/
            fseek($fichier, 0);
            fwrite($fichier, $texte);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fwrite-ecrire-milieu-fichier-resultat.png)

La chose importante dans le script ci-dessus est de bien toujours suivre le pointeur, qui va être déplacé par certaines de nos fonctions liées aux fichiers.

## Autres opérations sur les fichiers en PHP

Dans les leçons précédentes, nous avons découvert comment manipuler les fichiers et notamment comme les ouvrir, les lire et écrire dans nos fichiers en PHP.

Il existe d’autres types de manipulations moins courantes sur les fichiers comme le renommage de fichier ou la suppression que nous allons rapidement voir dans cette nouvelle leçon.

Nous allons également discuter des niveaux de permission des fichiers, un concept qu’il va être essentiel de comprendre et de maitriser pour travailler avec des fichiers sur un « vrai » site hébergé sur serveur distant.

## Tester l’existence d’un fichier

Le PHP met à notre disposition deux fonctions qui vont nous permettre de vérifier si un fichier existe et si un fichier est un véritable fichier.

La fonction file_exists() vérifie si un fichier ou si un dossier existe. On va devoir lui passer le chemin du fichier ou du dossier dont on souhaite vérifier l’existence en argument. Si le fichier ou le dossier existe bien, la fonction renverra le booléen true. Dans le cas contraire, elle renverra false.

La fonction is_file() indique si le fichier est un véritable fichier (et non pas un répertoire par exemple). Nous allons également devoir lui passer le chemin du fichier supposé en argument. Si le fichier existe et que c’est bien un fichier régulier, alors is_file() renverra le booléen true. Dans le cas contraire, elle renverra false.

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
            //Nous avons créé le fichier exemple.txt précédemment
            $f = 'exemple.txt';
            $d = 'jenexistepas.txt';
            
            if(file_exists($f)){
                if(is_file($f)){
                    echo 'Le fichier ' .$f. ' existe et est bien un fichier';
                }
                else{
                    echo $f. ' existe mais n\'est pas un fichier régulier';
                }
            }else{
                echo $f. ' n\'existe pas';
            }
            echo '<br><br>';
            if(file_exists($d)){
                if(is_file($d)){
                    echo 'Le fichier ' .$d. ' existe et est bien un fichier';
                }
                else{
                    echo $d. ' existe mais n\'est pas un fichier régulier';
                }
            }else{
                echo $d. ' n\'existe pas ';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-file-exists-test-existence-fichier-resultat.png)

## Renommer un fichier

La fonction rename() permet de renommer un fichier ou un dossier. On va devoir lui passer le nom d’origine du fichier ou du dossier et le nouveau nom en arguments.

Dans le cas où le nouveau nom choisi est le nom d’un fichier qui existe déjà, alors ce fichier sera écrasé et remplacé par notre fichier renommé.

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
            //Nous avons créé le fichier exemple.txt précédemment
            $f = 'exemple.txt';
            $d = 'jenexistepas.txt';
            
            if(file_exists($f)){
                if(is_file($f)){
                    $newf = 'fichier.txt';
                    rename($f, $newf);
                    echo 'Le fichier ' .$f. ' a été renommé en ' .$newf;
                }
                else{
                    echo $f. ' existe mais n\'est pas un fichier régulier';
                }
            }else{
                echo $f. ' n\'existe pas';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-rename-changement-nom-fichier-resultat.png)

Ici, on commence par vérifier que notre fichier existe et est bien un fichier régulier. Si c’est le cas, on le renomme en utilisant la fonction rename().

## Effacer un fichier

La fonction unlink() permet d’effacer un fichier. On va lui passer le chemin du fichier à effacer en argument. Cette fonction va retourner true si le fichier a bien été effacé ou false en cas d’erreur.

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
            $f = 'exemple2.txt';
            
            /*On fait deux opérations en une : on exécute unlink() et on effectue
             *notre test sur la valeur renvoyée. Si la fonctoiin renvoie true,
             *on indique que le fichier a bien été effacé*/ 
            if(unlink($f)){
                echo 'Le fichier ' .$f. ' a bien été effacé';
            }else{
                echo 'Le fichier ' .$f. ' n\'a pas pu être effacé';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-unlink-suppression-fichier-resultat.png)

## Introduction aux permissions des fichiers et au Chmod

Le sujet des permissions liés aux fichiers (et aux dossiers) est un sujet très vaste et complexe et nous n’allons ici que l’aborder en surface et dans les grandes lignes afin que vous puissiez comprendre la relation avec les fichiers en PHP.

Le système Linux (utilisés par la plupart des hébergeurs) définit différents types d’utilisateurs pouvant interagir avec les fichiers (et les dossiers) :

- Le propriétaire ;
- Les membres du groupe ;
- Les autres utilisateurs.

La façon dont est créé le système Linux permet à plusieurs utilisateurs d’avoir accès au système en même temps et va nous permettre de définir des groupes d’utilisateurs. Cependant, pour que le système fonctionne toujours bien, il a fallu définir différents niveaux de permission d’accès aux différents fichiers pour les différents utilisateurs.

Pour pouvoir manipuler des fichiers (ou le contenu de dossiers), c’est-à-dire effectuer des opérations dessus, nous allons donc avant tout avoir besoin de permissions. Différentes opérations (lecture du fichier, écriture, etc.) vont pouvoir nécessiter différents niveaux de permission.

Lorsqu’on travaille en local et sur nos propres fichiers on ne doit normalement pas avoir de problème de permissions puisque par défaut le système attribue généralement les permissions maximales au propriétaire du fichier.

Cependant, cela se complique lorsqu’on héberge notre site sur serveur distant et qu’on doit donner un accès aux différents utilisateurs à certains fichiers et c’est là qu’il faut bien faire attention aux différentes permissions accordées.

Les permissions d’accès accordées pour chaque groupe d’utilisateurs à un fichier (ou à un dossier) sont symbolisées par 3 chiffres allant de 0 à 7 ou par 3 lettres. Le premier caractère indique les droits accordés au propriétaire du fichier, le deuxième caractère indique les droits accordés au groupe et le troisième caractère indique les droits accordés aux autres utilisateurs.

Voici les permissions liées à chaque caractère :
| Droit | Valeur alphanumérique | Valeur octale
| --- | --- | --- |
| aucun droit | --- | 0
| exécution seulement | --x | 1
| écriture seulement | -w- | 2
| écriture et exécution | -wx | 3
| lecture seulement | r-- | 4
| lecture et exécution | r-x | 5
| lecture et écriture | rw- | 6
| tous les droits (lecture, écriture et exécution) | rwx | 7

Si un fichier ou un dossier possède les permissions 754 par exemple, cela signifie qu’on accorde tous les droits (lecture, écriture et exécution) sur les fichiers contenus dans ce dossier à l’auteur, des droits de lecture et d’exécution aux membres du groupe et des droits de lecture uniquement aux autres utilisateurs.

## Vérifier et modifier les permissions d’un fichier

Pour vérifier les permissions d’un fichier d’un fichier ou d’un dossier manuellement, on va déjà pouvoir tout simplement effectuer un clic droit dessus et afficher les informations liées à celui-ci.

Pour vérifier les permissions d’un fichier via un script PHP, c’est-à-dire dynamiquement, on va pouvoir utiliser la fonction PHP fileperms() qui renvoie les permissions pour un fichier.

Cette fonction va renvoyer les permissions d’un fichier sous forme numérique. On pourra ensuite convertir le résultat sous forme octale avec la fonction decoct() pour obtenir la représentation des permissions selon nos trois chiffres.

Notez que fileperms() peut renvoyer des informations supplémentaires selon le système utilisé. Les trois derniers chiffres renvoyés correspondent aux permissions.

On va également pouvoir utiliser les fonctions is_readable() et is_writable() qui vont respectivement déterminer si le fichier peut être lu et si on peut écrire dedans. Ces fonctions vont renvoyer true si c’est le cas ou false dans le cas contraire ce qui les rend très pratiques d’utilisation au sein d’une condition.

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
            /*On teste les permissions de notre
             *fichier fichier.txt créé précédemment*/
            
            echo decoct(fileperms('fichier.txt')). '<br>';
            echo var_dump(is_readable('fichier.txt')). '<br>';
            echo var_dump(is_writable('fichier.txt')). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-fileperms-lecture-permission-fichier-resultat.png)

Pour modifier les permissions d’un fichier en PHP, on va devoir utiliser la fonction chmod() qui va prendre en arguments le fichier dont on souhaite modifier les permissions ainsi que les nouvelles permissions du fichier en notation octale (on placera un zéro devant nos trois chiffres).

Le réglage des permissions concernant les membres du groupe et les autres utilisateurs va être particulier à chaque cas selon votre site et la sensibilité des informations stockées : vos utilisateurs doivent ils pouvoir lire les fichiers ? Les exécuter ? Les modifier ?

Notez que la fonction chmod() tire son nom de chmod ou « change mode » qui est une commande Unix permettant de changer les permissions d’accès d’un fichier ou d’un répertoire.

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
            echo 'Permissions d\'origine : '
            .decoct(fileperms('fichier.txt')). '<br>';
            
            //chmod() renvoie truc en cas de succès
            if(chmod('fichier.txt', 0755)){
                echo 'Permissions du fichier bien modifiées';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-chmod-changement-permission-fichier-resultat.png)

Ici, on change les permissions de notre fichier « fichier.txt » qu’on règle sur 755 grâce à la fonction chmod(). On tire parti du fait que chmod() renvoie true en cas de succès (permissions bien modifiées) ou false en cas d’échec pour l’utiliser au sein d’une condition.

### Exo 17

Ecrire un script php qui  permet de lire des nombres décimaux à partir d'un fichier texte nommé "decimal.txt",  et stocke leurs équivalents en binaire dans un autre fichier "binaire.txt".

        La fonction base_convert permet de convertir un nombre d'une base à une autre :
            base_convert(nombre,frombase,tobase);

### Exo 18

On souhaite mettre en place un espace qui permet à des adhérents de déposer des images sur le serveur Web .

- Créer une page upload.php qui permet de choisir une image et  la transférer vers un dossier nommé "images"  sur le  serveur.
  - N'autorisez que les extensions des images ('jpg', 'gif', 'png').
  - Après l'envoi on récupère le fichier , on le stocke dans le dossier "images" et on affiche un message de confirmation.n En cas d'erreurs on affiche un message d'erreur approprié.
- Le lien "Consulter les images" envoie vers la page "galerie.php" qui liste les images contenues dans le dossier « images » , avec la date de création et la taille de chaque image:
- Utiliser les fonctions suivantes : opendir ,readdir,filesize,filectime
