# WordPress et les thèmes enfants

On entend très souvent parler de thèmes enfants dans WordPress, mais leur but réel est souvent mal compris. Ils ne sont pas forcément utiles à tous, et des alternatives existent. On va tout de même voir quel est leur but, et comment en créer un dans votre site WordPress.

On entend souvent qu’il faut impérativement un thème enfant lorsque l’on utilise WordPress, et c’est un sujet qui a tendance à embêter les plus débutants.

On va voir ce qu’est un thème enfant, comment en faire un, mais surtout pourquoi il n’est pas toujours nécessaire, et quelles en sont les alternatives.

## Qu’est-ce qu’un thème enfant ?

Pour comprendre l’intérêt d’un thème enfant, il faut d’abord comprendre la problématique qu’il résoud.

Parfois, le thème que vous avez choisi (par exemple Divi, Salient…) ne permet pas de répondre à tous les besoins en terme de personnalisation. Et s’il manque une option, il faudra aller ajouter soi-même du code CSS, HTML ou PHP.

Mais vous ne pouvez pas directement modifier le code source du thème original, car lors de la prochaine mise à jour de celui-ci, vous perdrez toutes vos modifications. En effet, les fichiers du thème seront effacées par ceux de la nouvelle version.

Le thème enfant permet donc de surcharger en sécurité un thème, et vous permet :

- D’ajouter des fonctions PHP et manipuler les Hooks ;
- Modifier les templates HTML qui s’occupent du rendu ;
- Et ajouter du CSS personnalisé.

Le principe est simple : le thème enfant est juste une coquille vide qui va fournir un fichier PHP pour ajouter des fonctions, un fichier CSS pour ajouter les styles, et qui permettra de copier / coller un template du thème parent pour le modifier.

Pour ce dernier cas, WordPress va toujours regarder en priorité dans le thème enfant s’il trouve le fichier de template qu’il cherche, et s’il n’y est pas, il se rabattra sur le fichier original du thème parent.

> Le thème enfant permet donc d’apporter des modifications en profondeur à un thème de manière sécurisée.

## Dans quels cas l’utiliser ?

Du coup, dans quels cas est-il utile d’utiliser un thème enfant ?

## Lorsque l’on fait un thème sur mesure ?

Eh bien non, puisque notre thème est fait intégralement à la main, on a donc le contrôle du code original, et donc on a pas besoin de thème enfant. Du coup c’est pour cela qu’on ne les utilisera pas dans le reste de la formation.

## Lorsque l’on utilise un thème premium ?

Oui ! Mais … pas forcément ! Si vous utilisez un thème premium et que vous voulez apporter des modifications là où aucune option dans l’interface n’est proposée, alors le thème enfant peut-être utile.

Mais en réalité, on verra qu’il existe des solutions alternatives et on pourrait tout aussi bien s’en passer !

## Cas spécifiques

Certaines entreprises ou agences, qui ont toujours le même type de projets, créent un thème de base commun à tous les sites, qu’on peut appeler framework.

Prenons l’exemple d’une agence spécialisée dans la réalisation de sites immobiliers. Les fonctionnalités de base et les besoins sont toujours les mêmes : il faut lister des biens et pouvoir les filtrer. Du coup, c’est le framework (ou thème parent) qui s’occupe de ça.

En ce qui concerne la charte graphique, qui est différente pour chaque site, ce serait du coup le thème enfant qui s’en occuperait.

Il existe donc des cas ultra spécifiques dans lesquels le thème enfant peut trouver son utilité même si on a fait un thème à la main.

## Déclarer un thème enfant

On déclare un thème enfant de la même manière que l’on déclare un thème classique. Il y a juste 2 petites subtilités supplémentaires.

Commencez par créer un dossier dans wp-content/themes. Si mon thème est Divi, alors je peux l’appeler divi-child.

Dedans, je créé :

- Un fichier style.css (obligatoire pour tout thème WordPress) ;
- Un fichier functions.php (où ira le code PHP) ;
- Et éventuellement un screenshot.png pour donner une image à mon thème.

![](https://capitainewp.io/wp-content/uploads/2020/04/fichiers-theme-enfant-wp-scaled.jpg.webp)

La déclaration du thème est faite dans le fichier style.css sous forme de commentaires CSS (c’est le fonctionnement de WordPress, même si ce n’est pas forcément logique).

```css
/*
Theme Name: Divi Child
Theme URI: http: //example.com/
Description: Thème enfant Divi
Author: Max
Author URI: http: //example.com/about/
Template: Divi
Version: 1.0
*/
```

Vous devez indiquer le nom de votre thème enfant dans Theme Name, par exemple Divi Child, et indiquer dans Template le nom du thème parent (qui est généralement le nom du dossier).

> Ne mettez pas d’espace avant les deux points, sinon ça ne marchera pas !

Ce fichier CSS est appelé automatiquement par votre thème enfant, il vous servira à surcharger les styles du thème parent, ou ajouter des classes CSS supplémentaires.

Du côté du fichier functions.php cette fois :

```php
<?php 
function alex_enqueue_assets(){
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'alex_enqueue_assets' );
```

Ce petit bout de code va permettre d’aller chercher la feuille de style du thème parent, car sinon votre thème n’aura plus aucun style.

Vous pouvez utiliser style.css pour surcharger les styles du thème parent, mais vous pourriez tout aussi bien charger d’autres styles et scripts comme on l’a vu précédemment dans cette formation.

Profitez du functions.php pour insérer du code PHP supplémentaire et agir sur les hooks WordPress ou fournis par le thème.

## Activer le thème enfant

Enfin, on va aller activer le thème enfant depuis votre interface de WordPress, dans Apparence > Thèmes. 

![](https://capitainewp.io/wp-content/uploads/2020/04/activer-theme-enfant-scaled.jpg.webp)

Vous devriez voir votre thème enfant, et vous pouvez donc l’activer à la place du thème original.

Désormais, WordPress chargera votre feuille de style en plus de celle du thème parent, lira votre functions.php en plus de celui du parent, et vous allez pouvoir surcharger les modèles de templates en les copiant dans le dossier du thème enfant.

## Surcharger le thème parent

Voici maintenant 3 exemples rapides de ce que vous pourrez faire avec votre thème enfant :

## Surcharger le CSS

Un style du thème ne vous convient pas, et vous n’avez trouvé aucune option pour le modifier, alors le CSS va pouvoir vous aider. Ouvrez l’inspecteur du navigateur, trouvez l’élément, et reportez son sélecteur dans style.css. Ajoutez-y votre style personnalisé :

```css
.header_title {
    font-size: 1.5em;
    font-weight: bold;
    line-height: 1.8 !important;
}
```

Parfois vous n’aurez pas d’autre choix que d’ajouter !important afin de surchager un style récalcitrant.

Mais au lieu de faire un thème enfant, vous auriez pu tout aussi bien utiliser l’éditeur CSS qui se trouve dans WordPress, dans Apparence > Personnaliser > CSS additionnel.

![](https://capitainewp.io/wp-content/uploads/2020/04/alternative-css-scaled.jpg.webp)

Dans ce cas, le CSS additionnel est enregistré en base de données. C’est d’ailleurs bien plus pratique si votre site n’est pas en local car ça vous évite de transférer à nouveau votre fichier CSS après chaque modification.

> Ne vous amusez pas à bidouiller le CSS si vous n’êtes pas à l’aise avec cette technologie car vous auriez vite fait de faire des dégats.

## Ajouter du PHP

Imaginons maintenant que vous avez besoin de manipuler du code PHP, pour par exemple ajouter un nouveau type de publication, autoriser l’import des SVG, ou encore ajouter une taille d’image…

Pour cela vous allez pouvoir ajouter votre code dans functions.php du thème enfant, tout comme vous le feriez avec le fichier functions dans un thème classique.

```php
<?php 
function alex_allow_svg( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'alex_allow_svg' );
```

Une alternative au thème enfant est d’utiliser l’extension Code Snippets, qui permet de gérer vos ajouts de code PHP (des snippets) directement depuis l’interface de WordPress ! Vous pourrez en plus activer ou désactiver un “snippet” de code à la volée. 

C’est très pratique surtout si vous n’êtes pas à l’aise en PHP. 

## Modifier les templates

Et enfin, le thème enfant va vous permettre de modifier des templates du thème parent, ou de toute autre extension, comme par exemple WooCommerce.

Le principe est simple, il suffit de copier le fichier de template du thème parent, et le coller dans votre thème enfant, en respectant la même architecture de dossiers et sous-dossiers, s’il y en a. 

![](https://capitainewp.io/wp-content/uploads/2020/04/override-template-scaled.jpg.webp)

Dans cet exemple, j’ai dupliqué sidebar.php dans mon thème enfant, je vais donc pouvoir le modifier à ma guise, et c’est lui qui sera désormais utilisé par le thème.

Normalement, si vous utilisez un constructeur de page comme Elementor ou Divi, vous n’aurez pas besoin de surcharger les modèles, puisque vous allez tout concevoir de A à Z via le page builder.

Dans ces 3 exemples, on n’a donc pas touché une seule fois au thème original. On ne perdra donc pas les modifications si une mise à jour de celui-ci était proposée.

## Les thèmes enfants sont-ils vraiment utiles ?

Comme on vient de le voir, chaque aspect du thème enfant est réalisable via une alternative. Donc ils ne sont pas toujours nécessaires. On peut facilement s’en passer !

Mais si vous êtes un freelance, ou en agence, et que vous êtes du genre à versionner votre code, alors optez pour un thème enfant.

Mais si vous n’êtes pas développeur, et que vous voulez jouer la simplicité, alors rabattez-vous plutôt sur les alternatives proposées car les thèmes enfants nécessitent tout de même un peu de compétences techniques !

> Dans cette formation, notre but est de créer notre propre thème sur mesure. On n’aura donc pas besoin de thème enfant !

On parle souvent de thèmes enfants mais en réalité ils ne sont utiles que dans des cas bien spécifiques.

Vous savez maintenant à quoi ils servent et comment les mettre en place, si le besoin se fait sentir uniquement.