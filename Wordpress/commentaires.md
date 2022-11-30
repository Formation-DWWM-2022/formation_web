# Les commentaires

Les commentaires sont un bon moyen de créer de l’interaction avec vos lecteurs. De plus, ça permet de créer du contenu supplémentaire qui pourrait bien s’avérer pertinent pour les moteurs de recherche. Dans ce cours nous allons voir comment les mettre en place, et comment les modérer, et bien sûr comment éviter le Spam.

A quoi bon faire un blog si vos internautes ne peuvent pas poser leurs questions et donner leur avis ? On va justement voir dans ce cours comment mettre en place le système de commentaires de WordPress, et comment les administrer.

## Typologie des commentaires dans WordPress

On va d’abord regarder en détails tous les composants de commentaires fournis par WordPress :

![](https://capitainewp.io/wp-content/uploads/2019/02/commentaires-non-connecte-1600x1015.jpg.webp)

La liste des commentaires est hiérarchique : ils sont listés les uns après les autres mais lorsqu’une personne répond à un commentaire précédent, un sous-niveau est créé afin de faciliter la lecture (représenté par un décalage à droite) .

Chaque commentaire contient : l’avatar, le nom de la personne qui a commenté, la date de publication, le message, et un bouton répondre.

Le formulaire pour laisser un commentaire demande : le message à laisser, le nom, l’e-mail et éventuellement le site web de la personne. L’avatar est automatiquement récupéré grâce à l’adresse e-mail si la personne a un compte Gravatar.

Voyons maintenant à nouveau cette interface une fois connecté :

![](https://capitainewp.io/wp-content/uploads/2019/02/commentaire-connecte-1600x1022.jpg.webp)

Cette fois, on remarque que le formulaire pour laisser un commentaire ne propose plus qu’un champ. Comme les informations sont déjà connues (nom, e-mail), WordPress ne les redemande pas.

On voit aussi l’apparition d’un bouton modifier sous chaque commentaire : en tant qu’administrateur, c’est un lien utile pour aller rapidement gérer mes commentaires.

## Réglages des commentaires et de modération

WordPress propose plusieurs façons de gérer les commentaires grâce à différents réglages qui auront des impacts différents sur votre site.

On va aller voir dans notre interface d’administration de WordPress, dans Réglages > Discussion afin de voir ce qu’il est possible de faire.

![](https://capitainewp.io/wp-content/uploads/2019/02/reglages-discussion-commentaires-1600x1229.jpg.webp)

Vous pouvez :

    Limiter les commentaires aux utilisateurs connectés au site ;
    Fermer les commentaires d’un article après une certaine période ;
    Limiter l’imbrication des commentaires et réponses (je conseille de ne mettre que 2 niveaux) ;
    Recevoir un e-mail lorsqu’un commentaire est publié (je conseille de laisser activé) ;
    Diviser les commentaires en pages (je déconseille) ;
    Ne pas publier les commentaires tant que l’administrateur n’a pas validé (c’est ce que je fais sur ce site, mais sur d’autres je laisse ouvert) ;

Les réglages que vous choisirez vont dépendre des sites. 

Si vous autorisez automatiquement la publication d’un commentaire, vous vous retrouverez peut-être avec des commentaires « impolis » qu’il faudra filtrer.

Pour modérer vos commentaires, vous irez ensuite dans le menu Commentaires :

![](https://capitainewp.io/wp-content/uploads/2019/02/gestion-commentaires-1600x1045.jpg.webp)

## Ajouter les commentaires dans votre site WordPress

Bien, maintenant que l’on a configuré nos commentaires, il faut les afficher dans notre template ! Il y a plusieurs façons de faire : la version simple, et la version plus compliquée, mais qui apporte plus de contrôle.

## L’approche simple

Commençons avec la version simple. Ajoutez tout simplement cette fonction après votre contenu dans la boucle WordPress de single.php :

```php
<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="post">
        <h1 class="post__title"><?php the_title(); ?></h1>
        <div class="post__content">
            <?php the_content(); ?>
        </div>
        <?php comments_template(); // Par ici les commentaires ?>
    </div>
<?php endwhile; endif; ?>
```

Cette ligne suffit à aller chercher le template de commentaires par défaut qui affiche d’abord la liste des commentaires publiés, puis ensuite le formulaire de saisie d’un nouveau commentaire. Voici le rendu , sans CSS :

![](https://capitainewp.io/wp-content/uploads/2019/02/commentaires-template-defaut-1600x1324.jpg)

## L’approche sur mesure

La technique précédente suffira amplement dans 9 cas sur 10. Mais si vous souhaitez aller un peu plus loin, alors vous allez pouvoir créer votre propre template de commentaires !

Pour cela vous devez créer un fichier comments.php à la racine de votre thème. Dès que WordPress le détecte, il utilisera ce fichier au lieu du template par défaut.

Voici ce que l’on doit y mettre :

```php
<div id="commentaires" class="comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments__title">
            <?php echo get_comments_number(); // Nombre de commentaires ?> Commentaire(s)
        </h2>
    
        <ol class="comment__list">
            <?php
             // La fonction qui liste les commentaires
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </ol>
        
    <?php 
     // S'il n'y a pas de commentaires
     else : 
    ?>
        <p class="comments__none">
            Il n y a pas de commentaires pour le moment. Soyez le premier à participer !
     </p>
    <?php endif; ?>
 
    <?php comment_form(); // Le formulaire d'ajout de commentaire ?>
</div>
```

Tout d’abord, le Template tag get_comments_number() permet de récupérer le nombre de commentaires publiés. On peut d’ailleurs l’utiliser en dehors de comments.php, au début de l’article par exemple ou même dans archive.php.

Ensuite, la fonction wp_list_comments() permet de lister les commentaires publiés.

S’il n’y en a pas, on peut afficher un message à la place et on vérifie ça grâce aux fonctions comments_open() : les commentaires sont-ils ouverts ? et get_comments_number() : que s’il renvoie 0, ce sera considéré comme false par PHP.

Enfin, la fonction comment_form() permet d’afficher le formulaire de saisie d’un commentaire.

> Vous pouvez également vous baser sur le template des thèmes fournis par défaut avec WordPress histoire de vous en inspirer.

Et comme toujours, aidez-vous de la documentation afin de connaitre tous les paramètres et fonctions qui pourraient s’avérer utiles : <https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/comment-template/>

## Combattre le Spam dans les commentaires

Le premier Spam sera un grand événement dans la vie de votre site. D’un côté, c’est le début de la gloire, puisque vous gagnez en visibilité sur le web. D’un autre, il va falloir commencer à se défendre contre cela. Heureusement, Automattic (rappel : la maison mère de WordPress.com) a une extension pour ça : Akismet Spam Protection

Et ça tombe bien car il est installé par défaut dans WordPress. Son rôle est de filtrer automatiquement les commentaires Spam afin de vous éviter cette tâche fastidieuse.

Mais pour cela, vous aurez besoin d’une clé d’API pour l’activer. Pour un petit site, vous pouvez l’obtenir gratuitement : <https://akismet.com/signup/>

Si vous avez déjà un compte wordpress.com, vous pourrez l’utiliser pour vous connecter.

Enfin, allez dans Réglages > Akismet Anti-Spam et indiquez votre clé. Votre site devrait normalement être protégé contre la vermine du web !

Si vous préférez une alternative, il existe également l’excellent Antispam Bee

Votre site gère maintenant les commentaires et permet à vos internautes d’interagir avec vous, et de lancer des discussions ! Ce chapitre est maintenant terminé. Dans la suite du cours on va aborder un concept super important : les types de publication personnalisés.
