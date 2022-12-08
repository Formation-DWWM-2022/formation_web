# Nouveaux Hooks de React 18.0.0 +.

Les Hooks qui vont suivre sont accessibles dans React version 18 et plus!

- Si vous souhaitez les utiliser dans vos projets, assurez-vous d'avoir la version 18 de React et de React-Dom! Si vous êtes sur React 17, la mise à niveau vers la version 18 est très simple. Rendez-vous à la racine de votre projet et lancez:

```
npm install react@18 react-dom@18
```

- Dans le fichier index.js, vous devez:

changer

```js
import ReactDOM from 'react-dom';
```

En

```js
import ReactDOM from 'react-dom/client';
```

Ensuite, remplacez celle ligne

```js
ReactDOM.render(<App />, document.getElementById('root'));
```

Par:

```js
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<App />);
```

Pour plus de renseignements sur cette nouvelle version React 18, je vous invite à vous rendre sur la [DOC](https://reactjs.org/blog/2022/03/29/react-v18.html)