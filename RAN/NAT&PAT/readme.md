# Le NAT et le PAT pour les débutants

- Comprendre le NAT / PAT en 7 minutes https://www.youtube.com/watch?v=jq3SLuhIyPI
- Réseau : le NAT et le PAT pour les débutants https://www.youtube.com/watch?v=pS5zp9eBeq8

Dans ce cours, je vais vous parler de réseau informatique, et plus précisément de NAT, de PAT et de redirections de port car ces trois concepts sont liés. Il s'agit de notions très importantes qu'il faut maîtriser lorsque l'on s'intéresse au fonctionnement d'un réseau informatique car nous utilisons tous le NAT au quotidien ! C'est également un sujet auquel vous devez vous intéresser si vous souhaitez une façon simple de rendre accessible certaines ressources de votre réseau local depuis Internet (un NAS, un serveur, etc...).

# Le principe du NAT

Tout d'abord, il faut savoir que l'acronyme NAT correspond à Network Address Translation, c'est-à-dire en français une traduction d'adresse réseau. Il s'agit d'un mécanisme mis en place sur les routeurs afin de remplacer l'adresse IP privée source d'une machine par l'adresse IP publique du routeur dans un paquet réseau lorsqu'une machine tente de communiquer avec un serveur situé sur Internet.

## Pourquoi inventer un tel mécanisme ?

A la base, le NAT a été inventé afin d'apporter une réponse à la future pénurie d'adresses IPv4 ! Je vous rappelle que le nombre d'adresses IPv4 n'est pas illimité, puisqu'une adresse IP est codée sur 4 octets (soit 32 bits car 1 octet = 8 bits) et que cela nous donne 2^32 adresses IP disponibles au maximum, soit 4 294 967 296 d'adresses IP. On va dire, un peu plus de 4 milliards. Ainsi, il y a des adresses IP dites privées que l'on utilise seulement sur les réseaux locaux (et qui sont réutilisables d'un réseau local à un autre), et les adresses IP dites publiques utilisées pour les communications sur Internet.

Le NAT est une réponse à cette problématique ! A la base, cela devait être une réponse temporaire... Car la véritable réponse, ce sont les adresses IPv6 (codées sur 16 octets, soit 128 bits) ! Même si depuis plusieurs années, nous avons la possibilité d'utiliser les adresses IPv6, les adresses IPv4 restent les plus exploitées et nous utilisons plus souvent des adresses IPv4 que des adresses IPv6, il faut l'avouer.

Grâce au NAT tel que nous l'utilisons à la maison, notamment par l'intermédiaire de notre box Internet, plusieurs appareils peuvent partager la même adresse IP publique donc on fait des économies en terme d'utilisation des adresses IP publiques ! Par définition, une adresse IP privée telle que "192.168.1.10/24" n'est pas utilisable directement sur Internet mais grâce au NAT, on va pouvoir accéder à Internet malgré tout.

## Le fonctionnement du NAT

Pour bien comprendre, prenons l'exemple suivant : mon "Ordinateur 1" est connecté au réseau de mon domicile, où se situe ma box Internet (et donc où il y a du NAT en place). Je souhaite accéder à un serveur Web ayant pour adresse IP publique 50.50.50.50 afin d'accéder au site it-connect.fr. Que se passe-t-il ?

Premièrement, mon ordinateur avec l'adresse IP "192.168.1.10" va tenter de se connecter au serveur Web "50.50.50.50", donc une requête va être envoyée à destination de ce serveur Web, en passant par mon routeur, c'est-à-dire la box. On passe par le routeur car c'est la passerelle par défaut (route par défaut) de mon réseau local, et qu'elle est définie sur ma machine.

Deuxièmement, au moment où ma requête émise de mon ordinateur à destination du serveur Web arrive à mon routeur, le mécanisme du NAT va entrer en jeu ! Autrement dit, ma requête n'est pas directement envoyée au serveur Web. Puisque le NAT est actif, le routeur va modifier le paquet réseau avant de l'envoyer au serveur Web, afin de remplacer l'adresse IP source "192.168.1.10" par "61.61.61.61" qui est l'adresse IP publique de ma box. Une fois que cette opération est effectuée, le paquet est émis au serveur Web "50.50.50.50".

Troisièmement, la requête arrive jusqu'au serveur Web, et ce dernier voit que la requête provient de l'adresse IP "61.61.61.61". Autrement dit, il associe mon ordinateur 1 à l'adresse IP publique "61.61.61.61", et à aucun moment il n'aura connaissance de mon adresse IP privée, à savoir "192.168.1.10/24".

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/le-nat-pour-les-debutants-01-800x431.png)

Passons à la phase retour, lorsque le serveur Web va répondre au client pour lui indiquer le contenu de la page Web du site, par exemple.

Quatrièmement, le serveur Web va répondre à l'ordinateur 1 en envoyant sa réponse sur l'adresse IP publique "61.61.61.61", ce qui est logique. Le paquet est réceptionné par le routeur (la box), en provenance de 50.50.50.50.

Cinquièmement, la box a mémorisée cette connexion (grâce à une table de translation) et donc elle sait qu'elle doit adresser le paquet reçu de la part du serveur Web à notre ordinateur 1. A partir de son adresse IP "192.168.1.1", le routeur envoie la réponse à ordinateur 1, mais l'ordinateur 1 voit la réponse comme si elle provenait directement du serveur Web "50.50.50.50".

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/le-nat-pour-les-debutants-02-800x386.png)

Le mécanisme de NAT sert d'intermédiaire entre le réseau local et Internet. Il présente l'avantage de masquer les machines du réseau local vis-à-vis d'Internet car elles ne sont pas directement accessibles d'Internet vers le réseau local, ce qui peut-être intéressant niveau sécurité. Néanmoins, nous verrons par la suite que l'on peut permettre cet accès par l'intermédiaire d'une redirection de ports.

# Les types de NAT

Dans la suite de ce cours, nous verrons qu'il y a plusieurs types de NAT, et nous allons identifier facilement le type de NAT que nous utilisons tous au quotidien, à la maison.

## NAT statique

L'objectif du NAT statique est de traduire une adresse IP privée en une adresse IP publique, en fonctionnant par association statique, c'est-à-dire un pour un. Autrement dit, une adresse IP privée est associée à une adresse IP publique ! Prenons le tableau suivant comme exemple :

| Appareils | Adresse IP privée | Adresse IP publique
| --- | --- | ---
| Ordinateur 1 | 192.168.1.10 | 61.61.61.61
| Ordinateur 2 | 192.168.1.11 | 61.61.61.62

Ainsi, lorsque notre ordinateur 1 accédera à Internet, son adresse IP privée "192.168.1.10" sera automatiquement remplacée par "61.61.61.61". D'un autre côté, lorsque l'ordinateur 2 accédera à Internet, son adresse IP privée "192.168.1.11" sera remplacée par "61.61.61.62". Cela est également vrai pour l'inverse, une requête envoyée sur l'adresse IP "61.61.61.61" sera automatiquement transmise à "Ordinateur 1" puisqu'il est associé à cette adresse IP publique.

Ce mécanisme montre rapidement ses limites car chaque machine du réseau interne doit disposer à la fois d'une adresse IP privée et d'une adresse IP publique. Le NAT statique, appelé également "NAT one-to-one" peut servir à rendre accessible un serveur Web en lui attribuant (en quelque sorte) une adresse IP publique. Cependant, pour publier un serveur Web sur Internet de façon sécurisée, il est préférable d'utiliser un reverse proxy, ou éventuellement une règle de redirection de port pour autoriser uniquement les flux HTTPS, par exemple.

Pour finir, sachez qu'avec du NAT statique, l'équipement du réseau local est accessible depuis Internet via son adresse IP publique puisqu'il y a un mappage entre les deux adresses IP (privée et publique).

## NAT dynamique

Le NAT dynamique est différent du NAT statique car les associations entre une adresse IP privée correspondante à une machine et une adresse IP publique disponible sur le routeur seront dynamiques et temporaires ! Ainsi, si l'on a 50 ordinateurs, 10 smartphones et 20 tablettes connectés à son réseau local, et que l'on dispose de 4 adresses IP publiques, elles seront exploitées dynamiquement par nos machines afin de permettre un accès à Internet.

Lorsqu'une connexion vers Internet est effectuée par une machine, le routeur associe temporairement l'adresse IP privée à l'adresse IP publique. Pour cela, une adresse IP appartenant à votre pool d'adresses IP publiques est utilisée. Quand la connexion est terminée, l'adresse IP est libérée et potentiellement attribuable à une autre machine.

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-nat-dynamique-2022-800x431.png)

## PAT

Le PAT pour Port Address Translation est une forme de NAT dynamique, que l'on appelle "NAT overlay" ou "Masquerade NAT", avec quelques différences très intéressantes, qui font du PAT le mode le plus couramment utilisé ! Comme le NAT dynamique, le PAT va effectuer une association dynamique et temporaire entre une adresse IP privée et une adresse IP publique, sauf qu'il va ajouter à cette association une autre information : un numéro de port, d'où le terme "PAT".

Grâce au PAT, une seule et même adresse IP publique peut-être utilisée par X machines connectées sur le réseau local. C'est exactement ce qu'il se passe à la maison : votre ordinateur, votre smartphone, votre tablette, voire même vos prises connectées et votre robot aspirateur sont connectées à votre réseau local et utilisent tous la même adresse IP publique pour accéder à Internet ! Pour vous en convaincre, il suffit de regarder votre adresse IP publique à partir de différents appareils connectés à votre réseau local : vous verrez que c'est la même ! Pour cela, il suffit d'accéder à un site tel que mon-ip.com.

Voici un schéma qui illustre ce fonctionnement, avec deux ordinateurs sur le même réseau local et qui accèdent à Internet via une même connexion Internet, c'est-à-dire via la même box. Si ces deux ordinateurs se connectent au même serveur Web car les utilisateurs ont tous les deux envie de visiter le même site, le serveur Web distant verra deux connexions différentes en provenance de l'adresse IP publique "61.61.61.61" grâce au mécanisme PAT.

Afin de pouvoir identifier ces connexions et de retourner chaque réponse du serveur Web au bon ordinateur, un numéro de port est associé à chaque connexion : c'est ce qui constitue la table de traduction (table de translation).

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-pat-2022-800x420.png)

# DNAT pour les redirections de ports

Parlons maintenant de la notion de "Redirection de port" appelée aussi "port forwarding", qui correspond au "DNAT" c'est-à-dire au "Destination NAT". En fait, on parle de "Source NAT" quand c'est l'adresse IP source du paquet qui est modifiée (par exemple : un PC du réseau local accède à un site Internet) et de "Destination NAT" quand c'est l'adresse IP de destination du paquet qui est modifiée (par exemple : un PC connecté à Internet accède à un NAS connecté à notre réseau local).

Grâce à une règle de redirection de port, une machine connectée au réseau local et qui dispose d'une adresse IP privée pourra être accessible depuis l'extérieur, c'est-à-dire depuis Internet, sur un ou plusieurs ports spécifiques, via l'adresse IP publique du routeur (box).

Par exemple :

- Un serveur Web connecté au réseau local pourra être joignable depuis l'extérieur sur le port TCP/443 correspondant au HTTPS, en accédant à l'adresse IP publique de la box
- Un serveur Linux connecté au réseau local pourra être joignable en SSH depuis l'extérieur sur le port TCP/22 (ou un autre port autre que celui par défaut), en accédant à l'adresse IP publique de la box
- Etc...

## Exemple de redirection de port

Pour bien comprendre ce principe, prenons le schéma suivant :

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-redirection-port-2022-800x381.png)

Dans cet exemple, c'est un NAS connecté sur mon réseau local qui est accessible depuis Internet. Je décide d'associer le port 65001/TCP pour accéder à ce NAS, ce qui signifie que si j'ouvre un navigateur que j'indique dans la barre d'adresses "https://mon-ip-publique-de-ma-box:65001" (on peut aussi utiliser un nom de domaine) alors je vais accéder à mon NAS grâce à cette règle de redirection de port !

Premièrement, mon ordinateur connecté à Internet, et qui n'est pas à la maison, envoie une requête sur l'adresse IP publique de ma box, à savoir "61.61.61.61" sur le port "65001" : https://61.61.61.61:65001.

Deuxièmement, ma box réceptionne cette requête. En temps normal, cette requête serait rejetée car elle provient d'Internet, mais là c'est différent car il y a une règle explicite qui explique comment traiter cette requête. Ma box voit que l'adresse IP de destination est "61.61.61.61" avec le port "65001", et qu'elle doit transmettre cette requête à l'adresse IP privé "192.168.1.12" (sur le port 65001) correspondante au NAS.

Troisièmement, ma box décide de remplacer l'adresse IP de destination du paquet pour indiquer la véritable destination de ce paquet, donc "61.61.61.61" est remplacé par "192.168.1.12", tandis que l'adresse IP source ne change pas (c'est toujours celle de mon client connecté à Internet). Enfin, le NAS réceptionne la requête en provenance d'Internet et doit la traiter, pour ensuite retourner une réponse au client situé sur Internet. Lorsque la réponse sera émise, le client distant verra toujours l'adresse IP publique de ma box, à savoir "61.61.61.61" : il ne verra jamais mon adresse IP privée.

Grâce à cet exemple, on peut voir qu'une machine connectée sur un réseau local peut être facilement rendu accessible depuis l'extérieur. Il ne faut pas oublier que cela expose directement sur Internet votre équipement (NAS, PC, Serveur, etc.) ! La première des choses à faire quand cela est possible, c'est d'utiliser un port différent du port par défaut. Par exemple, pour accéder à un NAS via un navigateur, la règle de redirection de port n'utilisera pas le port par défaut permettant d'accéder à l'interface du NAS afin qu'elle ne soit pas facilement détectable : des robots passent leur temps à scanner Internet et les adresses IP publiques à la recherche de services exposés.

## Une seule règle par port TCP/UDP

Il faut savoir qu'il ne peut y avoir qu'une seule règle par port TCP/UDP ! Autrement dit, s'il y a deux serveurs Web avec deux adresses IP privées différentes, ils ne pourront pas tous les deux être accessibles en HTTPS sur le port 443, car le port 443 en extérieur peut être associé à une seule adresse IP privée. Donc, le second serveur Web devra utiliser un autre port tel que 4443. Cette limitation s'applique par adresse IP publique, ce qui est le cas bien souvent car de nombreuses entreprises ont qu'une seule adresse IP publique (et c'est le cas aussi à la maison).

Dans ce cas, il sera nécessaire de passer par un reverse proxy (ce qui est recommandé de toute façon) pour travailler niveau HTTP/HTTPS directement et identifier le nom de domaine dans les requêtes.

## Le port mapping

Dans l'exemple précédent, le numéro de port 65001 est utilisé sur la règle de DNAT aussi bien pour le port source que pour le port de destination. Il faut savoir que ce n'est pas obligatoire d'utiliser le même numéro de port pour la source et la destination.

Le NAS sur le réseau local peut être accessible via le port 443, mais on peut décider de le rendre accessible depuis l'extérieur sur le port 65001. Dans ce cas, on parle de port mapping : c'est le même principe que le port forwarding sauf que l'on utilise deux numéros de port différents.

Il faut savoir que :

- Le port externe impacte le client connecté à Internet
    - Si l'on met le port 65001 pour une interface Web, il devra saisir https://ip-publique:65001
- Le port interne impacte le serveur / la machine de destination
    - Si l'on met le port 443, le service sur le serveur de destination devra être en écoute sur ce port, donc on ne peut pas le choisir au hasard, il faut que ce soit cohérent.

Même si le numéro de port n'est pas le même, le client ne verra pas la différence si l'on fait une correspondance 65001:65001 ou 65001:443.

# Conclusion

Suite à la lecture de ce cours, vous connaissez les différents types de NAT, mais aussi le très populaire PAT ainsi que les incontournables règles de redirection de port ! Néanmoins, vous devez rester vigilant quand vous configurez ces options sur un appareil, que ce soit un routeur, un pare-feu ou autre chose.... Car, en fonction des fabricants, les systèmes changent, et les appellations également ! Ainsi, le "SNAT" qui correspond à "Source NAT" peut correspondre à "Static NAT" (soit "NAT statique") dans certains cas : un joli piège ! Tout cela pour dire qu'il faut bien regarder les documentations constructeurs avant de mettre en oeuvre le NAT sur un appareil pour éviter les confusions et assurer le passage de la théorie à la pratique en douceur. 😉