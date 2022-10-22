# Qu’est-ce que SSH ?

- Le protocole SSH pour les débutants https://youtu.be/gxQKw7A6qDM

SSH signifie "Secure Shell", il s'agit donc d'un "shell" dit "sécurisé". Pour rappel, un shell, que l'on peut également appeler communément "terminal", est la méthode la plus courante de gestion des serveurs Linux.

Un shell va permettre de dialoguer avec une machine ou un serveur via l'exécution de différentes commandes qui retourneront des informations. Voici un exemple de shell :

![](https://www.it-connect.fr/wp-content-itc/uploads/2015/07/exemple-shell-01.jpg)

Un shell va donc nous permettre d'administrer nos serveurs Linux, en local, c'est à dire lorsque l'on se trouve physiquement en face de notre serveur, mais aussi à distance ! Notamment grâce à Secure Shell (SSH).

L'administration à distance est aujourd'hui vitale lorsque l'on gère un seul serveur, comme des milliers.

Imaginez que l'on doive, à chaque fois que l'on souhaite effectuer une opération sur un serveur, se trouver en face de celui-ci avec un écran, une souris et un clavier. Bien sûr, il existe des endroits où sont centralisés les serveurs : Les datacenter. Cependant, ce sont des endroits qui ne sont pas vraiment propices au travail et à la concentration, outre le bruit des milliers de ventilateurs que l'on pourra entendre, la climatisation vous soufflant joyeusement dans le dos lorsque vous travaillez sur votre serveur est difficilement supportable plus de quelques heures 😉 .

![](https://www.it-connect.fr/wp-content-itc/uploads/2015/07/ssh-exemple-01.jpg)

Il est alors très pratique de pouvoir se connecter à n'importe quel serveur de notre datacenter sans bouger de notre bureau ou notre poste d'administration sur trouvant dans un endroit plus adapté à l'être humain.

Un autre exemple de l'utilité du protocole et du service SSH est le cas où l'on doit gérer des serveurs qui sont géographiquement éloignés de notre poste d'administration (par poste d'administration, j'entends un ordinateur depuis lequel on va vouloir configurer nos serveurs, un client). Si je dispose d'un serveur à Paris, un à Lyon et que je me trouve moi-même à Rennes, il est difficilement pensable d'être obligé d'aller sur ces différents sites à chaque fois qu'une modification est à effectuer sur mes serveur.

![](https://www.it-connect.fr/wp-content-itc/uploads/2015/07/ssh-exemple-02.jpg)

L'utilisation du protocole SSH va alors me permettre de me connecter à distance sur mes serveurs, dans ce cas-ci au travers Internet, pour manager mes serveurs et disposer de toutes les possibilités d'une utilisation directe.

# Un peu d'histoire

Lorsque l'on apprend de nouvelles notions en informatique, il est toujours important et utile de connaître l'historique de ces notions. Pas seulement parce que cela permet d'avoir une culture technique, mais surtout car l'historique en informatique permet bien souvent de mieux comprendre et d'apprendre sur ce que l'on utilise aujourd'hui.

Autrefois, d'autres protocoles étaient utilisés pour accéder à distance à un serveur Linux. Le protocole Telnet a pendant longtemps été utilisé, il permet également d'accéder à distance à une machine Linux, mais Telnet est aujourd'hui délaissé au profit de SSH et cela pour une raison très simple : son manque de sécurité.

En effet, Telnet était un protocole qui faisait tout passer en clair sur le réseau. Cela signifie que lorsque l'on se connectait à un serveur Linux à distance et que l'on fournissait à ce serveur nos identifiants, ceux-ci transitaient en texte claire. Un intrus se trouvant sur la route des paquets qui transitaient entre un serveur et un client communiquant en telnet était alors capable de voir ces identifiants, et les autres messages transportés :

![](https://www.it-connect.fr/wp-content-itc/uploads/2015/07/schema-telnet-01.jpg)

On ne pourra jamais empêcher quelqu'un d'écouter les communications qui transitent par un réseau, il faut alors faire en sorte que celui qui écoute à notre insu ne comprenne pas ce qu'il voit. SSH a principalement été créé pour répondre à cette problématique de confidentialité. En effet avec SSH, tous les échanges entre le client et le serveur sont chiffrés :

![](https://www.it-connect.fr/wp-content-itc/uploads/2015/07/schema-ssh-01.jpg)

Un peu plus loin dans ce cours, nous verrons plus en détail la façon dont sont sécurisés ces échanges. En plus de l'apport en sécurité lors de l'accès à distance aux machines Linux, SSH apporte également des fonctionnalités plus nombreuses que Telnet.

SSH a été créé en 1995 par Tatu Ylönen, d'abord dans sa version 1, qui a ensuite connue des problèmes de sécurité, SSH est passé ensuite, et est toujours, en version 2. Cette seconde version a été normalisée en 2006 par l'IETF (Internet Engineering Task Force).

Le fait que le protocole SSH soit normalisé par l'IETF signifie que c'est un protocole stable, qui est considéré comme une "norme", le but de l'IETF étant de développer et de maintenir les normes de l'Internet. La standardisation d'un protocole ou d'une technologie est toujours un signe de fiabilité et de durabilité.
