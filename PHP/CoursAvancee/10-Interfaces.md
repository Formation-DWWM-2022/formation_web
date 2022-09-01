# Les interfaces en PHP orienté objet

- Les Interfaces : https://youtu.be/ub92d6URoh0?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3
- Interfaces in OOP PHP : https://youtu.be/jHjjsgRNFVE?list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh

Dans cette nouvelle leçon, nous allons découvrir le concept d’interfaces en PHP orienté objet. Nous allons ici particulièrement insister la compréhension de ce qu’est une interface, la différence entre une interface et une classe abstraite ainsi que sur les cas où il va être intéressant de définir des interfaces.

# Définition des interfaces en PHP objet et différence avec les classes abstraites

Les interfaces vont avoir un but similaire aux classes abstraites puisque l’un des intérêts principaux liés à la définition d’une interface va être de fournir un plan général pour les développeurs qui vont implémenter l’interface et de les forcer à suivre le plan donné par l’interface.

De la même manière que pour les classes abstraites, nous n’allons pas directement pouvoir instancier une interface mais devoir l’implémenter, c’est-à-dire créer des classes dérivées à partir de celle-ci pour pouvoir utiliser ses éléments.

Les deux différences majeures entre les interfaces et les classes abstraites sont les suivantes :

1. Une interface ne peut contenir que les signatures des méthodes ainsi qu’éventuellement des constantes mais pas de propriétés. Cela est dû au fait qu’aucune implémentation n’est faite dans une interface : une interface n’est véritablement qu’un plan ;
2. Une classe ne peut pas étendre plusieurs autres classes à cause des problèmes d’héritage. En revanche, une classe peut tout à fait implémenter plusieurs interfaces.

Je pense qu’il est ici intéressant de bien illustrer ces deux points et notamment d’expliquer pourquoi une classe n’a pas l’autorisation d’étendre plusieurs autres classes.

Pour cela, imaginons qu’on ait une première classe A qui définit la signature d’une méthode diamond() sans l’implémenter.

Nous créons ensuite deux classes B et C qui étendent la classe A et qui implémentent chacune d’une manière différente la méthode diamond().

Finalement, on crée une classe D qui étend les classes B et C et qui ne redéfinit pas la méthode diamond(). Dans ce cas-là, on est face au problème suivant : la classe D doit-elle utiliser l’implémentation de diamond() faite par la classe B ou celle faite par la classe C ?

Ce problème est connu sous le nom du « problème du diamant » et est la raison principale pour laquelle la plupart des langages de programmation orientés objets (dont le PHP) ne permettent pas à une classe d’étendre deux autres classes.

En revanche, il ne va y avoir aucun problème par rapport à l’implémentation par une classe de plusieurs interfaces puisque les interfaces, par définition, ne peuvent que définir la signature d’une méthode et non pas son implémentation.

Profitez-en ici pour noter que les méthodes déclarées dans une classe doivent obligatoirement être publiques (puisqu’elles devront être implémentées en dehors de l’interface) et que les constantes d’interface ne pourront pas être écrasées par une classe (ou par une autre interface) qui vont en hériter.

# Définir et implémenter une interface en pratique

On va pouvoir définir une interface de la même manière qu’une classe mais en utilisant cette fois-ci le mot clef interface à la place de class. Nous nommerons généralement nos fichiers d’interface en utilisant « interface » à la place de « classe ». Par exemple, si on crée une interface nommée Utilisateur, on enregistrera le fichier d’interface sous le nom utiilsateur.interface.php par convention.
```php
<?php
    interface Utilisateur{
        public const ABONNEMENT = 15;
        public function getNom();
        public function setPrixAbo();
        public function getPrixAbo();
    }
?>
```
 
On va ensuite pouvoir réutiliser les définitions de notre interface dans des classes. Pour cela, on va implémenter notre interface. On va pouvoir faire cela de la même manière que lors de la création de classes étendues mais on va cette fois-ci utiliser le mot clef implements à la place de extends.

```php
<?php
    class Abonne implements Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        
        public function __construct($n, $p, $r){
            $this->user_name = $n;
            $this->user_pass = $p;
            $this->user_region = $r;
        }
        
        public function getNom(){
            echo $this->user_name;
        }
        public function getPrixAbo(){
            echo $this->prix_abo;
        }
        
        public function setPrixAbo(){
            if($this->user_region === 'Sud'){
                return $this->prix_abo = Utilisateur::ABONNEMENT / 2;
            }else{
                return $this->prix_abo = Utilisateur::ABONNEMENT;
            }
        }
    }
?>
```

```php
<?php
    class Admin implements Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        protected static $ban;
        
        public function __construct($n, $p, $r){
            $this->user_name = strtoupper($n);
            $this->user_pass = $p;
            $this->user_region = $r;
        }
        
        public function getNom(){
            echo $this->user_name;
        }
        public function getPrixAbo(){
            echo $this->prix_abo;
        }
        
        public function setBan(...$b){
            foreach($b as $banned){
                self::$ban[] .= $banned;
            }
        }
        public function getBan(){
            echo 'Utilisateurs bannis : ';
            foreach(self::$ban as $valeur){
                echo $valeur .', ';
            }
        }
        
        public function setPrixAbo(){
            if($this->user_region === 'Sud'){
                return $this->prix_abo = Utilisateur::ABONNEMENT / 6;
            }else{
                return $this->prix_abo = Utilisateur::ABONNEMENT / 3;
            }
        }
    }
?>
```

Ici, on utilise une interface Utilisateur plutôt que notre classe abstraite Utilisateur qu’on laisse de côté pour le moment.

Notez bien ici que toutes les méthodes déclarées dans une interface doivent obligatoirement être implémentées dans une classe qui implémente une interface.

Vous pouvez également observer que pour accéder à une constante d’interface, il va falloir préciser le nom de l’interface devant l’opérateur de résolution de portée.

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
            require 'classes/utilisateur.interface.php';
            require 'classes/admin.class.php';
            require 'classes/abonne.class.php';
            
            $pierre = new Admin('Pierre', 'abcdef', 'Sud');
            $mathilde = new Admin('Math', 123456, 'Nord');
            $florian = new Abonne('Flo', 'flotri', 'Est');
            
            $pierre->setPrixAbo();
            $mathilde->setPrixAbo();
            $florian->setPrixAbo();
            
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

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-utilisation-interface-resultat.png)

Par ailleurs, notez également qu’on va aussi pouvoir étendre une interface en utilisant le mot clef extends. Dans ce cas-là, on va créer des interfaces étendues qui devront être implémentées par des classes de la même manière que pour une interface classique.

# Interface ou classe abstraite : comment choisir ?

Les interfaces et les classes abstraites semblent à priori servir un objectif similaire qui est de créer des plans ou le design de futures classes.

Cependant, avec un peu de pratique, on va vite s’apercevoir qu’il est parfois plus intéressant d’utiliser une classe abstraite ou au contraire une interface en fonction de la situation.

Les interfaces ne permettent aucune implémentation mais permet simplement de définir des signatures de méthodes et des constantes tandis qu’on va tout à fait pouvoir définir et implémenter des méthodes dans une classe abstraite.

Ainsi, lorsque plusieurs classes possèdent des similarités, on aura plutôt tendance à créer une classe mère abstraite dans laquelle on va pouvoir implémenter les méthodes communes puis d’étendre cette classe.

En revanche, si nous avons des classes qui vont pouvoir posséder les mêmes méthodes mais qui vont les implémenter de manière différente, alors il sera certainement plus adapté de créer une interface pour définir les signatures des méthodes communes et d’implémenter cette interface pour laisser le soin à chaque classe fille d’implémenter les méthodes comme elles le souhaitent.

Dans notre cas, par exemple, nos types d’utilisateurs partagent de nombreuses choses. Il est donc ici plus intéressant de créer une classe abstraite plutôt qu’une interface.

Encore une fois, on touche ici plus à des problèmes de structure et de logique du code qu’à des problèmes de code en soi et différents développeurs pourront parvenir au même résultat de différentes façons.

J’essaie ici simplement de vous présenter comment il est recommandé de travailler idéalement pour avoir la structure de code la plus propre et la plus facilement maintenable.

Une nouvelle fois, je ne saurais trop vous répéter l’importance de la réflexion face à un projet complexe avant l’étape de codage : il est selon moi essentiel de créer un premier plan sur papier décrivant ce à quoi on souhaite arriver et comment on va structurer notre code pour y arriver.

# Les interfaces prédéfinies

De la même manière qu’il existe des classes prédéfinies, c’est-à-dire des classes natives ou encore prêtes à l’emploi en PHP, nous allons pouvoir utiliser des interfaces prédéfinies.

Parmi celles-ci, nous pouvons notamment noter :

- L’interface Traversable dont le but est d’être l’interface de base de toutes les classes permettant de parcourir des objets ;
- L’interface Iterator qui définit des signatures de méthodes pour les itérateurs ;
- L’interface IteratorAggregate qui est une interface qu’on va pouvoir utiliser pour créer un itérateur externe ;
- L’interface Throwable qui est l’interface de base pour la gestion des erreurs et des exceptions ;
- L’interface ArrayAccess qui permet d’accéder aux objets de la même façon que pour les tableaux ;
- L’interface Serializable qui permet de personnaliser la linéarisation d’objets.

Nous n’allons pas étudier ces interfaces en détail ici. Cependant, nous allons en utiliser certaines dans les parties à venir et notamment nous servir de Throwable et des classes dérivées prédéfinies Error et Exception dans la partie liée à la gestion des erreurs et des exceptions.