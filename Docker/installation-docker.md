# Installation de Docker Desktop
## Qu’est-ce qui est embarqué dans l’installation de Docker Desktop ?

En installant Docker Desktop, vous installerez simultanément Docker Engine, le moteur de virtualisation, Docker CLI qui est l’interface en ligne de commande pour faire fonctionner Docker depuis le terminal, Docker Compose qui permet de lancer et orchestrer plusieurs containers, Docker Content Trust pour authentifier des images publiées sur des registry publiques, Kubernetes, l’orchestrateur créé par Google et Credential Helper qui permet de stocker des variables secrètes en lieu sûr.

## Windows
Prérequis à l’installation de Docker sur Windows

Afin d’installer Docker sur votre poste, il va falloir avoir la configuration suivante:
- Windows 11 64-bit: Home or Pro version 21H2 or higher, or Enterprise or Education version 21H2 or higher.
- Windows 10 64-bit: Home or Pro 21H1 (build 19043) or higher, or Enterprise or Education 20H2 (build 19042) or higher.
- Activer la fonctionnalité [WSL 2 sur Windows](./wsl-2.md)
- Avoir un processeur 64-bit
- Avoir 4Go de RAM minimum
- Activer la virtualisation au niveau du BIOS dans les paramètres de ce dernier

[Rendez-vous sur le Docker Hub et téléchargez l’installateur pour Windows.](https://www.docker.com/)

Double-cliquez sur Docker Desktop Installer.exe pour lancer l’installation

Assurez-vous d’activer les fonctionnalités Hyper-V Windows lorsque l’assistant d’installation vous le proposera.

Si vous n’êtes pas Administrateur de votre compte utilisateur Windows, il faudra l’ajouter le groupe d’utilisateur docker-users.

Docker Desktop ne démarre pas automatiquement après installation. Pour le lancer, recherchez l’application Docker sur votre barre de recherche Windows et cliquez sur l’application Docker Desktop.

![](https://welovedevs.com/wp-content/uploads/2022/08/421e7dde11e263478aea050cd4bf0af3b7366a19-488x440.png)

Vous saurez que Docker est bien en état de marche lorsque vous verrez l’icone de la baleine Docker dans votre barre d’état.

![](https://welovedevs.com/wp-content/uploads/2022/08/2898153f78f2a7cb6de2646bf60c968f91858c87-212x48.png)

## Comment installer et utiliser Docker sur Ubuntu 20.04
### Étape 1 — Installation de Docker

Le package d’installation Docker disponible dans le référentiel officiel Ubuntu peut ne pas être la dernière version. Pour être sûr de disposer de la dernière version, nous allons installer Docker à partir du référentiel officiel Docker. Pour ce faire, nous allons ajouter une nouvelle source de paquets, ajouter la clé GPG de Docker pour nous assurer que les téléchargements sont valables, puis nous installerons le paquet.

Tout d’abord, mettez à jour votre liste de packages existante :
```
sudo apt update
```

Ensuite, installez quelques paquets pré-requis qui permettent à apt d’utiliser les paquets sur HTTPS :
```
sudo apt install apt-transport-https ca-certificates curl software-properties-common
```

Ensuite, ajoutez la clé GPG du dépôt officiel de Docker à votre système :
```
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
```

Ajoutez le référentiel Docker aux sources APT :
```
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
```

Ensuite, mettez à jour la base de données des paquets avec les paquets Docker à partir du référentiel qui vient d’être ajouté :
```
sudo apt update
```

Assurez-vous que vous êtes sur le point d’installer à partir du dépôt Docker et non du dépôt Ubuntu par défaut :
```
apt-cache policy docker-ce
```

Vous verrez un résultat comme celui-ci, bien que le numéro de version du Docker puisse être différent :
Output of apt-cache policy docker-ce
```
docker-ce:
  Installed: (none)
  Candidate: 5:19.03.9~3-0~ubuntu-focal
  Version table:
     5:19.03.9~3-0~ubuntu-focal 500
        500 https://download.docker.com/linux/ubuntu focal/stable amd64 Packages
```

Notez que le docker-ce n’est pas installé, mais que le candidat à l’installation provient du dépôt Docker pour Ubuntu 20.04 (focal).

Enfin, installez Docker :
```
sudo apt install docker-ce
```

Le Docker devrait maintenant être installé, le démon démarré, et le processus autorisé à démarrer au boot. Vérifiez qu’il tourne :
```
sudo systemctl status docker
```

La sortie devrait être similaire à ce qui suit, montrant que le service est actif et en cours d’exécution :
```
Output
● docker.service - Docker Application Container Engine
     Loaded: loaded (/lib/systemd/system/docker.service; enabled; vendor preset: enabled)
     Active: active (running) since Tue 2020-05-19 17:00:41 UTC; 17s ago
TriggeredBy: ● docker.socket
       Docs: https://docs.docker.com
   Main PID: 24321 (dockerd)
      Tasks: 8
     Memory: 46.4M
     CGroup: /system.slice/docker.service
             └─24321 /usr/bin/dockerd -H fd:// --containerd=/run/containerd/containerd.sock
```

L’installation de Docker vous donne maintenant non seulement le service Docker (démon) mais aussi l’utilitaire en ligne de commande docker, ou le client Docker. Nous allons voir comment utiliser la commande docker plus loin dans ce tutoriel.

## Étape 2 — Exécution de la commande Docker sans sudo (facultatif)

Par défaut, la commande docker ne peut être exécutée que par l’utilisateur root ou par un utilisateur du groupe docker, qui est automatiquement créé lors du processus d’installation de Docker. Si vous essayez d’exécuter la commande docker sans la faire précéder de sudo ou sans être dans le groupe docker, vous obtiendrez un résultat comme celui-ci :
```
Output
docker: Cannot connect to the Docker daemon. Is the docker daemon running on this host?.
See 'docker run --help'.
```

Si vous voulez éviter de taper sudo chaque fois que vous exécutez la commande docker, ajoutez votre nom d’utilisateur au groupe docker :
```
sudo usermod -aG docker ${USER}
```

Pour appliquer la nouvelle appartenance au groupe, déconnectez-vous du serveur et reconnectez-vous, ou tapez ce qui suit :
```
su - ${USER}
```

Vous serez invité à saisir le mot de passe utilisateur pour continuer.

Vérifiez que votre utilisateur est maintenant ajouté au groupe docker en tapant :
```
id -nG
```
```
Output
sammy sudo docker
```

Si vous devez ajouter un utilisateur au groupe docker pour lequel vous n’êtes pas connecté, déclarez ce nom d’utilisateur explicitement :
```
sudo usermod -aG docker username
```

La suite de cet cours suppose que vous exécutez la commande docker en tant qu’utilisateur dans le groupe docker. Si vous choisissez de ne pas le faire, veuillez faire précéder les commandes de sudo.

Examinons maintenant la commande docker.

## Installer Docker sur MacOS

1. Prérequis à l’installation de Docker sur MacOS
Afin d’installer Docker sur votre mac, il va falloir avoir la configuration suivante :
- macOS 10.14 ou plus (Mojave, Catalina ou Big Sur)
- ne pas avoir VirtualBox dans une version inférieure à 4.3.30 d’installé sur son Mac
- au moins 4 Go de RAM.


[Rendez-vous sur le Docker Hub et téléchargez l’installateur pour Mac](https://docs.docker.com/desktop/install/mac-install/). Attention à bien choisir l’installateur en fonction de votre processeur, soit `Intel` soit `Apple`.

Pour savoir quel processeur équipe votre mac, cliquez sur le `menu Pomme` sur le coin supérieur gauche de votre écran puis cliquez sur `A propos de votre Mac`. À la deuxième ligne, vous verrez le processeur et si celui-ci est un `Intel` ou un `Apple`.

Une fois le package `Docker.dmg` téléchargez, cliquez pour ouvrir l’installateur puis faites glisser l’icone Docker vers le dossier Applications.

![](https://welovedevs.com/wp-content/uploads/2022/08/c65d3602c4a8f9d94aff5a19335127460d7499f3-722x300.png)

Glisser l’icône Docker vers le dossier Application pour installer Docker

Vous pouvez maintenant lancer Docker depuis votre fendeur, sur l’onglet « Applications » ou avec la recherche globale (cmd+espace) en tapant Docker.

Vous remarquerez l’icône Docker s’afficher sur votre menu supérieur droit. Dès que les containers ont arrêté de clignoter, Docker est prêt à fonctionner.

![](https://welovedevs.com/wp-content/uploads/2022/08/d0c61b9a22c3cfd845e088c63b84c9f25b0dbd24-184x25.png)