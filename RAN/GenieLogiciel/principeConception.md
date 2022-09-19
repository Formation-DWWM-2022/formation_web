# Principes de conception

Ce chapitre présente les grands principes qui doivent guider la création d'un logiciel, et plus généralement le travail du développeur au quotidien.

    Certains étant potentiellement contradictoires entre eux, il faudra nécessairement procéder à des compromis ou des arbitrages en fonction du contexte du projet.

# Séparation des responsabilités 
- https://youtu.be/f0Pd9aQRS80
## Le principe de séparation des responsabilités (preoccupations)
Le principe de séparation des responsabilités (preoccupations) vise à organiser un logiciel en plusieurs sous-parties, chacune ayant une responsabilité bien définie.

    C'est sans doute le principe de conception le plus essentiel.

Ainsi construite de manière modulaire, l'application sera plus facile à comprendre et à faire évoluer. Au moment où un nouveau besoin se fera sentir, il suffira d'intervenir sur la ou les sous-partie(s) concernée(s). Le reste de l'application sera inchangée : cela limite les tests à effectuer et le risque d'erreur. Une construction modulaire encourage également la réutilisation de certaines parties de l'application.

L'objectif principal du concept MVC est de séparer la logique métier (modèles) de l'affichage (vues). Ceci est également appelé la séparation des préoccupations, lorsque chaque couche ne fait que ses tâches spécifiques.

En séparant les modèles des vues, vous réduisez le nombre de dépendances entre elles. Par conséquent, les modifications apportées à l'une des couches a le moins d'impact possible sur les autres couches. Cette séparation améliore également la réutilisabilité du code . Par exemple, vous pouvez créer plusieurs vues pour les mêmes modèles (thèmes modifiables).

![](https://olegkrivtsov.github.io/using-zend-framework-3-book/html/en/images/mvc/model-view-controller.png)

## Le principe de responsabilité unique 
Le principe de responsabilité unique stipule quant à lui que chaque sous-partie atomique d'uun logiciel (exemple : une classe) doit avoir une unique responsabilité (une raison de changer) ou bien être elle-même décomposée en sous-parties. "A class should have only one reason to change" (Robert C. Martin).

Exemples d'applications de ces deux principes :

- Une sous-partie qui s'occupe des affichages à l'écran participe ne devrait pas comporter de traitements métier, ni de code en rapport avec l'accès aux données.
- Un composant de traitements métier (calcul scientifique ou financier, etc) ne doit pas s'intéresser ni à l'affichage des données qu'il manipule, ni à leur stockage.
- Une classe d'accès à une base de données (connexion, exécution de requêtes) ne devrait faire ni traitements métier, ni affichage des informations.
- Une classe qui aurait deux raisons de changer devrait être scindée en deux classes distinctes.

# Réutilisation

Un bâtiment s'édifie à partir de morceaux de bases, par exemple des briques ou des moellons. De la même manière, une carte mère est conçue par assemblage de composants électroniques.

Longtemps, l'informatique a gardé un côté artisanal : chaque programmeur recréait la roue dans son coin pour les besoins de son projet. Mais nous aommes passés depuis plusieurs années à une ère industrielle. Des logiciels de plus en plus complexes doivent être réalisés dans des délais de plus en plus courts, tout en maintenant le meilleur niveau de qualité possible. Une réponse à ces exigences contradictoires passe par la réutilisation de briques logicielles de base appelées librairies, modules ou plus généralement composants.

En particulier, la mise à disposition de milliers de projets open source via des plates-formes comme GitHub ou des outils comme NuGet, Composer ou npm a permis aux équipes de développement de faire des gains de productivité remarquables en intégrant ces composants lors de la conception de leurs applications. A l'heure actuelle, il n'est pas de logiciel de taille significative qui n'intègre plusieurs dizaines, voire des centaines de composants externes.

![](https://2847164876-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LDB4vgNE8GeGbLj6zqs%2F-LDB6opZ8PcgPlJl9qkn%2F-LDB8rTlOpHv7Y0FUBVe%2Fopensource-wide.png?generation=1527064788585523&alt=media)

Déjà testé et éprouvé, un composant logiciel fait simultanément baisser le temps et augmenter la qualité du développement. Il permet de limiter les efforts nécessaires pour traiter les problématiques techniques afin de se concentrer sur les problématiques métier, celles qui sont en lien direct avec ses fonctionnalités essentielles.

Voici parmi bien d'autres quelques exemples de problématiques techniques adressables par des composants logiciels :

- Accès à une base de données (connexion, exécution de requêtes).
- Calculs scientifiques.
- Gestion de l'affichage (moteur 3D).
- Journalisation des évènements dans des fichiers.
- ...

# Encapsulation maximale

Ce principe de conception recommande de n'exposer au reste de l'application que le strict nécessaire pour que la sous-partie joue son rôle.

Au niveau d'une classe, cela consiste à ne donner le niveau d'accessibilité publique qu'à un nombre minimal de membres, qui seront le plus souvent des méthodes.

Au niveau d'une sous-partie d'application composée de plusieurs classes, cela consiste à rendre certaines classes privées afin d'interdire leur utilisation par le reste de l'application. [cours PHP sur encapsulation](../../PHP/CoursAvancee/04-Encapsulation&Visibilite.md)

# Couplage faible

La définition du couplage est la suivante : "une entité (sous-partie, composant, classe, méthode) est couplée à une autre si elle dépend d'elle", autrement dit, si elle a besoin d'elle pour fonctionner. Plus une classe ou une méthode utilise d'autres classes comme classes de base, attributs, paramètres ou variables locales, plus son couplage avec ces classes augmente.

Au sein d'une application, un couplage fort tisse entre ses éléments des liens puissants qui la rend plus rigide à toute modification (on parle de "code spaghetti"). A l'inverse, un couplage faible permet une grande souplesse de mise à jour. Un élément peut être modifié (exemple : changement de la signature d'une méthode publique) en limitant ses impacts.

Le couplage peut également désigner une dépendance envers une technologie ou un élément extérieur spécifique : un SGBD, un composant logiciel, etc.

Le principe de responsabilité unique permet de limiter le couplage au sein de l'application : chaque sous-partie a un rôle précis et n'a que des interactions limitées avec les autres sous-parties. Pour aller plus loin, il faut limiter le nombre de paramètres des méthodes et utiliser des classes abstraites ou des interfaces plutôt que des implémentations spécifiques ("Program to interfaces, not to implementations").

## Exemple

Les interfaces sert :
- Lorsque vous travaillez en équipe, définir des interfaces sans écrire le code réel permet de se répartir les tâches et de commencer à travailler comme si les classes existaient. Eh oui, parce que vous pouvez préciser une interface comme un type dans vos arguments de méthodes ! 

- La seconde, pour spécifier des comportements communs attendus entre différentes classes appartenant à des domaines différents. Exactement comme dans notre exemple précédent, oui. :)

Imaginez une classe `MessagePrinter` dont le rôle est d'afficher un message.

```php
class MessagePrinter
{
   public static function printMessage($message)
   {
       echo sprintf('%s %s', $message->getContent(), $message->getAuthor()->name);
   }
}
```

Remarquez que je n'ai pas mis de type à mon argument $message. Jusqu'ici, on ne pouvait pas à la fois mettre le type en provenance du domaine   Forum et celui en provenance du domaine   Messenger. Ce n'était pas possible, jusqu'en PHP 8 avec un |en séparateur. Ça ressemble à ça :

```php
use Domain\Forum\Message as ForumMessage;
use Domain\Messenger\Message as MessengerMessage;

class MessagePrinter
{
   public static function printMessage(ForumMessage|MessengerMessage $message)
   {
       echo sprintf('%s %s', $message->getContent(), $message->getAuthor()->name);
   }
}
```

Mais ça ne résout pas vraiment le problème de fond. Si demain une nouvelle classe de message vient s'ajouter, et que je veux pouvoir l'afficher, je vais devoir venir modifier `printMessage` pour y ajouter une classe... Si j'en ai 10, je dois mettre les 10 ? C'est là qu'entre en jeu l'interface.

Créons une interface pour nos messages :

```php
namespace Domain\Display;

use Domain\User\User;

interface MessageInterface
{
   public function getContent(): string;
   public function getAuthor(): User;
}
```

Toute classe utilisant cette interface sera obligée d'avoir les méthodes `getContent`  et `getAuthor`  qui renverront une chaîne de caractères et un utilisateur. Peu importe la classe, et peu importent son implémentation, son code.

On peut donc définir cette interface dans notre méthode `printMessage`. 

```php
declare(strict_types=1);

namespace use Domain\Display;

class MessagePrinter
{
   public static function printMessage(MessageInterface $message)
   {
       echo sprintf('%s %s', $message->getContent(), $message->getAuthor()->name);
   }
}
```

‌Tant que notre code garantit que l'objet passé en argument est issu d'une classe utilisant l'interface, alors ça marchera.

Ajoutons l'interface sur les classes, à présent ! Cela s'effectue par le biais du mot clé  implements  suivi du nom de l'interface, en dernier, juste après le nom de la classe. Et si la classe en étend une autre, après le nom de la classe étendue.

```php
declare(strict_types=1);

namespace Forum {
   use Domain\Display\MessageInterface;
  
   class Message implements MessageInterface
   {
        // ... implémentation des méthodes de l'interface
   }
}


namespace Messenger {
   use Domain\Display\MessageInterface;
  
   class Message implements MessageInterface
   {
        // ... implémentation des méthodes de l'interface
   }
}
```

Contrairement à l'extension de classe, vous pouvez implémenter plusieurs interfaces en même temps ! Une interface peut hériter de plusieurs interfaces avec le mot clé  extends  !

```php
namespace Domain\Display {
    use Domain\User\User;
    
    interface ContentAwareInterface
    {
        public function getContent(): string;
    }
    
    interface AuthorAwareInterface
    {
        public function getAuthor(): User;
    }

    interface MessageInterface extends ContentAwareInterface, AuthorAwareInterface
    {
    }
}


namespace Domain\Forum {
   use Domain\Display;

   class Message implements MessageInterface  {
       // Implémentation des méthodes des interfaces
   }
}
```

Il y a une règle à respecter : une interface par ensemble de méthodes inséparables. On appelle ceci la ségrégation des interfaces. Plus la "surface" de ces interfaces est petite, plus les dépendances demandées dans les autres classes seront ciblées. Cela veut dire que le code n'aura qu'un très faible couplage avec de vraies classes, et que ce sera d'autant plus facile de les refactoriser si nécessaire.

Voilà qui est mieux. Vous pouvez composer vos interfaces pour qu'elles soient le moins couplées possible. Dit autrement, il faut essayer de faire en sorte que lorsque vous utilisez une interface, vous ayez besoin d'utiliser l'intégralité des méthodes réclamées. Dans le cas contraire, il serait peut-être bon de séparer les interfaces en de plus petites, plus spécialisées.

# Cohésion forte

Ce principe recommande de placer ensemble des éléments (composants, classes, méthodes) ayant des rôles similaires ou dédiés à une même problématique. Inversement, il déconseille de rassembler des éléments ayant des rôles différents.

Exemple : ajouter une méthode de calcul métier au sein d'un composant lié aux données (ou à la présentation) est contraire au principe de cohésion forte.

# DRY

DRY est l'acronyme de Don't Repeat Yourself. Ce principe vise à éviter la redondance au travers de l'ensemble de l'application. Cette redondance est en effet l'un des principaux ennemis du développeur. Elle a les conséquences néfastes suivantes :

- Augmentation du volume de code.
- Diminution de sa lisibilité.
- Risque d'apparition de bogues dûs à des modifications incomplètes.

La redondance peut se présenter à plusieurs endroits d'une application, parfois de manière inévitable (réutilisation d'un existant). Elle prend souvent la forme d'un ensemble de lignes de code dupliquées à plusieurs endroits pour répondre au même besoin, comme dans l'exemple suivant.

```
function A() {
    // ...
    // Code dupliqué
    // ...
} 

function B() {
    // ...
    // Code dupliqué
    // ...
}
```

La solution classique consiste à factoriser les lignes auparavant dupliquées.

function C() {
  // Code auparavant dupliqué
}

function A() {
    // ...
    // Appel à C()    
    // ...
} 

function B() {
    // ...
    // Appel à C()    
    // ...
}

Le principe DRY est important mais ne doit pas être appliqué de manière trop zélée. Vouloir absolument éliminer toute forme de redondance conduit parfois à créer des applications inutilement génériques et complexes.

# KISS

KISS est un autre acronyme signifiant Keep It Simple, Stupid et qu'on peut traduire par "Ne complique pas les choses". Ce principe vise à privilégier autant que possible la simplicité lors de la construction d'une application.

Il part du constat que la complexité entraîne des surcoûts de développement puis de maintenance, pour des gains parfois discutables. La complexité peut prendre la forme d'une architecture surdimensionnée par rapports aux besoins (over-engineering), ou de l'ajout de fonctionnalités secondaires ou non prioritaires.

# YAGNI

Ce troisième acronyme signifie You Ain't Gonna Need It. Corollaire du précédent, il consiste à ne pas se baser sur d'hypothétiques évolutions futures pour faire les choix du présent, au risque d'une complexification inutile (principe KISS). Il faut réaliser l'application au plus simple et en fonction des besoins actuels.

Le moment venu, il sera toujours temps de procéder à des changements (refactorisation ou refactoring) pour que l'application réponde aux nouvelles exigences.
