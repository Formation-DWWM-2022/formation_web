# Les méthodes PHP constructeur et destructeur

Nous allons nous intéresser à deux méthodes spéciales qui vont pouvoir être définies dans nos classes qui sont les méthodes constructeur et destructeur.

# La méthode constructeur : définition et usage

La méthode constructeur ou plus simplement le constructeur d’une classe est une méthode qui va être appelée (exécutée) automatiquement à chaque fois qu’on va instancier une classe.

Le constructeur va ainsi nous permettre d’initialiser des propriétés dès la création d’un objet, ce qui va pouvoir être très intéressant dans de nombreuses situations.

Pour illustrer l’intérêt du constructeur, reprenons notre class Utilisateur créée précédemment.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-classe-sans-constructeur.png)

Notre classe possède deux propriétés $user_name et $user_passe et trois propriétés getNom(), setNom() et setPasse() dont les rôles respectifs sont de retourner le nom d’utilisateur de l’objet courant, de définir le nom d’utilisateur de l’objet courant et de définir le mot de passe de l’objet courant.

Lorsqu’on créé un nouvel objet à partir de cette classe, il faut ici ensuite appeler les méthodes setNom() et setPasse() pour définir les valeurs de nos propriétés $user_name et $user_pass, ce qui est en pratique loin d’être optimal.

Ici, on aimerait idéalement pouvoir définir immédiatement la valeur de nos deux propriétés lors de la création de l’objet (en récupérant en pratique les valeurs passées par l’utilisateur). Pour cela, on va pouvoir utiliser un constructeur.
```php
<?php
    class Utilisateur{
        private $user_name;
        private $user_pass;
        
        public function __construct($n, $p){
            $this->user_name = $n;
            $this->user_pass = $p;
        }
        
        public function getNom(){
            return $this->user_name;
        }
    }
?>
```

On déclare un constructeur de classe en utilisant la syntaxe function __construct(). Il faut bien comprendre ici que le PHP va rechercher cette méthode lors de la création d’un nouvel objet et va automatiquement l’exécuter si elle est trouvée.

Nous allons utiliser notre constructeur pour initialiser certaines propriétés de nos objets dont nous pouvons avoir besoin immédiatement ou pour lesquelles il fait du sens de les initialiser immédiatement.

Dans notre cas, on veut stocker le nom d’utilisateur et le mot de passe choisi dans nos variables $user_name et $user_pass dès la création d’un nouvel objet.

Pour cela, on va définir deux paramètres dans notre constructeur qu’on appelle ici $n et $p. Nous allons pouvoir passer les arguments à notre constructeur lors de l’instanciation de notre classe. On va ici passer un nom d’utilisateur et un mot de passe. Voici comment on va procéder en pratique :
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
            
            $pierre = new Utilisateur('Pierre', 'abcdef');
            $mathilde = new Utilisateur('Math', 123456);
            
            echo $pierre->getNom(). '<br>';
            echo $mathilde->getNom(). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-argument-constructeur-resultat.png)

Lors de l’instanciation de notre classe Utilisateur, le PHP va automatiquement rechercher une méthode __construct() dans la classe à instancier et exécuter cette méthode si elle est trouvée. Les arguments passés lors de l’instanciation vont être utilisés dans notre constructeur et vont ici être stockés dans $user_name et $user_pass.

Ici, on peut déjà avoir un premier aperçu d’un script « utile » en pratique si vous le désirez afin de bien comprendre à quoi vont servir les notions étudiées jusqu’à maintenant « en vrai » :
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
        <form action='cours.php' method='post'>
            <label for='nom'>Nom d'utilisateur : </label>
            <input type='text' name='nom' id='nom'><br>
            <label for='pass'>Choisissez un mot de passe.</label>
            <input type='password' name='pass' id='pass'><br>
            <input type='submit' value='Envoyer'>
        </form>
        <?php
            require 'classes/utilisateur.class.php';
            //+ Vérification des données reçues (regex + filtres)
            //+ Stockage des données (base de données)
            $pierre = new Utilisateur($_POST['nom'], $_POST['pass']);
            echo $pierre->getNom(). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-exemple-script-argument-constructeur-passage.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-exemple-script-argument-constructeur-resultat.png)
On crée ici un formulaire en HTML qui va demander un nom d’utilisateur et un mot de passe à nos visiteurs. Vous pouvez imaginer que ce formulaire est un formulaire d’inscription. Ensuite, en PHP, on récupère les informations envoyées et on les utilise pour créer un nouvel objet. L’intérêt ici est que notre objet va avoir accès aux méthodes définies dans notre classe.

Bien évidemment, ici, notre script n’est pas complet puisqu’en pratique il faudrait analyser la cohérence des données envoyées et vérifier qu’elles ne sont pas dangereuses et car nous stockerions également les informations liées à un nouvel utilisateur en base de données pour pouvoir par la suite les réutiliser lorsque l’utilisateur revient sur le site et souhaite s’identifier.

# La méthode destructeur

De la même façon, on va également pouvoir définir une méthode destructeur ou plus simplement un destructeur de classe.

La méthode destructeur va permettre de nettoyer les ressources avant que PHP ne libère l’objet de la mémoire.

Ici, vous devez bien comprendre que les variables-objets, comme n’importe quelle autre variable « classique », ne sont actives que durant le temps d’exécution du script puis sont ensuite détruites.

Cependant, dans certains cas, on voudra pouvoir effectuer certaines actions juste avant que nos objets ne soient détruits comme par exemple sauvegarder des valeurs de propriétés mises à jour ou fermer des connexions à une base de données ouvertes avec l’objet.

Dans ces cas-là, on va pouvoir effectuer ces opérations dans le destructeur puisque la méthode destructeur va être appelée automatiquement par le PHP juste avant qu’un objet ne soit détruit.

Il est difficile d’expliquer concrètement l’intérêt d’un destructeur ici à des personnes qui n’ont pas une connaissance poussée du PHP. Pas d’inquiétude donc si vous ne comprenez pas immédiatement l’intérêt d’une telle méthode, on pourra illustrer cela de manière plus concrète lorsqu’on parlera des bases de données.

On va utiliser la syntaxe function __destruct() pour créer un destructeur. Notez qu’à la différence du constructeur, il est interdit de définir des paramètres dans un destructeur.
```php
<?php
    class Utilisateur{
        private $user_name;
        private $user_pass;
        
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