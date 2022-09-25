# Controller et Routes

## Présentation

**Une route permet de diriger une url (ou un pattern d'url) vers une méthode de controller appelée Action.**

[La documentation officielle de Symfony sur les routes](https://symfony.com/doc/current/routing.html) et [La documentation officielle de Symfony sur les controllers](https://symfony.com/doc/current/controller.html)

Il est possible de décrire des routes selon les formats de fichiers : XML, JSON, Classe PHP et en annotation. Pour plus de commodité nous utiliserons **les Attributes**.

## Structures d'une route

Une route peut être **constante** : /blog ou **dynamique** : /blog/{slug} Ici slug englobé de **{ }** devient une variable dynamique qui prend tous les caractères alphanumériques par exemple : /blog/42 ou /blog/lorem-ipsum ou /blog/titi-32_tata Ces 3 urls correspondent à la méthode ciblée par la route avec une variable slug différente. Cette variable peut être récupérée par le controller.

```php
#[Route('/blog/{slug}', name:'article_blog')]
public function article($slug)
{
    ...
}
```

* Une route est au minimum **un chemin (path) et un nom**
* Ces variables peut être mise par défaut grâce à "defaults"
* Ces variables peuvent être soumises à une validation de format via "requirements"

```php
#[Route('/{id}', name:'index', requirements:['id'=>'\d+'], defaults=['id'=>1])]
public function index($id)
{
    ...
}
```

* On peut définir un path différent en fonction de la locale
* Vous pouvez cumuler plusieurs routes pour une méthode Action
* On peut spécifier le moyen d'accès à une route (GET, POST, PUT, ...), avec le paramètre "methods"

## Annotations

Pour pouvoir utiliser les Attributes il faut :

```php
use Symfony\Component\Routing\Annotation\Route;
```

à ajouter après le namespace dans votre Controller.

[Compléments sur les annotations et les attributes](http://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/routing.html)

## Routes et paramètres

On définit une variable d'url via des accolades {ma_variable} :

```php
#[Route("/page", name="blog_index")]
#[Route("/page/{page}", name="blog_index")]
public function indexAction($page = "nopage")
{
    echo $page;
}
```

Ici on a deux routes pour la méthode indexAction avec une variable $page qui est à nopage si on accède à l'url /page.

On peut cumuler plusieurs variables :

```php
#[Route("/page/{page}/{subpage}", name="blog_index")]
public function indexAction($page, $subpage)
{
    echo $page.' '.$subpage;
}
```

## Génération d'url

Pour générer une url en PHP on utilise :

```php
$this->generateUrl('nom_de_la_route', [$variables]);
```

Ou sous TWIG on a deux fonctions :

```php
{{ path('nom_route', {'page': 'toto', 'vars2': 'titi'} ) }}

{{ url('nom_route', {'page': 'toto', 'vars2': 'titi'} ) }}
```

## Controller

Les routes redirigent vers une méthode de Controller (une action); un controller Symfony se nomme de la sorte : NomDuController où le suffixe **Controller** est obligatoire et le nom du fichier et de la classe est en **CamelCase**.

Les différentes méthodes se nomment de la sorte :

**nomDeLaMethode** est lui en **miniCamelCase**

_L'usage du suffixe Action n'est plus requis dans Symfony._

Dans le cas idéal, le controller doit contenir le minimum de code possible (20 lignes maximum selon les standards de Symfony). Il ne doit que faire le lien entre les différents éléments de l'application et une réponse.

## Response

Une Action renvoie toujours un type Response ; il existe plusieurs type de Response : JsonResponse, RedirectResponse, HttpResponse, BinaryFileResponse etc ...

La plus utilisée est Response pour l'utiliser on va ajouter dans le "use" suivant :

```php
use Symfony\Component\HttpFoundation\Response;
```

et dans la méthode action on :

```php
public function index(){
    return new Response('Ma response');
}
```

Affiche à l'écran Ma response. Dans l'état cette réponse n'est pas du HTML, car rien n'est précisé dans le retour de la méthode.

Une méthode render() (définie quand la classe AbstractController dont votre controller doit hériter) permet aux Actions de récupérer une vue et d'afficher le contenu de la vue compilée avec les différentes variables envoyées.

```php
#[Route("/", name:"page")]
public function index() 
{
    // votre code

    return $this->render('default/index.html.twig', 
        ['variable' => $variable]
    );
}
```

Ici on va récupérer le template présent dans templates/default/index.html.twig pour affecter la variable _variable_.

## Exercice 1

* Créer 2 nouvelles pages :
  * [http://localhost/time/now](http://localhost/time/now) : afficher la date l'heure  minute et seconde
  * [http://localhost/color/blue](http://localhost/color/blue) : affiche "blue" à l'écran dynamiquement
  * [http://localhost/color/red](http://localhost/color/red) : affiche "red" à l'écran dynamiquement
  * Ajouter un menu avec des liens vers les 2 pages créées.

## Manipuler les requests

L'objet "request" contient toutes les données envoyées par l'utilisateur (formulaire, ...), mais aussi les données envoyées par le navigateur.

En passant en paramètre un objet de type Request, on peut le manipuler selon les méthodes ci-dessous.

_Passer un objet en paramètre de cette manière est ce que l'on nomme de l'injection de dépendance. Le lien est fait automatiquement par Symfony grâce au mécanisme d'autowiring._

```php
use Symfony\Component\HttpFoundation\Request;

public function index(Request $request)
{
    $request->isXmlHttpRequest(); // is it an Ajax request?

    $request->getPreferredLanguage(array('en', 'fr'));

    // retrieves GET and POST variables respectively
    $request->query->get('page');
    $request->request->get('page');

    // retrieves SERVER variables
    $request->server->get('HTTP_HOST');

    // retrieves an instance of UploadedFile identified by foo
    $request->files->get('foo');

    // retrieves a COOKIE value
    $request->cookies->get('PHPSESSID');

    // retrieves an HTTP request header, with normalized, lowercase keys
    $request->headers->get('host');
    $request->headers->get('content_type');
}
```

## Exercice 2

Ajoutez une méthode (route, méthode et vue) qui permet de récupérer l'IP du client. On peut utiliser la méthode getClientIp() de l'objet request.
