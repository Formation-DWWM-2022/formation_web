# Cookie

Un cookie est un petit fichier stocké par un serveur dans le terminal (ordinateur, téléphone, etc.) d’un utilisateur et associé à un domaine web (c’est à dire dans la majorité des cas à l’ensemble des pages d’un même site web).  Ce fichier est automatiquement renvoyé lors de contacts ultérieurs avec le même domaine.

![](https://linc.cnil.fr/sites/default/files/styles/contenu-generique-visuel/public/thumbnails/image/engin-akyurt-de-pixabay-.jpg?itok=IoFaXyG2)

Les cookies ont de multiples usages : ils peuvent servir à mémoriser votre identifiant client auprès d'un site marchand, le contenu courant de votre panier d'achat, la langue d’affichage de la page web, un identifiant permettant de tracer votre navigation à des fins statistiques ou publicitaires, etc. Certains de ces usages sont strictement nécessaires aux fonctionnalités expressément demandées par l’utilisateur ou bien à l’établissement de la communication et donc exemptés de consentement. D’autres, qui ne correspondent pas à ces critères, nécessitent un consentement de l’utilisateur avant lecture ou écriture.

La distinction entre cookies « tiers » (ou « third party ») et cookie « internes » (ou « first-party ») est technique. Lorsqu'un utilisateur visite un site web, il consulte en pratique un « domaine » qui termine en général par une extension de type .com ou .fr (par exemple monsite.com est un domaine), les contenus peuvent être transmis depuis le domaine qu’il visite ou bien via d’autres domaines qu’il n’a pas entré lui-même et qui appartiennent à des tiers. En effet, chaque cookie est associé à un domaine et envoyé ou reçu à chaque fois que le navigateur va « appeler » ce domaine. En pratique :

- Les cookies « internes » sont déposés par le site consulté par l’internaute, plus précisément sur le domaine du site. Ils peuvent être utilisés pour le bon fonctionnement du site ou pour collecter des données personnelles afin de suivre le comportement de l’utilisateur et servir à des finalités publicitaires ;
- Les cookies « tiers » sont les cookies déposés sur des domaines différents de celui du site principal, généralement gérés par des tiers qui ont été interrogés par le site visité et non par l’internaute lui-même : ces cookies peuvent aussi être nécessaires au bon fonctionnement du site mais ils servent majoritairement à permettre au tiers de voir quelles pages ont été visitées sur le site en question par un utilisateur et de collecter des informations sur lui, notamment à des fins publicitaires.

Le fait que les cookies soient « internes» ou « tiers » est une distinction technique qui n’a pas de conséquence sur le fait de devoir demander ou pas le consentement. Dans la pratique, une grande majorité des cookies « tiers » ont des finalités qui nécessitent le consentement (par exemple publicitaire), mais on peut également trouver des cookies « tiers » qui sont effectivement strictement nécessaires à une fonctionnalité expressément demandée par l’utilisateur et donc exempté de consentement. C’est le cas, par exemple, des cookies servant uniquement à de l'authentification fédérée (lorsqu'un compte unique permet d'accéder à plusieurs sites).

---

# Une petite histoire du cookie
> S’il est aujourd’hui omniprésent et sujet de beaucoup d’attention, le cookie à fait une entrée discrète sur la scène du Web. Retour sur l’histoire du développement du cookie et sur son impact sur l’industrie publicitaire en ligne. 

A l’origine, le World Wide Web imaginé par Tim Berners-Lee était « sans état » : chaque requête via le protocole http était indépendante, sans possibilité pour le serveur de lier deux requêtes successives venant du même système et donc de garder en mémoire des informations sur un utilisateur. La seule concession accordée à ce principe fondamental était le champ « http-referer» (la faute d’orthographe est présente dans la RFC originelle), permettant à un serveur de connaître la page du site web ayant redirigé l’utilisateur vers l’adresse demandée par l’utilisateur. Cette fonctionnalité avait été imaginée pour resserrer les liens entre les personnes publiant sur le Web, encourageant les sites à mettre des liens vers les sites leur envoyant des visiteurs. Ce choix aura des conséquences importantes sur l’impact que les cookies auront sur la vie privée des utilisateurs.
 
## 1994 : Netscape crée le cookie 

Les cookies furent imaginés par des ingénieurs travaillant chez Netscape, alors une jeune entreprise d’informatique commercialisant des serveurs web. En 1994, ceux-ci travaillent sur des serveurs permettant à leur clients de mettre en place des solutions de commerce en ligne, et un navigateur permettant d’accéder à ces fonctionnalités, alors connu en interne sous le nom de code « Mozilla ». La division serveur de Netscape fait face à un problème d’apparence insoluble : comment garder la trace des différents éléments qu’un client qui navigue sur un site web ajoute à son panier ? Du fait de l’absence d’état, chaque navigation vers une nouvelle page provoque l’oubli de toutes les actions précédentes. Des expérimentations testent le stockage de ces informations dans l’URL des pages, cependant elles ne sont pas très fructueuses. Cela conduit deux programmeurs, Lou Montulli et John Giannandrea à proposer une solution permettant de stocker un « état » dans un nouvel objet qu’ils décident d’appeler « Persistent Client State HTTP Cookies » ou cookie, pour faire court.

L’idée était simple : permettre au serveur de transmettre un fichier texte au client, celui-ci lui renvoyant ce même fichier à chaque requête subséquente, permettant ainsi d’identifier l’utilisateur et donc, par exemple, de se rappeler du contenu de son panier au niveau du serveur. Le code fut discrètement intégré sur la version 0.9 de Mosaic Netscape, le 13 octobre 1994. La première utilisation fut d’identifier les utilisateurs du site de Netscape l’ayant déjà visité auparavant. Cette même année, la première bannière publicitaire est placée sur le site HotWired, marquant le début de la publicité sur le Web.

![](https://linc.cnil.fr/sites/default/files/thumbnails/image/histoire_du_cookie_illustration_1.png)
 
A cette époque, la politique de Netscape en matière de développement était avant tout d’aller vite. Le code fut donc introduit sans en informer les utilisateurs, sans introduire de notification à la dépose d’un cookie par un site web, et sans documentation. 
 
## Un risque « vie privée » très vite pointé

Les ingénieurs de Netscape n’étaient pas les seuls à cette époque à travailler sur la question du manque de mémoire du protocole http. En 1995, l’IETF (Internet Engineering Task Force) commença à travailler sur un standard permettant de gérer ce problème. Cependant, l’implémentation de Netscape devenant assez rapidement un standard de facto, le rôle de l’IETF fut modifié pour préciser le standard proposé par Netscape. Leur analyse de l’implémentation proposée par Netscape fut sans appel : elle mettait en danger la vie privée des utilisateurs.

La problématique posée par l’implémentation de Netscape est la suivante : si le serveur du site est capable de lire et écrire les cookies de l’utilisateur, lorsqu’il incorpore des ressources tierces (images, scripts, etc.) le serveur fournissant ces ressources tierces est lui aussi capable de lire et écrire sur le terminal de l’utilisateur en identifiant le contexte (par exemple l’url) dans lesquelles ces ressources ont été appelées. On nomme ces cookies déposé par des ressources tierces des cookies tiers. Ainsi par exemple si l’éditeur d’un journal en ligne intègre une bannière publicitaire sur son site, alors le publicitaire obtient les url visités par l’utilisateur. S’il est également présent sur le site d’un autre éditeur, il peut identifier le même utilisateur également sur ce site. En 1996, la société DoubleClick (rachetée en 2007 par Google) est créée pour exploiter ces cookies tiers pour la publicité.

![](https://linc.cnil.fr/sites/default/files/thumbnails/image/histoire_du_cookie_illustration_2.png)
 
## Des débats sans issue 

En 1996, l’existence des cookies est pour la première fois révélée au grand public, dans un article du Financial Times. La forte réaction du public provoque alors la tenue d’auditions par la FTC (Federal Trade Commission). Malheureusement, le manque de technicité de la FTC à l'époque permet à Netscape d’échapper à toute régulation. Ils déclarent notamment qu’ils ont l’intention de suivre la norme de l’IETF et d’interdire les cookies tiers. Ils ne le firent jamais. Leurs clients principaux étaient les professionnels achetant leurs serveurs et non les utilisateurs de leur navigateur, et ces clients voulaient pouvoir utiliser des cookies tiers.  

En février 1997, l’IETF propose une première version de son standard de cookie. Cette version est rapidement retoquée par l’IESG (Internet Engineering Steering Group) qui supervise les travaux de l’IETF pour ne pas avoir pris des mesures visant à limiter les cookies tiers. L’IETF recommence alors à travailler sur un nouveau standard. Cette même année, l’IAB (Interactive Advertising Bureau) qui a alors 1 an d’existence annonce un chiffre d’affaire global du marché de la publicité en ligne de 906,5 millions de dollars. Le projet de l’IETF commence donc à faire face à une forte opposition. Cependant la position interne est claire : il faut désactiver par défaut les cookies tiers. En octobre 2000 la norme est publiée, RFC2965. Cette année-là, le chiffre d’affaire calculé par l’IAB est de 8,2 milliards de dollars soit presque 1000% de croissance en trois ans. Le standard est déjà marginalisé et le cookie de Netscape est devenu le défaut. 

L’industrie qui s’est créé autour de cet état de fait se développe de façon exponentielle. DoubleClick, pionnier du tracking publicitaire fondé sur l’utilisation des cookies tiers est racheté pour 1,1 milliards de dollars en 2005 par des investisseurs et fera ensuite l’objet d’un  rachat en 2007 pour 3,1 milliards de dollars par Google. Cette opération fait l’objet d’une enquête antitrust, certains acteurs comme Microsoft craignant que cela donne trop de contrôle à Google sur le domaine de la publicité en ligne mais l’acquisition est validée en 2008.

Un an plus tôt, Apple présentait le premier iPhone, ouvrant la voie à une nouvelle ère pour l’internet et de nouveaux modèles pour présenter et suivre la publicité en ligne, sans revenir sur l’idée de Netscape d’attacher des identifiants au terminal de l’utilisateur...

---
# Les cookies sont-ils mauvais ?

Sans savoir de quoi il en retourne, de nombreux internautes reçoivent ce message invitant à accepter ou non les cookies. Comme on l’a précisé plus haut, ces pages web collectent les données des visiteurs à des fins statistiques, afin de leur proposer des services spécialisés. Par conséquent, en acceptant les cookies, nous autorisons ce site à prendre nos données pour mieux comprendre notre comportement de navigation et ainsi nous envoyer des informations liées à nos centres d’intérêt.

Certaines entreprises, telles que Facebook et d’autres services publicitaires, insèrent des packages de cookies sur de nombreux sites Web que vous visitez régulièrement sur Internet. En vérité, ils s’apparentent à des caméras de surveillance placées par ces entreprises pour savoir dans quelles pages vous entrez.

Certes, de nombreux utilisateurs pensent que les cookies sont malveillants, utilisés par des entreprises pour voler nos informations et nous pousser à la consommation en nous étouffant de publicités.

---

# Cookies et traceurs : que dit la loi ?

> En application de la directive ePrivacy, les internautes doivent être informés et donner leur consentement préalablement au dépôt et à la lecture de certains traceurs, tandis que d’autres sont dispensés du recueil de ce consentement.

En France :
- La durée de vie des traceurs soit limitée à une durée permettant une comparaison pertinente des audiences dans le temps, comme c’est le cas d’une durée de treize mois, et qu’elle ne soit pas prorogée automatiquement lors des nouvelles visites ;

- Les informations collectées par l'intermédiaire de ces traceurs soient conservées pour une durée maximale de vingt-cinq mois ;

- Les durées de vie et de conservation ci-dessus mentionnées fassent l’objet d’un réexamen périodique afin d’être limitées au strict nécessaire.

Mais certains cookies se conservent bien plus longtemps. Dans Google Adwords, par exemple, un cookie peut durer jusqu’à 540 jours. D’un point de vue textuel, il n’y a pas de limite à la durée pour laquelle un cookie peut être programmé. Il existe même des exemples de cookies programmés pour durer plus de 7000 ans ! 

![](https://dpo.ovh/wp-content/uploads/2020/08/cookies-1140x641.jpg)

## Quels cookies nécessitent le consentement préalable des utilisateurs ?

Tous les cookies n’ayant pas pour finalité exclusive de permettre ou faciliter une communication par voie électronique ou n’étant pas strictement nécessaire à la fourniture d'un service de communication en ligne à la demande expresse de l'utilisateur nécessitent le consentement préalable de l’internaute. Parmi les cookies nécessitant une information préalable et le recueil préalable du consentement de l’utilisateur, on peut notamment citer :

- les cookies liés aux opérations relatives à la publicité personnalisée ;
- les cookies des réseaux sociaux, notamment générés par leurs boutons de partage.

En ce qui concerne les traceurs non soumis au consentement, on peut évoquer :

- les traceurs conservant le choix exprimé par les utilisateurs sur le dépôt de traceurs ;
- les traceurs destinés à l’authentification auprès d’un service, y compris ceux visant à assurer la sécurité du mécanisme d’authentification, par exemple en limitant les tentatives d’accès robotisées ou inattendues ;
- les traceurs destinés à garder en mémoire le contenu d’un panier d’achat sur un site marchand ou à facturer, à l’utilisateur, le(s) produit(s) et/ou service(s) acheté(s) ;
- les traceurs de personnalisation de l'interface utilisateur (par exemple, pour le choix de la langue ou de la présentation d’un service), lorsqu’une telle personnalisation constitue un élément intrinsèque et attendu du service ;
- les traceurs permettant aux sites payants de limiter l’accès gratuit à un échantillon de contenu demandé par les utilisateurs (quantité prédéfinie et/ou sur une période limitée) ;
- certains traceurs de mesure d’audience dès lors qu’ils respectent certaines conditions.

![](https://www.cookiebot.com/fr/wp-content/uploads/sites/5/2022/05/consent_fr.png)

## Comment recueillir valablement le consentement ?

Le consentement doit se manifester par une action positive de la personne préalablement informée, notamment, des conséquences de son choix et disposant des moyens d’accepter, de refuser et de retirer son consentement. Des systèmes adaptés doivent donc être mis en place pour recueillir le consentement selon des modalités pratiques qui permettent aux internautes de bénéficier de solutions simples d’usage.

L'acceptation de conditions générales d'utilisation ne peut être une modalité valable de recueil du consentement. Tant que la personne n'a pas donné son consentement, les cookies ne peuvent pas être déposés ou lus sur son terminal.

Le consentement n'est valide que si la personne exerce un choix réel. L'utilisateur doit pouvoir accepter ou refuser le dépôt et/ou la lecture des cookies avec le même degré de simplicité.

Le consentement doit pouvoir être retiré simplement et à tout moment par l'utilisateur. Il doit être aussi simple de retirer son consentement que de le donner.

--- 

# Exemple de peine 

> Par une décision du 27 juin 2022, le Conseil d’État a confirmé la sanction de 35 millions d’euros prononcée par la CNIL à l’encontre d’Amazon en 2020. La société déposait des cookies sur les ordinateurs d’utilisateurs sans consentement préalable ni information satisfaisante.

> Par une décision du 28 janvier 2022, le Conseil d’État a confirmé la compétence de la CNIL à prendre des sanctions sur les cookies en dehors du mécanisme de guichet unique. Cette décision fait suite à un recours des sociétés GOOGLE LLC et GOOGLE IRELAND LIMITED contre l’amende de 100 millions d’euros prononcée par la CNIL en décembre 2020.

---
# Ceci peut également vous intéresser ...
## Personnalisation de contenus éditoriaux

Cette pratique consiste à personnaliser les contenus du site visité par l’utilisateur en fonction d’informations sur cet utilisateur.

En général mis en place par l’éditeur du site lui-même, une telle personnalisation repose sur l’utilisation de traceurs pour identifier un utilisateur unique et retenir les typologies de pages les plus visitées. Bien que ne relevant pas de la publicité ciblée, l’utilisation de traceurs à cette fin reste soumise au consentement utilisateur.

## Publicité ciblée

La publicité ciblée (ou personnalisée) est une technique publicitaire qui vise à identifier les personnes individuellement afin de leur diffuser des messages publicitaires spécifiques en fonction de caractéristiques individuelles.

Elle nécessite donc de connaître la personne consultant la publicité et de disposer d’informations sur elle afin de choisir un contenu publicitaire plus susceptible de la faire interagir, par exemple concernant l’un de ses centres d’intérêt supposés ou une intention d’achat. Pour cela, les acteurs de la publicité constituent des « profils » qui sont associés aux utilisateurs.

Sur Internet, ces informations sur les intérêts de la personne sont souvent obtenues via des traceurs comme des cookies, ou bien sont achetées à des tiers. En raison de l’impossibilité de traiter toutes ces informations manuellement, la publicité ciblée est presque exclusivement programmatique.

[Publicité ciblée](./PubliciteCibleLigne.md)