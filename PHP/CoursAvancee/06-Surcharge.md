# Surcharge d’éléments et opérateur de résolution de portée en PHP

Dans cette nouvelle leçon, nous allons voir précisément ce qu’est la surcharge d’éléments dans le cadre du PHP orienté objet ainsi que les règles liées à la surcharge.

Nous allons également en profiter pour introduire l’opérateur de résolution de portée, un opérateur qu’il convient de connaitre car il va nous servir à accéder à divers éléments dans nos classes et notamment aux éléments surchargés, aux constantes et aux éléments statiques qu’on étudiera dans les prochaines leçons.

# La surcharge de propriétés et de méthodes en PHP orienté objet

En PHP, on dit qu’on « surcharge » une propriété ou une méthode d’une classe mère lorsqu’on la redéfinit dans une classe fille.

Pour surcharger une propriété ou une méthode, il va falloir la redéclarer en utilisant le même nom. Par ailleurs, si on souhaite surcharger une méthode, il faudra également que la nouvelle définition possède le même nombre de paramètres.

De plus, notez qu’on ne va pouvoir surcharger que des méthodes et propriétés définies avec des niveaux de visibilité public ou protected mais qu’il va être impossible de surcharger des éléments définis comme private puisque ces éléments n’existent / ne sont accessibles que depuis la classe qui les déclare.

Finalement, notez que lorsqu’on surcharge une propriété ou une méthode, la nouvelle définition doit obligatoirement posséder un niveau de restriction de visibilité plus faible ou égal, mais ne doit en aucun cas avoir une visibilité plus restreinte que la définition de base.

Par exemple, si on surcharge une propriété définie comme protected, la nouvelle définition de la propriété ne pourra être définie qu’avec public ou protected mais pas avec private qui correspond à un niveau de visibilité plus restreint.

Notez qu’il va être relativement rare d’avoir à surcharger des propriétés. Généralement, nous surchargerons plutôt les méthodes d’une classe mère depuis une classe fille. Prenons immédiatement un exemple concret en surchargeant la méthode getNom() de notre classe parent Utilisateur dans notre classe étendue Admin.

```php
<?php
    class Utilisateur{
        protected $user_name;
        protected $user_pass;
        
        public function __construct($n, $p){
            $this->user_name = $n;
            $this->user_pass = $p;
        }
        
        public function __destruct(){
            //Du code à exécuter
        }
        
        public function getNom(){
            return $this->user_name;
        }
    }
?>
```

```php
<?php
    class Admin extends Utilisateur{
        protected $ban;
        
        public function getNom(){
            return strtoupper($this->user_name);
        }
        
        public function setBan($b){
            $this->ban[] .= $b;
        }
        public function getBan(){
            echo 'Utilisateurs bannis par '.$this->user_name. ' : ';
            foreach($this->ban as $valeur){
                echo $valeur .', ';
            }
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
            
            $pierre = new Admin('Pierre', 'abcdef');
            $mathilde = new Utilisateur('Math', 123456);
            
            $pierre->getNom();
            $mathilde->getNom();
            
            echo '<br>';
            
            $pierre->setBan('Paul');
            $pierre->setBan('Jean');
            echo $pierre->getBan();
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-surcharge-methode-classe-etendue-resultat.png)

Ici, on modifie le code de notre méthode getNom() en transformant le résultat renvoyé en majuscules grâce à la fonction strtoupper() (« string to upper » ou « chaine en majuscules »).

Lorsqu’on appelle notre méthode depuis notre objet $pierre qui est un objet de la classe Admin, on voit bien que c’est la nouvelle définition de la méthode qui est exécutée.

On va de la même façon pouvoir surcharger le constructeur de la classe parent en définissant un nouveau constructeur dans la classe étendue. Dans le cas présent, on pourrait définir le nom directement en majuscules pour les objets de la classe Admin afin qu’il s’affiche toujours en majuscules.

```php
<?php
    class Utilisateur{
        protected $user_name;
        protected $user_pass;
        
        public function __construct($n, $p){
            $this->user_name = $n;
            $this->user_pass = $p;
        }
        
        public function __destruct(){
            //Du code à exécuter
        }
        
        public function getNom(){
            return $this->user_name;
        }
    }
?>
```

```php
<?php
    class Admin extends Utilisateur{
        protected $ban;
        
        public function __construct($n, $p){
            $this->user_name = strtoupper($n);
            $this->user_pass = $p;
        }
        public function setBan($b){
            $this->ban[] .= $b;
        }
        public function getBan(){
            echo 'Utilisateurs bannis par '.$this->user_name. ' : ';
            foreach($this->ban as $valeur){
                echo $valeur .', ';
            }
        }
    }
?>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-surcharge-constructeur-classe-etendue-resultat.png)

Notez que le PHP a une définition particulière de la surcharge par rapport à de nombreux autres langages. Pour de nombreux langages, « surcharger » une méthode signifie écrire différentes versions d’une même méthode avec un nombre différents de paramètres.

# Accéder à une méthode ou une propriété surchargée grâce à l’opérateur de résolution de portée

Parfois, il va pouvoir être intéressant d’accéder à la définition de base d’une propriété ou d’une méthode surchargée. Pour faire cela, on va pouvoir utiliser l’opérateur de résolution de portée qui est symbolisé par le signe :: (double deux points).

Nous allons également devoir utiliser cet opérateur pour accéder aux constantes et aux méthodes et propriétés définies comme statiques dans une classe (nous allons étudier tous ces concepts dans les prochains chapitres).

Pour le moment, concentrons-nous sur l’opérateur de résolution de portée et illustrons son fonctionnement dans le cas d’une méthode ou d’une propriété surchargée.

Nous allons pouvoir utiliser trois mots clefs pour accéder à différents éléments d’une classe avec l’opérateur de résolution de portée : les mots clefs parent, self et static.

Dans le cas où on souhaite accéder à une propriété ou à une méthode surchargée, le seul mot clef qui va nous intéresser est le mot clef parent qui va nous servir à indiquer qu’on souhaite accéder à la définition de la propriété ou de la méthode faite dans la classe mère.

Pour illustrer cela, nous allons modifier la méthode getNom() de notre classe mère Utilisateur afin qu’elle echo la nom de l’objet l’appelant plutôt qu’utiliser une instruction return (qui empêcherait l’exécution de tout code après l’instruction).

```php
<?php
    class Utilisateur{
        protected $user_name;
        protected $user_pass;
        
        public function __construct($n, $p){
            $this->user_name = $n;
            $this->user_pass = $p;
        }
        
        public function __destruct(){
            //Du code à exécuter
        }
        
        public function getNom(){
            echo $this->user_name;
        }
    }
?>
```

Ensuite, on va surcharger notre méthode getNom() dans notre classe étendue Admin. La méthode de notre classe fille va reprendre le code de celle de la classe parent et ajouter de nouvelles instructions. Ici, plutôt que de réécrire le code de la méthode de base, on peut utiliser parent::getNom() pour appeler la méthode parent depuis notre méthode dérivée. Ensuite, on choisit d’echo un texte.

```php
<?php
    class Admin extends Utilisateur{
        protected $ban;
        
        public function __construct($n, $p){
            $this->user_name = strtoupper($n);
            $this->user_pass = $p;
        }
        
        public function getNom(){
            parent::getNom();
            echo ' (depuis la classe étendue)<br>';
        }
        
        public function setBan($b){
            $this->ban[] .= $b;
        }
        public function getBan(){
            echo 'Utilisateurs bannis par '.$this->user_name. ' : ';
            foreach($this->ban as $valeur){
                echo $valeur .', ';
            }
        }
    }
?>
```
 
Lorsqu’un objet de Admin appelle getNom(), la méthode getNom() de Admin va être utilisée. Cette méthode appelle elle-même la méthode de la classe parent qu’elle surcharge et ajoute un texte au résultat de la méthode surchargée.

Le mot clef parent fait ici référence à la classe parent de la classe dans laquelle la méthode appelante est définie. Dans notre cas, la méthode appelante se trouve dans Admin. Le code parent::getNom() va donc chercher une méthode nommée getNom() dans la classe parent de Admin, c’est-à-dire Utilisateur, et l’exécuter.

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
            
            $pierre = new Admin('Pierre', 'abcdef');
            $mathilde = new Utilisateur('Math', 123456);
            
            $pierre->getNom();
            $mathilde->getNom();
            
        echo '<br>';
            
            $pierre->setBan('Paul');
            $pierre->setBan('Jean');
            echo $pierre->getBan();
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-acces-methode-surcharge-operateur-resolution-portee-resultat.png)