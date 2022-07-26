### Exo 5

- Déclarer une variable de type array qui stocke les informations suivantes :
  - France : Paris
  - Allemagne : Berlin
  - Italie : Rome
  - Afficher les valeurs de tous les éléments du tableau en utilisant la boucle foreach.

```php
<?php
   $tableau = array(
      'France' => 'Paris',
      'Allemagne' => 'Berlin',
      'Italie' => 'Rome'
   );
   foreach($tableau as $t) {
      echo $t.' ';    
   }
?>
```

- En utilisant la fonction rand(), remplir un tableau avec 10 nombres aléatoires. Puis, tester si le chiffre 42 est dans le tableau et afficher un message en conséquence. Enfin, afficher le contenu de votre tableau avec var_dump.

```php
<?php
   $tableau = array();
   $i = 0;
   while($i < 10) {
      $tableau[] = rand(0, 50);
      $i++;   
   }
   if(in_array(42, $tableau))
      echo 'Le nombre 42 est bien dans le tableau.';
   else
      echo 'Le tableau ne contient pas la valeur 42.';
   echo '<br />';  
   var_dump($tableau);
?>
```

- En utilisant la fonction rand(), remplir un tableau avec 10 nombres aléatoires. Puis, trier les valeurs dans deux tableaux distincts. Le premier contiendra les valeurs inférieures à 50 et le second contiendra les valeurs supérieures ou égales à 50. Enfin, afficher le contenu des deux tableaux.

```php
<?php
   $tableau = array();
   $tableau1 = array();
   $tableau2 = array();
   $i = 0;
   while($i < 10) {
      $tableau[] = rand(0, 100);
      $i++;   
   }
   foreach($tableau as $t) {
      if($t < 50) {
         $tableau1[] = $t;
      } else {
         $tableau2[] = $t;    
      }
   }
   
   echo 'Tableau 1 : ';
   foreach($tableau1 as $t1) {
      echo $t1.' ';
   }
   
   echo '<br />Tableau 2 : ';
   foreach($tableau2 as $t2) {
      echo $t2.' ';
   }
?>
```

- En utilisant le tableau ci-dessous, afficher seulement les pays qui ont une population supérieure ou égale à 20 millions d'habitants.

  ```php
  <?php
    $pays_population = array(
      France' => 67595000,
      Suede' => 9998000,
      Suisse' => 8417000,
      Kosovo' => 1820631,
      Malte' => 434403,
      Mexique' => 122273500,
      Allemagne' => 82800000,
    );
  ?>
  ```

```php
<?php
   $pays_population = array(
      'France' => 67595000,
      'Suede' => 9998000,
      'Suisse' => 8417000,
      'Kosovo' => 1820631,
      'Malte' => 434403,
      'Mexique' => 122273500,
      'Allemagne' => 82800000,
   );
   echo '<p>Les pays suivants ont une population supérieure à 20 millions d\'habitants.</p><ul>';
   foreach($pays_population as $pays => $population) {
      if($population >= 20000000) {
      echo '<li>'.$pays.'</li>';
      }
   }
   echo '</ul>';
?>
```

- En reutilisant le tableau ci-dessus, compter le nombre d'éléments du tableau.

```php
<?php
   $pays_population = array(
      'France' => 67595000,
      'Suede' => 9998000,
      'Suisse' => 8417000,
      'Kosovo' => 1820631,
      'Malte' => 434403,
      'Mexique' => 122273500,
      'Allemagne' => 82800000,
   );
   
   echo 'Il y a '.count($pays_population).' éléments dans le tableau.';
?>
```

- Quelle syntaxe permet d'afficher le deuxième élément du tableau $cocktails ?

  ```php
  <?php
    $cocktails = array('Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule');
  ?>
  ```

```php
<?php
   $cocktails = array('Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule');
   echo $cocktails[1];
?>
```

- Quelle syntaxe permet d'afficher l'âge de Manuel ?

  ```php
  <?php
    $personnes = array(
      Jean' => 16,
      Manuel' => 19,
      André' => 66
    );  
  ?>
  ```

```php
<?php
   $personnes = array(
      'Jean' => 16,
      'Manuel' => 19,
      'André' => 66
   );
   echo 'Manuel a '.$personnes['Manuel'].' ans.';
?>
```

- Écrivez un programme PHP pour supprimer les doublons d’un tableau triée.

```php
<?php
  $langages = array("PHP", "Java", "PHP", "HTML", "CSS", "Fortran", "HTML");
   
  // Supprimer les doublons
  $unique = array_unique($langages);
  print_r($unique);
?>
```

### Exo 6

1. Soit un tableau `$a = array( 0, 1, 2, 3, 4 );`, comment afficher la valeur `3` du tableau ?

```php
$a[ 3 ];
```

2. Afficher la valeur 3 du tableau suivant :

```php
$a = [
  "zero"  => 0,
  "un"    => 1,
  "deux"  => 2,
  "trois" => 3,
  "quatre"=> 4,
];
```

```php
$a[ "trois" ];
```

3. Afficher la valeur 3 du tableau suivant :

```php
$a = [
  [0, 1],
  [2,[3]],
  "zero"  => 0,
  "un"    => 1,
  "deux"  => 2,
  "quatre"=> 4,
];
```

```php
$a[ 1 ][ 1 ][ 0 ];
```

4. Afficher la valeur 3 du tableau suivant :

```php
$a = [
    "a" => [
        "b" => 0,
        "c" => 1,
    ],
    "d" => [
        "e" =>  2,
        "f" => [
            "g" => 3
        ]
    ]
];
```

```php
$a[ "b" ][ "o" ][ "b" ];
```

5. Terreur ! Un élève a oublié d'indenter son code. Indentez cet array correctement et corrigez l'erreur.

```php
$a = [ "a" => [
   "b" => 0,  "c" => 1,],"d" => [
 2, "f" =>    [
   "g" => 3
 ]];
```

```php
$a = [ 
    "a" => [
        "b" => 0,  
        "c" => 1
    ],
    "d" => [
        2, 
        "f" => [
            "g" => 3
        ]
    ]
];
```

6. Trouver la somme de cet tableau de nombres : `$a = [ 0, 1, 2, 3, 4, 5, 6 ];`.

```php
$a = [ 0, 1, 2, 3, 4, 5, 6 ];
echo array_sum($a)
```

7. Créez un array $films contenant les données suivantes :

```
- The Shawshank Redemption
    Année : 1994
    Note : 9.2  
- The Godfather
    Année : 1972
    Note : 9.1  
- The Dark Knight
    Année : 2008
    Note : 9.0  
- The Lord of the Rings: The Return of the King
    Année : 2003
    Note : 8.9
- Pulp Fiction
    Année : 1994
    Note : 8.9
```

```php
```

8a. Créez le tableau suivant :

```
- The Shawshank Redemption 
- The Godfather
- The Dark Knight
- The Lord of the Rings: The Return of the King
- Pulp Fiction
```

```php
```

8b. Affichez tous ses éléments grâce à une boucle `foreach($films as $film) { /*...*/ }` :
<details>
  <summary>Spoiler warning</summary>
  
  Exemple :

  ```php
  foreach($saisons as $saison) {
    var_dump($saison);
  }
```

</details>

```php
```

8c. Affichez, toujours grâce à une boucle, plutôt avec à un `echo`. N'oubliez pas de sauter une ligne entre chaque film !

<details>
  <summary>Spoiler warning</summary>
> Exemple :

```
// Afficher du PHP et du HTML en même temps :

// Solution 1 : concaténation
<body>
  <?php
  echo "<h1>" . $prenom . "</h1>";
  ?>
</body>

// Solution 2 : PHP dans HTML
<body>
  <h1><?php echo $prenom; ?></h1>
</body>
```

</details>

```php
```

8d. Affichez ces éléments, toujours grâce à une boucle, plutôt dans une liste `<ul>` `<li>`.

```php
```

9a. Soit le tableau suivant :

```
- The Shawshank Redemption : Frank Darabont
- The Godfather : Francis Ford Coppola
- The Dark Knight : Christopher Nolan
- The Lord of the Rings: The Return of the King : Peter Jackson
- Pulp Fiction : Quentin Tarantino
```

Créez un tableau de clés => valeurs avec ce tableau, avec le film en clé et le réalisateur en valeur rappel :

```php
$array = [
    "cle" => "valeur",
    "cle2" => "valeur2",
]
```

```php
```

9b. Reprennez le tableau de l'exercice 9a. Grâce à une boucle dans une boucle, affichez le tableau
dans une liste `<ul>` `<li>` toutes les informations affichées de la façon suivante :

- The Shawshank Redemption : Frank Darabont
- The Godfather : Francis Ford Coppola
- The Dark Knight : Christopher Nolan
- The Lord of the Rings: The Return of the King : Peter Jackson
- Pulp Fiction : Quentin Tarantino

<details>
  <summary>Spoiler warning</summary>
> Exemple :

```php

// Soit un tableau :

$saisons = [
  "ete" => "juin",
  "automne" => "septembre",
  "hiver" => "decembre",
  "printemps" => "mars"
];

// Il s'agit d'un tableau de clés/valeurs.
// La clé : le nom de la saison
// La valeur : le tableau contenant les détails de la saison

// Dans ce cas, on précise dans le foreach qu'il s'agit non plus d'une simple valeur (comme l'exemple ci-dessus, $saisons)
// mais d'un ensemble de clés => valeurs : $saison => $detail

// Ainsi, on a accès à la clé avec $saison, et au détail avec $detail

foreach($saisons as $saison => $detail) {

  // Afficher la saison :
  echo $saison;
  
  // Afficher le détail :
  echo $detail;

  // Afficher les deux en concaténation sous la forme "la saison $saison débute en $detail"
  echo "La saison " $saison . " débute en ". $detail;
}
```

</details>

```php
```

9c. Reprennez le tableau de l'exercice 6. Grâce à une boucle dans une boucle, affichez le tableau
dans une liste `<ul>` `<li>` toutes les informations affichées de la façon suivante :

```
- The Shawshank Redemption
    Année : 1994
    Note : 9.2  
- The Godfather
    Année : 1972
    Note : 9.1  
- The Dark Knight
    Année : 2008
    Note : 9.0  
- The Lord of the Rings: The Return of the King
    Année : 2003
    Note : 8.9
- Pulp Fiction
    Année : 1994
    Note : 8.9
```

<details>
  <summary>Spoiler warning</summary>
> Exemple

```php
$saisons = [
    "ete" => [
        "debut" => "juin",
        "fin"   => "septembre",
    ],
    "hiver" => [
        "debut" => "decembre",
        "fin"   => "mars",
    ]
];


foreach ($saisons as $saison => $details) {

    // Afficher la saison
    echo $saison;

    // Afficher le détail de chaque saison, on boucle le sous-tableau $details :

    foreach ($details as $detail) {

        // Afficher le début de la saison
        echo $detail['debut'];

        // Afficher la fin de la saison
        echo $detail['fin'];
    }

}
```

</dtails>

```php
```