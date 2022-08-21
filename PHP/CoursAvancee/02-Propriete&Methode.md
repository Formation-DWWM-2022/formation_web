# Propriétés et méthodes en PHP orienté objet

Nous allons définir ce que sont les propriétés et les méthodes et allons ajouter des propriétés et des méthodes à notre classe Utilisateur créée dans la leçon précédente afin de tendre vers une classe fonctionnelle.

# Les propriétés : définition et usage

Dans le chapitre précédent, nous avons créé une classe Utilisateur qui ne contenait pas de code.

Nous avons également dit qu’une classe servait de plan pour créer des objets. Vous pouvez donc en déduire qu’une classe vide ne sert pas à grand-chose.

Nous allons donc maintenant rendre notre classe plus fonctionnelle en lui ajoutant des éléments.

On va déjà pouvoir créer des variables à l’intérieur de nos classes. Les variables créées dans les classes sont appelées des propriétés, afin de bien les différencier des variables « classiques » créées en dehors des classes.

Une propriété, c’est donc tout simplement une variable définie dans une classe (ou éventuellement ajoutée à un objet après sa création).

Reprenons immédiatement notre classe Utilisateur et ajoutons lui deux propriétés qu’on va appeler $user_name et $user_pass par exemple (pour « nom d’utilisateur » et « mot de passe utilisateur »).

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-propriete-classe.png)

Comme vous pouvez le voir, on déclare une propriété exactement de la même façon qu’une variable classique, en utilisant le signe $.

Le mot clef public signifie ici qu’on va pouvoir accès à nos propriétés depuis l’intérieur et l’extérieur de notre classe. Nous reparlerons de cela un peu plus tard, n’y prêtez pas attention pour le moment.

Ici, nous nous contentons de déclarer nos propriétés sans leur attribuer de valeur. Les valeurs des propriétés seront ici passées lors de la création d’un nouvel objet (lorsqu’un visiteur s’inscrira sur notre site).

Notez qu’il est tout-à-fait permis d’initialiser une propriété dans la classe, c’est-à-dire lui attribuer une valeur de référence à la condition que ce soit une valeur constante (elle doit pouvoir être évaluée pendant la compilation du code et ne doit pas dépendre d’autres facteurs déterminés lors de l’exécution du code).

En situation réelle, ici, ce seront les visiteurs qui, lors de leur inscription, vont déclencher la création de nouveaux objets (qui vont être créés via notre classe Utilisateur.

Bien évidemment, réaliser le script complet qui va permettre cela est hors de question à ce niveau du cours. Nous allons donc nous contenter dans la suite de cette partie de créer de nouveaux objets manuellement pour pouvoir illustrer les différents concepts et leur fonctionnement.

Créons donc deux objets $pierre et $mathilde à partir de notre classe Utilisateur puis définissons ensuite des valeurs spécifiques pour les propriétés $user_name et $user_pass pour chaque objet.

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
            
            $pierre = new Utilisateur();
            $mathilde = new Utilisateur();
            
            $pierre->user_name = 'Pierre';
            $pierre->user_pass = 'abcdef';
            
            $mathilde->user_name = 'Math';
            $mathilde->user_pass = 123456;
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

Ici, vous pouvez à nouveau observer une syntaxe que nous ne connaissons pas encore qui utilise le symbole ->. Expliquons ce qu’il se passe ici.

Avant tout, souvenez-vous que les objets créés à partir d’une classe partagent ses propriétés et ses méthodes puisque chaque objet contient une « copie » de la classe.

Pour accéder aux propriétés définies originellement dans la classe depuis nos objets, on utilise l’opérateur -> qui est appelé opérateur objet.

Cet opérateur sert à indiquer au PHP qu’on souhaite accéder à un élément défini dans notre classe via un objet créé à partir de cette classe. Notez qu’on ne précise pas de signe $ avant le nom de la propriété à laquelle on souhaite accéder dans ce cas.

Dans le cas présent, on va pouvoir accéder à notre propriété depuis notre objet (c’est-à-dire depuis l’extérieur de notre classe) car nous l’avons définie avec le mot clef public.

Notez cependant qu’il est généralement considéré comme une mauvaise pratique de laisser des propriétés de classes accessibles directement depuis l’extérieur de la classe et de mettre à jour leur valeur comme cela car ça peut poser des problèmes de sécurité dans le script.

Pour manipuler des propriétés depuis l’extérieur de la classe, nous allons plutôt créer des fonctions de classe dédiées afin que personne ne puisse directement manipuler nos propriétés et pour protéger notre script.

# Les méthodes : définition et usage

Nous allons également pouvoir déclarer des fonctions à l’intérieur de nos classes.

Les fonctions définies à l’intérieur d’une classe sont appelées des méthodes. Là encore, nous utilisons un nom différent pour bien les différencier des fonctions créées en dehors des classes.

Une méthode est donc tout simplement une fonction déclarée dans une classe. On va pouvoir créer des méthodes dans nos classes dont le rôle va être d’obtenir ou de mettre à jour les valeurs de nos propriétés.

Dans notre classe Utilisateur, nous allons par exemple pouvoir créer trois méthodes qu’on va appeler getNom(), setNom() et setPass().

Le rôle de getNom() va être de récupérer la valeur contenue dans la propriété $user_name.

Les rôles de setNom() et de setPass() vont être respectivement de définir ou de modifier la valeur contenue dans les propriétés $user_name et $user_pass relativement à l’objet courant (la valeur de la propriété ne sera modifiée que pour l’objet couramment utilisé).

Profitez-en pour noter que les méthodes qui servent à définir / modifier / mettre à jour une valeur sont appelées des setters. Généralement, on fera commencer leur nom par set afin de bien les identifier comme on l’a fait pour nos méthodes setNom() et setPass().

De même, les méthodes qui servent à récupérer des valeurs sont appelées des getters et on fera commencer leur nom par get. Ces notations sont des conventions qui ont pour but de clarifier les scripts et de simplifier la vie des développeurs.

Rajoutons nos méthodes à l’intérieur de notre classe :

```php
<?php
    class Utilisateur{
        private $user_name;
        private $user_pass;

        public function getNom(){
            return $this->user_name;
        }

        public function setNom($new_user_name){
            $this->user_name = $new_user_name;
        }

        public function setPasse($new_user_pass){
            $this->user_pass = $new_user_pass;
        }
    }
?>
```

Il y a beaucoup de nouvelles choses dans ce code que nous allons décortiquer ligne par ligne.

Tout d’abord, vous pouvez commencer par noter qu’on a modifié le niveau d’accessibilité (c’est-à-dire la portée) de nos propriétés $user_name et $user_pass dans la définition de notre classe en modifiant le mot clef devant la déclaration de nos propriétés.

En effet, nous avons utilisé le mot clef private à la place de public qui signifie que nos propriétés ne sont désormais plus accessibles que depuis l’intérieur de la classe.

En revanche, nous avons utilisé le mot clef $public devant nos deux méthodes afin de pouvoir les utiliser depuis l’extérieur de la classe.

Ensuite, vous devriez également avoir remarqué qu’on utilise un nouveau mot clef dans ces deux méthodes : le mot clef $this. Ce mot clef est appelé pseudo-variable et sert à faire référence à l’objet couramment utilisé.

Cela signifie que lorsqu’on va appeler une méthode de classe depuis un objet, la pseudo-variable $this va être remplacée (substituée) par l’objet qui utilise la méthode actuellement.

Prenons un exemple concret afin que vous compreniez bien ce point important. Pour cela, retournons dans notre fichier de script principal et modifions quelques lignes comme cela :

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
            
            $pierre = new Utilisateur();
            $mathilde = new Utilisateur();
            
            $pierre->setNom('Pierre');
            $pierre->setPasse('abcdef');
            
            echo $pierre->getNom(). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-manipulation-propriete-methode-classe-resultat.png)

Ici, on inclut notre fichier de classe puis on instancie ensuite notre classe et on stocke cette instance dans un objet qu’on appelle $pierre.

On va pouvoir accéder à nos méthodes setNom(), getNom() et setPass() définies dans notre classe depuis notre objet puisqu’on a utilisé le mot clef public lorsqu’on les a déclarées.

En revanche, on ne va pas pouvoir accéder directement aux propriétés définies dans la classe puisqu’elles sont privées. On ne va donc pouvoir les manipuler que depuis l’intérieur de la classe via nos méthodes publiques.

On commence donc par utiliser nos méthodes setNom() et setPass() pour définir une valeur à stocker dans nos propriétés $user_name et $user_pass.

Pour cela, on utilise à nouveau l’opérateur objet -> pour exécuter notre méthode depuis notre objet.

Les méthodes setNom() et setPass() vont chacune avoir besoin qu’on leur passe un argument pour fonctionner normalement. Ces arguments vont correspondre au nom d’utilisateur et au mot de passe choisis par l’utilisateur qu’on va stocker dans les propriétés $user_name et $user_pass relatives à notre instance.

Note : encore une fois, en pratique, nous recevrons ces données de l’utilisateur lui-même. Il faudra donc bien faire attention à les vérifier et à les traiter (comme n’importe quelle autre donnée envoyée par l’utilisateur) avant d’effectuer toute opération afin d’être sûr que les données envoyées sont conformes au format attendu et ne sont pas dangereuses. Pour le moment, nous nous passons de cette étape.

Comme je vous l’ai dit plus haut, la pseudo-variable $this dans le code de notre méthode sert à faire référence à l’objet couramment utilisé.

Dans le cas présent, la ligne $this->user_name = $new_user_name signifie littéralement que l’on souhaite stocker dans la propriété $user_name définie dans notre classe le contenu de $new_user_name (c’est-à-dire l’argument qui va être passé) POUR un objet en particulier et en l’occurrence ici pour $pierre. La pseudo-variable $this fait référence dans ce cas à $pierre.

De la même façon, on retourne le contenu de $user_name relatif à notre objet $pierre grâce à getNom().

Créons immédiatement un deuxième objet afin de bien illustrer une nouvelle fois le fait que $this sert de référence à l’objet couramment utilisé.

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
            
            $pierre = new Utilisateur();
            $mathilde = new Utilisateur();
            
            $pierre->setNom('Pierre');
            $pierre->setPasse('abcdef');
            
            $mathilde->setNom('Math');
            $mathilde->setPasse(123456);
            
            echo $pierre->getNom(). '<br>';
            echo $mathilde->getNom(). '<br>';
        ?>
        <p>Un paragraphe</p>
    </body>
</html>
```

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-manipulation-propriete-methode-classe-resultat-2.png)

Comme vous pouvez le voir, on se sert ici de la même classe au départ qu’on va instancier plusieurs fois pour créer autant d’objets. Ces objets vont partager les propriétés et méthodes définies dans la classe qu’on va pouvoir utiliser de manière indépendante avec chaque objet.

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

# Encapsulation et visibilité des propriétés et méthodes PHP
Nous allons présenter le principe d’encapsulation et comprendre ses enjeux et intérêt et allons voir comment implémenter ce principe en pratique via les niveaux de visibilité des propriétés, méthodes et des constantes de classe.

Nous étudierons plus en détail les constantes dans une prochaine leçon, je n’en parlerai donc pas véritablement ici. 
