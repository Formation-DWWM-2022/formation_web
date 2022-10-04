# Créer un environnement Symfony collaboratif

## Qu'elle est la différence entre Wamp et Docker ?

- Docker, c'est quoi ? https://youtu.be/8cH0ilGlQdE
- Docker expliqué en 5 minutes : https://youtu.be/mspEJzb8LC4 
- Présentation de Docker : https://grafikart.fr/tutoriels/docker-intro-634

Comment gérez-vous vos projets dans votre environnement local ? La plupart des gens utilisent probablement encore l’ancienne manière en séparant chaque logiciel comme serveur Apache, serveur MySQL, Install PHP, etc.,

Environnement de développement local traditionnel connu probablement comme;

- LAMP (Linux Apache MySQL PHP)
- MAMP (Mac Apache MySQL PHP)
- WAMP (Windows Apache MySQL PHP)
- XAMP (X-cross-platform Apache MySQL PHP)
- ...

Les outils de développement traditionnel n’est pas un logiciel mais plutôt une sorte d’environnement qui contient des serveurs (Apache, MySQL…), un interpréteur de script (PHP), et phpMyAdmin pour l’administration des bases de données MySQL, Donc vous pouvez l’utiliser comme une plateforme de développement Web sans être connecté à Internet.

![](https://blog.nitsantech.com/fileadmin/ns_theme_ns2019/blog/live/Productive_TYPO3_Development_with_Docker_DDEV_Composer/Productive_TYPO3_Development_with_Docker_DDEV_Composer2.png)

« Docker est un outil qui peut empaqueter une application et ses dépendances dans un conteneur isolé, qui pourra être exécuté sur n’importe quel serveur Linux ». 

Docker est un outil de conteneurisation. La technologie de conteneurisation a existé longtemps sur les systèmes Linux avant Docker, mais cette startup a ajouté une couche d’abstraction dessus. 

Pour expliquer ce que c’est un conteneur en informatique, prenons l’exemple d’un conteneur sur un navire de transport. Précédemment, les marchandises étaient transportées en vrac, des télés, avec du prêt à porter, sans aucune normes. Ensuite le système des conteneurs a été introduit. Le principe est de mettre des normes communes pour que l’émetteur et le destinataire puisse facilement communiquer facilement sur les marchandises échangées. Les transporteurs se sont donc mis d’accord sur des dimensions, des matériaux pour fabriquer pour le conteneur, un poids pour le conteneur, une norme pour décrire la marchandise qu’il y a dedans, et par conséquent la taille et la puissance des camions nécessaires pour transporter les conteneurs, etc … 

Transposons cela à l’informatique. Imaginons que le développeur X a écrit un code sur son environnement local, le développeur Y a travaillé sur la même application sur son environnement local, et ensuite tous les deux ont livrés le code à l’ingénieur de production. L’ingénieur de production n’est pas content, le code ne marche pas sur le système de production. Il va voir l’ingénieur de développement, qui à son tour lui dit qu’il devrait se débrouiller car le code a marché sur sa machine locale. L’ingénieur de production, après de longues discussions avec l’ingénieur de développement, a fait en sorte que le code marche sur la machine de production. Et là la mauvaise surprise arrive: il se rend compte que le même problème est survenu avec le code du développeur Y, qui lui, travaille sur un environnement encore différent de celui du développeur X. La discussion a fini très mal et la nouvelle version de l’application n’a pas été déployée comme prévu. Docker permet une standardisation des environnements de développements. Si on crée des services avec Docker, on permet une standardisation des environnements de développement à partir de l'environnement local jusqu'à la production. En plus l'intégration avec Kubernetes ou Docker Swarm permet de passer à 'échelle en multipliant le nombre de conteneurs si la demande sur le service croît au cours du temps.

Un container est comparable à une machine virtuelle avec typiquement son propre système de fichier, son propre réseau. A la différence d'une machine virtuelle, un container n'embarque pas le système d'exploitation. Un container au final, c'est des processus exécutable standard sauf que vous le liez avec un autre système de fichier et un autre réseau que celui du serveur. Vous avez donc quelque chose de presque aussi léger que des exécutables normaux, mais de totalement isolé et qui va donc se comporter pareil sur n'importe quelle machine.

L'étape suivante, c'est que docker vient avec un repository d'images de container. Ainsi, Un peu comme on peut facilement récupérer et installer des librairies javascript (avec npm), ou php (avec composer) il existe un ensemble de containers standard fournis par la communauté.

A peu près toutes les services standard existent sous forme de container: bases de données, serveurs web, environnement de programmation (java/python/nodejs/C#…), distribution linux (comme ubuntu) ou middlewares.

Vous pouvez donc en quelque ligne de commande installer tout ça sur n'importe quel serveur tout en profitant de l'isolation. Avoir des versions incompatible de la même DB ou des versions différentes de librairies est facile, car chacun est isolé.

Le même script marchera pareil sur à peu près n'importe quel linux. Vous pouvez développer votre appli en php ou nodejs sans vous occuper de savoir si le serveur aura ses applications ou de leur version. Car vous embarquez les votre.

L'étape d'après c'est qu'une application est souvent composée de plusieurs process/services qui interagissement entre eux pour fournir la fonctionnalité: la DB, le serveur web, les services web ou encore votre gestionnaire de messages.

Avec docker swarm ou le leader du marché, kubernetes, vous pouvez définir des groupe de services et les relations qu'ils ont entre eux (le plus souvent via réseau) et les déployer massivement sur un cluster de machines. La découverte de la topologie réseau, des services dispo et le load balancing sont gérés automatiquement. Ainsi que la mise à jour automatique des différentes applis ou leur redémarrage si l'un d'elle à planté.

Vous pouvez aussi augmenter ou baisser le nombre d'instances selon la charge.

C'est une des technologies clé du cloud moderne.

## Quels sont les avantages de la configuration de projet moderne ?

La différence entre les deux environnements c’est que sous Docker chaque programme est empaqueté dans un conteneur et fonctionne indépendamment des autres programmes et application présents dans le serveur (C’est bien pratique non ?!!!). Alors que sous l’environnement WAMP, vous devez à chaque fois être à jour pour Apache, PHP…pour ne pas avoir des codes absolètes ensuite des paquets d’erreurs… et problèmes de dépendances entre librairies.


- Lancez rapidement votre projet
- Gérer les dépendances et les extensions
- Économisez temps et énergie pour installer et configurer votre projet
- Éviter les conflits de l’environnement du serveur
- Plus de sécurité
- Indépendance des plateformes
- Accélérez votre développement
- Déploiements faciles
- Outils gratuits OpenSource

# WAMP

Suivre le [cours d'installation] de `Wamp` sur votre machine

## Pré-requis - Installation
Il vous faut d'installer sur votre machine avant toute manipulation :
- la derniere version de Git : 2.37.3 - [cours](../GIT/tp_revision.md#gitInstallation)
- la derniere version de Wamp : 3.2.6 - [cours](../PHP/CoursBase/02-installer.md)
- la version de PHP : 8.1.0
- la derniere version de Composer : 2.4.2 - [cours](../PHP/composer.md)
- la derniere version de Symfony CLI : 5.4.14 - [cours](../Symfony/Cours/01-introduction.md)
- la version de NodeJs : 16.13.0 - [cours](../RAN/Node.js/readme.md)
- la derniere version de Yarn : 3.2.3 - [cours](../RAN/Node.js/readme.md)
- la derniere version de Ruby : 3.1.2
- la derniere version de MailCatcher : 0.8.0

--- 

## A chaque lancement du projet
* [ ] ouvrir l'application `Wamp`
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd wamp\www\nom_du_projet`
* [ ] `symfony server:start`
* [ ] ouvrir un onglet du navigateur sur `http://localhost/nom_du_projet/`

---

## Eteindre un serveur / arret du dev
* [ ] fermer l'application `Wamp`

--- 

## 1er lancement du projet
* [ ] ouvrir l'application `Wamp`
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd wamp/www`
* [ ] `git clone https://github.com/Myogamevideo/starter_sf6.git nom_du_projet` OU votre starter symfony OU nouveau projet symfony
* [ ] `cd nom_du_projet`
* [ ] `composer install`
* [ ] `yarn install`
* [ ] `yarn build`
* [ ] `symfony server:start`

---

## Partager son code à son équipe de dev sur Github [1er commit]

* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd wamp\www\nom_du_projet`
* [ ] `git init`
* [ ] créer le dépôt sur GitHub
* [ ] `git remote add origin https://github.com/....git`
* [ ] `git branch -m main`
* [ ] `git add *` (attention, fonctionne grâce au .gitignore de symfony)
* [ ] `git commit -m "installation de symfony"`
* [ ] `git push origin master`

## Partager son code à son équipe de dev sur Github [all commit]
* [ ] `cd wamp\www\nom_du_projet`
* [ ] `git add *`
* [ ] `git commit -m "votre_message"`
* [ ] `git push origin master`

---

## Lancer le build de votre style && JS = `yarn watch`
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd wamp\www\nom_du_projet`
* [ ] `yarn watch`

---

## Créer un controlleur
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd wamp\www\nom_du_projet`
* [ ] `docker exec -it php8-sf6 bash`
* [ ] `symfony console make:controller nom_du_controller`

--- 

## Créer un entity et vous connectez à votre BDD
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd wamp\www\nom_du_projet`
* [ ] `cp .env .env.local`
* changer dans le fichier `.env.local` la  `DATABASE_URL ` par `DATABASE_URL="mysql://root:@localhost:3306/nom_projet?serverVersion=8&charset=utf8mb4"`
    * avec `nom_projet` : le nom du projet
* [ ] ouvrir un onglet du navigateur sur `http://localhost/phpmyadmin/`
    * avec `votre_ip` : IPConfig
* [ ] `symfony console make:entity`
* [ ] `symfony console make:migration`
* [ ] `symfony console d:m:m`

---
---
---

# Docker

Suivre le [cours d'installation](./installation-docker.md) de `Docker Desktop` sur votre machine

## Graphique de mon systeme Docker + php 8.1 + symfony 6


## A chaque lancement du projet
* [ ] ouvrir l'application `Docker Desktop` en administrateur 
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd dossier_parent_du_projet\nom_du_projet`
* [ ] `docker-compose up -d`
* [ ] attendre 5 min ...
* [ ] vérifier sur l'application `Docker Desktop` dans l'onglet `Containers` dans le container `docker_symfony` dans l'image `php-sf6` que le message `Web server listening` apparaît

---

## Eteindre un serveur / arret du dev
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd dossier_parent_du_projet\nom_du_projet`
* [ ] `docker-compose down`
* [ ] attendre 5 min ...
* [ ] fermer l'application `Docker Desktop`

--- 

## 1er lancement du projet
* [ ] ouvrir l'application `Docker Desktop` en administrateur 
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd dossier_parent_du_projet`
* [ ] `git clone https://github.com/Myogamevideo/docker_sf6 nom_du_projet`
* [ ] `cd nom_du_projet`
* [ ] `cd project`
* [ ] `git clone https://github.com/Myogamevideo/starter_sf6.git nom_du_projet` OU votre starter symfony OU nouveau projet symfony
* [ ] `cd ..`
* [ ] `docker-compose build --build-arg project_name=nom_du_projet`
* [ ] `docker-compose up -d`
* [ ] attendre 5 min ...
* [ ] vérifier sur l'application `Docker Desktop` dans l'onglet `Containers` dans le container `docker_symfony` dans l'image `php-sf6` que le message `Web server listening` apparaît

---

## Partager son code à son équipe de dev sur Github [1er commit]

* [ ] supprimer le dossier `.git` et le fichier `.gitignore` dans le dossier `nom_du_projet`
* [ ] supprimer le fichier `.gitignore` dans le dossier `nom_du_projet\project`
* [ ] supprimer le dossier `.git` dans le dossier `nom_du_projet\project\nom_du_projet`
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd dossier_parent_du_projet\nom_du_projet`
* [ ] `git init`
* [ ] créer le dépôt sur GitHub
* [ ] `git remote add origin https://github.com/....git`
* [ ] `git branch -m main`
* [ ] `git add *` (attention, fonctionne grâce au .gitignore de symfony)
* [ ] `git commit -m "installation de symfony"`
* [ ] `git push origin master`

## Partager son code à son équipe de dev sur Github [all commit]
* [ ] `cd dossier_parent_du_projet\nom_du_projet`
* [ ] `git add *`
* [ ] `git commit -m "votre_message"`
* [ ] `git push origin master`

---

## Lancer le build de votre style && JS = `yarn watch`
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd dossier_parent_du_projet\nom_du_projet\project\nom_du_projet`
* [ ] `docker exec -it php8-sf6 bash`
* [ ] `yarn watch`

--- 

## Créer un controlleur
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd dossier_parent_du_projet\nom_du_projet\project\nom_du_projet`
* [ ] `docker exec -it php8-sf6 bash`
* [ ] `symfony console make:controller nom_du_controller`

--- 

## Créer un entity et vous connectez à votre BDD
* [ ] ouvrir une invite de commande en administrateur 
* [ ] `cd dossier_parent_du_projet\nom_du_projet\project\nom_du_projet`
* [ ] `docker exec -it php8-sf6 bash`
* [ ] `cp .env .env.local`
* changer dans le fichier `.env.local` la  `DATABASE_URL ` par `DATABASE_URL="mysql://root:password@votre_ip:port_databse/nom_projet?serverVersion=8&charset=utf8mb4"`
    * avec `votre_ip` : IPConfig
    * avec `port_databse` : vérifier sur l'application `Docker Desktop` dans l'onglet `Containers` dans le container `docker_symfony` dans l'image `database-1` le port (ex: 54356)
    * avec `nom_projet` : le nom du projet
* [ ] ouvrir un onglet du navigateur sur `http://votre_ip:8080`
    * avec `votre_ip` : IPConfig
* [ ] `symfony console make:entity`
* [ ] `symfony console make:migration`
* [ ] `symfony console d:m:m`

## Access 
- PHPMyAdmin : http://votre_ip:8080/
- Website : http://votre_ip:9000/
- MailDev : http://votre_ip:1080/

DATABASE_URL="mysql://root:password@votre_ip:3306/nom_du_projet?serverVersion=8&charset=utf8mb4"
MAILER

## IPConfig
Open powershell

```
ipconfig
```

> Adresse IPv4 : 192.168.130.149

