### Exo 3

- En utilisant la boucle while, afficher tous les codes postaux possibles pour le département 77.

```php
<?php
   $i = 77000;
   while($i <= 77999) {
      echo $i.' ';
      $i++;
   }
?>
```

- En utilisant la boucle for, afficher la table de multiplication du chiffre 5.

```php
<?php
   $n = 5;
   for($i = 1;$i <= 10;$i++) {
      echo $n.' x '.$i.' = '.($n * $i).' <br />';
   }
?>
```

- En utilisant deux boucles for, écrire un script qui produit le résultat ci-dessous.

      1
      22
      333
      4444
      55555

```php
<?php
   for($i = 1;$i <= 5;$i++) {
      for($k = 1;$k <= $i;$k++) {
         echo $i;
      }
      echo '<br />';
   }
?>
```

- Déclarer une variable avec le nom de votre choix et avec la valeur 0. Tant que cette variable n'atteint pas 20, il faut :
  - l'afficher ;
  - incrémenter sa valeur de 2 ;
  - Si la valeur de la variable est égale à 10, la mettre en valeur avec la balise HTML appropriée.

```php
<?php
   $k = 0;
   while($k <= 20) {
      if($k == 10) {
         echo '<strong>'.$k.'</strong>';   
      } else {
         echo $k;
      }
      echo '<br />';
      $k = $k + 2;
   }
?>
```

### Exo 4

- Écrire une boucle qui produit une ligne horizontale de 8 étoiles.

```php
for ($i=1 ; $i<=10 ; $i++) {
        echo '*';
}
echo "\n";
```

- Imbriquer ce code dans une nouvelle boucle pour produire un carré de 8 lignes horizontales, chacune contenant 8 étoiles.

```php
for ($j=1 ; $j<=10 ; $j++) {
    /* une ligne d'étoiles et passage à la ligne */
    for ($i=1 ; $i<=10 ; $i++) {
        echo '*';
    }
    echo "\n";
}

```

- Produire des triangles rectangles avec différentes orientations.

      *
      **
      ***
      ****
      *****
      ******
      *******
      ********
      *********
      **********

```php
$taille = 5; 
for ($i = 1; $i <= $taille; $i++) 
{ 
     for ($k = 1; $k <= $i; $k++) 
     {
          echo "*";
     }
     echo '<br />';
}
```

- Envisager les mêmes figures mais creuses et non plus pleines.

```php
/* une ligne d'étoiles et passage à la ligne */
for ($i=1 ; $i<=10 ; $i++) {
    echo '*';
}
echo "\n";

/* les lignes creuses */
for ($j=1 ; $j<=8 ; $j++) {
    /* une ligne creuse*/
    echo "*";
    for ($i=1 ; $i<=8 ; $i++) {
        echo ' ';
    }
    echo "*\n";
}

/* une ligne d'étoiles et passage à la ligne */
for ($i=1 ; $i<=10 ; $i++) {
    echo '*';
}
echo "\n";
```
