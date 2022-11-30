# Rôles, droits et privilèges des utilisateurs WordPress

<!-- https://capitainewp.io/formations/developper-theme-wordpress/roles-utilisateurs-capacites -->

WordPress utilise un concept de rôles, conçu pour donner au propriétaire du site la possibilité de contrôler ce que les utilisateurs peuvent ou ne peuvent pas faire sur le site.

Un propriétaire de site peut donc gérer l’accès des utilisateurs à des tâches telles que l’écriture et l’édition d’articles, la création de pages, la définition des liens, créer des catégories, modérer les commentaires, la gestion des plugins, la gestion des thèmes, et la gestion des autres utilisateurs, en assignant un rôle spécifique à chacun des utilisateurs.

![](https://wpformation.com/wp-content/uploads/2013/05/ROLE-UTILISATEUR-WORDPRESS1.png)

## Qui a le droit de quoi sur WordPress ?

    Administrateur : Accès à toutes les fonctionnalités de l’administration WordPress
    Editeur : Peut publier et  gérer les pages ainsi que celles des autres utilisateurs
    Auteur : Peut publier et gérer ses propres articles uniquement
    Contributeur : Peut écrire et gérer ses propres articles mais ne peut pas les publier
    Abonné : Peut uniquement gérer son profil

Lors de l’installation WordPress, un compte Administrateur est automatiquement créé. Le rôle par défaut de tout nouvel utilisateur peut être réglé via Réglages>Général.

Voyons plus en détail, ci-dessous, chaque rôle et ce qu’ils peuvent faire sur votre site WordPress.

## Le rôle Abonné

Certainement le rôle disposant de moins de droits sur un site WordPress. En effet, l’abonné peut juste commenter et lire.

A l’instar des autres rôles, on peut toutefois s’en servir pour donner accès à certaines partie du site auxquelles les visiteurs non inscrits n’ont pas accès. On peut également limiter la capacité à commenter les articles aux seuls inscrits et donc de facto aux abonnés.

Nota: Penser à attribuer par défaut le rôle d’abonné pour tout nouvel utilisateur, c’est bien moins risqué.

![](https://wpformation.com/wp-content/uploads/2013/05/abonne-commentaire.jpg)

## Le rôle Contributeur

Voilà le rôle idéal si vous souhaitez offrir, de manière occasionnelle, la possibilité à une personne de venir vous proposer un article. Le contributeur peut écrire des articles et vous les soumettre à la relecture. Il ne peut en aucun cas publier.

A noter également que le contributeur ne peut pas uploader d’images ce qui est plus embêtant. Il est toutefois possible de modifier cette limite avec l’utilisation d’un des plugins cités plus bas.

## Le rôle Auteur

Un auteur est une personne qui publie régulièrement sur votre WordPress. Elle peut donc écrire un article, y ajouter des médias, publier, modérer les commentaires de ses posts, modifier et supprimer ses propres articles.

Attention à n’accorder ce rôle d’auteur qu’à des personnes de confiance.

## Le rôle Editeur

Disposant de bien plus de droits que les rôles précédents, l’éditeur peut gérer tout le contenu éditorial du site WordPress. Il peut donc modifier ses articles mais aussi ceux des autres.

C’est le rôle idéal pour la personne en charge des auteurs et du contenu éditorial de votre site.

## Le rôle Administrateur

Sans nul doute le rôle le plus connu sous WordPress, c’est simple c’est le rôle disposant de tous les privilèges. L’administrateur peut supprimer (utilisateurs, contenu), changer de thème, ajouter des plugins, etc… Ce rôle d’administrateur vous a certainement été attribué lors de l’installation. Voilà pourquoi vous avez accès à l’intégralité du site.

Pour des raisons de sécurité évidentes, je vous recommande un seul administrateur par WordPress, en effet n’oubliez pas qu’un administrateur peut en effacer un autre !

## Modifier le rôle d’un utilisateur

Il est tout a fait possible d’ajouter, modifier ou supprimer un utilisateur. Pour cela connectez vous en tant qu’administrateur ou éditeur et rendez-vous sur le menu Utilisateurs>>Tous les utilisateurs (/wp-admin/users.php)

![](https://wpformation.com/wp-content/uploads/2013/05/utilisateurs-WordPress.jpg)

Il vous suffira ensuite de choisir quelles actions vous souhaitez effectuer.

Pour ajouter un utilisateur, c’est au même endroit mais via le bouton en haut de page Ajouter. Rappelez-vous toutefois, une seule adresse email par utilisateur et par rôle, un seul identifiant (non modifiable).

## Récapitulatif des Rôles, droits et privilèges sous WordPress

![](https://wpformation.com/wp-content/uploads/2013/05/role-privilege-utlisateur-wordpress.jpg)

## Quelques plugins pour aller plus loin

Avec l’ajout de quelques plugins WordPress vous pouvez modifier certaines capacités pour un rôle spécifique ou même créer un nouveau rôle et personnaliser les privilèges de ce dernier.

    User role editor
    Advanced access manager
    Role scoper
    Members & S2 Member
    Advanced wordpress roles manager – Premium
    Pages by user role for wordpress & Menu by user role for wordpress Premium

A titre personnel, je vous recommanderais User Role Editor qui me sert principalement pour ajouter ou restreindre des droits aux différents rôles par défaut de WordPress.
