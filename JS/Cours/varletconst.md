![image](https://code-garage.fr/content/images/size/w2000/2022/03/willian-justen-de-vasconcellos-8sHZE1CXG4w-unsplash.jpg)

Javascript a été créé à l'origine avec un seul mot-clé pour définir une variable, ce mot réservé est : var.

Mais depuis la version 6 (ECMAScript 2015) de la spécification du langage, deux nouveaux mot-clés sont apparus : let et const.

Si l'on devait résumer la définition de ces deux nouvelles manières de déclarer des variables, on pourrait dire que :

    let sert à définir une variable locale
    const sert à déclarer une référence constante


Mais voyons exactement en quoi le fonctionnement des variables var, let et const sont différents dans la pratique :

# Stocké en global ?

    var : oui ✔️
    let : non ❌
    const : non ❌

Lorsque var est utilisé pour déclarer une variable en dehors d'une fonction, alors cette variable sera forcément référencée dans l'objet global du script.

> Dans un navigateur, cette variable s'appelle "window" et dans un environnement NodeJS elle s'appelle "global".

# Se limite à la portée d'une fonction ?

    var : oui ✔️
    let : oui ✔️
    const : oui ✔️

La portée (ou scope) d'une fonction est la seule à mettre toutes les variables sur un même pied d'égalité et déclarer une variable à l'intérieur d'une fonction n'aura logiquement pas d'incidence sur le reste des données du code.

# Se limite à la portée d'un block ?

    var : non ❌
    let : oui ✔️
    const : oui ✔️

Pour ceux qui se demanderaient ce qu'est un bloc, c'est simplement l'ensemble des instructions comprises entre deux accolades "{...}" sauf pour lorsque ces accolades délimitent une fonction ou un objet JSON.

Un bloc d'instruction se trouve souvent après un if, else, for, while, etc. Donc souvenez-vous qu'une variable déclarée avec le mot clé "var" dans un for sera automatiquement globale.

> Sauf si le for en question est contenu dans une fonction, évidemment.

# Peut être réassigné ?

    var : oui ✔️
    let : oui ✔️
    const : non ❌

Réassigner signifie que l'on va soit modifier la valeur de la variable lorsque l'on joue avec les types primitifs, soit que l'on va modifier la référence de la variable lorsque l'on utilise un type complexe.

> À noter que si const est utilisé pour référencer un objet, le contenu de cet objet peut quand même être modifié.

# Peut être redéclaré ?

    var : oui ✔️
    let : non ❌
    const : non ❌

Redéclarer une variable (sauf lorsque sa portée le permet) est impossible sauf si c'est avec var, mais ce n'est pas une bonne pratique et il est conseillé d'éviter de le faire.

# Est affecté par le hoisting ?

    var : oui ✔️
    let : non ❌
    const : non ❌

Le hoisting est une notion plus complexe qui intervient au moment de l'interprétation du code JS, si vous n'êtes pas familier avec ce concept je vous conseille de faire des [recherches](https://code-garage.fr/blog/qu-est-ce-que-le-hoisting-en-javascript/)

# En résumé

Lorsque vous déclarez une nouvelle variable, pensez à privilégier d'abord const, puis let et enfin var en dernier recours, mais vous ne devriez plus en avoir besoin.

Attention néanmoins, let et const ne sont supportés que par les navigateurs qui sont compatibles avec l'ES6, cela équivaut actuellement à 96.25% des navigateurs, incluant IE11.