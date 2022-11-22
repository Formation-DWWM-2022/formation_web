# Protégez votre site des hackers

Nous savons tous qu’internet peut se révéler vulnérable. Les plus grands groupes du web ont des attaques régulières de hackers et de pilleurs de données. WordPress n’est pas à l’abri. En avril 2013, plus de 90000 sites WordPress ont été attaqués…

La sécurité de WordPress est un sujet crucial et essentiel pour tout administrateur système soucieux de préserver son site. Quand on réalise le temps de travail, d’écrits, et de réflexions que représente la création d’un site, il est dangereux d’être approximatif en ce qui concerne sa protection.

Les hackers sont toujours à la recherche de nouvelles failles. De multiples solutions de sécurité s’offrent à vous des plus simples ou plus pointues.

<!--
Sinon, n’oubliez pas d’installer un plugin de sécurité comme Wordfence (gratuit) ou SecuPress (payant, mais très complet). 
-->

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
