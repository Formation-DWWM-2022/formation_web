# WAMP
Afin d'installer et configurer rapidement et sans difficulté un serveur web, un gestionnaire de bases de données MySQL et PHP sous Windows, existe parmi d'autres la solution tout-en-un WAMP (acronyme de « Windows-Apache-MySQL-PHP »).
C'est une plateforme de développement web open source qui utilise Apache2, MySQL, MariaDB et PHP pour développer des applications web dynamiques sur le système d’exploitation Windows. D’ailleurs, WAMP peut être utilisé pour des tests internes et peut également servir à créer des sites web. Donc, dans ce tutoriel, nous allons voir comment installer le serveur WAMP pour Windows 10.

XAMPP est un autre alternatif de WAMP et c’est une distribution Apache facile à installer contenant MariaDB, PHP et Perl.

## Install

Téléchargez l'exécutable d'installation qui correspond à votre architecture (32 ou 64 bits) sur le site www.wampserver.com. (cliquez sur le menu « Télécharger »).

https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.2.6_x64.exe/download

## Puis 
Suivant -> Suivant -> Installer -> oui -> oui -> Suivant -> Terminer

Double-cliquez sur le raccourci créé.

Si le système vous retourne un message d'erreur « Fichier MSVCR110.dll manquant » ou « Fichier VCRUNTIME140.dll manquant », il s'agit d'un problème bien connu. Vous pouvez essayer de trouver sur le net la dll manquante, mais il faut qu'elle soit de la bonne version et de la bonne architecture. Alors, pour ne pas vous casser la tête, téléchargez Visual C++ Redistributable for Visual Studio 2012 à cette adresse : https://docs.microsoft.com/fr-FR/cpp/windows/latest-supported-vc-redist?view=msvc-170#visual-studio-2012-vc-110-update-4
    
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
