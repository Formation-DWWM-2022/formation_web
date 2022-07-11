## Les fonctions [40 min] -> Q/R

<https://grafikart.fr/tutoriels/fonctions-php-1119#autoplay>

## Les fonctions utilisateurs [32 min] -> Q/R

<https://grafikart.fr/tutoriels/fonctions-utilisateurs-php-1120#autoplay>

### Exo 7

- Faite en sorte que la fonction HelloWorld retourne exactement la valeur Hello World!
- Créer une fonction from scratch qui s'appelle quiEstLeMeilleurProf(). Elle doit retourner Le prof de programmation Web
- Créer une fonction from scratch qui s'appelle jeRetourneMonArgument(). Exemple : Arg = "abc" ==> Return abc Arg = 123 ==> Return 123
- Créer une fonction from scratch qui s'appelle concatenation(). Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux. Exemple : argument 1 = Antoine Argument 2 = Griezmann; Resultat : AntoineGriezmann
- Créer une fonction from scratch qui s'appelle concatenationAvecEspace(). Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux. Exemple : argument 1 = Ngolo Argument 2 = Kante; Resultat : Ngolo Kante
- Créer une fonction from scratch qui s'appelle somme(). Elle prendra deux arguments de type int. Elle devra retourner la somme des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 10
- Créer une fonction from scratch qui s'appelle soustraction(). Elle prendra deux arguments de type int. Elle devra retourner la soustraction des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 0
- Créer une fonction from scratch qui s'appelle multiplication(). Elle prendra deux arguments de type int. Elle devra retourner la multiplication des deux. Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 25
- Créer une fonction from scratch qui s'appelle estIlMajeure(). Elle prendra un argument de type int. Elle devra retourner un boolean. Si age >= 18 elle doit retourner true si age < 18 elle doit retourner false Exemple : age = 5 ==> false age = 34 ==> true
- Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra deux arguments de type int. Elle devra retourner le plus grand des deux.
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra deux arguments de type int. Elle devra retourner le plus petit des deux.
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra trois arguments de type int. Elle devra retourner le plus petit des trois.

### Exo 8

- Créer une fonction from scratch qui s'appelle premierElementTableau(). Elle prendra un argument de type array. Elle devra retourner le premier élement du tableau. Si l'array est vide, il faudra retourner null;
- Créer une fonction from scratch qui s'appelle dernierElementTableau(). Elle prendra un argument de type array. Elle devra retourner le dernier élement du tableau. Si l'array est vide, il faudra retourner null;
- Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra un argument de type array. Elle devra retourner le plus grand des élements présent dans l'array. Si l'array est vide, il faudra retourner null;
- Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra un argument de type array. Elle devra retourner le plus petit des élements présent dans l'array. Si l'array est vide, il faudra retourner null;
- Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password fait au moins 8 caractères et false si moins.
- Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password respecte les règles suivantes :
  - Faire au moins 8 caractères
  - Avoir au moins 1 chiffre
  - Avoir au moins une majuscule et une minuscule
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
- Créer une fonction from scratch qui s'appelle listHTML(). Elle prendra deux arguments :
  - Un string représentant le nom de la liste
  - Un array représentant les élements de cette liste
  - Elle devra retourner une liste HTML. Chaque element de cette liste viendra du tableau passé en paramètre.
  - Exemple : Paramètre : Titre : Capitale Liste : ["Paris", "Berlin", "Moscou"] Résultat : <h3>Capitale</h3><ul><li>Paris</li><li>Berlin</li><li>Moscou</li></ul>
  - Comme vous pouvez le voir il n'y a pas d'espace ni de retour à la ligne entre les élements de la liste. Pas d'espace non plus entre le titre et la liste.
  - Si le titre est null et vide il faut que la fonction retourne null. Si l'array est vide, il faut que la fonction retourne null.
- Créer une fonction from scratch qui s'appelle remplacerLesLettres(). Elle prendra un argument de type string. Elle devra retourner cette même string mais en remplacant les e par des 3, les i par des 1 et les o par des 0 Exemple :
  - input : "Bonjour les amis" ==> Output : B0nj0ur l3s am1s
  - input : "Les cours de programmation Web sont trops cools" ==> Output : L3s c0urs d3 pr0grammat10n W3b s0nt tr0ps c00ls

### Exo 9

Avec des fonctions et des tableaux :

- affiche tous les éléments d'un tableau,
- calcule la moyenne des nombres contenus dans un tableau donné,
- indique combien d'éléments sont supérieurs ou égaux à 10,
- teste si la note 20 est présente ou non,
- détermine la meilleure note obtenue.
- On souhaite stocker les notes d'étudiants, vous utiliserez un tableau associatif pour ça :
  - Albert : 12, 8, 9, 7, 13
  - Michel : 14, 13, 12, 11, 10
  - Vincent : 17, 16, 15, 18, 13
  - Faite une fonction qui prend en paramètre un tableau de note et permet de calculer la moyenne de l'étudiant

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

## Exo 11

1. Créez une fonction qui retourne "Bonjour à tous !". Affichez le résultat avec un `echo`.

2. Créez une fonction qui calcule une vitesse en mètres par secondes (`m/s`) : `vitesse (m/s) = temps (s)/distance (m)` et qui prend en argument des mètres et des secondes. Affichez la valeur dans un echo qui dit : "La durée est de xxx secondes, la distance est de xxx mètres, la vitesse est de xxx m/s".

## Calculer la différence entre deux brins d'ADN

> Des généticiens ont besoin de calculer les différences entre deux brins d'ADN représentés par exemple comme suit:

```
GAGCCTACTAACGGGAT
CATCGTAATGACGGCCT
^ ^ ^  ^ ^    ^^
```

> Les différences sont représentées par `^`. Par exemple ici, la réponse est 7.

Créez une fonction qui prend en paramètres obligatoires deux `string` et retournez le nombre de différences entre les deux brins d'ADN.

Étapes :

1. Vérifier que les deux strings soient de la même taille
2. Couper chaque strings en deux tableaux distincts : ces tableaux auront 1 index par lettre
3. Trouver une fonction qui liste les différences entre deux tableaux
4. Retourner le nombre de différences entre les deux tableaux

<details>
  <summary>Spoiler warning</summary>

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

</details>

## Changer de l'ADN en ARN

Des scientifiques (toujours les même), ont besoin de changer de l'ADN en ARN de sorte à pouvoir créer un chat-lapin mutant.
Les quatre nucléotides de l'ADN sont : l'adénine (A), la cytosine (C), la guanine (G) et la thymine (T).

The quatre nucléotides de l'ARN dont : l'adénine (A), la cytosine (C), la guanine (G) et l'uracil (U).

On convertit un brin d'ADN en ARN en remplaçant chaque nucléotide par
son complément :

```
G -> C
C -> G
T -> A
A -> U
```

En utilisant la fonction `strtr()`, créez une fonction qui transpose de l'ADN en ARN.

<details>
  <summary>Spoiler warning</summary>

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

</details>

## Gérer le nom du robot

Les scientifiques ont réussi, ou presque, leur mutation de chat-lapin. En réalité, ils ont créé un robot simulant leur expérience. Ils ont besoin d'une fonction qui permette de gérer l'identifiant du robot (qui peut ressembler à RXW-4382 ou WSR-3455 par exemple), qui doit changer à chaque reboot de sa carte mère.

Créez une fonction qui génère un nom aléatoire pour le robot.
Les conditions sont les suivantes :

1. Respecter le format `AAA-0000` (3 lettres, un tiret, 4 chiffres)
2. Les lettres doivent être au hasard parmi `R, Z, S, X, W, T`
3. Les chiffres doivent être au nombre 4

<details>
  <summary>Spoiler warning</summary>

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

</details>

## Endiguer la guerre des clones

Les scientifiques ont oublié quelque chose dans leur précédente demande ! Les identifiants n'étant pas uniques, des clones de chat-lapin-robots ont apparu et menacent de faire sauter le laboratoire.

Gérez l'unicité des noms dans la fonction précédente.

- Créez un array en dehors de la fonction précécente qui contiendra les noms générés
- Appelez cet array dans la fonction afin de comparer le nom généré au tableau contenant les noms générés. Pour appeler une variable venue de l'extérieur au sein d'une fonction, on utilise le mot clé `global` :

```php
$a = 0;

function maFonction() {
    global $a;  // On importe $a qui vaut 0
    $a += 1;    // On ajoute 1
    return $a;
}
var_dump($a);   // a = 0
maFonction();   // Ajout de 1 à la globale a
var_dump($a);   // a = 1
```

<details>
  <summary>Spoiler warning</summary>

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

#### Solution 2 (passage de variable par référence)

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

</details>
