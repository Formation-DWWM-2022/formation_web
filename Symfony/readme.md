<!--

https://gist.github.com/tomsihap/bbec9a89da170c7d4e02bf8046799878

https://gist.github.com/tomsihap/99b7ad51257721ee9c96bd2d95db504f

https://gist.github.com/tomsihap/e939150d64b25c7b4010c847a3e77d48

https://www.udemy.com/course/framework-symfony-de-0-a-pro/
https://gitlab.iut-clermont.uca.fr/tibertrand1/project-php-dealabs#tp-6-7-8-9-10
https://gist.github.com/tomsihap/bbec9a89da170c7d4e02bf8046799878
https://gist.github.com/tomsihap/e939150d64b25c7b4010c847a3e77d48
https://www.udemy.com/course/apprendre-symfony-par-la-creation-dun-site-ecommerce/
https://thomgo.github.io/Exercices/backend/symfony/
https://grafikart.fr/formations/symfony-4-pratique
http://pigne.org/teaching/infoweb/lab/TP_Introduction_Symfony
https://learn.web-develop.me/view/courses/symfony-5-le-guide-complet-debutants-et-intermediaires
https://cours.davidannebicque.fr/symfony/semestre-3/eco-systeme
https://github.com/search?q=symfony+cours+6&type=Repositories
https://github.com/codewithdary/symfony-6-course/tree/main
https://github.com/Alexandre-Peyron/symfony-training-course
https://github.com/Dannebicque/symfony-lp/blob/master/tp.md
https://github.com/Pierre-brtrd/Cours_Symfony_Pierre_Brtrd
https://wiki.juniorisep.com/media/consultants/formation_symfony5_1.pdf
https://www.youtube.com/watch?v=AJZML9SYSTk&list=PLFHz2csJcgk-t8ErN1BHUUxTNj45dkSqS&index=23
https://www.youtube.com/watch?v=Lqlq5K-s4Qc&list=PLUiuGjup8Vg5t20nu7aaJDnbHlhzXbbuN&index=42
https://www.youtube.com/watch?v=2EMU9TYzvB0&list=PLkHw7J3J2iaoIowz7LIImIFHkMJzO_84F&index=10

-->

# Symfony

![](https://media.giphy.com/media/iFCp5vk5VXOIgDqMsM/giphy.gif)

# Dates

- Vendredi 23 septembre 
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

- Introduction - Qu'est ce que Symfony et pourquoi l'utiliser ?
- Installation 1er projet symfony
- Structure de Symfony - MVC - .env
- Creation 1er page - creer un controleur et gestion des routes - retourner une reponse
- Twig , moteur de template - Les variables - Les conditions (if, else, for, set) - Réutiliser un template - Les filtres et fonctions - Ajouter du CSS et du JS
- Installer Boostrap sur Symfony / Twig
- Création entité : User
- Decouvrir ORM Doctrine - enregistrer table User en BDD
- Fixture - requêtes avec les repository - migrations - ManyToOne - ManyToMany
- Formulaire inscription
- Sauvegarder information inscription en BDD
- Encoder les mots de passe utilisateur
- Valider les données validator
- CRUD
- pagination
- Les vues privées : espace profil utilisateur
- Bundle EasyAdmin
- Comprendre les sessions
- Mailjet ou Swiftmailer
- Installer Stripe
- Tester son code
- Les commandes CRON

# Notre guide de style PHP -  Qu'est ce que le PSR ?

<https://grafikart.fr/tutoriels/psr-standards-903>

PSR est l’abréviation de PHP Standards Recommandation. Il s’agit d’un regroupement de standards et de conventions. L’objectif principal est de réunir les différentes méthodes de programmation présentes à travers les frameworks et CMS existants en PHP (Symfony, Laravel, PHP Natif, …). Ces conventions sont gérées par un groupe nommé PHP-Fig : ils créent, modifient ou suppriment les standards permettant de générer une uniformité parmi les différents projets réalisés en PHP.

Chaque PSR est associé à un numéro et représente un dépôt contenant une liste de conventions ou diverses interfaces permettant d’améliorer la coopération entre Développeurs PHP.Ces interfaces sont fonctionnelles dans leur état actuel mais restent néanmoins personnalisables selon le besoin.Il existe une liste assez conséquente de PSR dont certains encore en “draft” (en attente de validation ou de développement). Parmi ceux-ci, la partie qui nous intéresse est la liste “active”. Il s’agit de la liste validée par PHP-Fig et qui doit être mise en place durant la programmation d’un projet en PHP.Cette liste est en constante évolution et sera amenée à changer avec le temps.

- [eng] <https://www.php-fig.org/psr/>
- [eng] <https://code.tutsplus.com/tutorials/psr-huh--net-29314>
- [fr] <https://eilgin.github.io/php-the-right-way/>