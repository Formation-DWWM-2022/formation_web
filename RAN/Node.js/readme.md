# Node.js

## Vidéo simples et efficace

NodeJS est une plateforme construite sur le moteur JavaScript V8 de Chrome qui permet de développer des applications en utilisant du JavaScript. Il se distingue des autres plateformes gràce à une approche non bloquante permettant d'effectuer des entrées/sorties (I/O) de manière asynchrone.
<https://grafikart.fr/formations/nodejs>

## Qu'est ce que NodeJS

JavaScript est l’un des langages de programmation les plus populaires au monde. Aujourd’hui, il propulse des millions de sites web et il a attiré des masses de développeurs et de concepteurs pour créer des fonctionnalités pour le web. Si vous êtes novice en programmation, JavaScript est facilement l’un des meilleurs langages de programmation à maîtriser.

Au cours de ses 20 premières années, JavaScript a été utilisé principalement pour les scripts[^1] côté client[^2]. Étant donné que JavaScript ne pouvait être utilisé qu’à l’intérieur de la balise ```<script>```, les développeurs devaient travailler dans plusieurs langages et frameworks[^3] entre les composants frontend et backend. Plus tard est apparu Node.js, qui est un environnement d’exécution comprenant tout ce qui est nécessaire pour exécuter un programme écrit en JavaScript.

Node.js est un environnement d’exécution single-thread[^4], open-source et multi-plateforme permettant de créer des applications rapides et évolutives côté serveur et en réseau. Il fonctionne avec le moteur d’exécution JavaScript V8 et utilise une architecture d’E/S non bloquante et pilotée par les événements, ce qui le rend efficace et adapté aux applications en temps réel.

Node.js est écrit en C, C++ et JavaScript.

Wikipédia définit Node.js comme « une compilation packagée du moteur JavaScript V8 de Google, de la couche d’abstraction de la plateforme libuv et d’une bibliothèque centrale, qui est elle-même principalement écrite en JavaScript ».

Le runtime[^5] utilise Chrome V8 en interne, qui est le moteur d’exécution JavaScript, et il est également écrit en C++. Cela ajoute des cas d’utilisation supplémentaires au répertoire de Node.js, comme l’accès aux fonctionnalités internes du système (comme la mise en réseau).

Node.js utilise l’architecture « Single Threaded Event Loop » pour gérer plusieurs clients en même temps. Pour comprendre en quoi cela est différent des autres runtimes, nous devons comprendre comment les clients concurrents multi-threads[^4] sont gérés dans des langages comme Java.

Dans un modèle requête-réponse multi-thread, plusieurs clients envoient une requête, et le serveur traite chacune d’entre elles avant de renvoyer la réponse. Cependant, plusieurs threads sont utilisés pour traiter les appels simultanés. Ces threads sont définis dans un pool de threads, et chaque fois qu’une requête arrive, un thread individuel est affecté à son traitement.

![image](https://kinsta.com/wp-content/uploads/2021/03/Nodejs-Architecture-1024x576.png)

Node.js fonctionne différemment. Jetons un coup d’œil à chaque étape qu’il traverse :

1. js maintient un pool limité de threads pour servir les requêtes.
2. Chaque fois qu’une requête arrive, Node.js la place dans une file d’attente.
3. Maintenant, la « boucle d’événement » single-thread – le composant central – entre en jeu. Cette boucle d’événement attend les requêtes indéfiniment.
4. Lorsqu’une requête arrive, la boucle la récupère dans la file d’attente et vérifie si elle nécessite une opération d’entrée / sortie (E / S) bloquante. Si ce n’est pas le cas, elle traite la requête et envoie une réponse.
5. Si la requête doit effectuer une opération de blocage, la boucle d’événements attribue un thread du pool de threads internes pour traiter la requête. Le nombre de threads internes disponibles est limité. Ce groupe de threads auxiliaires est appelé le groupe de worker.
6. La boucle d’événements suit les requêtes bloquantes et les place dans la file d’attente une fois que la tâche bloquante est traitée. C’est ainsi qu’elle conserve sa nature non bloquante.

Puisque Node.js utilise moins de threads, il utilise moins de ressources et de mémoire, ce qui permet une exécution plus rapide des tâches. Ainsi, pour nos besoins, cette architecture single-thread est équivalente à une architecture multi-threads. Lorsque l’on doit traiter des tâches à forte intensité de données, l’utilisation de langages multi-threads comme Java est beaucoup plus logique. Mais pour les applications en temps réel, Node.js est le choix évident.

Node.js a connu une croissance rapide au cours des dernières années. Cela est dû à la vaste liste de fonctionnalités qu’il offre :

- Facile – Easy-Node.js est assez facile à prendre en main. C’est un choix incontournable pour les débutants en développement web. Grâce à de nombreux tutoriels et à une vaste communauté, il est très facile de se lancer.
- Évolutif – Il offre une grande évolutivité aux applications. Node.js, étant single-thread, est capable de gérer un grand nombre de connexions simultanées avec un débit élevé.
- Vitesse – L’exécution non bloquante des threads rend Node.js encore plus rapide et plus efficace.
- Paquets – Un vaste ensemble de paquets Node.js open source est disponible et peut simplifier votre travail. Aujourd’hui, il y a plus d’un million de paquets dans l’écosystème NPM.
- Backend solide – Node.js est écrit en C et C++, ce qui le rend rapide et ajoute des fonctionnalités comme le support réseau.
- Multi-plateforme – La prise en charge multi-plateforme vous permet de créer des sites web SaaS, des applications de bureau et même des applications mobiles, le tout en utilisant Node.js.
- Maintenable – Node.js est un choix facile pour les développeurs, car le frontend et le backend peuvent être gérés avec JavaScript comme un seul langage.

Les sites web ont connu une croissance immense au cours des deux dernières décennies, et comme prévu, Node.js connaît également une croissance rapide. Le runtime populaire a déjà franchi le seuil de 1 milliard de téléchargements en 2018, et selon W3Techs, Node.js est utilisé par 1,2 % de tous les sites web du monde entier. Cela représente plus de 20 millions de sites au total sur Internet.

Il n’est pas surprenant qu’il s’agisse d’un choix populaire auprès de millions d’entreprises, également. Voici quelques-unes des plus populaires qui utilisent Node.js aujourd’hui : Twitter, Spotify, eBay, Reddit, LinkedIn ...

Node.js est utilisé pour une grande variété d’applications. Explorons quelques cas d’utilisation populaires où Node.js est un bon choix :

- Conversations en temps réel – En raison de sa nature asynchrone[^6] à un seul thread, Node.js est bien adapté au traitement des communications en temps réel. Il peut facilement évoluer et est souvent utilisé pour créer des chatbots. Node.js facilite également la mise en place de fonctionnalités de chat supplémentaires, comme le chat multi-personnes et les notifications push.
- Internet des objets – Les applications de l’Internet des objets (IoT) comprennent généralement plusieurs capteurs, car elles envoient fréquemment de petits morceaux de données qui peuvent s’empiler en un grand nombre de requêtes. Node.js est un bon choix car il est capable de gérer rapidement ces requêtes concurrentes.
- Streaming de données – Des sociétés comme Netflix utilisent Node.js à des fins de streaming. Cela est principalement dû au fait que Node.js est léger et rapide, et qu’il fournit une API de streaming native. Ces flux permettent aux utilisateurs d’acheminer les requêtes les unes vers les autres, ce qui a pour effet de diffuser les données directement vers leur destination finale.
- Applications complexes à page unique (Single Page Application ou SPA) – Dans les SPA, l’ensemble de l’application est chargé dans une seule page. Cela signifie généralement qu’il y a quelques requêtes faites en arrière-plan pour des composants spécifiques. La boucle d’événements de Node.js vient ici à la rescousse, car elle traite les requêtes de manière non bloquante.
- Applications basées sur des API REST – JavaScript est utilisé à la fois dans le frontend et le backend des sites. Ainsi, un serveur peut facilement communiquer avec le frontend via des API REST en utilisant Node.js. Node.js fournit également des paquets comme Express.js et Koa qui facilitent encore plus la création d’applications web.

![image](https://kinsta.com/wp-content/uploads/2021/03/nodejs-applications.png)

## Node.js est-il un langage de programmation ?

En un mot : Non.

Node.js n’est pas un langage de programmation. Il s’agit plutôt d’un environnement d’exécution qui est utilisé pour exécuter JavaScript en dehors du navigateur.

Node.js n’est pas non plus un framework (une plateforme pour développer des applications logicielles). Le moteur d’exécution de Node.js est construit au-dessus d’un langage de programmation – dans ce cas, JavaScript – et permet de faire fonctionner les frameworks eux-mêmes.

Pour résumer, Node.js n’est ni un langage de programmation ni un framework, mais un environnement pour ceux-ci.

Une idée fausse répandue parmi les développeurs est que Node.js est un framework backend et qu’il n’est utilisé que pour construire des serveurs. Ce n’est pas vrai : Node.js peut être utilisé aussi bien en frontend qu’en backend.

L’une des raisons pour lesquelles les frameworks Node.js sont un choix populaire pour les développeurs construisant un backend flexible et évolutif est sa nature événementielle et non bloquante. Cependant, les développeurs frontend verront tout aussi clairement ces avantages de Node.js dans leur propre travail.

Voyons pourquoi Node.js fonctionne à la fois pour le backend et le frontend :

- Réutilisabilité – JavaScript est un langage commun utilisé pour écrire à la fois le backend et le frontend à l’aide de frameworks comme Express.js et Meteor.js. Certaines piles populaires comme MERN utilisent Express.js comme backend (un framework Node.js). De multiples composants peuvent également être réutilisés entre le frontend et le backend.
- Productivité et efficacité des développeurs – Grâce à la réduction des changements de contexte entre plusieurs langages, les développeurs peuvent gagner beaucoup de temps. L’utilisation de JavaScript à la fois pour le backend et le frontend se traduit par une efficacité accrue, car de nombreux outils sont communs aux deux.
- Vaste communauté – Une communauté en ligne florissante contribue à la rapidité d’un cycle de développement réussi. Lorsque vous êtes bloqué sur un problème, il y a de fortes chances que quelqu’un l’ait déjà résolu et partagé la solution sur Stack Overflow. Node.js fait grand usage de cette communauté, qui est active et engagée lorsqu’il s’agit du runtime populaire et de ses paquets.

## Installation de NodeJS

Il peut être difficile de décider par où commencer avec Node.js. Heureusement, il est assez simple à installer, et vous pourrez ensuite le tester par vous-même.

Téléchargez le programme d’installation Windows directement depuis le site Web nodejs.org : <https://nodejs.org/en/#home-downloadhead>

Dans la section précédente, nous avons installé Node. Vérifions-le en contrôlant la version installée. Exécutez la commande suivante dans le terminal :
``` node -v ```

## Qu’est-ce que NPM ?

NPM est l’écosystème de paquets de Node.js. C’est le plus grand écosystème de toutes les bibliothèques open source au monde, avec plus d’un million de paquets et en pleine croissance. L’utilisation de NPM est gratuite et des milliers de développeurs open source y contribuent quotidiennement.

NPM est livré avec un utilitaire de ligne de commande. Vous pouvez simplement vous rendre sur le site web de NPM pour rechercher le paquet dont vous avez besoin et l’installer à l’aide d’une seule commande. Vous pouvez également gérer les versions de votre paquet, examiner les dépendances et même configurer des scripts personnalisés dans vos projets grâce à cet utilitaire de ligne de commande. Sans aucun doute, NPM est le bien le plus apprécié de la communauté Node.js ; Node.js attire un grand nombre de développeurs en grande partie grâce à son excellente prise en charge des paquets.

## Installation de paquets NPM via CLI

Lorsque vous installez Node.js, NPM est automatiquement installé avec lui. Nous avons vu comment installer Node.js dans les sections précédentes, alors regardons maintenant la commande pour installer un paquet avec NPM :

``` sh
npm install <package-name>
```

Oui, c’est aussi simple que cela ! Vous pouvez même installer plusieurs paquets à la fois :

``` sh
npm install <pkg-1> <pkg-2> <pkg-3>
```

Vous pouvez également spécifier le drapeau -g (global) si vous souhaitez installer un paquet dans le contexte global. Cela vous permet d’utiliser le paquet n’importe où sur votre machine.

Lorsque vous initialisez une nouvelle application, NPM crée automatiquement un fichier package.json qui se compose de tous les paquets NPM. C’est ici que vous pouvez spécifier les versions, les dépendances et les scripts personnalisés.

Il existe une longue liste de commandes fournies avec l’utilitaire NPM, notamment publish, audit, run, etc. Vous pouvez vérifier comment les utiliser en utilisant la commande npm help.

## Paquets populaires

Voici quelques-uns des paquets les plus populaires pour Node.js aujourd’hui :

- Express – Express.js, ou simplement Express, est un framework de développement web inspiré de Sinatra pour Node.js, et la norme de facto pour la majorité des applications Node.js actuelles.
- MongoDB – Le pilote officiel de MongoDB. Il fournit l’API pour les bases de données objet MongoDB dans Node.js.
- io – Socket permet une communication en temps réel, bi-directionnelle et basée sur des événements.
- Lodash – Lodash facilite le JavaScript en éliminant les difficultés liées à l’utilisation des tableaux, des nombres, des objets, des chaînes de caractères, etc.
- Moment – Une bibliothèque de dates en JavaScript pour analyser, valider, manipuler et formater les dates.
- js – Tout ce dont vous avez besoin pour travailler et construire avec des interfaces de ligne de commande pour node.js.
- Forever – Un outil CLI simple pour s’assurer qu’un script donné s’exécute en continu (pour toujours). Permet de maintenir votre processus Node.js en production face à toute défaillance inattendue.
- Async – Un module utilitaire qui fournit des fonctions simples et puissantes pour travailler avec le JavaScript asynchrone.
- Redis – Une bibliothèque client pour supporter l’intégration de la base de données Redis.
- Mocha – Un framework de test JavaScript propre et flexible pour Node.js et le navigateur.
- Passport – Authentification simple et discrète pour Node.js. Le seul but de Passport est d’authentifier les requêtes.

## Hello World en Node.js

Comme toujours, commençons par le programme de base « Hello World », où nous créons un serveur dans Node.js qui renverra une sortie « Hello World » lors d’une requête du serveur. Avant de vous lancer, assurez-vous de disposer d’un bon éditeur de texte.

Une fois que vous avez ouvert votre éditeur de texte, voici le code que vous utiliserez pour votre programme « Hello World » :

``` js
// server.js
const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Hello World! Welcome to Node.js');
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
```

Enregistrez ce fichier sous le nom de « server.js ». Maintenant, allez dans le terminal et démarrez le serveur en utilisant la commande : ``` node server.js ```

Le serveur devrait commencer à fonctionner. Pour vérifier le résultat, ouvrez <http://localhost:3000> dans votre navigateur. Vous devriez voir le message –

  Hello World! Welcome to Node.js

## Explication du serveur Hello World

Node.js est livré avec un module intégré appelé « HTTP » qui permet à Node.js de transférer des données via le protocole de transfert hypertexte (HTTP).

Dans le code ci-dessus, nous chargeons d’abord le module http dans notre programme. Ensuite, nous utilisons la méthode createServer pour accepter une requête et renvoyer une réponse avec un code d’état. Enfin, nous écoutons sur un port défini.

Félicitations : vous venez de créer votre premier serveur en Node.js ! Dans la section suivante, nous allons apprendre à utiliser le framework Express pour créer un serveur.

## Résumé

En un mot, Node.js est un environnement de programmation populaire qui peut être utilisé pour créer des applications à grande échelle qui doivent prendre en charge plusieurs requêtes simultanées. Les E/S non bloquantes single thread en font également un excellent choix pour les applications en temps réel et les applications de flux de données.

Pour le renforcer encore, Node.js dispose d’une communauté massive de développeurs actifs et peut se vanter d’avoir le plus grand dépôt de paquets open source du monde, NPM, qui contient actuellement plus d’un million de paquets.

Il est facile de commencer avec Node.js. Nous avons vu comment installer et créer un serveur en Node.js, il ne reste donc plus qu’à réfléchir à la manière dont vous allez utiliser et mettre en œuvre Node.js dans votre propre pile. Vous pouvez également approfondir vos connaissances en consultant la documentation officielle de Node.js sur nodejs.dev.

## Exemple - SASS

![gif](https://cms-assets.tutsplus.com/cdn-cgi/image/width=630/uploads/users/1534/posts/28275/final_image/2017-02-26%2023.25.53.gif)
Sass est peut-être le plus populaire des pré-processeurs CSS; depuis des années, il nous aide à écrire des CSS propres, réutilisables et modulaires. Dans ce tutoriel rapide, je vais expliquer comment compiler Sass en CSS en utilisant la ligne de commande.

1. Initialisez le NPM

NPM est le gestionnaire de nœuds pour JavaScript. NPM facilite l'installation et la désinstallation de packages tiers. Pour initialiser un projet Sass avec NPM, ouvrez votre terminal et CD (répertoire de modification) dans votre dossier de projet.
Navigating to SASS-tutorial folder

Une fois dans le dossier correct, exécutez la commande npm init. Vous serez invité à répondre à plusieurs questions sur le projet, après quoi NPM va générer un fichier package.json dans votre dossier.

2. Installez Node-Sass

Node-sass est un paquet NPM qui compile Sass en CSS (ce qu'il fait très rapidement aussi). Pour installer node-sass, exécutez la commande suivante dans votre terminal: `npm install node-sass`

3. Écrivez la commande Node-sass

Tout est prêt à écrire un petit script pour compiler Sass. Ouvrez le fichier package.json dans un éditeur de code. Vous verrez quelque chose comme ceci:

``` json
{
  "name": "sass-tutorial",
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

Dans la section scripts, ajoutez une commande scss, sous la commande test, comme indiqué ci-dessous:

``` json
"scripts": {
  "test": "echo \"Error: no test specified\" && exit 1",
  "scss": "node-sass -watch scss -o css"
}
```

Passons par cette ligne mot à mot.

- node-sass: Désigne le paquet node-sass.
- -watch: Un drapeau facultatif qui signifie "regarder tous les fichiers .scss dans le dossier scss/ et les recompiler chaque fois qu'il y a un changement".
- scss: Le nom du dossier où nous mettons tous nos fichiers .scss.
- -o css: Le dossier de sortie de notre CSS compilé.

Lorsque nous exécutons ce script, il va regarder chaque fichier .scss dans le dossier scss/, puis enregistrer le css compilé dans css/ dossier chaque fois que nous changeons un fichier .scss.

4. Exécutez le script

Pour exécuter notre script en une seule ligne, nous devons exécuter la commande suivante dans le terminal: npm run scss

Et voilà! Nous regardons et compilons SASS.

## Exemple - Bootstrap

Les gestionnaires de packages tels que npm et yarn peuvent s'avérer être un autre moyen efficace d'ajouter Bootstrap au HTML sans effort. Étant donné que npm est le gestionnaire de packages le plus populaire, l'exemple suivant montre comment Bootstrap peut être installé et intégré à n'importe quel projet l'utilisant.

Tapez l'une des commandes suivantes dans le dossier du projet. Ceci n'est valable que si vous avez initialisé npm dans le projet.

- Bootstrap 4 : npm install bootstrap
- Bootstrap 5 : npm install bootstrap@next

Une copie locale de la version souhaitée des fichiers Bootstrap est maintenant téléchargée dans le dossier "node_modules" de votre projet. Une fois la version Bootstrap souhaitée importée :

  Pour CS :

Incluez le fichier bootstap.min.css dans le `<head>` de votre fichier HTML pour utiliser les composants CSS Bootstrap.

  Pour JS :

Utilisez le fichier bootstrap.min.js avant la fin de la partie `<body>` de votre fichier HTML pour utiliser les composants Bootstrap JS.

Comme mentionné précédemment, jquery.min.js et popper.min.js doivent tous deux être chargés avant de charger bootstrap.min.js.

## Exemple - Yarn

## Qu'est-ce qu'un "package manager" ?

Je ne pense pas que ce paragraphe serve à beaucoup d'entre vous, mais dans le doute, une petite explication ne fera pas de mal

Un package manager, où gestionnaire de paquet en français est un outil permettant de simplifier la gestion (installation, mise à jour, changement de version, etc.) des dépendances de vos projets ou systèmes.

C'est souvent le programme central des distributions Linux (apt-get pour Debian, RPM pour Red-Hat, Pacman pour Arch, …), et il est très facile de voir les stores Windows, Apple ou Android comme des gestionnaires de paquets.

Pour le cas qui nous intéresse (le développement web), la plupart des gestionnaires de paquets se sont construits sur le modèle de Bundler, le gestionnaire de paquets pour Ruby. Leur fonctionnement est généralement tout le temps le même : un simple fichier texte recense toutes les dépendances de votre projet ainsi que leurs versions. Pour l'installation d'une nouvelle machine de développement ou le déploiement de votre projet en production, il ne vous suffit donc que d'une seule commande (ex : npm install)

Tous les langages (ou presque) possèdent le leur (npm pour Node Js, Composer pour PHP, Bower pour les ressources front-end, etc) et si vous n'en utilisez pas encore (que vous soyez intégrateur ou développeur) je ne peux que vous conseiller d'y jeter un coup d'oeil, c'est sans doute le meilleur endroit ou investir votre temps de formation !

## Yarn, gestionnaire de paquets pour Node.js

Bien que pour la grande majorité d'entre nous, npm est tout à fait suffisant pour notre travail avec Node js, il faut reconnaitre que ce package manager a quelques défauts assez gênants (comme sa lenteur catastrophique, par exemple).

Pour adresser une solution à tous ces problèmes, certaines petites entreprises (Facebook et Google entre autres) ont décidé de fournir un nouveau package manager pour Javascript : Yarn.

Alors, pour commencer, rassurez-vous, Yarn n'est pas là pour tout changer, et reste compatible avec une grosse quantité de l'infrastructure actuelle : les dépôts restent identiques, et vos fichiers packages Json restent compatibles sans avoir à faire le moindre changement. La seule "pièce" qui change dans l'engrenage est l'outil CLI, et comme vous allez le voir cela suffit à corriger bon nombre de problèmes.

## Pourquoi utiliser Yarn

Pour commencer, Yarn est plus rapide, beaucoup plus rapide : 40% en moyenne. Il semblerait que  plus le nombres de dependances installees soit grande, moins la difference soit flagrante, mais Yarn reste plus rapide dans tout les cas.

Ensuite, Yarn possède un lockfile au fonctionnement exactement identique au fichier bundle.lock de bundler. Pour comprendre ce point, il faut savoir que les numéros de version du fichier package.json ne sont pas forcément "fixes". Ils peuvent par exemple exprimer "n'importe quel version au-dessus de la version 3". Le problème avec ce fonctionnement est que nous pouvons nous retrouver avec deux machines avec des dépendances différentes, ce qui est prône aux bugs.

Pour corriger cela, Yarn met à jour un fichier avec des numéros de versions fixes : yarn.lock. De cette manière, il sera toujours possible d'installer exactement les bonnes versions de toutes vos dépendances.

Enfin, et c'est pour moi un des points les plus agréables : Yarn est compatible avec npm ET avec bower. Plus besoin d'avoir deux gestionnaires de paquets par projet, vous pouvez tout manager depuis Yarn !

Pour finir, sachez qu'il existe d'autres petits goodies : l'affichage est bien moins verbeux, Yarn peut fonctionner hors ligne, etc. Ces points ne changeront pas vraiment votre vie, mais sachez au moins qu'ils existent.

## Installer Yarn

L'installation de Yarn depend de votre plateforme.

Sous Linux, vous aurez à ajouter un dépôt puis l'installer avec votre gestionnaire de paquets.
Enfin pour Windows, vous pourrez retrouver un installateur sur le site de Yarn : <https://classic.yarnpkg.com/en/docs/install#windows-stable>

[Grafikart : Yarn, un nouveau gestionnaire de dépendances](https://youtu.be/nKVjpgatBRM)
----

[^1]: Un script est chargé d'exécuter une fonction bien précise lorsqu'un utilisateur réalise une action ou lorsqu'une page web est en cours d'affichage

[^2]: Le client est une application comme un navigateur qui fonctionne localement sur l'ordinateur et qui envoie des requêtes sur le serveur quand nécessaire.

[^3]: L’objectif d’un framework est généralement de simplifier le travail des développeurs informatiques, en leur offrant une architecture « prête à l’emploi » et qui leur permette de ne pas repartir de zéro à chaque nouveau projet. C'est un ensemble d'outils et de composants logiciels à la base d'un logiciel ou d'une application

[^4]: Pour augmenter la vitesse des cœurs du processeur sans avoir à modifier la vitesse d’horloge, le multithreading permet au CPU de traiter plusieurs tâches simultanément. Pour être plus précis : plusieurs threads sont traités en même temps. Un thread peut être compris comme un élément d’un processus. Les programmes peuvent être divisés en processus et ces processus à leur tour en threads individuels. Chaque processus est constitué d’au moins un thread. Les processus sont généralement exécutés de manière séquentielle, c’est-à-dire l’un après l’autre. Ce n’est pas optimal, car de cette manière, les tâches fastidieuses bloquent le matériel. Si un autre processus est nécessaire spontanément, il doit quand même attendre son tour. Avec le multithreading, plusieurs threads sont traités simultanément. Bien que cette affirmation ne soit également que partiellement correcte : la simultanéité réelle ne peut que rarement être garantie, mais elle peut être atteinte en attendant. Mais la pseudo-simultanéité permet également d’améliorer les performances : le système organise et calcule les threads de manière si intelligente que l’utilisateur a l’impression d’un traitement simultané. Cette forme de concurrence ne doit pas être confondue avec les possibilités des processeurs multi-cœurs. Si le système comporte plusieurs microprocesseurs, plusieurs processus sont également traités simultanément.

[^5]: Un environnement d'exécution ou runtime est un logiciel responsable de l'exécution des programmes informatiques écrits dans un langage de programmation donné. Un runtime offre des services d'exécution de programmes tels que les entrées-sorties, l'arrêt des processus, l'utilisation des services du système d'exploitation, le traitement des erreurs de calcul, la génération d'événements, l'utilisation de services offerts dans un autre langage de programmation, le débogage, le profilage et le ramasse-miette.

[^6]: Lorsque nous exécutons quelque chose de manière synchrone, nous attendons qu’il se termine avant de passer à une autre tâche. Lorsque nous exécutons quelque chose de manière asynchrone, vous pouvez passer à une autre tâche avant la fin.
