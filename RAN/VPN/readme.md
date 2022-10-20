# Qu'est-ce qu'un VPN ?

- Qu'est-ce qu'un VPN ? A quoi ça sert ? https://youtu.be/77pUar7koNs
- Les VPN pour les débutants https://youtu.be/z0406rZQWfU
- NordVPN vous ment. (non sponsorisé) https://youtu.be/ckZGQ5cLIfs
- Qu'est ce qu'un VPN et Comment ça marche? https://youtu.be/CzWolg81Wt0
- Connecté, Protégé (VPN des neiges) https://youtu.be/2s-GZAoH67Y?list=PLP0aqyZ5GFdlBGREcooB3UZrWrTkcajV4

Un réseau privé virtuel (VPN) est un service de sécurité Internet qui permet aux utilisateurs d'accéder à Internet comme s'ils étaient connectés à un réseau privé. Il chiffre les communications Internet et fournit un fort degré d'anonymat. Certaines des raisons les plus courantes pour lesquelles les personnes utilisent des VPN sont pour se protéger contre l'espionnage sur le WiFi public, pour contourner la censure sur Internet ou pour se connecter au réseau interne d'une entreprise à des fins de travail à distance.

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/5nXXvfNxU1a1KMyFKAT0aq/590660abd79e1ee5246b6a2c28e301e0/what-is-a-vpn.png)

# Comment fonctionne un VPN ?

Normalement, la plupart du trafic Internet n'est pas chiffré et il est très public. Lorsqu'un utilisateur crée une connexion Internet, telle que la visite d'un site web à l'aide d'un navigateur, l'appareil de l'utilisateur se connecte à son fournisseur d'accès à Internet (FAI), puis le FAI se connecte à Internet pour trouver le serveur web approprié avec lequel communiquer pour récupérer le site web correspondant à la requête.

Les informations sur l'utilisateur sont exposées à chaque étape de la requête de site Web. Étant donné que l'adresse IP de l'utilisateur est exposée tout au long du processus, le FAI et tout autre intermédiaire peuvent conserver des journaux des habitudes de navigation de l'utilisateur. De plus, les données circulant entre l'appareil de l'utilisateur et le serveur web ne sont pas chiffrées. Les acteurs malveillants disposent ainsi d'opportunités pour espionner les données ou pour perpétrer des attaques contre l'utilisateur, comme une attaque sur le parcours entre dispositifs.

À l'inverse, un utilisateur se connectant à Internet à l'aide d'un service VPN a un niveau de sécurité et de confidentialité plus élevé. Une connexion VPN implique les 4 étapes suivantes :

1. Le client VPN se connecte au FAI à l'aide d'une connexion chiffrée.
2. Le FAI connecte le client VPN au serveur VPN, en maintenant la connexion chiffrée.
3. Le serveur VPN déchiffre les données de l'appareil de l'utilisateur, puis se connecte à Internet pour accéder au serveur web dans une communication non chiffrée.
4. Le serveur VPN crée une connexion chiffrée avec le client, connue sous le nom de « tunnel VPN ».

Le tunnel VPN entre le client VPN et le serveur VPN passe par le FAI, mais comme toutes les données sont chiffrées, le FAI ne peut pas voir l'activité de l'utilisateur. Les communications du serveur VPN avec Internet ne sont pas chiffrées, mais les serveurs web n'enregistrent que l'adresse IP du serveur VPN, ce qui ne leur donne aucune information sur l'utilisateur.

# Un VPN est-il réservé aux personnes ayant quelque chose à cacher ?

Comme avec d'autres services de confidentialité sur Internet, les VPN sont parfois classés comme des outils permettant une activité illégale ou subversive. La vérité est qu'il existe un certain nombre de raisons valides et légitimes d'utiliser un VPN. Voici quelques-uns des plus courantes :

- Protection sur le WiFi public - Les utilisateurs qui se connectent aux réseaux WiFi publics sans VPN s'exposent à des risques. Leur trafic Internet n'est pas chiffré et les autres utilisateurs du même réseau peuvent surveiller leur activité à l'aide d'outils facilement accessibles. Il s'agit d'un moyen courant pour les attaquants de voler les informations de connexion et autres informations sensibles. Si un utilisateur est connecté via un VPN, un attaquant en train d'espionner ne pourra voir que les données chiffrées qui ne révéleront aucune information sensible.
- Travail à distance - De nombreuses entreprises permettent à leurs employés de travailler à distance à l'aide d'un VPN. Il permet à l'employé distant d'avoir accès au réseau interne de l'entreprise et fournit un chiffrement pour protéger l'entreprise contre les attaquants ou l'espionnage.
- Contournement de la censure dans les États oppressifs - Dans certaines parties du monde, il est interdit d'exprimer ou même de lire des critiques sur le gouvernement. Beaucoup de ces États fournissent également à leurs citoyens une version expurgée d'Internet qui bloque des quantités importantes de domaines. Les personnes accédant à Internet dans ces États peuvent utiliser un VPN pour accéder au contenu que leur État veut bloquer et parler librement en ligne, car le chiffrement VPN protège leur activité de la surveillance de l'État.
- Anonymat de l'emplacement - Certains services web restreignent ou filtrent le contenu en fonction de l'emplacement de l'utilisateur. Un VPN peut être utilisé pour anonymiser l'emplacement d'un utilisateur et contourner ces restrictions.
- Le droit à la confidentialité en ligne - Les FAI sont connus pour vendre les données privées de leurs utilisateurs. De même, certains sites web vendront des informations sur leurs visiteurs. La confidentialité offerte par les services VPN permet aux consommateurs de refuser la collecte de leurs données.

# Quels sont les inconvénients d'un VPN ?

Un service VPN ne garantit pas un niveau de sécurité accru. Les utilisateurs ne peuvent se sentir en sécurité avec un VPN que s'ils font confiance au fournisseur VPN. Un fournisseur VPN malhonnête pourrait vendre les informations de ses utilisateurs ou ne pas les protéger contre les attaques. Il convient également de noter que la plupart des services VPN ont un coût mensuel récurrent. Certains utilisateurs VPN peuvent également rencontrer des problèmes de performances.

# Comment un VPN affecte-t-il les performances ?

Certains utilisateurs connaîtront une dégradation des performances d'un VPN. Cela dépend en grande partie du service VPN qu'ils utilisent. Tous les VPN n'ont pas été créés égaux, et si un service VPN n'a pas une capacité de serveur suffisante pour gérer la charge créée par ses utilisateurs, ces derniers connaîtront un ralentissement de leur connexion Internet. De plus, si un VPN est situé à une grande distance de l'utilisateur et du serveur web auquel il tente d'accéder, le temps de trajet qui en résulte peut créer une latence. Par exemple, si un utilisateur à San Francisco accède à un site web dont les serveurs sont également à San Francisco, mais que le service VPN de cet utilisateur est situé à Tokyo, la requête de l'utilisateur devra parcourir la moitié du monde et revenir avant de se connecter à un serveur situé à quelques kilomètres de là. C'est ce qu'on appelle parfois l'effet trombone.

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/pOR90LwZQxBScwmziMQKW/ab93188ce65703748d3a64681de47889/trombone-effect-01.png)
