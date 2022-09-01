# Les constantes de classe en PHP objet

- Constantes de classe : https://youtu.be/nFel08NGr9A?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3

Nous n’en avons pas véritablement parlé jusqu’à présent mais nous allons également pouvoir définir des constantes dans une classe. Nous allons dans cette leçon apprendre à le faire et apprendre à accéder à la valeur d’une constante avec l’opérateur de résolution de portée.

# Rappel sur les constantes et définition de constantes dans une classe

Une constante est un conteneur qui ne va pouvoir stocker qu’une seule et unique valeur durant la durée de l’exécution d’un script. On ne va donc pas pouvoir modifier la valeur stockée dans une constante.

Pour définir une constante de classe, on va utiliser le mot clef const suivi du nom de la constante en majuscules. On ne va pas utiliser ici de signe $ comme avec les variables. Le nom d’une constante va respecter les règles communes de nommage PHP.

Depuis la version 7.1 de PHP, on peut définir une visibilité pour nos constantes (public, protected ou private).

Par défaut (si rien n’est précisé), une constante sera considérée comme publique et on pourra donc y accéder depuis l’intérieur et depuis l’extérieur de la classe dans laquelle elle a été définie.

Par ailleurs, notez également que les constantes sont allouées une fois par classe, et non pour chaque instance de classe. Cela signifie qu’une constante appartient intrinsèquement à la classe et non pas à un objet en particulier et que tous les objets d’une classe vont donc partager cette même constante de classe.

Ajoutons immédiatement une constante à notre classe mère Utilisateur :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-definition-constante-classe.png)

Ici, on crée une constante ABONNEMENT qui stocke la valeur « 15 ». On peut imaginer que cette constante représente le prix d’un abonnement mensuel pour accéder au contenu de notre site.

Faites bien attention : si vous définissez un niveau de visibilité pour une constante, assurez-vous de travailler avec une version de PHP 7.1 ou ultérieure. Dans le cas où vous travaillez avec une version antérieure, la déclaration de la visibilité d’une constante sera illégale et le code ne fonctionnera pas.

# Accéder à une constante avec l’opérateur de résolution de portée

Pour accéder à une constante, nous allons à nouveau devoir utiliser l’opérateur de résolution de portée. La façon d’accéder à une constante va légèrement varier selon qu’on essaie d’y accéder depuis l’intérieur de la classe qui la définit (ou d’une classe étendue) ou depuis l’extérieur de la classe.

Dans le cas où on tente d’accéder à la valeur d’une constante depuis l’intérieur d’une classe, il faudra utiliser l’un des deux mots clefs self ou parent qui vont permettre d’indiquer qu’on souhaite accéder à une constante définie dans la classe à partir de laquelle on souhaite y accéder (self) à qu’on souhaite accéder à une constante définie dans une classe mère (parent).

Essayons déjà de manipuler notre constante depuis la définition de la classe :
```php
<?php
    class Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        
        /*Attention: si vous utilisez une version PHP < PHP 7.1, ce code ne
         *fonctionnera pas*/
        public const ABONNEMENT = 15;
        
        public function __construct($n, $p, $r){
            $this->user_name = $n;
            $this->user_pass = $p;
            $this->user_region = $r;
        }
        
        public function __destruct(){
            //Du code à exécuter
        }
        
        public function getNom(){
            echo $this->user_name;
        }
        
        public function setPrixAbo(){
            /*On peut imaginer qu'on calcule un prix d'abonnement différent
             *selon les profils des utilisateurs*/
            if($this->user_region === 'Sud'){
                return $this->prix_abo = self::ABONNEMENT / 2;
            }else{
                return $this->prix_abo = self::ABONNEMENT;
            }
        }
        
        public function getPrixAbo(){
            echo $this->prix_abo;
        }
    }
?>
```
 
L’idée ici va être de définir un tarif d’abonnement différent en fonction des différents profils des utilisateurs et en se basant sur notre constante de classe ABONNEMENT.

On va vouloir définir un tarif préférentiel pour les utilisateurs qui viennent du Sud (car c’est mon site et je fais ce que je veux !). On va ici rajouter deux propriétés dans notre classe : $user_region qui va contenir la région de l’utilisateur et $prix_abo qui va contenir le prix de l’abonnement après calcul.

On va commencer par modifier notre constructeur pour qu’on puisse initialiser la valeur de $user_region dès la création d’un objet.

Ensuite, on crée une méthode setPrixAbo() qui va définir le prix de l’abonnement en fonction de la région passée. Dans le cas où l’utilisateur indique venir du « Sud », le prix de l’abonnement sera égal à la moitié de la valeur de la constante ABONNEMENT.

Vous pouvez remarquer qu’on utilise self::ABONNEMENT pour accéder au contenu de notre constante ici. En effet, la constante a été définie dans la même classe que la méthode qui l’utilise.

On crée enfin une méthode getPrixAbo() qui renvoie la valeur contenue dans la propriété $prix_abo pour un objet.

On va maintenant se rendre dans notre classe étendue Admin :

```php
<?php
    class Admin extends Utilisateur{
        protected $ban;
        public const ABONNEMENT = 5;
        
        public function __construct($n, $p, $r){
            $this->user_name = strtoupper($n);
            $this->user_pass = $p;
            $this->user_region = $r;
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
        
        public function setPrixAbo(){
            if($this->user_region === 'Sud'){
                return $this->prix_abo = self::ABONNEMENT;
            }else{
                return $this->prix_abo = parent::ABONNEMENT / 2;
            }
        }
    }
?>
```

On surcharge ici la constante ABONNEMENT de la classe parente en lui attribuant une nouvelle valeur. On a tout à fait le droit puisqu’il s’agit ici de surcharge et non pas de changement dynamique de valeur d’une même constante (ce qui est interdit).

Pour les objets de la classe Admin, on définit le prix de l’abonnement de base à 5. Dans notre classe, on modifie le constructeur pour y intégrer un paramètre « région » et on supprime également la méthode getNom() créée précédemment.

Enfin, on surcharge la méthode setPrixAbo() : si l’administrateur indique venir du Sud, le prix de son abonnement va être égal à la valeur de la constante ABONNEMENT définie dans la classe courante (c’est-à-dire dans la classe Admin).

Dans les autres cas, le prix de l’abonnement va être égal à la valeur de la constante ABONNEMENT définie dans la classe parent (c’est-à-dire la classe Utilisateur) divisée par 2.

Ici, self et parent nous servent à indiquer à quelle définition de la constante ABONNEMENT on souhaite se référer.

Il ne nous reste plus qu’à exécuter nos méthodes et à afficher les différents prix de l’abonnement pour différents types d’utilisateurs. On va également vouloir renvoyer le contenu de la constante ABONNEMENT telle que définie dans notre classe Utilisateur et dans la classe étendue Admin.

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
        
        $pierre = new Admin('Pierre', 'abcdef', 'Sud');
        $mathilde = new Admin('Math', 123456, 'Nord');
        $florian = new Utilisateur('Flo', 'flotri', 'Est');
        
        $pierre->setPrixAbo();
        $mathilde->setPrixAbo();
        $florian->setPrixAbo();
        
        $u = 'Utilisateur';
        echo 'Valeur de ABONNEMENT dans Utilisateur : ' .$u::ABONNEMENT. '<br>';
        echo 'Valeur de ABONNEMENT dans Admin : ' .Admin::ABONNEMENT. '<br>';
        
        echo 'Prix de l\'abonnement pour ';
        $pierre->getNom();
        echo ' : ';
        $pierre->getPrixAbo();
        echo '<br>Prix de l\'abonnement pour ';
        $mathilde->getNom();
        echo ' : ';
        $mathilde->getPrixAbo();
        echo '<br>Prix de l\'abonnement pour ';
        $florian->getNom();
        echo ' : ';
        $florian->getPrixAbo();
      ?>
      <p>Un paragraphe</p>
    </body>
</html>
```
 
Ici, on tente d’accéder à notre constante depuis l’extérieur de la classe. On va utiliser une syntaxe différente qui va réutiliser le nom de la classe plutôt que les mots clefs self ou parent qui n’auraient aucun sens dans le cas présent.

On est obligés de préciser la classe ici car je vous rappelle qu’une constante n’appartient pas à une instance ou à un objet en particulier mais est définie pour la classe en soi.

Vous pouvez également remarquer que j’ai défini une variable $u dans le code ci-dessus. En effet, vous devez savoir qu’il est possible en PHP de référencer une classe en utilisant une variable, c’est-à-dire d’utiliser une variable pour faire référence à une classe. Pour faire cela, il suffit de stocker le nom exact de la classe dans la variable et on pourra ensuite l’utiliser comme référence à notre classe.

Dans mon code, l’écriture $u::ABONNEMENT est donc strictement équivalente à UTILISATEUR::ABONNEMENT.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-utilisateur-acces-constante-resultat.png)