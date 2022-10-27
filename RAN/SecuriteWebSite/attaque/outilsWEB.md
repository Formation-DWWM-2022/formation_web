# ✔️ Outils de piratage recommandés

- 9 outils à UTILISER : <https://youtu.be/opKCYHuVPIM>

## Navigateur

Lors du piratage d’une application web un bon navigateur Internet est obligatoire. L’accent est mis sur le bon ici, donc vous ne voulez pas utiliser Internet Explorer. Autre que cela, il est à votre préférence personnelle. Chrome et Firefox fonctionnent tous les deux très bien de l’expérience des auteurs.

## Trousses de développement de navigateur

Lorsque vous choisissez un navigateur avec lequel travailler, vous voulez en choisir un avec un bon outil de développement intégré (ou enfichable). Google Chrome et Mozilla Firefox sont tous deux livrés avec DevTools intégré puissant que vous pouvez ouvrir via la touche F12.

Lors du piratage d’une application web qui repose fortement sur JavaScript, il est essentiel pour votre succès de surveiller la console JavaScript en permanence! Il pourrait fuite d’informations précieuses à vous par erreur ou journaux de débogage!

![](https://pwning.owasp-juice.shop/part1/img/devtools_console.png)

Autres caractéristiques utiles du navigateur DevTools sont leur aperçu du réseau ainsi que des informations sur le code JavaScript côté client, les cookies et autres stockage local utilisés par l’application.

![](https://pwning.owasp-juice.shop/part1/img/devtools_network.png)
![](https://pwning.owasp-juice.shop/part1/img/devtools_sources.png)

## Outils de modification de requête HTTP

[Tamper Chrome](https://chrome.google.com/webstore/detail/tamper-chrome-extension/hifhgpdkfodlpnlmlnmhchnkepplebkb) vous permet de surveiller et - plus important encore - modifier les demandes HTTP avant qu’elles ne soient envoyées du navigateur au serveur.

Mozilla Firefox a intégré des capacités de falsification et n’a pas besoin d’un plugin. Sur l’onglet Réseau de DevTools de Firefox, vous avez la possibilité de modifier et renvoyer chaque requête HTTP enregistrée.

La falsification est extrêmement utile pour rechercher des trous dans la logique de validation côté serveur. Il peut également être utile lorsque vous essayez de contourner certains mécanismes de validation d’entrée ou de restriction d’accès, qui ne sont pas correctement vérifiés sur le serveur une fois de plus.

Un plugin de test d’API comme [PostMan](https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop) for Chrome vous permet de communiquer directement avec le backend RESTful d’une application web. Sauter l’interface utilisateur peut souvent être utile pour contourner les mécanismes de sécurité côté client ou simplement obtenir certaines tâches plus rapidement. Ici vous pouvez créer des requêtes pour tous les verbes HTTP disponibles (GET, POST, PUT, DELETE, etc.) avec toutes sortes de types de contenu, en-têtes de requête, etc.

Si vous vous sentez plus à l’aise sur la ligne de commande, curl fera l’affaire tout aussi bien que les plugins de navigateur recommandés.

## Outils de script

Un petit nombre de défis n’est pas réalisable manuellement sauf si vous trichez ou êtes incroyablement 🍀-chanceux.

Pour ces défis, vous devrez écrire des scripts qui, par exemple, peuvent soumettre automatiquement des requêtes avec différentes valeurs de paramètres. Tant que l’outil ou la langue de choix peut soumettre des requêtes HTTP, vous devriez être bien. Utilisez ce que vous connaissez le mieux.

Si vous avez peu d’expérience en programmation, mieux vaut choisir un langage qui est facile à entrer et vous donnera des résultats sans vous forcer à apprendre beaucoup d’éléments de syntaxe ou d’écrire beaucoup de code. Python, Ruby ou JavaScript vous donnent cette simplicité et cette facilité d’utilisation. Si vous vous considérez comme un "héros de ligne de commande", Bash ou PowerShell fera le travail pour vous. Les langages comme Java, C# ou Perl sont probablement moins adaptés aux débutants. En fin de compte, cela dépend entièrement de vos préférences, mais être familier avec au moins un langage de programmation est en quelque sorte obligatoire si vous voulez obtenir 100% sur le tableau de bord.

## Outils de test de pénétration

Vous pouvez résoudre tous les défis simplement en utilisant un navigateur et les plugins / outils mentionnés ci-dessus. Si vous êtes nouveau dans le piratage d’applications web (ou les tests de pénétration en général), c’est également l’ensemble d’outils recommandés pour commencer. Dans le cas où vous avez de l’expérience avec des outils de pentesting professionnels, vous êtes libre de les utiliser! Et vous êtes complètement libre dans votre choix, de sorte que les produits commerciaux coûteux sont tout aussi bien que les outils open source. Avec ce type d’outillage, vous aurez un avantage concurrentiel pour certains des défis, en particulier ceux où la force brute est une attaque viable. Mais il y a autant de vulnérabilités multiples dans le magasin de jus OWASP où - au moment de cette écriture - les outils automatisés ne vous aideraient probablement pas du tout.

Dans les sections suivantes, vous trouverez quelques outils de pentesting recommandés au cas où vous voudriez en essayer un. Sachez que les outils ne sont pas triviaux à apprendre - encore moins à maîtriser. Essayer d’en apprendre davantage sur les bases de sécurité des applications Web et les outils de piratage en même temps est peu probable de vous obtenir très loin dans l’un des deux sujets.

## Intercepter des mandataires

Un proxy d’interception est un logiciel qui est configuré comme homme au milieu entre votre navigateur et l’application que vous souhaitez attaquer. Il surveille et analyse tout le trafic HTTP et vous permet généralement de modifier, rejouer et brouiller les requêtes HTTP de différentes façons. Ces outils viennent avec beaucoup de modèles d’attaque intégrés et offrent des attaques actives et passives qui peuvent être scriptées automatiquement ou pendant que vous surfez sur l’application cible.

Le logiciel open-source [OWASP Zed Attack Proxy (ZAP)](https://www.zaproxy.org/) est un tel logiciel et offre de nombreux outils de piratage utiles gratuitement:

> ZAP est un outil de test de pénétration intégré facile à utiliser pour trouver des vulnérabilités dans les applications web. Il est conçu pour être utilisé par des personnes ayant une vaste expérience de la sécurité et est donc idéal pour les développeurs et les testeurs fonctionnels qui sont nouveaux aux tests de pénétration. ZAP fournit des scanners automatisés ainsi qu’un ensemble d’outils qui vous permettent de trouver manuellement les vulnérabilités de sécurité.

![](https://pwning.owasp-juice.shop/part1/img/zap.png)

## Au lieu d’installer un outil comme ZAP sur votre ordinateur, pourquoi ne pas le prendre, ajouter plusieurs centaines d’autres outils de sécurité offensifs et les mettre tous dans une distribution Linux prête à l’emploi? Saisie de Kali Linux et de boîtes à outils similaires

> Kali Linux est une distribution Linux basée sur Debian destinée aux tests de pénétration et aux audits de sécurité avancés. Kali contient plusieurs centaines d’outils destinés à diverses tâches de sécurité de l’information, telles que les tests de pénétration, la criminalistique et l’ingénierie inverse.3

Le mot-clé dans la citation précédente est avancé! Plus précisément, Kali Linux est facilement accablant lorsque les débutants essaient de travailler avec elle, comme l’indique même l’équipe de développement Kali:

> En tant que développeurs de la distribution, vous pouvez vous attendre à ce que nous recommandions à tout le monde d’utiliser Kali Linux. Le fait est, cependant, que Kali est une distribution Linux spécifiquement orientée vers les testeurs de pénétration professionnels et les spécialistes de la sécurité, et compte tenu de sa nature unique, ce n’est pas une distribution recommandée si vous n’êtes pas familier avec Linux [...]. Même pour les utilisateurs Linux expérimentés, Kali peut poser certains défis.4

Bien qu’il existe des distributions de pentesting plus légers, ils présentent encore essentiellement un obstacle élevé pour les personnes nouvellement dans le domaine de la sécurité informatique. Si vous vous sentez encore capable, essayez Kali Linux !

![](https://pwning.owasp-juice.shop/part1/img/kali.jpg)

## Liste de scanner de site web 

- Grabber
- Vega
- Zed Attack Proxy
- Wapiti
- W3af
- WebScarab
- Skipfish
- Ratproxy
- SQLMap
- Wfuzz
- Grendel-Scan
- Watcher
- X5S
- Arachni
- BurpSuite
- Commix
- Jexboss
- DBeaver
- SQL ninja