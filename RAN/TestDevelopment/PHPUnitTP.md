# 1. Organisation et première utilisation

Dans ce TP,  PHPUnit sera employé en ligne de commande (ce qui se fait souvent, mais il peut bien sur être utilisé dans un IDE tel que PhpStorm).

Pour le projet exemple "exo1", nous avons l'arborescence classique suivante:
exo1
| tests
| src

Pour chaque classe de nom "Class" nous avons un fichier ClassTest dans le répertoire tests. Merci de respecter cela à l'avenir.

Pour ce TP, il est obligatoire d'avoir la documentation de PHPUnit ouverte !.

Récupérez les classes Personne.php et PersonneTest.php. Faites un répertoire exo1 et organisez le.

Testez si Phpunit fonctionne avec phpunit --version

Pour lancer les tests, allez dans répertoire exo1 et: 

phpunit --verbose tests/PersonneTest.php. Ca doit donner un écran de ce type:

![](https://perso.limos.fr/~sesalva/files/softengLP/tp/tp3/images/c1.png)

Maintenant que tout est en place, faisons des tests.

En se basant sur la méthode irradier, complétez votre fichier de test (1 méthode = cas de test) afin de couvrir l'ensemble de ses fonctionnalités. Combien avez-vous écris de méthodes?

Normalement, étant donné que vous êtes très fort, vous avez bien sur utilisé une fixure (méthode @before, @beforeclass) sinon il est encore temps. [voir ici](https://phpunit.readthedocs.io/en/9.5/fixtures.html)

Ajoutez des dépendances entre certaines de vos méthodes pour que si un cas de test ne passe pas, ceux qui en dépendent ne sont pas lancés. Cela se fait avec l'annotation @depends.

PHPunit offre l'opportunité d'utiliser un [dataprovider](https://phpunit.readthedocs.io/en/9.5/writing-tests-for-phpunit.html?highlight=dataprovider#data-providers) afin de factoriser plusieurs tests identiques construits avec des données différentes.
Créez un test pour la méthode irradier avec les valeurs de pied 2,3,5. (On attend respectivement 3,4,5). En php, on utilise souvent des getter setter, pied peut ici être public (à vous de voir).

La méthode marche retourne une exception. Créez un test permettant de vérifier que l'exception peut être levée et que le message d'erreur retourné est 'trop de pieds'. Il y a deux possibilités: du code ou une annotation.

# 2. Sorties

Les programmes PHP produisent ("souvent") du code HTML en sortie. C'est ici le cas pour la classe Personne et sa méthode manger. Pour tester la sortie, il est possible d'utiliser la méthode de Phpunit expectOutputString('chaine  attendue'). Faites un test pour la méthode manger.

Comme vous le voyez, ca fonctionne bien ici, MAIS il serait bien fastidieux de tester des sites Web de cette façon. C'est fait avec d'autres outils que nous avons vu, tels que Selenium.

# 3. Suites de test

Créez une classe Etudiant en vous basant sur la classe Personne. Puis créez un fichier de test simple pour étudiant avec quelques cas de test au choix.

Vous souhaitez lancer, d'une façon simple, l'exécution de tous vos tests. Il vous ai demandé de créer une suite de test composée des 2 fichiers précédants. Pour cela, il faut créer un fichier XML déclarant les  2 cas de test. Voici un exemple (tiré de la doc):

```
<phpunit>
  <testsuites>
    <testsuite name="money">
      <file>tests/IntlFormatterTest.php</file>
      <file>tests/MoneyTest.php</file>
      <file>tests/CurrencyTest.php</file>
    </testsuite>
  </testsuites>
</phpunit>
```

Pour lancer l'exécution de la suite de test, il faut utiliser l'option de ligne de commande `--testsuite <pattern>`.

# 4. Couverture de code

Phpunit permet également d'obtenir un rapport sur la couverture de code. Pour créer ce rapport, il faut utiliser l'option de ligne de commande `--coverage-html ./report`. Le rapport en HTML sera placé dans le répertoire report. 

Voici un exemple:

![](https://perso.limos.fr/~sesalva/files/softengLP/tp/tp3/images/c2.png)

Calculez la couverture de code que vous obtenez avec la classe Personne. Analysez ce rapport (besoin de plus ???)

Complétez vos tests pour obtenir une couverture de 100%.