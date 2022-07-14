### Exo 1

- Parmi les variables suivantes, lesquelles ont un nom valide : $a, $_a, $a_a, $AAA, $a!, $1a et $a1 ?

```

Seules les variables $a, $_a, $a_a, $AAA et $a1 ont un nom valide en PHP. $1a n'est pas un nom de variable valide car il commence par un chiffre, tandis que $1a est également incorrect car il contient un caractère interdit.

```

- Utiliser l'instruction d'affichage echo pour afficher :
  - la variable a doit contenir la chaîne de caractère 42;
  - la variable b doit contenir l'entier 42;
  - la variable c doit contenir la chaîne de caractère Hello World!;

```php
$a = "42";
$b = 42;
$c = "Hello World!";
```

- Modifier le code ci-dessous pour calculer la moyenne des notes.

  ```php
    <?php
        $note_maths = 15;
        $note_francais = 12;
        $note_histoire_geo = 9;
        $moyenne = 0;
        echo 'La moyenne est de '.$moyenne.' / 20.';
    ?>
  ```

  ```php
    <?php 
        $note_maths = 15;
        $note_francais = 12;
        $note_histoire_geo = 9;
        $moyenne = ($note_maths + $note_francais + $note_histoire_geo) / 3;
        echo 'La moyenne est de '.$moyenne.' / 20.';
    ?>
  ```

- Calculer le prix TTC du produit.

  ```php
    <?php
        $prix_ht = 50;
        $tva = 20;
        $prix_ttc = 0;
        echo 'Le prix TTC du produit est de '.$prix_ttc.' €.';
    ?>
  ```

  ```php
    <?php
        $prix_ht = 50;
        $tva = 20;
        $prix_ttc = $prix_ht * (1 + ($tva / 100));
        echo 'Le prix TTC du produit est de '.$prix_ttc.' €.';
    ?>
  ```

- Déclarer une variable $test qui contient la valeur 42. En utilisant la fonction var_dump(), faire en sorte que le type de la variable $test soit string et que la valeur soit bien de 42.

```php
<?php
   $test = '42';
   var_dump($test);
?>
```
