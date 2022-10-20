# Qu'est-ce qu'un protocole réseau ?

- Ports et protocoles : comprendre l'essentiel en 5 minutes https://www.youtube.com/watch?v=YSl6bordSh8

Dans le domaine des réseaux, un protocole est un ensemble de règles permettant de formater et de traiter les données. Les protocoles de réseau sont comme un langage commun pour les ordinateurs. Les ordinateurs d'un réseau peuvent utiliser des logiciels et du matériel très différents, mais l'utilisation de protocoles leur permet de communiquer entre eux.

Les protocoles normalisés sont comme un langage commun que les ordinateurs peuvent utiliser, de la même manière que deux personnes de différentes régions du monde peuvent ne pas comprendre la langue maternelle de l'autre, mais elles peuvent communiquer en utilisant une troisième langue commune. Si un ordinateur utilise le protocole Internet (IP) et qu'un deuxième ordinateur le fait aussi, ils pourront communiquer, tout comme les Nations unies s'appuient sur leurs 6 langues officielles pour communiquer entre représentants du monde entier. Mais si un ordinateur utilise IP et que l'autre ne connaît pas ce protocole, ils ne pourront pas communiquer.

Sur Internet, il existe différents protocoles pour différents types de processus. Les protocoles sont souvent discutés en fonction de la couche du modèle OSI à laquelle ils appartiennent.

# Quelles sont les couches du modèle OSI ?

Les protocoles rendent ces fonctions de mise en réseau possibles. Par exemple, le protocole Internet (IP) est responsable de l'acheminement de données en indiquant d'où viennent paquets de données* et quelle est leur destination. L'IP rend possible les communications de réseau à réseau. Par conséquent, IP est considéré comme un protocole de la couche réseau (couche 3).

Autre exemple, le protocole de contrôle de transmission (TCP) assure le bon déroulement du transport des paquets de données sur les réseaux. Par conséquent, le TCP est considéré comme un protocole de la couche transport (couche 4).

# Quels protocoles fonctionnent sur la couche réseau ?

Comme décrit ci-dessus, IP est un protocole de la couche réseau responsable du routage. Mais ce n'est pas le seul protocole de la couche réseau.

- IPsec : Internet Protocol Security (IPsec) établit des connexions IP chiffrées et authentifiées sur un réseau privé virtuel (VPN). Techniquement, IPsec n'est pas un protocole, mais plutôt un ensemble de protocoles comprenant le protocole de sécurité d'encapsulation (ESP), l'en-tête d'authentification (AH) et les associations de sécurité (SA).
- ICMP : Le protocole de message de contrôle Internet (ICMP) signale les erreurs et fournit des mises à jour d'état. Par exemple, si un routeur n'est pas en mesure de livrer un paquet, il renvoie un message ICMP à la source du paquet.
- IGMP : Le protocole de gestion des groupes Internet (IGMP) établit des connexions réseau de type un à plusieurs. IGMP aide à mettre en place la multidiffusion, ce qui signifie que plusieurs ordinateurs peuvent recevoir des paquets de données dirigés vers une adresse IP.

# Quels autres protocoles sont utilisés sur Internet ?

Voici quelques-uns des protocoles les plus importants à connaître :

- TCP : Comme décrit ci-dessus, TCP est un protocole de couche de transport qui assure une livraison fiable des données. TCP est destiné à être utilisé avec IP, et les deux protocoles sont souvent référencés ensemble sous le nom de TCP/IP.
- HTTP : Le protocole de transfert hypertexte (HTTP) est la base du World Wide Web, l'Internet avec lequel la plupart des utilisateurs interagissent. Il est utilisé pour transférer des données entre des périphériques. HTTP appartient à la couche application (couche 7), car il met les données dans un format que les applications (par exemple, un navigateur) peuvent utiliser directement, sans autre interprétation. Les couches inférieures du modèle OSI sont gérées par le système d'exploitation d'un ordinateur, et non par les applications.
- HTTPS : Le problème avec HTTP est qu'il n'est pas chiffré - Tout attaquant qui intercepte un message HTTP peut le lire. HTTPS (HTTP Secure) corrige cela en chiffrant les messages HTTP.
- TLS/SSL : Transport Layer Security (TLS) est le protocole que HTTPS utilise pour le chiffrement. TLS s'appelait auparavant Secure Sockets Layer (SSL).
- UDP : Le protocole UDP (User Datagram Protocol) est une alternative plus rapide mais moins fiable au TCP au niveau de la couche transport. Il est souvent utilisé dans des services tels que le streaming vidéo et le gaming, où la livraison rapide des données est primordiale.

# Quels sont les protocoles utilisés par les routeurs ?

Les routeurs de réseau utilisent certains protocoles pour découvrir les chemins de réseau les plus efficaces vers d'autres routeurs. Ces protocoles ne sont pas utilisés pour transférer des données utilisateur. Les principaux protocoles de routage réseau sont les suivants :

- BGP : Le protocole BGP (Border Gateway Protocol) est un protocole de couche application que les réseaux utilisent pour diffuser les adresses IP qu'ils contrôlent. Ces informations permettent aux routeurs de décider par quels réseaux les paquets de données doivent passer pour atteindre leur destination.
- EIGRP : Le protocole EIGRP (Enhanced Interior Gateway Routing Protocol) identifie les distances entre les routeurs. EIGRP met automatiquement à jour l'enregistrement des meilleures routes de chaque routeur (appelé table de routage) et diffuse ces mises à jour aux autres routeurs du réseau.
- OSPF : Le protocole Open Shortest Path First (OSPF) calcule les itinéraires réseau les plus efficaces en fonction de divers facteurs, notamment la distance et la bande passante.
- RIP : Le Routing Information Protocol (RIP) est un ancien protocole de routage qui identifie les distances entre les routeurs. RIP est un protocole de couche d'application.

# Comment les protocoles sont-ils utilisés dans les cyberattaques ?

Comme pour tout autre aspect de l'informatique, les attaquants peuvent exploiter le fonctionnement des protocoles de réseau pour compromettre ou submerger les systèmes. Nombre de ces protocoles sont utilisés dans les attaques par déni de service distribué (DDoS). Par exemple, dans une attaque SYN flood, un attaquant tire parti du fonctionnement du protocole TCP. Il envoie des paquets SYN pour initier de manière répétée une poignée de main TCP, avec un serveur, jusqu'à ce que le serveur soit incapable de fournir un service aux utilisateurs légitimes parce que ses ressources sont bloquées par toutes les fausses connexions TCP.