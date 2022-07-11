## La session [8 min] -> Q/R

<https://grafikart.fr/tutoriels/session-php-1128#autoplay>

Une session en PHP correspond à une façon de stocker des données différentes pour chaque utilisateur en utilisant un identifiant de session unique.

Les identifiants de session vont généralement être envoyés au navigateur via des cookies de session et vont être utilisés pour récupérer les données existantes de la session.

Un des grands intérêts des sessions est qu’on va pouvoir conserver des informations pour un utilisateur lorsqu’il navigue d’une page à une autre. De plus, les informations de session ne vont cette fois-ci pas être stockées sur les ordinateurs de vos visiteurs à la différence des cookies mais plutôt côté serveur ce qui fait que les sessions vont pouvoir être beaucoup plus sûres que les cookies.

Notez toutefois que le but des sessions n’est pas de conserver des informations indéfiniment mais simplement durant une « session ». Une session démarre dès que la fonction session_start() est appelée et se termine en général dès que la fenêtre courante du navigateur est fermée (à moins qu’on appelle une fonction pour terminer la session de manière anticipée ou qu’un cookie de session avec une durée de vie plus longues ait été défini).

La superglobale $_SESSION est un tableau associatif qui va contenir toutes les données de session une fois la session démarrée.

## Démarrer une session en PHP

Pour pouvoir utiliser les variables de session, il va avant tout falloir qu’une session soit démarrée à un moment ou à un autre.

Pour démarrer une session en PHP, on va utiliser la fonction session_start(). Cette fonction va se charger de vérifier si une session a déjà été démarrée en recherchant la présence d’un identifiant de session et, si ce n’est pas le cas, va démarrer une nouvelle session et générer un identifiant de session unique pour un utilisateur.

Il va falloir appeler session_start() avant toute autre opération dans nos pages, c’est-à-dire au début de celles-ci de la même façon qu’on a déjà pu le faire avec la fonction setcookie().

Par ailleurs, notez qu’il va falloir appeler session_start() dans chaque page où on souhaite pouvoir accéder aux variables de session. En pratique, on créera généralement une page header.php qui va contenir notre fonction session_start() et qu’on va inclure à l’aide de include ou require dans les pages voulues d’un site.

Lorsqu’une session est démarrée, c’est-à-dire lorsqu’un utilisateur qui ne possède pas encore d’identifiant de session demande à accéder à une page contenant session_start(), cette fonction va générer un identifiant de session unique qui va généralement être envoyé au navigateur sous forme de cookie sous le nom PHPSESSID.

Pour être tout à fait précis, le PHP supporte deux méthodes pour garder la trace des sessions : via des cookies ou via l’URL. Si les cookies sont activés, le PHP va préférer leur utilisation. C’est le comportement recommandé. Dans le cas contraire, les informations de session vont être passées via l’URL.
```php
<?php
    //On démarre une nouvelle session
    session_start();
    /*On utilise session_id() pour récupérer l'id de session s'il existe.
     *Si l'id de session n'existe  pas, session_id() rnevoie une chaine
     *de caractères vide*/
    $id_session = session_id();
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
            if($id_session){
                echo 'ID de session (récupéré via session_id()) : <br>'
                .$id_session. '<br>';
            }
            echo '<br><br>';
            if(isset($_COOKIE['PHPSESSID'])){
                echo 'ID de session (récupéré via $_COOKIE) : <br>'
                .$_COOKIE['PHPSESSID'];
            }
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-demarrer-session-session-start-resultat.png)

Notez que dès qu’une session est lancée, le PHP va créer automatiquement un petit fichier de session qui va contenir les informations liées à la session durant le temps de celle-ci.

## Définir et récupérer des variables de session

Pour définir et récupérer les valeurs des variables de session, nous allons pouvoir utiliser la variable superglobale $_SESSION.

Cette superglobale est un tableau associatif qui stocke les différentes variables de sessions avec leurs noms en index du tableau et leurs valeurs en valeurs du tableau.

Nous allons donc très simplement pouvoir à la fois définir de nouvelles variables de session et modifier ou récupérer les valeurs de nos variables de session.

Une fois une variable de session définie, celle-ci va pouvoir être accessible durant la durée de la session à partir de toutes les pages du site pour lesquelles les sessions ont été activées. Pour illustrer cela, on peut créer une autre page session.php en plus de notre page cours.php.

On va déjà démarrer une nouvelle session et créer quelques variables de session manuellement dans notre page cours.php :
```php
<?php
    //On démarre une nouvelle session
    session_start();
    
    //On définit des variables de session
    $_SESSION['prenom'] = 'Pierre';
    $_SESSION['age'] = 29;
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
            //Du code PHP
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
 
Ensuite, nous allons également utiliser session_start() dans notre page session.php pour activer les sessions. En effet, je vous rappelle que cette fonction permet de démarrer une session si aucun identifiant de session n’existe ou de reprendre une session existante dans le cas contraire.

Une fois les sessions activées sur notre page, nous allons pouvoir récupérer les valeurs des variables de session définies dans notre page précédente et les afficher ou les manipuler d’une quelconque façon :
```php
<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <?php
            echo 'Bonjour ' .$_SESSION['prenom']. ',
            tu as ' .$_SESSION['age']. ' ans';
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-afficher-variable-session-superglobale-resultat.png)

## Terminer une session et détruire les variables de session

Une session PHP se termine généralement automatiquement lorsqu’un utilisateur ferme la fenêtre de son navigateur.

Il peut être cependant parfois souhaitable de terminer une session avant. Pour faire cela, nous allons pouvoir utiliser les fonctions session_destroy() qui détruit toutes les données associées à la session courante et session_unset() qui détruit toutes les variables d’une session.

La fonction session_destroy() va supprimer le fichier de session dans lequel sont stockées toutes les informations de session. Cependant, cette fonction ne détruit pas les variables globales associées à la session (c’est-à-dire le contenu du tableau $_SESSION) ni le cookie de session.

Pour détruire totalement une session, il va également falloir supprimer l’identifiant de session. Généralement, cet identifiant est contenu dans le cookie PHPSESSID qu’on pourra effacer en utilisant setcookie() en définissant une date d’expiration passée pour le cookie.

Il va cependant être très rare d’avoir besoin de détruire les données associées à une session et donc d’appeler session_destroy(). On préférera généralement modifier le tableau $_SESSION manuellement pour supprimer des données en particulier.

Notez qu’on va également pouvoir utiliser la fonction session_unset() (sans lui passer d’argument) pour détruire toutes les variables de la session courante. Cette fonction va également nous permettre de détruire une variable de session en particulier en lui passant sa valeur de la manière suivante : unset($_SESSION['nom-de-la-variable-de-session-a-detruire']).
```php
<?php
    //On démarre une nouvelle session
    session_start();
    
    //On définit des variables de session
    $_SESSION['prenom'] = 'Pierre';
    $_SESSION['age'] = 29;
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
            /*Si la variable de session age est définie, on echo sa valeur
             *puis on la détruit avec unset()*/
            if(isset($_SESSION['age'])){
                echo 'Tu as ' .$_SESSION['age']. ' ans<br>';
                unset($_SESSION['age']);
            }
            
            /*On détruit les données de session*/
            session_destroy();
            
            //On tente d'afficher les valeurs des variables age et prenom 
            echo 'Contenu de $_SESSION[\'age\'] : ' .$_SESSION['age']. '<br>';
            echo 'Contenu de $_SESSION[\'prenom\'] : ' .$_SESSION['prenom'];
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-detruire-session-variable-session-destroy-unset-resultat.png)

Ici, on commence par démarrer une session ou par reprendre une session existante avec session_start(). Cette étape est essentielle si on souhaite supprimer des informations de session.

Ensuite, dans notre script, on vérifie que la variable $_SESSION['age'] ait bien été définie et, si c’est le cas, on affiche sa valeur puis on la détruit avec unset(). A la fin du script, on détruit les informations associées à la session avec session_destroy().

On essaie alors d’afficher le contenu de nos variables de session en utilisant le tableau $_SESSION. Ici, $_SESSION['age'] ne renvoie aucune valeur puisqu’on l’a détruite avec unset(). En revanche, $_SESSION['prenom'] renvoie bien toujours une valeur.

En effet, je vous rappelle ici que session_destroy() ne va pas détruire les variables globales de session. Cependant, comme les informations de session sont détruites, les variables de session ne vont plus être accessibles que dans le script courant.

### Exo 20

Pour cet exercice, il faut réaliser un jeu de calcul. Les calculs doivent être générés au hasard parmi les opération +, - et *. Les 2 opérandes sont des nombres choisis aléatoirement entre 0 et 20.

- Il faut pouvoir :

        répondre au calcul proposé ;
        changer d'utilisateur ;
        clôturer la partie.

- Lors de la réponse, le résultat est vérifié; si celui-ci est correct, le joueur marque un point, sinon il perd un point.
- Lorsque l'on veut changer de joueur, 2 options sont possibles :

        le joueur existe déjà et peut être choisi dans un menu déroulant;
        le joueur n'existe pas et doit être ajouté via un champ de texte.

- Lors de la clôture d'une partie, on est dirigé vers une nouvelle page affichant les résultats de tous les joueurs. On affichera les points, le nombre de bonnes réponses, le nombre de mauvaises réponses et le pourcentage de bonnes réponses données. Les résultats sont affichés par ordre de points décroissants.

### Exo 21
#### 21a
Faire une page HTML permettant de donner à l'utilisateur :
- son User Agent
- son adresse ip
- le nom du serveur

#### 21b
Sur la page index, faire un liens vers une autre page. Passer d'une page à l'autre le contenu des variables **lastname**, **firstname** et **age** grâce aux sessions. Ces variables auront été définies directement dans le code.  
Il faudra afficher le contenu de ces variables sur la deuxième page.

#### 21c
Faire un formulaire qui permet de récupérer le login et le mot de passe de l'utilisateur. A la validation du formulaire, stocker les informations dans un cookie.

#### 21d
Faire une page qui va récupérer les informations du cookie créé à l'exercice 3 et qui les affiches.

#### 21e
Faire une page qui va pouvoir modifier le contenu du cookie de l'exercice 3.