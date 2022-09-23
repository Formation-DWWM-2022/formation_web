# NotaResto, l'appli de notation de restaurants

<!-- https://github.com/tomsihap/notaresto -->

> Vous êtes chargés de la réalisation de NotaResto, le site de notation de restaurants. Les fonctionnalités attendues sont :
> - Consulter la liste de restaurants par code postal
> - Un compte "Restaurateur" permettant l'ajout et la gestion d'un ou plusieurs restaurants
> - Un compte "Client" permettant la notation et les commentaires sur un restaurant
> - Un compte "Modérateur" permettant la gestion de tous les éléments du site

> Les pages attendues sont :
> - En page d'accueil : la liste des restaurants les mieux notés dans l'application
> - Sur la page d'un restaurant : la liste des avis clients et l'ajout d'avis par les clients et de réponses par le restaurateur
> - Un back-office Restaurateur permettant de gérer ses restaurants
> - Un back-office Client permettant de gérer ses avis

## Étapes de démarrage
0. Dessiner les vues sur papier pour comprendre les besoins de l'application
1. Créer un MLD pour concevoir l'application
2. Faire une liste des routes utiles à l'application
3. Gestion des droits: faire la liste des rôles dans l'application et attribuer à chaque route les rôles qui y ont accès
4. Créer le projet Symfony et le configurer (`.env.local`)
5. Créer les entités
6. Créer les controllers et les routes
7. Faire la page d'accueil
8. Créer un système d'authentification
9.  Gérer la création de restaurant (`restaurateur`)
10. Gérer la recherche de restaurant (`client`)
11. Gérer l'ajout d'un avis sur un restaurant (`client`) et la réponse par le restaurant (`restaurateur`)
12. Gérer la modération des contenus du site (`moderateur`)

## Exercice 1 - Créez le MLD
- Dessinez sur papier les vues demandées par le client et créez un MLD idéal pour le projet présenté.

## Exercice 2 - Créez le projet Symfony
- Dans le dossier où se situera le projet Symfony, créez un projet via : `symfony new project --full`

## Exercice 3 - Faites la liste des routes utiles au projet et leurs rôles
- Faites une liste de routes qui seront présentes dans le projet en vous inspirant du MLD et des vues dessinées sur papier.
- N'oubliez pas d'ajouter les méthodes HTTP pour chacune des routes
- Ajoutez les rôles qui auront accès aux routes

Exemple :

```
GET     /login                  anonyme
POST    /login                  anonyme
GET     /logout                 all
GET     /register               anonyme
GET     /users                  modérateur
DELETE  /restaurant/{id}        restaurateur, modérateur

...
```

## Exercice 4 - Configurer le projet
- Créez le projet Symfony
- Ajoutez-le dans votre Github
- Créez le fichier `.env.local` et configurez-le
- Faites un commit et pushez

## Exercice 5 - Créer les modèles
- Créez les modèles sans les relations pour les tables du projet.
- Ajoutez les relations aux modèles. Rappel :

MLD | Doctrine
---------|----------
 N:1 | ManyToOne
 1:N | OneToMany
 N:N | ManyToMany
 1:1 | OneToOne

- Créez les modèles définis dans le MLD
- **ATTENTION 1 !!! SAUF LE MODÈLE USER !!!**
- **ATTENTION 2 !!! Créer l'entité des photos mais ne pas remplir de champs !!!**
- **ATTENTION 3 !!! Symfony vous propose des valeurs par défaut quand il y a des questions lorsque utilisez `bin/console`. Faites Entrée pour les utiliser si besoin !**

## Exercice 7 - Faire les migrations
- Créez la base de données avec la ligne de commande Symfony
- Créez les migrations
- Exécutez les migrations

## Exercice 8 - Créer les controllers et les routes

> **ATTENTION** : À partir de maintenant, vous allez réaliser du code de plus en plus complexe. Vous allez devoir tester des choses, essayer, recommencer : c'est le job de développeur ! Il est vital pour la bonne gestion de votre temps et de votre projet de faire des commits régulièrement, et éventuellement des branches, pour ne pas avoir à revenir trop loin en arrière en cas d'erreur.

- Créez les controllers et les routes nécessaires à votre application. Ne créez pas les routes relatives à l'authentification.

## Exercice 9 - Faire la page d'accueil
- Créez des "fixtures" pour créer des données basiques dans votre base de données. Quelques liens :
  - [Fixtures: Seeding Dummy Data!](https://symfonycasts.com/screencast/symfony-doctrine/fixtures)
  - [DoctrineFixturesBundle](https://symfony.com/doc/2.0/bundles/DoctrineFixturesBundle/index.html)
- Utilisez Faker pour créer une centaine de restaurants dans une dizaine de villes différentes. Quelques liens :
  - [Création de fixtures aléatoires - Faker](https://blog.dev-web.io/2018/01/20/symfony-4-creation-de-fixtures-aleatoires-faker/)
  - [fzaninotto/faker](https://github.com/fzaninotto/Faker)
- Affichez la liste de tous les restaurants en page d'accueil
- Ensuite, affichez plutôt les 10 derniers restaurants créés. Il faudra chercher sur Google comment faire une requête personnalisée ("custom query") dans Symfony.
- Créez une méthode `getAverageRating` dans la classe `Restaurant` qui retourne la moyenne des notes d'un restaurant
- Grâce à getAverageRating, affichez la moyenne de chaque restaurant sur la page d'accueil

## Exercice 10 - Améliorer la requête et ne retourner que les 10 meilleurs
- Dans PHPMyAdmin, trouvez la requête SQL qui permet de retourner les 10 restaurants qui ont la meilleure moyenne de reviews. Il faudra utiliser des jointures pour joindre la table Review à Restaurant ainsi que des fonctions d'agrégation de MySQL pour faire le calcul de la moyenne. Quelques liens :
  - [Jointures SQL](https://sql.sh/cours/jointures)
  - [SQL AVG()](https://sql.sh/fonctions/agregation/avg)

- Ensuite, utilisez le QueryBuilder de Doctrine pour utiliser la requête trouvée au sein de votre projet Symfony. Liens utiles :
  - [Doctrine - The QueryBuilder](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html)
  - [Symfony - Querying for Objects: the Repository](https://symfony.com/doc/current/doctrine.html#querying-for-objects-the-repository)
  - [Créer un repository pour Doctrine](https://atomrace.com/creer-un-repository-pour-doctrine/)
  - [Get object from a custom query](https://stackoverflow.com/questions/47542693/symfony-get-object-from-a-custom-query)

- Une fois la méthode du Repository créée, affichez les 10 meilleurs restaurants sur la page d'accueil. Quelques liens :
  - [Query Builder, Hydratation et résultats](https://openclassrooms.com/forum/sujet/symfony4-query-builder-hydratation-et-resultats)
  - [Aller plus loin avec le modèle](https://www.jdecool.fr/blog/2018/02/24/tutorial-jobeet-symfony-4-partie-6-aller-plus-loin-avec-le-modele.html)

## Exercice 11 : Authentification !

- Créez un système d'authentification dans votre application ! Liens :
  - https://symfony.com/doc/current/security/form_login_setup.html
  - https://symfony.com/doc/current/doctrine/registration_form.html

- Première étape : créez l'entité User ! Pour cela, on va dire que notre entité User est en fait un... user. Qu'est-ce que ça veut dire ? Ça veut dire que c'est une entité qui implémente l'interface `UserInterface`, la forçant à avoir des méthodes obligatoires pour la gestion de users dans Symfony :

```bash
bin/console make:user User
```

- Ensuite, pour pouvoir vous loguer, créez un formulaire de connexion. Par chance, Symfony a tout prévu !

```bash
bin/console make:registration-form
```

- Pensez à faire une migration pour enregistrer la nouvelle entité User en base de données.

- Regardez avec `bin/console debug:router` les routes qui ont  été créées. `/login`, `/register` sont maintenant créées ! Allez sur `/register` pour créer un compte. N'hésitez pas à rajouter du Boostrap aux formulaires Twig (https://gist.github.com/tomsihap/7e5063a12f6bab1d3af035e15698f48a#62-styliser-nos-formulaires-g%C3%A9n%C3%A9r%C3%A9s) pour styliser votre registration form.

- Oups, un bug apparaît ! Résolvez-le. Tout est décrit dans l'erreur et le bout de code fourni par l'erreur !

- Enfin, gérez le login d'utilisateurs :

```bash
bin/console make:auth
```

- Testez en allant sur `/login` et en saisissant les identifiants d'un utilisateur créé plus tôt.
- Corrigez l'erreur qui apparaît ! Comme avant, tout est indiqué.
- Testez de vous loguer puis déloguez-vous en allant sur `/logout`.

## Exercice 12 : Faire une navbar qui indique l'adresse e-mail de l'utilisateur

- Ajoutez Bootstrap à votre projet (indiqué dans la correction de l'exercice précédent)
- Maintenant que vous êtes logués, ajoutez une barre de navigation à votre projet (ajoutez-la dans `base.html.twig` directement ou dans un partial par exemple)
- Dans la barre de navigation :
  - Si l'utilisateur est logué, affichez son e-mail et un lien "Déconnexion"
  - Si l'utilisateur n'est pas logué, affichez les liens "Créer un compte" et "Connexion"


Pour tester avec Twig si l'utilisateur est logué et afficher ses informations :

```twig
{% if app.user %}
    Bienvenue  {{ app.user.email }} !
{% else %}
    Veuillez vous connecter.
{% endif %}
```

## Exercice 13 : Enfin du front !
Pour le moment, on part du principe que notre utilisateur a tous les rôles possibles donc toutes les pages devraient être visibles.

Ajoutez les éléments suivants. Attention, pour les éléments "NON fonctionnel", ne mettez pas de vrais liens/éléments/redirections car on les traitera plus tard. Pour tout le reste, créez les pages correspondantes.

- Dans la barre de navigation :
  - Un lien vers "Mes restaurants" **(NON fonctionnel)**
  - Un lien vers "Ajouter un restaurant"
    - Créez un formulaire de création de restaurant **(NON fonctionnel)**
  - Un lien vers "Tous les restaurants"
    - Créez la page qui liste tous les restaurants
  - Un lien vers "Tous les utilisateurs"
    - Créez la page qui liste tous les utilisateurs
  - Un "Input" qui permet de saisir un code postal **(NON fonctionnel)**

- Dans la page d'accueil :
  - Rendez cliquable les restaurants pour qu'ils redirigent vers la page de 1 restaurant et ses détails
    - Dans la page d'un détail de restaurant 
      - Ajoutez un formulaire pour créer une review **(NON fonctionnel)**

Il s'agit donc de faire toute la structure du site ! Les éléments que vous pouvez faire déjà sont notamment d'afficher soit TOUS (pour les listes) ou UN (pour le show d'un restaurant) élément. Nous ferrons plus tard les formulaires.



## Exercice 14 : Gérer les nouvelles relations
Nous avons maintenant une entité User ! On peut donc la rattacher à nos tables existantes.

- Créez les relations nécessaires que nous n'avions pas encore fait (un User possède des Restaurants, un User possède des Reviews) et migrez.

- Un problème se pose ! Nos restaurants ont maintenant besoin d'un User pour exister. Il va donc falloir créer un UserFixtures. N'oubliez pas de modifier `RestaurantFixtures` pour lui dire de charger `UserFixtures` en premier, et de rajouter un `->setUser()` dans `RestaurantFixtures` pour attribuer un User au restaurant.

Voilà un exemple de `UserFixtures` (attention, d'un autre projet, à adapter évidemment pour s'inspirer !) :

```php
class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Creating Admin
        $userAdmin = new User();
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setPassword($this->encoder->encodePassword($userAdmin, 'azerty'));
        $userAdmin->setFirstname('Emma');
        $userAdmin->setLastname('Admin');
        $userAdmin->setRoles(['ROLE_ADMIN']);
        $userAdmin->setIsValidated(true);
        $userAdmin->setValidationString('00000');
        $manager->persist($userAdmin);
    }
}
```

- Quand UserFixtures sera fait et RestaurantFixtures adapté, relancez les fixtures :


```bash
# Suppression du schéma de bdd pour Doctrine
bin/console doc:schema:drop --force

# Création du schéma de bdd pour Doctrine
bin/console doc:schema:create

# Création des fixtures (validation automatique avec --no-interaction)
bin/console doc:fixtures:load --no-interaction
```

#### Rappel:  Nettoyer un projet et tout relancer proprement
```bash
# Avant tout: SUPPRIMEZ TOUS LES FICHIERS DANS src/Migrations !
bin/console doctrine:database:drop --force # On supprime la bdd
bin/console doctrine:database:create # On créée la bdd
bin/console make:migration # On créée les migrations
bin/console doctrine:migrations:migrate # On migre
bin/console doctrine:fixtures:load --no-interaction # On execute les fixtures
```

En une ligne (Linux, OSX, GitBash) : `bin/console doctrine:database:drop --force && bin/console doctrine:database:create && bin/console make:migration && bin/console doctrine:migrations:migrate && bin/console doctrine:fixtures:load --no-interaction`

#### Rappel: Faire une migration en cours de projet sans tout supprimer

```bash
bin/console doctrine:migrations:migrate
bin/console make:migration
bin/console doctrine:migrations:migrate
```

En une ligne (Linux, OSX, GitBash) : `bin/console doctrine:migrations:migrate && bin/console make:migration && bin/console doctrine:migrations:migrate`

#### Rappel: Faire une fixture en cours de projet sans tout supprimer
```bash
bin/console doctrine:schema:drop --force
bin/console doctrine:schema:create
bin/console doctrine:fixtures:load --no-interaction
```

En une ligne (Linux, OSX, GitBash) : `bin/console doctrine:schema:drop --force && bin/console doctrine:schema:create && bin/console doctrine:fixtures:load --no-interaction`


## Exercice 15 : Créez le formulaire de création de restaurant

- Utilisez `make:form` pour créer le formulaire, puis appelez-le dans le controller et affichez-le.
- Documentation : https://symfony.com/doc/current/forms.html

## Exercice 16 : Ajout d'images dans le formulaire de Restaurant
> https://symfony.com/doc/current/controller/upload_file.html

## Exercice 17 : Créez le formulaire de création de reviews

- Utilisez `make:form` pour créer le formulaire, puis appelez-le dans le controller et affichez-le.
- Documentation : https://symfony.com/doc/current/forms.html

## Exercice 18 : Gestion des rôles (modérateur, restaurateur, client)
Il va falloir:

- Créer un compte typé "client" ou "restaurateur"
- Gérer un compte "modérateur" et passer d'autres users en "modérateur"
- Bloquer des routes à certains rôles
- Afficher conditionnellement dans Twig les routes selon les rôles

Documentation :
- Security https://symfony.com/doc/current/security.html
- Roles https://symfony.com/doc/current/security.html#denying-access-roles-and-other-authorization
- Vérifier si le user est logué et a un rôle https://symfonycasts.com/screencast/symfony-security/dynamic-roles

## Exercice 19 : Ajout d'une réponse par un restaurateur à une review
## Exercice 20 : Recherche de restaurants par code postal
## Exercice 21 : Ajouter les routes Edit et Delete pour Restaurant
## Exercice 22 : Ajouter les routes Edit et Delete pour Review
## Exercice 23 : Ajouter les routes Edit et Delete pour User