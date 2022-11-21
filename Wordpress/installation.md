# Pourquoi travailler son site localement ?

Beaucoup travaillent leur site en ligne par mesure de simplicité. Mais lorsque l’on en vient à développer des thèmes sur WordPress, il est préférable d’opter pour un environnement de développement local.

Certains d’entre vous se demandent quelle est la meilleure façon de travailler sur son site :

- Installer le site directement sur l’hébergement et travailler depuis Internet ?
- Installer un serveur local sur son ordinateur et travailler depuis sa machine ?

Nous allons voir que la bonne pratique est la deuxième solution :  travailler en local avant de mettre son site en ligne à la vue de tous.

> Un serveur local permet de faire tourner un site Internet sur son propre ordinateur et simule au mieux les conditions réelles d’un serveur d’hébergement web. En général un serveur local est composé d’Apache (ou Nginx) qui traite les requêtes (accès à une URL), de MySQL pour les bases de données et PHP pour interpréter le code et générer du HTML.

## Les défauts du travail en ligne

Lorsque vous commencez un site, il est tentant de l’installer directement en ligne et de travailler au travers de son FTP.

Cette technique ne fonctionne que si vous travaillez seul.

Et le jour où vous décidez de rendre enfin le site accessible aux internautes, et que quelques semaines plus tard vous avez besoin de faire des modifications, vous êtes bloqué : des modifications à chaud risquent d’entrainer des bugs et bloquer la navigation.

Si votre client vend des produits depuis son site et que vous faites une boulette, il ne va pas être content de son manque à gagner !

Il est essentiel d’avoir une approche propre et efficace lorsque l’on développe des sites pour son client ou pour soi-même, c’est pour ça que nous allons travailler pour le moment en local !

> Attention à ne jamais faire de modification directement en production, il vaut mieux avoir une copie locale du site ou un environnement dit de « staging » afin de tester en amont les modifications et bien veiller à ce qu’elles ne cassent pas le site !

## Travailler en local

Il est essentiel de pouvoir coder sur une instance isolée de son site, afin de pouvoir faire tous les tests nécessaires avant la mise en production.

Si je devais faire une métaphore, je dirais que travailler en ligne c’est comme réparer un avion en plein vol. Ça ne se fait pas pour des raisons évidentes. On attend donc que l’avion soit au sol, dans son hangar, pour lui faire tous les ajustements nécessaires.

![](https://capitainewp.io/wp-content/uploads/2017/05/domenico-loia-272251-1600x1067.jpg)

## Les avantages du travail en local

Le principal avantage est que vous pouvez travailler une copie de votre site, pendant que le vrai reste fonctionnel en ligne. Vous pouvez tester, casser, ajouter du code : le site en ligne n’est pas impacté et ne risque pas l’interruption.

Vous pourrez créer du faux contenu en local pour effectuer tous types de tests les plus extrêmes et vous assurer du bon fonctionnement du code. Vous pourrez par exemple passer autant de fausses commandes sur WooCommerce que nécessaire ou encore créer des faux articles via un outil comme FakerPress.

Il faut voir votre site local comme un brouillon de votre site réel.

Enfin, travailler en local ne requiert pas Internet ! Du coup vous pouvez continuer de travailler dans le train, dans l’avion où à la campagne chez mémé Ginette.
Les problématiques apportées par le travail local

On va voir que travailler en local amène aussi son lot de problématiques :

    Avoir deux instances du même site

Du coup avec cette méthode on se retrouve avec 2 sites différents : un sur l’ordinateur et un en ligne. Les modifications effectuées sur l’un ne se reflètent pas automatiquement sur l’autre. Lorsqu’un contenu est modifié en ligne, il n’est pas répercuté sur la base de données locale. Idem pour les extensions, si vous en installez une en ligne il faudra également l’installer en local.

    Comment synchroniser le site local et en ligne ?

Pour envoyer les fichiers modifiés vers le site en ligne, il suffit d’un logiciel FTP. Mais sur le long terme en effet cette solution peut être un peu limitante.  Sachez simplement pour le moment qu’il existe des outils pour automatiser l’envoi des fichiers modifiés vers le site en ligne.

Concernant la base de données, il existe des extensions comme Migrate DB Pro pour facilement les synchroniser. Elle vaut son prix mais peut s’avérer très vite nécessaire. Une alternative gratuite est VersionPress.

## avec Wamp ?

Pour vous présenter WAMPserver rapidement ,c’est une plateforme de développement web sous Windows, et qui vous permet à votre échelle de développer votre site WordPress sans avoir à acheter un nom de domaine ou réserver un hébergement web (vous allez surement le faire mais pas tout de suite).

![](https://www.wpdezero.com/wp-content/uploads/2021/08/Installer-WordPress-en-local-avec-WAMP.png)

- [Comment installer WordPress en local avec Wamp - TutoWP.fr](https://youtu.be/6kHN8IfbZfI)

### Créer une base de données MySQL avec Wamp

Wamp est installé, nous sommes prêts pour passer à l’étape suivante. Pour faire fonctionner WordPress, il faut créer une nouvelle base de données.

Pour cela, il faut aller dans le menu de Wamp puis cliquer sur PhpMyAdmin. Vous pouvez également y accéder en tapant « localhost/phpmyadmin ». Cet outil permet de gérer une base de données facilement.

Pour vous connecter, l’identifiant par défaut est « root » et il n’y a pas besoin de mot de passe.

Vous n’avez plus qu’à créer une base de données nommée « wordpress ».

### Installer WordPress dans le dossier « www » de Wamp

Dans le dossier où a été installé Wamp, vous devriez trouver un dossier « www ». C’est ici que vous allez installer votre site. Pour cela, vous pouvez créer un dossier « wordpress » à l’intérieur de celui-ci.

Pour récupérer les fichiers de WordPress, rien de plus simple. Rendez-vous sur [WordPress.org](https://fr.wordpress.org/) et cliquez sur « Obtenir WordPress ».

Une fois téléchargé et la décompression du fichier zip effectué vous pouvez déplacer les fichiers dans le dossier précédemment créé.

Tout est prêt pour la future installation de WordPress.

### Lançons l’installation de WordPress

L’étape finale consiste à lancer l’installation de WordPress comme on le ferait pour une installation classique.

Prenez votre navigateur web préféré et installez WordPress en vous rendant à l’adresse « <http://localhost/wordpress> ».

![](https://www.tutowp.fr/wp-content/uploads/2019/11/installation-wordpress-1.png)

Jusqu’ici, tout va bien, on clique sur « C’est parti ! ».

![](https://www.tutowp.fr/wp-content/uploads/2019/11/installation-wordpress-2.png)

L’installation de WordPress à besoin d’établir une connexion à la base de données.

Dans le nom de la base de données, il faut mettre le nom de la base que nous avons créé.

L’identifiant par défaut dans Wamp est « root » et il n’y a pas de mot de passe.

Pour ce qui est de l’adresse de la base de données, vous pouvez laisser « localhost ».

Cliquez sur « Envoyer » !

![](https://www.tutowp.fr/wp-content/uploads/2019/11/installation-wordpress-3.png)

Yes ! La connexion est établie. On continue en cliquant sur « Lancer l’installation ».

![](https://www.tutowp.fr/wp-content/uploads/2019/11/installation-wordpress-4.png)

Ici, vous devez entrer le nom de votre site, votre nom d’utilisateur administrateur et votre mot de passe. Ces identifiants vous permettront de se connecter à l’interface d’administration. Une fois que c’est fait, appuyez sur le bouton « Installer WordPress ».

![](https://www.tutowp.fr/wp-content/uploads/2019/11/installation-wordpress-5.png)

Bravo, l’installation est complète ! Vous n’avez plus qu’à vous connecter et à administrer votre blog WordPress !

## avec LocalWP par Flywheel ?

- [Installer WordPress en Local avec LocalWP](https://youtu.be/YOyEUpfZjp0)

Vous avez déjà installé des sites en local et c’était la galère ? Oubliez tous vos soucis grâce à Local. Dans ce cours on va installer le logiciel et notre premier site WordPress sans aucun effort !

Commençons tout d’abord par vanter les mérites de Local. Vous verrez que je ne manque pas d’éloges à propos de ce logiciel mais vous allez vite comprendre que c’est justifié ! Voici mes 7 arguments principaux :

1. Une ergonomie minimaliste

J’adore ! C’est simple, c’est beau, c’est moderne et c’est efficace. Finis les menus à rallonge et les options dans tous les sens comme sur MAMP et compagnie. Ici c’est épuré, il n’y a que l’essentiel, et ça marche !

A gauche : mes sites, à droite, les informations du site en cours avec un bouton d’accès au site et à l’admin.

![](https://capitainewp.io/wp-content/uploads/2017/05/local-site-installed-1600x1057.jpg)

2. L’installation en 3 clics

Vous vous rappelez de l’époque où il fallait télécharger WordPress depuis wordpress.org, puis dézipper l’archive, la mettre dans un dossier, créer une entrée sur MAMP, créer la base, lancer l’installation ?

On oublie tout cela. L’installation en (presque) un clic simplifie grandement la vie ! Il suffit de mettre le nom du site, éventuellement choisir quelques paramètres et hop, le tour est joué.

On va voir cette procédure en détails un peu après.

3. Templates de sites « Blueprints »

Même si l’installation est rapide, Local vous permet d’aller encore plus loin : enregistrer un site installé en modèle, pour le réutiliser la prochaine fois.

Comprenez bien : installez un premier site, installez les extensions incontournables, le thème, créez les premières pages habituelles (contact, accueil, blog, mentions légales…), faites vos configurations, et ensuite enregistrez l’état de votre site en tant que modèle.

La prochaine fois repartez de cette exacte configuration. Vous allez gagner jusqu’à une heure environ à chaque lancement de projet. Ayant fait plus de 100 sites quand j’avais mon agence, je vous avoue que j’aurais bien aimé avoir cet outil à l’époque !

4. SSL + E-mails en local

Local peut émettre un certificat SSL local. Comme ça vous pouvez travailler dans des conditions réelles en HTTPS. Il est également possible de simuler un serveur de mail local qui vous permettra de recevoir les e-mails du système. N’est-ce pas parfait ? Patience, je vous détaille tout cela dans un instant.

5. Environnement cloisonné pour chaque site

Contrairement aux autres plateformes, et grâce à Docker qui tourne sous le capot, chacun de vos sites pourra avoir une configuration différente : Votre site A peut tourner en PHP 5.6 alors que le site B sera en PHP 7. Cela permet se caler au plus proche de la configuration réelle de vos hébergements.

6. Performances au rendez-vous

Local marche bien, et il est rapide ! Aucun ralentissement, les pages se chargent vite, bref, ça fonctionne à merveille ! Et en termes de consommation de mémoire il reste très correct. Du fait que chaque site est cloisonné, vous n’êtes pas obligé de tous les lancer. Cela permet de rester économe sur la RAM.

7. Plus fiable que ses concurrents

Local, il marche d’enfer. Quelques fois j’ai eu la machine virtuelle qui a sauté, mais d’un clic elle se relance et tout rentre dans l’ordre. Je n’ai jamais rencontré de perte de données ou de bugs vraiment bloquants.

C’est l’une des choses les plus frustrantes du côté MAMP, WAMP… Il suffit de voir le nombre d’articles et de demandes d’aide sur les forums.

> On l’appelle aujourd’hui Local, mais vous pourriez voir le nom « Local By Flywheel ». C’est bien le même logiciel. Le nom a changé depuis que Flywheel a été racheté par WPEngine.

### Installer Local

Allez c’est parti, vous allez voir, rien de plus simple ! Ce cours en est presque inutile tellement l’opération va être facile !

Rendez-vous sur le site officiel et téléchargez [Local](https://localwp.com/).

Le site vous demandera votre système d’exploitation, Windows ou Mac ainsi  que quelques informations personnelles, mais ne vous inquiétez pas, il ne vous spammeront pas pour autant.

Le programme d’installation pèse environ 230Mo. J’espère que vous avez la fibre ou au moins une bonne ADSL !

L’installation est ensuite tout ce qu’il y a de plus classique. Une fois le logiciel installé, lancez-le et on va pouvoir ajouter notre premier site !

### Installer un site WordPress avec Local

Rien de plus simple. Commencez par cliquer sur le bouton + en bas à gauche.

1. nom du site

Indiquez le nom du site :
![](https://capitainewp.io/wp-content/uploads/2017/05/local-site-step1-1600x1080.jpg)

Si vous êtes curieux affichez les options avancées. Vous pouvez :

- Mettre un nom de domaine différent ;
- Choisir l’emplacement du site sur votre disque ;
- Utiliser un modèle (j’y reviens dans un moment).

> Local crée vos sites en utilisant le nom de domaine factice « .local ». Il utilisait auparavant .dev mais cette extension existe désormais sur Internet et est gérée par Google.

Concernant l’emplacement du site, il vous est possible de définir un dossier par défaut dans les préférences du logiciel. Personnellement je les range tous dans le dossier /sites/

> Lorsque vous choisissez manuellement un emplacement, il faut préalablement créer le dossier qui accueillera les fichiers du site car Local ne le fait pas : il installe les fichiers dans le dossier indiqué. Heureusement, il vous indique lorsque ce dossier cible n’est pas vide pour limiter tout risque d’erreur ou d’écrasement.

2. Choix de l’environnement

La plupart du temps, laissez sur Preferred et continuez ! Local choisira une version récente de PHP et MySQL.

![](https://capitainewp.io/wp-content/uploads/2020/03/local-environnement.jpg.webp)

Si vous voulez choisir votre propre environnement, cliquez sur Custom. Vous allez pouvoir choisir la version de PHP et de MySQL.

Pourquoi choisir un environnement personnalisé ? Le but serait d’avoir exactement la même version des technologiques que sur votre serveur d’hébergement. Mais en réalité, WordPress n’est pas très contraignant, et même si vous avez des versions différentes, ça fonctionnera tout de même (en général).

3. identifiants

Dernière étape, il suffit maintenant d’indiquer un nom d’utilisateur, un mot de passe et un e-mail.

![](https://capitainewp.io/wp-content/uploads/2017/05/local-site-step3-1600x1080.jpg)

Dans les options avancées vous trouverez une option pour initialiser le multisite.

Allez on valide et le tour est joué ! Votre système vous demandera votre mot de passe car le logiciel a besoin de faire des modifications bas niveau.

Le site est ensuite installé et tourne dans son environnement :

![](https://capitainewp.io/wp-content/uploads/2020/03/local-sites.png.webp)

### Accéder à la base de données

Local ne propose pas PHPMyAdmin. mais à la place il propose Adminer et Sequel Pro que vous trouverez dans l’onglet Database . Le premier est un service déjà intégré au logiciel, qui ressemble à PHPMyAdmin en plus léger.

![](https://capitainewp.io/wp-content/uploads/2022/03/adminer-1600x1061.jpg.webp)

### Montrer votre site local à distance

C’est bien cool de travailler en local, mais si je veux montrer le site à mon client ?

Local a la solution ! Grâce au Live Link, Il va créer un tunnel depuis votre ordinateur vers Internet, avec une adresse provisoire, et votre client pourra consulter le site tant que votre ordinateur n’est pas en veille.

En bas de la fenêtre de Local, cliquez sur Enable à côté de Live Link. Une adresse en .localsite.io va apparaitre, précédée d’une suite de mots.

![](https://capitainewp.io/wp-content/uploads/2017/05/activer-ngrok-local.jpg)

C’est cette adresse qu’il faut donner à votre client afin qu’il puisse consulter votre site local à distance !

### SSL et e-mails en local

Mais le souci en local, c’est qu’on n’a pas les e-mails !

Eh ben si ! Local vous permet de dire au navigateur de croire le certificat Open SSL local pour fonctionner en HTTPS. Pour cela rendez-vous dans l’onglet SSL et cliquez sur Trust.

![](https://capitainewp.io/wp-content/uploads/2017/05/trust-local-ssl.jpg)

Enfin, vous pouvez aussi capter les e-mails envoyés par votre site (par exemple l’e-mail de réinitialisation de mot de passe) grâce à Mailhog, que vous trouverez dans l’onglet Utilities.

![](https://capitainewp.io/wp-content/uploads/2017/05/local-mailhog.jpg)

Contrairement à ce que l’on pourrait croire, l’e-mail n’est pas réellement envoyé au destinataire, il est juste capté et affiché par Mailhog mais n’ira pas plus loin. Pratique pour tester des fausses commandes, création de compte sans réellement envoyer les e-mails.

## avec Docker ?

- <https://www.armandphilippot.com/article/docker-installation-wordpress>

## Travailler sur un projet en équipe

En équipe il faut encore s’organiser autrement : bien souvent plusieurs personnes travaillent en même temps sur le même site. Il n’est alors pas installé en local mais sur un serveur de l’entreprise afin que chacun puisse y accéder au besoin.

Un autre souci de taille s’impose : que se passe-t-il si plusieurs développeurs modifient les mêmes fichiers en même temps ?

C’est là qu’entre en jeu Git, qui permet de versionner votre code, c’est-à-dire créer des enregistrements à des étapes clés (un peu comme lorsque l’on sauvegardait manuellement un jeu vidéo jadis, avant d’entamer une partie difficile où d’affronter un boss).

Git permet également, lorsque plusieurs personnes éditent un fichier, de fusionner toutes les modifications automatiquement. Et si d’aventure 2 développeurs ont modifié la même ligne, ils sont informés du conflit et peuvent le régler facilement en indiquant quelle version conserver.

Si à la base Git se manipule en ligne de commande, il existe toutefois une application native bien pratique.

![](https://capitainewp.io/wp-content/uploads/2017/05/github-desktop-mac-1600x1110.png)

Vos codes peuvent ensuite être hébergés hors site sur les plateformes Github ou Bitbucket par exemple, de manière privée ou publique, si jamais vous faites un projet open source que vous voulez partager avec la communauté.

D’ailleurs c’est là que j’héberge les fichiers des exercices de cette formation !

Et même si vous travaillez seul, je vous conseille de versionner votre code. En cas de souci vous pourrez toujours revenir à une version plus ancienne ou retrouver un bout effacé. Personnellement tous mes projets sont « GITtés » et hébergés sur Bitbucket et Github pour dormir sur mes deux oreilles la nuit.

> WordPress utilise SVN plutôt que Git pour versionner son coeur et permettre aux équipes de bénévoles de participer au projet. SVN est un équivalent de Git, un peu plus ancien, et reconnu pour sa complexité. Si vous venez à faire une extension WordPress, vous pourrez utiliser Git pour le développement mais il faudra passer par SVN pour la mise en ligne sur le répertoire des extensions.
