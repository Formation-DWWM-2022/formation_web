# Un premier point sur l’injection SQL

- Comprendre l'injection SQL en 2 minutes : https://youtu.be/sIsjlfBZVzo
  
## Exemple 1 : 

Jusqu’à présent, nous avons fourni nous-mêmes les valeurs à insérer en base de données. Cependant, en pratique, nous allons très souvent stocker et manipuler des données envoyées directement par les utilisateurs.

Le gros souci par rapport aux données envoyées par les utilisateurs est que vous devez toujours vous en méfier : vous n’êtes jamais à l’abri d’une étourderie ou d’un comportement volontairement malfaisant.

Jusqu’ici, nos requêtes n’étaient pas du tout protégées contre ce type de comportements. Pour bien comprendre cela, imaginez que vous récupériez les valeurs à insérer dans notre table Clients créée précédemment à partir d’un formulaire.

Vous demandez donc aux utilisateurs de rentrer leur nom, prénom, adresse, etc. Sans plus de vérification, rien n’empêche un utilisateur d’envoyer une valeur qui va soit faire planter notre script soit éventuellement altérer notre base de données.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = 'localhost';
            $dbname = 'pdodb';
            $user = 'root';
            $pass = 'root';
            
            /*On imagine qu'on récupère les valeurs suivantes à partir d'un formulaire envoyé
             *par les utilisateurs*/
            $nom = "Richard";
            $prenom = "Alexandre";
            $adresse = "Rue de la Chèvre";
            $ville = "Toulon";
            $cp = 83000;
            $pays = "France";
            $mail = "'gg@gmail.com'),('a','b','c','d',1,'e','f'";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $dbco->beginTransaction();
                
                $sql = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                        VALUES($nom,$prenom,$adresse,$ville,$cp,$pays,$mail)";
                $dbco->exec($sql);
                echo 'Entrée ajoutée dans la table';
            }
            
            catch(PDOException $e){
                $dbco->rollBack();
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/injection-sql-reussie-insertion-donnees-php.png)

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/donnees-injectees-sql.png)

Ici, nous avons précisé une valeur habile dans notre variable $mail qui nous a permis d’insérer deux entrées d’un coup en utilisant une syntaxe non recommandée mais qui fonctionne toujours qui précise les différentes valeurs des entrées à insérer en séparant les groupes par des virgules.

En effet, regardons plus attentivement ce que ça donne lorsqu’on remplace notre variable par son contenu dans le code ci-dessus.

```php
$sql = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
        VALUES($nom,$prenom,$adresse,$ville,$cp,$pays,'gg@gmail.com'),
              ('a','b','c','d',1,'e','f')";
```

Dans ce cas-là, deux nouvelles entrées vont être insérées dans notre table. Ici, nous restons dans la catégorie des cas « gênants » mais non dangereux.

Cependant, rien n’aurait empêché cet utilisateur d’insérer une autre commande SQL pour lire le contenu de notre base de données, la modifier ou encore la supprimer !

Pour cette raison, vous devez une nouvelle fois faire toujours très attention dès que vous recevez des données utilisateur et ajouter différents niveaux de sécurité (sécuriser ses formulaires en utilisant les regex, neutraliser les injections en PHP, préparer ses requêtes, etc.).

---

## Exemple 2 : 

![](https://adamatlinc.files.wordpress.com/2015/09/mrr4.jpg)

Si je commence par ça, c’est que malgré le fait que presque tout le monde en a entendu parler, c’est toujours la plus exploitée. C’est ce trou de sécurité que les développeurs laissent le plus ! C’est de loin la plus dangereuse, même aujourd’hui.

Et c’est pas moi qui le dis, mais la très sérieuse OWASP.

Je te montre en PHP, mais on s’en fout du langage, le problème est le même pour tous les langages. Typiquement ce que tu veux surtout pas faire ressemble à ça.

```php
<?php
$mysqli = new mysqli("localhost", "username", "username", "dbname");

$sql = "SELECT * FROM users WHERE email='" . $email . "' AND encrypted_password='" . $password . "'";
$result = $mysqli->query($sql);

$mysqli->close();
?>
```

Ça, c’est une satanerie. C’est le mal car les variables (ligne 4) sont passées directement dans la requête sans échapper les caractères de contrôle SQL. Pour mieux comprendre cette phrase, regardons de plus près ce qui se passe lors de l’attaque.

Un utilisateur normal va rentrer son login et son mot de passe dans ton formulaire de cette façon :

![](https://i.imgur.com/zJ8ZpNa.png)

Et ça va générer cette requête SQL.

```php
SELECT * FROM users WHERE email='email@email.com' AND encrypted_password='password'
```

Et dans ce scénario, tout va bien. L’utilisateur est authentifié si le login et le mot de passe sont bons. C’est ce qu’on veut.

Un utilisateur qui te veut du mal va faire les choses différemment.

Dans le formulaire de login il va tenter de modifier ta requête SQL.
Et sans protection il va facilement y arriver.

![](https://i.imgur.com/LnOgRcx.png)

Qui va générer cette requête SQL.

```php
SELECT * FROM users WHERE email='email@email.com'--' AND encrypted_password='password'
```

Le caractère de contrôle ‘ ferme la condition du where. Le caractère de contrôle — fait ignorer la suite de la requête. Et comme les caractères de contrôle ne sont pas échappés, le SQL les interprète comme commandes valides !

L’attaquant vient de se connecter sur ton site -à la place de quelqu’un d’autre- sans avoir besoin de mot passe.

![](https://static0.srcdn.com/wordpress/wp-content/uploads/2019/12/Mr-Robot-F-Society.jpg)

D’ailleurs, en général, il s’arrête pas là.

![](https://i.imgur.com/Z45ewpO.png)

```php
SELECT * FROM users WHERE email='email@email.com';DROP TABLE users;--' AND encrypted_password='password'
```

Ce qui va gentiment supprimer ta base de données d’utilisateurs.


## Atténuation

Pour éviter cet enfer, il faut juste que tu « échappes » les caractères de contrôle SQL des variables. Concrètement ça veut dire que SQL va les considérer comme des strings, pas un caractère de contrôle SQL. Et pour faire ça, il faut utiliser les fonctions intégrées dans ton langage.

```php
<?php
$mysqli = new mysqli("localhost", "username", "username", "dbname");

$email = $mysqli->real_escape_string($email);
$password = $mysqli->real_escape_string($password);

$sql = "SELECT * FROM users WHERE email='" . $email . "' AND encrypted_password='" . $password . "'";
$result = $mysqli->query($sql);

$mysqli->close();
?>
```

Encore une fois ici c’est du PHP, mais tu as des systèmes intégrés d’échappement de caractère dans tous les langages, frameworks possibles !

Cette injection est la plus courante, mais il existe d’autres types d’injection de code.

# Bienvenue dans le Bac à Sable !
- Injection SQL : https://www.leblogduhacker.fr/sandbox/injectionsql.php 
- Injection SQL : https://www.hacksplaining.com/exercises/sql-injection#/start