# Example Concret de site MVC simple

# Etape 1 : Lancement
- Création du repository Github et inviter ses collégues dev
- Creer un 1er commit avec cette hiearchie de dossier :

```
index.php
Autoloader.php
.htaccess
App
 | Controller
    | HomeController.php
 | Entity
    | Citation.php
 | Exception
    | RouterException
 | Form
    | FormCitation.php
 | Repository
    | ICitationRepository.php
    | CitationRepository.php
 | Service [A recuperer dans le cours]
    | Database.php
    | Form.php
    | Input.php
    | Redirect.php
    | Route.php
    | Router.php
    | Form.php
    | Session.php
    | View.php
 | Validator
    | Validation.php
config
 | config.php
templates
 | accueil.php
 | templates.php
assets
 | style.css
 | image
 | app.js
```

# Etape 2 : index.php + .htacess + Autoloader + Router + RouterException

- Je commence par remplir mon `.htaccess` pour rediriger toutes les URLs sur le fichier ` index.php`.

- Dans le fichier `index.php`, je commence par inclure mes fichiers de configuration et configurer mon Autoloader avec le chemin vers lequelle trouver mes classes :

```php
require_once 'Autoloader.php';
require_once 'config/config.php';

use App\Autoloader;
use App\Controller\HomeController;
use App\Exception\RouterException;
use App\Service\Router;

Autoloader::$folderList =
    [
        "App/Entity/",
        "App/Controller/",
        "App/Repository/",
        "App/Service/",
        "App/Exception/",
        "App/Form/",
        "App/Validator/",
    ];
Autoloader::register();
```

- Je n'oublie pas de remplir mon fichier `Autoloader.php` qui permet d'inclure dans mes futur fichier les classes que j'utilise dans mes méthodes.

- Je continue mon fichier `index.php` en démarrant ma session

```php
session_start();
```

- puis en intégrant le systeme de Router qui permet de lancer une méthode d'un controlleur en fonction de URL soumis au navigateur :

```php
try {
    $router = new Router($_GET['url']);

    $router->get('/', function () {
        echo (new HomeController())->invoke();
    });

    $router->post('/add', function () {
        echo (new HomeController())->add();
    });

    $router->run();
} catch (RouterException|Exception $e) {
    die('Error: ' . $e);
}
```

- Je n'oublie pas de remplir ma classe `Router.php` , `Route.php` et `RouterException.php` qui permet d'utiliser les méthode adéquat à un bon routeur URL

- Enfin de compte je vais utliser sur mon fichier `index.php` :

```php
use App\Autoloader;
use App\Controller\HomeController;
use App\Exception\RouterException;
use App\Service\Router;
```

# Etape 3 : Citation + BDD 
- Je passe à la création de mon entité en créant une classe `Citation.php` qui est la représentation en PHP de ma table en BDD :

```php
namespace App\Entity;

class Citation{
    private int $id;
    private string $citation;
    private string $auteur;

    /**
     * @param string $citation
     * @param string $auteur
     */
    public function __construct(string $citation, string $auteur)
    {
        $this->citation = $citation;
        $this->auteur = $auteur;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCitation(): string
    {
        return $this->citation;
    }

    /**
     * @param string $citation
     */
    public function setCitation(string $citation): void
    {
        $this->citation = $citation;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }
}
```

- Je n'oublie pas de créer cette table en BDD :

```sql
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 sep. 2022 à 20:17
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `citation`
--

DROP TABLE IF EXISTS `citation`;
CREATE TABLE IF NOT EXISTS `citation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `citation` varchar(255) CHARACTER SET utf32 DEFAULT NULL,
  `auteur` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `citation`
--

INSERT INTO `citation` (`id`, `citation`, `auteur`) VALUES
(1, '“Offrir l\'amitié à qui veut l\'amour, c\'est donner du pain à qui meurt de soif” ', 'Proverbe espagnol'),
(2, '“Quand la pauvreté entre par la porte, l\'amour s\'en va par la fenêtre” ', 'Proverbe français'),
(3, 'L\'oisiveté est la mère de tous les vices ', 'Proverbe Français');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```

# Etape 4 : HomeControlleur + View +  templates
- Je passe au `HomeControlleur.php` en créant la méthode invoke() et add(). Ce controlleur instancie un objet $citationRepository pour pouvoir faire des requetes CRUD en BDD facilement. Mon controlleur utilise la classe `View.php` pour générer la vue avec la méthode render() donc j'ai besoin que mon controlleur herite de ces méthodes. La méthode invoke() permet d'afficher ma page d'acceuil avec un formulaire de création de citation et la listes de mes citations en BDD en utilisant le templates `accueil.php` alors que la méthode add() vérifie les champs de mon formulaire poster. Si tous les champs sont bon, il insére en BDD, cette nouvelle instance de objet citation et redirige vers ma page accueil :

```php
namespace App\Controller;

use App\Entity\Citation;
use App\Form\FormCitation;
use App\Repository\CitationRepository;
use App\Repository\ICitationRepository;
use App\Service\Input;
use App\Service\Redirect;
use App\Service\View;
use App\Validator\Validation;

class HomeController
{
    use View;

    private ICitationRepository $citationRepository;

    public function __construct()
    {
        $this->citationRepository = new CitationRepository();
    }

    public function invoke() : string
    {
        return $this->render(
            SITE_NAME . ' - HomePage',
            'accueil.php',
            [
                'formCitation' => FormCitation::buildAddCitation(),
                'citations' => $this->citationRepository->findAll()
            ]);
    }

    public function add()
    {
        if (Input::exists()) {
            $val = new Validation;
            $val->name('citation')->value(Input::get('citation'))->required();
            $val->name('auteur')->value(Input::get('auteur'))->required();
            if ($val->isSuccess()) {
                $design = Input::get('citation');
                $auteur = Input::get('auteur');
                $citation = new Citation($design, $auteur);
                $this->citationRepository->add($citation);
                Redirect::to('/');
            }
        }
        Redirect::to('/');
    }
}
```

- Je n'oublie pas de récupérer la classe `View.php` et de créer mes templates `accueil.php` :

```php
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <?php foreach ($citations as $citation) { ?>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> <?= $citation->getCitation(); ?> </h5>
                                <p class="card-text"> <?= $citation->getAuteur(); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?= $formCitation->create() ?>
        </div>
    </div>
</div>
```

- et `templates.php` :

```php
<html lang="fr">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL_ROOT ?>"><?= SITE_NAME ?></a>
        </div>
    </nav>
</header>
<?= $content ?>
<footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
</footer>

</body>
</html>
```

# Etape 5 : CitationRepository + ICitationRepository + Database + config

- Dans cette étape, je vais créer l'interface représentant ma base de données Citation dans le fichier `ICitationRepository.php` :

```php
namespace App\Repository;

use App\Entity\Citation;

interface ICitationRepository
{
    public function add(Citation $citation);
    public function findAll() : array;
}
```

- vue que j'utilise une base de donnée MySQL via une liaison PDO. Je vais créer une classe `CitationRepository.php` qui hérite de `Database.php` que j'ai préalablement remplie et implémente cette instance de classe `ICitationRepository.php` que je viens de créer

```php
namespace App\Repository;

use App\Entity\Citation;
use App\Service\Database;
use PDO;
use PDOException;

class CitationRepository extends Database implements ICitationRepository
{
    public function add(Citation $citation)
    {
        $stmt = $this->db->prepare("INSERT INTO citation (citation, auteur) VALUES (:citation, :auteur)");
        $stmt->bindValue(':citation', $citation->getCitation());
        $stmt->bindValue(':auteur', $citation->getAuteur());
        $stmt->execute();
        $stmt = null;
    }

    public function findAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM citation ORDER BY auteur ASC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        if (!$arr) {
            throw new PDOException("Could not find citation in database");
        }
        $stmt = null;
        $citations = [];
        foreach ($arr as $citation) {
            $c = new Citation($citation['citation'], $citation['auteur']);
            $c->setId($citation['id']);
            $citations[] = $c;
        }
        return $citations;
    }
}
```

- pour que ma connexion en Database fonctionne je vais configurer mon site avec un fichier de configuration `config.php` :

```php
//nom du site
const SITE_NAME = 'Citation';

//App Root
define("APP_ROOT", dirname(__FILE__, 2));
const URL_ROOT = '/citation/';
const URL_SUBFOLDER = '';

//DB Params
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'test';

const COOKIE_NAME = 'hash';
const COOKIE_EXPIRY = 604800; // time in seconds

const SESSION_NAME = 'user';
const TOKEN_NAME = 'token';
```

# Etape 6 : Validator + Input + Redirect + FormCitation

- Pour finir, je vais avoir d'un générateur de formulaire de création de Citation dans le fichier `FormCitation.php` qui utilise la classe `Form.php` que j'ai préalablement remplie :

```php
namespace App\Form;

use App\Service\Form;

class FormCitation
{
    static function buildAddCitation(): Form
    {
        $form = new Form();
        $form->debutForm('post', URL_ROOT . 'add')
            ->ajoutLabelFor('citation', 'Citation')
            ->ajoutInput('text', 'citation', ['id' => 'citation', 'class' => 'form-control'])
            ->ajoutLabelFor('auteur', 'Auteur')
            ->ajoutInput('text', 'auteur', ['id' => 'auteur', 'class' => 'form-control'])
            ->ajoutBouton('Ajouter', ['class' => 'btn btn-primary'])
            ->finForm();
        return $form;
    }
}
```

- Pour vérifier mon formulaire dans le `HomeControlleur.php`, je vais avoir aussi besoin de remplir la classe `Input.php` et `Validator.php`.

- Enfin, pour rediriger au mieux mes utilisateurs, je vais remplir la classe `Redirect.php` :

```php
namespace App\Service;

class Redirect
{
    public static function to($location = null, $replace = true, $response_code = 200)
    {
        if ($location) {
            if (is_numeric($location)) {
                if ($location == 404) {
                    header('Location: ' . URL_ROOT . '404', true, 404);
                    exit();
                }
            }
            header('Location: ' . URL_ROOT . $location);
            exit();
        }
    }
}

```

# Conclusion

Normalement apres avoir fait toutes les étapes, vous avez un modéle de MVC POO complet simple et efficace pour un site de citation Open-bar
