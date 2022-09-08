
## Exo RPG

### Créer une classe "Race"

- name : string


### Créer la classe "Hero"

- name : string
- race : Race
- level : int
- hp : int
- hpMax : int 
- mana : int
- manaMax : int
- strength : int
- agility : int
- intelligence : int
- defense : float
- scoreCriticalStrike : int
- criticalDamage : float
- damageMin : int
- damageMax : int


* Par défaut :
    * tous les héros créés sont de niveau 1
    * scoreCriticalStrike : 12%
    * criticalDamage : 150%

## Héritage

* Notes importante :
  * 1 strength = 19 hp
  * 1 intelligence = 17 mana
  * defense = agility / 6
  * Les dégâts d'un héro sont basés depuis sa caractéristique principale
    * damageMin = carac * 1.2
    * damageMiax = carac * 1.4
  * Le scoreCriticalStrike varie en fonction de la caractéristique principale : carac * 0.08

### Héro : Mage

* Un Mage est un Hero
* On doit pouvoir renseigner le nom du Mage à sa création
* Un Mage commence toujours avec ces caractéristiques :
  * 15 strength
  * 8 agility
  * 27 intelligence
* Un Mage est un héro Intelligence (caractéristique principale)

### Héro : Warrior

* Un Warrior est un Hero
* On doit pouvoir renseigner le nom du Warrior à sa création
* Un Warrior commence toujours avec ces caractéristiques :
  * 24 strength
  * 12 agility
  * 14 intelligence
* Un Warrior est un héro Strength (caractéristique principale)

### Héro : Rogue

* Un Rogue est un Hero
* On doit pouvoir renseigner le nom du Rogue à sa création
* Un Rogue commence toujours avec ces caractéristiques :
  * 13 strength
  * 26 agility
  * 11 intelligence
* Un Rogue est un héro Agility (caractéristique principale)


/!\ PETITE SUBTILITE : Un rogue a sa caractéristique criticalDamage de 175% au lieu de 150%


### Pour poursuivre

* Ajouter une fonction levelUp, elle permet de faire une montée de niveau, on augmente le niveau de 1

#### Cependant...

* Un Mage qui levelUp gagne :
  * +1 Strength
  * +1 Agility
  * +6 Intelligence


* Un Warrior qui levelUp gagne :
  * +5 Strength
  * +1 Agility
  * +2 Intelligence


* Un Rogue qui levelUp gagne :
  * +2 Strength
  * +5 Agility
  * +1 Intelligence
  

/!\ Pensez que vos caractéristiques vont changer... Les dégâts aussi !


### Suite du TP...

#### Pour la partie design (facultatif...)

* Ajouter un attribut color à notre classe Hero
  * Un Mage a la couleur bleu ciel
  * Un rogue a la couleur jaune
  * Un Warrior a la couleur marron
* Gérer ce cas de figure... Vous vous servirez de la couleur pour soit une bordure soit une couleur de fond pour les cards héros.


#### Pour la suite du TP - fonction setLevel

* L'idée est de faire une fonction setLevel, qui prenne en paramètre un entier, qui représentera le niveau à donner à notre héro
* Il faut gérer la modification des caractéristiques en fonction de son niveau


#### Pour la suite du TP


Créer des Ogres et des Dragons

* Ogres :
   * @param int $hpCoef => 112
   * @param int $manaCoef => 71
   * @param float $defenseCoef => 0.5
   * @param int $damageMinCoef => 6.4
   * @param int $damageMaxCoef => 6.8
   * @param float $scoreCriticalStrikeCoef => 0.28
   * @param float $criticalDamageCoef => 1.5

* Dragons :
  * @param int $hpCoef => 130
  * @param int $manaCoef => 81
  * @param float $defenseCoef => 0.7
  * @param int $damageMinCoef => 8.3
  * @param int $damageMaxCoef => 8.6
  * @param float $scoreCriticalStrikeCoef => 0.33
  * @param float $criticalDamageCoef => 1.65


#### Pour la suite du TP

* Faire une fonction qui fait qu'une RpgEntity attaque une autre RpgEntity
  * Un RpgEntity a une attaque qui varie entre ses damageMin et damageMax
  * Toutefois... Un RpgEntity peut effectuer des coups critiques ! C'est à dire que chaque RpgEntity a une chance d'effectuer un coup critique égale à **scoreCriticalStrike**) et ses dégâts seront multiplié par **criticalDamage**   
  * Un RpgEntity réduit les dégâts qu'il subit grâce a sa défense, qui n'est autre qu'un pourcentage (c'est à dire, qu'un mage level 2, a 1.5 de défense, il réduit les dégâts subit de 1.5%)
  * Une fois les dégâts réduit par la défense, le RpgEntity qui se fait attaquer peut perdre ses points de vie
  * (Penser à faire un echo pour indiquer les dégâts infligés (suivi de CC si c'est un coup critique))
  

### Ajout des Ability

* Il va falloir créer une classe Ability
  * damage : int (pas de gestion de min/max)
  * name : string
  * coût de mana : int
  
* Une RpgEntity peut avoir une Ability (ou ne pas en avoir)

* Il faudra prévoir de faire une fonction : useAbility(RpgEntity)
  (=> même fonctionnement que l'attaque).
  Sauf :
  * Une RpgEntity peut utiliser son Ability tous les 3 tours
  * Lorsqu'il le fait, il doit dépenser son mana (on retire le coût en mana de l'ability depuis le mana de la RpgEntity)
    
    Si le héro n'a pas le mana nécessaire, il ne peut pas utiliser son Ability
    
    (Dans le cas d'un Mage, il lancera une tongue : un simple echo suffira...)
    
  * Une Ability ne critique pas
  * Une Ability ne peut pas être réduite par la défense
  * Lorsqu'une RpgEntity utilise son Ability, on réduit directement les points de vie de la cible (si la RpgEntity a le mana nécessaire, bien sûr...)

#### Ability à créer par Héro :

(Ils auront toujours cette même capacité)

* Mage : 
  * name : Boule de feu
  * coût : 110 mana
  * damage : caractéristique principale x 2 (Rappel : c'est l'intelligence)

* Warrior :
  * name : Heurtoir
  * coût : 150 mana
  * damage : caractéristique principale x 1.8 (Rappel : c'est la force)

* Rogue :
  * name : Embuscade
  * coût : 160 mana
  * damage : caractéristique principale x 1.9 (Rappel : c'est l'agilité)

(Il faudra peut-être les créer à un endroit précis...)
