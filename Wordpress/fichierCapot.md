# WordPress sous le capot : les fichiers du coeur et la base de données

Dans ce cours nous allons creuser un peu et voir comment est organisé WordPress au niveau de ses fichiers et dossiers, afin de mieux comprendre comment il fonctionne.

L’objectif pour le moment n’est pas de vous faire devenir un super expert dans le coeur de WordPress, mais simplement creuser un peu pour comprendre comment fonctionne le CMS. Cela vous aidera à mieux appréhender la suite de la formation.

## L’organisation des fichiers de WordPress

![](https://capitainewp.io/wp-content/uploads/2018/01/architecture-fichiers-wordpress-racine-1600x890.jpg)

On remarque 3 dossiers : wp-content, wp-includes et wp-admin ainsi que plusieurs fichiers. On reviendra sur chaque dossier juste après, mais attardons-nous d’abord sur les fichiers.

index.php est la racine de WordPress, dès qu’une requête arrive sur le serveur, c’est ce fichier qui est lancé en premier (c’est une convention de tout serveur PHP).

Donc à chaque page que vous exécutez, c’est ici que tout commence pour WordPress.

wp-config.php est le fichier de configuration de WordPress, c’est ici que sont enregistrés entre autres les identifiants de connexion à la base de données. On va d’ailleurs en reparler plus en détails dans les 2 prochains cours car ce fichier est d’une importance capitale pour le bon fonctionnement du site.

On retrouve également wp-config-sample.php. Ce fichier sert en fait de modèle à la création du wp-config.php lors de l’installation de WordPress. Ce fichier est copié-collé, puis WordPress remplit les informations manquantes avec ce que l’utilisateur a renseigné lors des différentes étapes.

wp-login.php est le fichier qui permet d’établir la connexion avec l’interface d’admin, mais en réalité on y accède plutôt en ajoutant /wp-admin/ à la fin de l’URL de notre site. Mais il est bon de savoir que du coup, c’est ce fichier qui est exécuté. wp-signup.php est la page qui exécute le code permettant d’afficher un formulaire de création de compte, pour les sites qui permettent une inscription.

Les autres fichiers n’ont pas trop d’importance pour le moment. Jetons maintenant un oeil aux dossiers :

> À part le fichier wp-config.php, vous ne devez pas modifier les autres fichiers du coeur. Vos modifications seraient perdues lors de la prochaine mise à jour. On verra que WordPress a pensé à tout et fournit une solution pour modifier son comportement par défaut, mais on verra cela plus tard dans la formation.

## Le dossier wp-includes

Ce dossier contient le coeur de WordPress. La plupart de ses fonctionnalités (hormis l’admin) se trouvent réparties dans ces centaines de fichiers. Tout ce qui existe dans WordPress se trouve ici quelque part :

    la gestion des articles ;
    des commentaires ;
    des catégories ;
    des utilisateurs ;
    des menus ;
    le système d’e-mails ;
    le système de gestion des langues ;
    le système de gestion des rôles utilisateur ;
    L’API Rest ;
    la WP Query ;
    et bien d’autres…

Il n’est pas nécessaire de creuser plus loin pour le moment. Il n’y a que très peu d’intérêt à trainer ici, à part pour apprendre le fonctionnement de WordPress en profondeur. Là aussi, vous ne devriez modifier aucun fichier.

## Le dossier wp-admin

Ce dossier contient tout le code de l’interface d’administration du site. C’est d’ailleurs pour cela que l’on va à l’adresse exemple.site/wp-admin/ pour s’y connecter.

Si on regarde le contenu du dossier en détails, on retrouve chaque page de l’interface d’administration : options.php, profile.php, update.php, users.php, post.php…

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-admin-files-1600x898.jpg)

Chaque page correspond à une page de l’admin. D’ailleurs on le remarque quand on regarde le champ adresse du navigateur :

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-admin-post-new-1600x1024.jpg)

Remarquez dans la barre d’adresse : l’URL se finit par wp-admin/post-new.php !

> Là aussi on ne va pas modifier le contenu de ces fichiers. Si on veut ajouter une entrée de menu dans l’admin comme le font les extensions, on verra que WordPress nous fournit pour cela des fonctions au travers d’un mécanisme assez malin appelé les hooks.

## Le dossier wp-content

Ce dossier est beaucoup plus intéressant car c’est dans celui-ci que beaucoup de choses se passent. Quand on regarde on voit plusieurs sous-dossiers :

On retrouve :

    themes ;
    plugins ;
    uploads ;
    mu-plugins (pas toujours présent);
    upgrade (pas présent sur une nouvelle installation).

Cette fois tous ces dossiers sont destinés à avoir un contenu susceptible de bouger ou d’être modifié dans le temps !

## Les thèmes

Le dossier /wp-content/themes/ est destiné à recevoir le ou les thèmes de notre site : plusieurs thèmes peuvent être installés mais un seul sera actif. Lorsque vous installez un thème, il faudra le placer dans ce dossier, puis depuis l’admin WordPress aller dans Apparence > Thèmes et l’activer.

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-content-themes-1000x548.jpg)

D’ailleurs vous trouverez les trois derniers thèmes par défaut de WordPress qui portent des noms d’année (twentynineteen = 2019). Une fois votre thème ajouté et activé, vous pourrez supprimez ces thèmes.

> Ne laissez que le dossier du thème actif ici. Supprimez les autres qui sont inutiles. De cette manière on évite les risques au cas où l’un des thèmes inactifs aurait une faille de sécurité. Même si le risque est très faible, autant prendre ses précautions.

## Les extensions

Les extensions sont installées dans le dossier /wp-content/plugins/.

![](https://capitainewp.io/wp-content/uploads/2018/01/dossier-wp-content-1000x540.jpg)

Comme pour les thèmes il existe 2 moyens : soit télécharger l’extension depuis le répertoire officiel, en passant directement par l’admin via le menu Extensions. Soit en plaçant le dossier de l’extension dans ce dossier dans le cas des thèmes et extensions payants (qui du coup ne peuvent pas se trouver sur le répertoire officiel WordPress).

## Votre bibliothèque de médias

Tous les médias importés depuis l’interface d’administration se retrouvent dans le dossier wp-content/uploads/ : photos, vidéos, documents PDF, bref tout ce que vous avez de listé dans l’admin sous le menu Médias. On retrouve pour les photos la version originale ainsi que toutes les versions intermédiaires générées par le CMS lors de l’import. Nous verrons un peu plus tard dans la formation comment gérer et créer nos propres formats d’images.

Les fichiers sont automatiquement organisés en dossiers par année puis par mois pour avoir par exemple /wp-content/uploads/2018/01/.

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-content-uploads-1000x510.jpg)

A noter que c’est rangé par rapport à la date de l’article dans lequel apparait le média. Donc si vous importez en janvier 2019 une image affichée dans un article de mai 2017, alors l’image sera stockée dans uploads/2017/05.

Normalement vous n’avez jamais à mettre manuellement ici un fichier sans passer par l’interface d’administration (sinon il ne sera pas visible dans la médiathèque).

## MU-plugins

Mu-Plugins veut dire Must Use Plugins (Extensions Impérativement utilisées). C’est un dossier très spécial qui nous permet de mettre du code qui sera forcément exécuté à chaque lancement de WordPress. Contrairement à un traditionnel plugin, on ne les trouve pas sur le répertoire officiel des extensions.

Ce sont des codes très particuliers qui servent par exemple aux hébergeurs pour ajouter des sécurités ou des configurations au site sans avoir à modifier le coeur de WordPress ou toucher à votre thème.

![](https://capitainewp.io/wp-content/uploads/2020/05/mu-plugins-1000x627.jpg.webp)

En réalité vous ne pouvez pas y mettre de « vraies » extensions, mais simplement des bouts de codes PHP.

Vous pourriez par exemple glisser ici un code qui empêche votre client de désactiver une extension critique ou de changer de thème au risque de tout casser.

## Upgrades

Ici rien de bien intéressant pour nous, c’est simplement un dossier provisoire dont se sert WordPress pour télécharger les mises à jour avant de les appliquer.

## Languages

Ce dossier va stocker les différentes langues de l’interface d’administration et certains thèmes et extensions, même si en général ces derniers gardent leurs traductions dans leur dossiers respectifs. Mais l’avantage de placer une traduction ici est que vous pouvez du coup modifier les chaines traduites sans qu’elles se fassent écraser lors de la prochaine mise à jour.

> Pour résumer : à l’exception du fichier wp-config.php et ce qui se trouve dans /wp-content/ sachez que l’on ne doit JAMAIS modifier les fichiers du coeur de WordPress. En effet le CMS dispose d’un système de hooks pour permettre de modifier ou améliorer certains de ses comportements, que l’on verra en temps voulu, mais gardez à l’esprit qu’on ne modifie jamais les fichiers du coeur.

## L’organisation de la base de données

Et si on allait faire maintenant un petit tour du côté de la base de données ? Depuis Local il suffit d’aller dans l’onglet Database et de cliquer sur Adminer ou Sequel.

![](https://capitainewp.io/wp-content/uploads/2018/01/tables-wp.jpg)

Vous remarquerez, en affichant la base, que WordPress ne possède que 12 tables par défaut. Elles suffisent à faire fonctionner tout le CMS. Cependant certaines extensions viendront parfois ajouter leur propres tables supplémentaires, comme c’est le cas avec WooCommerce ou Gravity Forms.

> Si vous avez changé le préfixe de base lors de l’installation, alors vous ne verrez pas les noms de table commencer par wp_ mais par le préfixe choisi.

## Utilité de chaque table

On va rapidement les passer en revue histoire de comprendre leur utilité. Bien souvent il existe une table qui stocke des informations principales, et son équivalent metascontenant des informations supplémentaires.

## wp_users et wp_usermetas

Cette table stocke tous les utilisateurs du site, qu’ils soient administrateurs, auteurs, contributeurs, simples abonnés, clients WooCommerce…

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-table-users-1000x504.jpg)

La table contient le login, mot de passe crypté (on verra plus tard comment est généré le cryptage), l’e-mail, la date d’inscription…

La table wp_usermeta contient les informations supplémentaires de chaque utilisateur, représentées sous forme de clés – valeurs :

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-table-usermeta-1000x547.jpg)

En fait on retrouve principalement les options que vous pouvez configurer depuis l’admin, Utilisateurs > Votre profil.

Par exemple on voit que la clé rich_editing est à true pour l’utilisateur portant l’identifiant 1 : Cela correspond à l’option Désactiver l’éditeur visuel pour écrire de l’interface d’administration.

Quand vous développez une extension et que vous avez besoin de stocker des informations relatives à un utilisateur (par exemple qu’il est bon client), vous utiliserez cette table implicitement au travers de la fonction update_user_meta().

## wp_options

Cette table contient toutes les options du site, dont notamment tout ce que l’on trouve dans le menu Réglages de l’admin. On y croise par exemple l’adresse du site, le nombre d’articles à afficher par page, le nom du site et sa description…

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-table-options-1000x585.jpg)

Lorsque vous développez un thème ou une extension, vous pourrez stocker ses configurations dans cette table grâce à la fonction update_option().

## wp_posts et wp_postmetas

C’est ici que sont stockées toutes les publications de WordPress. Que ce soient les articles, les pages, et même tout autre type de publication (CPT) que vous voudriez créer en plus (et on apprendra à le faire dans cette formation).

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-table-posts-1000x438.jpg)

On y voit la date de publication, le titre de l’article, le contenu, le statut de publication (brouillon = draft, publish = publié…), le slug (le nom codé pour l’URL)…

Du côté de wp_postmeta, on retrouve toute donnée additionnelle qui serait principalement stockée grâce aux Champs personnalisés.

On utilise principalement cette technique avec l’extension ACF (Advanced Custom Fields) qui est un outil indispensable aux développeurs. Bien entendu, tout ceci est au programme de la formation !

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-table-postmetas-1000x458.jpg)

On y voit par exemple que, pour l’article portant l’identifiant 6, j’ai ajouté les champs note, date de sortie et difficulté.

## wp_comments et wp_commentmeta

De la même manière que les autres tables, ici on stocke les commentaires du site ainsi que les metadonnées de ces commentaires. Ces tables ne sont utilisées que si vous activez les commentaires sur votre site.

Les metadonnées sont utilisées par les extensions généralement, comme Akismet, l’extension d’Automattic qui permet de filtrer les spams : pour chaque commentaire une donnée est ajoutée en indiquant si ce dernier est considéré comme spam ou pas.

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-table-commentmeta-1000x483.jpg)

## wp_terms, wp_termmeta, wp_term_taxonomy et wp_term_relationship

Et enfin, les 4 dernières tables concernent les méthodes de classement de WordPress, appelées taxonomies. Les deux taxonomies présentes par défaut dans WordPress sont les catégories et les étiquettes (anciennement mot-clés). Mais il est possible d’en créer d’autres et on verra comment faire ça quand on abordera les Custom Post Types.

Sachez que chaque nouvelle catégorie ou étiquette ajoutée s’appelle un terme. Un terme appartient à une taxonomie.

La table wp_terms contient tous les termes de taxonomies que vous avez créés. A ce niveau on ne peut pas savoir si un terme fait partie d’une catégorie ou plutôt d’une étiquette.

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-table-terms-1000x443.jpg)

Dans cette capture vous ne savez pas que Marvel et Blizzard sont des étiquettes alors que les autres sont des catégories.

Il faudra alors se rendre dans wp_term_taxonomy pour connaitre la taxonomie de chaque terme, ainsi que connaitre le nombre d’articles présents dans ce terme, qui est le parent et quelle est la description.

![](https://capitainewp.io/wp-content/uploads/2018/01/wp-table-term-taxonomy-1000x443.jpg)

La table wp_term_relationship a été introduite récemment et permet d’ancrer les relations entre termes et taxonomies afin que les requêtes à la base de données soient beaucoup plus performantes. Rien d’intéressant à voir ici donc.

Enfin wp_termmeta permet, comme toujours, de pouvoir enregistrer des données supplémentaires pour chaque terme de taxonomie. Par exemple on peut imaginer d’ajouter une cote de popularité pour chaque catégorie.

Et enfin la table wp_links est un vestige du passé et n’est plus aujourd’hui utilisée.

## Comment connaitre l’identifiant d’un article ?

Si vous souhaitez connaitre l’identifiant d’un article quand vous êtes dans l’interface d’administration, il faut regarder dans l’URL. Allez éditer un article ou une page, et regardez la barre d’adresse :

![](https://capitainewp.io/wp-content/uploads/2018/01/trouver-id-wordpress-1000x289.jpg)

Vous verrez le paramètre GET post=6 , c’est lui votre identifiant.

Vous pouvez maintenant afficher seulement les méta données de cet article depuis votre base. Pour cela j’utilise le filtre de Sequel (juste au-dessus des entrées) et indique que je ne veux que les lignes dont la colonne post_id est égale à 6.

![](https://capitainewp.io/wp-content/uploads/2018/01/filtrer-table-1000x451.jpg)

Cette technique pourra s’avérer pratique pour débuguer vos développements et vérifier le bon enregistrement de vos données.

> La plupart du temps, vous n’avez pas besoin de venir modifier la base de données. C’est toujours bien de savoir comment WordPress marche sous le capot mais rassurez-vous : dans la pratique on n’en a que très rarement besoin, le CMS fournissant toutes les options nécessaires.

Vous en savez à présent bien assez pour continuer sereinement ! Inutile pour le moment de plonger plus profondément dans la structure de WordPress. A ce point vous en savez déjà bien plus que la plupart des développeurs WordPress « occasionnels ».

Dans le prochain cours nous allons voir comment activer le mode Debug et gérer les erreurs PHP.
