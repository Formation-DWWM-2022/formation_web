# Insérer des données dans une table MySQL

Une fois notre base de données et nos premières tables créées, nous allons pouvoir commencer à insérer des données dans ces dernières.

Nous allons voir comment insérer une ou plusieurs entrées dans une table et allons également comprendre l’intérêt de préparer ses requêtes SQL et voir comment faire cela.

# Insérer des données dans une table

Pour insérer des données dans une table, nous allons cette fois-ci utiliser l’instruction SQL INSERT INTO suivie du nom de la table dans laquelle on souhaite insérer une nouvelle entrée avec sa structure puis le mot clef VALUES avec les différentes valeurs à insérer.

Concrètement, la structure de la requête SQL va être la suivante :
INSERT INTO nom_de_table (nom_colonne1, nom_colonne2, nom_colonne3, …)
VALUES (valeur1, valeur2, valeur3, …)

Il y a cependant quelques règles de syntaxe à respecter afin que cette requête fonctionne :

- Les valeurs de type chaine de caractère (String) doivent être placées entre apostrophes ;
- La valeur NULL ne doit pas être placée entre apostrophes ;
- Les valeurs de type numérique ne doivent pas être placées entre apostrophes.

A priori, vous devriez avoir autant de valeurs à insérer qu’il y a de colonnes dans votre table. Cependant, notez qu’il n’est pas nécessaire de préciser les colonnes possédant un attribut AUTO_INCREMENT ou TIMESTAMP ni leurs valeurs associées puisque par définition MySQL stockera automatiquement les valeurs courantes.

Reprenons par exemple notre table « Clients » créée dans la leçon précédente. Cette table possède neuf colonnes dont une colonne Id avec un attribut AUTO_INCREMENT et une colonne DateInscription qui possède un attribut TIMESTAMP.

Essayons d’insérer une première entrée dans cette table en utilisant PHP et PDO :
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
                
                $sql = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                        VALUES('Giraud','Pierre','Quai d\'Europe','Toulon',83000,'France','pierre.giraud@edhec.com')";
                
                $dbco->exec($sql);
                echo 'Entrée ajoutée dans la table';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/insertion-donnees-base-donnees-php-pdo.png)

Ici, on insère dans notre table Clients une entrée. Pour cela, on utilise INSERT INTO et on précise le nom des colonnes pour lesquelles on doit renseigner une valeur : Nom, Prénom, Adresse, Ville, Codepostal, Pays et Mail.

Ensuite, dans la même requête SQL, on transmet les valeurs relatives à ces colonnes. Le reste du script est très classique (connexion à la base de données, exécution de notre requête SQL et gestion des exceptions).

Une fois notre code exécuté, nous pouvons aller voir notre table dans phpMyAdmin pour voir si l’entrée a bien été ajoutée comme on le désirait.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/entree-ajoutee-php-pdo-mysql.png)

# Insérer plusieurs entrées dans une table

Nous allons pouvoir insérer plusieurs entrées d’un coup dans une table de différentes façons en PDO.

Nous allons déjà tout simplement pouvoir réutiliser l’écriture précédente en la répétant plusieurs fois.

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
                
                $sql1 = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                        VALUES('Durand','Victor','Rue des Acacias','Brest',29200,'France','v.durand@gmail.com')";
                $dbco->exec($sql1);
                
                $sql2 = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                        VALUES('Julia','Joly','Rue du Hameau','Lyon',69001,'France','july@gmail.com')";
                $dbco->exec($sql2);
                
                echo 'Entrées ajoutées dans la table';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/insertion-donnees-multiples-base-donnees-php-pdo.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/donnees-multiples-inserees-php-pdo-mysql.png)

L’un des gros défauts de cette méthode est que s’il y a un problème d’exécution en cours du script, certaines entrées vont être insérées et pas d’autres et certaines entrées pourraient ne pas avoir toutes leurs données insérées.

Pour éviter cela, nous pouvons ajouter les méthodes beginTransaction(), commit() et rollBack() dans notre code.

La méthode beginTransaction() permet de démarrer ce qu’on appelle une transaction et de désactiver le mode autocommit. Concrètement, cela signifie que toutes les manipulations faites sur la base de données ne seront pas appliquées tant qu’on ne mettra pas fin à la transaction en appelant commit().

La méthode commit() sert donc à valider une transaction, c’est-à-dire à valider l’application d’une ou d’un ensemble de requêtes SQL. Cette méthode va aussi replacer la connexion en mode autocommit.

La méthode rollBack() sert à annuler une transaction si l’on s’aperçoit d’une erreur. Cette méthode restaure le mode autocommit après son exécution.

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
                
                $dbco->beginTransaction();
                
                $sql1 = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                        VALUES('Doe','John','Rue des Lys','Nantes',44000,'France','j.doe@gmail.com')";
                $dbco->exec($sql1);
                
                $sql2 = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                        VALUES('Dupont','Jean','Bvd Original','Bordeaux',33000,'France','jd@gmail.com')";
                $dbco->exec($sql2);
                
                $dbco->commit();
                echo 'Entrées ajoutées dans la table';
            }
            
            catch(PDOException $e){
                $dbco->rollBack();
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/execution-commit-php-pdo.png)

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-commit-php-pdo.png)

Dans le code ci-dessus, on commence par désactiver l’autocommit avec beginTransaction().

Si aucune erreur n’est détectée, la méthode commit() s’exécute après nos requêtes SQL, valide donc les transactions et replace la connexion en mode autocommit.

Si en revanche une exception est lancée, alors la méthode rollBack() s’exécute et annule toutes les transactions avant de restaurer le mode autocommit.

Par exemple, si je tente de ré-exécuter mon code en modifiant la valeur « mail » de la première entrée mais pas celle de la seconde, une erreur va être lancée car j’ai une contrainte UNIQUE sur le champ Mail de ma table. La méthode rollBack() va donc s’exécuter et aucune transaction ne va être validée.
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
                
                $dbco->beginTransaction();
                
                $sql1 = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                        VALUES('Doe','John','Rue des Lys','Nantes',44000,'France','mod@gmail.com')";
                $dbco->exec($sql1);
                
                $sql2 = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                        VALUES('Dupont','Jean','Bvd Original','Bordeaux',33000,'France','jd@gmail.com')";
                $dbco->exec($sql2);
                
                $dbco->commit();
                echo 'Entrées ajoutées dans la table';
            }
            
            catch(PDOException $e){
                $dbco->rollBack();
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/execution-rollback-php-pdo.png)

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/resultat-rollback-php-pdo.png)

Cette deuxième façon de procéder est déjà meilleure que la première. Cependant, en pratique, nous utiliserons plutôt les requêtes préparées pour insérer plusieurs entrées d’un coup dans nos tables, notamment lorsque les données seront fournies par les utilisateurs.

# Les requêtes MySQL préparées avec PDO PHP

Les requêtes préparées correspondent à une façon de créer et d’exécuter nos requêtes selon trois étapes : une étape de préparation, une étape de compilation et finalement une dernière étape d’exécution.

Préparer ses requêtes comporte des avantages notables notamment dans le cas où l’on doit exécuter un grand nombre de fois une même requête ou si l’on doit insérer des données envoyées par les utilisateurs.
 
# Préparer ses requêtes : comment ça marche ?

Tout d’abord, une première phase de préparation dans laquelle nous allons créer un template ou schéma de requête, en ne précisant pas les valeurs réelles dans notre requête mais en utilisant plutôt des marqueurs nommés (sous le forme :nom) ou des marqueurs interrogatifs (sous la forme ?).

Ces marqueurs nommés ou interrogatifs (qu’on peut plus globalement nommer marqueurs de paramètres) vont ensuite être remplacés par les vraies valeurs lors de l’exécution de la requête. Notez que vous ne pouvez pas utiliser les marqueurs nommés et les marqueurs interrogatifs dans une même requête SQL, il faudra choisir l’un ou l’autre.

Une fois le template créé, la base de données va analyser, compiler, faire des optimisations sur notre template de requête SQL et va stocker le résultat sans l’exécuter.

Finalement, nous allons lier des valeurs à nos marqueurs et la base de données va exécuter la requête. Nous allons pouvoir réutiliser notre template autant de fois que l’on souhaite en liant de nouvelles valeurs à chaque fois.

Utiliser des requêtes préparées va nous offrir deux principaux avantages par rapport à l’exécution directe de requêtes SQL :

- Nous allons gagner en performance puisque la préparation de nos requêtes ne va être faite qu’une fois quel que soit le nombre d’exécutions de notre requête ;
- Le risque d’injection SQL est minimisé puisque notre requête est pré-formatée et nous n’avons donc pas besoin de protéger nos paramètres ou valeurs manuellement.

--- 
# Un premier point sur l’injection SQL ⚠️⚠️

[Un premier point sur l’injection SQL](../../RAN/SecuriteWebSite/InjectionSQL.md)
--- 

# Les méthodes execute(), bindParam() et bindValue()

Pour exécuter une requête préparée, nous allons cette fois-ci devoir utiliser la méthode execute() et non plus exec() comme on utilisait depuis le début de cette partie.

En utilisant des marqueurs dans nos requêtes préparées, nous allons avoir deux grandes options pour exécuter la méthode execute() :

- On va pouvoir lui passer un tableau de valeurs de paramètres (uniquement en entrée) ;
- On va pouvoir d’abord appeler les méthodes bindParam() ou bindValue() pour respectivement lier des variables ou des valeurs à nos marqueurs puis ensuite exécuter execute().

Pas d’inquiétude, je vous explique immédiatement les différences concrètes entre ces méthodes et les cas d’utilisation !

Commencez déjà par noter que passer un tableau directement en valeur de execute() devrait être considéré comme la méthode par défaut puisque c’est finalement la plus simple et que tout va fonctionner normalement dans l’immense majorité des cas.

En fait, execute(array) est une méthode d’écriture raccourcie ; l’idée derrière cela est qu’une boucle va être exécutée en tâche de fond dont l’objet va être d’appeler bindValue() sur chacun des éléments du tableau.

En utilisant execute(array), les valeurs vont être liées en tant que type String excepté pour le type NULL qui restera inchangé. Cela va fonctionner une nouvelle fois dans l’immense majorité des cas.

Cependant, dans de rares cas, il sera utile de définir explicitement le type de données. Les cas les plus fréquents sont les suivants :

- Notre requête contient une clause LIMIT ou toute autre clause qui ne peut pas accepter une valeur de type String et le mode emulation est activé (ON) ;
- Notre table contient des colonnes avec un type particulier qui n’accepte que des valeurs d’un certain type (comme les colonnes de type BOOLEAN ou BIGINT par exemple).

Dans ces cas-là, il sera alors préférable de lier les variables avant d’utiliser execute() si vous voulez avoir le résultat attendu.

Quelle différence maintenant entre bindParam() et bindValue() ?

La méthode bindParam() va lier un paramètre à un nom de variable spécifique et la variable va être liée en tant que référence et ne sera évaluée qu’au moment de l’appel à la méthode execute().

Si la variable change de valeur entre l’appel à la méthode bindParam() et l’appel à la méthode execute(), c’est donc la dernière valeur qui sera utilisée.

La méthode bindValue() va elle associer directement une valeur à un paramètre.

La méthode bindParam() fonctionne avec deux paramètres obligatoires et trois facultatifs dont un qui va particulièrement nous intéresser :

- Un identifiant (obligatoire) qui sera de la forme :nom si on utilise des marqueurs nommés ou qui sera l’index de base 1 du paramètre si on utilise un marqueur interrogatif ;
- Le nom de la variable PHP (obligatoire) à lier au paramètre de la requête SQL ;
- Le type de données explicite pour le paramètre (facultatif) spécifié en utilisant les constantes PDO::PARAM_*constants.

Les constantes prédéfinies les plus utilisées sont les suivantes :

- PDO ::PARAM_STR, qui représente le type de données CHAR, VARCHAR et les autres types de données « chaine de caractères » SQL ;
- PDO ::PARAM_INT, qui représente le type de données SQL INTEGER (nombre entier) ;
- PDO ::PARAM_NULL, qui représente le type de données SQL NULL ;
- PDO ::PARAM_BOOL, qui représente le type de données booléen.

Pour la liste complète des constantes, vous pouvez consulter la documentation officielle.

La méthode bindValue() va fonctionner également avec deux paramètres obligatoires et un facultatif :

- Un identifiant (obligatoire) qui sera de la forme :nom si on utilise des marqueurs nommés ou qui sera l’index de base 1 du paramètre si on utilise un marqueur interrogatif ;
- La valeur à associer au paramètre (obligatoire) ;
- Le type de données explicite pour le paramètre (facultatif) spécifié en utilisant les constantes PDO::PARAM_*constants.

Notez que les méthodes execute() bindParam() et bindValue() appartiennent toutes les trois à la classe PDOStatement et non pas à la classe PDO. La classe PDOStatement représente une requête préparée et, une fois exécutée, l’ensemble des résultats associés.

# Exemples pratiques de requêtes préparées

Reprenons notre table Clients et tentons d’insérer de nouvelles entrées en utilisant les requêtes préparées. Nous allons passer en revue les différentes façons de faire expliquées précédemment.
Avec execute(array) et des marqueurs nommés

Commençons déjà en préparant une requête avec des marqueurs nommés puis en l’exécutant avec execute(array) :

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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
      
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $nom = "Flo";
                $prenom = "Dechand";
                $adresse = "Rue des Moulins";
                $ville = "Marseille";
                $cp = 13001;
                $pays = "France";
                $mail = "flodc@gmail.com";
              
                //$sth appartient à la classe PDOStatement
                $sth = $dbco->prepare("
                    INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                    VALUES (:nom, :prenom, :adresse, :ville, :cp, :pays, :mail)
                ");
                $sth->execute(array(
                                    ':nom' => $nom,
                                    ':prenom' => $prenom,
                                    ':adresse' => $adresse,
                                    ':ville' => $ville,
                                    ':cp' => $cp,
                                    ':pays' => $pays,
                                    ':mail' => $mail));
                echo "Entrée ajoutée dans la table";
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/nouvelle-entree-ajoutee-mysql-execute-marqueurs-nommes.png)

Ici, on commence par préparer notre requête SQL grâce à la méthode prepare() qui appartient à la classe PDOStatement. On place le résultat dans un objet $sth.

Notez qu’on remplace bien les valeurs dans notre requête SQL par nos marqueurs nommés (sans les entourer d’apostrophes).

On appelle ensuite execute() en lui passant un tableau composé de nos marqueurs et des variables associées.

## Avec execute(array) et des marqueurs interrogatifs

Le principe va être relativement similaire à ce que l’on vient de faire, à part que nous allons cette fois-ci utiliser des marqueurs interrogatifs :

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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $nom = "Tom";
                $prenom = "Dubois";
                $adresse = "Rue du Chene";
                $ville = "Nice";
                $cp = 06000;
                $pays = "France";
                $mail = "duboistom@gmail.com";
              
                //$sth appartient à la classe PDOStatement
                $sth = $dbco->prepare("
                    INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                    VALUES (?, ?, ?, ?, ?, ?, ?)
                ");
                $sth->execute(array($nom, $prenom, $adresse, $ville, $cp, $pays, $mail));
                echo "Entrée ajoutée dans la table";
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/nouvelle-entree-ajoutee-mysql-execute-marqueurs-interrogatifs.png)

## En utilisant bindValue et des marqueurs nommés

Nous allons cette fois-ci associer des valeurs à des paramètres en utilisant bindValue() et des marqueurs nommés :

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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
      
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $nom = "Laura";
                $prenom = "Dubois";
                $adresse = "Rue du Chene";
                $ville = "Nice";
                $cp = 06000;
                $pays = "France";
                $mail = "lauradb@gmail.com";
              
                //$sth appartient à la classe PDOStatement
                $sth = $dbco->prepare("
                    INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                    VALUES (:nom, :prenom, :adresse, :ville, :cp, :pays, :mail)
                ");
                //La constante de type par défaut est STR
                $sth->bindValue(':nom', $nom);
                $sth->bindValue(':prenom', $prenom);
                $sth->bindValue(':adresse', $adresse);
                $sth->bindValue(':ville', $ville);
                $sth->bindValue(':cp', $cp, PDO::PARAM_INT);
                $sth->bindValue(':pays', $pays);
                $sth->bindValue(':mail', $mail);
                $sth->execute();
                echo "Entrée ajoutée dans la table";
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/nouvelle-entree-ajoutee-bindvalue-mysql-marqueurs-nommes.png)

On ajoute une étape ici en utilisant bindValue() pour lier des valeurs à des paramètres. Une fois toutes les valeurs liées, nous n’avons plus qu’à appeler execute() pour exécuter notre requête.

## En utilisant bindValue et des marqueurs interrogatifs

Même principe que précédemment mais cette fois-ci avec des marqueurs interrogatifs :

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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
      
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $nom = "Mathilde";
                $prenom = "Palaz";
                $adresse = "Rue des Cerisiers";
                $ville = "Rouen";
                $cp = 76000;
                $pays = "France";
                $mail = "mathplz@gmail.com";
              
                //$sth appartient à la classe PDOStatement
                $sth = $dbco->prepare("
                    INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                    VALUES (?, ?, ?, ?, ?, ?, ?)
                ");
                //La constante de type par défaut est STR
                $sth->bindValue(1, $nom);
                $sth->bindValue(2, $prenom);
                $sth->bindValue(3, $adresse);
                $sth->bindValue(4, $ville);
                $sth->bindValue(5, $cp, PDO::PARAM_INT);
                $sth->bindValue(6, $pays);
                $sth->bindValue(7, $mail);
                $sth->execute();
                echo "Entrée ajoutée dans la table";
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/nouvelle-entree-ajoutee-mysql-bindvalue-marqueurs-interrogatifs.png)

Notez qu’on précise cette fois ci l’index de base 1 du paramètre dans notre méthode bindValue().

## En utilisant bindParam et des marqueurs nommés ou interrogatifs

On peut finalement lier nos variables à des marqueurs avec bindParam() dans nos requêtes préparées.

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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
       
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $nom = "Jean";
                $prenom = "Bombeur";
                $adresse = "Rue des Bouchers";
                $ville = "Toulouse";
                $cp = 31000;
                $pays = "France";
                $mail = "jbb@gmail.com";
                
                $sth = $dbco->prepare("
                    INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                    VALUES (:nom, :prenom, :adresse, :ville, :cp, :pays, :mail)
                ");
                //La constante de type par défaut est STR
                $sth->bindParam(':nom', $nom);
                $sth->bindParam(':prenom', $prenom);
                $sth->bindParam(':adresse', $adresse);
                $sth->bindParam(':ville', $ville);
                $sth->bindParam(':cp', $cp, PDO::PARAM_INT);
                $sth->bindParam(':pays', $pays);
                $sth->bindParam(':mail', $mail);
                $cp = 31001;
                $sth->execute();
                echo "Entrée ajoutée dans la table";
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/nouvelle-entree-ajoutee-mysql-bindparam-marqueurs-nommes.png)

Ici, on utilise des marqueurs nommés. Notez bien une nouvelle fois que les variables sont ici liées en tant que références et ne sont évaluées qu’au moment où on appelle execute().

Ainsi, si on modifie la valeur stockée dans une variable entre le moment où on appelle bindParam() et celui où on appelle execute(), c’est bien la dernière valeur qui va être retenue au contraire de si on utilisait bindValue().

On peut également utiliser bindParam avec des marqueurs interrogatifs :

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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $nom = "Gérard";
                $prenom = "Philippe";
                $adresse = "Impasse des sans Noms";
                $ville = "Nantes";
                $cp = 44000;
                $pays = "France";
                $mail = "philou@gmail.com";
                
                $sth = $dbco->prepare("
                    INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                    VALUES (?, ?, ?, ?, ?, ?, ?)
                ");
                $sth->bindParam(1, $nom);
                $sth->bindParam(2, $prenom);
                $sth->bindParam(3, $adresse);
                $sth->bindParam(4, $ville);
                $sth->bindParam(5, $cp, PDO::PARAM_INT);
                $sth->bindParam(6, $pays);
                $sth->bindParam(7, $mail);
                $sth->execute();
                echo "Entrée ajoutée dans la table";
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/nouvelle-entree-ajoutee-mysql-bindparam-marqueurs-interrogatifs.png)

Voilà tout pour les requêtes préparées ! Si ces nouvelles choses vous semblent floues, prenez le temps de relire ce chapitre et de refaire les exemples.

Dans tous les cas, nous allons beaucoup nous resservir des requêtes préparées par la suite donc vous devriez les assimiler et les maitriser rapidement.

# Mettre à jour des données dans une table

Nous allons utiliser l’instruction SQL UPDATE suivie du nom de la table pour mettre à jour des données dans une table.

Cette instruction va toujours être accompagnée de SET qui va nous servir à préciser la colonne à mettre à jour ainsi que la nouvelle valeur pour la colonne.

En s’arrêtant là, en effet, nous allons mettre à jour toutes les valeurs d’une colonne d’un coup ! Ce sera très rarement ce que nous voudrons faire en pratique, et c’est pour cela que nous allons généralement également utiliser la clause WHERE pour spécifier quelles entrées doivent être mises à jour.

Prenons immédiatement pour voir en pratique comment nous allons pouvoir mettre à jour des données dans une table en utilisant PDO.

Pour cet exemple, je vais cette fois-ci m’appuyer sur une table nommée « Users » qui appartient à ma base de données « pdodb » et contient 4 colonnes :

- Une colonne « Id », type INT, UNISGNED, PRIMARY KEY, AUTO_INCREMENT
- Une colonne « Prenom », type VARCHAR(30) NOT NULL
- Une colonne « Nom », type VARCHAR(30) NOT NULL
- Une colonne « Mail », type VARCHAR(30) NOT NULL

Nous allons pour le moment nous contenter d’ajouter 3 entrées dans cette table.
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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //Crée la table Users
                $sql = "CREATE TABLE Users (
                  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  Prenom VARCHAR(30) NOT NULL,
                  Nom VARCHAR(30) NOT NULL,
                  Mail VARCHAR(50) NOT NULL
                )";
                $dbco->exec($sql);
                
                //On prépare la requête et on lie les paramètres
                $sth = $dbco->prepare("
                  INSERT INTO Users (Prenom, Nom, Mail)
                  VALUES (:prenom, :nom, :mail)
                ");
                $sth->bindParam(':prenom', $prenom);
                $sth->bindParam(':nom', $nom);
                $sh->bindParam(':mail', $mail);
                
                //Insère une première entrée
                $prenom = "Pierre"; $nom = "Giraud"; $mail = "pierre.giraud@edhec.com";
                $sth->execute();
                
                //Insère une deuxième entrée
                $prenom = "Victor"; $nom = "Durand"; $mail = "v.durandd@edhec.com";
                $sth->execute();
                
                //Insère une troisième entrée
                $prenom = "Julia"; $nom = "Joly"; $mail = "july@gmail.com";
                $sth->execute();
                
                echo "Parfait, tout s'est bien passé";
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/ajout-entrees-table-mysql-php-pdo.png)

Et voici ce que vous devriez donc avoir en visualisant la structure et le contenu de votre table via phpMyAdmin :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/structure-table-mysql.png)

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/contenu-table-mysql.png)

On s’aperçoit qu’il y a un « d » en trop dans l’adresse mail de notre utilisateur « Victor Durand », utilisons donc UPDATE pour SET une nouvelle valeur pour la colonne mail de cet utilisateur.

Pour ne mettre à jour que la valeur du mail correspondant à cette entrée, nous allons également utiliser WHERE en donnant une condition sur l’id.

    Bon à savoir : Nous ne sommes pas obligés d’utiliser la clause WHERE sur la colonne « id », nous pouvons tout aussi bien donner une condition sur n’importe quelle autre colonne. Cependant, en pratique, nous nous appuierons très souvent sur cette fameuse colonne « id » car c’est un moyen simple et infaillible d’isoler une entrée en particulier.

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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //On prépare la requête et on l'exécute
                $sth = $dbco->prepare("
                  UPDATE Users
                  SET mail='v.durand@edhec.com'
                  WHERE id=2
                ");
                $sth->execute();
                
                //On affiche le nombre d'entrées mise à jour
                $count = $sth->rowCount();
                print('Mise à jour de ' .$count. ' entrée(s)');
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/clause-sql-where-resultat.png)

Le script ci-dessus est assez transparent : on prépare notre requête pour mettre à jour l’adresse mail de l’utilisateur portant l’id 2 dans notre table puis on exécute cette requête.

On utilise ensuite la méthode rowCount() pour obtenir le nombre d’entrées affectées par notre dernière requête. En effet, rowCount() retourne le nombre de lignes affectées par la dernière requête DELETE, INSERT ou UPDATE exécutée par l’objet de la classe PDOStatement correspondant (en l’occurrence ici $sth.

On peut également aller vérifier dans phpMyAdmin que notre la valeur mail de notre entrée à bien été mise à jour.

# Supprimer une ou plusieurs entrées choisies d’une table

Pour supprimer des données d’une table, nous allons utiliser l’instruction SQL DELETE FROM.

Pour préciser quelles entrées doivent être supprimées, nous allons accompagner DELETE FROM d’une clause WHERE nous permettant de cibler des données en particulier dans notre table.

Pour tester cette instruction, nous allons utiliser la table « Users » créée précédemment (table contenant 4 colonnes et 3 entrées).

En pratique, pour supprimer une entrée en particulier, nous utiliserons la clause WHERE sur une colonne « id » en ciblant un « id » précis.

Nous pouvons également supprimer plusieurs entrées en donnant une inégalité en condition de la clause WHERE (cibler tous les « id » supérieurs à 5 par exemple) ou en ciblant un autre type de données (supprimer toutes les entrées dont la valeur dans la colonne « Prenom » est « Pierre » par exemple).

Ici, nous allons vouloir supprimer tous les utilisateurs dont le nom est « Giraud ».

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
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "DELETE FROM Users WHERE nom='Giraud'";
                $sth = $dbco->prepare($sql);
                $sth->execute();
                
                $count = $sth->rowCount();
                print('Effacement de ' .$count. ' entrées.');
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/suppression-entrees-mysql-pdo-php.png)

On peut aller vérifier dans phpMyAdmin que notre entrée a bien été effacée :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/verification-suppression-entrees-mysql-pdo-php.png)