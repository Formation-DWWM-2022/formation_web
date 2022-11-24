# Préparer des faux contenus avec FakerPress

Afin de construire nos modèles de pages, nous allons avoir besoin d’ajouter des contenus à afficher sur notre site. On va ajouter des pages, catégories, changer la page d’accueil du site et générer des articles, grâce à l’extension FakerPress.

Si on ne créé pas de contenus, notre thème n’aura pas grand chose à afficher et ce sera difficile de tester son rendu. Je vous propose de remédier à ça immédiatement en ajoutant des articles, mais aussi des catégories, articles et pages. Ensuite, on générera automatiquement des articles pour aller plus vite.

## Créer des catégories

Allez dans Articles > Catégories et créez quelques catégories de base, comme par exemple : Films, Séries, Livres, BD, Manga, Documentaires…

![](https://capitainewp.io/wp-content/uploads/2019/01/wp-creer-categories-1600x1057.jpg.webp)

## Créer des pages

Maintenant rendez-vous dans Pages > Ajouter et créez une page Accueil, une page Blog, puis une page Contact. Indiquez pour chacune le titre, au moins un paragraphe puis publiez-les.

![](https://capitainewp.io/wp-content/uploads/2019/01/wp-creer-page-1600x849.jpg.webp)

Vous constaterez que 2 pages sont présentes par défaut :

- Page d’exemple, que vous pouvez mettre à la corbeille ;
- Politique de Confidentialité obligatoire depuis le RGPD de 2018.

## Changer la page d’accueil du site

Par défaut WordPress affiche le blog en page d’accueil et quand on fait un site (et pas qu’un blog) ce n’est pas ce que l’on veut. Du coup en prévision de la suite on va aller changer ça. Rendez-vous dans Réglages > Lecture puis sélectionnez La page d’accueil affiche : Une page statique. Assignez ensuite Accueil en page d’accueil, et Blog en page des articles.

![](https://capitainewp.io/wp-content/uploads/2019/01/wp-assigner-page-accueil-1600x1023.jpg.webp)

Pensez à enregistrer via le bouton en bas de page.

> N’oubliez pas de faire cette manipulation sur chacun de vos nouveaux sites s’ils ne sont pas de simples blogs.

## Créer des articles avec FakerPress

On va maintenant créer des articles. Mais au lieu de les créer un par un, ce qui peut être long et fastidieux, on va faire appel à l’extension FakerPress qui est gratuite. Elle va nous permettre de générer des articles avec titres, images, textes… à base de faux texte de type Lorem Ipsum.

Cette extension est très pratique lorsque vous développez votre thème, et vous permettra de tester facilement la mise en page et vos styles dans de nombreux cas de figure.

## Télécharger FakerPress

Depuis votre interface d’administration, rendez-vous dans Extensions > Ajouter puis recherchez FakerPress (sans espace).

Téléchargez-la et activez-la.

## Configurer le générateur

Une fois installée, une nouvelle entrée apparait en bas du menu WordPress. Cliquez sur cette entrée FakerPress > Articles.

Vous remarquez que l’on aurait pu aussi se servir de cet outil pour générer des noms de catégories, mais j’ai préféré vous les faire créer à la main, comme ça ils ont plus de sens.

![](https://capitainewp.io/wp-content/uploads/2019/01/fakerpress-generer-articles-1-1600x1017.jpg.webp)

Au niveau des réglages j’ai mis :

- Quantité : 20 articles (il faut au moins 2 pages d’articles lorsque l’on va ajouter la navigation) ;
- Date : publiés entre il y a un an et aujourd’hui (entrez les dates manuellement) ;
- Post Type : dans les articles ;
- Auteur : moi-même ;
- Taxonomies : Catégories seulement ;
- Nombre : 1 seule par article ;
- Images providers : je ne laisse que Unsplash (placehold.it met des carrés gris pas jolis) ;
- Et je retire également placehold.it dans les meta.

Validez ensuite, la création peut prendre plusieurs secondes.

Allez ensuite dans Articles > Tous les articles et vous les verrez affichés :

![](https://capitainewp.io/wp-content/uploads/2019/01/articles-generes-1600x1019.jpg.webp)

Super, on est maintenant prêts pour la suite ! Dans les deux prochains cours on va voir comment afficher le contenu dynamique de nos pages en fonction de leur type (si c’est une page, un article du blog…).
