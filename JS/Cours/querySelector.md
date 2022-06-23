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

```html
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

## Peut aussi utiliser des pseudo-classes
Les pseudo-classes dans le sélecteur CSS comme `:hover` et `:active` sont également supportées. Par exemple, `document.querySelectorAll(':hover')` retournera la collection avec les éléments sur lesquels le pointeur est passé maintenant (dans l’ordre d’imbrication : de l’extrêm `<html>` à l’élément le plus imbriqué).

## querySelector

L’appel à `elem.querySelector(css)`  renvoie le premier élément du sélecteur CSS donné.

En d’autres termes, le résultat est le même que `elem.querySelectorAll(css)[0] `, mais ce dernier recherche *tous* les éléments et en choisit un, tandis que `elem.querySelector` n’en cherche qu’un. C’est donc plus rapide et aussi plus court à écrire.

## Nombre de correspondances

Les méthodes précédentes cherchaient le DOM.

Le [elem.matches(css)](http://dom.spec.whatwg.org/#dom-element-matches) ne recherche rien, il vérifie simplement si `elem` correspond au sélecteur CSS donné. Il renvoie « vrai » ou « faux ».

La méthode est pratique lorsque nous itérons des éléments (comme dans un tableau ou autre) et que nous essayons de filtrer ceux qui nous intéressent.

Par exemple :

```html
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

## plus proche

*Les ancêtres* d’un élément sont : le parent, le parent du parent, son parent et ainsi de suite. Les ancêtres forment ensemble la chaîne des parents de l’élément au sommet.

La méthode `elem.closest(css)` recherche l’ancêtre le plus proche qui correspond au sélecteur CSS. L’élément lui-même est également inclus dans la recherche.

En d’autres termes, la méthode `closest` monte de l’élément et vérifie chacun des parents. Si elle correspond au sélecteur, la recherche s’arrête et l’ancêtre est retourné.

Par exemple :

```html
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

Il existe également d’autres méthodes pour rechercher des nœuds par une balise, une classe, etc.

Aujourd’hui, il s’agit surtout d’histoire, car le `querySelector` est plus puissant et plus court à écrire.

Donc ici nous les couvrons principalement pour l’exhaustivité, alors que vous pouvez encore les trouver dans les anciens scripts.

- `elem.getElementsByTagName(tag)`  recherche les éléments avec la balise donnée et renvoie la collection. Le paramètre `tag` peut également être une étoile `"*"` pour « any tags ».
- `elem.getElementsByClassName(className)`  renvoie les éléments qui ont la classe CSS donnée.
- `document.getElementsByName(name)` retourne les éléments avec l’attribut `name` donné, à l’échelle du document. Très rarement utilisé.

Par exemple :
```js
// get all divs in the document
let divs = document.getElementsByTagName('div');
```

Trouvons toutes les étiquettes `input` dans le tableau :

```html
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

## N’oubliez pas la lettre « s »!
Les développeurs débutants oublient parfois la lettre «s». C’est-à-dire qu’ils essaient d’appeler `getElementByTagName` au lieu de `getElementsByTagName`.

La lettre « s » est absente dans `getElementById`, parce qu’elle renvoie un seul élément. Mais `getElementsByTagName` renvoie un ensemble d’éléments, alors il y a « s » à l’intérieur.

## Il retourne une collection, pas un élément!"
Une autre erreur répandue novice est d’écrire :

```js
// doesn't work
document.getElementsByTagName('input').value = 5;
```

Cela ne fonctionnera pas, parce qu’il faut une *collection* d’entrées et assigne la valeur à elle plutôt qu’à des éléments à l’intérieur.

Nous devrions soit itérer sur la collection ou obtenir un élément par son index, puis attribuer, comme ceci :

```js
// should work (if there's an input)
document.getElementsByTagName('input')[0].value = 5;
```

Recherche d’éléments `.article` :

```html
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

## Nbre de collections en cours

Toutes les méthodes `getElementsBy*` renvoient une collection *live*. Ces collections reflètent toujours l’état actuel du document et "mise à jour automatique" quand il change.

Dans l’exemple ci-dessous, il y a deux scripts.

1. La première fait référence à la collection de `<div>`. À l’heure actuelle, sa longueur est de «1».
2. Les deuxièmes scripts s’exécutent après que le navigateur rencontre un autre `<div>`, de sorte que leur longueur est de « 2 ».

```html
<div>First div</div>

<script>
  let divs = document.getElementsByTagName('div');
  alert(divs.length); // 1
</script>

<div>Second div</div>

<script>
  alert(divs.length); // 2
</script>
```

En revanche, `querySelectorAll` renvoie une collection *statique*. C’est comme un tableau fixe d’éléments.

Si nous l’utilisons à la place, alors les deux scripts produisent « 1 » :


```html
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

Maintenant, nous pouvons facilement voir la différence. La collecte statique n’a pas augmenté après l’apparition d’une nouvelle `div` dans le document.

## Summary

Il existe 6 méthodes principales pour rechercher des nœuds dans DOM :

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

Les plus utilisés sont de loin `querySelector` et `querySelectorAll`, mais `getElement(s)By*` peut être sporadiquement utile ou se retrouver dans les anciens scripts.

En outre :

- Il y a `elem.matches(css)` pour vérifier si `elem` correspond au sélecteur CSS donné.
- Il y a `elem.closest(css)` pour chercher l’ancêtre le plus proche qui correspond au sélecteur CSS donné. L’élément lui-même est également coché.

Et mentionnons une autre méthode ici pour vérifier la relation enfant-parent, car elle est parfois utile :
-  `elemA.contains (elemB)` retourne true si `elemB` est à l’intérieur de `elemA` (un descendant de `elemA`) ou quand `elemA==elemB`.

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
