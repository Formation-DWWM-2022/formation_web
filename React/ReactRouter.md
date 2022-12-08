# Note pour React Router

Dans la vidéo suivante, nous allons coder quelques pages de la DOC de React JS afin d’étudier la notion de Route tout en abordant Link, NavLink, Switch, Strict et Exact.

Notez que dans cette vidéo, j'ai utilisé la version 5 de React Router. La version 6 est maintenant disponible. Vous pouvez y accéder dans cette même formation au niveau de la "Section: UPDATE: React Router v6)".

Cependant, sachant que nous n'avons pas encore abordé les Hooks dans React - On verra ces derniers un peu plus tard - je vous recommande d'installer la version 5 de React-Router (package react-router-dom) au lieu de cette nouvelle version! Avec la version 5, vous serez en mesure de suivre facilement les exercices de la vidéo suivante. On reprendra ces mêmes exercices quand on abordera la version 6!

Comment installer la même version que celle de la vidéo?

C'est très simple, j'ai indiqué ce qu'il faut faire dans la petite note au moment de l'installation du package. En gros, vous devez indiquer la version au moment de l'installation du package react-router-dom comme ceci:

```
npm install react-router-dom@5
```

À la fin de la vidéo, nous verrons également comment afficher une page d’erreur dans une application React. En effet, jusqu’à présent nous avons l’habitude d’afficher tous nos composants ensembles. À présent, nous allons essayer d’afficher les composants en fonction des Routes que nous avons dans les URL. Pour rappel, une SPA (single-page application) est une application qui charge une seule et unique page HTML dans laquelle s’afficheront toutes les ressources nécessaires (telles que du JavaScript et des CSS) requises pour le bon fonctionnement de l’application. En outre, aucune interaction sur la page ou les pages ultérieures ne nécessitera d’aller-retour vers le serveur, évitant ainsi le rafraîchissement de notre application.

Autres notes

- Petite faute de frappe dans la vidéo suivante à 29:38. Voici comment importer correctement la page d'erreur : import ErrorPage from './components/ErrorPage';

- Si vous utilisez Bootstrap, vous pouvez également partir sur la même version que moi notamment si vous n'êtes pas à l'aise avec ce framework. Vous devez donc préciser la version 3.3.1 au moment de l'installation du package comme ceci: npm install bootstrap@4.3.1

- Pour ceux qui veulent activer le "Menu hamburger" de l'application, vous avez deux possibilités:

Option 1: Rendez-vous dans index.js (là où nous avons importé bootstrap.min.css) et importez également bootstrap.min.js comme ceci:

```js
import "../node_modules/bootstrap/dist/js/bootstrap.min.js";
```

Option 2: Utilisez les 3 liens CDN JavaScript fournis par Bootstrap juste avant la balise de fermeture <body> de votre index.html. Voici un exemple sur une des mes applications sur Github.

- Voici le code HTML utilisée dans la vidéo suivante pour le menu, vous pouvez le copier pour l'utiliser dans l'exercice de la vidéo suivante.

```jsx
<nav className="navbar navbar-expand-lg navbar-dark bg-dark">
    <a className="navbar-brand" href="/">Navbar</a>
    <button
      className="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span className="navbar-toggler-icon"></span>
    </button>
    <div className="collapse navbar-collapse" id="navbarNav">
      <ul className="navbar-nav ml-auto">
        <li className="nav-item">
          <Link className="nav-link" to="/">Docs</Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to="/tutorial">Tutorial</Link>
        </li>
        <li className="nav-item">
          <NavLink className="nav-link" to="/community">Community</NavLink>
        </li>
      </ul>
    </div>
</nav>
```
