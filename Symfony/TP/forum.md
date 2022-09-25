# TP Forum

## Présentation

Réaliser un forum, en utilisant Symfony. Votre forum devra intégrer les fonctionnalités suivantes :

* Inscription, connexion, déconnexion
* Création de message dans les catégories du forum
* Possibilité de répondre à un message
* Une recherche simple
* Liste des catégories, sous catégories, et messages associés
* Administration : Création des catégories et sous-catégories, administration des messages
* Il y aura 2 niveaux d'accès : Administrateur,  membre (possibilité de créer un message ou de modifier ses messages)
* Un message pourra intégrer des fichiers (images a minima)

**Vous êtes libre de la structure, de la mise en page et des données de votre base de données, mais vous devez répondre à la commande d'un forum**

## Notation

L'esthétique du forum n'est pas prise en compte. L'usage d'une librairie CSS ou d'un template est suffisant.

**Par contre, vous veillerez à l'ergonomie et à la lisibilité.**

Les points supplémentaires seront acquis en fonction des ajouts (pertinents) que vous ferez, soit pour proposer des fonctionnalités pertinentes, soit dans la qualité de la navigation et de l'accessibilité.

## TP

**Le sujet pourra évoluer en fonction de l'avancement du cours**

Pour cette première séance vous devrez mettre en place les éléments suivants :

### Première étape

* Une nouvelle installation de Symfony
* Mettre en place les controllers et les vues nécessaires à la navigation "publique" du site
  * Les vues seront des prototypes, n'hésitez pas à mettre des données fictives pour les remplacer ensuite par les données issues de la base de données.
  * Ces données pourraient venir du controller de manière fictive.
* Intégrer un template ou une librairie CSS et faire un minimum de mise en page
* Réfléchir au MCD que vous aller mettre en place.

### Deuxième partie

* Mettre en place la base de données, les tables et les relations.
* Intégrer des données fictives et modifier vos controllers pour alimenter vos vues avec ces données
* Intégrer les formulaires et la gestion des messages sur la partie publique.

### Troisième partie

* Mettre en place l'administration et les accès sécurisés.
* Mettre en place les CRUD pour le back-office.
* Mettre en place l'upload Tips : utiliser [VichUploaderBundle](https://github.com/dustin10/VichUploaderBundle) ou manuellement [FileUpload](https://symfony.com/doc/3.4/controller/upload_file.html)

