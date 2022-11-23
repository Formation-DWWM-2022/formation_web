# Prérequis techniques pour développer sous WordPress

Avant de se lancer dans la conception de notre premier thème nous allons vérifier les prérequis techniques nécessaires à la bonne compréhension de cette formation.

> Le développement de thèmes WordPress est à la portée de tous et ne nécessite que quelques bases en web, et de la motivation !

Bien souvent j’entend autour de moi des gens dire qu’ils préfèrent n’utiliser que des thèmes premium car le développement web est difficile.

Mais la philosophie de WordPress a toujours été de se rendre accessible au plus grand nombre tout en permettant aux développeurs aguerris de pouvoir ajouter des fonctionnalités avancées.

La bonne nouvelle c’est que vous n’avez pas besoin d’être un développeur expert en PHP pour créer des thèmes sur mesure avec WordPress. Ce dernier possède toute une gamme de fonctions qui vont grandement nous simplifier la tâche.

WordPress est extensible et flexible, ce qui nous permettra d’ajouter nos fonctionnalités et modifier le comportement natif sans pour autant se prendre la tête !

Voici les quelques prérequis que je recommande toutefois avant de vous lancer :

## HTML et CSS

Le HTML et le CSS sont les bases d’une page web affichée dans votre navigateur.

    Le HTML est le fond : il représente au travers de balises les blocs, paragraphes, titres, images, liens de votre page ;
    Le CSS est la forme, il permet la mise en page du contenu : couleurs, espacements, tailles, polices…

Ce ne sont pas des langages de programmation et de ce fait ils sont plus simples à apprendre. Néanmoins ne négligez pas leur apprentissage : il faut pas mal de maitrise pour concevoir des pages efficaces, responsives, avec une mise en page précise et belle, surtout sur des gros projets.

Ce n’est pas très grave si vous ne les maitrisez pas bien pour le moment, mais il vous sera absolument nécessaire de bien connaitre ces 2 langages lorsque vous créerez votre premier thème par vous-même.

## Le PHP

Le PHP est le langage de programmation le plus en vogue sur Internet. Presque tous les hébergeurs le proposent aujourd’hui, et comme WordPress est fait en PHP, vous n’aurez aucun mal à trouver un hébergement compatible.

Le succès de PHP vient en partie de la simplicité à l’apprendre. Si vous commencez la programmation, PHP est un bon point d’entrée dans le monde du développement web.

Comme je le disais plus haut, il n’est pas nécessaire de maitriser parfaitement la programmation en PHP pour commencer à développer un thème WordPress, car ce dernier vous facilite grandement la tâche avec des fonctions et outils prêts-à-l’emploi.

Si vous n’avez jamais fait de PHP, je vous recommande de commencer par voir au moins les bases du langage.

> Voici un bout de code PHP qui permet d’afficher un résumé d’article :

```php
<?php 
if( have_post()) : while( have_post()) : the_post; // Récupère les contenus à afficher
?>
    <article class="post">
       <h2><?php the_content(); // Affiche le titre de l'article ?></h2>
       <p><?php the_excerpt(); // Affiche l'extrait ?></p>
       <a href="<?php the_permalink(); // Affiche le lien ?>">Lire l article</a>
    </article>
<?php endforeach; endif; ?>
```

## Le JavaScript

Si vous avez un peu suivi l’actualité du web ces derniers temps vous aurez sûrement remarqué l’effervescence de la communauté JS : des nouvelles librairies et frameworks qui sortent tous les jours à ne plus savoir où donner de la tête.

Et si vous avez suivi l’actualité WordPress vous avez sûrement entendu Matt Mullenweg, l’un des principaux créateurs de WordPress, annoncer que WordPress aurait de plus en plus de javascript en son coeur.

Alors rassurez-vous, vous n’aurez pas forcément besoin de JS dans votre développement de thème et vous pourrez largement vous contenter de quelques bases en JS natif et surtout en jQuery.

jQuery est une librairie utilisée dans la majeure partie des sites et applications qui permet de rendre plus simple et ludique l’écriture de Javascript.

Donc même si ce n’est pas obligatoire, je vous conseille à terme d’apprendre au moins les rudiments de jQuery, qui permettra de rendre vos sites plus interactifs.

## Les serveurs et le Web

Vous n’avez pas besoin d’être un expert en réseaux mais il est important de connaitre au moins les bases du fonctionnement d’Internet comme les serveurs, les hébergements, les noms de domaine et quelques notions de requêtes HTTP.

C’est toujours plus pratique de connaitre les fondements sur lesquels on va s’appuyer par la suite !

Il faut bien comprendre que WordPress, écrit en PHP, génère depuis le serveur des pages au format HTML qu’il envoie au client, votre navigateur, via Internet.

Ensuite chaque ressource est appelée depuis le client : scripts, styles, polices d’écritures, images… le tout via le protocole HTTP (ou même HTTPS – sécurisé).

On aura notamment besoin de ces notions plus tard, lorsque l’on parlera de performances web. On fera une petite révision à ce moment là.

## Les bases de WordPress

Avant de vous lancer dans le développement de thèmes sur mesure il est toujours bien de connaitre déjà un minimum WordPress : comment l’installer, activer un thème et des extensions, créer des pages et des articles.

On va tout de même revoir certaines bases essentielles dans cette formation, comme la distinction entre les articles, les pages, et les taxonomies.

## English please ! 🇬🇧

Et enfin il vous faudra un minimum de compétences en anglais car les outils et documentations ne sont pas toujours proposées en français.

Rassurez-vous car il ne faut pas non plus un gros niveau ! Le niveau scolaire suffira amplement même si en France, on est mal lotis. Pour vous entrainer, c’est le moment de passer votre Netflix en anglais sous-titré 😉.

> WordPress est développé principalement en PHP et lorsque l’on crée un thème nous avons besoin de connaitre HTML et CSS, et si on veut aller un peu plus loin dans l’interactivité des pages, Javascript. Quelques bases de WordPress et d’anglais nous serons bien utiles pour apprendre en toute sérénité.