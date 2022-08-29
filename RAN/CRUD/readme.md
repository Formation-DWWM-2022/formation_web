# CRUD : La base de la gestion de données.

- Live Coding : Créer un CRUD en PHP : https://youtu.be/xHyqnEVr3V4

Le terme CRUD est étroitement lié avec la gestion des données numériques. Plus précisément, CRUD est un acronyme des noms des quatre opérations de base de la gestion de la persistance des données et applications :

- Create (créer)
- Read ou Retrieve (lire)
- Update (mettre à jour)
- Delete ou Destroy (supprimer)

Plus simplement, le terme CRUD résume les fonctions qu’un utilisateur a besoin d’utiliser pour créer et gérer des données. Divers processus de gestion des données sont basés sur CRUD, cependant les opérations sont spécifiquement adaptées aux besoins des systèmes et des utilisateurs, que ce soit dans la gestion des bases de données ou pour l’utilisation des applications. Ainsi, les opérations sont des outils d’accès classiques et indispensables avec lesquels les experts, peuvent par exemple vérifier les problèmes de base de données. Tandis que pour un utilisateur, CRUD signifie la création d’un compte (create), l’utilisation à tout moment (read), la mise à jour (update) ou encore la suppression (delete). En fonction de l’environnement de langage informatique, les opérations CRUD sont exécutées différemment, comme indiqué ci-dessous dans le tableau:

| Operation | SQL | HTTP
| --- | --- | ---
| Create | INSERT | PUT / POST
| Read (Retrieve) | SELECT | GET
| Update (Modify) | UPDATE | PUT / PATCH
| Delete (Destroy) | DELETE | DELETE 

# Un framework CRUD : une couche d’accès aux bases de données

Si les données individuelles des objets sont visualisées à l’aide d’une interface graphique et sont modifiables via les opérations CRUD, on parle alors de framework CRUD ou d’une grille CRUD. 

Quelques exemples se trouvent dans la liste suivant:

- Java : JDBC (The Java Database Connectivity), Hibernate, JBoss Seam, Isis
- PHP : Yii, CakePHP, Zikula, Symfony, TYPO3 Flow
Python : Django, SQLAlchemy, web2py
- .NET : NHibernate, ADO.NET/Entity Framework
- Ruby : Ruby on Rails
- JavaScript : Backbone.js, AngularJS

# Comment développer un CRUD PHP pour votre base de données ?

Dans les sections suivantes, nous allons vous indiquer comment créer une interface Bootstrap pour le populaire système de base de données MySQL avec un accès possible via les opérations CRUD. De plus, l’opération create doit également déjà être mise en place. Pour manipuler les tables de base de données de manière appropriée, le langage de script côté serveur PHP est utilisé à l’aide de l’extension PHP Data Objects (PDO).

1. La première étape consiste à créer une table de base de données simple qui sera manipulée ultérieurement dans ce tutoriel en utilisant l’accès CRUD. Pour cela, veuillez importer la table comme dans l’exemple suivant dans votre base de données MySQL :

CREATE TABLE `customers` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 100 ) NOT NULL ,
`email` VARCHAR( 100 ) NOT NULL ,
`mobile` VARCHAR( 100 ) NOT NULL
) ENGINE = INNODB;

La table est utilisée pour collecter des informations sur l’utilisateur : le nom, l’adresse email, le numéro de téléphone. Chaque entrée reçoit automatiquement une clé primaire (AUTO_INCREMENT PRIMARY KEY), c’est-à-dire son propre ID unique.

2. Il est ensuite nécessaire de configurer la connexion et de supprimer la base de données. Veuillez créer un fichier PHP sous le nom database.php, il est ensuite nécessaire d’insérer le script suivant avec la classe « Database » pour gérer les connexions de base de données :

```php
<?php
class Database 
{
    private static $dbName = 'nom_de_la_base_de_données'; 
    private static $dbHost = 'localhost';
    private static $dbUsername = 'nom_d’utilisateur';
    private static $dbUserPassword = 'mot_de_passe';

    private static $cont = null;

    public function __construct() {
        die('Fonction Init non autorisée');
    }

    public static function connect() {
        // Autoriser une seule connexion pour toute la durée de l’accès
        if ( null == self::$cont )
        {
            try
            {
                self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        } 
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
```

Afin de pouvoir utiliser ici la classe définie pour l’accès à la base de données avec PDO, vous devez spécifier exactement les valeurs pour les quatre entrées $dbName (nom de la base de donnée utilisée), $dbHost (nom de l’hôte sur lequel la base de données est en cours d’exécution, généralement localhostou hôte local comme dans l’exemple), $dbUsername (nom d’utilisateur) et $dbUserPassword (mot de passe de l’utilisateur).

Dans ce script, la classe de base de données comporte trois fonctions : __construct(), le constructeur de classe, rappelle aux utilisateurs que l’initialisation (c’est-à-dire l’assignation d’une valeur initiale ou de départ) n’est pas autorisée. Ensuite connect() est la fonction principale de la classe qui régule la connexion enfin au contraire disconnect() est utilisée pour mettre fin à la connexion.

3. Etant donné que les opérations CRUD ne peuvent être effectuées qu’à l’aide de l’interface appropriée, à ce stade la grille de base doit être crée avec Twitter Bootstrap. La dernière version du framework se trouve sur la page d’accueil officielle. Veuillez Décompresser Bootstrap dans le même répertoire que database.php et vous pouvez créer un autre fichier sous le nom index.php. Il est alors possible de créer l’interface :

```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <h3>Ma grille CRUD-PHP </h3>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email-Adresse</th>
                        <th>mobile</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                include 'database.php';
                $pdo = Database::connect();
                $sql = 'SELECT * FROM customers ORDER BY id DESC';
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['mobile'] . '</td>';
                    echo '</tr>';
                }
                Database::disconnect();
                ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
</body>
</html>
```

Sous la section `<head>` les fichiers CSS et JavaScript de Bootstrap sont dans la section `<body>` précédemment créée du database.php, y compris les appels pour établir une connexion PDO (Database::connect()) et obtenir les données correspondantes (SELECT). En outre le fichier contient la table HTML `<table>` avec les trois colonnes : nom, adresse email et numéro de téléphone, qui sont également stockées dans la base de données.

4. Parce que c’est la structure de base, il est nécessaire de réaliser diverses opérations CRUD. Par exemple, pour implémenter l’opération create vous avez besoin d’une autre page HTML avec des champs de formulaire pour entrer les données utilisateur, qui sont liées à index.php et sont accessibles via un bouton qui est ajouté à l’interface Bootstrap. Pour plus de facilité, vous pouvez commencer avec la création de ce bouton en ouvrant index.php et le second élément `<div class="row">` qui contient la table et ajouter le code suivant :

```html
<p>
  <a href="create.php" class="btn btn-success">Create</a>
</p>
```

Vous pouvez déjà reconnaitre les extraits de code, liés au fichier create.php, qui pour l’instant n’existe pas encore. Un test de l’ancienne grille Bootstrap-Grids indique alors le bouton, cependant en cliquant dessus une page d’erreur apparait. Pour que l’opération create soit disponible en permanence, vous devez créer le fichier create.php, et insérer d’abord la première partie du code suivant :

```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Create a Customer</h3>
            </div>

            <form class="form-horizontal" action="create.php" method="post">
                <div class="form-group <?php echo !empty($nameError)?'has-error':'';?>">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                        <?php if (!empty($nameError)): ?>
                            <span class="help-inline"><?php echo   $nameError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group <?php echo !empty($emailError)?'has-error':'';?>">
                    <label class="control-label">E-Mail-Adresse</label>
                    <div class="controls">
                        <input name="email" type="text" placeholder="E-Mail-Adresse" value="<?php echo !empty($email)?$email:'';?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo   $emailError;?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="form-group <?php echo !empty($mobileError)?'has-error':'';?>">
                    <label class="control-label">mobile</label>
                    <div class="controls">
                        <input name="mobile" type="text" placeholder="mobile" value="<?php echo !empty($mobile)?$mobile:'';?>">
                        <?php if (!empty($mobileError)): ?>
                            <span class="help-inline"><?php echo $mobileError;?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn" href="index.php">Back</a>
                </div>
            </form>
        </div>
    </div> <!-- /container -->
</body>
</html>
```

Le code génère le formulaire HTML dans lequel les informations individuelles nom, numéro de téléphone et adresse email peuvent être fournies. Pour chaque champ d’entrée, une variable PHP est constituée, qui en combinaison avec l’extension suivant du code (qui doit être insérée avant le code HTML dans create.php) génère des messages d’erreur, dans la mesure où le champ pertinent reste libre lors de l’entrée :

```php
<?php 

require 'database.php';

if ( !empty($_POST)) {
    // Saisie des erreurs de validation
    $nameError = null;
    $emailError = null;
    $mobileError = null;

    // Saisie des valeurs d‘entrée
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Valider Engages 
    $valid = true;
    if (empty($name)) {
        $nameError = 'Veuillez entrer un nom';
        $valid = incorrect;
    }

    if (empty($email)) {
        $emailError = 'Veuillez entrer une adresse email';
        $valid = incorrect;
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $emailError = 'Veuillez entrer une adresse email valide';
        $valid = incorrect;
    }

    if (empty($mobile)) {
        $mobileError = 'Veuillez entrer un numéro de téléphone';
        $valid = incorrect;
    }

    // Entrer des données
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$email,$mobile));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>
```

La page create.php est désormais activée et peut être appelée lorsque vous cliquez sur le bouton create, vous permettant ainsi d’entrer les informations utilisateur. Le script garantit que toutes les données entrées et les messages d’erreur sont enregistrés et que les messages d’erreur correspondants apparaissent bien quand une entrée est incorrecte, enfin le script assure aussi la transmission des données à la base de données déclarée.

# Mise à l’essai des opérations CRUD

Les opérations logicielles impliquant CRUD sont généralement testées dans une boîte noire. Lorsque les testeurs effectuent certaines opérations, ils vérifient la base de données du backend plutôt que d’analyser le code pour voir si les modifications prévues ont été apportées ou les données correctes retournées. Ces tests visent à valider chaque opération CRUD résultant de diverses interactions possibles avec les utilisateurs dans différents scénarios.

# CRUD and base de donnée performance

Une conception efficace des bases de données est la condition préalable pour des opérations CRUD optimales. Sans une bonne conception de base de données, les opérations CRUD peuvent nuire à la performance d’une base de données.

Par exemple, les opérations comme UPDATE ou DELETE nécessitent des verrous exclusifs sur les lignes (et leurs ressources associées, comme les pages de données ou les index). Les verrous garantissent que lorsqu’une ligne supplémentaire est modifiée, ils ne sont pas disponibles pour d’autres processus ou utilisateurs pour toute opération CRUD. Il s’agit d’assurer l’intégrité des données.

Vous ne pouvez pas lire un enregistrement lorsqu’il est supprimé ou permettre à deux utilisateurs ou plus de mettre à jour un seul enregistrement simultanément. D’autres types de serrures, comme les serrures partagées, permettent des DRA simultanées. Les verrous peuvent être configurés au niveau de la base de données ou des instructions, et différents types de verrouillage dicteront quelles opérations CRUD sont autorisées et comment l’opération CRUD se comportera.

Il va sans dire que le type de verrouillage et le nombre de verrous simultanés en raison des sessions des utilisateurs affecteront les performances d’une base de données. Par exemple, un site de ecommerce avec des centaines ou des milliers d’utilisateurs simultanés aura de nombreux verrous fonctionnant en même temps. Le résultat pourrait être une réactivité lente car l’utilisateur attend que les verrous soient relâchés.

Ce défi de performance est la raison pour laquelle les administrateurs de base de données veillent à ce que les opérations CRUD puissent être réalisées le plus rapidement possible. Cela nécessite un réglage des requêtes basé sur les retours des solutions de surveillance. Ces solutions de surveillance peuvent afficher les verrous, les mesures et les journaux actuels de la base de données pour aider l’administrateur à identifier les goulets d’étranglement possibles.