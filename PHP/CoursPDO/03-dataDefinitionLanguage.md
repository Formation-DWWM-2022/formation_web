# Créer une base de données MySQL et une table dans la base

Nous savons désormais nous connecter au serveur de différentes manières, il est donc maintenant temps d’apprendre à manipuler nos bases de données à proprement parler.

# Création d’une base de données en utilisant PDO

Nous allons pouvoir créer une nouvelle base de données avec PDO en PHP en utilisant la requête SQL CREATE DATABASE suivie du nom que l’on souhaite donner à notre base de données.

Pour exécuter une requête SQL en PDO, nous allons devoir utiliser la méthode exec() qui va prendre en paramètre une requête SQL.

Voyons immédiatement le code de création d’une base de données qu’on appelle « pdodb ».

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
            
            try{
                $dbco = new PDO("mysql:host=$servername", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE DATABASE pdodb";
                $dbco->exec($sql);
                
                echo 'Base de données créée bien créée !';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```
 
On commence déjà par se connecter au serveur. Notez ici qu’on ne précise plus de nom de bases de données puisque nous allons la créer explicitement dans la suite du script. Bien évidemment, nous prenons toujours en charge les erreurs et exceptions.

Ensuite, nous écrivons notre requête SQL que nous enfermons dans une variable pour une plus grande liberté d’utilisation par la suite. Notez qu’on aurait aussi bien pu placer la requête directement en argument de exec(). Par convention, nous écrirons toujours nos requêtes SQL en majuscule pour bien les séparer du reste du code.

On utilise donc enfin notre méthode exec() (méthode qui appartient bien évidemment à notre classe PDO) et on lui passe la variable contenant notre requête SQL en argument.

La méthode exec() va se charger d’exécuter notre requête et de créer la base de données « pdodb ».

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/creation-base-donnees-pdo-exec.png)

Vous pouvez aller vérifier dans votre phpMyAdmin, la nouvelle base de données a bien été créée.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/base-donnees-cree-pdo-php.png)

# Création d’une table en utilisant MySQL et PDO

Une base de données est constituée de tables. Les tables sont les « casiers » dans lesquelles nous allons stocker nos données. Mais avant de pouvoir stocker des données, il va déjà falloir apprendre à créer des tables dans notre base de données !

Pour créer une nouvelle table dans une base de données, nous allons utiliser la requête SQL CREATE TABLE suivie du nom que l’on souhaite donner à notre table et nous allons également pouvoir préciser entre parenthèse le nom des colonnes de notre table ainsi que le type de données qui doit être stocké dans chaque colonne.
Le MySQL nous offre beaucoup de choix de types de données différent nous permettant de créer des tables de manière vraiment précise. Vous pouvez retrouver la liste complète des types de valeur le [cours dédiée](../../BDDSQL/Cours/Créationbasedonnées_tables.md) .

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
            $servname = 'localhost';
            $dbname = 'pdodb';
            $user = 'root';
            $pass = 'root';
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE TABLE Clients(
                        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        Nom VARCHAR(30) NOT NULL,
                        Prenom VARCHAR(30) NOT NULL,
                        Adresse VARCHAR(70) NOT NULL,
                        Ville VARCHAR(30) NOT NULL,
                        Codepostal INT UNSIGNED NOT NULL,
                        Pays VARCHAR(30) NOT NULL,
                        Mail VARCHAR(50) NOT NULL,
                        DateInscription TIMESTAMP,
                        UNIQUE(Mail))";
                
                $dbco->exec($sql);
                echo 'Table bien créée !';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/execution-creation-table-sql-pdo-php.png)

Ici, nous créons donc la table « Clients » en utilisant la requête SQL CREATE TABLE Clients. Entre les parenthèses, nous précisons les colonnes que doit contenir la table en indiquant déjà le type de données attendues et les contraintes relatives à chaque colonne et en définissant l’une de nos colonnes comme PRIMARY KEY.

La syntaxe du SQL nous impose de séparer la déclaration de chaque colonne par une virgule.

Les chiffres entre parenthèses après les VARCHAR sont facultatifs : ils permettent juste d’indiquer le maximum de caractère que la colonne peut accepter pour une valeur. Indiquer cela permet d’optimiser très marginalement la table mais est surtout considéré comme une bonne pratique.

Vous pouvez vérifier dans phpMyAdmin que la table a bien été créée avec ses colonnes en cliquant sur le nom de la table dans notre base de données puis en cliquant sur « Structure » :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/table-mysql-creee-pdo-php.png)
