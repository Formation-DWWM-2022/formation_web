# Template PHP : c’est quoi ?

Le principe est de séparer le code PHP de la mise en page HTML; Le code PHP dans un fichier, la mise en page contenant les balises HTML dans un autre fichier. On se retrouve alors avec, d’un coté, le script qui fait tout ce qu’il a à faire (ex: récupération de données dans une base de données, traitement…), et d’un autre coté, la mise en page avec des zones prédéfinies où seront placées les données générées par le script.

L’avantage évident est de pouvoir travailler uniquement sur la mise en page, sans modifier quoi que ce soit dans le code PHP et inversement, ou de diviser efficacement le travail à faire, le programmeur s’occupant uniquement de la partie scripting, et le designeur, de la mise en page.

Représentation simpliste du fonctionnement d’un système de template :

![](https://phpcodeur.net/wp-content/uploads/2021/09/php_templates_1.jpg)

# Template TWIG

Pour la suite des cours, nous travaillerons avec le système de templates "Twig"

Twig est un moteur de gabarit développé en PHP inclus par défaut avec le framework Symfony 5.

Le langage PHP qui était un moteur de gabarit à ses débuts est maintenant devenu un langage complet capable de supporter la programmation objet, fonctionnelle et impérative.

L'intérêt principal d'un moteur de gabarit est de séparer la logique de sa représentation. En utilisant PHP, comment définir ce qui est de la logique et ce qui est de la représentation ?

Pourtant, nous avons toujours besoin d'un peu de code dynamique pour intégrer des pages web :
- pouvoir boucler sur une liste d'éléments ;
- pouvoir afficher une portion de code selon une condition ;
- ou formater une date en fonction de la date locale utilisée par le visiteur du site...

Voici pourquoi Twig est plus adapté que le PHP en tant que moteur de gabarit :
- il a une syntaxe beaucoup plus concise et claire;
- par défaut, il supporte de nombreuses fonctionnalités utiles, telles que la notion d'héritage ;
- et il sécurise automatiquement vos variables.

# Installation
Installons Twig avec Composer:
```
composer require twig
```

Ceci créera dans le répertoire courant un dossier vendor contenant les librairies demandées et les dépendances.

# Éléments de syntaxe
Twig supporte nativement trois types de syntaxe :
- {{ ... }}  permet l'affichage d'une expression ;
- {% ... %}  exécute une action ;
- {# ... #}  n'est jamais exécuté, c'est utilisé pour des commentaires.

# Opérateurs
On retrouve tous les opérateurs dans Twig, tous décrits dans la documentation officielle.

```html
{% for key, element in elements %}
    {% if loop.index % 2 %}
        Element pair
    {% else %}
        Element impair
    {% endif %}
{% else %}
    Il n'y a aucun élément à afficher.
{% endfor %}
```

# Exemple
On définit d’abord un template de base, BaseTemplate.html:

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    {% block head %}
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" />
        <title>{% block title %}{% endblock %}</title>
    {% endblock %}
</head>
<body>
    <section id="content">
        {% block content %}{% endblock %}
    </section>
    <footer id="footer">
        {% block footer %}
            &copy; Copyright 2020 <a href="http://monsite.com">
            Mon super Site</a>.
        {% endblock %}
    </footer>
</body>
</html>
```

Puis un template plus spécialisé qui en hérite, menu.html :

```html
{% extends "BaseTemplate.html" %}
{% block title %}Menu de la semaine{% endblock %}
{% block head %}
{{ parent() }}
<style>
    .important { color: #336699; }
</style>
{% endblock %}
{% block content %}
    <h1>Menu</h1>
    <p class="important">
        Voici votre menu de la semaine:
        <dl>
            <dt>Lundi</dt>
            <dd>{{Lundi}}</dd>
            <dt>Mardi</dt>
            <dd>{{Mardi}}</dd>
            <dt>Mercredi</dt>
            <dd>{{Mercredi}}</dd>
            <dt>Jeudi</dt>
            <dd>{{Jeudi}}</dd>
        </dl>
    </p>
{% endblock %}
```

Enfin, on utilise ce template dans un fichier menu.php en chargeant d’abord l”autoloader:

```php
<?php
// menu.php
// inclure  l'autoloader
include 'vendor/autoload.php';

try {
    // le dossier ou on trouve les templates
    $loader = new Twig\Loader\FilesystemLoader('templates');

    // initialiser l'environement Twig
    $twig = new Twig\Environment($loader);

    // load template
    $template = $twig->load('Menu.html');

    // set template variables
    // render template
    echo $template->render(array(
        'lundi' => 'Steak Frites',
        'mardi' => 'Raviolis',
        'mercredi' => 'Pot au Feu',
        'jeudi' => 'Couscous',
        'vendredi' => 'Poisson',
    ));

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
```
