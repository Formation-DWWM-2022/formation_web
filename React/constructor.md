# Note sur le constructor

Note sur la mutation du state et quelques mauvaises pratiques à éviter.

Dans la vidéo précédente (à 1:09), je vous ai présenté rapidement le constructor(props) qui n'est plus obligatoire depuis React 16.

En effet, si vous n’initialisez pas d’état local et ne liez pas de méthodes, vous n’avez pas besoin d’implémenter votre propre constructeur pour votre composant React. Vous définissez directement votre state sans le constructor. Donc, sans le this.

Je vous ai également dit que "vous ne devez jamais modifier le state directement ! Vous devez toujours passer par la méthode setState()". Ça, c'est la procédure courante à l'extérieur du constructor.

Cependant, si vous avez besoin d'initialiser l’état local de votre composant en affectant un objet à this.state ou si vous souhaitez lier des méthodes gestionnaires d’événements à l’instance vous allez donc devoir implémenter le constructeur. Das ce cas-là, la procédure est un peu différente.

Exemple 1: Vous avez besoin d'initialiser l’état local de votre composant en affectant votre state (l'objet this.state).

Dans ce cas, vous ne devez SURTOUT PAS appeler setState() dans le constructor()! Au lieu de ça, affectez directement l’état initial à this.state dans le constructeur.

```js
constructor(props) {
  super(props);
  
  // N’appelez pas `this.setState()` ici !
  this.state = { counter: 0 };
}
```

Exemple 2: Si vous souhaitez lier des méthodes gestionnaires d’événements à l’instance, vous allez donc devoir implémenter le constructeur.

```js
constructor(props) {
   super(props);
   this.handleClick = this.handleClick.bind(this);
}
```

Gardez donc bien cette information en tête:

Le constructeur est le seul endroit où vous devriez affecter directement une valeur à this.state sans passer par la méthode setState() car cette dernière est strictement interdite dans le constructor().

Une autre erreur courante chez les débutants en React, consiste à copier les props dans l’état local. Ne faites jamais pas ça !

Exemple:

```js
constructor(props) {
   super(props);

    // Ne faites pas ça !
    this.state = { color: props.color };
}
```
