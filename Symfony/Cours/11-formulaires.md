# Formulaires

## FORM

### Introduction

La gestion des formulaire se fait via plusieurs classes PHP qui permettent entre autre :

* La structure et les propriétés du formulaire se gèrent via FormBuilder et peuvent être réutilisées;
* On peut créer des classes spécifiques pour chacun de nos formulaires
* Permet une gestion des validations simplifiée et une sécurité renforcée
* Permet d'hydrater une entité ou un objet rapidement
* Gestion de template simple

[La documentation officielle de Symfony sur les formulaires se trouve ici](https://symfony.com/doc/current/forms.html)

Pour pouvoir utiliser les formulaires, selon la version d'installation de Symfony, il peut être nécessaire d'installer les packages :

```bash
composer require symfony/form
```

Pour les exemples ci-dessous, on considère l'entité suivante (exemple issue de la documentation Symfony) :

```php
// src/Entity/Task.php
namespace App\Entity;

class Task
{
    protected $task;
    protected $dueDate;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}
```

### Création

On peut créer un Form de 2 façons différentes :

#### Directement dans un controller

```php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends AbstractController
{
    public function new(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
```

Cette première solution est rapide à mettre en place, et ne nécessite pas de fichier supplémentaire. Cependant, le formulaire ainsi créé n'est pas réutilisation dans d'autres méthodes.

#### Ou via des classes dédiées de type **FormType** en général dans le répertoire Form

Cette seconde solution, qui implique des fichiers complémentaires, permet une plus grande souplesse et une meilleure ré-utilisation dans d'autres contextes.

Le fichier ci-dessous permet de créer le même formulaire.

```php
// src/Form/TaskType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task')
            ->add('dueDate', null, array('widget' => 'single_text'))
            ->add('save', SubmitType::class)
        ;
    }
}
```

On utilise la classe FormBuilder accessible avec la méthode

```php
$task = new Task();
// ou $entite = $this->getDoctrine()->getRepository(Task::class)->find(1);
$form = $this->createForm(TaskType::class, $task);
```

dans un contrôleur ; l'argument `$task` est l'entité que vous souhaitez hydrater; l'argument n'est pas obligatoire (pour un formulaire de recherche par exemple)

On peut mettre des champs de formulaire par défaut en modifiant l'entité avant de créer le formulaire et de lier le formulaire à l'entité :

Par exemple

```php
$task = new Task;

$task->setTask('Ma tâche pré-définie');
$form = $this->createForm(TaskType::class, $task);
```

Pré-remplira le formulaire avec _Ma tâche pré-définie_.

Ensuite nous aurons des suites de `->add('nom_du_champs', TypeDeChamps::class, $options);`

Par défaut si vous ne mettez que le nom du champs Symfony se chargera de récupérer un type de champs en fonction du type de champs (string, text, boolean, date, ...)

Liste des champs possibles : [https://symfony.com/doc/current/reference/forms/types.html](https://symfony.com/doc/current/reference/forms/types.html)

Dans une classe dédiée le `createFormBuilder` est déjà instancié il ne vous reste qu'à rajouter les différents `add`.

### TWIG

Une fois le formulaire créé et initié il faut **renvoyer** le tout à TWIG via la méthode :

```php
$form->createView();
```

Soit par exemple

```graphql
return $this->render('template.html.twig', ['form' => $form->createView()]);
```

Ensuite nous aurons plusieurs fonctions twig utiles:

* `{{ form }}` permet d'afficher tout le formulaire&#x20;
* `{{ form_start  }}` permet de générer la balise `<form>` avec les différents attributs
* `{{ form_end }}` permet de générer la fermeture de `<form>` avec les différents champs restants non affichés
* `{{ form_errors }}` affiche les erreurs éventuelles du formulaire
* `{{ form_widget(mon formulaire.nomduchamps) }}` affiche le type de champs&#x20;
* `{{  form_label(mon formulaire.nomduchamps) }}` affiche le label du champs
* `{{ form_row(monformulaire.nomduchamps) }}` affiche le form\_widget et form\_label
* `{{ form_rest }}` affiche les champs restants non récupéré précédemment (token de vérification par exemple)

Ces fonctions permettent une grande maîtrise de la mise en forme d'un formulaire. Cependant, elle implique de détailler les éléments.

Il est donc possible d'afficher un formulaire en une seule ligne, et le rendu dépendra du paramètrage (ou du template modèle) existant.

```
{{ form(variable_form) }}
```

la `variable_form` correspond à la variable contenant le formulaire envoyée par le contrôleur. Il est enfin possible de préciser un "thème" pour votre formulaire avec la syntaxe :

```
{% raw %}
{% form_theme form 'nom_du_template.html.twig' %}
{% endraw %}
{{ form(variable_form) }}
```

Le template est un fichier twig qui vient préciser et définir pour chaque élément du formulaire (de manière globale), le rendu en HTML.

Des thèmes par défaut sont proposées : [https://symfony.com/doc/current/form/bootstrap4.html](https://symfony.com/doc/current/form/bootstrap4.html) Et la documentation pour créer votre template : [https://symfony.com/doc/current/form/form\_customization.html](https://symfony.com/doc/current/form/form\_customization.html)

### Action / Request

Une fois le formulaire créé et affiche via TWIG il faut rajouter un comportement qui va gérer la soumission du formulaire grâce à ces méthodes :

* `handleRequest($request)` permet d'associer les valeurs input à la classe Form précédemment créé
* `isSubmitted()` permet de savoir si le formulaire a été envoyé
* `isValid()`  permet de savoir si les données saisies sont valides

Dans la majorité des cas on va tester si :

```php
public function newAction(Request $request){
  //... génération ou récupération du formulaire

  $form->handleRequest($request); // hydratation du form 
  if($form->isSubmitted() && $form->isValid()){ // test si le formulaire a été soumis et s'il est valide
    $em = $this->getDoctrine()->getManager(); // on récupère la gestion des entités
    $em->persist($task); // on effectue les mise à jours internes
    $em->flush(); // on effectue la mise à jour vers la base de données
    return $this->redirectToRoute('show_task', ['id' => $task->getId()]); // on redirige vers la route show_task avec l'id du post créé ou modifié 
  }
}
```

### Validation

Les validations permettent de gérer des contraintes au niveau du formulaire ; Par exemple pour pourra forcer en PHP que le champs email soit bien un email ou que tel champs ne peut pas dépasser tel nombre de caractères, vous trouverez la liste des contraintes basiques sur site site de symfony : [http://symfony.com/doc/4.1/validation.html](http://symfony.com/doc/4.1/validation.html)

Ces contraintes ou assert peuvent être gérée de plusieurs façon XML, JSON, YAML, PHP ou en annotation dans notre cas; il faudra utiliser cette ligne tout en haut du contrôleur :

```php
use Symfony\Component\Validator\Constraints as Assert;
```

Pour ensuite pouvoir utiliser l'annotation :

```php
class Author
{
    /**
     * @Assert\NotBlank()
     */
    public $name;
}
```

Ici on vérifiera que le champs name doit être rempli.

### Exercice

* Créer un formulaire directement dans DefaultController qui gèrera la création des Post
* Créer un formulaire directement dans DefaultController qui gèrera la modification des Post
* Modifier la page de listing des postes pour rajouter un lien edition et suppression
* Mettre en place les différentes routes pour le backoffice de Post (ajout / modification / suppression / visualisation)
* Déporter le formulaire de gestion de Post vers une classe dédiée Form/PostType.php
* Modifier DefaultController pour utiliser PostType
* Ajouter une validation au formulaire sur le titre qui ne doit pas dépasser 255 caractères
* Rechercher pour mettre en place le template bootstrap pour les Form
* Afficher le message d'erreur en rouge.

### Génération de CRUD

Ce que nous venons de faire manuellement peut être généré en ligne de commande par Symfony via la commande :

```
bin/console make:crud
```

On vous demandera le nom de l'entité précédé du nom de bundle, le chemin pour ce crud et si vous souhaitez avoir les fonction d'édition (ajout/ modification) mettez oui.

On peut également générer seulement les FormType :

```
php bin/console make:form
```

Attention si vous modifier une entité les FormType ne sont pas générés automatiquement il faudra rajouter manuellement le champs fraichement créé.

### Exercice

* Générer le CRUD de Post avec l'url /admin/post
* Générer le CRUD de PostCategory avec l'url /admin/postcategory
* Tester le fonctionnement
* Mettre les liens dans le menu pour aller sur le listing post et listing postcategory; mettre en actif si url courante

### Exercice

* On va créer une page de recherche
*  Modifier le repository de Post pour créer une méthode `search($word)` qui recherchera dans le titre et le contenu le mot $word

    Tips : [https://symfony.com/doc/current/doctrine.html#querying-for-objects-the-repository](https://symfony.com/doc/current/doctrine.html#querying-for-objects-the-repository)

* Créer une nouvelle page dans le Controller /search/{word}
* Créer le formulaire directement dans le controller sans le lier à une entité
* A la soumission on va récupérer `$form->getData()` qui sera notre $_POST
* Pour récupérer la variable $word et utiliser la méthode du repository fraichement créée.
* Pour finalement afficher tout le contenu dans une page de listing.
