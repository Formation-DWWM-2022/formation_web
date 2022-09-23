# TP-02 : Enregistrer les données du formulaire de contact
> Documentation : Doctrine https://symfony.com/doc/current/doctrine.html
## Exercices

### 1. Optimiser le code existant : méthodes HTTP

Nous allons optimiser le code produit dans le TP-01 : nos routes sont pour le moment toutes accessibles en `POST` ou `GET` alors que :

- le formulaire ne doit accepter que `GET`
- le traitement du formulaire ne doit accepter que `POST`


Modifiez vos routes en précisant les méthodes autorisées :

```php

/**
 * @Route("/maRoute", name="app_ma_route", methods={"GET"})
 */

/**
 * @Route("/maRouteTraitement", name="app_ma_route_traitement", methods={"POST"})
 */
```

Vous pouvez également préciser plusieurs méthodes pour une route :

```php
/**
 * @Route("/maRoute", name="app_ma_route", methods={"GET", "POST"})
 */
```

Il faudra à ce moment-là tester dans le controller si on vient de `POST` ou de `GET` pour adapter le comportement de la méthode, on le verra plus tard.


### 2. Créer une entité Contact

Vous créérez une nouvelle entité `Contact` grâce à la commande :

`php bin/console make:entity Contact`

Les champs seront les suivants :
```
Contact
-------
email           VARCHAR(150)    NN
message         TEXT            NN
created_at      DATETIME        NN
```

### 3. Assigner une valeur par défaut à l'attribut `createdAt` de l'entité

Par défaut, notre entité aura une valeur de `createdAt` égale à la date de création de l'object correspondant.

Vous allez donc créer un constructeur dans l'entité `Contact` qui va assigner une valeur par défaut à `createdAt` :


> **ATTENTION !** Le `DateTime` à utiliser avec l'autocomplétion est simplement `use DateTime`, pas un package `Symfony\Component\...`.

```php
class Contact {

    public function __construct() {
        $this->setCreatedAt( new DateTime() );
    }
}
```

### 4. Configurer la base de données

Nous allons :
1. Créer la base de données
2. Créer une migration, c'est à dire un fichier qui compare nos entités à l'état de la base de données et qui effectue les requêtes SQL correspondant aux différences (par exemple: l'entité a un champ en plus que la table en BDD, alors la requête de la migration sera `ALTER TABLE ... `)
3. Exécuter la/les migrations

#### Création de la base de données
1. Modifiez le fichier `.env` à la racine du projet avec vos identifiants de base de données. Dans `db_name`, vous pouvez saisir `Symamzon`. Ce n'est pas grave si la BDD n'existe pas encore : on va la créer avec la console !

2. Saisissez dans la console du projet : `php bin/console doctrine:database:create`

S'il n'y a pas d'erreurs, passez à la suite.


#### Créer les migrations et les exécuter

1. On vérifie qu'il n'y ait pas de migrations en attente :
`php bin/console migrate`

2. On crée les migrations :
`php bin/console make:migration`

3. On migre :
`php bin/console migrate`

> **Attention :** lorsque vous ferez des migrations, faites *DANS TOUS LES CAS* ces trois lignes successivement ! Cela vous évitera de nombreux soucis de BDD.

### 5. Enregistrer les données

Maintenant que notre base de données et notre entité sont prêtes, nous allons reprendre la route `/traitementContact`, créer un objet `Contact` et l'hydrater des données du formulaire :

```php
public function traitementContact(Request $request) {

    $email = $request->request->get('email');
    $message = $request->request->get('message');

    /**
     * 1. Créer l'object Contact et l'hydrater
     */

    $contact = new Contact;
    $contact->setEmail($email);
    $contact->setMessage($message);
}
```

Ensuite, nous allons enregistrer cet objet en base de données. Pour cela, on va instancier l'`EntityManager` qui s'occupe de la manipulation des objets en base de données. Grâce à l'héritage de notre classe de `AbstractController`, nous avons accès à divers services et instances de classe, notamment `Doctrine`, notre ORM :

`$entityManager = $this->getDoctrine()->getManager();`

On dit ensuite à Doctrine que nous souhaitons enregistrer (persister) notre objet en base de données :

`$entityManager->persist($contact);`

Enfin, on exécute réellement la ou les requêtes en attente (ici, l'`insert`) :

`$entityManager->flush();`


Voici le code final de notre méthode :

```php
public function traitementContact(Request $request) {

    $email = $request->request->get('email');
    $message = $request->request->get('message');

    /**
     * 1. Créer l'object Contact et l'hydrater
     */

    $contact = new Contact;
    $contact->setEmail($email);
    $contact->setMessage($message);

    $entityManager = $this->getDoctrine()->getManager();

    $entityManager->persist($contact);
    $entityManager->flush();
}
```

Testez votre code. Vous devriez avoir une erreur vous indiquant que la route ne retourne pas de `Response`: en effet, toutes les routes Symfony doivent retourner un objet Response. Néanmoins, le message devrait être enregistré en BDD !


### 6. Retourner une redirection et un message de confirmation après l'enregistrement

Nous voulons maintenant rediriger l'utilisateur vers le formulaire d'origine, avec une alerte indiquant que le message a bien été envoyé.


#### 1. Redirection

Nous voulons rediriger l'utilisateur sur le formulaire une fois le message enregistré.

Pour cela :

1. Nommez la route `/contact`, par exemple `app_contact`, de sorte à pouvoir l'appeler par la suite.
2. Après le flush du traitement du formulaire, rajoutez une redirection vers la page de formulaire :

```php
return $this->redirectToRoute('app_contact');
```

#### 2. Ajout d'un message flash

Nous voulons avertir l'utilisateur que le message a bien été envoyé.

Pour cela, nous allons utiliser les Flash Messages (doc: https://symfony.com/doc/current/controller.html#flash-messages).

Il s'agit en fait d'un array de messages existant dans la session de l'utilisateur, qui se suppriment une fois appelés (en effet, une fois le message affiché, on n'en a plus besoin).

Dans le controller, après le `flush`, et avant la redirection :
```php
// On met un flash de type "info", avec le message :
$this->addFlash(
    'info',
    'Le message a bien été envoyé !'
);
```

Ensuite, dans `base.html.twig`, on va afficher les flash messages si il y en a.

Mettez ce code avant `{% block body%}{% endblock %}` :

```twig

{% for message in app.flashes('info') %}
    <div class="alert alert-success" role="alert">
        {{ message }}
    </div>
{% endfor %}
```

Ce code va faire une boucle sur les messages flashs de l'application et les afficher dans une `alert` Bootstrap.