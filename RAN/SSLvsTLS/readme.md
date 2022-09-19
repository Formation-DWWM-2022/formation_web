# SSL vs TLS – Quelle différence ?

- Comprendre le chiffrement SSL / TLS avec des emojis (et le HTTPS) : https://youtu.be/7W7WPMX7arI

![](https://www.ionos.fr/digitalguide/fileadmin/_processed_/3/b/csm_tls-vs-ssl-t_eaa05603c5.jpg)

SSL, TLS, ECC, SHA... La cybersécurité ressemble un peu à un potage rempli de petites pâtes alphabet. Cette soupe d’acronymes peut cependant vite devenir indigeste et vous faire perdre de vue vos véritables besoins. Je crois que la question que l’on nous pose le plus souvent porte sur les différences entre le SSL (Secure Socket Layer) et le TLS (Transport Layer Security). Vous souhaitez sécuriser votre site Web (ou un autre support de communication), mais avez-vous besoin du SSL ? Du TLS ? Des deux ? Voyons cela en détail.

Par exemple, si vous traitez des paiements par carte bancaire sur votre site Web, TLS et SSL peuvent vous aider à traiter ces données en toute sécurité afin que les acteurs malveillants ne puissent pas mettre la main dessus.

# SSL et TLS : rappel historique

SSL et TLS sont deux protocoles cryptographiques qui permettent l’authentification, et le chiffrement des données qui transitent entre des serveurs, des machines et des applications en réseau (notamment lorsqu’un client se connecte à un serveur Web). Le SSL est le prédécesseur du TLS. Au fil du temps, de nouvelles versions de ces protocoles ont vu le jour pour faire face aux vulnérabilités et prendre en charge des suites et des algorithmes de chiffrement toujours plus forts, toujours plus sécurisés.

Initialement développé par Netscape, le SSL sort en 1995 dans sa version SSL 2.0 (le SSL 1.0 n’étant jamais sorti). Mais après la découverte de plusieurs vulnérabilités en 1996, la version 2.0 est vite remplacée par le SSL 3.0. Remarque : les versions 2.0 et 3.0 sont parfois libellées ainsi : SSLv2 et SSLv3.

Basé sur le SSL 3.0, le TLS est introduit en 1999 comme la nouvelle version du SSL :

" Les différences entre ce protocole et le SSL 3.0 ne sont pas énormes, mais suffisamment importantes pour empêcher l'interopérabilité entre le TLS 1.0 et le SSL 3.0. "

Actuellement, la version du TLS utilisée est la v.1.3 (depuis 2018)

# Quel protocole utiliser : SSL ou TLS ?

Les versions SSL 2.0 et 3.0 ont toutes deux été désapprouvées par l’IETF (en 2011 et 2015, respectivement). Des vulnérabilités (comme POODLE, et DROWN) ont été et continuent d’être découvertes dans les protocoles SSL désapprouvés. La plupart des navigateurs récents dégradent l’expérience utilisateur (cadenas ou préfixe HTTPS barré dans la barre d’URL, affichage d’avertissements de sécurité) lorsqu’ils rencontrent un serveur Web qui utilise d’anciens protocoles. Nous vous recommandons donc de désactiver les versions SSL 2.0 et 3.0 dans votre configuration serveur pour ne conserver que les protocoles TLS.

## Les certificats sont différents des protocoles.

Avant de songer à remplacer vos certificats SSL existants par des certificats TLS, rappelons que les certificats ne sont pas dépendants des protocoles. En clair, vous n’avez pas à utiliser un certificat TLS plutôt qu’un certificat SSL. Si de nombreux fournisseurs ont tendance à parler de « Certificat SSL/TLS », il serait sans doute plus exact de parler de « certificats à utiliser avec SSL et TLS », puisque les protocoles sont déterminés par votre configuration serveur, pas par les certificats en tant que tels.

L’expression « Certificats SSL », à ce jour la plus répandue, devrait cependant perdurer, même si le terme TLS commence à percer. L’expression « SSL/TLS » est un compromis fréquent, jusqu’à ce que l’emploi de TLS se soit généralisé.

# Comment TLS et SSL sécurisent-ils les données ?

Lorsque vous installez un certificat SSL/TLS sur votre serveur Web (souvent appelé simplement « certificat SSL »), il comprend une clé publique et une clé privée qui authentifient votre serveur et permettent à celui-ci de crypter et de décrypter les données.

Lorsqu’un visiteur se rend sur votre site, son navigateur recherchera le certificat SSL / TLS de votre site. Ensuite, le navigateur effectuera un « handshake » pour vérifier la validité de votre certificat et authentifier votre serveur. Si le certificat SSL n’est pas valide, vos utilisateurs peuvent être confrontés à l’erreur « votre connexion n’est pas privée », ce qui pourrait les inciter à quitter votre site web.

Une fois que le navigateur d’un visiteur détermine que votre certificat est valide et authentifie votre serveur, il crée essentiellement un lien crypté entre lui et votre serveur pour transporter les données en toute sécurité.

C’est également là qu’intervient HTTPS (HTTPS signifie « HTTP over SSL/TLS »).

HTTP, et le plus récent HTTP/2, sont des protocoles d’application qui jouent un rôle essentiel dans le transfert d’informations sur Internet.

Avec le HTTP simple, cette information est vulnérable aux attaques. Mais lorsque vous utilisez HTTP sur SSL ou TLS (HTTPS), vous cryptez et authentifiez ces données pendant le transport, ce qui les rend sécurisées.

C’est pourquoi vous pouvez traiter en toute sécurité les détails de votre carte bancaire via HTTPS, mais pas via HTTP, et c’est aussi pourquoi Google Chrome fait tant d’efforts pour adopter HTTPS.

# Devriez-vous Utiliser TLS ou SSL ? Est-ce que TLS Remplace SSL ?

Oui, TLS remplace SSL. Et oui, vous devriez utiliser TLS au lieu de SSL.

Comme vous l’avez appris ci-dessus, les deux versions publiques de SSL sont dépréciées en grande partie à cause des vulnérabilités de sécurité connues qu’elles comportent. En tant que tel, SSL n’est pas un protocole entièrement sécurisé en 2019 et au-delà.

TLS, la version la plus moderne de SSL, est sécurisée. De plus, les versions récentes de TLS offrent également des avantages en termes de performances et d’autres améliorations.

Non seulement TLS est plus sûr et plus performant, mais la plupart des navigateurs Web modernes ne supportent plus SSL 2.0 et SSL 3.0. Par exemple, Google Chrome a cessé de prendre en charge SSL 3.0 depuis 2014, et la plupart des principaux navigateurs prévoient de cesser de prendre en charge TLS 1.0 et TLS 1.1 en 2020.

En fait, Google a commencé à afficher les notifications d’avertissement ERR_SSL_OBSOLETE_VERSION dans Chrome.

Si vous êtes hébergé ailleurs, vous pouvez utiliser l’outil [SSL Labs](https://www.ssllabs.com/ssltest/) pour vérifier quels protocoles sont activés pour votre site.

![](https://kinsta.com/wp-content/uploads/2019/12/kinsta-supported-tls-versions.jpg)

# Pourquoi on permet des protocoles TLS multiples ?

Si TLS 1.3 est le protocole le plus moderne et le plus performant, pourquoi les sites se donne-t-il la peine d’activer également les protocoles TLS 1.2 légèrement plus anciens ?

En d’autres termes : quel est l’avantage d’avoir plusieurs protocoles activés ?

Comme vous l’avez appris ci-dessus, la poignée de main (handshake) SSL / TLS comporte deux parties :

- Votre serveur web
- Le client (généralement le navigateur Web d’un visiteur)

Pour que la poignée de main fonctionne, les deux doivent prendre en charge le même protocole.

Le principal avantage d’avoir plusieurs protocoles est donc la compatibilité.

Par exemple, alors que Chrome et Firefox ont ajouté le support de TLS 1.3 presque immédiatement après sa sortie en 2018, Apple et Microsoft ont pris un peu plus de temps pour ajouter le support de TLS 1.3.

Même en 2019, les navigateurs suivants ne sont toujours pas compatibles TLS 1.3 :

- Internet Explorer
- Opera Mini
- Android Browser
- Opera Mobile
- UC Browser for Android
- Samsung Internet
- Baidu Browser

![](https://kinsta.com/fr/wp-content/uploads/sites/4/2019/11/prise-charge-navigateurs-web-tls-1-3-1.png)

En activant TLS 1.3 et TLS 1.2 sur votre serveur, vous pouvez assurer la compatibilité quoi qu’il arrive, tout en bénéficiant des avantages de TLS 1.3 pour les navigateurs qui le supportent, comme Chrome et Firefox.

Si vous voulez vérifier quelle version de SSL/TLS votre navigateur Web utilise, vous pouvez utiliser l’outil : [How’s My SSL](https://www.howsmyssl.com/)

# Résumé

En résumé, TLS et SSL sont tous deux des protocoles d’authentification et de cryptage du transfert de données sur Internet.

Les deux sont étroitement liés et TLS n’est en fait que la version la plus moderne et sécurisée de SSL.

Bien que SSL soit toujours le terme dominant sur Internet, la plupart des gens veulent vraiment dire TLS lorsqu’ils parlent de SSL, parce que les deux versions publiques de SSL ne sont pas sécurisées et ont depuis longtemps été dépréciées.

Pour utiliser les protocoles SSL et TLS, vous devez installer un certificat sur votre serveur. Encore une fois, alors que la plupart des gens les appellent « certificats SSL », ces certificats supportent à la fois les protocoles SSL et TLS.

Vous n’avez pas à vous soucier de « changer » votre certificat SSL en certificat TLS. Si vous avez déjà installé un « certificat SSL », vous pouvez être sûr qu’il supporte également TLS.

Il est important d’utiliser les dernières versions de TLS car SSL n’est plus sécurisé, mais votre certificat ne détermine pas le protocole que votre serveur utilise. Au lieu de cela, une fois que vous avez un certificat, vous pouvez choisir les protocoles à utiliser au niveau du serveur.