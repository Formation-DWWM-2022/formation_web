<?php

// Classes [01-IntroductionPOO.md - 02-Propriete&Methode.md - 07-ConstantesClasse.md]
// Les classes vous permettent de définir vos propres types de données. Toutes les classes 
// commencent par le mot-clé de la classe suivi du nom de la classe et de l’ouverture et de la 
// fermeture des accolades.

class Car
{
}

// Pour créer une instance d’une classe, vous utilisez le nouveau mot-clé devant le nom de classe avec 
// des parenthèses.

$car = new Car();

// Une classe peut définir des attributs et des méthodes. Un attribut est une donnée stockée sur 
// l’instance de classe. Vous pouvez définir un attribut en ajoutant le mot public et un nom de 
// variable dans la définition de classe.

class Bicycle
{
    public $color;
}

// Ensuite, lorsque vous créez une instance de la classe, vous pouvez définir et utiliser 
// l’attribut sur l’instance en utilisant ->.

$bike = new Bicycle();
$bike->color = 'Blue';
echo $bike->color . "\n";

// Une instance d’une classe est appelée un objet. Félicitations! Vous effectuez maintenant un 
// développement orienté objet.

$redBike = new Bicycle();
$redBike->color = 'Red';
echo $redBike->color . " Bike Object\n";

// Une méthode est une fonction rattachée à la classe. Vous pouvez ajouter une méthode à une 
// classe en utilisant le mot-clé public suivi de la fonction. Une méthode peut accéder aux attributs et 
// méthodes d’une instance d’objet en utilisant la variable $this.

class Tricycle
{
    public $color;

    public function echoColor()
    {
        echo $this->color . "\n";
    }
}

// Vous pouvez exécuter une méthode sur un objet en utilisant les mêmes -> caractères fléchés 
// avec des parenthèses après le nom de la méthode.

$bike = new Tricycle();
$bike->color = 'Red';
$bike->echoColor();

// EXEMPLE :

class Personne
{
    // Attributs
    public $nom;
    public $prenom;
    public $dateDeNaissance;
    public $taille;
    public $sexe;

    // Constantes
    const NOMBRE_DE_BRAS = 2;
    const NOMBRE_DE_JAMBES = 2;
    const NOMBRE_DE_YEUX = 2;
    const NOMBRE_DE_PIEDS = 2;
    const NOMBRE_DE_MAINS = 2;

    public function boire()
    {
        echo 'La personne boit<br/>';
    }

    public function manger()
    {
        echo 'La personne mange<br/>';
    }
}

$personne = new Personne();

$personne->nom = 'Hamon';
$personne->prenom = 'Hugo';
$personne->dateDeNaissance = '02-07-1987';
$personne->taille = '180';
$personne->sexe = 'M';

echo 'Personne :<br/><br/>';
echo 'Nom : ', $personne->nom, '<br/>';
echo 'Prénom : ', $personne->prenom;
echo 'Chaque personne a ', Personne::NOMBRE_DE_YEUX, ' yeux.';
$personne->boire();

// Catégories : Héritage [05-Etendre&Heritage.md - 06-Surcharge.md]
// Étendre vos objets

// En PHP, une classe peut étendre une autre classe, héritant des propriétés et des méthodes de la 
// classe mère. Pour faire d’une classe un enfant d’une autre, utilisez le mot-clé extends après le 
// nom de classe.

class Vehicle
{
    public function drive()
    {
        echo "driving...\n";
    }
}

class Truck extends Vehicle
{
}

// L’utilisation de la méthode de conduite sur la classe Camion ne cause pas d’erreur car le 
// Camion étend le Véhicule.

$truck = new Truck();
$truck->drive();

// Même si la classe enfant hérite des propriétés et des méthodes d’une classe mère, l’enfant 
// peut toujours outrepasser le parent.

class Tractor extends Vehicle
{
    public function drive()
    {
        echo "driving slowly...\n";
    }
}

// La fonction d’entraînement produit maintenant « conduire lentement… » au lieu de « conduire… ».

$tractor = new Tractor();
$tractor->drive();

// Une classe peut utiliser la propriété ou la méthode d’un parent à partir de la variable $this.

class Motorcycle extends Vehicle
{
    public function pushPedal()
    {
        $this->drive();
    }
}

// La méthode pushPedal produit « driving… ».

$cycle = new Motorcycle();
$cycle->pushPedal();

// Si vous remplacez la propriété ou la méthode d’un parent, la variable $this fera référence 
// à l’implémentation de la propriété ou de la méthode par l’enfant. Pour appeler la propriété 
// du parent ou la méthode explicité, utilisez le mot-clé parent.

class Racecar extends Vehicle
{
    public function drive()
    {
        parent::drive();

        echo "driving even faster...\n";
    }
}

// La méthode de conduite de la voiture de course produit maintenant « conduite » et 
// « conduite encore plus rapide… ».

$racecar = new Racecar();
$racecar->drive();

// Classes : Visibilité [04-Encapsulation&Visibilite.md]
// Privatiser vos objets

// Dans le dernier chapitre, nous avons défini des propriétés et des méthodes sur la classe en 
// utilisant le mot-clé public. Vous pouvez également les définir à l’aide des mots-clés protégés 
// et privés. Les deux mots-clés empêchent les propriétés et les fonctions étant accessibles en 
// dehors de l’objet. Seul l’objet lui-même peut utiliser chaque.

class Phone
{
    private $number;

    public function setNumber($number)
    {
        $this->number = $number;
    }
}

// Nous ne pouvons pas définir le nombre en utilisant $phone->number = '123-456-7890'. Au lieu de 
// cela, nous pouvons utiliser la méthode publique.

$phone = new Phone();
$phone->setNumber('123-456-7890');

// Rendre un attribut ou une fonction privé, vous donne plus de contrôle sur les données de l’objet. 
// Par exemple, on pourrait empêcher qu’un nombre soit fixé s’il commence par un 7.

class Phone2
{
    private $number;

    public function setNumber($number)
    {
        if (substr($number, 0, 1) !== '7') {
            $this->number = $number;
        }
    }
}

// Les mots-clés protégés et privés fonctionnent un peu différemment. Ils empêchent les fonctions 
// et les propriétés d’être accessibles en dehors d’un objet. Cependant, une méthode ou une propriété 
// marquée protégée peut toujours être accessible par une classe enfant.

class Phone3
{
    private $number;

    protected $caller;

    public function setNumber($number)
    {
        $this->number = $number;
    }
}

// En classe Smartphone, la propriété caller est accessible parce que la classe parent l’a 
// marquée comme protégée. Cependant, Smartphone ne peut pas accéder à la propriété numéro 
// parce qu’il est toujours répertorié comme privé.

class Smartphone extends Phone3
{
    public function setCaller($caller)
    {
        $this->caller = $caller;
    }
}

// EXEMPLE :
class Vehicule
{
    // Attributs
    public $marque;
    private $_volumeCarburant = 40;
    protected $_estRepare = false;

    // Démarre la voiture si le réservoir
    // n'est pas vide
    public function demarrer()
    {
        if ($this->_controlerVolumeCarburant()) {
            echo 'Le véhicule démarre';
            return true;
        }

        echo 'Le réservoir est vide...';
        return false;
    }

    // Vérifie s'il y'a du carburant dans le réservoir
    private function _controlerVolumeCarburant()
    {
        return ($this->_volumeCarburant > 0); // renvoi true ou false
    }

    // Met le véhicule en maintenance
    protected function reparer()
    {
        $this->_estRepare = true;
        echo 'Le véhicule est en réparation';
    }
}

class Voiture extends Vehicule
{
    // Attributs
    private $_volumeCarburant;

    // Démarre la voiture si le réservoir
    // n'est pas vide
    public function demarrer()
    {
        if ($this->_controlerVolumeCarburant()) {
            echo 'Le véhicule démarre';
            return true;
        }

        echo 'Le réservoir est vide...';
        return false;
    }

    // Vérifie qu'il y'a du carburant dans le réservoir
    private function _controlerVolumeCarburant()
    {
        return ($this->_volumeCarburant > 0);
    }

    public function setVolumeCarburant($dVolume)
    {
        $this->_volumeCarburant = $dVolume;
    }

    public function getVolumeCarburant()
    {
        return $this->_volumeCarburant;
    }
}

$monVehicule = new Vehicule();
$monVehicule->marque = 'Peugeot';
echo $monVehicule->marque;
$monVehicule->demarrer();

$monVehicule = new Voiture('Peugeot');
$monVehicule->demarrer();
$monVehicule->reparer();
$monVehicule->setVolumeCarburant(50);
echo sprintf("Il me reste %u L d'essence", $monVehicule->getVolumeCarburant());

// Classes : Constructeur [03-Constructeur&Destructeur.md]
// Construire vos objets

// Chaque fois que vous créez un objet en PHP, vous mettez des parenthèses après le nom de classe. 
// Dans les exemples précédents, nous avons toujours laissé les parenthèses vides.

class Hat
{
    public $color;

    public function setColor($color)
    {
        $this->color = $color;
    }
}

$hat = new Hat();

// Cependant, vous pouvez en fait passer des données entre parenthèses comme une fonction. 
// Les données seront passées à une fonction spéciale sur la classe appelée un constructeur.

class Ballcap
{
    public $color;

    public function __construct($color)
    {
        $this->color = $color;
    }
}

// Un constructeur n’est pas nécessaire, mais peut faciliter la création d’un nouvel objet. 
// Ils sont généralement utilisés pour définir la valeur initiale d’une propriété. Au lieu d’écrire :

$hat = new Hat();
$hat->setColor('Red');

// Vous pouvez écrire :

$ballcap = new Ballcap('Blue');

// Les constructeurs ne renvoient pas de valeurs parce que la valeur de retour est toujours un 
// nouvel objet.

class Tophat
{
    public function __construct($color)
    {
        return $color;
    }
}

// $tophat contient maintenant une instance de Tophat, pas la chaine « Grey ».

$tophat = new Tophat('Grey');

// Statique
// Propriétés et méthodes de classe

// Lors de l’écriture d’une classe, toutes les propriétés et méthodes sont définies pour l’objet 
// qui sera créé à partir de la classe.

class House
{
    public $color;

    public function __construct($color)
    {
        $this->color = $color;
    }
}

// Comme la construction d’une maison, une classe est un plan qui définit ce que 
// la maison peut faire et l’objet est la maison elle-même qui peut réellement effectuer 
// les actions définies dans le plan.

$house = new House('Green');

// Cependant, que faire si vous voulez que le modèle ait des propriétés et des méthodes? 
// C’est quand vous utilisez le mot-clé statique. Dans cette classe, nous allons définir 
// une couleur par défaut sur la classe elle-même et l’utiliser lors de la création d’un nouvel objet.

class Skyscraper
{
    private static $popularColor;
    public $color;

    public static function setDefaultColor($color)
    {
        self::$popularColor = $color;
    }

    public function __construct()
    {
        $this->color = self::$popularColor;
    }
}

// Vous pouvez accéder aux méthodes et propriétés statiques en utilisant des doubles-points sur 
// vous-même à l’intérieur de l’objet ou sur le nom de classe à l’extérieur de l’objet. Les méthodes 
// et propriétés statiques ne peuvent accéder qu’à d’autres méthodes et propriétés statiques.

Skyscraper::setDefaultColor('Grey');
$skyscraper = new Skyscraper();
echo $skyscraper->color . "\n";


// Souvent, vous verrez des constructeurs statiques dans PHP. Un constructeur statique crée une 
// nouvelle instance d’un objet. Pourquoi faire cela alors que vous pouvez simplement utiliser 
// « nouvelle classe » pour créer l’objet ? Une raison commune est de rendre le code plus lisible.

class TinyHouse
{
    private $color;
    private $wheels;
    private $trailer;

    public static function build($color, $wheels, $trailer)
    {
        return new self($color, $wheels, $trailer);
    }

    public function __construct($color, $wheels, $trailer)
    {
        $this->color = $color;
        $this->wheels = $wheels;
        $this->trailer = $trailer;
    }
}

// L’utilisation de build peut être plus sensée que nouvelle, mais c’est en fin de compte une 
// préférence personnelle.

$house = TinyHouse::build('Blue', 4, true);

// Interfaces
// Rédaction de contrats à code

// Le mot interface est un terme confus parce qu’il est utilisé pour tant de concepts 
// différents. Le plus souvent, nous l’utilisons pour décrire l’apparence d’une application 
// et comment un utilisateur interagit avec elle. Cependant, en PHP, une interface est 
// une construction spéciale qui agit comme un contrat pour les classes. Une interface 
// définit les méthodes qu’une classe devrait avoir.

interface Chair
{
    public function setColor($color);
    public function setLegs($number);
}

// Pour utiliser une interface avec une classe, vous utilisez le mot-clé implémentations après 
// le nom de la classe. Maintenant, la classe Recliner doit avoir une méthode setColor et une 
// méthode setLegs. Si vous ne créez pas les méthodes requises sur la classe, PHP lancera une erreur.

class Recliner implements Chair
{
    private $color;
    private $legs;

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setLegs($number)
    {
        $this->legs = $number;
    }
}


// Les interfaces sont utiles lorsque vous utilisez du code créé par quelqu’un d’autre. 
// Par exemple, un autre développeur peut avoir créé un code qui gère les paiements en ligne, 
// mais il veut vous donner la possibilité de créer votre propre classe de paiement qui fonctionne 
// avec leur code. Dans ce cas, le développeur crée une interface avec toutes les méthodes 
// nécessaires pour facturer un paiement. L’interface devient un contrat entre votre code et 
// le code de l’autre développeur pour fonctionner d’une certaine façon.

interface Payment
{
    public function charge($amount);
}

class CreditCard implements Payment
{
    public function charge($amount)
    {
        // contacts a credit card payment provider...
    }
}

// Puisque CreditCard implémente Paiement, un développeur peut vérifier qu’il implémente 
// Paiement puis utiliser la méthode de charge sachant que la fonction existe sur la classe.

$creditCard = new CreditCard();
if ($creditCard instanceof Payment) {
    $creditCard->charge(25);
}

// Cours abstraits
// Hériter d’une interface

// Les classes abstraites sont similaires aux interfaces en ce sens qu’elles définissent des 
// méthodes qu’une sous-classe doit implémenter. Cependant, une classe abstraite peut aussi avoir 
// des méthodes normales. Pour créer une classe abstraite, utilisez le mot-clé abstrait suivi de 
// la classe et du nom de la classe.

abstract class CellPhone
{
    abstract public function unlock();

    public function turnOn()
    {
        echo "Holding power button...\n";
    }
}

// Pour utiliser une classe abstraite, vous créez une autre classe qui l’étend et 
// créez toutes les méthodes qui ont été marquées comme abstraites. Une classe ne 
// peut étendre qu’une classe abstraite et la classe enfant doit mettre en œuvre 
// toutes les méthodes abstraites.

class iPhone extends CellPhone
{
    public function unlock()
    {
        echo "Touching fingerprint reader...\n";
    }
}


// Dans cet exemple, nous utilisons une classe abstraite pour créer le comportement pour allumer un 
// téléphone portable et ensuite forcer les classes enfants à implémenter comment déverrouiller le 
// téléphone. Nous avons clairement défini ce que fait un téléphone portable et nous avons limité 
// la duplication de code.

class Android extends CellPhone
{
    public function unlock()
    {
        echo "Typing passcode...\n";
    }
}

// Nos classes iPhone et Android peuvent maintenant à la fois utiliser la méthode turnOn et la 
// méthode de déverrouillage.

$iPhone = new iPhone();
$iPhone->turnOn();
$iPhone->unlock();

$android = new Android();
$android->turnOn();
$android->unlock();

// Vous ne pouvez pas créer une instance d’une classe abstraite. PHP ne saurait pas comment 
// utiliser les méthodes abstraites donc quand vous essayez de créer une instance abstraite, 
// vous obtiendrez une erreur.

$cellPhone = new CellPhone(); // causes an error

// Exceptions
// Erreurs de lancer

// Parfois, les choses tournent mal quand quelqu’un utilise votre code. Comment faisons-nous 
// face à cette situation? PHP a des exceptions pour définir les erreurs et la possibilité de les 
// lancer pour arrêter l’exécution du code et dire à l’utilisateur de votre code que quelque chose 
// ne va pas.

class Processor
{
    public function charge($creditCard)
    {
        if (strlen($creditCard->getNumber()) !== 16) {
            throw new Exception('Credit card is not right');
        }
    }
}

// Dans ce cas, si quelqu’un a essayé d’utiliser la classe Processeur pour facturer un numéro de 
// carte de crédit qui n’est pas long de 16 caractères, une exception sera lancée qui empêche le 
// reste du code de fonctionner.

$processor = new Processor();
$processor->charge('1234');

// Un développeur qui veut empêcher une exception d’arrêter l’exécution de code peut attraper 
// l’exception et l’utiliser pour enregistrer ou afficher l’erreur à un utilisateur.

// Il suffit d’envelopper le code qui pourrait jeter une exception avec le mot-clé try et les accolades 
// suivi par catch, le type d’exception entre parenthèses et plus d’accolades.

try {
    $processor->charge('1234');
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

// Vous pouvez aussi faire vos propres exceptions personnalisées. Ce sont juste des classes qui 
// étendent la classe Exception.

class MyCustomException extends Exception
{
}

// Ensuite, vous pouvez essayer d’attraper votre exception au lieu de l’exception de base.

try {
    throw new MyCustomException('I am a custom exception');
} catch (MyCustomException $e) {
    echo "Caught MyCustomException\n";
}

// Puisque toutes les exceptions héritent de l’exception, attraper l’exception attrapera toutes 
// les exceptions qui pourraient être jetées.

try {
    throw new MyCustomException('I inherit from Exception');
} catch (Exception $e) {
    echo "Still caught MyCustomException\n";
}

// Vous pouvez également créer plusieurs blocs de capture pour gérer différents types 
// d’exceptions dans un essai-capture.

try {
    throw new MyCustomException('I am being thrown again');
} catch (MyCustomException $e) {
    echo "MyCustomException was caught\n";
} catch (Exception $e) {
    echo "Just in case a different exception is thrown\n";
}

// EXEMPLE :

class CustomException extends Exception {
    protected $details;
  
    public function __construct($details) {
        $this->details = $details;
        parent::__construct();
    }
  
    public function __toString() {
      return 'I am an exception. Here are the deets: ' . $this->details;
    }
  }

throw new CustomException('Exception message');