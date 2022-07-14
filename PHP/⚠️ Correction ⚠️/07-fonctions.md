### Exo 7

- Faite en sorte que la fonction HelloWorld retourne exactement la valeur Hello World!

```php
function helloWorld(){
    return "Hello World!";
}
```

- Créer une fonction from scratch qui s'appelle jeRetourneMonArgument(). Exemple : Arg = "abc" ==> Return abc Arg = 123 ==> Return 123

```php
function jeRetourneMonArgument($Arg) {
    return $Arg;
}
```

- Créer une fonction from scratch qui s'appelle concatenationAvecEspace(). Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux. Exemple : argument 1 = Ngolo Argument 2 = Kante; Resultat : Ngolo Kante

```php
function concatenationAvecEspace($arg1, $arg2) {
    return $arg1 . " " . $arg2;
}
```

- Créer une fonction from scratch qui s'appelle somme(). Elle prendra deux arguments de type int. Elle devra retourner la somme des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 10

```php
function somme($int1, $int2) {
    return $int1 + $int2;
}
```

- Créer une fonction from scratch qui s'appelle estIlMajeure(). Elle prendra un argument de type int. Elle devra retourner un boolean. Si age >= 18 elle doit retourner true si age < 18 elle doit retourner false Exemple : age = 5 ==> false age = 34 ==> true

```php
function estIlMajeure($int) {
    if($int >= 18) return true;
    return false;
}
```

- Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra deux arguments de type int. Elle devra retourner le plus grand des deux.

```php
function plusGrand($int1, $int2) {
    if($int1 > $int2) return $int1;
    return $int2;
}
```

- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra trois arguments de type int. Elle devra retourner le plus petit des trois.

```php
function plusPetit($int1, $int2, $int3) {
    return min([$int1,$int2,$int3]);
}
```

### Exo 8

- Créer une fonction from scratch qui s'appelle premierElementTableau(). Elle prendra un argument de type array. Elle devra retourner le premier élement du tableau. Si l'array est vide, il faudra retourner null;

```php
function premierElementTableau($array) {
    if(!is_null($array)) return $array[0];
    return null;
}
```

- Créer une fonction from scratch qui s'appelle dernierElementTableau(). Elle prendra un argument de type array. Elle devra retourner le dernier élement du tableau. Si l'array est vide, il faudra retourner null;

```php
function dernierElementTableau($array) {
    if(!is_null($array)) return $array[count($array)-1];
    return null;
}
```

- Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra un argument de type array. Elle devra retourner le plus grand des élements présent dans l'array. Si l'array est vide, il faudra retourner null;

```php
function plusGrand($array) {
    if(empty($array)) return null;
    return max($array);
}
```

- Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password fait au moins 8 caractères et false si moins.

```php
function verificationPassword($string) {
    if(strlen($string) >= 8) return true;
    return false;
}
```

- Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password respecte les règles suivantes :
  - Faire au moins 8 caractères
  - Avoir au moins 1 chiffre
  - Avoir au moins une majuscule et une minuscule

```php
function verificationPassword($string) {
    if(
        strlen($string) >= 8 &&
        preg_match("#[0-9].*#",$string) &&
        preg_match("#[a-z].*#",$string) &&
        preg_match("#[A-Z].*#",$string)
    ) return true;
    return false;
}
```

- Créer une fonction from scratch qui s'appelle capital(). Elle prendra un argument de type string. Elle devra retourner le nom de la capitale des pays suivants :
  - France ==> Paris
  - Allemagne ==> Berlin
  - Italie ==> Rome
  - Maroc ==> Rabat
  - Espagne ==> Madrid
  - Portugal ==> Lisbonne
  - Angleterre ==> Londres
  - Tout autre pays ==> Inconnu
  - Il faudra utiliser la structure SWITCH pour faire cette exercice.

```php
function capital($string) {
    switch($string) {
        case'France': return 'Paris';
        case'Allemagne': return 'Berlin';
        case'Italie': return 'Rome';
        case'Maroc': return 'Rabat';
        case'Espagne': return 'Madrid';
        case'Portugal': return 'Lisbonne';
        case'Angleterre': return 'Londres';
        default: return 'Inconnu';
    }
}
```

- Créer une fonction from scratch qui s'appelle listHTML(). Elle prendra deux arguments :
  - Un string représentant le nom de la liste
  - Un array représentant les élements de cette liste
  - Elle devra retourner une liste HTML. Chaque element de cette liste viendra du tableau passé en paramètre.
  - Exemple : Paramètre : Titre : Capitale Liste : ["Paris", "Berlin", "Moscou"] Résultat : <h3>Capitale</h3><ul><li>Paris</li><li>Berlin</li><li>Moscou</li></ul>
  - Comme vous pouvez le voir il n'y a pas d'espace ni de retour à la ligne entre les élements de la liste. Pas d'espace non plus entre le titre et la liste.
  - Si le titre est null et vide il faut que la fonction retourne null. Si l'array est vide, il faut que la fonction retourne null.

```php
function listHTML($string,$array) {
    if(is_null($string) || empty($string)) return null;
    if(is_null($array) || empty($array)) return null;
    $titre = "<h3>" . $string . "</h3>";
    $villes = "<ul>";
    foreach($array as $key) {
        $villes .= "<li>" . $key . "</li>";
    }
    $villes .= "</ul>";
    return $titre . $villes;
}
```

- Créer une fonction from scratch qui s'appelle remplacerLesLettres(). Elle prendra un argument de type string. Elle devra retourner cette même string mais en remplacant les e par des 3, les i par des 1 et les o par des 0 Exemple :
  - input : "Bonjour les amis" ==> Output : B0nj0ur l3s am1s
  - input : "Les cours de programmation Web sont trops cools" ==> Output : L3s c0urs d3 pr0grammat10n W3b s0nt tr0ps c00ls

```php
function remplacerLesLettres($string) {
    $string = str_replace(['e','i','o','E','I','O'], ['3','1','0','3','1','0'], $string);
    return $string;
}
```

### Exo 9

Avec des fonctions et des tableaux :

- affiche tous les éléments d'un tableau,

```php

// affichage d'un tableau
function affiche_tableau ($t) {
  echo "tableau :";
  for ($i=0 ; $i<sizeof($t) ; $i++) {
    echo ' ';
    echo $t[$i];
  }
  echo "\n";
}
```

- calcule la moyenne des nombres contenus dans un tableau donné,

```php
function moyenne ($t) {
  $somme = 0;
  for ($i=0 ; $i<sizeof($t) ; $i++) {
    $somme = $somme + $t[$i];
  }
  echo 'la moyenne vaut ',($somme/sizeof($t)),"\n";
}
```

- indique combien d'éléments sont supérieurs ou égaux à 10,

```php
function onteulamoyenne ($t) {
  $fois = 0;
  for ($i=0 ; $i<sizeof($t) ; $i++) {
    if ($t[$i]>=10) {
      $fois = $fois + 1;
    }
  }
  echo "$fois ont eu la moyenne\n";
}
```

- teste si la note 20 est présente ou non,

```php
function ya20 ($t) {
  $i = 0;
  while (($i<sizeof($t)) && ($t[$i]!=20)) {
    $i = $i+1;
  }
  if ($i<sizeof($t)) {
    echo "quelqu'un a eu 20 !\n";
  } else {
    echo "personne n'a eu 20 !\n";
  }
}
```

- détermine la meilleure note obtenue.

```php
function notemax ($t) {
  $max = 0;
  for ($i=0 ; $i<sizeof($t) ; $i++) {
    if ($t[$i] > $max) {
      $max = $t[$i];
    }
  }
  echo "la note maximale est $max\n";
}
```

### Exo 10

Il faut écrire la fonction check_form. Celle-ci prend un tableau associatif en paramètre. Ce dernier contient les clés suivantes :

    nom
    prenom
    CP
    naissance
    banque

La fonction check_form doit vérifier que les données sont valides. Pour être valides les données doivent respecter les contraintes suivantes :

    Le nom doit exclusivement être composé des caractères de a à z, de - et (d'espace).
    Le prenom doit exclusivement être composé des caractères de a à z, de - et (d'espace).
    CP est une valeur numérique comprise entre 1000 et 9999.
    naissance doit être une date valide au format jour/mois/année.
    banque doit être un numéro de compte belge au format européen (eg. BE15 1234 5678 9012)

Pour vous aider dans la vérification des données vous pouvez utiliser les expressions régulières (voir fonction preg_match). Voici des expressions régulières pouvant vous aider :

    #^[A-Za-z -]*$# vérifie qu'une chaîne est composée des caractères de a à z, de - et (d'espace).
    #^[0-9]{1,2}/[0-9]{1,2}/[0-9]{1,4}$# vérifie qu'une chaine est au format xx/xx/xxxx où x est un nombre.
    #^BE[0-9]{2}( ?[0-9]{4}){3}$# vérifie qu'une chaîne correspond à un numéro de compte belge au format européen.

La fonction retournera un tableau associatif contenant les informations suivantes :

    valide valeur booléenne TRUE ou FALSE selon que toutes les données sont valides ou non
    nom
        valide valeur booléenne TRUE ou FALSE selon que les données dans nom sont valides ou non.
        message un message d'erreur relatif à nom si valide est FALSE.
    prenom
        valide valeur booléenne TRUE ou FALSE selon que les données dans prenom sont valides ou non.
        message un message d'erreur relatif à prenom si valide est FALSE.
    CP
        valide valeur booléenne TRUE ou FALSE selon que les données dans CP sont valides ou non.
        message un message d'erreur relatif à CP si valide est `FALSE
    naissance
        valide valeur booléenne TRUE ou FALSE selon que les données dans naissance sont valides ou non.
        message un message d'erreur relatif à naissance si valide est FALSE.
    banque
        valide valeur booléenne TRUE ou FALSE selon que les données dans banque sont valides ou non.
        message un message d'erreur relatif à banque si valide est FALSE.

```php
function check_form($data) {

$tab_valid = array(
    "nom"=>"#^[A-Za-z -]*$#",
    "prenom" => "#^[A-Za-z -]*$#",
    "CP" => "#^[0-9]{4}$#",
    "naissance" => "#(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)#",
    "banque" => "#^BE[0-9]{2}( ?[0-9]{4}){3}$#"
);

$tab_result = array();
foreach($data as $data_key => $data_value){
    if(preg_match($tab_valid[$data_key], $data_value)){
        $tab_result[$data_key] = array("valide" => 1, "message"=> "le champ $data_key est valide");
    }else{
        $tab_result[$data_key] = array("valide" => 0, "message"=> "le champ $data_key n'est pas valide");
    }
}

foreach($tab_result as $tab_result_value){
    if(in_array(0, $tab_result_value,true)){
        $tab_result["valide"] = 0;
        break;
    }else{
        $tab_result["valide"] = 1;
    }
}

return $tab_result;
```

## Calculer la différence entre deux brins d'ADN

```php
function difference(string $a, string $b) {

    if( strlen($a) === strlen($b) ) {
        $arr1 = str_split($a);
        $arr2 = str_split($b);
        $diff = array_diff_assoc($arr1, $arr2);
        return count($diff);
    }

    return false;
}
```

## Changer de l'ADN en ARN

```php
function toARN(string $adn): string {
    $transposition = [
        'C' => 'G',
        'G' => 'C', 
        'T' => 'A', 
        'A' => 'U'
    ];

    return strtr($adn, $transposition);
}
```

## Gérer le nom du robot

##### Étapes

- Faire un tableau contenant les 6 lettres autorisées
- Déclarer la variable $nomRobot = '';
- Choisir au hasard 1 élément du tableau (fonction native PHP à trouver)
- Faire une boucle pour le faire 3 fois
- Dans la boucle : concaténer la lettre trouvée à une variable de retour
- Concaténer un tiret
- Générer un nombre entre 0 et 9999 et le stocker dans $nomRobotNumber
- Gérer les cas où $nomRobotNumber ne fait que 3 chiffres :
  - [0;9] : concaténer '000' à $nomRobot
  - [10;99] : concaténer '00' à $nomRobot
  - [100:999] : concaténer '0' à $nomRobot
- Concatène $nomRobotNumber
- return $nomRobot

```php
function robotName() {

    // 1. Faire un tableau contenant les lettres autorisées
    $validLetters = ["R", "Z", "S", "X", "W", "T"];

    // 2. Déclarer la variable $nomRobot = '';
    $newName = "";

    // 3. Choisir au hasard 1 élément du tableau (fonction native PHP à trouver)
    // 4. Faire une boucle pour le faire 3 fois
    for ($i=0; $i < 3; $i++) {
        // une lettre aléatoire choisie par ID grâce à rand(0,5)
        // 5. Dans la boucle : concaténer la lettre trouvée à une variable de retour

        $newName.= $validLetters[rand(0, 5)];
    }

    // 6. Concaténer un tiret
    $newName.="-";

    // 7. Générer un nombre entre 0 et 9999 et le stocker dans $nomRobotNumber
    $robotNumber = rand(0, 9999);

    // 8. Gérer les cas où $nomRobotNumber ne fait que 3 chiffres :
    if ($robotNumber < 1000 && $robotNumber > 99) { // [0;9] : concaténer '000' à $nomRobot
        $newName .= "0";
    }
    elseif ($robotNumber < 100 && $robotNumber > 9) { // [10;99] : concaténer '00' à $nomRobot
        $newName .= "00";
    }
    elseif ($robotNumber < 10 ) { // [100:999] : concaténer '0' à $nomRobot
        $newName .= "000";
    };

    // 9. Concatène $nomRobotNumber
    $newName .= $robotNumber;
    
    // 10. return $nomRobot
    return $newName;
}
```

## Endiguer la guerre des clones

```php
// On prépare un tableau vide qui contiendra la liste des noms de robots édités
$namesList = [];

function robotName() {

    // On utilise la variable $namesList au sein de la fonction pour la remplir
    // à chaque appel de la fonction.
    // Comme elle vient du scope (la portée) global, on l'appelle avec global.
    // Ainsi, quand on la modifie DANS la fonction, elle est aussi modifiée en
    // dehors de la fonction.
    global $namesList;

    $validLetters = ["R", "Z", "S", "X", "W", "T"];
    $newName = "";

    for ($i=0; $i < 3; $i++) {
        $newName.= $validLetters[rand(0, 5)];
    }

    $newName.="-";
    $robotNumber = rand(0, 9999);

    if ($robotNumber < 1000 && $robotNumber > 99) {
        $newName .= "0";
    }
    elseif ($robotNumber < 100 && $robotNumber > 9) {
        $newName .= "00";
    }
    elseif ($robotNumber < 10 ) {
        $newName .= "000";
    };

    $newName .= $robotNumber;

    // On teste si le nouveau nom n'existe pas dans le tableau :
    if (!in_array($newName, $namesList)) {
        // S'il n'existe pas, on l'ajoute au tableau et on retourne le nouveau nom
        $namesList[] = $newName; // Autre écriture: array_push($namesList, $newName);
        return $newName;
    }

    // Sinon, on emmet une erreur :
    throw new Error('Vous êtes sur le point de cloner ce robot !');
}
```

```php
$robotNames = [];

// Dans les arguments de la fonction, on peut préciser un passage par référence avec & : cela indique que la variable du scope supérieur passée en paramètres de la fonction, si elle est modifiée par la fonction appelée, restera modifiée dans son scope :

function nameRobot(&$robotNames)
{
    $name = "";
    $letters = ["R", "Z", "S", "X", "W", "T"];
    while (strlen($name) < 3) {
        $name .= $letters[rand(0, count($letters) - 1)];
    }
    $name .= "-";
    while (strlen($name) < 8) {
        $name .= strval(rand(0, 9));
    }
    
    if (!in_array($name, $robotNames)) {
    
        // On ajoute à $robotNames le nouveau nom
        array_push($robotNames, $name);
        var_dump($robotNames);
        return true;
    }
    // Si il y a une correspondance (le nom existe), on relance la fonction elle-même
    nameRobot($robotNames);
}

var_dump($robotNames); // tableau vide
nameRobot($robotNames); // on lance la fonction avec $robotNames en référence
var_dump($robotNames); // tableau contenant dorénavant 1 élément !
```

