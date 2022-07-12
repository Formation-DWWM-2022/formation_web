# Base

- Télécharger l'exercice.zip et le dézipper
- Analyser les différents fichiers et lancer le serveur live
- Installer NodeJS en v16 LTS sur <https://nodejs.org/en/>
- Ouvrer le terminal de Windows
- Vérifier votre installation `node -v` => v16....
- Vérifier votre installation `npm -v` => v6....

# NPM init

- Sélectionner votre dossier où se trouve votre exercice dézipper avec :
  - `cd votre_chemin_dossier` (ex : cd W:\formation_web\RAN\Node.js\exercice)
  - SHIFT + CLICK DROIT => ouvrir avec le powershell dans le dossier
- Lancer la commande `npm init -y` qui va créer le fichier `package.json`
- Analyser ce nouveau fichier

```json
{
  "name": "exercice",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "",
  "license": "ISC"
}
```

# SASS

- Sélectionner votre dossier où se trouve votre exercice dézipper avec :
  - `cd votre_chemin_dossier` (ex : cd W:\formation_web\RAN\Node.js\exercice)
  - SHIFT + CLICK DROIT => ouvrir avec le powershell dans le dossier
- Lancer la commande `npm install -g sass` pour installer sass sur votre PC
- Lancer la commande `npm install sass` qui va mettre à jour le fichier `package.json` de votre projet
- Analyser ce nouveau fichier

```json
{
  "name": "exercice",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "",
  "license": "ISC",
  "dependencies": {
    "sass": "^1.53.0"
  }
}
```

- Cette commande a aussi créer le fichier `package-lock.json`
- Analyser ce nouveau fichier

```json
{
{
  "name": "exercice",
  "version": "1.0.0",
  "lockfileVersion": 1,
  "requires": true,
  "dependencies": {
    "anymatch": {
      "version": "3.1.2",
      "resolved": "https://registry.npmjs.org/anymatch/-/anymatch-3.1.2.tgz",
      "integrity": "sha512-P43ePfOAIupkguHUycrc4qJ9kz8ZiuOUijaETwX7THt0Y/GNK7v0aa8rY816xWjZ7rJdA5XdMcpVFTKMq+RvWg==",
      "requires": {
        "normalize-path": "^3.0.0",
        "picomatch": "^2.0.4"
      }
    },
  ...
  }
}
```

- Cette commande a aussi créer le dossier `node_modules`
- Analyser ce nouveau dossier

Dans la section scripts, ajoutez une commande scss, sous la commande test, comme indiqué ci-dessous:

``` json
"scripts": {
  "test": "echo \"Error: no test specified\" && exit 1",
  "watch": "sass --watch --load-path=node_modules --style=compressed scss/style.scss css/style.css",
  "build": "sass --load-path=node_modules --style=compressed scss/style.scss css/style.css"
}
```

et lancer la commande `npm run watch`

- On obtient en résultat dans le fichier css/style.css :

```css
body{font:100% Helvetica,sans-serif;color:#333;background-color:aqua}/*# sourceMappingURL=style.css.map */
```

- Observez le résultat en live

# Bootstrap

- Sélectionner votre dossier où se trouve votre exercice dézipper avec :
  - `cd votre_chemin_dossier` (ex : cd W:\formation_web\RAN\Node.js\exercice)
  - SHIFT + CLICK DROIT => ouvrir avec le powershell dans le dossier
- Lancer la commande `npm install bootstrap` qui va mettre à jour le fichier `package.json`
- Analyser ce nouveau fichier

```json
{
  "name": "exercice",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1",
    "watch": "sass --watch --load-path=node_modules --style=compressed scss/style.scss css/style.css",
    "build": "sass --load-path=node_modules --style=compressed scss/style.scss css/style.css"
  },
  "author": "",
  "license": "ISC",
  "dependencies": {
    "bootstrap": "^5.1.3",
    "sass": "^1.53.0"
  }
}
```

- Cette commande a aussi mis à jour le fichier `package-lock.json`
- Cette commande a aussi mis à jour le dossier `node_modules`
- Décommenter `// @import "bootstrap/scss/bootstrap";';`dans le fichier scss/style.scss
- Lancer la commande `npm run watch`
- Observez le résultat dans le fichier css/style.css
- Observez le résultat en live

# SweetAlert [toutes les autres librairies]
- Sélectionner votre dossier où se trouve votre exercice dézipper avec :
  - `cd votre_chemin_dossier` (ex : cd W:\formation_web\RAN\Node.js\exercice)
  - SHIFT + CLICK DROIT => ouvrir avec le powershell dans le dossier
- Lancer la commande `npm install sweetalert2` qui va mettre à jour le fichier `package.json`
- Analyser ce nouveau fichier

```json
{
  "name": "exercice",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1",
    "watch": "sass --watch --load-path=node_modules --style=compressed scss/style.scss css/style.css",
    "build": "sass --load-path=node_modules --style=compressed scss/style.scss css/style.css"
  },
  "author": "",
  "license": "ISC",
  "dependencies": {
    "bootstrap": "^5.1.3",
    "sass": "^1.53.0",
    "sweetalert2": "^11.4.20"
  }
}
```

- Cette commande a aussi mis à jour le fichier `package-lock.json`
- Cette commande a aussi mis à jour le dossier `node_modules`
- Décommenter `/*import Swal from '../node_modules/sweetalert2/src/sweetalert2.js' ...*/` dans le fichier js/app.js
- Décommenter `// @import "sweetalert2/src/sweetalert2"` dans le fichier scss/style.scss
- Lancer la commande `npm run watch`
- Observez le résultat en live sur le bouton vert "Nous contacter"