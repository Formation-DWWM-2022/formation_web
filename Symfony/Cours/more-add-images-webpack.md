# Copying & Referencing Images

1. Arreter le `watch` de Yarn (CTRL + C)
2. Installer le bundle `file-loader`

```
yarn add file-loader@^6.0.0 --dev
``` 

3. Installer le bundle `@popperjs/core`
```
yarn add @popperjs/core
``` 

3. Pour référencer un fichier image traité par Webpack, vous pouvez utiliser la méthode copyFiles() pour copier ces fichiers dans votre répertoire de sortie final. Commencez par l’activer dans webpack.config.js :

```
// webpack.config.js

  Encore
    // ...
    .setOutputPath('public/build/')

    .copyFiles({
        from: './assets/images',

        // optional target path, relative to the output dir
        to: 'images/[path][name].[ext]',

        // if versioning is enabled, add the file hash too
        //to: 'images/[path][name].[hash:8].[ext]',

        // only copy files matching this pattern
        //pattern: /\.(png|jpg|jpeg)$/
    })
```

Cela copiera tous les fichiers des assets/images dans public/build/images. Si le versioning est activé, les fichiers copiés comprendront un hash basé sur leur contenu.

4. Vous pouvez créer le dossier images dans le dossier assets et y rajouter des images

5. Relancer `yarn watch`

## Assets

TWIG propose de gérer facilement les URL de vos images, fichiers CSS ou encore javascript.

Pour cela vous aurez besoin d'ajouter le bundle suivant :

```bash
composer require symfony/asset
```

Ensuite, vous pouvez écrire dans TWIG

```markup
<img src="{{ asset('build/images/logo.png') }}" alt="Symfony!" />
```