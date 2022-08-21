# Se connecter à une base de données MySQL en PHP

Dans ce nouveau chapitre, nous allons passer en revue les différents moyens que nous avons de nous connecter au serveur et donc à nos bases de données MySQL en PHP.

Nous discuterons des avantages et des inconvénients de telle ou telle méthode et allons également apprendre à nous connecter à nos bases de données à proprement parler.

# Se connecter à MySQL en PHP : les API proposées par le PHP

Pour pouvoir manipuler nos bases de données MySQL en PHP (sans passer par phpMyAdmin), nous allons déjà devoir nous connecter à MySQL.

Pour cela, le PHP met à notre disposition deux API (Application Programming Interface) :

- L’extension MySQLi ;
- L’extension PDO (PHP Data Objects).

Note : Auparavant, nous pouvions également utiliser l’extension MySQL. Cependant, cette extension est désormais dépréciée et a été remplacée par MySQLi (« i » signifie « improved », c’est-à-dire « amélioré » en français).

# Quelle API préférer : MySQLi ou PDO ?

Le PHP nous fournit donc deux API pour nous connecter à MySQL et manipuler nos bases de données.

Chacune de ces deux API possède des forces différentes et comme vous vous en doutez elles ne sont pas forcément interchangeables.

Il existe notamment une différence notable entre ces deux API : l’extension MySQLi ne va fonctionner qu’avec les bases de données MySQL tandis que PDO va fonctionner avec 12 systèmes de bases de données différents.

Pour cette raison, nous préférerons généralement le PDO car si vous devez un jour utiliser un autre système de bases de données, le changement sera beaucoup plus simple que si vous avez tout codé en MySQLi auquel cas vous devrez réécrire le code dans son ensemble.

En termes de fonctionnement, MySQLi et PDO sont tous les deux orienté objet (bien que MySQLi propose également une API en procédural), et ils supportent également tous les deux les requêtes préparées qui servent à se prémunir des injections SQL (nous reparlerons de cela dans la suite du cours).

Dans ce cours, j’utiliserai donc PDO sauf pour ce chapitre où il me semble intéressant de vous montrer les différences d’écriture pour un script de connexion à une base de données MySQL.

# Connexion au serveur avec MySQLi orienté objet

Pour se connecter au serveur et accéder à nos bases de données MySQL en MySQLi orienté objet, nous allons avoir besoin de trois choses : le nom du serveur ainsi qu’un nom d’utilisateur (avec des privilèges de type administrateur) et son mot de passe.

Dans le cas où votre site est hébergé sur un serveur, votre hébergeur vous donnera ces différents éléments. Ici, bien évidemment, nous travaillons en local. Le nom de notre serveur est donc localhost.

Concernant les identifiants au serveur local, ils peuvent changer selon vos paramétrages et selon le système que vous utilisez. Cependant, si vous disposez des réglages par défaut, le nom d’utilisateur devrait toujours être root et le mot de passe associé devrait être soit root soit une chaine de caractère vide.

Nous allons devoir procéder à deux opérations lors de la connexion au serveur : se connecter à proprement parler et vérifier que la connexion a bien été établie et si ce n’est pas le cas afficher le message d’erreur correspondant.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-connexion-serveur-mysqli-objet.png)

Pour se connecter, nous instancions la classe prédéfinie mysqli en passant au constructeur les informations suivantes : nom du serveur auquel on doit se connecter, nom d’utilisateur et mot de passe.

Nous stockons les informations de connexion dans un objet qu’on appelle ici $conn. Cet objet représente notre connexion en soi.

Ensuite, nous devons tester que la connexion a bien été établie car dans le cas où celle-ci échoue on voudra renvoyer un message d’erreur
Il est en essentiel de considérer les potentielles erreurs de connexion à nos bases de données pour éviter que des utilisateurs mal intentionnés tentent de récupérer les informations relatives à la tentative de connexion.

Pour cela, nous utilisons la propriété connect_error de la classe mysqli qui retourne un message d’erreur relatif à l’erreur rencontrée en cas d’erreur de connexion MySQL ainsi que la fonction die() pour stopper l’exécution du script en cas d’erreur.
Attention : La propriété connect_error de mysqli ne fonctionne correctement que depuis la version 5.3 de PHP. Utilisez la fonction mysqli_connect_error() pour les versions antérieures.

Notez ici qu’on aurait également pu utiliser les exceptions et des blocs try et catch pour gérer les erreurs potentielles. Je voulais juste vous présenter une autre manière de faire ici.

Dans le cas où la connexion réussit, on se contente d’afficher un message « connexion réussie ».

Si vous désirez la liste complète des propriétés et méthodes de la classe mysqli, je vous invite à consulter la documentation officielle.

# Connexion au serveur avec MySQLi procédural

Nous allons également pouvoir utiliser un script en procédural avec MySQLi pour nous connecter au serveur et à la base de données MySQL.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            
            //On établit la connexion
            $conn = mysqli_connect($servername, $username, $password);
            
            //On vérifie la connexion
            if(!$conn){
                die('Erreur : ' .mysqli_connect_error());
            }
            echo 'Connexion réussie';
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-connexion-serveur-mysqli-procedural.png)

Ce script ressemble à priori au précédent et pourtant il est bien très différent : nous n’avons cette fois-ci plus recours à notre classe mysqli ni à l’orienté objet.

A la place, nous utilisons les fonctions mysqli_connect() pour nous connecter à la base de données et mysqli_connect_error() pour obtenir des informations sur l’erreur de connexion si il y en a une.

En dehors de ça, le principe reste le même : nous devons toujours fournir le nom du serveur ainsi que des identifiants de connexion (nom d’utilisateur et mot de passe) pour se connecter avec la fonction mysqli_connect() et nous prenons toujours en charge les cas d’erreur de connexion et stoppant l’exécution du script avec la fonction die().

# Connexion au serveur avec PDO

Pour se connecter en utilisant PDO, nous allons devoir instancier la classe PDO en passant au constructeur la source de la base de données (serveur + nom de la base de données) ainsi qu’un nom d’utilisateur et un mot de passe.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            
            //On établit la connexion
            $conn = new PDO("mysql:host=$servername;dbname=bddtest", $username, $password);
        ?>
    </body>
</html>
```

Vous pouvez déjà remarquer ici que pour se connecter à une base de données avec PDO, vous devez passer son nom dans le constructeur de la classe PDO. Cela implique donc qu’il faut que la base ait déjà été créée au préalable (avec phpMyAdmin par exemple) ou qu’on la crée dans le même script.

Notez également qu’avec PDO il est véritablement indispensable que votre script gère et capture les exceptions (erreurs) qui peuvent survenir durant la connexion à la base de données.

En effet, si votre script ne capture pas ces exceptions, l’action par défaut du moteur Zend (plus de détail sur le moteur ici) va être de terminer le script et d’afficher une trace. Cette trace contient tous les détails de connexion à la base de données (nom d’utilisateur, mot de passe, etc.). Nous devons donc la capturer pour éviter que des utilisateurs malveillants tentent de la lire.

Pour faire cela, nous allons utiliser des blocs try et catch.
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            
            //On essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servername;dbname=bddtest", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-connexion-serveur-pdo.png)

Ici, nous utilisons également la méthode setAttribute() en lui passant deux arguments PDO::ATTR_ERRMODE et PDO::ERRMODE_EXCEPTION.

La méthode setAttribute() sert à configurer un attribut PDO. Dans ce cas précis, nous lui demandons de configurer l’attribut PDO::ATTR_ERRMODE qui sert à créer un rapport d’erreur et nous précisons que l’on souhaite qu’il émette une exception avec PDO::ERRMODE_EXCEPTION.

Plus précisément, en utilisant PDO::ERRMODE_EXCEPTION on demande au PHP de lancer une exception issue de la classe PDOException (classes étendue de Exception) et d’en définir les propriétés afin de représenter le code d’erreur et les informations complémentaires.

Ensuite, nous n’avons plus qu’à capturer cette exception PDOException et à afficher le message d’erreur correspondant. C’est le rôle de notre bloc catch.

# Fermer la connexion à la base de données

Une fois la connexion à la base de données ouverte, celle-ci reste active jusqu’à la fin de l’exécution de votre script.

Pour fermer la connexion avant cela, nous allons devoir utiliser différentes méthodes selon la méthode d’ouverture choisie.

Si on utilise MySQLi orienté objet, alors il faudra utiliser la méthode close()

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/fermeture-connnexion-serveur-mysqli-objet.png)

Si on utilise MySQLi procédural, on utilisera la fonction mysqli_close()

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/fermeture-connnexion-serveur-mysqli-procedural.png)

Si on utilise PDO, il faudra détruire l’objet représentant la connexion et effacer toutes ses références. Nous pouvons faire cela en assignant la valeur NULL à la variable gérant l’objet.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/fermeture-connnexion-serveur-pdo.png)