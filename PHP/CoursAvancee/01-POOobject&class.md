# Introduction à la programmation orientée objet PHP : classes, instances et objets

- <https://youtu.be/DhMcHjDOitE>
- <https://youtu.be/HUhjN12HZR0>

Nous allons redécouvrir le PHP sous un nouvel angle avec la programmation orientée objet. La programmation orientée objet est une façon différente de coder qui va suivre des règles différentes et va amener une syntaxe différente, ce qui fait qu’elle peut être perçue comme difficile à comprendre pour des débutants.

Je vais essayer de vous présenter le PHP orienté objet étape par étape et vous conseille fortement de ne pas faire l’impasse sur cette partie car cette nouvelle façon d’écrire son code va posséder des avantages indéniables qu’on va illustrer ensemble et est l’une des grandes forces du PHP.

Par ailleurs, il convient de noter que de nombreux langages serveurs possèdent une écriture orientée objet car encore une fois cette façon de coder va s’avérer très puissante.

# Qu’est-ce que la programmation orientée objet (POO) ?

La programmation orientée objet (ou POO en abrégé) correspond à une autre manière d’imaginer, de construire et d’organiser son code.

Jusqu’à présent, nous avons codé de manière procédurale, c’est-à-dire en écrivant une suite de procédures et de fonctions dont le rôle était d’effectuer différentes opérations sur des données généralement contenues dans des variables et ceci dans leur ordre d’écriture dans le script.

La programmation orientée objet est une façon différente d’écrire et d’arranger son code autour de ce qu’on appelle des objets. Un objet est une entité qui va pouvoir contenir un ensemble de fonctions et de variables.

L’idée de la programmation orientée objet va donc être de grouper des parties de code qui servent à effectuer une tâche précise ensemble au sein d’objets afin d’obtenir une nouvelle organisation du code.

Les intérêts principaux de la programmation orientée objet vont être une structure générale du code plus claire, plus modulable et plus facile à maintenir et à déboguer.

La programmation orientée objet va introduire des syntaxes différentes de ce qu’on a pu voir jusqu’à présent et c’est l’une des raisons principales pour lesquelles le POO en PHP est vu comme une chose obscure et compliquée par les débutants.

Au final, si vous arrivez à comprendre cette nouvelle syntaxe et si vous faites l’effort de comprendre les nouvelles notions qui vont être amenées, vous allez vous rendre compte que la POO n’est pas si complexe : ce n’est qu’une façon différente de coder qui va amener de nombreux avantages.

Pour vous donner un aperçu des avantages concrets de la POO, rappelez-vous du moment où on a découvert les fonctions prêtes à l’emploi en PHP. Aujourd’hui, on les utilise constamment car celles-ci sont très pratiques : elles vont effectuer une tâche précise sans qu’on ait à imaginer ni à écrire tout le code qui les fait fonctionner.

Maintenant, imaginez qu’on dispose de la même chose avec les objets : ce ne sont plus des fonctions mais des ensembles de fonctions et de variables enfermées dans des objets et qui vont effectuer une tâche complexe qu’on va pouvoir utiliser directement pour commencer à créer des scripts complexes et complets !

# Classes, objets et instance : première approche

La programmation orientée objet se base sur un concept fondamental qui est que tout élément dans un script est un objet ou va pouvoir être considéré comme un objet. Pour comprendre ce qu’est précisément un objet, il faut avant tout comprendre ce qu’est une classe.

Une classe est un ensemble cohérent de code qui contient généralement à la fois des variables et des fonctions et qui va nous servir de plan pour créer des objets. Le but d’une classe va donc être de créer des objets que nous allons ensuite pouvoir manipuler.

Il est généralement coutume d’illustrer ce que sont les objets et les classes en faisant des parallèles avec la vie de tous les jours. De manière personnelle, j’ai tendance à penser que ces parallèles embrouillent plus qu’ils n’aident à comprendre et je préfère donc vous fournir ici un exemple plus concret qui reste dans le cadre de la programmation.

Imaginons qu’on possède un site sur lequel les visiteurs peuvent s’enregistrer pour avoir accès à un espace personnel par exemple. Quand un visiteur s’enregistre pour la première fois, il devient un utilisateur du site.

Ici, on va essayer de comprendre comment faire pour créer le code qui permet cela. Pour information, ce genre de fonctionnalité est quasiment exclusivement réalisé en programmation orienté objet.

Qu’essaie-t-on de réaliser ici ? On veut « créer » un nouvel utilisateur à chaque fois qu’un visiteur s’enregistre à partir des informations qu’il nous a fournies. Un utilisateur va être défini par des attributs comme son nom d’utilisateur ou son mot de passe. Ces attributs vont être des variables. Ensuite, un utilisateur va pouvoir réaliser certaines actions spécifiques comme se connecter, se déconnecter, modifier son profil, etc. Ces actions vont être des fonctions.

Nous allons donc définir les attributs et actions / fonctions de notre utilisateur. Pour cela, on va créer un formulaire d’inscription sur notre site qui va demander un nom d’utilisateur et un mot de passe d’un côté, et allons devoir côté serveur récupérer ces informations et les associer à un utilisateur en précisant qu’il s’agit du nom d’utilisateur et du mot de passe. On va également définir les actions (fonctions) propres à nos utilisateurs : connexion, déconnexion, possibilité de commenter, etc.

Sur notre site, on s’attend à avoir régulièrement de nouveaux visiteurs qui s’inscrivent et donc de nouveaux utilisateurs. Il est donc hors de question de définir toutes ces choses manuellement à chaque fois.

A la place, on va plutôt créer un bloc de code qui va initialiser nos variables nom d’utilisateur et mot de passe par exemple et qui va définir les différentes actions que va pouvoir faire un utilisateur.

Ce bloc de code est le plan de base qui va nous servir à créer un nouvel utilisateur. On va également dire que c’est une classe. Dès qu’un visiteur s’inscrit, on va pouvoir créer un nouvel objet « utilisateur » à partir de cette classe et qui va disposer des variables et fonctions définies dans la classe. Lorsqu’on crée un nouvel objet, on dit également qu’on « instancie » ou qu’on crée une instance de notre classe.

Une classe est donc un bloc de code qui va contenir différentes variables, fonctions et éventuellement constantes et qui va servir de plan de création pour différents objets. Chaque objet créé à partir d’une même classe dispose des mêmes variables, fonctions et constantes définies dans la classe mais va pouvoir les implémenter différemment.

# Classes et objets : exemple de création

Reprenons notre exemple précédent et créons une première classe qu’on va appeler Utilisateur. Bien évidemment, nous n’allons pas créer tout un script de connexion utilisateur ici, mais simplement définir une première classe très simple.

En PHP, on crée une nouvelle classe avec le mot clef class. On peut donner n’importe quel nom à une nouvelle classe du moment qu’on n’utilise pas un mot réservé du PHP et que le premier caractère du nom de notre classe soit une lettre ou un underscore.

Par convention, on placera généralement chaque nouvelle classe créée dans un fichier à part et on placera également tous nos fichiers de classe dans un dossier qu’on pourra appeler classes par exemple pour plus de simplicité.

Comme je vous l’ai dit plus haut, l’un des grands avantages de la POO se situe dans la clarté du code produit et cette clarté est notamment le résultat d’une bonne séparation du code.

On n’aura ensuite qu’à inclure les fichiers de classes nécessaires à l’exécution de notre script principal dans celui-ci grâce à une instruction require par exemple.

On va donc créer un nouveau fichier en plus de notre fichier principal cours.php qu’on va appeler utilisateur.class.php. Notez qu’on appellera généralement nos fichiers de classe « maClasse.class.php » afin de bien les différencier des autres et par convention une nouvelle fois.

Dans ce fichier de classe, nous allons donc pour le moment tout simplement créer une classe Utilisateur avec le mot clef class.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-poo-creation-classe.png)

Pour le moment, notre classe est vide. Vous pouvez remarquer que la syntaxe générale de déclaration d’une classe ressemble à ce qu’on a déjà vu avec les fonctions.

Nous allons également directement en profiter pour inclure notre classe dans notre fichier principal cours.php avec une instruction require. Ici, mon fichier de classe est dans un sous-dossier « classes » par rapport à mon fichier principal.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-poo-require-classe.png)

Ensuite, nous allons rajouter la ligne suivante dans notre script principal :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-poo-instance-classe.png)

Ci-dessus, nous avons créé ce qu’on appelle une nouvelle instance de notre classe Utilisateur.

La syntaxe peut vous sembler particulière et c’est normal : rappelez-vous que je vous ai dit que le PHP orienté objet utilisait une syntaxe différente du PHP conventionnel.

Ici, le mot clef new est utilisé pour instancier une classe c’est-à-dire créer une nouvelle instance d’une classe.

Une instance correspond à la « copie » d’une classe. Le grand intérêt ici est qu’on va pouvoir effectuer des opérations sur chaque instance d’une classe sans affecter les autres instances.

Par exemple, imaginons que vous créiez deux nouveaux fichiers avec le logiciel Word. Chaque fichier va posséder les mêmes options : vous allez pouvoir changer la police, la taille d’écriture, etc. Cependant, le fait de personnaliser un fichier ne va pas affecter la mise en page du deuxième fichier.

A chaque fois qu’on instancie une classe, un objet est également automatiquement créé. Les termes « instance de classe » et « objet » ne désignent pas fondamentalement la même chose mais dans le cadre d’une utilisation pratique on pourra très souvent les confondre et c’est ce que nous allons faire dans ce cours.

Pour information, la grande différence est que chaque instance de classe est unique et peut donc être identifiée de manière unique ce qui n’est pas le cas pour les objets d’une même classe.

Lorsqu’on instancie une classe, un objet est donc créé. Nous allons devoir capturer cet objet pour l’utiliser. Pour cela, nous allons généralement utiliser une variable qui deviendra alors une « variable objet » ou plus simplement un « objet ».

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-poo-creation-objet.png)

Pour être tout à fait précis, notre variable en question ne va exactement contenir l’objet en soi mais plutôt une référence à l’objet. Nous reparlerons de ce point relativement complexe en fin de partie et allons pour le moment considérer que notre variable contient notre objet.

# Classes, instances et objets : l’essentiel à retenir

Une classe est un « plan d’architecte » qui va nous permettre de créer des objets qui vont partager ses variables et ses fonctions. Chaque objet créé à partir d’une classe va disposer des mêmes variables et fonctions définies dans la classe mais va pouvoir implémenter ses propres valeurs.

Pour l’instant, nous n’avons créé qu’une classe vide et donc il est possible que vous ne compreniez pas encore l’intérêt des classes. Dès le chapitre suivant, nous allons inclure des variables et des fonctions dans notre classe et plus le cours va avancer, plus vous allez comprendre les différents avantages de programmer en orienté objet et des classes. Je ne peux juste pas tout vous révéler d’un coup, il va falloir y aller brique après brique.

Pour créer un objet, il faut instancier la classe en utilisant le mot clef new. Une instance est une « copie » de classe. On va stocker notre instance ou notre objet dans une variable pour pouvoir l’utiliser.

Pour vous donner finalement un parallèle avec la vie de tous les jours, imaginez le plan de création de base d’un modèle de voiture. Ce plan va définir les différents éléments des voitures, c’est-à-dire de quoi va être composée chaque voiture (un moteur, des portes, des roues, une peinture, etc.) ainsi que les actions de chaque voiture, c’est-à-dire ce que peut faire chaque voiture (accélérer, allumer les phares, etc.).

Nous allons pouvoir créer des voitures à partir de ce plan qui va être l’équivalent d’une classe et chaque voiture créée à partir de celui-ci va posséder les éléments (= variables) et actions (= fonctions) définies dans le plan. Les voitures créées sont ici nos objets.

Cependant, les éléments vont pouvoir avoir des apparences différentes : chaque voiture va posséder un moteur mais le moteur va pouvoir être différent pour chaque voiture (plus ou moins puissant). De même, chaque voiture va posséder une couleur mais la couleur de chaque voiture va pouvoir être différente.

Chaque voiture créée à partir du plan va avoir accès au même nombre d’actions mais les différentes actions des voitures vont être différentes en fonction des éléments de chaque voiture : chaque voiture va pouvoir accélérer mais une voiture avec un moteur plus puissant va accélérer plus vite qu’une autre qui possède un moteur plus petit.

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
