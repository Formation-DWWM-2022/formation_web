# Séance 9 : Sécurité

Attention, lire la documentation ici [https://symfony.com/doc/current/security.html#the-user](https://symfony.com/doc/current/security.html#the-user)

## Introduction

Deux notions majeures interviennent dans la conception de sécurité de Symfony :

* Authentification : **Qui êtes vous ?** ; vous pouvez vous authentifier de plusieurs manières (HTTP authentification, certificat, formulaire de login, API, OAuth etc)
* Authorization : **Avez vous accès à ?** ; permet d'autoriser de faire telle ou telle action ou accéder à telle page sans forcément savoir qui vous êtes, utilisateur anonyme par exemple.

Pour fonctionner, il est nécessaire d'ajouter le composant security à votre symfony.

```
composer require symfony/security-bundle
```

La sécurité dans symfony implique plusieurs éléments :

* Le firewall: qui est la porte d'entrée pour le système d'authentification, on définit différents firewall (au minimum 1 seul) qui va permettre de mettre en place le bon système de connexion pour l'url spécifiée via un pattern.
* Le provider : qui permet au firewall d'interroger une collection d'utilisateurs/mot de passe ; C'est une sorte de base de tous les utilisateurs avec les mots de passe. Il existe deux type par défaut :
  * in memory : directement dans le fichier security.yml mais du coup les hash des mots de passes sont disponible dans un fichier
  * Entity : N'importe quelle entité qui implémente à minima Symfony\Component\Security\Core\User\UserInterface
  * Enfin, plusieurs providers peuvent fonctionner en même temps par exemple in_memory et entity voire plusieurs entités simultanément. [http://symfony.com/doc/current/security/entity\_provider.html](http://symfony.com/doc/current/security/entity\_provider.html)
* Un encoder : qui permet de générer des hashs/d'encoder des mots de passe ; le plus connu étant MD5 mais vous pouvez utiliser d'autres encoders tels que : sha1, bcrypt ou plaintext (qui n'encode rien c'est le mot de passe en clair) [http://symfony.com/doc/current/security/named\_encoders.html](http://symfony.com/doc/current/security/named\_encoders.html)
* Les rôles : qui permettent de définir le niveau d'accès des utilisateurs connectés (authentifiés) et de configurer le firewall en fonction de ces rôles. Les rôles peuvent être hierarchisées afin d'expliquer par exemple qu'un administrateur (ROLE\_ADMIN par exemple) et avant tout un utilisateur (ROLE_USER).

## Configuration

A partir de la version 4, et avec le composant "maker", la gestion de la sécurité a été grandement facilitée. Là où sur les précédentes versions (la 2 notamment), il était d'usage de passer par un bundle tierce (FOSUserBundle par exemple), aujourd'hui cela n'est plus nécessaire.

### Créer sa classe User

Si vous ne disposez pas encore d'une classe permettant la gestion des utilisateurs, il est possible d'en créer une avec la consôle. Si vous disposez déjà d'une classe utilisateur (ou que vous souhaitez utiliser plusieurs entités, il faudra modifier votre code en implémentant l'interface UserInterface et en respectant les conventions imposées).

L'instruction ci-dessous permet de lancer la consôle pour créer la table User.

```php
php bin/console make:user

//ou
symfony console make:user
```

Symfony va vous poser plusieurs questions afin de configurer les éléments (le nom de l'entité, si vous utilisez doctrine, le champ correspondant au login, et l'encodage du password.

```
The name of the security user class (e.g. User) [User]:
 > 

 Do you want to store user data in the database (via Doctrine)? (yes/no) [yes]:
 > 

 Enter a property name that will be the unique "display" name for the user (e.g. email, username, uuid) [email]:
 > 

 Will this app need to hash/check user passwords? Choose No if passwords are not needed or will be checked/hashed by some other system (e.g. a single sign-on server).

 Does this app need to hash/check user passwords? (yes/no) [yes]:
 > 

 created: src/Entity/User.php
 created: src/Repository/UserRepository.php
 updated: src/Entity/User.php
 updated: config/packages/security.yaml


  Success! 


 Next Steps:
   - Review your new App\Entity\User class.
   - Use make:entity to add more fields to your User entity and then run make:migration.
   - Create a way to authenticate! See https://symfony.com/doc/current/security.html
```

Une fois cette commande executée vous avez un fichier d'entité de créé, un repository associé, et le fichier security.yaml (dans config) qui a été mis à jour.

Il faut ensuite mettre à jour votre base de données, avec les commandes suivantes:

```php
php bin/console d:s:u -f

//ou
php bin/console make:migration
php bin/console doctrine:migrations:migrate

//ou
symfony console d:s:u -f
```

### Créer la partie connexion

Une nouvelle fois la console va nous permettre de dégrossir le travail et produire le contrôleur, le fichier de configuration et le formulaire de connexion.

```php
php bin/console make:auth

//ou
symfony console make:auth
```

Pour le résultat ci-dessous.

```
 What style of authentication do you want? [Empty authenticator]:
  [0] Empty authenticator
  [1] Login form authenticator
 > 1

 The class name of the authenticator to create (e.g. AppCustomAuthenticator):
 > LoginAuthenticator

 Choose a name for the controller class (e.g. SecurityController) [SecurityController]:
 > 

 created: src/Security/LoginAuthenticator.php
 updated: config/packages/security.yaml
 created: src/Controller/SecurityController.php
 created: templates/security/login.html.twig


  Success! 


 Next:
 - Customize your new authenticator.
 - Finish the redirect "TODO" in the App\Security\LoginAuthenticator::onAuthenticationSuccess() method.
 - Review & adapt the login template: templates/security/login.html.twig.
```

Comme indiqué cette commande va créer plusieurs fichiers :

* src/Security/LoginAuthenticator.php : qui va contenir la logique de votre authentification. Que faire une fois l'authetification réussie, ou en cas d'échec. Comment récupérer les informations de l'utilisateur.
* src/Controller/SecurityController.php : qui va être le contrôleur gérant la partie sécurité et authentification. Par défaut la méthode login pour afficher le formulaire et traiter (avec l'aide de l'authenticator précédent), valider les données. C'est dans ce contraôleur que vous pouvez ajouter la déconnexion, l'enregistrement et le mot de passe perdu par exemple.
* templates/security/login.html.twig : la vue contenant le formulaire de connexion, que vous pouvez librement adapter.
* Mettre à jour le fichier security.yaml afin qu'il fasse le lien avec les différents éléments de sécurité.

Les étapes suivantes expliques ce qui a été créé.

### L'encodage du mot de passe (encoders) :

Là aussi, tout est pré-confiuré, vous pouvez bien sûr adapter. L'encodage permet de définir le "format" de cryptage du mot de passe.

```yaml
encoders:
   # use your user class name here
   App\Entity\User:
       # bcrypt or argon2i are recommended
       # argon2i is more secure, but requires PHP 7.2 or the Sodium extension
       algorithm: bcrypt
       cost: 12
```

### Partie "User Provider" (providers) :

Le Provider permet d'assurer quelques tâches nécessaires pour la sécurité. Notamment le fait de récupérer le fait qu'un utilisateur soit connecté (lire la session par exemple), gérer le "se souvenir de moi", ... Cette partie est configurée par défaut dans le fichier security.yaml. Elle peut être suffisante dans de nombreux cas et notamment quand la gestion se fait par une entité.

```yaml
providers:
    # used to reload user from session & other features (e.g. switch_user)
    app_user_provider:
        entity:
            class: App\Entity\User
            property: email
```

### L'authentification et le firewall

C'est la partie essentielle du process de sécurisation. C'est lui qui permet de dire quand il faut vérifier et authentifier un utilisateur. Le firewall permet de déterminer pour un pattern d'url (une requête (request)), la méthode d'authentification à utiliser (une page de connexion, une clé d'API, une dépendance à un fournisseur OAuth, ...).

```yaml
 firewalls:
     dev:
         pattern: ^/(_(profiler|wdt)|css|images|js)/
         security: false
     main:
         anonymous: true
         guard:
             authenticators:
                 - App\Security\LoginAuthenticator
```

L'exemple ci-dessus permet de définir que pour les routes particulières _(les assets, le profiler)_, il n'y a pas de vérification. Pour toutes les autres routes (main), les "anonymes" sont autorisées (c'est à dire les personnes non authentifiées).

Symfony propose des exemples pour de nombreuses méthodes d'authentification (login, ldap, json, ...) que vous [trouverez sur la documentation officielle](https://symfony.com/doc/current/security/auth\_providers.html)

### La gestion des rôles et les autorisations

La gestion des roles se fait dans la partie "access\_control" du fichier security. Il permet de définir pour chaque pattern d'URL quel rôle peut y accèder.

Exemple:

```yaml
access_control:
  # require ROLE_ADMIN for /admin*
  - { path: ^/admin, roles: ROLE_ADMIN }

ou

access_control:
  # matches /admin/users/*
  - { path: ^/admin/users, roles: ROLE_SUPER_ADMIN }

  # matches /admin/* except for anything matching the above rule
  - { path: ^/admin, roles: ROLE_ADMIN }
```

De cette manière les URL seront automatiquement bloquées si l'utilisateur ne dispose pas du bon rôle. Il est aussi possible de tester ce rôle directement dans un contrôleur ou dans une vue selon les besoins. [Voir la documentation pour plus d'éléments sur ce point](https://symfony.com/doc/current/security.html#securing-controllers-and-other-code)

### Récupérer l'utilisateur connecté

Enfin, il est souvent nécessaire de récupérer les informations sur l'utilisateur connecté. Pour cela, dans un contrô leur il est possible d'utiliser directement l'instruction :

```php
$user = $this->getUser();
```

### Gérer la déconnexion

Sur la même idée que pour la connexion, il est possible de gérer la déconnexion. Pour cela, dans le fichier security.yaml, il faut définir le path (la route) pour la méthode qui gére la déconnexion, et la cible (une route, optionnelle), une fois la déconnexion réussie.

```yaml
firewalls:
     main:
         # ...
         logout:
             path:   app_logout
             # where to redirect after logout
             # target: app_any_route
```

La méthode dans le contrôleur peut se résumer à :

```php
#[Route("/deconnexion", name="app_logout")]
public function logout(): void
{
}
```

Cette méthode qui ne retourne rien, permet la déconnexion, et la redirection se fait via le target définit dans security.yaml.

#### Générer un mot de passe avec le bon encodage

Grâce à la console, il est possible de générer un mot de passe selon l'encodage utilisé par Symfony.

```php
php bin/console security:encode-password

//ou
symfony console security:encode-password
```

## Inscription

**Super ! On peut se connecter.**
On ne peut toujours pas créer de compte. Une nouvelle commande de Symfony va générer de quoi faire cette création de compte, mais il va falloir un peu de travail de votre part.

Allez hop ! On ouvre le terminal de commande et on tape :

```
symfony console make:registration-form

# Vous pouvez aussi utiliser une autre commande
# php bin/console make:registration-form
```

Une nouvelle série de questions vous est posée.

```
Do you want to add a @UniqueEntity validation annotation on your Users class to make sure duplicate accounts aren't created? (yes/no) [yes] :
Je vous conseille de répondre yes à cette question, car cela permet d'éviter que plusieurs comptes utilisateur utilisent la même adresse e-mail.

Do you want to send an email to verify the user's email address after registration? (yes/no) [yes] :
Ici, on nous demande si l'on veut envoyer un e-mail à l'utilisateur afin de vérifier la validité de son adresse e-mail.

What email address will be used to send registration confirmations? e.g. mailer@your-domain.com :
Si vous avez répondu oui à la question précédente, entrez une adresse e-mail. Elle sera utilisée en tant qu'adresse expéditeur.

What "name" should be associated with that email address? e.g. "Acme Mail Bot" :
Entrez ici un nom qui sera utilisé lors de l'envoi de l'e-mail de vérification.

Do you want to automatically authenticate the user after registration? (yes/no) [yes] :
Répondez oui si vous souhaitez connecter automatiquement l'utilisateur une fois qu'il est inscrit.

What route should the user be redirected to after registration? :
Si vous avez répondu non à la question précédente, entrez le nom d'une route existante pour rediriger l'utilisateur. Cependant, il ne sera pas connecté automatiquement.
```

Si vous avez opté pour l'envoi d'un e-mail pour la vérification de l'adresse e-mail de l'utilisateur, suivez les étapes suivantes. Dans le cas contraire, vous pouvez passer au chapitre suivant.

```
composer require symfonycasts/verify-email-bundle
```

Ensuite, ouvrez le fichier "src/Controller/RegistrationController.php" et modifiez la méthode verifyUserEmail(). Pour le moment, elle ressemble à cela :

```php
#[Route("/verify/email", name="app_verify_email")]
public function verifyUserEmail(Request $request): Response
{
    $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

    // validate email confirmation link, sets User::isVerified=true and persiststry {$this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
    } catch (VerifyEmailExceptionInterface $exception) {
        $this->addFlash('verify_email_error', $exception->getReason());

        return $this->redirectToRoute('app_register');
    }

    // @TODO Change the redirect on success and handle or remove the flash message in your templates$this->addFlash('success', 'Your email address has been verified.');

    return $this->redirectToRoute('app_register');
}
```

Modifiez la dernière ligne de la méthode, à savoir $this->redirectToRoute(), en indiquant un nom de route où renvoyer l'utilisateur une fois son adresse e-mail vérifiée :

```php
return $this->redirectToRoute('home');
```

Un message flash est créé contenant un message de succès. Pensez à bien l'afficher dans la vue vers laquelle l'utilisateur sera redirigé !

Mettez à jour votre base de données avec la commande suivante :

```
symfony console doctrine:schema:update --force

# Vous pouvez aussi utiliser une autre commande
# php bin/console doctrine:update:schema --force
```

Une route est maintenant disponible :

- Pour s'inscrire : "/register". Le nom de cette route est "app_register"

## Mot de passe oublié ?

On continue sur l'utilisation des outils mis à disposition par Symfony. Attaquons-nous maintenant au mot de passe oublié !
Toujours dans le terminal de commande, entrez ceci :

```
composer require symfonycasts/reset-password-bundle
```

Ce bundle n'est en effet pas installé par défaut. Ensuite, tapez la commande suivante :

```
symfony console make:reset-password

# Vous pouvez aussi utiliser une autre commande
# php bin/console make:reset-password
```

On repart avec une nouvelle série de questions. ?

```
What route should users be redirected to after their password has been successfully reset? [app_home] :
Une fois que l'utilisateur a correctement modifié son mot de passe, où le rediriger ? Le mieux reste le formulaire de connexion soit "app_login".

What email address will be used to send reset confirmations? e.g. mailer@your-domain.com :
Ici, nous pouvons choisir l'adresse e-mail utilisée pour envoyer l'e-mail permettant de modifier le mot de passe.

What "name" should be associated with that email address? e.g. "Acme Mail Bot" :
On définit le nom qui sera affiché dans le mail de modification du mot de passe envoyé.
```

Mettez à jour votre base de données avec la commande suivante :

```
symfony console doctrine:schema:update --force

# Vous pouvez aussi utiliser une autre commande
# php bin/console doctrine:update:schema --force
```

Pensez à fournir les informations nécessaires pour l'envoi de l'e-mail dans le fichier ".env", à la variable d'environnement MAILER_DSN.

Une route est maintenant disponible :

- Pour retrouver son mot de passe : "/reset-password" ; le nom de la route est "app_forgot_password_request"

## Sécuriser une route

Avoir des membres, c'est bien, mais sécuriser les routes de votre application, c'est mieux.
Pourquoi sécuriser ? Tout simplement pour bloquer l'accès de certaines pages aux visiteurs non enregistrés, sans un compte membre par exemple.

Ouvrez un contrôleur et placez-vous sur une méthode dont vous souhaitez ouvrir l'accès seulement aux membres. Au-dessus de cette méthode, inscrivez l'annotation suivante :

```php
// ...

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

// ...

#[IsGranted("ROLE_USER")]
#[Route("/ma_route", name="nom_de_ma_route")]
public function maMethode()
{
  //...
}
```

J'ai ajouté l'annotation IsGranted("ROLE_USER") sans oublier son namespace. ?
ROLE_USER est important, car c'est le rôle attribué à un utilisateur quand celui-ci s'inscrit. Dorénavant, l'accès à cette page est autorisé uniquement aux utilisateurs inscrits et connectés.

Si par contre, vous souhaitez bloquer la totalité des routes dans un contrôleur, déplacez l'annotation au-dessus de la classe comme ceci :

```php
// ...

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

// ...

#[IsGranted("ROLE_USER")]
class NomDeMonController extends AbstractController
{
  // ... 
}
```

## Exercice

Mettre en place une classe User, et créer le formulaire de connexion en suivant la documentation. Filtrer la partie création de catégorie uniquement à des utilisateurs ayant le rôle ROLE_ADMIN.
