# Créez un site moderne et professionnel avec WordPress

Dans la partie précédente, vous avez découvert ce qu'était WordPress et vous avez créé votre site WordPress. Dans cette partie, nous allons découvrir l’interface d’administration de WordPress.

> Les plus pressés délégueront la rédaction de leurs articles auprès d’un rédacteur web. Ce métier, de plus en plus recherché, permet aux entrepreneurs du web d’avoir un contenu de qualité sur leur site.

> Afin de rendre la suite du cours plus vivante, nous allons travailler sur un cas concret. Nous allons créer ensemble un site WordPress de promotion d’une activité de création de sites web. Nous allons donc nous mettre dans la peau d’un web designer situé à Bordeaux et souhaitant lancer l’agence “Banana Design” pour promouvoir son activité.

## Connectez-vous au dashboard WordPress

En général, pour vous connecter à l’interface d’administration d’un site WordPress, il faut vous rendre sur l’URL monsite.com/wp-login.php, qui est l'URL de connexion par défaut. Vous pouvez aussi aller sur l'URL du dashboard monsite.com/wp-admin qui vous redirigera automatiquement vers cette dernière.

Vous pouvez alors saisir vos identifiants pour vous connecter.
L’URL de connexion à WordPress

L’URL de connexion étant la même par défaut pour tous les sites WordPress, il est très facile pour les hackers de chercher à se connecter à des sites en “brute force” (c’est-à-dire en testant de nombreuses associations de login/mot de passe).

C’est la raison pour laquelle :

- il faut absolument éviter de choisir des identifiants et mots de passe trop simples (l’identifiant de connexion “admin” est à proscrire !) ;
- il est recommandé de modifier l’URL de connexion par défaut avec une URL personnalisée difficile à trouver ; nous verrons comment faire cela dans un prochain chapitre.

> Vous pouvez savoir si vous êtes connecté ou non en regardant en haut de la page du site. Si vous voyez une barre noire en haut de page (“top bar”) proposant des options d’administration, comme “modifier la page” ou “personnaliser”, c’est que vous êtes bien connecté !

Depuis l’admin bar, il suffit de survoler le nom du site à gauche et de cliquer sur “Dashboard” pour accéder à l’interface d’administration WordPress. Une fois dans le dashboard WordPress, vous avez accès au menu d’administration de WordPress (à gauche en noir).

Ce menu peut sembler rébarbatif (d’autant plus qu’il est en anglais). Pas d’inquiétude, nous allons très bientôt le passer en français, et vous verrez qu’il est plutôt intuitif et pratique à l’usage !

## Créez votre premier article

Comme vous l’avez certainement remarqué, la page d’accueil de votre site (pas de l’administration, donc sur l’URL monsite.com) est configurée par défaut en mode “blog”. C’est-à-dire qu’elle liste les contenus de type “articles”.

WordPress propose par défaut deux types de contenus qui sont les articles et les pages. La différence entre les deux réside dans la temporalité de la publication et dans la façon d’y accéder.

- Un article est généralement un contenu d’actualité, daté, et qui prend sa plus grande valeur au moment de sa publication. On y accède généralement via une page listant les articles triés de façon antéchronologique (les derniers articles publiés en premier), et non via un lien dédié dans le menu de navigation. Bref, c’est ce qui constitue ce que l’on appelle un blog !
- Une page est un contenu statique, généralement non daté et ayant une valeur constante dans le temps. On s’en sert en général pour présenter une société (page “À propos”), un service (page “Nos services”), des informations et fonctionnalités de contact (page “Contact”), et on y accède généralement via un menu de navigation (dans l’en-tête ou le pied de page du site).

WordPress permet aussi de créer des types de contenus personnalisés, aussi appelés Custom Post Types. Un type de contenu “Produits” est ainsi créé quand vous installez WooCommerce, l’extension e-commerce n° 1 pour WordPress.

Pour commencer à vous familiariser avec l’administration, nous allons commencer par créer un article. Cela permettra d’avoir un premier résultat visible sur notre site :

- Cliquez sur “Posts” (articles, en anglais).
- Puis cliquez sur “Add new” (ajouter).
- Saisissez un titre dans la première zone de contenu en haut.
- Entrez un peu de contenu dans les zones de contenu suivantes. Vous remarquerez que, lorsque vous cliquez sur une zone de contenu, le contenu de la barre à droite (sidebar) change et propose des informations et options contextuelles (dépendant du bloc cliqué). Vous pouvez revenir à l’affichage des options générales de l’article en cliquant sur l’onglet “Document” en haut de cette barre.

![](https://user.oc-static.com/upload/2021/04/14/16184115537374_3.png)

> Nous utilisons ici Gutenberg,  le nouvel éditeur WordPress qui repose sur le concept de blocs pour permettre des mises en pages complexes et simplifier l’ajout de contenus dynamiques (comme par exemple un formulaire de contact ou une galerie). Vous pouvez aussi choisir d’utiliser l’éditeur classique, qui vous sera plus familier car son fonctionnement se rapproche de celui d’éditeurs comme Word.

- Cliquez justement sur l’onglet “Document” et ajoutez une catégorie à votre article dans le bloc “Categories”. Pour cela, cliquez “Add new category”, entrez le nom de la catégorie souhaitée (nous allons mettre “Divers”, vous verrez pourquoi par la suite) et tapez “Entrée”.

```
WordPress propose par défaut deux façons de trier ses articles :

- les catégories, qui ont une hiérarchie (on peut créer des sous-catégories), et qu’il faut choisir soigneusement pour refléter de façon pertinente les sujets traités dans le blog et pour optimiser son référencement naturel. On n’attribue généralement qu’une catégorie (ou sous-catégorie) par article, et on essaie de ne pas multiplier le nombre de catégories proposées au total. Par exemple, un article de recette de tarte “banane-chocolat” aura la catégorie “Tartes”, fille de la catégorie “Desserts”, elle-même fille de la catégorie “Recettes” ;
- les tags, qui n’ont pas de hiérarchie et que l’on peut attribuer en masse à chaque article. Leur objectif est d’identifier les sujets importants traités dans l’article et récurrents sur le blog. Si nous reprenons l’exemple de notre recette de tarte banane-chocolat, on pourra par exemple lui attribuer les tags “banane”, “chocolat” et “plaisirs coupables”.
```

- Ajoutez ensuite une image dans le bloc “Featured Image” qui correspond à l’image principale rattachée à l’article. Elle sera utilisée pour illustrer l’article dans les listes d’articles, et pourra servir d’illustration principale dans l’en-tête de l’article.
- Cliquez maintenant sur l’icône “plus” située en haut à gauche de la page. Cette icône permet d’ajouter un nouveau bloc à notre contenu. Sélectionnez le type de bloc “image”. Un bloc “image” est ainsi ajouté en dernière position de votre contenu. Cliquez sur “Upload” pour téléverser une image depuis votre ordinateur.
- Vous pouvez déplacer les blocs en “glissé-déposé” grâce à l’icône présentant 6 petits points apparaissant au survol d’un bloc, ou de façon séquentielle, en cliquant sur les flèches haut et bas encadrant cette icône.

![](https://user.oc-static.com/upload/2021/03/31/16172011176717_image11.png)

- Enfin, cliquez sur le bouton “Publish” bleu en haut à droite pour publier votre article.

```
WordPress offre la possibilité :
- de sauvegarder les contenus en brouillon (“Save draft”). Cela signifie que l‘article sera enregistré, mais n’apparaîtra pas sur le site pour les visiteurs ;
- de prévisualiser le contenu (“Preview”). Cela permet de voir le contenu tel qu’il sera affiché sur le site sans avoir à le publier ;
- de “dépublier” un article ‘Switch to draft”. Cela permet, si l’on a publié un article par erreur ou que l’on ne veut finalement plus qu’il soit accessible, de ne plus l’afficher sur le site et de le conserver en brouillon.
```

![](https://user.oc-static.com/upload/2021/03/31/1617201228327_image18.png)

Vous aurez peut-être remarqué qu’il y a de nombreuses options en haut de la barre de droite.

Vous pouvez :

- Modifier la visibilité (Visibility) : permet de rendre l’article public, privé (accessible seulement aux utilisateurs connectés), ou de le protéger par mot de passe (très pratique si vous souhaitez, par exemple, faire valider une nouvelle page par un client sans qu’elle soit accessible au public).
- Définir une date de publication : permet de planifier la date à laquelle l’article sera publié, ce qui est très pratique si vous souhaitez conserver un rythme de publication régulier pendant vos vacances. ;-)
- Épingler l’article “Stick to the front page” pour faire en sorte que l’article soit “épinglé” en tête de liste, même si des articles ont été publiés plus récemment.

Vous pouvez maintenant retourner sur la page d’accueil de votre site en survolant le nom du site en haut à gauche et en cliquant sur “Visit website”, avec   ctrl  ou   cmd  appuyé, afin d’ouvrir le site dans un nouvel onglet.

Et voilà, votre article est bien visible en première position ! Vous avez publié votre premier article WordPress.

## Paramétrez les options de votre site WordPress

Maintenant que nous avons écrit notre premier article, nous allons voir dans ce chapitre comment régler quelques paramètres importants de notre site. C'est parti !

## Passez votre site en français

Comme vous l’avez certainement remarqué, l’interface de WordPress est en anglais. Il est évidemment possible de la passer en français, et nous n’allons donc pas nous en priver.

> Remarque : WordPress est disponible en 65 langues grâce à la communauté ! N’hésitez pas à contribuer aux traductions de WordPress ou de ses composants sur <https://fr.wordpress.org/team/>.

Comme la plupart des options générales de WordPress, le choix de la langue se fait dans la rubrique Settings (réglages) >> General.

Faites défiler un peu la page et vous verrez une ligne “Language” avec un menu déroulant.

Cliquez dessus, sélectionnez la langue souhaitée et enregistrez les réglages grâce au bouton bleu en bas de page.

Ça y est, votre interface d’administration est en français ! On se sent tout de suite plus à l’aise, non ?

> Remarque : gardez bien ce bouton bleu en tête ! Il est présent sur toutes les pages d’administration WordPress classiques (parfois dans la colonne de droite plutôt qu’en bas de page). Vous perdrez vos modifications si vous oubliez de l’utiliser !

## Changez le titre et le slogan de votre site

Le nom donné à votre site WordPress lors de la création a été directement appliqué au site créé, mais il est préférable de choisir un titre un peu plus accrocheur ! En effet, le titre du site est celui qui va apparaître dans les résultats de recherche Google et est un facteur majeur d’optimisation du référencement naturel (aussi appelé SEO pour Search Engine Optimization) de la page.

Remplissez donc ce champ avec un titre un peu plus accrocheur et contenant les mots-clés pertinents pour votre activité. Pour notre exemple, nous allons choisir le titre : “Agence WordPress Banana Design”.

![](https://user.oc-static.com/upload/2021/04/14/16184115861547_4.png)

Le slogan est lui aussi visible dans les résultats de recherche, et essentiel pour le SEO. Nous allons choisir : “Création de sites WordPress de qualité”.

Vous pouvez maintenant visiter votre site (toujours en survolant le nom dans la top bar et en cliquant sur “Aller sur le site”). Au survol de l’onglet du navigateur, vous verrez le titre et le slogan du site !

Comme vous avez dû le voir, il y a de nombreuses autres options dans cette page. Passons-les rapidement en revue.

> Adresse web de WordPress (URL) et adresse web du site (URL) Attention, zone à risque ! Il ne faut surtout pas modifier ces champs, au risque de casser le site. Ils ne servent qu’à des utilisateurs avancés lors d’un changement de nom de domaine.

    Adresse de messagerie

Comme indiqué, c’est l’adresse à laquelle seront envoyées toutes les notifications. Pas la peine d’y toucher, à moins qu’elle ne soit pas celle souhaitée.

    Inscription

Vous pouvez laisser aux utilisateurs la possibilité de s’inscrire sur votre site. Cela n’a pas d’intérêt dans le cadre d’un site vitrine, et nous laissons donc cette case décochée.

    Rôle par défaut de tout nouvel utilisateur

Cela n’a d’intérêt que si vous laissez les visiteurs s’inscrire sur le site ; nous n’y touchons donc pas.

Les autres options sont assez évidentes et vous pouvez les modifier comme bon vous semble !

## Modifiez la catégorie par défaut de vos articles

Cliquez sur "Écriture" en dessous de la sous-rubrique “Général” de la rubrique “Réglages”.

Seul le premier champ nous intéresse. En effet, nous n’avons pas envie que les articles soient catégorisés “Uncategorized” par défaut. Cliquez sur le champ et sélectionnez la catégorie “Divers” créée précédemment. C’est déjà mieux. :-)

## Cachez le site aux moteurs de recherche pour le temps des développements

Cliquez ensuite sur “Lecture” dans le menu du dashboard.

La première section permet de paramétrer ce qui est affiché lorsque l’on se rend sur la page d’accueil du site. Pour l’instant, nous avons vu que la page d’accueil affiche la liste des articles. Mais nous ne voulons pas créer un blog et souhaitons donc que la page d’accueil affiche une page personnalisée.

Nous allons nous y atteler dans le prochain chapitre, mais avant cela, finissons de paramétrer les réglages généraux du site. Une autre option intéressante sur cette page est l’option “Demander aux moteurs de recherche de ne pas indexer ce site”. Cela est pratique pour éviter que des visiteurs puissent tomber sur le site dans des résultats de recherche Google alors qu’il n’est pas encore fini.

![](https://user.oc-static.com/upload/2021/03/31/16172048742977_image10.jpg)

> Attention : il est très important, mais vraiment TRÈS IMPORTANT, de ne pas oublier de décocher cette case lors de la mise en ligne du site ! Cela empêcherait votre site ou celui de votre client d’être référencé sur les moteurs de recherche.

## Configurez les paramètres de commentaires

Les paramètres de discussion vous permettent de décider si les visiteurs peuvent laisser des commentaires sur vos pages et articles. Cela ne nous semble pas nécessaire, donc nous allons décocher la case “Autoriser les lecteurs à publier des commentaires sur les nouveaux articles “.

## Permaliens

Un permalien est une “URL permanente”, c’est-à-dire l’URL principale par laquelle accéder à un contenu donné.

Les paramètres de permaliens vont donc vous permettre de définir comment sont construites les URL de vos contenus. Nous pouvons laisser l’option "Date et titre" cochée. Il faut en revanche éviter de garder l’option  “Simple” si elle est cochée par défaut. En effet, il est important d’avoir le titre de l’article dans l’URL pour optimiser le référencement naturel.
