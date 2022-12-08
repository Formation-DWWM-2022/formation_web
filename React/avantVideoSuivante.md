# Note avant de visualiser la vidéo suivante

Dans la vidéo suivante, j'utilise la version 16 de React qui nécessite d'importer react dans nos composants comme ceci: import React from 'react' Ce qui n'est plus nécessaire de faire dans les nouvelle versions.

- Si vous décidez d'importer react dans votre composant, celui-ci vous donnera accès à la méthode memo comme indiqué dans la vidéo suivante: React.memo().
- Si vous n'importez PAS react dans votre composant, vous devez alors obtenir la méthode memo via le destructuring comme ceci: import {memo} from 'react'. Une fois memo importée, vous allez simplement la déclarer comme ci: memo() (sans passer par React).

C'est la même chose pour Component et PureComponent.

Soit vous les importez via le destructuring de react comme ceci:

```js
import {Component, PureComponent} from 'react';
 
class CompOne extends Component {
   render() { // JSX }
}
 
class CompTwo extends PureComponent {
   render() { // JSX }
}
```

Ou bien, vous les invoquez via React comme ceci:

```js
import React from 'react';
 
class ComponentOne extends React.Component {
   render() { // JSX }
}
 
class ComponentTwo extends React.PureComponent {
   render() { // JSX }
}
```
