# Bootstrap 5 avec Symfony 6 et Webpack Encore
## Introduction

Symfony avec Webpack Encore nous permet d’utiliser et customiser simplement Bootstrap.

Nous allons découvrir ensemble comment mettre en place simplement Bootstrap, puis nous verrons comment aller plus loin en le personnalisant.

# Initialisation du projet Symfony, Webpack Encore et PostCSS

Commençons par créer un nouveau projet Symfony.

```
symfony new bootstrap --full
cd bootstrap
```

Puis installons Webpack Encore selon les instructions de la [documentation Symfony](https://symfony.com/doc/current/frontend/encore/installation.html).

```
composer require symfony/webpack-encore-bundle
npm install
```

Renommons le fichier /assets/styles/app.css en app.scss, et modifions le fichier /assets/app.js.
```
import './styles/app.css';
# Par
import './styles/app.scss';
```

Allez dans le fichier webpack.config.js à la racine du projet Symfony puis enlevez « // » avant .enableSassLoader() pour activer le SassLoader

```
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
```

Puis installer le SassLoader avec npm

```
npm install sass-loader node-sass --save-dev
```

Modifions le fichier /templates/base.html.twig

```html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{{ encore_entry_link_tags('app') }}{% endblock %}
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{{ encore_entry_script_tags('app') }}{% endblock %}
    </body>
</html>
```

Et finalement, lançons une compilation pour nous assurer que tous est OK.

```
npm run build
```

# Mise en place de Bootstrap

Entrons enfin dans le vif du sujet avec la mise en place de Bootstrap !

```
npm install bootstrap
```

Importons-le JavaScript suivant les consignes de la [documentation de Bootstrap 5](https://getbootstrap.com/docs/5.2/getting-started/webpack/) en modifiant le fichier /assets/app.js.

```
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// You can specify which plugins you need
import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';
```

Créons un fichier custom.scss dans /assets/styles, puis importons les feuilles de style dans /assets/styles/app.scss.

```
@import "custom";
@import "~bootstrap/scss/bootstrap";

body {
    background-color: lightgray;
}
```

Nous pouvons lancer un build.

```
npm run build
```

# Testons Bootstrap sur une page

Bon c’est bien beau toutes ces lignes de commandes, mais testons réellement que notre installation de Bootstrap fonctionne ;-)

Créons un contrôleur pour tester et lançons le serveur interne.

```
symfony console make:controller Home
symfony serve -d
```

Vérifions que la route fonctionne.
Et ajoutons du code “bootstrap” (issue de la doc) dans le fichier /templates/home/index.html.twig.

Démarrer le serveur web et connecter vous sur le projet

```
symfony serve -d
```

Et ensuite n’oubliez pas de recompiler
```
npm run build
```

Il est aussi possible de mettre automatiquement les formulaires sous le thème de Bootstrap, ajoutez dans le fichier config/packages/twig.yaml :

```
twig:
    form_themes: ['bootstrap_5_layout.html.twig']
```