# Qu’est-ce qu’une adresse IP, et comment ça marche ?

![](https://academy.avast.com/hubfs/New_Avast_Academy/What%20is%20an%20IP%20Address/What_is_an_IP_Address-Hero-1.jpg)

- Obtenez rapidement votre adresse IP : http://www.mon-ip.com/
- Les adresses IP pour les débutants : https://youtu.be/_JuY79L8_qA
- Réseaux : adresse IP et masques de sous-réseaux : https://youtu.be/RnpSaDSSjR4
- Différence IPv4 et IPv6 : https://youtu.be/ZWBItZBRQn4

Le terme « Adresse IP » désigne une « adresse de protocole Internet ». Le protocole Internet est un ensemble de règles qui régissent la communication sur Internet, qu'il s'agisse d'envoyer des messages, de diffuser des vidéos ou de se connecter à un site Web. Une adresse IP identifie un réseau ou un appareil sur Internet.

Les appareils ont besoin d'un moyen de s'identifier pour se connecter. Les protocoles Internet gèrent le processus d'attribution d'une adresse IP unique à chaque appareil. (Les protocoles Internet ont également d'autres utilités : ils acheminent le trafic Internet par exemple.) Ainsi, il est facile de voir quels sont les appareils sur Internet qui envoient, demandent et reçoivent des informations, et la nature de ces dernières.

Chaque périphérique connecté à Internet possède une adresse IP. Les adresses IP sont comme des numéros de téléphone et ont le même objectif. Lorsque vous contactez quelqu'un, votre numéro de téléphone vous identifie et garantit à la personne qui répond au téléphone que vous êtes bien celui que vous prétendez être. Les adresses IP font exactement la même chose lorsque vous êtes en ligne.

Il existe deux types d'adresses IP : IPv4 et IPv6. Il est facile de faire la différence entre les deux si vous comptez les chiffres qui composent l'adresse. Les adresses IPv4 contiennent une suite de quatre chiffres, allant de 0 (sauf le premier) à 255, chacun séparé du suivant par un point, par exemple, 5.62.42.77. Les adresses IPv6 se composent de huit groupes de quatre chiffres hexadécimaux séparés par des signes deux-points. Une adresse IPv6 classique ressemble à ceci : 2620:0aba2:0d01:2042:0100:8c4d:d370:72b4.

# Les différentes parties de votre adresse IP

Une adresse IP se compose de deux parties : l'ID de réseau, composé des trois premiers chiffres de l'adresse, et un ID d'hôte, le quatrième chiffre de l'adresse. Ainsi, sur votre réseau domestique (qui est peut-être le 192.168.1.1), les chiffres 192.168.1 correspondent à l'ID du réseau et les derniers .1, .2, .3, et ainsi de suite désignent l'ID de l'hôte. L'ID de réseau est exactement ce que son nom indique : l'identité du réseau sur lequel l'appareil est connecté. L'ID d'hôte fait référence à l'appareil spécifique sur ce réseau. (Habituellement, votre routeur est le .1, et chaque appareil suivant se voit attribuer les numéros .2, .3, etc.)

En raison de cette spécificité de l'appareil, il est possible de cacher votre adresse IP du monde extérieur grâce à un réseau privé virtuel (VPN). Lorsque vous utilisez un VPN (réseau privé virtuel), il évite que le réseau externe ne révèle votre adresse.

IPv4 remonte au début des années 80, l'époque où Internet était un réseau privé destiné aux militaires. IPv4 possède un pool total de 4,3 milliards d'adresses, ce qui semble beaucoup. Mais avec tous les ordinateurs, smartphones et tablettes qui se connectent à Internet, sans parler des appareils IoT, nous sommes à court d'adresses IPv4. En fait, nous avons commencé à en manquer dans les années 1990. Des astuces de réseautage technique très intelligentes ont assuré la continuité du système.

L'Internet Engineering Task Force (IETF), qui conçoit les technologies de base d'Internet, a créé IPv6 il y a une dizaine d'années. Il a un potentiel de 340 undécillion d'adresses (le nombre 340 suivi de 36 zéros), ce qui signifie qu'en théorie, nous ne manquerons jamais d'adresses. Il remplace lentement IPv4, mais dans l'immédiat, les deux coexistent.

# Adresses IP locales et adresses IP publiques

![](https://academy.avast.com/hs-fs/hubfs/New_Avast_Academy/Public%20vs.%20local%20IP%20addresses%20(Academy)/Public-vs-local-IP-addresses-01.png?width=1350&name=Public-vs-local-IP-addresses-01.png)

Il existe deux types d'adresses IP : les adresses IP externes, ou publiques, et les adresses IP internes, également appelées adresses locales ou privées. Votre fournisseur de services Internet (FAI) (l'entreprise à qui vous payez votre accès en ligne) vous donne l'adresse externe. Lorsque vous naviguez sur le Web, le site récepteur doit savoir qui s'y connecte (pour des raisons de surveillance du trafic), et votre adresse IP externe est la façon dont votre FAI vous présente sur le site.

En revanche, vous disposez d'une adresse IP différente à des fins internes, telles que l'identification de vos appareils dans un réseau domestique ou dans un bureau professionnel. L'adresse IP locale ou interne est attribuée à votre ordinateur par le routeur, le matériel qui assure la connexion d'un réseau local à Internet. Dans la plupart des cas, cette adresse IP interne est attribuée automatiquement par le routeur (ou le modem câble). 

Ce qu'il y a à savoir : Selon toute vraisemblance, vous disposez en interne d'une adresse IP différente de celle que vous utilisez sur l'Internet public. Votre adresse IP locale représente votre appareil sur son réseau et votre adresse IP publique est le visage que présente votre réseau sur Internet dans son ensemble.

![](https://academy.avast.com/hs-fs/hubfs/New_Avast_Academy/What%20is%20an%20IP%20Address/Avast-IP-Addresses-FR.png?width=870&name=Avast-IP-Addresses-FR.png)

## Plages d’adresses IP publiques et privées

Votre adresse IP privée est comprise dans une plage d’adresses spécifique réservée par l’IANA (Internet Assigned Numbers Authority) et ne doit jamais être visible sur Internet. Il existe des millions de réseaux privés dans le monde. Tous les appareils qui y sont connectés possèdent une adresse IP privée comprise dans les plages suivantes :

- Classe A : 10.0.0.0 — 10.255.255.255
- Classe B : 172.16.0.0 — 172.31.255.255 
- Classe C : 192.168.0.0 — 192.168.255.255 

Ces plages peuvent vous paraître assez limitées, mais il n’y a aucune raison qu’elles soient plus étendues. En effet, ces adresses IP étant réservées uniquement pour les réseaux privés, elles peuvent être réutilisées sur différents réseaux privés de par le monde, sans que cela ne pose le moindre problème. 

Et ne vous étonnez pas si un ou deux appareils de votre réseau domestique ont une adresse IP privée commençant par 192.168. Il s’agit du format par défaut le plus courant attribué aux routeurs réseau.

Sans surprise, la plage d’adresses IP publiques comprend tous les numéros qui ne sont pas réservés pour la plage d’adresses IP privées. Puisqu’une adresse IP publique est un identifiant unique affecté à chaque appareil connecté à Internet, tout ce qu’on lui demande, c’est d’être unique.

# Comment fonctionnent les adresses IP ?

Le bureau de poste utilise votre adresse physique comme marqueur de l'emplacement réel d'une personne, d'une résidence ou d'une entreprise. C'est ainsi que le courrier est acheminé. C'est là que vous résidez. C'est ainsi que les autres savent où vous trouver.

Toutes ces descriptions s'appliquent à une adresse IP, mais au niveau numérique. Une adresse IP est l'endroit où réside un ordinateur au sens virtuel, elle ne donne pas des coordonnées GPS. L'adresse IP peut identifier votre propre ordinateur, un site Web préféré, un serveur réseau ou même un appareil (comme une webcam).

Les adresses IP sont particulièrement importantes pour l'envoi et la réception d'informations. Elles acheminent le trafic Internet vers sa destination et orientent les e-mails vers votre boîte de réception.

L'aspect important à retenir est le suivant : Chaque appareil actif sur Internet a une adresse IP.

![](https://academy.avast.com/hs-fs/hubfs/New_Avast_Academy/What%20is%20an%20IP%20Address/IP-Addresses.png?width=996&name=IP-Addresses.png)

# Tout d'abord, TCP/IP...

Les adresses IP ne sont qu'une partie de l'architecture d'Internet. Après tout, posséder une adresse postale pour votre domicile n'a de sens que s'il existe un bureau de poste en charge de distribuer le courrier. En termes Internet, IP est une partie de TCP/IP.

Le protocole TCP/IP (Transmission Control Protocol/Internet Protocol) est un ensemble de règles et de procédures permettant de connecter des appareils via Internet. TCP/IP indique comment les données sont échangées : Les données sont divisées en paquets et transmises le long d'une chaîne de routeurs depuis l'origine vers leur destination. Il s'agit de la base fondamentale de la connectivité Internet.

TCP définit la façon dont les applications communiquent sur le réseau. Il gère la façon dont un message est divisé en une suite de petits paquets, qui sont ensuite transmis sur Internet, puis réassemblés dans le bon ordre à l'adresse de destination.

La partie IP du protocole définit comment adresser et diriger chaque paquet pour s'assurer qu'il atteint la bonne destination. Chaque ordinateur passerelle du réseau vérifie cette adresse IP pour déterminer où transmettre le message.

# Comment les adresses IP sont attribuées : dynamique vs statique

Les adresses IP peuvent être permanentes (statiques) ou provisoires (dynamiques). La différence entre une adresse IP statique et une adresse IP dynamique est que la première ne change jamais, alors que la seconde peut changer, et ne s'en prive pas.

Les adresses statiques sont principalement utilisées par les entreprises, car leurs sites Web et applications Web doivent être accessibles de manière fiable en permanence.

En revanche, votre adresse IP personnelle n'a pas à rester la même, car elle n'est nécessaire que lorsque vous utilisez Internet. Dans quasiment tous les cas, votre fournisseur d'accès à Internet définit pour vous une adresse IP dynamique. Bien que votre adresse IP ne change probablement pas souvent, il est possible d'en recevoir une nouvelle de la part de votre FAI à chaque redémarrage de votre ordinateur. Il en va de même avec les routeurs sans fil à domicile pour votre ordinateur portable, votre tablette ou votre smartphone. Les appareils peuvent obtenir une nouvelle adresse à chaque redémarrage de votre routeur.

Le seul véritable inconvénient des adresses dynamiques est qu'un ordinateur donné ne peut pas être trouvé de manière fiable. Cela rend difficile, par exemple, la gestion d'un serveur Web chez vous, car l'adresse peut changer et personne ne pourra vous trouver. De nombreux FAI vous permettent de prendre des dispositions pour une connexion professionnelle avec une adresse statique si vous souhaitez exécuter un serveur.

# À quoi sert une adresse IP ?

Le but d'une adresse IP est de gérer la connexion entre un appareil et un site de destination. L'adresse IP identifie de manière unique chaque appareil sur Internet. Sans elle, il n'y a aucun moyen de les contacter. Les adresses IP permettent aux appareils informatiques (tels que les PC et les tablettes) de communiquer avec des destinations telles que les sites Web et les services de streaming, et ils permettent aux sites Web de savoir qui se connecte.

Une adresse IP sert également d'adresse de retour, au même sens qu'une adresse de retour sur courrier postal. Lorsque vous postez une lettre et qu'elle est livrée à la mauvaise adresse, vous récupérez la lettre si vous incluez une adresse de retour sur l'enveloppe. Il en va de même pour le courrier électronique. Lorsque vous écrivez à un destinataire non valide (par exemple, un correspondant qui a quitté son entreprise), votre adresse IP permet au serveur de messagerie de l'entreprise de vous envoyer un e-mail de renvoi indiquant que la destination est introuvable.

# Quelle est la différence entre les protocoles IPv4 et IPv6 ?
## Pv4 : un bref historique

Avant d'aborder le sujet des différences entre les deux protocoles d'adresse IP, qu'est-ce qu'IPv 4 ? Une adresse IP est une suite de chiffres attribuée à un appareil pour l'identifier sur Internet. Il s'agit d'une adresse, au même titre que le numéro et le nom de la rue de votre maison sont une adresse. Votre adresse personnelle est utilisée pour vous envoyer du courrier. Votre adresse IP, elle, est utilisée pour envoyer les paquets de données que vous demandez.

Le protocole Internet version 4, généralement appelé IPv4, a été développé au début des années 1980. Une adresse IPv4 comprend quatre chiffres, chacun compris entre 0 et 255, séparés par des points. Par exemple, l'adresse IP d'Avast est 5.62.42.77. Il y a plus à dire sur les adresses IP et cela permet également de connaître les notions de base du TCP/IP, mais ce sont les bases.

Chaque site Web a une adresse IP. Mais le plus souvent, nous ne l'utilisons plus. Au début d'Internet, il était indispensable de connaître l'adresse IP d'un site Web pour y accéder. Ensuite, le DNS (Domain Name Service) est arrivé. Il permet de traduire les nombres en noms. Ainsi, lorsque vous saisissez « www.avast.com », le DNS le traduit en 5.62.42.77. C'est bien plus pratique pour naviguer sur le Web, car il est bien plus facile de se souvenir du nom d'un site Web que de son adresse IP.

## Avons-nous épuisé les quantités d'adresses IPv4 disponibles ?

IPv4 a une limite théorique de 4,3 milliards d'adresses, et en 1980, c'était plus que suffisant. Mais au fur et à mesure qu'Internet se développait et se mondialisait, nous avons rapidement manqué d'adresses, en particulier à l'ère actuelle des smartphones et des appareils IoT.

Internet a commencé à manquer d'adresses IPv4 dans les années 1990. Des ingénieurs malins ont certes trouvé des moyens de contourner le problème, mais il n'a pas fallu longtemps pour que l'objectif soit une solution pérenne. Développé pour résoudre définitivement ces problèmes de capacité, IPv6 est devenu nécessaire lorsque IPv4 ne pouvait plus supporter la charge.

À l'heure actuelle, IPv4 coexiste sur Internet avec sa nouvelle version, bien qu'à terme, tous les systèmes devraient utiliser IPv6. Le remplacement de l'ancien équipement IPv4 serait extrêmement coûteux et problématique. Ainsi, le protocole IPv6 est déployé lentement, au fur et à mesure que l'ancien matériel IPv4 est retiré.

## IPV6 : l'avenir du Web ?

Le protocole Internet version 6, ou IPv6, a été présenté pour la première fois à la fin des années 1990, en remplacement d'IPv4. Les constructeurs d'Internet s'étaient rendu compte des limites d'IPv4 et des risques de pénurie.

IPv6 utilise des adresses de 128 bits, ce qui, en théorie, donne 340,282,366,920,938,463,463,374,607,431,768,211,456 ou 340 undécillions d'adresses. Les adresses IPv6 se composent de huit groupes de quatre chiffres hexadécimaux, chaque groupe étant séparé du suivant par des signes deux-points. Voici un exemple : « 2002:0de6:0001:0042:0100:8c2e:0370:7234 ». Il existe cependant des méthodes pour abréger cette notation complète.

En plus d'augmenter l'offre d'adresses IP, le protocole IPv6 a également corrigé de nombreuses lacunes d'IPv4, dont la principale, la sécurité, que nous approfondirons plus tard.

## IPv4 contre IPv6

Outre un nombre plus élevé d'adresses IP, l'avènement d'IPv6 a apporté davantage de fonctions. Par exemple, IPv6 prend en charge l'adressage multidiffusion, qui permet d'envoyer des flux de paquets gourmands en bande passante (tels que des flux multimédias) simultanément vers plusieurs destinations, ce qui réduit la bande passante du réseau. Mais IPv6 est-il meilleur qu'IPv4 ? Voyons cela.

IPv6 possède une nouvelle fonctionnalité appelée autoconfiguration, qui permet à un appareil de générer une adresse IPv6 dès qu'il se met sous tension et en réseau. L'appareil commence par rechercher un routeur IPv6. S'il en trouve un, l'appareil peut générer une adresse locale et une adresse routable à l'échelle mondiale, ouvrant l'accès à un Internet plus large. Dans les réseaux IPv4, le processus d'ajout de périphériques doit souvent être effectué manuellement.

IPv6 permet aux appareils de rester connectés à plusieurs réseaux simultanément. Cela est dû aux capacités d'interopérabilité et de configuration qui permettent au matériel d'attribuer automatiquement plusieurs adresses IP à un même appareil.

![](https://academy.avast.com/hs-fs/hubfs/New_Avast_Academy/IPv4%20vs.%20IPv6%20What%E2%80%99s%20the%20Difference/IPv4-vs-IPv6-FR.png?width=990&name=IPv4-vs-IPv6-FR.png)

Examinons ensuite les différences entre IPv4 et IPv6 à travers le prisme de la vitesse et de la sécurité.

## IPv4 et IPv6 : Comparaison des vitesses

Quelles sont les différences entre IPv4 et IPv6 en termes de vitesse ? Le blog de sécurité Sucuri a effectué une série de tests qui ont permis de constater qu'en cas de connexion directe, IPv4 et IPv6 offraient la même vitesse. Il est même arrivé qu'IPv4 gagne le test.

En principe, IPv6 devrait être légèrement plus rapide, car les cycles n'ont pas à passer par la traduction NAT. Mais IPv6 manipule également des paquets plus gros, ce qui peut le ralentir dans certains cas d'utilisation. Ce qui fait vraiment la différence à ce stade, c'est que les réseaux IPv4 sont matures et donc hautement optimisés, davantage que les réseaux IPv6. Ainsi, avec du temps et des réglages, les réseaux IPv6 gagneront en vitesse.

## IPv4 et IPv6 : Comparaison de la sécurité

IPv6 a été conçu pour fournir davantage de sécurité. IP Security (IPSec) est une suite de protocoles de sécurité, d'authentification et d'intégrité des données totalement intégrée à IPv6. Le fait est qu'IPSec peut également être entièrement intégré à IPv4. Il appartient aux FAI de le mettre en œuvre et toutes les entreprises ne le font pas.

IPv6 est conçu pour un chiffrement de bout en bout, donc, en théorie, l'adoption généralisée d'IPv6 rendra les attaques de l'homme du milieu beaucoup plus difficiles.

IPv6 prend également en charge la résolution de noms plus sécurisée. Le protocole Secure Neighbour Discovery (SEND) ajoute une extension de sécurité au Neighbour Discovery Protocol (NDP) qui gère la détection d'autres nœuds de réseau sur une liaison locale. Par défaut, NDP n'est pas sécurisé, il peut donc être sensible aux interceptions malveillantes. SEND sécurise NDP avec une méthode cryptographique indépendante d'IPsec.

Grâce à IPSec natif, IPv6 fournit deux en-têtes de sécurité qui peuvent être utilisés séparément ou ensemble : Authentication Header (En-tête d'authentification, AH) et Encapsulating Security Payload (Encapsulation de la charge utile de sécurité, ESP). Authentication Header fournit une authentification de l'origine des données et une protection contre les attaques par rejeu, et ESP offre l'intégrité sans connexion, l'authentification de l'origine des données, une protection contre les attaques par rejeu et une confidentialité limitée du flux de trafic, ainsi que la confidentialité via le chiffrement de la charge utile. IPv4 peut également bénéficier de cette protection si IPSec est implémenté sur le réseau.

IPv4 a été mis à jour au fil des ans, de sorte que la différence entre la sécurité IPv4 et IPv6 n'est pas extraordinaire. IPSec dans IPv6 est également disponible pour IPv4 ; il appartient aux fournisseurs de réseau et aux utilisateurs finaux de l'adopter et de l'utiliser. Ainsi, un réseau IPv4 correctement configuré peut être aussi sûr qu'un réseau IPv6.

# Adresse IP de sécurité

Vous devez protéger votre adresse IP pour les mêmes raisons que celles pour lesquelles vous souhaitez protéger l'adresse de votre domicile. Des criminels peuvent tenter de profiter de vous pour diverses raisons. Ils pourraient :

- Utiliser les identifiants de votre adresse IP pour télécharger du contenu illégal : Les pirates peuvent télécharger des films, de la musique et d'autres contenus, et se faire passer pour vous afin que vous puissiez avoir des problèmes avec votre FAI pour quelque chose que vous n'avez pas fait.
- Retrouver l'adresse de votre domicile : Il est possible de tracer une adresse IP jusqu'à une adresse réelle, ce qui vous expose à un danger physique potentiel ou à un vol lorsque vous n'êtes pas chez vous. Les experts en sécurité conseillent depuis longtemps aux utilisateurs de ne jamais dire sur les réseaux sociaux s'ils sont en vacances, car les criminels savent ainsi que vous n'êtes pas chez vous. Il est judicieux de suivre ce conseil pour des raisons de confidentialité.
- Espionner votre trafic Internet privé : Vos données personnelles sensibles, notamment les informations financières, peuvent être menacées lorsque les pirates peuvent accéder à votre trafic IP.
- Vous attaquer directement : De nombreux outils circulent parmi les cybercriminels qui permettent de lancer différentes agressions, en particulier des attaques DDoS (déni de service distribué) qui font en sorte qu'un site soit submergé de trafic et ferme. Pensez à ajouter des outils de confidentialité à votre ensemble d'outils en ligne, dont un qui cache votre adresse IP.

# Protéger votre adresse IP

La Consumer Technology Association recommande aux utilisateurs de prendre des mesures pour protéger leurs adresses IP, par exemple en utilisant un réseau privé virtuel (VPN) pour masquer votre adresse IP des cybercriminels qui cherchent à usurper votre identité ou à frauder.

# Comment modifier votre adresse IP : notre guide étape par étape

1. Changez d’adresse IP automatiquement avec un VPN
2. Utilisez un serveur proxy 
3. Réinitialisez votre routeur 
4. Changez d’adresse IP manuellement 

# Qu’est-ce que l’usurpation IP ?

L’usurpation d’adresse IP – ou usurpation IP – consiste à créer des paquets IP (Internet Protocol) en utilisant une fausse adresse IP source pour se faire passer pour un autre ordinateur. Une fois qu’une fausse adresse IP est considérée comme digne de confiance, les pirates informatiques peuvent obtenir des informations sensibles de l’ordinateur de la victime ou lancer une attaque en ligne.

Bien qu’elle soit souvent utilisée à des fins malveillantes, l’usurpation IP ne constitue pas en soi un cybercrime. Il existe en effet des raisons légitimes d’usurper une adresse IP. Par exemple, les entreprises en ligne utilisent souvent des adresses IP usurpées pour tester des sites Web avant de les mettre en ligne.

Mais lorsqu’elle est utilisée dans le cadre d’une attaque par usurpation IP – comme utiliser une fausse adresse IP pour pirater des serveurs afin de les fermer ou de voler des données – l’usurpation IP est considérée comme un cybercrime. Les pirates peuvent également utiliser d’autres formes d’usurpation, comme l’usurpation d’un téléphone pour recueillir des informations personnelles ou encore l’usurpation d’un site Web.
