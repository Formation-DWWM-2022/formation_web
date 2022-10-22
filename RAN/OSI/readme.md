# Qu'est-ce que le modèle OSI ?

- Comprendre les modèles OSI et TCP/IP : https://youtu.be/26jazyc7VNk
- Au début, le développement des réseaux était chaotique... Comprendre les couches OSI en 8 minutes ! : https://youtu.be/YG57te3jqE8

Créé par l'Organisation internationale de normalisation, le modèle conceptuel OSI (Open Systems Interconnection) permet à divers systèmes de communication de communiquer à l'aide de protocoles standard. En clair, l'OSI constitue une norme permettant à différents systèmes informatiques de communiquer entre eux.

Fondé sur le concept de division d'un système de communication en sept couches abstraites, empilées les unes sur les autres, le modèle OSI peut être considéré comme un langage universel pour les réseaux informatiques.

![](https://www.cloudflare.com/img/learning/ddos/what-is-a-ddos-attack/osi-model-7-layers.svg)

Chaque couche du modèle OSI assure un rôle particulier et communique avec les couches au-dessus et en dessous d'elle. Les attaques DDoS ciblent des couches spécifiques d'une connexion réseau. Les attaques sur la couche applicative, par exemple, ciblent la couche 7, tandis que les attaques sur la couche de protocole ciblent les couches 3 et 4.

# Pourquoi le modèle OSI est-il important ?

Bien que l'Internet moderne ne suive pas strictement le modèle OSI (mais plutôt la suite de protocoles Internet, plus simple), ce dernier se révèle toujours très utile pour résoudre les problèmes affectant un réseau. Que l'incident concerne un utilisateur unique ne parvenant pas à connecter son ordinateur portable à Internet ou une complication au niveau d'un site web entraînant une panne pour des milliers d'utilisateurs, le modèle OSI peut permettre de résoudre le blocage et d'isoler la source du dysfonctionnement. De même, la possibilité de circonscrire la défaillance à une couche spécifique du modèle peut épargner une foule de travail inutile aux administrateurs.

# Quelles sont les sept couches du modèle OSI ?

Les sept couches d’abstraction du modèle OSI peuvent être définies comme suit, de haut en bas :

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/koKt5UKczRq47xJsexfBV/c1e1b2ab237063354915d16072157bac/7-application-layer.svg)

7. La couche applicative

C’est la seule couche qui interagit directement avec les données de l’utilisateur. Les applications logiciel comme les navigateurs web et les clients e-mail se servent de la couche applicative pour initier des communications. Toutefois, il convient de préciser que les applications logicielles client ne font pas partie de la couche applicative. Cette dernière est en fait responsable des protocoles et de la manipulation des données sur lesquels le logiciel s’appuie pour présenter des données significatives à l’utilisateur. Les protocoles de la couche applicative incluent HTTP et SMTP (Simple Mail Transfer Protocol est l’un des protocoles permettant les communications par courrier électronique).

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/60dPoRIz0Es5TjDDncEp2M/7ad742131addcbe5dc6baa16a93bf189/6-presentation-layer.svg)

6. La couche de présentation

Cette couche est principalement responsable de la préparation des données afin qu’elles puissent être utilisées par la couche applicative ; en d’autres termes, la couche 6 rend les données présentables pour les applications. La couche de présentation est responsable de la traduction, du chiffrement et de la compression des données.

Deux périphériques communicants peuvent utiliser différentes méthodes de codage. La couche 6 est donc chargée de la traduction des données entrantes en une syntaxe compréhensible par la couche applicative du périphérique récepteur.

Si les périphériques communiquent via une connexion chiffrée, la couche 6 est chargée d’ajouter le chiffrement du côté de l’expéditeur ainsi que de le décoder du côté du récepteur afin que celui-ci puisse présenter à la couche applicative des données lisibles non chiffrées.

Enfin, la couche de présentation est également responsable de la compression des données qu’elle reçoit de la couche applicative avant de les délivrer à la couche 5. Cela permet d’améliorer la vitesse et l’efficacité de la communication en réduisant la quantité de données qui seront transférées.

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/6jFRnaZSuIMoUzSotZXYbG/cc7a47d2b3f8d3e77b9ffbdb8b8d5280/5-session-layer.svg)

5. La couche de session

Il s’agit de la couche responsable de l’ouverture et de la fermeture de la communication entre les deux appareils. L’intervalle entre l’ouverture et la fermeture de la communication est appelé session. La couche de session garantit que la session reste ouverte suffisamment longtemps pour transférer toutes les données échangées, puis ferme rapidement la session afin d’éviter le gaspillage de ressources.

La couche de session synchronise également le transfert de données avec les points de contrôle. Par exemple, si un fichier de 100 mégaoctets est transféré, la couche de session peut définir un point de contrôle tous les 5 mégaoctets. Dans le cas d’une déconnexion ou d’un plantage après le transfert de 52 mégaoctets, la session pourra être reprise à partir du dernier point de contrôle, ce qui signifie que seulement 50 mégaoctets de données supplémentaires devront être transférés. Sans les points de contrôle, tout le transfert devrait reprendre à zéro.

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/1MGbIKcfXgTjXgW0KE93xK/64b5aa0b8ebfb14d5f5124867be92f94/4-transport-layer.svg)

4. La couche de transport

La couche 4 est responsable de la communication de bout en bout entre les deux appareils. Cela inclut la récupération de données de la couche de session et leur décomposition en morceaux appelés segments avant de les envoyer à la couche 3. La couche de transport sur le dispositif de réception est chargée de réassembler les segments en données que la couche de session peut consommer.

La couche de transport est également responsable du contrôle de flux et du contrôle d’erreur. Le contrôle de flux détermine une vitesse de transmission optimale pour garantir qu’un expéditeur avec une connexion rapide ne submerge pas un récepteur avec une connexion lente. La couche de transport effectue un contrôle d’erreur côté réception en s’assurant que les données reçues sont complètes et en demandant une retransmission si ce n’est pas le cas.

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/76JgEjycZl12c90UByKfJA/d6578bcd7b151c489e61f42227a45713/3-network-layer.svg)

3. La couche réseau

La couche réseau est chargée de faciliter le transfert de données entre deux réseaux différents. Si les deux appareils qui communiquent sont sur le même réseau, la couche réseau est inutile. La couche réseau décompose les segments de la couche de transport en unités plus petites, appelées paquets, sur le dispositif émetteur et réassemble ces paquets sur le dispositif de réception. La couche réseau trouve également le meilleur chemin physique pour que les données atteignent leur destination : c’est ce qu’on appelle le routage.

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/3MR4mPOwaos80t1annw7BG/8ea1c59ccfa1baf6e9738773daa30450/2-data-link-layer.svg)

2. La couche de liaison de données

La couche de liaison de données est très similaire à la couche réseau, sauf qu’elle facilite le transfert de données entre deux appareils sur le même réseau. Cette couche prend les paquets de la couche réseau et les divise en morceaux plus petits appelés trames. Comme la couche réseau, la couche de liaison de données est également responsable du contrôle de flux et du contrôle d’erreur dans les communications intra-réseau (la couche de transport ne fait que le contrôle de flux et le contrôle d’erreur pour les communications inter-réseaux).

![](https://cf-assets.www.cloudflare.com/slt3lc6tev37/3m1ZkcaaBYHoodrEO3brv2/2819c4db294631b5753cd55de0c01bd9/1-physical-layer.svg)

1. La couche physique

Cette couche comprend les équipements physiques impliqués dans le transfert de données, tels que les câbles et les commutateurs. C’est également la couche où les données sont converties en un flux binaire, qui est une chaîne de 1 et de 0. La couche physique des deux appareils doit également convenir d’une convention de signal afin que les 1 puissent être distingués des 0 sur les deux appareils.

# La circulation des données au sein du modèle OSI

Afin de permettre le transfert d'informations lisibles par l'homme d'un appareil à un autre sur le réseau, les données doivent parcourir les sept couches du modèle OSI sur l'appareil émetteur, puis les sept couches sur l'appareil récepteur.

Par exemple : M. Cooper veut envoyer un e-mail à Mme Palmer. M. Cooper compose son message dans une application de messagerie électronique sur son ordinateur portable, puis clique sur Envoyer. Son application de messagerie transmettra son message électronique à la couche applicative, qui choisira un protocole (SMTP) et transmettra les données à la couche de présentation. Cette dernière compressera alors les données, puis elle sollicitera la couche de session, qui initialisera la session de communication.

Les données atteindront alors la couche de transport de l’expéditeur où elles seront segmentées, puis ces segments seront divisés en paquets au niveau de la couche réseau, qui seront encore décomposés en trames au niveau de la couche de liaison de données. Cette dernière fournira ensuite ces trames à la couche physique, qui convertira les données en un flux binaire de 1 et de 0 et les enverra via un support physique, tel qu’un câble.

Une fois que l’ordinateur de Mme Palmer reçoit le flux binaire via un support physique (tel que son Wi-Fi), les données emprunteront la même série de couches sur son appareil, mais dans l’ordre inverse. Tout d’abord, la couche physique convertira le flux binaire des 1 et des 0 en trames qui seront transmises à la couche de liaison de données. Celle-ci ira ensuite réassembler les trames en paquets pour la couche réseau. Puis la couche réseau créera des segments à partir des paquets pour la couche de transport, qui réassemblera les segments en une seule donnée.

Les données seront ensuite transférées à la couche de session du récepteur, qui les transmettra à la couche de présentation, puis mettra fin à la session de communication. La couche de présentation supprimera alors la compression et transmettra les données brutes à la couche applicative. Cette dernière alimentera ensuite les données lisibles par l’homme dans le logiciel de messagerie de Mme Palmer, ce qui lui permettra de lire le courrier électronique de M. Cooper sur l’écran de son ordinateur portable.