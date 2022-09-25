# Introduction - Qu'est ce que Symfony et pourquoi l'utiliser ?

## Présentation

Découvrir et appréhender un framework PHP web.

## Pré-requis

* PHP
* Programmation Orientée Objet
* Structure MVC
* Base de données

## Rappels des concepts du MVC

![Schéma de principe du MVC](https://2077362978-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LXc8ZoOM6TzFjRK4eHK%2F-LnpDdM8sxOMgq_R1ucV%2F-LnpEh2Ql_WL68DRsMOP%2Fmvc-architecture.png?alt=media&token=dc88d1dd-1276-43b6-aa9e-91fb8c2cf8a8)

### C: Controller / Contrôleur

C'est lui qui reçoit l'interaction (la demande/**request**) du visiteur. Il se charge de récupérer les éléments nécessaires auprès du/des modèle(s). Il transmets toutes les données nécessaires à la vue.

### V: View / Vue

C'est lui qui apporte la réponse (**response/render**) au visiteur. Une vue peut être une page web, un fichier pdf, ... Ne se préoccupe que de l'affiche des informations, n'assure aucun traitement

### M: Model / Modèle

C'est lui qui s'occupe de récupérer et préparer les données. Le modèle peut être en lien avec une base de données. Le modèle peut être en lien avec des API. Le modèle prépare les données pour qu'elles soient facilement manipulables par la vue.

## Notion de Framework

### Définition générale

En programmation informatique, un framework ou structure logicielle est un ensemble cohérent de composants logiciels structurels, qui sert à créer les fondations ainsi que les grandes lignes de tout ou d’une partie d’un logiciel (architecture). Un framework se distingue d’une simple bibliothèque logicielle principalement par :

* son caractère générique,
* faiblement spécialisé,
* contrairement à certaines bibliothèques ;

Un framework peut à ce titre être constitué de plusieurs bibliothèques chacune spécialisée dans un domaine. Un framework peut néanmoins être spécialisé, sur un langage particulier, une plateforme spécifique, un domaine particulier : reporting, mapping, etc. ;

Le cadre de travail (traduction littérale de l’anglais : _framework_) qu’il impose de par sa construction même, guidant l’architecture logicielle voire conduisant le développeur à respecter certains patterns (modèle de conception) ; les bibliothèques le constituant sont alors organisées selon le même paradigme.

### Framework Orienté Objet

Un framework dit orienté objet est typiquement composé de classes mères qui seront dérivées et étendues par héritage en fonction des besoins spécifiques à chaque logiciel qui utilise le framework.

Le développeur qui utilise le framework pourra personnaliser les éléments principaux du framework par extension, en utilisant le **mécanisme d’héritage** : créer des nouvelles classes qui contiennent toutes les fonctionnalités que met en place le framework, et en plus ses fonctionnalités propres, créées par le développeur en fonction des besoins spécifiques à son application.

|  Avantages | Inconvénients  |
| ------ | -----|
| <p></p><ul><li>Pour éviter des erreurs dans l’organisation des appels</li><li>Éviter les appels directs aux commandes PHP</li><li>Préférer les versions des Frameworks qui apportent leur lot de contrôles.</li><li>Plus grand portabilité du code</li><li>Ne pas réinventer la roue</li><li>La gestion des formulaire, des utilisateurs, ...</li></ul> | <p></p><ul><li>Apprentissage d’une couche supplémentaire</li><li>La majorité des fonctionnalités PHP sont redéfinies</li><li>Généralement apprentissage d’un moteur de template</li><li>Apprentissage de l’utilisation du framework choisit : ses classes, ses objets, sa logique !</li></ul> |

![Les 10 frameworks les plus populaires en PHP (2019).](https://2077362978-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LXc8ZoOM6TzFjRK4eHK%2F-LnpG3lX1MX2wMcpewGg%2F-LnpGn8ujUPyhpfSH4U7%2Fphp-frameworks.png?alt=media&token=4f45af8a-b6bc-4130-b833-b4569db73989)

## Symfony

![](https://2077362978-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LXc8ZoOM6TzFjRK4eHK%2F-LhkACB5wEfW9y2CQ-HV%2F-LhkI14IztyEcscMgDwV%2Flogosymfony.png?alt=media&token=aaa2832c-a144-42a6-948f-3b88033bdcde)

* Framework MVC en PHP 5 (V2), PHP 7 (V3, V4 et V5 ), PHP8 (V6) libre
* Développé en 2005 par la société Sensio pour répondre à ses besoins
* Division de la société Sensio en deux entités l’agence Web et l’entreprise qui soutient et maintient Symfony : SensioLabs, dirigée par Fabien Potencier, l’auteur de Symfony
* Framework français !, De renommée mondiale
* Premier framework en France et en Europe

### SYMFONY : AVANTAGES

* Connectable à presque tous les SGBD
* De nombreux Bundles, contributeurs, utilisateurs
* Moteur de template puissant et simple
* Depuis la V4, Symfony est très léger et très rapide

![Roadmap des versions de Symfony](https://blog.sensiolabs.com/wp-content/uploads/2021/06/roadmap-1024x658.png)

Toutes les informations sur l'évolution du framework : [https://symfony.com/releases](https://symfony.com/releases)


### Symfony V4 : Un retour aux bases

Avec sa version 4 (et suivante), Symfony à pris un virage important par rapport aux précédentes versions, et se rapproche des "standards" de la majorité des framework, mais à aussi grandement optimisé son poids et sa vitesse d'exécution. Dans une grande logique de simplification Symfony à également automatisé de nombreux mécanismes qui auparavant auraient impliqués de nombreuses lignes de configuration.

#### SKELETON ET FLEX

La version **Skeleton** de Symfony : Apporte un framework Symfony très léger, avec le minimum pour faire fonctionner un controller.

La version 4 de Symfony introduit Flex qui est un gestionnaire de "recipes" (recettes), qui permet l'ajout de fonctionnalité à Symfony (gestionnaire de vue, de base de données, d'email, ...) avec un mécanisme d'auto-configuration de ces "bundles". Cela permet donc de fournir par défaut un framework très léger, avec une grande facilité pour lui ajouter tous les composants nécessaires, sans en mettre plus que nécessaire.

Par défaut Symfony version Skeleton ne sais rien faire ! Par contre, il n'embarque pas des dizaines de Bundles dont vous n'aurez peut être jamais besoin (fonctionnement des versions 2 et 3 avec plus de 46 bundles par défaut, contre 10 aujourd'hui).

Grâce à Flex vous installez rapidement le nécessaire pour répondre à votre projet.

### Symfony V5 : Continuer vers la simplification et la standardisation

Avec sa version 5 (et suivante), Symfony continue sa simplification en facilitant l'usage de nombreux composants redéfinis et devenus génériques.

Une lecture intéressante sur la logique d'évolution du framework Symfony : [https://www.disko.fr/reflexions/technique/symfony-4-4-5-0-les-nouveautes-venir/](https://www.disko.fr/reflexions/technique/symfony-4-4-5-0-les-nouveautes-venir/)

## Installations

### Configuration requise pour votre serveur

* Un serveur Web
* PHP8 ou supérieur pour la version 6
* [Git (différent de GitHub)](https://git-scm.com/)
* Le gestionnaire de dépendance [Composer](https://getcomposer.org/)
* Le nouveau gestionnaire d'installation de Symfony : [https://symfony.com/download](https://symfony.com/download)
* Une maîtrise de son système d'exploitation ! (fichiers cachés, variables PATH, php.ini, console...)

Vous pouvez suivre aussi les éléments de la documentation officielle : [https://symfony.com/doc/current/setup.html](https://symfony.com/doc/current/setup.html)

## Exercice 1 : Installation des outils

* [ ] Installer un serveur local (si ce n'est pas déjà fait)
* [ ] Installer [Git](https://git-scm.com/)
* [ ] Installer [Composer](https://getcomposer.org/)
* [ ] Installer l'utilitaire [Symfony](https://symfony.com/download) (facultatif)
* [ ] Pour les utilisateurs de Windows : Installer une vraie console PowerShell (à partir de windows 10).
* [ ] Installer un vraie IDE ! ([PhpStorm](https://www.jetbrains.com/phpstorm/)).

Pensez à vérifier que tout fonctionne correctement :

```
php -v
composer -v
symfony -v
git --version
```

Vous devez vous afficher les numéros de version. **Corrigez les messages d'erreurs éventuels.**

Vous pouvez tester si votre système est prêt à installer Symfony (si vous avez installé l'utilitaire Symfony) :

`symfony check:requirements`

## Exercice 2 : Installation de Symfony.

Symfony propose deux versions :

* La version **skeleton**, la plus minimaliste et légère, qui n'installe que le stricte minimum, vous laissant ainsi la liberté d'ajouter les composants dont vous avez réellement besoin. Avec cette solution vous pouvez développer des API, des micro-services,  ou une application en console
* Le version **website-skeleton**, qui va installer tout le nécessaire pour faire fonctionner un site (vues, annotations, base de données, ...)

On va privilégier la version **skeleton**.

Placez-vous dans le répertoire où vous souhaitez installer Symfony (www, public\_html, ...) et exécutez la commande suivante (cela va créer un répertoire du nom de votre projet).

```
symfony new nomDuProjet --version="6.1.*" --webapp

# ou avec Composer
composer create-project symfony/skeleton:"6.1.*" nomDuProjet
cd my_project_directory
composer require webapp
```

Par défaut cette commande récupère la dernière version stable de Symfony (actuellement la version 6.1). Le téléchargement peut prendre quelques minutes.

Il est possible de tester immédiatement le bon fonctionnement de l'installation en utilisant la ligne de commande intégrée dans l'utilitaire Symfony :

```
cd nomDuProjet
```

Si vous vous rendez sur l'URL [http://localhost/nomDuProjet/public/index.php](http://localhost/nomDuProjet/public/index.php) vous devriez voir la page d'accueil de Symfony avec le numéro de la version installée.

Symfony embarque (et installe) un serveur Web très puissant qui permet de tester le fonctionnement d'un site. Il est possible de gérer les url sécurisées (https), la simulation d'un domaine, ...

`symfony server:start` (si vous avez installé l'utilitaire)

