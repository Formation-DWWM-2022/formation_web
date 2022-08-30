# Namespaces et Autoload

Dans cette partie, nous allons voir comment organiser nos classes afin de simplifier la structure et éviter les conflits avec d'autres objets qui porteraient le même nom. Nous verrons également dans la 2ème partie comment mettre en place un chargement automatique de nos fichiers afin d'éviter de mettre de nombreuses lignes de "require".

# Les espaces de nom (namespace)

Si deux développeurs différents appellent leurs objets de la même façon, nous aurons potentiellement des conflits lors de leur utilisation.

Les espaces de nom (namespace) permettent d'attribuer "virtuellement" des dossiers à nos classes.

Avant de créer ces "namespace", nous allons modifier légèrement la structure de nos dossiers et fichiers, comme ci-dessous.

Cette structure va nous permettre de faciliter la mise en place et le tri des différentes classes de notre projet.

Cependant, si un autre fichier contient une classe portant le même nom que notre "Compte", par exemple, nous aurons un problème.

Créons un dossier "Client" et une classe "Compte" à l'intérieur, ce qui donnera ceci

![](https://nouvelle-techno.fr/assets/uploads/content/c5af771898f345bdbefa47d18496ed07.png)

Comme vous pouvez le remarquer, nous aurons deux classes portant le même nom "Compte".

Nous aurions inclu les fichiers de cette façon

```php
require_once 'classes/Client/Compte.php';
require_once 'classes/Banque/Compte.php';
require_once 'classes/Banque/CompteCourant.php';
require_once 'classes/Banque/CompteEpargne.php';
```

Ce qui va résulter en une erreur comme celle ci

```
Cannot declare class Compte, because the name is already in use
```

C'est là qu'entrent en jeu les espaces de noms.

Nous allons déclarer un "namespace" pour chacune des classes que nous créons.

Ce namespace ressemblera à un chemin et reprendra la structure de nos dossiers en partant du dossier "classes".

Nous allons commencer par nommer "App" puis suivre le chemin séparé par des "\".

Ainsi, en haut du fichier "classes/Clients/Compte.php" nous ajouterons

```php
namespace App\Client;
```

En haut des fichiers du dossier "classes/Banque", nous ajouterons

```php
namespace App\Banque;
```

A compter de cet instant, l'erreur a changé, notre serveur PHP n'arrive plus à trouver "CompteCourant".

```
Uncaught Error: Class 'Compte' not found
```

Il s'agit d'une erreur "normale", il ne trouve pas la classe étant donné que nous n'avons pas donné son namespace.

Deux solutions s'offrent à nous.

La moins propre, ajouter le namespace lors de l'instanciation

```php
$compte1 = new App\Banque\CompteCourant('Benoit', 500);
```

La plus utilisée, ajouter une ligne "use" en début de fichier pour indiquer dans quels namespaces rechercher les classes

```php
use App\Banque\CompteCourant;
```

A noter que vous pouvez avoir plusieurs classes à charger dans le même namespace, dans ce cas vous pouvez utiliser autant de lignes "use" ou les cumuler sur la même

```php
use App\Banque\{CompteCourant, CompteEpargne};
```

A noter que si vous avez deux classes qui portent le même nom, vous pouvez les renommer à la volée.

```php
use App\Client\Compte as CompteClient;
use App\Banque\Compte as CompteBancaire;
```