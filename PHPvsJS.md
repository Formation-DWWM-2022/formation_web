# PHP vs JavaScript : Une comparaison approfondie des deux langages de script

PHP et JavaScript sont deux langages de script que les développeurs web utilisent fréquemment. Mais chacun a ses propres nuances et cas d’utilisation.

Nous allons explorer les différences entre les deux et les circonstances dans lesquelles vous devriez utiliser chaque langage dans les projets de développement.

# Sommaire

- PHP vs JavaScript : Origines
- Similitudes entre PHP et JavaScript
- Quelles sont les différences entre PHP et JavaScript ?
- Comment WordPress utilise JavaScript et PHP
- Apprendre le PHP vs JavaScript
- PHP vs JavaScript — Tableau de comparaison

# PHP vs JavaScript : Origines

Le PHP est un langage open source créé en 1995 par Rasmus Lerdorf. Le nom vient de Personal Home Page Tools – un ensemble de scripts utilisés par Rasmus pour suivre les visites sur son site.

Avec le lancement de PHP 3.0, le langage a obtenu un acronyme inversé : PHP : Préprocesseur Hypertexte. De nos jours, il est simplement connu sous le nom de PHP.

JavaScript a été créé en 1995 par Brendan Eich de Netscape pour apporter de l’interactivité au Web. Initialement connu sous le nom de Mocha, le nom a été changé en LiveScript, puis en JavaScript pour profiter de la popularité du langage Java.

Aujourd’hui, JavaScript est officiellement connu sous le nom d’ECMAScript, mais la plupart des gens l’appellent encore JavaScript.

Les deux langages existent donc depuis un certain temps.

Nous allons maintenant examiner certaines de leurs autres similitudes.

# Similitudes entre PHP et JavaScript

- Type de langage
- Type de variables
- Classes et objets
- Demande du marché
- Documentation

## Type de langage

PHP et JavaScript sont tous deux des langages de script. Il s’agit d’une différence par rapport aux langages de programmation « purs » tels que Java ou C++.

Les langages de script ont tendance à être interprétés plutôt que compilés. Cela signifie qu’ils sont traduits en code machine par une tierce partie plutôt que directement. Cela a un impact sur leur durée d’exécution.

Imaginez que vous vouliez traduire une page web de votre langue maternelle en Navajo. Si vous ne connaissez pas la langue navajo, vous auriez besoin d’un interprète pour vous aider, et la traduction prendrait plus de temps.

C’est pourquoi les langages compilés ont tendance à être plus rapides que les langages interprétés.

## Type de variables

Un autre point commun est que le PHP et le JavaScript sont faiblement typés.

Cela signifie que lorsque vous créez une variable dans l’un ou l’autre langage, vous n’avez pas besoin de lui attribuer son type de données : il est supposé.

Ainsi, vous pouvez écrire ce qui suit en PHP :

```php
$x = 'Hello world';

$y = 'Bonjour le monde';
```

Ou en JavaScript :

```js
var x = 'Coding is fun';

let y = 'No, honestly';
```

Dans les deux langages, ces variables seront reconnues comme des chaînes de caractères (ensembles de caractères).

Cela s’oppose à un langage fortement typé comme Java, où vous devez dire quel type de variable vous utilisez lorsque vous la déclarez :

```java
int x = 5;
```

PHP et JavaScript sont tous deux typés dynamiquement : en d’autres termes, vous pouvez changer le type facilement en le redéfinissant dans votre code :

```php
$x = 5;
```

En PHP, $x est maintenant un entier.

```js
x = 3.14195;
```

En JavaScript, x est maintenant un nombre.

Comme les types ne sont pas définis explicitement en PHP ou en JavaScript, vous avez besoin de fonctions pour vous indiquer le type de données avec lequel vous travaillez.

JavaScript a la fonction typeof pour le faire.

PHP dispose de la fonction gettype pour retourner le type d’une variable. Une nouvelle version améliorée de gettype, get_debug_type, fait partie de la version 8 de PHP.

## Classes et objets

Ni PHP ni JavaScript n’étaient à l’origine orientés objet. L’orientation objet leur a été ajoutée au fur et à mesure de l’évolution des langages.

La possibilité de créer des objets et des classes est apparue avec PHP 5, en 2004.

JavaScript n’a utilisé les objets ou les classes que beaucoup plus tard. Ils sont apparus dans le langage en 2015, avec l’introduction d’ES6.

Une classe est un regroupement générique d’objets.

Un objet est une entité ayant des propriétés (caractéristiques) et des méthodes (comportements).

Le jeu Donjons et Dragons (D&D) offre une bonne analogie.

Un personnage de joueur correspond à un objet. Chaque personnage appartient à une classe de personnages, comme un Barbare, un Voleur ou un Sorcier.

Les objets peuvent avoir un nombre quelconque de propriétés que vous souhaitez définir.

Ainsi, les propriétés d’un personnage peuvent inclure :

    nom
    course
    capacités (force, intelligence, sagesse, dextérité, constitution et charisme)
    type de personnalité (par exemple, audacieux, timide, curieux)
    alignement (légal, chaotique, bon, mauvais)

Vous pouvez utiliser des méthodes d’objet pour récupérer des informations sur l’objet.

Voici un exemple de code PHP d’une définition de classe et d’objet :

```php
<?php

class Sorcerer {

// Define properties

public $name;

public $race;

public $intelligence;

// Constructor function for the object

// takes 3 arguments, name, race and intelligence

function __construct($name, $race, $intelligence) {

$this->name = $name;

$this->race = $race;

$this->intelligence = $intelligence;

}

# Define object methods

// Get the name

function get_name() {

return $this->name;

}

// Get the race

function get_race() {

return $this->race;

}

// Get intelligence

function get_intelligence() {

return $this->intelligence;

}

} // end Sorcerer class

// Create a Sorcerer

$yensid = new Sorcerer("Yen Sid", "Human", 18);

# Output the object properties in the browser

echo $yensid->get_name();

echo "<br>";

echo $yensid->get_race();

echo "<br>";

echo 'Intelligence: ';

echo $yensid->get_intelligence();

?>
```

Lorsque ce code est ajouté à un fichier HTML, la sortie dans le navigateur doit être la suivante :

    Yen Sid
    Human
    Intelligence : 18

Vous pouvez également définir des méthodes qui sont des actions que les objets effectuent ou ont effectuées sur eux.

Dans D&D, cela pourrait être :

- surpriseAttack()
- disarmTrap()
- castSpell()
- resistPoison()

Lorsqu’une méthode est exécutée sur un objet, le résultat peut dépendre des propriétés de l’objet. Ainsi, l’objet d’un apprenti sorcier ne pourra pas lancer des sorts aussi efficacement qu’un objet de sorcier chevronné.

## Demande du marché

Un autre point commun entre PHP et JavaScript est que les développeurs des deux langages sont très demandés.

Les développeurs utilisant JavaScript et PHP sont également bien rémunérés.

Aux États-Unis, ils gagnent en moyenne environ 80.000 $ par an.
![](https://kinsta.com/wp-content/uploads/2020/12/average-php-developer-salary-usa-1024x434.png)
![](https://kinsta.com/wp-content/uploads/2020/12/average-javascript-developer-salary-usa-1024x434.png)

## Documentation

La moins bonne nouvelle pour les nouveaux venus sur PHP ou JavaScript est que la documentation officielle dans les deux langages n’est pas très conviviale. Elle a été rédigée pour des développeurs expérimentés plutôt que pour des débutants.

Vous pouvez consulter la documentation pour chaque langage ici :

- [Documentation PHP](https://www.php.net/docs.php)
- [Spécification linguistique de l’ECMAScript 2020](https://www.ecma-international.org/publications-and-standards/standards/ecma-262/)

À ce stade, vous vous demandez peut-être : « Quelle est la différence entre PHP et JavaScript ? » En fait, il y en a plusieurs.

# Quelles sont les différences entre PHP et JavaScript ?

- Scripts côté serveur ou côté client
- Interface publique vs Zone d’administration
- Combinaison avec d’autres langages
- Sensibilité à la casse
- Syntaxe
- Définitions des variables et des constantes
- Tableaux
- Intégration de base de données
- Threading
- Vitesse
- Gestionnaires de paquets
- Utilisation sur le web

## Scripts côté serveur ou côté client

PHP est un langage de script côté serveur. Cela signifie qu’il fonctionne sur le serveur web et non sur une machine cliente.

La programmation côté serveur est utile pour fournir un contenu dynamique (généralement à partir d’une base de données) aux utilisateurs, comme un message de bienvenue (« Bonjour, Claire ! ») lorsqu’un utilisateur se connecte.

Plus sérieusement, les scripts côté serveur sont utilisés dans le eCommerce. Par exemple, il existe plus de 100 extensions WooCommerce qui se connectent via des API (interfaces de programmation d’applications) à différents fournisseurs de paiement pour traiter les transactions.

JavaScript est un langage côté client, il s’exécute donc sur le portable, le téléphone ou la tablette d’un utilisateur.

JavaScript peut manipuler le DOM, qui signifie Document Object Model, et vous pouvez le considérer comme une structure arborescente formée à partir du HTML d’une page web.

Si vous êtes déjà tombé sur un accordéon ou une bascule, peut-être dans le cadre d’une extension de FAQ, vous avez vu le JavaScript côté client en action. Lorsque vous cliquez ou saisissez une question, les gestionnaires d’événements JavaScript activent ou désactivent l’affichage CSS ou les propriétés de visibilité, en affichant ou en masquant la réponse correspondante.

## Interface publique vs Zone d’administration

PHP fonctionne dans la zone d’administration d’un site web – la partie que les visiteurs ne voient pas ! Dans WordPress, cela signifie que PHP fait tout son travail sur le serveur web et dans l’administration de WordPress.

Traditionnellement, JavaScript fonctionnait sur l’interface publique, mais cela a changé en 2009 lorsque Node.js, un runtime backend, a été lancé. Aujourd’hui, JavaScript est vraiment un langage full stack.

## Combinaison avec d’autres langages

PHP étant un langage d’administration, il fait partie de la pile LAMP (Linux, Apache, MySQL, PHP).

PHP peut fusionner avec HTML. Vous le constaterez en examinant le code de nombreuses applications web, dont WordPress.

Voici un exemple tiré du fichier theme index.php de Twenty Twenty :

```php
<header class="archive-header has-text-align-center header-footer-group">

<div class="archive-header-inner section-inner medium">

<?php if ( $archive_title ) { ?>

<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>

<?php } ?>

<?php if ( $archive_subtitle ) { ?>

<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>

<?php } ?>

</div><!-- .archive-header-inner -->

</header><!-- .archive-header -->
```

Cependant, si vous mélangez PHP avec d’autres langages d’administration dans des applications web, il est plus difficile de les maintenir. De plus, vous devez non seulement connaître PHP, mais aussi étudier et être compétent dans ces autres langages !

Les développeurs JavaScript ont un peu plus de liberté pour écrire leur code. Ils peuvent utiliser le langage avec HTML, XML et Ajax.

## Sensibilité à la casse

La sensibilité à la casse est la distinction entre les majuscules et les minuscules lors de la désignation d’entités dans le langage.

PHP est partiellement sensible à la casse. La casse est importante pour certaines choses et pas pour d’autres.

Les variables PHP sont sensibles à la casse.

Donc, si vous créez une variable en PHP :

```php
$dog = "chihuahua";
```

et essayez d’obtenir la valeur de $DOG plus tard dans votre code, cela ne fonctionnera pas.

Les fonctions PHP sont cependant insensibles à la casse.

Si vous créez cette fonction en PHP :

```php
function dogFetch() {

// your code to run when the function is called

}
```

et que vous appelez plus tard DogFetch() dans votre code, votre fonction se lancera toujours.

Cependant, ce n’est pas une bonne pratique de code, car elle est incohérente.

JavaScript, en revanche, est totalement sensible à la casse. Ainsi, les variables appelées beagle, BEAGLE et Beagle seraient toutes distinctes les unes des autres.

## Syntaxe

La syntaxe est l’ensemble des règles qui régissent un langage. Cela comprend l’ordre des mots, la grammaire et la ponctuation.

En français, on pourrait dire :

> Je mangeais ma soupe lentement.

Mais si vous étiez Yoda, vous diriez ceci :

> Lentement, ma soupe j’ai mangé.

Pourquoi ? La syntaxe est différente. Les mêmes mots, dans un ordre différent.

![](https://kinsta.com/wp-content/uploads/2020/12/yoda-speak-generator-1024x803.png)

Alors que les humains pardonnent si nous utilisons le mauvais mot, les ordinateurs sont très littéraux. Si nous faisons une erreur dans notre syntaxe de programmation, il arrive souvent qu’un ordinateur ne sache pas ce que nous voulions dire, ce qui entraîne généralement une erreur.

Avec JavaScript et PHP, ils ont tous deux la même syntaxe de double barre oblique pour les commentaires de code d’une seule ligne :

```js
// This is a comment
```js
Mais PHP a aussi une autre forme de syntaxe de commentaire :
```php
# This is a comment
```

Si vous essayez d’utiliser la syntaxe des commentaires PHP en JavaScript, vous obtenez une erreur :

```js
# This is a Comment

Uncaught SyntaxError: private fields are not currently supported
```

![](https://kinsta.com/wp-content/uploads/2020/12/javascript-comment-php-syntax-error-1024x316.png)

D’autres erreurs de syntaxe sont communes à JavaScript et PHP, comme par exemple :

- Il manque un point-virgule (;) à la fin d’une ligne de code.
- Ne pas utiliser une paire d’accolades bouclées {} pour les déclarations conditionnelles.

## Définitions des variables et des constantes

Comme nous l’avons vu précédemment, JavaScript et PHP ont des manières différentes de déclarer les variables.

Ils définissent aussi différemment les constantes.

JavaScript utilise cette syntaxe :

```js
const x = 6;
```

Pour une simple constante comme celle-ci, sa valeur ne peut pas être modifiée par la suite.

Alors que PHP utilise la fonction define() pour les constantes.

```php
define(name, value, case-insensitive)
```

Par convention, les constantes PHP sont écrites en majuscules. Voici un exemple :

```php
define('MONSTER', 'Sulley');
```

Les deux premiers paramètres entre parenthèses sont explicites.

Le troisième, insensible à la casse, a une valeur par défaut de false. La constante ne sera insensible à la casse que si elle est réglée sur true.

C’est-à-dire :

```php
define('MONSTER', 'Sulley', true);
```

## Tableaux

Les tableaux sont des variables qui peuvent stocker plus d’une chose.

En PHP, les tableaux sont des tableaux associatifs ou des cartes ordonnées. C’est-à-dire que les éléments du tableau ont des paires de clés et de valeurs liées.

```php
<?php

$array(

key => value,

key2 => value2,

...

)
```

Un exemple moins abstrait est le suivant, où la clé est un prénom et la valeur le nom de famille.

```php
<?php

$array = array(

"Frodo" => "Baggins",

"Sam" => "Gamgee",

"Merry" => "Brandybuck",

"Pippin" => "Took",

);
```

Pour faciliter l’utilisation, vous pouvez convertir les objets PHP en tableaux, et convertir les tableaux en objets.

Cependant, JavaScript ne peut avoir que des tableaux qui ont des index numérotés. Par exemple :

```js
var mountains = [

"Everest",

"Kilimanjaro",

"Fuji"

];
```

Pour récupérer une valeur, vous devez faire référence à l’index du tableau, qui commence à 0.

```js
var mountain = mountains[1];
```

Les tableaux associatifs avec leurs index nommés ne sont pas pris en charge par JavaScript.

## Intégration de base de données

Une chose que PHP peut faire brillamment est de se connecter aux bases de données. PHP s’intègre particulièrement bien avec MySQL ou MariaDB, tous deux utilisés par WordPress. Un certain nombre de frameworks PHP permettent également d’intégrer facilement des bases de données.

L’utilisation d’une base de données est utile pour rechercher, trier et filtrer les informations à présenter à un utilisateur, comme par exemple les produits d’une boutique en ligne.

Historiquement, JavaScript ne s’intègre pas aux bases de données, bien que cela commence à changer.

![](https://kinsta.com/wp-content/uploads/2020/12/pouchdb-1024x853.png)

## Threading

Le threading fait référence aux instructions qu’un langage de programmation peut traiter.

PHP est multi-threaded, ce qui signifie qu’il peut traiter plusieurs instructions en parallèle.

L’inverse est un langage single-threaded comme JavaScript, qui ne peut traiter qu’une seule commande à la fois.

Pour illustrer le threading, le développeur Samim Yaquby utilise l’analogie d’un café au service des clients.

Dans un petit café avec un seul serveur, il est plus facile et plus efficace pour le serveur de servir les clients avec des commandes plus simples d’abord, une à la fois. Cela ressemble au single-threading de JavaScript.

En revanche, dans un grand Starbucks, il est fort probable que plusieurs serveurs exécutent les mêmes commandes simultanément. Cela fait écho à l’approche multi-threading de PHP.

## Vitesse

En général, JavaScript s’exécute plus rapidement que PHP sur le même matériel. Cependant, comme JavaScript s’exécute sur le client, si la machine cliente est ancienne et lente, cela aura un effet d’entraînement sur le temps d’exécution.

La vitesse de PHP s’est améliorée à pas de géant depuis la sortie de PHP 7, grâce à un nouveau moteur qui a doublé les performances et amélioré la consommation de mémoire. Par rapport à PHP 5.6, PHP 7.0 peut traiter plus de deux fois plus de requêtes, et les performances se sont encore améliorées à chaque version 7.x.

PHP fonctionne également mieux que JavaScript lorsque vous créez des applications en temps réel, comme des chatbots ou des jeux.

La sortie de PHP 8 avec le compilateur Just in Time devrait rendre PHP encore plus rapide.

## Gestionnaires de paquets

Chaque langage a son propre gestionnaire pour gérer les paquets : des modules de code tiers réutilisables qui ajoutent des fonctionnalités supplémentaires à un projet. Certains paquets dépendent d’autres pour fonctionner, c’est pourquoi on les appelle des dépendances.

PHP dispose de deux gestionnaires de paquets, PEAR et Composer, qui peuvent télécharger des paquets PHP sur le dépôt Packagist.

JavaScript a plusieurs gestionnaires de paquets bien connus, dont npm, Yarn et Bower.

![](https://kinsta.com/wp-content/uploads/2020/12/javascript-package-managers-1024x265.png)

Parmi ceux-ci, npm est le plus populaire, avec plus de 11 millions de développeurs qui l’utilisent dans le monde entier.

## Utilisation sur le web

PHP est le langage côté serveur le plus utilisé sur le web aujourd’hui, battant facilement ses concurrents avec près de 80 % des sites web qui l’utilisent.
![](https://kinsta.com/wp-content/uploads/2020/12/php-usage-statistics.jpeg)

Si PHP est très populaire, JavaScript est presque incontournable sur les sites web, 97 % des sites l’utilisant.
![](https://kinsta.com/wp-content/uploads/2020/12/javascript-usage-statistic.jpeg)

## Dépôt

Voici la principale différence entre PHP et JavaScript pour le référentiel :
| Repository | JavaScript | PHP
| --- | --- | ---
| Github | 404 077 | 387 773
| Stack-Overflow | 1 639 397 | 1 207 635
| Source-Forge | 10 814 | 25 090 

## Tendance d'emploi [au USA]

Les tendances d'emploi d'indeed.com montrent des millions de recherches d'emplois pour Javascript et PHP à partir de milliers de sites d'emploi. Il montre relativement la tendance croissante et décroissante de l'emploi pour les deux langues au cours des années consécutives.
![](https://www.guru99.com/images/5-2015/050115_0735_PHPvsJavaSc1.png)
![](https://www.guru99.com/images/5-2015/050115_0735_PHPvsJavaSc2.png)

# À quoi sert PHP ?

PHP a une large gamme d’utilisations.

Il est probablement mieux connu pour la création de pages web dynamiques. Selon BuiltWith, PHP est utilisé par plus de 34 millions de sites web, et il propulse certains des sites les plus connus et les plus rentables du web, dont Nike, Salesforce et Walmart.
![](https://kinsta.com/wp-content/uploads/2020/12/php-websites-1m-revenue-1024x523.png)

PHP convient parfaitement si votre projet nécessite une authentification sécurisée des utilisateurs. Cela inclut la gestion des cookies et des sessions, l’authentification des noms d’utilisateur et des mots de passe, et l’authentification à deux facteurs.

Comme mentionné précédemment, PHP est bon pour travailler avec des bases de données car il peut s’interfacer avec un grand nombre d’entre elles. Il dispose également d’une sécurité intégrée des données pour gérer les entrées de l’utilisateur, afin de se prémunir contre les menaces telles que les attaques par injection SQL.

PHP est aussi couramment utilisé pour créer des applications en temps réel comme la messagerie instantanée.

Enfin, même si vous faites la majeure partie de votre travail sur l’interface publique, vous aurez besoin d’un serveur backend. PHP est un choix idéal car il a été créé pour cela.

# À quoi sert JavaScript ?

JavaScript est devenu si populaire que la bonne question est peut-être : « À quoi ne sert pas JavaScript ? »

Outre les sites web et les applications web, JavaScript a été utilisé pour créer tous les éléments suivants :

    Applications mobiles
    Serveurs web
    Jeux
    Diapositives
    Chatbots
    …et même des drones programmables

![](https://kinsta.com/wp-content/uploads/2020/12/Super-Chrono-Portal-Maker-1024x519.png)

# Peut-on utiliser JavaScript avec PHP ?

La réponse est oui, absolument.

Un exemple courant est celui des formulaires web, où il est utile de valider les données saisies par l’utilisateur avant de les enregistrer dans une base de données.

Vous pouvez utiliser JavaScript pour la validation côté client, par exemple pour vérifier qu’un e-mail est au bon format. Ensuite, vous pouvez utiliser PHP pour la validation côté serveur, par exemple pour vérifier que l’e-mail existe dans votre base de données.

# Comment WordPress utilise JavaScript et PHP

Traditionnellement, WordPress utilise les deux langages, mais beaucoup plus de PHP que de JavaScript. Cela a commencé à changer avec l’introduction de l’éditeur Gutenberg.

Dans le State of the Word at WordCamp US de 2015, Matt Mullenweg a donné une idée de l’importance qu’allait prendre JavaScript en invitant le public à

> “Apprendre JavaScript, en profondeur”

En l’état actuel des choses, voici comment les deux langages sont utilisés dans WordPress.

PHP est utilisé pour les fichiers de modèles de thèmes, les boucles, l’authentification, la validation et l’accès à la base de données.

JavaScript permet l’interactivité des thèmes et des extensions, la validation côté client et la gestion des événements. Une certaine connaissance de JavaScript est notamment requise pour le développement de blocs, car les blocs dépendent du framework React JS.

# Apprendre le PHP vs JavaScript

Comme ils sont assez faciles à apprendre, il n’y a aucune raison que vous ne puissiez pas apprendre à la fois PHP et JavaScript.

Les deux langages reposent sur certaines bases de programmation, telles que les variables, les boucles, les déclarations conditionnelles, la portée et les objets.

Comme il s’agit d’un langage bien établi et populaire, il est facile d’apprendre le PHP.

Comme PHP est un langage côté serveur, vous avez besoin d’un serveur pour écrire du code. Il peut s’agir d’un véritable serveur web ou d’une émulation de celui-ci, comme un environnement de développement local. Quelques exemples sont DevKinsta, XAMPP, WAMP, ou MAMP.

Vous pouvez commencer à apprendre JavaScript assez facilement en vous exerçant dans la console du navigateur.

Sur le navigateur Chrome, vous pouvez accéder à la console via le raccourci Ctrl+Shift+J sous Windows, ou Commande+Option+J sous Mac.
![](https://kinsta.com/wp-content/uploads/2020/12/js-console-chrome-hello-world-1024x712.png)

Là où JavaScript devient plus difficile à maîtriser, c’est la taille même de son écosystème.

Le langage JavaScript s’est développé, passant du vanilla JavaScript à une pléthore de frameworks. Angular, Vue, jQuery et React ne sont que quelques-uns des nombreux frameworks qui existent aujourd’hui.
![](https://kinsta.com/wp-content/uploads/2020/12/js-frameworks.png)

Une bonne ressource pour les débutants vient de MDN Web Docs dans leur documentation JavaScript.

Son conseil aux débutants de JS est le suivant :

> « Ne vous accrochez pas à l’ordre dans lequel on apprend les choses. Ne perdez pas votre temps à essayer de choisir la chose parfaite, car il n’y a pas de chose parfaite »

Il suffit d’être conscient du syndrome de l’objet brillant avec les frameworks JavaScript sans comprendre d’abord les bases du HTML et du CSS. Le HTML est à la base de tout sur le web, et il peut être vraiment brisé s’il est mal géré par un développeur JavaScript trop enthousiaste.

# PHP vs JavaScript — Tableau de comparaison
| PHP  | JavaScript
| --- | ---
| Scripts côté serveur | Scripts côté client
| Utilisé dans l’administration | Utilisé sur l’interface publique (maintenant full stack avec Node.js)
| Se combine uniquement avec le HTML | Se combine avec plusieurs langages
| Partiellement sensible à la casse | Entièrement sensible à la casse
| Différences de syntaxe, par exemple # est autorisé pour les commentaires | Différences de syntaxe, par exemple # nest pas autorisé pour les commentaires
| Variables déclarées avec le préfixe $. | Variables déclarées avec les mots-clés var ou let
| Possède des tableaux associatifs | Aucun tableau associatif
| S’intègre à de nombreuses bases de données | Support de base de données faible ou inexistant
| Multi-threaded | Single-threaded
| Rapide si PHP 7.0 ou supérieur | Habituellement plus rapide que PHP
| Utilise les gestionnaires de paquets PEAR et Composer  | Utilise les gestionnaires de paquets npm, Yarn et Bower
| Rapide à exécuter si la version de PHP > 7.x | Généralement plus rapide que le PHP
| Utilisé sur environ 80% des sites web | Utilisé sur presque tous les sites web

# Résumé

Dans cette plongée profonde dans PHP vs JavaScript, il n’y a pas vraiment un seul gagnant. Ils ont tous deux leurs forces et leurs faiblesses.

PHP est stable et fiable, tandis que le JavaScript est devenu l’enfant chéri du quartier. Mais cela ne veut pas dire que l’un est meilleur que l’autre.

Quel que soit votre choix pour votre prochain projet – et ce pourrait être les deux ! – si vous prenez le temps de comprendre le langage, vous pouvez être sûr de construire un site web ou une application qui ravira vos utilisateurs.

