# Pourquoi faire du Test Driven Development

- Tutoriel PHP - Les Tests Unitaires : https://youtu.be/jZB49who6rk
- Exercice : Tester son code : https://youtu.be/yt7utxhDyVg
- Tests en programmation : PHPUnit : https://youtu.be/TK4i5Xw7MgA
- Des tests unitaires pour nos règles de conception - Frederic BOUCHERY - Forum PHP 2021 : https://youtu.be/PB3NWOwBCyQ
    - PHPUnit : https://phpunit.de/
    
On trouve pléthore de littérature à ce sujet et voici selon nous les avantages à faire du TDD en vrac :
- tester les différents cas de figure,
- le plus souvent les tests s'appuient sur les spécifications et cela permet donc de conserver la documentation dans le code (live documentation),
- permet de mieux découper le code (notion de clean code),
- poser une première implémentation puis optimiser ou/et refactoriser et à chaque fois la valider grâce aux tests,
- gain de temps en validant l'implémentation via la console sans passer par les tests dans le navigateur.

# Outillage

Installons le framework de test PHPUnit :

```
$ composer require --dev phpunit/phpunit ^7
```

En considérant que notre namespace est MyCompany\App on devrait avoir ceci dans notre composer.json :

```
{
  "autoload": {
    "psr-4": {
      "MyCompany\\App\\": "src"
    }
  },
  "autoload-dev": {
    "psr-4": {
      "MyCompany\\App\\Tests\\": "tests"
    }
  },
  "require-dev": {
    "phpunit/phpunit": "^7.0"
  }
}
```

Vérifions que tout est en place en lançant :

```
./vendor/bin/phpunit
```

Nous devrions avoir quelque chose comme ça :

```
> No tests executed!
```