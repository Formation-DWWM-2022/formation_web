# Les méthodes et les classes abstraites en PHP objet

- Les classes abstraites : https://youtu.be/GWero_Nks6U?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3
- Abstract Classes in OOP PHP : https://youtu.be/Eu7l8utquGY?list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh

En PHP orienté objet, nous allons pouvoir définir des classes et des méthodes dites « abstraites ». Nous allons présenter dans cette leçon les intérêts des classes et méthodes abstraites et voir comment déclarer des classes et des méthodes comme abstraites en pratique.

# Les classes et méthodes abstraites : définition et intérêt

Une classe abstraite est une classe qui ne va pas pouvoir être instanciée directement, c’est-à-dire qu’on ne va pas pouvoir manipuler directement.

Une méthode abstraite est une méthode dont seule la signature (c’est-à-dire le nom et les paramètres) va pouvoir être déclarée mais pour laquelle on ne va pas pouvoir déclarer d’implémentation (c’est-à-dire le code dans la fonction ou ce que fait la fonction).

Dès qu’une classe possède une méthode abstraite, il va falloir la déclarer comme classes abstraite.

Pour comprendre les intérêts des classes et des méthodes abstraites, il faut bien penser que lorsqu’on code en PHP, on code généralement pour quelqu’un ou alors on fait partie d’une équipe. D’autres développeurs vont ainsi généralement pouvoir / devoir travailler à partir de notre code, le modifier, ajouter des fonctionnalités, etc.

L’intérêt principal de définir une classe comme abstraite va être justement de fournir un cadre plus strict lorsqu’ils vont utiliser notre code en les forçant à définir certaines méthodes et etc.

En effet, une classe abstraite ne peut pas être instanciée directement et contient généralement des méthodes abstraites. L’idée ici va donc être de définir des classes mères abstraites et de pousser les développeurs à étendre ces classes.

Lors de l’héritage d’une classe abstraite, les méthodes déclarées comme abstraites dans la classe parent doivent obligatoirement être définies dans la classe enfant avec des signatures (nom et paramètres) correspondantes.

Cette façon de faire va être très utile pour fournir un rail, c’est-à-dire une ligne directrice dans le cas de développements futurs.

En effet, en créant un plan « protégé » (puisqu’une classe abstraite ne peut pas être instanciée directement) on force les développeurs à étendre cette classe et on les force également à définir les méthodes abstraites.

Cela nous permet de nous assurer que certains éléments figurent bien dans la classe étendue et permet d’éviter certains problèmes de compatibilité en nous assurant que les classes étendues possèdent une structure de base commune.

# Définir des classes et des méthodes abstraites en pratique

Pour définir une classe ou une méthode comme abstraite, nous allons utiliser le mot clef abstract.

Vous pouvez déjà noter ici qu’une classe abstraite n’est pas structurellement différente d’une classe classique (à la différence de la présence potentielle de méthodes abstraites) et qu’on va donc tout à fait pouvoir ajouter des constantes, des propriétés et des méthodes classiques dans une classe abstraite.

Les seules différences entre les classes abstraites et classiques sont encore une fois qu’une classe abstraite peut contenir des méthodes abstraites et doit obligatoirement être étendue pour utiliser ses fonctionnalités.

Reprenons nos classes Utilisateur et Admin créées précédemment pour illustrer de manière pratique l’intérêt des classes et méthodes abstraites.

Précédemment, nous avons créé une méthode setPrixAbo() qui calculait le prix de l’abonnement pour un utilisateur classique dans notre classe Utilisateur et on avait surchargé le code de cette fonction dans Admin pour calculer un prix d’abonnement différent pour les admin.

Ici, cela rend notre code conceptuellement étrange car cela signifie que Utilisateur définit des choses pour un type d’utilisateur qui sont les utilisateurs « de base » tandis que Admin les définit pour un autre type d’utilisateur qui sont les « admin ». Le souci que j’ai avec ce code est que chacune de nos deux classes s’adresse à un type différent d’utilisateur mais que nos deux classes ne sont pas au même niveau puisque Admin est un enfant de Utilisateur.

Normalement, si notre code est bien construit, on devrait voir une hiérarchie claire entre ce que représentent nos classes mères et nos classes enfants. Dans le cas présent, j’aimerais que ma classe mère définisse des choses pour TOUS les types d’utilisateurs et que les classes étendues s’occupent chacune de définir des spécificités pour UN type d’utilisateur en particulier.

Encore une fois, ici, on touche à des notions qui sont plus de design de conception que des notions de code en soi mais lorsqu’on code la façon dont on crée et organise le code est au moins aussi importante que le code en soi. Il faut donc toujours essayer d’avoir la structure globale la plus claire et la plus pertinente possible.

Ici, nous allons donc partir du principe que nous avons deux grands types d’utilisateurs : les utilisateurs classiques et les administrateurs. On va donc transformer notre classe Utilisateur afin qu’elle ne définisse que les choses communes à tous les utilisateurs et allons définir les spécificités de chaque type utilisateur dans des classes étendues Admin et Abonne.

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
    }
?>
```

On commence déjà par modifier notre classe parent Utilisateur en la définissant comme abstraite avec le mot clef abstract. On supprime le constructeur qui va être défini dans les classes étendues et on déclare également la méthode setPrixAbo() comme abstraite.

Ici, définir la méthode setPrixAbo() comme abstraite fait beaucoup de sens puisque chaque type d’utilisateur va avoir un prix d’abonnement calculé différent (c’est-à-dire une implémentation de la méthode différente) et car on souhaite que le prix de l’abonnement soit calculé.

En définissant setPrixAbo() comme abstraite, on force ainsi les classes étendues à l’implémenter.

Les propriétés vont être partagées par tous les types d’utilisateurs et les méthodes comme getNom() vont avoir une implémentation identique pour chaque utilisateur. Cela fait donc du sens de les définir dans la classe abstraite.

# Étendre des classes abstraites et implémenter des méthodes abstraites

Maintenant qu’on a défini notre classe Utilisateur comme abstraite, il va falloir l’étendre et également implémenter les méthodes abstraites.

On va commencer par aller dans notre classe étendue Admin et supprimer la constante ABONNEMENT puisque nous allons désormais utiliser celle de la classe abstraite. On va donc également modifier le code de notre méthode setPrixAbo().

```php
<?php
    class Admin extends Utilisateur{
        protected static $ban;
        
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
                return $this->prix_abo = parent::ABONNEMENT / 6;
            }else{
                return $this->prix_abo = parent::ABONNEMENT / 3;
            }
        }
    }
?>
```
 
Ici, lors de l’implémentation d’une méthode déclarée comme abstraite, on ne doit pas réécrire abstract puisque justement on implémente la méthode abstraite. Dans le code, on change self:: par parent:: ainsi que le calcul.

On va ensuite créer un nouveau fichier de classe qu’on va appeler abonne.class.php.

Dans ce fichier, nous allons définir un constructeur pour nos abonnés qui représentent nos utilisateurs de base et allons à nouveau implémenter la méthode setPrixAbo().

```php
<?php
    class Abonne extends Utilisateur{
        public function __construct($n, $p, $r){
            $this->user_name = $n;
            $this->user_pass = $p;
            $this->user_region = $r;
        }
        
        public function setPrixAbo(){
            if($this->user_region === 'Sud'){
                return $this->prix_abo = parent::ABONNEMENT / 2;
            }else{
                return $this->prix_abo = parent::ABONNEMENT;
            }
        }
    }
?>
```
 
On peut maintenant retourner sur notre script principal et créer des objets à partir de nos classes étendues et voir comment ils se comportent :

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

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-utilisation-classe-methode-abstraite-resultat.png)