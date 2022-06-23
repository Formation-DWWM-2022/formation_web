# Recherche : getElement*, querySelector*

Les propriétés de navigation DOM sont excellentes lorsque les éléments sont proches les uns des autres. Et si ce n’est pas le cas ? Comment obtenir un élément arbitraire de la page ?

Il y a d’autres méthodes de recherche pour cela.

## document.getElementById ou simplement id

Si un élément a l’attribut ‘id’, nous pouvons obtenir l’élément en utilisant la méthode ‘document.getElementById(id)’, peu importe où il se trouve.

Par exemple :

```html
<div id="elem">
  <div id="elem-content">Element</div>
</div>

<script>
  // get the element

  let elem = document.getElementById('elem');

  // make its background red
  elem.style.background = 'red';
</script>
```

De plus, il y a une variable globale nommée par `id` qui renvoie à l’élément :

```html
<div id="elem">
  <div id="elem-content*">Element</div>
</div>

<script>
  // elem is a reference to DOM-element with id="elem"
  elem.style.background = 'red';

  // id="elem-content" has a hyphen inside, so it can't be a variable name
  // ...but we can access it using square brackets: window['elem-content']
</script>
```

... à moins que nous déclarions une variable JavaScript avec le même nom, alors elle a priorité :

```html
<div id="elem"></div>

<script>
  let elem = 5; // now elem is 5, not a reference to <div id="elem">

  alert(elem); // 5
</script>
```

## Veuillez ne pas utiliser de variables globales nommées par id pour accéder aux éléments

Ce comportement est décrit [dans la spécification](http://www.whatwg.org/specs/web-apps/current-work/#dom-window-nameditem), donc c’est un peu standard. Mais il est supporté principalement pour la compatibilité.

Le navigateur essaie de nous aider en mélangeant les espaces de noms de JS et DOM. C’est bien pour les scripts simples, incrustés dans HTML, mais généralement ce n’est pas une bonne chose. Il peut y avoir des conflits de nommage. Aussi, quand on lit le code JS et n’a pas HTML en vue, il n’est pas évident d’où vient la variable.

Ici, dans le tutoriel, nous utilisons `id` pour référencer directement un élément par souci de brièveté, lorsqu’il est évident d’où vient l’élément.

Dans la vraie vie, `document.getElementById` est la méthode préférée.

## L' `id` doit être unique.
Le `id` doit être unique. Il ne peut y avoir qu’un seul élément dans le document avec le `id` donné.

S’il y a plusieurs éléments avec le même `id`, alors le comportement des méthodes qui l’utilisent est imprévisible, p. ex., `document.getElementById` peut renvoyer n’importe lequel de ces éléments au hasard. Alors, s’il vous plaît, respectez la règle et gardez votre `id` unique.

## Seulement `document.getElementById`, pas ` anyElem.getElementById`
La méthode `getElementById` ne peut être appelée que sur l’objet `document`. Elle recherche le `id` donné dans l’ensemble du document.

## querySelectorAll 

De loin, la méthode la plus polyvalente, `elem.querySelectorAll(css)` renvoie tous les éléments à l’intérieur de `elem` correspondant au sélecteur CSS donné.

Nous recherchons ici tous les éléments `<li>` qui sont les derniers enfant

```html run
<ul>
  <li>The</li>
  <li>test</li>
</ul>
<ul>
  <li>has</li>
  <li>passed</li>
</ul>
<script>

  let elements = document.querySelectorAll('ul > li:last-child');

  for (let elem of elements) {
    alert(elem.innerHTML); // "test", "passed"
  }
</script>
```

Cette méthode est en effet puissante, car tout sélecteur CSS peut être utilisé.

```smart header="Can use pseudo-classes as well"
Pseudo-classes in the CSS selector like `:hover` and `:active` are also supported. For instance, `document.querySelectorAll(':hover')` will return the collection with elements that the pointer is over now (in nesting order: from the outermost `<html>` to the most nested one).
```

## querySelector [#querySelector]

The call to `elem.querySelector(css)` returns the first element for the given CSS selector.

In other words, the result is the same as `elem.querySelectorAll(css)[0]`, but the latter is looking for *all* elements and picking one, while `elem.querySelector` just looks for one. So it's faster and also shorter to write.

## matches

Previous methods were searching the DOM.

The [elem.matches(css)](http://dom.spec.whatwg.org/#dom-element-matches) does not look for anything, it merely checks if `elem` matches the given CSS-selector. It returns `true` or `false`.

The method comes in handy when we are iterating over elements (like in an array or something) and trying to filter out those that interest us.

For instance:

```html run
<a href="http://example.com/file.zip">...</a>
<a href="http://ya.ru">...</a>

<script>
  // can be any collection instead of document.body.children
  for (let elem of document.body.children) {
*!*
    if (elem.matches('a[href$="zip"]')) {
*/!*
      alert("The archive reference: " + elem.href );
    }
  }
</script>
```

## closest

*Ancestors* of an element are: parent, the parent of parent, its parent and so on. The ancestors together form the chain of parents from the element to the top.

The method `elem.closest(css)` looks for the nearest ancestor that matches the CSS-selector. The `elem` itself is also included in the search.

In other words, the method `closest` goes up from the element and checks each of parents. If it matches the selector, then the search stops, and the ancestor is returned.

For instance:

```html run
<h1>Contents</h1>

<div class="contents">
  <ul class="book">
    <li class="chapter">Chapter 1</li>
    <li class="chapter">Chapter 2</li>
  </ul>
</div>

<script>
  let chapter = document.querySelector('.chapter'); // LI

  alert(chapter.closest('.book')); // UL
  alert(chapter.closest('.contents')); // DIV

  alert(chapter.closest('h1')); // null (because h1 is not an ancestor)
</script>
```

## getElementsBy*

There are also other methods to look for nodes by a tag, class, etc.

Today, they are mostly history, as `querySelector` is more powerful and shorter to write.

So here we cover them mainly for completeness, while you can still find them in the old scripts.

- `elem.getElementsByTagName(tag)` looks for elements with the given tag and returns the collection of them. The `tag` parameter can also be a star `"*"` for "any tags".
- `elem.getElementsByClassName(className)` returns elements that have the given CSS class.
- `document.getElementsByName(name)` returns elements with the given `name` attribute, document-wide. Very rarely used.

For instance:
```js
// get all divs in the document
let divs = document.getElementsByTagName('div');
```

Let's find all `input` tags inside the table:

```html run height=50
<table id="table">
  <tr>
    <td>Your age:</td>

    <td>
      <label>
        <input type="radio" name="age" value="young" checked> less than 18
      </label>
      <label>
        <input type="radio" name="age" value="mature"> from 18 to 50
      </label>
      <label>
        <input type="radio" name="age" value="senior"> more than 60
      </label>
    </td>
  </tr>
</table>

<script>
*!*
  let inputs = table.getElementsByTagName('input');
*/!*

  for (let input of inputs) {
    alert( input.value + ': ' + input.checked );
  }
</script>
```

Novice developers sometimes forget the letter `"s"`. That is, they try to call `getElementByTagName` instead of <code>getElement<b>s</b>ByTagName</code>.

The `"s"` letter is absent in `getElementById`, because it returns a single element. But `getElementsByTagName` returns a collection of elements, so there's `"s"` inside.
```

````warn header="It returns a collection, not an element!"
Another widespread novice mistake is to write:

```js
// doesn't work
document.getElementsByTagName('input').value = 5;
```

That won't work, because it takes a *collection* of inputs and assigns the value to it rather than to elements inside it.

We should either iterate over the collection or get an element by its index, and then assign, like this:

```js
// should work (if there's an input)
document.getElementsByTagName('input')[0].value = 5;
```

Looking for `.article` elements:

```html run height=50
<form name="my-form">
  <div class="article">Article</div>
  <div class="long article">Long article</div>
</form>

<script>
  // find by name attribute
  let form = document.getElementsByName('my-form')[0];

  // find by class inside the form
  let articles = form.getElementsByClassName('article');
  alert(articles.length); // 2, found two elements with class "article"
</script>
```

## Live collections

All methods `"getElementsBy*"` return a *live* collection. Such collections always reflect the current state of the document and "auto-update" when it changes.

In the example below, there are two scripts.

1. The first one creates a reference to the collection of `<div>`. As of now, its length is `1`.
2. The second scripts runs after the browser meets one more `<div>`, so its length is `2`.

```html run
<div>First div</div>

<script>
  let divs = document.getElementsByTagName('div');
  alert(divs.length); // 1
</script>

<div>Second div</div>

<script>
*!*
  alert(divs.length); // 2
*/!*
</script>
```

In contrast, `querySelectorAll` returns a *static* collection. It's like a fixed array of elements.

If we use it instead, then both scripts output `1`:


```html run
<div>First div</div>

<script>
  let divs = document.querySelectorAll('div');
  alert(divs.length); // 1
</script>

<div>Second div</div>

<script>
*!*
  alert(divs.length); // 1
*/!*
</script>
```

Now we can easily see the difference. The static collection did not increase after the appearance of a new `div` in the document.

## Summary

There are 6 main methods to search for nodes in DOM:

<table>
<thead>
<tr>
<td>Method</td>
<td>Searches by...</td>
<td>Can call on an element?</td>
<td>Live?</td>
</tr>
</thead>
<tbody>
<tr>
<td><code>querySelector</code></td>
<td>CSS-selector</td>
<td>✔</td>
<td>-</td>
</tr>
<tr>
<td><code>querySelectorAll</code></td>
<td>CSS-selector</td>
<td>✔</td>
<td>-</td>
</tr>
<tr>
<td><code>getElementById</code></td>
<td><code>id</code></td>
<td>-</td>
<td>-</td>
</tr>
<tr>
<td><code>getElementsByName</code></td>
<td><code>name</code></td>
<td>-</td>
<td>✔</td>
</tr>
<tr>
<td><code>getElementsByTagName</code></td>
<td>tag or <code>'*'</code></td>
<td>✔</td>
<td>✔</td>
</tr>
<tr>
<td><code>getElementsByClassName</code></td>
<td>class</td>
<td>✔</td>
<td>✔</td>
</tr>
</tbody>
</table>

By far the most used are `querySelector` and `querySelectorAll`, but `getElement(s)By*` can be sporadically helpful or found in the old scripts.

Besides that:

- There is `elem.matches(css)` to check if `elem` matches the given CSS selector.
- There is `elem.closest(css)` to look for the nearest ancestor that matches the given CSS-selector. The `elem` itself is also checked.

And let's mention one more method here to check for the child-parent relationship, as it's sometimes useful:
-  `elemA.contains(elemB)` returns true if `elemB` is inside `elemA` (a descendant of `elemA`) or when `elemA==elemB`.


# querySelector et querySelectorAll vs getElementsByClassName et getElementById en JavaScript

Pour cette réponse, je renvoie à querySelector et querySelectorAll as querySelector*et à getElementById, getElementsByClassName, getElementsByTagName et getElementsByName as getElement*.

## Principales différences

- querySelector* est plus flexible, car vous pouvez lui passer n’importe quel sélecteur CSS3, pas seulement ceux simples pour id, tag ou classe.
- La performance de querySelector*change avec la taille du DOM sur lequel il est invoqué. Pour être précis, les appels querySelector* s’exécutent en temps O(n) et les appels getElement* s’exécutent en temps O(1), où n est le nombre total de tous les enfants de l’élément ou du document sur lequel il est invoqué. Ce fait semble être le moins connu, alors je l’affirme.
- Les types de retour de ces appels varient. querySelector et getElementById renvoient tous deux un seul élément. querySelectorAll et getElementsByName renvoient tous deux NodeLists. Les anciens getElementsByClassName et getElementsByTagName renvoient tous deux HTMLCollections. NodeLists et HTMLCollections sont tous deux appelés collections d’éléments.
- Les collections peuvent contenir des références à des éléments dans le DOM, ou des copies d’éléments. getElement* rappelle des collections de références, alors que querySelectorAll les résultats contiennent des copies des éléments. Il s’agit respectivement de collections « vivantes » et de collections « statiques ». Ceci n’est PAS lié aux types qu’elles renvoient.

## Ces concepts sont résumés dans le tableau suivant

| Function               | Live? | Type           | Time Complexity
| --- | --- | --- | --- |
| querySelector          |       | Element        |  O(n)
| querySelectorAll       |   N   | NodeList       |  O(n)
| getElementById         |       | Element        |  O(1)
| getElementsByClassName |   Y   | HTMLCollection |  O(1)
| getElementsByTagName   |   Y   | HTMLCollection |  O(1)
| getElementsByName      |   Y   | NodeList       |  O(1)

## Détails, conseils et exemples
- HTMLCollections are not as array-like as NodeLists and do not support .forEach(). I find the spread operator useful to work around this:
```js
[...document.getElementsByClassName("someClass")].forEach()
```

- Chaque élément, et le document global, ont accès à toutes ces fonctions à l’exception de getElementById et getElementsByName, qui ne sont implémentés que sur document.

- Chaîner les appels getElement* au lieu d’utiliser querySelector* améliorera les performances, en particulier sur les très grands DOM. Même sur les petits DOM et/ou avec des chaînes très longues, il est généralement plus rapide. Cependant, à moins que vous ne sachiez que vous avez besoin de la performance, la lisibilité de querySelector* devrait être préférée. querySelectorAll est souvent plus difficile à réécrire, parce que vous devez sélectionner des éléments de la NodeList ou HTMLCollection à chaque étape. Par exemple, le code suivant ne fonctionne pas :
```js
document.getElementsByClassName("someClass").getElementsByTagName("div")
```
car vous ne pouvez utiliser getElements* que sur des éléments uniques, pas des collections. Par exemple :
```js
document.querySelector("#someId .someClass div")
```
pourrait s’écrire comme suit :
```js
document.getElementById("someId").getElementsByClassName("someClass")[0].getElementsByTagName("div")[0]
```
Notez l’utilisation de [0] pour obtenir seulement le premier élément de la collection à chaque étape qui retourne une collection, résultant en un élément à la fin tout comme avec querySelector.

- Puisque tous les éléments ont accès aux appels querySelector* et getElement*, vous pouvez faire des chaînes en utilisant les deux appels, ce qui peut être utile si vous voulez un gain de performance, mais ne peut pas éviter un querySelector qui ne peut pas être écrit en termes d’appels getElement*.

- Bien qu’il soit généralement facile de dire si un sélecteur peut être écrit en utilisant seulement les appels getElement*, il y a un cas qui peut ne pas être évident :
```js
    document.querySelectorAll(".class1.class2")
```
peut être réécrit comme
```js
    document.getElementsByClassName("class1 class2")
```

- L’utilisation de getElement* sur un élément statique récupéré avec querySelector* donnera un élément qui est en direct par rapport au sous-ensemble statique du DOM copié par querySelector, mais pas en direct par rapport au document complet DOM... c’est là que la simple interprétation en direct/statique des éléments commence à s’effondrer. Vous devriez probablement éviter les situations où vous devez vous inquiéter de cela, mais si vous le faites, rappelez-vous que querySelector* appelle les éléments copy qu’ils trouvent avant de leur renvoyer des références, mais les appels getElement* récupèrent des références directes sans copier.

- querySelector* et getElementById traversent des éléments en précommande, depth-first, appelés "tree order" dans la spécification. Avec d’autres appels getElement*, ce n’est pas clair pour moi dans la spécification - ils peuvent être identiques à l’ordre de l’arborescence, mais getElementsByClassName(".someClass")[0] peut ne pas donner le même résultat dans tous les navigateurs. getElementById("#someId") devrait cependant, même si vous avez plusieurs copies du même identifiant sur votre page.

# Performance de getElementById vs querySelector vs getElementByClassName (lequel est le plus rapide ?)

getElementById("ID") vous permet de sélectionner n’importe quel élément en fonction de son id, getElementByClassName("class") vous permet de sélectionner n’importe quel élément en fonction de son nom de classe et querySelector("css-selectors") vous permet de sélectionner n’importe quel élément en fonction du modèle de sélecteur CSS. Cela signifie que querySelector peut être utilisé à la place de getElementById et getElementByClassName afin que le code semble plus uniforme et lisible. En outre, querySelector peut être plus utile si nous avons besoin d’effectuer des sélections plus complexes sur HTML, ce que nous faisons souvent.

Garder tous ces avantages de querySelector sur getElementById et getElementByClassName, si nous regardons la performance seulement alors nous voyons que querySelector est plus lent que l’autre. Pour expérimenter ce qui suit est le code:

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>javascript speed test</title>
</head>

<body>
    <!--  test content-->
 <div class="test" id="test"></div>
    <p class="query"></p>
    <p class="byId"></p>
    <p class="byClass"></p>  
</body>

</html>
```

```js
let query = document.querySelector('.query');
let byId = document.querySelector('.byId');
let byClass = document.querySelector('.byClass');

window.addEventListener('DOMContentLoaded', (e) => {

    let start_time = window.performance.now();
    for (let i = 0; i < 10000; i++) {
        let element = document.querySelector('#test');
    }
    let end_time = window.performance.now();
    console.log(`querySelector() => Execution time: ${end_time - start_time} ms`);
    query.textContent = `querySelector() => Execution time: ${end_time - start_time} ms`;


    start_time = window.performance.now();
    for (let i = 0; i < 10000; i++) {
        let element = document.getElementById('test');
    }
    end_time = window.performance.now();
    console.log(`getElementById()=> Execution time: ${end_time - start_time} ms`);
    byId.textContent = `getElementById()=> Execution time: ${end_time - start_time} ms`;


    start_time = window.performance.now();
    for (let i = 0; i < 10000; i++) {
        let element = document.getElementsByClassName('test');
    }
    end_time = window.performance.now();
    console.log(`getElementByClassName()=> Execution time: ${end_time - start_time} ms`);
    byClass.textContent = `getElementByClassName()=> Execution time: ${end_time - start_time} ms`;


});
```

Si vous exécutez ce code, vous constaterez que querySelector est plus lent que getElementById et getElementByClassName. Parmi getElementbyId et getElementByClassName, getElementById est légèrement plus rapide.
Voici les résultats de l’expérience avec 10000000 itérations

![](https://vidyasheela.com/web-contents/img/post_img/65/test-2.png)

Vous pouvez voir que le temps d’exécution est en ms même pour 10000000 itérations, ce qui signifie que toutes ces fonctions sélecteur sont rapides. donc à mon avis, vous devriez utiliser querySelector au lieu de getElementById ou getElementByClassName, mais pas à cause des performances. L’augmentation de performance est négligeable et n’aura aucune importance dans aucune application réelle. La vraie raison est une seule façon normalisée de faire des sélections d’éléments que ce soit par type, id, classe...
