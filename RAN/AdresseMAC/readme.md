# Qu’est-ce qu’une adresse MAC ?

- Cours réseau - Les adresses MAC https://youtu.be/s65VWFzVuMg
- Les adresses MAC pour les débutants https://youtu.be/7ln7oYIS-n0

Lorsque l'on commence à étudier le fonctionnement d'un réseau IP, l'une des premières notions que l'on aborde est celle de l'adresse MAC. Rien à voir avec les ordinateurs de la marque Apple, ici nous sommes bien sur une notion purement réseau.

MAC signifie "Media Access Control" et cette adresse correspond à l'adresse physique d'un équipement réseau. Cette adresse est un identifiant, normalement unique, permettant d'identifier un équipement réseau par rapport à un autre.

Note : en théorie, un constructeur utilise une adresse MAC différente pour chaque équipement commercialisé. En pratique, il existe des logiciels offrant la possibilité de modifier son adresse MAC (d'un point de vue logiciel seulement), et plus couramment c'est une fonctionnalité offerte par les solutions de virtualisation.

Pour donner un exemple, une voiture dispose d'une plaque d'immatriculation unique. La carte réseau d'un PC quant à elle, dispose d'une adresse MAC unique qui sert à l'identifier.

# Format de l'adresse MAC

L'adresse MAC est constituée de douze caractères alphanumériques (hexadécimal), c'est-à-dire de 0 à 9 et de A à F. Au niveau de son écriture, nous retrouvons des blocs de deux caractères, la plupart du temps sous l'une de ces formes (en fonction des équipements) :

```
XX:XX:XX:XX:XX:XX
XX-XX-XX-XX-XX-XX
XXXX-XXXX-XXXX
```

Ce qui nous donne par exemple : B4-6D-83-DD-CE-49

Il est à noter que les six premiers caractères permettent d'identifier le constructeur de l'appareil. Par exemple, si vous achetez 10 ordinateurs identiques, d'une même série, il y a de très fortes chances pour que leurs adresses MAC soient identiques sur les 6 premiers caractères.

Cette partie de l'adresse MAC est appelée l'OUI : Organizationally Unique Identifier.

![](https://www.it-connect.fr/wp-content-itc/uploads/2019/06/adresse-mac.png)

# Comment récupérer son adresse MAC ?

Un PC équipé d'une carte réseau Ethernet RJ45 dispose d'une adresse MAC, mais s'il a une carte Wi-Fi il aura également une deuxième adresse MAC. Celle-ci est propre à chaque carte réseau. Un smartphone, puisqu'il est équipé d'une puce Wi-Fi, a également une adresse MAC. Il en est de même pour une console de jeux, votre enceinte connectée Amazon Echo, votre caméra IP ou encore un switch.

Pour visualiser son adresse MAC, il existe plusieurs méthodes, notamment en fonction de votre système d'exploitation. Dans certains cas, l'équipement peut avoir une étiquette avec l'adresse MAC indiquée, sinon il faut exploiter la couche applicative pour l'obtenir.

Voici quelques exemples :

- Sous Windows, avec l'invite de commande

```
ipconfig /all
```

Il s'agit de la valeur retournée sur la ligne "adresse physique".

- Sous Windows, avec PowerShell

```
Get-NetAdapter
```

Vous pouvez aussi exécuter simplement la commande "getmac". Il est à noter que sur Windows, en accédant aux propriétés de la connexion réseau, nous pouvons obtenir cette information via l'interface graphique.

![](https://www.it-connect.fr/wp-content-itc/uploads/2019/06/get-netadapter-mac-adress.jpg)

- Sous Unix

```
ip addr show
```

La commande ci-dessus affiche les informations sur la connexion réseau, sur un système Unix. Parmi ces informations, nous retrouvons l'adresse MAC de chacune des cartes réseau de la machine.

Pour aller plus loin, il est intéressant d'étudier le protocole ARP, ce dernier est notamment utilisé pour faire la correspondance entre l'adresse MAC d'un équipement et l'adresse IP.
