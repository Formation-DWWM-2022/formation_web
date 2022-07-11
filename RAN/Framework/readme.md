# Qu’est-ce qu’un framework  ?

[Dhaki : Les frameworks](https://youtu.be/by4x7v1uvAs)

En commençant la programmation, on découvre HTML, CSS, PHP, JavaScript… Mais rapidement, on entend aussi parler de Symfony, Spring, Laravel, Angular... Ce ne sont pas des langages de programmation, mais des frameworks.

Les frameworks fournissent des bibliothèques de code pour les fonctions les plus courantes, ce qui réduit la quantité de code original à écrire.

Littéralement, un framework signifie “cadre de travail”. Véritable boîte à outils des temps modernes, ce kit de composants logiciels structurels permet aux développeurs d’être plus efficaces dans la conception d'applications web, entre autres, en offrant une architecture et des composants logiciels prêts à l’emploi et réutilisables.

On pourrait comparer un framework à une usine de voitures. La voiture serait le produit final, et le framework serait l’usine. Dans cette usine, on a déjà tout ce qu’il faut en stock : les robots, les postes de travail, les composants d’une voiture (comme le volant ou encore les roues), etc. Et parmi ses éléments, on va venir chercher ceux dont on a besoin pour les réutiliser.

Une fois ce squelette d’application ou de logiciel (le fameux “framework”) produit, les autres développeurs n'ont plus besoin de réinventer la roue à chaque nouveau projet. On peut notamment se pencher sur le concept DRY : Don’t Repeat Yourself, en français “Ne vous répétez pas”. Le DRY est “une philosophie en programmation informatique consistant à éviter la redondance de code au sein d’une application afin de faciliter la maintenance, le test, le débogage et les évolutions de cette dernière.” - Wikipédia

Les frameworks sont généralement conçus par une communauté de développeurs. Ils fonctionnent par langage de programmation et permettent de développer tous types de supports : applications mobiles, logiciels de bureau, plateformes web, jeux vidéo, etc. Mais l’on peut également créer son propre framework.

Il existe différentes parties dans les frameworks, on peut citer par exemple les outils d’authentification, de gestion de base de données, d’affichage ou encore d’interaction utilisateur.

Il faut avoir en tête qu’un framework répond à un besoin précis. Et pour choisir celui qui nous convient le plus, il faut définir efficacement son besoin en amont

# Historique des frameworks

Les frameworks sont apparus relativement tôt après le boom de l’internet, au début des années 2000. En réalité, ils ont suivi le développement des langages de programmation et l’évolution des technologies.

Par exemple, des frameworks tels que Hibernate et Spring, pour Java, sont apparus respectivement en 2001 et 2003. Symfony, framework PHP, est lui apparu en 2005.

Les frameworks JavaScript sont eux apparus assez récemment, en même temps que l’augmentation de l’utilisation du langage. Par exemple, AngularJS est né en 2010, et son évolution plus utilisée, Angular, en 2016.

Ils continuent à se multiplier et à prendre aujourd’hui de plus en plus d’ampleur, en même temps que les besoins augmentent.

# Pourquoi utiliser un framework ?

Il existe de nombreuses bonnes raisons d’utiliser des frameworks plutôt que de coder à partir de zéro.

1. Un développement plus rapide

Les frameworks permettent de gagner du temps ! En effet, ils évitent aux développeurs de devoir tout développer de A à Z, c’est-à-dire réécrire ou réinventer chaque ligne de code (concept DRY). Grâce aux frameworks, les développeurs peuvent se concentrer sur la réalisation de fonctionnalités spécifiques à leur projet plutôt que de passer du temps sur des choses récurrentes à chaque projet comme l’architecture, la sécurité de base de l’application, les tests, etc.
Comme les frameworks disposent de bibliothèques et d’outils intégrés, le temps nécessaire au développement est moindre.

2. Moins de code à écrire

L’utilisation de fonctions intégrées au framework permet de ne pas avoir à écrire autant de code original.

3. Bibliothèques pour les tâches communes

De nombreuses tâches que les développeurs devront effectuer dans les applications web sont courantes. Il s’agit par exemple de la validation des formulaires, du nettoyage des données et des opérations CRUD (Create, Read, Update, and Delete). Plutôt que d’avoir à écrire vos propres fonctions pour ces tâches, vous pouvez simplement utiliser celles qui font partie du framework.

4. Suivre les bonnes pratiques de codage

Les frameworks suivent généralement les meilleures pratiques de codage. 

Un framework fournit une hiérarchie de fichiers et dossiers optimisés. Grâce à cette séparation et classification de fichiers, l’interface s’en voit plus claire et son utilisation simplifiée - pour qui sait l’utiliser.

![](https://kinsta.com/fr/wp-content/uploads/sites/4/2020/09/structure-du-repertoire-par-defaut-de-symfony-1.png)

Ils vous obligent à organiser le code d’une manière plus propre, plus nette et plus facile à maintenir.

Les frameworks ont également leurs propres conventions de dénomination des entités que vous devez suivre.

Si les guidelines du framework sont respectées, on obtient alors une structure et une unité cohérente au code afin d’en améliorer sa qualité.

5. Plus sûr que d’écrire vos propres applications

La plupart du temps, le framework couvre et permet de se prémunir d’une grande partie des failles de sécurité rencontrées lors de la conception d’une application.

Il existe de nombreuses menaces à la sécurité, notamment les scripts cross-sites, les attaques par injection SQL et les falsifications de requêtes cross-sites. Si vous ne prenez pas les bonnes mesures pour sécuriser votre code, vos applications web seront vulnérables.

L’utilisation d’un framework ne remplace pas l’écriture d’un code sécurisé, mais elle minimise les risques d’exploitation par des pirates. Les bons frameworks intègrent un nettoyage des données et des défenses contre les menaces courantes mentionnées ci-dessus.

6. Un meilleur travail d’équipe

Un framework de développement met à disposition diverses architectures formalisées en fonction des besoins pour lesquels celui-ci est utilisé. Le développement en équipe est donc facilité, et la répartition des tâches au sein de cette même équipe est plus simple puisque chacun a sa “zone” de travail.   

Les projets avec plusieurs développeurs peuvent se tromper s’il n’y a pas de clarté au sujet de :

    La documentation
    Les décisions du design
    Les normes du code

L’utilisation d’un framework définit des règles de base claires pour votre projet. De plus, quand un développeur arrive dans une équipe travaillant sur un framework déjà établi et qu’il maîtrise, il trouvera ses repères plus facilement et plus rapidement. Nous pourrions comparer cela à un véhicule, la difficulté serait ici d’apprendre à conduire, mais une fois chose faite, passer d’un véhicule à un autre est un “jeu d’enfant”. Il en est de même pour le framework, une fois que l’on sait le manipuler, passer d’une application basée sur ce cadre de travail a une autre est simplifié, car l’architecture reste inchangée.

7. Plus facile à entretenir

Un framework étant développé par un groupe de développeurs, ou parfois par des organismes privés, la maintenance et les évolutions de ce dernier sont d’autant plus optimales et les mises à jour régulières.

En utilisant un framework, il n’y plus vraiment à se soucier des derniers standards du web, des nouvelles compatibilités entre services, etc. La communauté s’occupe de “tout”, et met elle-même à jour l'outil. Le développeur profite donc de ces mises à jour, autant de choses en moins à penser pour l’équipe de développement web qui peut ainsi consacrer ce temps gagné dans la recherche de valeur ajoutée et le développement du projet en lui-même.

8. Une communauté d’utilisateurs “infini”

Vous êtes rarement seul à utiliser un cadre de travail spécifique. Si vous rencontrez un problème, un bug, ou si vous vous posez des questions précises, les utilisateurs sont là pour vous aider. Une recherche efficace sur Stack Overflow (entre autres), et la solution sera probablement devant vos yeux.

Pour vous donner une idée, Symfony ou React sont des frameworks utilisés par plus d’un million de développeurs, autant de personnes qui pourront vous aider en cas de blocage.

# Quels sont les inconvénients d’un framework ?
## Différentes courbes d’apprentissage

Maîtriser un framework peut prendre du temps et ce n’est pas simple du tout ! Toutefois, chaque framework est doté de sa propre courbe d’apprentissage : certains permettent au développeur de monter en compétences rapidement tandis que d’autres nécessitent un temps d’apprentissage plus long.

## Connaissance des concepts généraux requise

Pour comprendre et interpréter correctement les principes de base des frameworks et effectuer des choix techniques judicieux, il est indispensable de maîtriser à minima les concepts généraux de fonctionnement interne, de comprendre les bonnes pratiques et, bien entendu, d’avoir une connaissance correcte du langage et du concept de programmation utilisés par le framework.

## Limites sur les fonctionnalités complexes

Comme son nom l’indique, un framework est un cadre de travail. Il existe donc certaines limites d’utilisation de ce dernier. Par exemple, il nous impose souvent ses propres choix en termes d’architecture de notre code. Lorsqu’un développeur web souhaite accéder à des fonctionnalités du langage qui ne sont pas gérées par le framework, il peut rencontrer des difficultés. Le conseil que l’on peut donner à un développeur qui souhaite utiliser un framework est de se laisser guider par ce dernier.

## Ils sont trop tentants !

Ils nous donnent l’impression que tout est plus simple grâce à eux, mais il n’y a rien de plus faux ! Ils imposent une architecture lourde et complexe aux applications, alors qu'elles n’en ont parfois pas besoin.

Quel qu'il soit, le framework répond à un besoin précis, et avancé ! Inutile d’utiliser une Ferrari pour aller acheter son pain au bout de la rue, il y a plus de risques de l'abîmer qu’autre chose. C’est pareil pour les frameworks : si vous souhaitez faire un site statique avec quelques pages, ils vous complexifient la tâche plus qu’ils ne vous la simplifient, les technos de base HTML/CSS et JS vous suffiront !

Gardez en tête une chose : avant de vous lancer, définissez efficacement votre besoin afin d'établir une véritable nécessité à l’utilisation d’un cadre de travail spécifique.

![](https://www.wildcodeschool.com/uploads/b81d3e000608474de952117d82312939.png-framework-coding-library-bibliotheque.PNG)

# Que devez-vous rechercher dans un framework ?

Voici quelques facteurs dont vous devez tenir compte pour choisir le meilleur framework pour votre projet.

Tout d’abord, si vous êtes débutez avec un framework, la courbe d’apprentissage ne devrait pas être trop dure. Vous ne voulez pas investir un temps précieux dans l’apprentissage d’un framework si celui-ci est trop difficile à appréhender.

Ensuite, vous voulez un framework qui soit facile à utiliser et qui vous fasse gagner du temps.

Un framework doit répondre à vos exigences techniques pour un projet. La plupart des frameworks disposent d’une version minimale et de certaines extensions avec lesquelles ils fonctionnent. Assurez-vous que votre framework supporte la ou les bases de données de votre choix et que vous pouvez utiliser le framework avec le serveur web sur lequel vous souhaitez le déployer.

Choisissez un framework avec un bon équilibre de fonctionnalités. Un framework riche en fonctionnalités peut être une aubaine pour certains projets. Par contre, si vous n’avez pas besoin de beaucoup de fonctionnalités, choisissez un framework dépouillé et minimal.

Certaines fonctionnalités sont souhaitables :

    Test
    Stockage en cache
    Moteur de modèle : un moyen de produire du code dans le HTML en utilisant des classes
    Sécurité

Si vous avez besoin de construire une application évolutive, choisissez un framework qui le permet.

Enfin, une bonne documentation et un bon support sont importants pour que vous puissiez tirer le meilleur parti de votre framework. Un framework doté d’une communauté importante et dynamique a également plus de chances de résister à l’épreuve du temps et est également en mesure de vous aider lorsque vous rencontrez des difficultés.

# Quels sont les différents types de frameworks ?
## Les frameworks d’entreprise « maison »

Parlons un peu maintenant des frameworks d’entreprise. On entend par là l’ensemble des librairies développées dans certaines entreprises, leur permettant de répondre de manière plus rapide, efficace et précise à certains développements spécifiques.

Souvent basés sur des frameworks existants, ces outils sont en fait des briques rajoutées à d’autres déjà existantes. Beaucoup d’entreprises avec une forte culture tech développent leurs propres frameworks, utilisés en interne mais aussi parfois mis en open source sur le net.

## Quelques exemples de frameworks :

Avant toute chose, il est important de savoir que les frameworks ne sont pas en concurrence les uns les autres ! Souvenez-vous de ce que l’on a dit plus haut : chacun d’entre eux répond à un besoin spécifique.

En PHP, deux sortent du lot : Symfony et Laravel

- Symfony, lancé en 2005 par Fabien Potencier et aujourd’hui maintenu par SensioLabs, est un framework de renommée mondiale, bien que majoritairement utilisé par une communauté francophone. Découvrez les nombreuses applications qui utilisent ou reposent sur le projet Symfony.
- Laravel, lancé en 2011 par Taylor Otwell, est l’un des frameworks les plus utilisés dans le monde. Petite anecdote : certaines parties de Laravel reposent sur Symfony.

En JS : NodeJs, VueJs, Angular et React
- NodeJs, doté de hautes performances et utilisable dans de nombreuses situations, a permis une grande avancée dans le monde de JavaScript (JS). Fondé en 2009 par Ryan Dahl, il a fait tomber le mur entre le frontend et le backend. C’est lui qui a rendu possible la réalisation d’applications back-end en JS. NodeJs aide notamment les entreprises dans la création d’applications évolutives et capables de gérer des connexions simultanées à haut débit. Par exemple, des entreprises comme Google ou encore PayPal utilisent NodeJs sur certaines parties de leurs applications.
- VueJs, créé par Evan You en 2014, est un cadre de travail évolutif basé sur JavaScript dont l’approche est orientée composants. On l’utilise généralement pour la partie front-end. Il est doté d’une courbe d’apprentissage progressive, qui lui permet d’être “simple” à prendre en main. Ses très bonnes performances et son poids léger (30 ko) font de lui l’un des frameworks JavaScript les plus rapides. Nous pouvons citer quelques sites qui utilisent VueJs :  Adobe, Alibaba ou encore Nintendo.
- Angular est le framework front-end officiel de Google et développé par ce dernier. Né en 2016, il offre des solutions prêtes à l’emploi et permet de créer des composants en JS. C’est un très bon framework pour développer des applications web hautement interactives. Orienté composant, il vous apporte une base de code solide. Cependant, il présente une certaine complexité dans sa courbe d’apprentissage, et le développement d’une application sous Angular implique nécessairement son utilisation de A à Z. Il n’est pas possible de changer de framework entre temps. Vous serez également obligé de passer par l'étape TypeScript pour utiliser Angular !
- React n’est pas un framework - voilà pourquoi certaines dents grinçaient un peu plus haut. On le qualifie plutôt de “bibliothèque front-end”. Née en 2013 et développée par Facebook, elle est dotée d’une importante communauté Open Source (qui s’appuie sur des méthodes de travail collaboratives et décentralisées). Malgré sa courbe d’apprentissage relativement rapide, son utilisation sur du long terme s’en voit légèrement complexifiée. Étant face à une librairie, React met à disposition des éléments réutilisables, mais s'affranchit de l’architecture logiciel.

On a rien sans rien ! Le développement est passionnant et accessible à tous, et certains frameworks sont simples à utiliser au début, mais deviennent complexes à mesure que l’application grossit. À l’inverse, d’autres nécessitent un apprentissage plus long, mais des facilités peuvent émerger une fois sur l’application. C’est un choix à faire en fonction du projet et de vos méthodes.

Quoiqu’il en soit, l’utilisation d’un framework requiert la connaissance du langage dans lequel il est développé. Pour pouvoir utiliser Symfony, Laravel et bien d’autres, il vous faut être à l’aise avec PHP et la POO (Programmation Orientée Objet). En ce qui concerne React, Angular ou NodeJS, la connaissance de JavaScript est un passage obligatoire.

Enfin, il existe encore bien d’autres frameworks de développement web, de quoi satisfaire toutes vos envies d’apprendre !

# Quels sont les meilleurs frameworks PHP en 2022 ?

 1. React JS
 2. Angular
 3. Flask
 4. Node JS
 5. Django
 6. Express
 7. Rails
 8. Spring
 9. Laravel
10. Backbone.JS
11. Vue.JS
12. Symfony
13. Zend Framework
14. Codelgniter
15. CakePHP
16. Yii Framework
17. Meteor Framework
18. Proton Native
19. NW.JS
20. Mithril.JS
21. Polymer Project
22. ASP.net
23. Slim
24. FuelPHP
25. Phalcon
26. Fat-Free Framework
27. Bootstrap
28. Material UI
29. Skeleton
30. Foundation
31. Pure.CSS
32. Semantic UI
33. Milligram
34. Materialize
35. Knaccs
36. Flutter
37. Ionic
38. jQuery
39. Pyramid
40. Bottle
41. TurboGears
42. CherryPy
43. Aurelia
44. Kube
45. Vuetify
46. Next.JS
47. Electron
48. Drupal
49. Web2Py
50. Sinatra
