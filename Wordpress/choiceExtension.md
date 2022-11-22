# Choisissez et installez les extensions WordPress pertinentes pour votre projet

Comme vous l’avez vu, nous avons déjà installé les extensions recommandées lors de l’installation du thème OceanWP. Ces extensions ne couvrent cependant pas tous nos besoins. Voyons donc ensemble comment bien choisir et installer les extensions pertinentes pour votre projet.

## Comprenez ce qu’est une extension WordPress

Pour rappel, une extension WordPress est un composant WordPress permettant d’ajouter une fonctionnalité non prévue dans WordPress. Il existe des milliers d’extensions qui, comme les thèmes, peuvent être gratuites ou payantes et peuvent être disponibles dans la bibliothèque officielle WordPress.org, ou non.

Parmi les extensions installées lors de l’installation d'OceanWP, il y a par exemple “WP Forms”. Il s’agit d’une extension permettant d’ajouter simplement des formulaires de contact. Il existe de très nombreuses autres extensions pour créer des formulaires de contact. Nous pouvons citer par exemple Caldera Forms, Ninja Forms ou l’extension premium Gravity Forms, recommandée pour des formulaires complexes.

## Les addons

Certains composants WordPress ont des extensions qui leur sont dédiées, il s’agit en quelque sorte d’extensions d’extensions (ou d’extensions de thèmes). C’est le cas par exemple de l’extension Ocean Extra installée précédemment. Il en existe aussi énormément pour Elementor, le page builder que nous utilisons ; cherchez simplement “Elementor” dans la bibliothèque d’extensions WordPress.org pour vous faire une idée !

## Choisissez les extensions pertinentes pour votre projet

Les critères de choix d’une extension sont les mêmes que pour un thème :

- la dernière date de mise à jour ;
- les notes et commentaires ;
- la notoriété ;
- la rapidité de chargement ;
- l’aspect multilingue ;
- le support ;
- la source ;
- la qualité du design, la flexibilité et les fonctionnalités.

N’hésitez pas à relire le chapitre associé si vous ne les avez plus en tête, car ces critères sont très importants !

On peut enfin distinguer deux types d’extensions.

## Les extensions standard

Il s’agit d’extensions ajoutant des fonctionnalités essentielles à un site web, et que vous allez utiliser sur quasiment tous vos projets.

Pour notre exemple, nous allons choisir :

- “SEO Press” (ou Yoast SEO) pour optimiser le référencement naturel ;
- “Broken Link Checker” pour être alerté en cas de lien cassé sur notre site ;
- “Redirection” pour identifier les erreurs 404 et les rediriger vers des pages existantes ;
- “ShortPixel” pour optimiser le poids des images ;
- “Duplicate Page” pour dupliquer facilement une page, un article ou tout autre type de contenu ;
- “Central color palette” pour définir de façon centralisée les couleurs disponibles dans les palettes de choix de couleur du thème et de l’éditeur WordPress classique.

Toutes ces extensions sont disponibles sur WordPress.org. Installez-les donc directement depuis Extensions >> Ajouter, à l’aide du champ de recherche.

![](https://user.oc-static.com/upload/2021/04/14/16184118015977_10.png)

## Les extensions spécifiques

Il s’agit d’extensions répondant à des besoins spécifiques au projet. Dans notre cas, nous avons prévu les fonctionnalités suivantes :

- formulaire de contact ;
- pop-up pour inscriptions newsletter (optionnel).

Elementor propose de base des modules pour créer des compteurs dynamiques et des carrousels d’images. Nous avons par ailleurs déjà installé une extension pour les formulaires, WP Forms. Il nous reste à chercher des extensions pour créer des pop-up.

En faisant une recherche dans les extensions proposées sur WordPress.org, nous identifions l’extension “Hustle” permettant de créer des pop-up.

Installez et activez donc cette extension avant de passer à la suite.

> Faites attention à ne pas multiplier les extensions si cela n'est pas indispensable. Plus d'extensions signifie plus de travail de maintenance lors des mises à jour, et peut aussi potentiellement ralentir votre site. Il n'y a pas vraiment de recommandations concernant le nombre d'extensions pouvant être installées sur un site, car cela dépend énormément des extensions choisies. Mais faites attention à les choisir judicieusement, à désactiver et supprimer celles n'étant pas utilisées, et à ne pas installer plusieurs extensions pour la même chose !

## Sur CodeCanyon

Sur CodeCanyon tous les plugins sont payants. Attention, cela ne signifie nullement qu’ils sont meilleurs, mieux codés ou plus sécurisés, juste que l’auteur souhaite en tirer profit et de facto, il ne l’a pas mis à disposition gratuitement sur le répertoire WordPress.

Pour accéder directement aux plugins WordPress de Codecanyon, allez sur <https://codecanyon.net/category/wordpress/>, vous pouvez également filtrer vos recherches.

![](https://wpformation.com/wp-content/uploads/2017/06/codecanyon.jpg)

> Ne téléchargez jamais un plugin WordPress trouvé sur le web ou une copie d’un plugin premium cracké, c’est souvent un nid à malwares et vous risquez de vous en mordre les doigts très rapidement.

## Comment installer un Plugin WordPress premium ou payant

Si vous avez opté pour un plugin premium/payant sur Codecanyon ou ailleurs, généralement votre téléchargement contient un fichier ZIP.  Pour l’installer, rendez-vous dans votre back-office WordPress, Extensions >> Ajouter, mais cette fois-ci, cliquez sur “Mettre une extension en ligne” :

![](https://wpformation.com/wp-content/uploads/2017/06/5-installer-plugin-WordPress-payant.jpg)

Vous allez maintenant devoir envoyer le fichier .ZIP à votre WordPress qui va le télécharger puis le décompresser. Choisissez le fichier .ZIP du plugin à installer depuis votre PC ou Mac, indiquez-le à WordPress, cliquez sur “Installer” puis activez-le !

![](https://wpformation.com/wp-content/uploads/2017/06/6-selectionner-plugin-WordPress-payant.jpg)

Voilà, c’est tout simple !  Faites vos réglages et configurez le plugin comme indiqué dans le mode d’emploi de ce dernier (s’il est fourni).

## Comment installer un Plugin WordPress (gratuit ou payant) par FTP

Cette méthode d’installation par FTP est commune aux plugins du répertoire et aux plugins premium/payants.

Vous devez pour cela posséder un logiciel de FTP (File Transfer Protocol) et être en possession de vos identifiants FTP (généralement fournis par votre hébergeur). FileZilla est un logiciel de FTP gratuit et populaire qui fonctionne aussi bien sous Mac que sous PC.

Vous trouverez divers tutoriaux sur le web pour vous aider à le configurer, mais voici sommairement les informations des blocs du logiciel :

![](https://wpformation.com/wp-content/uploads/2017/06/7-filezilla.jpg)

Pour installer votre plugin WordPress par FTP, procédez comme suit :

- Depuis votre PC ou Mac, décompressez le fichier .ZIP du plugin WordPress
- Une fois ce dernier décompressé, connectez-vous à votre serveur via FTP avec les identifiants fournis par votre hébergeur
- Dans le répertoire FTP de /wp-content/plugins/, transférez le dossier du plugin décompressé (comme montré dans l’animation GIF ci-dessous)
- Enfin, attendez que le transfert soit terminé !

![](https://wpformation.com/wp-content/uploads/2017/06/installer-plugin-wordpress.gif)

Une fois que le transfert FTP du plugin est complet, rendez-vous dans votre administration WordPress sur Extensions >> Extensions installées, et activez le plugin !

![](https://wpformation.com/wp-content/uploads/2017/06/8-activer-plugin-wordpress-FTP.jpg)

Et maintenant que mon plugin est installé ?

Vous avez correctement installé votre plugin ? Très bien ! Mais ce n’est pas terminé, voici quelques conseils en vrac :

- Avant d’installer un plugin, une bonne sauvegarde s’impose, au cas ou.
- Pensez à toujours mettre à jour vos plugins, faites attention certains premium réclament un n° de licence pour bénéficier des mises à jour.
- Vérifiez que votre site fonctionne toujours correctement après l’installation du plugin, vérifiez les éventuels conflits entre plugins.
- Testez la vitesse de votre site afin de voir si le plugin ne le ralentit pas. Vous pouvez aussi vérifier l’impact du plugin avec l’excellent P3.
- Avant d’installer un plugin, demandez-vous si la fonction n’existe pas déjà sous WordPress, s’il est vraiment utile pour vous ou vos lecteurs.
- Pour désinstaller un plugin, on commence par le désactiver, ensuite on peut le supprimer.
- Enfin, n’installez pas tout et surtout pas n’importe quoi !

## LES MEILLEURS PLUGINS WORDPRESS GRATUITS

PLUGINS POUR COMMENTAIRES

    Askimet
    Disqus
    Subscribe to Comments
    Mention Comment’s Authors
    Yoast Comment Hacks

MEILLEURS PLUGINS SPECIAL SEO

    All in One SEO Pack
    WordPress SEO by Yoast
    SEO Smart Links
    SEO Friendly Images
    HeadSpace2 SEO
    Broken Link Checker
    Google XML Sitemaps

MEILLEURS PLUGINS DE PERFORMANCE

    WP Super Cache
    CDN Sync Tool
    WP Smush.it
    EWWW Image Optimizer
    WP Minify
    WP-Optimize

QUEL PLUGIN POUR VOS RESEAUX SOCIAUX

    Socialise
    AddToAny
    Add Link to Facebook

MEILLEURS PLUGINS POUR MEDIAS

    Scissors Continued
    NextGEN Gallery

BESOIN D’UN PLUGIN POUR MONÉTISER ?

    Advertising Manager
    Q2W3 Fixed Widget (Sticky)
    Ad Injection

PLUGINS DE SAUVEGARDE

    WP-DB-Backup
    BackWPup

PLUGINS SECURITE WORDPRESS

    Block Bad Queries (BBQ)
    Plugin Security Scanner
    WPS Hide Login

PLUGINS DE STATISTIQUES

    Google Analyticator
    WP Slim Stat
    WP-Stats-Dashboard

LES MEILLEURS PLUGINS UTILITAIRES

    JetPack
    Yet Another Related Posts Plugin
    Organize Series
    Custom Field Template
    Contact Form 7
    Redirection
    WP-PageNavi
    Simple URL Shortener
    TablePress

PLUGINS GRATUITS QUI FONT AUSSI BIEN QUE LES PREMIUMS

    ONESIGNAL
    RESPONSIVE LIGHTBOX
    COOKIE NOTICE
    GOOGLE ANALYTICS by MONSTERINSIGHTS
    MAILPOET

CORRIGER SES ERREURS DU DEBUTANT

    DUPLICATOR
    WP MAINTENANCE
    CHILD THEME CONFIGURATOR
    PHŒNIX MEDIA RENAME
    POST TYPE SWITCHER
    ENABLE MEDIA REPLACE
    POST DATE TIME CHANGE
    ADVANCED DATABASE CLEANER
    DUPLICATE POST

RESERVATION EN LIGNE

    Restaurant Reservations
    Appointment Booking Calendar
    Booking Calendar
    Pinpoint Booking System
    WP Booking System

COMING SOON

    Coming Soon Page & Maintenance Mode
    Easy Coming Soon
    Ultimate Landing page and coming soon page
    Coming Soon and maintenance mode
    Site Offline or Coming Soon
    Coming Soon CC
    Easy Maintenance Mode
    WooCommerce Coming Soon
    Verde – Responsive WordPress Coming Soon
    Coming Soon Countdown Responsive WordPress
