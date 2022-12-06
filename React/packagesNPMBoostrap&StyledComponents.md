# Infos Packages NPM - Bootstrap et Styled-Components

Rappel

Dans la vidéo suivante, nous allons apprendre à faire du CSS dans une application React. Pour cela, on fera quelques exercices afin d’évoquer le Inline CSS, les CSS dans des fichiers externes (External Style Sheets), les Modules CSS, avant de terminer par Bootstrap qu'on importera dans nos dépendances.

Cependant, au moment de l'enregistrement de cette vidéo, la dernière version Bootstrap disponible était la 4.3.1.

Donc, si vous lancez npm install bootstrap (comme indiqué dans la vidéo), vous chargerez la dernière version disponible. Actuellement (mars 2022) on est à la version 5.1.3. Dans votre cas, ça sera peut-être une version encore plus récente.

Si vous n'êtes pas très à l'aise avec Bootstrap, je vous recommande alors d'installer la même version que celle utilisée dans la vidéo pour que vous puissiez suivre. Pour cela, vous devez préciser la version que vous souhaitez installer. Comme ceci: npm install bootstrap@4.3.1

On verra également la librairie «Styled Components». Je vous invite là aussi à installer la même version que moi: npm install styled-components@4.3.1

## Note relative à la vidéo suivante

Dans la vidéo suivante, nous allons étudier le CSS dans React.

De ce fait, au moment d'aborder Bootstrap, je me focalise seulement sur l'importation du fichier bootstrap.min.css permettant de profiter des classes CSS.

import "../node_modules/bootstrap/dist/css/bootstrap.min.css";

Notez que vous pouvez également importer le fichier bootstrap.min.js pour activer les animations comme le menu hamburger, etc. Pour ce faire, vous avez deux possibilités:

Importer le fichier à la racine de votre application (index.js) comme ceci:

import "../node_modules/bootstrap/dist/js/bootstrap.min.js";

Option 2: Utilisez les 3 liens CDN JavaScript fournis par Bootstrap juste avant la balise de fermeture `<body>` de votre index.html. Voici un exemple sur une des mes applications sur Github. https://github.com/DonkeyGeek/books-react-redux/blob/main/public/index.html
