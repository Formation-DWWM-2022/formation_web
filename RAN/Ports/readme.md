# Qu'est-ce qu'un port d'ordinateur ?

- Ports et protocoles : comprendre l'essentiel en 5 minutes https://www.youtube.com/watch?v=YSl6bordSh8

Un port est un point virtuel où les connexions réseau commencent et se terminent. Les ports sont basés sur des logiciels et gérés par le système d'exploitation d'un ordinateur. Chaque port est associé à un processus ou à un service spécifique. Les ports permettent aux ordinateurs de différencier facilement les différents types de trafic : les courriers électroniques sont acheminés vers un port différent de celui des pages web, par exemple, même si les deux atteignent un ordinateur via la même connexion Internet.

# Qu'est-ce qu'un numéro de port ?

Les ports sont normalisés sur tous les périphériques connectés au réseau, et un numéro est attribué à chaque port. La plupart des ports sont réservés à certains protocoles, par exemple, tous les messages Hypertext Transfer Protocol (HTTP) vont au port 80. Alors que les adresses IP permettent aux messages d'aller vers et depuis des périphériques spécifiques, les numéros de port permettent de cibler des services ou des applications spécifiques au sein de ces périphériques.

# Comment les ports rendent-ils les connexions réseau plus efficaces ?

Des types de données très différents circulent vers et depuis un ordinateur sur la même connexion réseau. L'utilisation de ports aide les ordinateurs à comprendre ce qu'ils doivent faire avec les données qu'ils reçoivent.

Supposons que Bob transfère un enregistrement audio MP3 à Alice en utilisant le protocole de transfert de fichiers (FTP). Si l'ordinateur d'Alice transmettait les données du fichier MP3 à l'application de messagerie d'Alice, cette dernière ne saurait pas comment les interpréter. Mais comme le transfert de fichiers de Bob utilise le port désigné pour le FTP (port 21), l'ordinateur d'Alice est en mesure de recevoir et de stocker le fichier.

Pendant ce temps, l'ordinateur d'Alice peut charger simultanément des pages web HTTP en utilisant le port 80, même si les fichiers de la page web et le fichier audio MP3 arrivent sur l'ordinateur d'Alice par la même connexion WiFi.

# Les ports font-ils partie de la couche réseau ?

Les ports sont un concept de la couche transport (couche 4). Seul un protocole de transport tel que le protocole de contrôle de transmission (TCP) ou le User Datagram Protocol (UDP) peut indiquer à quel port un paquet doit être envoyé. Les en-têtes TCP et UDP comportent une section destinée à indiquer les numéros de port. Les protocoles de la couche réseau par exemple, le protocole Internet (IP), ne savent pas quel port est utilisé dans une connexion réseau donnée. Dans un en-tête IP standard, il n'y a pas d'endroit pour indiquer à quel port le paquet de données doit aller. Les en-têtes IP indiquent uniquement l'adresse IP de destination, et non le numéro de port de cette adresse IP.

En général, l'impossibilité d'indiquer le port au niveau de la couche réseau n'a aucun impact sur les processus de mise en réseau, puisque les protocoles de la couche réseau sont presque toujours utilisés conjointement avec un protocole de la couche transport. Cependant, cela a un impact sur la fonctionnalité des logiciels de test, qui sont des logiciels qui « ping » adresses IP en utilisant Internet Control Message Protocol (ICMP) paquets. L'ICMP est un protocole de la couche réseau qui permet d'envoyer des pings à des périphériques en réseau, mais sans la possibilité d'envoyer des pings à des ports spécifiques, les administrateurs réseau ne peuvent pas tester des services spécifiques dans ces périphériques.

Certains logiciels ping, tels que My Traceroute, offrent la possibilité d'envoyer des paquets UDP. UDP est un protocole de couche transport qui peut spécifier un port particulier, contrairement à ICMP, qui ne peut pas spécifier de port. En ajoutant un en-tête UDP aux paquets ICMP, les administrateurs réseau peuvent tester des ports spécifiques dans un périphérique en réseau.

# Pourquoi les pare-feux bloquent-ils parfois des ports spécifiques ?

Un pare-feu est un système de sécurité qui surveille et contrôle le trafic réseau en fonction d'un ensemble de règles de sécurité. Les pare-feux se dressent généralement entre un réseau de confiance et un réseau sans relation de confiance. Le réseau non fiable est souvent Internet. Par exemple, les réseaux de bureaux utilisent souvent un pare-feu pour protéger leur réseau des menaces en ligne.

Certains attaquants essaient d'envoyer du trafic malveillant à des ports aléatoires en espérant que ces ports ont été laissés « ouverts », signifiant qu'ils sont capables de recevoir du trafic. Cette action ressemble un peu à celle d'un voleur de voitures qui se promène dans la rue et essaie les portes des véhicules garés, en espérant que l'une d'entre elles soit déverrouillée. C'est pourquoi les pare-feux doivent être configurés pour bloquer le trafic réseau dirigé vers la plupart des ports disponibles. Il n'y a aucune raison légitime pour que la grande majorité des ports disponibles reçoivent du trafic.

Les pare-feux correctement configurés bloquent par défaut le trafic vers tous les ports, à l'exception de quelques ports prédéterminés connus pour être d'usage courant. Par exemple, un pare-feu d'entreprise pourrait ne laisser ouverts que les ports 25 (courrier électronique), 80 (trafic web), 443 (trafic web) et quelques autres, permettant ainsi aux employés internes d'utiliser ces services essentiels, puis bloquer le reste des plus de 65 000 ports.

À titre d'exemple plus spécifique, les attaquants tentent parfois d'exploiter les vulnérabilités du protocole RDP en envoyant du trafic d'attaque au port 3389. Pour stopper ces attaques, un pare-feu peut bloquer le port 3389 par défaut. Ce port n'étant utilisé que pour les connexions de bureau à distance, une telle règle a peu d'impact sur les opérations commerciales quotidiennes, sauf si les employés doivent travailler à distance.

# Quels sont les différents numéros de port ?

Il existe 65 535 numéros de port possibles, mais tous ne sont pas utilisés couramment. Voici quelques-uns des ports les plus couramment utilisés, ainsi que le protocole réseau qui leur est associé :

- Ports 20 et 21 : Protocole de transfert de fichiers (FTP). Le protocole FTP permet de transférer des fichiers entre un client et un serveur.
- Port 22 : Secure Shell (SSH). SSH est l'un des nombreux protocoles de tunneling qui créent des connexions réseau sécurisées.
- Port 25 : Simple Mail Transfer Protocol (SMTP). Le SMTP est utilisé pour le courrier électronique.
- Port 53 : domain Name System (DNS). Le DNS est un processus essentiel pour l'Internet moderne ; il fait correspondre les noms de domaines lisibles par l'homme aux adresses IP lisibles par la machine, ce qui permet aux utilisateurs de charger des sites Web et des applications sans avoir à mémoriser une longue liste d'adresses IP.
- Port 80 : Protocole de transfert hypertexte (HTTP). HTTP est le protocole qui rend le World Wide Web possible.
- Port 123 : Network Time Protocol (NTP). NTP permet aux horloges des ordinateurs de se synchroniser entre elles, un processus essentiel pour le chiffrement.
- Port 179 : Border Gateway Protocol (BGP). BGP est essentiel pour établir des routes efficaces entre les grands réseaux qui composent Internet (ces grands réseaux sont appelés systèmes autonomes). Les systèmes autonomes utilisent BGP pour diffuser les adresses IP qu'ils contrôlent.
- Port 443 : HTTP Secure (HTTPS). HTTPS est la version sécurisée et cryptée de HTTP. Tout le trafic Web HTTPS passe par le port 443. Les services réseau qui utilisent HTTPS pour le chiffrement, tels que DNS over HTTPS, se connectent également à ce port.
- Port 500 : Internet Security Association and Key Management Protocol (ISAKMP), qui fait partie du processus de mise en place de connexions sécurisées IPsec .
- Port 3389 : Protocole de bureau à distance (RDP). Le protocole RDP permet aux utilisateurs de se connecter à distance à leur ordinateur de bureau depuis un autre périphérique.

L'Internet Assigned Numbers Authority (IANA) tient à jour la [liste complète](https://www.iana.org/assignments/service-names-port-numbers/service-names-port-numbers.xhtml) des numéros de port et des protocoles qui leur sont attribués.