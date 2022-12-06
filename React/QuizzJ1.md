# Quizz - J1

## Qui est à l’origine de la librairie React ?

- Linus Torvalds <!-- Linus est connu pour être le principal contributeur du noyau Linux -->
- Jordan Walke <!-- Exact -->
- Misko Hevery <!-- Angular -->
- Elon musk <!-- Il ne peut pas tout faire, il est déjà trop occupé à conquérir Mars et développer les énergies renouvelables :)  -->

## Quel est le langage par défaut utilisé sur les applications React ?

- Typescript <!-- Il est possible d’utiliser ce langage mais ce n’est pas le langage par défaut. -->
- Javascript <!-- Même si c’est possible, cela n’est pas recommandé ! -->
- Dart <!-- Non, il s’agit d’un des langages utilisé par Google:) -->
- JSX <!-- Exact -->

## React est-il à l’origine des Web Components ?

- Oui <!-- Et non ! Les web components sont plus anciens et ont été créés par HTML5  -->
- Non  <!-- Exactement les web components ont été créés avec HTML5  -->

## Il est nécessaire d'installer Node.js pour pouvoir utiliser NPM

- Oui <!-- Exact, npm est le package manager (gestionnaire de dépendances) de Node  -->
- Non

## Un navigateur peut executer directement du JSX

- Oui
- Non <!-- Exact, il faut d'abord le transpiler en JavaScript  -->

## GNU/Linux est l'environnement le plus utilisé pour faire fonctionner des serveurs Web

- Oui <!-- Exact, plus de 90% des serveurs Web.  -->
- Non

## create-react-app est un script permettant de simplifier la création d'une application React

- Vrai <!-- Exact, et qui a une configuration optimisée pour le développement et la production (Webpack, Babel etc).  -->
- Faux

## create-react-app permet de mettre en place un serveur de développement

- Vrai <!-- Exact, qui recharge l'application automatiquement à chaque modification grâce à Webpack. >
- Faux

## On appelle point d'entrée d'une application le premier fichier JavaScript exécuté

- Vrai <!-- Exact, c'est celui qui charge tous les autres fichiers. -->
- Faux

## Dans le cadre d'une SPA, il n'y un qu'un seul fichier HTML pour toute l'application

- Vrai <!-- Exactement, d'où le "single page" ou page unique.  -->
- Faux

## C'est quoi NPX ?

- NPX est un gestionnaire de paquets comme NPM
- NPX n'existe pas, on dit NPM !
- NPX sert à exécuter des packages <!-- Excat, 11 - Initialiser une app via create-react-app -->
- NPX est dépréciée. Maintenant, on utilise Yarn

## Comment créer une application React mon-app ?

- npm create-react-app mon-app
- npx create-react-app mon-app <!-- Excat, 11 - Initialiser une app via create-react-app -->
- npx install create-react-app mon-app
- npm install create-react-app mon-app -g

## C'est quoi le JSX

- C'est juste du HTML basique
- C'est du Javascript HTML
- C'est du Javascript XML <!-- Excat, 7 - Initialiser une app via create-react-app -->
- C'est du XHTML

## Comment importer "Component" de react ?

- On lance npm install Component
- Via `import React.Component from 'react'`
- Via `import { Component } from 'react'` <!-- Excat, 17 - Props et State - Partie 1 -->
- Impossible, car les classes sont dépréciées depuis React 18 !

## C'est quoi un State Component dans une application React ?

- C'est un composant spécialement conçu pour les sites en .US
- C'est un composant qui possède un état <!-- Excat, 17 - Props et State - Partie 1 -->
- C'est un composant qui ne se charge qu'une seule fois.
- C'est un composant obligatoirement de type class meme après l'arrivée des hooks

## Les navigateurs modernes comprennent le JSX ?

- Oui
- Non <!-- Excat, 7 - Exercice React aevc CDN -->

## Sélectionnez la version correcte

```js
function App() {
    <div>
        <p>Text</p>
    </div>
}
```

```js
function App() {
    return
    <div>
        <p>Text</p>
    </div>
}
```

```js
function App() {
    return (
        <div>
            <div>
                <p>Text</p>
            </div>
            <p>Text</p>
        </div>
    )
}
```
<!-- Excat, 17 - Props et State - Partie 1 -->

```js
function App() {
    return (
        <div>
            <p>Text</p>
        </div>
        <div>
            <p>Text</p>
        </div>
    )
}
```

## Pour appliquer une class "container" à une div JSX, je fais

- `<div class="container"></div>`
- `<div className="container"></div>` <!-- Excat, 44 - Le CSS dans React -->
- `<div class={container}></div>`
- `<div class={{container}}></div>`

## Pour lancer mon application React en local, je fais

- npx start
- npm start <!-- Excat, 11 - Initialiser une app via create-react-app -->
- Je tape seulement <http://localhost:3000> dans le navigateur
- npm build

## Dans une application générée via create-react-app je dois installer moi-même GIT et paramétrer Babel

- Oui
- Non <!-- Excat, 11 - Initialiser une app via create-react-app -->
