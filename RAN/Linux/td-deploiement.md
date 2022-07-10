# TD : Déploiement de serveur LAMP

> Votre chef de projet vous propose de mettre à l'épreuve vos compétences d'administration système afin de déployer le prototype de projet que vous lui avez fourni. Après avoir suivi une rapide introduction Linux d'une heure, vous allez devoir mettre en pratique vos connaissances tout en vous renseignant sur Internet afin de mener à bien votre tâche.


> Certains fichiers ou screenshot vous seront demandés dans cet exercice, vous les mettrez dans un dossier d'examen et rendrez un fichier zippé contenenant le tout. Les fichiers doivent être nommés par le nom de l'exercice, par exemple: `exercice01.png`, `exercice02.txt`...

## Exercice 1 (2 points) - Créer des fichiers et dossiers

Créez l'arborescence de fichiers suivante dans votre dossier utilisateur. Dans cette arborescence, les lignes **commençant par `/`** sont des dossiers, les lignes **sans `/`** sont des fichiers.

```
/hb-exercices
    /helloworld
        helloworld.md
        .gitignore
    helloworld2
```

## Exercice 2 (1 point) - Écrire dans des fichiers

Dans le fichier `helloworld.md`, écrivez le contenu suivant :

```
Bonjour,

Ceci est mon exercice du cours de LAMP.
```

Dans le fichier `.gitignore`, écrivez le contenu suivant :

```
/vendor
```

## Exercice 3 (1 point) - Lire des fichiers

Affichez la fin du contenu du fichier `/var/log/auth.log` et faites un screenshot.

## Exercice 4 (3 points) - Installation de base d'un serveur

En suivant le tutoriel suivant : https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-20-04-fr

Faites l'installation de base d'un serveur Ubuntu. Suivez simplement les étapes :

- Étape 1 : connexion en root **ATTENTION**, connectez-vous avec les identifiants donnés par le formateur puis saisissez `sudo -i` pour avoir l'accès `root` (administrateur). Par la suite, pour quitter la connexion, saisissez deux fois de suite `exit`.

- Étape 2 : Créer un nouvel utilisateur **ATTENTION**, nommez-le `etudiant` et donnez-lui le mot de passe `etudiantcda16` !

- Étape 3 : Donnez les privilèges `sudo` à l'utilisateur `etudiant`

- Étape 4 : Mettez en place un firewall basique

- Étape 5 : Activer la connexion en SSH (**arrêtez vous au point `Si le compte root utilise l'authentification par mot de passe` inclus**)

## Exercice 5 - Mettre à jour Ubuntu (1 point)

- Connectez vous avec l'utilisateur `etudiant`.
- Mettez à jour Ubuntu grâce aux commandes suivantes :

```bash
sudo apt update
sudo apt upgrade
```

- Faites un screenshot de votre terminal.

## Exercice 6 - Déploiement de la stack AMP (4 points)

En suivant le tutoriel suivant https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-fr

- Étape 1 - Installer Apache et mettre à jour le pare-feu

- Étape 2 - Installation de MySQL **ATTENTION !!!** pour cette installation, vous allez utiliser un mot de passe `STRONG` quand demandé, et le mot de passe sera `!etudiantCDA16!`. Soyez extrêment vigileant à chaque étape, car désinstaller MySQL est une épreuve difficile en cas d'erreur d'installation. Voici la liste des commandes à saisir pour désinstaller mysql complètement en cas de problème :

```bash
$ sudo apt-get remove --purge mysql-server mysql-client mysql-common -y && sudo apt-get autoremove -y && sudo apt-get autoclean && sudo rm -rf /etc/mysql && sudo find / -iname 'mysql*' -exec rm -rf {} \;
```

- Étape 2 - suite - Installez un nouvel utilisateur MySQL en saisissant les commandes suivantes :

```bash
sudo mysql      # lancez MySQL en root

# Dans la console MySQL qui vient de s'ouvrir :

CREATE USER 'cda16'@'localhost' IDENTIFIED BY '!etudiantCDA16!';
GRANT ALL PRIVILEGES ON * . * TO 'cda16'@'localhost';
FLUSH PRIVILEGES;
exit;

# Dans le terminal qui est de nouveau là :
sudo service mysql restart

```

- Étape 3 - Installation de PHP **ATTENTION !!!** à cette étape, vous aurez également besoin de certaines librairies nécessaires au fonctionnement de Symfony. Vous en trouverez la liste ici : https://symfony.com/doc/current/setup.html#technical-requirements (ctype, iconv...). La solution se trouve facilement sur Google mais pour gagner du temps, voici la commande complète à saisir afin d'installer ces dépendances :

```bash
sudo apt install php libapache2-mod-php php-json php-xml php-mbstring php-intl php-zip zip unzip php-cli php-common php-mysql
```

- Étape 4, 5, 6 : **NE PAS LES SUIVRE !**

Faites un screenshot de votre terminal.

## Exercice 7 - Tester si PHP fonctionne (3 points)

> Le répertoire de Apache se trouve dans le dossier `/var/www`. Pour l'instant, il y a un dossier `html` qui contient la page que vous pouvez voir en saisissant l'adresse de votre serveur dans un navigateur, la page de Apache !

1. Changez les droits sur le répertoire de Apache grâce à la commande suivante :

```bash
sudo chown -R etudiant:etudiant /chemin/vers/le/repertoire
```

1. Faites la commande `ls -al /var/` puis faites un screenshot du terminal.

2. Créez un fichier `test.php` dans le dossier `/var/www/html` dans lequel vous mettrez le code suivant  :

```php
<?php

phpinfo();
```

4. Testez en allant sur la page `addresseduserveur.ovh.net/test.php`. Faites un screenshot de cette page.

## Installer Composer et Symfony (2 points)

1. Retournez dans le dossier utilisateur
2. Installez le CLI de Symfony avec les commandes suivantes :

```bash
wget https://get.symfony.com/cli/installer -O - | bash
sudo mv /home/etudiant/.symfony/bin/symfony /usr/local/bin/symfony
```

3. Saisissz `symfony check:requirements` et faites un screenshot. Le terminal devrait vous indiquer en vert "Your system is ready to run Symfony projects".

4. Installez Composer grâce aux commandes suivantes 

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

5. Saisissez la commande `composer -v` et faites un screenshot de votre terminal.

## Déployer un projet Symfony (3 points)

Pour déployer le projet, nous allons travailler en plusieurs étapes :

A. Récupérer le projet avec Git et le cloner sur le serveur

B. Installer un package dans le projet qui facilite le déploiement de Symfony avec Apache

C. Configurer Apache pour pointer vers notre dossier de projet lorsque l'on saisit l'URL du serveur dans un navigateur

D. Configurer le `.env.local` de Symfony

E. Saisir les commandes d'installation du projet de Symfony


---

1. Dirigez vous dans le répertoire de Apache et clonez la correction du projet.

```bash
git clone https://github.com/tomsihap/lbv-correction
```

2. Rendez-vous dans le projet cloné.

3. Installez les dépendances Composer du projet.

4. Grâce à Composer, installez la dépendance suivante. Choisissez "Yes" quand demandé.
```
symfony/apache-pack
```

4. Créez le fichier `/etc/apache2/sites-available/lbv.conf`.

5. Rmplissez le avec le contenu suivant (que vous adapterez à votre serveur !!) :

```php
<VirtualHost *:80>
    ServerName http://vps-0dae0867.vps.ovh.net
    ServerAlias www.http://vps-0dae0867.vps.ovh.net

    DocumentRoot /var/www/lbv-correction/public
    DirectoryIndex /index.php

    <Directory /var/www/lbv-correction/public>
        AllowOverride None
        Order Allow,Deny
        Allow from All

        FallbackResource /index.php
    </Directory>

    <Directory /var/www/lbv-correction/public/bundles>
        FallbackResource disabled
    </Directory>

    ErrorLog /var/log/apache2/project_error.log
    CustomLog /var/log/apache2/project_access.log combined
</VirtualHost>
```

6. Saisissez les commandes suivantes pour désactiver le dossier actuellement lu par Apache et activer plutôt notre dossier de projet, puis redémarrer Apache :

```bash
sudo a2dissite 000-default.conf
sudo a2ensite lbv.conf
sudo systemctl reload apache2
```

7. Allez sur l'URL de votre serveur et faites un screenshot. Il devrait y avoir une erreur Symfony, c'est normal ! Créez le `.env.local` en copiant-collant le `.env` existant et remplissez le  `DATABASE_URL` avec les paramètres suivants :

```
Login : cda16
Mot de passe : !etudiantCDA16!
```

8. Effectuez les commandes habituelles pour créer la base de données, lancer les migrations (**PAS DE `make:migration` !!**) et lancer les fixtures. Si tout s'est bien passé, votre projet devrait apparaître en ligne à l'URL du serveur !