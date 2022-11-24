# Les templates parts

Dans le but d’éviter des répétitions de code, il est possible d’appeler des sous-templates grâce à la fonction get_template_part() que l’on va voir dans ce cours.

Un des concepts de la programmation est Don’t Repeat Yourself (DRY) et rappelle qu’il ne faut pas écrire 2 fois le même code pour faire une seule chose.

Heureusement pour nous, WordPress nous propose quelques solutions pour cela, dont la fonction get_template_part() qui permet d’appeler un sous-template pouvant contenir ce que vous voulez, et réutilisable à l’infini.

## Appeler un sous-template

Imaginons que vous ayez créé à la main un formulaire d’abonnement à votre newsletter, et que vous souhaitez l’intégrer dans votre thème à différents endroits.

![](https://capitainewp.io/wp-content/uploads/2019/02/template-part-1600x613.jpg.webp)

Pour cela vous créez un fichier newsletter.php par exemple, et vous y mettez le code suivant :

```php
<form class="newsletter-form">
    <p>Des offres exclusives, des actus WordPress et du contenu bonus en avant-première</p>
    <input type="email" name="email" placeholder="E-mail">
    <input type="submit" value="Je m'abonne">
</form>
```

Pour appeler ce sous-template, utilisez simplement la fonction get_template_part() à l’endroit désiré, par exemple dans archive.php, single.php, mais aussi footer.php…

```php
<?php get_template_part( 'newsletter' ); ?>
```

Vous remarquerez que l’on ne met pas l’extension de fichier à la fin. Donc simplement newsletter, et pas newsletter.php.

Dans le but de garder votre dossier de thème organisé, vous pouvez stocker ces templates dans un sous-dossier, par exemple parts/newsletter.php. Dans ce cas modifiez votre appel en incluant le nom de dossier :

```php
<?php get_template_part( 'parts/newsletter' ); ?>
```

Là aussi, on ne met pas le .php.

> Vous pouvez très bien utiliser cette fonction pour alléger un template un peu trop lourd, en séparant certaines parties dans des sous-templates afin de gagner en lisibilité.

## get_template_part vs include

Au fait, pourquoi ne pas utiliser simplement les fonctions include() ou require() en PHP directement ?

En fait get_template_part() est adapté pour WordPress et ses différents cas de figure : `

- En premier lieu, cette fonction ne renvoie pas d’erreur si elle n’a pas trouvé le template correspondant (il se peut dans certains cas qu’on cherche à trouver un template dynamiquement, et il arrive qu’il n’existe pas) ;
- De plus, la fonction sait récupérer le bon template dans le bon dossier dans le cas où vous avez utilisé un thème enfant.

Donc préférez l’utilisation de get_template_part() dans toutes les situations.

## Exemple : template part et les formats

Il y a quelques années en arrière, alors que Tumblr était à la mode avec son concept de micro-blogging, WordPress a voulu surfer sur la vague et a introduit dans la version 3.1 les Post Formats.

L’idée du micro-blogging était de parfois ne partager qu’une citation, une musique, une vidéo sans en faire un article complet pour autant.

Les Posts Formats permettaient donc d’adapter la mise en page pour chacun de ces cas.

Et si je parle au passé, c’est qu’aujourd’hui cette fonctionnalité est tombée dans l’oubli, car trop peu utilisée, mais elle pourrait quand même trouver son intérêt dans de rares cas.

Voici l’exemple avec le thème GoodInc qui prend en charge les Posts Formats :

![](https://capitainewp.io/wp-content/uploads/2017/05/theme-post-format.jpg.webp)

Il y avait donc un sous-template dédié à chaque mise en page possible : article, audio, video, image, citation, galerie, lien…

Au lieu de faire un gros if/else dans le single.php, on appelait simplement le fichier correspondant, par convention : content-article.php, content-audio.php, content-video.php…

Et pour cela notre get_template_part possède un deuxième paramètre :

```php
<?php 
 // Si le Post Format est "audio", WordPress ira chercher content-audio.php
 get_template_part( 'content', get_post_format() ); 
?>
```

- Le premier paramètre permet donc de récupérer le début du nom de fichier : « content » ;
- Le second permet de récupérer le Post Format, renvoyé grâce à la fonction get_post_format().

Vous pouvez encore le voir aujourd’hui dans le code de beaucoup de thèmes premium.

Si je vous montre ça, c’est que cette utilisation dynamique de la fonction get_template_part() pourrait vous servir dans d’autres situations à l’avenir.

## Court-circuiter le template hierarchy avec les templates parts

Pour terminer, je vais vous donner une astuce que j’utilise pour améliorer le Template Hierarchy car il y a quelques cheminements qui ne me plaisent pas.

## Le blog et les archives

Comme on l’a vu précédemment, la page d’accueil du blog est toujours home.php, alors que les autres archives sont représentées par archive.php. Ce fonctionnement aurait un sens si votre blog avait une mise en page différente de ses archives, mais c’est rarement le cas.

Du coup voici ce que je vous propose de mettre dans home.php :

```php
<?php get_template_part( 'archive' ); ?>
```

Et c’est tout ! Là on indique que l’on veut plutôt utiliser archive.php. Comme ça toutes les pages d’archives du blog auront le même et unique template.

## La recherche et les archives

Pour la recherche, c’est pareil : bien souvent les résultats sont affichés de la même manière que le blog. Donc si c’est votre cas, on va également mettre le code suivant mais cette fois dans search.php :

```php
<?php get_template_part( 'archive' ); ?>
```

Ce qui est magique, c’est que ça ne pose pas de souci à WordPress, et grâce à la boucle ça fonctionnera toujours aussi bien

Donc si je reprend mon Template Hierarchy simplifié, voici ce que j’ai fait :

![](https://capitainewp.io/wp-content/uploads/2019/02/template-hierarchy-scinte.png.webp)

Bien sûr, vous n’êtes pas obligé de suivre ce fonctionnement, mais il m’a toujours été utile dans les thèmes que j’ai créés.

N’hésitez donc pas à utiliser get_template_part() pour alléger vos templates et pour éviter les répétitions dans votre code.

Dans le prochain cours, on va voir les conditionnals tags, qui vont également nous être utile dans notre quête d’un code propre et sans répétition.
