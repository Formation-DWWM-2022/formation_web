# Les protocoles TCP et UDP

- Réseau : les protocoles TCP et UDP : https://youtu.be/kiw1g6GrGJ0
- Quelles différences entre les protocoles TCP et UDP de la couche "transport" du modèle

Dans ce cours, nous allons découvrir les protocoles UDP et TCP, deux protocoles indispensables lorsque l'on s'intéresse au fonctionnement des réseaux informatiques.

Les protocoles TCP et UDP sont présents au sein de la couche "Transport" (ou couche n°4) du modèle OSI, ce qui va permettre de déterminer comment les données seront échangées entre deux hôtes. L'objectif de cet article est de vous proposer une introduction à ces deux protocoles afin de comprendre l'essentiel, tout en illustrant mes propos avec des analyses de trames réseau obtenues à partir du logiciel Wireshark.

# Le protocole TCP

TCP signifie Transmission Control Protocol, et il s'agit d'un protocole orienté connexion. Le protocole TCP est très utilisé lorsque l'on utilise des protocoles IP, c'est pour cela que l'on parle aussi de TCP/IP.

Avec le protocole TCP, avant que des données soient échangées entre les deux hôtes, l'hôte source va créer une session de connexion avec l'hôte distant afin de le prévenir qu'il va recevoir des données. Pour cela, un premier échange aura lieu entre les deux hôtes (voir détails ci-dessous).

Une fois que la connexion est établie, l'échange de  données peut commencer. Pendant cet échange de données, les paquets (correspondants aux données) sont envoyés dans l'ordre, et le protocole TCP va s'assurer que tous les paquets sont bien transmis, et si ce n'est pas le cas, il est capable de renvoyer les paquets manquants. C'est l'un des avantages du protocole TCP.

Cette connexion sera maintenue jusqu'à ce qu'elle soit fermée, ce qui signifie qu'elle sera active à minima jusqu'à la fin de l'échange de données entre les deux hôtes. Elle peut être maintenue afin d'être prête dès que les deux hôtes auront besoin de communiquer ensemble.

En complément du contrôle des flux et de la gestion des erreurs, le protocole TCP est capable de contrôler la congestion du réseau sur lequel les paquets sont échangés. Un algorithme de contrôle de congestion est utilisé et en cas de surcharge du réseau, le flux TCP sera adapté en conséquence.

Il faut retenir que TCP va permettre d'établir une connexion fiable entre les deux hôtes pour s'assurer que les données sont correctement reçues par l'hôte distant.

## Les protocoles qui utilisent TCP

TCP est le protocole de transport le plus utilisé sur Internet et chaque protocole applicatif a besoin d'utiliser un protocole de transport, dont TCP et UDP font partie. Il est difficile d'établir une liste exhaustive des protocoles qui s'appuient sur TCP pour le transport.

Néanmoins, voici la liste de quelques protocoles populaires qui s'appuient sur TCP :

- Les protocoles HTTP et HTTPS, notamment pour charger le contenu des sites Internet
- Le protocole SMTP pour envoyer des e-mails
- Le protocole NFS pour transférer des données (sur certaines versions uniquement)
- Le protocole SMB pour transférer des données
- Les protocoles SSH et Telnet pour la gestion à distance d'un équipement
- Le protocole RDP pour l'administration d'un hôte via le Bureau à distance
- Le protocole LDAP pour interroger un annuaire comme l'Active Directory

Vous l'avez compris, TCP est un protocole que l'on utilise tous les jours au travers d'applications diverses et variées. Vous verrez également qu'UDP joue un rôle important au quotidien.

## Fonctionnement d'une connexion TCP

Pour établir une connexion TCP, trois étapes sont nécessaires alors on parle d'un processus "three-way handshake". Ces trois étapes correspondent à trois paquets TCP : SYN, SYN-ACK et ACK. Ces termes correspondent à des flags (des marqueurs) que l'on peut retrouver au sein des paquets TCP.

L'initialisation d'une connexion TCP entre deux hôtes se schématise de cette façon :

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/01/tcp-three-way-handshake.png)

Le paquet TCP SYN correspond à une demande d'initialisation de connexion envoyée par un client à un serveur, tout en sachant que SYN signifie "Synchronized". Ensuite, le serveur répond avec un paquet TCP SYN-ACK pour initier la connexion dans l'autre sens (SYN) et indiquer au client qu'il a bien reçu la demande de connexion (ACK pour Acknowledge). Enfin, le client répond au serveur avec un paquet TCP ACK pour accuser réception de la demande de connexion (Acknowledge). La connexion TCP est établie en mode full-duplex, c'est-à-dire dans les deux sens.

    Note : des numéros de séquence sont associés aux différents échanges TCP afin de pouvoir suivre les connexions. En cas de perte de paquets, c'est grâce à ce suivi des numéros de séquence, incrémenté au fur et à mesure de l'échange, que TCP est capable de réémettre les paquets manquants. Chaque échange contient deux numéros : un numéro de séquence et un numéro d'acquittement (ack).

Pour fermer une connexion TCP, il y a deux méthodes : la méthode propre (ou normale, disons) qui consiste à envoyer un paquet TCP FIN à l'hôte distant pour lui demander de fermer la connexion aussi de son côté. En attendant sa réponse, on reste à l'écoute, notamment le temps qu'il indique que la connexion peut être fermée et les ressources libérées. Le serveur va envoyer un paquet TCP ACK puis ensuite TCP FIN (lorsque la connexion sera prête à être fermée côté serveur), et enfin le client répondra par TCP ACK : la connexion sera fermée des deux côtés.

Lorsque la connexion TCP ne peut pas être terminée proprement (par exemple : une coupure réseau entre les deux hôtes, un bug pendant la session, etc.), il existe une autre solution qui consiste à forcer la fermeture de la connexion TCP via un paquet TCP RST. On peut dire que l'on essaie d'avertir l'hôte distant que l'on ne répondra plus à ses requêtes pour cette connexion et qu'elle va être fermée.

# Le protocole UDP

UDP signifie User Datagram Protocol, et il s'agit d'un protocole de communication sans connexion. Le protocole UDP est une alternative au protocole TCP.

Lorsque le protocole UDP est utilisé pour transporter les données, il va envoyer les données d'un hôte source vers un hôte de destination, sans chercher à savoir si l'hôte de destination a bien reçu l'ensemble des données. Autrement dit, il n'y a pas de vérification des erreurs : si l'on envoie un fichier via UDP, on ne sait pas si l'hôte distant a reçu entièrement ce fichier ou s'il l'a reçu partiellement.

    Note : lorsque l'on parle du protocole UDP, on évoque le principe du "fire and forget" c'est-à-dire "tire et oublie" puisqu'avec UDP on envoie les paquets puis on ne s'en occupe plus, comme si on avait oublié qu'un paquet avait été envoyé.

Puisque l'on ne vérifie pas que l'hôte distant a bien reçu les données, on économise des ressources, mais aussi du temps, donc le protocole UDP est plus rapide que le protocole TCP.

L'en-tête d'un segment UDP contient très peu de champs : le port source, le port de destination, la longueur totale du segment, la somme de contrôle (pour vérifier l'intégrité du segment envoyé par le réseau) et les données.

## Les protocoles qui utilisent UDP

Voici quelques exemples de protocoles qui utilisent UDP comme protocole de transport, tout en sachant que cette liste n'est pas exhaustive.

- Le protocole DNS pour la résolution des noms (même si TCP peut être utilisé dans de rares cas)
- Le protocole SNMP pour la supervision des équipements
- Le protocole NTP pour la mise à jour de la date et l'heure via le réseau
- Le protocole TFTP pour le transfert de fichiers simplifié

Au quotidien, on utilise le protocole DNS pour naviguer sur Internet afin de résoudre les noms des sites que l'on souhaite visiter. Cette résolution de noms s'effectue via le protocole de transport UDP.

Lorsque l'on regarde un flux vidéo en streaming, ce flux est transporté via le protocole UDP, car cela permet d'alléger la charge côté serveur et que c'est adapté à cet usage. Pour lire un flux diffusé par un serveur, le protocole UDP est idéal. Généralement, les protocoles qui utilisent UDP le font, car si un paquet est perdu ce n'est pas critique pour le reste de la transmission. Par exemple, s'il y a une perte d'une image lors de la lecture d'un flux en streaming, cela n'est pas grave et passera inaperçu.

# TCP vs UDP

En reprenant les caractéristiques principales, voici ce que l'on obtient si l'on compare les protocoles TCP et UDP :
| | TCP | UDP
| --- | --- | --- |
| Fiabilité | Elevée | Faible
| Vitesse | Faible | Elevée
| Détection des erreurs | Oui | Non
| Correction des erreurs | Oui | Non
| Contrôle de la congestion | Oui | Non
| Accusé de réception (ACK) | Oui | Uniquement la somme de contrôle

Si l'on veut faire une comparaison avec la vie réelle, on peut prendre l'exemple d'un courrier que l'on expédie par voie postale. Si l'on envoie ce courrier en prenant l'option "lettre recommandée avec accusé de réception", on sera capable de savoir si le destinataire a bien reçu ou non le courrier puisque l'on va recevoir une preuve dans sa boite aux lettres quelques jours plus tard. Cet accusé de réception nous assure que le courrier est arrivé à destination. On peut considérer en quelque sorte que cela correspond au fonctionnement du protocole TCP.

Par contre, si l'on envoie ce courrier simplement en tant que "lettre verte" ou "lettre prioritaire", nous n'avons aucun moyen de savoir si le destinataire a bien reçu le courrier via ce mode d'expédition. Cette fois-ci, on se rapproche du fonctionnement du protocole UDP. On peut imaginer qu'un jour nous allons recevoir une réponse à notre courrier, car souvent un courrier implique une réponse, tout comme le serveur DNS répond aux requêtes DNS qui lui sont envoyées, mais cela est lié au fonctionnement du protocole de couche supérieure (DNS) plutôt qu'au protocole d'UDP, ce dernier étant là uniquement pour transporter la requête.
