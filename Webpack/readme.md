Webpack par-ci, Webpack par-là… que vous soyez un développeur chevronné ou non, vous avez forcément entendu parler de cet outil. Qualifié de “bundler”, il vous permettra de faire bien des choses : utiliser un serveur local, utiliser le Live Reload, mais aussi et surtout compiler tous vos fichiers pour les regrouper en un seul. Pratique pour bien des raisons, notamment pour la performance de votre app ! Alors faites chauffer votre café, installez-vous bien : vous êtes à quelques lignes de comprendre Webpack et de bien le configurer !

# Initialisation du projet avec Node et NPM

Si vous n’avez pas déjà installé Node et NPM, je vous invite à faire depuis le site officiel. Sur Ensuite, créez un dossier dans lequel vous allez travailler. Nommez-le donc comme vous le souhaitez.

Afin de préparer votre projet à utiliser les dépendances NPM, ouvrez votre terminal, rendez-vous à la racine de votre projet et tapez la commande suivante :

```
npm init -y
```

Ensuite, vous allez devoir créez 2 dossiers (public contenant 2 fichiers : index.html, bundle.js et src contenant 1 fichier index.js) et 1 fichier webpack.config.js à la racine. Pour vous faciliter la tâche, voici les commandes à exécuter (sous Linux/macOS, ces opérations sont aussi réalisables sous Windows avec des commandes équivalentes ou "à la souris") :

```
touch webpack.config.js && mkdir public src && cd public && touch index.html bundle.js && cd .. && cd src && touch index.js && cd ..
```

Le dossier src/ nous permettra de stocker la logique de notre application tandis que le dossier public nous permettra de stocker tous nos fichiers minifiés. Mais ça, on le verra plus tard.

Il ne manque plus qu’un dossier assets qui comprendra lui même 4 dossiers dont les noms parlent d’eux-mêmes : fonts, icons, images et stylesheets. Tapez donc cette commande pour les créer rapidement :

```
mkdir assets && cd assets && mkdir fonts icons images stylesheets && cd ..
```

Même chose que pour le point précédent, ces opérations sont aussi réalisables sous Windows avec des commandes équivalentes ou "à la souris".

# Installation de Webpack

Voici la partie que vous attendiez avec impatience : l’installation de Webpack. Pour cela, tapez simplement :

```
npm install --save-dev webpack@latest webpack-dev-server@latest webpack-cli
```

Les flags --save-dev (ou raccourci avec -D) indiquent que Webpack correspond à une dépendance de développement, que l'on a besoin de ces fichiers durant cette phase. Vous pourrez le vérifier dans votre fichier package.json où il sera affiché sous la section dev dependencies. Un dossier node_modules va apparaître dans votre dossier : il s’agit des dépendances dont Webpack va avoir besoin pour fonctionner.

> Si vous utilisez git pour versionner vos fichiers, il est recommandé de ne pas inclure le dossier node_modules, c'est-à-dire de l'ajouter aux instructions .gitignore

# Configuration de Webpack

Maintenant que Webpack est installé, nous allons devoir le configurer ! Pour cela, ouvrez webpack.config.js et ajoutez les lignes suivantes :

``` js
const webpack = require("webpack");
const path = require("path");
```

Nous créons ici une constante appelée webpack, qui requiert le module webpack. C’est la base pour que tout fonctionne. Puis nous créons la variable path qui va nous permettre d’indiquer les bons chemins vers nos fichiers.

Ensuite, il va falloir indiquer un point d’entrée (notre fichier index.js), c’est-à-dire le fichier qui sera lu et un point de sortie, à savoir le fichier qui sera compilé (bundle.js). Ensuite, nous allons exporter cette configuration :

``` js
let config = {
    mode: "development",
    entry: "./src/index.js",
    output: {
        path: path.resolve(__dirname, "./public"),
        filename: "./bundle.js"
    }
}

module.exports = config;
```

Maintenant, n’oubliez pas de lier votre fichier bundle.js à votre fichier index.html en tapant la ligne de code qui suit, juste avant la fermeture de votre balise `<body>` :

``` html
<script src="bundle.js"></script>
```

Avant de faire notre premier test, vous allez installer Webpack de manière globale sur votre ordinateur avec l'option -g :

```
npm install -g webpack@latest webpack-cli
```

Rendez-vous désormais dans votre fichier index.js et tapez le code JS de votre choix. J’ai opté pour un simple :

```js
document.write("Je débute avec Webpack !");
```

Maintenant, tapez simplement webpack dans votre terminal et laissez la magie opérer :) Profitez-en pour ouvrir votre index.html avec le navigateur de votre choix pour voir le contenu de votre page !

# Un peu d’automatisation

Tout ceci est bien beau, mais vous n’allez pas taper webpack dans votre terminal à chaque fois que vous voulez voir vos derniers changements, ça serait trop lourd ! Un flag existe pour cela : --watch ou -w. Allez-y, tapez webpack --watch et regardez ce qu’indique Webpack dans votre terminal :

Cela signifie que Webpack surveille les modifications que vous allez apporter à vos fichiers. Vous pourrez donc simplement rafraîchir votre page HTML à chaque fois que vous voudrez voir le rendu. D’ici quelques paragraphes, nous verrons comment mettre en place le Hot Module Reload ou HMR pour les intimes : vos pages seront automatiquement rafraîchies à chaque fois que vous sauvegarderez votre travail depuis votre éditeur de code.

Reprenez donc votre fichier index.js et éditez le texte que vous aviez écrit. Sauvegardez, rechargez la page : magie, ça fonctionne ! Mais nous pouvons encore améliorer ceci. Plutôt que de taper webpack --watch, nous allons rendre ça un peu plus sexy : rendez-vous dans votre fichier package.json et modifiez l’objet script comme suit :

```json
"scripts": {
  "watch": "webpack --watch"
}
```

Maintenant, lorsque vous voudrez lancer la commande watch depuis votre terminal, tapez `npm run watch`.

# Écrire de l’ES6 ? Le convertir en ES5 ? C’est possible

Vous avez sûrement déjà entendu parler de l’ES6 (ECMAScript 6), une version récente du langage Javascript (suivie par d'autres au fil des ans). Vous devez donc savoir qu’il n’est pas possible pour tous les navigateurs (les plus anciens) d'interpréter l’ES6.

Webpack va nous permettre, en collaboration avec Babel, de compiler l’ES6 en ES5, ce qui rendra votre syntaxe récente (par exemple let et autres fonctions fléchées) parfaitement utilisable.

Pour cela, nous allons installer les dépendances Babel Loader et Babel Core :

```
npm install --save-dev babel-loader @babel/core babel-polyfill
```

Ajoutez ensuite le code suivant à votre fichier de configuration Webpack, après l’objet output :

```js
entry: {
    polyfill: "babel-polyfill",
    app: "./src/index.js"
},
module: {
    rules: [{
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
            loader: "babel-loader",
            options: {
                presets: ["@babel/preset-env"]
            }
        }
    }]
}
```

Quelques explications :

- La première ligne va identifier tous les fichiers se terminant par .js
- La seconde va exclure de ces fichiers tous ceux qui se situent dans node_modules
- La troisième va charger le loader Babel Core babel-loader

Votre fichier doit donc désormais ressembler à ça :

```js
const webpack = require("webpack");
const path = require("path");

let config = {
    mode: "development",
    entry: {
        polyfill: "babel-polyfill",
        app: "./src/index.js"
    },
    output: {
        path: path.resolve(__dirname, "./public"),
        filename: "./bundle.js"
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: "babel-loader",
                options: {
                    presets: ["@babel/preset-env"]
                }
            }
        }]
    }
}

module.exports = config;
```

Maintenant, nous allons devoir indiquer à Babel qu’il doit utiliser le preset (pré-réglage) ES2015. Pour ce faire, entrez la commande suivante :

```
npm install --save-dev @babel/preset-env
```

Créez un fichier .babelrc à la racine de votre projet et ajoutez-y le code suivant :

```json
{
    "presets": [
      ["@babel/preset-env", {
        "targets": {
          "browsers": ["last 2 versions", "safari >= 7"]
        }
      }]
    ]
  }
```

Il va rendre votre ES6 compatible avec les 2 dernières de tous les navigateurs et les versions de Safari supérieures ou égales à la 7. Babel utilisant Browserlist, je vous invite à vous rendre sur la [page GitHub](https://github.com/ai/browserslist) du projet si vous souhaitez en apprendre plus sur cette partie de la configuration.

Allez dans votre fichier index.js et tapez de l’ES6. Pour ma part, je suis resté simple avec :

```js
document.querySelector('.btn.btn-success').addEventListener('click', () => {
    alert('coucou');
});
```

Ensuite, lancez Webpack avec npm run watch. Ouvrez votre fichier bundle.js et rendez-vous tout en bas. Si tout à bien fonctionné, vous devriez avoir `document.querySelector(".btn.btn-success").addEventListener("click",(function(){alert("coucou")}));` à la place, signe que Webpack a bien compilé l’ES6 en ES5 !

# Compiler du SCSS en CSS ? C’est possible aussi

Pour cela, vous allez avoir besoin d’installer de nouvelles dépendances :

```
npm i --save-dev sass-loader sass css-loader style-loader autoprefixer postcss-loader
```

De la même manière que vous l’aviez fait pour Babel Loader, tapez le code suivant dans webpack.config.js après le loader babel-loader :

```js
{
    test: /\.scss$/,
    use: ['style-loader', 'css-loader', 'sass-loader', 'postcss-loader']
}
```

Votre fichier webpack.config.js doit désormais ressembler à ça :

```js
const webpack = require("webpack");
const path = require("path");

let config = {
    mode: "development",
    entry: {
        polyfill: "babel-polyfill",
        app: "./src/index.js"
    },
    output: {
        path: path.resolve(__dirname, "./public"),
        filename: "./bundle.js"
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: "babel-loader",
                options: {
                    presets: ["@babel/preset-env"]
                }
            }
        },
        {
            test: /\.scss$/,
            use: ['style-loader', 'css-loader', 'sass-loader', 'postcss-loader']
        }]
    }
}

module.exports = config;
```

Il va maintenant falloir créer un fichier .scss dans votre dossier assets/stylesheets pour tester tout ça :) Si vous n’êtes pas du tout familier avec SASS, je vous conseille de vous y intéresser. Il s’agit de CSS évolué, vous permettant notamment d’utiliser des variables. Nommez-le styles.scss. Voici le code que j’ai tapé, toujours pour rester simple :

```scss
$font-stack: Helvetica, sans-serif;
$primary-color: #333;

body {
    font: 100% $font-stack;
    color: $primary-color;
    background-color: aqua;
}
```

Dans index.js, nous allons maintenant require ce fichier. Pour cela, écrivez la ligne suivante au-dessus de tout le code :

```js
require("../assets/stylesheets/styles.scss");
```

Avant de vérifier que tout fonctionne, j’attire votre attention sur PostCSS et autoprefixer : ce sont 2 outils qui vont vous permettre de préfixer automatiquement votre code CSS pour tous les navigateurs. Il ne vous sera donc plus nécessaire de penser écrire des propriétés CSS spécifiques pour -webkit- (WebKit, Safari, Opera), -moz- (Firefox), -o- (anciennes versions d'Opera) et -ms- (Microsoft). Tout sera fait automatiquement !

Pour en profiter, créez un fichier postcss.config.js à la racine de votre projet et ajoutez-y le code suivant :

```js
module.exports = {
    plugins: [
        require("autoprefixer")
    ]
}
```

Maintenant, relancez Webpack puis rechargez votre page. Elle devrait arborer un très beau background !

C'est très bien mais cela ne fonctionnera que dans votre environnement de développement. Tant que le tout n’est pas extrait dans un fichier CSS, vos utilisateurs ne pourront pas profiter de vos belles interfaces. Nous allons donc faire en sorte que tout code écrit dans un fichier SCSS soit compilé en CSS dans un fichier adéquat.

Pour cela, nous allons ajouter de nouvelles dépendances, vous commencez à en avoir l’habitude :

```
npm install --save-dev mini-css-extract-plugin
```

Ajoutez la ligne suivante sous la ligne const path de votre fichier de configuration Webpack pour require le plugin Extract Text :

```js
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
```

Ensuite, remplacez :

```js
{
  test: /\.scss$/,
  use: ['style-loader', 'css-loader', 'sass-loader', 'postcss-loader']
}
```

Par ceci, pour spécifier quels loaders utiliser et appeler le plugin :

```js
{
  test: /\.scss$/,
  use: [
      MiniCssExtractPlugin.loader,
      "css-loader",
      "postcss-loader",
      "sass-loader",
  ],
}
```

Enfin, initialisez le plugin avec le code suivant, après votre objet module :

```js
  plugins: [
      new MiniCssExtractPlugin({
          filename: "styles.css"
      }),
  ]
```

Votre fichier de configuration Webpack doit donc désormais ressembler à ceci :

```js
const webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

let config = {
    mode: "development",
    entry: {
        polyfill: "babel-polyfill",
        app: "./src/index.js"
    },
    output: {
        path: path.resolve(__dirname, "./public"),
        filename: "./bundle.js"
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: "babel-loader",
                options: {
                    presets: ["@babel/preset-env"]
                }
            }
        },
        {
            test: /\.(sa|sc|c)ss$/,
            use: [
                MiniCssExtractPlugin.loader,
                "css-loader",
                "postcss-loader",
                "sass-loader",
            ],
        }]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "styles.css"
        }),
    ]
}

module.exports = config;
```

C’est l’heure du test ! Lancez npm run watch : si vous n’avez aucune erreur de compilation dans votre terminal et qu’un fichier styles.css a bien été généré dans votre dossier public avec du pur CSS, c’est que tout est bon ! N’oubliez pas de linker votre fichier CSS à votre HTML.

## Installer un serveur de développement avec Hot Module Reload

Chose promise, chose due ! Nous allons maintenant un serveur de développement avec Hot Module Reload, qui rechargera automatiquement vos pages en fonction des modifications que vous apporterez à vos fichiers et qui en plus fera office de serveur local.

On commence donc par l’habituelle installation de dépendances :

```
npm install webpack-dev-server --save-dev
```

Après l’array de votre objet plugins dans votre fichier de configuration Webpack, ajoutez le code suivant :

```js
devServer: {
    static: {
        directory: path.join(__dirname, './public'),
    },
    historyApiFallback: true,
    open: true,
    hot: true
},
devtool: "eval-source-map"
```

Quelques explications :

- static : indique le dossier depuis lequel le contenu sera servi
- historyApiFallback : activation d’un fallback vers index.html pour les Single Page Applications
- open : ouvre votre navigateur par défaut lorsque le serveur est lancé
- hot : active le Hot Module Reload, soit le rechargement automatique de vos modules à chaque modification/sauvegarde de vos fichiers

Votre fichier de configuration Webpack doit ressembler à ce qui suit après cette nouvelle mise à jour :

```js
const webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const devMode = process.env.NODE_ENV != "production";

let config = {
    mode: "development",
    entry: {
        polyfill: "babel-polyfill",
        app: "./src/index.js"
    },
    output: {
        path: path.resolve(__dirname, "./public"),
        filename: "./[name].bundle.js"
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: "babel-loader",
                options: {
                    presets: ["@babel/preset-env"]
                }
            }
        },
        {
            test: /\.(sa|sc|c)ss$/,
            use: [
                devMode ? "style-loader" : MiniCssExtractPlugin.loader,
                "css-loader",
                "postcss-loader",
                "sass-loader",
            ],
        }]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "styles.css"
        }),
    ],
    devServer: {
        static: {
            directory: path.join(__dirname, './public'),
        },
        historyApiFallback: true,
        open: true,
        hot: true
    },
    devtool: "eval-source-map"
}

module.exports = config;
```

Maintenant, il va falloir lancer votre serveur ! Pour ce faire, remplacez l’objet scripts de votre package.json par :

```json
"scripts": {
  "start": "webpack serve"
}
```

Comme vous pouvez le voir, il vous suffit de taper npm run start pour lancer votre serveur et non plus npm run watch comme nous le faisions jusqu’alors. Si tout se passe bien, votre navigateur va alors s’ouvrir avec un onglet contenant votre site.

# Minifier les fichiers Javascript

La minification, vous connaissez ? En gros, il s’agit de réduire la taille de vos fichiers de manière à accélérer leur chargement en retirant les caractères et espaces superflus. Le plugin UglifyJS va nous permettre d’atteindre ce but.

Allez, on s’installe des dépendances :) ?

```
npm install uglifyjs-webpack-plugin --save-dev
```

Comme on l’a fait jusque là, créez une constante pour ce plugin dans votre fichier de configuration Webpack, sous le plugin Extract Text :

```js
const UglifyJSPlugin = require("uglifyjs-webpack-plugin");
```

N’oublions pas d’initialiser le optimisation apres devtools :

```js
optimization: {
    minimize: true,
    minimizer: [new UglifyJSPlugin({
        test: /\.js(\?.*)?$/i,
    })],
},
```

Qui doit donc désormais ressembler à ça :

```js
const webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const devMode = process.env.NODE_ENV != "production";
const UglifyJSPlugin = require("uglifyjs-webpack-plugin");

let config = {
    mode: "development",
    entry: {
        polyfill: "babel-polyfill",
        app: "./src/index.js"
    },
    output: {
        path: path.resolve(__dirname, "./public"),
        filename: "./[name].bundle.js"
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: "babel-loader",
                options: {
                    presets: ["@babel/preset-env"]
                }
            }
        },
        {
            test: /\.(sa|sc|c)ss$/,
            use: [
                devMode ? "style-loader" : MiniCssExtractPlugin.loader,
                "css-loader",
                "postcss-loader",
                "sass-loader",
            ],
        }]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "styles.css"
        }),
    ],
    devServer: {
        static: {
            directory: path.join(__dirname, './public'),
        },
        historyApiFallback: true,
        open: true,
        hot: true
    },
    devtool: "eval-source-map",
    optimization: {
        minimize: true,
        minimizer: [new UglifyJSPlugin({
            test: /\.js(\?.*)?$/i,
        })],
    },
}

module.exports = config;
```

Lancez Webpack avec la commande webpack. Si tout a bien fonctionné, rendez-vous dans votre fichier bundle.js : vous verrez que le fichier a été minifié et ne tient plus que sur une seule ligne.

# Mettre en place des environnements de production et de développement

C’est bien beau tout ça, mais comment est-ce que vous allez vous y retrouver dans tout ce code minifié ? Pas facile de débugger.

Nous allons donc mettre en place un environnement de développement dans lequel rien ne sera minifié. Parce que pendant cette phase, on s’en fiche pas mal que votre code soit léger et vous devrez être capable de vous y retrouver facilement. En revanche, en production, c’est-à-dire le produit servi aux utilisateurs, on aura tout intérêt à minifier notre code.

Rendez-vous donc dans votre fichier package.json et ajoutez les lignes suivantes à votre objet script (si vous etes sous Windows, ne tapez pas ce code, passez à l'étape suivante) :

```json
"dev": "webpack",
"prod": "NODE_ENV=production webpack --progress"
```

Attention, si vous développez sous Windows, la manipulation est légèrement différente. Commencez par installer la dépendance cross-env avec la commande suivante :

```
npm install --save-dev cross-env
```

Ensuite, modifiez votre fichier package.json de la manière suivante :

```json
"scripts": {
  "dev": "webpack",
  "prod": "cross-env NODE_ENV=production webpack --progress"
}
```

Lancez Webpack en faisant npm run prod. Si vous avez bien fait, vous devriez voir NODE_ENV=production webpack --progress dans votre terminal.

C’est très bien, mais ça ne fait actuellement rien de plus que notre commande npm run start en terme de différenciation d’environnement. Nous allons donc y remédier en tapant cette condition sous notre module.exports de notre fichier de configuration Webpack :

```js
optimization: {
    minimize: !devMode,
    minimizer: [new UglifyJSPlugin({
        test: /\.js(\?.*)?$/i,
    })],
},
```

En gros, on dit dans cette condition que si on dans notre environnement de production, alors minifie nos fichiers en utilisant le plugin UglifyJS. Du coup, n’oubliez pas de supprimer new UglifyJSPlugin() de votre array plugins sinon vos fichiers seront minifiés dans tous les cas.

Maintenant, si vous lancez npm run dev, vous serez dans votre environnement de développement, vos fichiers ne seront pas minifiés. Faites un test et regardez votre fichier bundle.js qui tient normalement sur plusieurs lignes. Faites un npm run prod et vous verrez qu’il est minifié et donc plus léger.

# Minifier les fichiers CSS

Minifier les fichiers CSS repose sur le même principe que les fichiers JS, nous allons donc, comme d’habitude, installer une nouvelle dépendance :

```
npm install css-minimizer-webpack-plugin --save-dev
```

Ensuite, il va falloir créer une constante dans votre fichier de configuration Webpack :

```js
const OptimizeCSSAssets = require("css-minimizer-webpack-plugin");
```

Enfin, on appelle l'optimization dans notre condition (je vous rappelle qu’on ne veut la minification qu’en prod !) :

```js
new OptimizeCSSAssets()
```

Voici à quoi doit ressembler cette condition :

```js

optimization: {
    minimize: !devMode,
    minimizer: [
        new UglifyJSPlugin({
            test: /\.js(\?.*)?$/i,
        }),
        new OptimizeCSSAssets({
            test: /\.foo\.css$/i,
        })
    ],
},
```

Vous pouvez faire comme nous avons fait plus haut pour la minification JS : faites un test avec npm run dev où vos fichiers CSS ne doivent pas être minifiés et un autre avec npm run prod où ils doivent l’être.

Vous avez désormais 3 moyens de lancer Webpack :

- npm run start : qui démarre votre serveur, le HMR et qui ne minifie aucun fichier
- npm run dev : qui lance votre environnement de développement sans HMR ni serveur et minification
- npm run prod : qui lance votre environnement de production sans HMR ni serveur et avec minification

# Bonus

Votre terminal affiche désormais tous les détails dont vous avez besoin :

Mais il faut avouer que ce n’est pas très clair, non ? Que diriez-vous de pimper Webpack pour qu’il ressemble à ça :

Si tel est le cas, ajouter la dépendance Webpack Dashboard avec la commande suivante :

```
npm install webpack-dashboard --save-dev
```

Ajoutez ensuite l’habituelle constante à votre fichier de configuration Webpack :

```json
const DashboardPlugin = require("webpack-dashboard/plugin");
```

Puis appelez le plugin depuis votre array plugins toujours dans le même fichier :

```json
new DashboardPlugin()
```

Enfin, modifiez l’objet scripts de package.json en ajoutant webpack-dashboard pour que le dashboard se lance lorsque vous lancez votre serveur avec npm run start :

"scripts": {
    "dev": "webpack",
    "start": "webpack-dashboard webpack-dev-server -d --hot --config webpack.config.js --watch",
    "prod": "NODE_ENV=production webpack --progress"
  }

Vous en savez désormais plus sur Webpack et vous avez surtout réussi à configurer votre starter que vous pourrez utiliser pour votre prochain projet ! N’hésitez pas à laisser un commentaire si toutefois vous aviez une remarque à faire et clapez autant que vous pouvez :) !
