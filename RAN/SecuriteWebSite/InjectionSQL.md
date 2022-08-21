# Un premier point sur l’injection SQL

- Comprendre l'injection SQL en 2 minutes : https://youtu.be/sIsjlfBZVzo
  
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
            $prenom = "Pierre";
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

# Bienvenue dans le Bac à Sable !
- Injection SQL : https://www.leblogduhacker.fr/sandbox/injectionsql.php 
- Injection SQL : https://www.hacksplaining.com/exercises/sql-injection#/start