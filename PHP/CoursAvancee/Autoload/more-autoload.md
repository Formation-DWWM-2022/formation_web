# Pourquoi le chargement automatique?

- Autoloading et Composer : https://youtu.be/HuXWn20lLao?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3
- L'AUTOLOADING (CHARGEMENT AUTOMATIQUE DES CLASSES) : https://youtu.be/DimHSKuoyUo
- L'autoloader : https://youtu.be/pwD-xxtZ1g0
- Namespaces & Autoloading : https://youtu.be/NLXtGZ6Ilsw
- Autoloading in PHP without and with Composer : https://youtu.be/FCHWAyUDXik
- Load Classes Automatically In OOP PHP : https://youtu.be/z3pZdmJ64jo?list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh

Plus votre code est propre et clair, plus il est lisible et utile. Lorsque vous travaillez dans un projet PHP assez important, vous aurez un grand nombre de fichiers de classe. Dans chaque fichier PHP, vous aurez besoin d’un tas d’instructions include ou require au début pour utiliser ces classes.

```php
<?php
include 'Class1.php';
include 'Class2.php';
include 'Namespace\Class1.php';
include 'Namespace\Class2.php';
// and more...
```

Ce n’est pas la façon dont nous avons besoin de le faire. Ce serait super si nous pouvions laisser PHP charger automatiquement (autoload) les fichiers de classe pour nous. PHP supporte le chargement automatique avec un petit morceau de codage.

# Utilisation du chargement automatique en PHP

Supposons que nous ayons les dossiers suivants. Circle.php et Square.php sont deux fichiers de classe tandis que usage.php est le fichier dans lequel nous allons utiliser ces classes.

Maintenant, nous devons accéder aux classes Circle et Square qui sont dans Circle.php et Square.php respectivement.

Avant cela, nous avons besoin de l’autoloader dans un fichier séparé. Par conséquent, nous pouvons utiliser l’autoloader dans plusieurs fichiers PHP. Créons autoload.php dans la racine et ajoutons l’autoloader dans ce fichier.

La fonction spl_autoload_register intégrée de PHP est utilisée pour enregistrer un autoloader.

autoload.php
```php
<?php
spl_autoload_register(function($className) {
	$file = $className . '.php';
	if (file_exists($file)) {
		include $file;
	}
});
```
Maintenant, tout ce que nous avons à faire est d’inclure autoload.php dans n’importe quel fichier auquel nous allons accéder aux classes.

usage.php
```php
<?php
include 'autoload.php';

$circle = new Circle;
$square = new Square;
```

# La logique du chargement automatique

Comprenons ce qui se passait avec le chargeur automatique en 3 étapes.

## Étape 1 : Enregistrement d’un chargeur automatique
- Vous savez, PHP a de nombreuses fonctions intégrées. spl_autoload_register en fait partie. Il accepte 3 paramètres, mais nous n’utiliserons que le premier ici.
- Nous appellerons la fonction spl_autoload_register() avec un callback (fonction anonyme).
- Vous pouvez appeler cette fonction plusieurs fois avec différentes fonctions de callback.
- PHP se souvient de toutes ces fonctions de callback dans l’ordre. C’est ce qu’on appelle l’enregistrement des autoloaders.

# Étape 2 : Exécution du chargeur automatique
- Lorsque vous essayez d’accéder à une classe dans votre code (nouveau Circle() ci-dessus), PHP vérifie d’abord si la classe est trouvée.
- Si la classe n’a pas été trouvée, PHP essaie de la trouver. PHP le fait en utilisant des autoloaders enregistrés. S’il y a des autoloaders enregistrés, PHP exécutera le premier autoloader enregistré. Après l’avoir lancé, PHP vérifiera si la classe est maintenant trouvée. Sinon, PHP exécutera tous les autoloaders enregistrés par ordre enregistré.
- Si PHP trouve la classe, il mettra fin au "processus de recherche" et les autres autoloaders ne seront pas appelés.

# Étape 3 : Que s’est-il passé dans le dernier exemple?
- Voici notre chargeur automatique du dernier exemple.

```php
<?php
spl_autoload_register(function($className) {
	$file = $className . '.php';
	if (file_exists($file)) {
		include $file;
	}
});
```

- Quand PHP appelle la fonction callback, il envoie le nom de classe comme premier argument. ($className dans la fonction callback)
- Supposons que $className était Circle. Nous savons que la classe Circle est dans le fichier Circle.php.
- Si le fichier Circle.php existe, nous l’inclurons. Maintenant, la classe Circle est disponible dans notre fichier PHP.

> Il est préférable de ne pas lancer d’erreurs si le fichier n’est pas trouvé, car il peut y avoir plusieurs chargeurs automatiques pour trouver le fichier.

# Chargement automatique compatible avec l’espace de noms

Dans le chapitre namespaces, nous avons appris comment nommer des classes d’espace et les mapper avec la structure de dossiers.

![](https://tutorials.supunkavinda.blog/static/images/php-oop-autoloading-folder-structure.png)

Le chargeur automatique que nous avons créé ci-dessus n’est ni compatible avec l’espace de noms ni fonctionne dans les fichiers PHP qui ne sont pas dans le répertoire racine. Voici le chargeur automatique amélioré!

[Autoloader](./Autoloader.php)

# Conclusion

Dans ce chapitre, vous avez appris comment créer un autoloader PHP pour inclure automatiquement vos fichiers de classe. De nos jours, la plupart des développeurs PHP utilisent un outil appelé Composer pour le chargement automatique que nous ne couvrons pas dans ce tutoriel. Mais, si vous travaillez sur un grand projet qui dépend de nombreuses bibliothèques PHP d’autres développeurs, vous pouvez consulter [Composer](../../composer.md) et apprendre à l’utiliser.