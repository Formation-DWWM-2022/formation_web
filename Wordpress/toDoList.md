# ToDo List après installation WordPress

Ça y est ! Vous avez acheté votre joli nom de domaine, trouvé un hébergement performant et vous venez tout juste d’installer WordPress… Vous êtes prêt!

Enfin presque… Il reste quelques petites choses à faire avant de lancer votre WordPress sur la toile, voici un petit article présentant une ToDo List post installation.

![](https://wpformation.com/wp-content/uploads/2014/03/todo1.jpg)

## Changez le compte utilisateur Admin par défaut

    Avez-vous envie de signer tous vos articles avec le pseudo “Admin”?
    Créez un nouvel utilisateur avec le login de votre choix et prenez un pseudo qui vous convient
    Allez sur gravatar et créez un compte, ajoutez une photo à votre compte
    Supprimer l’ancien “Admin”, c’est aussi bon pour la sécurité de votre WordPress

## Supprimez les contenus par défaut

    Supprimez la page “exemple de page”
    Supprimez l’article “Bonjour tout le monde”
    Supprimez le plugin “Hello Dolly”

## Activez le plugin Anti-spam

    Depuis le menu “Extensions”, activez le plugin Akismet installé par défaut
    Il vous suffit ensuite d’activer la clef d’installation (gratuit)

## Choisissez un Titre et un Slogan pour votre site

    Vous ne voulez pas que votre site soit “juste un autre site WordPress”, le slogan de défaut ?
    Donnez votre titre dans “Titre du site” depuis “Réglages>>Général”
    Expliquez ce qu’est votre site et pourquoi il est unique dans “Slogan”

## Par défaut, la page d’accueil affiche…

    Votre site WordPress peut afficher soit la liste de vos derniers articles, soit une page statique
    Depuis “Réglages>>Lecture>>La page d’accueil affiche”, faites votre choix

## Désactivez l’inscription des utilisateurs

    WordPress permet aux visiteurs de s’inscrire sur votre site
    C’est inutile, si vous n’utilisez pas de système d’adhésion et cela incite au spam
    C’est en général désactivé par défaut

## Services de mise à jour Pings

    Depuis “Réglages>>Ecriture>>Services de mise à jour”, les Pings vous aide à informer automatiquement les différents services en ligne lorsque vous publiez un nouveau article
    Pour en savoir plus sur les services de ping que WordPress recommande

## Votre site est-il visible sur les moteurs de recherche?

    Depuis “Réglages>>Lecture>>Visibilité pour les moteurs de recherche”, assurez-vous que votre site soit visible par tout le monde, y compris les moteurs de recherche
    Par défaut, votre site est visible pour les moteurs de recherche par défaut, à moins que vous n’ayez, sans le vouloir, coché cette case;)
    Assurez-vous que la case “Demander aux moteurs de recherche de ne pas indexer ce site” ne soit pas cochée

## Pensez à régler vos Permaliens

    Les permaliens sont tout simplement les URLs de vos articles
    Vous ne voulez évidement pas des URLs de type monsite.com/?p=13585
    Depuis “Réglages>>Permaliens” choisissez comme type de permaliens “Nom de l’article”

## Activez les Statistiques

    Préparez-vous à un afflux massif de visiteurs et suivez leur parcours à la trace
    Activez votre compte Google Analytics et installez le code de suivi sur votre nouveau site
    Vous pouvez également choisir d’utiliser JetPack pour vos stats, moins fourni en informations, c’est suffisant pour la plupart des utilisateurs

## Créez un Sitemap pour aider Google

    Avoir un sitemap XML est très important si vous souhaitez que Google soit en mesure d’explorer, trouver et indexer rapidement vos contenus
    Utilisez un plugin comme Google XML Sitemaps pour vous aider à créer un plan du site, ou grâce au plugin SEO by Yoast.

## Ajouter votre site sur Google Webmaster Tools

    Créer un compte Google Webmaster Tools (GWT) et vérifiez votre nom de domaine. GWT vous donne des informations sur ​​votre site, vos liens entrants, les erreurs et les classements des moteurs de recherche, etc…
    Soumettez lui directement vos Sitemaps. En faisant cela, Google va explorer votre nouveau site et l’indexer plus rapidement
    Dans les paramètres de Google Webmaster Tools, choisissez votre site domaine préféré  – avec ou sans www. Assurez-vous de la compatibilité avec l’URL déclarée dans vos paramètres WordPress (depuis “Réglages>>Général>>Adresse web du site (URL)”)

## Pensez a la vitesse, utilisez un cache

Utiliser un cache consiste à créer des pages HTML sur votre serveur à partir des pages générées par WordPress. Ensuite  le serveur n’a plus qu’à afficher ces pages, sans effectuer les multiples requêtes normalement nécessaires à leur affichage. Il existe de nombreux plugins de cache, du plus simple Quick Cache ou bien encore W3 Total Cache et WP Super Cache. La vitesse, c’est bon pour vos visiteurs et pour votre référencement WordPress.

Installez et activez votre plugin de cache, une fois votre site/blog terminé.

## Configurer le fichier .htaccess pour WordPress

Les fichiers .htaccess sont des fichiers de configuration des serveurs web Apache. Ils peuvent être placés dans n’importe quel répertoire du site web (la configuration s’applique au répertoire et à tous ceux qu’il contient n’ayant pas de tel fichier à l’intérieur).

Il est important de configurer ce fichier, notamment pour interdire les modifications sur certains fichiers, empêcher la lecture des répertoires, compresser, régler le cache, etc. Pour en savoir plus, je vous conseille vivement la lecture de l’article htaccess WordPress.

## Augmenter la taille memoire limite sous WordPress

Par défaut, WordPress essaie d’augmenter la mémoire PHP à 32 Mo pour fonctionner. Pensez à modifier cette valeur à 64 ou 96 Mo pour bénéficier d’une mémoire supérieure et de performances améliorées. Modifiez votre fichier wp-config.php et ajoutez/remplacez la ligne suivante :

define('WP_MEMORY_LIMIT', '96M');

## Desactiver et/ou limiter les revisions d’article

Vous l’avez sans doute déjà remarqué, WordPress garde trace de toutes vos modifications d’article. Pratique certes, mais gourmand en espace sur la base de données. Si vous n’utilisez que rarement les révisions, pensez à les désactiver via votre wp-config.php :

define('WP_POST_REVISIONS', false);

Vous pouvez aussi en limiter le nombre (réglé sur 3 dans cet exemple) :

define('WP_POST_REVISIONS', 3);

## Supprimer les themes et plugins non utilises

L’eau ça mouille et le feu ça brûle ;) Il est évident que tous les plugins WordPress non utilisés devraient être désactivés et retirés, toujours ça de pris au niveau des ressources et de la sécurité de votre WordPress. Pour ce qui est de vos thèmes WordPress non activés, cela prend de la place et cela vous informe à chaque mis à jour de ces derniers, autant vous en débarrasser!

## Optimiser son theme WordPress

Réduisez le nombre de requêtes serveur vers la base de données et diminuez son poids global.

Supprimez les requêtes PHP inutiles : Par exemple, modifiez votre thème en remplaçant la fonction PHP par votre URL en dur, évitant ainsi une requête supplémentaire vers la Bdd. Pour ce faire, cherchez l’appel à la fonction get_option(‘url’) dans votre thème WordPress.

Réduisez le nombre de requêtes au serveur : Utilisez les sprites CSS et copiez le contenu de tous vos fichiers CSS dans un seul et unique fichier, faites de même pour les fichiers JS. Augmentez la compression de ces derniers en supprimant les blancs et/ou commentaires pour réduire leur poids.

## Nettoyer la base de donnees

Les bases de données s’optimisent et s’entretiennent également, il est donc nécessaire de les nettoyer sous peine de ralentissements. Il existe un procédure via phpMyadmin ou bien encore le plugin WP-Optimize.

Vous pouvez également consulter l’article 15 requêtes utiles pour WordPress.

## Heberger les images et/ou deferer leur chargement

Les images peuvent parfois être gourmandes, pour soulager les ressources de votre serveur vous pouvez les héberger ailleurs (Amazon S3, dans sous-répertoire, en utilisant un CDN).

L’autre solution consiste à déférer leur chargement. Le principe est simple, je charge et j’affiche l’image uniquement quand le visiteur a besoin de la voir !  Pour le mettre en place, je vous conseille le plugin gratuit Lazy Load.

## Controler le rendu du site sur differents navigateurs

On l’oublie trop souvent, il y a encore des gens qui utilisent Internet Explorer ;) Aussi il est nécessaire  de contrôler l’affichage de votre site sur les principaux navigateurs. Voici un article regroupant pas moins de 10 outils pour tester l’affichage.

## Verifier les liens et les erreurs 404

Lors de la conception, vous avez certainement placé moultes liens hypertextes, assurez-vous de les avoir correctement orthographiés avec Broken Link Checker. Ce dernier permet de vérifier automatiquement dans vos articles, commentaires et autres contenus, les  liens brisés/rompus et les images manquantes et vous avertit même par email en cas de détection.

Avant la mise en ligne de votre site internet, pensez à installer le plugin Redirection pour gèrer les éventuelles (futures) redirections 301 et surtout pour garder trace de toutes les erreurs 404 générées.
