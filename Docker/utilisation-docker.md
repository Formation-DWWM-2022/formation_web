# Utilisation des commande Docker

L’utilisation de docker consiste à lui faire passer une chaîne d’options et de commandes suivie d’arguments. La syntaxe prend cette forme :

```
docker [option] [command] [arguments]
```

Pour voir toutes les sous-commandes disponibles, tapez :
```
docker
```

À partir du docker 19, la liste complète des sous-commandes disponibles est incluse :
```
Output
  attach      Attach local standard input, output, and error streams to a running container
  build       Build an image from a Dockerfile
  commit      Create a new image from a container's changes
  cp          Copy files/folders between a container and the local filesystem
  create      Create a new container
  diff        Inspect changes to files or directories on a container's filesystem
  events      Get real time events from the server
  exec        Run a command in a running container
  export      Export a container's filesystem as a tar archive
  history     Show the history of an image
  images      List images
  import      Import the contents from a tarball to create a filesystem image
  info        Display system-wide information
  inspect     Return low-level information on Docker objects
  kill        Kill one or more running containers
  load        Load an image from a tar archive or STDIN
  login       Log in to a Docker registry
  logout      Log out from a Docker registry
  logs        Fetch the logs of a container
  pause       Pause all processes within one or more containers
  port        List port mappings or a specific mapping for the container
  ps          List containers
  pull        Pull an image or a repository from a registry
  push        Push an image or a repository to a registry
  rename      Rename a container
  restart     Restart one or more containers
  rm          Remove one or more containers
  rmi         Remove one or more images
  run         Run a command in a new container
  save        Save one or more images to a tar archive (streamed to STDOUT by default)
  search      Search the Docker Hub for images
  start       Start one or more stopped containers
  stats       Display a live stream of container(s) resource usage statistics
  stop        Stop one or more running containers
  tag         Create a tag TARGET_IMAGE that refers to SOURCE_IMAGE
  top         Display the running processes of a container
  unpause     Unpause all processes within one or more containers
  update      Update configuration of one or more containers
  version     Show the Docker version information
  wait        Block until one or more containers stop, then print their exit codes
```

Pour voir les options disponibles pour une commande spécifique, tapez :
```
docker docker-subcommand --help
```

Pour voir les informations sur Docker à l’échelle du système, utilisez :
```
docker info
```

Examinons certaines de ces commandes. Nous allons commencer par travailler avec des images.

# Travailler avec des images Docker

Les conteneurs Docker sont construits à partir d’images Docker. Par défaut, Docker tire ces images de Docker Hub, un registre Docker géré par Docker, l’entreprise à l’origine du projet Docker. Tout le monde peut héberger ses images Docker sur Docker Hub, de sorte que la plupart des applications et des distributions Linux dont vous aurez besoin y auront des images hébergées.

Pour vérifier si vous pouvez accéder et télécharger des images de Docker Hub, tapez :
```
docker run hello-world
```

La sortie indiquera que Docker fonctionne correctement :

```
Output
Unable to find image 'hello-world:latest' locally
latest: Pulling from library/hello-world
0e03bdcc26d7: Pull complete
Digest: sha256:6a65f928fb91fcfbc963f7aa6d57c8eeb426ad9a20c7ee045538ef34847f44f1
Status: Downloaded newer image for hello-world:latest

Hello from Docker!
This message shows that your installation appears to be working correctly.

...
```

Au départ, Docker n’a pas pu trouver l’image hello-world localement, il a donc téléchargé l’image depuis Docker Hub, qui est le référentiel par défaut. Une fois l’image téléchargée, Docker a créé un conteneur à partir de l’image et l’application dans le conteneur s’est exécutée, affichant le message.

Vous pouvez rechercher des images disponibles sur Docker Hub en utilisant la commande docker avec la sous-commande search. Par exemple, pour rechercher l’image Ubuntu, tapez :
```
docker search ubuntu
```

Le script va parcourir Docker Hub et retourner une liste de toutes les images dont le nom correspond à la chaîne de recherche. Dans ce cas, la sortie sera similaire à celle-ci :

```
Output
NAME                                                      DESCRIPTION                                     STARS               OFFICIAL            AUTOMATED
ubuntu                                                    Ubuntu is a Debian-based Linux operating sys…   10908               [OK]
dorowu/ubuntu-desktop-lxde-vnc                            Docker image to provide HTML5 VNC interface …   428                                     [OK]
rastasheep/ubuntu-sshd                                    Dockerized SSH service, built on top of offi…   244                                     [OK]
consol/ubuntu-xfce-vnc                                    Ubuntu container with "headless" VNC session…   218                                     [OK]
ubuntu-upstart                                            Upstart is an event-based replacement for th…   108                 [OK]
ansible/ubuntu14.04-ansible                               Ubuntu 14.04 LTS with
...
```

Dans la colonne OFFICIAL, OK indique une image construite et soutenue par l’entreprise à l’origine du projet. Une fois que vous avez identifié l’image que vous souhaitez utiliser, vous pouvez la télécharger sur votre ordinateur à l’aide de la sous-commande pull.

Exécutez la commande suivante pour télécharger l’image officielle d’ubuntu sur votre ordinateur
```
docker pull ubuntu
```

Vous verrez la sortie suivante :

```
Output
Using default tag: latest
latest: Pulling from library/ubuntu
d51af753c3d3: Pull complete
fc878cd0a91c: Pull complete
6154df8ff988: Pull complete
fee5db0ff82f: Pull complete
Digest: sha256:747d2dbbaaee995098c9792d99bd333c6783ce56150d1b11e333bbceed5c54d7
Status: Downloaded newer image for ubuntu:latest
docker.io/library/ubuntu:latest
```

Une fois qu’une image a été téléchargée, vous pouvez alors lancer un conteneur en utilisant l’image téléchargée avec la sous-commande run. Comme vous l’avez vu avec l’exemple hello-world, si une image n’a pas été téléchargée lorsque docker est exécuté avec la sous-commande run, le client Docker téléchargera d’abord l’image, puis lancera un conteneur en l’utilisant.

Pour voir les images qui ont été téléchargées sur votre ordinateur, tapez :
```
docker images
```

La sortie ressemblera à ce qui suit :
```
Output
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
ubuntu              latest              1d622ef86b13        3 weeks ago         73.9MB
hello-world         latest              bf756fb1ae65        4 months ago        13.3kB
```

Comme vous le verrez plus loin dans ce cours, les images que vous utilisez pour gérer les conteneurs peuvent être modifiées et utilisées pour générer de nouvelles images, qui peuvent ensuite être téléchargées (poussées est le terme technique) vers Docker Hub ou d’autres registres Docker.

Voyons comment exécuter des conteneurs plus en détail.

# Exécution d’un conteneur Docker

Le conteneur hello-world que vous avez exécuté à l’étape précédente est un exemple de conteneur qui fonctionne et qui quitte après avoir émis un message de test. Les conteneurs peuvent être beaucoup plus utiles que cela, et ils peuvent être interactifs. Après tout, ils sont similaires aux machines virtuelles, mais ils sont plus économes en ressources.

À titre d’exemple, exécutons un conteneur en utilisant la dernière image d’Ubuntu. La combinaison des commutateurs -i et -t vous donne un accès interactif au shell dans le conteneur :
```
docker run -it ubuntu
```

Votre invite de commande devrait changer pour refléter le fait que vous travaillez maintenant à l’intérieur du conteneur et devrait prendre cette forme :

```
Output
root@d9b100f2f636:/#
```

Notez l’identifiant du conteneur dans l’invite de commande. Dans cet exemple, il s’agit de d9b100f2f636. Vous aurez besoin de cet ID de conteneur plus tard pour identifier le conteneur lorsque vous voudrez le supprimer.

Vous pouvez maintenant exécuter n’importe quelle commande à l’intérieur du conteneur. Mettons par exemple à jour la base de données des paquets à l’intérieur du conteneur. Vous ne devez pas préfixer une commande avec sudo, car vous opérez à l’intérieur du conteneur en tant qu’utilisateur root :
```
apt update
```

Ensuite, installez n’importe quelle application dans le conteneur. Installons Node.js :
```
apt install nodejs
```

Ceci installe Node.js dans le conteneur à partir du dépôt officiel d’Ubuntu. Une fois l’installation terminée, vérifiez que Node.js est installé :
```
node -v
```

Vous verrez le numéro de version affiché dans votre terminal :
```
Output
v10.19.0
```

Les modifications que vous apportez à l’intérieur du conteneur ne s’appliquent qu’à ce conteneur.

Pour quitter le conteneur, tapez exit à l’invite.

Voyons maintenant comment gérer les conteneurs sur notre système.

# Gestion des conteneurs Docker

Après avoir utilisé Docker pendant un certain temps, vous aurez de nombreux conteneurs actifs (en cours d’exécution) et inactifs sur votre ordinateur. Pour voir les actifs, utilisez :
```
docker ps
```

Vous verrez une sortie similaire à celle-ci :
```
Output
CONTAINER ID        IMAGE               COMMAND             CREATED             
```

Dans ce cours, vous avez lancé deux conteneurs ; un à partir de l’image hello-world et un autre à partir de l’image ubuntu. Les deux conteneurs ne sont plus actifs, mais ils existent toujours sur votre système.

Pour voir tous les conteneurs, actifs et inactifs, exécutez docker ps avec le commutateur -a :
```
docker ps -a
```

Vous verrez une sortie semblable à celle-ci :
```
1c08a7a0d0e4        ubuntu              "/bin/bash"         2 minutes ago       Exited (0) 8 seconds ago                       quizzical_mcnulty
a707221a5f6c        hello-world         "/hello"            6 minutes ago       Exited (0) 6 minutes ago                       youthful_curie
```

Pour voir le dernier conteneur que vous avez créé, passez-le au commutateur -l :
```
docker ps -l
```
```
CONTAINER ID        IMAGE               COMMAND             CREATED             STATUS                      PORTS               NAMES
1c08a7a0d0e4        ubuntu              "/bin/bash"         2 minutes ago       Exited (0) 40 seconds ago                       quizzical_mcnulty
```
Pour démarrer un conteneur arrêté, utilisez docker start, suivi de l’ID du conteneur ou de son nom. Démarrons le conteneur basé sur Ubuntu avec l’ID de 1c08a7a0d0e4 :
```
docker start 1c08a7a0d0e4
```

Le conteneur démarrera, et vous pouvez utiliser docker ps pour voir son statut
```
Output
CONTAINER ID        IMAGE               COMMAND             CREATED             STATUS              PORTS               NAMES
1c08a7a0d0e4        ubuntu              "/bin/bash"         3 minutes ago       Up 5 seconds                            quizzical_mcnulty
```

Pour arrêter un conteneur en cours d’exécution, utilisez docker stop, suivi de l’ID ou du nom du conteneur. Cette fois, nous utiliserons le nom que Docker a attribué au conteneur, qui est quizzical_mcnulty :
```
docker stop quizzical_mcnulty
```

Une fois que vous avez décidé que vous n’avez plus besoin d’un conteneur, retirez-le avec la commande docker rm, en utilisant à nouveau l’ID ou le nom du conteneur. Utilisez la commande docker ps -a pour trouver l’ID ou le nom du conteneur associé à l’image hello-world et supprimez-le.
```
docker rm youthful_curie
```

Vous pouvez démarrer un nouveau conteneur et lui donner un nom en utilisant le commutateur --name. Vous pouvez également utiliser le commutateur --rm pour créer un conteneur qui se supprime de lui-même lorsqu’il est arrêté. Voir la commande docker run help pour plus d’informations sur ces options et d’autres.

Les conteneurs peuvent être transformés en images que vous pouvez utiliser pour construire de nouveaux conteneurs. Voyons comment cela fonctionne.

# Transformation d’un conteneur en une image Docker

Lorsque vous démarrez une image Docker, vous pouvez créer, modifier et supprimer des fichiers comme vous le pouvez avec une machine virtuelle. Les modifications que vous apportez ne s’appliqueront qu’à ce conteneur. Vous pouvez le démarrer et l’arrêter, mais une fois que vous l’aurez détruit avec la commande docker rm, les modifications seront perdues pour de bon.

Cette section vous montre comment enregistrer l’état d’un conteneur en tant que nouvelle image Docker.

Après avoir installé Node.js dans le conteneur Ubuntu, vous avez maintenant un conteneur qui s’exécute à partir d’une image, mais le conteneur est différent de l’image que vous avez utilisée pour le créer. Mais vous pourriez vouloir réutiliser ce conteneur Node.js comme base pour de nouvelles images plus tard.

Ensuite, effectuez les modifications dans une nouvelle instance d’image Docker à l’aide de la commande suivante.
```
docker commit -m "What you did to the image" -a "Author Name" container_id repository/new_image_name
```

Le commutateur -m est destiné au message de validation qui vous aide, ainsi que les autres, à connaître les modifications que vous avez apportées, tandis que -a est utilisé pour spécifier l’auteur.  Le container_id est celui que vous avez noté plus tôt dans le cour lorsque vous avez lancé la session interactive de Docker. À moins de créer des référentiels supplémentaires sur Docker Hub, le référentiel est généralement votre nom d’utilisateur Docker Hub.

Par exemple, pour l’utilisateur sammy, avec l’ID de conteneur d9b100f2f636, la commande serait :
```
docker commit -m "added Node.js" -a "sammy" d9b100f2f636 sammy/ubuntu-nodejs
```

Lorsque vous validez une image, la nouvelle image est enregistrée localement sur votre ordinateur. Plus loin dans ce cour, vous apprendrez comment pousser une image vers un registre Docker comme Docker Hub pour que d’autres puissent y accéder.

L’énumération des images Docker affichera à nouveau la nouvelle image, ainsi que l’ancienne image dont elle est issue :
```
docker images
```

Vous verrez une sortie de ce type :

```
Output
REPOSITORY               TAG                 IMAGE ID            CREATED             SIZE
sammy/ubuntu-nodejs   latest              7c1f35226ca6        7 seconds ago       179MB
...
```

Dans cet exemple, ubuntu-nodejs est la nouvelle image, qui a été dérivée de l’image ubuntu existante à partit de Docker Hub. La différence de taille reflète les modifications apportées. Et dans cet exemple, le changement est que NodeJS a été installé. Donc la prochaine fois que vous aurez besoin d’exécuter un conteneur en utilisant Ubuntu avec NodeJS pré-installé, vous pourrez simplement utiliser la nouvelle image.

Vous pouvez également construire des images à partir d’un Dockerfile, qui vous permet d’automatiser l’installation de logiciels dans une nouvelle image. Cependant, cela n’entre pas dans le cadre de ce cour.

Partageons maintenant la nouvelle image avec d’autres personnes afin qu’elles puissent créer des conteneurs à partir de celle-ci.

# Pousser des images Docker dans un référentiel Docker

L’étape logique suivante après la création d’une nouvelle image à partir d’une image existante est de la partager avec quelques amis choisis, le monde entier sur Docker Hub, ou tout autre registre Docker auquel vous avez accès. Pour pousser une image vers Docker Hub ou tout autre registre Docker, vous devez y avoir un compte.

Cette section vous montre comment pousser une image Docker vers Docker Hub.

Pour pousser votre image, connectez-vous d’abord à Docker Hub.
```
docker login -u docker-registry-username
```

Vous serez invité à vous s’authentifier à l’aide de votre mot de passe Docker Hub. Si vous avez spécifié le bon mot de passe, l’authentification devrait réussir.

**Remarque **: Si votre nom d’utilisateur du registre Docker est différent du nom d’utilisateur local que vous avez utilisé pour créer l’image, vous devrez tagger votre image avec votre nom d’utilisateur du registre. Pour l’exemple donné à la dernière étape, vous devriez taper :
```
    docker tag sammy/ubuntu-nodejs docker-registry-username/ubuntu-nodejs
```

Ensuite, vous pouvez pousser votre propre image à l’aide de :
```
docker push docker-registry-username/docker-image-name
```

Pour pousser l’image ubuntu-nodejs vers le référentiel sammy, la commande serait :
```
docker push sammy/ubuntu-nodejs
```

Le processus peut prendre un certain temps pour s’achever car il télécharge les images, mais une fois terminé, la sortie ressemblera à ceci :
```
Output
The push refers to a repository [docker.io/sammy/ubuntu-nodejs]
e3fbbfb44187: Pushed
5f70bf18a086: Pushed
a3b5c80a4eba: Pushed
7f18b442972b: Pushed
3ce512daaf78: Pushed
7aae4540b42d: Pushed

...
```

Après avoir poussé une image vers un registre, elle doit être répertoriée sur le tableau de bord de votre compte, comme le montre l’image ci-dessous.

![](https://assets.digitalocean.com/articles/docker_1804/ec2vX3Z.png)

Si une tentative de push entraîne une erreur de ce type, c’est que vous ne vous êtes probablement pas connecté :

```
Output
The push refers to a repository [docker.io/sammy/ubuntu-nodejs]
e3fbbfb44187: Preparing
5f70bf18a086: Preparing
a3b5c80a4eba: Preparing
7f18b442972b: Preparing
3ce512daaf78: Preparing
7aae4540b42d: Waiting
unauthorized: authentication required
```

Connectez-vous avec le docker login et répétez la tentative de poussée. Vérifiez ensuite qu’elle existe sur votre page de dépôt Docker Hub.

Vous pouvez maintenant utiliser docker pull sammy/ubuntu-nodejs pour tirer l’image vers une nouvelle machine et l’utiliser pour lancer un nouveau conteneur.