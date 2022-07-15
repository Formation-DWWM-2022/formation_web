## TP [COMBAT DE HEROS]

1. Faites une fonction qui prend en paramètres 6 arguments, les 3 premiers seront les clés d'un tableau et les 3 suivantes leur valeur respective
La fonction devra renvoyer le tableau créé et initialisé.
Tester votre fonction avec :

- name : Warrior
- hp : 540
- damages : 25
- name : Mage
- hp : 430
- damages : 31

```php
function createHero($name, $hp, $damage) {
    return [
        'name' => $name,
        'hp' => $hp,
        'damage' => $damage,
    ];
}

$warrior = createHero('Warrior', 540, 25);
$mage = createHero('Mage', 430, 31);
```

2. Faites une fonction qui prend en paramètre un tableau de "Héros", cette fonction doit afficher un héros sous la forme :

- Nom : xxxx
- Point de vie : xxxx
- Dégâts : xxxx

Testez votre fonction

```php
function displayHero($hero) {
    echo 'Nom : ' . $hero['name'] . '<br>';
    echo 'Point de vie : ' . $hero['hp'] . '<br>';
    echo 'Dégâts : ' . $hero['damage'] . '<br>';
}
```

3. Faites une fonction qui prend en pramètre deux tableaux de héros
La fonction doit faire "combattre" chaque héros, un héros inflige des blessures à l'autre, à partir de ses dégâts (damages), aux points de vie (hp).
C'est à dire que l'on va soustraire aux point de vie d'un héro, les dégâts de l'autre.
Appelez cette fonction dans une boucle, tant qu'un héro est en vie, on fait combattre les héros chacun leur tour.

```php
// Le & correspond à un passage par référence, c'est à dire que l'on
// Veut modifier la variable à l'intérieur de la fonction
function dealDamages($heroAtk, &$heroDef) {
    $heroDef['hp'] -= getDamages($heroAtk['damage']);
    if ($heroDef['hp'] <= 0) {
        echo $heroAtk['name'] . ' a gagné !';
        return false;
    }
    displayHero($heroDef);
    return true;
}

/**
 * represent the fact that a hero can do critical damage
 * @param int $damages initial damages of the hero
 * @return int damage final of the hero
 */
function getDamages(int $damages): int {
    // rand permet d'avoir un chiffre aléatoire :
    // - Soit compris entre les 2 valeurs
    // - Ou sans valeur
    // Autre manière de procéder : on laisse le rand définir son chiffre
    // Si ce dernier est un multiple de 15 (modulo 15 = 0)
    // Alors c'est un crit !
//    if (rand()%15 === 0) {
//    }
    if (rand(0, 100) <= 15) {
        echo 'Coup critique !!! <br>';
        $damages = $damages * 1.5;
    }
    return $damages;
}

$turn = 0;
while ($warrior['hp'] > 0 && $mage['hp'] > 0) {
    $turn++;
    $keepFighting = dealDamages($warrior, $mage);
    if (!$keepFighting) {
        break;
    }
    dealDamages($mage, $warrior);
}
echo 'Il y a eu : ' . $turn . ' tours';
```
