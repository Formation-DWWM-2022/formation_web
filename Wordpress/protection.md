# Protégez votre site des hackers

- [Comment sécuriser son site WordPress : 2 astuces pour débutant](https://www.youtube.com/watch?v=sOGRJM4q2uU)
- [Comment sécuriser son site Wordpress ? Les meilleurs plugins de sécurité gratuits](https://youtu.be/TR2zUC3BnPs)
- [✅ Avis + Tuto WordFence : le meilleur plugin de sécurité ? 🔐](https://youtu.be/fNGi4XRc9nU)

Nous savons tous qu’internet peut se révéler vulnérable. Les plus grands groupes du web ont des attaques régulières de hackers et de pilleurs de données. WordPress n’est pas à l’abri. En avril 2013, plus de 90000 sites WordPress ont été attaqués…

La sécurité de WordPress est un sujet crucial et essentiel pour tout administrateur système soucieux de préserver son site. Quand on réalise le temps de travail, d’écrits, et de réflexions que représente la création d’un site, il est dangereux d’être approximatif en ce qui concerne sa protection.

Les hackers sont toujours à la recherche de nouvelles failles. De multiples solutions de sécurité s’offrent à vous des plus simples ou plus pointues.

![](https://wpformation.com/wp-content/uploads/2014/06/securite-wordpress.jpg)

    1- Le compte Admin

En premier lieu, quelque soit la méthode d’installation choisie, créez toujours un nouveau compte ADMIN avec un login + mot de passe ultra sécurisé.

Si possible évitez de choisir un login avec votre prénom ou la racine de votre domaine.

    2- Mot de passe

Il faut toujours utiliser des mots de passe complexes associant lettres, symboles et chiffres.

Il vous faut employer de préférence un générateur de chaîne aléatoire de plus de 12 caractères. Vous aurez ainsi un login bien plus sûr.

    3- Pensez à restreindre le nombre d’essais d’identification

Plusieurs plugins permettent de vous protéger des attaques par “force brute”, c’est-à-dire les tentatives pour deviner votre mot de passe par une recherche de toutes les combinaisons possibles.

Installez une extension qui bloque les tentatives répétées d’une même adresse IP. (WPS Limit Login par exemple). Si un robot tente d’entrer sur votre site, cela bloque l’accès pendant un certains temps. Une fois l’extension installée, vous pouvez paramétrer le nombre d’essais que vous voulez avant blocage et le temps de connexion après le blocage.

    4- Pensez à masquer la version de votre WordPress

Votre version donne des informations aux hackers pour trouver d’éventuelles failles de sécurité. Dans le fichier function.php de votre thème, ajoutez ce bout de code :

remove_action("wp_head", "wp_generator");

Le numéro de version WP se trouve également dans le fichier readme.html situé à la racine de votre WordPress (fichier à supprimer également)

    5- Faites des sauvegardes

Les backups du système sont à effectuer au moins toutes les semaines pour prévenir un piratage ou un crash disque.  Il vaut mieux prévenir que guérir!

Sous WordPress les solutions pour la sauvegarde ne manquent pas.

    6- Soyez prudent lorsque vous téléchargez des templates

Les thèmes gratuits télécharger au hasard du web peuvent révéler de nombreux virus.

Pour vous protéger, installez un plugin de type TAC, comme par exemple : Theme Authenticity Checker, celui-ci scanne et analyse les thèmes à la recherche d’un éventuel virus.

    7- Faites des mises à jour régulières

C’est du basique mais cela reste essentiel, toujours avoir la dernière version, c’est essentiel !

- Mettez à jour votre WordPress car cela permet d’avoir les tous derniers correctifs des failles de sécurité.
- Voyons aussi comment mettre à jour vos plugins afin d’avoir toujours la version la plus récente/secure et aussi pour éviter tout risque d’incompatibilité.
- Il n’y a pas que les plugins et WordPress, mettez à jour votre thème.

Encore une fois avant toute mise à jour, pensez à sauvegarder votre site.

    8- Ajouter/changer les clefs de sécurité secrètes

Les clés d’authentification SALT créent un cookie d’identification qui protège votre installation.

Si ces codes ne sont pas présents dans votre fichier wp-config.php, vous pouvez les générer et les ajouter en vous rendant sur <https://api.wordpress.org/secret-key/1.1/salt/>

![](https://wpformation.com/wp-content/uploads/2014/06/wordpress-salt-keys1.jpg)

    9- Protégez vos fichiers

Bloquez la navigation dans vos dossiers WordPress. Par défaut, n’importe qui peut accéder au contenu de vos dossiers WordPress (wp-content) via un simple navigateur.

Pour protéger le fichier wp-config via votre .htaccess, ajoutez:

```
<Files wp-config.php>
    order allow,deny
    deny from all
</Files>
```

Pour cacher les répertoires sensibles toujours via le htaccess:

```
Options All -Indexes
```

Enfin pour protéger le fichier htaccess lui-même:

```
<Files .htaccess>
    order allow,deny
    deny from all
</Files>
```

    10- Changez le préfixe “wp_”

Par défaut le préfixe des tables de la base MYSQL pour WordPress est “wp_”. Ce préfixe est connu de tous et peut être vulnérable en cas d’injection.

Utilisez le plugin Brozzme DB Prefix,  un outil en un clic pour modifier votre préfixe de base de données (base de données et wp-config.php). Pour appliquer un nouveau préfixe, il vous suffit de vérifier que le wp-config.php est inscriptible et que les droits Alter de la base de données sont activer.

Une seule entrée est nécessaire : le nouveau préfixe de base de données. Le plugin va s’occuper de tout. Vous n’avez qu’à appuyer sur le bouton si vous êtes ok avec le préfixe généré. Bien sûr, le préfixe peut être modifié pour répondre à vos besoins.

    11- Masquez les erreurs de connexion

WordPress renvoie un message bien trop explicite en cas de problème de connexion, ajouter la ligne suivante à votre functions.php du thème permet d’afficher un message d’erreur banalisé:

```
add_filter('login_errors',create_function('$a', "return null;"));
```

    12- Désactiver l’éditeur de fichiers

Empêchez l’édition de vos fichiers directement depuis WordPress, ajouter simplement la ligne suivante à votre functions.php:

```
define('DISALLOW_FILE_EDIT',true);
```

    13- Déplacer votre PhpMyAdmin

Cette application Web permet de gérer vos bases de données, située généralement à l’adresse suivante: /monsite.com/phpmyadmin, il est fortement recommandé de la déplacer (voir avec votre hébergeur ou infogérance).

    14- Déplacer votre page de login

A l’aide d’un simple plugin tel que WPS Hide Login vous pouvez changer votre URL de connexion WordPress et limiter ainsi les attaques par “Brut Force” des hackers.

    15- Choisissez un hébergement spécialisé WordPress

Laissez votre hébergeur se préoccuper de la sécurité. Avec un hébergeur WordPress, votre site est entre de bonnes mains, certes plus cher que le mutualisé, ce type d’hébergement maintient, protège, répare et optimise votre site.

## Aller plus loin pour sécuriser WordPress

Sur un site WordPress, deux notions essentielles sont à penser le filtrage et la désinfection. Un utilisateur peut s’infiltrer par des moyens multiples et le codage sert à détecter le piratage (chaines de caractères suspects, emails incorrects). Un bon codage sert à bloquer ces tentatives d’intrusions. La désinfection se fait à l’aide un antivirus efficace qui scanne les failles de sécurité de votre site.

Pensez à vous informer régulièrement sur les nouvelles failles de sécurité. Elles sont nombreuses et en étant vigilant, vous pouvez les devancer et être toujours bien protégé. Pensez à être constant dans vos vérifications de sécurité, car elles ne peuvent jamais être sûres à 100%.

En bonus, retrouvez ci après 4 solutions pour renforcer la sécurité de WordPress:

- Passer votre WordPress en HTTPS, c’est la meilleure façon de protéger les données de vos utilisateurs et de vous défendre contre l’usurpation d’identité. Les sites sécurisés via SSL bénéficient en outre, d’un avantage pour leur référencement dans les pages de résultats de recherche.
- Un moyen détourné pour se protéger est de camoufler son WordPress, pour se faire il existe le plugin HideMyWp. Ce dernier déplace certains répertoires et masque le fait que vous utilisiez un WP. Attention toutefois sa configuration peut être périlleuse…
- Enfin, l’antivirus que je préfère : WordFence. C’est un plugin freemium, c’est à dire que les options de base sont gratuites et certaines réservées aux utilisateurs premium. Très efficace et performant, je vous invite à lire le tutoriel complet de cet antivirus pour WordPress.

Enfin et pour conclure : Protégez votre travail par de vrais mots de passe sécurisés, faites des sauvegardes régulières, installez un antivirus qui scanne régulièrement votre site et vos fichiers. Ce sont là des actes de préventions importants.

La création d’un site WordPress demande du temps, il mérite d’être à l’abri !

## Quels sont les plugins avec des failles ?

Problème ! Certains plugins contiennent des failles et ne sont pas patchés. Ce qui sous entend que le plugin n’a pas de mise à jour corrigeant la faille. C’est souvent l’affaire de quelques jours mais en attendant l’extension concernée est potentiellement dangereuse…

Jusqu’à présent, seule la veille technique vous permettait de le savoir. Vous pouvez d’ailleurs suivre les comptes twitter ou les flux RSS suivants:

    @WPVuln
    @Secupress
    Flux sécurité WPServeur
    Site de WPVulndb.com

Si ces ressources sont utiles, le risque est grand de rater une faille ou de ne pas être suffisament assidu lors de sa veille technique de sécurité…

## Un plugin qui vous informe des failles

L’idéal ce serait d’être informé personnellement des plugins à risque, mieux même, de recevoir directement dans sa boite email les alertes !

Souriez, c’est chose faite avec le Plugin Security Scanner :)

![](https://wpformation.com/wp-content/uploads/2015/07/plugin-security-scanner.jpg)

Le plugin “Plugin Security Scanner” détermine si l’un de vos plugins contient des failles de sécurité connues. Pour ce faire, le plugin pioche via API dans la base de données de vulnérabilité WPScan et fait une comparaison avec vos plugins installés.

Plugin Security Scanner va lancer un scan une fois par jour, et enverra automatiquement un e-mail à l’administrateur WordPress si des plugins vulnérables sont detectés.

![](https://wpformation.com/wp-content/uploads/2015/07/screenshot-2.png)

Le plugin ajoute également une nouvelle option dans votre menu Outils d’administration appelée «Plugin Security Scanner”. En cliquant sur ce menu,  Plugin Security Scanner exécute une analyse immédiate. Si le scan détecte des problèmes, il vous affiche une liste de plugins avec vulnérabilités, ainsi qu’une description de ces dernières.

![](https://wpformation.com/wp-content/uploads/2015/07/screenshot-1.jpg)

Bref, vous n’aurez plus aucune excuse pour ne pas être au courant avec ce plugin permettant d’améliorer tout simplement la sécurité de vos WordPress !

## iTHEMES SECURITY

![](https://wpformation.com/wp-content/uploads/2016/12/ithemes-security.jpg)

iThemes Security est un vrai couteau-suisse pour la protection de votre site WordPress, et ce, dès sa version free ! Parmi ses nombreuses fonctionnalités telles que la détection des erreurs 404, le mode absent, la blacklist, la détection de changement de fichier etc… il y a bien-sûr la protection contre les attaques par force brute.

![](https://wpformation.com/wp-content/uploads/2016/12/ithemes-security-settings.jpg)

## Wordfence : LE Plugin de Sécurité WordPress

Wordfence est un plugin freemium, c’est à dire que les options de base sont gratuites et certaines réservées aux utilisateurs premium.

![](https://wpformation.com/wp-content/uploads/2014/05/wordfence.jpg)

## Le pare-feu le plus efficace pour votre WordPress

Wordfence inclut un pare-feu de point de terminaison et un scanner de logiciels malveillants qui ont été construits à partir du core pour protéger WordPress. Le flux de défense de menace arme Wordfence avec les dernières règles de pare-feu, signatures de logiciels malveillants et adresses IP malveillantes dont il a besoin pour garder votre site WordPress en sécurité. Complété par 2FA et une suite de fonctionnalités supplémentaires, Wordfence est la solution de sécurité WordPress la plus complète disponible.
Pare-feu WordPress

Le pare-feu des applications Web identifie et bloque le trafic malveillant. Construit et entretenu par une grande équipe axée à 100% sur la sécurité WordPress.

    [Premium] Règle de pare-feu en temps réel et mises à jour de signature de logiciels malveillants via le flux de défense de menace (la version gratuite est retardée de 30 jours).
    [Premium] La liste noire IP en temps réel bloque toutes les demandes des adresses IP les plus malveillantes, protégeant votre site tout en réduisant la charge.
    Protège votre site au point de terminaison, permettant une intégration profonde avec WordPress. Contrairement aux alternatives cloud ne casse pas le chiffrement, ne peut pas être contourné et ne peut pas fuite de données.
    Le scanner de logiciels malveillants intégré bloque les demandes qui incluent du code ou du contenu malveillant.
    Protection contre les attaques par force brute en limitant les tentatives de connexion.

![](https://wpformation.com/wp-content/uploads/2014/05/wordfence-parefeu-1024x829.jpg)

Wordfence commence par vérifier si votre site est déjà infecté en faisant une analyse côté serveur de votre code source et en le comparant au référentiel WordPress officiel de base (thèmes et plugins compris). Puis il s’installe et sécurise votre site.

    Le scan de votre WordPress

La partie centrale de Wordfence, ici le plugin va passer au scan votre serveur (selon options) et va comparer le code source avec le référentiel. Si il trouve une différence, vous recevrez un message d’avertissement. Il est également possible de corriger automatiquement cette erreur via màj. Vous pouvez, bien entendu, passer outre les avertissements et demander à ne plus être averti.

Rares sont les faux positifs, j’en ai pourtant eu un lié à la langue WP FR, j’en ai informé le support et ce faux positif n’apparaît plus désormais.

    Le trafic en temps réel

Le trafic en temps réel vous affiche en instantané tout le trafic de votre site, que ce soit les visiteurs, robots, les pages 404, les logins/logouts, etc… Utile si vous cherchez à identifier une IP spécifique, attention c’est également consommateur de ressources.

    La performance

Wordfence vous propose d’améliorer la performance de votre site à l’aide d’un cache, utile et à tester si vous n’en utilisez pas. Les valeurs d’améliorations données (de 30 à 50 fois plus rapide) me semblent cependant fantaisistes.

    Les IPs Bloquées Automatiquement

La partie de Wordfence qui fait peur ! En effet, vous allez voir ici toutes les IPs bloquées et notamment celles qui ont essayées de se connecter à votre WordPress ou celles qui abusent en terme de requêtes serveur.

Depuis les réglages, vous pourrez définir le nombre de tentatives avant blocage ainsi que le nombre maximal de requêtes autorisées par minute .

    L’Authentification par Téléphone

Réservée aux utilisateurs premium, cette option utilise une technique appelée “authentification à 2 facteurs” considérée comme l’une des formes les plus sûres de l’authentification à distance. Cela repose sur deux choses: Quelque chose que vous savez (votre mot de passe) et quelque chose que vous avez (votre téléphone portable). Pour accéder à votre site Web, vous devez connaître votre mot de passe et avoir votre téléphone portable avec vous.

Lorsque vous activez cette fonction pour vos utilisateurs, ils signent en utilisant leur nom d’utilisateur et mot de passe d’abord. Ensuite, ils reçoivent un SMS sur leur téléphone portable contenant un code.

    Les Pays Bloqués

Egalement réservée aux utilisateurs premium, cette options vous permet grâce à une simple case à cocher, d’empêcher certains pays d’accéder à votre site. Vous pouvez leur afficher le message de blocage par défaut de Wordfence ou les rediriger vers une page de votre choix.

    Planification des Scans

Toujours pour les utilisateurs premium, la possibilité de définir les créneaux pour les scans de sécurité. Tous les jours, 2 fois par jour, etc… Utile si vous souhaitez utiliser les ressources en pleine nuit lorsqu’il y a moins de visiteurs sur votre WordPress.

    La recherche de Whois

La recherche Whois pour savoir qui est qui ? Wordfence interroge les serveurs WHOIS sur Internet et obtient des informations sur le nom de domaine ou les propriétaires de l’adresse IP. Si vous voyez une adresse IP malveillante, faire une recherche pour savoir qui est responsable de cette IP et envoyer un e-mail “abuse”. Rarement efficace d’ailleurs!

    Le blocage d’IPs avancé

Cette option vous permet de bloquer les visiteurs sur toute une plage d’adresses IPs. Vous pouvez également bloquer certains types de navigateur qui visitent votre site à partir d’une certaine plage d’adresses IPs. Cela peut être utile lorsque vous bloquez une personne prétendant, par exemple, être un robot Google et utiliser un fournisseur de services Internet spécifique ou hébergeur.

    Les options de Wordfence

C’est là que ça se passe ! Toutes les options et réglages de Wordfence. Du numéro d’API en passant par le firewall, les logs de sécurité, les alertes, les scans à inclure…

Faites attention avec ces options, car elles peuvent rendre votre WordPress très restrictif. Avec pas moins de 30 réglages à paramétrer, il y a de quoi faire mais rassurez-vous, c’est relativement clair et ceux par défaut sont plutôt pas mal.

## WordPress piraté ou hacké : Comment bien réagir et réparer ?

Dans l’ordre, voici ce qu’il convient de faire si votre site WordPress a été hacké :

    Restez calme, cela arrive ou cela vous arrivera un jour ou l’autre
    Essayez de restaurer une sauvegarde, c’est de loin le plus simple et le plus rapide
    Faites une recherche sur l’origine du piratage
    Téléchargez votre code et passez le à l’antivirus
    Redéfinissez vos logins, mots de passe
    Réinstallez un WordPress intégralement, core, plugins et thème
    Vérifiez votre base de données à la recherche de base64 ou autre code malicieux
    Installez un vrai plugin de sécurité tel que WordFence
