Ce cours s'adresse aux personnes qui ont des notions voire maîtrisent le HTML et le CSS. Si ce n'est pas le cas, je vous invite à suivre dans un premier temps, le cours sur le HTML puis de passer au CSS. Ce n'est pas un passage obligatoire, on peut commencer directement avec Bootstrap, mais de bien nombreuses notions pourront vous paraître abstraites voire complètement obscures.

Ce cours se focalise donc sur le framework Bootstrap. En informatique, un framework désigne un ensemble cohérent de composants, qui sert à créer les fondations d'un logiciel, programme ou application. Bootstrap est un framework HTML/CSS qui permet de créer facilement et rapidement des sites et applications web responsives. Il a été conçu pour aider les développeurs dans leurs travaux quotidiens sur les langages que sont le HTML et le CSS. Il fonctionne notamment sur un système de grille. Nous reviendrons plus longuement sur ce point dans les premiers chapitres. Dans sa catégorie, Bootstrap est le plus populaire dans le monde et est utilisé par de nombreux sites connus et CMS renommés. On peut notamment citer PrestaShop. Il est bien évidemment open-source et gratuit. Historiquement, deux développeurs de chez Twitter sont à l'origine de ce projet dont la première version a vu le jour en 2011. Aujourd'hui, une vaste communauté l'améliore pas à pas. C'est d'ailleurs l'un des projets open-source auquel le plus grand nombre de développeurs participent.

Le but de ce cours est de se familiariser avec le framework, de le comprendre et d'obtenir suffisamment de bases de ce dernier, pour être autonome dans la création d'un site web ou d'une application responsive web simple.

## --- Boostrap v4 VS v5 : historicV4VSV5.md ---

## Débuter sur Bootstrap

La première étape est toujours la même. Je vous laisse créer un nouveau fichier HTML avec une structure basique (comprendre HTML 5) et n'oubliez pas d'y mettre la meta permettant de faire du responsive.

Après cette rapide introduction, entrons dans le vif du sujet en démarrant notre première page Bootstrap 5. Il y a deux manières d'utiliser le framework : soit on télécharge les fichiers depuis le serveur officiel de Bootstrap, soit on utilise un CDN. Nous utiliserons cette dernière méthode dans ce cours.

Pour ajouter Bootstrap le plus simple est de suivre la documentation officielle. Celle-ci est disponible sur le site de Bootstrap dans la partie Get Started :
https://getbootstrap.com/docs/5.1/getting-started/introduction/

Un CDN, ou réseau de diffusion de contenu en français, est un ensemble de serveurs reliés entre eux par internet dans le but de fournir du contenu, généralement statique. Dans notre cas précis, ils nous servent à utiliser l'ensemble du framework Bootstrap sans le télécharger, localement sur notre machine ou sur notre serveur. Cela a un côté pratique, par contre cela crée une dépendance vis-à-vis du CDN. En effet, si celui-ci ne fonctionne plus pour une quelconque raison, notre site ou application va se retrouver orphelin des contenus hebergés sur le CDN et va nécessairement en pâtir. Sans plus attendre, retrouvez ci-dessous le code minimal d'une page avec Bootstrap 5.

## Code minimal d'une page web avec Bootstrap 5

``` html
<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="custom.css" />

    <title>Titre de la page affiché dans la barre du navigateur</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <!-- Custom CSS -->
    <script src="custom.js"></script>  
  </body>
</html>
```

Si le HTML vous est familier, vous comprendrez aisément la plupart du code ci-dessus. 

Bootstrap 5 est donc composé : d'un fichier CSS et de un fichiers JS. Le fichier CSS est propre à Bootstrap. Il contient l'essence même du framework. En ce qui concerne le fichiers JS, on retrouve le framework Bootstrap ainsi que la librairie Popper sur lesquels s'appuie Bootstrap. Bootstrap est donc dépendant de ces deux technologies. C'est d'ailleurs pour ça que le fichier JS propre à Bootstrap est chargé en dernier. Si on inverse la déclaration des fichiers JS, cela va produire une erreur. En effet, Bootstrap a nécessairement besoin de Popper pour fonctionner correctement. Il n'est pas primordial de connaitre Popper pour utiliser correctement Bootstrap. C'est cependant un plus non négligable.

La balise inhabituelle que l'on rencontre est <meta>. La balise <meta> n'est pas intrinsèquement inhabituelle car on l'utilise entre autres pour définir l'encodage de la page avec l'attribut charset="". La combinaison des attributs et des valeurs de cette balise permettent de garantir un rendu correct et un zoom tactile sur les différents supports mobiles. En effet, Bootstrap permet de gérer l'affichage de son site ou de son application sur tous les supports, grâce au responsive design. Cette balise permet de faire fonctionner cette fonctionnalité correctement. Notons que Bootstrap est développé mobile first. Une stratégie sur laquelle nous reviendrons plus tard dans le cours.

Pour notre site ou application web, nous nous appuyons sur le framework Bootstrap. Cependant, nous souhaitons les personnaliser le maximum. La bonne pratique veut qu'on ajoute un fichier CSS (custom.css) et JS (custom.js) supplémentaire pour ne pas modifier les fichiers Bootstrap. En l'occurrence, étant donné qu'ils sont hébergés sur un CDN, la tâche aurait été compliquée. Vous l'aurez compris, ce sont les deux seuls fichiers en local du code minimal.

Nous sommes désormais prêts pour commencer à attaquer la version 5 de Bootstrap.

En somme, Bootstrap embarque un fichier CSS (monstrueux) qui met à disposition du développeur une série de classes à utiliser à bon escient. 

Le framework Bootstrap repose sur un système de grille. On entend par système de grille, une structure de colonnes et de lignes permettant d'organiser le contenu et la mise en forme de la page web. C'est l'élément essentiel et le cœur même de Bootstrap. Cependant, ce système n'est pas seulement utilisé par ce dernier. On retrouve le même fonctionnement dans d'autres frameworks.

Avant de pouvoir jouir du système de grille, il est primordial et requis de définir le containeur. Il y en a deux types :

    .container
    .container-fluid

Les containeurs sont les composants les plus basiques de Bootstrap. Ils permettent de structurer la grille. En utilisant la classe .container, on centre la grille sur une largeur maximale fixe. Celle-ci est variable suivant la largeur de la page. Tandis qu'en utilisant .container-fluid, on permet à la grille d'occuper 100 % de la largeur de la page. La subtile différence entre les deux est essentielle.

En introduction, il était précisé que Bootstrap était responsive design. En effet, Bootstrap adapte la mise en forme de la page en fonction de la taille de l'écran. Il permet un affichage optimisé aussi bien sur un écran géant que sur un smartphone. On parle généralement d'affichage desktop, qui correspond à l'affichage sur les ordinateurs de bureau standard, et d'affichage mobile pour les tablettes et smartphones. Il est très facile de simuler un affichage mobile depuis un ordinateur, en redimensionnant tout simplement la fenêtre du navigateur web.

Comment se comportent les éléments quand la taille de la page évolue ? Il y a deux cas de figures : soit les éléments se redimensionnent, soit ils s'empilent. Afin de ne pas rendre les éléments illisibles, Bootstrap permet de les empiler quand la place devient vraiment trop étroite.

![image](https://aymeric-auberton.fr/img/bootstrap/bootstrap-mobile-stacking.jpg)

Aperçu du comportement des éléments entre le desktop et le mobile

La classe .container possède une largeur maximale fixe suivant la largeur de la page web. En effet, Bootstrap réagit suivant plusieurs formats. Bootstrap 5 réagit suivant 5 formats. Le tableau ci-après récapitule les points clés.

|   | Extra small (<576px) | Small (≥ 576px) | Medium (≥ 768px) | Large (≥ 992px) | Extra large (≥ 1200px) |
|---|---|---|---|---|---|
| Largeur maximale du containeur | auto | 540px | 720px | 960px | 1140px |
| Préfixe des classes | .col- | .col-sm- | .col-md- | .col-lg- | .col-xl- |
| Type d'écran | Smartphone | Smartphone & tablette | Tablette | Écran d'ordinateur de bureau | Grand écran et télévision |

Reprenons le fil de notre chapitre et revenons sur notre grille, Bootstrap 5 découpe le corps de la page web en une multitude de lignes, on parle alors de row. Chaque ligne est découpée en 12 colonnes de largeur égale. Le terme associé est col. Il n'est pas obligatoire de toutes les utiliser individuellement, il est possible de les regrouper pour en former des plus larges. Toutefois, attention à ne pas dépasser 12 colonnes.

![image](https://aymeric-auberton.fr/img/bootstrap/bootstrap-grid.jpg)

Sur l'image ci-dessus, les colonnes rouge représentent les goutières entre les différentes colonnes. Nous reviendrons sur la notion de goutières plus tard dans le cours. 

Il est grand temps de récapituler en exemple toutes les notions que nous venons d'aborder. Ci-après un exemple qui contient un .container-fluid avec un .row et plusieurs .col.

``` html
<body>
   <div class="container-fluid">
      <div class="row">
         <div id="main" class="col-8 border border-secondary">col-8</div>
         <div id="sidebar" class="col-4 border border-secondary">col-4</div>
      </div>
   </div>
</body>
```

Dans l'exemple, nous avons donc une ligne avec deux zones, réparties en 2/3 et 1/3. La partie principale, identifiée par #main, occupe donc 8 colonnes, tandis que la plus petite partie, #sidebar, occupe 4 colonnes. Les classes .border et .border-secondary permettent d'ajouter les bordures pour mettre en évidence les différentes zones.

L'exemple précédent utilisait un .container-fluid. Comparons le même code source mais un .container.


``` html
<body>
   <div class="container">
      <div class="row">
         <div id="main" class="col-8 border border-secondary">col-8</div>
         <div id="sidebar" class="col-4 border border-secondary">col-4</div>
      </div>
   </div>
</body>
```


Dans le premier exemple, le contenu occupait 100% de la place disponible tandis que dans le second, le contenu semble centrer dans une largeur fixe. Bingo, nous venons de mettre en évidence la largeur maximale du containeur en fonction de la largeur de l'écran. En redimensionnant la fenêtre et en fonction des points d'accroches décrits plus tôt dans le tableau, la largeur maximale évolue. Il y a plus au moins d'espace à gauche et à droite de notre .container.

Les possibilités offertes par Bootstrap 5 pour la gestion des .col sont nombreuses. Ci-après un extrait de ce qu'il est possible de faire ainsi que la mise en évidence des bordures de .row en bleu.

![image](https://webboy.fr/formation/pluginfile.php/447/course/section/550/bootstrap-grid-example.png)

``` html
<body>
   <div class="container-fluid">
      <div class="row border border-primary">
         <div class="col-12 border border-secondary">col-12</div>
         <div class="col-6 border border-secondary">col-6</div>
         <div class="col-6 border border-secondary">col-6</div>
         <div class="col-4 border border-secondary">col-4</div>
         <div class="col-4 border border-secondary">col-4</div>
         <div class="col-4 border border-secondary">col-4</div>
         <div class="col-8 border border-secondary">col-8</div>
         <div class="col-4 border border-secondary">col-4</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
         <div class="col-1 border border-secondary">col-1</div>
      </div>
   </div>
</body>

```

Bootstrap et très vaste, et très bien documenté le cours n'a pas pour but de vous apprendre « à utiliser Bootstrap », mais plutôt vous faire découvrir celui-ci pour que vous l'utilisiez aussi souvent que possible.

## Avantage
- Bootstrap permet de gagner du temps de développement. 
- Bootstrap permet deest composé d'une communauté vaste et active, et permet une grande personnalisation du design.
- Cependant, vous risquez de voir votre thème sur de nombreux sites si vous ne le personnalisez pas. Par ailleurs, apprendre à utiliser Bootstrap demandera un effort d'apprentissage.

# Réalisation d'un TP

Le principe du tp ici est d'approfondir la découverte de Bootstrap. Ainsi de commencer à être à votre aise avec l'outil. Nous allons voir les points suivants :

    - Mise en place d'une navbar Bootstrap simple permettant d'avoir un menu "sandwich" automatiquement
    - Jouer avec le positionnement
    - Utiliser les tableaux Bootstrap
    - Faire un slider avec Bootstrap
    - Faire un formulaire avec Bootstrap
    - Intégrer un template Bootstrap simple

Lors de ce TP vous n'écrirez pas une ligne de CSS. Tous le CSS est déjà écrit. Le but étant de vous pousser à lire la documentation Bootstrap et à chercher un peu tout ce que l'on peut faire avec.