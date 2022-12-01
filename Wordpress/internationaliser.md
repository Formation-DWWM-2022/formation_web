- <https://wpmarmite.com/wordpress-multilingue/> - Quelles extensions pour un site multilangue avec WordPress ?

# Comment créer un site WordPress multilingue ?

Français, anglais, espagnol, chinois, allemand : que ce soit pour s’adresser à diverses audiences, ou pour être présent à l’international, il arrive que l’on ait besoin de proposer du contenu en plusieurs langues sur notre site.

![](https://wpmarmite.com/wp-content/uploads/2021/10/wordpress-multilingue-homme-embete.gif)

Je pense notamment au secteur du tourisme, pour qui c’est très important.

Mais comment faire un site WordPress multilingue ? Peut-on y parvenir nativement ? Avec des extensions ? Lesquelles seront les plus appropriées ?

Réponses à toutes ces questions dans cet article, histoire de vous orienter dans la bonne direction.

## Qu’est-ce qu’un site WordPress multilingue ?

Commençons par les bases. On n’a peut-être pas la même conception du « multilingue » alors je vais vous donner ma définition en quelques points.

1. Le contenu de chaque langue existe sur une URL différente

![](https://wpmarmite.com/wp-content/uploads/2021/10/wordpress-multilingue-url-langue.jpeg)

C’est-à-dire que si vous mettez votre texte français et votre texte espagnol sur une même page, avec une séparation entre les deux, par exemple, ce n’est pas valable.

Il vous faut une page avec le contenu français, et une page avec le contenu espagnol. Et chacune d’entre elles sera accessible sur une URL différente.

2. Il y a des équivalences de contenus (ou pas)

![](https://wpmarmite.com/wp-content/uploads/2021/10/wordpress-multilingue-equivalences-langues.jpeg)

Prenons un autre exemple : vous avez une page « À propos ». Celle-ci existera en langue française, mais elle aura peut-être une page équivalente intitulée « Sobre mí » en langue espagnole.

Quoi que… peut-être pas ! Il se peut que vous proposiez des contenus totalement différents pour chaque langue. À ce moment-là, certaines pages n’auront pas d’équivalences.

3. Il y a des passerelles entre les langues

![](https://wpmarmite.com/wp-content/uploads/2014/11/3-passerelles.jpg)

Toujours dans le même exemple, si je suis sur la page « À propos », je dois pouvoir accéder à une option qui me permette de passer en langue espagnole. S’il y a une page équivalente, j’y serai conduit. Sinon, j’atterrirai sur la page d’accueil du site espagnol.

4. La traduction peut être faite par des humains ou des machines

Et là je vais prendre un parti pris : une traduction humaine sera toujours meilleure (c’est d’ailleurs pour cela que je ne présenterai pas en détail les extensions qui ne font que de la traduction automatique).

Si vous vous adressez à de vraies personnes derrière un ordinateur, elles sauront reconnaître les textes de qualité. Cela influera sur leur comportement de navigation, mais également sur le référencement naturel (SEO, Search Engine Optimization).

5. Multilingue mais pas forcément multi-pays

En proposant une version anglaise de mon contenu, je ne cible pas pour autant la Grande-Bretagne ou les États-Unis. Je vise tout simplement toutes les personnes anglophones.

Pour des problématiques multi-pays, cela devient plus complexe, puisque l’on va créer des sites différents par pays, même s’ils partagent la même langue.

Ce n’est donc pas un sujet couvert par cet article.

## Les bonnes pratiques multilingues

Au-delà de ces « règles », il y a également de bonnes pratiques à respecter pour créer un site multilingue avec WordPress digne de ce nom.

    La meilleure structure d’URL multilingue

Tout d’abord, il faudra choisir la structure d’URL (l’adresse d’une page de votre site internet) que vous utiliserez pour distinguer les pays. On discerne 4 options :

- la query string du style ?lang=fr, qui est à proscrire ;
- le répertoire où l’on aura par exemple monsite.com/fr/ et monsite.com/en/ ;
- le sous-domaine avec par exemple fr.monsite.com et en.monsite.com ;
- les domaines distincts comme monsite.fr et monsite.co.uk.

Si vous êtes sur un projet multi-pays (avec une implantation locale), les noms de domaines différents seront les plus intéressants. Ils permettront de travailler la marque localement et de produire des contenus spécifiques.

Mais à ce moment-là, on peut aussi imaginer que les sites n’aient aucune équivalence entre eux… Chaque antenne locale pourrait avoir son propre site, sans qu’il ne soit question de multilingue.

Par contre, si vous souhaitez proposer du contenu dans plusieurs langues, mais que vous n’êtes pas pour autant implanté à l’étranger, le mieux reste de choisir un nom de domaine générique et non localisé.

> Par exemple, un .com sera plus facile à décliner sur plusieurs langues, contrairement à un .fr qui deviendra louche pour un internaute espagnol.

Enlevons la query string (mauvaise pour le référencement) et les noms de domaine distincts, il ne reste plus que deux choix de structure d’URL pour du multilingue classique : la structure en répertoire ou en sous-domaine.

Le choix de l’une ou l’autre de ces deux structures dépendra de votre projet et de vos besoins.

Le plus facile, mais aussi le plus efficace en termes de référencement, sera probablement la structure en répertoire.

Pour info, Google privilégie souvent un sous-répertoire ou un sous-domaine, car le moteur recommande d’utiliser des URL dédiées comprenant un indicateur de langue.

Alex a donc choisi de partir sur une structure d’URL déterminée par le nom du répertoire, en gardant le nom du domaine principal avec un slash langue.

## Attention aux sélecteurs de langue

Un site multilingue se reconnaît grâce à un sélecteur de langue – aussi appelé commutateur – que l’on trouvera dans la navigation, en colonne latérale (sidebar), ou en pied de page (footer).

Mais attention, il y a deux petits détails qui peuvent être frustrants pour vos internautes.

## Bleu-blanc-rouge ?

Détail n°1 : le drapeau. Rien de tel qu’un indice visuel pour comprendre que l’on peut changer de langue, n’est-ce pas ? Mais autant je veux bien que ce soit intéressant pour du multi-pays, autant pour du multilingue, cela n’a pas autant de sens.

![](https://wpmarmite.com/wp-content/uploads/2021/10/drapeaux-office-tourisme-paris-scaled.jpg)

Un Brésilien cliquera-t-il sur un drapeau portugais ? Un Australien sur celui de la Grande-Bretagne ? Un Belge sur un drapeau français ?

> Vous l’aurez compris, les drapeaux sont en fait une mauvaise pratique si l’on ne fait pas de multi-pays. Le nom de la langue sera plus approprié.

## Do you speak anglais ?

Justement, parlons à présent du détail n°2 : le nom de la langue. Un internaute britannique préférera-t-il naviguer en « anglais », ou en « english » ?

Il y a fort à parier qu’il préférera le nom de sa langue comme il l’appelle tous les jours (« english ») et non comme nous la traduisons, nous. Laissez donc l’appellation dans la langue d’origine.

## Les redirections automatiques peuvent poser problème

Pour finir, vous verrez que toutes les extensions présentées dans cet article proposent une option de redirection des internautes dans leur langue de navigation.

C’est-à-dire que le plus souvent, ce seront les réglages de leur navigateur internet qui seront utilisés pour déterminer s’il faut les envoyer sur une langue différente.

Ainsi, un internaute espagnol qui voudrait accéder à un article que vous auriez écrit en anglais se verrait redirigé vers une version dans sa langue, si elle existe.

Tout part d’une bonne intention : on veut proposer à notre internaute le contenu qu’il sera le plus à même de comprendre. Mais il se peut aussi qu’il veuille accéder à une page précise et qu’une redirection l’en empêche.

La seule chose que je peux vous inviter à faire ici, c’est de bien consulter les documentations de chacune des solutions présentées, pour voir comment elles fonctionnent.

Votre cas est probablement différent de celui d’un autre, donc anticipez ce qui serait le mieux pour vos internautes, et activez cette option en conséquence.

On a donc vu les 3 bonnes pratiques à respecter :

- la meilleure structure d’URL en fonction de votre projet ;
- les pièges à éviter avec le sélecteur de langue ;
- et le risque potentiel des redirections par langue.

Passons à la technique, si vous le voulez bien.

## Comment gérer plusieurs langues avec WordPress ?

Nativement, WordPress ne permet pas de faire de multilingue. Il ne répond pas aux exigences 2 et 3 qui sont citées plus haut : on ne peut pas établir d’équivalences ou proposer des passerelles entre contenus de manière automatisée.

Il va donc falloir s’appuyer sur des extensions pour ajouter ces fonctionnalités.

Mais avant de les citer, j’aimerais revenir sur les problématiques multi-pays.

> Si vous avez des sites gérés par des équipes différentes pour chaque pays, il vaudra probablement mieux qu’elles aient toutes un nom de domaine et une installation WordPress différente.

C’est ce que l’on appellera des installations « monosite ». Mais on pourrait aussi imaginer une autre approche, si les sites sont gérés par la maison-mère (par exemple) : le multisite.

## La distinction monosite / multisite

Le multisite est une fonctionnalité native de WordPress (mais un peu cachée) pour gérer plusieurs sites depuis un même tableau de bord. On va en fait créer un « réseau » de sites et ils partageront la même installation WordPress.

Ainsi, il devient très facile de passer de l’un à l’autre depuis une même interface et on gagne également en efficacité de maintenance.

D’ailleurs, cela veut dire que ces sites vont pouvoir partager les mêmes thèmes et extensions.

Le multisite est donc une piste viable pour faire du multilingue. Mais si on s’arrête là, on n’a toujours pas la gestion des équivalences et des passerelles.

En effet, les contenus de chacune des langues existent sur chaque sous-site mais sans lien entre eux. C’est pour cela que nous ajouterons une extension.

Ceci étant dit, on peut aussi faire du multilingue sur une installation monosite grâce à l’ajout d’extensions. Ainsi, vous pourrez gérer chacune des langues depuis un seul et même site WordPress.

C’est l’extension qui rend possible la coexistence des différentes langues ainsi que la création des équivalences et des passerelles.

Pour mieux comprendre, voici un schéma :

![](https://wpmarmite.com/wp-content/uploads/2014/11/4-wordpress-monosite-multisite.jpg)

## Comment est-ce géré techniquement en monosite ?

Si je fais une rapide incursion dans l’aspect technique, c’est parce que toutes les extensions ne fonctionnent pas de la même façon lorsqu’il s’agit de gérer les contenus des autres langues.

Certaines le font au travers des taxonomies, d’autres en créant leurs propres tables dans leur base de données.

Mais le plus important, au-delà de la façon dont c’est géré, c’est que le contenu soit propre si on décide de changer de solution.

Hélas, ce n’est pas le cas avec qTranslate et les extensions qui lui ont succédé comme qTranslate-X par exemple. Plutôt que de stocker les informations ailleurs, elles préfèrent mettre dans un même contenu les différentes langues.

Cela veut dire que si vous désactivez l’extension, vous aurez dans vos articles et pages tous les contenus des différentes langues les uns à la suite des autres. Ce n’est pas propre, c’est pour cela que je ne parlerai pas de cette solution, qui, de toute façon, n’est plus disponible sur le répertoire officiel depuis fin août 2021…

Les autres, en comparaison, tirent partie de l’architecture de WordPress ou mettent leurs données « à côté ». Au moins, vous n’avez pas à reprendre tout votre contenu si vous désactivez le multilingue ou que vous changez de solution.

## Dans quelle direction partir pour rendre WordPress multilingue ?

Alors ? Faut-il s’orienter vers le monosite ou le multisite ?

(On mettra volontairement de côté la multiplication des monosites. On sort de la thématique du multilingue.)

Pour trancher, il va falloir se baser sur deux facteurs :

- la similitude entre vos contenus dans chaque langue ;
- et le nombre de pages et d’articles que vous comptez écrire.

Par exemple, si vos contenus sont strictement identiques (mais traduits) d’une langue à une autre, vous pourrez faire du monosite sans problème. Mais si vous avez de grandes disparités entre vos sites, le multisite serait probablement plus pratique.

Mais surtout, si vous avez l’intention de faire un webzine en plusieurs langues, cela veut dire que vous aurez à terme des milliers d’articles. Et au bout d’un moment, les performances se dégraderont.

> Vaut-il mieux avoir un site de 4 000 articles, ou 4 sites de 1 000 articles ?

Réponse B ! Le découpage des contenus dans des sous-sites différents rendra l’ensemble plus robuste et pérenne.

Donc si vous avez un site vitrine à décliner en plusieurs langues, le monosite sera approprié. Mais si vous lancez un projet éditorial, le multisite sera mieux.

Et en fonction de votre orientation, vous aurez des extensions différentes.

## Quelles extensions pour un site multilangue avec WordPress ?

WordPress ne permet pas de gérer plusieurs langues nativement. Il va donc falloir utiliser des extensions ou services spécialisés, qui vont ajouter une couche de complexité sur le site. Je vous présente 3 solutions multilangues pour WordPress dans ce cours.

Même si WordPress permet d’afficher un site dans la langue de son choix, cela ne veut pas dire qu’il gère le multilangue pour autant. On a vu comment internationaliser un thème précédemment, afin de l’afficher dans une certaine langue, mais il nous manque toujours la possibilité de créer une même page dans plusieurs langues, et en changer via un sélecteur.

Et pour cela on va avoir besoin d’une extension, ou un service externe. Je vais vous présenter les 3 solutions qui me paraissent les plus judicieuses pour cette tâche.

Mais attention : Cela va ajouter une couche de complexité tant au niveau du code, que de l’interface d’administration, et il va falloir vérifier que les extensions que vous utilisez sont compatibles avec le multilangue.

En général la plupart des extensions connues, dont les page builders et les plugins de référencement, sont compatibles avec les solutions multilangue.

> Si votre client veut un site multilangue, pensez à prendre en compte le coût de licence ainsi que la complexité dans votre estimation budgétaire.

## WPML

La première solution, et la plus connue, est WPML. C’est une extension purement premium. <https://wpml.org/>

Au niveau du pricing, c’est plus que correct. Comptez :

- 29$ pour 1 site simple (type blog) ;
- 79$ pour 3 sites complets (avec prise en charge ACF) ;
- Et 159$ pour un nombre de sites illimités.

C’est l’extension la plus connue pour faire du multilangue dans WordPress. Il vous permet d’ajouter un nombre illimité de langues sur votre site, propose un sélecteur de langues avec des drapeaux, une détection automatique de la langue de l’internaute…

![](https://capitainewp.io/wp-content/uploads/2020/04/wpml-install-1600x1002.jpg.webp)

Une fois installé, vous pourrez créer les équivalent de vos publications (pages, articles) dans chaque langue.

![](https://capitainewp.io/wp-content/uploads/2020/04/wpml-ui-1600x1002.jpg.webp)

L’interface de WPML s’est pas mal améliorée avec le temps. Pour l’avoir utilisé à ses débuts, je peux vous dire que ce n’était pas aussi pratique à l’époque.

D’ailleurs, si vous choisissez WPML, vous n’aurez plus besoin de Loco Translate puisqu’il inclut un outil de traduction de chaines des extensions et des thèmes.

![](https://capitainewp.io/wp-content/uploads/2020/04/wpml-string-translation-1600x1000.jpg.webp)

WPML C’est aussi un réseau de traducteurs dans toutes les langues. Vous pouvez donc demander à un professionnel de traduire vos pages dans une certaine langue, directement depuis votre interface.

Afin de juger de la complexité ajoutée par WPML, on peut aller faire un tour dans la base de données, et on s’aperçoit qu’une vingtaine de nouvelles tables ont été ajoutées (à titre de comparaison WordPress n’en créé que 10 lors de l’installation d’un site).

![](https://capitainewp.io/wp-content/uploads/2020/04/wpml-tables-1600x999.jpg.webp)

Ce n’est pas un mal pour autant. Je veux juste ici vous montrer que lorsque l’on passe un site en multilangue, la complexité augmente.

En résumé, si vous voulez une extension réputée, complète et compatible avec la majorité des extensions du marché, alors WPML est un bon choix. Mais attendez un peu ! J’ai encore d’autres solutions à vous présenter.

## Polylang

Polylang c’est l’alternative Française à WPML qui a plus de 500 000 installations actives ! C’est une extension freemium que vous pouvez installer depuis le répertoire officiel WordPress. Plus légère que WPML, elle fait cependant bien le travail.

Elle réussit à être compatible avec de nombreuses extensions et marche très bien même en version gratuite. Le seul souci c’est que plusieurs langues ne peuvent pas partager un même slug d’URL (exemple /fr/contact/ et /en/contact). Il faut opter pour la version payante pour permettre cela.

Au niveau des licences, comptez :

- 99€ pour un site ;
- 198€ pour 3 sites ;
- 495€ pour 25 sites.

Du côté de l’interface, cela ressemble pas mal à WPML :

![](https://capitainewp.io/wp-content/uploads/2020/04/polylang-ui-1600x1000.jpg.webp)

On retrouve d’ailleurs dans Polylang la plupart des fonctionnalités offertes par WPML. Du coup, si vous voulez rapidement un site multilangue sans passer à la caisse, Polylang est un très bon choix. Concernant les versions premium, je n’ai pas vraiment de préférence à ce sujet aujourd’hui, alors à vous de voir !

## Weglot

Et enfin, la troisième solution est complètement différente dans son approche car, au lieu d’être une extension, c’est un service SaaS. C’est-à-dire une application web distante.

En fait, vous traduisez votre site visuellement directement depuis l’application Weglot, et pas depuis votre site WordPress ! Du coup, ce dernier reste très léger puisque ce n’est pas lui qui enregistre les textes dans les autres langues.

L’éditeur visuel de Weglot affiche la page de votre site comme si vous la visitiez, et vous n’avez plus qu’à cliquer sur les chaines pour les traduire :

![](https://capitainewp.io/wp-content/uploads/2020/04/weglot-live-editor-1600x1003.jpg.webp)

Leur machine learning vous proposera également des traductions automatiques qui sont très bonnes.

Une autre interface permet de lister tous les textes trouvés sous forme de tableau afin de les traduire :

![](https://capitainewp.io/wp-content/uploads/2020/04/weglot-traduction-chaines-1600x1001.jpg.webp)

Et c’est toujours depuis Weglot que vous allez définir quelles sont les langues disponibles :

![](https://capitainewp.io/wp-content/uploads/2020/04/weglot-languages-1600x1002.jpg.webp)

Il faut tout de même installer une extension sur votre, juste pour faire la liaison, afin que celui-ci puisse basculer d’une lange à l’autre via un sélecteur, et récupérer les traductions depuis Weglot.

Du coup il y a des avantages et des inconvénients à cette approche :

- Vous n’alourdissez pas votre site (pas de tables en plus, pas de complexité) ;
- Vous traduisiez visuellement votre page, vous n’avez pas à chercher où se trouvent les chaines (dans une page ? un widget ? un menu ? un plugin ?) ;
- Une traduction automatique vous est proposée ;
- Mais c’est très vite compliqué pour les longs articles (puisqu’il faut cliquer sur chaque texte pour le traduire) ;
- Weglot ne traduit que les chaines qu’il voit, du coup il faut imaginer tous les cas possibles (par exemple se tromper dans un formulaire pour en afficher le message d’erreur et ainsi le traduire) ;
- Le coût peut très vite exploser sur des sites qui ont beaucoup de contenus et beaucoup de langues différentes.

Car oui, du coup Weglot facture au nombre langues et de mots traduits. Voici quelques formules disponibles :

- 99$ par an pour une langue et 10,000 mots traduits ;
- 190$ par an pour 3 langues et 50,000 mots traduits ;
- 490$ par an pour 5 langues et 200,000 mots traduits.

Cela peut donc vitre représenter un coût, mais c’est le prix à payer pour avoir une interface ergonomique, un process simplifié et une traduction machine de qualité.  <https://weglot.com/>

## Utiliser WordPress multisite pour un multilangue, bonne idée ?

![](https://capitainewp.io/wp-content/uploads/2020/04/multisite-multilangue.jpg.webp)

WordPress multisite est une configuration spéciale de WordPress qui permet de gérer un réseau de sites, tous rattachés à la même installation WordPress, et partageant les thèmes et extensions disponibles.

Son but est bien souvent mal compris, si bien que cette configuration est régulièrement envisagée à tord par les agences dans le but de centraliser des ressources.

Mais pour le multilangue ça peut faire sens :

- Un site = une langue ;
- Un utilisateur peut gérer plusieurs sites ;
- Chaque site partage les mêmes extensions ;

Par contre, il y a des inconvénients :

- Chaque site est indépendant et ne partage pas le même contenu ;
- Il faudra faire un menu de changement de langue à la main.

Toutefois, ça peut faire sens dans certains cas :

Par exemple, on peut accompagné une entreprise qui propose un service de mise en relation entre profs particuliers et des gens qui veulent apprendre (la cuisine, la musique…). Le blog servait surtout pour le référencement. Sur le blog Français on y trouvait des articles comme : “Où apprendre la guitare à Paris”. Et bien entendu, cet article n’aurait eu aucun sens sur le blog espagnol.

Dans ce cas précis, il était intéressant de mettre en place un multisite car chaque site était indépendant : rédacteurs différents, articles différents.

Mais dans le cas d’un site où il faut traduire les contenus en l’état, c’est beaucoup plus de problèmes.

> N’envisagez le multisite pour du multilangue seulement lorsque les différents sites ont une ligne éditoriale séparée, et donc des contenus différents les uns des autres.

Du coup, quelle solution choisir ? Eh bien là, je n’ai pas d’avis. Que ce soit Polylang, WPML ou Weglot, chacun y vont de leurs arguments et de leurs contraintes. Je pense que ça va dépendre du projet.

Pour un petit site, Polylang suffira amplement. Pour un site où vous allez faire appel à un traducteur pas forcément à l’aise avec WordPress, vous lui simplifierez grandement la tâche avec Weglot. Et pour avoir une solution parfaitement intégrée à l’écosystème, WPML est le bon candidat.

## Internationaliser et traduire son thème WordPress

Afin que votre thème puisse être traduit dans d’autres langues, il va falloir l’internationaliser. Et c’est facile avec WordPress car on a à disposition plusieurs fonctions pour nous aider. On va également voir que l’internationalisation et le multilangue sont deux choses différentes.

Que ce soit en vue de créer un site multilangue, diffuser votre thème sur le répertoire officiel, ou même le vendre sur une place de marché : votre thème doit être prêt à être traduit dans d’autres langues.

## Pourquoi internationaliser son thème ?

Dans un thème la plupart des textes sont affichés grâce à des fonctions comme the_title() et the_content(). Et ces textes, saisis par le rédacteur, vont pouvoir être traduits grâce des extensions multilangues comme WPML, Polylang ou encore Weglot.

Mais qu’advient-il des chaines écrites en dur dans le thème. Comme par exemple :

```php
<p>Publié le : <?php the_date(); ?></p>
```

Le texte « Publié le » passera au travers des traductions, comme il est statique. Mais heureusement, il existe un moyen de rendre ces chaines traduisibles grâce à des fonctions natives de WordPress.

C’est ce que l’on appelle l’internationalisation, ou i18n de son petit nom (car il y a 18 lettres entre le premier i et le dernier n).

> WordPress ne réinvente pas la roue, et utilise une technologie très connue des développeurs qui s’appelle GetText, pour traduire des chaines.

## Internationaliser ne veut pas dire multilangue

![](https://capitainewp.io/wp-content/uploads/2020/04/internationalisation-multilingue.jpg)

Maintenant, il ne faut pas confondre internationalisation et multilangue : ca reste 2 choses différentes :

- Internationaliser un thème (ou une extension) permet de faire en sorte que n’importe qui puisse l’utiliser avec la langue de son site ;
- Le multilangue permet de proposer plusieurs langues aux visiteurs de son site WordPress.

Concrètement, lorsque vous installez un thème ou une extension sur votre site en français, les textes s’afficheront bien en français s’il il a été traduit (que ce soit sur le site ou dans l’administration). C’est dû au fait que le thème a été internationalisé.

Et c’est grâce à une équipe de traduction française très dévouée que vous pouvez bénéficier de toutes ces traductions. Retrouvez-les sur le Slack WordPress FR, channel #traductions.

Mais ce n’est pas pour autant que vous pourrez proposer un site multilangue juste avec ça. Il faudra pour cela faire appel à une extension spécifique, car WordPress n’est pas capable de le faire nativement.

## Internationaliser son thème

Pour internationaliser un thème ou une extension, c’est très facile ! La première chose à faire est de déclarer un textdomain : c’est un nom unique qui permettra d’identifier vos traductions, et potentiellement éviter des conflits avec d’autres traductions.

## Déclarer le TextDomain

On va configurer le textdomain dans notre fichier functions.php qui se trouve à la racine du thème. Pour rappel, ce fichier permet de configurer les bases du thème, comme par exemple définir les tailles d’images ou encore charger les scripts et les styles.

```php
<?php
// Charger le Text Domain
load_theme_textdomain( 'alex', get_template_directory() . '/languages' );
```

Le premier paramètre correspond à l’identifiant unique que vous souhaitez mettre pour votre thème. Le second est le chemin où trouver les fichiers de traduction. Par convention, on les place dans le dossier /languages/.

Pour l’instant on n’a pas encore de traduction, mais patience, on va voir ça après.

> Dans WordPress il faut penser écosystème : le coeur, les extensions, les thèmes auront chacun leurs traductions. Le textdomain permet donc d’isoler chacune d’entre-elles afin d’éviter les conflits entre 2 chaines identiques.

## Les fonctions de traduction

Maintenant, on va utiliser des fonctions qui vont permettre d’utiliser la chaine de texte dans la bonne langue. Et il en existe plusieurs dans WordPress.

    Afficher une chaine traduite : _e()

La première fonction permet d’afficher à l’écran une chaine traduite. C’est la fonction _e(). On va voir que toutes les fonctions de traduction commencent par un underscore.

Le e de la fonction fait référence à la fonction echo, qui permet d’afficher une information à l’écran en PHP.

```php
<p><?php _e( 'Published on :' , 'alex' ); ?><?php the_date(); ?></p>

<a href="<?php the_permalink(); ?>">
    <?php _e( 'Lire la suite', 'alex' ); ?>
</a>
```

Le premier paramètre c’est la chaine originale, et le second notre fameux textdomain.

> C’est une bonne pratique de toujours mettre l’anglais en langue par défaut dans vos thèmes et extensions, ce qui facilitera la tâche le jour ou d’autres équipes viendront à traduire les chaines dans leurs langues.

    Transmettre une chaine traduite: __()

Dans le cas où vous voulez récupérer une chaine, sans l’afficher, il faudra alors utiliser la fonction __(). Cela vous sera utile pour passer une chaine en paramètre d’une fonction par exemple :

```php
<?php
// Type de publication
$labels = array(
    'name' => __( 'Portfolio', 'alex' ),
    'all_items' => __( 'Tous les projets', 'alex' ),
    'singular_name' => __( 'Projet', 'alex' ),
    'add_new_item' => __( 'Ajouter un projet', 'alex' ),
    'edit_item' => __( 'Modifier le projet', 'alex' ),
    'menu_name' => __( 'Portfolio', 'alex' )
);
```

    Gérer les traductions singulier / pluriel : _n()

Il existe des cas où vous aurez besoin de gérer les singuliers et les pluriels. Par exemple : « 1 article, 4 articles » ou encore « 1 commentaire, 8 commentaires ».

On utilisera dans ce cas la fonction _n() couplée à sprintf():

```php
<?php 
 $comment_count = get_comments_number(); // Nombre de commentaires
?>
<h2>
    <?php echo sprintf( _n( '%s commentaire', '%s commentaires', $comment_count ), $comment_count; ?>
</h2>
```

On indique d’abord la forme au singulier en premier argument, puis la forme pluriel en second. Le troisième argument permet quant à lui de recevoir le nombre d’éléments, ici les commentaires.

Le signe %s indique à quel endroit il faudra afficher ce nombre dans la chaine. Pour autant, ce n’est pas _n() qui va faire le remplacement.

Il faudra alors utiliser sprintf() qui va permettre de remplacer %s par le nombre de commentaires !

    Chaines identiques, mais contexte différent : _x()

Parfois, un même mot en anglais, pourra avoir plusieurs significations. C’est bien souvent le cas de verbes qui sont aussi des noms.

En anglais Update peut, selon le cas, se traduire par Mettre à jour (en tant que verbe d’action) ou Mise à jour (en tant que nom).

Eh bien pour faire la distinction, on va utiliser _x() qui va nous permettre :

    De proposer 2 chaines différentes pour permettre une traduction dans chacun des cas ;
    D’ajouter un contexte pour guider le traducteur.

Voici à quoi cela peut ressembler dans le code :

```php
<?php 
 _x( 'Update', 'verb', 'alex' ); // Verbe : Mettre à jour
 _x( 'Update', 'noun', 'alex' ); // Nom : Mise à jour
```

Lorsque le traducteur s’occupera de la traduction des chaines, Il en verra bien 2 distinctes, chacune accompagnée de leur contexte. En voyant verb, il comprendra qu’il doit traduire une action et non pas un nom.

Et jamais si vous avez besoin à la fois d’un contexte, et de gérer le singulier/pluriel, il existe la fonction _nx().

## Traduire les thèmes et extensions

Bien, maintenant que notre thème est prêt pour l’internationalisation (c’est vrai qu’il est long ce mot), il nous reste à savoir comment le traduire dans d’autres langues !

Et pour cela, on a plusieurs outils à notre disposition :

## Les outils de traduction

![](https://capitainewp.io/wp-content/uploads/2020/04/poedit-1600x1007.jpg)

    Le logiciel Poedit

La première solution, c’est d’utiliser le logiciel Poedit, qui permet de scanner les chaines d’un projet et de les afficher. Reste ensuite à créer une traduction dans la langue de notre choix, et traduire les chaines les unes après les autres.

![](https://capitainewp.io/wp-content/uploads/2020/04/poedit-1600x1007.jpg)

La version Pro prend en charge les thèmes et extensions WordPress et vous évite de configurer les chaines à scanner.

Il est simple à utiliser, il fait bien le boulot, mais il a quelques petits soucis d’ergonomie. <https://poedit.net/>

    L’extension Loco Translate

L’alternative est d’utiliser l’extension Loco translate qui vous permettra de faire vos traductions directement depuis l’interface d’administration de WordPress

![](https://capitainewp.io/wp-content/uploads/2020/04/loco-translate-1600x1002.jpg)

Loco détecte les thèmes, extensions et vous offre une interface sympathique pour faire vos traductions sans quitter votre site ! Du coup, vous pouvez même faire des traductions directement en ligne.

Vous pouvez d’ailleurs l’utiliser pour modifier une traduction ou la compléter, le jour où vous téléchargez un thème ou une extension dont la traduction est erronée ou incomplète.

    La plateforme translate.wordpress.org

Enfin, dans le cas où votre thème ou extension finirait sur le répertoire officiel de WordPress, vous pouvez utilisez translate.wordpress.org pour traduire votre projet.

![](https://capitainewp.io/wp-content/uploads/2020/04/translate-wordpress-org-1600x1004.jpg)

Il faut ensuite demander à un PTE (Project Translation Editor) ou un GTE (General Translation Editor) de la communauté francophone de valider vos chaines sur le Slack WordPress FR.

L’avantage, c’est que les traductions sont ensuite automatiquement envoyées à vos utilisateurs. Vous n’avez pas besoin d’intégrer les traductions à vos mises à jour : elles sont gérées de manière indépendante.

Si vous voulez participer à la traduction d’une extension, pensez d’abord à lire le guide de traduction (pour respecter les espaces inseccables et les apostrophes françaises, en autres).

Par contre, les thèmes et extensions premium ne peuvent pas bénéficier de cette technique car ils ne peuvent pas rejoindre le répertoire officiel.

## Comment fonctionne une traduction sous le capot ?

Avant de continuer il faut savoir comment fonctionnent les traductions. Peut importe l’outil utilisé, il va créer des fichiers en différents formats :

- Le fichier .pot est le catalogue contenant la liste de toutes les chaines traduisibles ;
- Le fichier .po contient les traductions d’une langue en particulier ;
- Et enfin, le fichier .mo est une version compilée du fichier précédent.

On trouverait donc le fichier fr_FR.po (ainsi que le .mo) dans un projet dont la traduction est disponible en français.

![](https://capitainewp.io/wp-content/uploads/2020/04/fichiers-po-mo-1600x736.jpg)

Le .po est utilisé par les outils de traduction, afin que vous puissiez traduire les chaines, alors que le .mo est utilisé par le script PHP (WordPress dans notre cas) pour le rendu de la page.

Du fait qu’il soit compilé, il est plus léger et plus performant.

Sur le principe, chaque projet possède un catalogue .pot contenant toutes les chaines : c’est l’outil qui est allé les scanner afin de les inventorier.

Dans le cas de WordPress, l’outil qui va scanner le code va justement chercher les fonctions de type _e(), __(), _n() et _x().

Les fichiers .po vont ensuite se synchroniser à partir de ce catalogue et vous permettre de traduire toutes les chaines trouvées.

> Le fichier .pot est donc le référentiel de base qui liste toutes les chaines trouvées dans votre thème (ou extension).

##  Mise en pratique : traduire votre thème avec Loco Translate

J’ai longtemps utilité Poedit, mais aujourd’hui je préfère Loco, car plus simple. Du coup c’est avec lui que je vais vous montrer comment initialiser une nouvelle traduction.

Une fois l’extension installée et activée, allez dans le menu Loco Translate > Thèmes. Votre thème devrait apparaitre dans la liste, sélectionnez-le.

![](https://capitainewp.io/wp-content/uploads/2020/04/loco-nouvelle-traduction-1600x549.jpg)

Pour l’instant, aucune traduction n’est disponible. Cliquez sur Nouvelle langue. Loco nous indique qu’aucun modèle (ou catalogue pot) n’est présent. Cliquez alors sur Créer un modèle.

Une fois le modèle généré, vous devriez le voir apparaitre dans `wp-content/themes/<theme>/languages/<theme>.pot`

Créez une nouvelle langue, en français, et laissez le fichier dans le dossier de votre thème, de cette manière il pourra être versionné sur git.

Mais si vous voulez corriger une traduction en ligne, il faudra choisir “système” afin que votre traduction ne soit pas écrasée à la prochaine mise à jour.

![](https://capitainewp.io/wp-content/uploads/2020/04/loco-creer-traduction-1600x1001.jpg)

Cliquez sur Commencer la traduction. Vous devriez voir apparaitre vos différentes chaines. Traduisez-les et n’oubliez pas d’enregistrer.

![](https://capitainewp.io/wp-content/uploads/2020/04/loco-translate-traduction-1600x1005.jpg)

Vous verrez dans le dossier de votre thème que les fichiers fr_FR.po et fr_FR.mo ont été ajoutés ! Votre traduction est prête !

Si votre site WordPress est en Français, alors votre traduction sera utilisée automatiquement !

    Mettre à jour le catalogue .pot

En continuant de travailler sur votre site, vous allez sûrement ajouter à terme de nouvelles chaines à traduire. Il faudra donc à un moment mettre à jour le catalogue.

Pour cela allez dans Loco Translate > thèmes > Votre Thème. Au lieu de cliquer sur la langue, choisissez Modifier le modèle. Dans la page qui s’affiche, cliquez ensuite sur Synchroniser.

![](https://capitainewp.io/wp-content/uploads/2020/04/loco-synchroniser-1600x573.jpg)

Loco va scanner à nouveau les chaines de votre thème et les enregistrer dans le catalogue. Il enlèvera également les éventuelles chaines obsolètes.

Retournez sur votre langue, et cliquez également sur Synchroniser. Cette fois Loco va récupérer les chaines à partir de votre modèle à jour, vers votre fichier français.

Et voilà, le tour est joué !

## Faut-il toujours internationaliser son thème ?

Si vous proposez votre thème (ou extension) sur le répertoire officiel de WordPress, alors la question ne se pose pas : faites en sorte que les communautés locales puissent le traduire.

Mais pour votre client, disons une petite entreprise française, a-t-il vraiment besoin que son thème soit prêt pour l’international ? Après tout il pourrait très bien décider d’étendre son activité un jour !

Comme on l’a vu dans ce cours, ll est très facile d’internationaliser un thème, et c’est rapide à mettre en place. Donc même si ça ne servira pas à priori, vous serez prêt le jour où vous en aurez besoin !

Vous connaissez maintenant la méthode pour internationaliser votre thème, qui pourra donc être traduit dans d’autres langues s’il est distribué sur le répertoire, ou simplement être prêt pour un site multilangue.
