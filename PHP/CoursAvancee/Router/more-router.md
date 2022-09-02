# Créer un Router 

- Tutoriel PHP - Créer un Router : https://youtu.be/I-DN2C7Gs7A
- Créer un routeur : https://youtu.be/20bdeEutfuo?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3
- Améliorer le routeur : https://youtu.be/CkvmU9TR1Zo?list=PLeeuvNW2FHViGGhcU0Q-6jqOJeizLiql3
- CRÉER UN ROUTER : https://youtu.be/Q9PZXoe-aAE

Dans ce tutoriel je vous propose de découvrir comment créer un Router pour gérer l'éxécution d'un certain code suivant l'URL qui est tapée par l'utilisateur.

# Pourquoi un Router ?

Avant même de commencer pourquoi s'emmerder à créer un router en PHP ? Il est en effet tout à fait possible de gérer vos urls gràce au RewriteEngine d'apache ou le ngx_http_rewrite_module de nginx.
Le principal problème de cette méthode c'est que l'on va devoir adapter notre serveur à chaque déploiement pour y injecter les règles. En plus, on ne va pas se mentir la réécriture d'URL c'est chiant !

![](https://nouvelle-techno.fr/assets/uploads/content/d538ebe865ce5e6faae82369dcdbc680.jpg)

Le router va donc devenir le point d'entrée de notre application et on redirigera toutes les URLs vers ce fichier. Pour cela, on ne peut malheureusement pas y couper il nous faudra créer un fichier.htaccess ou créer la redirection dans notre configuration nginx.

```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```

![](https://nouvelle-techno.fr/assets/uploads/content/a744bc867d52a9ac92a00bef20295f06.jpg)

#  Le fichier index.php

Nous allons maintenant devoir gérer les données de l'URL dans le fichier index.php.

Avant d'écrire notre routeur, nous allons appeler dans ce fichier le contrôleur et le modèle principaux qui serviront de base commune à tous les fichiers.

Afin d'assurer la portabilité du projet sur toutes les configurations, nous allons baser nos appels sur un chemin généré automatiquement. Nous allons le sauvegarder dans une constante que nous appellerons "ROOT".

Cette constante sera générée depuis une des informations stockées dans la super globale "$_SERVER" qui contient le chemin complet vers notre fichier.

Nous y enlèverons uniquement le nom de fichier "index.php" au moyen de la fonction php "str_replace".

```php
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
```

Nous pouvons maintenant utiliser "ROOT" pour appeler nos fichiers

```php
require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');
```

# Les classes principales

On va ensuite créer des fonctions correspondantes aux différentes méthodes HTTP (GET, POST, PUT et DELETE). Nous allons commencer par la méthode get() qui prendra 2 paramètres

- L'URL à capturer
- La méthode à appeller lorsque cette URL est capturé. On va pour cela utiliser les fonctions anonymes qui ont fait leur apparition récemment.

Afin de ne pas se retrouver avec un code beaucoup trop volumineux, nous allons créer une nouvelle classe qui servira à instancier une route.

```php
public function get($path, $callable){
    $route = new Route($path, $callable);
    $this->routes["GET"][] = $route;
    return $route; // On retourne la route pour "enchainer" les méthodes
}
``` 

Afin d'améliorer les performances lors du matching on groupera les routes par méthodes afin de ne pas tout se retaper lors du parcours des URLs. Enfin, il nous faudra une nouvelle méthode pour déclencher le matching.

```php
public function run(){
    if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
        throw new RouterException('REQUEST_METHOD does not exist');
    }
    foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
        if($route->match($this->url)){
            return $route->call();
        }
    }
    throw new RouterException('No matching routes');
}
```

Cette fonction va parcourir les différentes routes préalablement enregistrées et vérifier si la route correspond à l'URL qui est passé au contructeur, ceci gràce à la fonction match() de notre Route. Si aucune route ne correspond à l'URL ou à la méthode alors nous allonrs renvoyer une Exception qui pourra ensuite être capturée pour gérer un affiche correcte des erreurs.

# La classe Route

La classe Route va représenter une route et contiendra plusieurs méthodes dont notamment la méthode match($url) qui permettra de s'avoir si la route valide l'URL.

```php
class Route {
    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable){
        $this->path = trim($path, '/');  // On retire les / inutils
        $this->callable = $callable;
    }

    /**
    * Permettra de capturer l'url avec les paramètre 
    * get('/posts/:slug-:id') par exemple
    **/
    public function match($url){
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;  // On sauvegarde les paramètre dans l'instance pour plus tard
        return true;
    }
}
```

Ensuite, on va ajouter une méthode permettant d'éxécuter la fonction anonyme en lui passant les paramètres récupérés lors du preg_match().

```php
public function call(){
    return call_user_func_array($this->callable, $this->matches);
}
```

# Utilisation
Maintenant que notre base est posée nous allons pouvoir créer nos premières routes dans notre index.php.
```php
$router = new Router($_GET['url']); 
$router->get('/', function($id){ echo "Bienvenue sur ma homepage !"; }); 
$router->get('/posts/:id', function($id){ echo "Voila l'article $id"; }); 
$router->run(); 
```

# Améliorations
Première amélioration, on va ajouter une méthode pour gérer l'expression régulière qui servira à capturer les paramètres. Pour cela on va ajouter une méthode with($param, $regex) à notre classe Route.

```php
public function with($param, $regex){
    $this->params[$param] = str_replace('(', '(?:', $regex);
    return $this; // On retourne tjrs l'objet pour enchainer les arguments
}
```

Il faudra du coup modifier la fonction match() pour utiliser ces nouveaux paramètres.
```php
public function match($url){
    $url = trim($url, '/');
    $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
    $regex = "#^$path$#i";
    if(!preg_match($regex, $url, $matches)){
        return false;
    }
    array_shift($matches);
    $this->matches = $matches;
    return true;
}

private function paramMatch($match){
    if(isset($this->params[$match[1]])){
        return '(' . $this->params[$match[1]] . ')';
    }
    return '([^/]+)';
}
```

On va aussi ajouter une méthode qui permettra de générer une url en passant les paramètres.

```php
public function getUrl($params){
    $path = $this->path;
    foreach($params as $k => $v){
        $path = str_replace(":$k", $v, $path);
    }
    return $path;
}
```

Enfin, on va modifier notre méthode call() pour gérer un callback qui sera une chaine de caractère. Par exemple, on pourra faire appel à un controller en mettant Posts#show qui fera appel à la class PostsController et à la méthode show().

```php
public function call(){
    if(is_string($this->callable)){
        $params = explode('#', $this->callable);
        $controller = "App\\Controller\\" . $params[0] . "Controller";
        $controller = new $controller();
        return call_user_func_array([$controller, $params[1]], $this->matches);
    } else {
        return call_user_func_array($this->callable, $this->matches);
    }
}
```

Il faudra du coup modifier notre class Router pour gérer ces nouveaux paramètres et on va en profiter pour pouvoir nommer nos routes

```php
class Router {
    private $url;
    private $routes = [];
    private $namedRoutes = [];

    public function __construct($url){
        $this->url = $url;
    }

    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    private function add($path, $callable, $name, $method){
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if(is_string($callable) && $name === null){
            $name = $callable;
        }
        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
    }

    public function url($name, $params = []){
        if(!isset($this->namedRoutes[$name])){
            throw new RouterException('No route matches this name');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }

}
```

Comme vous le voyez, créer une petite classe pour capturer nos URLs n'a rien de bien compliqué. Le gros avantage ici, est que l'on a la main sur la totalité de notre code et que l'on pourra l'adapter à nos besoins.

# AltoRouter

-  Le router : https://youtu.be/tbYa0rJQyoM

En général on va chercher à rediriger toutes les requêtes vers un fichier index.php qui servira de carrefour, et qui inclura les bons fichiers en fonction de l'URL. Cette logique peut être écrite à la main où on peut se reposer sur une librairie pour gérer les fichiers à inclure en fonction du chemin.

Par exemple avec [AltoRouter](https://github.com/dannyvankooten/AltoRouter) ou [AltoRouter](http://altorouter.com/):

```php
require '../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');

$match = $router->match();

require '../elements/header.php';

if (is_array($match)) {
    $params = $match['params'];
    require "../templates/{$match['target']}.php";
} else {
    require "../templates/404.php";
}

require '../elements/footer.php';
```

Dans cette vidéo j'utilise la version 1.2 d'AltoRouter, vous pouvez installer la même version que moi à l'aide de la commande require de composer.

```
composer require altorouter/altorouter:1.2.0
```