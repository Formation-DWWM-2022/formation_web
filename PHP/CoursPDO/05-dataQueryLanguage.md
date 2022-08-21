# Sélection simple de données dans une table MySQL en PHP

La sélection de données va être l’une des opérations fondamentales et les plus courantes que nous allons avoir à effectuer. En effet, nous allons devoir sélectionner ou récupérer des données en base notamment pour les comparer aux données envoyées par un utilisateur lors d’une tentative de connexion à son espace personnel sur notre site par exemple.

# La sélection simple de données dans une base de données

Pour sélectionner des données dans une base de données, nous allons utiliser l’instruction SQL SELECT… FROM

Pour tester cette nouvelle instruction, il va avant tout nous falloir une base de données avec au moins une table et des données à l’intérieur. Pour cela, je vous invite à créer une nouvelle base qu’on appellera « cours » contenant une table nommée « users ».

Cette nouvelle table « users » va contenir 5 colonnes :

- Une colonne « id », type INT, UNISGNED, PRIMARY KEY, AUTO_INCREMENT
- Une colonne « prenom », type VARCHAR(30) NOT NULL
- Une colonne « nom », type VARCHAR(30) NOT NULL
- Une colonne « mail », type VARCHAR(50)
- Une colonne « dateInscrit », type TIMASTAMP.

Nous allons également en profiter pour insérer 3 entrées dans cette table. Voici le script qui va nous permettre de faire tout ça en une fois :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $createDB = "CREATE DATABASE cours";
                $dbco->exec($createDB);
                
                //On utilise la base tout juste créée pour créer une table dedanss
                $createTb = "use cours";
                $dbco->exec($createTb);
                
                $createTb = "CREATE TABLE users(
                  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  prenom VARCHAR(30) NOT NULL,
                  nom VARCHAR(30) NOT NULL,
                  mail VARCHAR(50),
                  dateInscrit TIMESTAMP)";
                $dbco->exec($createTb);
                
                $sth = $dbco->prepare("
                  INSERT INTO users(prenom, nom, mail)
                  VALUES (:prenom, :nom, :mail)
                ");
                $sth->bindParam(':prenom', $prenom);
                $sth->bindParam(':nom', $nom);
                $sth->bindParam(':mail', $mail);
                
                $prenom = "Pierre"; $nom = "Giraud"; $mail = "pierre.giraud@edhec.com";
                $sth->execute();
                $prenom = "Victor"; $nom = "Durand"; $mail = "v.durand@edhec.com";
                $sth->execute();
                $prenom = "Julia"; $nom = "Joly"; $mail = "july@gmail.com";
                $sth->execute();
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

A partir de là, nous pouvons tester notre instruction SELECT…FROM en sélectionnant par exemple tous les prénoms et adresses mail de notre table « users ».

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost"; $dbname = "cours"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
                $sth = $dbco->prepare("SELECT prenom, mail FROM users");
                $sth->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                
                /*print_r permet un affichage lisible des résultats,
                 *<pre> rend le tout un peu plus lisible*/
                echo '<pre>';
                print_r($resultat);
                echo '</pre>';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-selection-donnees-base-donnees-php-pdo.png)

Ici, nous utilisons les requêtes préparées pour sélectionner toutes les valeurs dans les colonnes « prenom » et « mail » de notre table « users ».

Une fois les valeurs sélectionnées, nous utilisons la méthode fetchAll() qui est une méthode de la classe PDOStatement qui va retourner un tableau contenant toutes les lignes de résultats.

Ici, nous passons un argument (facultatif) à fetchAll() qui est le « fetch_style ». La valeur FETCH_ASSOC va faire que le tableau retourné sera un tableau multidimensionnels contenant des tableaux indexés avec le nom des colonnes dont on récupère les données en index.

    Notez que la valeur par défaut du « fetch_style » de fetchAll() est ATTR_DEFAULT_FETCH_MODE qui va lui-même prendre sa valeur par défaut de FETCH_BOTH.

La valeur FETCH_BOTH va faire que le résultat retourné va être un tableau multidimensionnel contenant des tableaux indexés et par le nom des colonnes et par les numéros des colonnes (chaque valeur va donc être spécifiés deux fois).

Si vous ne souhaitez récupérer qu’une ligne de résultats, notez également que vous pouvez utiliser la méthode fetch() à la place de fetchAll() qui va se manipuler de façon similaire.

Pour plus d’informations sur ces deux méthodes, je vous invite à lire la documentation officielle de fetch() et de fetchAll().

Finalement, on affiche rapidement notre tableau avec print_r() et on utilise également l’élément HTML pre afin d’avoir un résultat un peu plus agréable à lire.

# Récupérer toutes les valeurs dans une table

Pour récupérer toutes les valeurs dans une table d’un coup, nous allons simplement utiliser le sélectionneur * (étoile) qui, en SQL comme dans beaucoup d’autres langages informatiques, est un sélecter universel (sélecteur qui sert à tout sélectionner) avec l’instruction SELECT… FROM.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost"; $dbname = "cours"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                /*Sélectionne toutes les valeurs dans la table users*/
                $sth = $dbco->prepare("SELECT * FROM users");
                $sth->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                
                /*print_r permet un affichage lisible des résultats,
                 *<pre> rend le tout un peu plus lisible*/
                echo '<pre>';
                print_r($resultat);
                echo '</pre>';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-select-all-php-pdo.png)

# Ne récupérer que les valeurs uniques (par colonne) dans une table

Parfois, nous ne voudrons récupérer que les valeurs distinctes d’une colonne dans une table parmi toutes les valeurs.

Nous allons pouvoir faire cela en utilisant l’instruction SQL SELECT DINSTINCT. Cette instruction ne va retourner qu’une seule fois un même résultat.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
              $servname = "localhost"; $dbname = "cours"; $user = "root"; $pass = "root";
              
              try{
                  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                  $sth = $dbco->prepare("
                    INSERT INTO users (prenom, nom, mail)
                    VALUES ('Pierre', 'Rigaud', 'prgd@gmail.com')
                    ");
                  $sth-> execute();
                
                  echo "Entrée bien insérée";
              }
                    
              catch(PDOException $e){
                  echo "Erreur : " . $e->getMessage();
              }
        ?>
    </body>
</html>
```

Dès que c’est fait, nous n’avons plus qu’à tester notre instruction SELECT_DISTINCT de manière très classique en utilisant les requêtes préparées :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost"; $dbname = "cours"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sth = $dbco->prepare("SELECT DISTINCT prenom FROM users");
                $sth-> execute();
                
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                
                //<pre> permet un affichage lisible des résultats affichés avec print_r
                echo '<pre>';
                print_r($resultat);
                echo '</pre>';
            }
                
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-selection-donnees-uniques-php-pdo.png)


# Mettre en ordre les valeurs récupérées dans une table

Jusqu’à présent, nous avons retourné les données sélectionnées dans notre base de données selon l’ordre de leur écriture.

Nous allons cependant facilement pouvoir trier les données renvoyées selon un ordre croissant (de la plus petite valeur numérique à la plus grande, ou de A à Z) ou décroissant grâce à l’instruction SQL ORDER BY.

Sélectionnons immédiatement tous les prénoms et noms de notre table « users » et trions les résultats renvoyés selon l’ordre croissant des prénoms en tri principal puis selon l’ordre décroissant des noms en tri secondaire.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost"; $dbname = "cours"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //Tri croisant par prénoms puis décroissant par noms
                $sth = $dbco->prepare("
                  SELECT prenom, nom
                  FROM users
                  ORDER BY prenom ASC, nom DESC
                ");
                $sth-> execute();
                
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                
                echo '<pre>';
                print_r($resultat);
                echo '</pre>';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-tri-donnees-php-pdo.png)

De manière concrète, les tris par ordre croissant ou décroissant vont s’avérer utiles lorsqu’il s’agira de trier une liste de commandes par prix par exemple ou encore les utilisateurs par pays.