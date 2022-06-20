# Utiliser l’opérateur ternaire pour écrire des conditions JavaScript condensées

Dans cette nouvelle leçon, nous allons présenter et étudier le fonctionnement d’un opérateur de comparaison que j’ai jusqu’à présent laissé volontairement de côté : l’opérateur ternaire ? :.

Cet opérateur va nous permettre d’écrire des conditions plus condensées et donc d’alléger nos scripts et de gagner du temps en développement.

## L’opérateur ternaire et les structures conditionnelles ternaires

Les structures conditionnelles ternaires (souvent simplement abrégées “ternaires”) correspondent à une autre façon d’écrire nos conditions en utilisant une syntaxe basée sur l’opérateur ternaire ? : qui est un opérateur de comparaison.

Les ternaires vont utiliser une syntaxe très condensée et nous allons ainsi pouvoir écrire toute une condition sur une ligne et accélérer la vitesse d’exécution de notre code.

Avant de vous montrer les écritures ternaires, je dois vous prévenir : beaucoup de développeurs n’aiment pas les ternaires car elles ont la réputation d’être très peu lisibles et très peu compréhensibles.

Ce reproche est à moitié justifié : d’un côté, on peut vite ne pas comprendre une ternaire si on est un développeur moyen ou si le code qui nous est présenté n’est pas ou mal commenté. De l’autre côté, si vous indentez et commentez bien votre code, vous ne devriez pas avoir de problème à comprendre une structure ternaire.

## Exemples d’utilisation des structures ternaires

Les structures ternaires vont se présenter sous la forme suivante : test ? code à exécuter si true : code à exécuter si false.

Illustrons immédiatement cela :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-structure-condition-ternaire-support-html.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-structure-condition-ternaire-exemple.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-structure-condition-ternaire-resultat.png)

Comme vous pouvez le voir, cette écriture tranche avec la syntaxe des conditions « classiques » et est très compacte.

On commence ici par déclarer et par initialiser deux variables let x et let y qui vont être utilisées dans nos ternaires.

Les lignes document.getElementById('p1').innerHTML = et document.getElementById('p2').innerHTML = vont nous permettre d’afficher le résultat de nos ternaires directement dans les deux paragraphes de notre fichier HTML portant les id='p1' et id='p2'. Une nouvelle fois, nous n’allons pas nous préoccuper de ces lignes ici qui ne sont pas celles qui nous intéressent.

Notre première structure ternaire est la suivante : x >= 10 ? 'x supérieur à 10' : 'x stric. inférieur à 10'. Littéralement, cette ligne demande au JavaScript « compare la valeur de let x au chiffre 10 en utilisant l’opérateur supérieur ou égal. Dans le cas où le test est validé, renvoie le texte situé après le signe ?. Dans le cas contraire, renvoie le texte situé après le signe : ».

Notre variable let x stocke ici le nombre 15 qui est bien supérieur à 10. Le test va donc être validé et le message « x supérieur à 10 » va être affiché au sein du paragraphe portant l’id='p1'.

Dans notre deuxième ternaire, on réutilise le même test mais on teste cette fois-ci la valeur de la variable let y. Cette variable contient la valeur -20 qui n’est pas supérieure ou égale à 10. C’est donc le message situé après les deux points qui sera affiché dans notre paragraphe portant l’id='p2' à savoir « y stric. inférieur à 10 ».

## Ternaires vs conditions classiques

Comme je l’ai précisé plus haut, certaines personnes déconseillent l’utilisation des ternaires car ils les jugent trop peu compréhensibles.

Personnellement, je n’ai aucun problème avec les ternaires à partir du moment où le code est bien commenté et où la ternaire est explicite.

Je vous laisse donc le choix de les utiliser ou pas, mais dans tous les cas faites l’effort de mémoriser la forme des ternaires au cas où vous en rencontriez dans le futur dans un code.

Notez tout de même que vous pourrez gagner beaucoup de temps si vous maitrisez les ternaires.

En effet, si nous devions réécrire notre première ternaire ci-dessus de façon plus classique, c’est-à-dire avec un if...else, voilà ce que cela donnerait.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-ternaire-vs-condition-if-else.png)
![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/javascript-ternaire-vs-condition-if-else-resultat.png)

Comme vous pouvez le voir, ces deux codes produisent le même résultat. De manière générale, il y a souvent en programmation de nombreuses façons de parvenir à un même résultat. Bien évidemment, on essaiera toujours de trouver la façon la plus simple, lisible et maintenable pour arriver au résultat voulu.