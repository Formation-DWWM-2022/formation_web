# Comparaison du code orienté objet et du code procédural

Il n’y a pas vraiment de bonne ou de mauvaise façon d’écrire du code. Cela dit, cette section présente un argument solide en faveur de l’adoption d’une approche orientée objet dans le développement de logiciels, en particulier dans les grandes applications.

# Raison 1 : Facilité de mise en œuvre

Bien que cela puisse être intimidant au début, OOP offre en fait une approche plus facile pour traiter les données. Comme un objet peut stocker des données en interne, les variables n’ont pas besoin d’être passées d’une fonction à une autre pour fonctionner correctement.

Aussi, parce que plusieurs instances d’une même classe peuvent exister simultanément, traiter de grands ensembles de données est infiniment plus facile. Par exemple, imaginez que deux personnes soient traitées dans un dossier. Elles ont besoin de noms, de professions et d’âges.

## L’approche procédurale

Voici l’approche procédurale de notre exemple :

```php
<?php
 
function changeJob($person, $newjob)
{
  $person['job'] = $newjob; // Change the person's job
  return $person;
}
 
function happyBirthday($person)
{
  ++$person['age']; // Add 1 to the person's age
  return $person;
}
 
$person1 = array(
  'name' => 'Tom',
  'job' => 'Button-Pusher',
  'age' => 34
);
 
$person2 = array(
  'name' => 'John',
  'job' => 'Lever-Puller',
  'age' => 41
);
 
// Output the starting values for the people
echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";
 
// Tom got a promotion and had a birthday
$person1 = changeJob($person1, 'Box-Mover');
$person1 = happyBirthday($person1);
 
// John just had a birthday
$person2 = happyBirthday($person2);
 
// Output the new values for the people
echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";
 
?>
```

Lorsqu’il est exécuté, le code affiche ce qui suit :

```
Person 1: Array
(
  [name] => Tom
  [job] => Button-Pusher
  [age] => 34
)
Person 2: Array
(
  [name] => John
  [job] => Lever-Puller
  [age] => 41
)
Person 1: Array
(
  [name] => Tom
  [job] => Box-Mover
  [age] => 35
)
Person 2: Array
(
  [name] => John
  [job] => Lever-Puller
  [age] => 42
)
```

Bien que ce code ne soit pas nécessairement mauvais, il y a beaucoup à garder à l’esprit lors du codage. Le tableau des attributs de la personne affectée doit être passé et retourné à partir de chaque appel de fonction, ce qui laisse une certaine marge d’erreur.

Pour nettoyer cet exemple, il serait souhaitable de laisser autant de choses que possible au promoteur. Seules les informations absolument essentielles pour l’opération en cours devraient être transmises aux fonctions.

C’est là que OOP intervient et vous aide à nettoyer les choses.

## L’approche OOP

Voici l’approche OOP de notre exemple :

```php
<?php
 
class Person
{
  private $_name;
  private $_job;
  private $_age;
 
  public function __construct($name, $job, $age)
  {
      $this->_name = $name;
      $this->_job = $job;
      $this->_age = $age;
  }
 
  public function changeJob($newjob)
  {
      $this->_job = $newjob;
  }
 
  public function happyBirthday()
  {
      ++$this->_age;
  }
}
 
// Create two new people
$person1 = new Person("Tom", "Button-Pusher", 34);
$person2 = new Person("John", "Lever Puller", 41);
 
// Output their starting point
echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";
 
// Give Tom a promotion and a birthday
$person1->changeJob("Box-Mover");
$person1->happyBirthday();
 
// John just gets a year older
$person2->happyBirthday();
 
// Output the ending values
echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";
 
?>
```

Ceci produit les résultats suivants dans le navigateur :

```
Person 1: Person Object
(
  [_name:private] => Tom
  [_job:private] => Button-Pusher
  [_age:private] => 34
)
 
Person 2: Person Object
(
  [_name:private] => John
  [_job:private] => Lever Puller
  [_age:private] => 41
)
 
Person 1: Person Object
(
  [_name:private] => Tom
  [_job:private] => Box-Mover
  [_age:private] => 35
)
 
Person 2: Person Object
(
  [_name:private] => John
  [_job:private] => Lever Puller
  [_age:private] => 42
)
```

Il y a un peu plus de configuration pour orienter l’objet d’approche, mais une fois que la classe est définie, créer et modifier des personnes est un jeu d’enfant ; les informations d’une personne n’ont pas besoin d’être passées ou renvoyées des méthodes, et seule l’information absolument essentielle est transmise à chaque méthode.

> Sur une petite échelle, cette différence peut ne pas sembler beaucoup, mais à mesure que vos applications grandissent en taille, POO réduira considérablement votre charge de travail si mis en œuvre correctement.
Tout n’a pas besoin d’être orienté objet. Une fonction rapide qui gère quelque chose de petit en un seul endroit à l’intérieur de l’application ne doit pas nécessairement être enveloppé dans une classe. Faites preuve de jugement lorsque vous décidez entre les approches orientées objet et procédurales.

# Raison 2 : Meilleure organisation

Un autre avantage de POO est à quel point il se prête à être facilement empaqueté et catalogué. Chaque classe peut généralement être conservée dans son propre fichier, et si une convention de nommage uniforme est utilisée, l’accès aux classes est extrêmement simple.

Supposons que vous avez une application avec 150 classes qui sont appelées dynamiquement par un fichier de contrôleur à la racine de votre système de fichiers d’application. Toutes les 150 classes suivent la convention d’appellation class.classname.inc.php et résident dans le dossier inc de votre application.

Le contrôleur peut implémenter la fonction __autoload() de PHP pour tirer dynamiquement seulement les classes dont il a besoin comme elles sont appelées, plutôt que d’inclure tous les 150 dans le fichier du contrôleur au cas où ou de trouver une façon intelligente d’inclure les fichiers dans votre propre code :

```php
<?php
  function __autoload($class_name)
  {
      include_once 'inc/class.' . $class_name . '.inc.php';
  }
?>
```

Avoir chaque classe dans un fichier séparé rend également le code plus portable et plus facile à réutiliser dans de nouvelles applications sans un tas de copier-coller.

# Raison 3 : Entretien plus facile

En raison de la nature plus compacte de POO quand fait correctement, les changements dans le code sont généralement beaucoup plus facile à repérer et faire que dans une longue implémentation de procédure de code spaghetti.

Si un tableau particulier d’information gagne un nouvel attribut, un morceau de logiciel de procédure peut exiger (dans un scénario du pire) que le nouvel attribut soit ajouté à chaque fonction qui utilise le tableau.

Une application POO pourrait potentiellement être mise à jour aussi facilement que l’ajout de la nouvelle propriété, puis l’ajout des méthodes qui traitent de ladite propriété.

Une grande partie des avantages couverts dans cette section sont le produit de POO en combinaison avec les pratiques de programmation procédure. Il est certainement possible de créer un code de procédure facile à maintenir qui ne cause pas de cauchemars, et il est également possible de créer un code orienté objet horrible.

# Résumé

À ce stade, vous devriez vous sentir à l’aise avec le style de programmation orienté objet. Apprendre POO est une excellente façon d’amener votre programmation à ce niveau. Lorsqu’il est mis en œuvre correctement, POO vous aidera à produire un code portable facile à lire et à entretenir, ce qui vous permettra (et aux développeurs qui travaillent avec vous) d’économiser des heures de travail supplémentaire.