# Code propre

Le but principal du refactoring est de lutter contre la dette technique. Il transforme un désordre en code propre et conception simple.

Nice! Mais qu’est-ce que le code propre, de toute façon? Voici quelques-unes de ses caractéristiques:

## Un code propre est évident pour les autres programmeurs.

Et je ne parle pas d’algorithmes super sophistiqués. Mauvais nommage des variables, classes et méthodes gonflées, nombres magiques -vous les nommez- tout cela rend le code bâclé et difficile à saisir.

## Le code propre ne contient pas de duplication.

Chaque fois que vous devez faire un changement dans un code en double, vous devez vous rappeler de faire le même changement à chaque instance. Cela augmente la charge cognitive et ralentit la progression.

## Le code clean contient un nombre minimal de classes et d’autres pièces mobiles.

Moins de code, c’est moins de choses à garder dans votre tête. Moins de code, c’est moins d’entretien. Moins de code, c’est moins de bogues. Le code, c’est la responsabilité, soyez bref et simple.

## Le code propre passe tous les tests.

Vous savez que votre code est sale quand seulement 95% de vos tests réussis. Vous savez que vous êtes baisé quand vous testez la couverture est de 0%.

## Le code propre est plus facile et moins cher à entretenir!

# Dette technique

Chacun fait de son mieux pour écrire un excellent code à partir de zéro. Il n’y a probablement pas un programmeur qui écrit intentionnellement du code impur au détriment du projet. Mais à quel point le code propre devient-il impur ?

La métaphore de la « dette technique » en ce qui concerne le code impur a été suggérée à l’origine par Ward Cunningham.

Si vous obtenez un prêt d’une banque, cela vous permet de faire des achats plus rapidement. Vous payez un supplément pour accélérer le processus - vous ne payez pas seulement le capital, mais aussi les intérêts supplémentaires sur le prêt. Inutile de dire que vous pouvez même accumuler tant d’intérêts que le montant de l’intérêt dépasse votre revenu total, rendant le remboursement complet impossible.

La même chose peut arriver avec le code. Vous pouvez accélérer temporairement sans écrire des tests pour de nouvelles fonctionnalités, mais cela ralentira progressivement votre progression chaque jour jusqu’à ce que vous finissiez par rembourser la dette en écrivant des tests.

# Causes de la dette technique
## Pression des entreprises

Parfois, les circonstances d’affaires peuvent vous obliger à déployer des fonctionnalités avant qu’elles soient complètement finis. Dans ce cas, les patches et les gaffe apparaîtront dans le code pour masquer les parties inachevées du projet.

## Manque de compréhension des conséquences de la dette technique

Parfois, votre employeur pourrait ne pas comprendre que la dette technique comporte des « intérêts » dans la mesure où elle ralentit le rythme du développement à mesure que la dette s’accumule. Cela peut rendre trop difficile de consacrer le temps de l’équipe au remaniement parce que la direction ne voit pas la valeur de celui-ci.

## Ne pas lutter contre la stricte cohérence des composants

C’est alors que le projet ressemble à un monolithe plutôt qu’au produit de modules individuels. Dans ce cas, tout changement apporté à une partie du projet aura une incidence sur d’autres. Le développement de l’équipe est rendu plus difficile parce qu’il est difficile d’isoler le travail des membres individuels.

# Manque de tests

Le manque de rétroaction immédiate encourage des solutions de contournement rapides, mais risquées. Dans le pire des cas, ces changements sont mis en œuvre et déployés directement dans la production sans aucun test préalable. Les conséquences peuvent être catastrophiques. Par exemple, un hotfix d’apparence innocente pourrait envoyer un courriel de test bizarre à des milliers de clients ou pire encore, rincer ou corrompre une base de données entière.

## Manque de documentation

Cela ralentit l’introduction de nouvelles personnes au projet et peut freiner le développement si les personnes clés quittent le projet.

## Manque d’interaction entre les membres de l’équipe

Si la base de connaissances n’est pas distribuée dans toute l’entreprise, les gens finiront par travailler avec une compréhension dépassée des processus et de l’information sur le projet. Cette situation peut être exacerbée lorsque les jeunes développeurs sont mal formés par leurs mentors.

## Développement simultané à long terme dans plusieurs branches

Cela peut conduire à l’accumulation de la dette technique, qui est ensuite augmentée lorsque les changements sont fusionnés. Plus les changements apportés isolément sont nombreux, plus la dette technique totale est élevée.

## Refactoring retardé

Les exigences du projet changent constamment et, à un moment donné, il peut devenir évident que certaines parties du code sont désuètes, sont devenues lourdes et doivent être repensées pour répondre aux nouvelles exigences.

En revanche, les programmeurs du projet écrivent chaque jour un nouveau code qui fonctionne avec les pièces obsolètes. Par conséquent, plus le refactoring est retardé, plus le code dépendant devra être retravaillé à l’avenir.

## Manque de surveillance de la conformité

Cela se produit lorsque tout le monde qui travaille sur le projet écrit le code comme bon lui semble (c.-à-d. de la même façon qu’il a écrit le dernier projet).

## Incompétence

C’est quand le développeur ne sait pas comment écrire du code décent.

# Quand remettre à neuf
##  Règle des trois
1. Quand tu fais quelque chose pour la première fois, fais-le.
2. Lorsque vous faites quelque chose de semblable pour la deuxième fois, grincez des dents pour avoir à répéter, mais faites la même chose de toute façon.
3. Quand vous faites quelque chose pour la troisième fois, commencez à refactoring.

## Lors de l’ajout d’une fonction
Refactoring vous aide à comprendre le code des autres. Si vous devez traiter avec le code sale de quelqu’un d’autre, essayez de le refactorier d’abord. Le code propre est beaucoup plus facile à saisir. Vous l’améliorerez non seulement pour vous-même, mais aussi pour ceux qui l’utilisent après vous.

Refactoring facilite l’ajout de nouvelles fonctionnalités. Il est beaucoup plus facile de faire des changements dans le code propre.

## Pour corriger un bogue
Les bogues du code se comportent exactement comme ceux de la vraie vie : ils vivent dans les endroits les plus sombres et les plus sales du code. Nettoyez votre code et les erreurs se découvriront pratiquement.

Les managers apprécient le refactoring proactif car il élimine le besoin de tâches spéciales de refactoring plus tard. Des patrons heureux font des programmeurs heureux !

## Pendant un examen du code
La révision du code peut être la dernière chance de faire le ménage avant qu’il ne devienne accessible au public.

Il est préférable d’effectuer de telles critiques en couple avec un auteur. De cette façon, vous pourriez résoudre des problèmes simples rapidement et de jauger le temps pour fixer les plus difficiles.

# Comment remanier

Le Refactoring devrait être fait comme une série de petits changements, dont chacun rend le code existant légèrement mieux tout en laissant le programme en état de fonctionnement.

# Liste de contrôle du refactoring bien fait
## Le code devrait devenir plus propre.

Si le code reste aussi impur après le refactoring... eh bien, je suis désolé, mais vous venez de perdre une heure de votre vie. Essaie de comprendre pourquoi c’est arrivé.

Cela arrive souvent lorsque vous vous éloignez du refactoring avec de petits changements et que vous mélangez tout un tas de refactorings en un seul grand changement. Il est donc très facile de perdre la tête, surtout si vous avez une limite de temps.

Mais cela peut aussi arriver quand on travaille avec un code extrêmement bâclé. Quoi qu’on améliore, le code dans son ensemble reste un désastre.

Dans ce cas, il vaut la peine de penser à réécrire complètement des parties du code. Mais avant cela, vous devriez avoir des tests écrits et mettre de côté une bonne partie du temps. Sinon, vous vous retrouverez avec le genre de résultats dont nous avons parlé au premier paragraphe.

## Aucune nouvelle fonctionnalité ne doit être créée pendant le refactoring.

Ne mélangez pas refactoring et développement direct de nouvelles fonctionnalités. Essayez de séparer ces processus au moins dans les limites des commits individuels.

## Tous les tests existants doivent réussir après le refactoring.

Il y a deux cas où les tests peuvent se dégrader après un refactoring :
- Vous avez fait une erreur lors du refactoring. Celle-ci est une évidence : allez-y et corrigez l’erreur.
- Vos tests étaient trop bas. Par exemple, vous mettiez à l’essai des méthodes de classes privées.
- Dans ce cas, les tests sont à blâmer. Vous pouvez soit refacturer les tests eux-mêmes ou écrire un tout nouvel ensemble de tests de niveau supérieur. Une excellente façon d’éviter ce genre de situation est d’écrire des tests de style BDD.

# Quelles techniques existent ?

Il existe de très nombreuses techniques concrètes de refactoring. Les travaux foisonnants de Martin Fowler et Kent Beck en proposent un aperçu complet : « Refactoring: Improving the Design of Existing Code ». En voici un court résumé :

# Développement rouge-vert

Le développement rouge-vert est une méthode pilotée par les tests du développement logiciel agile. Elle s’applique lorsque l’on souhaite intégrer une nouvelle fonction à un code existant. Le rouge symbolise le premier cycle de tests, avant l’implémentation de la nouvelle fonction dans le code. Le vert symbolise la section de code la plus simple possible et nécessaire à cette fonction pour réussir le test. Il en résulte une extension avec des cycles de tests en continu pour résoudre les lignes de code erronées et augmenter la fonctionnalité. Le développement rouge-vert est un pilier du refactoring en continu dans le cadre d’un développement logiciel également en continu.

# Branching-by-Abstraction

Cette méthode de réusinage du code décrit une modification d’un système par étapes et l’adaptation d’anciennes lignes de code implémentées aux nouvelles sections de code. La technique Branching-by-Abstraction est généralement utilisée lors de grandes modifications portant sur la hiérarchie des classes, l’hérédité ou l’extraction. L’implémentation d’une abstraction qui reste liée à une ancienne implémentation permet de relier d’autres méthodes et classes à l’abstraction et de remplacer la fonctionnalité de l’ancienne section de code par cette même abstraction.

On arrive souvent à ce résultat en utilisant les méthodes pull-up ou push-down. Elles créent un lien entre une nouvelle fonction, de meilleure qualité, et l’abstraction, tout en orientant les liens vers celle-ci. Ainsi, on peut rediriger une classe inférieure vers une classe supérieure (pull-up), ou bien les composants d’une classe supérieure vers une classe inférieure (push-down).

On peut enfin supprimer les anciennes fonctions sans prendre de risque pour la fonctionnalité de l’ensemble. Grâce à ces petites modifications, le fonctionnement du système reste inchangé, tandis que l’on peut remplacer les lignes de code sales par des lignes de code propres, section par section.

# Compiler des méthodes

Le refactoring doit rendre aussi lisibles que possible les méthodes du code. Dans le meilleur des cas, dès la lecture, même un programmeur extérieur doit être capable de comprendre la logique interne d’une méthode. Pour compiler efficacement les méthodes, le réusinage du code propose différentes techniques. L’objectif de chaque modification est de distinguer chaque méthode, de supprimer les doublons et de diviser les méthodes les plus longues en éléments distincts pour permettre leur modification ultérieure.

Voici des exemples de techniques adéquates :
- Extraire les méthodes
- Ajouter inline à la méthode
- Supprimer les variables temporaires
- Remplacer les variables temporaires par la méthode des requêtes
- Insérer des variables de description
- Dissocier les variables temporaires
- Supprimer les attributs des variables de paramètre
- Remplacer une méthode par une méthode-objet
- Remplacer l’algorithme

# Décaler les propriétés entre différentes classes

Pour améliorer un code, on doit parfois décaler les attributs ou méthodes d’une classe à l’autre. Voici les techniques adaptées :
- Décaler une méthode
- Décaler un attribut
- Extraire une classe
- Ajouter inline à la classe
- Cacher les délégués
- Supprimer une classe intermédiaire
- Insérer une méthode externe
- Insérer une extension locale

# Organisation des données

Cette méthode a pour objectif de répartir les données au sein des classes et de les maintenir aussi courtes et claires que possible. Les liens inutiles entre les classes, qui entravent le bon fonctionnement du logiciel dès la moindre modification, doivent être supprimés et répartis entre les classes adéquates.

Exemples de techniques adaptées :
- Encapsuler les accès propres à l’attribut
- Remplacer un attribut propre par une référence à un objet
- Remplacer une valeur par une référence
- Remplacer une référence par une valeur
- Associer les données observables
- Encapsuler les attributs
- Remplacer un ensemble de données par une classe de données

# Simplifier les expressions conditionnelles

Au cours du refactoring,il faut, autant que possible, simplifier les expressions conditionnelles. Exemple des techniques adaptées :
- Scinder les relations
- Fusionner les expressions conditionnelles
- Fusionner les instructions répétées dans les expressions conditionnelles
- Supprimer les boutons de contrôle
- Remplacer les conditions imbriquées par des gardiens
- Remplacer les distinctions par des polymorphismes
- Insérer des objets nuls

# Simplifier l’invocation des méthodes

L’invocation des méthodes gagne en rapidité et en simplicité grâce aux techniques suivantes, entre autres :
- Renommer les méthodes
- Ajouter des paramètres
- Supprimer des paramètres
- Remplacer des paramètres par des méthodes explicites
- Remplacer le code erroné par des exceptions

# Catalog of Refactoring : https://refactoring.guru/refactoring/catalog

# Conclusion

J’espère que j’ai su le transmettre au travers de ce cours mais pour moi, le refactoring est une pratique très importante qui doit être comprise et maîtrisée par les développeurs et prise en compte et planifiée dans les projets. Cela passe bien sûr par comment le faire mais aussi (et surtout ?) par comment l’éviter, en ayant connaissance des bonnes pratiques de développement (clean code, design patterns…) ainsi que des choses à éviter (code smells et anti-patterns).