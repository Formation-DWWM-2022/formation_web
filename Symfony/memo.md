# A Symfony Cheatsheet

# Installation et mise en place

Installation

```
symfony new my_project_directory --webapp
```

Faire fonctionner les url rewritting

```
composer config extra.symfony.allow-contrib true
composer req symfony/apache-pack
```

Créer un fichier env.local à partir du fichier .env

```
composer dump-env dev
```

Installer les assets des bundle
```
php bin/console assets:install
```

# Générateurs de codes

Créer un controlleur

```
php bin/console make:controller DefaultController
```

Créer une nouvelle entité

```
php bin/console make:entity
```

Regénérer les getters et setters

```
php bin/console make:entity --regenerate "App\Entity\User"
```

Générer un CRUD

```
php bin/console make:crud User
```

Générer un Form

```
php bin/console make:form
```

# Opérations sur la base de données

Créer la base de données

```
php bin/console doctrine:database:create
```

Créer une migration

```
php bin/console make:migration
```

Voir le diff de migration

```
php bin/console doctrine:migrations:diff
```

Migrer

```
php bin/console doctrine:migrations:migrate
```

Dump SQL des modifications de schéma

```
php bin/console doctrine:schema:update --dump-sql
```

Exporter la BDD dans un fichier dump.sql

```
php bin/console doctrine:schema:create --dump-sql > dump.sql
```

Mettre à jour le schema de base de données

```
php bin/console doctrine:schema:update --force
```

# Autres commandes

Vider le cache

```
php bin/console cache:clear
```

Encoder un mot de passe
```
php bin/console security:encode-password
```

# Controller
## Routes

Named route returning (or rendering) a twig template:

```php
/**
 * @Route("/project", name="index")
 */
public function index()
{
    return $this->render('project/index.html.twig', [
        'controller_name' => 'ProjectController',
    ]);
}

```

An API-route returning JSON. The route is restricted to POST requests:

```php
/**
 * @Route("/project/toggle", name="project_toggle", methods={"POST"})
 */
public function index()
{
    return $this->json(['value' => rand(0, 10)]);
    // or:
    // return new JsonResponse(['value' => rand(0, 10)]);
}
```

## Route with parameters having requirements

```php
/**
 * @Route("/project/{id}", requirements={"id"="\d+"}, name="project_show")
 */
public function show($id)
{
    return new Response("Test $id");
}
```

It's also possible to write the requirements directly after the parameter in the route string enclosed in < >

```php
/**
 * @Route("/project/{id<\d+>}", name="project_show")
 */
```

## Parameter-Converter

The parameter converter automatically fetches entity objects rom the database from route parameters. In this example a BlogPost object is automatically created if the Parameter slug can be associated with a post:

```php
/**
 * @Route("/blog/{slug}", name="blog_show")
 */
public function show(BlogPost $post)
{
    // $post is the object whose slug matches the routing parameter

    // ...
}
```

It is sufficient to specify a type hint for the parameter. If a post cannot be found, a 404 page is generated automatically.

Here is an example if you have several parameters that are to be converted. The comment entity has to be specially 'mentioned' since we're in the blog controller:

```php
/**
* @Route("/blog/{id}/comments/{comment_id}")
* @Entity("comment", expr="repository.find(comment_id)")
*/
public function show(Post $post, Comment $comment)
{
    // ...
}
```

More info on the parameter converter can be found here.

## Redirects

```php
// ...
public function index()
{
    // redirects to the "homepage" route
    return $this->redirectToRoute('homepage');

    // redirectToRoute is a shortcut for:
    // return new RedirectResponse($this->generateUrl('homepage'));

    // does a permanent - 301 redirect
    return $this->redirectToRoute('homepage', [], 301);

    // redirect to a route with parameters
    return $this->redirectToRoute('app_lucky_number', ['max' => 10]);

    // redirects to a route and maintains the original query string parameters
    return $this->redirectToRoute('blog_show', $request->query->all());

    // redirects externally
    return $this->redirect('http://symfony.com/doc');
}
```

## Flash messages

Flash messages are used to display messages to users once.
Create messages

```php
use Symfony\Component\HttpFoundation\Request;

public function update(Request $request)
{
    $this->addFlash('notice', 'Your changes were saved!');
    // $this->addFlash() is equivalent to $request->getSession()->getFlashBag()->add()
}
```

## Show messages

```php
{# read and display just one flash message type #}
{% for message in app.flashes('notice') %}
    <div class="flash-notice">
        {{ message }}
    </div>
{% endfor %}

{# read and display several types of flash messages #}
{% for label, messages in app.flashes(['success', 'warning']) %}
    {% for message in messages %}
        <div class="flash-{{ label }}">
            {{ message }}
        </div>
    {% endfor %}
{% endfor %}

{# read and display all flash messages #}
{% for label, messages in app.flashes %}
    {% for message in messages %}
        <div class="flash-{{ label }}">
            {{ message }}
        </div>
    {% endfor %}
{% endfor %}
```

# Assets
## Referencing files from the public folder

The following snippet references `<symfony_root>/public/css/app.css`.

```html
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
```

## Reference files created with webpack-encore
The webpack.config.js should contain lines like this:

```php
.addEntry('app', './assets/js/app.js')
.addEntry('plot', './assets/js/plot.js')
.addEntry('scene', './assets/js/scene.js')
```

The assets can be included in your Twig template using the following code:

```html
{{ encore_entry_script_tags('app') }} {# Creates script tags #}
{{ encore_entry_link_tags('app') }} {# Creates CSS (link) tags #}
```

# URLs
```html
<a href="{{ path('index') }}">Index</a>
<a href="{{ path('project_show', {id: 2}) }}">Show project</a>
```

# Twig

Extend blocks from the father element:

```php
{% block javascripts %}
    {{ parent() }}

    <script>
        ...
    </sctipt>
{% endblock %}
```

# Database and Doctrine
## Fetch objects
```php
$repository = $this->getDoctrine()->getRepository(Product::class);

// look for a single Product by its primary key (usually "id")
$product = $repository->find($id);

// look for a single Product by name
$product = $repository->findOneBy(['name' => 'Keyboard']);
// or find by name and price
$product = $repository->findOneBy([
    'name' => 'Keyboard',
    'price' => 1999,
]);

// look for multiple Product objects matching the name, ordered by price
$products = $repository->findBy(
    ['name' => 'Keyboard'],
    ['price' => 'ASC']
);

// look for *all* Product objects
$products = $repository->findAll();
```

## Store objects
```php
/**
 * @Route("/project/store", name="project_store", methods={"POST"})
 */
public function store()
{
    $project = new Project();
    $project->setName('test');

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($project);
    $entityManager->flush();

    return $this->render('project/index.html.twig', [
        'controller_name' => 'ProjectController',
    ]);
}
```

## Change objects
```php
/**
* @Route("/product/edit/{id}")
*/
public function update($id)
{
    $product = $entityManager->getRepository(Product::class)->find($id);

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $entityManager = $this->getDoctrine()->getManager();
    $product->setName('New product name!');
    $entityManager->flush();

    return $this->redirectToRoute('product_show', [
        'id' => $product->getId()
    ]);
}
```

## Delete objects
```php
$entityManager->remove($product);
$entityManager->flush();
```