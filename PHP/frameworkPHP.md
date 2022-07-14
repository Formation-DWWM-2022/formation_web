# Framework PHP

## Laravel

![](https://kinsta.com/fr/wp-content/uploads/sites/4/2020/09/laravel-1.png)

Laravel est présenté comme « Le framework PHP pour les artisans du web ». Il a été développé par Taylor Otwell, qui voulait un framework avec des éléments que CodeIgniter n’avait pas, comme l’authentification des utilisateurs.

### Spécifications rapides

Lancement : Juin 2011
Version actuelle : 8, publiée le 8 septembre 2020.

Exigences techniques :

    PHP >= 7.2.5 (ou utiliser Laravel Homestead)
    Composer installé
    Prise en charge des bases de données MySQL 5.6+, PostgreSQL 9.4+, SQLite 3.8.8+, SQL Server 2017+.

### Les avantages de Laravel

Il est facile de démarrer avec Laravel Homestead, un environnement de développement virtuel « fait pour vous ».

Laravel Homestead est une boîte Vagrant officielle, préemballée, qui vous offre un merveilleux environnement de développement sans vous obliger à installer PHP, un serveur web et tout autre logiciel de serveur sur votre machine locale. Plus besoin de vous inquiéter de la dégradation de votre système d’exploitation !

Si vous êtes un utilisateur de Mac, vous avez également le choix d’utiliser Laravel Valet comme environnement de développement. Soit dit en passant, Laravel Valet supporte Symfony, CakePHP 3, Slim et Zend, ainsi que WordPress.

Laravel utilise un moteur de templating appelé Blade. L’avantage qu’il présente par rapport aux autres moteurs de modèles est que vous pouvez utiliser PHP dans Blade, ce que vous ne pouvez pas faire avec les autres.

Packalyst, une collection de paquets Laravel, compte plus de 15 000 paquets que vous pouvez utiliser dans vos projets.

Laravel fournit une gamme de méthodes et de fonctionnalités de sécurité, couvrant les points suivants :

    Authentification
    Autorisation
    Vérification d’e-mail
    Cryptage
    Hachage
    Réinitialisation du mot de passe

Eloquent ORM et Fluent Query Builder de Laravel protègent contre les attaques par injection SQL car ils utilisent la liaison de paramètres PDO. La protection contre la falsification de requêtes intersites (Cross-Site Request Forgery – CSRF), qui utilise un jeton de formulaire CSRF caché, est également activée par défaut.

L’outil de ligne de commande Artisan Console dont dispose Laravel accélère le développement en permettant aux développeurs d’automatiser les tâches répétitives et de générer rapidement du code squelette.

Lorsque nous avons effectué des tests d’évaluation des performances de PHP, Laravel était le plus rapide des frameworks PHP que nous avons essayés.

L’écosystème Laravel dispose de plusieurs outils utiles tels que Mix pour la compilation des actifs CSS et JS, et Socialite pour l’authentification OAuth.

Laravel bénéficie d’une large communauté de développeurs (comme WordPress). Vous pouvez les trouver sur :

    Laracasts : un portail d’apprentissage avec des cours, un blog, un podcast et un forum.
    io : un portail communautaire avec plus de 45 000 utilisateurs.
    Le sous-reddit Laravel : elle abrite 50 000 artisans Laravel.

### Qui utilise Laravel ?

    Vogue archive – mode
    Ascot – hippodrome
    Camping World RV & Outdoors – détaillant
    Restaurants.com – moteur de recherche pour les restaurants
    Barchart – stocks et partage
    Visit Maine – tourisme
    Fischer Homes – construction
    Explore Georgia – tourisme

## Symfony

![](https://kinsta.com/fr/wp-content/uploads/sites/4/2020/09/symfony-1.png)

Symfony est à la fois un framework PHP et une collection de composants PHP pour la construction de sites web.

### Spécifications rapides

Lancement : Octobre 2005

Version actuelle : 5.1.4

Exigences techniques :

    PHP >= 7.2.5
    Composer installé

### Les avantages de Symfony

Symfony est un excellent choix pour les sites web et les applications qui doivent être évolutifs. Son système de composants modulaires est très flexible et vous permet de choisir les composants dont vous avez besoin pour votre projet.

Symfony supporte la plupart des bases de données des frameworks PHP populaires :

- Drizzle
- MySQL
- Oracle
- PostgreSQL
- SAP Sybase SQL Anywhere
- SQLite
- SQLServer

La meilleure façon d’interagir avec vos bases de données est de passer par l’ORM Doctrine. Symfony utilise des mappeurs de données pour faire correspondre les objets à la base de données. Cela permet de garder votre modèle d’objet et le schéma de la base de données séparés, ce qui signifie que si vous modifiez une colonne de la base de données, vous n’avez pas besoin de faire beaucoup de changements dans votre base de données.

Le débogage des projets Symfony est simple grâce à la barre d’outils intégrée.

Symfony utilise le moteur de templating Twig, qui est facile à apprendre, rapide et sûr.

Packagist liste plus de 4 000 paquets Symfony que vous pouvez télécharger et utiliser.

Symfony bénéficie du support commercial de Sensio Labs. Cela signifie qu’il y a un support professionnel disponible, contrairement à la plupart des autres frameworks PHP. Il dispose également de versions de support à long terme qui ont 3 années complètes de support.

Les développeurs de Symfony peuvent se former et obtenir de l’aide par de multiples canaux :

- Documentation complète
- Université Sensio Labs, la plateforme d’apprentissage en ligne Symfony
- SymfonyCasts
- Certification Symfony
- Conférences Symfony

En outre, la communauté Symfony est énorme, avec plus de 600 000 développeurs activement impliqués.

### Qui utilise Symfony ?

- Sainsbury’s Magazine – édition
- Intelius – recherche de données publiques sur les personnes
- Sony VAIO UK site – vente au détail
- Sabatier Shop – vente au détail
- Foot District – vente au détail
- Prix Nobel de la paix

D’autres grands noms utilisent des composants Symfony dans leurs projets, notamment Drupal, Joomla et Magento.

# Laravel vs Symfony – Quel framework PHP choisir pour votre projet ?

## Laravel & Symfony - informations de base sur les deux frameworks

Laravel est un framework open source qui suit un modèle de conception modèle-vue-contrôleur. Il réutilise les composants existants de différents frameworks pour créer une application Web. Il comprend également les fonctionnalités de base des frameworks PHP comme Yii, CodeIgniter ou Ruby on Rails. Si vous avez une bonne connaissance du PHP, Laravel vous sera beaucoup plus facile. Il est bien connu pour son approche de codage simple et sa réduction du temps de développement, ce qui est idéal pour développer une application PHP .

Symfony est également basé sur des projets PHP open source tels que Propel, Doctrine, PHPUnit, Twig et Swift Mailer. Malgré le fait qu'il a ses composants comme Symfony YAML, Symfony Event Dispatcher, Symfony Dependency Injector et Symfony Templating. Depuis 2005, Symfony s'est imposé comme un framework de plus en plus fiable et mature. Il est principalement utilisé pour des projets d'entreprise complexes .

## Similitudes

- Le premier est le plus évident : ils utilisent tous les deux PHP comme langage de programmation .
- Ils sont multiplateformes , ce qui signifie qu'il s'agit de logiciels informatiques implémentés sur plusieurs plates-formes informatiques.
- Il convient de mentionner que les deux sont des contenus multi-utilisateurs et multilingues. Les deux fournissent l'échafaudage de l'application, le modèle des interfaces et prennent en charge la recherche de texte.

# Différences

Malgré certaines similitudes reliant ces deux frameworks, nous sommes également en mesure de souligner des différences.

- Symfony pourrait être nommé comme un langage PHP conventionnel - il pourrait être modifié en C # ou Java, mais bien sûr, il se compose d'éléments uniques et uniques qui le rendent exceptionnel. En 2022, Laravel est apparu comme le framework PHP le plus populaire. Il s'appuie davantage sur des méthodes et des traits magiques. Cela rend le code plus court et l'ensemble du framework plus facile à comprendre. Symfony est conçu pour des projets un peu plus grands ou plus complexes contenant d'énormes fonctionnalités et est utilisé par un nombre important de clients. Dans le même temps, Laravel est lié au modèle de conception MVC, qui a été mentionné ci-dessus. En ce qui concerne l'évolutivité, si vous choisissez Laravel, vous devez être conscient de la nécessité d'écrire le code pour gérer cela. Symfony fournit plusieurs plates-formes pour maintenir l'évolutivité - il marque un point.
- Moteur de template = Symfony fournit Twig , mais Laravel fournit Blade, qui présente un grand avantage – vous pouvez réutiliser le code. Cette option n'existe pas dans Twig.
- Si vous êtes intéressé par la prise en charge des bases de données, les deux fournissent un mappage objet-relationnel pour l'accès aux données. Symfony utilise Doctrine, Laravel – Eloquent.
- Et le dernier mais non le moindre – la vitesse. Dans Laravel, la vitesse de l'application est similaire à celle des autres applications PHP. Il sécurise un système de contrôle de version approprié , ce qui facilite la migration ultérieure des applications. Si Symfony est correctement implémenté, la vitesse de l'application s'améliore. Il ajuste la vitesse d'une fonctionnalité de base individuelle, de sorte que l'ensemble de l'application peut facilement décider quelles fonctionnalités sont requises pour le moment.

# Avantages et inconvénients de Laravel et Symfony

## Laravel

### Avantages

- Il reste à jour avec la dernière version des fonctionnalités PHP.
- Il permet l'intégration d'applications et des services de messagerie les plus populaires via l'API.
- Il est également compatible avec d'autres plates-formes et bibliothèques tierces.
- Il dispose d'un vaste écosystème d'outils supplémentaires.

### Les inconvénients

- Certaines applications construites dans Laravel peuvent être plus lourdes pour un chargement plus rapide sur mobile.
- Les mises à jour ne sont pas compatibles - il est probable que si vous mettez à jour Laravel vers la version la plus récente, vous pourriez casser le code.

## Symfony

### Avantages

- Un nombre important de développeurs utilisent activement Symfony. Sa communauté est l'une des plus importantes du marché.
- Des plateformes bien connues comme Drupal, Magento et eZ Publish utilisent Symfony, c'est donc une bonne recommandation pour ce framework.
- Symfony est régulièrement mis à jour pour rester à jour avec les besoins des développeurs web.

### Les inconvénients

- Au début, vous pourriez avoir plus de mal à apprendre Symfony que l'autre framework PHP.
- Il s'appuie sur d'autres technologies afin que certaines applications puissent se charger plus lentement - il manque des éléments d'origine.
- En raison de la nécessité d'un code préconstruit pour de multiples utilisations, cela nécessite plus de temps pour les tests et, par conséquent, le processus de développement est plus lent.
