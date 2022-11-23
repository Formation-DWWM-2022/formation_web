# Les Hooks et le fichier functions.php

C’est dans le fichier functions.php de notre thème que l’on va ajouter de nouvelles fonctionnalités et configurer certains aspects du CMS, grâce à un système très bien pensé nommé Hooks.

Le fichier functions.php est un incontournable dans tous le thèmes, car c’est dans ce fichier que l’on va pouvoir activer les fonctionnalités de WordPress et créer nos propres fonctions sur mesure.

On peut dire que le functions.php est la partie « code » de notre thème. Et pour cela on va utiliser le système de Hooks qui va nous permettre de nous brancher à certains moments clé de WordPress afin de modifier son comportement. C’est l’un des concepts les plus importants et intéressant du CMS.

## À quoi sert le functions.php ?

Il y a énormément de choses que l’on peut faire avec ce fichier, et c’est ce que l’on va voir dans les prochains cours.

De nombreuses fonctionnalités de WordPress ne sont pas actionnables depuis l’interface d’administration, c’est pour cela que le développeur va passer par ce fichier pour en activer, ajouter des configurations…

Dans un fichier functions.php on peut :

    Activer des fonctionnalités comme les images mises en avant ;
    Déclarer des emplacements de menus, zones de widgets ;
    Déclarer des feuilles de styles CSS et scripts JS ;
    Déclarer de nouveaux types de publications et taxonomies ;
    Déclarer des fonctions sur mesure ;
    Gérer les requêtes Ajax ;
    Réécrire des URLs ;
    Personnaliser certains réglages d’extensions ;
    Personnaliser l’interface d’administration ;
    Créer des routes dans l’API Rest ;
    Et bien plus encore…

## Que sont les hooks dans WordPress ?

En fait, d’ici on va pouvoir interagir sur WordPress, le thème, les extensions afin d’en modifier leur comportement natif sans pour autant toucher à leur code !

C’est possible grâce à un système intelligent de hooks (crochets) qui vont nous permettre d’accrocher nos fonctions sur mesure lors de moments clés de l’exécution du CMS.

> Les Hooks sont des fonctions déclarées par le développeur de thème ou d’extension qui permettent d’interagir avec le coeur de WordPress, d’autres thèmes ou extensions et lancés à des moments clés de leur exécution. Par exemple, on peut intercepter le moment où WordPress enregistre un article dans la base, afin d’y apporter des modifications. Il existe 2 types de Hooks : les actions, un moment clé pour lancer ses propres fonctions, et les filtres, pour intercepter une valeur à un moment donné et la modifier.

Ce qu’il faut retenir, c’est qu’il y a donc 2 types de Hooks dans WordPress :

- Les Actions : à des moments clés, on peut lancer notre propre fonction pour faire des choses supplémentaires dans WordPress ;
- Les Filtres : qui permettent d’intercepter une valeur afin de la modifier.

Exemples :

- Un développeur peut insérer une fonction qui calcule le nombre de mots d’un article au moment où WordPress l’enregistre, via une action ;
- Une extension de SEO comme Yoast intercepte le Title de la page via un filtre afin d’en écrire une version plus adaptée pour le référencement naturel.

> Grâce aux hooks, on va pouvoir modifier le comportement de WordPress sans pour autant modifier le code source de celui-ci.

D’ailleurs, ce serait une mauvaise idée : à la prochaine mise à jour du coeur, ou d’une extension, vos modifications seraient irrémédiablement écrasées.

## Hooks et functions.php

Des Hooks, il y en a partout dans WordPress, et on va énormément les utiliser dans la suite de cette formation.

D’ailleurs, une extension se repose intégralement sur des hooks pour fonctionner.

En ce qui concerne la création de thèmes, c’est la même chose : notre fichier functions.php va lui aussi principalement s’appuyer sur des hooks. Voici un exemple :

```php
<?php 
function alex_remove_menu_pages() {
 remove_menu_page( 'tools.php' );
 remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'alex_remove_menu_pages' );
```

Cette fonction me permet de retirer des éléments inutiles de l’admin WordPress, afin de l’alléger.

Le hook est appelé via la fonction add_action() et le moment clé est admin_menu. Cette action est appelée par WordPress au moment ou il s’apprête à afficher le menu d’admin. Ce n’est donc pas choisi arbitrairement.

J’indique à WordPress, qu’avant de générer le menu d’admin, je veux lancer ma propre fonction alex_remove_menu_pages (ça par contre c’est un nom arbitraire) afin d’ajouter ou supprimer des entrées dans ce menu.

Notez que j’ai préfixé ma fonction avec le nom de mon thème : alex_. Prenez la bonne habitude de le faire à chaque fois. Pourquoi ?

> Si vous mettez des noms de fonctions trop génériques elles pourraient entrer en conflit avec des fonctions natives de WordPress ou déclarées par une extension car elles porteraient le même nom.

La fonction remove_menu_page() permet de retirer des éléments de ce menu, mais si j’avais simplement appelé cette fonction hors de l’action, il ne se serait rien produit : WordPress n’aurait pas encore généré le menu en question et la fonction n’aurait eu aucun effet.

Les hooks permettent donc de configurer / agir / modifier WordPress au bon moment.

À partir du prochain cours, on va voir les réglages et hooks correspondants plus en détails.

## Scinder functions.php en plusieurs fichiers

Dans certains thèmes, il se peut qu’au bout d’un moment votre fichier functions.php commence à être assez conséquent ! Du coup rien n’empêche de le scinder en plusieurs parties :

```php
<?php 
 // Configuration du thème
 require_once get_template_directory() . '/inc/config.php';

 // Types de publication et taxonomies
 require_once get_template_directory() . '/inc/post-types.php';

 // Fonctionnalités
 require_once get_template_directory() . '/inc/features.php';
```

On utilise la fonction get_template_directory() qui permet de récupérer le nom du dossier du thème actif (son Path).

Les thèmes premium ont tous tendance à utiliser cette technique, sinon leur fichier possèderait plusieurs milliers de lignes de code.

Voici pour la théorie, maintenant passons à la pratique ! Dans les prochains cours on va voir les paramètres les plus utiles pour notre fichier functions.php et leurs Hooks correspondants.
