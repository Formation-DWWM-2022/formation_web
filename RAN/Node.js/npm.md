# Guide du débutant sur le gestionnaire de packages NPM

Nous apprendrons tout sur NPM, les scripts et packages npm, ainsi que les derniers packages npm permettant aux développeurs de devenir des développeurs plus productifs.

Depuis que Node.js a été créé, il a balayé le monde. Node.js a été utilisé pour construire des centaines de milliers de systèmes, incitant la communauté des développeurs à affirmer que JavaScript mange des logiciels .

Le populaire gestionnaire de packages npm, qui permet aux développeurs JavaScript de partager des packages utiles, est l'une des principales raisons du succès de Node.

Il y a des millions de packages installés avec npm par jour, mais en tant que débutant, nous ne savons souvent pas ce qu'est NPM et comment l'utiliser ? C'est pourquoi j'écris ce tutoriel.

# Qu'est-ce que le NPM ?

L'utilisation efficace de npm est la pierre angulaire du développement en ligne moderne pour augmenter la productivité des développeurs, que ce soit uniquement pour Node.js, en tant que gestionnaire de packages ou de création d'outils pour le front-end, ou dans le cadre de processus dans d'autres langages et plates-formes.

Pour un débutant, saisir vraiment npm comme un outil et comprendre les principes sous-jacents peut être difficile - je passe beaucoup de temps à essayer de comprendre des nuances infimes que d'autres considéreraient comme insignifiantes ou tiendraient pour acquises.

Le NPM est divisé en deux parties :
- Référentiel en ligne pour les packages JavaScript.
- Application CLI (command-line interface) pour installer des packages.

# Comment les dépendances NPM sont-elles fournies aux développeurs ?

Le centre de distribution npmjs.com emploie une armée de serveurs dédiés, qui seront affectés en tant qu'assistants personnels à chaque client npmjs.com pour l'aider dans ce processus.

C'est pourquoi NPM fournit rapidement les packages souhaités aux développeurs JavaScript.

# Guide du package.json

Le fichier package.json est un manifeste de votre projet qui comprend des informations sur les packages et les applications dont il dépend, ainsi que des métadonnées spéciales telles que le nom, la description et l'auteur du projet.

Le fichier package.json peut être vu comme un passeport avec toutes les informations sur l'utilisateur. Ce fichier est également envoyé avec le package NPM au développeur.

Quand `npm init` est utilisé pour démarrer un projet JavaScript ou Node.js, package.json est également créé avec lui.

## Métadonnées de Package.json

Qu'il s'agisse d'une application Web, d'un module Node.js ou d'une simple bibliothèque JavaScript, vous découvrirez presque toujours des métadonnées propres au projet dans un fichier package.json.

Les métadonnées aident à identifier le projet et servent de point de départ aux utilisateurs et aux contributeurs qui recherchent des informations à son sujet.

Il existe plusieurs types de métadonnées dans package.json :

- name: Le nom du package choisi par l'auteur.
- version: Version affiche la version du package que vous utilisez. Initialement, il s'affiche sous la forme 1.0.0 .
- description: Description contient la description du package, écrite par l'auteur.
- license: La licence du projet est stockée dans les données de licence du package.

Si vous visitez votre package.json, vous verrez toutes les informations sur le paquet, ces données sont affichées comme suit :

```json
{
  "name": "Developer Noon",
  "version": "1.0.0",
  "description": "#1 Programming Tutorials
  "main": "index.js"
  "license": "MIT"
}
```

# Comment modifier le fichier package.json ?

Pour mettre à jour votre fichier package.json, il vous suffit d'accéder au fichier dans votre éditeur de code, de préférence Visual Studio Code , et de modifier le nom, la description, la version et la licence. Après cela, vous pouvez pousser votre colis.

# dependencies et devDependencies dans package.json

Les drapeaux —save et —save-dev de la commande npm install sont utilisés pour installer les dépendances . Ils sont destinés à être utilisés à la fois dans des environnements de production et de développement et de test.

En attendant, il est essentiel de comprendre les signes possibles qui précèdent les versions sémantiques :

- ^: la version mineure la plus récente Si la version 1.3.0est la version mineure la plus récente de la 1 série majeure, une ^1.0.4spécification peut l'installer.
- ~ : la spécification de version de correctif la plus récente ~1.0.4peut installer la version 1.0.7s'il s'agit de la version mineure la plus récente de la 1.0série mineure, tout comme ^pour les versions mineures.

Apprendre avec des exemples est toujours une meilleure façon d'apprendre. Passons à quelques exemples de dependencies et devDependencies .

Voici un exemple de dependencies, que vous trouverez sur n'importe quel Package :

```json
{
  "dependencies": {
    "@actions/core": "^1.2.3",
    "@actions/github": "^2.1.1
}
```

C'est pourquoi vous trouverez des dépendances sur le fichier package.json.

Voyons maintenant à quoi devDependencies ressemble le fichier dans votre package :

```json
{
  "devDependencies": {
     "@types/jest": "^25.1.4",
     "@types/node": "^13.9.0",
     "@typescript-eslint/parser": "^2.22.0",
     "@zeit/ncc": "^0.21.1",
     "eslint": "^6.8.0",
     "eslint-plugin-github": "^3.4.1",
     "eslint-plugin-jest": "^23.8.2",
     "jest": "^25.1.0",
     "jest-circus": "^25.1.0",
     "js-yaml": "^3.13.1",
     "prettier": "^1.19.1",
     "ts-jest": "^25.2.1",
     "typescript": "^3.8.3"
     }
}
```

Il existe une distinction significative entre les dépendances et les autres composants communs d'un package. La différence entre les dépendances et package.json est qu'ils sont tous deux des objets avec plusieurs paires clé et valeur.

Chaque valeur dans dependencies et devDependencies correspond à la plage de versions acceptable pour l'installation, et chaque clé correspond au nom d'un package.

# Qu'est-ce que c'est package-lock.json?

Les versions exactes des dépendances utilisées dans un projet JavaScript basé sur npm sont décrites dans ce fichier. Package-lock.json est un tableau d'ingrédients, tandis que package.json est une étiquette descriptive générique.

Package-lock.json est similaire à la façon dont nous ne lisons généralement pas le tableau des ingrédients d'un produit.

Les développeurs ne sont pas censés lire package-lock.json le fichier ligne par ligne.

La commande npm install génère package-lock.json, qui est également lu par notre outil CLI NPM pour garantir que les environnements de génération du projet sont répliqués avec npm ci.

# Introduction aux commandes NPM de base

Il existe des tonnes de commandes npm qui sont là pour faciliter les développeurs. Certains des plus importants, principalement npm install, npm ci, et npm auditpour être précis :

1. npm install

`npm install <package-name>` installera, par défaut, la version la plus récente du paquet avec le signe de version. Dans le cadre d'un projet npm, `npm install` téléchargera les packages dans le dossier des modules de nœud du projet conformément aux package.json spécifications, en mettant à niveau les versions de package si possible en fonction de la correspondance des versions.

Si vous souhaitez installer un package dans le contexte global que vous pouvez utiliser n'importe où sur votre machine, vous pouvez utiliser l'indicateur global `-g`.

Parce que npm a rendu l'installation de packages JavaScript si simple, cette commande est souvent mal utilisée.

2. npm ci

Donc, si `npm install —production` c'est mieux pour un environnement de production, y a-t-il une commande qui convient le mieux à mon environnement de développement et de test local ?

`npm ci` est la voie à suivre.

Semblable à la façon dont package-lock.json est généré chaque fois que `npm install` est appelé s'il n'existe pas déjà dans le projet, npm ci utilise ce fichier pour télécharger la version exacte de chaque package individuel dont dépend le projet.

C'est ainsi que nous nous assurons que le contexte de notre projet reste cohérent sur toutes les machines, qu'il s'agisse de nos ordinateurs portables de développement ou d'environnements de construction CI comme GitHub Actions.

3. npm audit

Les packages NPM sont vulnérables aux mauvais auteurs aux intentions malveillantes en raison du grand nombre de packages qui ont été publiés et peuvent être facilement installés.

L'organisation npm.js a eu l'idée de `npm audit` après avoir remarqué un problème dans l'écosystème. Ils gardent une trace des failles de sécurité que les développeurs peuvent vérifier dans leurs dépendances avec la commande `npm audit`.

`npm audit` informe les développeurs des vulnérabilités et s'il existe des versions avec des correctifs à installer.

`npm fund` est l'une des fonctions les plus importantes pour les développeurs, qui publient leur propre package npm.

# Comment initialiser instantanément un projet npm ?

Vous pouvez utiliser l'indicateur `--yes` sur la `npm init` commande pour remplir automatiquement toutes les options avec les `npm init` valeurs par défaut si vous souhaitez poursuivre la construction de votre projet et ne pas perdre de temps à répondre aux invites de npm init.

Vous pouvez simplement utiliser cette commande pour initialiser instantanément votre projet npm :

`npm init --yes`

# Conclusion

Ce guide vous aide à démarrer avec NPM et quelques commandes utiles que les débutants doivent connaître avant de commencer.

NPM vous aide à élever votre développement JavaScript d'un cran , selon npmjs.com . Vous pouvez consulter la documentation de npm pour en savoir plus sur les nouvelles technologies npm.
