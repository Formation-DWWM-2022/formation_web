# L’architecture MVC : bien la comprendre

- Le MVC qu’est ce que c’est ? (Model View Controller) : https://youtu.be/HxhwAc7zzgE
- What Is The MVC Model : https://youtu.be/3OKOe7CraGY?list=PL0eyrZgxdwhypQiZnYXM7z7-OTkcMgGPh

Modèle-vue-contrôleur ou MVC est un motif d'architecture logicielle destiné aux interfaces graphiques lancé en 1978 et très populaire pour les applications web. Ce type d’architecture, aujourd’hui très répandu dans les projets d’applications web, doit son succès notamment à sa forte maintenabilité et à sa facilité à être utilisé en travail collaboratif. Le motif est composé de trois types de modules ayant trois responsabilités différentes : les modèles, les vues et les contrôleurs.

![](https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png/370px-Mod%C3%A8le-vue-contr%C3%B4leur_%28MVC%29_-_fr.png)

Une application conforme au motif MVC comporte trois types de modules : les modèles, les vues et les contrôleurs.

- Le modèle, ou model : Élément qui contient les données ainsi que de la logique en rapport avec les données : validation, lecture et enregistrement. Il peut, dans sa forme la plus simple, contenir uniquement une simple valeur, ou une structure de données plus complexe. Le modèle représente l'univers dans lequel s'inscrit l'application. C’est ici que va être stockée la data, et tout ce qui permet de la modifier (getters, setters, etc.), que ça soit en local en en distant (base de données).

- La vue, ou view : Partie visible d'une interface graphique. La vue se sert du modèle, et peut être un diagramme, un formulaire, des boutons, etc. Une vue contient des éléments visuels ainsi que la logique nécessaire pour afficher les données provenant du modèle. Dans une application de bureau classique, la vue obtient les données nécessaires à la présentation du modèle en posant des questions. Elle peut également mettre à jour le modèle en envoyant des messages appropriés. Dans une application web une vue contient des balises HTML.

- Le contrôleur, ou controller : Module qui traite les actions de l'utilisateur, modifie les données du modèle et de la vue. C’est aussi l’intermédiaire principal entre la vue et le modèle. Par exemple, la vue soumet un formulaire au contrôleur, qui gère sa validation via du code métier, et demande au modèle de faire des modifications dans la base de données.

![](https://user.oc-static.com/upload/2022/05/09/16521046284748_P2C1-1%20%285%29.png)

Ce motif est utilisé par de nombreux frameworks pour applications web tels que Ruby on Rails, Grails, ASP.NET MVC, Spring, Struts, Symfony, Apache Tapestry, Laravel, AdonisJS, Django ou AngularJS. 

# Exemple simple
Le fichier du contrôleur demande les données au modèle sans se soucier de la façon dont celui-ci va les récupérer. Par exemple : « Donne-moi la liste des 30 derniers messages du forum numéro 5 ». Le modèle traduit cette demande en une requête SQL, récupère les informations et les renvoie au contrôleur.

Une fois les données récupérées, le contrôleur les transmet à la vue qui se chargera d'afficher la liste des messages.

Nous avions 3 fichiers :
- index.php: le contrôleur (chef d'orchestre) ;
- templates/homepage.php: la vue (page HTML...) ;
- src/model.php: le modèle (requêtes SQL...).

# Exemple d'une application web d’une banque
On aurait dans les models les modèles de données des comptes, clients, transactions, etc. Ainsi que tout ce qui permet de les transformer (changer l’adresse d’un client, ajouter ou débiter une somme sur son compte, etc.).

Les vues seraient les interfaces auxquelles accéderaient les utilisateurs : page du compte, historique des transactions, formulaire de virement, etc.

Et les contrôleurs, eux, seraient les responsables de toute la logique : vérification que le format de l’adresse est correct pour le changement, vérification du provisionnement d’un compte pour le virement, etc.

Voici un exemple d’utilisation : l’utilisateur se connecte via une vue, le contrôleur vérifie que ses identifiants sont corrects, il créé le modèle de l’utilisateur et renvoie une autre vue avec les données remplies.

# Quelques avantages
Les avantages du kit :
- Meilleure organisation du code
- Diminution de la complexité lors de la conception
- Conception claire et efficace grâce à la séparation des données de la vue et du contrôleur
- Possibilité de réutilisation de code dans d’autres applications
- Un gain de temps de maintenance et d’évolution du site
- Une plus grande souplesse pour organiser le développement du site entre différents développeurs. (création des vues par un développeur front pendant qu’un développeur back travailler sur les contrôleurs) ;
- Plus de facilité pour les tests unitaires

Quelques inconvénients
- Augmentation de la complexité lors de l’implantation;
- Éventuel cloisonnement des développeurs;
- Architecture complexe pour des petits projets;
- Le nombre important de fichiers représente une charge non négligeable dans un projet

En somme, la création d‘applications utilisant l’architecture MVC peut s’avérer lente et coûteuse, l’utilisation de frameworks est recommandé pour faciliter le travail et réduire le temps de réalisation tout en profitant des avantages qu’offre cette architecture.

# MVP et MVVM
Les motifs model-view-presenter (MVP) et model-view-view model (MVVM) sont semblables au motifs modèle-vue-contrôleur, à quelques différences près.
- Dans le patron MVP, le contrôleur est remplacé par une présentation. La présentation est créée par la vue et lui est associée par une interface. Les actions utilisateur déclenchent des événements sur la vue, et ces événements sont propagés à la présentation en utilisant l'interface.
- Dans le patron MVVM il y a une communication bidirectionnelle entre la vue et le modèle, les actions de l'utilisateur entraînent des modifications des données du modèle.

# Flux de traitement
En résumé, lorsqu'un client envoie une requête à l'application :
- la requête envoyée depuis la vue est analysée par le contrôleur (via par exemple un handler ou callback).
- le contrôleur demande au modèle approprié d'effectuer les traitements et notifie à la vue que la requête est traitée.
- la vue notifiée fait une requête au modèle pour se mettre à jour (par exemple affiche le résultat du traitement via le modèle).

# Conclusion
Comme on l’a vu au long de ce cours, MVC est un pattern de développement aujourd’hui présent presque partout.

Basé sur ses trois éléments (modèle, vue, contrôleur), il permet d’uniformiser un développement, très utile pour un travail en équipe.

Cependant, il a ses avantages et inconvénients, inconvénients qui ont poussé à l’émergence de son évolution, [Flux](../Flux/readme.md), très utilisé aujourd’hui via React.
