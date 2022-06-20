# Différence entre addEventListener et onclick en JavaScript

Le addEventListener() et onclick à la fois écouter un événement. Les deux peuvent exécuter une fonction de rappel lorsqu’un bouton est cliqué. Cependant, ils ne sont pas les mêmes. Dans cet article, nous allons comprendre les différences entre eux.

addEventListener() : Laméthode addEventListener() attache un gestionnaire d’événement à l’élément spécifié.

## Syntaxe:
```js
element.addEventListener(event, listener, useCapture);
```

## Paramètres:

- événement : l’ événement peut être n’importe quel événement JavaScript valide. Les événements sont utilisés sans le préfixe « on », comme utiliser « click » au lieu de « onclick » ou « mousedown » au lieu de « onmousedown ».
- listener(handler function) : il peut s’agir d’une fonction JavaScript qui répond à l’événement qui se produit.
- useCapture : (paramètre facultatif) Une valeur booléenne qui spécifie si l’événement doit être exécuté dans la capture ou dans la phase de bullage.

Remarque : La méthode addEventListener() peut avoir plusieurs gestionnaires d’événements appliqués au même élément. Il n’écrase pas les autres gestionnaires d’événements. 

Exemple : Vous trouverez ci-dessous un code JavaScript pour montrer que plusieurs événements sont associés à un élément et qu’il n’y a pas d’écrasement.

```html
<!DOCTYPE html>
<html>
  
<body>
    <button id="btn">Click here</button>
    <h1 id="text1"></h1>
    <h1 id="text2"></h1>
  
    <script>
        let btn_element = document.getElementById("btn");
  
        btn_element.addEventListener("click", () => {
            document.getElementById("text1")
                .innerHTML = "Task 1 is performed";
        })
  
        btn_element.addEventListener("click", () => {
            document.getElementById("text2")
                .innerHTML = "Task 2 is performed";
        });
    </script>
</body>
  
</html>
```

## Sortir:
![](https://media.geeksforgeeks.org/wp-content/uploads/20210617180910/addeventListener.gif)

---

onclick : L’attribut d’événement onclick fonctionne lorsque l’utilisateur clique sur le bouton. Lorsque la souris est cliqué sur l’élément, le script s’exécute.

## Syntaxe:

En HTML :
```html
<element onclick="myScript">
```

En JavaScript :
```js
object.onclick = function(){myScript};
```

Le onclick est juste une propriété. Comme toutes les propriétés d’objet, si nous écrivons plusieurs propriétés, elles seront écrasées. 

Exemple : ci-dessous se trouve un code JavaScript pour montrer que plusieurs événements ne peuvent pas être associés à un élément car il y a écrasement

```html
<!DOCTYPE html>
<html>
  
<body>
    <button id="btn">Click here</button>
    <h1 id="text1"></h1>
    <h1 id="text2"></h1>
  
    <script>
        let btn_element = document.getElementById("btn");
  
        btn_element.onclick = () => {
            document.getElementById("text1")
                .innerHTML = "Task 1 is performed";
        };
  
        btn_element.onclick = () => {
            document.getElementById("text2")
                .innerHTML = "Task 2 is performed";
        };
    </script>
</body>
  
</html>
```

## Sortir:
![](https://media.geeksforgeeks.org/wp-content/uploads/20210617181831/onclick.gif)

Différence entre addEventListener et onclick :
| addEventListener | onclick |
|---|---|
| addEventListener peut ajouter plusieurs événements à un élément particulier. | onclick ne peut ajouter qu’un seul événement à un élément. Il s’agit essentiellement d’une propriété, elle est donc écrasée. |
| addEventListener peut prendre un troisième argument qui peut contrôler la propagation de l’événement. | La propagation des événements ne peut pas être contrôlée par onclick. |
| addEventListener ne peut être ajouté que dans des éléments `<script>` ou dans un fichier JavaScript externe. | onclick peut également être ajouté en tant qu’attribut HTML. |
| addEventListener ne fonctionne pas dans les anciennes versions d’Internet Explorer, qui utilise plutôt attachEvent. | onclick fonctionne dans tous les navigateurs. |
