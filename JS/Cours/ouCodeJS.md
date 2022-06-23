# Où écrire le code JavaScript ?

On va pouvoir placer du code JavaScript à trois endroits différents :

- Directement dans la balise ouvrante d’un élément HTML ;
- Dans un élément script, au sein d’une page HTML ;
- Dans un fichier séparé contenant exclusivement du JavaScript et portant l’extension .js.

Nous allons dans cette leçon voir comment écrire du code JavaScript dans chacun de ces emplacements et souligner les différents avantages et inconvénients liés à chaque façon de faire.

## Placer le code JavaScript dans la balise ouvrante d’un élément HTML

Il est possible que vous rencontriez encore aujourd’hui du code JavaScript placé directement dans la balise ouvrante d’éléments HTML.

Ce type de construction était fréquent à l’époque notamment pour prendre en charge des évènements comme par exemple un clic.

Regardez plutôt l’exemple ci-dessous :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-code-balise-ouvrante-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-code-balise-ouvrante-html-resultat.png)

Ici, on crée deux boutons en HTML et on place nos codes JavaScript à l’intérieur d’attributs onclick. Le code à l’intérieur des attributs va s’exécuter dès qu’on va cliquer sur le bouton correspondant.

Dans le cas présent, cliquer sur le premier bouton a pour effet d’ouvrir une fenêtre d’alerte qui affiche « Bonjour ! ».

Cliquer sur le deuxième bouton rajoute un élément p qui contient le texte « Paragraphe ajouté » à la suite des boutons.

Je vous demande pour le moment de ne pas trop vous attarder sur les codes JavaScript en eux-mêmes car nous aurons largement le temps de découvrir les structures de ce langage dans la suite de ce cours mais plutôt de vous concentrer sur le sujet de la leçon qui concerne les emplacements possibles du code JavaScript.

Aujourd’hui, de nouvelles techniques nous permettent de ne plus utiliser ce genre de syntaxe et il est généralement déconseillé et considéré comme une mauvaise pratique d’écrire du code JavaScript dans des balises ouvrantes d’éléments HTML.

La raison principale à cela est que le web et les éléments le composant sont de plus en plus complexes et nous devons donc être de plus en plus rigoureux pour exploiter cette complexité.

Ainsi, la séparation des différents langages ou codes est aujourd’hui la norme pour essayer de conserver un ensemble le plus propre, le plus compréhensible et le plus facilement maintenable possible.

En plus de cela, polluer le code HTML comme cela peut conduire à certains bogues dans le code et est inefficace puisqu’on aurait à recopier les différents codes pour chaque élément auquel on voudrait les appliquer.

## Placer le code JavaScript dans un élément script, au sein d’une page HTML

On va également pouvoir placer notre code JavaScript dans un élément script qui est l’élément utilisé pour indiquer qu’on code en JavaScript.

On va pouvoir placer notre élément script n’importe où dans notre page HTML, aussi bien dans l’élément head qu’au sein de l’élément body.

De plus, on va pouvoir indiquer plusieurs éléments script dans une page HTML pour placer plusieurs bouts de code JavaScript à différents endroits de la page.

Regardez plutôt l’exemple ci-dessous. Ce code produit le même résultat que le précédent :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-code-element-script-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-code-element-script-html-resultat.png)

Cette méthode est meilleure que la précédente mais n’est une nouvelle fois pas idéalement celle que nous allons utiliser pour plusieurs raisons.

Tout d’abord, comme précédemment, la séparation des codes n’est pas optimale ici puisqu’on mélange du JavaScript et du HTML ce qui peut rendre l’ensemble confus et complexe à comprendre dans le cadre d’un gros projet.

De plus, si on souhaite utiliser les mêmes codes sur plusieurs pages, il faudra les copier-coller à chaque fois ce qui n’est vraiment pas efficient et ce qui est très mauvais pour la maintenabilité d’un site puisque si on doit changer une chose dans un code copié-collé dans 100 pages de notre site un jour, il faudra effectuer la modification dans chacune des pages.

## Placer le code JavaScript dans un fichier séparé

Placer le code JavaScript dans un fichier séparé ne contenant que du code JavaScript est la méthode recommandée et que nous préférerons tant que possible.

Pour faire cela, nous allons devoir créer un nouveau fichier et l’enregistrer avec une extension .js. Ensuite, nous allons faire appel à notre fichier JavaScript depuis notre fichier HTML.

Pour cela, on va à nouveau utiliser un élément script mais nous n’allons cette fois-ci rien écrire à l’intérieur. A la place, on va plutôt ajouter un attribut src à notre élément script et lui passer en valeur l’adresse du fichier. Si votre fichier .js se situe dans le même dossier que votre fichier .html, il suffira d’indiquer le nom du fichier en valeur de l’attribut src.

Notez qu’un élément script ne peut posséder qu’un attribut src. Dans le cas où on souhaite utiliser plusieurs fichiers JavaScript dans un fichier HTML, il faudra renseigner autant d’éléments script dans le fichier avec chaque élément appelant un fichier en particulier.

Le code ci-dessous produit à nouveau les mêmes résultats que précédemment. Ne vous préoccupez pas de l’attribut async pour le moment.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-code-externe-element-script-src-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-code-fichier-separe-js.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-code-externe-element-script-src-html-resultat.png)

Cette méthode sera notre méthode préférée puisqu’elle permet une excellente séparation du code et une maintenabilité optimale de celui-ci. En effet, si on veut insérer le code JavaScript contenu dans notre fichier dans 100 pages différentes, il suffira ici d’appeler ce fichier JavaScript dans les 100 pages. En cas de modification du code, il suffira alors de le modifier une fois dans le fichier JavaScript.

Note : Pour illustrer la séparation des codes dans CodePen, je placerai désormais le code JavaScript dans l’onglet « JavaScript » de ce logiciel. Ici, CodePen va automatiquement faire la liaison entre mes deux codes et je n’aurai donc pas besoin de préciser script src="…" dans mon code. De votre côté, dans votre éditeur, vous devrez évidemment continuer à appeler votre code JavaScript depuis votre page HTML pour que tout fonctionne.

## La place du code et l’ordre d’exécution de celui-ci

Il y a une autre facteur dont je n’ai pas encore parlé et qu’il faut absolument prendre en compte et comprendre lorsqu’on ajoute du code JavaScript dans nos pages HTML qui est l’ordre d’exécution du code par le navigateur.

Il est possible que ce que je vais expliquer là vous semble complexe et abstrait et c’est tout à fait normal : c’est un peu tôt dans votre apprentissage pour vous expliquer ce mécanisme. Pas d’inquiétude, cependant, nous aurons l’occasion d’en reparler plus tard dans ce cours. Pour le moment, essayez simplement de faire votre maximum pour visualiser ce qu’il se passe.

Ici, il va avant tout être important de bien comprendre que par défaut, un navigateur va lire et exécuter le code dans l’ordre de son écriture.

Plus précisément, lorsque le navigateur arrive à un élément script, il va stopper le traitement du reste du HTML jusqu’à ce que le code JavaScript soit chargé dans la page et exécuté.

Nos codes JavaScript ci-dessus ont besoin des éléments button de notre page HTML pour fonctionner. En effet, les codes getElementById('b1') et getElementById('b2') vont récupérer les éléments dont les id sont « b1 » et « b2 » pour les manipuler.

Cela risque de poser problème dans le cas présent car si notre code JavaScript est exécuté avant que le code HTML de nos boutons ne soit traité par le navigateur, il ne fonctionnera puisqu’il cherchera à utiliser des éléments qui n’existent pas encore.

C’est la raison pour laquelle, lorsque j’ai choisi d’insérer le code JavaScript directement dans la page HTML au sein d’éléments script, j’ai été obligé d’entourer le code JavaScript qui affiche la boite d’alerte déclaré dans l’élément head par le code document.addEventListener('DOMContentLoaded', function(){}) ;. Ce code indique en effet au navigateur qu’il doit d’abord charger tout le contenu HTML avant d’exécuter le JavaScript à l’intérieur de celui-ci.

Dans ce même exemple, mon deuxième élément script était lui placé en fin de body et est donc par défaut exécuté après le reste du code. Il n’y avait donc pas de problème dans ce cas.

Notez que le même problème va avoir lieu dans le cas où on fait appel à un fichier JavaScript externe par défaut : selon l’endroit dans le code où le fichier est demandé, il pourra ne pas fonctionner s’il utilise du code HTML pas encore défini.

Ce souci est la raison pour laquelle il a longtemps été recommandé de placer ses éléments script juste avant la balise fermante de l’élément body, après tout code HTML.

Cette façon de faire semble en effet résoudre le problème à priori mais n’est pas toujours optimale en termes de performances.

En effet résumons ce qu’il se passe dans ce cas :

1. Le navigateur commence à analyser (ou à traiter) le code HTML ;
2. L’analyseur du navigateur rencontre un élément script ;
3. Le contenu JavaScript est demandé et téléchargé (dans le cas où il se situe dans un fichier externe) puis exécuté. Durant tout ce temps, l’analyseur bloque l’affichage du HTML, ce qui peut dans le cas où le script est long ralentir significativement le temps d’affichage de la page ;
4. Dès que le JavaScript a été exécuté, le contenu HTML finit d’être analysé et est affiché.

Ce problème précis de temps d’attente de chargement des fichiers JavaScript va pouvoir être résolu en grande partie grâce au téléchargement asynchrone des données qui va pouvoir être ordonné en précisant un attribut async ou defer dans nos éléments script.

Le téléchargement asynchrone est une notion complexe et nous l’étudierons donc beaucoup plus tard dans ce cours. Pour le moment, retenez simplement que nous n’allons pouvoir utiliser les attributs async et defer que dans le cas où on fait appel à des fichiers JavaScript externes (c’est-à-dire à du code JavaScript stocké dans des fichiers séparés).

C’est une raison supplémentaire qui nous fera préférer l’enregistrement du code JavaScript dans des fichiers séparés. 

# Les scripts: async, defer

Dans les sites Web modernes, les scripts sont souvent “plus lourds” que le HTML: leur taille de téléchargement est plus grande et le temps de traitement est également plus long.

Lorsque le navigateur charge le HTML et rencontre une balise `<script>...</script>`, il ne peut pas continuer à construire le DOM. Il doit exécuter le script de suite. Il en va de même pour les scripts externes `<script src ="..."></script>`: le navigateur doit attendre le téléchargement du script, l’exécuter, puis traiter le reste de la page.

Cela conduit à deux problèmes importants:

    Les scripts ne peuvent pas voir les éléments DOM en dessous d’eux, ils ne peuvent donc pas ajouter de gestionnaires, etc.
    S’il y a un script volumineux en haut de la page, il “bloque la page”. Les utilisateurs ne peuvent pas voir le contenu de la page tant qu’il n’est pas téléchargé et exécuté:

```js
<p>...content before script...</p>

<script src="https://javascript.info/article/script-async-defer/long.js?speed=1"></script>

<!-- Ceci n'est pas visible tant que le script n'est pas chargé -->
<p>...content after script...</p>
```

Il existe quelques solutions pour contourner cela. Par exemple, nous pouvons mettre un script en bas de page. Comme ça, il peut voir les éléments au-dessus, et cela ne bloque pas l’affichage du contenu de la page:
```js
<body>
  ...all content is above the script...

  <script src="https://javascript.info/article/script-async-defer/long.js?speed=1"></script>
</body>
```

Mais cette solution est loin d’être parfaite. Par exemple, le navigateur remarque le script (et peut commencer à le télécharger) uniquement après avoir téléchargé le document HTML complet. Pour les longs documents HTML, cela peut être un retard notable.

De telles choses sont invisibles pour les personnes utilisant des connexions très rapides, mais de nombreuses personnes dans le monde ont encore des vitesses Internet lentes et utilisent une connexion Internet mobile loin d’être parfaite.

Heureusement, il y a deux attributs de `<script>` qui résolvent le problème pour nous: defer et async.

## defer

L’attribut defer indique au navigateur de ne pas attendre le script. Au lieu de cela, le navigateur continuera à traiter le HTML, à construire le DOM. Le script se charge “en arrière-plan”, puis s’exécute lorsque le DOM est entièrement construit.

Voici le même exemple que ci-dessus, mais avec defer:
```js
<p>...content before script...</p>

<script defer src="https://javascript.info/article/script-async-defer/long.js?speed=1"></script>

<!-- visible immédiatement -->
<p>...content after script...</p>
```

    Les scripts avec defer ne bloquent jamais la page.
    Les scripts avec defer s’exécutent toujours lorsque le DOM est prêt, mais avant l’événement DOMContentLoaded.

L’exemple suivant montre que:
```js
<p>...content before scripts...</p>

<script>
  document.addEventListener('DOMContentLoaded', () => alert("DOM ready after defer!")); // (2)
</script>

<script defer src="https://javascript.info/article/script-async-defer/long.js?speed=1"></script>

<p>...content after scripts...</p>
```
    Le contenu de la page s’affiche immédiatement.
    DOMContentLoaded attend le script différé. Il ne se déclenche que lorsque le script (2) est téléchargé et exécuté.

Les scripts différés conservent leur ordre relatif, tout comme les scripts classiques.

Donc, si nous avons d’abord un long script, puis un plus petit, alors ce dernier attend.
```js
<script defer src="https://javascript.info/article/script-async-defer/long.js"></script>
<script defer src="https://javascript.info/article/script-async-defer/small.js"></script>
```

Les navigateurs analysent la page à la recherche de scripts et les téléchargent en parallèle pour améliorer les performances. Ainsi, dans l’exemple ci-dessus, les deux scripts se téléchargent en parallèle. Le small.js se termine probablement en premier.

… Mais l’attribut defer, en plus de dire au navigateur “de ne pas bloquer”, garantit que l’ordre relatif est conservé. Ainsi, même si small.js se charge en premier, il attend et s’exécute toujours après l’exécution delong.js. Mais la spécification exige que les scripts s’exécutent dans l’ordre des documents, donc elle attend que long.js s’exécute.

  ```smart header="L'attribut `defer` est uniquement pour les scripts externes"
  L'attribut `defer` est ignoré si la balise `<script>` n'a pas de `src`.

## async

    Le navigateur ne bloque pas les scripts async (comme defer).
    D’autres scripts n’attendent pas les scripts async, et les scripts async ne les attendent pas.
    DOMContentLoaded et les scripts asynchrones ne s’attendent pas :
        DOMContentLoaded peut se produire à la fois avant un script asynchrone (si un script async termine le chargement une fois la page terminée)
        … ou après un script async (si un script async est court ou était dans le cache HTTP)

En d’autres termes, les scripts async se chargent en arrière-plan et s’exécutent lorsqu’ils sont prêts. Le DOM et les autres scripts ne les attendent pas, et ils n’attendent rien. Un script entièrement indépendant qui s’exécute lorsqu’il est chargé. Aussi simple que cela puisse être, non ?

Donc, si nous avons plusieurs scripts async, ils peuvent s’exécuter dans n’importe quel ordre. Premier chargé – premier exécuté:
```JS
<p>...content before scripts...</p>

<script>
  document.addEventListener('DOMContentLoaded', () => alert("DOM ready!"));
</script>

<script async src="https://javascript.info/article/script-async-defer/long.js"></script>
<script async src="https://javascript.info/article/script-async-defer/small.js"></script>

<p>...content after scripts...</p>
```
    Le contenu de la page apparaît immédiatement: async ne la bloque pas.
    DOMContentLoaded peut arriver soit avant ou après async, aucune garantie ici.
    Les scripts asynchrones n’attendent pas les uns les autres. Un script plus petit small.js passe en second, mais se charge probablement avant long.js, donc s’exécute en premier. C’est ce qu’on appelle une commande “load-first”.

Les scripts asynchrones sont parfaits lorsque nous intégrons un script tiers indépendant dans la page: compteurs, publicités, etc., car ils ne dépendent pas de nos scripts et nos scripts ne doivent pas les attendre:
```js
<!-- Google Analytics est généralement ajouté comme ceci -->
<script async src="https://google-analytics.com/analytics.js"></script>
```

L’attribut async est uniquement pour les scripts externes

Tout comme defer, l’attribut async est ignoré si la balise `<script>` n’a pas de src.

## Les scripts dynamiques

Il existe un autre moyen important d’ajouter un script à la page.

Nous pouvons également ajouter un script dynamiquement en utilisant JavaScript:
```js
let script = document.createElement('script');
script.src = "/article/script-async-defer/long.js";
document.body.append(script); // (*)
```

Le script commence à se charger dès qu’il est ajouté au document (*).

Les scripts dynamiques se comportent comme “asynchrones” par défaut.

C’est-à-dire:

    Ils n’attendent rien, rien ne les attend.
    Le script qui se charge en premier – s’exécute en premier (“load-first”).
```js
let script = document.createElement('script');
script.src = "/article/script-async-defer/long.js";

script.async = false;

document.body.append(script);
```

Par exemple, nous ajoutons ici deux scripts. Sans script.async=false, ils s’exécuteraient dans l’ordre de chargement (le small.js probablement en premier). Mais avec, l’ordre est “comme dans le document”:
```js
function loadScript(src) {
  let script = document.createElement('script');
  script.src = src;
  script.async = false;
  document.body.append(script);
}

// long.js s'exécute en premier à cause de async=false
loadScript("/article/script-async-defer/long.js");
loadScript("/article/script-async-defer/small.js");
```

## Résumé

Async et defer ont un point commun: le téléchargement de tels scripts ne bloque pas le rendu des pages. Ainsi, l’utilisateur peut lire le contenu de la page et se familiariser immédiatement avec la page.

En pratique, defer est utilisé pour les scripts qui ont besoin de tout le DOM et/ou leur ordre d’exécution relatif est important.

Et async est utilisé pour des scripts indépendants, comme des compteurs ou des publicités. Et leur ordre d’exécution relatif n’a pas d’importance.
La page sans scripts devrait être utilisable

Veuillez noter que si vous utilisez defer ou async, l’utilisateur verra alors la page avant le chargement du script.

L’utilisateur peut donc lire la page, mais certains composants graphiques ne sont probablement pas encore prêts.

Il devrait y avoir des indications de “chargement” aux bons endroits et les boutons désactivés devraient s’afficher comme tels, afin que l’utilisateur puisse voir clairement ce qui est prêt et ce qui ne l’est pas.
