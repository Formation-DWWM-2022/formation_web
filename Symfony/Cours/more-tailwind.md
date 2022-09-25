# Tailwind Elements avec Symfony 6 !
# Objectifs

Dans cet cours, je vais vous présenter Tailwind Elements, une surcouche de Tailwind CSS qui permet aux habitués de Bootstrap de se sentir comme chez eux !

En effet, Tailwind Elements est un ensemble de composants et de blocs prêts à l’emploi, qui vous permettront de créer rapidement des interfaces web, tout en bénéficiant de la puissance de Tailwind CSS !

Nous en profiteroins pour voir comment l’installer dans un projet Symfony 6 avec Webpack Encore.

# Création d’un projet Symfony 6

- Pour commencer, nous allons créer un projet Symfony 6 vierge, en utilisant Symfony CLI.

```
symfony new TailwindComponents --webapp
cd TailwindComponents
```

- Puis, installons Webpack Encore.

```
composer require symfony/webpack-encore-bundle
npm install --force
```
    
- Activons le SassLoader dans le fichier webpack.config.js en décommentant la ligne // .enableSassLoader().

```
// webpack.config.js

// ...
.enableSassLoader()
// ...
```

- Installons Sass-loader et sass.

```
npm install sass-loader@^13.0.0 sass --save-dev
```

- Rennomons le fichier assets/styles/app.css en assets/styles/app.scss.

- Modifions le fichier assets/app.js pour qu’il utilise le fichier app.scss à la place de app.css.

```
// assets/app.js

// ...
import './styles/app.scss';
// ...
```

- Buildons le projet.

```
npm run build
```

- Et enfin, générons un controller et une vue pour notre page d’accueil, puis démarrons le serveur.

```
symfony console make:controller HomeController
symfony serve -d
```

# Installation de Tailwind CSS

Nous allons maintenant installer Tailwind CSS au sein de notre projet Symfony 6.

- Installons quelques librairies necessaires à notre utilisation de Tailwind CSS.
- 
```
npm install postcss-loader autoprefixer --dev
```

- Créons le fichier de configuration de PostCSS postcss.config.js.

```
module.exports = {
    plugins: {
        autoprefixer: {}
    }
}
```

- Et activons le PostCssLoader dans le fichier webpack.config.js.

```
// webpack.config.js

// ...
.enablePostCssLoader()
// ...
```

- Installons Tailwind CSS.
- 
```
npm install tailwindcss
```

- Modifions le fichier postcss.config.js pour qu’il utilise Tailwind CSS.

```
module.exports = {
    plugins: {
        tailwindcss: {},
        autoprefixer: {}
    }
}
```

- Générons le fichier de configuration de Tailwind CSS tailwind.config.js.

```
npx tailwindcss init
```

- Et modifions le pour que Tailwind optimise le CSS généré en fonction des classes utilisées dans notre projet.

```
// tailwind.config.js

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./templates/**/*.html.twig'],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

- Dernière étape pour la mise en place de Tailwind CSS, modifions le fichier assets/styles/app.scss pour qu’il utilise Tailwind CSS.

```
// assets/styles/app.scss

@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";
```

- Nous pouvons maintenant build notre projet et passer en mode développement.

```
npm run build
npm run watch
```

# Installation de Tailwind Elements

Place à l’installation de Tailwind Elements ! Vous allez voir, c’est très simple ! Le plus dur est dèjà fait avec Tailwind CSS !

- Commençons par installer Tailwind Elements.

```
npm install tw-elements
```

- Modifions le fichier de configuration de Tailwind CSS tailwind.config.js pour qu’il utilise Tailwind Elements.

```
// tailwind.config.js

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html.twig',
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}
```

- Ajoutons l’imporation de Tailwind Elements dans le fichier assets/app.js.

```
// assets/app.js

// ...
import 'tw-elements';
```

- Buildons le projet et lançons le mode développement.

```
npm run build
npm run watch
```

Et c’est tout ! Vous pouvez maintenant utiliser Tailwind Elements dans votre projet Symfony 6 !
