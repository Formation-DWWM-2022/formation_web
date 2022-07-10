Nous allons définir ce qu’est un « client » et ce qu’est un « serveur » et allons par la même voir les grandes différences entre les langages dits « client side » et les langages dits « server side ».

## Langages client side et server side

Un site Internet n’est qu’un ensemble de fichiers de codes liés entre eux et faisant éventuellement appel à des ressources ou médias comme des images, etc.

Le code écrit dans ces fichiers, encore appelé « script », va pouvoir être exécuté soit côté client (client-side), c’est-à-dire directement dans le navigateur de l’utilisateur qui cherche à afficher la page, soit du côté du serveur (server-side).

Vous devez bien comprendre ici qu’un navigateur (côté client) et un serveur (côté serveur) ne vont pouvoir chacun effectuer que certaines opérations et lire certains langages.

Pour être tout à fait précis, la grande majorité des navigateurs ne sont capables de comprendre et de n’exécuter que du code HTML, CSS et JavaScript. Un navigateur est ainsi incapable de comprendre du code PHP.

Lorsqu’un navigateur demande à un serveur de lui servir une page, le serveur va donc se charger d’exécuter tout code qui ne serait pas compréhensible par le navigateur (en utilisant au besoin un interpréteur).

Une fois ces opérations effectuées, le serveur va renvoyer le résultat (la page demandée après interprétation) sous forme de code compréhensible par le navigateur, c’est-à-dire principalement en HTML. Le navigateur va alors afficher la page au visiteur. Cette page va être unique puisqu’elle a été générée par le serveur pour un utilisateur spécifiquement et en tenant compte de données particulières.

Si en revanche la page demandée par le visiteur ne contient aucun code nécessitant l’intervention du serveur, alors le serveur va la renvoyer telle quelle au navigateur qui va l’afficher au visiteur.

Notez bien ici que les opérations réalisées côté serveur vont être transparentes pour le visiteur et que celui-ci ne va jamais avoir accès ni pouvoir voir le code exécuté côté serveur tout simplement car une fois les opérations terminées, le serveur ne va renvoyer que du code compréhensible par le navigateur.

C’est la raison pour laquelle lorsque vous analyser le code d’un page, vous ne trouverez jamais d’instructions PHP mais seulement généralement du code HTML, CSS et JavaScript qui sont des langages qui s’exécutent côté client.

Le schéma ci-dessous résume ce qu’il se passe lorsque vous demandez à accéder à une page web via votre navigateur :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/relation-client-serveur.png)

Pour coder en HTML et en CSS et afficher le résultat de son code, un simple éditeur de texte et un navigateur suffisent. Pour le PHP et le MySQL, cependant, cela va être un peu plus complexe car le code va s’exécuter côté serveur.

Nous allons détailler les différentes alternatives qui s’offrent à nous pour coder en PHP et allons voir ensemble quels logiciels installer et pourquoi. 

## Le travail en local et le travail en production

Lorsque l’on code, on peut travailler soit en local, c’est-à-dire en hébergeant nous-mêmes tous les fichiers sur nos propres machines ou encore « hors ligne », soit en production (ou en pré-production) c’est-à-dire sur des fichiers qui sont hébergés sur un serveur distant et potentiellement accessibles à tous ou en « live ».

On va généralement opposer le travail en local au travail en production. En effet, en travaillant en local, nous sommes les seuls à avoir accès à nos différents fichiers et donc les seuls à voir l’impact des modifications que l’on fait sur ces fichiers tandis que si l’on fait la moindre modification en production, cela impacte directement notre site live et nos visiteurs le voient immédiatement.

Lors de la phase de développement d’un site ou dans des phases de test ou de débogage et sauf cas exceptionnels, un bon développeur préférera toujours travailler en local (ou éventuellement en pré-production) afin de ne pas impacter le fonctionnement normal d’un site web.

On appelle « pré-production » une copie d’un site également hébergée sur serveur. Généralement, on restreint l’accès à la pré-production aux développeurs du site afin qu’ils puissent tester en toute sécurité et en conditions réelles leurs modifications.

Dans le cas où le site est déjà créé et accessible à tous, alors nous ferons une copie locale de toute notre architecture et travaillerons sur cette copie afin de tester et d’implémenter de nouvelles fonctionnalités. Ensuite, une fois seulement qu’on s’est assuré que les différentes modifications ou implémentations fonctionnent et qu’aucun bug n’a été détecté, nous enverrons tous nos changements en production, c’est-à-dire que nous remplacerons les fichiers ou injecteront les modifications sur le serveur.

Dans ce cours, nous ne travaillerons évidemment pas sur un site déjà « live » car c’est une mauvaise pratique et car nous n’en avons pas mais plutôt en local. Cependant, rappelez-vous que le PHP va s’exécuter côté serveur.

Il va donc nous falloir recréer une architecture serveur sur nos propres machines avec les logiciels adaptés afin de pouvoir tester nos codes PHP. Rassurez-vous : cela est très simple et totalement gratuit.

## Recréer une architecture serveur sur son ordinateur

Comme je vous l’ai dit précédemment, un serveur dispose de différents programmes lui permettant de lire et de comprendre certains langages informatiques que des ordinateurs « normaux » ne peuvent pas lire.

Nous allons donc devoir installer des programmes similaires afin de pouvoir tester nos codes PHP. La bonne nouvelle ici est qu’il existe des logiciels regroupant tous les programmes nécessaires pour faire cela.

Selon le système que vous utilisez, vous devrez installer un logiciel différent. Vous pouvez trouver ci-dessous le logiciel à installer selon votre système :

- Si vous êtes sous Windows, vous allez installer WAMP, disponible ici ;
- Si vous êtes sous Mac OS, vous allez installer MAMP, disponible ici ;
- Si vous êtes sous Linux, vous allez installer XAMPP, disponible ici.

Pour ma part, étant donné que j’utilise un système Mac OS, ne vais travailler avec MAMP pour la suite de ce cours. Si vous devez installer un logiciel différent, pas d’inquiétude : les trois logiciels cités ci-dessus vont fonctionner de la même manière et proposer quasiment les mêmes fonctionnalités.

## Installer PHP sur Windows [5 min] -> Q/R
<https://grafikart.fr/tutoriels/install-php-windows-1114#autoplay>

Afin d'installer et configurer rapidement et sans difficulté un serveur web, un gestionnaire de bases de données MySQL et PHP sous Windows, existe parmi d'autres la solution tout-en-un WAMP (acronyme de « Windows-Apache-MySQL-PHP »).
C'est une plateforme de développement web open source qui utilise Apache2, MySQL, MariaDB et PHP pour développer des applications web dynamiques sur le système d’exploitation Windows. D’ailleurs, WAMP peut être utilisé pour des tests internes et peut également servir à créer des sites web. Donc, dans ce tutoriel, nous allons voir comment installer le serveur WAMP pour Windows 10.

XAMPP est un autre alternatif de WAMP et c’est une distribution Apache facile à installer contenant MariaDB, PHP et Perl.

## Install

Téléchargez l'exécutable d'installation qui correspond à votre architecture (32 ou 64 bits) sur le site www.wampserver.com. (cliquez sur le menu « Télécharger »).

<https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.2.6_x64.exe/download>

## Puis

Suivant -> Suivant -> Installer -> oui -> oui -> Suivant -> Terminer

Double-cliquez sur le raccourci créé.

Si le système vous retourne un message d'erreur « Fichier MSVCR110.dll manquant » ou « Fichier VCRUNTIME140.dll manquant », il s'agit d'un problème bien connu. Vous pouvez essayer de trouver sur le net la dll manquante, mais il faut qu'elle soit de la bonne version et de la bonne architecture. Alors, pour ne pas vous casser la tête, téléchargez Visual C++ Redistributable for Visual Studio 2012 à cette adresse : <https://docs.microsoft.com/fr-FR/cpp/windows/latest-supported-vc-redist?view=msvc-170#visual-studio-2012-vc-110-update-4>

Autre possibilité : utiliser l'outil check_vcredist disponible dans la section « Outils » du site wampserver : des paquetages de Visual C++ Redistributable for Visual Studio y sont également disponibles.

Il ne s'agit pas de la dernière version de Visual C++ Redistributable for Visual Studio, mais c'est celle qui correspond à la version désirée de la dll manquante.

L'exécution de WampServer ne déclenche pas grand-chose de visible, tout au plus la console qui s'ouvre et se referme rapidement. Mais si vous regardez dans votre zone de notification, à droite de la barre des tâches, vous verrez une icône avec le logo de WampServer devenir verte. Laissez traîner votre souris sur cette icône : une info-bulle vous indique que tous les services sont lancés.

![image](https://user-images.githubusercontent.com/46321539/156735007-bae598ce-1515-4c1b-8a3f-6927501a06a6.png)

Donc le raccourci vers WampServer sert à cela : démarrer tous les services de votre serveur web/MySQL.

L’icône est verte quand tous les services sont démarrés, rouge lorsqu’ils sont tous inactifs et orange lorsque seulement une partie d’entre eux sont démarrés.

Pour accéder à la page web d’accueil, vous devez démarrer votre navigateur et taper « localhost » dans la barre d'adresse :

![image](https://user-images.githubusercontent.com/46321539/156735061-40930738-e501-4176-a44f-db10b677c06b.png)

Le fait que cette page s'affiche atteste que le service Apache est bien en cours d'exécution.

Ce qui nous intéresse plus particulièrement est le menu Outils.

Cliquez sur phpinfo() :

![image](https://user-images.githubusercontent.com/46321539/156735167-a2669b57-182c-4f71-a008-e1773ff53166.png)

Comme vous le voyez, cela déclenche l'exécution de la fonction PHP phpinfo(), qui affiche toutes les informations de version et de fonctionnalités d'Apache et de PHP.

Revenez sur la page de configuration du serveur et cliquez sur phpMyAdmin :

![image](https://user-images.githubusercontent.com/46321539/156735257-e77d3532-1b29-4ceb-b8ac-b9bea9af9419.png)

L'application phpMyAdmin sert à administrer les bases de données MySQL sur le serveur local (le « My » désigne MySQL – il existe ainsi, par exemple, phpPgAdmin pour PostgreSQL).

Comme sur l'image ci-dessus, réglez éventuellement la langue, tapez « root » comme utilisateur, laissez le mot de passe vide et cliquez sur Exécuter :

![image](https://user-images.githubusercontent.com/46321539/156735245-3a2e21dc-ad4e-4775-b18a-ce0933bdf5db.png)

Vous constatez que WampServer a permis de configurer automatiquement Apache, MySQL et PHP, et s'est occupée de démarrer les services ad hoc. Nous disposons donc d'une configuration de test complète sur notre machine locale.

Mais pour permettre à une machine distante d'afficher une page web ou d'accéder à une base de données MySQL, il va falloir configurer certaines choses à la main.

Création de votre nouveau dossier projet dans le dossier

      C:\wamp64\www\ 

Par exemple :

    C:\wamp64\www\PROJET\index.php

```php
  //index.php
  <?php echo 'Salut' ?>
```

    http://localhost/PROJET
  
## L’éditeur de texte, outil indispensable pour écrire du code

Les logiciels WAMP, MAMP ou XAMPP vont nous être utile pour exécuter notre code PHP. Cependant, avant d’exécuter du code, il va falloir l’écrire et pour cela, nous allons avoir besoin d’un éditeur de texte.

Je ne vais pas répéter ici ce que j’ai déjà dit dans mon cours sur le HTML et le CSS. Normalement, si vous suivez ce cours, vous devriez déjà connaître le HTML et le CSS et devriez donc déjà posséder un éditeur de texte et savoir vous en servir. Pour ma part, j’utiliserai PHPStorm pour ce cours, mais n’hésitez pas à conserver votre propre éditeur. Le plus important est que vous soyez à l’aise pour coder.

Si vous utilisez l'éditeur de code VSCode, effectuer les modifications suivantes après installation :

1. Supprimez l'extension `PHP Intellisense`
2. Installez l'extension `PHP Intelephense`