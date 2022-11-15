# Qu'est-ce que la preuve de travail ou proof-of-work (PoW) ?

La preuve de travail, de l'anglais proof-of-work (PoW), est un procédé permettant à un appareil informatique de démontrer de manière objective et quantifiable qu'il a dépensé de l'énergie. Ce moyen est utilisé pour sélectionner les ordinateurs dans le cadre de l'accès à un service ou à un privilège.

Entre autres, la preuve de travail permet de dissuader les attaques par déni de service ou de limiter le courrier indésirable. Dans Bitcoin et les autres systèmes de cryptomonnaie, elle sert à empêcher la falsification de l'unité de compte (le bitcoin dans le cas de Bitcoin) et à faire que le réseau puisse arriver à un consensus en ce qui concerne la blockchain.

![](https://cryptoast.fr/wp-content/uploads/2018/06/pow-proof-of-work-preuve-de-travail.jpg.webp)

## D'où vient la preuve de travail ?

Le concept de preuve de travail a été décrit pour la première fois par Cynthia Dwork and Moni Naor en 1992, au sein d'un article intitulé Pricing via Processing or Combatting Junk Mail. Cet article présente comment il est possible d'utiliser le procédé pour combattre le courrier indésirable (spam) dans les boîtes e-mail. En 1997, Adam Back a implémenté l'idée avec Hashcash, un algorithme permettant de produire de manière simple des preuves de travail grâce à une fonction de hachage, et dont l'utilisation principale était le courrier électronique.

Plusieurs applications de la preuve de travail ont été imaginées, en particulier la garantie de l'intégrité d'une unité de compte numérique. Le concept de b-money imaginé en 1998 par Wei Dai théorisait l'usage de cette technique pour maintenir la stabilité de la b-money par rapport à un panier de marchandises. La même année, Nick Szabo conceptualisait l'utilisation du procédé pour assurer la rareté infalsifiable de son bit gold.

Le terme « proof of work » est apparu en 1999 sous la plume de Markus Jakobsson et Ari Juels dans leur article Proofs of Work and Bread Pudding Protocols. Hal Finney a ensuite repris le nom pour son système de preuves de travail réutilisables (reusable proofs of work ou RPOW) mis en application en 2004.

## Comment ça fonctionne ? L'exemple de Hashcash

L'algorithme Hashcash, conçu par Adam Back en 1997, est un procédé simple de preuve de travail, et il s'agit également de celui qui est utilisé dans Bitcoin. C'est pourquoi nous nous attarderons ici sur ce modèle.

Hashcash se base sur ce qu'on appelle une fonction de hachage. Une fonction de hachage est une fonction particulière puisqu'il s'agit d'une fonction à sens unique, théoriquement impossible à inverser, qui prend en entrée un message de taille variable pour le transformer en une empreinte de taille fixe. Il existe une grande quantité de fonctions de hachage mais nous nous concentrerons ici sur la fonction SHA-256 qui est utilisée dans Bitcoin.

Comme on l'a dit, les fonctions de hachages sont à sens unique. Il est par conséquent théoriquement impossible de déduire le message à partir de son empreinte, même en la comparant à d'autres empreintes de messages légèrement différents. Par exemple, les empreintes des messages suivants n'ont rien à voir entre elles :

```
Message Empreinte (SHA-256)
"Bonjour" 9172e8eec99f144f72eca9a568759580edadb2cfd154857f07e657569493bc44
"Bonjour." 441278a3222df4721ec34da47617fc314830ca0951491981ab2fb2de7ae640d2
"bonjour" 2cb4b1431b84ec15d35ed83bb927e27e8967d75f4bcd9cc4b25c8d879ae23e18
```

Dans Hashcash, l'algorithme de preuve de travail consiste essentiellement de trouver une collision partielle de la fonction de hachage qu'on considère, c'est-à-dire à dire de trouver deux messages ayant une empreinte commençant par les mêmes caractères. Puisque la fonction de hachage considérée est à sens unique, cela ne peut être effectué qu'en testant une à une les différentes possibilités, en accomplissant un travail demandant de l'énergie.

Un usage restreint de Hashcash, qui est notamment mis en œuvre dans Bitcoin, consiste à trouver une empreinte commençant par un nombre de zéros déterminé. Par exemple, l'empreinte suivante comporte 4 zéros hexadécimaux (16 zéros en binaire) :

0000bc75a4125119dcd24b8dda99f172af316781f717f432e06b51e7d1770d42

Cette empreinte n'est pas anodine puisque trouver le message correspondant a demandé un travail impliquant de calculer toutes les possibilités. Par exemple, en prenant le message de base « Bonjour » et en lui ajoutant un nombre variable, on a pu tester 9990 combinaisons avant de trouver une solution :

```
Message Empreinte (SHA-256)
"Bonjour 0" ac93b929780c357e68f57cb8d261a4779b4d098e59fb5a36d2269baa1edd7eeb
"Bonjour 1" 0d2156f9ae119fedf71e44e48c963b5605f66eb9573cef97a09dddaa73b6378c
"Bonjour 2" a1a382b6b01425d83d81b4f7c5e425120ad6d9ac9df585060c266e6ac241ed12
⁝ ⁝
"Bonjour 10" da4f31015f620eacbe869c03aed42f067d5ef73aebd929e2e0a1c49b16eaaf05
⁝ ⁝
"Bonjour 100" 34d9ddfafc58c7c12cbe7093945ca4d1154aa239254b6c348433511b8b1adfb9
⁝ ⁝
"Bonjour 1000" 74692131e79edaed6d4c3c68e6b7eaa6ee2cc2109a94daaa40a5c3d735f1eaca
⁝ ⁝
"Bonjour 9990" 0000bc75a4125119dcd24b8dda99f172af316781f717f432e06b51e7d1770d42
```

En moyenne, un tel calcul demande de tester 65 536 possibilités (216). Notez enfin que le message doit généralement comporter des indications sur le contexte dans lequel la preuve de travail a été réalisée (identifiant, date, heure, etc.) pour démontrer que la preuve de travail n'a pas déjà été utilisée autre part.

De cette manière, il est possible de prouver une dépense d'énergie, au besoin très grande : plus l'empreinte compte de zéros initiaux, plus le message correspondant a de valeur. Il peut ainsi être difficile de trouver une solution, néanmoins il reste très facile de la vérifier : c'est cette asymétrie qui fait la force du procédé.

## Comment la preuve de travail est-elle utilisée dans Bitcoin ?

Bitcoin est basé sur la preuve de travail et, comme on l'a dit, utilise l'algorithme Hashcash pour calculer cette proof-of-work. La fonction de hachage utilisée est le double SHA-256 (la fonction SHA-256 appliquée 2 fois de suite).

L'utilisation de la preuve de travail dans Bitcoin possède un rôle double :

- Exiger un coût pour la fabrication des nouveaux bitcoins. C'est pour cela que, par analogie au minage d'or qui demande de l'énergie pour extraite de nouvelles quantités de minerai, on parle souvent de minage quand on décrit l'activité consistant à calculer la preuve de travail.
- Faire en sorte que le réseau puisse arriver à un consensus, c'est-à-dire que les nœuds honnêtes puissent se mettre d'accord sur qui possède quoi et quelles transactions sont valides.

Pour cela, Bitcoin met en place ce qu'on appelle une chaîne de blocs au sein de laquelle des blocs de transactions se suivent, et sont ajoutés toutes les 10 minutes en moyenne. Chaque bloc contient l'identifiant du bloc précédent ce qui permet de lier les blocs les uns aux autres. Cependant, tout le monde ne peut pas réaliser cette opération : il est nécessaire que le mineur calcule une preuve de travail qui montrera qu'il a dépensé le montant d'énergie demandé par le protocole.

## Où se trouve la preuve de travail dans un bloc ?

Prenons l'exemple du bloc 635 000 de Bitcoin, miné le 16 juin 2020 par la coopérative Poolin. Pour valider le bloc 635 000, le mineur a dû construire une ébauche de ce bloc (en y incluant les transactions et les données utiles), indiquer l'identifiant du bloc précédent pour réaliser la liaison, et faire varier un nombre présent dans l'entête appelé le nonce. En faisant varier ce nonce (ainsi que d'autres paramètres dans le bloc), le mineur a pu essayer un nombre gigantesque de possibilités afin que le hachage de l'entête produise un résultat convenable, c'est-à-dire une empreinte commençant par un nombre suffisant de zéros. Cette empreinte constitue l'identifiant de ce bloc :

0000000000000000000de8fe48015885c04cf07fc40a3e7b4bb3d32cf0b4e488

![](https://cryptoast.fr/wp-content/uploads/2020/06/bitcoin-block-pow.png)

Le bloc en lui-même constitue donc la preuve de travail, et l'identifiant est la manière dont on le vérifie. De cette façon, chaque membre du réseau peut, à partir des données du bloc, s'assurer que le mineur a bien trouvé une solution valide.

De plus, le nombre de zéros initiaux dans l'identifiant permet d'estimer le nombre moyen de possibilités que le mineur a dû essayer pour arriver à ce résultat. Ici, il y a 19 zéros, ce qui représente 2^76 combinaisons, soit environ 75 558 milliards de milliards de possibilités. Ce nombre est énorme, et pour cause : la puissance de hachage du réseau Bitcoin en juin 2020 avoisinait les 110 EH/s (110 milliards de milliards de hachages par seconde).

## D'où viennent les nouveaux bitcoins ?

Même si la quantité théorique de bitcoins en circulation est limitée à 21 millions, ces 21 millions doivent être créés. Depuis le 3 janvier 2009, il s'en crée de manière décroissante : 50 bitcoins par bloc en 2009, 25 BTC par bloc en 2012, 12,5 bitcoins par bloc en 2016 et 6,25 BTC par bloc depuis mai 2020.

À chaque fois qu'un bloc est ajouté à la chaîne, celui qui l'a validé en calculant la preuve de travail est rémunéré avec ces nouveaux bitcoins : le mineur inclut dans le bloc une transaction de récompense qui permet de récupérer ces nouveaux bitcoins, ainsi que les frais des transactions contenues dans le bloc. Cela permet d'inciter le mineur à fournir de la puissance de calcul afin de sécuriser le système. À long terme, la rémunération devrait de plus en plus reposer sur les frais de transaction.

Enfin, pour éviter que la hausse de la puissance de calcul du réseau accélère la production des nouveaux bitcoins, un algorithme d'ajustement de la difficulté est mis en place dans le protocole. Toutes les deux semaines environ, cet algorithme modifie la difficulté de la PoW à calculer afin que le temps moyen entre chaque bloc soit de 10 minutes. Le minage, chose qu'il était possible de faire avec un simple ordinateur personnel en 2009, n'est aujourd'hui accessible qu'à des mineurs possédant du matériel spécialisé et optimisé (les fameux ASIC).

## Comment le réseau de Bitcoin arrive-t-il à un consensus ?

On l'a dit : Bitcoin se sert de la preuve de travail pour que les nœuds honnêtes du réseau arrivent à un consensus sur le contenu du registre des transactions, c'est-à-dire de la chaîne de blocs. Pour ce faire, un principe simple est utilisé : le principe de la chaîne la plus longue qui stipule que la chaîne possédant le plus de preuve de travail accumulée est la chaîne à considérer comme correcte. Comme l'indique le nom de ce principe, cette chaîne est quasiment toujours la chaîne étant constituée du plus grand nombre de blocs.

De cette manière, lorsqu'un conflit se produit sur le réseau, la situation peut être résolue. Lorsque par exemple deux mineurs trouvent chacun un bloc au même moment, il se produit ce qu'on appelle un fork ou embranchement : les deux chaînes résultantes renferment la même quantité de preuve de travail et sont par conséquent toutes les deux valides, ce qui fait que le réseau ne peut pas se mettre d'accord. Le conflit est résolu au moment où un mineur trouve un nouveau bloc (lié au bloc qu'il a considéré comme valide), ce qui fait qu'une chaîne est plus longue que l'autre.

![](https://cryptoast.fr/wp-content/uploads/2020/05/blockchain-fork-green-red-768x307.png.webp)

L'algorithme de consensus se basant sur le principe de la chaîne la plus longue est appelé algorithme de consensus de Nakamoto par preuve de travail, en hommage à son inventeur, le créateur de Bitcoin, Satoshi Nakamoto.

Notez que l'algorithme de validation par preuve de travail utilisé par Bitcoin n'est pas unique. Il existe ainsi de nombreuses variantes du principe. Litecoin utilise par exemple Scrypt, un algorithme de preuve de travail requérant également de la capacité en mémoire. Et Ethereum repose sur Ethash, un protocole de consensus qui sélectionne pour critère de sélection la chaîne la plus lourde, qui fait rentrer dans la balance les blocs invalidés comme dans le schéma ci-dessus.

## Quelles sont les forces et les faiblesses de la preuve de travail ?

Bitcoin se sert de la preuve de travail dans son modèle de consensus, ce qui le distingue des systèmes distribués se basant sur la preuve d'autorité (proof-of-authority), où la liste des validateurs est définie à l'avance, ou sur la preuve d'enjeu (proof-of-stake), où la sélection des validateurs se fait par rapport à la possession de jetons.

Ce modèle, décrit pour la première fois dans le livre blanc de Bitcoin en 2008, est novateur et présente des avantages majeurs par rapport aux modèles précédents. Comme rien n'est jamais parfait, il a également ses inconvénients qui sont régulièrement évoqués par les détracteurs de Bitcoin et des cryptomonnaies.

## Avantages du consensus par preuve de travail

Les bénéfices de la preuve de travail sont :

- Une participation au consensus ouverte : les mineurs commencer à contribuer et arrêter de le faire quand ils le souhaitent.
- La robustesse du réseau : un mineur n'a pas à connaître tous les autres nœuds du réseau.
- L'objectivité de la chaîne de blocs : tout le monde peut reconstituer la chaîne à partir du bloc de genèse et constater qu'il s'agit de la bonne.
- Une meilleure résistance à la censure à long terme due au caractère externe de la preuve : la preuve ne se base pas sur des données internes, ce qui permet d'outrepasser le censeur en déployant plus de matériel de minage.

## Inconvénients du consensus par preuve de travail

Les désavantages liés à la preuve de travail sont :

- Le coût élevé de la sécurisation du système, lié à une consommation d'énergie importante. Cela impose aux mineurs de revendre une partie de leur récompense directement pour payer les frais d'électricité et d'entretien, ce qui fait mécaniquement baisser le cours de la cryptomonnaie.
- L'impact écologique : cette consommation d'énergie pollue. Ceci est à relativiser : sur Bitcoin par exemple, 75 % de l'énergie du minage provient de l'énergie renouvelable, qui est bien souvent une énergie de récupération.
- La vulnérabilité aux attaques des 51 % : il est possible pour un acteur seul de réunir plus de la moitié de la puissance de calcul pour effectuer une double dépense lucrative. Cette vulnérabilité est accentuée par le regroupement fréquent des mineurs en coopératives de minage (mining pools). Si Bitcoin est relativement en sécurité, ce n'est pas le cas de certains autres systèmes de cryptomonnaie : ainsi on a pu voir ce type d'attaque être orchestrée sur Ethereum Classic, Bitcoin Gold ou Pegnet.

## Quelles sont les différences entre la preuve d'enjeu et la preuve de travail ?

![](https://public.bnbstatic.com/static/academy/uploads-original/28d194dd9b3d4fce8dadb10faab1757f.png)

Il existe de nombreux algorithmes de consensus, mais l'un des plus attendus est le Proof of Stake (PoS). Le concept date de 2011 et a déjà été implémenté dans certains protocoles plus petits. Mais il n'a pas encore été adopté par des grandes blockchains.

Dans le Proof of Stake, les miners sont remplacés par des validateurs. Il n'y a pas de minage et pas de course pour trouver le bon hachage. À la place, les utilisateurs sont sélectionnés au hasard – s'ils sont choisis, ils doivent proposer (ou « forger ») un bloc. Si le bloc est valide, ils recevront des récompenses composées des frais des transactions du bloc.

Tout le monde ne peu pas être sélectionné, – le protocole prend en effet en compte certains paramètres pour faire son choix. Pour pouvoir être sélectionné, les participants doivent verrouiller un stake, un montant prédéterminé de la monnaie native de la blockchain. Le stake fonctionne comme une caution : tout comme les défendeurs versent une grosse somme d'argent pour les dissuader de se soustraire au procès, les validateurs bloquent un stake pour ne pas tricher. S'ils agissent malhonnêtement, leur stake complet (ou une partie de celui-ci) sera pris.

Le Proof of Stake présente des avantages par rapport au Proof of Work. Le plus notable est la réduction de l'empreinte carbone. Comme il n'est pas nécessaire de disposer de fermes de minage de grande puissance pour le PoS, l'électricité consommée ne représente qu'une fraction de celle consommée en PoW. 

Cela dit, le PoS est loin d'avoir le palmarès du PoW. Bien qu'il puisse être perçu comme énergivore à cause du gaspillage, le minage est le seul algorithme de consensus ayant fait ses preuves à grande échelle. En un peu plus d'une décennie, celui-ci a sécurisé plusieurs milliers de milliards de dollars de transactions. Pour affirmer avec certitude que le PoS rivalise en sécurité avec le PoW, le staking doit être correctement testé à grande échelle.