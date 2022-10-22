# Qu’est-ce qu’un hôte FTP ou hébergeur FTP ? À quoi sert-il ?

- FTP, SFTP et FTPS pour les débutants : https://youtu.be/FZ8TyOUSQMI

## Définition et usages du protocole FTP

Comme son nom l’indique, le File Transfer Protocol (FTP) est un protocole de transfert de fichiers par Internet. Il permet l’échange de commandes et de données entre un ordinateur ou un logiciel, le client FTP, et un serveur, l’hôte FTP. Ce serveur FTP est un répertoire distant. Il héberge les données de votre site web ou de vos applications afin de faciliter leur mise en ligne, leur migration ou leur partage… à la manière d’un centre de données.

Le protocole FTP permet d’établir une connexion entre le serveur et le client, grâce à un canal de commandes FTP. Sur ce canal, le webmaster a la possibilité d’utiliser des lignes de commandes telles que « get », pour obtenir un fichier, ou « close », pour fermer la session FTP en cours. Il peut également gagner du temps, en utilisant un logiciel dédié aux services d’hébergement.

De nombreux logiciels clients FTP facilitent en effet ces commandes. Les plus connus sont FileZilla et Cyberduck.

Le protocole FTP va alors permettre de transmettre les fichiers, textes et images depuis l’ordinateur du gestionnaire de site vers un hébergement web, l’hébergeur FTP. Une fois importées sur le serveur FTP, ces données pourront être publiées. Elles seront donc accessibles aux internautes via leur navigateur.

De nombreux cas d’usage existent :
- utiliser le serveur FTP pour transférer des données d’un ordinateur à un autre ;
- mettre en place un intranet afin de partager des fichiers en haute disponibilité ou sécuriser les accès ;
- héberger des données sur un serveur mutualisé pour libérer de l’espace disque sur un serveur physique ;
- créer un site internet ou migrer des contenus vers un nouveau nom de domaine ;
- sauvegarder des fichiers importants (backup) ;
- centraliser l’information de plusieurs sites web et noms de domaine.

## Différences entre FTP, FTPS et SFTP

### Protocole FTP

Le protocole FTP est la méthode standard de transmission des données entre un client FTP et un serveur FTP. Avec lui, il est possible de réguler les accès des utilisateurs avec un identifiant et un mot de passe.

Cependant, si la connexion au serveur est sécurisée, la transmission des données, elle, ne l’est pas. En effet, les informations en transit via les standards FTP ne sont pas chiffrées. Elles peuvent donc être interceptées par des tiers malintentionnés. Cette faille explique le développement de deux nouveaux protocoles sécurisés : le FTPS et le SFTP.

### Protocole FTPS

Le FTPS est la déclinaison sécurisée du protocole FTP. Il apporte un niveau de sûreté supplémentaire à votre serveur FTP et donc, in fine, à votre site web. Grâce au chiffrement SSL/TLS, les données (fichiers, logs…) qui transitent entre le client et le serveur FTP sont protégées.

### Protocole SFTP

SFTP signifie « SSH File Transfer Protocol » ou « Secure File Transfer Protocol ». Comme le FTPS, le protocole SFTP vise à sécuriser le flux de données transmis entre le client FTP et le serveur FTP. Pour cela, il s’appuie lui aussi sur un algorithme de chiffrement, le tunnel SSH sécurisé, qui protège les informations. Il est également possible de renforcer la sécurité de votre espace FTP, en mettant en place un système d’authentification avec identifiant et mot de passe : la clé SSH.

Durant tout le processus de transmission des données via le tunnel SSH sécurisé et la synchronisation des dossiers, les informations restent illisibles. Quant aux clés SSH, elles empêchent tout accès frauduleux aux fichiers du ou des sites web hébergés sur le serveur FTP.

Le SFTP est donc le protocole le plus sécurisé pour transférer des données entre un client FTP et un serveur FTP.

# Obtenir l’autorisation d’accéder à un hébergeur FTP

Chaque solution d’hébergement dispose d’un ou plusieurs accès FTP ou multi-FTP dédiés.

Pour vous connecter à votre espace de stockage FTP sécurisé, vous avez besoin des éléments suivants :

- un identifiant d’utilisateur FTP ou un nom d’utilisateur SSH actif ;
- le mot de passe associé ;
- l’adresse du serveur FTP ;
- le port de connexion au serveur.

Tous ces éléments d’authentification vous sont communiqués par e-mail, lors de la mise en place de votre hébergement. En cas d’oubli du mot de passe FTP, de l’adresse hôte ou de l’identifiant, ces informations restent accessibles ou modifiables à tout moment depuis votre espace client.

Cette interface vous permet également – en tant qu’administrateur du site – de créer un compte pour un nouvel utilisateur, ainsi que de gérer les droits d’accès au dossier racine, à un nom de domaine ou à des bases de données. Cela simplifie la gestion de contenus mutualisés.

# Paramétrer un serveur FTP

Lors de la souscription à une solution d’hébergement web, le serveur FTP est déjà configuré. Des options vous permettent de créer de nouveaux chemins d’accès ou accès utilisateurs dans votre espace client.

# Configurer un client FTP pour le connecter à un serveur FTP

La connexion au serveur FTP s’effectue via un outil dédié, le client FTP. Les deux clients FTP gratuits les plus utilisés sont FileZilla (logiciel open source pour les utilisateurs sous Windows ou Linux)

![](https://www.ovhcloud.com/sites/default/files/styles/text_media_horizontal/public/2021-08/Filezilla.webp)

et Cyberduck (logiciel gratuit pour les utilisateurs de macOS).

![](https://www.ovhcloud.com/sites/default/files/styles/text_media_horizontal/public/2021-08/Cyberduck.webp)
 
Une fois installé, le logiciel FTP affiche un écran de connexion pour entrer vos identifiants et accéder au service d’hébergement.

Quel qu’il soit, votre logiciel client FTP connecte votre ordinateur à l’espace de stockage du serveur FTP. Afin de créer un site web ou gérer l’arborescence de votre future application, il suffit de copier les documents à importer. Vous pouvez aussi les « glisser-déposer » vers le serveur FTP depuis l’interface utilisateur, à la manière d’un explorateur de fichiers classique.

Quand tous les dossiers et scripts sont importés sur le serveur d’hébergement de votre site, il est alors possible de procéder à sa mise en ligne. Votre interface et vos pages web seront ainsi accessibles aux internautes, de même que tout le contenu hébergé dans le répertoire « public_html » de votre serveur virtuel.