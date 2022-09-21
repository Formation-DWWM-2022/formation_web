# Comment tester le code PHP avec PHPUnit

![](https://www.freecodecamp.org/news/content/images/size/w1000/2022/03/120480919-metal-bolts-nuts-group-drawing-technical-drafting-steel-screws-threaded-parts-with-hexagonal-head-bl--1-.png)

Il existe de nombreuses façons de tester votre application logicielle, et les tests unitaires sont importants.

Alors, qu’est-ce que le test unitaire et comment pouvez-vous les faire ?

# Qu’est-ce que les tests unitaires?

    Le test unitaire est un processus de développement logiciel dans lequel les plus petites parties testables d’une application, appelées unités, sont examinées individuellement et indépendamment pour le fonctionnement du processus.

En termes de base, le test unitaire signifie que vous décomposez votre application jusqu’à ses pièces les plus simples et testez ces petites pièces pour vous assurer que chaque pièce est sans erreur (et sécurisée).

Ces tests sont automatisés et rédigés par des ingénieurs logiciels dans le cadre de leur processus de développement. Il s’agit d’une étape très importante pendant le développement car elle aide les développeurs à construire de meilleures applications avec moins de bugs.

# Qu’est-ce que PHPUnit ?

Vous pouvez effectuer des tests unitaires en PHP avec PHPUnit, un framework de test orienté programmeur pour PHP. PHPUnit est une instance de l’architecture xUnit pour les frameworks de tests unitaires. Il est très facile à installer et à utiliser.

# Installation de PHPUnit

Vous pouvez installer PHPUnit globalement sur votre serveur. Vous pouvez également l’installer localement, sur une base de temps de développement par projet, comme une dépendance à votre projet en utilisant composer.

Pour commencer, créez et lancez un nouveau projet avec composer en utilisant ces commandes:

```
$ mkdir test-project
$ cd test-project
$ composer init
```

La première commande crée un dossier dans votre répertoire courant, test-project et la seconde commande s’y déplace. La dernière commande démarre un shell interactif.

![](https://www.freecodecamp.org/news/content/images/size/w1000/2022/03/Screenshot-2022-03-08-at-11.08.39.png)

Suivez l’invite en remplissant les détails nécessaires (les valeurs par défaut sont correctes). Vous pouvez définir la description du projet, le nom de l’auteur (ou le nom des contributeurs), la stabilité minimale pour les dépendances, le type de projet, la licence et définir vos dépendances.

Vous pouvez ignorer la partie dépendances, car nous n’installons pas de dépendances. PHPUnit est censé être une dépendance de développement parce que le test dans son ensemble ne devrait se produire que pendant le développement.

Maintenant, quand l’invite demande Voulez-vous définir vos dépendances de dev (require-dev) de manière interactive [oui]? , appuyez sur Entrée pour accepter. Tapez ensuite phpunit/phpunit pour installer PHPUnit en tant que dev-dependency.

Acceptez les autres valeurs par défaut et générez le fichier composer.json. Le fichier généré devrait ressembler à ceci actuellement :

```
{
    "name": "zubair/test-project",
    "require-dev": {
        "phpunit/phpunit": "^9.5"
    },
    "autoload": {
        "psr-4": {
            "Zubair\\TestProject\\": "src/"
        }
    },
    "authors": [
        {
            "name": "Idris Aweda Zubair",
            "email": "zubairidrisaweda@gmail.com"
        }
    ],
    "require": {}
}
```

# Comment écrire des tests dans PHPUnit

Écrire des tests dans PHPUnit est assez simple. Voici quelques conventions pour commencer :

- Pour tester une classe en PHP, vous allez créer une classe de test nommée d’après cette classe. Par exemple, si j’avais une sorte de classe Utilisateur, la classe test serait nommée UserTest.
- La classe test, UserTest, héritera généralement de la classe PHPUnit Framework TestCase.
- Les tests individuels sur la classe sont des méthodes publiques nommées avec test comme préfixe. Par exemple, pour tester une méthode sayHello sur la classe User, la méthode sera nommée testSayHello.
- À l’intérieur de la méthode de test, disons testSayHello, vous utilisez la méthode de PHPUnit comme assertSame pour voir que certaines méthodes renvoient une valeur attendue.

Une convention populaire est d’avoir tous les tests dans un répertoire tests, et tout le code source dans le répertoire src.

# Exemple de test PHPUnit

Pour aider à comprendre ce cours, voici un exemple de classe utilisateur avec des méthodes simples qui seront testées :

```php
<?php

namespace Zubair\TestProject;

use InvalidArgumentException;

class User
{
    public int $age;
    public array $favorite_movies = [];
    public string $name;

    /**
     * @param int $age
     * @param string $name
     */
    public function __construct(int $age, string $name)
    {
        $this->age = $age;
        $this->name = $name;
    }

    public function tellName(): string
    {
        return "My name is " . $this->name . ".";
    }

    public function tellAge(): string
    {
        return "I am " . $this->age . " years old.";
    }

    public function addFavoriteMovie(string $movie): bool
    {
        $this->favorite_movies[] = $movie;

        return true;
    }

    public function removeFavoriteMovie(string $movie): bool
    {
        if (!in_array($movie, $this->favorite_movies)) throw new InvalidArgumentException("Unknown movie: " . $movie);

        unset($this->favorite_movies[array_search($movie, $this->favorite_movies)]);

        return true;
    }
}
```

Cette classe d’utilisateur pourrait être la classe Utilisateur de votre application de streaming de films. L’utilisateur a un nom, un âge et une liste de films préférés qui peuvent être mis à jour. Pour le reste de l’article, nous allons tester que toutes ces fonctionnalités fonctionnent comme prévu.

Créez une classe UserTest dans le dossier tests. Collez-la pour démarrer :

```php
<?php

namespace Zubair\TestProject;

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    // Tests will go here
}
```

# Test du constructeur 

Normalement, vous ne testeriez pas la méthode __construct. Cependant, puisque nous y établissons des valeurs, il est logique de s’assurer que les valeurs sont correctement définies.

Cela semble être une toute petite chose à tester, mais c’est le but des tests unitaires – s’assurer que les plus petites parties de votre application fonctionnent comme prévu.

Créer une méthode testClassConstructor pour tester le constructeur :

```php
public function testClassConstructor()
{
    $user = new User(18, 'John');

    $this->assertSame('John', $user->name);
    $this->assertSame(18, $user->age);
    $this->assertEmpty($user->favorite_movies);
}
```

Faisons une petite pause maintenant, pour voir comment faire les tests.

# Exécution des tests dans PHPUnit

Vous pouvez exécuter tous les tests dans un répertoire en utilisant le binaire PHPUnit installé dans votre dossier fournisseur.

```
$ /vendor/bin/phpunit --verbose tests
```

Vous pouvez également exécuter un seul test en fournissant le chemin d’accès au fichier de test.

```
$ . /vendor/bin/phpunit --verbose tests/UserTest.php
```

Vous utilisez l’indicateur --verbose pour obtenir plus d’informations sur l’état du test.

Maintenant, nous pouvons lancer le test et voir la sortie:

![](https://www.freecodecamp.org/news/content/images/size/w1000/2022/03/Screenshot-2022-03-08-at-13.17.54.png)

La sortie montre que nous avons exécuté 1 test, et fait 3 assertions. Nous voyons aussi combien de temps il a fallu pour exécuter le test, ainsi que combien de mémoire a été utilisée pour exécuter le test.

Ces assertions sont ce que PHPUnit utilise pour comparer les valeurs retournées des méthodes à leur valeur attendue.

Cet exemple utilise assertSame pour vérifier si les propriétés nom et âge de l’objet utilisateur correspondent aux valeurs saisies. Il utilise également assertEmpty pour vérifier que le tableau favorite_movies est vide.

Pour voir une liste de toutes ces assertions, vous pouvez consulter les documents de PHPUnit [ici](https://phpunit.readthedocs.io/en/9.5/assertions.html#appendixes-assertions).

Modifiez le code pour vérifier si l’âge de l’utilisateur est le même que 21.

```php
public function testClassConstructor()
{
    $user = new User(18, 'John');

    $this->assertSame('John', $user->name);
    $this->assertSame(21, $user->age);
    $this->assertEmpty($user->favorite_movies);
} 
```

Lancer à nouveau le test donne cette sortie :

![](https://www.freecodecamp.org/news/content/images/size/w1000/2022/03/Screenshot-2022-03-08-at-13.24.20.png)

La sortie montre maintenant que nous avons exécuté 1 test, avec 2 assertions réussies, et aussi un échec. Nous pouvons voir une explication de l’échec, montrant la valeur attendue, la valeur obtenue, et la ligne d’où vient l’erreur.

# Test testName and tellAge

Ensuite, nous pouvons tester la méthode testName. Cette méthode indique le nom d’un utilisateur comme une phrase. Ainsi, nous pouvons écrire le test pour vérifier:
- Si la valeur retournée est une chaîne.
- Si la chaîne retournée contient le nom de l’utilisateur (avec ou sans sensibilité à la casse).

```php
public function testTellName()
{
    $user = new User(18, 'John');

    $this->assertIsString($user->tellName());
    $this->assertStringContainsStringIgnoringCase('John', $user->tellName());
}
```

Le test utilise les assertions assertIsString et assertStringContainsStringIgnoringCase pour vérifier que la valeur de retour est une chaîne et qu’elle contient la chaîne John, respectivement.

La méthode testAge est très similaire à testName et utilise la même logique. Son test sera similaire au précédent :

```php
public function testTellAge()
{
    $user = new User(18, 'John');

    $this->assertIsString($user->tellAge());
    $this->assertStringContainsStringIgnoringCase('18', $user->tellAge());
}
```

# Test addFavoriteMovie

Nous pouvons aussi tester cette méthode. Cette méthode ajoute un film à la liste des films. Pour le tester, nous pouvons vérifier si le film nouvellement ajouté est dans la liste, et que le nombre d’éléments dans la liste a effectivement augmenté.

Cette dernière sert à confirmer que les articles ne sont pas déplacés. Aussi, puisque la fonction renvoie une valeur à la fin, nous pouvons vérifier que cette valeur est correcte aussi.

```php
public function testAddFavoriteMovie()
{
    $user = new User(18, 'John');

    $this->assertTrue($user->addFavoriteMovie('Avengers'));
    $this->assertContains('Avengers', $user->favorite_movies);
    $this->assertCount(1, $user->favorite_movies);
}
```

Ici, nous utilisons quelques nouvelles assertions – assertTrue, assertContains et assertCount – pour vérifier que la valeur retournée est vraie, qu’elle contient la chaîne nouvellement ajoutée, et que le tableau contient maintenant un élément.

# Test removeFavoriteMovie

Enfin, nous pouvons tester que la méthode pour supprimer un film fonctionne.

```php
public function testRemoveFavoriteMovie()
{
    $user = new User(18, 'John');

    $this->assertTrue($user->addFavoriteMovie('Avengers'));
    $this->assertTrue($user->addFavoriteMovie('Justice League'));

    $this->assertTrue($user->removeFavoriteMovie('Avengers'));
    $this->assertNotContains('Avengers', $user->favorite_movies);
    $this->assertCount(1, $user->favorite_movies);
}
```

Ici, nous ajoutons quelques films à la liste. Ensuite, nous supprimons l’un d’eux, et de confirmer que la fonction retourné vrai. Ensuite, on confirme la suppression en vérifiant que la valeur n’est plus dans la liste. Enfin, nous confirmons que nous n’avons qu’un seul film dans la liste, au lieu de deux.

# Conclusion

Maintenant, vous savez comment configurer PHPUnit dans vos projets et comment tester et vous assurer que vous construisez des logiciels de classe mondiale. Vous trouverez ici tout le code de cet article.
