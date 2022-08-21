# Introduction aux bases de données, au SQL et au MySQL

- PDO : https://grafikart.fr/tutoriels/pdo-php-1141

Avec l’utilisation et la manipulation des bases de données, nous entrons dans la partie « complexe » de la programmation.

Il est possible que vous ne compreniez pas immédiatement comment fonctionnent les bases de données en soi ni comment s’articulent les différents langages entre eux.

Ce premier chapitre a pour vocation de définir justement les différents éléments qui vont entrer dans la manipulation de ces bases de données ainsi que l’utilité de celles-ci.

Je vous conseille donc de le lire attentivement et de ne pas vous précipiter dans l’apprentissage de vos premières requêtes SQL car vous aurez besoin de cette compréhension pour comprendre comment créer un « vrai » site.

# Qu’est-ce qu’une base de données ?

Une base de données est un conteneur qui va servir à stocker toutes sortes de données : des dates, chiffres, mots, etc. de façon organisée et sans date d’expiration.

De manière pratique, une base de données va être constitué d’un ensemble de fichiers.

# Pourquoi utiliser les bases de données ?

Pourquoi créer des bases de données et stocker des données dedans plutôt que simplement utiliser un fichier quelconque ?

Les bases de données possèdent deux grands avantages par rapport aux autres méthodes de stockage :

    Nous allons pouvoir stocker de très grandes quantités de données ;
    Nous allons pouvoir récupérer certaines données en particulier simplement et rapidement.

Si vous avez un nombre limité de données à stocker et peu d’opérations à faire, l’usage des bases de données peut ainsi être contestable. En revanche, dans le cas d’un blog ou d’un e-commerce par exemple, vous allez avoir besoin de stocker de nombreuses informations (informations de connexion et de profil de vos visiteurs ou clients, liste de vos produits et de leurs caractéristiques, liste des commandes, etc.) et vous allez avoir besoin de récupérer telle ou telle information très souvent (pour l’affichage d’une page produit, pour la connexion à votre site, etc.). Dans ces cas-là, l’usage d’une base de données est plus que recommandé, il est essentiel.

# Qu’est-ce que le SQL ?

SQL est l’abréviation de Structured Query Language ou langage de requêtes structuré en français.

Le SQL est le langage principal utilisé pour accéder aux bases de données et les manipuler. Nous allons utiliser ce langage pour exécuter toutes sortes de requêtes dans une base de données : récupérer des données, les mettre à jour, en insérer de nouvelles ou même créer de nouvelles bases de données.

Le SQL est un langage à part entière : il possède sa propre syntaxe que nous allons découvrir dans les chapitres suivants.

# Qu’est-ce que le MySQL ?

Le MySQL est ce qu’on appelle un système de gestion de bases de données. De manière très schématique, c’est un programme qui va nous permettre de manipuler simplement nos bases de données.

En effet, les bases de données sont des systèmes très complexes. Nous utilisons un système de gestion de bases de données pour cacher cette complexité et effectuer simplement les opérations dont nous avons besoin sur nos bases de données.

Le MySQL est loin d’être le seul système de gestion de bases de données ; il en existe bien d’autres. Parmi les plus connus, on peut ici notamment citer SQL Server, MS Access ou encore Oracle. Chacun de ces systèmes de gestion de bases de données fonctionne de manière similaire (ils permettent d’envoyer des instructions SQL) et propose des fonctionnalités relativement équivalentes.

Dans ce cours, nous utiliserons le MySQL pour des raisons simples : il est gratuit, simple d’utilisation, utilise du SQL standard et le PHP supporte son usage.

Nous allons donc pouvoir utiliser le MySQL en PHP pour passer des ordres à nos bases de données : le MySQL va nous servir à envoyer nos requêtes écrites en SQL standard à nos bases de données.

Dans ce cours, nos bases de données seront ainsi des bases de données MySQL.

# Qu’est-ce que phpMyAdmin ?

Nous allons avoir deux moyens d’interagir avec nos bases de données MySQL : soit en envoyant nos requêtes à partir de nos fichiers de code PHP, soit directement via l’interface phpMyAdmin.

phpMyAdmin est un logiciel gratuit code en PHP qui sert à gérer directement nos bases de données MySQL. Dans phpMyAdmin, nous allons par exemple pouvoir directement créer une nouvelle base de données ou envoyer toutes sortes de requêtes SQL à nos bases de données.

phpMyAdmin est un logiciel qui nous permet donc d’accéder directement aux données de nos bases de données et à gérer nos bases de données.

Notez que phpMyAdmin est embarqué et proposé sur tous les serveurs utilisant les bases de données MySQL. Vous allez également pouvoir y accéder en local et ceci que vous utilisiez Wamp, Mamp ou Lamp. Référez-vous à la documentation Wamp, Mamp ou Lamp pour plus d’informations.

# Pourquoi utiliser le PHP et le MySQL si je peux directement utiliser phpMyAdmin ?

Ces deux façons d’accéder aux données de nos bases de données et de les gérer concernent des utilisations et des situations totalement différentes.

phpMyAdmin est un logiciel formidable pour créer, modifier ou effectuer des opérations directement sur nos bases de données. En d’autres mots, il permet une utilisation manuelle de nos bases de données.

En revanche, nous n’allons pas pouvoir utiliser phpMyAdmin pour récupérer ou mettre à jour dynamiquement nos bases de données. Par dynamiquement, j’entends ici à un moment non connu à l’avance.

Par exemple, lorsqu’un utilisateur s’inscrit sur notre site, nous allons vouloir stocker différentes informations le concernant en base de données, afin de pouvoir s’en resservir par la suite : nom d’utilisateur, mot de passe, etc. Pour cela, nous devrons créer un formulaire d’inscription et utiliser le PHP et le MySQL pour traiter et stocker les données envoyées.

Pour faire très simple, vous pouvez retenir que dès qu’un utilisateur entre dans l’équation, nous allons utiliser le PHP et le MySQL. Encore une fois, phpMyAdmin ne va nous servir qu’à modifier directement et manuellement nos bases de données.

En résumé : les notions à retenir
- On appelle base de données une collection de données stockées dans des fichiers particuliers ;
- Les bases de données vont nous permettre de stocker de grandes quantités de données sans date d’expiration. Nous allons ensuite pouvoir manipuler ces données ;
- Le langage des bases de données est le SQL. C’est un langage de requêtes qui va nous permettre d’accéder aux bases de données et de les manipuler ;
- Nous n’allons pas pouvoir communiquer directement en SQL avec nos bases de données. Pour se faire, nous devrons utiliser un système de gestion de bases de données comme le MySQL ;
- Le MySQL va nous permettre d’envoyer des requêtes SQL. A la manière des expressions régulières, nous allons pouvoir l’utiliser avec le PHP ;
- Nous allons pouvoir envoyer nos requêtes SQL via le MySQL de deux façons : soit dans nos fichiers de code PHP, soit en passant par l’interface phpMyAdmin qi est un logiciel également codé en PHP ;
- Nous allons utiliser phpMyAdmin lorsque nous voudrons effectuer des actions manuelles directes sur nos bases de données. Dès que les appels à la base de données seront conditionnés par l’utilisateur, il faudra plutôt utiliser nos fichiers de code PHP.
