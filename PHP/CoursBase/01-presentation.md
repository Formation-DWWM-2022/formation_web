## Présentation de PHP [6 min] -> Q/R

<https://grafikart.fr/tutoriels/php-presentation-1112#autoplay>

Bienvenue dans ce cours complet traitant du langage de programmation PHP.

Dans ce cours, nous allons étudier de façon pratique les différentes fonctionnalités du PHP et voir comment les utiliser ensemble pour exploiter tout leur potentiel.

Ce cours se veut progressif : nous allons commencer avec des notions basiques de PHP afin de bien comprendre son fonctionnement, ses spécificités ainsi que quand et pourquoi utiliser ce langage et nous irons progressivement vers une utilisation avancée du PHP. Une fois les grandes notions du PHP maitrisé, nous étudierons le MySQL et donc le langage SQL sur lequel MySQL repose et verrons les interactions entre le MySQL et le PHP.

Cependant, pour suivre ce cours dans de bonnes conditions, il est essentiel que vous possédiez des bases en HTML et en CSS. Si vous ne connaissez pas du tout ces deux langages, je vous invite à consulter mon cours complet traitant de ce sujet.

## Définition et rôle du PHP

Le terme PHP est l’acronyme de « PHP Hypertext Preprocessor ». Le premier « P » de PHP est en effet lui-même l’abréviation de « PHP », une curiosité qui ne va pas présenter une grande importance pour nous.

Ce langage a été créé en 1994. Sa version stable la plus récente (au 15 juillet 2019) est la version 7.3.7. C’est la version sur laquelle je vais me baser dans ce cours.

Le PHP va nous permettre de créer des pages qui vont être générées dynamiquement. En d’autres mots, grâce au PHP, nous allons pouvoir afficher des contenus différents sur une même page en fonction de certaines variables : l’heure de la journée, le fait que l’utilisateur soit connu et connecté ou pas, etc.

Pour illustrer cela, prenons l’exemple d’un espace client sur un site web e-commerce. Un utilisateur arrive sur un site e-commerce sur lequel il a déjà commandé et crée un espace client. Lors de son arrivée sur le site, il dispose d’un formulaire de connexion à son espace client.

Il va alors devoir fournir des informations (généralement un pseudonyme et un mot de passe) pour pouvoir se connecter et accéder à son espace client. Cet espace client est personnalisé : il va certainement contenir l’historique des commandes de l’utilisateur, son profil avec ses informations de facturation et son adresse de livraison, etc.

Ici, lorsque l’utilisateur rentre ses informations de connexion, celles-ci vont être traitées et analysées en PHP. On va vérifier si les informations sont bonnes et si c’est le cas récupérer des informations spécifiques à cet utilisateur et générer dynamiquement les pages de son espace client avec ces informations.

Lorsqu’un utilisateur fournit des informations comme une adresse, un numéro de téléphone ou passe une commande, les données sont généralement enregistrées dans ce qu’on appelle une base de données. Le PHP va également nous permettre d’aller récupérer des données dans une base de données pour s’en resservir.

De plus, notez que le PHP va s’exécuter côté serveur. Il fait ainsi partie des langages qu’on nomme « server side » en opposition aux langages « client side » qui s’exécutent côté client. Nous expliquerons ces notions en détail dans la prochaine leçon.

## Sites statiques et sites dynamiques

Les langages de programmation axés web peuvent être catégorisés selon deux grands types de classement :

- Langages statiques VS langages dynamiques ;
- Langages avec exécution côté client VS langages avec exécution côté serveur.

Les sites dits statiques se caractérisent par le fait qu’ils sont… statiques : ils ne possèdent ni interaction, ni la capacité de s’adapter aux visiteurs. Le code des différentes pages ne va pas changer en fonction d’un utilisateur ou d’une autre variable. Un site de type “CV” par exemple, ou un site servant simplement à présenter ou à donner des informations sur une chose en particulier vont généralement être des sites statiques car il n’y a aucune interaction ni adaptation dynamique avec le visiteur. Un site créé uniquement en HTML et en CSS par exemple sera toujours statique.

Les sites dynamiques, en revanche, vont pouvoir fournir des pages différentes pour chaque visiteur ou selon différentes contraintes et vont nous permettre d’interagir avec l’utilisateur en lui permettant de nous envoyer des données par exemple. De nombreux langages vont nous permettre de créer des sites dynamiques, chacun avec leurs points forts et leurs faiblesses et leur champ d’application. Dans ce cours, nous nous concentrons sur le binôme certainement le plus connu parmi ces langages : le PHP qui va être utile pour tout ce qui est calcul / traitement des données et le MySQL qui va nous servir à gérer nos bases de données.

Nous reparlerons de la distinction client / serveur dans la prochaine leçon. Ici, vous pouvez retenir qu’un site web créé uniquement avec des langages qui s’exécutent côte client sera statique tandis qu’un langage créé avec des langages qui s’exécutent côté client et des langages qui s’exécutent côté serveur sera généralement dynamique.

## Pourquoi utiliser le PHP ?

Contrairement au HTML et au CSS qui sont de véritables standards, le PHP a de nombreux concurrents : Python, Ruby voire JavaScript.

Pourquoi préférer le PHP aux langages concurrents ? Concrètement, il n’y a pas de raison « absolue » au sens où les alternatives citées sont également des langages performants et qui possèdent certains avantages comme certains inconvénients par rapport au PHP.

Cependant, si le PHP reste de loin le plus célèbre et le choix de référence lorsqu’on veut créer des sites dynamiques et stocker des données, c’est pour de bonnes raisons.

Le premier avantage du PHP concerne la structure de ce langage : c’est un langage à la fois très simple d’accès pour des débutants qui pourront rapidement comprendre sa syntaxe de base et réaliser leurs premiers scripts et qui va également supporter d’un autre côté des structures très complexes.

Ensuite, le PHP est un langage Open Source et donc gratuit. Il est bon de le noter car cela n’est pas forcément automatique même si les utilisateurs du web ont l’habitude du « tout gratuit ». Le PHP est également reconnu et supporté de manière universelle : il va fonctionner quasiment partout et avec l’immense majorité des architectures techniques.

Enfin, le PHP se distingue par ses performances et sa solidité : comme le langage est Open Source, n’importe qui peut contribuer à son évolution, ce qui fait qu’il est sans cesse perfectionné et qu’il ne sera à priori jamais abandonné. En outre, le PHP possède de bonnes performances d’exécution en termes de rapidité et est un langage sûr : les rares failles jamais détectées dans le langage ont toujours été corrigées dans les 24h.

## Le fonctionnement d’Internet et du Web

L’Internet est un système créé pour transporter de l’information. C’est un réseau de réseaux qui utilisent chacun des protocoles (ensemble de règles établies qui définissent comment formater, transmettre et recevoir des données) différents pour envoyer de l’information.

Le World Wide Web, ou plus simplement « Web », est l’un des réseaux de l’Internet. Le Web n’est donc qu’une partie d’Internet.

Plus précisément, le Web est un réseau de machines interconnectées qui stockent des sites. Lorsqu’une machine est connectée au web et fournit un accès à un site web, on l’appelle un serveur car elle « sert » le site web.

Un serveur est une sorte de super ordinateur, fonctionnant 24h/24 et 7j/7 (en théorie), et étant beaucoup plus puissant que nos ordinateurs. Un serveur dispose de certains logiciels spécifiques et son rôle est de stocker toutes sortes de médias composant les sites (fichiers, images, etc.), et de les rendre accessible pour tout utilisateur à n’importe quel moment, où qu’il soit.

Pour pouvoir se comprendre et échanger des données toutes ces machines doivent parler la même langue, c’est-à-dire utiliser le même protocole.

Le Web repose ainsi sur le protocole HTTP, pour HyperText Transfer Protocol (protocole de transfert hypertexte) et sur son frère qui utilise des clefs de cryptage : le HTTPS (Secure HTTP). Pour utiliser ce protocole, nous allons devoir passer par un navigateur web (Chrome, Safari, etc.) qu’on va alors appeler un « client http ».

Pour accéder directement à une page web, on passe ainsi par un navigateur en utilisant le protocole HTTP. On va passer une adresse au format spécial à notre navigateur : une URL pour Uniform Resource Locator ou « localisateur uniforme de ressource » qui sert à identifier une page web de manière unique.

Ici, notre navigateur (et nous) sommes des « clients » puisque nous sommes ceux qui demandons à accéder à la page web.

Le navigateur va alors chercher où se trouve le serveur hébergeant la page demandée. Pour cela il va utiliser un service de DNS (Domain Name Server) qui sont des serveurs permettant d’associer un nom de domaine (pierre-giraud.com par exemple) à une adresse IP unique.

Notez ici que chaque fournisseur de services Internet fournit une liste d’adresses de DNS à contacter. Si le premier DNS ne reconnait pas le site, alors il envoie la demande à d’autres DNS et ainsi de suite jusqu’à ce qu’un DNS possède le site dans sa liste de noms.

L’adresse IP liée au site va alors être renvoyée au serveur. L’IP (Internet Protocol) est une suite de nombres qui permet d’identifier de manière unique une machine connectée à Internet. Chaque machine va posséder sa propre IP qui va changer en fonction du réseau sur lequel elle est connectée (l’IP est attribuée par le fournisseur de services Internet).

Le navigateur possède donc maintenant l’adresse IP de notre site et donc l’adresse de la machine (le fameux « serveur ») sur lequel il est stocké. Il va ainsi pouvoir directement contacter le serveur en utilisant le protocole HTTP pour lui demander de renvoyer la page en question et va également envoyer notre IP pour que le serveur sache à quelle adresse renvoyer la page demandée.

Lorsque le serveur reçoit la requête, il recherche immédiatement le fichier demandé, effectue éventuellement certaines opérations dessus et le renvoie au navigateur ou renvoie un code d’erreur si le fichier demandé est introuvable ou ne peut pas être envoyé.

Nous allons définir ce qu’est un « client » et ce qu’est un « serveur » et allons par la même voir les grandes différences entre les langages dits « client side » et les langages dits « server side ».

## Langages client side et server side

Un site Internet n’est qu’un ensemble de fichiers de codes liés entre eux et faisant éventuellement appel à des ressources ou médias comme des images, etc.

Le code écrit dans ces fichiers, encore appelé « script », va pouvoir être exécuté soit côté client (client-side), c’est-à-dire directement dans le navigateur de l’utilisateur qui cherche à afficher la page, soit du côté du serveur (server-side).

Vous devez bien comprendre ici qu’un navigateur (côté client) et un serveur (côté serveur) ne vont pouvoir chacun effectuer que certaines opérations et lire certains langages.

Pour être tout à fait précis, la grande majorité des navigateurs ne sont capables de comprendre et de n’exécuter que du code HTML, CSS et JavaScript. Un navigateur est ainsi incapable de comprendre du code PHP.

Lorsqu’un navigateur demande à un serveur de lui servir une page, le serveur va donc se charger d’exécuter tout code qui ne serait pas compréhensible par le navigateur (en utilisant au besoin un interpréteur).

Une fois ces opérations effectuées, le serveur va renvoyer le résultat (la page demandée après interprétation) sous forme de code compréhensible par le navigateur, c’est-à-dire principalement en HTML. Le navigateur va alors afficher la page au visiteur. Cette page va être unique puisqu’elle a été générée par le serveur pour un utilisateur spécifiquement et en tenant compte de données particulières.

Si en revanche la page demandée par le visiteur ne contient aucun code nécessitant l’intervention du serveur, alors le serveur va la renvoyer telle quelle au navigateur qui va l’afficher au visiteur.

Notez bien ici que les opérations réalisées côté serveur vont être transparentes pour le visiteur et que celui-ci ne va jamais avoir accès ni pouvoir voir le code exécuté côté serveur tout simplement car une fois les opérations terminées, le serveur ne va renvoyer que du code compréhensible par le navigateur.

C’est la raison pour laquelle lorsque vous analyser le code d’un page, vous ne trouverez jamais d’instructions PHP mais seulement généralement du code HTML, CSS et JavaScript qui sont des langages qui s’exécutent côté client.

Le schéma ci-dessous résume ce qu’il se passe lorsque vous demandez à accéder à une page web via votre navigateur :

![](https://www.pierre-giraud.com/wp-content/uploads/2019/05/relation-client-serveur.png)

Pour coder en HTML et en CSS et afficher le résultat de son code, un simple éditeur de texte et un navigateur suffisent. Pour le PHP et le MySQL, cependant, cela va être un peu plus complexe car le code va s’exécuter côté serveur.

Nous allons détailler les différentes alternatives qui s’offrent à nous pour coder en PHP et allons voir ensemble quels logiciels installer et pourquoi. 

## Le travail en local et le travail en production

Lorsque l’on code, on peut travailler soit en local, c’est-à-dire en hébergeant nous-mêmes tous les fichiers sur nos propres machines ou encore « hors ligne », soit en production (ou en pré-production) c’est-à-dire sur des fichiers qui sont hébergés sur un serveur distant et potentiellement accessibles à tous ou en « live ».

On va généralement opposer le travail en local au travail en production. En effet, en travaillant en local, nous sommes les seuls à avoir accès à nos différents fichiers et donc les seuls à voir l’impact des modifications que l’on fait sur ces fichiers tandis que si l’on fait la moindre modification en production, cela impacte directement notre site live et nos visiteurs le voient immédiatement.

Lors de la phase de développement d’un site ou dans des phases de test ou de débogage et sauf cas exceptionnels, un bon développeur préférera toujours travailler en local (ou éventuellement en pré-production) afin de ne pas impacter le fonctionnement normal d’un site web.

On appelle « pré-production » une copie d’un site également hébergée sur serveur. Généralement, on restreint l’accès à la pré-production aux développeurs du site afin qu’ils puissent tester en toute sécurité et en conditions réelles leurs modifications.

Dans le cas où le site est déjà créé et accessible à tous, alors nous ferons une copie locale de toute notre architecture et travaillerons sur cette copie afin de tester et d’implémenter de nouvelles fonctionnalités. Ensuite, une fois seulement qu’on s’est assuré que les différentes modifications ou implémentations fonctionnent et qu’aucun bug n’a été détecté, nous enverrons tous nos changements en production, c’est-à-dire que nous remplacerons les fichiers ou injecteront les modifications sur le serveur.

Dans ce cours, nous ne travaillerons évidemment pas sur un site déjà « live » car c’est une mauvaise pratique et car nous n’en avons pas mais plutôt en local. Cependant, rappelez-vous que le PHP va s’exécuter côté serveur.

Il va donc nous falloir recréer une architecture serveur sur nos propres machines avec les logiciels adaptés afin de pouvoir tester nos codes PHP. Rassurez-vous : cela est très simple et totalement gratuit.

## Recréer une architecture serveur sur son ordinateur

Comme je vous l’ai dit précédemment, un serveur dispose de différents programmes lui permettant de lire et de comprendre certains langages informatiques que des ordinateurs « normaux » ne peuvent pas lire.

Nous allons donc devoir installer des programmes similaires afin de pouvoir tester nos codes PHP et MySQL. La bonne nouvelle ici est qu’il existe des logiciels regroupant tous les programmes nécessaires pour faire cela.

Selon le système que vous utilisez, vous devrez installer un logiciel différent. Vous pouvez trouver ci-dessous le logiciel à installer selon votre système :

    Si vous êtes sous Windows, vous allez installer WAMP, disponible ici ;
    Si vous êtes sous Mac OS, vous allez installer MAMP, disponible ici ;
    Si vous êtes sous Linux, vous allez installer XAMPP, disponible ici.

Pour ma part, étant donné que j’utilise un système Mac OS, ne vais travailler avec MAMP pour la suite de ce cours. Si vous devez installer un logiciel différent, pas d’inquiétude : les trois logiciels cités ci-dessus vont fonctionner de la même manière et proposer quasiment les mêmes fonctionnalités.

Commencez donc déjà par télécharger le logiciel correspondant à votre système et par l’installer.

 
L’éditeur de texte, outil indispensable pour écrire du code

Les logiciels WAMP, MAMP ou XAMPP vont nous être utile pour exécuter notre code PHP. Cependant, avant d’exécuter du code, il va falloir l’écrire et pour cela, nous allons avoir besoin d’un éditeur de texte.

Je ne vais pas répéter ici ce que j’ai déjà dit dans mon cours sur le HTML et le CSS. Normalement, si vous suivez ce cours, vous devriez déjà connaître le HTML et le CSS et devriez donc déjà posséder un éditeur de texte et savoir vous en servir.

Pour ma part, j’utiliserai Komodo Edit pour ce cours, mais n’hésitez pas à conserver votre propre éditeur. Le plus important est que vous soyez à l’aise pour coder. Vous pouvez par exemple utiliser NotePad++, Sublime Text, Brackets, etc.

["PHP est MORT..." ➡ Faut-il encore APPRENDRE PHP en 2020 ?](https://youtu.be/yYic37F5_Lo)
