# Guide complet sur la journalisation et la surveillance insuffisantes

Presque tous les incidents de sécurité majeurs proviennent de l'exploitation d'une journalisation insuffisante, de stratégies de sécurité non planifiées ou d'une surveillance insuffisante. Les entreprises qui utilisent des applications avec des fonctions de journalisation insuffisantes ou inexistantes courent le risque que les attaques prennent tellement de temps à être atténuées qu'elles peuvent causer des dommages considérables à l'ensemble de la pile technologique.

Les fonctions de journalisation et de surveillance fournissent aux administrateurs et aux équipes de sécurité des données de trafic brutes qui aident à détecter les menaces potentielles en identifiant des modèles inhabituels. Ces mécanismes sont des piliers de sécurité de base qui constituent la base d'un cadre de sécurité administré de manière robuste.

En l'absence de mécanismes de journalisation planifiés avec diligence, une organisation manque la piste d'audit pour l'analyse de la sécurité, ce qui permet aux vecteurs d'attaque de disposer de suffisamment de temps pour pénétrer plus avant dans plusieurs composants de l'écosystème.

Les attaques basées sur des vulnérabilités de surveillance et de journalisation insuffisantes sont généralement classées comme ayant une prévalence élevée, une opportunité moyenne et une détectabilité faible. Veiller à ce que tous les événements soient consignés et, par conséquent, surveillés, est souvent considéré comme la première étape de la détection des intrusions.

Cet article explore diverses vulnérabilités et impacts commerciaux résultant d'une journalisation et d'une surveillance insuffisantes, ainsi que les meilleures pratiques et outils pour empêcher les attaquants d'exploiter les problèmes de sécurité.

## Qu'est-ce qu'une journalisation et une surveillance insuffisantes

Les pirates tirent parti des lacunes dans la journalisation et la surveillance en s'appuyant sur le fait que les équipes de sécurité prendront du temps pour détecter et corriger l'attaque afin d'essayer d'élever les privilèges. Cette section explore les menaces associées à une journalisation et une surveillance insuffisantes et les impacts commerciaux d'une attaque réussie.

La raison fondamentale pour laquelle un système insuffisamment journalisé est exploité par des vecteurs d'attaque est généralement basée sur les inconvénients suivants qui se produisent en l'absence d'un cadre de journalisation et de surveillance efficace :

- Événements et transactions non enregistrés
- Sauvegardes de journaux manquantes
- Journalisation des erreurs obscures
- Plans d'escalade des violations manquants
- Mauvaise gestion de l'authentification
- Formation inefficace sur la journalisation et la surveillance
- Manque d'exportations pour analyser les données de journal
- Mauvaises configurations logicielles

## Menaces associées à une journalisation et une surveillance insuffisantes

### Attaques de botnets

Les attaquants exploitent souvent plusieurs appareils connectés à Internet pour injecter des logiciels malveillants dans un système et coordonner une cyberattaque. Ces logiciels malveillants sont des robots automatisés qui manipulent l'application de différentes manières, allant de simples opérations de spam à des attaques plus complexes destinées à manipuler l'application.

Ceux-ci sont également généralement pris en charge par des botnets qui orchestrent diverses attaques, notamment les attaques par force brute, hameçonnage et déni de service distribué (DDoS). Les attaques de botnet reposent sur une chaîne d'actions passant par plusieurs étapes. En l'absence d'une journalisation appropriée des données d'événements, ces attaques sont presque impossibles à détecter ou à analyser.

Un système de surveillance efficace avec des outils comme Syslog est souvent considéré comme la première ligne de défense pour réduire la probabilité et la gravité des attaques de botnet.

### Attaques DNS

Un service de nom de domaine (DNS) offre un mécanisme standard pour faire pointer les noms d'hôte des machines vers leurs adresses IP. Étant donné que le DNS dirige le trafic réseau vers les serveurs Web et les machines cibles appropriés, il s'agit de points vulnérables courants qui sont souvent exploités par des vecteurs d'attaque pour cibler la disponibilité ou la stabilité du serveur DNS dans le cadre de la stratégie d'attaque globale.

Certaines attaques DNS possibles incluent :

- Empoisonnement du cache
- Attaques DoS par réflexion distribuée
- Attaques NXDOMAIN
- Tunnellisation DNS
- Attaques aléatoires de sous-domaines
- Attaque de verrouillage de domaine

Si les événements basés sur le DNS ne sont pas enregistrés et surveillés de manière appropriée, les administrateurs ne sauront pas avec quels types de machines les attaquants (déguisés en utilisateurs) interrogent et interagissent. De plus, les acteurs de la menace peuvent perpétuer des actions malveillantes telles que l'installation de logiciels malveillants, le vol d'informations d'identification, la communication de commande et de contrôle, l'empreinte réseau et le vol de données en l'absence d'une journalisation et d'une analyse adéquates des requêtes.

### Menaces internes

Les organisations qui investissent généralement une fortune dans la sécurisation des systèmes contre les attaques externes calculent souvent mal les menaces internes. Ces acteurs de la menace interne continuent d'être une préoccupation majeure pour les organisations car leurs activités suspectes ne sont souvent pas contrôlées. Dans de tels cas, les initiés malveillants ou compromis constituent une grave menace pour les systèmes car ils ont accès à diverses mesures de contrôle et de sécurité. Bien qu'une situation comme celle-ci semble étonnante, l'atténuation est relativement simple et directe et repose sur un mécanisme de journalisation efficace.

Une surveillance et une gestion des journaux insuffisantes dans de tels cas entraînent des modèles de comportement des utilisateurs introuvables, permettant ainsi à des imposteurs ou à des initiés malveillants de compromettre le système à un niveau beaucoup plus profond.

Certaines menaces internes communément connues résultant d'une journalisation et d'une surveillance insuffisantes incluent :

- Trafic de logiciels malveillants
- Attaques de rançongiciels
- Menaces persistantes avancées

## Comment les attaquants tirent parti d'une journalisation et d'une surveillance insuffisantes

Sans consigner les informations de sécurité critiques, les administrateurs de sécurité ne sont pas alertés d'événements inhabituels, ce qui transforme chaque vulnérabilité en une violation potentielle et présente le risque d'une nouvelle attaque d'escalade de privilèges. Cela se fait généralement dans l'ordre suivant :

Une fois qu'un attaquant a eu accès à un système, il tente de dissimuler autant que possible sa présence et son identité. Pour les systèmes qui ne disposent pas d'une gestion complète des journaux, les pirates tentent même d'effacer les journaux d'événements susceptibles de déclencher l'alarme.

Les attaquants tentent alors d'exploiter des zones du serveur Web qui ont été développées sans suivre les meilleures pratiques de sécurité. Les attaques actives typiques commencent par le pirate sondant le système à la recherche de vulnérabilités de sécurité. Ils profitent alors d'une réponse aux incidents et d'une remédiation inefficaces pour renforcer leur emprise sur le système ou accéder à des données plus cruciales. Comme les temps de réponse aux incidents de journalisation et de surveillance insuffisants sont longs, généralement de 150 à 200 jours, ces acteurs de la menace disposent d'un temps considérable pour tester discrètement un accès plus privilégié.

Les pirates utilisent généralement des stratégies d'attaque avancées bien connues pour couvrir plus de terrain une fois qu'ils ont obtenu l'accès initial. Certains d'entre eux incluent:

- Attaques de mot de passe - Diverses méthodes visent à obtenir un accès non autorisé aux comptes d'utilisateurs. Certaines méthodes d'attaque de mot de passe incluent - - Brute Force, Dictionary Attacks et Password Sniffers.
- Menaces persistantes avancées – Les intrus accèdent à un réseau et ne sont pas détectés, surveillant généralement le trafic pour extraire des données cruciales.
- Man-in-the-middle-attack (MITM) – Un acteur malveillant intercepte et modifie les messages entre un serveur et le client (ou deux parties communicantes). Ces attaques - incluent l'écoute clandestine Wi-Fi, le détournement de session et le détournement d'e-mails.
- Attaque par déni de service - Une fois que les attaquants ont obtenu un accès initial au système, ils tentent d'arrêter le réseau/la machine et de réduire sa capacité à répondre aux demandes des utilisateurs en inondant le serveur d'un énorme trafic généré par des bots.

## Impacts commerciaux des attaques de journalisation et de surveillance insuffisantes

Sans mécanismes de journalisation et de surveillance appropriés, il est beaucoup plus difficile pour les organisations de détecter et d'atténuer les violations, ce qui coûte du temps et de l'argent aux entreprises. Certains effets d'attaques de journalisation et de surveillance insuffisantes incluent :

### Indisponibilité du système

Les acteurs de la menace qui cherchent à mener une attaque par déni de service (DoS) inondent généralement un serveur cible de trafic jusqu'à ce que le serveur tombe en panne ou ne réponde pas. Cette attaque par force brute signifie que le serveur est débordé et que les services deviennent inaccessibles aux utilisateurs légitimes. Les attaquants s'assurent également que l'attaque ressemble à un problème de disponibilité non malveillant, ce qui les rend encore plus difficiles à suivre.

### Confidentialité compromise

Les journaux d'événements contiennent généralement des informations utilisateur et système sensibles. Les auteurs de menaces ayant accès aux journaux système ont un accès illimité à ces données, qu'ils peuvent utiliser à d'autres fins malveillantes. Des mécanismes de journalisation et de surveillance inappropriés permettent aux attaquants d'accéder à des informations privées, ce qui coûte de l'argent et de la réputation aux entreprises.

### Intégrité réduite des données

Il est difficile de définir des contrôles appropriés pour les différentes phases du cycle de vie des données informatiques lorsqu'il n'y a pas d'outils de journalisation et de surveillance adéquats en place. Les acteurs de la menace qui obtiennent un accès illégal à un système peuvent facilement modifier les données du journal, modifier les entrées et injecter des entrées inattendues dans le système. Cela signifie également que les données de l'entreprise sont incohérentes, inexactes ou incomplètes, ce qui les rend peu fiables ou invalides pour les besoins commerciaux optimaux.

### Non-répudiation

Des mécanismes de journalisation et de surveillance appropriés permettent une identification plus facile des utilisateurs et des processus interagissant avec un système. Sans mécanismes de journalisation appropriés, il est difficile de retracer la source d'un message/demande. Il est donc difficile de retracer la source d'une menace, ce qui encourage les attaques du système.

### Manque de responsabilité

Il est difficile de faire confiance à la préparation à la sécurité d'une organisation lorsqu'il n'y a aucun moyen de suivre la sécurité des utilisateurs et du réseau. Les mécanismes de journalisation et de surveillance garantissent que tous les événements liés au système peuvent être suivis et vérifiés.

## Exemples d'attaques de journalisation et de surveillance insuffisantes

Sans une surveillance et une journalisation appropriées du trafic réseau, les entreprises ne parviennent pas à empêcher les attaquants d'installer des logiciels malveillants et d'accéder à des données cruciales. Dans l'histoire récente, voici quelques-uns des exemples bien connus d'incidents de sécurité résultant d'une journalisation et d'une surveillance insuffisantes :

### L'attaque du ver Stuxnet contre le programme nucléaire iranien

Le ver Stuxnet est un logiciel malveillant magistralement conçu qui attaque les systèmes de contrôle de supervision et d'acquisition de données (SCADA). En 2010, l'équipe de sécurité du programme nucléaire iranien a découvert que le bogue avait été utilisé pour accéder à des systèmes critiques de contrôle des armes.

Après une analyse plus approfondie, le bogue était actif depuis 2005 et s'est propagé à l'aide de clés USB infectées. Les pirates ont profité de mécanismes de journalisation et de surveillance médiocres pour obtenir discrètement un accès élevé.

### La violation de données de Verizon Communications en 2017

Bien qu'aucune donnée n'ait été volée, Verizon admet qu'au moins 14 millions de dossiers clients ont été exposés à Internet lors d'une violation de données découverte en 2017. Ces dossiers comprenaient des données telles que des numéros de téléphone et des codes PIN de compte. Ces données n'étaient pas protégées par un mot de passe et les attaquants auraient pu facilement les télécharger et les exploiter.

Cependant, les enregistrements ont été stockés dans un référentiel de données basé sur le cloud et ont été découverts par un chercheur en cybersécurité avant que des attaquants ne puissent profiter de la faille.

### La violation de données nationale du Dominion en 2019

En 2019, l'assureur Dominion National a découvert que les membres de ses plans de santé auraient pu être exposés à une violation de données qui a duré plus de neuf ans. La violation, dont il a été déterminé qu'elle a touché plus de 2 millions de personnes, a exposé des données clients sensibles, notamment :

- Numéros de compte bancaire
- Numéros de routage
- Informations d'identification du contribuable
- Numéros de sécurité sociale
- Noms et dates de naissance entre autres

Après une enquête approfondie, il a été déterminé que ces informations n'ont pas été consultées ou utilisées par des personnes non autorisées. Dominion National a cependant été condamné à couvrir toute réclamation pour pertes monétaires raisonnablement imputables à la violation.

## Empêcher les attaques de journalisation et de surveillance insuffisantes

Une journalisation et une surveillance appropriées sont les clés de la détection précoce et de la résolution de la plupart des risques et menaces de sécurité. La journalisation implique le traçage et le stockage des informations liées aux événements dans le système, tandis que la surveillance consiste à analyser et à visualiser ces métriques pour identifier les modèles et les anomalies.

Par conséquent, l'administration de stratégies de journalisation et de surveillance efficaces est essentielle pour maintenir une posture de sécurité et des performances. La section suivante explore les outils et les meilleures pratiques qui aident à prévenir les attaques de journalisation et de surveillance insuffisantes :

## Meilleures pratiques de journalisation et de surveillance de la sécurité

L'Open Web Application Security Project (OWASP) recommande diverses meilleures pratiques pour une journalisation et une surveillance efficaces. Ceux-ci inclus:

- Assurez une journalisation suffisante pour tous les échecs d'authentification, y compris la connexion, le contrôle d'accès et la validation côté serveur.
- Créez un contexte et comprenez le trafic de base pour faciliter l'identification des activités suspectes et malveillantes
- Avoir une piste d'audit pour les transactions critiques et de grande valeur afin d'empêcher la suppression ou la falsification
- Sauvegardez les fichiers journaux sur plusieurs serveurs pour activer la tolérance aux pannes
- Authentifier l'accès aux journaux
- Automatisez la surveillance et les alertes pour les événements de journal
- Créez une plate-forme intégrée pour la gestion et la surveillance des journaux, avec des alertes et une visualisation en temps réel
- Avoir un plan de réponse aux incidents formel basé sur ITIL et une stratégie de résolution qui suit les normes établies
- Effectuez toujours des tests de pénétration pour identifier les lacunes dans la surveillance et le signalement des incidents
- Avoir un plan ou une stratégie de rétablissement élaboré pour les jours de pluie

## Solutions de journalisation et de surveillance populaires

Il existe plusieurs outils utiles que les organisations peuvent utiliser pour mettre en place un système centralisé de journalisation, d'analyse et de rapport des données d'événement. Ceux-ci inclus:

### OWASP AppSensor

Ce projet open source intègre les mécanismes de journalisation disponibles avec les meilleures pratiques de sécurité pour fournir une détection d'intrusion dans la couche application en temps réel pour les applications d'auto-réparation. Le projet fournit également un cadre pour les réponses automatisées aux incidents de sécurité.

### NLog

NLog est également une solution de journalisation flexible et open source pour le traitement des événements et des alertes principalement utilisés pour les plates-formes .NET. La plate-forme prend en compte les données de journalisation dans le langage .NET, puis les complète avec des informations sur le contexte associé pour l'analyse des journaux en temps réel.

## Conclusions finales et foire aux questions
### Qu'est-ce que la journalisation de sécurité ?

La journalisation de sécurité enregistre des informations sur ce qui se passe au sein de votre réseau. Les journaux de sécurité incluent tout, des journaux de pare-feu aux journaux d'événements en passant par les journaux d'application. Chaque type de journal fournit différents types d'informations.

Par exemple, un journal de pare-feu peut enregistrer l'adresse IP source de chaque paquet envoyé ou reçu par le périphérique. Les journaux d'événements enregistrent la date, l'heure et les détails de chaque événement qui se produit dans l'ordinateur. Les journaux d'application enregistrent le nom du processus qui était en cours d'exécution lorsque l'événement s'est produit.

Comment savoir si je suis attaqué ? Comment savoir ce qui se passe ?

Vous devez être en mesure de dire quand une attaque se produit. Il y a deux façons de faire ça:

1) Surveillez vos journaux.

2) Utilisez un outil tel que Nlog pour analyser les journaux.

### Combien de journaux dois-je surveiller ?

Cela dépend de combien vous voulez dépenser pour cela. Plus vous collectez de journaux, plus vous avez de chances d'attraper des activités malveillantes.

Une surveillance insuffisante de la gestion des journaux est l'une des principales raisons pour lesquelles les entreprises ne sont pas en mesure de remédier efficacement aux incidents de sécurité. Cela permet aux entreprises d'adopter la bonne approche réactive et les mesures correctives nécessaires pour garantir la sécurité des systèmes à l'avenir. Par conséquent, une journalisation et une surveillance insuffisantes posent un niveau de vulnérabilité unique qui reste un aspect populaire de l'exploit d'un attaquant.

Ceci est confirmé par le fait qu'en 2018, 35 % des piratages orchestrés étaient sans fichier, car les attaques basées sur des fichiers sont plus faciles à détecter avec les mécanismes traditionnels de journalisation et de surveillance. Le rapport immuable indique également que plus de 93 % des failles de sécurité commises en 2017 auraient pu être évitées grâce à des mesures de journalisation et de surveillance de base.