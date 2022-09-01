# Les méthodes magiques en orienté objet PHP

Dans cette nouvelle leçon, nous allons discuter de méthodes spéciales en PHP objet : les méthodes magiques qui sont des méthodes qui vont être appelées automatiquement suive à un évènement déclencheur propre à chacune d’entre elles.

Nous allons établir la liste complète de ces méthodes magiques en PHP7 et illustrer le rôle de chacune d’entre elles.

# Définition et liste des méthodes magiques PHP

Les méthodes magiques sont des méthodes qui vont être appelées automatiquement dans le cas d’un évènement particulier.

La méthode __construct(), par exemple, est une méthode magique. En effet, cette méthode s’exécute automatiquement dès que l’on instancie une classe dans laquelle on a défini un constructeur.

Les méthodes magiques reconnaissables en PHP au fait que leur nom commence par un double underscore __. En voici la liste :

    __construct();
    __destruct() ;
    __call() ;
    __callStatic() ;
    __get() ;
    __set() ;
    __isset() ;
    __unset() ;
    __toString() ;
    __clone() ;
    __sleep() ;
    __wakeup() ;
    __invoke() ;
    __set_state() ;
    __debugInfo().

Nous allons dans cette leçon comprendre le rôle de chacune de ces méthodes et voir comment les utiliser intelligemment.

# Les méthodes magiques __construct() et __destruct()

Nous connaissons déjà les deux méthodes magiques __construct() et __destruct() encore appelées méthodes « constructeur » et « destructeur ».

La méthode __construct() va être appelée dès qu’on va instancier une classe possédant un constructeur.

Cette méthode est très utile pour initialiser les valeurs dont un objet a besoin dès sa création et avant toute utilisation de celui-ci.

La méthode magique __destruct() est la méthode « contraire » de la fonction constructeur et va être appelée dès qu’il n’y a plus de référence sur un objet donné ou dès qu’un objet n’existe plus dans le contexte d’une certaine application. Bien évidemment, pour que le destructeur soit appelé, vous devrez le définir dans la définition de la classe tout comme on a l’habitude de le faire avec le constructeur.

Le destructeur va nous servir à « nettoyer » le code en détruisant un objet une fois qu’on a fini de l’utiliser. Définir un destructeur va être particulièrement utile pour effectuer des opérations juste avant que l’objet soit détruit.

En effet, en utilisant un destructeur nous avons la maitrise sur le moment exact où l’objet va être détruit. Ainsi, on va pouvoir exécuter au sein de notre destructeur différentes commandes comme sauvegarder des dernières valeurs de l’objet dans une base de données, fermer la connexion à une base de données, etc. juste avant que celui-ci soit détruit.

# Les méthodes magiques __call() et __callStatic()

La méthode magique __call() va être appelée dès qu’on essaie d’utiliser une méthode qui n’existe pas (ou qui est inaccessible) à partir d’un objet. On va passer deux arguments à cette méthode : le nom de la méthode qu’on essaie d’exécuter ainsi que les arguments relatifs à celle-ci (si elle en a). Ces arguments vont être convertis en un tableau.

La méthode magique __callStatic() s’exécute dès qu’on essaie d’utiliser une méthode qui n’existe pas (ou qui est inaccessible) dans un contexte statique cette fois-ci. Cette méthode accepte les mêmes arguments que __call().

Ces deux méthodes vont donc s’avérer très utiles pour contrôler un script et pour éviter des erreurs fatales qui l’empêcheraient de s’exécuter convenablement ou même pour prévenir des failles de sécurité.

```php
<?php
    abstract class Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        public const ABONNEMENT = 15;
        
        public function __destruct(){
            //Du code à exécuter
        }
        
        abstract public function setPrixAbo();
        
        public function getNom(){
            echo $this->user_name;
        }
        public function getPrixAbo(){
            echo $this->prix_abo;
        }
        
        public function __call($methode, $arg){
            echo 'Méthode ' .$methode. ' inaccessible depuis un contexte objet.
            <br>Arguments passés : ' .implode(', ', $arg). '<br>';
        }
        public static function __callStatic($methode, $arg){
            echo 'Méthode ' .$methode. ' inaccessible depuis un contexte statique.
            <br>Arguments passés : ' .implode(', ', $arg). '<br>';
        }
    }
?>
```

On définit ici deux méthodes magiques dans notre classe Utilisateur créée précédemment.

Si une méthode appelée depuis un contexte objet est inaccessible, __call() va être appelée automatiquement.

Si une méthode appelée depuis un contexte statique est inaccessible, __callStatic() va être appelée automatiquement.

Nos méthodes vont ici simplement renvoyer un texte avec le nom de la méthode inaccessible et les arguments passés.

Encore une fois, il faut bien comprendre que ce qui définit une méthode magique est simplement le fait que ces méthodes vont être appelées automatiquement dans un certain contexte.

Cependant, les méthodes magiques ne sont pas des méthodes prédéfinies et il va donc déjà falloir les définir quelque part pour qu’elles soient appelées et également leur fournir un code à exécuter.

Pour tester le fonctionnement de ces deux méthodes, il suffit d’essayer d’exécuter des méthodes qui n’existent pas dans notre script principal :

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            require 'classes/utilisateur.class.php';
            require 'classes/admin.class.php';
            require 'classes/abonne.class.php';
            
            $pierre = new Admin('Pierre', 'abcdef', 'Sud');
            $mathilde = new Admin('Math', 123456, 'Nord');
            $florian = new Abonne('Flo', 'flotri', 'Est');
            
            $pierre->test1('argument1');
            echo '<br>';
            Admin::test2('argument2', 'argument3');
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-methode-magique-call-callstatic-resultat.png)
 
# Les méthodes magiques __get(), __set(), __isset() et __unset()

La méthode magique __get() va s’exécuter si on tente d’accéder à une propriété inaccessible (ou qui n’existe pas) dans une classe. Elle va prendre en argument le nom de la propriété à laquelle on souhaite accéder.

La méthode magique __set() s’exécute dès qu’on tente de créer ou de mettre à jour une propriété inaccessible (ou qui n’existe pas) dans une classe. Cette méthode va prendre comme arguments le nom et la valeur de la propriété qu’on tente de créer ou de mettre à jour.

```php
<?php
    abstract class Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        public const ABONNEMENT = 15;
        
        public function __destruct(){
            //Du code à exécuter
        }
        
        abstract public function setPrixAbo();
        
        public function getNom(){
            echo $this->user_name;
        }
        public function getPrixAbo(){
            echo $this->prix_abo;
        }
        
        public function __get($prop){
            echo 'Propriété ' .$prop. ' inaccessible.<br>';
        }
        public function __set($prop, $valeur){
            echo 'Impossible de mettre à jour la valeur de ' .$prop. ' avec "'
            .$valeur. '" (propriété inaccessible)';
        }
    }
?>
```

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            require 'classes/utilisateur.class.php';
            require 'classes/admin.class.php';
            require 'classes/abonne.class.php';
            
            $pierre = new Admin('Pierre', 'abcdef', 'Sud');
            $mathilde = new Admin('Math', 123456, 'Nord');
            $florian = new Abonne('Flo', 'flotri', 'Est');
            
            $pierre->prixAbo; //Inaccessible depuis un objet car protected
            echo '<br>';
            $pierre->prixAbo = 20;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-methode-magique-get-set-resultat.png)

De manière similaire, la méthode magique __isset() va s’exécuter lorsque les fonctions isset() ou empty() sont appelées sur des propriétés inaccessibles.

La fonction isset() va servir à déterminer si une variable est définie et si elle est différente de NULL tandis que la fonction empty() permet de déterminer si une variable est vide.

Finalement, la méthode magique __unset() va s’exécuter lorsque la fonction unset() est appelée sur des propriétés inaccessibles.
La fonction unset() sert à détruire une variable.

Notez par ailleurs que les 4 méthodes magiques __get(), __set(), __isset() et __empty() ne vont pas pouvoir fonctionner dans un contexte statique mais uniquement dans un contexte objet.

# La méthode magique __toString()

La méthode magique __toString() va être appelée dès que l’on va traiter un objet comme une chaine de caractères (par exemple lorsqu’on tente d’echo un objet).

Attention, cette méthode doit obligatoirement retourner une chaine ou une erreur sera levée par le PHP.

```php
<?php
    abstract class Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        public const ABONNEMENT = 15;
        
        public function __destruct(){
            //Du code à exécuter
        }
        
        abstract public function setPrixAbo();
        
        public function getNom(){
            echo $this->user_name;
        }
        public function getPrixAbo(){
            echo $this->prix_abo;
        }
        
        public function __toString(){
            return 'Nom d\'utilisateur : ' .$this->user_name. '<br>
            Prix de l\'abonnement : ' .$this->prix_abo. '<br><br>';
        }
    }
?>
```

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            require 'classes/utilisateur.class.php';
            require 'classes/admin.class.php';
            require 'classes/abonne.class.php';
            
            $pierre = new Admin('Pierre', 'abcdef', 'Sud');
            $mathilde = new Admin('Math', 123456, 'Nord');
            $florian = new Abonne('Flo', 'flotri', 'Est');
            
            $pierre->setPrixAbo();
            $mathilde->setPrixAbo();
            echo $pierre;
            echo $mathilde;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-methode-magique-tostring-resultat.png)
 
# La méthode magique __invoke()

La méthode magique __invoke() va être appelée dès qu’on tente d’appeler un objet comme une fonction.

```php
<?php
    abstract class Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        public const ABONNEMENT = 15;
        
        public function __destruct(){
            //Du code à exécuter
        }
        
        abstract public function setPrixAbo();
        
        public function getNom(){
            echo $this->user_name;
        }
        public function getPrixAbo(){
            echo $this->prix_abo;
        }
        
        public function __invoke($arg){
            echo 'Un objet a été utilisé comme une fonction.
            <br>Argument passé : ' .$arg. '<br><br>';
        }
    }
?>
```

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            require 'classes/utilisateur.class.php';
            require 'classes/admin.class.php';
            require 'classes/abonne.class.php';
            
            $pierre = new Admin('Pierre', 'abcdef', 'Sud');
            $mathilde = new Admin('Math', 123456, 'Nord');
            $florian = new Abonne('Flo', 'flotri', 'Est');
            
            $pierre(1234);
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-methode-magique-invoke-resultat.png)

# La méthode magique __clone()

La méthode magique __clone() s’exécute dès que l’on crée un clone d’un objet pour le nouvel objet créé.

Cette méthode va nous permettre notamment de modifier les propriétés qui doivent l’être après avoir créé un clone pour le clone en question.

Nous parlerons du clonage d’objet dans un chapitre ultérieur, je ne vais donc pas m’attarder sur cette méthode magique pour le moment.

 
# Les méthodes magiques __sleep(), __wakeup(), __set_state() et debugInfo()

Nous n’étudierons pas ici les méthodes magiques __sleep(), __wakeup(), __set_state() et debugInfo() simplement car elles répondent à des besoins très précis et ne vont avoir d’intérêt que dans un contexte et dans un environnement spécifique.