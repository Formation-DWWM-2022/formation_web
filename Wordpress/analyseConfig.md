# Analyse wp-config.php et bonnes pratiques

Le fichier WP-Config permet à WordPress de se connecter à la base de données. Mais on va voir qu’il a aussi d’autres usages.

Dans le cours précédent, nous avons vu comment activer le mode débug depuis le fichier wp-config.php de WordPress. On va maintenant analyser ce fichier un peu plus dans les détails et je vous donnerais quelques améliorations que vous pourrez appliquer à tous vos projets.

Pour rappel ce fichier est généré lors de l’installation de WordPress, qui va utiliser pour base le fichier wp-config-sample.php.

Ouvrez votre fichier wp-config.php avec votre éditeur de code préféré, et analysons-le.

## Le fichier WP-config en détails

    La connexion à la base de données

Tout d’abord on va retrouver les identifiants de connexion à la base de données, que l’on a indiqués lors de l’installation :

```php
<?php
// ** Réglages MySQL – Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'votre_nom_de_bdd');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'votre_utilisateur_de_bdd');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'votre_mdp_de_bdd');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');
```

On retrouve : le nom de la base, l’utilisateur, le mot de passe et l’hôte (qui souvent est localhost).

On retrouve aussi l’encodage. Aujourd’hui sur le web l’encodage de caractères par défaut est UTF-8 car il a la particularité de prendre en compte tous les caractères non latins, c’est-à-dire les accents, les caractères spéciaux et les autres alphabets comme le cyrillique. Il n’y a donc aucune raison de changer cette valeur.

Enfin la collation reste généralement vide car c’est la base de données qui la définira d’elle même. Cette valeur n’est utilisée que dans des cas spécifiques.

## Les clés de salage

On a vu précédemment que les mots de passe dans la base de données ne sont pas stockés en clair, ils sont chiffrés par une fonction PHP qui le transforme en une série de chiffres et lettre d’une quarantaine de caractères. Ce chiffrement est dû en parti aux clés uniques définies dans le fichier de configuration de WordPress dont voici un exemple :

```php
<?php
define('AUTH_KEY',         '90bjQJ5EvBvXj6MOR0hWTpk3sln3rj6HiUwj8KJS5U/xy2UTZtBDAeCu58wjwRBUqYZRzOFIzYsw821pCOjkfQ==');
define('SECURE_AUTH_KEY',  'VNUkIeGWaSy4+rroZE/EUl/CrSlthWgj9eqzfQpE624HueEieBQyJ/6yjJdrnF8KZ18dJmNkD2UZAW114/VNbg==');
define('LOGGED_IN_KEY',    '9pGtIbtkb8MkAo8NOdQ3hVu305SpsJ/kQ2bamGaJpaYnI3LhyX09NKc1jCalut+CeKa7a8BoSCEMOREL00GnZQ==');
define('NONCE_KEY',        'r9zl8uirq5nj2aqXSgB+AvaswJJwsagDM/XMUTRr+GyrkZyDTwanoPjNSH/XhV6UHEfVQq1jcMJGcWVXhqaurw==');
define('AUTH_SALT',        'tz97UVEDqKBjYdKAAwP+Jf2uT4BYIWW46B0RIdYvHo9DV0QNpfU7bpgNDAp037HWy68EKUQ8m+i/fls7znPTbA==');
define('SECURE_AUTH_SALT', 'gWENfjG/SOMzZAfwQSJDlHGayKVIeqmpEqKul12YDwKbKaq15E3Oz9NRFNwuzTAwssHJVjSS8AUD6J142mvJBw==');
define('LOGGED_IN_SALT',   'SYHaeMGF4NmwVYNq3iJGv5lDVJKlN0YCebRcY1J7YHOci/RK5bJ59+3uFPvB/GgmthS23/96pYaKJmeBIMBbPw==');
define('NONCE_SALT',       'u/rethP//fBGb2eGQt+xmrkfYXsG1cRkkOumo85zzybqfVVMPSE3W+fgU0EQefo2M1s+NDK0w4WrxKm757vzkw==');
```

Afin de comprendre le but de clés uniques dites de « salage », faisons une petite aparté chiffrement/cryptographie.

Afin de ne pas garder des informations en clair dans la base de données (entre autres usages), on va utiliser une fonction de chiffrement, comme le SHA-1 (qui est utilisé dans les certificats SSL notamment) qui va transformer votre mot de passe, par exemple « coucou » en une série de chiffres et lettres comme « 1d5F3kP12… ».

Si je change un seul caractère, en mettant cette fois « Coucou » (avec un C majuscule), le chiffrement sera complètement différent, par exemple « 3Vb98df4… ».

Le principe est qu’une fois chiffré, il est impossible de retrouver le texte initial. Mais le problème est que « coucou » générera toujours « 1d5F3kP12… » donc quelqu’un qui s’amuserait à créer un dictionnaire des relations entre le texte original et sa version chiffrée pourrait facilement décoder un mot de passe crypté.

C’est là qu’interviennent les clés de salage (salt en anglais). La clé est générée aléatoirement à l’installation et est ajoutée à chaque mot de passe avant chiffrement. De cette manière ce n’est plus seulement « coucou » qui est chiffré mais « coucou » + la clé.

Impossible du coup pour un pirate de retrouver la correspondance ! Mais alors comment vérifier le mot de passe lors de la connexion si celui-ci est chiffré ?

À la connexion, WordPress prend le mot de passe que vous avez saisi, ajoute la clé de salage et lance le chiffrement : si la clé obtenue est la même que celle stockée en base, c’est que la personne a rentré le bon mot de passe et le système le connecte !

Pour en revenir à WordPress, il génère 8 clés différentes qui ont chacune leur usage dans le site. AUTH_KEY est utilisée lors de l’authentification alors que NONCE_KEY permet de générer un code à usage unique, les nonces WordPress : que l’on utilise pour certifier la provenance des données du formulaire depuis le site et pas ailleurs (les fameuses failles XSS).

Ces clés participent à la sécurité du CMS. Elles sont générées à l’installation grâce au service de clé secrète de wordpress.org : <https://api.wordpress.org/secret-key/1.1/salt/>.

Si cela vous parait nébuleux, il vous suffit de savoir que WordPress est bien sécurisé grâce à ces clés !

> Du fait que les clés sont générées aléatoirement à chaque installation, chaque site aura un jeu de clés complètement unique, ce qui rend leur déchiffrage statistiquement (presque) impossible.

## Le préfixe des tables

Cette information est proposée lors de l’installation. Le préfixe de table par défaut est wp_. On a vu son utilité dans le cours sur l’installation de WordPress en local.

> Ne changez pas ce préfixe après l’installation de WordPress. Cette information seule ne suffirait pas. Le changement de préfixe nécessite plusieurs autres modifications, notamment dans la base de données. Utilisez plutôt une extension dédiée à cette tâche.

## Debug

Si vous arrivez directement ici depuis Internet je vous conseille de consulter le cours précédent, dédié à ce paramètre Debug. Sinon rien d’autre à voir à ce propos !

## That’s all

Après cette indication : ne touchez à rien ! Vous risqueriez de casser WordPress. Ici il est simplement question de définir le chemin absolu, ABSPATH et aller chercher le prochain fichier du coeur pour continuer l’exécution de WordPress.

Le chemin absolu est souvent utilisé dans WordPress, cela permet au coeur, aux thèmes et extension d’inclure un fichier en allant le chercher par rapport au dossier de base dans lequel se trouve actuellement le site dans le système d’exploitation.

## Quelques améliorations utiles

J’ai quelques paramètres supplémentaires en stock que j’ajoute à chaque projet pour affiner encore cette configuration. Même si en l’état le fichier wp-config suffit, ces petites améliorations ont leur utilité.

Pour éviter le gonflement de la base de données :

– limitez les révisions avec WP_POST_REVISIONS
– allongez la durée des sauvegardes automatiques avec AUTOSAVE_INTERVAL

Pour éviter les mauvaises manipulations de la part des utilisateurs, ou des problèmes de sécurité, pensez à désactiver l’éditeur de fichier au sein du back office de WordPress, grâce à DISALLOW_FILE_EDIT.

Et enfin avant la mise en ligne du site, pensez à désactiver l’affichage des erreurs avec WP_DEBUG.

## Désactiver l’éditeur de fichiers

Le problème : un utilisateur avec les droits d’administrateurs peut, depuis l’administration (dans Apparence > Éditeur), accéder à un éditeur et modifier les fichiers du thème ou des extensions.

Depuis WordPress 4.9 un panneau indique que c’est une zone dangereuse. A défaut de mieux c’est déjà bien.

![](https://capitainewp.io/wp-content/uploads/2017/05/alerte-editer-1000x602.jpg)

Mais heureusement, vous allez complètement pouvoir désactiver cette fonctionnalité grâce à une ligne à ajouter dans votre wp-config.php :

```php
<?php 
define( 'DISALLOW_FILE_EDIT', true );
```

Je met cette ligne dans tous les projets, même les miens !

## Limiter le nombre de révisions

Quand vous écrivez un article, WordPress va créer des sauvegardes automatiquement à intervalles réguliers. C’est très pratique pour revenir à une version antérieure d’un article ou récupérer un ancien contenu en cas de problème.

Cependant à très long terme toutes ces révisions peuvent alourdir drastiquement la base de données. Afin d’éviter cela vous pouvez limiter le nombre de révisions à conserver pour chaque article :

```php
<?php 
define( 'WP_POST_REVISIONS', 5 ); // C'est bien suffisant !
```

## Espacer les enregistrements automatiques

Et si vous voulez également avoir moins d’enregistrements automatiques, vous pouvez augmenter l’intervalle d’enregistrement qui est fixé à toutes les 60 secondes par défaut. Montez la valeur à 300 pour ne lancer un enregistrement que toutes les 5 minutes.

```php
<?php
define( 'AUTOSAVE_INTERVAL', 300 ); // 300/60 secondes = 5 minutes
```

## Définir l’adresse du site

Par défaut, l’URL du site est enregistrée dans 2 valeurs en base de données, dans la table wp_options : siteurl et home.

Vous pouvez également les configurer directement depuis le fichier wp-config.php afin que ce soit plus simple à changer lors d’un passage en ligne. Il suffit pour cela de définir ces deux lignes :

```php
<?php 
define( 'WP_HOME', 'http://monsite.io' );
define( 'WP_SITEURL', 'http://monsite.io' );
```

Du coup les valeurs en base seront désormais ignorées.

> Ces lignes peuvent aller n’importe où dans le fichier wp-config.php (tant que ça reste avant le commentaire That’s all. Je vous conseille de les mettre après le préfixe de base.

Vous êtes prêt ! Vous avez toutes les cordes à votre arc pour installer WordPress et comprendre comment il fonctionne. On va maintenant entrer dans le vif du sujet et apprendre enfin à créer notre premier thème.
