# Les propriétés et méthodes statiques en PHP objet

- Statique : https://youtu.be/C0EP6d2sJPc
- Attributs et méthodes statiques : https://youtu.be/q_1P1YOCcHo?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3
- Static Properties And Methods In OOP PHP : https://youtu.be/L9jLxuLAAIY?list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh
- Scope Resolution Operators in OOP PHP : https://youtu.be/rzew3ZgDMPA?list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh

Dans cette nouvelle leçon, nous allons découvrir ce que sont les propriétés et méthodes statiques, leur intérêt et comment créer et utiliser des propriétés et méthodes statiques.

# Définition des propriétés et méthodes statiques

Une propriété ou une méthode statique est une propriété ou une méthode qui ne va pas appartenir à une instance de classe ou à un objet en particulier mais qui va plutôt appartenir à la classe dans laquelle elle a été définie.

Les méthodes et propriétés statiques vont donc avoir la même définition et la même valeur pour toutes les instances d’une classe et nous allons pouvoir accéder à ces éléments sans avoir besoin d’instancier la classe.

Pour être tout à fait précis, nous n’allons pas pouvoir accéder à une propriété statique depuis un objet. En revanche, cela va être possible dans le cas d’une méthode statique.

Attention à ne pas confondre propriétés statiques et constantes de classe : une propriété statique peut tout à fait changer de valeur au cours du temps à la différence d’une constante dont la valeur est fixée. Simplement, la valeur d’une propriété statique sera partagée par tous les objets issus de la classe dans laquelle elle a été définie.

De manière générale, nous n’utiliserons quasiment jamais de méthode statique car il n’y aura que très rarement d’intérêt à en utiliser. En revanche, les propriétés statiques vont s’avérer utiles dans de nombreux cas.

# Définir et accéder à des propriétés et à des méthodes statiques

On va pouvoir définir une propriété ou une méthode statique à l’aide du mot clef static.

Prenons immédiatement un premier exemple afin que vous compreniez bien l’intérêt et le fonctionnement des propriétés et méthodes statiques.

Pour cela, retournons dans notre classe étendue Admin. Cette classe possède une propriété $ban qui contient la liste des utilisateurs bannis un l’objet courant de Admin ainsi qu’une méthode getBan() qui renvoie le contenu de $ban.

Imaginons maintenant que l’on souhaite stocker la liste complète des utilisateurs bannis par tous les objets de Admin. Nous allons ici devoir définir une propriété dont la valeur va pouvoir être modifiée et qui va être partagée par tous les objets de notre classe c’est-à-dire une propriété qui ne va pas appartenir à un objet de la classe en particulier mais à la classe en soi.

Pour faire cela, on va commencer par déclarer notre propriété $ban comme statique et modifier le code de nos méthodes getBan() et setBan().

En effet, vous devez bien comprendre ici qu’on ne peut pas accéder à une propriété statique depuis un objet, et qu’on ne va donc pas pouvoir utiliser l’opérateur objet -> pour accéder à notre propriété statique.

Pour accéder à une propriété statique, nous allons une fois de plus devoir utiliser l’opérateur de résolution de portée ::.

Regardez plutôt le code ci-dessous :

```php
<?php
    class Admin extends Utilisateur{
        protected static $ban;
        public const ABONNEMENT = 5;
        
        public function __construct($n, $p, $r){
            $this->user_name = strtoupper($n);
            $this->user_pass = $p;
            $this->user_region = $r;
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
                return $this->prix_abo = self::ABONNEMENT;
            }else{
                return $this->prix_abo = parent::ABONNEMENT / 2;
            }
        }
    }
?>
```
 
Ici, on commence par déclarer notre propriété $ban comme statique avec la syntaxe protected static $ban. La propriété va donc appartenir à la classe et sa valeur va être partagée par tous les objets de la classe.

Ensuite, on modifie notre fonction setBan() pour utiliser notre propriété statique. Ici, vous pouvez déjà noter que j’ai ajouté … devant la liste des paramètres de notre méthode.

Nous avons déjà vu cette écriture lors de la partie sur les fonctions : elle permet à une fonction d’accepter un nombre variable d’arguments. On utilise cette écriture ici pour permettre à nos objets de bannir une ou plusieurs personnes d’un coup.

Dans notre méthode, on remplace $this->ban par self::$ban puisque notre propriété $ban est désormais statique et appartient à la classe et non pas à un objet en particulier. Il faut donc utiliser l’opérateur de résolution de portée pour y accéder.

La boucle foreach nous permet simplement d’ajouter les différentes valeurs passées en argument dans notre propriété statique $ban qu’on définit comme un tableau.

De même, on modifie le code de la méthode getBan() afin d’accéder à notre propriété statique et de pouvoir afficher son contenu en utilisant à nouveau la syntaxe self::$ban.

Chaque objet de la classe Admin va ainsi pouvoir bannir des utilisateurs en utilisant setBan() et chaque nouvel utilisateur banni va être stocké dans la propriété $ban. De même, chaque objet va pouvoir afficher la liste complète des personnes bannies en utilisant getBan().

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
        
        $pierre->setBan('Paul', 'Jean');
        $mathilde->setBan('Thomas');
        
        $pierre->getBan();
        echo '<br>';
        $mathilde->getBan();
      ?>
      <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-utilisation-propriete-methode-statique-resultat.png)