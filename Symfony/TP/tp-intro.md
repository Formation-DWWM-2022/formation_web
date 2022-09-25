# TP d'introduction à Symfony

Symfony est entre autres un framework Web. Il contient un ensemble de ressources qui facilitent la création d’applications Web utilisant le design pattern MVC (Model View Controller).
TP + Questions

Il y a 2 choses à faire dans ce TP :

1. Suivre les étapes afin de réaliser le TP.
2. Répondre en parallèle aux questions qui sont posées tout au long de l’énoncé. Les réponses sont à écrire dans le questionnaire Eureka se trouvant sur la page du cours.

Il est possible de travailler en binôme pour ce TP. En revanche, les réponses aux questions  doivent être répondues par tout le monde.

Ce TP doit être versionné avec GIT et être partagé.

# Installations de Symfony

Pour commencer à utiliser Symfony il faut installer :
- composer, le gestionnaire de dépendances de PHP et
- symfony, l’utilitaire qui permet de créer de nouveaux projets.

## Création d’un premier projet
On crée de nouveaux projets Symfony avec la commande symfony.

```
symfony new --webapp projet_hello
cd projet_hello
```
## GIT

C’est probablement le bon moment pour faire un git init dans le projet et pour le connecter à un projet .

## Analyse du projet de base

Examiner attentivement le contenu du projet (dossier projet_hello). les dossiers et sous-dossiers sont organisés de sorte à ne pas mélanger les choses qui n’ont rien à voir ensemble.

```
.
├── .env
├── .env.test
├── .git/
├── .gitignore
├── bin/
├── composer.json
├── composer.lock
├── config/
├── migrations/
├── phpunit.xml.dist
├── public/
├── src/
├── symfony.lock
├── templates/
├── tests/
├── translations/
├── var/
└── vendor/
```

Le dossier config/ contient les paramètres de l’application. On modifiera ce dossier pour configurer l’application ou changer son comportement par défaut (e.g.: chargement de modules complémentaires).

Le dossier src/ contient les sources de notre application. C’est le dossier qui nous intéresse le plus ici.

Le dossier templates contient les fichiers templates (les patrons) TWIG pour faciliter la génération de pages Web.

Le dossier tests/ contient comme on s’en doute, les tests.

# Questions 1, 2 et 3

Répondre aux questions suivantes sur le questionnaire se trouvant sur Eureka :
- En examinant le contenu des fichiers et en cherchant sur le site de Symfony, expliquer l’utilité du dossier vendor/.
- En examinant le contenu des fichiers et en cherchant sur le site de Symfony, expliquer l’utilité du dossier public/.
- Quel fichier dois-je modifier pour configurer les identifiants de bases de données afin que Symfony puisse accéder à la Base de données ?

# Démarrer l’application

L’étape suivante est de démarrer l’application. On utilise le serveur web interne de PHP plutôt qu’Apache pour le développement.

```
symfony server:start
```

On peut voir le site dans un navigateur, à l’adresse http://localhost:8000.

# Contrôleur Action et Route

La page visible a l’adresse http://localhost:8000/ est une page par défaut, elle correspond à une route et à une action dans le contrôleur par défaut.

Ces 3 termes sont importants :
- Un contrôleur est la classe principale qui gère un ensemble d’actions.
- Une action est une méthode de classe du contrôleur, c’est un peu comme un des services possibles proposés par le contrôleur.
- Une route est la partie qui vient après le nom de domaine dans une URL au sens de HTTP. Par exemple dans l’URL https://www.example.com/truc/machin, la route est /truc/machin.

Il faut configurer le contrôleur pour que ses actions soient liées à des routes.
Création d’un contrôleur

Nous allons créer un contrôleur des actions et des routes associées.

Créer un nouveaux fichier "src/Controller/HelloController.php" avec le contenu suivant :

```php
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class HelloController extends AbstractController
{
  #[Route("/helloRandom")]
  public function randomNameAction(): Response
  {
    return new Response(
      "<html><body><h1>Hello " .
        self::generateRandomName() .
        "</h1></body></html>"
    );
  }
  
  static function generateRandomName(): string
  {
    $nouns = [
      "Circle","Cone","Cylinder","Ellipse","Hexagon",
      "Irregular Shape","Octagon","Oval","Parallelogram",
      "Pentagon","Pyramid","Rectangle","Semicircle","Sphere",
      "Square","Star","Trapezoid","Triangle","Wedge","Whorl",
    ];
    $adjectives = [
      "Amusing", "Athletic", "Beautiful", "Brave", "Careless", 
      "Clever", "Crafty", "Creative", "Cute", "Dependable", 
      "Energetic", "Famous", "Friendly", "Graceful", "Helpful", 
      "Humble", "Inconsiderate", "Likable", "Mid  Class", "Outgoing", 
      "Poor", "Practical", "Rich", "Sad", "Skinny", "Successful", "Thin", 
      "Ugly", "Wealth",
    ];
    return $adjectives[array_rand($adjectives)] .
      " " .
      $nouns[array_rand($nouns)];
  }
}
```

On peut voir fonctionner ce nouveau contrôleur avec l’URL : http://localhost:8000/helloRandom et recharger la page plusieurs fois…

# Question 4

Comment fait-on le lien entre une route (URL) de l’application et une action d’un contrôleur ?

# Lancer les tests

Il faut maintenant tester ce contrôleur. Écrire le fichier de test `tests/Controller/HelloControllerTest.php` (il faut créer le dossier Controlleur/ dans tests/ s’il n’existe pas):

```php
<?php
namespace App\Tests\Controller;

use App\Controller\HelloController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
  public function testHelloRandomRoute()
  {
    $client = static::createClient();

    $crawler = $client->request("GET", "/helloRandom");

    $this->assertEquals(200, $client->getResponse()->getStatusCode());
    $this->assertStringContainsString("Hello ", $crawler->filter("h1")->text());
  }

  function testRandomNameGenerator()
  {
    $rdName = HelloController::generateRandomName();
    $this->assertGreaterThan(1, strlen($rdName));
  }
}
```

On doit installer PHPUnit:

```
composer require --dev phpunit/phpunit symfony/test-pack
```

Puis, on exécute les tests avec PHPUnit (l’équivalent du JUnit de Java pour PHP):

```
php bin/phpunit
```

On devrait avoir :

```
OK (2 tests, 3 assertions)
```

# Question 5

A quoi sert le fichier composer.json qui se trouve à la racine du projet ?

# Questions 6

Dans la classe de test HelloControllerTest expliquer ce que fait la méthode testHelloRandomRoute.

# Questions 7

Dans la classe de test HelloControllerTest expliquer ce que fait la méthode testRandomNameGenerator.

# Route et action paramétriques

On souhaite créer une action qui dépende des paramètres de la route (une route paramétrique).

Ajouter la méthode suivante à la classe HelloController :

```php
#[Route("/hello/{name}")]
public function nameAction($name = ""): Response
{
if ($name == "") {
    $name = self::generateRandomName();
}

return new Response("<html><body><h1>Hello $name</h1></body></html>");
}
```

Exécuter cette méthode avec la route : http://localhost:8000/hello/Albus Perceval Wulfric Brian Dumbledore

# Tester la route

Écrire un test dans la classe HelloControllerTest qui vérifie que la méthode fonctionne comme prévu. Vérifier que la page web générée salut bien le Professeur Dumbledore quand son nom est passé dans l’URL. Vérifier aussi que le nom est aléatoire quand aucun paramètre n’est donné (http://localhost:8000/hello).

# Création d’une vue

On souhaite maintenant générer des pages Web complètes et pas seulement une chaîne de caractères passée dans l’objet Response.

Symfony utilise le langage de template twig.

la méthode render() du contrôleur permet d’utiliser un template twig pour fabriquer une réponse et retourner un objet Response.

Ouvrir et lire les fichiers templates/base.html.twig.

Créer un template pour le contrôleur Hello dans le fichier templates/hello.html.twig :

```html
{% extends 'base.html.twig' %}

{% block title %}Hello!{% endblock  %}

{% block body %}
    <div id="container">
        <div id="hello">
            <h1> Hello <i>{{ name }}</i>!</h1>
        </div>

    </div>
{% endblock %}

{% block stylesheets %}
<style>
    body { background: #F5F5F5; font: 18px/1.5 sans-serif; }
    h1, h2 { line-height: 1.2; margin: 0 0 .5em; color: #4343AA;}
    h1 { font-size: 36px; }
    #container { background: #FFF; margin: 1em auto; max-width: 800px; width: 98%; padding: 2em; box-sizing: border-box;}

    @media (min-width: 768px) {
        #container {  margin: 2em auto; }
    }
</style>
{% endblock %}
```

Modifier l’action nameAction du contrôleur HelloController afin d’utiliser le template qui vient d’être créé. On s’inspirera de la documentation en ligne.

# Sessions

On souhaite que l’application se souvienne de nous. À chaque fois que l’action nameAction est appelée avec un paramètre (avec un nom), on veut qu’il soit sauvegardé dans une session (en remplaçant éventuellement celui qui existait déjà). À chaque fois que l’action nameAction est appelée sans paramètre, alors on veut retrouver le paramètre précédemment enregistré dans la session. Finalement si nameAction est appelé sans paramètre pour la première fois (rien d’existe dans la session), alors on génère un nom aléatoirement, que l’on sauvegarde dans la session.

Par exemple, si j’appelle une fois (http://localhost:8000/hello/You) cela va afficher "Hello You!". Si ensuite j’appelle (dans le même navigateur) (http://localhost:8000/hello) cela doit également afficher "Hello You!". En revanche si j’appelle pour la première fois l’action sans paramètres (http://localhost:8000/hello), alors on obtient un nom aléatoire qui va être stocké pour les appels futurs.

Modifier l’action nameAction pour qu’elle se comporte comme décrit ci-dessus, en utilisant la [documentation Symfony](https://symfony.com/doc/current/controller.html#managing-the-session) sur les sessions ou cette cours video : https://learn.web-develop.me/view/courses/symfony-5-le-guide-complet-debutants-et-intermediaires/528870-la-session-dans-symfony-5-1-heure-et-30-minutes/1529255-se-faire-livrer-la-session-grace-a-la-sessioninterface

# Questions 8

Écrire de nouveaux tests (en ajoutant des méthodes dans la classe tests/Controller/HelloControllerTest.php) pour vérifier le nouveau fonctionnement.

