### Exo 16

- Créer une fonction from scratch qui s'appelle quelleAnnee(). Elle devra retourner un integer representant l'année actuelle.

```php
function quelleAnnee() {
    $date = new DateTime();
    return $date->format('Y');
}
```

- Créer une fonction from scratch qui s'appelle quelleDate(). Elle devra retourner une string representant la date actuelle sous le format suivant DD/MM/YYYY

```php
function quelleDate() {
    $date = new DateTime();
    return $date->format('d/m/Y');
}
```

- A partir d’un âge, on doit indiquer l’année de naissance

```php
<?php
  $dateNaissance = "15-06-1995";
  $aujourdhui = date("Y-m-d");
  $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
  echo 'Votre age est '.$diff->format('%y');
?>
```

- Ecrire un script qui affiche la date et l'heure courantes sous les formes suivantes :

        Mon, 25 Jan 2016 23:31:01 +0100
        Monday/January/2016
        25/Jan/2016
        25-01-16
        23h: 31m: 01s

```php
//avec la méthode format de l'objet DateTime.
 $now = new DateTime();
 echo $now->format('r');
 //avec la fonction date()
 echo date('r')."<br>";
 echo date('l/F/Y')."<br>";
 echo date('d/M/Y')."<br>";
 echo date('d-m-y')."<br>";
 echo date('H\h: i\m: s\s')."<br>";// (\) échappement des caractères spéciaux.
```

- Afficher la date courante en français sous les formes suivantes :

        lundi 25 janvier 2016, 23:37
        25 janvier 2016

```php
setlocale (LC_ALL, "fr"); 
// on définit les valeurs locales pour la france 
echo strftime('%A %d %B %Y, %H:%M')."<br>"; 
echo strftime('%d %B %Y')."<br>";
```

- Quel jour de la semaine était le 6 novembre 1975?

```php
echo date('l',mktime(0,0,0,11,6,1975))."<br>";
```

- Calculez votre âge à l’instant en cours

```php
$datenaiss = mktime(0,0,0,8,14,1988);//renvoie le timestamp de la date 14/8/1988
$now=time(); //renvoie le timestamp actuel 
$age=$now - $datenaiss;
echo "mon age est de $age secondes.<br>";
echo "mon age est ",floor($age/3600/24/365)," ans";
```

- Vérifiez si la date du 29 février 2010 est valide.

```php
if(checkdate(2,29,2010)) {
    echo "Date valide";
}
else{
    echo "Date invalide";
}

```

- Rédigez le script qui teste si le 1 Mai 2016 est un vendredi ou un lundi , si oui il affiche « Week-end prolongé !».

```php
$fete_travail = mktime(0,0,0,5,1,2015);
if(date("w",$fete_travail)==5 OR date("w",$fete_travail)==1)
    echo "week-end prolongé";
else 
    echo "pas de week-end prolongé!";
```

## Ajouter des secondes à une date donnée

> Des scientifiques délirants cherchent à découvrir la date qu'il sera dans 9 gigasecondes (1 000 000 000 secondes ou 10^9 secondes). Aidez-les avec une fonction !

Créez une fonction qui prend en paramètre une date au format "YYYY-MM-DD" et qui ajoute 9 gigasecondes à cette date.

Étapes :

1. Déclarez une fonction qui prend une string au format `YYYY-MM-DD`
2. Dans la fonction, créez un objet DateTime à partir de la date en argument de la fonction : `$object = new DateTime($date)`
3. Cet objet DateTime est une date "évoluée" avec plein de méthodes pour travailler sur les dates !
4. Récupérez le timestamp de l'objet (trouvez comment récupérer le timestamp d'un objet DateTime)
5. Ajoutez à ce timestamp 9 gigasecondes (1 000 000 000 secondes)
6. Changez le timestamp de votre objet DateTime en lui donnant la nouvelle valeur avec : $object->setTimestamp($nouvelleValeur)`
7. Retournez l'objet au format `YYYY-MM-DD` (trouvez comment retourner la date d'un DateTime dans un format précis)

```php
function addNineGigaseconds(string $date) {
    
    // On créée un objet DateTime qui nous permet de manipuler
    // des dates facilement
    $dateObject = new DateTime($date);

    // On prépare notre variable gigasecond
    // $gigasecond = pow(10,9);
    // $gigasecond = 10e9;
    $gigasecond = 1000000000;

    // On récupère le timestamp de la date donnée (en secondes)
    $givenDateTimestamp = $dateObject->getTimestamp();

    // On ajoute la gigaseconde à la date donnée
    $newDateTimestamp = $givenDateTimestamp + $gigasecond;

    // On modifie l'objet DateTime avec le nouveau timestamp
    $dateObject->setTimestamp($newDateTimestamp);

    // On prépare la nouvelle date au format Y-m-d
    $format = $dateObject->format('Y-m-d');

    // On retourne la nouvelle date
    return $format;
}
```

#### Solution 2 : version procédurale (sans POO)

```php
function dateAddSeconds(string $date) {
    // avec strtotime(), on récupère le timestamp d'une date donnée en string
    // intval pour n'avoir que des nombres
    $date = intval(strtotime($date));
    
    // On retourne la date avec la fonction date() et son deuxième paramètre qui permet de préciser un timestamp
    return date("Y-m-d", $date += pow(10, 9));
}
```
