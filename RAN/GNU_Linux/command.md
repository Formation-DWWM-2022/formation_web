<!--

https://www.freecodecamp.org/news/an-introduction-to-operating-systems/

https://www.freecodecamp.org/news/command-line-for-beginners/

-->

# Cours : Déploiement d'un serveur linux

> Ce cours s'appuie sur la base d'une distribution Linux type Debian (Ubuntu...). Néanmoins, la plupart des commandes fonctionnent pour tout environnement Linux.

## Se connecter à un serveur en SSH

> SSH (Secure Shell) est un protocole de communication sécurisé, ainsi qu'un logiciel de terminal. Il permet de se connecter à un serveur distant grâce à un login et un mot de passe, ou via une paire de clés de chiffrement.

- Sous Linux et Mac, `ssh` est déjà installé, vous pouvez l'utiliser immédiatement depuis le terminal. :

```sh
ssh user@host

ssh ubuntu@123.123.123.123
```

- Sous Windows, vous devrez installer PuttY.

## Commandes Linux de base

### `clear`

> Vous permet de vider l'affichage dans le terminal

```bash
thsp@vps777746:~$ clear
```

### `pwd`

> Vous permet de connaître le répertoire en cours (print working directory)

```bash
thsp@vps777746:~$ pwd
/home/thsp
```

### `cd`

> Vous permet de vous déplacer dans l'arborescence de dossiers (change directory)

```bash
thsp@vps777746:~$ cd /usr       # Je me déplace dans le dossier `/usr`
thsp@vps777746:/usr$

thsp@vps777746:/usr$ cd         # cd tout seul me déplace dans le dossier utilisateur "home"
thsp@vps777746:~$               # le dossier utilisateur est aussi appelé ~
```

> Pour remonter dans un dossier parent, on utilise le chemin `..` :

```bash
thsp@vps777746:~/test$ cd
thsp@vps777746:~$ cd ..
thsp@vps777746:/home$ cd ..
thsp@vps777746:/$
```

### `ls`

> Vous permet d'afficher le contenu d'un dossier (list)

```bash
thsp@vps777746:~$ ls
thsp@vps777746:~$
```

> Si vous souhaitez afficher les dossiers et fichiers cachés, option `-a`. Sous Linux, les fichiers et dossiers sont "cachés" lorsqu'ils sont préfixés par un point (par exemple: `.gitignore`) :

```bash
thsp@vps777746:~$ ls -a
.              .bashrc     .gnupg          .ssh                       .yarn
..             .cache      .local          .sudo_as_admin_successful  .yarnrc
.bash_history  .config     .mysql_history  .vim
.bash_logout   .gitconfig  .profile        .viminfo
thsp@vps777746:~$
```

> Si vous souhaitez afficher en liste détaillée, option `-l`. On peut cumuler les options, par exemple `-al`. La liste détaillée propose dans l'ordre: la liste des droits CHMOD, l'utilisateur propriétaire du fichier, le groupe propriétaire du fichier, la taille du fichier, le mois, jour et heure de modification, le nom du fichier.

```bash
thsp@vps777746:~$ ls -al
total 88
drwxr-xr-x 9 thsp thsp  4096 mai   17 15:21 .
drwxr-xr-x 4 root root  4096 janv. 18 15:19 ..
-rw------- 1 thsp thsp  7811 juin  15 14:44 .bash_history
-rw-r--r-- 1 thsp thsp   220 janv. 18 15:19 .bash_logout
-rw-r--r-- 1 thsp thsp  3771 janv. 18 15:19 .bashrc
drwx------ 4 thsp thsp  4096 mars   3 18:34 .cache
drwxrwxr-x 3 thsp thsp  4096 janv. 18 15:34 .config
-rw-rw-r-- 1 thsp thsp    46 janv. 18 15:49 .gitconfig
drwx------ 3 thsp thsp  4096 janv. 18 15:20 .gnupg
drwxrwxr-x 3 thsp thsp  4096 janv. 18 15:34 .local
-rw------- 1 thsp thsp   467 janv. 31 15:45 .mysql_history
-rw-r--r-- 1 thsp thsp   807 janv. 18 15:19 .profile
drwx------ 2 thsp thsp  4096 avril  8 09:50 .ssh
-rw-r--r-- 1 thsp thsp     0 janv. 18 15:20 .sudo_as_admin_successful
drwxr-xr-x 2 thsp thsp  4096 mars  29 22:36 .vim
-rw------- 1 thsp thsp 17703 mai   17 15:21 .viminfo
drwxrwxr-x 3 thsp thsp  4096 mars   3 18:37 .yarn
-rw-rw-r-- 1 thsp thsp   116 mars   3 18:36 .yarnrc
```

> Si vous souhaitez afficher les tailles en format "humain" (c'est à dire lisible, en Ko, Mo, Go...), option `-h` :

```bash
thsp@vps777746:~$ ls -alh
total 88K
drwxr-xr-x 9 thsp thsp 4,0K mai   17 15:21 .
drwxr-xr-x 4 root root 4,0K janv. 18 15:19 ..
-rw------- 1 thsp thsp 7,7K juin  15 14:44 .bash_history
-rw-r--r-- 1 thsp thsp  220 janv. 18 15:19 .bash_logout
-rw-r--r-- 1 thsp thsp 3,7K janv. 18 15:19 .bashrc
drwx------ 4 thsp thsp 4,0K mars   3 18:34 .cache
drwxrwxr-x 3 thsp thsp 4,0K janv. 18 15:34 .config
-rw-rw-r-- 1 thsp thsp   46 janv. 18 15:49 .gitconfig
drwx------ 3 thsp thsp 4,0K janv. 18 15:20 .gnupg
drwxrwxr-x 3 thsp thsp 4,0K janv. 18 15:34 .local
-rw------- 1 thsp thsp  467 janv. 31 15:45 .mysql_history
-rw-r--r-- 1 thsp thsp  807 janv. 18 15:19 .profile
drwx------ 2 thsp thsp 4,0K avril  8 09:50 .ssh
-rw-r--r-- 1 thsp thsp    0 janv. 18 15:20 .sudo_as_admin_successful
drwxr-xr-x 2 thsp thsp 4,0K mars  29 22:36 .vim
-rw------- 1 thsp thsp  18K mai   17 15:21 .viminfo
drwxrwxr-x 3 thsp thsp 4,0K mars   3 18:37 .yarn
-rw-rw-r-- 1 thsp thsp  116 mars   3 18:36 .yarnrc
```

### `mkdir`

> Vous permet de créer un dossier (make directory)

```bash
thsp@vps777746:~$ mkdir test
thsp@vps777746:~$ cd test
thsp@vps777746:~/test$
```

### `touch`

> Vous permet de créer un nouveau fichier vide

```bash
thsp@vps777746:~/test$ touch helloworld.md
thsp@vps777746:~/test$
```

### `echo`

> Vous permet d'écrire rapidement depuis le terminal dans un fichier

```bash
thsp@vps777746:~/test$ echo "Hello world !" >> helloworld.md
thsp@vps777746:~/test$
```

### `cat`

> Vous permet de visualiser le contenu d'un fichier

```bash
thsp@vps777746:~/test$ cat helloworld.md
Hello world !
thsp@vps777746:~/test$
```

### `tail`

> Vous permet de visualiser la fin (tail = queue) d'un fichier. Utile pour consulter des fichiers de log !

```bash
thsp@vps777746:~/test$ tail /var/log/dpkg.log
2020-07-01 06:59:00 status unpacked libseccomp2:amd64 2.4.3-1ubuntu3.18.04.2
2020-07-01 06:59:00 startup packages configure
2020-07-01 06:59:00 configure libseccomp2:amd64 2.4.3-1ubuntu3.18.04.2 <aucune>
2020-07-01 06:59:00 status unpacked libseccomp2:amd64 2.4.3-1ubuntu3.18.04.2
2020-07-01 06:59:00 status half-configured libseccomp2:amd64 2.4.3-1ubuntu3.18.04.2
2020-07-01 06:59:00 status installed libseccomp2:amd64 2.4.3-1ubuntu3.18.04.2
2020-07-01 06:59:00 startup packages configure
2020-07-01 06:59:00 trigproc libc-bin:amd64 2.27-3ubuntu1 <aucune>
2020-07-01 06:59:00 status half-configured libc-bin:amd64 2.27-3ubuntu1
2020-07-01 06:59:00 status installed libc-bin:amd64 2.27-3ubuntu1
thsp@vps777746:~/test$
```

### `rm`

> Vous permet de supprimer un fichier

```bash
thsp@vps777746:~/test$ rm helloworld.md
thsp@vps777746:~/test$ ls -al
total 8
drwxrwxr-x  2 thsp thsp 4096 juil.  1 19:53 .
drwxr-xr-x 10 thsp thsp 4096 juil.  1 19:50 ..
thsp@vps777746:~/test$
```

> Pour supprimer un dossier, on utilise l'option `f` (folder). Si on veut supprimer un dossier et ses sous-dossiers, on utilise l'option `r` (recursive). En pratique, on utilise souvent les deux en même temps : `rm -rf folder`

```bash
thsp@vps777746:~/test$ cd ..
thsp@vps777746:~$ rm -rf test
thsp@vps777746:~$ ls -al
total 88
drwxr-xr-x 9 thsp thsp  4096 juil.  1 19:54 .
drwxr-xr-x 4 root root  4096 janv. 18 15:19 ..
-rw------- 1 thsp thsp  7811 juin  15 14:44 .bash_history
-rw-r--r-- 1 thsp thsp   220 janv. 18 15:19 .bash_logout
-rw-r--r-- 1 thsp thsp  3771 janv. 18 15:19 .bashrc
drwx------ 4 thsp thsp  4096 mars   3 18:34 .cache
drwxrwxr-x 3 thsp thsp  4096 janv. 18 15:34 .config
-rw-rw-r-- 1 thsp thsp    46 janv. 18 15:49 .gitconfig
drwx------ 3 thsp thsp  4096 janv. 18 15:20 .gnupg
drwxrwxr-x 3 thsp thsp  4096 janv. 18 15:34 .local
-rw------- 1 thsp thsp   467 janv. 31 15:45 .mysql_history
-rw-r--r-- 1 thsp thsp   807 janv. 18 15:19 .profile
drwx------ 2 thsp thsp  4096 avril  8 09:50 .ssh
-rw-r--r-- 1 thsp thsp     0 janv. 18 15:20 .sudo_as_admin_successful
drwxr-xr-x 2 thsp thsp  4096 mars  29 22:36 .vim
-rw------- 1 thsp thsp 17703 mai   17 15:21 .viminfo
drwxrwxr-x 3 thsp thsp  4096 mars   3 18:37 .yarn
-rw-rw-r-- 1 thsp thsp   116 mars   3 18:36 .yarnrc
thsp@vps777746:~$
```

### `cp`

> Vous permet de copier un fichier. Le premier argument est le fichier à copier, le second argument est le chemin et nom du nouveau fichier

```bash
thsp@vps777746:~$ touch helloworld.md
thsp@vps777746:~$ cp helloworld.md helloworld-copy.md
thsp@vps777746:~$ ls
helloworld-copy.md  helloworld.md
thsp@vps777746:~$
```

### `mv`

> Vous permet de déplacer un fichier vers un autre dossier. Le premier argument est le fichier à déplacer, le second est le chemin vers lequel déplacer le fichier

```bash
thsp@vps777746:~$ mkdir newFolder
thsp@vps777746:~$ mv helloworld.md newFolder
thsp@vps777746:~$ ls
helloworld-copy.md  newFolder
thsp@vps777746:~$ cd newFolder/
thsp@vps777746:~/newFolder$ ls
helloworld.md
thsp@vps777746:~/newFolder$
```

### `man`

> Vous permet d'afficher la documentation détaillée d'une commande

```
thsp@vps777746:~$ man ls
LS(1)                        User Commands                       LS(1)

NAME
       ls - list directory contents

SYNOPSIS
       ls [OPTION]... [FILE]...

DESCRIPTION
       List  information  about  the  FILEs  (the current directory by
       default).  Sort entries alphabetically if none of -cftuvSUX nor
       --sort is specified.
       ...
```

> Pour quitter ce menu, appuyez sur la touche `q`.

### `which`

> Vous permet de savoir quel est l'emplacement du programme en ligne de commande que vous utilisez. Pratique lorsque vous avez plusieurs installations différentes d'un logiciel (PHP en plusieurs versions par exemple) et que vous souhaitez savoir lequel est utilisé

```bash
thsp@vps777746:~$ which ls
/bin/ls
thsp@vps777746:~$
```

### `sudo`

> Certaines actions sont limitées à des droits administrateur, par exemple lire ou modifier certains fichiers, créer des fichiers ou dossiers dans des emplacements sécurisés... La commande `sudo` vous permet de passer outre ces restrictions : on vous demandera de saisir un mot de passe pour exécuter la commande. Lors de la saisie du mot de passe, aucun caractère ne s'affiche : c'est normal ! Faites "Entrée" quand le mot de passe est saisi.

Essayons de créer le dossier `hello` dans le dossier `/var` :

```bash
thsp@vps777746:~$ mkdir /var/hello
mkdir: cannot create directory ‘/var/hello’: Permission denied
thsp@vps777746:~$ sudo mkdir /var/hello
[sudo] password for thsp:
thsp@vps777746:~$ ls /var
backups  crash  local  log   opt  snap   tmp cache
hello  lib     lock   mail  run  spool  www
```

## Un éditeur de texte : Vim

> Vim est un éditeur de texte en ligne de commandes. Il est extrêmemnt puissant et modulaire, certains l'utilisent même à la place de gros IDE comme PHPStorm ! Néanmoins, son utilisation est essentiellement au clavier et sans menus, tout est en ligne de commande. Ce qui le rend à la fois très puissant mais complexe à aborder.

> De nombreuses ressources existent sur Internet :

- <https://openclassrooms.com/fr/courses/43538-reprenez-le-controle-a-laide-de-linux/42693-vim-lediteur-de-texte-du-programmeur>
- <https://vim.rtorr.com/>
- ...

Quelques commandes de base :

1. Créons un fichier dans notre dossier utilisateur

```bash
thsp@vps777746:~$ cd
thsp@vps777746:~$ touch test-vim
thsp@vps777746:~$ vim test-vim
```

2. Une interface apparaît, c'est notre fichier. **N'appuyez pas sur le clavier pour le moment !** En effet, les actions de Vim se passent au clavier, vous risqueriez d'activer quelque chose sans le vouloir.

Vim possède trois modes :

- Interactif (déplacement dans le fichier, pas d'écriture possible)
- Insertion (écriture dans le fichier)
- Commande (saisie de commandes, pas d'écriture possible)

Et nous sommes actiellement dans le mode Interactif.

Pour changer de mode :

- Interactif (déplacement dans le fichier, commandes au clavier) => "Échap"
- Insertion (écriture dans le fichier) => "i"
- Commande (saisie de commandes) => "Échap" puis touche `:` ou `/`

Appuyez sur "i" pour pouvoir écrire dans le fichier et saisissez "Hello !".

3. Repassons en mode Interactif en appuyant sur "Echap". Déplacez vous vers le début de la ligne grâce à la touche `0` (zéro)

4. Repassons en mode Insertion en appuyant sur la touche `i`. Modifiez votre texte de sorte à ce que vous affichiez : `Cette ligne dit Hello !`

5. Passons maintenant en mode Commande. Appuyez sur "Échap" puis saisissez `:`. Vous voyez qu'en bas du fichier le caractère `:` est apparu. Complétez et écrivez : `:wq` puis faites "Entée".

Le fichier s'est fermé !

En fait, nous avons fait deux commandes :

- `:w` permet de sauvegarder le fichier (write)
- `:q` permet de quitter le fichier (quit)
- `:wq` permet donc de sauver et quitter
- `:wq!` aurait permis de *forcer* le sauvegarder/quitter si quelque chose était bloquant (fichier en cours d'écriture comme un log par exemple, problème de droits...)

6. Faites un `cat test-vim` pour vérifier si le  contenu s'affiche correctement :

```bash
thsp@vps777746:~$ cat test-vim
Cette ligne dit Hello !
```

## Gérer et installer des logiciels

> Les systèmes Debian possèdent `apt` qui est un programme de gestion de packages, c'est à dire les programmes de ligne de commande ou librairies et autres dépendances.

```bash
sudo apt update  # mettre à jour la liste des packages
sudo apt upgrade # mettre à jour les packages installés dans le serveur
sudo apt dist-upgrade # mettre à jour le système d'exploitation
sudo apt search php # chercher les packages qui contiennent le mot "php"
sudo apt install php # installer le logiciel PHP
```

De nombreuses autres commandes existent autour de apt que vous découvrirez lors de vos différents besoins d'installations dans votre vie de développeur.
