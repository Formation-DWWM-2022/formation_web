# Les types de réseaux : LAN, MAN, WAN, et PAN pour les débutants 

- PAN, LAN, MAN, WAN : l'essentiel en 4 minutes https://www.youtube.com/watch?v=c0Xj09s5hYA
- Réseau : LAN, MAN, WAN et PAN pour les débutants https://www.youtube.com/watch?v=_D4bObLSyjE

Un réseau, peu importe sa taille, va permettre l'échange de données entre plusieurs machines. De ce fait, un réseau est constitué d'équipement réseau tel que les routeurs et les switchs (commutateurs), de points de terminaison tels que les ordinateurs, les smartphones, les imprimantes ou les serveurs, et d'un support qui va permettre le transport des données, c'est-à-dire un câble Ethernet, une liaison fibre optique ou encore une liaison sans-fil (Wi-Fi, Bluetooth, etc.).

Dans ce cours, je souhaitais revenir sur les différents types de réseaux qu'il faut connaître lorsque l'on s'intéresse au monde l'informatique : LAN, MAN, WAN ou encore PAN. Certains de ces acronymes vous sont peut-être familiers, tandis que d'autres non : c'est normal. Au-delà des usages, nous verrons que la grande différence entre ces types de réseau, c'est la zone géographique couverte.

# C'est quoi un réseau LAN ?

Commençons par le LAN, qui signifie Local Area Network, est ce que l'on appelle le réseau local. Plus précisément, il s'agit du réseau informatique avec une portée limitée : le réseau informatique de votre habitation ou de votre organisation. Effectivement, à la maison, le réseau où sont connectés votre box, votre ordinateur et votre smartphone, c'est un LAN. Quand vous accédez à Internet, vous sortez du LAN pour atteindre le... WAN, que nous allons découvrir ensuite. Dans le même esprit, le réseau d'une entreprise même s'il s'étend sur plusieurs bâtiments, plusieurs étages, et qu'ils connectent plusieurs dizaines ou centaines d'ordinateurs, imprimantes, etc... est un réseau de type "LAN".

Sur un réseau local, les connexions sont assurées par des câbles Ethernet (RJ45), des fibres optiques et des connexions sans-fil via le Wi-Fi. Le type de support est sélectionné en fonction des besoins et des types d'appareils à connecter (un ordinateur avec un switch, un serveur avec un switch, deux switchs entre eux, etc.).

Voici un schéma d'un réseau LAN très simple, mais finalement qui reproduit ce que vous pouvez avoir à la maison :

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-lan-01.png)

En entreprise, nous retrouvons généralement des réseaux avec un plus grand nombre d'équipements, mais on reste sur un LAN.

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-lan-02.png)

J'insiste sur le fait que, sur les schémas ci-dessous, le réseau LAN est connecté à Internet, par l'intermédiaire du routeur, mais en aucun cas Internet ne fait partie du LAN.

    Note : si vous entendez parler de "WLAN", sachez que c'est toujours pour désigner votre réseau local, mais au travers d'une connexion sans-fil puisque le "W" signifie "Wireless". On parle alors de réseau local sans-fil.

# C'est quoi un réseau MAN ?

MAN pour Metropolitan Area Network est un réseau dont l'étendue est de plusieurs dizaines de kilomètres, donc on peut considérer que c'est un réseau à l'échelle d'une ville entière. L'objectif d'un réseau MAN est d'interconnecter plusieurs réseaux LAN par l'intermédiaire de liaison à très haut débit grâce à la fibre optique et ce que l'on appelle une dorsale haute capacité (backbone). En fait, ces différents réseaux locaux (LAN) dispersés dans une ville sont physiquement reliés entre eux pour constituer le réseau MAN.

Nous pouvons prendre l'exemple d'une entreprise qui dispose de trois agences réparties dans la ville et interconnectées afin de former un réseau MAN. Ce réseau MAN mène également à Internet. Dans ce cas, les serveurs peuvent être regroupés sur une seule agence et être accessibles depuis l'ensemble des agences de l'entreprise.

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-man-01.png)

# C'est quoi un réseau WAN ?

WAN pour Wide Area Network correspond à un réseau étendu, et il s'agit d'un réseau étendu à l'échelle d'un pays ou d'un continent puisqu'il peut couvrir des centaines ou des milliers de kilomètres ! De ce fait, il couvre une zone plus large que le LAN et le MAN.

Il faut savoir qu'Internet est considéré comme un WAN public. En fait, un réseau WAN est un réseau longue distance comme c'est le cas du réseau de certaines grandes entreprises et de fournisseurs d'accès à Internet. Les communications sur un réseau WAN s'appuient de la fibre optique, des liaisons satellites, mais aussi des câbles sous-marins afin de relier les continents entre eux. Même si elles ne sont plus utilisées en priorité, il ne faut pas oublier les liaisons cuivres (ADSL, VDSL, SDSL).

Le terme WAN est très souvent utilisé au sein des logiciels, sur les équipements réseau, etc... Pour identifier la carte réseau qui mène à l'extérieur du réseau, en faisant référence bien souvent à Internet, c'est-à-dire à un réseau WAN. Si l'on se positionne au niveau d'un réseau local comme celui que nous avons à la maison, dès que l'on sort de ce réseau, pour atteindre Internet par exemple, nous atteignons un réseau WAN.

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-wan-01.png)

Un autre exemple de réseau WAN, c'est une entreprise qui souhaite interconnecter plusieurs sites répartis sur des continents différents. En effet, grâce à un réseau WAN, l'entreprise va pouvoir relier ses différents sites en utilisant des protocoles, des supports et technologies spécifiques (MPLS, SD-WAN, 5G, VPN, etc.).

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-wan-02.png)

# C'est quoi un réseau PAN ?

PAN pour Personal Area Network correspond à un réseau à l'échelle d'une personne, et on parle aussi de WPAN lorsqu'il s'agit de connexions sans-fil. Qu'est-ce que cela signifie ? Un réseau PAN correspond à la connexion entre plusieurs appareils tel qu'un ordinateur et un périphérique connecté USB, ou un smartphone connecté à une paire d'écouteurs Bluetooth. Comme autres méthodes de connexion, on peut citer la technologie NFC, le protocole ZigBee utilisé par des objets connectés ou encore l'infrarouge (IrDA). Lors d'une synchronisation directe entre deux appareils, par exemple deux ordinateurs, on parle également d'un réseau PAN.

![](https://www.it-connect.fr/wp-content-itc/uploads/2022/05/schema-reseau-pan-01.png)

# Conclusion

Suite à la lecture de cet article, vous connaissez les principaux types de réseau même s'il en existe d'autres que je n'ai pas cités dans cet article, comme le GAN pour Global Area Network qui n'a aucune limite de portée et qui fait référence à un réseau mondial (ou réseau global). Honnêtement, c'est un terme qui n'est pas fréquemment utilisé, car on entend surtout parler de LAN, de WAN et éventuellement de MAN.

Pour conclure sur les types de réseau, vous pouvez retenir ceci :

- LAN - Local Area Network : réseau à l'échelle d'une maison, d'un appartement, d'un bâtiment, d'un campus, d'une école ou encore d'une agence
- MAN - Metropolitan Area Network : réseau à l'échelle d'une ville
- WAN - Wide Area Network : réseau à l'échelle d'un pays, d'un continent, dont le meilleur exemple est Internet
- PAN - Personal Area Network : réseau à l'échelle d'une seule personne
