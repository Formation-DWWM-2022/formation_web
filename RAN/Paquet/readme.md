# Qu'est-ce qu'un paquet ?

Dans le domaine des réseaux , un paquet est un petit segment d'un message plus important. Les données envoyées sur les réseaux informatiques, tels que Internet, sont divisées en paquets. Ces paquets sont ensuite recombinés par l'ordinateur ou le dispositif qui les reçoit.

Supposons qu'Alice écrive une lettre à Bob, mais que la fente d'introduction du courrier de Bob n'est suffisamment large que pour accepter des enveloppes de la taille d'une petite carte d'index. Au lieu d'écrire sa lettre sur du papier normal et d'essayer de la faire passer par la fente postale, Alice divise sa lettre en sections beaucoup plus courtes, de quelques mots chacune, et écrit ces sections sur des fiches. Elle remet le groupe de cartes à Bob, qui les met dans l'ordre pour lire l'ensemble du message.

Cela ressemble à la façon dont les paquets fonctionnent sur l'Internet. Supposons qu'un utilisateur ait besoin de charger une image. Le fichier image ne va pas d'un serveur web à l'ordinateur de l'utilisateur en un seul morceau. Il est décomposé en paquets de données, envoyé par les fils, les câbles et les ondes radio d'Internet, puis réassemblé par l'ordinateur de l'utilisateur pour former la photo originale.

# Pourquoi utiliser des paquets ?

En théorie, il serait possible d'envoyer des fichiers et des données sur internet sans les découper en petits paquets d'informations. Un ordinateur pourrait envoyer des données à un autre ordinateur sous la forme d'une longue ligne ininterrompue de bits (petites unités d'information, communiquées sous forme d'impulsions électriques que les ordinateurs peuvent interpréter).

Cependant, une telle approche devient rapidement impraticable lorsque plus de deux ordinateurs sont impliqués. En effet, pendant que la longue ligne de bits passait sur les fils entre les deux ordinateurs, aucun troisième ordinateur ne pouvait utiliser ces mêmes fils pour envoyer des informations - il devait attendre son tour.

Contrairement à cette approche, Internet est un réseau « à commutation de paquets ». La commutation de paquets désigne la capacité des équipements de réseau à traiter les paquets indépendamment les uns des autres. Cela signifie également que les paquets peuvent emprunter différents chemins de réseau vers la même destination, tant qu'ils arrivent tous à destination. (Dans certains protocoles, les paquets doivent arriver à leur destination finale dans le bon ordre, même si chaque paquet a emprunté un itinéraire différent pour y parvenir).

Grâce à la commutation par paquets, les paquets provenant de plusieurs ordinateurs peuvent circuler sur les mêmes fils dans n'importe quel ordre. Cela permet à plusieurs connexions d'avoir lieu en même temps sur le même équipement de réseau. Par conséquent, des milliards de dispositifs peuvent échanger des données sur Internet en même temps, au lieu d'une poignée seulement.

# Qu'est-ce qu'un en-tête de paquet ?

L'en-tête d'un paquet est une sorte d'« étiquette » qui fournit des informations sur le contenu du paquet, son origine et sa destination.

Lorsqu'Alice envoie sa série de fiches à Bob, les mots figurant sur ces fiches ne suffisent pas à donner à Bob un contexte suffisant pour lire la lettre correctement. Alice doit indiquer l'ordre dans lequel les fiches sont placées afin que Bob ne les lise pas dans le désordre. Elle doit également indiquer que chaque message vient d'elle, au cas où Bob recevrait des messages d'autres personnes pendant qu'elle distribue les siens. Alice ajoute donc cette information en haut de chaque fiche, au-dessus des mots de son message. Sur la première carte, elle écrit « Lettre d'Alice, 1 sur 20 » ; sur la deuxième, elle écrit « Lettre d'Alice, 2 sur 20 »? et ainsi de suite.

Alice a créé un en-tête miniature pour ses cartes afin que Bob ne les perde pas ou ne les mélange pas. De même, tous les paquets du réseau comportent un en-tête afin que le dispositif qui les reçoit sache d'où ils viennent, à quoi ils servent et comment les traiter.

Les paquets se composent de deux parties : l'en-tête et la charge utile. L'en-tête contient des informations sur le paquet, comme son origine et sa destination les adresses IP (une adresse IP est comme l'adresse postale d'un ordinateur). Les données utiles sont les données proprement dites. Si l'on reprend l'exemple de la photo, les milliers de paquets qui composent l'image ont chacun une charge utile, et cette dernière contient un petit morceau de l'image.

# D'où viennent les en-têtes de paquets ?

Dans la pratique, les paquets ont en fait plus d'un en-tête, et chaque en-tête est utilisé par une partie différente du processus de mise en réseau. Les en-têtes de paquets sont attachés par certains types de protocoles de mise en réseau.

Un protocole est une façon normalisée de formater les données de sorte que n'importe quel ordinateur puisse les interpréter. De nombreux protocoles différents permettent à Internet de fonctionner. Certains de ces protocoles ajoutent aux paquets des en-têtes contenant des informations associées à ce protocole. Au minimum, la plupart des paquets qui traversent Internet comprendront un en-tête Transmission Control Protocol (TCP) et un en-tête Internet Protocol (IP) .

# Qu'est-ce qu'une fin de paquet et un pied de page ?

Les en-têtes de paquets se trouvent au début de chaque paquet. Les routeurs, les commutateurs, les ordinateurs et tout ce qui traite ou reçoit un paquet voient l'en-tête en premier. Un paquet peut également comporter des remorques et des pieds de page à la fin. Comme les en-têtes, ils contiennent des informations supplémentaires sur le paquet.

Seuls certains protocoles réseau joignent des remorques ou des pieds de page aux paquets ; la plupart ne joignent que des en-têtes. Le protocole ESP (qui fait partie de la suite IPsec ) est un exemple de protocole de couche réseau qui joint des remorques aux paquets.

# Qu'est-ce qu'un paquet IP ?

IP (Internet Protocol) est un protocole de la couche réseau qui concerne le routage. Il est utilisé pour s'assurer que les paquets arrivent à la bonne destination.

Les paquets sont parfois définis par le protocole qu'ils utilisent. Un paquet avec un en-tête IP peut être appelé un « paquet IP ». Un en-tête IP contient des informations importantes sur la provenance d'un paquet (son adresse IP source), sa destination (adresse IP de destination), la taille du paquet et la durée pendant laquelle les routeurs du réseau doivent continuer à transmettre le paquet avant de l'abandonner. Il peut également indiquer si le paquet peut être fragmenté ou non, et inclure des informations sur le réassemblage des paquets fragmentés.

## Paquets et datagrammes

« Datagramme » est un segment de données envoyé sur un réseau à commutation de paquets. Un datagramme contient suffisamment d'informations pour être acheminé de sa source à sa destination. Selon cette définition, un paquet IP est un exemple de datagramme. Essentiellement, le datagramme est un terme alternatif pour le « paquet ».

# Qu'est-ce que le trafic réseau ? Qu'est-ce qu'un trafic réseau malveillant ?

Le trafic réseau est un terme qui désigne les paquets qui passent par un réseau, de la même manière que le trafic automobile désigne les voitures et les camions qui circulent sur les routes.

Cependant, tous les paquets ne sont pas bons ou utiles, et tout le trafic réseau n'est pas sûr. Les attaquants peuvent générer un trafic réseau malveillant - des paquets de données conçus pour compromettre ou submerger un réseau. Cela peut prendre la forme d'une attaque par déni de service distribué (DDoS), d'une exploitation de vulnérabilité, ou de plusieurs autres formes de cyberattaques.
