# Qu'est-ce que le DNS ?

- Comprendre le DNS en 5 minutes : https://youtu.be/qzWdzAvfBoo
- Le DNS pour les débutants : https://youtu.be/tyDxzzdKnsU

Le DNS (Domain Name System, système de nom de domaine) est en quelque sorte le répertoire téléphonique d'Internet. Les internautes accèdent aux informations en ligne via des noms de domaine (par exemple, nytimes.com ou espn.com), tandis que les navigateurs interagissent par le biais d'adresses IP (Internet Protocol, protocole Internet). Le DNS traduit les noms de domaine en adresses IP afin que les navigateurs puissent charger les ressources web.

Chaque appareil connecté à Internet dispose d'une adresse IP unique que les autres appareils utilisent afin de le trouver. Grâce aux serveurs DNS, les internautes n'ont pas à mémoriser les adresses IP (par exemple, 192.168.1.1 en IPv4) ni les adresses IP alphanumériques plus récentes et plus complexes (par exemple, 2400:cb00:2048:1::c629:d7a2 en IPv6).

![](https://www.cloudflare.com/img/learning/dns/what-is-dns/theinternet-dns.svg)

# Comment fonctionne le DNS ?

Le processus de résolution DNS implique la conversion d'un nom d'hôte (par exemple, www.exemple.com) en adresse IP « au format informatique » (par exemple, 192.168.1.1). Chaque appareil relié à Internet se voit attribuer une telle adresse. Cette dernière permet de trouver l'appareil approprié sur Internet, de la même manière qu'une adresse dans une rue permet de trouver un domicile. Lorsqu'un utilisateur souhaite charger une page web, une traduction doit intervenir entre l'adresse que l'utilisateur saisit dans son navigateur (exemple.com) et l'adresse utilisable par la machine, nécessaire pour localiser la page web exemple.com.

Afin de comprendre le processus à l'œuvre derrière la résolution DNS, il est important de connaitre les différents composants physiques par lesquels une requête DNS doit passer. Du point de vue du navigateur, la recherche DNS s'effectue « en arrière-plan » et ne nécessite aucune interaction de l'ordinateur de l'utilisateur en dehors de la demande initiale.

# Quatre serveurs DNS sont impliqués dans le chargement d'une page web

- Récurseur DNS : le récurseur peut être considéré comme un bibliothécaire à qui l'on demande d'aller chercher un livre particulier quelque part dans une bibliothèque. Il s'agit d'un serveur conçu pour recevoir les requêtes des ordinateurs client par l'intermédiaire d'applications, telles que les navigateurs web. Généralement, le récurseur se charge ensuite d'effectuer les demandes supplémentaires nécessaires à la résolution de la requête DNS du client.
- Serveur de noms racine : le serveur racine constitue la première étape de la traduction (résolution) des noms d'hôtes lisibles par l'humain en adresses IP. Il s'agit en quelque sorte du catalogue d'une bibliothèque : il renvoie vers les différents rayonnages de livres et sert généralement de référence pour trouver d'autres emplacements plus spécifiques.
- Serveur de noms TLD : le serveur de domaine de premier niveau (TLD, top level domain) peut être considéré comme un rayonnage spécifique au sein d'une bibliothèque. Étape suivante dans la recherche d'une adresse IP spécifique, ce serveur de noms héberge la dernière partie d'un nom d'hôte (dans « exemple.com », le serveur TLD est ainsi « .com »).
- Serveur de noms de référence : ce dernier serveur de noms peut être considéré comme un dictionnaire situé sur un rayonnage. Il rend possible la traduction d'un nom spécifique sous forme d'une définition. Le serveur de noms de référence constitue la dernière étape d'une requête effectuée au serveur de noms. Si le serveur de noms de référence a accès à l'enregistrement demandé, il renvoie l'adresse IP du nom d'hôte demandé au récurseur DNS (le bibliothécaire) qui a effectué la requête initiale.

# Quelles sont les étapes d'une recherche DNS ?

Dans la plupart des situations, le DNS se charge de la traduction d'un nom de domaine afin d'aboutir à l'adresse IP appropriée. Pour comprendre le fonctionnement de cette opération, il peut s'avérer utile de suivre le parcours d'une recherche DNS, depuis son émission dans le navigateur web jusqu'à son traitement par le processus de recherche DNS lui-même, avant de revenir à son origine dans le sens inverse. Examinons les différentes étapes.

Remarque : les informations d'une recherche DNS sont souvent mises en cache localement, dans l'ordinateur à l'origine de la requête ou à distance au sein de l'infrastructure DNS. Une recherche DNS se compose généralement de 8 étapes. Lorsque les informations DNS sont mises en cache, le processus de recherche DNS ignore certaines étapes, accélérant d'autant son traitement. L'exemple ci-dessous décrit l'ensemble des 8 étapes en l'absence d'informations mises en cache.

Les 8 étapes d'une recherche DNS :

1. Un utilisateur saisit « exemple.com » dans un navigateur web. La requête est acheminée via Internet et reçue par un résolveur DNS récursif.
2. Le résolveur interroge alors un serveur de noms racine DNS (.).
3. Ce dernier répond au résolveur avec l'adresse d'un serveur DNS de domaine de premier niveau (TLD) (comme « .com » ou .net) sur lequel sont conservées les informations relatives à ses domaines. Ainsi, lors d'une recherche portant sur « exemple.com », la requête est dirigée vers le TLD « .com ».
4. Le résolveur émet ensuite une requête vers le TLD « .com ».
5. Le serveur TLD répond alors avec l'adresse IP du serveur de noms de domaine : « exemple.com ».
6. Enfin, le résolveur récursif envoie une requête au serveur de noms de domaine.
7. Le serveur de noms de domaine renvoie ensuite l'adresse IP du site exemple.com vers le résolveur.
8. Le résolveur DNS répond alors au navigateur web avec l'adresse IP du domaine initialement demandé.

Une fois que les 8 étapes de la recherche DNS ont renvoyé l'adresse IP d'exemple.com, le navigateur peut émettre la requête à la page web :
    
9. Le navigateur envoie une requête HTTP à l'adresse IP.
10. Le serveur situé à cette adresse IP renvoie la page web à afficher dans le navigateur (étape 10).

![](https://www.cloudflare.com/img/learning/dns/what-is-dns/dns-lookup-diagram.png)

# Qu'est-ce qu'un résolveur DNS ?

Chargé de communiquer avec le client à l'origine de la requête initiale, le résolveur DNS constitue le premier arrêt lors du processus de recherche DNS. Il démarre la séquence de requêtes qui conduira finalement à la traduction de l'URL afin d'obtenir l'adresse IP requise.

Remarque : en règle générale, une recherche DNS non mise en cache impliquera à la fois des requêtes récursives et itératives.

Il est important de comprendre la différence entre une requête DNS récursive et un résolveur DNS récursif. La requête désigne la demande adressée à un résolveur DNS afin de solliciter la résolution de cette dernière. Le résolveur DNS récursif se rapporte à l'ordinateur qui accepte une requête récursive et traite la réponse en effectuant les requêtes nécessaires.

![](https://www.cloudflare.com/img/learning/dns/what-is-dns/dns-recursive-query.png)

# Quels sont les types de requêtes DNS ?

Une recherche DNS typique génère trois types de requêtes. Grâce à l'utilisation conjointe de ces dernières, l'optimisation du processus de résolution DNS peut déboucher sur une réduction de la distance parcourue. Idéalement, le processus peut disposer de données d'enregistrement mises en cache afin de permettre au serveur de noms DNS de renvoyer une requête non récursive.

3 types de requêtes DNS :

1. Requête récursive : dans une requête récursive, un client DNS demande à un serveur DNS (généralement un résolveur DNS récursif) de répondre au client soit en renvoyant l'enregistrement de la ressource demandée, soit par un message d'erreur s'il ne parvient pas à trouver l'enregistrement.
2. Requête itérative : dans cette situation, le client DNS permet au serveur DNS de renvoyer la meilleure réponse possible. Si le serveur DNS interrogé ne trouve pas de correspondance pour le nom de la requête, il renvoie une recommandation vers un serveur DNS de référence situé à un niveau plus bas de l'espace de noms du domaine. Le client DNS émet alors une requête vers l'adresse recommandée. Le processus continue à interroger d'autres serveurs DNS le long de la chaîne de requête jusqu'à ce qu'une erreur se produise ou que le délai expire (timeout).
3. Requête non récursive : ce type de requête est généralement émis lorsqu'un client résolveur DNS interroge un serveur DNS sur un enregistrement auquel il a accès soit parce qu'il s'agit du serveur de référence pour cet enregistrement, soit parce que l'enregistrement existe dans son cache. En règle générale, un serveur DNS met en cache les enregistrements DNS afin d'éviter une consommation de bande passante supplémentaire et une surcharge des serveurs en amont.

# Qu'est-ce que la mise en cache DNS ? Où intervient-elle ?

L'objectif de la mise en cache consiste à stocker de manière temporaire les données à un emplacement afin d'améliorer les performances et la fiabilité des requêtes de données. La mise en cache DNS implique le stockage des données plus près du client demandeur afin d'accélérer le processus de résolution DNS et d'éviter les requêtes supplémentaires au sein de la chaîne de recherche DNS. Cette opération permet ainsi d'améliorer les temps de chargement et de réduire la consommation de bande passante/ressources processeur. Les données DNS peuvent être mises en cache à divers endroits, chacun stockant des enregistrements DNS pendant un laps de temps déterminé par une TTL (Time to live, durée de vie).

## Mise en cache DNS du navigateur

Les navigateurs web modernes sont conçus par défaut pour mettre en cache les enregistrements DNS pendant une durée définie. L'objectif de l'opération est évident : plus la mise en cache DNS est réalisée à proximité du navigateur web, moins d'étapes de traitement seront nécessaires pour vérifier le cache et effectuer les requêtes correctes à une adresse IP donnée. Lorsqu'une requête d'enregistrement DNS est émise, le cache du navigateur constitue ainsi le premier emplacement à être vérifié pour trouver l'enregistrement demandé.

Dans Chrome, vous pouvez consulter l'état de votre cache DNS en vous rendant à l'adresse suivante : chrome://net-internals/#dns.

## Mise en cache DNS au niveau du système d'exploitation

Le résolveur DNS au niveau du système d'exploitation constitue le deuxième et dernier arrêt au niveau local avant qu'une requête DNS ne quitte votre ordinateur. Le processus conçu pour traiter cette requête au sein de votre système d'exploitation est communément appelé « résolveur stub » ou client DNS. Lorsqu'un résolveur stub reçoit une requête d'une application, il vérifie d'abord son propre cache pour voir si l'enregistrement s'y trouve. Si ce dernier n'y figure pas, le résolveur envoie ensuite une requête DNS (avec un indicateur récursif activé) à l'extérieur du réseau local, vers un résolveur récursif DNS dépendant du fournisseur d'accès Internet (FAI).

Comme à toutes les étapes précédentes, lorsqu'un résolveur récursif dépendant d'un FAI reçoit une requête DNS, il vérifie de même si la traduction de l'« adresse hôte en adresse IP » demandée est déjà stockée dans sa couche de persistance locale.

Le résolveur récursif dispose également de fonctionnalités supplémentaires selon le type d'enregistrements présents dans son cache :

1. Si le résolveur ne contient pas les enregistrements A, mais qu'il dispose des enregistrements NS pour les serveurs de noms de référence, il interrogera ces serveurs de noms directement, en contournant plusieurs étapes de la requête DNS. Ce raccourci empêche les recherches à partir des serveurs de noms racine et « .com » (dans notre recherche portant sur « exemple.com ») et permet de résoudre plus rapidement les requêtes DNS.
2. Si le résolveur ne contient pas d'enregistrements NS, il envoie une requête aux serveurs TLD (« .com » dans le cas présent) en contournant le serveur racine.
3. Dans l'éventualité peu probable où le résolveur ne contient pas d'enregistrements pointant vers les serveurs TLD, il interroge alors les serveurs racines. Ce cas de figure se produit généralement après la purge d'un cache DNS.
