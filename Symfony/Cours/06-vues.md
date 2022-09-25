# Vues - TWIG

## Présentation

Un template ou une vue est le meilleur moyen d'organiser et de restituer le code HTML à partir de  votre application, que vous deviez rendre le code HTML à partir d'un contrôleur ou générer le contenu d'un courrier électronique . Les templates dans Symfony sont créés avec Twig: un moteur de modèle flexible, rapide et sécurisé.

[Twig](https://twig.symfony.com/) est un moteur de rendu de template comme [Smarty](https://www.smarty.net/) (prestashop) ou [Blade](https://laravel.com/docs/5.8/blade) (laravel). Twig a cependant été développé pour Symfony à l'origine et peut être utilisé dans d'autres contextes.&#x20;

{% hint style="info" %}
Un moteur de template permet de limiter les logiques complexes pour réaliser des templates simples à coder. Un moteur de template intègre généralement des fonctionnalités qui sont récurrentes dans le développement "front" et qui permettent de simplifier le code à écrire.
{% endhint %}

[La documentation officielle de Symfony sur les vues et TWIG](https://symfony.com/doc/current/templating.html) et [La documentation officielle de TWIG](http://twig.sensiolabs.org/)

## Exemple d'une vue avec twig

Exemple d'un code que vous pourriez écrire en PHP

```php
<body>
    <h1><?php echo $page_title ?></h1>
    <ul id="navigation">
        <?php foreach ($navigation as $item): ?>
        <li>
                <a href="<?php echo $item->getHref() ?>">
                    <?php echo $item->getCaption() ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>
```

Ce même code, écrit avec TWIG serait :

```twig
<body>
    <h1>{{ page_title }}</h1>

    <ul id="navigation">
        {% raw %}
{% for item in navigation %}
            <li><a href="{{ item.href }}">{{ item.caption }}</a></li>
        {% endfor %}
{% endraw %}
    </ul>
</body>
```

La syntaxe est plus "legére" et moins encombrées des balises PHP. Le code semble donc plus lisible et par conséquent plus facile à maintenir.

## Affichage

La syntaxe Twig est basée sur uniquement trois constructions:

* `{{ ... }}`, utilisé pour afficher le contenu d'une variable ou le résultat de l'évaluation d'une expression;
* `{% ... %}`, utilisé pour exécuter une logique, telle qu’une condition ou une boucle;
* `{# ... #}`, utilisé pour ajouter des commentaires au modèle (contrairement aux commentaires HTML, ces commentaires ne sont pas inclus dans la page rendue).

{% hint style="danger" %}
Vous ne pouvez pas exécuter de code PHP dans les modèles Twig, mais Twig fournit des utilitaires permettant d'exécuter une certaine logique dans les modèles. Par exemple, les **filtres** modifient le contenu avant le rendu, comme le `upper`filtre pour mettre le contenu en majuscule :

`{{ title|upper }}`

Twig intègre une [liste de filtre](https://twig.symfony.com/doc/2.x/) permettant de répondre aux usages courant. Mais il est très simple d'ajouter nos propres filtres afin de répondre parfaitement à nos besoins.
{% endhint %}

## Variables

TWIG est très puissant lorsqu'il s'agit de manipuler des variables. Pour lui, si c'est un tableau associatif ou un objet avec des propriétés cela est identique dans la syntaxe.

Par exemple si vous avez le tableau `$tab['param1']` vous écrirez en TWIG

```
{{tab.param1}}
```

Si vous avez un objet `$tab`, qui est une instance d'une classe ayant comme propriété `$param1`, la syntaxe en TWIG sera :

```
{{tab.param1}}
```

Si vous avez un objet `$tab`, qui est une instance d'une classe ayant comme propriété `$param1`, qui est un tableau associatif avec une clé `key1`, la syntaxe pourrait être :

```python
{{tab.param1.key1}}
```

La manière dont TWIG inspecte votre code pour trouver la meilleure façon d'interpréter une variable est la suivante :

For convenience's sake `foo.bar` does the following things on the PHP layer:

* check if foo is an array and bar a valid element;
* if not, and if foo is an object, check that bar is a valid property;
* if not, and if foo is an object, check that bar is a valid method (even if bar is the constructor - use __construct() instead);
* if not, and if foo is an object, check that getBar is a valid method;
* if not, and if foo is an object, check that isBar is a valid method;
* if not, and if foo is an object, check that hasBar is a valid method;
* if not, return a null value.

foo['bar'] on the other hand only works with PHP arrays:

* check if foo is an array and bar a valid element;
* if not, return a null value.

## Logique

* `{% %}` permet d'utiliser des logiques tels que :
  * `{% if %} {% else %} {%endif %}` : condition
  * `{% for item in items %}{%endfor}` : foreach
  * `{% set foo='foo' %}`  : set des variables

### Tests

Il est possible d'écrire des tests, la syntaxe est très proche de celle de PHP. Attention toutefois, les opérateurs de comparaison ne s'écrive pas de manière identique.

Le && de PHP s'écrit "and" dans TWIG, et le || de PHP s'écrit "or" dans TWIG.

Il est possible d'avoir des _elseif_ (autant que nécessaire) et un bloc _else_ (1 au maximum)

```twig
{% raw %}
{% if condition %}

{% else if condition %}

{% else %}

{% endif %}
{% endraw %}
```

### Boucles

Il n'existe que la boucle for dans TWIG (elle est un peu l'équivalent d'un foreach).

Le code ci-dessous est une boucle qui varie de 1 à 10.

```twig
{% raw %}
{% for i in 1..10 %}

{% endfor %}
{% endraw %}
```

La boucle ci-dessous est une boucle qui parcours une "collection" users (l'équivalent du foreach). **Attention la syntaxe est inversée par rapport au PHP**

```twig
<ul>
    {% raw %}
{% for user in users %}
        <li>{{ user.username }}</li>
    {% endfor %}
{% endraw %}
</ul>
```

Dans le cadre d'une boucle TWIG propose une variable nommée loop qui permet d'avoir des informations sur la boucle :

| Variable       | Description                                                   |
| -------------- | ------------------------------------------------------------- |
| loop.index     | The current iteration of the loop. (1 indexed)                |
| loop.index0    | The current iteration of the loop. (0 indexed)                |
| loop.revindex  | The number of iterations from the end of the loop (1 indexed) |
| loop.revindex0 | The number of iterations from the end of the loop (0 indexed) |
| loop.first     | True if first iteration                                       |
| loop.last      | True if last iteration                                        |
| loop.length    | The number of items in the sequence                           |
| loop.parent    | The parent context                                            |

La boucle ci-dessous intègre un test. Ce qui simplifie l'écriture. Elle intègre également un else dans le cas ou la boucle ne ferait aucune itération. Il est possible d'utiliser le else sans le if et réciproquement.

```twig
<ul>
    {% raw %}
{% for user in users|filter(user => (user.active == true)) %}
        <li>{{ user.username }}</li>
    {% else %}
        <li>No users found</li>
    {% endfor %}
{% endraw %}
</ul>
```

Le code ci-dessus serait équivalent en PHP au code suivant:

```php
<?php
<ul>
if (count($users) > 0) {
    foreach ($users as $user) {
        if ($user->isActive() == true) {//isActive() est une méthode de mon objet $user
            echo '<li>'.$user->getUsername().'</li>';
        }
    }
}
else {
    echo '<li>No users found</li>';
}
</ul>
```

## Héritage

TWIG permet l'héritage de template via un `extends` dans les templates enfants :

```twig
{% raw %}
{% extends 'base.html.twig' %}
{% endraw %}
```

Dans les templates mère on définit des "block" que l'on vient surcharger dans les templates enfants :

```twig
{% raw %}
{% block body %}
toto
{% endblock %}
{% endraw %}
```

On peut également reprendre le block parent via

```python
{{ parent() }}
```

On crée donc des templates mère assez flexibles pour pouvoir en hériter et surcharger les différents blocks

## Exercice 1

* Utiliser l'héritage pour mettre le menu dans un seul fichier mais visible sur les 2 pages.
* Intégrer bootstrap (CDN)
* Pour la page /color  afficher le mot de la même couleur dynamiquement ("bleu" en bleu) (en CSS)
* Pour la couleur rouge afficher en plus le Message : "Attention risque de virus" en rouge

## Inclusions

De la même manière que l'on peut hériter d'un template de base, on peut aussi inclure des "morceaux" de template dans une vue. Toujours dans la perspective de ne jamais multiplier un morceau de code identique dans plusieurs fichiers.

## Filtres

Il est possible d'appliquer des filtres sur les variables pour effectuer des transformations : Majuscules, minuscules, dates, ...

```
{{ variable|upper }}
```

Vous trouverez la liste des filtres sur l'adresse : [Liste des filtres de TWIG](https://twig.symfony.com/doc/2.x/)

Il est possible de cumuler les filtres. Mais il faut faire attention à l'ordre dans lequel on les appliques. Il est aussi possible de créer ses propres filtres.

## Assets

TWIG propose de gérer facilement les URL de vos images, fichiers CSS ou encore javascript.

Pour cela vous aurez besoin d'ajouter le bundle suivant :

```bash
composer require symfony/asset
```

Ensuite, vous pouvez écrire dans TWIG

```markup
<img src="{{ asset('images/logo.png') }}" alt="Symfony!" />

<link href="{{ asset('css/blog.css') }}" rel="stylesheet" />
```

Par défaut, vos "assets" doivent se trouver dans le répertoire public de Symfony.

**Depuis la version 3.4 et 4, Symfony propose de gérer les assets avec WebPack-Encore, qui est une adaptation de Webpack pour Symfony** Vous trouverez les éléments sur WebPack-Encore ici : [https://symfony.com/doc/current/frontend.html](https://symfony.com/doc/current/frontend.html)

## Exercice 2

* Modifiez le code précédemment écrit pour manipuler des assets directement dans votre projet. Vous intégrer une image de votre choix et Bootstrap en version locale (supprimer toutes les dépendances aux CDN).
