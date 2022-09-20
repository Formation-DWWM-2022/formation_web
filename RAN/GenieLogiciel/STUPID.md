# Identifiez les mauvaises pratiques de conception avec STUPID

Tout comme les principes SOLID sont un ensemble de bonnes pratiques, les pratiques STUPID représentent des indices d'un code dont la qualité est insuffisante. Dans ce chapitre, nous allons détailler chacune de ces mauvaises pratiques (en anglais, on dit "code smell"), de sorte que vous soyez capable de les identifier et d’être vigilant.

Après tout, le premier pas vers la qualité, c’est d’introduire le moins d’erreurs possible dans vos applications, n’est-ce pas ?

# S comme Singleton

En programmation orientée objet, un Singleton est une classe dont on limite le potentiel d’instanciation. En effet, un Singleton n’est instanciable qu’une seule fois.

Pour cela, il y a plusieurs choses à faire :
- on doit interdire l’instanciation de la classe ;
- on doit créer une méthode publique et statique qui va créer l’objet une seule fois, puis le réutiliser à chaque appel.

```php
class Database
{
    private static $instance;

    private function __construct() {}

    private function __clone() {}

    public static getInstance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new Database();  
        }
        return self::$_instance;
    }
}
```

    Parce que le constructeur est en privé, on ne peut appeler le constructeur new qu’à l’intérieur de la classe Database. On privatise aussi la fonction magique    __clone()  pour empêcher que l’objet soit dupliqué.

Le Singleton pose trois problèmes. Tout d’abord, bien que ce soit son objectif (et nous reviendrons en détail sur le Singleton dans un futur chapitre), n’avoir qu’une seule instance de classe possible est contre-productif. Après tout, une classe est un plan de construction d’un objet, quel est donc l’intérêt de limiter la production de ses objets ?

Le deuxième problème que pose le Singleton, c’est que le constructeur de classe étant privé, on ne peut pas injecter de dépendances. La classe Database de notre projet utilise des variables globales à tout le projet, ce qui n’est pas très SOLID.

Nous pourrions passer ces arguments à la méthode getInstance() , mais il faudrait alors les passer à tous les appels de cette fonction. Dans le doute, autant repasser par un constructeur public, n’est-ce pas ?

Le troisième problème que pose le Singleton (et nous l’avons vu précédemment), c’est qu’un Singleton introduit un couplage fort dans la classe où il est appelé. En effet, vu qu’il est utilisé à l’aide d’une fonction statique, il n’est généralement pas injecté en constructeur de la classe qui en a besoin. Et ça non plus, ce n’est pas très SOLID.

    Dans la plupart des applications, vous ne devriez pas utiliser de Singleton. Nous reviendrons sur les intérêts de ce design pattern dans la prochaine partie de ce cours.

# T comme Tight Coupling

En programmation orientée objet, le couplage fort définit une relation entre deux objets. Si l’utilisation d’un objet nécessite la création ou l’utilisation d’un autre objet, alors ils sont dits "fortement couplés".

Nous l’avons vu dans les pratiques SOLID, retirer le couplage "fort" est relativement facile : il suffit de faire dépendre les objets d’abstractions – comme les interfaces – plutôt que de classes concrètes.

    C’est là qu’un Singleton pose problème : puisqu’il n’est pas injecté en constructeur, l’exercice de réusinage ("refactoring") est difficile.

Je vous avais alors proposé de le passer malgré tout en constructeur, ce qui défait complètement l’intérêt du Singleton, mais permet de proposer une abstraction.

De manière générale, un couplage fort va limiter l’extensibilité de vos applications et la réutilisation de vos classes. Si deux classes sont fortement liées, elles vont devoir évoluer en même temps (ce qui est une violation du premier principe SOLID, rappelez-vous).

    Quand vous identifiez l’utilisation d’un Singleton ou d’une classe concrète dans les fonctions de vos objets, prenez le réflexe d’introduire une abstraction.

```php
// PAS TERRIBLE...
class Repository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    
    public function read($id)
    {
        $this->database::someFunction($id);
    }
}

$repository = new Repository(Database::getInstance());

// BIEN MIEUX

use DatabaseInterface;

class Repository
{
    private $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }
    
    public function read($id)
    {
        $this->database::someFunction($id);
    }
}

$mysqlRepository = new Repository(MySQL::getInstance());
$postgresRepository = new Repository(PostgreSQL::getInstance());
$sqliteRepository = new Repository(SQLite::getInstance());
```

# U comme Untestability

Un autre indice d’un code de mauvaise qualité, c’est qu’il est très difficile à tester.

Si la création de tests unitaires est compliquée et que vos tests ont tendance à dépendre les uns des autres, c’est probablement que votre code a besoin d’être refactorisé.

    Il se peut d’ailleurs que ce problème "d’intestabilité" provienne des deux points abordés précédemment.

Prenez le temps de relire le code des classes à tester au regard des principes SOLID, cela devrait vous permettre d’identifier les points à améliorer pour rendre votre code plus facile à tester.

Ce cours n’a pas pour objet le test ou l’intérêt des tests. Cela dit, les tests unitaires permettent de confirmer que vos classes fonctionnent comme prévu. Ils permettent également de commencer à refactoriser ("réusiner", donc :D) votre projet sans prendre le risque d’introduire des bugs. Il faut les voir comme une tâche qui va améliorer votre productivité et votre capacité à faire évoluer vos applications. C’est donc un investissement et certainement pas une tâche supplémentaire, du même ordre que travailler avec un IDE (environnement de développement intégré) vous fait gagner du temps par rapport à l’utilisation d’un logiciel comme Notepad.

    Vous ne devriez jamais délivrer une application sans aucun test dans un contexte professionnel, car vous ne serez pas en capacité d’en garantir le fonctionnement.

# P comme Premature Optimization

Très souvent, améliorer la performance de son code revient à établir un compromis entre performance et lisibilité du code : plus le code est proche du langage machine, plus il est optimisé.

En revanche, plus il est proche du langage machine, moins il est compréhensible par les êtres humains.

La performance est un sujet important, mais il faut la relativiser : quand on voit que le prix d’un bon serveur à l’année coûte moins cher qu’une journée de consulting d’un développeur, il faut se garder de penser d’abord à l’optimisation.

Un exemple que j’utilise toujours pour illustrer ce concept en PHP concerne les fonctions liées aux manipulations des tableaux :

```php
// LISIBLE, moins performant...

use CountryRepository;

$repository = new CountryRepository();
$countries = [
    '1' => [...],
    '12' => [...],
];

foreach (array_keys($countries) as $countryId) {
    $country = $repository->findById($countryId);
    ...
}

// MOINS LISIBLE, mais un peu plus performant

use CountryRepository;

$repository = new CountryRepository();
$countries = [
    '1' => [...],
    '12' => [...],
];

foreach ($countries as $countryId => $country) {
    $countryObject = $repository->findById($countryId);
    // la variable $country est déclarée mais pas utilisée ...
    ...
}
```

L’exemple ici est très simple et l’on peut se demander où est le problème. Pourtant, imaginez un code de plus de 30 lignes, et votre IDE qui vous signale que la variable $country  a été déclarée, mais jamais utilisée. Vous allez nécessairement vous demander :

    Est-ce normal ? Est-ce un bug ?

La question se pose alors de savoir si cette énergie cognitive dépensée par chaque développeur ou développeuse vaut les quelques millisecondes gagnées : pour moi, la réponse est NON... mais...

Toutefois, si un code devient réellement peu performant, on peut opérer ce type d’optimisation, mais cela devra alors être documenté dans le code, de manière à limiter l’énergie cognitive gaspillée.

```php
use CountryRepository;

$repository = new CountryRepository();
$countries = [
    '1' => [...],
    '12' => [...],
];

// la méthode array_keys n'est pas assez performante
foreach ($countries as $countryId => $country) {
    unset($country);
    $countryObject = $repository->findById($countryId);
    ...
}
```

N’optimisez jamais un code par anticipation sans avoir établi une mesure ! En PHP, le meilleur outil s’appelle Blackfire.

# I comme Indescriptive Naming

Pour les mêmes raisons que précédemment, soyez rigoureux dans le nommage de vos variables, fonctions et classes !

Vous n’êtes pas convaincu que cela soit utile ? Voici un exemple :

```php
$dm = $db = 'Admin.Shop.Notifications';
$xlc = $dbc = new Clg();
$tr = [];
$mt = 0;

foreach ($m as $k => $v) {
    $d = array(
        'xlf' => (array_key_exists($dm, $xlc) &&
        array_key_exists($v, $xlc[$dm]) ?
            $xlc[$dm][$k] : null),
        'db' => (array_key_exists($db, $dbc) &&
        array_key_exists($k, $dbc[$db]) ?
            $dbc[$db][$k] : null),
    );

    if (empty($s) || $this->s($s, array_merge(array('default' => $k), $d))) {
        $tr[$dm][$k] = $d;
        if (
            empty($d['xlf']) &&
            empty($['db'])
        ) {
            ++$mt;
        }
    } else {
        unset($tr[$dm][$k]);
    }
}

return $tr;
```

Et le code actuel :

```php
foreach ($messages as $translationKey => $translationValue) {
    $data = array(
        'xlf' => (array_key_exists($domain, $xliffCatalog) &&
        array_key_exists($translationKey, $xliffCatalog[$domain]) ?
            $xliffCatalog[$domain][$translationKey] : null),
        'db' => (array_key_exists($domainDatabase, $databaseCatalogue) &&
        array_key_exists($translationKey, $databaseCatalogue[$domainDatabase]) ?
            $databaseCatalogue[$domainDatabase][$translationKey] : null),
    );

    // if search is empty or is in catalog default|xlf|database
    if (empty($search) || $this->dataContainsSearchWord($search, array_merge(array('default' => $translationKey), $data))) {
        $translations[$domain][$translationKey] = $data;
        if (
            empty($data['xlf']) &&
            empty($data['db'])
        ) {
            ++$missingTranslations;
        }
    } else {
        unset($translations[$domain][$translationKey]);
    }
}

// ...

return $translations;
```

Ne vous économisez jamais la réflexion sur le nommage ! Il est fort probable que si vous êtes en difficulté pour nommer quelque chose, c’est pour au moins une des deux raisons suivantes :
- vous n’avez pas bien compris ce que vous devez réaliser, lâchez votre éditeur de code 5 minutes pour aller demander des informations ;
- votre variable, fonction, objet a trop de responsabilités ! Redécoupez le fonctionnement en plusieurs variables.

Le nommage est un sujet particulièrement complexe, mais un très bon ingénieur français l’a abordé lors d’une conférence nationale, je vous recommande d’y jeter un œil. ;)

# D comme Duplication

Les duplications de code dans votre projet sont rarement une bonne chose, car il est probable que corriger un bug d’un côté implique de le corriger de l’autre. Et cela n’est pas très SOLID, rappelez-vous.

Pour pallier cela, rappelez-vous de deux règles (même si ce cours va vous donner envie de contourner la seconde !) :
- DRY ! ("Don't Repeat Yourself") : ne vous répétez pas. Si un bloc fonctionnel se retrouve dupliqué à plusieurs endroits de votre application, isolez-le dans une classe et réutilisez la classe partout. Certains IDE vous permettent de le faire automatiquement, comme PHPStorm, à l’aide de la commande "Extract Method [EN]" ;
- KISS ("Keep it Simple and Stupid") : ne complexifiez votre code que si cela devient nécessaire, vous devez "refactoriser" votre code régulièrement et ne pas anticiper trop d’abstractions. Plus un code est abstrait, plus il est difficile pour une personne d’en comprendre le fonctionnement.

Par exemple, attendez d’avoir créé deux ou trois implémentations avant de créer une interface, pour être sûr du "contrat" que vos implémentations doivent respecter. Mieux vaut parfois une duplication assumée et contrôlée qu’une mauvaise abstraction !

Vous devriez avoir la même vigilance pour vos vues. Vous pouvez utiliser un moteur de gabarits comme Twig pour limiter la duplication de vos fichiers HTML, par exemple.

Faites attention à vos requêtes en base de données : par expérience, les requêtes SQL dupliquées sont souvent responsables de la perte de performance d’une application.

C’est tout autant de code en moins dans votre application, donc moins de code à maintenir et donc moins de bugs ! :soleil:

# En résumé

STUPID est un ensemble de mauvaises pratiques en développement logiciel :
- Il faut éviter au maximum d’utiliser des Singletons : nous verrons dans le détail ce design pattern dans un prochain chapitre, et nous avons déjà vu qu’il rendait le code plus difficile à SOLIDifier.
- Le couplage fort entre objets est également à proscrire : dépendez d’interfaces, quitte à les remplacer régulièrement quand votre application évolue.
- Si un code est difficile à tester, c’est probablement parce qu’il est trop couplé ou qu’il ne respecte pas un, voire plusieurs principes SOLID. Relisez le code correspondant en reprenant chaque principe, et il devrait être plus facile à tester.
- Gardez-vous des optimisations prématurées. Dans la littérature anglaise, vous retrouverez le conseil suivant : "Make it work, make it pretty and then, make it fast!" ("Faites en sorte que ça marche, puis que ce soit SOLID, et enfin que ce soit performant !").
- Prenez le temps de réfléchir au nom de vos variables, fonctions et classes de votre application : votre "moi" du futur vous en remerciera. La difficulté à nommer quelque chose est un indice qu’il faut réusiner le code.
- Ne vous répétez pas : un code dupliqué, c’est un code qu’il faut faire évoluer et maintenir à plusieurs endroits. Avec l’expérience, vous apprendrez par vous-même qu’il vaut mieux une duplication qu’une mauvaise abstraction, mais d’ici là, ce conseil est un bon réflexe à acquérir.