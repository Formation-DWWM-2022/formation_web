# Comment installer et utiliser Composer ?

- Installer et utiliser Composer : https://youtu.be/riC0__cXkcA
- Utiliser Composer pour gérer les librairies PHP ! : https://youtu.be/exaTOIhzYdk
- Tutoriel Composer : <https://grafikart.fr/tutoriels/composer-480>

Nous allons vous montrer comment installer et utiliser Composer sur différentes plateformes. Composer est un gestionnaire de dépendances pour PHP. C’est un outil simple et fiable que les développeurs utilisent pour gérer et intégrer des paquets ou des bibliothèques externes dans leurs projets basés sur PHP. Ainsi, ils n’ont pas à créer leurs pages ou applications web à partir de zéro.

Pour vous aider à maîtriser cet outil, vous apprendrez également comment créer un projet PHP de base.

Avant d’apprendre à installer Composer, assurez-vous que vous avez accès à l’interface en ligne de commande de votre système ou serveur.

# Sommaire

- C’est quoi un gestionnaire de dépendance?
- Définition du Composer
- Installer Composer sous Windows
- Générer et comprendre composer.json
- Utilisation du script de chargement automatique
- Mise à jour des dépendances de vos projets

# C’est quoi un gestionnaire de dépendance?

Le gestionnaire de dépendances est un outil qui peut être utilisé pour gérer les dépendances d’un projet. Le gestionnaire de dépendances est un excellent concept. C’est principalement un outil pour installer, désinstaller et mettre à jour ces dépendances. Grosso-modo, un ensemble de mécanismes et permet également la création de packages (vos projets) qui peuvent être distribués. Qu’est-ce que la dépendance à Internet? JavaScript, CSS, HTML, etc.

# Définition du Composer

Le logiciel Composer est un gestionnaire de dépendances sous licence libre (GPL v3) écrit en PHP. Il permet à ses utilisateurs de déclarer et d’installer les bibliothèques requises par le projet principal. Cela évite aux développeurs d’avoir à utiliser toutes les bibliothèques qu’ils utilisent pour distribuer leurs projets. Par conséquent, pour les projets écrits en PHP, nous pouvons le considérer comme l’équivalent d’APT.

# Installer Composer sous Windows

La mise en route de Composer sur une machine Windows est un peu différente. Aucune instruction en ligne de commande n’est nécessaire pour télécharger et installer le logiciel.

Il suffit de suivre les étapes suivantes :

- Installez PHP sur votre ordinateur. Nous vous recommandons d’utiliser WAMPP à cette fin, car le processus est simple et vous pouvez le terminer en quelques minutes.
- Une fois que WAMPP est installé, téléchargez la [dernière version de Composer](https://getcomposer.org/Composer-Setup.exe).
- Lancez l’assistant d’installation de Composer. Lorsqu’il vous demande d’activer le mode développeur, ignorez-le et poursuivez le processus d’installation.

![](https://www.hostinger.fr/tutoriels/wp-content/uploads/sites/9/2017/04/assistant-dinstallation-de-composer.png)

- Une autre fenêtre s’ouvre et vous demande de localiser la ligne de commande PHP. Par défaut, elle se trouve dans C:/wampp/bin/php/php.exe. Après avoir spécifié le chemin, cliquez sur Suivant.
- Vous serez invité à entrer les paramètres du proxy. Laissez la case non cochée et sautez cette partie en cliquant sur Suivant. Ensuite, dans la dernière fenêtre, cliquez sur Installer.
- Une fois l’installation terminée, ouvrez l’invite de commande. Appuyez sur CTRL +R, tapez « cmd » et cliquez sur OK.

![](https://www.hostinger.fr/tutoriels/wp-content/uploads/sites/9/2017/04/executer-cmd.png)

- Tapez la commande suivante :

```
composer
```

Excellent travail ! Vous avez maintenant Composer installé sur votre ordinateur Windows. Le programme d’installation ajoutera automatiquement Composer à votre variable PATH. Vous pouvez maintenant ouvrir l’invite de commande et exécuter le logiciel depuis n’importe quel endroit.

# Générer et comprendre composer.json

Voici maintenant la partie intéressante – utiliser Composer dans votre projet PHP.

Pour cela, vous devez générer un fichier composer.json. Vous pouvez le considérer comme un moyen de rechercher des données dans une liste pour Composer. Ce fichier contient des paquets (dépendances) qui doivent être téléchargés.

De plus, composer.json vérifie également la compatibilité des versions avec votre projet. Cela signifie que si vous utilisez un ancien paquet, composer.json vous le fera savoir afin d’éviter tout problème ultérieur.

Vous avez la possibilité de créer et de mettre à jour composer.json vous-même. Toutefois, étant donné qu’il s’agit d’un tutoriel sur l’automatisation de tâches redondantes, nous vous déconseillons de créer le fichier manuellement.

Voyons l’utilité de composer.json en créant un exemple de projet.

Notre projet est un simple timer PHP, qui permet aux développeurs de connaître le temps d’exécution du code. C’est très utile pour le débogage et l’optimisation.

Vous pouvez suivre ces étapes :

- Créer un nouveau répertoire pour le projet. Comme notre projet est un timer, nous nommerons simplement le dossier phptimer. Pour ce faire, exécutez la commande suivante :

```
mkdir phptimer
```

- Accédez au répertoire nouvellement créé :

```
cd phptimer
```

- Trouvez un paquet ou une bibliothèque pour le projet. Le meilleur endroit pour y parvenir est [Packagist](https://packagist.org/), où vous trouverez des tonnes de bibliothèques pour vous aider à développer votre projet. Pour ce tutoriel, nous avons besoin d’un paquet timer (minuterie). Pour l’obtenir, il suffit de taper timer dans la barre de recherche :
![](https://www.hostinger.fr/tutoriels/wp-content/uploads/sites/9/2017/04/site-web-packagist.png)
- Comme vous pouvez le voir, plusieurs paquets de minuterie sont disponibles et chacun d’eux a un nom et une petite description de ce qu’il fait. Dans cet exemple, nous avons choisi phpunit/php-timer car il possède le plus de téléchargements et le plus des étoiles GitHub.
- Précisez le package souhaité pour que Composer puisse l’ajouter à votre projet :

```
composer require phpunit/php-timer
```

- Le résultat montrera la version de phpunit/php-timer :

```
Using version ^1.0 phpunit/php-timer
```

Le symbole du signe d’insertion (^) est défini comme l’option permettant une interopérabilité maximale. Cela signifie que Composer mettra toujours à jour le paquet jusqu’à ce qu’une certaine version brise le paquet d’une manière ou d’une autre.

Dans notre cas, la plage de mise à jour du paquet est >=1.0.9 <2.0.0, car la version 2.0.0 brisera la rétrocompatibilité. Pour des informations détaillées sur le versionnage dans Composer, consultez la page de documentation.

Après l’exécution de la commande ci-dessus, votre répertoire de projet contiendra deux nouveaux fichiers – composer.json et composer.lock – et un dossier nommé vendor. C’est dans ce répertoire que Composer stockera tous vos paquets et dépendances.

# Utilisation du script de chargement automatique

Votre projet est presque prêt à démarrer, et la seule chose qui reste à faire est de charger la dépendance dans votre script PHP. Et heureusement, le fichier de chargement automatique de Composer vous permet de terminer ce processus plus rapidement.

Pour utiliser le chargement automatique, écrivez la ligne suivante avant de déclarer ou d’instancier de nouvelles variables dans votre script :

```php
require '/vendor/autoload.php'
```

Nous allons vous donner un exemple pour vous aider à mieux comprendre.

Disons que nous voulons tester notre projet phptimer :

- Ouvrez l’éditeur de texte nano pour créer un script nommé demo.php.

```
nano demo.php
```

- Ensuite, collez les lignes suivantes dans votre fichier :

```php
<?php
require __DIR__ . '/vendor/autoload.php'

Timer::start();

// your code

$time = Timer::stop();

var_dump($time);

print Timer::secondsToTimeString($time);
```

- Exécutez le script :

```
php demo.php
```

- Le terminal doit afficher un résultat similaire à ce qui suit :

```
double(1.0893424438611E-5)
0 ms
```

# Mise à jour des dépendances de vos projets

Enfin, vous devez savoir comment mettre à jour vos paquets. Cela peut se faire de deux manières :

- Mise à jour universelle. Pour vérifier et installer les mises à jour de tous vos paquets et dépendances en même temps, tapez la commande suivante :

```
composer update
```

- Mise à jour spécifique au paquet. Exécutez cette commande pour vérifier les mises à jour d’un ou de plusieurs paquets spécifiques :

```
composer update vendor/package vendor2/package2
```

N’oubliez pas de remplacer vendor/package par le nom du paquet que vous voulez mettre à jour.

En exécutant la commande update, Composer met également à jour les fichiers composer.json et composer.lock pour qu’ils correspondent à l’état actuel des dépendances de votre projet.

# Conclusion

Composer aide les développeurs à gérer les dépendances des projets PHP. Grâce à ce logiciel, ils peuvent facilement intégrer et gérer des paquets open source en un seul endroit.

Ce qui est formidable, c’est que Composer peut également résoudre les dépendances par projet. Ainsi, les développeurs peuvent contrôler les paquets pour chaque projet et garder la taille du projet sous contrôle.

# Liste non exhaustif de librairies PHP
- https://gist.github.com/llbbl/7607016
- https://www.cloudways.com/blog/php-libraries/
