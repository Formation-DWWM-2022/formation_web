# TP-01 : Création du projet et routes

## Exercices

### 1. Créer le projet
Créer un projet Symfony nommé `Symazon` qui sera une boutique en ligne.

> **Aide : Créer un nouveau projet**
> En étant dans le dossier des projets Symfony, créeez le projet avec :
`$ composer create-project symfony/website-skeleton Symazon`
> Puis rentrez dans le dossier avec `cd Symazon` et ouvrez le dossier `Symazon` dans votre IDE.

### 2. Créer un controller
Créer un controller grâce à la commande `php bin/console make:controller` nommé `PagesController` qui contiendra toutes les pages communes qui ne concernent pas un `Model` (par exemple: `/home`, `/about`, `/contact`...)

### 3. Créer nos premières routes
Créer la route `/contact` dans `PagesController` et la vue associée : elle affichera un formulaire dont l'action pointera vers la route `/traitementContact`.

> **Aide : Afficher une vue**
> 1. Créez le fichier template du formulaire de contact dans `/templates/pages/contact.html.twig`, qui héritera de `base.html.twig` grâce à `{% extends 'base.html.twig' %}
> 2. Si vous souhaitez utiliser Bootstrap, vous pouvez l'inclure dans `base.html.twig`

> **Aide : Appeler une route dans Twig**
> Pour appeler une route dans Twig (par exemple pour l'action du formulaire) :
>
> 1. Nommez la route d'arrivée dans le Controller grâce à `@Route("/contact", name="app_contact")
> 2. vous utiliserez la fonction `path()` de twig dans la vue, par exemple :
>
> ```twig
> <form method="post" action="{{ path('nom_de_la_route') }}">
> </form>
> ```
> 3. Pour envoyer des paramètres à une route :
> ```twig
> <a href="{{ path('articles_show', {'id': article.id}) }}">Voir l'article</a>
> ```

### 4. Récupérer les données du formulaire

Dans la définition de la méthode correspondant à `/traitementForm`, vous ajouterez en paramètres `Request $request`. Attention au `use` ! Il s'agit bien de `...\HttpFoundation\Request` dans l'autocomplétion.

Exemple :

```php
    /**
     * @Route("/traitementContact", name="app_traitement_contact")
     */

    public function traitementContact(Request $request) {

    }
```

1. Débuguez `$request` grâce au dump/die : `dd($var)`.
2. Retrouvez dans l'objet `Request` les données du formulaire.
3. Trouvez comment récupérer ces données POST venues du formulaire dans votre controller Symfony (**Aide :** https://lmgtfy.com/?q=symfony+request+post+params )