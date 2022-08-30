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

# Connexion à la base de données

Pour commencer, nous allons créer un fichier php que nous appellerons "connect.php" qui contiendra les informations de connexion à la base de données.

```php
<?php
try{
    // Connexion à la bdd
    $db = new PDO('mysql:host=localhost;dbname=crud', 'root','');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}
```

Nous allons également créer un fichier de déconnexion qui s'appellera "close.php".

```php
<?php
$db = null;
```

# Affichage de tous les enregistrements de la base de données (READ)

Nous allons commencer par afficher sous forme de tableau la liste des enregistrements de la table "liste" dans le fichier "index.php".
La requête

Pour commencer, nous devons exécuter la requête SQL

```sql
SELECT * FROM `liste`;
```

Le code PHP correspondant pour exécuter cette requête est le suivant

```php
<?php
// On écrit notre requête
$sql = 'SELECT * FROM `liste`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
```

# L'affichage

Pour afficher les résultats, nous aurons besoin de boucler sur la variable "$result" de cette façon

```php
<?php
foreach($result as $produit){

}
```

Si nous souhaitons faire un tableau, nous écrirons donc un code comme celui-ci.

```php
<table>
    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php
        foreach($result as $produit){
            ?>
            <tr>
                <td><?= $produit['id'] ?></td>
                <td><?= $produit['produit'] ?></td>
                <td><?= $produit['prix'] ?></td>
                <td><?= $produit['nombre'] ?></td>
                <td><a href="details.php?id=<?= $produit['id'] ?>">Voir</a>  <a href="edit.php?id=<?= $produit['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
```

# Fichier complet

Le fichier "index.php" complet sera donc le suivant.

```php
<?php

// On inclut la connexion à la base
require_once('connect.php');

// On écrit notre requête
$sql = 'SELECT * FROM `liste`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
</head>
<body>

    <h1>Liste des produits</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $produit){
        ?>
                <tr>
                    <td><?= $produit['id'] ?></td>
                    <td><?= $produit['produit'] ?></td>
                    <td><?= $produit['prix'] ?></td>
                    <td><?= $produit['nombre'] ?></td>
                    <td><a href="details.php?id=<?= $produit['id'] ?>">Voir</a>  <a href="edit.php?id=<?= $produit['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="add.php">Ajouter</a>
</body>
</html>
```

Affichage d'un seul enregistrement de la base de données (READ)

Nous allons maintenant afficher un enregistrement de la table "liste" dans le fichier "details.php" sur la base de son "id".

# La requête

Pour commencer, nous devons exécuter la requête SQL ci-dessous avec, par exemple, l'id 1

```sql
SELECT * FROM `liste` WHERE `id`= 1;
```

Le code PHP correspondant pour exécuter cette requête est le suivant

```php
<?php
$sql = 'SELECT * FROM `liste` WHERE `id`=:id';

// On prépare la requête
$query = $db->prepare($sql);

// On attache les valeurs
$query->bindValue(':id', $id, PDO::PARAM_INT);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$produit = $query->fetch();
```

# L'affichage

Pour afficher les résultats, nous allons tout d'abord vérifier que nous avons bien un "id", ensuite nous exécuterons la requête. Si la requête retourne un résultat, nous l'afficherons.

```php
<?php
session_start();

// On inclut la connexion à la base
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `liste` WHERE `id`=:id';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $produit = $query->fetch();

    if(!$produit){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>

</head>
<body>
    <h1>Détails du produit <?= $produit['produit'] ?></h1>
    <p>ID : <?= $produit['id'] ?></p>
    <p>Produit : <?= $produit['produit'] ?></p>
    <p>Prix : <?= $produit['prix'] ?></p>
    <p>Nombre : <?= $produit['nombre'] ?></p>
    <p><a href="edit.php?id=<?= $produit['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a></p>
</body>
</html>
```

# Ajouter un enregistrement (CREATE)

Pour ajouter un enregistrement à la base de données, nous allons créer la page "add.php" qui aura une double utilisation :
- Afficher le formulaire d'ajout
- Traiter le formulaire

# La requête

La requête permettant d'ajouter un produit dans la liste sera la suivante

```sql
INSERT INTO `liste` (`produit`, `prix`, `nombre`) VALUES (:produit, :prix, :nombre);
```

Le code PHP correspondant pour exécuter cette requête est le suivant

```php
<?php
$sql = "INSERT INTO `liste` (`produit`, `prix`, `nombre`) VALUES (:produit, :prix, :nombre);";

$query = $db->prepare($sql);

$query->bindValue(':produit', $produit, PDO::PARAM_STR);
$query->bindValue(':prix', $prix, PDO::PARAM_STR);
$query->bindValue(':nombre', $nombre, PDO::PARAM_INT);

$query->execute();
```

# Le formulaire

Le code HTML du formulaire permettant d'ajouter un produit est le suivant

```html
<form method="post">
    <label for="produit">Produit</label>
    <input type="text" name="produit" id="produit">
    <label for="prix">Prix</label>
    <input type="text" name="prix" id="prix">
    <label for="nombre">Nombre</label>
    <input type="number" name="nombre" id="nombre">
    <button>Enregistrer</button>
</form>
```

Une fois envoyé, nous le traiterons en PHP et nous insérerons le nouveau produit dans la base

```php
<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])
        && isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $produit = strip_tags($_POST['produit']);
            $prix = strip_tags($_POST['prix']);
            $nombre = strip_tags($_POST['nombre']);

            $sql = "INSERT INTO `liste` (`produit`, `prix`, `nombre`) VALUES (:produit, :prix, :nombre);";

            $query = $db->prepare($sql);

            $query->bindValue(':produit', $produit, PDO::PARAM_STR);
            $query->bindValue(':prix', $prix, PDO::PARAM_STR);
            $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);

            $query->execute();
            $_SESSION['message'] = "Produit ajouté avec succès !";
            header('Location: index.php');
        }
}

require_once('close.php');
```

# Modifier un enregistrement (UPDATE)

Pour modifier un enregistrement de la base de données, nous allons créer la page "edit.php" qui aura une triple utilisation :
- Sélectionner un produit
- Afficher le formulaire de modification
- Traiter le formulaire

# La requête

La requête permettant de modifier un produit de la liste sera la suivante

```sql
UPDATE `liste` SET `produit`=:produit, `prix`=:prix, `nombre`=:nombre WHERE `id`=:id;
```

Le code PHP correspondant pour exécuter la requête de sélection est le suivant

```php
$sql = "SELECT * FROM `liste` WHERE `id`=:id;";

$query = $db->prepare($sql);

$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();

$result = $query->fetch();
```

Le code PHP correspondant pour exécuter la requête de traitement est le suivant

```php
<?php
$sql = "UPDATE `liste` SET `produit`=:produit, `prix`=:prix, `nombre`=:nombre WHERE `id`=:id;";

$query = $db->prepare($sql);

$query->bindValue(':produit', $produit, PDO::PARAM_STR);
$query->bindValue(':prix', $prix, PDO::PARAM_STR);
$query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
$query->bindValue(':id', $id, PDO::PARAM_INT);

$query->execute();
```

# Le formulaire

Le code HTML du formulaire permettant d'ajouter un produit est le suivant

```html
<form method="post">
    <p>
        <label for="produit">Produit</label>
        <input type="text" name="produit" id="produit" value="<?= $result['produit'] ?>">
    </p>
    <p>
        <label for="prix">Prix</label>
        <input type="text" name="prix" id="prix" value="<?= $result['prix'] ?>">
    </p>
    <p>
        <label for="nombre">Nombre</label>
        <input type="number" name="nombre" id="nombre" value="<?= $result['nombre'] ?>">
    </p>
    <input type="hidden" name="id" value="<?= $result['id'] ?>">
    <button>Enregistrer</button>
</form>
```

Une fois envoyé, nous le traiterons en PHP et nous insérerons le nouveau produit dans la base

```php
<?php
if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])
        && isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $id = strip_tags($_GET['id']);
        $produit = strip_tags($_POST['produit']);
        $prix = strip_tags($_POST['prix']);
        $nombre = strip_tags($_POST['nombre']);

        $sql = "UPDATE `liste` SET `produit`=:produit, `prix`=:prix, `nombre`=:nombre WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}
```

# Fichier complet

Le fichier complet est le suivant

```php
<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])
        && isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $id = strip_tags($_GET['id']);
        $produit = strip_tags($_POST['produit']);
        $prix = strip_tags($_POST['prix']);
        $nombre = strip_tags($_POST['nombre']);

        $sql = "UPDATE `liste` SET `produit`=:produit, `prix`=:prix, `nombre`=:nombre WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `liste` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Modifier un produit</h1>
    <form method="post">
        <p>
            <label for="produit">Produit</label>
            <input type="text" name="produit" id="produit" value="<?= $result['produit'] ?>">
        </p>
        <p>
            <label for="prix">Prix</label>
            <input type="text" name="prix" id="prix" value="<?= $result['prix'] ?>">
        </p>
        <p>
            <label for="nombre">Nombre</label>
            <input type="number" name="nombre" id="nombre" value="<?= $result['nombre'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>
```

# Supprimer un enregistrement (DELETE)

Pour supprimer un enregistrement de la base de données, nous allons créer la page "delete.php" qui prendra l'id du produit en paramètre.
La requête

La requête permettant de supprimer un produit dans la liste sera la suivante

```sql
DELETE FROM `liste` WHERE `id`=:id;
```

Le code PHP correspondant pour exécuter cette requête est le suivant

```php
<?php
$sql = "DELETE FROM `liste` WHERE `id`=:id;";

$query = $db->prepare($sql);

$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
```

# Le fichier complet

Le code HTML du fichier complet est ci-dessous

```php
<?php
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "DELETE FROM `liste` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header('Location: index.php');
}

require_once('close.php');
```

# Mise à l’essai des opérations CRUD

Les opérations logicielles impliquant CRUD sont généralement testées dans une boîte noire. Lorsque les testeurs effectuent certaines opérations, ils vérifient la base de données du backend plutôt que d’analyser le code pour voir si les modifications prévues ont été apportées ou les données correctes retournées. Ces tests visent à valider chaque opération CRUD résultant de diverses interactions possibles avec les utilisateurs dans différents scénarios.

# CRUD and base de donnée performance

Une conception efficace des bases de données est la condition préalable pour des opérations CRUD optimales. Sans une bonne conception de base de données, les opérations CRUD peuvent nuire à la performance d’une base de données.

Par exemple, les opérations comme UPDATE ou DELETE nécessitent des verrous exclusifs sur les lignes (et leurs ressources associées, comme les pages de données ou les index). Les verrous garantissent que lorsqu’une ligne supplémentaire est modifiée, ils ne sont pas disponibles pour d’autres processus ou utilisateurs pour toute opération CRUD. Il s’agit d’assurer l’intégrité des données.

Vous ne pouvez pas lire un enregistrement lorsqu’il est supprimé ou permettre à deux utilisateurs ou plus de mettre à jour un seul enregistrement simultanément. D’autres types de serrures, comme les serrures partagées, permettent des DRA simultanées. Les verrous peuvent être configurés au niveau de la base de données ou des instructions, et différents types de verrouillage dicteront quelles opérations CRUD sont autorisées et comment l’opération CRUD se comportera.

Il va sans dire que le type de verrouillage et le nombre de verrous simultanés en raison des sessions des utilisateurs affecteront les performances d’une base de données. Par exemple, un site de ecommerce avec des centaines ou des milliers d’utilisateurs simultanés aura de nombreux verrous fonctionnant en même temps. Le résultat pourrait être une réactivité lente car l’utilisateur attend que les verrous soient relâchés.

Ce défi de performance est la raison pour laquelle les administrateurs de base de données veillent à ce que les opérations CRUD puissent être réalisées le plus rapidement possible. Cela nécessite un réglage des requêtes basé sur les retours des solutions de surveillance. Ces solutions de surveillance peuvent afficher les verrous, les mesures et les journaux actuels de la base de données pour aider l’administrateur à identifier les goulets d’étranglement possibles.