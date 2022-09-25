# Architecture de Symfony

Avec la version 4, Symfony à grandement simplifié la structure de ses répertoires et à normalisé les appelations pour coïncider avec la pratique de la majorité des framexork.

Symfony à également abandonné la notion de Bundle, qui était nécessaire pour développer son projet.

## Architecture globale

![Arborescence de base d&apos;un projet Symfony](https://2077362978-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LXc8ZoOM6TzFjRK4eHK%2F-LnpUAMxfsNZnvF-QmDS%2F-LnpU_l0tzh8t3KSoTh0%2Farbo1.png?alt=media&token=d3eccd94-3690-449e-838c-74a101c6ac7b)

* **bin/** : contient la console
* **config/** : contient les configurations des différents bundles, les routes, la sécurité et les services
* **public/** : c'est le répertoire public et accessible du site. Contient le contrôleur frontal "index.php" et les "assets" (css, js, images, ...)
* **src/** : contient votre projet (**M et C** du MVC)
* **templates/** : contient les vues (**V** du MVC)
* **var/** : contient les logs, le cache
* **vendor/** : contient les sources de bundles tiers et de Symfony

## Configuration

![Arborescence du répertoire de configuration](https://2077362978-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LXc8ZoOM6TzFjRK4eHK%2F-LnpUAMxfsNZnvF-QmDS%2F-LnpV5LkVloxmkZcBeh_%2Farbo-config.png?alt=media&token=c9363f6b-027e-45ea-9e72-c9ec08ef130e)

Vous remarques des fichiers au format yaml, le format par défaut pour la configuration de Symfony. Vous pouvez aussi remarquer les répertoires dev, prod et test. Ces répertoires permettent de facilement différencier une configuration pour un environnement de développement, pour le site en ligne, ou encore pour un contexte de test.

Par exemple, lorsque l'on développe, on ne souhaite pas réellement envoyer les mails aux usagers, par contre, on souhaite les visualiser. On peut donc configurer ce comportement dans le répertoire dev, pour le bundle de gestion des emails. Un autre exemple est la gestion des logs. En dev, on ne souhaite pas les conserver, mais les afficher, en production, on ne souhaite surtout pas les afficher, mais les stocker dans des fichiers.

Le concept est donc de définir le comportement global quelque soit l'environnement dans le fichier à la racine de config/packages, et de spécifier un comportement en fonction de l'environnement dans les répertoire dev, prod ou test.

## Src

![Configuration classique du r&#xE9;pertoire src/](https://2077362978-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-LXc8ZoOM6TzFjRK4eHK%2F-LnpUAMxfsNZnvF-QmDS%2F-LnpW30x4PtoJZYkWUEj%2Farbo-src.png?alt=media&token=fbbdf177-b30a-4517-9a96-27476556ae5c)

Dans ce répertoire se trouve toute la logique de l'application, les contrôleurs, les modèles, nos classes spécifiques, les services, ...

* Controller/ : Tous les contrôleurs de l'application, accessibles par des routes
* Entity/ : Les classes spécifiques pour la gestion de l'application, des données et des API
* Migrations/ : Contient les fichiers permettant la mise à jour de la base de données pour chaque modification effectuée sur la structure.
* Repository/ : Est très généralement lié à une entité, et permet d'ajouter des requêtes spécifiques.

Tous ces points seront détaillées dans les parties suivantes.

