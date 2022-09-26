<!--
https://cours.davidannebicque.fr/symfony/semestre-3/eco-systeme

https://gist.github.com/tomsihap/bbec9a89da170c7d4e02bf8046799878

https://gist.github.com/tomsihap/99b7ad51257721ee9c96bd2d95db504f

https://gist.github.com/tomsihap/e939150d64b25c7b4010c847a3e77d48

https://www.udemy.com/course/framework-symfony-de-0-a-pro/
https://gitlab.iut-clermont.uca.fr/tibertrand1/project-php-dealabs#tp-6-7-8-9-10
https://gist.github.com/tomsihap/bbec9a89da170c7d4e02bf8046799878
https://gist.github.com/tomsihap/e939150d64b25c7b4010c847a3e77d48
https://www.udemy.com/course/apprendre-symfony-par-la-creation-dun-site-ecommerce/
https://thomgo.github.io/Exercices/backend/symfony/
https://learn.web-develop.me/view/courses/symfony-5-le-guide-complet-debutants-et-intermediaires
https://github.com/search?q=symfony+cours+6&type=Repositories
https://github.com/codewithdary/symfony-6-course/tree/main
https://github.com/Alexandre-Peyron/symfony-training-course
https://github.com/Dannebicque/symfony-lp/blob/master/tp.md
https://github.com/Pierre-brtrd/Cours_Symfony_Pierre_Brtrd

-->

# Symfony

![](https://media.giphy.com/media/iFCp5vk5VXOIgDqMsM/giphy.gif)

# Dates

- Lundi 26 septembre 
- Au jeudi 20 octobre

# Vidéo simples et efficace
> Code With Dary [eng]

This video will introduce you to Symfony - Want to learn an incredible open-source PHP framework? Symfony is one of the most popular frameworks when you need to build high-performance & complex web applications.
https://youtube.com/playlist?list=PLFHz2csJcgk-t8ErN1BHUUxTNj45dkSqS

> Développeur Musclé [fr]

👨‍💻 Guide complet de #Symfony 6 pour apprendre les bases de Symfony rapidement et simplement !
https://youtube.com/playlist?list=PLUiuGjup8Vg5t20nu7aaJDnbHlhzXbbuN

> Pentiminax [fr]

Créer son propre blog avec Symfony 6. Je vous montre comment créer un véritable CMS basé sur Wordpress.
https://youtube.com/playlist?list=PLkHw7J3J2iaoIowz7LIImIFHkMJzO_84F

# Résumé du cours

# Evaluation

# Objectifs

Dans un but pédagogique, et afin de vous fournir la meilleure expérience d’apprentissage possible, ce cours a été divisé en de multiples sous-chapitres eux mêmes regroupés en sections.

Chaque notion du cours est illustré par des exemples les plus concrets possibles. En effet, pour rendre le cours le plus digérable, intéressant, pédagogique et pratique possible, un fort accent a été mis sur la pratique.

Les codes des différents exemples vous seront fournis. Cependant, je vous conseille d’adopter une attitude active et de vous exercer sur chacun d’entre eux plutôt que de simplement les copier-coller si vous souhaitez véritablement progresser.

## MEMO

[A Symfony Cheatsheet](./memo.md)

# Sommaire

La documentation la plus importante à mettre en favoris : https://symfony.com/doc/current/index.html

- [Introduction - Qu'est ce que Symfony et pourquoi l'utiliser ?](./Cours/01-introduction.md)
- [Eco-Système de Symfony](./Corus/../Cours/02-eco-systeme.md)
- [Architecture de Symfony](./Cours/03-architecture.md)
- [Première page avec Symfony](./Cours/04-premiere-page.md)
- [Controller et Routes](./Cours/05-controller&routes.md)
- [Vues (TWIG)](./Cours/06-vues.md)
- [Boostrap installation](./Cours/07-boostrap.md)
- [Exercice](/Cours/08-exercice.md)
- [Modèles - Entités - ORM](./Cours/09-modele&entite&orm.md)
- [Relations entre entités](./Cours/10-relation-entity.md)
- [Formulaires](./Cours/11-formulaires.md)
- [Securite](./Cours/12-securite.md)

<!-- 
- Valider les données validator
- Pagination
- Les vues privées : espace profil utilisateur
- Bundle EasyAdmin
- Mailjet ou Swiftmailer
- Installer Stripe
- Les commandes CRON
- Auth 2FA
- API HTTPCLIENT
- Notification: https://yoandev.co/des-notifications-symfony-au-top-avec-notyf/
-->

# TP 

# VS extensions

I personally think that the following extensions are Must-Haves when working with Symfony:
• Community Material Theme (Extra)
• PHP Intelephense
• PHPDoc Comment
• PHP Namespace Resolver
• HTML Snippets
• JavaScript (ES6) code snippets
• Symfony code snippets and Twig Support & yaml
• Symfony for VSCode
• Twig
• Twig Language
• Twig Language 2VScode Great Icons
• Bracket Pair Colorizer
• Emmet Live

# Créer un environnement Symfony collaboratif

* [ ] composer create-project symfony/skeleton nom_du_projet
* [ ] cd nom_du_projet
* [ ] composer require twig annotation orm
* [ ] composer require maker debug-pack --dev
* [ ] cp .env .env.local
* [ ] git init
* [ ] Créer le dépôt sur GitHub
* [ ] git remote add origin https://github.com/....git
* [ ] git add * (attention, fonctionne grâce au .gitignore de symfony)
* [ ] git commit -m "installation de symfony"
* [ ] git push origin master


# Notre guide de style PHP -  Qu'est ce que le PSR ?

<https://grafikart.fr/tutoriels/psr-standards-903>

PSR est l’abréviation de PHP Standards Recommandation. Il s’agit d’un regroupement de standards et de conventions. L’objectif principal est de réunir les différentes méthodes de programmation présentes à travers les frameworks et CMS existants en PHP (Symfony, Laravel, PHP Natif, …). Ces conventions sont gérées par un groupe nommé PHP-Fig : ils créent, modifient ou suppriment les standards permettant de générer une uniformité parmi les différents projets réalisés en PHP.

Chaque PSR est associé à un numéro et représente un dépôt contenant une liste de conventions ou diverses interfaces permettant d’améliorer la coopération entre Développeurs PHP.Ces interfaces sont fonctionnelles dans leur état actuel mais restent néanmoins personnalisables selon le besoin.Il existe une liste assez conséquente de PSR dont certains encore en “draft” (en attente de validation ou de développement). Parmi ceux-ci, la partie qui nous intéresse est la liste “active”. Il s’agit de la liste validée par PHP-Fig et qui doit être mise en place durant la programmation d’un projet en PHP.Cette liste est en constante évolution et sera amenée à changer avec le temps.

- [eng] <https://www.php-fig.org/psr/>
- [eng] <https://code.tutsplus.com/tutorials/psr-huh--net-29314>
- [fr] <https://eilgin.github.io/php-the-right-way/>