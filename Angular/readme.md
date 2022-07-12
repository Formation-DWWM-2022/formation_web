# Débutez avec Angular

Vous commencez à maîtriser le HTML, le CSS, et le JavaScript, et vous voulez ajouter des cordes à votre arc ? Vous souhaitez approfondir vos connaissances et gagner en compétences pour le développement front-end ?

Angular est un framework de développement d’applications web, utilisé par des milliers d’entreprises, qui vous permettra de créer des applications dynamiques complètes.

Tout au long de ce cours, vous créerez une application de A à Z afin de pratiquer les différentes techniques et de consolider vos nouvelles connaissances.

Ce cours est destiné aux développeurs web qui ont déjà de bonnes connaissances en HTML, CSS et JavaScript, et qui veulent aller plus loin dans le développement front-end. Vous n'avez pas besoin de connaissances en SCSS ni en TypeScript : même si ces technologies sont au cœur d'Angular, je vous expliquerai au fur et à mesure les différentes fonctionnalités de ces langages que vous utiliserez.

# Qu'est-ce qu'Angular ?

En bref, Angular est un framework JavaScript qui vous permet de développer des applications "efficaces et sophistiquées", comme dit la documentation. Il permet notamment de créer ce qu'on appelle des Single Page Applications (ou SPA) : des applications entières qui tournent dans une seule page HTML grâce au JavaScript.

Le développement Angular passe par trois langages principaux :

- le HTML pour structurer (toutes vos connaissances avec ce langage vous seront utiles, et Angular viendra vous ajouter quelques nouveautés)
- le SCSS pour les styles (le SCSS est une surcouche du CSS qui y apporte des fonctionnalités supplémentaires, mais qui permet également d'écrire du CSS pur si on le souhaite)
- le TypeScript pour tout ce qui est dynamique, comportement et données (un peu comme le JavaScript sur un site sans framework)

## Faites connaissance du TypeScript

Tout d'abord, ne vous inquiétez pas si vous ne connaissez pas le TypeScript (TS) ! Il vient ajouter des syntaxes supplémentaires au JavaScript ; notamment, comme son nom l'indique, le typage strict. Le typage strict nous oblige, entre autres, à spécifier le type de toutes les variables, contrairement au typage dynamique de JavaScript. Cette contrainte peut paraître gênante, mais elle permet de réduire considérablement le nombre d'erreurs au runtime, et facilite énormément le développement avec un IDE.

Même si ce cours n'est pas un cours sur le TypeScript, lorsqu'on rencontrera des fonctionnalités spécifiques TS, je vous les expliquerai et j'ai déjà réalisée un cours à par entiére [ici](../TypeScript/readme.md)

# Découvrez les avantages d'Angular

Comme vous le savez peut-être, il existe d'autres solutions pour le développement d'applications web sophistiquées comme React, Vue ou Svelte, par exemple. Au lieu de faire une comparaison directe, voici une liste non exhaustive de raisons de choisir Angular :

- Angular est un framework complet = on peut créer des applications web complètes sans avoir besoin de librairies tierces supplémentaires. C'est notamment ce qui différencie un framework d'une library.
- Les best practices (les bonnes pratiques) Angular sont extrêmement précises = les structures des applications Angular ont tendance à se ressembler fortement, donc il est facile de passer d'un projet à un autre, et de s'assurer que son propre projet suit les meilleurs pratiques.
- Le framework a été conçu pour fonctionner avec le TypeScript = il est tout à fait possible d'utiliser le TypeScript pour React, Vue ou Svelte, mais Angular a été conçu pour ce langage, donc son intégration est forcément plus profonde.

Les pratiques plus "strictes" et le TypeScript sont à l'origine de la réputation de difficulté qu'a Angular. Je vous montrerai que même si parfois il faut un peu de temps pour apprendre certains concepts, Angular n'est pas si difficile, et que le jeu en vaut la chandelle !

Il y a d'autres raisons encore, et il y a aussi, bien sûr, des avantages aux alternatives. Angular est souvent un très bon choix, et j'espère vous le démontrer tout au long de ce cours !

# Il vous faudra quelques outils indispensables pour du développement Angular en toute tranquillité

## Installez Node et npm

Dans ce cours, on utilisera le Node Package Manager, ou npm. Vous pouvez télécharger et installer la version LTS de Node [v16] sur <https://nodejs.org/fr/>, ce qui installera également npm.

> LTS signifie Long Term Support : il s'agit d'une version stable spécifique qui bénéficiera de support pendant plus longtemps qu'une version standard. Angular précise qu'il est compatible avec les versions LTS de Node.

## Installez le CLI d'Angular

Le CLI (Command Line Interface, ou interface en ligne de commande) d'Angular est un outil indispensable pour créer, gérer et déployer les applications Angular. Installez-le globalement sur votre ordinateur depuis une ligne de commande avec :

```
npm i -g @angular/cli
```

Le  i  est un raccourci pour install, et le  -g  dit à npm que vous voulez installer ce package de manière globale.
Une fois l'installation terminée, vous pouvez taper :

```
ng v
```

pour afficher les détails de la version installée, la commande  ng  correspondant au CLI d'Angular.
![](https://user.oc-static.com/upload/2021/11/03/16359300815664_Screenshot%202021-11-03%20at%2010.01.06.png)

## Si l'éxecution des scripts est désactivée 
![](https://media.discordapp.net/attachments/991600611625799741/991638623495671818/unknown.png)

Pour activer l'éxecution des scripts
```
Set-ExecutionPolicy -Scope CurrentUser Unrestricted
```

# Créez une nouvelle application

Ça y est, c'est maintenant !

Depuis une ligne de commande, naviguez dans le dossier où vous souhaitez créer votre projet Angular, et exécutez la commande suivante :

```
ng new snapface --style=scss --skip-tests=true
```

Dans ce cours, vous allez travailler sur une application de partage de photos. J'ai choisi le nom Snapface pour mon application ; vous pouvez garder ce nom-là, ou laisser libre cours à votre créativité et trouver un nom encore meilleur !

La commande ng new génère une nouvelle application Angular, installe les dépendances du projet, et initialise un dépôt Git. Le flag --style=scss dit au CLI que vous souhaitez utiliser le SCSS pour les styles (plutôt que le CSS ou le LESS, par exemple), et le flag --skip-tests=true dit que vous ne voulez pas générer de fichiers de tests unitaires pour ce projet. Oui, c'est mal de ne pas écrire de tests, mais chaque chose en son temps !

> Un flag dans ce contexte est une option de configuration passée à une commande en ligne de commande. Ces flags sont souvent précédés de - ou de -- .

> Si le CLI vous demande si vous voulez ajouter du routing, répondez Non : ce sera le sujet d'un autre chapitre !

Une fois la commande exécutée, votre projet est prêt, et vous pouvez l'ouvrir d'ores et déjà dans votre IDE !

# Lancez le serveur de développement

Ouvrez une ligne de commande dans le dossier du projet (dans mon cas, le dossier Snapface), et exécutez :

```
ng serve --open
```

Cette commande du CLI va compiler l'application et lancer un serveur de développement sur http://localhost:4200 : vous pouvez ouvrir votre navigateur à cette adresse pour voir tourner l'application.
![](https://user.oc-static.com/upload/2021/11/03/16359458659678_Screenshot%202021-11-03%20at%2012.36.01.png)

À chaque fois que vous enregistrerez des modifications dans un fichier de l'application, le serveur de développement les prendra en compte !

N'hésitez pas à utiliser le terminal intégré de votre IDE s'il en a un !

## Explorez le dossier du projet

Une application Angular contient beaucoup de fichiers (notamment de configuration) qui ne nous intéresseront pas dans le cadre de ce cours. Vous allez majoritairement travailler dans le dossier  src  :
Le dossier src contient des sous-dossiers app, assets, et environments, et quelques fichiers HTML, SCSS et TS.
![](https://user.oc-static.com/upload/2021/11/03/16359459885869_Screenshot%202021-11-03%20at%2012.47.43.png)

Le premier fichier qui nous saute aux yeux est index.html. Ici, comme sur un site classique, index.html est le fichier principal de votre projet. Mais si vous regardez dedans …

```html
<!doctype html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>Snapface</title>

  <base href="/">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/x-icon" href="favicon.ico">

</head>

<body>

  <app-root></app-root>

</body>

</html>
```

… le `<body>` ne contient qu'une balise `<app-root>` vide. D'où vient tout ce que l'on voit dans le navigateur, dans ce cas ??

Eh bien comme son nom l'indique, la balise `<app-root>` correspond à la racine de votre application, ou plus précisément à l'AppComponent, le component racine de votre application. Angular sait qu'il doit remplacer cette balise par le fameux AppComponent, donc allons voir où il se trouve !

Vous ne savez pas encore ce qu'est un component, mais c'est le sujet du prochain chapitre, donc patience ! 

Dans le sous-dossier app :
![](https://user.oc-static.com/upload/2021/11/03/16359462949358_Screenshot%202021-11-03%20at%2012.53.20.png)
Le sous-dossier app contient trois fichiers correspondant à AppComponent, et un fichier AppModule

À part le fichier app.module.ts auquel on s'intéressera plus tard, vous avez trois fichiers correspondant à AppComponent : un fichier HTML, un fichier SCSS, et un fichier TS.

Les fichiers avec comme extension .ts sont des fichiers TypeScript.

Si vous regardez dans le fichier app.component.html , vous y trouverez le contenu que vous voyez dans votre navigateur ! Mais comment Angular sait-il qu'il faut remplacer `<app-root>` par ce contenu ? Le secret se trouve dans  app.component.ts  :

```js
import { Component } from '@angular/core';

@Component({

  selector: 'app-root',

  templateUrl: './app.component.html',

  styleUrls: ['./app.component.scss']

})

export class AppComponent {

  title = 'snapface';

}
```

Vous verrez dans la prochaine partie du cours comment fonctionne ce fichier plus précisément, mais vous devriez déjà voir quelques éléments intéressants !
