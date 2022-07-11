## Les Cookies [35 min] -> Q/R

<https://grafikart.fr/tutoriels/cookies-php-1127#autoplay>

Dans cette nouvelle partie, nous allons étudier des variables très spéciales et très importantes en PHP : les variables superglobales.

Nous allons en particulier nous attarder sur certaines d’entre elles qu’il est indispensable de connaitre et de savoir utiliser.

## Présentation des variables superglobales

Les variables superglobales sont des variables internes au PHP, ce qui signifie que ce sont des variables créées automatiquement par le PHP.

Ces variables vont être accessibles n’importe où dans le script et quel que soit le contexte, qu’il soit local ou global. C’est d’ailleurs la raison pour laquelle on appelle ces variables « superglobales ».

Il existe 9 superglobales en PHP. Ces variables vont toutes être des variables tableaux qui vont contenir des groupes de variables très différentes. La plupart des scripts PHP vont utiliser les variables superglobales car ces dernières vont s’avérer très souvent très utiles . Il est donc indispensable de bien les connaitre et de savoir les manipuler.

Les variables superglobales PHP sont les suivantes :

- $GLOBALS ;
- $_SERVER ;
- $_REQUEST ;
- $_GET ;
- $_POST ;
- $_FILES ;
- $_ENV ;
- $_COOKIE ;
- $_SESSION.

On écrira toujours les superglobales en majuscules. Cela est une convention qui permet de les différencier des variables « classiques » que nous créons nous-mêmes. Par ailleurs, vous pouvez remarquer que toutes les superglobales à l’exception de $GLOBALS commencent par un underscore _.

Dans la suite de cette leçon, nous allons présenter brièvement chacune de ces variables superglobales. Nous allons étudier la plupart d’entre elles plus en détail dans les leçons ou les parties suivantes.

## La variable superglobale $GLOBALS

La variable superglobale $GLOBALS est un peu différente des autres superglobales puisque c’est la première superglobale qui a été créée en PHP, bien avant les autres (en réalité, $GLOBALS a toujours été disponible en PHP).

Cette superglobale va nous permettre d’accéder à des variables définies dans l’espace global depuis n’importe où dans le script et notamment depuis un espace local (dans une fonction).

La variable superglobale $GLOBALS est une variable tableau qui stocke en fait automatiquement toutes les variables globales déclarées dans le script.

Ce tableau est un tableau associatif qui contient les noms des variables créées dans l’espace global en index et leurs valeurs en valeurs du tableau.

Si vous avez lu le chapitre sur la portée des variables, vous devriez vous rappeler du mot clef global qui sert justement à accéder à une variable définie dans l’espace global depuis un espace local.

Ce mot clef est lié au contenu de $GLOBALS et il va souvent être équivalent d’utiliser global ou $GLOBALS pour accéder à une variable en particulier depuis un espace local.

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
            $nom = 'Giraud';
            $age = 28;
            
            //On utilise le mot clef global
            function prez(){
                $mail = 'pierre.giraud@edhec.com';
                global $prenom, $nom, $age;
                echo 'Je suis ' .$prenom. ' ' .$nom. ', j\'ai ' .$age. ' ans.<br>
                Mon adresse mail est : ' .$mail;
            }
            //On utilise la superglobale $GLOBALS
            function prez2(){
                $mail = 'pierre.giraud@edhec.com';
                echo 'Je suis ' .$GLOBALS[prenom]. ' ' .$GLOBALS[nom]. ', j\'ai '
                .$GLOBALS[age]. ' ans.<br>Mon adresse mail est : ' .$mail;
            }
            prez();
            echo '<br><br>';
            prez2();
            echo '<br><br>';
            echo '<pre>';
            print_r($GLOBALS);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-variable-superglobale-globals-resultat.png)

Ici, on commence par définir 3 variables dans l’espace global : $prenom, $nom et $age. On crée ensuite deux fonctions qui vont utiliser ces variables.

Pour accéder à nos variables globales dans notre première fonction prez(), on utilise le mot clef global.

Pour accéder à nos variables globales depuis notre deuxième fonction prez2(), on va plutôt cette fois-ci utiliser notre superglobale $GLOBALS. On va lui passer les noms des variables auxquelles on souhaite accepter en indice afin que le tableau nous retourne les valeurs associées.

Comme vous pouvez le voir, les deux méthodes sont ici équivalentes. Je vous conseille dans cette situation d’utiliser plutôt le mot clef global.

La variable superglobale $GLOBALS va pouvoir être intéressante lorsqu’on voudra parcourir rapidement l’ensemble des variables globales définies dans un script. Comme cette variable est un tableau associatif, on peut utiliser une boucle foreach pour afficher toutes ses valeurs ou tout simplement la fonction print_r() pour afficher rapidement sa structure.

## La variable superglobale $_SERVER

La superglobale $_SERVER contient des variables définies par le serveur utilisé ainsi que des informations relatives au script.

Cette superglobale est à nouveau un tableau associatif dont les clefs sont les noms des variables qu’elle stocke et les valeurs sont les valeurs des variables liées.

Voici quelques clefs qu’il peut être intéressant de connaitre :

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
            //Renvoie le nom du fichier contenant le script 
            echo $_SERVER['PHP_SELF']. '<br>';
            
            //Renvoie le nom du serveur qui héberge le fichier
            echo $_SERVER['SERVER_NAME']. '<br>';
            
            //Renvoie l'adresse IP du serveur qui héberge le fichier
            echo $_SERVER['SERVER_ADDR']. '<br>';
            
            //Retourne l'IP du visiteur demandant la page
            echo $_SERVER['REMOTE_ADDR']. '<br>';
            
            /*Renvoie une valeur non vide si le script a
             *été appelé via le protocole HTTPS*/
            echo $_SERVER['HTTPS']. '<br>';
            
            //Retourne le temps Unix du début de la requête
            echo $_SERVER['REQUEST_TIME'];
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-variable-superglobale-server-resultat.png)

Vu que j’exécute ce script localement, ces valeurs ne sont évidemment pas très intéressantes dans mon cas. Cependant, elles vont pouvoir s’avérer très utiles dans le cas d’un « vrai » site hébergé sur un serveur.

Notez qu’il est possible que vous n’ayez pas les mêmes valeurs que moi renvoyées par $_SERVER['SERVER_ADDR'] et $_SERVER['REMOTE_ADDR']. En effet, selon que vous utilisiez une adresse ipv6 ou ipv4, vous pouvez avoir soit la valeur ::1 soit la valeur 127.0.0.1

## La variable superglobale $_REQUEST

La variable superglobale $_REQUEST va contenir toutes les variables envoyées via HTTP GET, HTTP POST et par les cookies HTTP.

Cette variable, qui est un tableau associatif, va ainsi contenir les variables de $_GET, $_POST et $_COOKIE.

Nous n’avons pas pour le moment les connaissances nécessaires pour illustrer le fonctionnement de cette variable, nous en reparlerons plus tard.

## La variable superglobale $_ENV

La superglobale $_ENV va contenir des informations liées à l’environnement dans lequel s’exécute le script.

Cette variable est une nouvelle fois une variable tableau. Celle-ci va pouvoir contenir, par exemple, le nom de l’utilisateur qui exécute le script si celui-ci est accessible.

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
            echo $_ENV['USER']. ' exécute actuellement ce script';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-variable-superglobale-env-resultat.png)

## La variable superglobale $_FILES

La superglobale $_FILES va contenir des informations sur un fichier téléchargé, comme le type du fichier, sa taille, son nom, etc.

On pourra donc utiliser cette superglobale lorsqu’on offre la possibilité à nos utilisateurs de nous envoyer des fichiers, afin d’obtenir des informations sur les fichiers envoyés ou même pour filtrer et interdire l’envoi de certains fichiers.

## Les variables superglobales $_GET et $_POST

Les superglobales $_GET et $_POST vont être utilisées pour manipuler les informations envoyées via un formulaire HTML.

En effet, ces deux superglobales vont stocker les différentes valeurs envoyées par un utilisateur via un formulaire selon la méthode d’envoi : $_GET stockera les valeurs lorsque le formulaire sera envoyé via la méthode GET tandis que $_POST stockera les valeurs lorsque le formulaire sera envoyé via la méthode POST.

Nous allons pouvoir revoir en détail le fonctionnement de ces variables lorsqu’on va étudier la gestion des données des formulaires en PHP. Cependant, on peut déjà prendre un premier exemple simple :

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
            //Si notre variable $_POST['prenom'] est bien définie, echo...
            if(isset($_POST['prenom'])){
                echo 'Bonjour, tu t\'appelles ' .$_POST['prenom'];
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-variable-superglobale-post-resultat.png)

Ici, on définit la méthode post comme méthode d’envoi du formulaire et la page cours.php comme page de traitement des données (la page où les données du formulaire devront être envoyées).

Dans le cas présent, cette page est la même que la page dans laquelle se situe le formulaire, ce qui signifie que les données seront envoyées vers notre page courante. On va donc les récupérer dans notre page.

Notre formulaire en soi ne contient qu’un champ input qui va demander un prénom ainsi qu’un bouton d’envoi.

Pour récupérer les données envoyées dans notre script PHP, nous allons utiliser la superglobale $_POST. Cette superglobale est un tableau associatif qui prend en clefs les noms passés via les attributs name de nos formulaires.

On va commencer dans notre script PHP par créer une condition pour vérifier qu’un prénom a bien été envoyé en vérifiant que $_POST['prenom'] ait bien une valeur associée grâce à la fonction isset() qui sert à vérifier si une variable a bien été définie et est différente de NULL.

Si la variable existe bien, isset() retourne true et le test de notre condition est vérifié. Dans le cas contraire, isset() renvoie false et le test de notre condition échoue et le code dans la condition n’est donc pas exécuté.

Ici, le code de notre condition sert simplement à afficher la valeur envoyée via le formulaire.

## La variable superglobale $_COOKIE

La superglobale $_COOKIE est un tableau associatif qui contient toutes les variables passées via des cookies HTTP. Nous allons étudier cette variable superglobale en détail dans la suite de ce cours.

## La variable superglobale $_SESSION

La superglobale $_SESSION est un tableau associatif qui contient toutes les variables de session. Nous allons étudier cette variable superglobale en détail dans la suite de ce cours.

## Création et gestion des cookies en PHP

Un cookie est un petit fichier texte qui ne peut contenir qu’une quantité limitée de données.

Les cookies vont être stockés sur les ordinateurs de vos visiteurs. Ainsi, à tout moment, un utilisateur peut lui même supprimer les cookies de son ordinateur.

De plus, les cookies vont toujours avoir une durée de vie limitée. On pourra définir la date d’expiration d’un cookie.

Généralement, nous allons utiliser les cookies pour faciliter la vie des utilisateurs en préenregistrant des données les concernant comme un nom d’utilisateur par exemple.

Ainsi, dès qu’un utilisateur connu demande à accéder à une page de notre site, les cookies vont également automatiquement être envoyées dans la requête de l’utilisateur. Cela va nous permettre de l’identifier et de lui proposer une page personnalisée.

Les cookies ne sont donc pas dangereux en soi même s’ils continuent d’avoir mauvaise réputation. En revanche, on évitera toujours de stocker des informations sensibles dans les cookies comme des mots de passe par exemple car les cookies sont stockés sur l’ordinateur des visiteurs et nous n’avons donc aucune maitrise ni aucun moyen de les sécuriser après le stockage.

## Créer un cookie en PHP

Pour créer un cookie en PHP, nous allons utiliser la fonction setcookie().

Une particularité notable de cette fonction est qu’il va falloir l’appeler avant d’écrire tout code HTML pour qu’elle fonctionne puisque les cookies doivent être envoyés avant toute autre sortie. Pour information, cette restriction provient du protocole HTTP et non pas de PHP.

Cette fonction peut accepter jusqu’à sept valeurs en arguments. Cependant, seul la première (le nom du cookie créé) est obligatoire.

La syntaxe de base de setcookie() est la suivante < code>setcookie(name, value, expire, path, domain, secure, httponly). Les paramètres ont la signification suivante :

| Paramètre | Signification |
| --- | --- |
| name | Le nom du cookie. Le nom d’un cookie est soumis aux mêmes règles que les noms des variables.
| value | La valeur du cookie. Comme cette valeur est stockée sur l’ordinateur d’un utilisateur, on évitera de stocker des informations sensibles.
| expires | La date d’expiration du cookie sous forme d’un timestamp UNIX (nombre de secondes écoulées depuis le 1er janvier 1970). Si aucune valeur n’est passée en argument, le cookie expirera à la fin de la session (lorsque le navigateur sera fermé).
| path | Le chemin sur le serveur sur lequel le cookie sera disponible. Si la valeur est ‘/’, le cookie sera disponible sur l’ensemble du domaine. Si la valeur est ‘/cours/’, le cookie ne sera disponible que dans le répertoire (le dossier) /cours/ (et dans tous les sous-répertoires qu’il contient).
| domain | Indique le domaine ou le sous domaine pour lequel le cookie est disponible.
| secure | Indique si le cookie doit uniquement être transmis à travers une connexion sécurisée HTTPS depuis le client. Si la valeur passée est true, le cookie ne sera envoyé que si la connexion est sécurisée.
| httponly | Indique si le cookie ne doit être accessible que par le protocole HTTP. Pour que le cookie ne soit accessible que par le protocole http, on indiquera la valeur true. Cela permet d’interdire l’accès au cookie aux langages de scripts comme le JavaScript par exemple, pour se protéger potentiellement d’une attaque de type XSS.

Créons immédiatement deux premiers cookies pour bien comprendre comment fonctionne setcookie().
```php
<?php
    setcookie('user_id', '1234');
    setcookie('user_pref', 'dark_theme', time()+3600*24, '/', '', true, true);
?>
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
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
 
Ici, on crée deux cookies avec setcookie() : un premier cookie nommé user_id qui stockera l’ID d’un visiteur pour la session actuelle par exemple ce qui nous permettra de l’identifier pendant sa navigation sur notre site et un deuxième cookie qu’on appelle user_pref qui stockera les préférences mentionnés par l’utilisateur pour notre site (utilisation d’un thème sombre par exemple).

Bien évidemment, dans le cas présent, il faut imaginer qu’on possède un système nous permettant de créer des ID de session et que notre site propose aux utilisateurs de choisir une apparence personnalisée pour celui-ci car ce n’est pas l’objet de la leçon.

Comme je vous l’ai précisé précédemment, il faut appeler cette fonction avant d’écrire un quelconque code HTML. Nous appelons donc setcookie() dans une balise PHP, avant même d’écrire notre élément html.

Pour notre premier cookie user_id, nous ne précisons qu’un nom et une valeur et laissons le PHP utiliser les valeurs par défaut pour les autres arguments de setcookie().

Nous utilisons ensuite la fonction time() sans lui passer d’argument pour récupérer la valeur du timestamp actuel. Nous allons nous servir de cette valeur en lui ajoutant un certain nombre de secondes pour définir la date d’expiration de notre deuxième cookie user_pref. Dans le cas présent, on définit une durée de vie de 24h pour le cookie (3600 secondes * 24 à partir de sa date de création).

Toujours pour notre deuxième cookie, nous utilisons la valeur par défaut pour le chemin du serveur sur lequel le serveur est accessible, c’est à dire la valeur / qui signifie que le cookie sera accessible sur l’ensemble d’un domaine ou d’un sous-domaine (c’est-à-dire dans tous ses répertoires).

On ne précise pas de domaine de validité ici car nous travaillons en local. Si j’avais voulu rendre mon cookie disponible pour tout mon site, j’aurais précisé pierre-giraud.com.

Finalement, nous précisons les valeurs true pour les arguments « secure » (passage par une connexion sécurisée pour transmettre le cookie) et « httponly » (obligation d’utiliser le protocole HTTP pour accéder au cookie).

## Récupérer la valeur d’un cookie

Pour récupérer la valeur d’un cookie, nous allons utiliser la variable superglobale $_COOKIE.

Cette superglobale est un tableau associatif qui utilise les noms des cookies en clefs et associe leurs valeurs en valeurs du tableau.

On va donc pouvoir accéder à la valeur d’un cookie en particulier en renseignant le nom du cookie en clef de ce tableau.
```php
<?php
    setcookie('user_id', '1234');
    setcookie('user_pref', 'dark_theme', time()+3600*24, '/', '', true, true);
?>
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
            if(isset($_COOKIE['user_id'])){
                echo 'Votre ID de session est le ' .$_COOKIE['user_id'];
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-lecture-valeur-cookie-superglobale-resultat.png)

Ici, on commence par vérifier qu’un cookie user_id existe et a bien été défini et stocké dans $_COOKIE avec la fonction isset(). Si c’est le cas, on echo la valeur du cookie.

Ici, il faut bien noter que la variable $_COOKIE stocke la liste des cookies renvoyés par le navigateur. Lorsqu’un utilisateur demande à accéder à notre page pour la première fois, le cookie user_id est créé côté serveur et est renvoyé au navigateur afin qu’il soit stocké sur la machine du visiteur.

Ainsi, la première fois qu’un utilisateur demande notre page, la variable $_COOKIE ne stocke pas encore notre cookie puisque celui-ci n’a pas encore été créé et donc le navigateur du visiteur ne peut rien renvoyer. Le test de notre condition if échoue donc lors du premier affichage de la page.

Si on actualise ensuite la page, en revanche, le navigateur renvoie bien cette fois-ci la valeur de notre cookie et son nom et celui-ci est bien stocké dans $_COOKIE. Le test de notre condition va alors être vérifié et on va pouvoir echo la valeur de ce cookie.

## Modifier la valeur d’un cookie ou supprimer un cookie

Pour modifier la valeur d’un cookie, nous allons appeler à nouveau la fonction setcookie() en lui passant le nom du cookie dont on souhaite changer la valeur et changer l’argument de type valeur passé à la fonction avec la nouvelle valeur souhaitée.

Pour supprimer un cookie, nous allons encore appeler setcookie() en lui passant le nom du cookie qu’on souhaite supprimer et allons cette fois-ci définir une date d’expiration se situant dans le passé pour le cookie en question.
```php
<?php
    //On définit deux cookies
    setcookie('user_id', '1234');
    setcookie('user_pref', 'dark_theme', time()+3600*24, '/', '', false, false);
    
    //On modifie la valeur du cookie user_id
    setcookie('user_id', '5678');
    
    //On supprime le cookie user_pref
     setcookie('user_pref', '', time()-3600, '/', '', false, false);
?>
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
            if(isset($_COOKIE['user_id'])){
                echo 'Votre ID de session est le ' .$_COOKIE['user_id']. '<br>';
            }
            if(isset($_COOKIE['user_pref'])){
                echo 'Votre thème préféré est ' .$_COOKIE['user_pref'];
            }else{
                echo 'Pas de thème préféré défini';
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-modification-suppression-cookie-resultat.png)

Ici, on commence par définir deux cookies user_id et user_pref. On modifie ensuite la valeur de notre cookie user_id et on passe une date d’expiration passée à notre cookie user_pref pour le supprimer.

Bien évidemment, encore une fois, cela n’a pas l’air très intéressant dans le cas présent car nous définissons nous-mêmes nos cookies, leurs valeurs et leurs durées de vie manuellement.

Cependant, vous devez à chaque fois imaginer que toutes ces notions vont être utiles dans un contexte dynamique où il faudra changer la valeur d’un cookie en fonction du changement de préférence d’un utilisateur par exemple.

## Exo 19

Ecrire un script php qui permet de sauvegarder les heures de visites dans un cookie , et affiche les détails de visites comme suit :
Pour la première visite :

![image](https://user-images.githubusercontent.com/46321539/156780765-db7f353b-aac2-47e5-b974-9f45dea64d3f.png)

Par la suite affiche la liste des heures :

![image](https://user-images.githubusercontent.com/46321539/156780811-9bca414b-1d97-4808-91ff-cf841135d26f.png)
