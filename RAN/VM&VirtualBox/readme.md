# À propos de la virtualisation et de la machine virtuelle

- Comprendre la virtualisation en 7 minutes <https://www.youtube.com/watch?v=4J_00mQ5BAs>
- La virtualisation, c'est quoi ? <https://www.youtube.com/watch?v=qiEgFDtLXDQ>

La virtualisation est une technologie qui permet la création et l'exécution de la version d’un logiciel telle qu’un serveur, un système de stockage, un système d’exploitation ou un réseau pour une entité physique. Il permet également de réduire les différentes dépenses informatiques tout en optimisant l’agilité et l’efficacité de toutes les entreprises.

La machine virtuelle (virtual machine ou VM) est un conteneur de logiciel isolé. Ce système informatique virtuel inclut différentes applications ainsi qu’un système d’exploitation. Cette VM réalise son propre système d'exploitation (OS) et dispose d’équipements semblables à une machine physique tels que mémoire RAM, CPU, disque dur et carte réseau.

## Quels sont les bénéfices de la virtualisation ?

La virtualisation est un processus qui permet de fortifier l’agilité, l’évolutivité et la flexibilité informatique tout en diminuant les coûts. Elle offre aussi une plus grande disponibilité des ressources et une meilleure performance. Elle dispose de bien d’autres avantages qui sont les suivants :

- des dépenses d’exploitation et d’investissement réduites ;
- des interruptions de service supprimées ou en réduction ;
- une augmentation de l’efficacité, de la productivité, de l’agilité et de la réactivité informatique ;
- des applications et des ressources ayant un provisionnement accéléré ;
- une reprise d’activité et une continuité renforcée ;
- la gestion des Data Centers simplifiée ;
- un véritable Software-Defined Data Center disponible.

## Quels sont les types de virtualisation ?

Il existe différents types de virtualisation dans le domaine de l’informatique dont voici les 6 principaux :

- la virtualisation de serveur : elle permet la mise en œuvre de plusieurs systèmes d’exploitation sous la forme de machines virtuelles et à l’aide d’un seul serveur physique. Elle offre aussi une rapidité de déploiement des workloads, des applications plus performantes, une hausse de la disponibilité de serveur et la suppression des problèmes liés à la gestion des serveurs ;
- la virtualisation de réseau : son objectif est de calquer un réseau physique ainsi que ses composants comme les ports, les interrupteurs, les routeurs, les firewalls, etc. Cela lui permet de procéder à la mise en place d’applications sur un réseau virtuel ;
- la virtualisation de stockage : elle consiste à concentrer la capacité de stockage de différents appareils en un seul (virtuel), et ce, depuis une console centrale ;
- la virtualisation desktop : équivalente à la virtualisation de serveur, mais elle à un ajout qui permet la reproduction des environnements de PC. Grâce à cela, la réaction face aux changements de besoins est plus rapide ;
- la virtualisation de données : l’abstraction de détails techniques tels que la localisation, le format, la performance permet d’accroître la résilience et d’ouvrir un accès aux données. De plus, le traitement de ces données est simplifié grâce à la  Data Virtualization qui les consolides dans une seule source ;
- la virtualisation d’application : cette virtualisation repose sur l’abstraction de la couche application de système d’exploitation. Cela permet de réaliser une application indépendante du système d’exploitation, sous forme encapsulée.

# Qu'est-ce qu'une machine virtuelle (VM) ?

- [6][S01] Qu'est ce qu'une VM (Machine Virtuelle) à quoi çà sert ? <https://www.youtube.com/watch?v=RfRrGdCcbCs>
- Qu'est-ce qu'une machine virtuelle? | Informatique | facile à comprendre <https://www.youtube.com/watch?v=FQ_eZb_XfgA>

Une machine virtuelle ou VM est un environnement entièrement virtualisé qui fonctionne sur une machine physique. Elle exécute son propre système d’exploitation (OS) et bénéficie des mêmes équipement qu’une machine physique : CPU, mémoire RAM, disque dur et carte réseau. Plusieurs machines virtuelles avec des OS différents peuvent coexister sur le même serveur physique : Linux, MacOS, Windows…

![](https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/what-is-a-virtual-machine_overview-img?resMode=sharp2&op_usm=1.5,0.65,15,0&wid=2560&hei=862&qlt=95)

## Comment fonctionne une machine virtuelle ?

La virtualisation est le processus de création d’une version logicielle ou "virtuelle" d’un ordinateur, avec des quantités dédiées d’UC, de mémoire et de stockage "empruntées" à un ordinateur hôte physique, tel que votre ordinateur personnel, et/ou un serveur distant, tel qu’un serveur dans le centre de données d’un fournisseur cloud. Une machine virtuelle est un fichier informatique, généralement appelé image, qui se comporte comme un ordinateur réel. Elle peut s’exécuter dans une fenêtre sous la forme d’un environnement informatique distinct, souvent pour exécuter un système d’exploitation différent, ou même pour fonctionner comme l’expérience informatique complète de l’utilisateur, comme c’est le cas pour les ordinateurs professionnels de nombreuses personnes. La machine virtuelle est partitionnée et ainsi isolée du reste du système, de sorte que les logiciels installés sur la machine virtuelle ne peuvent pas interférer avec le système d'exploitation principal de l’ordinateur hôte.

Le partage des différents environnement virtuels est géré par l’hyperviseur généralement hébergé dans un cloud public, cloud privé ou un cloud hybride. Il effectue le partitionnement des ressources et alloue une partition à chaque VM. Cela s’effectue à l’aide d’un logiciel installé sur la machine physique. En général cette dernière dispose de ce que l’on appelle un pool partagé de ressources physiques. Principal avantage ? Permettre aux machines virtuelles qui en ont besoin d’accéder à des ressources complémentaires pour faire face à un accroissement de la demande de l’utilisateur.

## À quoi servent les machines virtuelles ?

Il y a plusieurs intérêts à utiliser une machine virtuelle :

- Création et déploiement d’applications dans le cloud.
- Tester un nouveau système d’exploitation sans avoir besoin de partitionner son disque dur.
- Le test peut ainsi s’effectuer sans risques d’endommager le disque dur de votre machine.
- Développer un logiciel ou un programme pour un autre système d’exploitation.
- Se servir de logiciels qui ne peuvent pas tourner sur le système d’exploitation de votre machine physique. Vous pouvez ainsi disposer d’une machine virtuelle par système d’exploitation et même de plusieurs versions du même système d’exploitation.
- Réaliser des économies en installant plusieurs machines virtuelles sur un seul support physique plutôt que de multiplier les ordinateurs en service.
- Accès à des données infectées par des virus ou exécution d’une ancienne application en installant un système d’exploitation plus ancien.

## Quels sont les avantages de l’utilisation des machines virtuelles ?

Bien que les machines virtuelles s’exécutent comme des ordinateurs individuels avec des applications et des systèmes d’exploitation individuels, elles ont l’avantage d’être complètement indépendantes les unes des autres et de l’ordinateur hôte physique. Un logiciel appelé hyperviseur, ou gestionnaire de machines virtuelles, vous permet d’exécuter différents systèmes d’exploitation sur différentes machines virtuelles en même temps. Cela permet d’exécuter des machines virtuelles Linux, par exemple sur un système d’exploitation Windows, ou d’exécuter une version antérieure de Windows sur un système d’exploitation Windows plus récent.

Et, étant donné que les machines virtuelles sont indépendantes les unes des autres, elles sont également extrêmement portables. Vous pouvez déplacer une machine virtuelle d’un hyperviseur à un autre sur un ordinateur complètement différent, presque instantanément.

En raison de leur flexibilité et de leur portabilité, les machines virtuelles offrent de nombreux avantages, notamment :

- Économies : l’exécution de plusieurs environnements virtuels à partir d’une seule infrastructure signifie que vous pouvez réduire considérablement l’encombrement de votre infrastructure physique. Cela booste vos résultats, ce qui réduit la nécessité de gérer presque autant de serveurs et de réduire les coûts de maintenance et l’électricité.
- Agilité et vitesse : lancer une machine virtuelle est relativement simple et rapide. Cette opération est beaucoup plus facile que la configuration d’un nouvel environnement complet pour vos développeurs. La virtualisation rend le processus d’exécution des scénarios de développement et de test beaucoup plus rapide.
- Temps d’arrêt réduit : les machines virtuelles sont réellement portables et faciles à déplacer d’un hyperviseur à un autre sur un autre ordinateur. Elles constituent donc une solution idéale pour la sauvegarde, dans le cas où l’hôte tomberait en panne de façon inattendue.
- Scalabilité : les machines virtuelles vous permettent de mettre à l’échelle plus facilement vos applications en ajoutant des serveurs physiques ou virtuels pour répartir la charge de travail entre plusieurs machines virtuelles. Par conséquent, vous pouvez augmenter la disponibilité et les performances de vos applications.
- Avantages en matière de sécurité : comme les machines virtuelles s’exécutent dans plusieurs systèmes d’exploitation, l’utilisation d’un système d’exploitation invité sur une machine virtuelle vous permet d’exécuter des applications à la sécurité douteuse et de protéger votre système d’exploitation hôte. Les machines virtuelles permettent également de meilleures investigations en matière de sécurité et sont souvent utilisées pour étudier de façon sécurisée des virus informatiques, en isolant ces derniers afin d’éviter de compromettre l’ordinateur hôte.

Toutefois, l’installation d’une machine virtuelle comporte aussi des inconvénients. Notamment au niveau de la sécurité. Une machine physique embarquant plusieurs machines virtuelles est plus vulnérable aux attaques qu’un ordinateur ne disposant que d’un seul système d’exploitation. De la même façon, si cette machine physique vient à tomber en panne, l’accès aux VM devient impossible. Enfin, l’ordinateur hôte des machines virtuelles doit être assez puissant pour supporter la virtualisation. Temps de latence et lenteurs sont fréquents si la RAM est trop réduite.

# Hyperviseur

- Virtualisation : les hyperviseurs de type 1 et de type 2 <https://www.youtube.com/watch?v=YlrdJK6EbEM>

Il est possible d’exécuter plusieurs machines virtuelles simultanément sur un même ordinateur physique, tout étant géré par un hyperviseur. Un hyperviseur est le logiciel qui intègre le matériel physique et le "matériel" virtuel de la machine virtuelle. Ce fonctionnement est très similaire au fonctionnement d’un système d’exploitation dans un ordinateur standard : un peu comme un préposé à la traversée des rues permet à plusieurs élèves de traverser en toute sécurité une intersection occupée, l’hyperviseur vérifie que chaque machine virtuelle obtient les ressources dont elle a besoin du serveur physique de manière ordonnée et opportune.

Un hyperviseur est un logiciel qui permet de créer et d'exécuter des machines virtuelles. Un hyperviseur isole son système d'exploitation et ses ressources des machines virtuelles, et permet de créer et de gérer ces machines virtuelles.

Le matériel physique utilisé en tant qu'hyperviseur est appelé « hôte », tandis que toutes les machines virtuelles qui utilisent ses ressources sont appelées « invités ».

L'hyperviseur traite les ressources (telles que le processeur, la mémoire et le stockage) à la manière d'un pool qui peut être déplacé sans difficulté entre les invités existants ou vers de nouvelles machines virtuelles.

Pour exécuter des machines virtuelles, tous les hyperviseurs ont besoin de certains composants au niveau du système d'exploitation : gestionnaire de mémoire, ordonnanceur, pile d'entrées/sorties (E/S), pilotes de périphériques, gestionnaire de la sécurité, pile réseau, etc.

L'hyperviseur attribue à chaque machine virtuelle les ressources qui ont été allouées, et gère la planification de leurs ressources en fonction des ressources physiques. Cependant, l'exécution est toujours prise en charge par le matériel physique et le processeur exécute toujours les instructions des machines virtuelles, par exemple, lorsque l'hyperviseur gère les tâches planifiées.

Plusieurs systèmes d'exploitation différents peuvent fonctionner en parallèle et partager les mêmes ressources matérielles virtualisées avec un hyperviseur. C'est là tout l'avantage de la virtualisation. Sans la virtualisation, vous ne pouvez exécuter qu'un seul système d'exploitation sur le matériel.

Il existe un grand choix d'hyperviseurs, Open Source ou proposés par des fournisseurs traditionnels. Par exemple, VMware est l'un des principaux fournisseurs de solutions de virtualisation. L'entreprise propose notamment l'hyperviseur ESXi et la plateforme de virtualisation vSphere.

La technologie KVM (Kernel-based Virtual Machine) est Open Source et intégrée au noyau Linux®. Il en existe d'autres, comme Xen (Open Source) et Microsoft Hyper-V.

## Types d'hyperviseurs

Il existe deux types d'hyperviseurs qui peuvent être utilisés pour virtualiser des ressources : les hyperviseurs de type 1 et les hyperviseurs de type 2.

### Type 1

Un hyperviseur de type 1, également appelé hyperviseur de système nu ou natif, s'exécute directement sur le matériel de l'hôte pour gérer les systèmes d'exploitation invités. Il prend la place du système d'exploitation de l'hôte et planifie directement les ressources des machines virtuelles sur le matériel.

Ce type d'hyperviseur est fréquemment utilisé dans les datacenters d'entreprise et dans d'autres environnements basés sur des serveurs.

KVM, Microsoft Hyper-V et VMware vSphere sont des exemples d'hyperviseurs de type 1. La solution KVM a été intégrée au noyau Linux en 2007. Si vous utilisez une version récente de Linux, vous bénéficiez donc déjà d'un accès à KVM.

### Type 2

Un hyperviseur de type 2, également appelé hyperviseur hébergé, s'exécute sur un système d'exploitation traditionnel en tant que couche logicielle ou application.

Il fonctionne en dissociant les systèmes d'exploitation invités du système d'exploitation hôte. Les ressources des machines virtuelles sont planifiées au niveau d'un système d'exploitation hôte, lui-même exécuté sur le matériel.

L'installation d'un hyperviseur de type 2 convient aux utilisateurs qui souhaitent exécuter plusieurs systèmes d'exploitation sur un ordinateur personnel.

VMware Workstation et Oracle VirtualBox sont des exemples d'hyperviseurs de type 2.

![](https://bluebearsit.com/wp-content/uploads/2019/10/2-768x768.png)

## Conteneurs et machines virtuelles

Dans l'ensemble, les conteneurs et les machines virtuelles semblent très similaires. Il s'agit dans les deux cas d'environnements informatiques en paquets qui associent divers composants et les isolent du reste d'un système. Leurs principales différences résident dans leur manière d'évoluer et dans leur niveau de portabilité.

Un conteneur est un processus ou un ensemble de processus isolés du reste du système. Le conteneur permet au processus d'accéder uniquement au volume de ressources qui a été spécifié. Ces limites de ressources garantissent que le conteneur peut être exécuté sur un nœud qui dispose d'une capacité suffisante.

Les machines virtuelles intègrent leur propre système d'exploitation et peuvent ainsi exécuter simultanément plusieurs fonctions gourmandes en ressources. Grâce aux gros volumes de ressources auxquels elles ont accès, les machines virtuelles peuvent dissocier, séparer, dupliquer et émuler des serveurs, des systèmes d'exploitation, des postes de travail, des bases de données et des réseaux entiers.

Un hyperviseur vous permet également d'exécuter plusieurs systèmes d'exploitation dans une machine virtuelle, tandis que les conteneurs ne peuvent exécuter qu'un seul type de système d'exploitation. Par exemple, un conteneur exécuté sur un serveur Linux ne pourra exécuter qu'un système d'exploitation Linux.

Les conteneurs sont parfois considérés comme les remplaçants des hyperviseurs. Ce n'est pas tout à fait exact, puisque les conteneurs et la virtualisation répondent à des besoins différents.

## Les hyperviseurs et la sécurité

Une machine virtuelle fournit un environnement isolé du reste du système, donc il ne peut y avoir aucune interférence entre les programmes exécutés au sein d'une machine virtuelle et sur le matériel hôte.

Ainsi, si l'une d'entre elles est compromise, cela ne devrait pas avoir d'effet sur le reste du système.

En revanche, si l'hyperviseur est piraté, toutes les machines virtuelles qu'il gère, et toutes les données qu'elles contiennent, se retrouvent exposées.

Les protocoles et les exigences de sécurité peuvent varier selon le type d'hyperviseur.

# Installation Oracle VirtualBox

- <https://www.virtualbox.org/>
- Comprendre les différents types de réseaux VirtualBox <https://youtu.be/iPPKNc3appk>
- Comment créer une machine virtuelle avec VirtualBox ? <https://www.youtube.com/watch?v=4Audw2GzN8w>

VirtualBox, au même titre que les autres solutions de virtualisation, propose différents modes pour connecter la machine virtuelle au réseau. Cependant, ce n'est pas facile de s'y retrouver d'autant plus si l'on débute avec la virtualisation. La bonne nouvelle, c'est que cet article va vous expliquer comment fonctionnent les différents modes d'accès au réseau de VirtualBox et quelles sont leurs différences !

Un tour dans les propriétés réseau d'une machine virtuelle permet de visualiser les différents modes d'accès réseau disponibles : NAT, accès par pont, réseau interne, réseau privé hôte, Generic Driver, réseau NAT, Cloud Network, aucune connexion. Avec autant de choix, il y a de quoi répondre à de nombreux besoins, mais aussi de perdre de nombreux utilisateurs.

# Installation VMware Workstation

- <https://www.vmware.com/fr/products/workstation-pro.html>

Des serveurs de plus en plus puissants, des applications qui n’utilisent que 5 à 10% des ressources… VMware a fait il y a déjà un certain temps le constat du gaspillage de ressources serveurs.

D’où l’idée de virtualiser la couche infrastructure (mémoire, CPU, disque), pour pouvoir mettre plusieurs serveurs sur un serveur physique. Rationnaliser et consolider les infrastructures sur une seule machine, donc mutualiser les ressources permet à la fois de baisser les coûts, d’améliorer les performances, et globalement de mieux utiliser la machine.

C’est dans cette logique que VMware sort en 2003 un hyperviseur dédié à la virtualisation. Dans un contexte de réduction des coûts d’infrastructure et de la facture énergétique, et où VMware est le seul à proposer ce type de solution, le succès est au rendez-vous. Par la suite, Hyper-V, XenServer, KVM et d’autres produits sont venus concurrencer l’hyperviseur vSphere, mais VMware reste leader sur le marché grâce à cinq années d’avance sur le sujet et une innovation continue.

Aujourd’hui l’offre VMware s’articule autour de vSphere, outil de base de la virtualisation de serveurs, autour duquel sont développés des outils destinés au cloud computing comme vCloud Director. Ce portail de provisioning est plutôt orienté administrateur système ou infrastructure, ce n’est pas un portail destiné aux utilisateurs finaux comme le veut la tendance actuelle. Il s’agit d’un portail de provisioning amélioré, avec des processus d’orchestration intégrés, pour provisionner facilement des machines, les isoler les unes des autres.
