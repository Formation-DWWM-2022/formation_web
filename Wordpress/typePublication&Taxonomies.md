# Les types de publications et les taxonomies

Dans ce cours on va découvrir ce que sont les types de publication et les taxonomies et ceux utilisés par défaut dans le CMS. Mais on va aussi voir que l’on va pouvoir également créer les nôtres.

## Les contenus dans WordPress

Lorsque vous avez un site WordPress tout neuf, vous pouvez écrire des articles et des pages. Et c’est tout ce que vous pouvez publier par défaut.

![](https://capitainewp.io/wp-content/uploads/2019/01/wp-menu-articles-pages-1-1600x592.jpg.webp)

Les débutants ont d’ailleurs souvent du mal à comprendre la différence fondamentale entre les deux.

Pour faire simple on pourrait leur dire que les articles, c’est pour le blog, et les pages, c’est le reste : la page d’accueil, la page contact, les mentions légales…

D’un point de vue technique, la différence est fondamentale :

- Les articles sont classés chronologiquement et disposent d’une page archive qui liste les 10 derniers (par défaut), et d’une page single qui affichera un article en entier ;
- Les pages sont indépendantes mais peuvent être classées hiérarchiquement avec une relation parent / enfant représentée dans l’URL de la manière suivante : monsite.fr/parent/enfant ;

Les pages et les articles sont ce que l’on appelle des types de publication. Et on va voir qu’ils ne sont pas les seuls.

## Les types de publication

    Les types de publication par défaut

En réalité il n’y a pas que les pages et les articles. WordPress gère également d’autres types de publication comme les attachments : ce sont les médias de votre bibliothèque (images, sons, vidéos…) ou encore les menus qui sont également un type de publication.

Enfin, il y a les révisions, qui sont des sauvegardes automatiques de vos articles que vous pouvez récupérer en cas de problème. Mais il n’y a pas de menu « Révision » dans l’interface de WordPress : elles sont en réalité accessibles directement depuis l’interface des articles.

Le problème c’est que très souvent, quand vous créez vos propres thèmes, cette disposition ne suffit pas. Heureusement, WordPress nous permet de créer ce que l’on appelle des types de publications personnalisés, ou en anglais, les Custom Post Types.

    Les types de publication personnalisés (CPT)

Certains thèmes vous proposent parfois de nouveaux types de publications, comme bien souvent le Portfolio afin de présenter vos créations :

![](https://capitainewp.io/wp-content/uploads/2019/01/wp-menu-post-type-1600x592.jpg.webp)

En tant que développeur de thème, on va bien entendu pouvoir en faire de même et en ajouter autant que l’on souhaite.

> Les pages et les articles sont deux types de publications proposés par WordPress. Mais il est tout à fait possible de créer les siens : Menus du jour, Portfolio, Documentation… C’est ce que l’on appelle les types de publication personnalisés. Les Custom Post Types permettent de bien cloisonner des contenus différents et votre thème pourra alors appliquer une mise en page spécifique pour chacun d’entre eux. Les CPT sont un point essentiel de WordPress et utilisés par la majorités des développeurs dans presque tous leurs projets.

On verra un peu plus tard comment déclarer nos propres types de publication dans nos thèmes et extensions, et vous verrez, c’est très facile !

Et pour la suite de cette formation, je dirais très souvent CPT pour aller plus vite.

    Pourquoi créer ses types de publication personnalisés ?

Alors pourquoi en créer d’autres ? Eh bien, lorsque vous faites un site, vous avez toujours besoin des pages, vous avez besoin des articles si un blog est présent, et imaginons maintenant que vous voulez présenter d’autres choses. Pourquoi pas :

- Des biens immobiliers ;
- Vos créations au travers d’un portfolio ;
- Les services et produits d’une entreprise ;
- La carte des menus pour un restaurant ;
- …

Chacun de ces exemples mériterait son propre type de publication sur votre site !

Il y a deux avantages à créer un type de publication personnalisé :

1. Ça permet de ne pas mélanger des contenus qui n’ont rien à voir ;
2. Ça permet également d’avoir des mises en pages complètement différentes.

En ce qui concerne ce deuxième point, on pourrait imaginer une présentation verticale classique pour le blog :

![](https://capitainewp.io/wp-content/uploads/2019/02/cpt-blog-1600x1047.jpg.webp)

Et une mise en page en grille type Masonry / CSS Grid pour le Portfolio :

![](https://capitainewp.io/wp-content/uploads/2019/02/cpt-portfolio-1600x1053.jpg.webp)

C’est possible car chaque post type peut avoir son propre template d’archive.

    Chronologiques comme les articles ou Hiérarchiques comme les pages

La plupart du temps (dans 99% des cas même) les nouveaux CPT se comporteront comme des articles, en mode chronologique avec une page archive (qui liste tout le monde) et une page single (qui détaille la publication).

Mais il y a aussi le mode hiérarchique, où le CPT se comporte comme les pages avec une possible relation parent/enfant. La seule fois où j’ai utilisé ce mode c’était pour créer un une documentation où j’avais besoin de classer mes fiches avec une relation parent / enfant.

> On verra plus tard que certaines extensions se servent des CPT pour stocker des données, ils ne sont alors pas affichés sur le site ou dans l’administration.

    Les types de publication

Prenons l’exemple de ce site ! J’ai créé plusieurs types de publication en plus de ceux par défaut, voici leurs usages :

- Pages : accueil, présentation du concept, tarifs, contact, mentions…
- Articles : le blog Alex où j’écris des actualités sur WordPress, des tutoriels (hors formation) ;
- Formations : la liste des formations disponibles avec toutes les informations ;
- Cours : les cours, comme celui-ci, rattachés à une formation ;
- Définitions : les définitions dans les blocs bleus (comme vu plus haut)  ;
- People : permet de stocker les informations des membres que j’interviewe et que j’utilise dans les blocs « le conseil de … ».

J’ai fait un montage un peu particulier en ce qui concerne les formations et les cours, car nativement il ne peut pas y avoir de relation de parenté entre deux Custom Post Types. Ils sont à la base indépendants.

Voici le lien pour consulter la documentation sur les types de publication : <https://developer.wordpress.org/themes/basics/post-types/>

## Les taxonomies

En complément des types de publications, il existe les taxonomies qui permettent de faire du classement :

> La taxonomie est une méthode de classification des espèces vivantes. Ce terme est repris dans WordPress pour le classement des articles. Par défaut il est possible de les classer sous forme de catégories et d’étiquettes. Les catégories sont généralement prédéfinies, peuvent être hiérarchisées en parent/enfant et ne bougent plus beaucoup par la suite. Les étiquettes (anciennement mots-clés) sont là pour un rangement transverse et sont différentes pour chaque publication (Par exemple dans la catégorie recettes de cuisine les étiquettes peuvent être les ingrédients : banane, tomate…). Il est possible de créer de nouvelles taxonomies et les assigner aux pages, articles ou tout autre type de publication.

Dans les articles, on dispose des catégories et des étiquettes :

![](https://capitainewp.io/wp-content/uploads/2019/01/taxonomies-wordpress-1600x805.jpg.webp)

Les deux taxonomies fonctionnent différemment :

- Les catégories sont hiérarchiques, avec une relation parent / enfant. En règle générale, une fois définies, les catégories ne bougent plus beaucoup ;
- Les étiquettes sont plus volatiles : elles sont là pour appuyer les mots-clés principaux de l’article et peuvent être très différentes d’un article à un autre.

Comme vous l’avez deviné, on peut bien entendu créer les nôtres, et les assigner à des CPT.

Par exemple pour des recettes de cuisine, on pourra créer deux taxonomies :

- Types de plats : comme les catégories des articles, qui permet de regrouper nos recettes en entrées / plats / desserts et potentiellement sous-catégories tartes / gateaux / patisseries…
- Ingrédients : comme les étiquettes, qui permet de lister les principaux ingrédients utilisés dans la recette : tomates, bananes, riz…

Il est important de bien comprendre le fonctionnement des contenus dans WordPress lorsque l’on créé ses propres thèmes. Dans les deux prochains cours on va voir comment créer nos propres Custom Post Type et taxonomies.
