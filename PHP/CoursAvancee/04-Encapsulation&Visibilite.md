# Encapsulation et visibilité des propriétés et méthodes PHP
Nous allons présenter le principe d’encapsulation et comprendre ses enjeux et intérêt et allons voir comment implémenter ce principe en pratique via les niveaux de visibilité des propriétés, méthodes et des constantes de classe.

Nous étudierons plus en détail les constantes dans une prochaine leçon, je n’en parlerai donc pas véritablement ici. 

# Le principe d’encapsulation

L’encapsulation désigne le principe de regroupement des données et du code qui les utilise au sein d’une même unité. On va très souvent utiliser le principe d’encapsulation afin de protéger certaines données des interférences extérieures en forçant l’utilisateur à utiliser les méthodes définies pour manipuler les données.

Dans le contexte de la programmation orientée objet en PHP, l’encapsulation correspond au groupement des données (propriétés, etc.) et des données permettant de les manipuler au sein d’une classe.

L’encapsulation va ici être très intéressante pour empêcher que certaines propriétés ne soient manipulées depuis l’extérieur de la classe. Pour définir qui va pouvoir accéder aux différentes propriétés, méthodes et constantes de nos classes, nous allons utiliser des limiteurs d’accès ou des niveaux de visibilité qui vont être représentés par les mots clefs public, private et protected.

Une bonne implémentation du principe d’encapsulation va nous permettre de créer des codes comportant de nombreux avantages. Parmi ceux-ci, le plus important est que l’encapsulation va nous permettre de garantir l’intégrité de la structure d’une classe en forçant l’utilisateur à passer par un chemin prédéfini pour modifier une donnée.

Le principe d’encapsulation est l’un des piliers de la programmation orientée objet et l’un des concepts fondamentaux, avec l’héritage, le l’orienté objet en PHP.

Le principe d’encapsulation et la définition des niveaux de visibilité devra être au centre des préoccupations notamment lors de la création d’une interface modulable comme par exemple la création d’un site auquel d’autres développeurs vont pouvoir ajouter des fonctionnalités comme WordPress ou PrestaShop (avec les modules) ou lors de la création d’un module pour une interface modulable.

L’immense majorité de ces structures sont construits en orienté objet car c’est la façon de coder qui présente la plus grande modularité et qui permet la maintenance la plus facile car on va éclater notre code selon différentes classes. Il faudra néanmoins bien réfléchir à qui peut avoir accès à tel ou tel élément de telle classe afin de garantir l’intégrité de la structure et éviter des conflits entre des éléments de classes (propriétés, méthodes, etc.).

# Les niveaux de visibilité des propriétés, méthodes et constantes en POO PHP

On va pouvoir définir trois niveaux de visibilité ou d’accessibilité différents pour nos propriétés, méthodes et constantes (depuis PHP 7.1.0) grâce aux mots clefs public, private et protected.

Les propriétés, méthodes ou constantes définies avec le mot clef public vont être accessibles partout, c’est-à-dire depuis l’intérieur ou l’extérieur de la classe.

Les propriétés, méthodes ou constantes définies avec le mot clef private ne vont être accessibles que depuis l’intérieur de la classe qui les a définies.

Les propriétés, méthodes ou constantes définies avec le mot clef protected ne vont être accessibles que depuis l’intérieur de la classe qui les a définies ainsi que depuis les classes qui en héritent ou la classe parente. Nous reparlerons du concept d’héritage dans la prochaine leçon.

Lors de la définition de propriétés dans une classe, il faudra obligatoirement définir un niveau de visibilité pour chaque propriété. Dans le cas contraire, une erreur sera renvoyée.

Pour les méthodes et constantes, en revanche, nous ne sommes pas obligés de définir un niveau de visibilité même si je vous recommande fortement de la faire à chaque fois. Les méthodes et constantes pour lesquelles nous n’avons défini aucun niveau de visibilité de manière explicite seront définies automatiquement comme publiques.

Ici, lorsqu’on parle « d’accès », on se réfère à l’endroit où les propriétés et méthodes sont utilisées. Reprenons l’exemple de notre classe utilisateur pour bien comprendre :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-visibilite-methode-propriete-encapsulation.png)

Notre classe possède deux propriétés définies comme private et trois méthodes définies comme public. « L’intérieur » de la classe correspond au code ci-dessus.

Ici, on s’aperçoit par exemple que notre constructeur manipule nos propriétés $user_name et $user_pass. Il en a le droit puisque le constructeur est également défini dans la classe, tout comme la méthode getNom().

Nos méthodes sont ici définies comme publiques, ce qui signifie qu’on va pouvoir les exécuter depuis l’extérieur de la classe. Lorsqu’on crée un nouvel objet dans notre script principal à partir de notre classe, par exemple, on appelle (implicitement) le constructeur depuis l’extérieur de la classe.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-acces-visibilite-methode-propriete-encapsulation.png)

On a le droit de la faire puisque notre constructeur est défini comme public. Ensuite, notre constructeur va modifier la valeur de nos propriétés depuis l’intérieur de la classe et c’est cela qu’il faut bien comprendre : on peut ici modifier la valeur de nos propriétés indirectement car c’est bien notre constructeur défini dans la classe qui les modifie.

La même chose se passe avec la méthode getNom() qui affiche la valeur de la propriété $user_name. Cette méthode est définie comme publique, ce qui signifie qu’on peut l’appeler depuis l’extérieur de la classe. Ensuite, notre méthode va récupérer la valeur de $user_name depuis l’intérieur de la classe puisque c’est là qu’elle a été définie.

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/php-objet-acces-visibilite-methode-propriete-encapsulation-resultat.png)

L’idée à retenir est qu’on ne peut pas accéder directement à nos propriétés définies comme privées depuis notre script principal c’est-à-dire depuis l’extérieur de la classe. Il faut qu’on passe par nos fonctions publiques qui vont elles pouvoir les manipuler depuis l’intérieur de la classe.

Si vous essayez par exemple d’afficher directement le contenu de la propriété $user_name en écrivant echo $pierre->user_name dans notre script principal, par exemple, l’accès va être refusé et une erreur va être renvoyée. En revanche, si on définit notre propriété comme publique, ce code fonctionnera normalement.

# Comment bien choisir le niveau de visibilité des différents éléments d’une classe

Vous l’aurez compris, la vraie difficulté ici va être de déterminer le « bon » niveau de visibilité des différents éléments de notre classe.

Cette problématique est relativement complexe et d’autant plus pour un débutant car il n’y a pas de directive absolue. De manière générale, on essaiera toujours de protéger un maximum notre code de l’extérieur et donc de définir le niveau d’accessibilité minimum possible.

Ensuite, il va falloir s’interroger sur le niveau de sensibilité de chaque élément et sur les impacts que peuvent avoir chaque niveau d’accès à un élément sur le reste d’une classe tout en identifiant les différents autres éléments qui vont avoir besoin d’accéder à cet élément pour fonctionner.

Ici, il n’y a vraiment pas de recette magique : il faut avoir une bonne expérience du PHP et réfléchir un maximum avant d’écrire son code pour construire le code le plus cohérent et le plus sécurisé possible. Encore une fois, cela ne s’acquière qu’avec la pratique.

Pour le moment, vous pouvez retenir le principe suivant qui fonctionnera dans la majorité des cas (mais qui n’est pas un principe absolu, attention) : on définira généralement nos méthodes avec le mot clef public et nos propriétés avec les mots clefs protected ou private. 