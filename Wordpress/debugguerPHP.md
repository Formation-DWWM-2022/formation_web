# Debugguer son code avec le log PHP et le Debug True

En tant que développeur, il est essentiel de savoir quand quelque chose ne fonctionne pas comme prévu sur son site. Dans ce cours nous allons voir comment activer le mode Debug pour voir les erreurs PHP et où trouver les logs d’erreurs du serveur.

## Debug : True

Lorsque l’on développe en PHP il arrive que l’on fasse des erreurs. Les extensions aussi peuvent en générer. Pour ne pas les manquer et surtout comprendre d’où vient le problème, on va activer le mode Debug qui permettra d’afficher les erreurs à l’écran.

Pour cela on va ouvrir le fichier wp-config.php à la racine du site WordPress avec notre éditeur de texte favori et chercher (CTRL+F) la ligne qui contient WP_DEBUG. On va maintenant passer sa valeur à true. Si la ligne n’existe pas, il suffit de l’ajouter, généralement après la variable $table_prefix. En réalité on peut mettre l’instruction n’importe où avant le commentaire /* That's all.

```php
<?php 

define( 'WP_DEBUG', true );
```

Il faudra cependant bien penser à remettre cette valeur à false (ou effacer cette ligne) lorsque l’on mettra en ligne le site web pour 2 raisons :

1. Si une erreur survient en ligne, ce ne sera pas très esthétique si elle s’affiche pour tous les utilisateurs ;
2. Les erreurs contiennent des informations précieuses à ne pas laisser à la portée d’un hacker potentiel !

## Enregistrer les erreurs dans un fichier

Vous pouvez également demander à WordPress d’activer un log d’erreur dans le cas où le serveur ne le propose pas. Pour cela il faut ajouter dans votre wp-config.php :

```php
<?php 

define( 'WP_DEBUG', true ); // On active les erreurs
define( 'WP_DEBUG_LOG', true ); // Enregistrées dans un fichier
define( 'WP_DEBUG_DISPLAY', true ); // Affichée à l'écran
```

Cela va avoir pour effet de créer un fichier debug.log dans le dossier /wp-content/.

Si vous le faites en ligne, ce fichier sera consultable par tout le monde, ce n’est donc pas une bonne pratique. Vous pouvez cependant le déplacer en indiquant le dossier dans lequel il doit être enregistré, en remplaçant true par un chemin :

```php
<?php 
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', '/path/to/file' ); // Dossier
define( 'WP_DEBUG_DISPLAY', false ); // Mais on ne les affiche pas à l'écran
```

En local, vous pouvez vous contenter de la premieère ligne : on va voir juste après que Local, Mamp ou même Wamp ont déjà généré un log pour vous.

## Test : provoquer une erreur PHP exprès

Pour vérifier que ça marche, faites volontairement une erreur de PHP, par exemple retirez un ; à la fin d’une ligne dans le fichier wp-config.php, enregistrez et rechargez votre page (CTRL+R). Vous obtiendrez une erreur PHP  :

    Parse error: syntax error, unexpected 'define' (T_STRING) in /app/public/wp-config.php on line 26

On sait de quel fichier provient l’erreur et de quelle ligne. Dans ce cas précis par contre j’ai oublié de fermer la ligne avec ; sur la ligne précédente. Il faut donc bien penser, si vous ne comprenez pas bien le message, de regarder également à la ligne d’avant, au cas où.

## Trouver de l’aide à propos d’une erreur PHP sur Internet

Lorsque le message d’erreur ne vous parle pas du tout, copiez simplement la première partie dans Google, vous trouverez beaucoup d’autres personnes qui ont déjà rencontré le souci dans le passé et qui seront en mesure de vous apporter la réponse.

Le site Stack Overflow est d’ailleurs souvent en tête des résultats de recherche Google.

C’est un système de questions / réponses très bien fait : les gens votent pour la réponse la plus judicieuse, qui apparait du coup en haut de page avant les autres.

![](https://capitainewp.io/wp-content/uploads/2017/05/stack-overflow-wordpress-1000x686.jpg)

Sur la capture ci-dessus vous pouvez voir que la réponse a été votée 572 fois et validée comme bonne réponse par la personne qui a posé la question ! Pratique non ? Ce site est un vrai gain de temps et vous évitera bien souvent de perdre des heures à comprendre un souci qu’un autre développeur dans le monde a déjà eu par le passé.

J’ai toujours trouvé réponse à mes questions et de fait jamais eu besoin d’en poser moi-même une. Vous trouverez énormément de questions / réponses dédiées à WordPress sur ce site.

> Bien souvent les questions et réponses seront en anglais. Pensez donc à taper votre question également en anglais dans la mesure du possible pour de meilleurs résultats.

## Les fichiers de logs PHP, SQL, Apache

Dans un serveur, plein de choses pourraient mal se passer. Heureusement chaque module tient un inventaire des problèmes dans des fichiers texte appelés logs. Ils sont horodatés et vous pourrez donc facilement retrouver une erreur qui s’est produite à un instant précis.

> Le log PHP reprend les erreurs affichées à l’écran. Parfois l’erreur intervient lors d’un traitement de page qui subit une redirection : vous n’avez donc pas le temps de voir passer l’erreur puisque la page est rechargée. C’est donc via le fichier log que vous pourrez comprendre le souci.

Selon le système ou l’hébergeur que vous utilisez, les logs ne se trouvent pas toujours au même endroit.

## Les logs d’erreurs sur Local by Flywheel

Comme on l’a vu sur le cours dédié à l’installation de Local by Flywheel, chaque site est dans une bulle indépendante des autres. Les fichiers logs se trouvent donc dans cette bulle : il suffit d’aller dans le dossier de votre site puis le sous-dossier logs qui se trouve au même niveau que apps.

![](https://capitainewp.io/wp-content/uploads/2017/05/local-error-log-1000x502.jpg)

Vous y retrouvez notamment les logs PHP, Apache ou Nginx (votre serveur) et MySQL (la base de données).

## Logs sur MAMP et WAMP

Pour ceux qui sont sur MAMP les fichiers logs se trouvent dans C:/MAMP/logs/ sur PC et Applications/MAMP/logs sur Mac.

![](https://capitainewp.io/wp-content/uploads/2017/05/mamp-error-log-1000x486.jpg)

Par contre ici il n’y a qu’un seul fichier de log par module pour tout le serveur. Il faudra donc bien regarder si l’erreur provient d’un site A ou d’un site B.

Et enfin sur WAMP les logs se trouvent dans C:/WAMP/logs/.

## Le type d’environnement serveur

Depuis WordPress 5.5, vous allez pouvoir définir l’environnement dans lequel se trouve le site. Plusieurs valeurs sont possibles :

- development (ou local) : pour un site local ;
- staging : pour un site en préproduction ;
- production : pour le site en production.

En fonction du cas, vous allez pouvoir lancer des actions différentes. Cela peut être pratique par exemple pour forcer la désactivation d’extensions en local.

Pour définir l’environnement, ajoutez ceci à votre fichier de configuration :

```php
<?php 

define( 'WP_ENVIRONMENT_TYPE', 'production' ); 
// ou development ou staging 
```

Ensuite, n’importe où dans votre code, vous pouvez obtenir la valeur au travers de la fonction wp_get_environment_type().

```php
<?php 

// Envoyer l'e-mail seulement si on est en production
if( wp_get_environment_type() == 'production' ) {
    wp_mail( $address, $subject, $content );     
}
```

Dans cet exemple, je n’envoie l’e-mail que si le site est réellement en production, afin d’éviter que de vrais e-mails partent lorsque l’on fait des tests sur le site de pré-production.

## Des extensions WordPress pour vous aider

Il existe aussi des extensions pour vous aider à mieux travailler en local comme Query Monitor ou encore Debug Bar, comme le conseille Daniel, expert en SEO, et blogueur sur SeoMix.fr :

> Méfiez-vous de WordPress, entre ce que vous voyez dans le rendu visuel et ce qu’il y a dans le code, il y a un gouffre. Il faut toujours prendre du recul dans son développement. Ainsi, je conseille TRÈS fortement de toujours travailler avec les fonctions de debug à TRUE et installer des extensions comme Query Monitor et Debug Bar notamment. Ensuite, il FAUT toujours utiliser un outil externe pour crawler son site afin de voir tout ce qui est présent dans le code HTML mais que l’utilisateur ne voit pas. Pour cela, utilisez Xenu Link Sleuth ou encore Screaming Frog Spider SEO.

Et si vous voulez être averti lorsque votre site est tombé ou inaccessible, je vous recommande également l’extension WP Umbrella créée par Thomas Deneulin.

On se penchera sur ces outils un peu plus en détail plus tard dans la formation ! Pour l’instant ils peuvent être utiles mais on peut s’en passer encore un peu.
