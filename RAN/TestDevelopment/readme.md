# Tests

- Qu'est-ce qu'un test unitaire ? : https://youtu.be/HAUDfITi-SI
- Les tests unitaires, tout le monde en parle, personne n'en fait. https://youtu.be/MBLDiY8YynY

L'objectif de ce chapitre est de présenter le rôle des tests dans le processus de création d'un logiciel.

# Pourquoi tester ?
La problématique des tests est souvent considérée comme secondaire et négligée par les développeurs. C'est une erreur : lorsqu'on livre une application et qu'elle est placée en production (offerte à ses utilisateurs), il est essentiel d'avoir un maximum de garanties sur son bon fonctionnement afin d'éviter au maximum de coûteuses mauvaises surprises.

Le test d'une application peut être manuel. Dans ce cas, une personne effectue sur l'application une suite d'opérations prévue à l'avance (navigation, connexion, envoi d'informations...) pour vérifier qu'elle possède bien le comportement attendu. C'est un processus coûteux en temps et sujet aux erreurs (oublis, négligences, etc.).

En complément de ces tests manuels, on a tout intérêt à intégrer à un projet logiciel des tests automatisés qui pourront être lancés aussi souvent que nécessaire. Ceci est d'autant plus vrai pour les méthodologies agiles basées sur un développement itératif et des livraisons fréquentes, ou bien lorsque l'on met en place une intégration continue.

# Comment tester ?
On peut classer les tests logiciels en différentes catégories.

# Tests de validation
Ces tests sont réalisés lors de la [recette](https://fr.wikipedia.org/wiki/Test_d'acceptation) (validation) par un client d'un projet livré par l'un de ses fournisseurs. Souvent écrits par le client lui-même, ils portent sur l'ensemble du logiciel et permettent de vérifier son comportement global en situation.

De par leur spectre large et leur complexité, les tests de validation sont le plus souvent manuels. Les procédures à suivre sont regroupées dans un document associé au projet, fréquemment nommé plan de validation.

# Tests d'intégration
Dans un projet informatique, l'intégration est de fait d'assembler plusieurs composants (ou modules) élémentaires en un composant de plus haut niveau. Un test d'intégration valide les résultats des interactions entre plusieurs composants et permet de vérifier que leur assemblage s'est produit sans défaut. Il peut être manuel ou automatisé.

Un nombre croissant de projets logiciels mettent en place un processus d'intégration continue. Cela consiste à vérifier que chaque modification ne produit pas de régression dans l'application développée. L'intégration continue est nécessairement liée à une batterie de tests qui se déclenchent automatiquement lorsque des modifications sont intégrées au code du projet.

# Tests unitaires
Contrairement aux tests de validation et d'intégration qui testent des pans entiers d'un logiciel, un test unitaire na valide qu'une portion atomique du code source (exemple : une seule classe) et est systématiquement automatisé.

Le test unitaire offre les avantages suivants :
- Il est facile à écrire. Dédié à une partie très réduite du code, le test unitaire ne nécessite le plus souvent qu'un contexte minimal, voire pas de contexte du tout.
- Il offre une granularité de test très fine et permet de valider exhaustivement le comportement de la partie du code testée (cas dégradés, saisie d'informations erronées...).
- Son exécution est rapide, ce qui permet de le lancer très fréquemment (idéalement à chaque modification du code testé).
- Il rassemble les cas d'utilisation possibles d'une portion d'un projet et représente donc une véritable documentation sur la manière de manipuler le code testé.

L'ensemble des tests unitaires d'un projet permet de valider unitairement une grande partie de son code source et de détecter le plus tôt possible d'éventuelles erreurs.

L'image ci-dessous illustre le résultat du lancement de tests unitaires sous Visual Studio.

![](https://2847164876-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LDB4vgNE8GeGbLj6zqs%2F-LDB6opZ8PcgPlJl9qkn%2F-LDB8sUmgubT_SwzhjGk%2Funit-tests-vs2010.png?generation=1527064792457510&alt=media)

Certaines méthodologies de développement logiciel préconisent l'écriture des tests unitaires avant celle du code testé (TDD, Test Driven Development).

# Création de tests doubles
En pratique, très peu de parties d'un projet fonctionnent de manière autonome, ce qui complique l'écriture des tests unitaires. Par exemple, comment tester unitairement une classe qui collabore avec plusieurs autres pour réaliser ses fonctionnalités ?

La solution consiste à créer des éléments qui simulent le comportement des collaborateurs d'une classe donnée, afin de pouvoir tester le comportement de cette classe dans un environnement isolé et maîtrisé. Ces éléments sont appelés des tests doubles.

Selon la complexité du test à écrire, un test double peut être :
- Un dummy, élément basique sans aucun comportement, juste là pour faire compiler le code lors du test.
- Un stub, qui renvoie des données permettant de prévoir les résultats attendus lors du test.
- Un mock, qui permet de vérifier finement le comportement de l'élément testé (ordre d'appel des méthodes, paramètres passés, etc.).

# Outils Navigateur
- [Selenium Tutos] 2- Selenium IDE : https://youtu.be/Rui_s8PSYSI
    - Selenium IDE : https://www.selenium.dev/selenium-ide/
- Mink : https://mink.behat.org/en/latest/index.html

# Outils PHP
- Tutoriel PHP - Les Tests Unitaires : https://youtu.be/jZB49who6rk
- Exercice : Tester son code : https://youtu.be/yt7utxhDyVg
- Tests en programmation : PHPUnit : https://youtu.be/TK4i5Xw7MgA
- Des tests unitaires pour nos règles de conception - Frederic BOUCHERY - Forum PHP 2021 : https://youtu.be/PB3NWOwBCyQ
    - PHPUnit : https://phpunit.de/

# Outils JS
... 


# Le linting, une bonne pratique !
Le linting ("linter" son code) est une pratique qui vise à améliorer la qualité de votre code et de ce fait la reprise et la maintenabilité de celui-ci.

Vous avez sûrement déjà entendu parlé de JSHint ou JSLint sans forcément savoir ce que c'est. Ce sont des linteurs qui aident des développeurs JavaScript à produire du code propre — des linteurs existent dans quasiment tous les langages. Comment ?

# Le principe du Linting

Pour beaucoup d'entre vous, sans vous en rendre compte, vous savez déjà de quoi il s'agit. Si vous avez déjà développé dans un langage compilé/pseudo-compilé comme le C, le Java et autres vous avez sûrement l'habitude à ce que votre IDE vous indique les erreurs dans le code.

Au départ lint était un logiciel qui faisait une analyse statique de code C pour en détecter les erreurs récurrentes, les erreurs d'indentation et les syntaxes spécifiques à un OS rendant le code non-portable. Il a ensuite été intégré dans les compilateurs C.

Le concept a depuis été repris et amélioré au fil des années et des langages.

Dans un IDE vous avez donc un linteur auquel on ajoute un débugeur, un profileur et tout un tas d'autres outils pour aider le développeur dans sa quête du code parfait.

# Linting vs Debugging

    Les erreurs dans les IDEs c'est le débugueur ou le linteur ? 

Les deux. Le linteur va analyser le code de façon statique et le debugueur — comme beaucoup d'autres outils — le fait de façon dynamique. Cela veut dire que le debugueur va analyser le code lors de son exécution alors que le linteur va s'attarder sur les fichiers sources du projet le reste du temps. C'est à dire, lorsque le code n'est pas exécuté.

Par exemple, le linteur détectera :
- les variables qui n'existent pas
- les variables inutilisées
- les doubles déclarations de variables, de fonctions, etc...
- la mauvaise organisation du code
- le non respect des bonnes pratiques d'écriture de code
- les erreurs de syntaxe

Le debugueur détectera quand à lui :
- les mauvais accès aux adresses mémoires
- le nom respect des types de variable objet
- le mauvais état d'une variable à un instant donné
- les fuites de mémoire
- les dépassements de pile

# Le linting pour le web

Le linting pour les langages du web (PHP, JS, etc..) existe depuis de nombreuses années mais reste très peu connu et utilisé.

Dans le monde du développement web, les développeurs sont habitués à avoir plutôt un éditeur de texte qu'un IDE complet. Généralement, l'éditeur ne détectera aucune erreur pendant l'écriture du code s'il ne possède pas de fonctionnalité de linting.

Prenons par exemple Sublime Text, Atom et bien d'autres qui sont d'excellents outils de développement mais qui ne possèdent pas de fonctionnalité permettant la vérification du code.

# Pourquoi est-ce une bonne pratique ?

Personnellement je ne compte plus le nombre de fois où j'ai récupéré des projets JavaScript ou PHP qui fonctionnaient très bien — là n'est pas la question — mais qui étaient quasi impossible à maintenir ou à faire évoluer.

    " Un développeur peut créer une application qui fonctionne en la codant comme un gros porc. "

Des fois il revient moins cher à une entreprise de faire réécrire complètement une telle application plutôt que de la faire évoluer ; et ça c'est fort dommage...

Voilà tout l'intérêt du linteur, il va tenter de forcer le développeur à corriger le maximum d'erreurs potentielles avant la compilation et/ou l'exécution ainsi que l'inciter à écrire du meilleur code, du beau code.

A l'air du travail collaboratif et du très haut débit on ne veut plus réécrire sans cesse les mêmes applications. On veut qu'un code produit fonctionne, certes, mais il faut qu'il soit propre, lisible, maintenable, reprenable, et améliorable. On veut pouvoir capitaliser sur le savoir du développeur et sur le code produit.

Et des fois il ne suffit pas de grand chose :
- en JS écrire des instructions sans les terminer par des point-virgules peut fonctionner mais une pratique communément adoptée par les équipes de développement est d'en mettre pour éviter les erreurs d'exécution sur différents moteurs
- en HTML rien ne nous empêche d'utiliser un paragraphe <p></p> pour créer un menu en ligne mais la bonne pratique est d'utiliser les listes ; ce qui améliore l'accessibilité du site

Ce sont des choses qui peuvent être vérifié par un linteur et on peut aller très loin comme ça. Certains linteurs vérifient que vous déclariez vos fonctions de cette façon :

```js
function nomDeLaFonction(param) {
```

plutôt que de cette façon :

```js
function nomDeLaFonction (param){
```

Maintenant que vous êtes convaincu — vous n'avez pas le choix — voyons comment utiliser un linteur.

# Comment linter son code ?

Un linteur se présente sous la forme d'un petit programme indépendant auquel on peut demander de lire et de vérifier les sources de notre projet.

# Linter JS
- Comprendre ESLint, installation et configuration (2020) : https://www.youtube.com/watch?v=3CHRRSSLeJg)
    - ESLinter : https://eslint.org/
- JSLint : https://www.jslint.com/

# Linter PHP

- Tutoriel PHP/PHPStan : PHPStan, un analyseur statique pour PHP : https://youtu.be/NkbuFsgHB_c
    - PHPStan : https://phpstan.org/
- PHPLint : https://github.com/overtrue/phplint
- PHP-CS-Fixer : https://github.com/FriendsOfPHP/PHP-CS-Fixer
