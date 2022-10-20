# Qu'est-ce qu'un pare-feu ? [Firewall - Proxy]

- Firewall : comprendre l'essentiel en 7 minutes : https://youtu.be/6Swt51w3EjY
- Comprendre le Proxy et le Reverse Proxy en 5 minutes : https://youtu.be/MpP02aZPSNQ

Un firewall ou pare-feu est un appareil de sécurité réseau qui surveille le trafic réseau entrant et sortant et autorise ou bloque les paquets de donnés en se basant sur un ensemble de règles de sécurité prédéfinies. Il est chargé de dresser une barrière entre votre réseau interne sécurisés et contrôlés qui sont dignes de confiance et le trafic entrant provenant de sources externes (comme Internet) afin de bloquer le trafic malveillant des virus et des pirates. Les pare-feu constituent la première ligne de défense des réseaux depuis plus de 25 ans. Un pare-feu peut être un équipement physique, un logiciel ou une combinaison des deux.

# Comment fonctionne un firewall ?

Les firewalls analysent soigneusement le trafic entrant en fonction de règles préétablies et filtrent le trafic provenant de sources non sécurisées ou suspectes pour empêcher les attaques. Les firewalls surveillent le trafic au point d’entrée d’un ordinateur, appelé port, qui est l’endroit où les informations sont échangées avec des appareils externes. Par exemple, “L’adresse source 172.18.1.1 est autorisée à atteindre la destination 172.18.2.1 par le port 22”.

Considérez les adresses IP comme des maisons, et les numéros de port comme des pièces de cette maison. Seules les personnes de confiance (adresses sources) sont autorisées à entrer dans la maison (adresse de destination). Il y a ensuite un filtrage ultérieur, afin que les personnes présentes dans la maison ne puissent accéder qu’à certaines pièces (ports de destination), selon qu’il s’agit du propriétaire, d’un enfant ou d’un invité. Le propriétaire est autorisé à accéder à n’importe quelle pièce (n’importe quel port), tandis que les enfants et les invités sont autorisés à accéder à un certain ensemble de pièces (ports spécifiques).

Les firewalls peuvent être logiciels ou matériels, mais il est préférable d’avoir les deux. Un firewall logiciel est un programme installé sur chaque ordinateur, qui régule le trafic par le biais de numéros de port et d’applications. Un firewall physique est un équipement installé entre votre réseau et la passerelle d’accès.

# Types de pare-feu
## Pare-feu proxy

Apparu tôt, le pare-feu proxy sert de passerelle entre deux réseaux pour une application spécifique. Les serveurs proxy peuvent offrir des fonctionnalités supplémentaires, comme la mise en cache du contenu ou la protection, en empêchant toute connexion directe provenant de l'extérieur du réseau. Ils peuvent toutefois avoir un impact sur le débit et sur les applications prises en charge.

## Pare-feu à inspection « stateful »

Désormais considéré comme un pare-feu « classique », le pare-feu à inspection « stateful » autorise ou bloque le trafic en fonction de l'état, du port et du protocole. Il surveille toute l'activité, de l'ouverture d'une connexion jusqu'à sa fermeture. Les décisions de filtrage sont prises selon les règles définies par l'administrateur ainsi que selon le contexte, ce qui implique d'utiliser les informations des connexions précédentes et celles des paquets appartenant à la même connexion.

## Pare-feu de gestion unifiée des risques liés à la sécurité (UTM)

Un pare-feu de gestion unifiée des risques liés à la sécurité conjugue partiellement les fonctions d'un pare-feu à inspection « stateful » avec celles de prévention des intrusions et d'antivirus. Il peut également prendre en charge des services supplémentaires et intègre souvent la gestion du cloud. Ce type de pare-feu favorise la simplicité et la facilité d'utilisation.

## Pare-feu de nouvelle génération (NGFW)

Les pare-feu ont évolué pour aller au-delà du simple filtrage de paquets et de l'inspection « stateful ». De nombreuses entreprises déploient des pare-feu de nouvelle génération pour bloquer les dernières menaces telles que les malwares avancés et les attaques au niveau de la couche application.

Selon la définition de Gartner, Inc., un pare-feu de nouvelle génération doit inclure :
- Les mêmes fonctions qu'un pare-feu standard, telles que l'inspection « stateful »
- La prévention des intrusions intégrée
- La reconnaissance et le contrôle des applications pour détecter et bloquer celles qui présentent un risque
- Des voies d'évolution afin d'inclure les futurs flux d'informations
- Des techniques pour faire face à l'évolution des menaces pour la sécurité

Ces capacités s'imposent de plus en plus comme la norme pour l'entreprise, mais les pare-feu de nouvelle génération peuvent en faire encore plus.

## Des pare-feu de nouvelle génération axés sur les menaces

Ces pare-feu offrent toutes les fonctionnalités des pare-feu de nouvelle génération classiques, tout en proposant des fonctions avancées de détection et d'élimination des menaces. Avec un pare-feu de nouvelle génération axé sur les menaces, vous pouvez :
- Savoir quelles ressources présentent le plus de risques grâce à une connaissance complète du contexte
- Réagir rapidement aux attaques avec une automatisation intelligente des systèmes de protection qui définit des politiques et renforce vos défenses de manière dynamique
- Mieux détecter les activités furtives ou suspectes grâce à une mise en corrélation des événements au niveau du réseau et des terminaux
- Réduire fortement les délais entre la détection et le nettoyage avec des fonctions de sécurité rétrospective qui surveillent en continu l'activité et les comportements, même après l'inspection initiale
- Simplifier l'administration et réduire la complexité avec des politiques unifiées qui vous protègent pendant tout le cycle de l'attaque

