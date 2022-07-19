### Exo 2

### 2a

- Déclarer une variable $sexe qui contient une chaîne de caractères. Créer une condition qui affiche un message différent en fonction de la valeur de la variable.

```php
<?php
   $sexe = 'homme';
   if($sexe == 'femme') :
      echo 'Bonjour Madame.';
   elseif($sexe == 'homme') :
      echo 'Bonjour Monsieur.';
   else :
      echo 'Bonjour sexe inconnu.';
   endif;
?>
```

- Déclarer une variable $budget qui contient la somme de 1 553,89 €. Déclarer une variable $achats qui contient la somme de 1 554,76 €. Afficher si le budget permet de payer les achats.

```php
<?php
   $budget = 1553.89;
   $achats = 1554.76;
   if($budget >= $achats) :
      echo 'Le budget ('.$budget.' €) permet de payer tous les achats ('.$achats.' €).';
   else :
      echo 'Le budget ('.$budget.' €) ne permet pas de payer tous les achats ('.$achats.' €).';
   endif;
?>
```

- Déclarer une variable $age qui contient la valeur de type integer de votre choix. Réaliser une condition pour afficher si la personne est mineure ou majeure.

```php
<?php
   $age = 19;
   if($age >= 18)
      echo 'Vous êtes majeur.';
   else
      echo 'Vous êtes mineur.';
?>
```

- Déclarer une variable $heure qui contient la valeur de type integer de votre choix comprise entre 0 et 24. Créer une condition qui affiche un message si l'heure est le matin, l'après-midi ou la nuit.

```php
<?php
   $heure = 14;
   if($heure < 0 || $heure > 23) :
      echo 'Houla, cette heure est incorrecte.';
   elseif($heure >= 7 && $heure < 12) :
      echo 'Bonne matinée.';
   elseif($heure >= 12 && $heure < 22) :
      echo 'Bonne après-midi.';
   else :
      echo 'Bonne nuit.';
   endif;
?>
```

### 2b

Créer une variable **age** et l'initialiser avec une valeur.  
Si l'âge est supérieur ou égale à 18, afficher **Vous êtes majeur**. Dans le cas contraire, afficher **Vous êtes mineur**.

```php
$age = 20;
if ($age <= 18) {
    var_dump('tu es mineur');
} else {
    var_dump('tu es majeur');
}

$age = 20;
$sentence = "tu es majeur";
if ($age <= 18) {
    $sentence = 'tu es mineur';
}
var_dump($sentence);
```

## 2c

Créer une variable **isEasy** de type booléan et l'initialiser avec une valeur.  
Afficher **C'est facile!!** si c'est vrai. Dans le cas contraire afficher **C'est difficile !!!**.  
**Bonus :** L'écrire de deux manières différentes.

```php
$isEasy = true;
if ($isEasy) {
    var_dump('facile !');
} else {
    var_dump('difficile !');
}

if ($isEasy) var_dump('facile');
else var_dump('difficile');

var_dump(($isEasy) ? 'facile' : 'difficile');
```

## 2d

Créer deux variables **age** et **gender**. La variable **gender** peut prendre comme valeur :

- Homme
- Femme  

En fonction de l'âge et du genre afficher la phrase correspondante :

- **Vous êtes un homme et vous êtes majeur**
- **Vous êtes un homme et vous êtes mineur**
- **Vous êtes une femme et vous êtes majeur**
- **Vous êtes une femme et vous êtes mineur**  

Gérer tous les cas.

```php
$age = 15;
$sexe = "h";

/**
 * Mauvaise manière (gérer tous les cas un par un)
 */
if ($age <= 18) {
    if ($sexe === "f") {
        var_dump("Vous êtes une femme et vous êtes mineure");
    } else {
        var_dump("Vous êtes un homme et vous êtes mineur");
    }
}

$ageString = "vous êtes majeur";
if ($age <= 18) {
    $ageString = "vous êtes mineur";
}

$sexeString = "homme";
$accord = "";
if ($sexe === "f") {
    $sexeString = "femme";
    $accord = "e";
}

var_dump("Vous êtes un" . $accord . " " . $sexeString . " et " . $ageString . $accord);

```

## 2e

L'échelle de Richter est un outil de mesure qui permet de définir la magnitude de moment d'un tremblement de terre. Cette échelle va de 1 à 9.  
Créer une variable **magnitude**. Selon la valeur de **magnitude**, afficher la phrase correspondante.  

Magnitude   |   Phrase
------      |    ---
1           |   Micro-séisme impossible à ressentir.
2           |   Micro-séisme impossible à ressentir mais enregistrable par les sismomètres.
3           |   Ne cause pas de dégats mais commence à pouvoir être légèrement ressenti.
4           |   Séisme capable de faire bouger des objets mais ne causant généralement pas de dégats.
5           |   Séisme capable d'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.
6           |   Fort séisme capable d'engendrer des destructions majeures sur une large distance (180 km) autour de l'épicentre.  
7           |   Séisme capable de destructions majeures à modérées sur une très large zone en fonction de la distance.
8           |   Séisme capable de destructions majeures sur une très large zone de plusieurs centaines de kilomètres.
9           |   Séisme capable de tout détruire sur une très vaste zone.  

Gérer tous les cas.  
*Utilser autre chose que des if else*

```php
$richter = 5;
switch ($richter) {
    case 1:
        var_dump("Micro-séisme impossible à ressentir.");
        foreach($a as $b) {
            echo "ok";
        }
        break;
    case 2:
        var_dump("Micro-séisme impossible à ressentir mais enregistrable par les sismomètres.");
        break;
    case 3:
        var_dump("Ne cause pas de dégats mais commence à pouvoir être légèrement ressenti.");
        break;
    case 4:
        var_dump("Séisme capable de faire bouger des objets mais ne causant généralement pas de dégats.");
        break;
    case 5:
        var_dump("Séisme capable d'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.");
        break;
    case 6:
        var_dump("Fort séisme capable d'engendrer des destructions majeures sur une large distance (180 km) autour de l'épicentre.");
        break;
    case 7:
        var_dump("Séisme capable de destructions majeures à modérées sur une très large zone en fonction de la distance.");
        break;
    case 8:
        var_dump("Séisme capable de destructions majeures sur une très large zone de plusieurs centaines de kilomètres.");
        break;
    case 9:
        var_dump("Séisme capable de tout détruire sur une très vaste zone.");
        break;
    default:
        var_dump("Valeur inconnue");
}
```

## 2f

Traduire ce code avec des if et des else :  

    <?php
      echo ($gender != 'Homme') ? 'C\'est une développeuse !!!' : 'C\'est un développeur !!!';
    ?>

```php
if ($gender != "Homme"){
    echo "C'est une développeuse !!!";
} else {
    echo "C'est une développeur";
};
```

## 2g

Traduire ce code avec des if et des else :  

    <?php
      echo ($age >= 18) ? 'Tu es majeur' : 'Tu n\'es pas majeur';
    ?>

```php
if ($age >= 18){
    echo "Tu es majeur";
} else {
    echo "Tu n'est pas majeur";
};
```

## 2h

Traduire ce code avec des if et des else :  

    <?php
      echo ($isOk == false) ? 'c\'est pas bon !!!' : 'c\'est ok !!';
    ?>

```php
if ($isOk == false){
    echo "c'est pas bon !!!";
} else {
    echo "c'est ok";
};
```

## 2i

Traduire ce code avec des if et des else :  

    <?php
      echo ($isOk) ? 'c'est ok !!' : 'c'est pas bon !!!';
    ?>

```php
if ($isOk){
    echo "c'est ok";
} else {
    echo "c'est pas bon !!!";
};
```
